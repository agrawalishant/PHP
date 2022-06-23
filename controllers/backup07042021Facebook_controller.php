<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Facebook_controller extends CI_Controller { 
    function __construct() { 
        parent::__construct(); 
         ob_start();
        // Load facebook oauth library 
        $this->load->library('facebook'); 
         
        // Load user model 
        $this->load->model('facebook_model'); 
    } 
     
    public function index(){ 
        $userData = array(); 
        
        // Authenticate user with facebook 
        if($this->facebook->is_authenticated()){ 
            // Get user info from facebook 
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
 
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
                    'oauth_provider' => 'facebook',
                    'user_first_name'  => $fbUser['first_name'],
                    'user_last_name'   => $fbUser['last_name'],
                    'user_email'  => $fbUser['email']
                    //'user_image' => $fbUser['picture']
                   );
                   
            // Insert or update user data to the database 
            $userID = $this->facebook_model->checkUser($userData); 
             // print_r($userID);exit;
            // Check user data insert or update status 
            if(!empty($userID))
            {      
                //echo 'if';exit;
                redirect('userdashboard','refresh');
                //redirect('User_controller/face','refresh');
                //$data['userData'] = $userData; 
                // Store the user profile info into session 
                //$this->session->set_userdata('userfacebook', $userData); 
                //redirect(base_url().'userdashboard','refresh');
                //$data['logoutURL'] = $this->facebook->logout_url(); 
                //$data['authURL'] =  $this->facebook->login_url();
            }else
            { 
                //$data['userData'] = array();
                redirect('front_page','refresh');
            } 
            // Facebook logout URL 
            $data['logoutURL'] = $this->facebook->logout_url(); 
        }else{ 
            // Facebook authentication url 
             $data['authURL'] =  $this->facebook->login_url();
           //$this->load->view('frontend/include/header',$data); 
            redirect($data['authURL']);
        } 
        // Load login/profile view 
      //  $this->load->view('user_authentication/index',$data); 
     redirect(base_url().'userdashboard','refresh');
    // redirect(base_url().'Facebook_controller/index','refresh');
    } 
 
    public function logout() 
    { 
        // Remove local Facebook session 
        $this->facebook->destroy_session(); 
        // Remove user data from session 
        $this->session->unset_userdata('userfacebook'); 
         //   online status start
        $dataonline['user_online_status']='0';
        $online=$this->db->where('user_id',$this->session->userdata('user_id'))
                    ->update('user',$dataonline);
        //   online status start
        // Destroy entire session data 
        //  $this->session->sess_destroy(); 
     
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_first_name');
        $this->session->unset_userdata('user_folder_name');
        // Redirect to login page 
        redirect('front_page'); 
    } 
}
?>