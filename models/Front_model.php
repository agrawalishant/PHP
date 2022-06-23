<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Front_model extends CI_Model

{
 public function __construct()

    {
      parent::__construct();
    }

    /*******************************C O M M O N   Q U E R Y   S T A R T ***************************************/
    public function fetchbyrow($databasename)
    {
       return $query=$this->db->get($databasename)->row();
    }
    public function fetchbyrow_where($databasename,$id)
    {
       return $query=$this->db->get_where($databasename,array('id' => $id))->row();
    }
    
    public function fetchbyrow_like($tablename,$condiction)
    {
       //return $query=$this->db->get_where($tablename,$condiction)->row();
       $query = $this->db->query("SELECT * FROM $tablename WHERE $condiction");
       return $query->row();
    }
    
    public function fetchbyresult($databasename)
    {
       return $query=$this->db->get($databasename)->result_array();
    }
    public function fetchbyresultorderby($databasename,$by,$ascdesc)
    {
       return $query= $this->db->order_by($by,$ascdesc)->get($databasename)->result_array();
    }

/*******************************C O M M O N   Q U E R Y   E N D  ***************************************/
    
/*******************************C O M M O N   Q U E R Y   S T A R T ***************************************/
public function common_add($tablename,$redirectto,$data)
{ 
    $this->db->insert($tablename,$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . $redirectto, 'refresh');
}
public function common_delete($tablename,$dbtableid,$par2db_id,$redirectto)
{ 
    $this->db->where($dbtableid,$par2db_id)
             ->delete($tablename);
           
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . $redirectto , 'refresh');
}
public function common_update($tablename,$databaseid,$par2db_id,$redirectto,$data)
{ 
   $this->db->where($databaseid,$par2db_id)
             ->update($tablename,$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . $redirectto , 'refresh');
}
/*******************************C O M M O N   Q U E R Y   E N D  ***************************************/
    public function enquierysubmit($data)
    {
    $result = $this->db->insert('enquiry', $data);
     
     $this->session->set_flashdata('success', 'Form Submitted Sucessfully');
     
       redirect(base_url() . 'contact', 'refresh');
     }
    public function freekundalienquierysubmit($data)
    {
        $result = $this->db->insert('enquiry_freekundali', $data);
        $this->session->set_flashdata('success', 'Form Submitted Sucessfully');
        //redirect(base_url() . 'front_page', 'refresh');
        return $this->db->insert_id();
    }

 //end ==========================
}
?>