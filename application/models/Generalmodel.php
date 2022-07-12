<?php

if (!defined('BASEPATH'))

exit('No direct script access allowed');



class Generalmodel extends CI_Model {



    public function __construct() {

        // Call the Model constructor

        parent::__construct();

    }

   

	

function login($tablename, $email, $password){          

		$this->db->where('email', $email);
        $this->db->where('password',md5($password));
	    $this->db->from($tablename);			
		$this->db->get();
        return $this->db->affected_rows();
		
        // if ($query->num_rows()===1) 

		// {				

		// 	$row=array(

		// 		'id'=>$query->row()->id,

  //               'email'=>$query->row()->email,

		// 		'logged_in'=>$query->row()->id,

  //               'loggedIn'=>TRUE

		// 		);

		// 	//echo "<pre>";print_r($row);exit;					

		// 	$this->session->set_userdata('dvAdmin_session',$row);

		// 	$msg['status']=TRUE;

		// 	//$msg['role']=$query->row()->role;

		// 	return $msg;					

		// }

		// else{ 

		// 	$msg['error_msg']='Invalid Email Address and password.';

		// 	$msg['status']=FALSE;

		// 	return $msg;

		// 	}

} 

 

public function add($tableName, $data) {
    $this->db->insert($tableName, $data);
   // return $this->db->insert_id();
	return true;
}


public function addById($tableName, $data,$id) 
{
   $this->db->insert($tableName, $data);
    return true;
}

public function modify($tableName, $colName, $id, $data) {

	

	$this->db->where($colName, $id);

	$this->db->update($tableName, $data);

	return $this->db->affected_rows();

}

public function updateData($tableName, $data, $where) 
{
    $this->db->update($tableName, $data, $where);
    return $this->db->affected_rows();
}



public function modifyMulti($tableName, $data1, $data) {



    $this->db->where($data1);



    $this->db->update($tableName, $data);



}



public function customQuery($tableName, $data1) {



    $this->db->where($data1);



    $result = $this->db->get($tableName)->result();



    return $result;



}



public function myCustomQuery($tableName, $data1,$orderby = '', $orderformat='') {



    $this->db->where($data1);



    if ($orderby != '')



    $this->db->order_by($orderby, $orderformat);



    $result = $this->db->get($tableName)->result();



    return $result;



}



public function delete($tableName, $colName, $id) {



    $this->db->where($colName, $id);



    $this->db->delete($tableName);

	return $this->db->affected_rows();



}



public function deleteMulti($tableName, $wh)
{
    $this->db->where($wh);
    $this->db->delete($tableName);
    return $this->db->affected_rows();
    //return TRUE;
}



    // To get single row of table by a id 

public function getDataByCondictions($tableName,$where)
{
    $this->db->where($where);
    $query=$this->db->get($tableName);
    return $query->result_array();
}

public function getSingleRowById($tableName, $colName, $id, $returnType = '') {



    $this->db->where($colName, $id);



    $result = $this->db->get($tableName);



    if ($result->num_rows() > 0) {



        if ($returnType == 'array')



            return $result->row_array();



        else



            return $result->row();

    }



    else



        return FALSE;



}



    // To get all row of matching criteria



public function getRowAllById($tableName, $colName, $id, $orderby = '', $orderformat = 'asc') {



    if ($colName != '' && $id != '')



        $this->db->where($colName, $id);



    if ($orderby != '')



        $this->db->order_by($orderby, $orderformat);



    $result = $this->db->get($tableName);



    if ($result->num_rows() > 0)



        return $result->result();



    else



        return FALSE;

}



    // To get data by multiple where 	



public function getRowByWhere($tableName, $filters = '', $select = '', $noRowReturn = '', $returnType = '', $orderby = '', $orderformat = 'asc') {



    if ($select != '')



        $this->db->select($select);



    if (count($filters) > 0) {



        foreach ($filters as $field => $value)



            $this->db->where($field, $value);



    }

    if ($orderby != '')



        $this->db->order_by($orderby, $orderformat);



    $result = $this->db->get($tableName);



    if ($result->num_rows() > 0) {



        if ($noRowReturn == 'single') {



            if ($returnType == 'array')



                return $result->row_array();



            else



                return $result->row();

        }



        else {

            if ($returnType == 'array')

                return $result->result_array();

            else

                return $result->result();

        }



    }

    else

        return FALSE;



}

 

