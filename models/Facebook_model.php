<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook_model extends CI_Model {
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
            
            //print_r($prevCheck);exit;
            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();
                $id = $prevResult['user_id'];                
                //update user data
                $userData['user_timestamp'] = date("Y-m-d H:i:s");
                $update = $this->db->update($this->tableName, $userData, array('user_id '=>$id));
                
                //get user ID
                //$userID = $prevResult['id'];
                $userID = $id;
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
                 $this->session->set_userdata('user_id',$user_id);
                 $this->session->set_userdata('user_email',$user_email);
                 $this->session->set_userdata('user_first_name',$nameuser);
                
                $this->session->userdata('user_id');
                $this->session->userdata('user_email');
                $this->session->userdata('user_first_name');
                
               // type is use for folder functionality
                  $this->session->set_userdata('user_folder_name', $folder);
                  $this->session->userdata('user_folder_name');
                  $this->session->set_flashdata('success', 'Welcome ' .  $user_first_name );
                
                redirect('userdashboard','refresh');
                
                //----
               
                // viraj session end *****************************************************
            }else{
                //insert user data
                $userData['user_timestamp']  = date("Y-m-d H:i:s");
                
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
                   $this->session->set_userdata('user_first_name', $nameuser);
                
                   $this->session->userdata('user_id');
                   $this->session->set_userdata('user_email');
                   $this->session->userdata('user_first_name');
                 // type is use for folder functionality
                    $this->session->set_userdata('user_folder_name', $folder);
                    $this->session->userdata('user_folder_name');
                    $this->session->set_flashdata('success', 'Welcome ' .  $user_first_name );
                    
                    $wdt['user_id'] = $userID;            
                    $walletinsert = $this->Generalmodel->add('wallet',$wdt);  
                  //----
                 redirect('User_controller/face','refresh');
                  // viraj session end *****************************************************
            }
        }
        
        //return user ID
        return $userID?$userID:FALSE;
    }
}