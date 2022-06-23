<?php
 ob_start();
defined('BASEPATH') or exit('No direct script access allowed');
class Login_controller extends CI_Controller
{

    public function __construct()
    {  
        parent::__construct();
    
    }
  
    public function loadloginpage()
    {
      $this->load->view('backend/login');
    }
//*********************astrologer login use only***************************** */
//*********************astrologer login use only***************************** */
//*********************astrologer login use only***************************** */

public function check_login_astrologer()
{
    
  $this->form_validation->set_rules('astro_email', 'Email', 'required|valid_email');
  $this->form_validation->set_rules('astro_password', 'Password', 'required|min_length[5]|max_length[20]');
   
    if ($this->form_validation->run() == false) 
    {
          $this->session->set_flashdata('error','username or password are incorrect. Please try again ');
          redirect(base_url() . 'astrologer_login_page', 'refresh');
   //  $this->load->view('frontend/login');
    }
    else{
     
            $data['astro_email'] = $this->input->post('astro_email');
            $data['astro_password'] = sha1($this->input->post('astro_password'));
            $this->login_model->login_astrologer($data);
    } 
      redirect(base_url() . 'astrologer_login_page', 'refresh');
    // $this->load->view('frontend/login');
}
//-------------------------------- this is for user logout use only-------------------------------------------------------------
// --------------------------------this is for astrologer logout use only-------------------------------------------------------------
public function astrologer_logout()
{
     //   online status start
     $dataonline['astro_online_status']='0';
     $dataonline['astro_online_chat_status']='0';
     $dataonline['astro_online_call_status']='0';
     $online=$this->db->where('astro_id',$this->session->userdata('astro_id'))
                     ->update('astrologers',$dataonline);
 //   online status start
    // Destroy entire session data 
  //  $this->session->sess_destroy(); 
    //  this is for browser status start ----------------
$data=array('sc_logout_date'=>date('Y-m-d H:i:s'),'sc_login_status'=>0,'sc_lastping'=>date('Y-m-d H:i:s'));
$bcid=$this->session->userdata('browserinsertid');
$l=$this->Generalmodel->modify('statuscheck', 'sc_id', $bcid, $data);
    // this is for browser status end ----------------------
    $this->session->unset_userdata('astro_email');
    $this->session->unset_userdata('astro_id');
    $this->session->unset_userdata('astro_name');
    //$this->session->unset_userdata('astrologer_folder_name');
     redirect(base_url() . 'astrologer_login_page', 'refresh');
}
/****************************************************astrologer end*************************************************** */
/****************************************************astrologer end*************************************************** */
/****************************************************astrologer end*************************************************** */




// --------------------------------this is for astrologer logout use only-------------------------------------------------------------





//*********************user login use only***************************** */
//*********************user login use only***************************** */
//*********************user login use only***************************** */
// for login user==========================
public function check_login_user()
{
    
  $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');
  $this->form_validation->set_rules('user_password', 'Password', 'required|min_length[5]|max_length[20]');
   
 

    if ($this->form_validation->run() == false) 
    {
          $this->session->set_flashdata('error','username or password are incorrect. Please try again ');
          redirect(base_url() . 'front_page', 'refresh');
   //  $this->load->view('frontend/login');
    }
    else{
            $data['user_email'] = $this->input->post('user_email');
            $data['user_password'] = sha1($this->input->post('user_password'));
            $this->login_model->login_user($data);

            $ur = $this->input->post('uri');
            //$a = gettype($ur);
            //echo "aaa=".$ur;
            //exit;
            if(!empty($ur))
            {
              if($ur == 'cart')
              {
                redirect('astro_controller/cart');
              }
              else if(($ur != 'cart')&&($ur != 'all'))
              {
                redirect('astrotalk_profile/'.$ur);   
              }
              else
              {
                redirect(base_url() . 'userdashboard', 'refresh');
              }
            }  
    } 
     $userid = $this->session->userdata('user_id');
     $query = $this->db->get_where('user', array('user_id' => $userid))->row();
    // $dt = $query->row()->;
    $gender=$query->user_gender;
    $dob=$query->user_dob;
    $timeb=$query->user_timeofbirth;
    $placeofb=$query->user_placeofbirth;
    $state=$query->user_state;
    $country =$query->user_country;
    $mrts=$query->user_maritalstatus;
    $occ=$query->user_occupation;
    if(!empty($gender) && !empty($dob)&& !empty($timeb)&& !empty($placeofb) && !empty($state) && !empty($country) && !empty($mrts) && !empty($occ))
    {
      redirect(base_url() .'userdashboard', 'refresh');
    }
    else{
      redirect(base_url() .'detailsfill', 'refresh');
    }
    // redirect(base_url() .'userdashboard', 'refresh');
    // $this->load->view('frontend/login');
}

function detailsfill()
{
  $page_data['folder_name'] = 'pagesuser';
  $page_data['page_name'] = 'updatedetails';
  $page_data['page_title'] = 'updatedetails';
  $this->load->view('frontend/landing', $page_data);
}
//-------------------------------- this is for user logout use only-------------------------------------------------------------
// --------------------------------this is for user logout use only-------------------------------------------------------------
public function user_logout()
{
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
     redirect(base_url() . 'front_page', 'refresh');
}
/****************************************************user end*************************************************** */
/****************************************************user end*************************************************** */
/****************************************************user end*************************************************** */



//*********************admin login use only***************************** */
//*********************admin login use only***************************** */
//*********************admin login use only***************************** */
//-------------------------------- this is for admin login use only-------------------------------------------------------------
// --------------------------------this is for admin use only-------------------------------------------------------------
public function check_login_admin()
{
    
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run() == false) {
       
       // $this->load->view('backend/login');
      
         redirect(base_url() . 'login_page', 'refresh');
          // $this->session->set_flashdata('errormsg', 'Plz Check Detail ');
    } else {
        $data['email'] = $this->input->post('email');
        $data['password'] = sha1($this->input->post('password'));

        $this->login_model->login_admin($data);
    }
}
//-------------------------------- this is for admin logout use only-------------------------------------------------------------
// --------------------------------this is for admin logout use only-------------------------------------------------------------