    // Pagination function 



public function getPaginationData($tableName, $filters = '', $perPage, $start, $orderby, $orderformat,$selectData='') {

 

        //Set default order

	if($selectData!='') 

	{

		$this->db->select($selectData);

	}

    if ($orderformat == '')



        $orderformat = 'asc';



        //add where clause



    if ($filters != '' && count($filters) > 0)



        $this->db->where($filters);



    $this->db->limit($perPage, $start);



    $this->db->order_by($orderby, $orderformat);



    $result = $this->db->get($tableName);



    if ($result->num_rows() > 0)



        return $result->result();



    else



        return FALSE;



}



/*---get--pagination---*/



public function get_pagination_result($table_name='',$id_array='',$limit='',$offset='',$orderid,$order=''){     

       

	     if(!empty($id_array)):

		 

            foreach ($id_array as $key => $value){

                $this->db->where($key, $value);

             

            }

	      endif;

	    

        if($order!=''){

			 $this->db->order_by($orderid,$order); 

		}

         else{

			  $this->db->order_by('id','desc'); 

		 } 

		 

        if($limit > 0 && $offset>=0){ 

		

		    //$this->db->where($filters);

            $this->db->limit($limit, $offset);

			

            $query=$this->db->get($table_name);

			

            if($query->num_rows()>0)

                return $query->result();

            else

                return FALSE;

			

        }else{

            $query=$this->db->get($table_name);

            return $query->num_rows();

        }

    }





    //Function to return total number of rows



public function getTotalRows($tableName, $filters = NULL) {



    if ($filters != NULL) {



        $this->db->where($filters);



        $count = $this->db->count_all_results($tableName);



    }



    else



        $count = $this->db->count_all($tableName);



    return $count;



}

 

public function get_result($table_name='', $id_array='',$id_array2=''){

        

        if(!empty($id_array)):      

            foreach ($id_array as $key => $value){

                $this->db->where($key, $value);

             

            }

       endif;

        if(!empty($id_array2)):     

            foreach ($id_array2 as $key => $value){

                $this->db->or_where($key, $value);

            }

        endif;

        $query=$this->db->get($table_name);

        if($query->num_rows()>0)

            return $query->result();

        else

            return FALSE;

}

 

public function get_row($table_name='', $id_array='', $id_array2=''){

	if(!empty($id_array)):      

		foreach ($id_array as $key => $value){

			$this->db->where($key, $value);

		}

	endif;

	if(!empty($id_array2)):     

		foreach ($id_array2 as $key => $value){

			$this->db->or_where($key, $value);

		}

	endif;

	$query=$this->db->get($table_name);

	if($query->num_rows()>0) 

		return $query->row();

	else

		return FALSE;

}



public function get_resultbylimit($table_name='',$limit="",$id_array='',$id_array2=''){

         $this->db->limit($limit);

        if(!empty($id_array)):      

            foreach ($id_array as $key => $value){

                $this->db->where($key, $value);

             

            }

       endif;

        if(!empty($id_array2)):     

            foreach ($id_array2 as $key => $value){

                $this->db->or_where($key, $value);

            }

        endif;

        $query=$this->db->get($table_name);

        if($query->num_rows()>0)

            return $query->result();

        else

            return FALSE;

}



//---------========== Get Data Or operator =================------



public function getOrResult($table_name='',$id_array=''){



    if(!empty($id_array)):     



        $this->db->or_where($id_array);

    endif;

    $query=$this->db->get($table_name);

    if($query->num_rows()>0)

        return $query->result();

    else

        return FALSE;

}



//---------========== Get Data Using Clause =================------



public function getInClauseData($select='',$table_name='',$colName='',$arr='',$where=''){



 if ($select != '')

    $this->db->select($select);



if(count($where)>0)

    $this->db->where($where);



$this->db->where_in($colName, $arr);



$query=$this->db->get($table_name);

if($query->num_rows()>0)

    return $query->result();

else

    return FALSE;

}



//---------========== Get Data Using Join=================------



public function getJoinData($seldata,$table1='',$table2='',$join_condition='',$wh='',$orderby='id',$orderformat='asc',$group_by='',$is_left=''){



    $this->db->select($seldata);



    $this->db->from($table2);

	if(true){

		$this->db->join($table1,$join_condition,'left');

	}else{

		$this->db->join($table1,$join_condition);	

	}	

	

	if(!empty($wh))

    $this->db->where($wh);

	if(!empty($group_by))

	$this->db->group_by($group_by);

	

    $this->db->order_by($orderby, $orderformat);



    $query = $this->db->get();



    return $query->result();



}



//---------========== Search Result Using Keyword=================------



