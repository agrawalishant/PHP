<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Call_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
// ********************************START ************************************************
   // ******************************** END ************************************************

public function callastrologer()
{
    $callrate       = $this->input->post('callrate');
 $users_ids      = $this->input->post('users_ids');
 $astrol_ids     =$this->input->post('astrol_ids'); 
 $walletbalance  = $this->input->post('walletbalance');
    // point 1 to check astrologer is online or offline
    // point 2 to check  wallet balance is greater then 10 rs
    if($walletbalance <= 15)
    {
         $data=array('success'=>'true','msg'=>'Plz recharge wallet');
		    echo json_encode($data);
    }
    else
    {
    
 $usernu=fetchbyresultByCondiction('user',array('user_id'=>$users_ids));
 $usernumber = $usernu[0]['user_mobile']; 
 $astronu=fetchbyresultByCondiction('astrologers',array('astro_id'=>$astrol_ids));

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
  
 $totalSecs   = ($take * 60) ; 
 //$totalSecs   = ($totalmin * 60) ; 
 $datassgg = array('agent' => $astreologer_number, 'customer' => $usernumber, 'seconds' => $totalSecs);
//print_r($data);exit;
 $data_string = json_encode($datassgg);
  
  
   calling($data_string);
    $data=array('success'=>'true','msg'=>'Call Connected');
		    echo json_encode($data);
}
    
   
}
// end of file

}
?>