<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Astrologer_controller extends CI_Controller

{
  public function __construct()

    {
        parent::__construct();
        $this->load->model('Astrologer_model','astrologer_model');
        $this->load->library('form_validation');
    }

//---------------------------------------------------------
public function astrologer_loginpage()
{
    $pagedata['folder_name'] = 'pages';
    $pagedata['page_name'] = 'astrologer_login'; 
    $this->load->view('frontend/landing',$pagedata);
}

    public function astrologerdashboard($par1 = null, $par2 = null,$par3 = null,$par4 = null)
    {
        $par4 = null;
        $par4 = $this->input->post('par');
        $astro_id = $this->input->post('astro_id');
        
        if($par4 == 'chat_on'){
            $data = ['astro_online_chat_status'=>1];
            updateData('astrologers',$data,array('astro_id'=>$astro_id));
        }
        else if($par4 == 'chat_off'){
            $data = ['astro_online_chat_status'=>0];
            updateData('astrologers',$data,array('astro_id'=>$astro_id));
        }
        else if($par4 == 'call_on'){
            $data = ['astro_online_call_status'=>1];
            updateData('astrologers',$data,array('astro_id'=>$astro_id));
        }
        else if($par4 == 'call_off'){
            echo "id= ".$par4;
            $data = ['astro_online_call_status'=>0];
            updateData('astrologers',$data,array('astro_id'=>$astro_id));
            echo $this->db->last_query();exit;
        }

        if($par1 == 'updateprofile')
        {
            
            $data['astro_name']=$this->input->post('astro_name');
            $data['astro_mobile']=$this->input->post('astro_mobile');
            $data['astro_email']=$this->input->post('astro_email');
            $data['country']=$this->input->post('country');
            $data['skill']=$this->input->post('skill');
            $data['astro_language']=$this->input->post('astro_language');
            $data['astro_experience']=$this->input->post('astro_experience');
            $data['ac_number']=$this->input->post('ac_number');
            $data['address']=$this->input->post('address');
            $data2['astrologer_cat_id']=$this->input->post('astrologer_cat_id');
            $this->astrologer_model->update_astrologer_profile_information($data,$par2,$data2);
        }
        if($par1 == 'updatediscount')
        {
            
            $data['astro_calling_rate_discount']=$this->input->post('astro_calling_rate_discount');
            $data['astro_chat_rate_discount']=$this->input->post('astro_chat_rate_discount');
            $data['astro_report_rate_discount']=$this->input->post('astro_report_rate_discount');
            $data['astro_calling_rate']=$this->input->post('astro_calling_rate');
            $data['astro_chat_rate']=$this->input->post('astro_chat_rate');
            $data['astro_askreport_rate']=$this->input->post('astro_askreport_rate');
           
            $this->astrologer_model->common_update('astrologers','astro_id',$par2,'astrologerdashboard',$data);//update_astrologer_profile_information($data,$par2,$data2);
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
                $orig_pass=$this->input->post('newpassword');
                $id=$this->session->userdata('astro_id');
                $this->astrologer_model->checkOldPass($old_pass,$new_pass,$id,$orig_pass);
            }else{
                $this->session->set_flashdata('error', 'PLZ ENTER CORRECT PASSWORD');   
            }
        }
        $page_data['folder_name'] = 'pagesastrologer';
        $page_data['page_name'] = 'astrologer_dashboard';
        $page_data['page_title'] = 'Dashboard';
        $this->load->view('frontend/landing', $page_data);
    }

   public function send_reply_report_fromastrologer()
   {

    //  $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('rp_sendsolution','Description','required');
      if($this->form_validation->run()==TRUE)
            {
               
                $data['rp_sendsolution']=$this->input->post('rp_sendsolution'); 
                $data['replyid']=        $this->input->post('replyid');
                $data['replyuser_id']=   $this->input->post('replyuser_id');
                $data['replyastro_id']=  $this->input->post('replyastro_id');
               $this->astrologer_model->send_reply_report_astrologer($data);
           }
            else{
                 $this->session->set_flashdata('error', 'DESCRIPTION IS REQUIRED');
                 redirect(base_url() . 'astrologerdashboard', 'refresh');
                }
      
   }

   public function astrologer_forgetpassword()
    {
        
       $this->form_validation->set_rules('emailpassword', 'EMAIL REQUIRED', 'required');
       if($this->form_validation->run()==TRUE)
       {
           $page_data['emailpassword']=$this->input->post('emailpassword');

           $this->astrologer_model->forgetpassword($page_data);
       }
       $this->session->set_flashdata('ERROR', 'EMAIL REQUIRED');
       redirect(base_url() . 'astrologer_login_page', 'refresh');
    }
   

    //*******************************end astrowebsite **************//
