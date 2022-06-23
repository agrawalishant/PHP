<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_controller extends CI_Controller

{
  public function __construct()

    {
        parent::__construct();
       ob_start();
        $this->load->model('User_model','user_model');
        $this->load->library('form_validation');
        $this->load->helper('sms_helper');
    }

//---------------------------------------------------------
 public function user_forgetpassword()
 {
    
    $this->form_validation->set_rules('emailphoneno', 'EMAIL/PASSWORD REQUIRED', 'required');
    if($this->form_validation->run()==TRUE)
    {
        $page_data['emailphoneno']=$this->input->post('emailphoneno');
        $this->user_model->forgetpassword($page_data);
    }
    $this->session->set_flashdata('ERROR', 'EMAIL REQUIRED');
    redirect(base_url() . 'front_page', 'refresh');
 }
 public function user_register()
   {
                $page_data['user_first_name']=$this->input->post('user_first_name');
                 $userfirstname=$this->input->post('user_first_name');
                $page_data['user_last_name']=$this->input->post('user_last_name');
                $page_data['user_email']=$this->input->post('user_email');
                $page_data['user_mobile']=$this->input->post('user_mobile');
                $mobile= $this->input->post('user_mobile');
                $page_data['user_password']=SHA1($this->input->post('user_password'));
               // $this->user_model->register_data($page_data);
                $res = $this->Generalmodel->add('user',$page_data);
                $last_id = $this->db->insert_id();
                $wdt['user_id']=$last_id;
                $walletinsert = $this->Generalmodel->add('wallet',$wdt);
                $this->session->set_userdata('usid',$last_id);
                if(!empty($res))
                {
                    $this->session->set_flashdata('error', 'Please Verify Your Mobile');
                    $digits_needed=6;
                    $otp=''; // set up a blank string
                    $count=0;
                    while ($count < $digits_needed) 
                    {
                        $random_digit = mt_rand(0,9);
                        $otp .= $random_digit;
                        $count++;
                    }
                     $otps="Dear ".$userfirstname. ", "."Your Mobile Verification code is ".$otp ."Thank You Astroved Vakta.";
                    
                    $this->session->set_userdata('otp',$otp);
                    send_sms_new($mobile,$otps);
                }
                //redirect('astrologer_registration');
                
                $pagedata['folder_name'] = 'pages';
                $pagedata['page_name'] = 'otp_user_check'; 
                $this->load->view('frontend/landing',$pagedata);
                // $this->user_model->register_data($page_data);
     
      //  redirect(base_url().'front_page');
    }
	public function checkotp()
	{
		$opt = $this->session->userdata('otp');
		$typeopt = $this->input->post('otps');
		if($opt==$typeopt)
		{	
			$ddid = $this->session->userdata('usid'); 
			updateData('user',array('user_sms_verified'=>1),array('user_id'=>$ddid));
			$this->session->set_flashdata('success','Mobile Verified Successfully');
            redirect('front_page');
            // $pagedata['folder_name'] = 'pages';
            // $pagedata['page_name'] = 'detaildata_afterotp'; 
            // $this->load->view('frontend/landing',$pagedata);
		}
		else
		{
			$this->session->set_flashdata('error','OTP is not matched');	
            //redirect('front_page');
            $pagedata['folder_name'] = 'pages';
            $pagedata['page_name'] = 'otp_user_check'; 
            $this->load->view('frontend/landing',$pagedata);		
		}
	}



//    public function user_register()
//    {
//                 $page_data['user_first_name']=$this->input->post('user_first_name');
//                 $page_data['user_last_name']=$this->input->post('user_last_name');
//                 $page_data['user_email']=$this->input->post('user_email');
//                 $page_data['user_password']=SHA1($this->input->post('user_password'));
               
//                  $this->user_model->register_data($page_data);
     
//         redirect(base_url().'front_page');
//     }
      
public function commentrateastrologer()
{
    $data['cr_user_id']=$this->input->post('cr_user_id');
    $data['cr_astro_id']=$this->input->post('cr_astro_id');
    $data['cr_comment']=$this->input->post('cr_comment');
    $data['cr_rating']=$this->input->post('cr_rating');
    $cmrtastro = insertdata('comment_rating_astrologer',$data);

    redirect(base_url().'userdashboard','refresh');  
}

    public function dashboard($par1 = null, $par2 = null,$par3 = null,$pagenum='')
    {
      

        if($par1 == 'updateprofile')
        {
            $data['user_first_name']=$this->input->post('user_first_name');
            $data['user_mobile']=$this->input->post('user_mobile');
            $data['user_email']=$this->input->post('user_email');
            $data['user_gender']=$this->input->post('user_gender');
            $data['user_mobile']=$this->input->post('user_mobile');
            $data['user_dob']=$this->input->post('user_dob');
            $data['user_timeofbirth']=$this->input->post('user_timeofbirth');
            $data['user_placeofbirth']=$this->input->post('user_placeofbirth');
            $data['user_state']=$this->input->post('user_state');
            $data['user_country']=$this->input->post('user_country');
            $data['user_maritalstatus']=$this->input->post('user_maritalstatus');
            $data['user_occupation']=$this->input->post('user_occupation');
           

            $this->user_model->update_user_profile_information($data,$par2);
        }
        if($par1 == 'updatepartdetail')
        {
            // $data['user_first_name']=$this->input->post('user_first_name');
            // $data['user_mobile']=$this->input->post('user_mobile');
            // $data['user_email']=$this->input->post('user_email');
            $data['user_gender']=$this->input->post('user_gender');
            $data['user_mobile']=$this->input->post('user_mobile');
            $data['user_dob']=$this->input->post('user_dob');
            $data['user_timeofbirth']=$this->input->post('user_timeofbirth');
            $data['user_placeofbirth']=$this->input->post('user_placeofbirth');
            $data['user_state']=$this->input->post('user_state');
            $data['user_country']=$this->input->post('user_country');
            $data['user_maritalstatus']=$this->input->post('user_maritalstatus');
            $data['user_occupation']=$this->input->post('user_occupation');
           

            $this->user_model->updatepartdetail($data,$par2);
        }
        if($par1 == 'updatepassword')
        {
           
            $this->form_validation->set_rules('oldpassword', 'old password', 'required');
            $this->form_validation->set_rules('newpassword', 'New password', 'required');
            $this->form_validation->set_rules('confpassword', 'Confirm password', 'required|matches[newpassword]');
            if($this->form_validation->run()==TRUE)
            {
                $old_pass=sha1($this->input->post('oldpassword'));
                $new_pass=sha1($this->input->post('newpassword'));
                $id=$this->session->userdata('user_id');
                $this->user_model->checkOldPass($old_pass,$new_pass,$id);
            }else{
                $this->session->set_flashdata('error', 'PLZ ENTER PASSWORD');   
            }
        }

// pagination start

	$offset = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
					
					
					 $this->load->library('pagination');
		
		
		
		$config['base_url'] =base_url().'userdashboard';
		$config['total_rows'] =  $this->user_model->totalUsers();
		$config['per_page'] = 6;
		$config['uri_segment'] = 2;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);






//$page = (!empty($this->uri->segment(2))) ? $this->uri->segment(2) : 0;
//echo $page;exit;
$query = $this->user_model->list2($config["per_page"], $offset);
// $pg = ($page==0 ? $page=0 : ((($page-1)*$config['per_page'])+1));
// if($pg>0)
// {
//     $query = $this->user_model->list2($page*$config['per_page'],$pg); 
// }
// else
// {
//     $page =1;
//     $query = $this->user_model->list2($pg,$page*$config['per_page']); 
// }
//echo $this->db->last_query();
  //   change 22/02/202 $res2
$page_data['res2'] =  $query;
//$offset = ($page == 0 ? 0 : ($page - 1) * $config["per_page"]);
        
   // pagination end*******************************
   
     $page_data['folder_name'] = 'pagesuser';
     $page_data['page_name'] = 'user_dashboard';
     $page_data['page_title'] = 'Dashboard';
     $this->load->view('frontend/landing', $page_data);
    }
   