public function admin_logout()
{
    $this->session->unset_userdata('adminemail');
    $this->session->unset_userdata('adminid');
    $this->session->unset_userdata('adminname');
    $this->session->unset_userdata('admintype');
    $this->session->unset_userdata('adminlevel');
    
     redirect(base_url() . 'login_page', 'refresh');
}
/****************************************************admin end*************************************************** */
/****************************************************admin end*************************************************** */
/****************************************************admin end*************************************************** */
public function logout()
{
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('id');
    $this->session->unset_userdata('name');
    $this->session->unset_userdata('type');
    $this->session->unset_userdata('access_token');
     redirect(base_url() . 'login_page', 'refresh');
   // $this->load->view('backend/login.php');
}

    // ******************************************check astrologer is on or off browser*****************************************************
  //  this is created to check astrologer is log in or logout
    public function browserloginUpdate()
{
  $this->session->set_flashdata('success', 'Browser check working ' );
    
  
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$time=$date->format('H:i:s');
$loggedastroid = $this->session->userdata('astro_id');
if(!empty($loggedastroid)){
$bcid = $this->session->userdata('browserinsertid');
$data=array('sc_lastping'=>date('Y-m-d H:i:s'));
$lastinsert=$this->generalmodel->modify('statuscheck', 'sc_id', $bcid, $data);//update('statuscheck',$data,array('id'=>$id));
echo json_encode(array('success'=>true));
}
}

public function browsertimeout()
{
$Time = date('Y-m-d H:i:s', strtotime('-15 min'));
//$loggeduserid = $this->session->userdata['indirasess']['loggeduserid'];
$loggedastroid = $this->session->userdata('astro_id');
$exist=$this->Generalmodel->get_data_by_condition('sc_id,sc_lastping','statuscheck',array('sc_lastping <'=>$Time,'sc_login_status'=>'1','sc_astro_id'=>$loggedastroid));

if(!empty($exist)){
foreach($exist as $result)
{
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$time=$date->format('H:i:s');
$bcid=$result['sc_id'];
$data=array('sc_logout_date'=>date('Y-m-d H:i:s'),'sc_login_status'=>0,'last_ping'=>date('Y-m-d H:i:s'));
$lastinsert=$this->Generalmodel->modify('statuscheck', 'sc_id', $bcid, $data);
$data2['astro_online_status']       =0;
$data2['astro_online_chat_status']  =0;
$data2['astro_chat_time']           =0;
$lastinsert=$this->Generalmodel->modify('astrologers', 'astro_id', $bcid, $data2);
                                // update('statuscheck',$data,array('sc_id'=>$id));
$this->session->sess_destroy();
}
echo json_encode(array('success'=>true));
}else{
echo json_encode(array('success'=>false));
}

}
    //******************************************check astrologer is on or off browser**************************************************** */
 

}
?>