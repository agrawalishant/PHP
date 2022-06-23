<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Front_controller extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function checkcoupan()
    {
        $coupancode = $this->input->post('coupancode');
        $total_amt = $this->input->post('amt');
        //print_r($coupancode);exit;
        $todaydate = date('Y-m-d');
        $where  = "`cpn_code` = '$coupancode' AND `cpn_startdate` <= '$todaydate' AND `cpn_enddate` >= '$todaydate'";
        $query=$this->db->where($where)->get('coupan')->result_array();
        
        if(!empty($query))
        {
           $cpn_id = $query[0]['cpn_id'];
           $disc_camt = $query[0]['cpn_amount'];
           if($total_amt > $query[0]['cpn_disc_min_amound'])
           {
               $result = array('success'=>1,'msg'=>"Voila Coupan Applied Discount Amt Is : Rs $disc_camt",'disc_amt'=>" $disc_camt");
           }
           else
           {
               $result = array('success'=>0,'msg'=>"Amount not sufficent Min amount purchase required");
           }
        }else{
          $result = array('success'=>0,'msg'=>"Code Is Expired");
        }


     echo json_encode($result);
     //  $data=array( '' => );
      //  $check=$this->Generalmodel->customQuery('coupan', $data)
    }

    public function prediction_submit()
	{
       
        $data['p_name']=preg_replace('/[^A-Za-z0-9 ]/', '',$this->input->post('p_name'));
        $data['p_gender']=$this->input->post('p_gender');
        $data['p_country']=$this->input->post('p_country');
        $data['p_mobile']=$this->input->post('p_mobile');
        $data['p_dob']=$this->input->post('p_dob');
        $data['p_maritalstatus']=$this->input->post('p_maritalstatus');
        $data['p_birthhour']=$this->input->post('p_birthhour');
        $data['p_mirthminite']=$this->input->post('p_mirthminite');
        $data['p_email']=$this->input->post('p_email');
        $data['p_language']=$this->input->post('p_language');
        $data['p_placeofbirth']=preg_replace('/[^A-Za-z0-9 ]/', '',$this->input->post('p_placeofbirth'));
        
      $this->front_model->common_add('prediction','prediction',$data);
        $this->session->set_flashdata('success','Form Submited Successfully');
       
    
        $pagedata['folder_name'] = 'pages';
        $pagedata['page_title'] = 'Prediction'; 
        $pagedata['page_name'] = 'prediction'; 
        $this->load->view('frontend/landing',$pagedata); 
    
    }
    public function pujaservicedetail()
	{
        $pagedata['folder_name'] = 'pages';
        $pagedata['page_title'] = 'Online Puja Detail';
		$pagedata['page_name'] = 'pujaservicedetails'; 
		$this->load->view('frontend/landing',$pagedata);
    }
    public function aboutus()
	{
        $pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'about'; 
		$this->load->view('frontend/landing',$pagedata);
    }
    public function termandcondition()
	{
        $pagedata['folder_name'] = 'pages';
        $pagedata['page_title'] = 'Terms & Condition';
		$pagedata['page_name'] = 'terms_condition'; 
		$this->load->view('frontend/landing',$pagedata);
    }
    public function privacypolicy()
	{
        $pagedata['folder_name'] = 'pages';
        $pagedata['page_title'] = 'Privacy Policy';
		$pagedata['page_name'] = 'privacy_policy'; 
		$this->load->view('frontend/landing',$pagedata);
    }
    // 100 % completed validation
    public function enquiery_submit()
	{
       
        $this->form_validation->set_rules('enq_name', 'Name', 'required');
        $this->form_validation->set_rules('enq_email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('enq_mobilenumber', 'Mobile No', 'required');
        $this->form_validation->set_rules('enq_relatedto', 'Enquiery', 'required');
        $this->form_validation->set_rules('enq_message', 'Message', 'required');
         
        if ($this->form_validation->run() == True) {
            $data['enq_name']=preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('enq_name'));
            $data['enq_email']=$this->input->post('enq_email');
            $data['enq_relatedto']=$this->input->post('enq_relatedto');
            $data['enq_mobilenumber']=$this->input->post('enq_mobilenumber');
            $data['enq_message']=preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('enq_message'));
        $this->front_model->enquierysubmit($data);
            
        }
        $pagedata['folder_name'] = 'pages';
        $pagedata['page_name'] = 'contact'; 
        $this->load->view('frontend/landing',$pagedata);
    }

    public function horoscopeyearly_landing($ids)
	{
        
        //$id = decoding($ids);
        $pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'rashiall_landing';
		$pagedata['horos_id'] = $ids; 
		$this->load->view('frontend/landing',$pagedata);
    }
    // 100 % form validation complete
    public function kundali_enquiry()
	{
	    $walletAmts =fetchbyresultwhere('kundalicharges',array('id'=>1));
	    $walletAmt = $walletAmts[0]['charges'];
        $data['fkun_name']=preg_replace('/[^A-Za-z0-9 ]/', '',$this->input->post('fkun_name'));
        $data['user_id']=$this->input->post('fkun_userid');
        $data['fkun_mobile']=$this->input->post('fkun_mobile');
        $data['fkun_gender']=$this->input->post('fkun_gender');
        $data['fkun_dob']=$this->input->post('fkun_dob');
        $data['fkun_birth_time']=$this->input->post('fkun_birth_time');
        $data['wallet_pay_amt']=$walletAmt;
        $data['fkun_birth_place']=preg_replace('/[^A-Za-z0-9 ]/', '',$this->input->post('fkun_birth_place'));

        $this->front_model->freekundalienquierysubmit($data);
        $last_id = $this->db->insert_id();
        $insrtdata = [
                        'wlla_recevedby_id' =>$last_id,
                        'wlla_receved_for' =>'Make Kundli',
                        'wlla_amount' =>$walletAmt,
                    ];
        $admin_wall_history = insertdata('wallet_history_admin',$insrtdata);
        $this->session->set_flashdata('msg','Submited Successfully');
        return true;
    }
    

    public function matchmaking_submit()
	{
        $this->form_validation->set_rules('mm_name_first', 'Name', 'required');
        $this->form_validation->set_rules('mm_gender_first', 'Gender', 'required');
        $this->form_validation->set_rules('mm_countrycode_first', 'Country Code', 'required');
        $this->form_validation->set_rules('mm_mobile_first', 'Mobile', 'required');
        $this->form_validation->set_rules('mm_dob_first', 'Dob', 'required');
        $this->form_validation->set_rules('mm_maritalstatus_first', 'Marital Status', 'required');
        $this->form_validation->set_rules('mm_birthhour_first', 'Birth Hours', 'required');
        $this->form_validation->set_rules('mm_birthmin_first', 'Birth Min', 'required');
        $this->form_validation->set_rules('mm_email_first', 'Email', 'required');
        $this->form_validation->set_rules('mm_language_first', 'Language', 'required');
        $this->form_validation->set_rules('mm_birthplace_first', 'Birth place', 'required');
        $this->form_validation->set_rules('mm_name_sec', 'Name', 'required');
        $this->form_validation->set_rules('mm_gender_sec', 'Gender', 'required');
        $this->form_validation->set_rules('mm_countrycode_sec', 'Country Code', 'required');
        $this->form_validation->set_rules('mm_mobile_sec', 'Mobile', 'required');
        $this->form_validation->set_rules('mm_dob_sec', 'Dob', 'required');
        $this->form_validation->set_rules('mm_maritalstatus_sec', 'Marital Status', 'required');
        $this->form_validation->set_rules('mm_birthhour_sec', 'Birth Hours', 'required');
        $this->form_validation->set_rules('mm_birthmin_sec', 'Birth Min', 'required');
        $this->form_validation->set_rules('mm_email_sec', 'Email', 'required');
        $this->form_validation->set_rules('mm_language_sec', 'Language', 'required');
        $this->form_validation->set_rules('mm_birthplace_sec', 'Birth place', 'required');
        if ($this->form_validation->run() == True) {
       

        $data['mm_name_first']=preg_replace('/[^A-Za-z0-9 ]/', '',$this->input->post('mm_name_first'));
        $data['mm_gender_first']=$this->input->post('mm_gender_first');
        $data['mm_countrycode_first']=$this->input->post('mm_countrycode_first');
        $data['mm_mobile_first']=$this->input->post('mm_mobile_first');
        $data['mm_dob_first']=$this->input->post('mm_dob_first');
        $data['mm_maritalstatus_first']=$this->input->post('mm_maritalstatus_first');
        $data['mm_birthhour_first']=$this->input->post('mm_birthhour_first');
        $data['mm_birthmin_first']=$this->input->post('mm_birthmin_first');
        $data['mm_email_first']=$this->input->post('mm_email_first');
        $data['mm_language_first']=$this->input->post('mm_language_first');
        $data['mm_birthplace_first']=$this->input->post('mm_birthplace_first');
        $data['mm_name_sec']=$this->input->post('mm_name_sec');
        $data['mm_gender_sec']=$this->input->post('mm_gender_sec');
        $data['mm_countrycode_sec']=$this->input->post('mm_countrycode_sec');
        $data['mm_mobile_sec']=$this->input->post('mm_mobile_sec');
        $data['mm_dob_sec']=$this->input->post('mm_dob_sec');
        $data['mm_maritalstatus_sec']=$this->input->post('mm_maritalstatus_sec');
        $data['mm_birthhour_sec']=$this->input->post('mm_birthhour_sec');
        $data['mm_birthmin_sec']=$this->input->post('mm_birthmin_sec');
        $data['mm_email_sec']=$this->input->post('mm_email_sec');
        $data['mm_language_sec']=$this->input->post('mm_language_sec');
        $data['mm_birthplace_sec']=preg_replace('/[^A-Za-z0-9 ]/', '',$this->input->post('mm_birthplace_sec'));

        $this->front_model->common_add('matchmaking','match_making',$data);
        $this->session->set_flashdata('success','Submited Successfully');
        return true;
    }
    $pagedata['folder_name'] = 'pages';
        $pagedata['page_name'] = 'match_making'; 
        $this->load->view('frontend/landing',$pagedata); 
    
	}
    
    public function blog()
	{
        $pagedata['folder_name'] = 'pages';
        $pagedata['page_name'] = 'blog_all';
        $pagedata['page_title'] = 'blogs';
		$this->load->view('frontend/landing',$pagedata);
	}

	public function blogs_details($ids="")
	{
        $pagedata['folder_name'] = 'pages';
		//$id = decoding($ids);
        $id=$ids;
        $pagedata['page_name'] = 'blog_detail';
        $pagedata['page_title'] = 'blog_detail';
		$pagedata['sl_id'] = $id; 
		$this->load->view('frontend/landing',$pagedata);
	}
    public function comment_submit($par1="")
	{ 
        
        $this->form_validation->set_rules('comment_name', 'Name', 'required');
        $this->form_validation->set_rules('comment_email', 'Email', 'required');
        $this->form_validation->set_rules('comment_mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('comment_comment', 'Comment', 'required');
        if ($this->form_validation->run() == True) {
        $data['comment_name']=preg_replace('/[^A-Za-z0-9 ]/', '',$this->input->post('comment_name'));
       $data['comment_email']=$this->input->post('comment_email');
       $data['comment_mobile']=$this->input->post('comment_mobile');
       $data['comment_comment']=preg_replace('/[^A-Za-z0-9 ]/', '',$this->input->post('comment_comment'));
       $data['comment_blog_id']=$par1;
     
       $this->front_model->common_add('blogcomment','blog',$data);
       $this->session->set_flashdata('success','Comment Submited Successfully');
        }
        $pagedata['folder_name'] = 'pages';
        $pagedata['page_name'] = 'blog_all';
        $pagedata['page_title'] = 'blogs';
		$this->load->view('frontend/landing',$pagedata);
	}








//-----------------end 
}


?>