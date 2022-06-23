<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Astro_model extends CI_Model
{
 public function __construct()
    {
      parent::__construct();
    }

 public function get_table($data,$table)

    {

       $this -> db -> select($data);
        $query = $this -> db -> get($table);
        return $query->result_array();
 
	}
	 public function get_table_condition($data,$table,$condition)

    {

       $this -> db -> select($data);
	    $this->db->from($table);
		    $this->db->where($condition);

        $query = $this -> db -> get();
        return $query->result_array();
		
		
 
	}
	
	 public function get_table_condition_limit($data,$table,$condition,$limit,$offset)

    {

       $this -> db -> select($data);
	    $this->db->from($table);
		if($condition) {
		    $this->db->where($condition);
		}
	   $this->db->limit($limit, $offset);
        $query = $this -> db -> get();
        return $query->result_array();
		
		
 
	}
public function get_table_condition_in($data,$table,$condition,$ids)

    {

       $this -> db -> select($data);
	    $this->db->from($table);
		    $this->db->where($condition);
			$this->db->where_in('astro_id', $ids);
		

        $query = $this -> db -> get();
		// echo $this->db->last_query();
        return $query->result_array();
		
		
 
	}


    public function get_table_condition_in_limit($data,$table,$condition,$ids,$limit,$offset)

    {

       $this -> db -> select($data);
	    $this->db->from($table);
		   $this->db->where($condition);
			$this->db->where_in('astro_id', $ids);
			$this->db->limit($limit, $offset);
	         
        $query = $this -> db -> get();
	//	echo $this->db->last_query();
        return $query->result_array();
		
		
 
	}
// 	ranking start
 public function get_table_condition_limit_ranking($data,$table,$condition,$limit,$offset)

    {

       $this -> db -> select($data);
	    $this->db->from($table);
		if($condition) {
		    $this->db->where($condition);
		}
	   $this->db->limit($limit, $offset);
	       $this->db->where('astro_approved_status',1);
            $this->db->order_by('astro_ranking','ASC');
        $query = $this -> db -> get();
        return $query->result_array();
		
		
 
	}
public function get_table_condition_in_ranking($data,$table,$condition,$ids)

    {

       $this -> db -> select($data);
	    $this->db->from($table);
		    $this->db->where($condition);
		     $this->db->where('astro_approved_status',1);
            $this->db->order_by('astro_ranking','ASC');
			$this->db->where_in('astro_id', $ids);
		

        $query = $this -> db -> get();
		// echo $this->db->last_query();
        return $query->result_array();
		
		
 
	}
	 public function get_table_condition_ranking($data,$table,$condition)

    {

       $this -> db -> select($data);
	    $this->db->from($table);
		    $this->db->where($condition);
		    $this->db->where('astro_approved_status',1);
            $this->db->order_by('astro_ranking','ASC');
        $query = $this -> db -> get();
        return $query->result_array();
		
		
 
	}
	// 	$query=$this->db->where('astro_approved_status',1)
//                     ->limit($limit,$offset)
//                     ->order_by('astro_ranking','ASC')
//                      ->get('astrologers');
//                      return $query->result_array();
  public function get_table_condition_in_limit_ranking($data,$table,$condition,$ids,$limit,$offset)

    {

       $this -> db -> select($data);
	    $this->db->from($table);
	    $this->db->where('astro_approved_status',1);
		   $this->db->where($condition);
			$this->db->where_in('astro_id', $ids);
			$this->db->limit($limit, $offset);
	          	$this->db->order_by('astro_ranking','ASC');
        $query = $this -> db -> get();
	//	echo $this->db->last_query();
        return $query->result_array();
		
		
 
	}
// ranking end

    public function getChatUser($table,$where="")
    {
       //$query = $this->db->query("SELECT sender_id,id FROM (SELECT sender_id, MAX(id) AS id FROM $table where $where GROUP BY sender_id DESC) as id ORDER BY id desc");
       
        $query = $this->db->query("SELECT `sender_id`,`id` FROM (SELECT `sender_id`, MAX(`id`) AS `id` FROM `chat_messsage` where `reciver_id`='34' GROUP BY `sender_id`) as id ORDER BY id desc");
        return $query->result_array();
    }
}

?>