//    **********************************start amount_request_astrologer*******************************************
public function amount_request_astrologer($astroid)
{
   $data['ara_amount']= $this->input->post('amount');
   $data['ara_walletavailable_balance']= $this->input->post('availableamount');
   
   $data['ara_astro_id']= $astroid;
     insertdata('request_amount_astrologer',$data);
     $this->session->set_flashdata('success', 'AMOUNT REQUESTED SUCCESSFULLY');
     redirect(base_url() . 'astrologerdashboard', 'refresh');
}
//    **********************************end amount_request_astrologer*******************************************
// ----------------------

    public function chatshowss()
    {
        $data['astro_name'] = $this->input->post('astroname');
        $data['i'] = $this->input->post('isid');
        $this->session->set_userdata('ivalue',$this->input->post('isid'));
        $this->session->userdata('ivalue');
        //$data['userid'] = $this->input->post('userid');
        $data['uid'] = $this->input->post('userid');
        $data['aid'] = $this->input->post('astroid');
        $html = $this->load->view('frontend/chatshos',$data,true);
        echo json_encode(array('succes'=>'true','msg'=>$html));
    }
    
    public function chatsuser()
    {
        $data['user'] = $this->input->post('user');
        $data['astro_id'] = $this->input->post('astroid');
        $data['astro_name'] = $this->input->post('astroname');
        $html = $this->load->view('frontend/chatsuser',$data,true);
        echo json_encode(array('succes'=>'true','msg'=>$html));
    }
    
    public function notificationStatus()
    {

        $userid = $this->input->post('uid');
        $astroid = $this->input->post('astroid');
        $date = date("Y-m-d H:i:s");
        $chkuser = fetchbyresultByCondiction('chat_notification',array('user_id'=>$userid,'astro_id'=>$astroid,'active_id'=>1,'astro_timeupdate_status'=>1));
        
        if(!empty($chkuser))
        {
            $updatedata = [
                                'user_id' => $userid,
                                'astro_id' => $astroid,
                                'end_time' => $date,
                                'active_id' => 0,
                                'astro_timeupdate_status' => 0
                            ];    
            $request = updateData('chat_notification',$updatedata,array('user_id'=>$userid,'astro_id'=>$astroid,));
            $chkuseramt = fetchbyresultByCondiction('chat_notification',array('user_id'=>$userid,'astro_id'=>$astroid));    
            if(!empty($chkuseramt))
            {
                $stim = $chkuseramt[0]['start_time'];
                $etim = $chkuseramt[0]['end_time'];
                //$diff = abs(strtotime($etim) - strtotime($stim));
                $timelength = strtotime( $etim ) - strtotime( $stim );
                $hours = intval( $timelength / 3600 );
                $minutes = intval( ( $timelength % 3600 ) / 60 );
                $seconds = $timelength % 60;
                $finalchatime =  str_pad( $hours, 2, '0', STR_PAD_LEFT ) . ':' . str_pad( $minutes, 2, '0', STR_PAD_LEFT ) . ':' . str_pad( $seconds, 2, '0', STR_PAD_LEFT );
                $first = explode(':',$finalchatime);
                for($i=0;$i<3;$i++)
                {
                   $hr = $first[0];                 
                   $min = $first[1];                 
                   $sec = $first[2];                 
                }
                if(!empty($min) && $min>0){$fmin = $min;}else{$fmin = 0;}
                
                if(!empty($sec) && $sec>0)
                {
                    $fmin = $min+1;
                }
                if(!empty($hr) && $hr>0)
                {
                    $fmin = $hr*60;
                }
                
                $astrodetails = fetchbyresultByCondiction('astrologers',array('astro_id'=>$astroid)); 
                $astroWalletAmt = fetchbyresultByCondiction('wallet',array('user_id'=>$userid)); 
                $astrodiscount = $astrodetails[0]['astro_chat_rate_discount'];
                $astrorate = $astrodetails[0]['astro_chat_rate'];
                $astwalamt = $astroWalletAmt[0]['wallet_amt'];
                if(!empty($astrodetails))
                {
                    if(!empty($astrodiscount) && !empty($astrorate))
                    {
                        $astrodiscount=$astrodiscount;
                        $astrorate=$astrorate;
                        $astrtochatrate = (($astrorate*$astrodiscount)/100);
                        $redimamt = $fmin*$astrtochatrate;
                        $finalwallamt = $astwalamt-$redimamt;
                        $updatewallamt = updateData('wallet',array('wallet_amt'=>$finalwallamt),array('user_id'=>$userid,));
                    }
                    else if(!empty($astrorate) && empty($astrodiscount))
                    {
                        $astrorate=$astrorate;
                        $redimamt = $fmin*$astrorate;
                        $finalwallamt = $astwalamt-$redimamt;
                        $updatewallamt = updateData('wallet',array('wallet_amt'=>$finalwallamt),array('user_id'=>$userid,));
                    }
                    else
                    {
                       $redimamt = "Free Chat Available From Astrologer."; 
                    }
                }
                
                
                // 19/03/2021 start just to manage histry data history page
                $session_histry_lastinsertid=$this->session->userdata('chat_history_lastinsertid');
                $ucth_chat_endtime= date('Y-m-d H:i:s');
                
                $updatehistorydata = updateData('user_chat_detail_history',array('ucth_totaltime'=>$fmin,'ucth_status'=>1,'ucth_chat_endtime'=> $ucth_chat_endtime),array('ucth_id'=>$session_histry_lastinsertid));
                
                   // 20/03/2021 start
                //    commission and amount add to admin and astrologer
                 $this->User_model->pay_to_astrologer_commission($userid,$astroid,$redimamt,'chatingastrologer',$session_histry_lastinsertid); //par4=payfor 
                
                // ------- payment and wallet end
                               // 20/03/2021 end
                // 19/03/2021 end
                $result = array('HISTRYID'=>$session_histry_lastinsertid,'ASTROID'=>$astroid,'USERID'=>$userid,'success'=>'true','time'=>$fmin,'msg'=>$redimamt,'oldamt'=>$astwalamt,'finalamt'=>$finalwallamt);
            }
            else
            {
                $result = array('success'=>'false','msg'=>'Data Not Updatedd');
            }
        echo json_encode($result);
        }
        
        $chkuserst = fetchbyresultByCondiction('chat_notification',array('user_id'=>$userid,'astro_id'=>$astroid,'active_id'=>1));
        if(!empty($chkuserst))
        {
            $updatedata = [
                                'user_id' => $userid,
                                'astro_id' => $astroid,
                                'active_id' => 0,
                                'astro_timeupdate_status' => 0
                            ];    
            $request = updateData('chat_notification',$updatedata,array('user_id'=>$userid,'astro_id'=>$astroid,));
        }
        
    }
    
    public function notificationActiveStatus()
    {

        $userid = $this->input->post('uid');
        $astroid = $this->input->post('astroid');
        $date = date("Y-m-d H:i:s");
        $chkuser = fetchbyresultByCondiction('chat_notification',array('user_id'=>$userid,'astro_id'=>$astroid,'active_id'=>0));
        //echo $this->db->last_query();exit;
        if(!empty($chkuser))
        {
            $updatedata = [
                                'user_id' => $userid,
                                'astro_id' => $astroid,
                                'active_id' => 1
                            ];    
            $res = updateData('chat_notification',$updatedata,array('user_id'=>$userid,'astro_id'=>$astroid));
            
            if(!empty($res))
            {
                $result = array('success'=>'true','msg'=>'Updated Successfully');
            }
            else
            {
                $result = array('success'=>'false','msg'=>'Data Not Updates');
            }
        }    
        echo json_encode($result);
    }
    
    public function notification()
    {
        $idsi = $this->input->post('idsi');
        $userid = $this->input->post('useri');
        $astroid = $this->input->post('astroid');
        $date = date("Y-m-d H:i:s");
        $chkuser = fetchbyresultByCondiction('chat_notification',array('user_id'=>$userid,'astro_id'=>$astroid));
        if(!empty($chkuser))
        {
            $active_status = $chkuser[0]['active_id'];
            $astro_timeupdate_status = $chkuser[0]['astro_timeupdate_status'];
            if($active_status==1 && $astro_timeupdate_status!=1)
            {
                $id = $chkuser[0]['id'];
                $updatedata = [
                                'user_id' => $userid,
                                'astro_id' => $astroid,
                                'start_time' => $date,
                                'astro_timeupdate_status' => 1
                            ];    
                $res = updateData('chat_notification',$updatedata,array('id'=>$id));
                $lastid =$id;
            }    
        }
        else
        {
            $Insertdata = [
                            'user_id' => $userid,
                            'astro_id' => $astroid,
                            'start_time' => $date,
                            'active_id' => $idsi
                        ];    
            addData('chat_notification',$Insertdata);
            $lastid = $this->db->insert_id();
        }
        $res = updateData('chat_messsage',array('reading_status'=>'1'),array('sender_id'=>$userid,'reciver_id'=>$astroid));
        $req = updateData('chat_messsage',array('reading_status'=>'1'),array('sender_id'=>$astroid,'reciver_id'=>$userid));
        echo json_encode(array('succes'=>'true','msg'=>'Update Successfully...'));
    }
    
    public function astrologer_chat()
    {
		$this->load->view('frontend/pages/astrologer_chat');
    }
    
    public function chatAstroUserList()
    {
        $data['astro_id'] = $this->input->post('astroid');
        $data['uid'] = $this->input->post('uid');
        $html = $this->load->view('frontend/chatUserNameList',$data,true);
        echo json_encode(array('success'=>'true','msg'=>$html));
    }
    
    public function astrologer_chats($id,$astroid)
    {
        $data['uid'] = decoding($id);
        $data['aid'] = decoding($astroid);
        $this->load->view('frontend/pages/astrologer_chat',$data);
    }
    
    public function chatmsg()
    {
        $data['userid'] = $this->input->post('useri');
        $data['astro_id'] = $this->input->post('astroid');
        $data['astro_name'] = $this->input->post('astroname');
        
        $html = $this->load->view('frontend/chatsmsg',$data,true);
        echo json_encode(array('succes'=>'true','msg'=>$html));
    }
    
    public function chatpayment()
    {
        $uid = $this->input->post('uid');
        echo 'ok= '.$lastNotificationId = $this->session->userdata("lastid");
      //  $this->session->unset_userdata("lastid");
        //echo 'lastid= '.$lastNotificationId;exit;
        echo json_encode(array('success'=>'true','msg'=>$lastNotificationId,'msg2'=>$uid));
        //echo json_encode(array('success'=>'true','msg'=>'msg1','msg2'=>'msg2'));
    }
    
    public function tests()
    {
        $datetime1 = new DateTime();
        $datetime2 = new DateTime('2021-03-18 16:13:00');
        $interval = $datetime1->diff($datetime2);
        $elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
        echo 'ok= '.$elapsed;
    }
}
?>