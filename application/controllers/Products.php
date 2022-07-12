<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('product');
        $this->load->model('Generalmodel');
        $this->load->database();
    }
     
    function index(){
        $data = array();
        //get products inforamtion from database table
        $data['products'] = $this->product->getProducts();
        //loav view and pass the products information to view
        $this->load->view('products/index', $data);
    }
    
    function buySlots(){
        if ($this->session->userdata('student_session') != '' ) 
        {
            $timeslots_data = $this->input->post('timeslots_data');
            $timeslots_data=rtrim($timeslots_data[0],',');
            //print_r($timeslots_data); exit;
            $bkdates_data = $this->input->post('bkdates_data');
            $bkdates_data=rtrim($bkdates_data[0],',');
            //$timeslots_data=implode(",",$timeslots_data);
            //$timeslots_data=chop($timeslots_data,','); 
            //print_r($bkdates_data); exit;
            
            $postcode = $this->input->post('postcode');
            $total_amount = $this->input->post('totalcharges_data');
            $inst_id = $this->input->post('inst_id');
            $student_id = $this->input->post('stu_id');
            $randam_id = $this->input->post('randam_id');
            $item_name = $student_id.",".$inst_id.",".$randam_id.",".$postcode;
            // $s_id = explode(',',$item_name);
            // print_r($s_id);exit;
            //print_r($item_name); exit;
            //$student_sess=$this->session->userdata('student_session');
            //$student_id=$student_sess['res'][0]['id'];
            
            $returnURL = base_url().'products/paymentSuccess'; //payment success url
            $failURL = base_url().'products/paymentFail'; //payment fail url
            $notifyURL = base_url().'products/ipn'; //ipn url
            
            $logo='';
            $this->paypal_lib->add_field('return', $returnURL);
            $this->paypal_lib->add_field('fail_return', $failURL);
            $this->paypal_lib->add_field('notify_url', $notifyURL);
            $this->paypal_lib->add_field('item_number', $timeslots_data);
            //$this->paypal_lib->add_field('created', $bkdates_data);
            $this->paypal_lib->add_field('custom', $bkdates_data);
            $this->paypal_lib->add_field('item_name', $item_name);
            $this->paypal_lib->add_field('amount', $total_amount);        
            $this->paypal_lib->image($logo);
          
            $this->paypal_lib->paypal_auto_form();
            
        }else{
            
            $this->session->set_flashdata('payses','Please Login With Student For Booking The Slots');
            redirect('Student/login');
        }
    }

     function paymentSuccess(){
        $paypalInfo = $this->input->post();
        $manage = array();
        $manage = explode(',',$paypalInfo['item_name']);
        for($i=0;$i<count($manage);$i++)
        {
		    $stu_id=$manage[0];
	        $inst_id =  $manage[1];
	        $randam =  $manage[2];
	        $postcode =  $manage[3];
        }    
        //echo $randam;
        //sleep(60);
        // $getdetails = $this->Generalmodel->get_all_where('payments',array('randam_id'=>$randam));
        //  //echo "<pre>";print_r($getdetails);exit;
        //  if(!empty($getdetails))
        //  {
        //      $updatedata = ['payment_status'=>'success'];
        //      $res = $this->Generalmodel->updateData('payments',$updatedata,array('randam_id'=>$randam));
        //  }
        // print_r($paypalInfo);
        // die();
        //get the transaction data
        
       // $data['item_number'] = $paypalInfo['item_number1']; 
        $data['randam'] = $randam;
        $data['postcode'] = $postcode;
        $data['txn_id'] = $paypalInfo["txn_id"] ;
        $data['payment_amt'] = $paypalInfo["payment_gross"] ;
        $data['currency_code'] = $paypalInfo["mc_currency"] ;
        $data['status'] = $paypalInfo["payment_status"] ;
         
        //pass the transaction data to view
       // $this->load->view('products/paymentSuccess', $data);
        $this->load->view('frontend/header');
        $this->load->view('frontend/thankyou',$data);
        $this->load->view('frontend/footer'); 
     }
      
     function paymentFail(){
        //if transaction cancelled
        $this->load->view('products/paymentFail');
     }
      
     function ipn(){
        //paypal return transaction details array
       
         
        $paypalInfo = $this->input->post();
        $s_id = explode(',',$paypalInfo['item_name']);
        $data['inst_id'] = $s_id[1];
        $data['user_id'] = $s_id[0];
        $data['randam_id'] = $s_id[2];
        $data['product_id'] = $paypalInfo["item_number"];
        $data['booking_dates'] = $paypalInfo["custom"];
        $data['txn_id'] = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["mc_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status'] = $paypalInfo["payment_status"];
 
        $paypalURL = $this->paypal_lib->paypal_url;        
        $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
         
        //check whether the payment is verified
        if(preg_match("/VERIFIED/i",$result)){
         // insert the transaction data into the database
         // echo "<pre>";  print_r($data); exit;
            
                $this->product->storeTransaction($data);    
            
        }
    }
}