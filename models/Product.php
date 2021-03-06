<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Product extends CI_Model{ 
     
    function __construct() { 
        $this->proTable   = 'products'; 
    } 
     
    /* 
     * Fetch products data from the database 
     * @param id returns a single record if specified, otherwise all records 
     */ 
    public function getRows($id = ''){ 
        $this->db->select('*'); 
        $this->db->from($this->proTable); 
        $this->db->where('status', '1'); 
        if($id){ 
            $this->db->where('id', $id); 
            $query = $this->db->get(); 
            $result = $query->row_array(); 
        }else{ 
            $this->db->order_by('name', 'asc'); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        } 
         
        // return fetched data 
        return !empty($result)?$result:false; 
    } 
    
     public function getPayment($conditions = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->transTable); 
         
        if(!empty($conditions)){ 
            foreach($conditions as $key=>$val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        $result = $this->db->get(); 
        return ($result->num_rows() > 0)?$result->row_array():false; 
    } 
     
    /* 
     * Insert payment data in the database 
     * @param data array 
     */ 
    public function insertTransaction($data){ 
        $insert = $this->db->insert('payment',$data); 
        return $insert?true:false; 
    } 

    public function updateTransaction($data,$where){ 
        $insert = $this->db->update('payment',$data,$where); 
        return $insert?true:false; 
    }
       
}
?>