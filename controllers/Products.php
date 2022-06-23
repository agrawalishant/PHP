<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Products extends CI_Controller{ 
     
    function  __construct(){ 
        parent::__construct(); 
         
        // Load paypal library 
        $this->load->library('paypal_lib');
         
        // Load product model 
        $this->load->model('product'); 
    } 
     
    function index(){ 
        $data = array(); 
         
        // Get products from the database 
       // $data['products'] = $this->product->getRows(); 
          $data['products'] = 'ok done'; 
        // Pass product data to the view 
        $this->load->view('products/index', $data); 
    } 
     
    function buy()
    {
        
        if($this->session->userdata('user_id') != '')
        {
            $totalamt = $this->input->post('totalamt');
            $userID = $this->session->userdata('user_id');
            $item_ids = $this->input->post('Items_id');
            $randam = $this->input->post('randam');
            $userID = $userID.",".$randam;
            //echo "total amt = ".$totalamt." userid = ".$userID." items =".$item_ids." randam = ".$randam; exit;
            // Set variables for paypal form 
            $returnURL = base_url().'Products/success'; //payment success url 
            $cancelURL = base_url().'Products/cancel'; //payment cancel url 
            $notifyURL = base_url().'Products/ipn'; //ipn url 
             
            // Get product data from the database 
            //$product = $this->product->getRows($id); 
             
            // Get current user ID from the session (optional) 
            //$userID = !empty($_SESSION['userID'])?$_SESSION['userID']:1; 
             
            // Add fields to paypal form 
             $this->paypal_lib->add_field('return',$returnURL); 
             $this->paypal_lib->add_field('cancel_return',$cancelURL); 
             $this->paypal_lib->add_field('notify_url',$notifyURL); 

            $this->paypal_lib->add_field('item_name',$item_ids); 
            $this->paypal_lib->add_field('custom',$userID); 
            //$this->paypal_lib->add_field('item_number',3); 
            $this->paypal_lib->add_field('payment_gross',$totalamt);
             $this->paypal_lib->add_field('amount',$totalamt); 

             
            // Render paypal form 
            $this->paypal_lib->paypal_auto_form(); 
        } 
        else
        {
            redirect('add_to_card');
        }
    } 

    function success()
    { 
        // Get the transaction data 
        $paypalInfo = $this->input->post(); 
         //echo "<pre>";print_r($paypalInfo);

        //$data['user_id'] = $paypalInfo['custom']; 
        $data['txn_id'] = $paypalInfo['txn_id']; 
        //$data['total_amt'] = $paypalInfo['payment_gross']; 
        $data['currency_code'] = $paypalInfo['mc_currency']; 
        $data['payment_status'] = 'Success'; 
        $data['pay_by'] = 'PayPal'; 
        $manage = explode(',',$paypalInfo["custom"]);
        for($i=0;$i<count($manage);$i++)
        {
            $user_id = $manage[0];
            $randam_id = $manage[1];
        }
        
        updateData('payment',$data,array('unique_id'=>$randam_id));
        
        $pagedata['folder_name'] = 'pages';
        $pagedata['page_name'] = 'thanku_page';  
        $this->load->view('frontend/landing',$pagedata); 
    } 
      
    function cancel()
    { 
        // Load payment failed view 
        $this->load->view('frontend/product/cancel'); 
    } 
      
    function ipn()
    { 
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post();         
        $manage = explode(',',$paypalInfo["custom"]);
        for($i=0;$i<count($manage);$i++)
        {
            $user_id = $manage[0];
            $randam_id = $manage[1];
        }
        //$data['user_id'] = $user_id;
        //$data['unique_id'] = $randam_id; 
        $data['txn_id'] = $paypalInfo["txn_id"]; 
        //$data['total_amt'] = $paypalInfo["payment_gross"]; 
        $data['currency_code'] = $paypalInfo["mc_currency"]; 
        $data['payment_status'] = 'Success'; 
        //$data['payment_status'] = $paypalInfo["payment_status"]; 
        //$data['product_id'] = $paypalInfo["item_name"];

        //$this->product->insertTransaction($data);
        //updateData('payment',$data,array('unique_id'=>$randam_id));
    } 

    public function addTopayment()
    {
        $user_id = $this->session->userdata('user_id');
        $rand = $this->input->post('rand');
        $amt = $this->input->post('amt');
        $itm = $this->input->post('itm');
        $itm_id = $this->input->post('itm_id');
        $insertdata = [
                        'unique_id' => $rand,            
                        'user_id' => $user_id,            
                        'total_amt' => $amt, 
                        'product_id' => $itm_id,            
                    ];
        addData('payment',$insertdata);
    }

    // wallet codeing
    function walletbuy()
    {
        
        if($this->session->userdata('user_id') != '')
        {
            $totalamt = $this->input->post('walletamt');
            $userID = $this->session->userdata('user_id');

            // $item_ids = $this->input->post('Items_id');
            
            $randam = uniqid(8);
            $userID = $userID.",".$randam;
            //echo "total amt = ".$totalamt." userid = ".$userID." items =".$item_ids." randam = ".$randam; exit;
            // Set variables for paypal form

            $returnURL = base_url().'Products/walletsuccess'; //payment success url 
            $cancelURL = base_url().'Products/walletcancel'; //payment cancel url 
            $notifyURL = base_url().'Products/walletipn'; //ipn url 
             
            // Get product data from the database 
            //$product = $this->product->getRows($id); 
             
            // Get current user ID from the session (optional) 
            //$userID = !empty($_SESSION['userID'])?$_SESSION['userID']:1; 
             
            // Add fields to paypal form 
            $this->paypal_lib->add_field('return',$returnURL); 
            $this->paypal_lib->add_field('cancel_return',$cancelURL); 
            $this->paypal_lib->add_field('notify_url',$notifyURL); 

            // $this->paypal_lib->add_field('item_name',$item_ids); 
             $this->paypal_lib->add_field('custom',$userID); 
            //$this->paypal_lib->add_field('item_number',3); 
            $this->paypal_lib->add_field('payment_gross',$totalamt);
            $this->paypal_lib->add_field('amount',$totalamt); 

             
            // Render paypal form 
            $this->paypal_lib->paypal_auto_form(); 
        } 
        else
        {
            redirect('userdashboard');
        }
    }

    function walletipn()
    { 
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post();         
        
        $data['txn_id'] = $paypalInfo["txn_id"]; 
        $data['currency_code'] = $paypalInfo["mc_currency"]; 
        $data['payment_status'] = 'Success'; 
        $data['wallet_amt'] = $paypalInfo['payment_gross'];
        
        //$this->product->insertTransaction($data);
        //updateData('payment',$data,array('unique_id'=>$randam_id));
    }

    function walletsuccess()
    { 
        // Get the transaction data 
        $paypalInfo = $this->input->post(); 
         //echo "<pre>";print_r($paypalInfo);

        //$data['user_id'] = $paypalInfo['custom']; 
        $data['txn_id'] = $paypalInfo['txn_id']; 
        //$data['total_amt'] = $paypalInfo['payment_gross']; 
        $data['currency_code'] = $paypalInfo['mc_currency']; 
        $data['wallet_amt'] = $paypalInfo['payment_gross']; 
        $data['payment_status'] = 'Success'; 
        $manage = explode(',',$paypalInfo["custom"]);
        for($i=0;$i<count($manage);$i++)
        {
            $user_id = $manage[0];
            $randam_id = $manage[1];
        }
        $data['user_id'] = $user_id;
        $data['unique_id'] = $randam_id;
// 21/01/2021 start insert to recharege histroy------wallet recharge history
$data2['wrh_payment_status'] = 'Success';
$data2['wrh_user_id'] = $user_id;
$data2['wrh_amount'] = $paypalInfo['payment_gross'];
$data2['wrh_txn_id'] = $paypalInfo['txn_id']; 
insertdata('wallet_recharge_history',$data2);
//--------------end wallet recharge history
        $check = fetchby_wheres('wallet',array('user_id'=>$user_id));
        if(!empty($check))
        {
        	//print_r($check);exit;
        	$amt = $check[0]['wallet_amt'];
        	//echo "amt = ".$amt;exit;
        	$data['wallet_amt'] = $paypalInfo['payment_gross']+$amt;
        	updateData('wallet',$data,array('user_id'=>$user_id));	
        }
        else
        {
        	addWalletData('wallet',$data);
        }
        
        
        $pagedata['folder_name'] = 'pages';
        $pagedata['page_name'] = 'thanku_page';  
        $this->load->view('frontend/landing',$pagedata); 
    } 
      
    function walletcancel()
    { 
        // Load payment failed view 
        $this->load->view('frontend/product/cancel'); 
    }
}
?>