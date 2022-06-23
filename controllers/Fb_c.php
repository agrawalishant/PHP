<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Fb_c extends CI_Controller { 
    function __construct() { 
        parent::__construct(); 
         
        // Load facebook oauth library 
        $this->load->library('facebook'); 
         
        // Load user model 
        $this->load->model('Fb_m'); 
    } 
     
    public function index(){ 
        $userData = array(); 
       
        // Authenticate user with facebook 
        if($this->facebook->is_authenticated()){ 
            // Get user info from facebook 
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
           // $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
            // Preparing data for database insertion 
            $userData['oauth_provider'] = 'facebook'; 
            $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
            $userData['user_first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
            $userData['user_last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
            $userData['user_email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
            $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
            $userData['user_image']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
            $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
            
            $userData = array(
                    'user_sms_verified'=>1,
                    'user_approval_status'=>1,
                    'registerby'=>"facebook",
                    'user_timestamp'=> date("Y-m-d H:i:s"),
                    'oauth_uid' => $fbUser['id'],
                    'user_first_name' =>$fbUser['first_name'],
                    'user_last_name' =>$fbUser['last_name'],
                    'user_email' =>$fbUser['email']
                    //'oauth_provider'=>"facebook",
                    //'oauth_uid' => $data['id'],
                   // 'user_first_name'  => $data['given_name'],
                   // 'user_last_name'   => $data['family_name'],
                   // 'user_email'  => $data['email'],
                   // 'user_image' => $data['picture'],
                   
                   ); 
             
            // Insert or update user data to the database 
            $userID = $this->Fb_m->checkUser($userData); 
             
            // Check user data insert or update status 
            if(!empty($userID)){ 
                $data['userData'] = $userData; 
                 
                // Store the user profile info into session 
                $this->session->set_userdata('userData', $userData); 
            }else{ 
               $data['userData'] = array(); 
            } 
             
            // Facebook logout URL 
            //$data['logoutURL'] = $this->facebook->logout_url(); 
        }else{ 
            // Facebook authentication url 
            $data['authURL'] =  $this->facebook->login_url(); 
        } 
         
        // Load login/profile view 
        $this->load->view('fb_v',$data); 
    } 
 
    public function logout() { 
        // Remove local Facebook session 
        $this->facebook->destroy_session(); 
        // Remove user data from session 
        $this->session->unset_userdata('userData'); 
        // Redirect to login page 
        redirect('Fb_c'); 
    } 
}