// *************************************call start*************************************************//
public function call_data($par1 = null, $par2 = null,$par3 = null)
{
    //$this->session->set_flashdata('success','called');
    
 $callrate       = $this->input->post('callrate');
 $users_ids      = $this->input->post('users_ids');
 $astrol_ids     =$this->input->post('astrol_ids'); 
 $walletbalance  = $this->input->post('walletbalance');

 $usernu=fetchbyresultByCondiction('user',array('user_id'=>$users_ids));//fetchbyresult('user');
 $usernumber = $usernu[0]['user_mobile']; 
 $astronu=fetchbyresultByCondiction('astrologers',array('astro_id'=>$astrol_ids));//fetchbyresult('astrologers');
 //print_r($astronu);
 $astreologer_number=$astronu[0]['astro_mobile'];
 
 $totalmin=($walletbalance/$callrate);//intdiv($walletbalance,$callrate);
 $intmin = explode('.',$totalmin);
 if(!empty($intmin))
 {
     for($i=0;$i<count($intmin);$i++)
     {
         $take = $intmin[0];
     }
 }
  //echo $take;exit;
 $totalSecs   = ($take * 60) ; 
 //$totalSecs   = ($totalmin * 60) ; 
 $data = array('agent' => $astreologer_number, 'customer' => $usernumber, 'seconds' => $totalSecs);
 $data_string = json_encode($data); 
 echo $data_string;exit;
   calling($data_string);// call api call
// insert into call history then in return also update both data
  $datacall['uch_user_id']=$users_ids;
  $datacall['uch_astro_id']=$astrol_ids;
  $datacall['uch_astro_call_rate']=$callrate;
  $datacall['uch_status']=0;
  $datacall['uch_call_start_time']= date('Y-m-d H:i:s');
  $insertcallhistroy = insertdata('user_call_detail_history_user',$datacall);
  $last_callinsertid=$this->db->insert_id();
  $callingsession=$this->session->set_userdata('calling_lastinsertid',$last_callinsertid);
  $astroidcallingsession=$this->session->set_userdata('astroidcalling',$astrol_ids);
  $astrocallratecallingsession=$this->session->set_userdata('astrocallratecalling',$callrate);
 
//$this->updatecall_data();
}

