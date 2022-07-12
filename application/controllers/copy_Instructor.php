<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends CI_Controller 

{

  function __construct()
  {

    parent::__construct();    

    $this->load->model('Generalmodel');

    date_default_timezone_set('Asia/Kolkata');

    ob_start();
  }

  public function checkSession()
  {

    if ($this->session->userdata('instructor_session') == '') 

    {

      redirect('Driving');

    }
  }

	public function signup()
	{
      if($this->form_validation->run('instructor_signup') == True)
        {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $pwd = md5($this->input->post('pwd'));
        $mobile = $this->input->post('mobile');
        $dob = $this->input->post('dob');
        $gender = $this->input->post('gender');
        $category = $this->input->post('cat');
        $address = $this->input->post('address');
        $post_code = $this->input->post('pin');
        $license = $this->input->post('license_no');
        $date = date('Y-m-d');

        $checkemail = $this->Generalmodel->get_all_where('instructor_details',array('email'=>$email));
        $checklicence = $this->Generalmodel->get_all_where('instructor_details',array('licence_no'=>$license));
        
        if(empty($checklicence)){
        	if(empty($checkemail))
        	{
		
	        $config['file_name'] = time().$_FILES['photo']['name'];
	        $config['upload_path'] = './uploads/';
	        $config['allowed_types'] = 'gif|jpg|png';
		    $config['max_size'] = '10000';
		    $config['max_width']  = '1024';
	        $config['max_height']  = '768';
	        $config['overwrite'] = TRUE;
	        $config['encrypt_name'] = FALSE;
	        $config['remove_spaces'] = TRUE;
	        //if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
	        $this->upload->initialize($config);
	        $insertdata['licence_photo'] = "";
	        //$this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('photo')) {
	            echo 'Error on Upload Image..' ;
	        } else {
	            $img = array('upload_data' => $this->upload->data());
	            $insertdata['licence_photo'] = $img['upload_data']['file_name'];
		       }
	        $imgdata = $insertdata['licence_photo'];
	        $insertdata = [
	          				'name'=>$name,
	          				'email'=>$email,
	          				'mobile'=>$mobile,
		          		    'dob'=>$dob,
			                'gender'=>$gender,
	        		        'category'=>$category,
		              		'password'=>$pwd,
	          				'address'=>$address,
	          				'post_code'=>$post_code,
	          				'licence_no'=>$license,
			                'licence_photo'=>$imgdata,
	          				'create_date'=>$date	
	        			];
	        $res = $this->Generalmodel->add('instructor_details',$insertdata);
	        $last_insertid = $this->db->insert_id();
	        //echo "id= ".$last_insertid;exit; 
	        if($res)
	          {
	            // $this->email->from('support@dvdrivingschool.com', 'DV Driving School');
	            // $this->email->to($email);
	            // $this->email->subject('Verification Mail From DV Driving School');
	            // $this->email->message('https://testpnp.ml/driving/Instructor/VerificationEmail/'.$last_insertid);
	            // $this->email->send();

		        $urls = base_url().'Instructor/VerificationEmail/'.$last_insertid;
	            $compemail = 'info@dvdrive.co.uk';
		        $client_email = $email;
	            $compname = 'DV Driving School';
	            $subject = 'Verification Mail From DV Driving School';
	            $msg = "Please Click the Link for Verify your Email - ".$urls;
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
	                //,CURLOPT_FOLLOWLOCATION => true
	                ));
	                //get response
	                $output = curl_exec($ch);
	                curl_close($ch);
	                $this->session->set_flashdata('verifymail','Please Verify Your Email ID. Then Login!');
	    	    	redirect('Instructor/login');
		        }
	          else
		        {
		            $this->session->set_flashdata('datainsert','Data Is Not Inserted Please Try Again !');
	    	    	redirect('Instructor/signin');
		        }        
		    }
		    else
		    {
		    	$this->session->set_flashdata('checkemail','This Email ID is already exist!');
	    	    $data['login_failed'] = True; 
	    	    redirect('Instructor/signin');
		    }    
        }  
        else
		    {
		    	$this->session->set_flashdata('checklicence','This License Number is already exist!');
	    	    $data['login_failed'] = True; 
	    	    redirect('Instructor/signin');
		    }
        }
        else
        {
          $data['login_failed'] = True; 
          $this->load->view('frontend/header');  
	      $this->load->view('frontend/signin',$data);
          $this->load->view('frontend/footer');
      	}
  }	

  public function VerificationEmail($id)
  {



    $res = $this->Generalmodel->updateData('instructor_details',array('status'=> 1 ),array('id'=>$id));



    $data['login_failed'] = True; 



    $this->session->set_flashdata('mailverified','Your Email Id is Verified Please Login! ');



    $this->load->view('frontend/header');



    $this->load->view('frontend/login',$data);



    $this->load->view('frontend/footer');
  }

  public function signin()
	{
    $this->load->view('frontend/header');
	  $this->load->view('frontend/signin');
    $this->load->view('frontend/footer');
  }

  public function login()
  {
    if($this->form_validation->run('instructor_login') == True)
      {
          $email = $this->input->post('email');
          $pwd = $this->input->post('pwd');
          $res = $this->Generalmodel->checklogin('instructor_details',array('status'=> 1, 'email'=>$email,'password'=>md5($pwd)));
          if(!empty($res))
          {
            $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('status'=> 1, 'email'=>$email,'password'=>md5($pwd)));
            //echo "<pre>";print_r($data);exit;
            $this->session->set_userdata('instructor_session',$data);
            $result = $this->session->userdata('instructor_session');
            //echo "<pre>";print_r($result);exit;
            $id = $data['res'][0]['id'];
            $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));
            $data['result_time'] = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $id));
           
            $config = array();
            $config["base_url"] = base_url() . "Instructor/login";
            $config["total_rows"] = $this->Generalmodel->get_count('payments',array('inst_id'=> $id));
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
            $data['bookings_details'] = $this->Generalmodel->get_data_limits('payments',array('inst_id'=>$id),'3',$page);
            
            
            if(empty($data['result_time']))
            {
              $this->session->set_userdata('nobookings','No Bookings Available');
            }

            //echo "<pre>";print_r($data['result_time']);exit;
            $this->load->view('frontend/header');
            $this->load->view('frontend/Instructorprofile',$data);
            $this->load->view('frontend/footer');    
          }
          else
          {
            $data['login_failed'] = True; 
            $checkstatuss = $this->Generalmodel->checklogin('instructor_details',array('status'=> 0, 'email'=>$email,'password'=>md5($pwd)));
            if(!empty($checkstatuss))
            {
                //$data['loginstatusmsg'] = "Plese Verify Your Email ";
                $this->session->set_flashdata('inloginstatusmsg','Plese Verify Your Email ');
            }
            else
            {
                //$data['loginmsg'] = "Type correct Email And Password"; 
                $this->session->set_flashdata('inloginmsg','Type correct Email and password');
            }
            $this->load->view('frontend/header');
            $this->load->view('frontend/login');   
            $this->load->view('frontend/footer');
            //redirect('Instructor/ready');
          }
      } 
      else
      {
        if($this->session->userdata('instructor_session')!='')
        {   
            redirect('Instructor/ready');
        }  
        $data['login_failed'] = True; 
        $this->load->view('frontend/header');
        $this->load->view('frontend/login',$data);
        $this->load->view('frontend/footer');
      }
  }	

  public function ready()
  {
    $this->checkSession();
    $result = $this->session->userdata('instructor_session');
    $id = $result['res'][0]['id'];
    $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $id));
    $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));
    $data['result_time'] = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $id));
    
    $config = array();
    $config["base_url"] = base_url() . "Instructor/login";
    $config["total_rows"] = $this->Generalmodel->get_count('payments',array('inst_id'=> $id));
    $config["per_page"] = 2;
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
    $data['bookings_details'] = $this->Generalmodel->get_data_limits('payments',array('inst_id'=>$id),'2',$page);

    
    if(empty($data['bookings_details']))
    {
        $this->session->set_userdata('nobookings','No Bookings Available');
    }
    //echo "<pre>";print_r($data['result_time']);exit;
    $this->load->view('frontend/header');
    $this->load->view('frontend/Instructorprofile',$data);
    $this->load->view('frontend/footer'); 
  }
  
  public function updateprofile()
  { 
    $id = $this->input->post('id');
    //$email = $this->input->post('email');
    $dob = $this->input->post('dob');
    $mobile = $this->input->post('mobile');
    $gender = $this->input->post('gender');
    $license_no = $this->input->post('license_no');
    $address = $this->input->post('address');
    $pin = $this->input->post('pin');
    $date = date('Y-m-d');

    $updatedata = [
                    'dob' => $dob,
                    'mobile'=>$mobile,
                    'gender' => $gender,
                    'licence_no'=>$license_no,
                    'address'=>$address,
                    'post_code'=>$pin,
                    'update_date'=>$date
                  ];
    $res = $this->Generalmodel->updateData('instructor_details',$updatedata,array('id'=>$id));  
    $data['bookings_details'] = $this->Generalmodel->get_all_where('booking',array('inst_id'=>$id));
    if(!empty($data['bookings_details']))
    {
      $stuid = $data['bookings_details'][0]['id'];
      $data['student_details'] = $this->Generalmodel->get_all_where('student_details',array('id'=>$stuid));
    }  

    if(!empty($res))
      {
        $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('status'=> 1, 'id'=>$id ));
        $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));
        $data['result_time'] = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $id));
        $this->session->set_userdata('instructor_session',$data);
        $result['res'] = $this->session->userdata('instructor_session');
        $this->load->view('frontend/header');
        $this->load->view('frontend/Instructorprofile',$data);
        $this->load->view('frontend/footer');    
        //redirect('Instructor/ready');
      }
    else
      {
        //redirect('Instructor/ready');
        $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('status'=> 1, 'id'=>$id ));
        $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));
        $data['result_time'] = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $id));
        $this->session->set_userdata('instructor_session',$data);
        $result['res'] = $this->session->userdata('instructor_session');
        $this->load->view('frontend/header');
        $this->load->view('frontend/Instructorprofile',$data);
        $this->load->view('frontend/footer');    
      }  
  }

  public function myprofile($id)
  {
    $result['res'] = $this->session->userdata('instructor_session');
    $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=>$id,'status'=> 1));
    $data['bookings_details'] = $this->Generalmodel->get_all_where('booking',array('inst_id'=>$id));
    if(!empty($data['bookings_details']))
    {
      $stuid = $data['bookings_details'][0]['id'];
      $data['student_details'] = $this->Generalmodel->get_all_where('student_details',array('id'=>$stuid));
    }
    $this->load->view('frontend/header');
    $this->load->view('frontend/editmyprofile',$data);
    $this->load->view('frontend/footer');
  }

  public function Changepwd($id)
  {
    $this->checkSession();
    $inst_id['id'] = $id;
    $this->load->view('frontend/header');
    $this->load->view('frontend/change_pwd',$inst_id);
    $this->load->view('frontend/footer');    
  }

  public function updatechangepwd()
  {



    $id = $this->input->post('id');



    if($this->form_validation->run('change_password') == True)



    {



      $npwd = $this->input->post('n_pwd');



      $res = $this->Generalmodel->updateData('instructor_details',array('password'=>md5($npwd)),array('id'=>$id));



      $this->load->view('frontend/header');



      $this->load->view('frontend/myaccount');



      $this->load->view('frontend/footer');



    }



    else



    {
      $inst_id['id'] = $id;
      $this->load->view('frontend/header');
      $this->load->view('frontend/change_pwd',$inst_id);
      $this->load->view('frontend/footer');
    }
  }

  public function InsertautoCharges()
  {
    if(!empty($_POST))
    {
      $inst_id = $this->input->post('inst_id');
      $a_monday = $this->input->post('a_monday');
      $a_tuesday = $this->input->post('a_tuesday');
      $a_wednesday = $this->input->post('a_wednesday');
      $a_thursday = $this->input->post('a_thursday');
      $a_friday = $this->input->post('a_friday');
      $a_saturday = $this->input->post('a_saturday');
      $a_sunday = $this->input->post('a_sunday');
      $date = date('y-m-d');  

      $data = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=>$inst_id));
      if(!empty($data))
      {
        $updatedata = [
                        'inst_id'=>$inst_id,
                        'auto_monday'=>$a_monday,
                        'auto_tuesday'=>$a_tuesday,
                        'auto_wednesday'=>$a_wednesday,
                        'auto_thursday'=>$a_thursday,
                        'auto_friday'=>$a_friday,
                        'auto_saturday'=>$a_saturday,
                        'auto_sunday'=>$a_sunday,
                        'update_date'=>$date
                      ];
         $res = $this->Generalmodel->updateData('instructor_charges',$updatedata,array('inst_id'=>$inst_id));
      }
      else
      {
        $insertdata = [
                        'inst_id'=>$inst_id,
                        'auto_monday'=>$a_monday,
                        'auto_tuesday'=>$a_tuesday,
                        'auto_wednesday'=>$a_wednesday,
                        'auto_thursday'=>$a_thursday,
                        'auto_friday'=>$a_friday,
                        'auto_saturday'=>$a_saturday,
                        'auto_sunday'=>$a_sunday,
                        'create_date'=>$date
                      ];
        $res = $this->Generalmodel->add('instructor_charges',$insertdata);
      }    
      $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $inst_id));
      $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $inst_id)); 
      $this->load->view('frontend/header');
      $this->load->view('frontend/Instructorprofile',$data);
      $this->load->view('frontend/footer'); 
    }
    else
    {
      redirect('Instructor/ready');
    }    
  }

  public function InsertmanualCharges()
  {
    if(!empty($_POST))
    {
      $inst_id = $this->input->post('inst_id');
      $m_monday = $this->input->post('m_monday');
      $m_tuesday = $this->input->post('m_tuesday');
      $m_wednesday = $this->input->post('m_wednesday');
      $m_thursday = $this->input->post('m_thursday');
      $m_friday = $this->input->post('m_friday');
      $m_saturday = $this->input->post('m_saturday');
      $m_sunday = $this->input->post('m_sunday');
      $date = date('y-m-d');  

      $data = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=>$inst_id));
      if(!empty($data))
      {
        $updatedata = [
                        'inst_id'=>$inst_id,
                        'manual_monday'=>$m_monday,
                        'manual_tuesday'=>$m_tuesday,
                        'manual_wednesday'=>$m_wednesday,
                        'manual_thursday'=>$m_thursday,
                        'manual_friday'=>$m_friday,
                        'manual_saturday'=>$m_saturday,
                        'manual_sunday'=>$m_sunday,
                        'update_date'=>$date
                      ];
         $res = $this->Generalmodel->updateData('instructor_charges',$updatedata,array('inst_id'=>$inst_id));
      }
      else
      {
        $insertdata = [
                        'inst_id'=>$inst_id,
                        'manual_monday'=>$m_monday,
                        'manual_tuesday'=>$m_tuesday,
                        'manual_wednesday'=>$m_wednesday,
                        'manual_thursday'=>$m_thursday,
                        'manual_friday'=>$m_friday,
                        'manual_saturday'=>$m_saturday,
                        'manual_sunday'=>$m_sunday,
                        'create_date'=>$date
                      ];
        $res = $this->Generalmodel->add('instructor_charges',$insertdata);
      }    
      $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $inst_id));
      $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $inst_id)); 
      $this->load->view('frontend/header');
      $this->load->view('frontend/Instructorprofile',$data);
      $this->load->view('frontend/footer'); 
    }
    else
    {
      redirect('Instructor/ready');
    }    
  }

  public function InsertCharges()
  {
  	if(!empty($_POST))
  	{
	    $inst_id = $this->input->post('inst_id');
	    $a_monday = $this->input->post('a_monday');
	    $a_tuesday = $this->input->post('a_tuesday');
	    $a_wednesday = $this->input->post('a_wednesday');
	    $a_thursday = $this->input->post('a_thursday');
	    $a_friday = $this->input->post('a_friday');
	    $a_saturday = $this->input->post('a_saturday');
	    $a_sunday = $this->input->post('a_sunday');
	    $m_monday = $this->input->post('m_monday');
	    $m_tuesday = $this->input->post('m_tuesday');
	    $m_wednesday = $this->input->post('m_wednesday');
	    $m_thursday = $this->input->post('m_thursday');
	    $m_friday = $this->input->post('m_friday');
	    $m_saturday = $this->input->post('m_saturday');
	    $m_sunday = $this->input->post('m_sunday');
	    $date = date('y-m-d');  

	    $data = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=>$inst_id));
	    if(!empty($data))
	    {
	      $updatedata = [
	                      'inst_id'=>$inst_id,
	                      'auto_monday'=>$a_monday,
	                      'auto_tuesday'=>$a_tuesday,
	                      'auto_wednesday'=>$a_wednesday,
	                      'auto_thursday'=>$a_thursday,
	                      'auto_friday'=>$a_friday,
	                      'auto_saturday'=>$a_saturday,
	                      'auto_sunday'=>$a_sunday,
	                      'manual_monday'=>$m_monday,
	                      'manual_tuesday'=>$m_tuesday,
	                      'manual_wednesday'=>$m_wednesday,
	                      'manual_thursday'=>$m_thursday,
	                      'manual_friday'=>$m_friday,
	                      'manual_saturday'=>$m_saturday,
	                      'manual_sunday'=>$m_sunday,
	                      'update_date'=>$date
	                    ];
	       $res = $this->Generalmodel->updateData('instructor_charges',$updatedata,array('inst_id'=>$inst_id));
	    }
	    else
	    {
	      $insertdata = [
	                      'inst_id'=>$inst_id,
	                      'auto_monday'=>$a_monday,
	                      'auto_tuesday'=>$a_tuesday,
	                      'auto_wednesday'=>$a_wednesday,
	                      'auto_thursday'=>$a_thursday,
	                      'auto_friday'=>$a_friday,
	                      'auto_saturday'=>$a_saturday,
	                      'auto_sunday'=>$a_sunday,
	                      'manual_monday'=>$m_monday,
	                      'manual_tuesday'=>$m_tuesday,
	                      'manual_wednesday'=>$m_wednesday,
	                      'manual_thursday'=>$m_thursday,
	                      'manual_friday'=>$m_friday,
	                      'manual_saturday'=>$m_saturday,
	                      'manual_sunday'=>$m_sunday,
	                      'create_date'=>$date
	                    ];
	      $res = $this->Generalmodel->add('instructor_charges',$insertdata);
	    }    
	    $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $inst_id));
	    $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $inst_id)); 
	    $this->load->view('frontend/header');
	    $this->load->view('frontend/Instructorprofile',$data);
	    $this->load->view('frontend/footer'); 
	 }
	 else
	 {
		redirect('Instructor/ready');
	 }    
  }

  function instimageupdate()
  {
    $id = $this->input->post('inst_id');
    $config['file_name'] = time().$_FILES['photo']['name'];
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '10000';
    $config['max_width']  = '1024';
    $config['max_height']  = '768';
    $config['overwrite'] = TRUE;
    $config['encrypt_name'] = FALSE;
    $config['remove_spaces'] = TRUE;
    //if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
    $this->upload->initialize($config);
    $insertdata['profile_photo'] = "";
    //$this->load->library('upload', $config);
    if ( ! $this->upload->do_upload('photo')) {
        $this->session->set_flashdata('PorfileImagemsg','Error on Upload Image..Please another Image');
        //redirect("Instructor/myprofile/".$id);
        redirect("Instructor/ready");
    } else {
        $img = array('upload_data' => $this->upload->data());
        $insertdata['profile_photo'] = $img['upload_data']['file_name'];
    }
    $imgdata = $insertdata['profile_photo'];
    $insertdata = ['profile_photo'=>$imgdata];

    $res = $this->Generalmodel->updateData('instructor_details',$insertdata,array('id'=>$id));
   //echo $this->db->last_query();exit;

    $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));
    $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $id));

        $this->load->view('frontend/header');
        $this->load->view('frontend/Instructorprofile',$data);
        $this->load->view('frontend/footer');
  }

  function instlinceupdate()
  {
    $id = $this->input->post('inst_id');
    $config['file_name'] = time().$_FILES['lincephoto']['name'];
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = '10000';
    $config['max_width']  = '1024';
    $config['max_height']  = '768';
    $config['overwrite'] = TRUE;
    $config['encrypt_name'] = FALSE;
    $config['remove_spaces'] = TRUE;
    //if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
    $this->upload->initialize($config);
    $insertdata['licence_photo'] = "";
    //$this->load->library('upload', $config);
    if ( ! $this->upload->do_upload('lincephoto')) { 
        $this->session->set_flashdata('Imagemsg','File Type Is Not Proper...Please Upload another Image');
        $this->session->flashdata('Imagemsg');
        redirect('Instructor/myprofile/'.$id);
    } else {
        $img = array('upload_data' => $this->upload->data());
        $insertdata['licence_photo'] = $img['upload_data']['file_name'];
    }
    $imgdata = $insertdata['licence_photo'];
    $insertdata = ['licence_photo'=>$imgdata]; 
    //print_r($imgdata);exit; 
    $res = $this->Generalmodel->updateData('instructor_details',$insertdata,array('id'=>$id));
    //echo $this->db->last_query();exit;
    redirect('Instructor/myprofile/'.$id);
   
    //$data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));
    //$data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $id))              

        // $this->load->view('frontend/header');
        // $this->load->view('frontend/Instructorprofile',$data);
        // $this->load->view('frontend/footer');
  }

 public function addtimeslot()
  {
        $id = $this->input->post('inst_id');
        $cars = $this->input->post('car');
        $days = $this->input->post('day');
        $times = $this->input->post('time');
        $date = date('Y-m-d');
    
        $timestamp = strtotime($times) + 60*60*2;
        $endtimes = date('H:i', $timestamp);
        
        $checktime = $this->Generalmodel->resDataOrwhere('instructor_time_slots',$id,$days,$times,$endtimes);
        
        if(empty($checktime))
        {   
            $insertdata = [
                          'inst_id'=>$id,
                          'vechical_type'=>$cars,
                          'day'=>$days,
                          'start_time'=>$times,
                          'end_time'=>$endtimes,  
                          'create_date'=>$date
                        ];
            $res = $this->Generalmodel->add('instructor_time_slots',$insertdata);
            $data['Time_Slot'] = True; 
            $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));
            $data['result_time'] = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $id));
            $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $id));
    
            $return = array('success'=>'1','msg'=>'Successfully Added');
            echo json_encode($return);    
        }
        else
        {
            $return  =    array('success'=>'0','msg'=>'On This Day Time is Not Avaiable! Please select the different time to proceed.');
            echo json_encode($return);
        }
    }
    
    public function edittimeslot()
    {
        $timeid = $this->input->post('ids');
        $datas = $this->Generalmodel->get_all_where('instructor_time_slots',array('id'=> $timeid));
        // $id = $data['result_edittime'][0]['inst_id'];
        
        $req = '<td> <input type="hidden" name="editid" id="editid" value=" '. $datas[0]['id'].'" /></td><td><lable>Day</lable> <input type="text" name="editday" id="editdayas" value="'. $datas[0]['day'] .'" disabled/></td><td><lable>Start Time</lable> <input type="time" name="editstarttime" id="editstarttime" value="'. $datas[0]['start_time'] .'" /></td>';
        
        $return = array('success'=>'1','msg'=>$req);
        echo json_encode($return);
        
    }
    
    public function inst_time_edit()
    {
        $timeid = $this->input->post('editid');
        $vectype = $this->input->post('editvtype');
        $statime = $this->input->post('editstarttime');
        
        $timestamp = strtotime($statime) + 60*60*2;
        $endtimes = date('H:i', $timestamp);
        
        $data['result'] = $this->Generalmodel->get_all_where('instructor_time_slots',array('id'=> $timeid));
        $insid = $data['result'][0]['inst_id'];
        $dasys = $data['result'][0]['day'];
        
        $checkUpdatetime = $this->Generalmodel->resDataOrwhereByshiftId('instructor_time_slots',$timeid,$insid,$dasys,$statime,$endtimes);
        //echo $this->db->last_query();exit;
        //echo"<pre>";print_r($checkUpdatetime);exit;

        if($checkUpdatetime)
        {
            $data['Time_Slot'] = True; 
            $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $insid));
            $data['result_time'] = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $insid));
            $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $insid));
    
            $this->session->set_flashdata('upTime','Time slot Updated Successfully..');
                
        }
        else
        {
            $this->session->set_flashdata('notUpTime','This Time Slot Are Not Available On This Day..');
        }
        $this->load->view('frontend/header');
        $this->load->view('frontend/Instructorprofile',$data);
        $this->load->view('frontend/footer');
    }
    
	public function book_classes($id,$day,$cat)
	{	
	    $data['category'] = $cat;
		$data['result_time'] = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $id,'day'=>$day));
        $data['result'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $id));
		$this->load->view('frontend/header');
		$this->load->view('frontend/book-instructor',$data);
		$this->load->view('frontend/footer');
    }  

  // public function show_classes($id)
  // { 
  //   $data['result_time'] = $this->Generalmodel->get_all_whereGroupBy('instructor_time_slots',array('inst_id'=> $id),'day');
  //   $this->load->view('frontend/header');
  //   $this->load->view('frontend/booking_class',$data);
  //   $this->load->view('frontend/footer');
  // }  

    public function book_class_date()
	{	
		$id = $this->input->post('instid');
		$vactype = $this->input->post('vtype');
		$date = $this->input->post('dates');
		$day = date('l', strtotime($date));
		$result = $data['result_time'] = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $id,'day'=>$day));
		
		if($vactype==1)
		{$data['charges'] ="manual_".strtolower($day);}
		if($vactype==2)
		{$data['charges'] ="auto_".strtolower($day);}
		
		if(!empty($result))
		{
			$html = $this->load->view('frontend/show_time',$data,true);
			echo json_encode(array('success'=>'true','jmsg'=>$html,'jdays'=>$day));	
		}
		else
		{
			$html = "<p style='color:red;'>No Time Slots Are Avaiable On This Day Please Select Another Day</p>";
			echo json_encode(array('success'=>'true','jmsg'=>$html,'jdays'=>$day));	
		}
  }

  // public function bookingconfirm($instid)
  // {
  //   if ($this->session->userdata('student_session') == '')
  //   { 
  //     $this->session->set_flashdata('bookedlog','Before Booking Login First..');    
  //     redirect('Student/login');
  //   }
  //   elseif ($this->session->userdata('insturctor_session') != '')
  //   { 
  //     $this->session->set_flashdata('bookedlog','Instructor Are Not Booking The Time Slots..');    
  //     redirect('Instructor/show_classes/'.$instid);
  //   }
  //   else
  //   {
  //     $this->session->set_flashdata('bookedmsg','Booking confirmed..');   
  //     redirect('Instructor/show_classes/'.$instid);  
  //   }
    
  // }
  
   public function test()
     {
         $data['result'] = $this->Generalmodel->resDataOrwhere('instructor_time_slots','12','Sunday','1:00','03:00');
         //echo $this->db->last_query(); exit;
         print_r( $data['result']); 
     }
    
    public function booking_slots()
    {
        $date = $this->input->post('date');
        $time_id = $this->input->post('time');
        $price = $this->input->post('price');
        $ran_id = $this->input->post('rand_id');
        $date = date('Y-m-d');
        
        // if($ran_id)
        // {
        //     $data = $this->Generalmodel->deleteMulti('booking',array('time_id'=>$time_id,'randam_id'=>$ran_id));  
        // }
        
        $result = $this->Generalmodel->get_all_where('booking',array('randam_id'=>$ran_id));
        $randam_id = $result[0]['randam_id'];
        if($randam_id != $ran_id)
        {
            $data = $this->Generalmodel->deleteMulti('booking',array(1=>1));  
        }
        //echo "<pre>";print_r($result[0]['randam_id']);exit;
        $data['res'] = $this->Generalmodel->get_all_where('booking',array('time_id'=>$time_id,'randam_id'=>$ran_id));
        //echo "<pre>";print_r($data['res']);exit;
        if(!empty($data['res']))
        {
            $data = $this->Generalmodel->deleteMulti('booking',array('time_id'=>$time_id,'randam_id'=>$ran_id));  
        }
        else
        {
            $insertdata=[
                        'randam_id'=>$ran_id,
                        'booking_date'=>$date,
                        'time_id'=>$time_id,
                        'price'=>$price,
                        'create_date'=>$date
                        ];
            $res = $this->Generalmodel->add('booking',$insertdata);    
        }
        $dat = ''; 
        $amt='';
        $result = $this->Generalmodel->get_all_where('booking',array('randam_id'=>$ran_id));
        //echo "<pre>";print_r($result);exit;
        if(!empty($result))
        {
            foreach($result as $value)
            {
                $dat .= $value['booking_date'].',';
                $time.=$value['time_id'].',';
                $amt+=$value['price'];
            }
            
            $result = array('success'=>'true','date'=>$dat,'time'=>$time,'amt'=>$amt);
            echo json_encode($result);    
        }
        else
        {
            $result = array('success'=>'false','date'=>$dat);
            echo json_encode($result);
        }
    }
    
    public function deletebookings()
    {
        $data = $this->Generalmodel->deleteMulti('booking',array(1=>1));
        $result = array('success'=>'true','msga'=>'Data Deleted Successfully');
        echo json_encode($result);
    }
}
?>