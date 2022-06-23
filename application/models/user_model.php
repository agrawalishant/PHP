<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function regDataSave($table,$data){
    	$result = $this->db->insert($table,$data);
    	return $result;
    }

    public function getDatas($table){
        $query = $this->db->get($table);
        return $row = $query->result();
    }

    public function getWhereData($table,$where){
        $query = $this->db->where('id',$where)->get($table);
        return $row = $query->result();
    }    


    public function delete($table,$id){
        $query = $this->db->where('id',$id)->delete($table);
        return true;
    }

    public function update($table,$where,$data){
        $query = $this->db->where('id',$where)
                            ->set($data)
                            ->update($table);
        return true;    
    }
}
?>    