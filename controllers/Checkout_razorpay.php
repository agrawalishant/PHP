<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_razorpay extends CI_Controller {

	public function index() {
		$this->checkout();
	}

	public function checkout() {
        $data['title']              = 'Checkout payment | Infovistar';  
        $data['callback_url']       = base_url().'razorpay/callback';
        $data['surl']               = base_url().'razorpay/success';;
        $data['furl']               = base_url().'razorpay/failed';;
        $data['currency_code']      = 'INR';
        $this->load->view('razorpay/checkout', $data);
    }

    // initialized cURL Request
    private function curl_handler($payment_id, $amount)  {
        $url            = 'https://api.razorpay.com/v1/payments/'.$payment_id.'/capture';
        $key_id         = "rzp_test_VMEWGCmKKRxNhz";
        $key_secret     = "4nQuxCdR55DCkacphnhbNqku";
        $fields_string  = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id.':'.$key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        return $ch;
    }   
        
    // callback method
    public function callback() {   
        
        //if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) 
        if($this->session->userdata('user_id') != '')
        {
            $totalamt = $this->input->post('walletamt');
            $userID = $this->session->userdata('user_id');
            $randam = uniqid(8);
            $userID = $userID.",".$randam;
            //echo "ok= ".$totalamt;exit;
            
            //$razorpay_payment_id = $this->input->post('razorpay_payment_id');
            //$merchant_order_id = $this->input->post('merchant_order_id');
            $razorpay_payment_id = 'pay87456';
            $merchant_order_id = 'GetxR75wCQoNTw';
            
            $this->session->set_flashdata('razorpay_payment_id','pay87156');
            $this->session->set_flashdata('merchant_order_id','GetxR75wCQoNTw');
            $currency_code = 'INR';
            $amount = $totalamt;
            $success = false;
            $error = '';
            try {                
                $ch = $this->curl_handler($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                //echo "ok= ".$result;exit;
                if ($result === false) {
                    $success = false;
                    $error = 'Curl error: '.curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                        //Check success response
                        if ($http_status === 200 and isset($response_array['error']) === false) {
                            $success = true;
                        } else {
                            $success = false;
                            if (!empty($response_array['error']['code'])) {
                                $error = $response_array['error']['code'].':'.$response_array['error']['description'];
                            } else {
                                $error = 'RAZORPAY_ERROR:Invalid Response <br/>'.$result;
                            }
                        }
                }
                //close curl connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'Request to Razorpay Failed';
            }
            
            if ($success === true) {
                if(!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                }
                if (!$order_info['order_status_id']) {
                    redirect($this->input->post('merchant_surl_id'));
                } else {
                    redirect($this->input->post('merchant_surl_id'));
                }

            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    } 
    public function success() {
        if($this->session->userdata('user_id') != '')
        {
            $totalamt = $this->input->post('totalAmount');
            $user_id = $this->session->userdata('user_id');
            $randam_id = uniqid(8);
            //$userID = $userID.",".$randam;
            
            // *********
            $data['user_id'] = $user_id;
            $data['unique_id'] = $randam_id;
            $data['payment_status'] = "success";
            
            // 21/01/2021 start insert to recharege histroy------wallet recharge history
            $data2['wrh_payment_status'] = 'Success';
            $data2['wrh_user_id'] = $user_id;
            $data2['wrh_amount'] =$totalamt;
            $data2['wrh_txn_id'] =$randam_id;
            
            insertdata('wallet_recharge_history',$data2);
            //--------------end wallet recharge history
            $check = fetchby_wheres('wallet',array('user_id'=>$user_id));
            if(!empty($check))
            {
            	//print_r($check);exit;
            	$amt = $check[0]['wallet_amt'];
            	//echo "amt = ".$amt;exit;
            	$data['wallet_amt'] =  $totalamt+$amt;
            	updateData('wallet',$data,array('user_id'=>$user_id));	
            }
            else
            {
        	    addWalletData('wallet',$data);
            }
        
            // *******
            
            // $insertdata['wrh_amount']=$totalamt;
            // $insertdata['wrh_user_id']=$userID;
            // $insertdata['wrh_txn_id']=$randam;
            // $insertdata['wrh_payment_status']="success";
            // insertdata('wallet_recharge_history',$insertdata);
            $data['title'] = 'Razorpay Success | TechArise';
            // echo "<h4>Your transaction is successful</h4>";  
            // echo "<br/>";
            // echo "Transaction ID: ".$this->session->flashdata('razorpay_payment_id');
            // echo "<br/>";
            // echo "Order ID: ".$this->session->flashdata('merchant_order_id');
            
            echo json_encode(array('success'=>'true','msg'=>'working'));
        }  else
        {
            echo json_encode(array('success'=>'false','msg'=>'Not working'));
        }
    }  
    //carat_id:carat_id,carat_weight:carat_weight
    public function cartsuccess() {
        if($this->session->userdata('user_id') != '')
        {
            $totalamt = $this->input->post('totalAmount');
           //  $totalamt = $this->input->post('totalAmount');
             // $totalamt = $this->input->post('totalAmount');
            // $user_id = $this->session->userdata('user_id');
            $randam_id = uniqid(8);
            //$userID = $userID.",".$randam;
             $data['title'] = 'Razorpay Success | TechArise';
        //  ****OLD CODE
         $user_id = $this->session->userdata('user_id');
        $rand = $randam_id;
        $amt = $totalamt;
        $itm = $this->input->post('item');
        $itm_id = $this->input->post('item_id');
        $carat_id = $this->input->post('carat_id');
		$carat_weight = $this->input->post('carat_weight');
        $insertdata = [
                        'unique_id' => $rand,            
                        'user_id' => $user_id,            
                        'total_amt' => $amt, 
                        'product_id' => $itm_id, 
                        'payment_status'=>'success',
                        'pay_by'=>'Online',
                        'payfor'=>'product Purchase',
                        'carat_id' => $carat_id,
						'carat_weight' => $carat_weight
                    ];
         //$data['payment_status'] = "success";
        insertdata('payment',$insertdata);
      //  redirect('cart','refresh');
        $destroy = $this->cart->destroy();
        
         
        //  ***OLD CODE
            
           return  json_encode(array('success'=>'true','msg'=>'working'));
        }  else
        {
          return   json_encode(array('success'=>'false','msg'=>'Not working'));
        }
    }  
    public function cartremainingAMTPAYsuccess() {
        if($this->session->userdata('user_id') != '')
        {
            $totalamt = $this->input->post('totalAmount');
            $wallamt = $this->input->post('wallAmt');
             // $totalamt = $this->input->post('totalAmount');
            // $user_id = $this->session->userdata('user_id');
            $randam_id = uniqid(8);
            //$userID = $userID.",".$randam;
             $data['title'] = 'Razorpay Success | TechArise';
        //  ****OLD CODE
         $user_id = $this->session->userdata('user_id');
        $rand = $randam_id;
        $amt = $totalamt+$wallamt;
        $itm = $this->input->post('item');
        $itm_id = $this->input->post('item_id');
        $carat_id = $this->input->post('carat_id');
		$carat_weight = $this->input->post('carat_weight');
        $insertdata = [
                        'unique_id' => $rand,            
                        'user_id' => $user_id,            
                        'total_amt' => $amt, 
                        'online_amt' => $totalamt, 
                        'wallet_amt' => $wallamt, 
                        'product_id' => $itm_id, 
                        'payment_status'=>'success',
                        'pay_by'=>'Online',
                        'payfor'=>'product Purchase',
                        'carat_id' => $carat_id,
						'carat_weight' => $carat_weight
                    ];
         //$data['payment_status'] = "success";
        insertdata('payment',$insertdata);
      //  redirect('cart','refresh');
        $destroy = $this->cart->destroy();
        
         
        //  ***OLD CODE
            
           return  json_encode(array('success'=>'true','msg'=>'working'));
        }  else
        {
          return   json_encode(array('success'=>'false','msg'=>'Not working'));
        }
    }  
    public function failed() {
        $data['title'] = 'Razorpay Failed | TechArise';  
        echo "<h4>Your transaction got Failed</h4>";            
        echo "<br/>";
        echo "Transaction ID: ".$this->session->flashdata('razorpay_payment_id');
        echo "<br/>";
        echo "Order ID: ".$this->session->flashdata('merchant_order_id');
    }
        
    public function checkoutsuccess() {
        if($this->session->userdata('user_id') != '')
        {
            $totalamt = $this->input->post('totalamt');
            $userID = $this->session->userdata('user_id');
            $item_ids = $this->input->post('Items_id');
            $randam = $this->input->post('randam');
            // $totalamt = $this->input->post('totalAmount');
            // $user_id = $this->session->userdata('user_id');
            // $randam_id = uniqid(8);
            //$userID = $userID.",".$randam;
            
            // *********
            $data['user_id'] = $user_id;
            $data['unique_id'] = $randam_id;
            $data['payment_status'] = "success";
            
            //--------------end wallet recharge history
            $check = fetchby_wheres('wallet',array('user_id'=>$user_id));
            if(!empty($check))
            {
            	//print_r($check);exit;
            	$amt = $check[0]['wallet_amt'];
            	//echo "amt = ".$amt;exit;
            	$data['wallet_amt'] =  $totalamt+$amt;
            	updateData('wallet',$data,array('user_id'=>$user_id));	
            }
            else
            {
        	addWalletData('wallet',$data);
            }
        
            // *******
            
            // $insertdata['wrh_amount']=$totalamt;
            // $insertdata['wrh_user_id']=$userID;
            // $insertdata['wrh_txn_id']=$randam;
            // $insertdata['wrh_payment_status']="success";
            // insertdata('wallet_recharge_history',$insertdata);
            $data['title'] = 'Razorpay Success | TechArise';
            // echo "<h4>Your transaction is successful</h4>";  
            // echo "<br/>";
            // echo "Transaction ID: ".$this->session->flashdata('razorpay_payment_id');
            // echo "<br/>";
            // echo "Order ID: ".$this->session->flashdata('merchant_order_id');
            
            echo json_encode(array('success'=>'true','msg'=>'working'));
        }  else
        {
            echo json_encode(array('success'=>'false','msg'=>'Not working'));
        }
    }
    // Free Kundli Pay starts
        public function kundliPaySuccess()
        {
            if($this->session->userdata('user_id') != '')
            {
                $totalamt = $this->input->post('totalAmount');
                $randam_id = uniqid(8);
                $data['title'] = 'Razorpay Success | TechArise';
                //  ****OLD CODE
                $user_id = $this->session->userdata('user_id');
                $rand = $randam_id;
                $amt = $totalamt;
                $insertdata = [
                            'unique_id' => $rand,            
                            'user_id' => $user_id,            
                            'total_amt' => $amt, 
                            'payment_status'=>'success',
                            'pay_by'=>'Online',
                            'payfor'=>'Make Kundli'
                            ];
             //$data['payment_status'] = "success";
            insertdata('payment',$insertdata);
          //  redirect('cart','refresh');
            $destroy = $this->cart->destroy();
            
             
            //  ***OLD CODE
                
               return  json_encode(array('success'=>'true','msg'=>'working'));
            }  else
            {
              return   json_encode(array('success'=>'false','msg'=>'Not working'));
            }
        }  
    // Free Kundli pay Ends
}
?>