public function updatecall_data()
{

    // called in upped controller plz delete  updatecall_data from upper controller
    $last_callinsertid  = $this->session->userdata('calling_lastinsertid');
    $astroid=        $this->session->userdata('astroidcalling');
    $callrate=   $this->session->userdata('astrocallratecalling');
    $userid=         $this->session->userdata('user_id');
    //seconds to minute
    // $minutes = floor($time / 60);
    $timeviaapi = 600;  // this time is in seconds
    $totalcalltime  = floor($timeviaapi / 60); //inseconds   api details
    $updateData['uch_totaltime'] = $totalcalltime;//second converted to min
    $updateData['uch_status'] = 1;
    $updateData['uch_call_end_time'] = date('Y-m-d H:i:s');
    $updatecallhistory=updateData('user_call_detail_history_user',$updateData,array('uch_id'=>$last_callinsertid));
    // payment and wallet start
        $randam = uniqid(8);
    // calculation
        $amt=($totalcalltime*$callrate);
        $results = fetchbyresultByCondiction('wallet',array('user_id'=>$userid));
    	$updateamt = $results[0]['wallet_amt'] - $amt;
    // wallet update user *****************
        updateData('wallet',array('wallet_amt'=>$updateamt),array('user_id'=>$userid));
    	$insertdata = [
    					'unique_id' => $randam,
    					'user_id' => $userid,
						'total_amt' => $amt,
						'payfor'=>'Calling Astrologer',
    					'payment_status' => 'Success',
    					'pay_by' => 'Wallet'
                    ];
        // payment balance update user *****************            
    	WalletaddData('payment',$insertdata);
    	//$this->session->set_flashdata('success','Successfully');
//    commission and amount add to admin and astrologer
$this->user_model->pay_to_astrologer_commission($userid,$astroid,$amt,'callingastrologer',$last_callinsertid); //par4=payfor 
    // ------- payment and wallet end
}
// *************************************call end*************************************************//
// *************************************chat start*************************************************//
public function chat_data()
{
    
    $chatrate       = $this->input->post('chatrate');
    $users_ids      = $this->input->post('users_ids');
    $astrol_ids     =$this->input->post('astrooid'); 
    $walletbalance  = $this->input->post('walletbalance');
    $usernu=fetchbyresultByCondiction('user',array('user_id'=>$users_ids));
    $usernumber=$usernu[0]['user_mobile'];
    $astronu=fetchbyresultByCondiction('astrologers',array('astro_id'=>$astrol_ids));
 $astreologer_number=$astronumber[0]['astro_mobile'];
 $totalmin=($walletbalance/$chatrate);//($walletbalance/$callrate);
    echo $totalSecs   = ($totalmin * 60) ;

    $data = array('agent' => $astreologer_number, 'customer' => $usernumber, 'seconds' => $totalSecs);
    $data_string = json_encode($data);
    calling($data_string);// call api call
// insert into call history then in return also update both data
$datachat['ucth_user_id']=$users_ids;
$datachat['ucth_astro_id']=$astrol_ids;
$datachat['ucth_astro_chatrate']=$chatrate;
$datachat['ucth_status']=0;
$datachat['ucth_chat_starttime']= date('Y-m-d H:i:s');
$insertchathistroy = insertdata('user_chat_detail_history',$datachat);
$last_chatinsertid=$this->db->insert_id();
// update start
//update in payments also  TODO
//in response data get
// update end

    // $converttosec=
    //$this->user_model->chat_data();
}

