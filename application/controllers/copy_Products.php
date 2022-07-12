<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('product');
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
            
            $bkdates_data = $this->input->post('bkdates_data');
            $bkdates_data=rtrim($bkdates_data[0],',');
            $bkdates_data = json_encode($bkdates_data);
            //$timeslots_data=implode(",",$timeslots_data);
            //$timeslots_data=chop($timeslots_data,','); 
            //print_r($bkdates_data); exit;
            
            
            $total_amount = $this->input->post('totalcharges_data');
            $inst_id = $this->input->post('inst_id');
            $student_id = $this->input->post('stu_id');
            //print_r($student_id); exit;
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
            $this->paypal_lib->add_field('created', $bkdates_data);
            $this->paypal_lib->add_field('custom', $student_id);
            $this->paypal_lib->add_field('item_name', $inst_id);
            $this->paypal_lib->add_field('amount', $total_amount);        
            $this->paypal_lib->image($logo);
            
            /* print_r($returnURL); echo "<br>";
            print_r($failURL); echo "<br>";
            print_r($notifyURL); echo "<br>";
            print_r($bkdates_data); echo "<br>";
            print_r($student_id); echo "<br>";
            print_r($inst_id); echo "<br>";
            print_r($total_amount); exit; */
            $this->paypal_lib->paypal_auto_form();
            
        }else{
            
            $this->session->set_flashdata('payses','Please Login With Student For Booking The Slots');
            redirect('Student/login');
        }
    }
     
    //function buyProduct($id){
        //Set variables for paypal form
        
      //  $returnURL = base_url().'products/paymentSuccess'; //payment success url
        //$failURL = base_url().'products/paymentFail'; //payment fail url
        //$notifyURL = base_url().'products/ipn'; //ipn url
        
        
        //get particular product data
        //$product = $this->product->getProducts($id);
        //print_r($product);exit;
        //$userID = 1; //current user id
      //  $logo = base_url().'Your_logo_url';
         
        // $this->paypal_lib->add_field('return', $returnURL);
        // $this->paypal_lib->add_field('fail_return', $failURL);
        // $this->paypal_lib->add_field('notify_url', $notifyURL);
        // $this->paypal_lib->add_field('item_name', $product['name']);
        // $this->paypal_lib->add_field('custom', $userID);
        // $this->paypal_lib->add_field('item_number',  $product['id']);
        // $this->paypal_lib->add_field('amount',  $product['price']);        
        // $this->paypal_lib->image($logo);
         
       // $this->paypal_lib->paypal_auto_form();
    //}
 
     function paymentSuccess(){
         $paypalInfo = $this->input->post();

        // echo "<pre>";print_r($_POST);
        // print_r($paypalInfo);
        // die();
        //get the transaction data
        
       // $data['item_number'] = $paypalInfo['item_number1']; 
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
       //echo "<pre>"; print_r('hellooooooo'.$paypalInfo); exit;
         
        $paypalInfo = $this->input->post();
        $data['inst_id'] = $paypalInfo['item_name'];
        $data['user_id'] = $paypalInfo['custom'];
        $data['product_id'] = $paypalInfo["item_number"];
        $data['booking_dates'] = $paypalInfo["created"];
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
            //echo $this->db->last_query();exit;
        }
    }
}