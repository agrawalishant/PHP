<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Api_controller extends CI_Controller
{
    public function index()
    {
        if($this->input->post('customer')){$customer = $this->input->post('customer');}
        if($this->input->post('astrologer')){$astrologer = $this->input->post('astrologer');}
        if($this->input->post('callstatus')){$callstatus = $this->input->post('callstatus');}
        if($this->input->post('recording')){$recording = $this->input->post('recording');}
        if($this->input->post('duration')){$duration = $this->input->post('duration');}
        if($this->input->post('uniqued')){$uniqued = $this->input->post('uniqued');}
        if($this->input->post('datetime')){$datetime = $this->input->post('datetime');}
        $date = date('Y-m-d');
        
        if(!empty($customer)){ $Insertdata['customer'] = $customer; }
        if(!empty($astrologer)){ $Insertdata['astrologer'] = $astrologer; }
        if(!empty($callstatus)){ $Insertdata['call_status'] = $callstatus; }
        if(!empty($recording)){ $Insertdata['recording'] = $recording; }
        if(!empty($duration)){ $Insertdata['duration'] = $duration; }
        if(!empty($uniqued)){ $Insertdata['uniqueid'] = $uniqued; }
        if(!empty($datetime)){ $Insertdata['datetime'] = $datetime; }
        //echo 'id = '.$id = $this->session->userdata('calling_lastinsertid');exit;    
        //if($id>0){$Insertdata['calconnected_id'] = $id;}
        //else{$Insertdata['calconnected_id'] = 0;}
        $Insertdata['created_at'] = $date;
        
        $res = $this->Generalmodel->add('calldisconnect',$Insertdata);
           //  19-april-2021 start*****************************************************************************
    //  19-april-2021 start*****************************************************************************
       // $resdddddd = $this->User_controller->updatecall_data($Insertdata['duration']);
        //  $dur=$Insertdata['duration'];
        //  redirect(base_url().'updatecall_data/'.$dur);
        $userget= fetchbyresultwhere('user',array('user_mobile'=>$customer));
        $users_ids=$userget[0]['user_id'];
        $userid=$userget[0]['user_id'];
        $astrologerget= fetchbyresultwhere('astrologers',array('astro_mobile'=>$astrologer));
       $astrol_ids=$astrologerget[0]['astro_id'];
       $astroid=$astrol_ids;
       $callrate=$astrologerget[0]['astro_calling_rate'];
       // insert into call history then in return also update both data
      //  $duration=300;
  $datacall['uch_astro_id']=$astrol_ids;
  $datacall['uch_astro_call_rate']=$callrate;
  $datacall['uch_user_id']=$users_ids;
  $timeviaapi = $duration;
 // $totalcalltime  = floor($duration / 60); //inseconds   api details
    $totalcalltime  = ($duration/60);
   $datacall['uch_totaltime'] = $totalcalltime;//second converted to min
  
   $datacall['uch_status'] = 1;
   $datacall['uch_call_end_time'] = date('Y-m-d H:i:s');
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
    $insertcallhistroy = insertdatareturnlastid('user_call_detail_history_user',$datacall);
    $last_callinsertid=$insertcallhistroy;
    //    $last_callinsertid=$this->db->insert_id($insertcallhistroy);
//$last_callinsertid=0;
//    commission and amount add to admin and astrologer
$this->User_model->pay_to_astrologer_commission($userid,$astroid,$amt,'callingastrologer',$last_callinsertid); //par4=payfor 
// ------- payment and wallet end
  
    //  19-april-2021 end*****************************************************************************
    //  19-april-2021 end*****************************************************************************
        $last_id = $this->db->insert_id();
        if(!empty($res))
        {
            $req = fetchbyresultByCondiction('calldisconnect',array('id'=>$last_id));
            $result = array('success'=>'true','msg'=>$req);
        }
        else
        {
            $result = array('success'=>'true','msg'=>'Data Not Inerted Successfully');
        }
       
        echo json_encode($result);
    }
// -----------------------------start
public function updatecall_data($duration)
{
//$this->session->set_flashdata('success','connected2');
    // called in upped controller plz delete  updatecall_data from upper controller
    $last_callinsertid  = $this->session->userdata('calling_lastinsertid');
    $astroid=        $this->session->userdata('astroidcalling');
    $callrate=   $this->session->userdata('astrocallratecalling');
    $userid=         $this->session->userdata('user_id');
    //seconds to minute
    // $minutes = floor($time / 60);
   // $timeviaapi = 300;  // this time is in seconds
   
        // ******************* 5mindiscount calculation start *******************
   
            //  $query2   =  $this->db->where('uch_user_id',$userid);
            //  $query2   =  $this->db->get('user_call_detail_history_user');   
             //  $ql = $this->db->select('uch_user_id')->from('user_call_detail_history_user')->where('uch_user_id',$userid)->get();           
            //   $fetchdiscountstatus = fetchbyresultByCondiction('wallet',array('user_id'=>$userid));
            //   $fds = $fetchdiscountstatus[0]['calling_discount_status'];
            //       if($fds == 1 ) 
            //       {
                  
                
            //          $amt = ($totalcalltime*$callrate);
            //          $results = fetchbyresultByCondiction('wallet',array('user_id'=>$userid));
            //          $updateamt = $results[0]['wallet_amt'] - $amt;
            //       }
            //       else
            //       {
            //             if($totalcalltime >= 5)
            //             {
            //                 $discount_rate_time = 5;
            //                 $discount_rate_amount=($callrate/2);
            //                 $da1=($discount_rate_time*$discount_rate_amount);
            //                 $rest_time_left=($totalcalltime-5);
            //                 $rest_time_amount=($rest_time_left*$callrate);
            //                 $amt = $da1+$rest_time_amount;
            //                 $results = fetchbyresultByCondiction('wallet',array('user_id'=>$userid));
            //               $updateamt = $results[0]['wallet_amt'] - $amt;
            //               $updateData3['calling_discount_status']=1;
            //               $updatedisc3=updateData('wallet',$updateData3,array('user_id'=>$userid));
            //             }else
            //               {
            //                         $discount_rate_time = 5;
            //                         $discount_rate_amount=($callrate/2);
            //                         $da2=($discount_rate_time*$discount_rate_amount);
            //                         $amt =$da2;
            //                         $results = fetchbyresultByCondiction('wallet',array('user_id'=>$userid));
            //                         $updateamt = $results[0]['wallet_amt'] - $amt;
            //                   $updateData3['calling_discount_status']=1;
            //                   $updatedisc3=updateData('wallet',$updateData3,array('user_id'=>$userid));
            //                 }
            //       }
         
           
        // ******************* 5mindiscount calculation end **********************
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
// -----------------------------end

}
?>