// *************************************chat end*************************************************//

    //*******************************end astrowebsite **************//
   
    // public function user_profile()
    // {
    //  $pagedata['folder_name'] = 'pagesuser';
    //  $page_data['page_name'] = 'profile';
    //  $page_data['page_title'] = 'user_profile';
    //  $this->load->view('frontend/main_template_page', $page_data);
    // }
    
    //  public function user_profile_update($par1 = null, $par2 = null)
    // {
    //     $this->user_model->update_user_profile_information($par1);
    //     $pagedata['folder_name'] = 'pagesuser';
    //     $page_data['page_name'] = 'profile';
    //     $page_data['page_title'] = 'PROFILE';
    //     $this->load->view('backend/index', $page_data);
    // }
  
    
    // public function referfriend_page()
    // {
    //  $pagedata['folder_name'] = 'pagesuser'; 
    //  $page_data['page_name'] = 'referfriend';
    //  $page_data['page_title'] = 'Refer Friend';
    //  $this->load->view('frontend/main_template_page', $page_data);
    // }
    public function ForgotPassword()
    {
          $email = $this->input->post('email');      
          $findemail = $this->user_model->ForgotPassword($email);  
          if($findemail){
           $this->user_model->sendpassword($findemail);        
            }else{
           $this->session->set_flashdata('msg',' Email not found!');
           redirect(base_url().'user_login_page','refresh');
       }
    }
    public function reportdownload()
    {
        $pth    =   file_get_contents(base_url()."pdf/");
        $nme    =   "dummy.pdf";
        force_download($nme, $pth); 
          // $this->session->set_flashdata('msg',' Email not found!');
          // redirect(base_url().'user_login_page','refresh');
       
    }

    function walletpaymentforreport()
    {
        $astro_id = $this->input->post('astroid_reportss');
    	$user_id = $this->input->post('usersss_id');
        $amt_report = $this->input->post('reports_rate');
       
    	$randam = uniqid(8);

    	$results = fetchbyresultByCondiction('wallet',array('user_id'=>$user_id));
    	$updateamt = $results[0]['wallet_amt'] - $amt_report;
    	updateData('wallet',array('wallet_amt'=>$updateamt),array('user_id'=>$user_id));
    	$insertdata = [
    					'unique_id' => $randam,
    					'user_id' => $user_id,
    					'total_amt' => $amt_report,
    					'payfor' => 'REPORT GENERATION',
    					'payment_status' => 'Success',
    					'pay_by' => 'Wallet'
    				];
    	WalletaddData('payment',$insertdata);
         $data2['rp_user_id']=$user_id;
         $data2['rp_astro_id']=$astro_id;
         $data2['rp_amountpaid']=$amt_report;
        $data2['rp_type']=$this->input->post('rp_type');
        $data2['rp_description']=$this->input->post('rp_description');
        if(!empty($this->input->post('op1')))
        {
            $data2['rp_op1']=$this->input->post('op1');
        }
        if(!empty($this->input->post('op2')))
        {
            $data2['rp_op2']=$this->input->post('op2');
        }
        if(!empty($this->input->post('op3')))
        {
            $data2['rp_op3']=$this->input->post('op3');
        }
        if(!empty($this->input->post('op4')))
        {
            $data2['rp_op4']=$this->input->post('op4');
        }
       //    this is for image/pdf upload start-----------
        if (!empty($_FILES['userfile']['name'])) {
            $etc = $_FILES['userfile']['name'];
            $etcdata =  str_replace(" ", "",$etc);
           echo  $dataname = $randam.$etcdata;
           $data2['rp_attachment'] = $dataname;
           move_uploaded_file($_FILES['userfile']['tmp_name'], 'pdfimagedoc/usertoastrologer/'. $dataname);
        }
        //    this is for image/pdf upload end-----------

        /*****************************reportsendtoastro table********** */
       insertdata('reportsendtoastro',$data2);
  
        //$this->session->set_flashdata('success','Transaction Completed Successfully');
        $this->session->set_flashdata('success','Thank You For Submit Query We will Revirt You in 24 hours');
        redirect(base_url().'userdashboard/profilemenu-02');
    }
// ----------------------
    function subreport()
    {
        $id = $this->input->post('id');
        $data = fetchbyresultByCondiction('reportquestionoption',array('rqo_id'=>$id));
        echo "<div class='form-group row'>
                    <div class='col-md-6'>
                        <input type='checkbox' class='chk-widht' name='op1' /> ".$data[0]['rqo_option1']."
                    </div>
                    <div class='col-md-6'>
                        <input type='checkbox' class='chk-widht' name='op2'> ".$data[0]['rqo_option2']."
                    </div>
                    <div class='col-md-6'>
                        <input type='checkbox' class='chk-widht' name='op3'> ".$data[0]['rqo_option3']."
                    </div>
                    <div class='col-md-6'>
                        <input type='checkbox' class='chk-widht' name='op4'> ".$data[0]['rqo_option4']." 
                    </div>
                </div>";
    }

}
?>
