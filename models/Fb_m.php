<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fb_m extends CI_Model {
    function __construct() {
        $this->tableName = 'user';
        $this->primaryKey = 'user_id';
    }
    
    /*
     * Insert / Update facebook profile data into the database
     * @param array the data for inserting into the table
     */
    public function checkUser($userData = array()){
        if(!empty($userData)){ 
            //check whether user data already exists in database with same oauth info
            $this->db->select($this->primaryKey);
            $this->db->from($this->tableName);
            $this->db->where(array('oauth_provider'=>'facebook', 'oauth_uid'=>$userData['oauth_uid']));
            $prevQuery = $this->db->get();
            $prevCheck = $prevQuery->num_rows();
            
            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();
                
                //update user data
                $userData['modified'] = date("Y-m-d H:i:s");
                $update = $this->db->update($this->tableName, $userData, array('id' => $prevResult['id']));
                
                //get user ID
                $userID = $prevResult['id'];
                // viraj session start*****************************************************
               
                    //---
                  $query = $this->db->where('user_id ', $userID)->get('user');
                  $nameuser = $query->row()->user_first_name;
                  $user_id = $query->row()->user_id;
                  $user_first_name = $query->row()->user_first_name;
                  $user_email = $query->row()->user_email;
                  $folder = $query->row()->folder_name;
              //   online status start
                  $dataonline['user_online_status']='1';
                  $online=$this->db->where('user_id',$user_id)
                                  ->update('user',$dataonline);
              //   online status start
                 $this->session->set_userdata('user_id', $user_id);
                 $this->session->set_userdata('user_email', $user_email);
                 $this->session->set_userdata('user_first_name', $user_first_name);
              
               // type is use for folder functionality
                  $this->session->set_userdata('user_folder_name', $folder);
                  $this->session->set_flashdata('success', 'Welcome ' .  $user_first_name );
              
                
                //----
               
                // viraj session end *****************************************************
            }else{
                //insert user data
                $userData['created']  = date("Y-m-d H:i:s");
                $userData['modified'] = date("Y-m-d H:i:s");
                
                $insert = $this->db->insert($this->tableName, $userData);
                
                //get user ID
                $userID = $this->db->insert_id();
                // viraj session start*****************************************************
               
                    //---
                    $query = $this->db->where('user_id ', $userID)->get('user');
                    $nameuser = $query->row()->user_first_name;
                    $user_id = $query->row()->user_id;
                    $user_first_name = $query->row()->user_first_name;
                    $user_email = $query->row()->user_email;
                    $folder = $query->row()->folder_name;
                //   online status start
                    $dataonline['user_online_status']='1';
                    $online=$this->db->where('user_id',$user_id)
                                    ->update('user',$dataonline);
                //   online status start
                   $this->session->set_userdata('user_id', $user_id);
                   $this->session->set_userdata('user_email', $user_email);
                   $this->session->set_userdata('user_first_name', $user_first_name);
                
                 // type is use for folder functionality
                    $this->session->set_userdata('user_folder_name', $folder);
                    $this->session->set_flashdata('success', 'Welcome ' .  $user_first_name );
                
                  
                  //----
                 
                  // viraj session end *****************************************************
            }
        }
        
        //return user ID
        return $userID?$userID:FALSE;
    }
}