<?php 
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Driving extends CI_Controller 

{
	function __construct()
	{
		parent::__construct();    
		$this->load->model('Generalmodel');
		date_default_timezone_set('Asia/Kolkata');
	}

	public function index()
	{
	    //$msg = '1';
	   // $encrypted_string = $this->encrypt->encode($msg);
	   // echo $encrypted_string;
	   // $encrypted = $this->encrypt->decode($encrypted_string);
	   // echo '<br>'.$encrypted;e
	   
	   //echo $qw = encoding($msg);
	   //echo decoding($qw);exit;
	    
// 		$data['manual'] = $this->Generalmodel->get_all_where_category('instructor_details',array('category'=> 1),array('category'=> 3,'active_status'=>1));
// 		$data['automatic'] = $this->Generalmodel->get_all_where_category('instructor_details',array('category'=> 2),array('category'=> 3,'active_status'=>1));

        //$condiction1 = "(`category`= 3 OR `active_status`=1)";
        //$condiction2 = "(`category`= 3 OR `active_status`=2)";
        
        $condiction1 = "(`category`= 3 OR `category`=1)";
        $condiction2 = "(`category`= 3 OR `category`=2)";

        $data['manual'] = $this->Generalmodel->get_all_where_category('instructor_details',array('active_status'=>1),$condiction1);
		$data['automatic'] = $this->Generalmodel->get_all_where_category('instructor_details',array('active_status'=>1),$condiction2);


		//echo $this->db->last_query();exit;
    	//$data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));
    	//$data['result_time'] = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $id));

		$this->load->view('frontend/header');
		$this->load->view('frontend/index',$data);
		$this->load->view('frontend/footer');
    }

  	public function login()
	{
	    if($this->session->userdata('student_session')!='')
        {   
            redirect('Student/ready');
        }
        if($this->session->userdata('instructor_session')!='')
        {   
            redirect('Instructor/ready');
        }
		$this->load->view('frontend/header');
		$this->load->view('frontend/login');
		$this->load->view('frontend/footer');
    }

	public function book_class()
	{
		//$data['details'] = $this->Generalmodel->get_all_where('instructor_details',array('active_status'=> 1));
		
		$config = array();
        $config["base_url"] = base_url() . "Driving/book_class";
        $config["total_rows"] = $this->Generalmodel->get_count('instructor_details',array('active_status'=> 1));
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $config['anchor_class'] = 'follow_link';
        
        $this->pagination->initialize($config);

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		//echo "page= ".$page;exit;
		$data["links"] = $this->pagination->create_links();
		//$data['details'] = $this->Generalmodel->get_all_where('instructor_details',array('active_status'=> 1));
		$data['postcode'] = $this->Generalmodel->get_all_whereGroupBy('instructor_postcode',array(1 => 1),'postcode');
        $data['details'] = $this->Generalmodel->get_data_limits('instructor_details',array('active_status'=> 1),'3',$page);
        //echo $this->db->last_query();exit;
        $this->load->view('frontend/header');
		$this->load->view('frontend/book_classs',$data);
		$this->load->view('frontend/footer');
		
    }

    public function searchpostcode()
    {
        $postcode = $this->input->post('postcode');
        $data['secrchCode'] = $postcode;
        $config = array();
        $config["base_url"] = base_url() . "Driving/searchpostcode";
        $config["total_rows"] = $this->Generalmodel->get_count('instructor_details',array('active_status'=> 1));
        //echo $this->db->last_query();exit;
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $config['anchor_class'] = 'follow_link';
        
        $this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		//echo "page= ".$page;exit;
		$data["links"] = $this->pagination->create_links();
        
        $data['res'] = $this->Generalmodel->get_all_whereGroupBy('instructor_postcode',array('postcode'=>$postcode),'inst_id');        
        //echo $this->db->last_query();exit;
        // if(!empty($res)){
        // foreach($res as $value){
        // $inst = $value['inst_id'];
        // //$data['details'] = $this->Generalmodel->get_data_limits('instructor_details',array('active_status'=> 1),'3',$page);
        // $selectData = 'instructor_postcode.prices,instructor_details.name,instructor_details.profile_photo,instructor_details.category,instructor_details.id';
        // $joincondiction = 'instructor_details.id = instructor_postcode.inst_id';
        // $where = "instructor_postcode.inst_id = $inst AND instructor_details.active_status =1";
        // $data['details'] = $this->Generalmodel->getJoinDataTwoTables($selectData,'instructor_details','instructor_postcode',$joincondiction,$where,'3',$page);
        // } }
        
        //echo $this->db->last_query();exit;
        
		$html = $this->load->view('frontend/search_postcode',$data,true);
		echo json_encode(array('success'=>'true','msg'=>$html));
    }

    public function subscribe()
    {	
    	$mail = $this->input->post('sumail');
    	$number = $this->input->post('subnumber');
    	$message = $this->input->post('submessage');
    	
    	$date = date('Y-m-d H:i:s');
    	$insertdata = ['email'=>$mail,'number'=>$number,'message'=>$message,'create_date'=>$date];
    	$res = $this->Generalmodel->add('subcribemail',$insertdata);
    	if($res)
    	{
    		//$urls = base_url().'Instructor/VerificationEmail/'.$last_insertid;
            $compemail = 'info@dvdrive.co.uk';
	        $client_email = $mail;
            $compname = 'DV Driving School';
            $subject = 'Verification Mail From DV Driving School';
            $msg = "Thank you for Subcribe Our Website - ";
            $postData = array(
                'compname' => $compname,
                'subject' => $subject,
                'email' => $compemail,
                'client_email' => $client_email,
                'msg' => $msg
                );
            $url = "http://crmplus.in/developer/mail/sendmail.php";
            $ch = curl_init();
            curl_setopt_array($ch, array(
	            CURLOPT_URL => $url,
	            CURLOPT_RETURNTRANSFER => true,
	            CURLOPT_POST => true,
	            CURLOPT_POSTFIELDS => $postData
            ));
        
        	    $output = curl_exec($ch);
                curl_close($ch);
                $result = array('success'=>'1','submsg'=>'Successfully Submited');
                echo json_encode($result);
	        }
          else
	        {
	            $result = array('success'=>'0','submsg'=>'Try Again');
                echo json_encode($result);
	        } 
    }

    public function covid()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/covid-19');
		$this->load->view('frontend/footer');
    }    

    public function logout() 
	{  
	 	$this->session->unset_userdata('instructor_session');
		$this->session->unset_userdata('student_session');
		redirect('Driving/index');
	}

	public function filter()
	{
	    
	    $pincode = "";
	    if($this->input->post('postcode')){
	        $postcodes = $this->input->post('postcode');
	        $pincode = str_replace(' ', '', $postcodes);
	    }
	    $car="";
	    if($this->input->post('cars')){
	        $car = $this->input->post('cars');     
	   }
		$calender = "";
		if($this->input->post('sr_date')){
		    $calender = $this->input->post('sr_date');    
		}
		
		   //echo $pincode,$car,$calender;exit;
		if($pincode==''){
		 $pincode=" (1=1) ";
		}else{
		$pincode="`instructor_postcode`.`postcode` LIKE '".'%'.$pincode.'%'."'";
		}
		$cars=" (1=1) ";
		if($car!='volvo'){
		    
		    if($car == 'Manual'){
    			$cars=" `instructor_details`.`category` = '1' ";  
    		}
    		else {
    			$cars=" `instructor_details`.`category` = '2' ";  
    		} 
		}
		if($calender =='')
		{
		   $calender ="(1=1)";
		} else {
		    $day = date('l', strtotime($calender));
		   $calender="`instructor_time_slots`.`day` = '$day'";  
		}  
		
		$this->session->set_userdata('vtype',$car);
		$dats = $this->input->post('sr_date');
		$this->session->set_userdata('seday',$dats);
		$day = date('l', strtotime($dats));
		$data['dais'] = $day;
		
		$a_day = $data['a_day'] = 'auto_'.$day;
		$m_day = $data['m_day'] = 'manual_'.$day;


		$select = "instructor_postcode.postcode as instr_postcode,instructor_details.id as instructor_id, instructor_details.profile_photo as instructor_profile_photo, instructor_details.name as instructor_name, instructor_details.category as instructor_category, instructor_charges.$a_day as instructor_$a_day, instructor_charges.$m_day as instructor_$m_day,instructor_time_slots.day as instructor_day";
		
		$wh = " $calender AND $pincode AND instructor_details.active_status = 1 AND ($cars OR instructor_details.category = 3)";
		
	    $result = $data['details'] = $this->db->select($select)->from('instructor_details')
        ->join('instructor_charges','instructor_charges.inst_id = instructor_details.id')
        ->join('instructor_postcode','instructor_postcode.inst_id = instructor_details.id')
        ->join('instructor_time_slots','instructor_time_slots.inst_id = instructor_details.id')
        ->where($wh)
        ->group_by('instructor_details.id')
        ->get()->result();

	    //print_r($this->db->last_query()); exit;
	   
		if(empty($data['details']))
		{ 
			$this->session->set_flashdata('nodatas','Data Is Not Found in This Search Please Try Another Search');
			$this->session->flashdata('nodatas');
		}
		else
		{
		    $this->session->set_flashdata('nodatas','Data Found');
		    $this->session->flashdata('nodatas');
		}
		$this->load->view('frontend/header');
		$this->load->view('frontend/instructor-details',$data);
		$this->load->view('frontend/footer');

	} 
	
	
    public function pp()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/Privacy-Policy');
		$this->load->view('frontend/footer');
    }
    // this is for instructor
    public function tt()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/term');
		$this->load->view('frontend/footer');
    }
	// this is for student
	public function tt2()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/term2');
		$this->load->view('frontend/footer');
    }
    
}
?>