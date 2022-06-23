<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Chat_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showAllUsers()
    {
    	$astroid = $this->input->post('astroid');
    
        $joincondiction = 'chat_notification.user_id = user.user_id';
    	$res = twotablejoin('chat_notification','user',$joincondiction,array('astro_id'=>$astroid));  
        if(!empty($res))
    	{
    	    $result = array('success'=>'true','msg'=>'Users Found Successfully','data'=>$res);        
        }
    	else
    	{
            $result = array('success'=>'true','msg'=>'No User Found');    	        
    	}
    	echo json_encode($result);
    }
    
    public function closeChat()
    {
    	$senderid = $this->input->post('userid');
    	$reciverid = $this->input->post('astroid');
    	
    	//$astrologer = fetchbyresultwhere('chat_notification',array('astro_id'=>$reciverid,'user_id'=>$senderid));
    	$astrologer = fetchbyresultwhere('astrologers',array('astro_id'=>$reciverid));
    	$chatamt = $astrologer[0]['astro_chat_rate'];
    	$chatamtdiscount = $astrologer[0]['astro_chat_rate_discount'];
    	//$chatamt = 0;
    	//$chatamtdiscount = 50;
    	if($chatamt>0 && $chatamt!=0)
    	{
    		if($chatamtdiscount>0)
    		{
    			$chatper = ($chatamt*$chatamtdiscount)/100;
    			$chatFinalamt = $chatamt-$chatper;
    		}
    		else
    		{
    			$chatFinalamt = $chatamt;
    		}
    	}
    	elseif ($chatamt==0) {
    		$chatFinalamt = $chatamt;
    	}

    	$wallet = fetchbyresultwhere('wallet',array('user_id'=>$senderid));
    	$userWalletAmt = $wallet[0]['wallet_amt'];
    	if(($userWalletAmt > 0)&&($userWalletAmt > $chatFinalamt))
    	{
    	    $req = fetchbyresultwhere('chat_notification',array('astro_id'=>$reciverid,'user_id'=>$senderid));
	    	//echo $this->db->last_query();exit;	
			if(!empty($req))
			{
			    $datetime1 = strtotime(date('Y-m-d H:i:s'));
                $datetime2 = strtotime($req[0]['start_time']);
				// $interval = date_diff($datetime1,$datetime2);
                // $elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
                $hours = abs(($datetime1 - $datetime2)/3600);
                $minutes = $hours*60;
				$amt = $chatFinalamt * $minutes;
				
    	        $userAmt = $userWalletAmt - round($amt);
    	        $updateData = ['wallet_amt' => $userAmt];
    	        $res = updateData('wallet',$updateData,array('user_id'=>$senderid));
    	        $wallet = fetchbyresultwhere('wallet_astrologer',array('wa_astrologer_id'=>$reciverid));
    	        $a = $wallet[0]['wa_wallet_amount']; 
    	        $astroAmt = $a + round($amt);
    	        $updateDatas = ['wa_wallet_amount' => $astroAmt];
    	        $res = updateData('wallet_astrologer',$updateDatas,array('wa_astrologer_id'=>$reciverid));
    	        $updateDt = ['end_time' => $datetime1];
				$res = updateData('chat_notification',$updateDt,array('astro_id'=>$reciverid,'user_id'=>$senderid));
				
				$details = [
				                'minutes' => $minutes,
				                'Amount' => $amt,
				            ];
				$result = array('sucess'=>'true','msg'=>$req,'data'=>$details);
			}
			else
			{
				$result = array('sucess'=>'true','msg'=>'No User Found');	
			}
		}
		else{
			$result = array('success'=>'true','msg'=>'Insufficient Amount For Chat Please Reharge Your Wallet');
		}	
    	echo json_encode($result);
    }
    
    public function userSendRequest()
    {
    	$senderid = $this->input->post('userid');
    	$reciverid = $this->input->post('astroid');
    
    	$astrologer = fetchbyresultwhere('chat_notification',array('astro_id'=>$reciverid,'user_id'=>$senderid));
    	
    	if(!empty($astrologer))
    	{
    	    $id = $astrologer[0]['id'];
    	    $updateData = [ 'sendRequest' => '1' ];
    	    $res = updateData('chat_notification',$updateData,array('id'=>$id));
    	    if(!empty($res)){
                $astro = fetchbyresultwhere('chat_notification',array('id'=>$id));
                $result = array('success'=>'true','msg'=>'Request Send Successfully','data'=>$astro);        
            }
        }
    	else
    	{
    	    $insertData = [
    	                    'user_id' => $senderid,
    	                    'astro_id' => $reciverid,
    	                    'sendRequest' => '1'
    	                ];
    	    $res = addDatas('chat_notification',$insertData);        
    	    if(!empty($res))
    	    {
                $result = array('success'=>'true','msg'=>'Request Send Successfully.');    	        
    	    }
    	}
    	echo json_encode($result);
    }
    
    public function astroAcceptRequest()
    {
    	$senderid = $this->input->post('userid');
    	$reciverid = $this->input->post('astroid');
    
    	$astrologer = fetchbyresultwhere('chat_notification',array('astro_id'=>$reciverid,'user_id'=>$senderid,'sendRequest'=>'1'));
    	//echo $this->db->last_query();exit;
    	//print_r($astrologer);exit;
    	if(!empty($astrologer))
    	{
    	    $id = $astrologer[0]['id'];
    	    $date = date('Y-m-d H:i:s');
    	    $updateData = [ 'acceptRequest' => '1','start_time' => $date ];
    	    $res = updateData('chat_notification',$updateData,array('id'=>$id));
            if(!empty($res)){
                $astro = fetchbyresultwhere('chat_notification',array('id'=>$id));
                $result = array('success'=>'true','msg'=>'Request Accepted Successfully','data'=>$astro);        
            }else{
                $result = array('success'=>'true','msg'=>'Request Not Accepted');        
            }
        }
    	else
    	{
    	    $result = array('success'=>'true','msg'=>'Invalid Details Send Please Try Again');    	        
    	}
    	echo json_encode($result);
    }

    public function userSendMsg()
    {
    	$senderid = $this->input->post('userid');
    	$reciverid = $this->input->post('astroid');
    	$msg = $this->input->post('message');
    	$offset = $this->input->post('offset');
    	
    	if($offset > 0){
    		$limit = $offset*20;
    	}else{
    		$limit = 20;	
    	}

    	$InsertData = [
						'reciver_id' => $reciverid,
						'sender_id' => $senderid,
						'message' => $msg,
						'status' => 1
					];
    	$res = addDatas('chat_messsage',$InsertData);
    	if($res)
    	{
    		//$req = fetchbyresultwhere('chat_messsage',array('reciver_id'=>$reciverid));
    		$where = '`sender_id`='.$reciverid.' AND `reciver_id`='.$senderid;
    		$req = fetchbyresultwherelimitorder('chat_messsage',array('reciver_id'=>$reciverid,'sender_id'=>$senderid),$where,$limit,'id','DESC');	
    		if($req)
    		{
    			$result = array('sucess'=>'true','msg'=>$req);
    		}
    		else
    		{
    			$result = array('sucess'=>'true','msg'=>'No Message Found');	
    		}
    	}
    	else
    	{
    		$result = array('sucess'=>'true','msg'=>'Message Not Send');	
    	}
    	echo json_encode($result);
    }

    public function ShowuserChat()
    {
    	$senderid = $this->input->post('userid');
    	$reciverid = $this->input->post('astroid');
    	$offset = $this->input->post('offset');
    	
    	if($offset > 0){
    		$limit = $offset*20;
    	}else{
    		$limit = 20;	
    	}

    	$astrologer = fetchbyresultwhere('astrologers',array('astro_id'=>$reciverid));
    	$chatamt = $astrologer[0]['astro_chat_rate'];
    	$chatamtdiscount = $astrologer[0]['astro_chat_rate_discount'];
    	$chatamt = 0;
    	$chatamtdiscount = 50;
    	if($chatamt>0 && $chatamt!=0)
    	{
    		if($chatamtdiscount>0)
    		{
    			$chatper = ($chatamt*$chatamtdiscount)/100;
    			$chatFinalamt = $chatamt-$chatper;
    		}
    		else
    		{
    			$chatFinalamt = $chatamt;
    		}
    	}
    	elseif ($chatamt==0) {
    		$chatFinalamt = $chatamt;
    	}

    	$wallet = fetchbyresultwhere('wallet',array('user_id'=>$senderid));
    	$userWalletAmt = $wallet[0]['wallet_amt'];
    	if(($userWalletAmt > 0)&&($userWalletAmt > $chatFinalamt))
    	{
	    	$where = '`sender_id`='.$reciverid.' AND `reciver_id`='.$senderid;
			$req = fetchbyresultwherelimitorder('chat_messsage',array('reciver_id'=>$reciverid,'sender_id'=>$senderid),$where,$limit,'id','DESC');
			//echo $this->db->last_query();exit;	
			if($req)
			{
				$result = array('sucess'=>'true','msg'=>$req,'message'=>'success','message'=>'Data Found');
			}
			else
			{
				$result = array('sucess'=>'true','msg'=>'No Message Found','message'=>'Data Not Found');	
			}
		}
		else{
			$result = array('success'=>'true','msg'=>'Insufficient Amount For Chat Please Reharge Your Wallet');
		}	
    	echo json_encode($result);
    }

    public function astroSendMsg()
    {
    	$senderid = $this->input->post('astroid');
    	$reciverid = $this->input->post('userid');
    	$msg = $this->input->post('message');
    	$offset = $this->input->post('offset');
    	
    	if($offset > 0){
    		$limit = $offset*20;
    	}else{
    		$limit = 20;	
    	}

    	$InsertData = [
						'reciver_id' => $reciverid,
						'sender_id' => $senderid,
						'message' => $msg,
						'status' => 1
					];
    	$res = addDatas('chat_messsage',$InsertData);
    	if($res)
    	{
    		//$req = fetchbyresultwhere('chat_messsage',array('reciver_id'=>$reciverid));
    		$where = '`sender_id`='.$reciverid.' AND `reciver_id`='.$senderid;
    		$req = fetchbyresultwherelimitorder('chat_messsage',array('reciver_id'=>$reciverid,'sender_id'=>$senderid),$where,$limit,'id','DESC');	
    // 		echo $this->db->last_query($req);exit;
    // 		print_r($req);exit;
    		if($req)
    		{
    			$result = array('sucess'=>'true','msg'=>$req);
    		}
    		else
    		{
    			$result = array('sucess'=>'true','msg'=>'No Message Found');	
    		}
    	}
    	else
    	{
    		$result = array('sucess'=>'true','msg'=>'Message Not Send');	
    	}
    	echo json_encode($result);
    }

    public function ShowAstroChat()
    {
    	$senderid = $this->input->post('astroid');
    	$reciverid = $this->input->post('userid');
    	$offset = $this->input->post('offset');
    	
    	if($offset > 0){
    		$limit = $offset*20;
    	}else{
    		$limit = 20;	
    	}

    	$where = '`sender_id`='.$reciverid.' AND `reciver_id`='.$senderid;
		$req = fetchbyresultwherelimitorder('chat_messsage',array('reciver_id'=>$reciverid,'sender_id'=>$senderid),$where,$limit,'id','DESC');
		//echo $this->db->last_query();exit;	
		if($req)
		{
			$result = array('sucess'=>'true','msg'=>$req);
		}
		else
		{
			$result = array('sucess'=>'true','msg'=>'No Message Found');	
		}
		echo json_encode($result);
    }
    
}
?>    	