     public function get_like($table_name,$column='',$keyword='')



      {

            $this->db->select('*');



            $this->db->from($table_name);



            $this->db->like($column, $keyword,'after');



            return $this->db->get()->result();

      }

	  

      public function get_resultbyrendom($table="",$limit=""){



      $query = $this->db->query("SELECT  * FROM $table ORDER BY RAND() LIMIT $limit");

      return $query->result();

      

     } 



     public function get_resultbyYear($table){

        $query = $this->db->query("SELECT SUBSTRING(date,1,4) AS year FROM $table GROUP by year");

         return $query->result();

     }

    function get_resultbyorder($table,$where="",$col,$orderby="")
    {
        $this->db->select('*');
        $this->db->from($table);
        if($orderby!="")
        {
            $this->db->order_by($col,$orderby);
        }
        if(!empty($where)){
            $this->db->where($where);
        }
        $query = $this->db->get();
        if($query->num_rows() > 0) 
        {
            return $query->result();
        } 
        else 
        {
            return array();
        }
    }

     function get_resultbyord($table,$where="",$limit="",$start="",$orderby="",$type="")

    {

        $this->db->select('*');

        $this->db->from($table);

        if(!empty($where)){

            $this->db->where($where);

        }

        

        if($orderby!="" && $type!="")

        {

            $this->db->order_by($orderby,$type);

        }

        if($limit!="" && $start!="")

        {

            $this->db->limit($limit,$start);

        }

        else if($limit!="")

        {

             $this->db->limit($limit);

        }

        $query = $this->db->get();

        if($query->num_rows() > 0) 

        {

            return $query->result();

        } 

        else 

        {

            return array();

        }

    }



   function insert_batchdata($table,$data){

        $str = $this->db->insert_batch($table, $data);

        if(!empty($str)){

            return true;

        }else{

            return false;

        }

    }



    public function record_count_cont($table,$where='') 

  {

    return $this->db->count_all($table);

  }



  public function pagination_record($table,$start,$limit='',$where='',$order="")

    {

    if($where!='') {

    $this->db->where($where); 

    } 

       $this->db->order_by($order);

       $query = $this->db->get($table,$start,$limit);

       if ($query->num_rows() > 0) 

       {

        return $query->result_array();

       } 

       else 

       {

           return array();

       }

   }



   function filterdata($table,$where,$order,$type)

    {

        $this->db->select('*');

        $this->db->from($table);

        $this->db->where($where);

        $this->db->order_by($order,$type);

        $query = $this->db->get();

        if ($query->num_rows() > 0) 

        {

            return $query->result_array();

        } 

        else 

        {

            return array();

        }

    }

    function getfilterdata($table,$where,$order,$type)

    {

        $this->db->select('*');

        $this->db->from($table);

        $this->db->where($where);

        $this->db->order_by($order,$type);

        $query = $this->db->get();

       // echo $this->db->last_query();die();

        return $query->result_array();

    }

