<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_controller extends CI_Controller {

 public function __construct()
 {
  parent::__construct();
  //$this->load->model('googlee_model');
 }

 function login()
 {
  include_once APPPATH . "libraries/vendor/autoload.php";

  $google_client = new Google_Client();

  $google_client->setClientId('436344221628-j06jsj4mtafhjb8vjpk8dr5ul5tp17jj.apps.googleusercontent.com'); //Define your ClientID

  $google_client->setClientSecret('_9oKPGjWmUfzFo_hgAbjJFXj'); //Define your Client Secret Key

//   $google_client->setRedirectUri('http://testpnp.ml/astro/google_controller/login'); //Define your Redirect Uri
   $google_client->setRedirectUri('https://www.astrovedvakta.com/google_controller/login'); //Define your Redirect Uri

  $google_client->addScope('email');

  $google_client->addScope('profile');

  if(isset($_GET["code"]))
  {
   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

   if(!isset($token["error"]))
   {
    $google_client->setAccessToken($token['access_token']);

    $this->session->set_userdata('access_token', $token['access_token']);

    $google_service = new Google_Service_Oauth2($google_client);

    $data = $google_service->userinfo->get();

    $current_datetime = date('Y-m-d H:i:s');
    // if($this->googlee_model->Is_already_register($data['id']))
// 19/04/2021
if($this->googlee_model->Is_already_register($data['email']))
// 19/04/2021
   
    {
     //update data
     $user_data = array(
      'oauth_uid' => $data['id'],
      'user_first_name' => $data['given_name'],
      'user_last_name'  => $data['family_name'],
      'user_email' => $data['email'],
      'user_image'=> $data['picture'],
      // 19/04/2021
      'oauth_provider'=>"google",
      'registerby'=>"google",
      // 19/04/2021
      'user_timestamp' => $current_datetime,
      
     );

    //  $this->googlee_model->Update_user_data($user_data, $data['id']);
    $this->googlee_model->Update_user_data($user_data, $data['email']);
     redirect(base_url().'userdashboard','refresh');
    }
    else
    {
     //insert data
     $user_data = array(
      'user_sms_verified'=>1,
      'user_approval_status'=>1,
      'user_approval_status'=>1,
      'oauth_provider'=>"google",
      'registerby'=>"google",
      'oauth_uid' => $data['id'],
      'user_first_name'  => $data['given_name'],
      'user_last_name'   => $data['family_name'],
      'user_email'  => $data['email'],
      'user_image' => $data['picture'],
      'user_timestamp'  => $current_datetime
     );

    //  $this->googlee_model->Insert_user_data($user_data);
    //  ********************************************************29/04/2021 start add kara he upper line comment ki he
     $d= $this->db->insert('user', $user_data);
  $last_id = $this->db->insert_id($d);
  $wdt['user_id']=$last_id;
  $walletinsert = $this->Generalmodel->add('wallet',$wdt);
   $this->session->set_userdata('user_data', $user_data);
    $this->session->userdata('user_data');
    //   online status start
               $this->session->set_userdata('user_id', $last_id);
               $this->session->set_userdata('user_email', $data['email']);
               $this->session->set_userdata('user_first_name', $data['given_name']);
            
             // type is use for folder functionality
                $this->session->set_userdata('user_folder_name', "pagesuser");
    
     redirect(base_url().'userdashboard','refresh');
    // ******************************************************** 29/04/2021 end 
     //$this->session->set_userdata('user_data', $user_data);    
     //$this->session->userdata('user_data');
    }
    $this->session->set_userdata('user_data', $user_data);
    $this->session->userdata('user_data');
    // ----********************************************************29/04/2021 start 
    redirect(base_url().'userdashboard','refresh');
    // -- ********************************************************29 /04/2021 end
   }
  }
  $login_button = '';
  if(!$this->session->userdata('access_token'))
  {
    $login_button = $google_client->createAuthUrl();
   //$login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'image/websiteimages/google.png" /></a>';
   $pagedata['login_button'] = $login_button;
   //$this->load->view('google_login', $data);
   $pagedata['folder_name'] = 'pages';
   $pagedata['page_name'] = 'index'; 
   $this->load->view('frontend/landing',$pagedata);
  }
  // else
  // {
      
  //   // $pagedata['folder_name'] = 'pages';
  //   // $pagedata['page_name'] = 'index'; 
  //   // $this->load->view('frontend/landing',$pagedata);
  // // $this->load->view('google_login', $data);
  // }
 }

 function logout()
 {
    $dataonline['user_online_status']='0';
    $online=$this->db->where('user_id',$this->session->userdata('user_id'))
                    ->update('user',$dataonline);
  $this->session->unset_userdata('access_token');
  $this->session->unset_userdata('user_data');
  $this->session->unset_userdata('user_email');
  $this->session->unset_userdata('user_id');
  $this->session->unset_userdata('user_first_name');
  $this->session->unset_userdata('user_folder_name');
   redirect(base_url() . 'front_page', 'refresh');
 }
 
}

?>