    public function get_all_whereGroupBy($table,$where,$condiction)
    {
        $this->db->where($where);
        $this->db->group_by($condiction);
        $query=$this->db->get($table);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        } 
    }

     public function get_all_where_category($table,$where,$condiction)
    {
        $this->db->where($where);
        $this->db->where($condiction);
        $query=$this->db->get($table);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        } 
    }    

    public function get_all_where_orderby($table,$where,$col,$order)
    {
        $this->db->where($where);
        $this->db->order_by($col,$order);
        $query=$this->db->get($table);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
            //return array();
        } 
    }
    
    public function get_all_where($table,$where)
    {
        $this->db->where($where);
        $query=$this->db->get($table);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
            //return array();
        } 
    }
    
    public function get_all_wherebk($table,$where)
    {
        $this->db->where($where);
        $query=$this->db->get($table);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            //return false;
            return array();
        } 
    }
    
    public function get_all_details($table,$where)
    {
        //$query="SELECT * FROM $table WHERE $where";
        
        $this->db->where($where);
        $query=$this->db->get($table);
        
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
            //return array();
        } 
    }
    
    public function all_where($table,$where)
    {
        $this->db->where($where);
        $query=$this->db->get($table);
        if($query->num_rows()>0)
        {
            return true;
            //return $query->result_array();
        }
        else
        {
            return false;
            //return array();
        } 
    }

    public function get_all_whereaffectedRow($table,$where)
    {
        $this->db->where($where);
        $query=$this->db->get($table);
        if($query->num_rows()>0)
        {
            return $this->db->affected_rows();
            //return $query;
        }
        else
        {
            return 0;
        } 
    }


    public function checklogin($tablename,$where)
    {
        $this->db->where($where);
        $this->db->from($tablename);            
        $query = $this->db->get();
      
      if($query->num_rows() == 1)
      {
        //return $query->row_array();
        //return $query->result();
        return 1;
      }
      else
      {
        return 0;
      }
    }

     public function get_all_where_time($table,$where,$col)
    {
        $this->db->select_max('end_time');
        $this->db->where($where);
        $query=$this->db->get($table);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        } 
    }

    public function getJoinDataTwoTable($seldata,$table1='',$table2='',$join_condition1='',$wh='',$where='')
    {
        $this->db->select($seldata);
        $this->db->from($table1);
        $this->db->join($table2,$join_condition1,'left');
        //if(!empty($wh))
        $this->db->where($wh);
        $this->db->or_where($where);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getJoinDataTwoTables($seldata,$table1='',$table2='',$join_condition1='',$where='',$limit,$start)
    {
        $this->db->select($seldata);
        $this->db->from($table1);
        $this->db->join($table2,$join_condition1,'left');
        //if(!empty($wh))
        //$this->db->where($wh);
        $this->db->limit($limit, $start);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function filters($a_day,$m_day,$pincode,$cars)
    {
        $q = "SELECT `instructor_postcode`.`postcode` as `instr_postcode`,`instructor_details`.`id` as `instructor_id`, `instructor_details`.`profile_photo` as `instructor_profile_photo`, `instructor_details`.`name` as `instructor_name`, `instructor_details`.`category` as `instructor_category`, `instructor_charges`.`$a_day` as `instructor_$a_day`, `instructor_charges`.`$m_day` as `instructor_$m_day` FROM `instructor_details` JOIN `instructor_charges` ON `instructor_charges`.`inst_id` = `instructor_details`.`id` JOIN `instructor_postcode` ON `instructor_postcode`.`inst_id` = `instructor_details`.`id` WHERE '.$pincode.' AND `instructor_details`.`active_status` = 1 AND ($cars OR `instructor_details`.`category` = 3)";
        $query = $this->db->query($q);
        return $query->result();
    }
    
    public function filters2($a_day,$m_day,$pincode,$cars)
    {
        $query = $this->db->query("SELECT `instructor_postcode`.`postcode` as `instr_postcode`,`instructor_details`.`id` as `instructor_id`, `instructor_details`.`profile_photo` as `instructor_profile_photo`, `instructor_details`.`name` as `instructor_name`, `instructor_details`.`category` as `instructor_category`, `instructor_charges`.`".$a_day."` as `instructor_".$a_day."`, `instructor_charges`.`".$m_day."` as `instructor_".$m_day."`FROM `instructor_details` LEFT JOIN `instructor_charges` ON `instructor_charges`.`inst_id` = `instructor_details`.`id` LEFT JOIN `instructor_postcode` ON `instructor_postcode`.`inst_id` = `instructor_details`.`id` WHERE ".$pincode." AND `instructor_details`.`active_status` = 1 AND (".$cars." OR `instructor_details`.`category` = 3)");
        return $query->result();
    }
    
    public function filters1($a_day,$m_day,$pincode,$cars)
    {
        $query = $this->db->query("SELECT `instructor_details`.`id` as `instructor_id`, `instructor_details`.`profile_photo` as `instructor_profile_photo`, `instructor_details`.`name` as `instructor_name`, `instructor_details`.`category` as `instructor_category`, `instructor_charges`.`".$a_day."` as `instructor_".$a_day."`, `instructor_charges`.`".$m_day."` as `instructor_".$m_day."` FROM `instructor_details` LEFT JOIN `instructor_charges` ON `instructor_charges`.`inst_id` = `instructor_details`.`id` WHERE ".$pincode." AND `instructor_details`.`active_status` = 1 AND (".$cars." OR `instructor_details`.`category` = 3)");
        return $query->result();
    }

    public function bookfilters($a_day,$m_day,$pincode,$cars)
    {
        $query = $this->db->query("SELECT `instructor_details`.`id` as `instructor_id`, `instructor_details`.`profile_photo` as `instructor_profile_photo`, `instructor_details`.`name` as `instructor_name`, `instructor_details`.`category` as `instructor_category`, `instructor_charges`.`".$a_day."` as `instructor_".$a_day."`, `instructor_charges`.`".$m_day."` as `instructor_".$a_day."` FROM `instructor_details` LEFT JOIN `instructor_charges` ON `instructor_charges`.`inst_id` = `instructor_details`.`id` WHERE `instructor_details`.`post_code` = '".$pincode."' AND `instructor_details`.`active_status` = 1 AND (`instructor_details`.`category` = '".$cars."' OR `instructor_details`.`category` = 3)");
        return $query->result();
    }


public function getJoinDataThreeTable($seldata,$table1='',$table2='',$table3='',$join_condition1='',$join_condition2='',$wh='')
{
    $this->db->select($seldata);
    $this->db->from($table1);

    $this->db->join($table2,$join_condition1,'left');
    $this->db->join($table3,$join_condition2,'left');
    if(!empty($wh))
    $this->db->where($wh);

    $query = $this->db->get();

    return $query->result();

}

public function getJoinDataThreeTablefilter($seldata,$table1='',$table2='',$table3='',$join_condition1='',$join_condition2='',$wh='')
{
    $this->db->select($seldata);
    $this->db->from($table1);
    $this->db->join($table2,$join_condition1,'left');
    $this->db->join($table3,$join_condition2,'left');
	if(!empty($wh))
    $this->db->where($wh);
    $query = $this->db->get();
    return $query->result();
}

 function resDataOrwhere($table,$staff_id,$day,$start_date,$end_date)
    {
        $sql = "SELECT * FROM `$table` WHERE ((`inst_id`='$staff_id' AND `day`='$day' AND (( (`start_time` < '$start_date' AND `end_time` > '$start_date') OR (`start_time` < '$end_date' AND `end_time` > '$end_date')) OR (( `start_time` BETWEEN '$start_date' AND '$end_date') OR ( `end_time` BETWEEN '$start_date' AND '$end_date')) OR (`start_time`='$start_date' AND `end_time`='$end_date'))))";
        
        //SELECT * FROM `instructor_time_slots` WHERE ((`inst_id`='12' AND `day`='Sunday' AND (( (`start_time` < '1:00' AND `end_time` > '1:00') OR (`start_time` < '03:00' AND `end_time` > '03:00')) OR (( `start_time` BETWEEN '1:00' AND '03:00') OR ( `end_time` BETWEEN '1:00' AND '03:00')) OR (`start_time`='1:00' AND `end_time`='03:00'))))

        
        $record=$this->db->query($sql); 
        return $record->result();
    }
    
    function resDataOrwherecheckstatus($table,$staff_id,$day,$start_date,$end_date)
    {
        $sql = "SELECT * FROM `$table` WHERE ((`inst_id`='$staff_id' AND `day`='$day' AND (( (`start_time` < '$start_date' AND `end_time` > '$start_date') OR (`start_time` < '$end_date' AND `end_time` > '$end_date')) OR (( `start_time` BETWEEN '$start_date' AND '$end_date') OR ( `end_time` BETWEEN '$start_date' AND '$end_date')) OR (`start_time`='$start_date' AND `end_time`='$end_date'))))";
        
        //SELECT * FROM `instructor_time_slots` WHERE ((`inst_id`='12' AND `day`='Sunday' AND (( (`start_time` < '1:00' AND `end_time` > '1:00') OR (`start_time` < '03:00' AND `end_time` > '03:00')) OR (( `start_time` BETWEEN '1:00' AND '03:00') OR ( `end_time` BETWEEN '1:00' AND '03:00')) OR (`start_time`='1:00' AND `end_time`='03:00'))))

        
        $record=$this->db->query($sql); 
        return $record->result();
    }
    
    function holidaycheckstatus($table,$inst_id,$start_date,$end_date)
    {
        $sql = "SELECT * FROM `$table` WHERE ((`inst_id`='$inst_id' AND (( (`start_date` < '$start_date' AND `end_date` > '$start_date') OR (`start_date` < '$end_date' AND `end_date` > '$end_date')) OR (( `start_date` BETWEEN '$start_date' AND '$end_date') OR ( `end_date` BETWEEN '$start_date' AND '$end_date')) OR (`start_date`='$start_date' AND `end_date`='$end_date'))))";
        $record=$this->db->query($sql); 
        return $record->result();
    }
    
    function resDataOrwherecheckstatus1($table,$day,$start_date,$end_date)
    {
        $sql = "SELECT * FROM `$table` WHERE ((`day`='$day' AND (( (`start_time` < '$start_date' AND `end_time` > '$start_date') OR (`start_time` < '$end_date' AND `end_time` > '$end_date')) OR (( `start_time` BETWEEN '$start_date' AND '$end_date') OR ( `end_time` BETWEEN '$start_date' AND '$end_date')) OR (`start_time`='$start_date' AND `end_time`='$end_date'))))";
        
        //SELECT * FROM `instructor_time_slots` WHERE ((`inst_id`='12' AND `day`='Sunday' AND (( (`start_time` < '1:00' AND `end_time` > '1:00') OR (`start_time` < '03:00' AND `end_time` > '03:00')) OR (( `start_time` BETWEEN '1:00' AND '03:00') OR ( `end_time` BETWEEN '1:00' AND '03:00')) OR (`start_time`='1:00' AND `end_time`='03:00'))))

        
        $record=$this->db->query($sql); 
        return $record->result();
    }
    
    function resDataOrwhereByshiftId($table,$id,$inst_id,$days,$start_date,$end_date)
    {
        
        $sql = "SELECT * FROM `$table` WHERE ((`id`!='$id' AND `inst_id`='$inst_id' AND `day`='$days' AND (( (`start_time` < '$start_date' AND `end_time` > '$start_date') OR (`start_time` < '$end_date' AND `end_time` > '$end_date')) OR (( `start_time` BETWEEN '$start_date' AND '$end_date') OR ( `end_time` BETWEEN '$start_date' AND '$end_date')) OR (`start_time`='$start_date' AND `end_time`='$end_date'))))";
        $record=$this->db->query($sql); 
        $a = $record->num_rows(); 
        if(empty($a))
        {
            $sqlresult = "UPDATE `$table` SET `start_time`='$start_date',`end_time`='$end_date' WHERE (`id`='$id' AND `inst_id`='$inst_id' AND `day`='$days')";       
            $result=$this->db->query($sqlresult); 
            return $result;
        }    
        else{
            return false;
        }
    }
    
    public function filters_get_count($a_day,$m_day,$pincode,$cars)
    {
        $query = $this->db->query("SELECT `instructor_details`.`id` as `instructor_id`, `instructor_details`.`profile_photo` as `instructor_profile_photo`, `instructor_details`.`name` as `instructor_name`, `instructor_details`.`category` as `instructor_category`, `instructor_charges`.`".$a_day."` as `instructor_".$a_day."`, `instructor_charges`.`".$m_day."` as `instructor_".$m_day."` FROM `instructor_details` LEFT JOIN `instructor_charges` ON `instructor_charges`.`inst_id` = `instructor_details`.`id` WHERE ".$pincode." AND `instructor_details`.`active_status` = 1 AND (".$cars." OR `instructor_details`.`category` = 3)");
        return $query->num_rows();
    }
    
    public function filters_get_data_limits($a_day,$m_day,$pincode,$cars,$limit, $start) 
	{
        $query = $this->db->query("SELECT `instructor_details`.`id` as `instructor_id`, `instructor_details`.`profile_photo` as `instructor_profile_photo`, `instructor_details`.`name` as `instructor_name`, `instructor_details`.`category` as `instructor_category`, `instructor_charges`.`".$a_day."` as `instructor_".$a_day."`, `instructor_charges`.`".$m_day."` as `instructor_".$m_day."` FROM `instructor_details` LEFT JOIN `instructor_charges` ON `instructor_charges`.`inst_id` = `instructor_details`.`id` WHERE ".$pincode." AND `instructor_details`.`active_status` = 1 AND (".$cars." OR `instructor_details`.`category` = 3) Orders LIMIT '.$limit.' OFFSET '.$start.' ")->get()->result();
        return $query->result();
    }
    
    public function get_count($table,$where) 
	{
	    $this->db->where($where);
        return $this->db->count_all($table);
    }
    
    public function get_rowcount($table,$where) 
	{
	    $query = $this->db->where($where)
                          ->get($table);
        return $query->num_rows();                  
    }

    public function get_data_limits($table,$where,$limit, $start) 
	{
        $this->db->limit($limit, $start);
        $this->db->where($where);
        $query = $this->db->get($table);
        $this->db->order_by('id', "DESC");
        //return $query->result();
        return $query->result_array();
    }

}
/* End of file generalmodel.php */
?>