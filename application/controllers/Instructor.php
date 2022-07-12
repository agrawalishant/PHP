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
        $pwd = $this->input->post('pwd');
        $mobile = $this->input->post('mobile');
        $dob = $this->input->post('dob');
        $newDate = date("Y-m-d", strtotime($dob));
        $gender = $this->input->post('gender');
        $category = $this->input->post('cat');
        $address = $this->input->post('address');
        $post_code = $this->input->post('pin');
        $license = $this->input->post('license_no');
        $date = date('Y-m-d');
        //$captcha = $this->input->post('instcaptcha');
        $captcha = '1';
        $sescapt = $this->session->userdata('captchainstid');

            if(trim($captcha)==1)
            {
                $this->session->unset_userdata('captchainstid');    
                $checkemail = $this->Generalmodel->get_all_where('instructor_details',array('email'=>$email));
                $checklicence = $this->Generalmodel->get_all_where('instructor_details',array('licence_no'=>$license));
                
                if(empty($checklicence))
                {
                	if(empty($checkemail))
                	{
        		
        	        $config['file_name'] = time().$_FILES['photo']['name'];
        	        //echo $config['file_name'];exit;
        	        $config['upload_path'] = './uploads/';
        	        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|PNG|JPG|GIF';
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
        	        if ( ! $this->upload->do_upload('photo'))
        	        {
        	            echo 'Error on Upload Image..' ;
        	        }
        	        else
        	        {
        	            $img = array('upload_data' => $this->upload->data());
        	            $insertdata['licence_photo'] = $img['upload_data']['file_name'];
        		    }
        	        $imgdata = $insertdata['licence_photo'];
        	        $insertdata = [
        	          				'name'=>$name,
        	          				'email'=>$email,
        	          				'mobile'=>$mobile,
        		          		    'dob'=>$newDate,
        			                'gender'=>$gender,
        	        		        'category'=>$category,
        		              		'password'=>md5($pwd),
        		              		'passward'=>$pwd,
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
        
        		        $urls = base_url().'Verification-Email/'.$last_insertid;
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
    	    	$this->session->set_flashdata('checkcapt','Captcha Does Not Matched..');
        	    $data['login_failed'] = True; 
        	    
        	    redirect('Instructor/signin');
    	    }
        }    
        else
        {
            
          $data['login_failed'] = 'Failed'; 
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
            $data['hoilres'] = $this->Generalmodel->get_all_where('inst_holiday',array('inst_id'=> $id));
           $data['result_postcode'] = $this->Generalmodel->get_all_where('instructor_postcode',array('inst_id'=> $id));
           
    //         $config = array();
    //         $config["base_url"] = base_url() . "Instructor/login";
    //         $config["total_rows"] = $this->Generalmodel->get_count('payments',array('inst_id'=> $id));
    //         $config["per_page"] = 3;
    //         $config["uri_segment"] = 3;
    //         $config['full_tag_open'] = '<div><ul class="pagination">';
    //         $config['full_tag_close'] = '</ul></div><!--pagination-->';
    //         $config['first_link'] = '&laquo; First';
    //         $config['first_tag_open'] = '<li class="prev page">';
    //         $config['first_tag_close'] = '</li>';
    //         $config['last_link'] = 'Last &raquo;';
    //         $config['last_tag_open'] = '<li class="next page">';
    //         $config['last_tag_close'] = '</li>';
    //         $config['next_link'] = 'Next &rarr;';
    //         $config['next_tag_open'] = '<li class="next page">';
    //         $config['next_tag_close'] = '</li>';
    //         $config['prev_link'] = '&larr; Previous';
    //         $config['prev_tag_open'] = '<li class="prev page">';
    //         $config['prev_tag_close'] = '</li>';
    //         $config['cur_tag_open'] = '<li class="active"><a href="">';
    //         $config['cur_tag_close'] = '</a></li>';
    //         $config['num_tag_open'] = '<li class="page">';
    //         $config['num_tag_close'] = '</li>';
    //         $config['anchor_class'] = 'follow_link';
            
    //         $this->pagination->initialize($config);
    
    // 		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
    		//echo "page= ".$page;exit;
    		//$data["links"] = $this->pagination->create_links();
            //$data['bookings_details'] = $this->Generalmodel->get_data_limits('payments',array('inst_id'=>$id),'3',$page);
            $data['bookings_details'] = $this->Generalmodel->get_all_where_orderby('payments',array('inst_id'=>$id,'delete_status'=>0),'payment_id','DESC');
            //echo $this->db->last_query();exit;
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
            $data['login_failed'] = 'Failed'; 
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
            $this->load->view('frontend/login',$data);   
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

  public function ready($par1=null,$par2=null)
  {
      if($par1 == 'delete')
      {
        $this->Generalmodel->deleteMulti('instructor_time_slots',array('id'=>$par2));
         redirect(base_url().'Instructor-Ready?tab=TIMESLOT','refresh');
      }
       if($par1 == 'update')
      { 
        $postcode = $this->input->post('postcode');
        $prices = $this->input->post('prices');
        $res = $this->Generalmodel->get_all_where('instructor_postcode',array('inst_id'=> $par2,'postcode'=>$postcode));
        //echo $this->db->last_query();exit;
        //echo '<pre>';print_r($res);exit;
        if(!empty($res))
        {
            //if($res[0]['postcode'] == $postcode)
            $updatedata = ['prices' => $prices ];
            $res = $this->Generalmodel->updateData('instructor_postcode',$updatedata,array('id'=>$par2));
        }
        else
        {
            $updatedata = ['postcode' => $postcode, 'prices' => $prices ];
            $res = $this->Generalmodel->updateData('instructor_postcode',$updatedata,array('id'=>$par2));
            //echo $this->db->last_query();exit;
        }
        redirect(base_url().'Instructor-Ready?tab=POSTCODE','refresh');
      }
    $this->checkSession();
    $result = $this->session->userdata('instructor_session');
    $id = $result['res'][0]['id'];
    $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $id));
    $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));
    $data['result_time'] = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $id));
    $data['hoilres'] = $this->Generalmodel->get_all_where('inst_holiday',array('inst_id'=> $id));
    $data['result_postcode'] = $this->Generalmodel->get_all_where('instructor_postcode',array('inst_id'=> $id));
    
//     $config = array();
//     $config["base_url"] = base_url() . "Instructor/login";
//     $config["total_rows"] = $this->Generalmodel->get_count('payments',array('inst_id'=> $id));
//     $config["per_page"] = 2;
//     $config["uri_segment"] = 3;
//     $config['full_tag_open'] = '<div><ul class="pagination">';
//     $config['full_tag_close'] = '</ul></div><!--pagination-->';
//     $config['first_link'] = '&laquo; First';
//     $config['first_tag_open'] = '<li class="prev page">';
//     $config['first_tag_close'] = '</li>';
//     $config['last_link'] = 'Last &raquo;';
//     $config['last_tag_open'] = '<li class="next page">';
//     $config['last_tag_close'] = '</li>';
//     $config['next_link'] = 'Next &rarr;';
//     $config['next_tag_open'] = '<li class="next page">';
//     $config['next_tag_close'] = '</li>';
//     $config['prev_link'] = '&larr; Previous';
//     $config['prev_tag_open'] = '<li class="prev page">';
//     $config['prev_tag_close'] = '</li>';
//     $config['cur_tag_open'] = '<li class="active"><a href="">';
//     $config['cur_tag_close'] = '</a></li>';
//     $config['num_tag_open'] = '<li class="page">';
//     $config['num_tag_close'] = '</li>';
//     $config['anchor_class'] = 'follow_link';
    
//     $this->pagination->initialize($config);

// 	$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
// 	//echo "page= ".$page;exit;
// 	$data["links"] = $this->pagination->create_links();
    //$data['bookings_details'] = $this->Generalmodel->get_data_limits('payments',array('inst_id'=>$id),'2',$page);
    $data['bookings_details'] = $this->Generalmodel->get_all_where_orderby('payments',array('inst_id'=>$id,'delete_status'=>'0'),'payment_id','DESC');
    
    if(empty($data['bookings_details']))
    {
        $this->session->set_userdata('nobookings','No Bookings Available');
    }
    //echo "<pre>";print_r($data['result_time']);exit;
    //redirect('Instructor-Ready?tab=PROFILE');
     $this->load->view('frontend/header');
     $this->load->view('frontend/Instructorprofile',$data);
     $this->load->view('frontend/footer'); 
  }
  
  public function updateprofile()
  { 
    $id = $this->input->post('id');
    //$email = $this->input->post('email');
    $dob = $this->input->post('dob');
    $newDate = date("Y-m-d", strtotime($dob));
    $mobile = $this->input->post('mobile');
    $gender = $this->input->post('gender');
    $license_no = $this->input->post('license_no');
    $address = $this->input->post('address');
    $pin = $this->input->post('pin');
    $acname = $this->input->post('acname');
    $acnumber = $this->input->post('acnumber');
    $bkname = $this->input->post('bkname');
    $ifsc = $this->input->post('ifsc');
    $date = date('Y-m-d');

    $updatedata = [
                    'dob' => $newDate,
                    'mobile'=>$mobile,
                    'gender' => $gender,
                    'licence_no'=>$license_no,
                    'address'=>$address,
                    'post_code'=>$pin,
                    'ac_name'=>$acname,
                    'ac_number'=>$acnumber,
                    'bk_name'=>$bkname,
                    'ifsc'=>$ifsc,
                    'update_date'=>$date
                  ];
    $res = $this->Generalmodel->updateData('instructor_details',$updatedata,array('id'=>$id));  
    //$data['bookings_details'] = $this->Generalmodel->get_all_where('booking',array('inst_id'=>$id));
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
        $data['result_postcodee'] = $this->Generalmodel->get_all_where('instructor_postcode',array('inst_id'=> $id));
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
        
        //redirect('Instructor-Ready?tab=PROFILE');
        
        $this->load->view('frontend/header');
        $this->load->view('frontend/Instructorprofile',$data);
        $this->load->view('frontend/footer');    
      }  
  }

  public function myprofile($idn)
  { 
      $id= decoding($idn);
    $result['res'] = $this->session->userdata('instructor_session');
    $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=>$id,'status'=> 1));
    $data['result_postcode'] = $this->Generalmodel->get_all_where('instructor_postcode',array('inst_id'=>$id));
    //$data['bookings_details'] = $this->Generalmodel->get_all_where('booking',array('inst_id'=>$id));
    // if(!empty($data['bookings_details']))
    // {
    //   $stuid = $data['bookings_details'][0]['id'];
    //   $data['student_details'] = $this->Generalmodel->get_all_where('student_details',array('id'=>$stuid));
    // }
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
      $data['result_postcode'] = $this->Generalmodel->get_all_where('instructor_postcode',array('inst_id'=> $inst_id));
      $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $inst_id)); 
     redirect('Instructor-Ready?tab=PROFILE');
      /*
      $this->load->view('frontend/header');
      $this->load->view('frontend/Instructorprofile',$data);
      $this->load->view('frontend/footer'); 
      */
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
	    redirect('Instructor-Ready?tab=PROFILE');
	    /*
	    $this->load->view('frontend/header');
	    $this->load->view('frontend/Instructorprofile',$data);
	    $this->load->view('frontend/footer'); 
	    */
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
    $data['result_postcode'] = $this->Generalmodel->get_all_where('instructor_postcode',array('inst_id'=> $id));
    
        redirect('Instructor-Ready?tab=PROFILE');
        
        // $this->load->view('frontend/header');
        // $this->load->view('frontend/Instructorprofile',$data);
        // $this->load->view('frontend/footer');
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

    public function addholidaytimeslot()
    {   
        $id = $this->input->post('inst_id');        //Instructor ID
        $holidate = $this->input->post('date');     //select Start Date
        $enddate = $this->input->post('edate');     // select End Date
        $times = $this->input->post('time');        //timeSlot ID
        $date = date('Y-m-d');
        
        //$day = date('l', strtotime($holidate));
        //$holicheck = $this->checkHolidayData($id,$holidate);
        //echo "<pre>";print_r($holicheck);exit;
        
        $checkholidaystatus = $this->Generalmodel->holidaycheckstatus('inst_holiday',$id,$holidate,$enddate);
        //print_r($checkholidaystatus);exit;
        if(!empty($checkholidaystatus))
        {   
            if($holidate==$enddate && $times!=0)
            {
                $day = date('l', strtotime($holidate));
                $timids = array();
                $allTimeSlots = $this->Generalmodel->getDataByCondictions('instructor_time_slots',array('inst_id'=>$id,'day'=>$day));                
                $tinid = array();
                foreach($allTimeSlots as $req) { $tinid[] = $req['id']; }
                if(!empty($allTimeSlots)){ $idtime = $allTimeSlots[0]['id'];
                    $allTimeSlotsholiday = $this->Generalmodel->getDataByCondictions('inst_holiday',array('inst_id'=>$id));                        
                    $tinidholi = array();
                    foreach($allTimeSlotsholiday as $reqs) { $tinidholi[] = $reqs['timeslot_id']; }  
                    $resultfinal = array_diff($tinid,$tinidholi);
                    //print_r($resultfinal);exit;
                    if(in_array($times,$resultfinal)){
                            //$day = date('l', strtotime($enddate));
                            $Insertdata = [ 
                                    'inst_id' =>$id,
                                    'start_date'=>$holidate,
                                    'end_date'=>$enddate, 
                                    'day'=>$day,
                                    'timeslot_id'=>$times,
                                    'create_date'=>date('Y-m-d')
                                    ];
                            //print_r($Insertdata);exit;        
                            $request = $this->Generalmodel->add('inst_holiday',$Insertdata);  
                            //echo $this->db->last_query();exit;
                            if($request){$return = array('success'=>'true','msg'=>'Successfully Added');}
                            echo json_encode($return);
                    }
                } 
            }
        }
        else
        {
            if($times == 0)
            {
                $Insertdata = [ 
                                'inst_id' =>$id,
                                'start_date'=>$holidate,
                                'end_date'=>$enddate,
                                'day'=>'All',
                                'timeslot_id'=>'All',
                                'create_date'=>date('Y-m-d')
                            ];
                
                $res = $this->Generalmodel->add('inst_holiday',$Insertdata);  
            }
            else
            {
                $day = date('l', strtotime($enddate));
                $Insertdata = [ 
                                'inst_id' =>$id,
                                'start_date'=>$holidate,
                                'end_date'=>$enddate, 
                                'day'=>$day,
                                'timeslot_id'=>$times,
                                'create_date'=>date('Y-m-d')
                            ];
                $res = $this->Generalmodel->add('inst_holiday',$Insertdata);      
            }
            
            if($res)
            {
                $return = array('success'=>'true','msg'=>'Successfully Added');
            }
            else
            {
                $return  = array('success'=>'false','msg'=>'On This Day Time is Not Avaiable! Please select the different time to proceed.');
            }
            echo json_encode($return);
        }
    }
    
    public function deleteholiday()
    {
        $id = $this->input->post('ids');
        $res = $this->Generalmodel->deleteMulti('inst_holiday',array('id'=>$id));
         echo json_encode(array('sucess'=>true));
         //redirect('Instructor-Ready?tab=HOLIDAY');
    }
    
    public function addpostcode()
    {
        $id = $this->input->post('inst_id');
        $codes = $this->input->post('code');
        $prices = $this->input->post('prices');
        $code = str_replace(' ', '', $codes);
        $date = date('Y-m-d');
        
           
        $checkpostcode = $this->Generalmodel->get_all_where('instructor_postcode',array('inst_id'=> $id,'postcode'=>$code));
        if(!empty($checkpostcode))
        {
            $return  = array('success'=>'0','postmsg'=>'Postcode Is Already Exists');
            echo json_encode($return);
        }
        else
        {
            $insertdata = [
                          'inst_id'=>$id,
                          'postcode'=>$code,
                          'create_date'=>$date,
                          'prices'=>$prices
                        ];
                        
            $res = $this->Generalmodel->add('instructor_postcode',$insertdata);
            if($res)
            {
                $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));
                $data['result_time'] = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $id));
                $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $id));
                //$data['result_postcode'] = $this->Generalmodel->get_all_where('instructor_postcode',array('inst_id'=> $id));
                
                $return = array('success'=>'1','msg'=>'Successfully Added');
                echo json_encode($return);    
            }
            else
            {
                $return  = array('success'=>'0','msg'=>'Postcode is not inserted');
                echo json_encode($return);
            }
        }    
    }
    
    public function deletepostcode()
    {
        $id = $this->input->post('ids');
        $res = $this->Generalmodel->deleteMulti('instructor_postcode',array('id'=>$id));
         echo json_encode(array('sucess'=>true));
    }
    
    public function addtimeslot()
    {
        $id = $this->input->post('inst_id');
        $cars = $this->input->post('car');
        $days = $this->input->post('day');
        $time = $this->input->post('time');
        $times = date("H:i", strtotime($time));
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
        
        $req = '<td> <input type="hidden" name="editid" id="editid" value=" '. $datas[0]['id'].'" />
        </td><td><lable>Day</lable> <input type="text" name="editday" id="editdayas" value="'. $datas[0]['day'] .'" disabled/></td>
        <td><lable>Start Time</lable> <input type="time" name="editstarttime" id="editstarttime" value="'. $datas[0]['start_time'] .'" /></td>
        <td><lable>End Time</lable> <input type="time" name="editendtime" id="editendtime" value="'. $datas[0]['end_time'] .'" /></td>
        ';
        
        // $req = '<td> <input type="hidden" name="editid" id="editid" value=" '. $datas[0]['id'].'" /></td><td><lable>Day</lable> <input type="text" name="editday" id="editdayas" value="'. $datas[0]['day'] .'" disabled/></td><td><lable>Start Time</lable> <input type="text" onclick="timepicker(this,a)" name="editstarttime" id="editstarttime" value="'. $datas[0]['start_time'] .'" /></td>';
        
        
        
        $return = array('success'=>'1','msg'=>$req);
        echo json_encode($return);
    }
    
    public function bookingstus()
    {
        $randid = $this->input->post('ran_id');
        //$time_ids = $this->input->post('time');
        //print_r($_POST);exit;
        $data = $this->Generalmodel->get_all_where('booking_confirm',array('randam_id'=> $randid));
        //echo $this->db->last_query();exit;
        
        if(!empty($data))
        {
            foreach($data as $check)
            {
                //echo "<pre>";print_r($check);
                $result = $this->Generalmodel->updateData('instructor_time_slots',array('booking_date'=>$check['booking_date'],'booking_status'=>1),array('id'=> $check['time_id']));    
            }
        
        //echo "<pre>";print_r($data);exit;
       
           //$data = $this->Generalmodel->deleteMulti('booking_confirm',array('randam_id'=> $randid));  
        }
    }
    
    public function holidaystusduplicate()
    {
        $instid = $this->input->post('ids');
        $date = $this->input->post('date');
        $newDate = date("Y-m-d", strtotime($date));
        $day = date('l', strtotime($newDate));
        $html='';
        
        $data = $this->Generalmodel->get_rowcount('instructor_time_slots',array('inst_id'=>$instid,'day'=>$day));
        //echo $this->db->last_query();exit;
        //print_r($data);exit;
        if(!empty($data))
        {
		    $variable = $this->checkSlotData($instid,$date);    //1113(bookings return time_slot_id)
		    $values = implode(',', $variable);
            $holicheck = $this->checkHolidayData($instid,$date); //1150(return time_slot_id)
            //echo "pok = ";print_r($holicheck);exit;
            
            if($values == '' && $holicheck == '')
            {
                $where = "`inst_id`='$instid' AND `day`='$day' AND (1=1)";
                $data = $this->Generalmodel->get_all_where('instructor_time_slots',$where); 
                if(!empty($data))
                {
                    $html = '<option value="0">Select Time</option>';
                    foreach($data as $val)
                    {
                        $html .='<option value="'.$val['id'].'">'.$val['start_time'].' - '.$val['end_time'].'</option>';    
                    }
                    $return = array('success'=>'1','timemsg'=>$html);
                    echo json_encode($return);
                }
            }
            else if(($holicheck != $date && $holicheck != '') || $values != '')
            {
                if($values != '')
    		    {
    		        $where = "`inst_id`= $instid AND `day` = '$day' AND `id` NOT IN ($values)";        
    		        $data = $this->Generalmodel->get_all_where('instructor_time_slots',$where);   
                    
                    if(!empty($data))
                    {
                        $html = '<option value="0">Select Time</option>';
                        foreach($data as $val)
                        {
                            $html .='<option value="'.$val['id'].'">'.$val['start_time'].' - '.$val['end_time'].'</option>';    
                        }
                        $return = array('success'=>'1','timemsg'=>$html);
                        echo json_encode($return);
                    }
    		    }
    		    if($holicheck != '')
    		    {
    		        //$where = "`inst_id`= $instid AND `day` = '$day' AND `id` NOT IN ($holicheck)";        
    		        $where = "`inst_id`= $instid AND `day` = '$day' AND `id` IN ($holicheck)";        
    		        $data = $this->Generalmodel->get_all_where('instructor_time_slots',$where); 
                    //echo $this->db->last_query();exit;
                    if(!empty($data))
                    {
                        $html = '<option value="0">Select Time</option>';
                        foreach($data as $val)
                        {
                            $html .='<option value="'.$val['id'].'">'.$val['start_time'].' - '.$val['end_time'].'</option>';    
                        }
                        $return = array('success'=>'1','timemsg'=>$html);
                        echo json_encode($return);
                    }   
    		    }
    		    else
    		    {
    		        $where = "`inst_id`= $instid AND `day` = '$day' AND `id` NOT IN ($holicheck)";    
    		        $data = $this->Generalmodel->get_all_where('instructor_time_slots',$where);   

                    if(!empty($data))
                    {
                        $html = '<option value="0">Select Time</option>';
                        foreach($data as $val)
                        {
                            $html .='<option value="'.$val['id'].'">'.$val['start_time'].' - '.$val['end_time'].'</option>';    
                        }
                        $return = array('success'=>'1','timemsg'=>$html);
                        echo json_encode($return);
                    }
    		    }
            }
            elseif($holicheck == $date)
    		{
    		    $where = "`inst_id`= $instid AND `day` = '$day'";
    		    $data = $this->Generalmodel->get_all_where('instructor_time_slots',$where);   
                if(!empty($data))
                {
                    $html = '<option value="0">Holiday</option>';
                    foreach($data as $val)
                        {
                            $html .='<option value="'.$val['id'].'">'.$val['start_time'].' - '.$val['end_time'].'</option>';    
                        }
                    $return = array('success'=>'1','timemsg'=>$html);
                    echo json_encode($return);
                }
    		}
        }
        else
        {
            $html .='<option value="0">No Time Slots Avaiable</option>';    
            $return = array('success'=>'1','timemsg'=>$html);
            echo json_encode($return);
        }
    }
    
    public function holidaystus()
    {
        $instid = $this->input->post('ids');
        $date = $this->input->post('date');
        $newDate = date("Y-m-d", strtotime($date));
        $day = date('l', strtotime($newDate));
        $html='';
        
        $data = $this->Generalmodel->get_rowcount('instructor_time_slots',array('inst_id'=>$instid,'day'=>$day));
        if(!empty($data))
        {
		    $variable = $this->checkSlotData($instid,$date);    //1113(bookings return time_slot_id)
		    $values = implode(',', $variable);
		    
            $holicheck = $this->checkHolidayData($instid,$date); //1150(return time_slot_id)
            //echo 'nice= ';print_r($holicheck);exit;
            if($values == '' && $holicheck == '')
            {
                $where = "`inst_id`='$instid' AND `day`='$day' AND (1=1)";
                $data = $this->Generalmodel->get_all_where('instructor_time_slots',$where);   
                //echo $this->db->last_query();
                //echo $this->db->last_query();exit; 
                if(!empty($data))
                {
                    $html = '<option value="0">Select Time</option>';
                    foreach($data as $val)
                    {
                        $html .='<option value="'.$val['id'].'">'.$val['start_time'].' - '.$val['end_time'].'</option>';    
                    }
                    $return = array('success'=>'1','timemsg'=>$html);
                    echo json_encode($return);
                }
            }
            else if(($holicheck != $date AND $holicheck != '') || $values != '')
            {
                if($values != '')
    		    {
    		        $where = "`inst_id`= $instid AND `day` = '$day' AND `id` NOT IN ($values)";        
    		        $data = $this->Generalmodel->get_all_where('instructor_time_slots',$where);   
                    
                    if(!empty($data))
                    {
                        $html = '<option value="0">Select Time</option>';
                        foreach($data as $val)
                        {
                            $html .='<option value="'.$val['id'].'">'.$val['start_time'].' - '.$val['end_time'].'</option>';    
                        }
                        $return = array('success'=>'1','timemsg'=>$html);
                        echo json_encode($return);
                    }
    		    }
    		    else
    		    {
    		        $where = "`inst_id`= $instid AND `day` = '$day' AND `id` IN ($holicheck)";    
    		        $data = $this->Generalmodel->get_all_where('instructor_time_slots',$where);   
                    
                    if(!empty($data))
                    {
                        $html = '<option value="0">Select Time</option>';
                        foreach($data as $val)
                        {
                            $html .='<option value="'.$val['id'].'">'.$val['start_time'].' - '.$val['end_time'].'</option>';    
                        }
                        $return = array('success'=>'1','timemsg'=>$html);
                        echo json_encode($return);
                    }
    		    }
            }
            elseif($holicheck == $date)
    		{
    		    $where = "`inst_id`= $instid AND `day` = '0'";
    		    $data = $this->Generalmodel->get_all_where('instructor_time_slots',$where);   
                    
                if(!empty($data))
                {
                    $html = '<option value="0">Holiday</option>';
                    $return = array('success'=>'1','timemsg'=>$html);
                    echo json_encode($return);
                }
    		}
        }
        else
        {
            $html .='<option value="0">No Time Slots Avaiable</option>';    
            $return = array('success'=>'1','timemsg'=>$html);
            echo json_encode($return);
        }
    }
    
    public function inst_time_edit()
    {
        $timeid = $this->input->post('editid');
        $vectype = $this->input->post('editvtype');
        $statime = $this->input->post('editstarttime');
        $endtime = $this->input->post('editendtime');
        // $timestamp = strtotime($statime) + 60*60*2;
        // $endtimes = date('H:i', $timestamp);
        $endtimes=$endtime;
        
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
        redirect('Instructor-Ready?tab=TIMESLOT');
        // $this->load->view('frontend/header');
        // $this->load->view('frontend/Instructorprofile',$data);
        // $this->load->view('frontend/footer');
    }
    
	public function book_classes($id,$day,$cat,$date)
	{	
	    $id = decoding($id);
	    $day = decoding($day);
	    $cat = decoding($cat);
	    $data['cal_value']=$calender_search_date = decoding($date);
	    $data['category'] = $cat;
	    
	    $variable = $this->checkSlotData($id,$calender_search_date);
		$holicheck = $this->checkHolidayData($id,$calender_search_date);
		//echo "<pre>";print_r($holicheck);exit;
		$values = implode(',', $variable);
	    
	     
		if($values == '' && $holicheck== '')
		{
		    $where = "`inst_id`= $id AND `day` = '$day' AND (1=1)";
		    //$where = "(1=1)";
		}
		elseif(($holicheck != $date AND $holicheck != '') || $values != '')
		{
		    if($values != '')
		    {
		        $where = "`inst_id`= $id AND `day` = '$day' AND `id` NOT IN ($values)";        
		    }
		    else
		    {
		        $where = "`inst_id`= $id AND `day` = '$day' AND `id` IN ($holicheck)";    
		    }
		}
		elseif($holicheck == $date)
		{
		    $where = "`inst_id`= $id AND `day` = '0'";
		}
		
		$data['result_time'] = $this->Generalmodel->get_all_details('instructor_time_slots',$where);
		$data['result'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $id));    
		//echo $this->db->last_query();exit;
		//echo "<pre>";print_r($result);exit;

		$this->load->view('frontend/header');
		$this->load->view('frontend/book-instructor',$data);
		$this->load->view('frontend/footer');
    }  
    
    public function checkSlotData($id,$date)
    {
	
		//$where = "`inst_id`='$id' AND ( `booking_dates` like '$date' OR `booking_dates` like '%,$date,%' )";
		$bookingSlots = array();
 		$where = "`inst_id`='$id' AND ( `booking_dates` like '$date' OR `booking_dates` like '%,$date' OR `booking_dates` like '$date,%' OR `booking_dates` like '%,$date,%' )";
		
		$checkdata = $this->Generalmodel->get_all_where('payments',$where);
		//echo $this->db->last_query();exit;
		//foreach($checkdata as $res){
		if(!empty($checkdata)){
		    $date_array = array();
    		$time_array = array();
    		foreach($checkdata as $re)
    		{
    		    $date_array[] = $re['booking_dates'];
    		    $time_array[] = $re['product_id'];    
    		}
    		$datearr = implode(",",$date_array);
		    $timearr = implode(",",$time_array);
		    $bookingDt=explode(",",$datearr);
		    $bokking_ids=explode(",",$timearr);
		    $all_slots=array();
		    for($i=0;$i<count($bookingDt);$i++){
		        if($bookingDt[$i]==$date){
		            $all_slots[]=$bokking_ids[$i];
		        }
		    }
		    $bookingSlots=array_unique($all_slots);
		}
		//print_r($bookingSlots);
    return $bookingSlots;
    }

    public function checkHolidayData($id,$date)
    //public function checkHolidayData()
    {
        //$id='55';
        //$date='2021-03-29';
	    $returnHoliData = array();
	    $all_slots='';  
	    $holidatas = $this->Generalmodel->get_all_where('inst_holiday',array('inst_id'=>$id));
	    //echo $this->db->last_query();
	    //echo "<pre>";print_r($holidatas);exit;
	    if(!empty($holidatas))
	    {
	        $timid = array();
	        foreach($holidatas as $holisTimeId)
	        {$timid[] = $holisTimeId['timeslot_id'];}$tidmes = implode(',',$timid);
	        foreach($holidatas as $holis)
	        {
    	        $start_date = $holis['start_date'];
    	        $end_date = $holis['end_date'];
    	        //$all_slots=array();
    	        if($start_date == $end_date AND $end_date == $date)
    	        {
                    $day = date('l', strtotime($date));
                    //$timeslot_id = $holis['timeslot_id'];
                    $where = "`inst_id`= $id AND `day`= '$day' AND `id` NOT IN ($tidmes) ";
                    $holidatas = $this->Generalmodel->get_all_where('instructor_time_slots',$where);  
                    //echo $this->db->last_query();exit;
                    //print_r($holidatas[0]['id']);
                    $returnHoliData = array();
                    if(!empty($holidatas)){ foreach ($holidatas as $res) {
                        $returnHoliData[] = $res['id'];
                    }$returnHoliData = implode(',',$returnHoliData);}else{
                        $returnHoliData = 1 ;    
                    }
                    //print_r($returnHoliData);exit;
    	        }
    	        else
    	        {
    	            $array = array();
                    $Variable1 = strtotime($start_date); 
                    $Variable2 = strtotime($end_date); 
                    for ($currentDate = $Variable1; $currentDate <= $Variable2;  
                                            $currentDate += (86400))
                    { 
                        $Store = date('Y-m-d', $currentDate); 
                        $array[] = $Store; 
                    } 
                    $alldate = implode(",",$array); 
                    $bookingDt=explode(",",$alldate);
                    //print_r($bookingDt);exit;
        		 
        		    for($i=0;$i<count($bookingDt);$i++)
        		    {
        		        
        		        if($bookingDt[$i]==$date)
        		        {
        		            $all_slots=$bookingDt[$i];
        		        }
        		    }
        		    // print_r('ijii'.$all_slots);exit;
        		     $returnHoliData = $all_slots;
    	        }
	        }
	        return $returnHoliData;
	    }     
    }    
    
    public function book_class_date()
	{	
		$id = $this->input->post('instid');
		$data['price'] = $this->input->post('price');
		//print_r($_POST);
		//echo $id;exit;
		$vactype = $this->input->post('vtype');
		$date = $this->input->post('dates');
		$data['checkcheckbox'] = $this->input->post('AtoS');
		$day = date('l', strtotime($date));
		//echo $id,$day;
		$daet = strtotime($date);
		
		$variable = $this->checkSlotData($id,$date);
		$holicheck = $this->checkHolidayData($id,$date);
		//echo "<pre>";print_r($holicheck);exit;
		$values = implode(',', $variable);
	
		if($values == '' && $holicheck== '')
		{
		    $where = "`inst_id`= $id AND `day` = '$day' AND (1=1)";
		    //$where = "(1=1)";
		}
		elseif(($holicheck != $date AND $holicheck != '') || $values != '')
		{
		    if($values != '')
		    {
		        $where = "`inst_id`= $id AND `day` = '$day' AND `id` NOT IN ($values)";        
		    }
		    else
		    {
		        $where = "`inst_id`= $id AND `day` = '$day' AND `id` IN ($holicheck)";    
		    }
		}
		elseif($holicheck == $date)
		{
		    $where = "`inst_id`= $id AND `day` = '0'";
		}
		
		$result = $data['result_time'] = $this->Generalmodel->get_all_details('instructor_time_slots',$where);
		
		//echo $this->db->last_query();exit;
		//echo "<pre>";print_r($result);exit;
		
		if($vactype==1 || $vactype==3)
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
        $todaydate = date('Y-m-d');
        //echo $time_id;exit;
        // if($ran_id)
        // {
        //     $data = $this->Generalmodel->deleteMulti('booking',array('time_id'=>$time_id,'randam_id'=>$ran_id));  
        // }
        
        // $result = $this->Generalmodel->get_all_where('booking',array('randam_id'=>$ran_id));
        // $randam_id = $result[0]['randam_id'];
        // if($randam_id != $ran_id)
        // {
        //     $data = $this->Generalmodel->deleteMulti('booking',array(1=>1));  
        // }
        //echo "<pre>";print_r($result[0]['randam_id']);exit;
        
        
        $data['res'] = $this->Generalmodel->get_all_where('booking',array('time_id'=>$time_id,'randam_id'=>$ran_id));
        
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
                        'create_date'=>$todaydate
                        ];
            $stu_id = $this->session->userdata('student_session');
            $st_id = $stu_id['res'][0]['id'];
            $InsertDatas=[
                        'randam_id'=>$ran_id,
                        'booking_date'=>$date,
                        'time_id'=>$time_id,
                        'price'=>$price,
                        'student_id'=>$st_id,
                        'create_date'=>$todaydate
                        ];            
            $res = $this->Generalmodel->add('booking',$insertdata);  
            $res2 = $this->Generalmodel->add('booking_confirm',$InsertDatas);  
        }
        $dat = ''; 
        $time = '';
        $amts=0;
        $result = $this->Generalmodel->get_all_where('booking',array('randam_id'=>$ran_id));
        //echo "<pre>";print_r($result);exit;
        if(!empty($result))
        {
            foreach($result as $value)
            {
                $dat .= $value['booking_date'].',';
                $time.=$value['time_id'].',';
                //$amt+=$value['price'];
                $amt=$amts+$value['price'];
                $amts=$amt;
            }
            
            $result = array('success'=>'true','date'=>$dat,'time'=>$time,'amt'=>$amts,'randam'=>$ran_id);
            echo json_encode($result);  
        }
        else
        {
            $result = array('success'=>'false','date'=>$dat);
            echo json_encode($result);
        }
    }
    
    public function addbookkings()
    {
        $id = $this->input->post('ids');
        $date = $this->input->post('date');
        $times = $this->input->post('time');
        $status = $this->input->post('offline');
        $day = date('l', strtotime($date));
        $timestamp = strtotime($times) + 60*60*2;
        $endtimes = date('H:i', $timestamp);
        $checktime = $this->Generalmodel->resDataOrwherecheckstatus('instructor_time_slots',$id,$day,$times,$endtimes);
        if($checktime)
        {
            $check = $checktime[0]->id;    
            $where =" `id`= $check AND (`booking_status`=1 OR `holiday_status`= 1) ";
            $checkbookingstatus = $this->Generalmodel->get_all_where('instructor_time_slots',$where);
            if(!empty($checkbookingstatus))
            {
                $result = array('success'=>'true','addbokmsg'=>'Instructor Not Available ');
                echo json_encode($result);
            }
            else
            {
                $result = array('success'=>'false','time_id'=>$check);
                echo json_encode($result);
            }
        }
        else
        {
            $result = array('success'=>'true','addbokmsg'=>'This Time Is Not Available');
            echo json_encode($result);
        }
    }
    
    public function cancelBooking($id,$timeslotid)
    {
        $res = $this->Generalmodel->get_all_where('payments',array('payment_id'=>$id));
        $b_date = explode(',',$res[0]['booking_dates']);
        $time = explode(',',$res[0]['product_id']);
        //print_r($time);exit;
        $len = count($time);
        for($i=0;$i<$len;$i++){
            if($timeslotid == $time[$i]){
                $timeslotid = $time[$i];
                $k = $i;
            }
        }
        $bookingdate = $b_date[$k];
        if($len>1)
        {
            if($k!=0)
            {   
                array_splice($time,$k,$k);
                array_splice($b_date,$k,$k);
                //print_r($time);exit;
                //print_r($b_date);
                $bookingDetails = $this->Generalmodel->get_all_where('payments',array('payment_id'=>$id));
                //print_r($bookingDetails);exit;
                $userid = $bookingDetails[0]['user_id'];
                $instid = $bookingDetails[0]['inst_id'];
                $postcode = $bookingDetails[0]['postcode'];
                $payment_gross = $bookingDetails[0]['payment_gross'];
                
                $bookingDetails = $this->Generalmodel->get_all_where('instructor_postcode',array('inst_id'=>$instid,'postcode'=>$postcode));
                $amt = $bookingDetails[0]['prices'];
                $upDate = date('Y-m-d H:i:s');
                $insertdata = [
                                'user_id' => $userid,
                                'inst_id' => $instid,
                                'product_id' => $timeslotid,
                                'postcode' => $postcode,
                                'booking_dates' => $bookingdate,
                                'payment_gross' => $amt,
                                'currency_code' =>'GBP',
                                'delete_status' => '1',
                                'update_date' => $upDate
                            ];
                $res2 = $this->Generalmodel->add('payments',$insertdata);
                
                $updateData['payment_gross'] = $payment_gross - $amt;
                $updateData['product_id'] = implode(',',$time);
                $updateData['booking_dates'] = implode(',',$b_date);
                $res = $this->Generalmodel->updateData('payments',$updateData,array('payment_id'=>$id));
            }
            else
            {  
                array_shift($time);
                array_shift($b_date);
                //print_r($time);exit;
                //print_r($b_date);
                $bookingDetails = $this->Generalmodel->get_all_where('payments',array('payment_id'=>$id));
                //print_r($bookingDetails);exit;
                $userid = $bookingDetails[0]['user_id'];
                $instid = $bookingDetails[0]['inst_id'];
                $postcode = $bookingDetails[0]['postcode'];
                $payment_gross = $bookingDetails[0]['payment_gross'];
                
                $bookingDetails = $this->Generalmodel->get_all_where('instructor_postcode',array('inst_id'=>$instid,'postcode'=>$postcode));
                $amt = $bookingDetails[0]['prices'];
                $upDate = date('Y-m-d H:i:s');
                $insertdata = [
                                'user_id' => $userid,
                                'inst_id' => $instid,
                                'product_id' => $timeslotid,
                                'postcode' => $postcode,
                                'booking_dates' => $bookingdate,
                                'payment_gross' => $amt,
                                'currency_code' =>'GBP',
                                'delete_status' => '1',
                                'update_date' => $upDate
                            ];
                $res2 = $this->Generalmodel->add('payments',$insertdata);
                
                $updateData['payment_gross'] = $payment_gross - $amt;
                $updateData['product_id'] = implode(',',$time);
                $updateData['booking_dates'] = implode(',',$b_date);
                //print_r($updateData);exit;
                $res = $this->Generalmodel->updateData('payments',$updateData,array('payment_id'=>$id));
            }
            if(!empty($res)){
                $this->session->set_flashdata('Cancelbokmsg','Booking Canceld Successfully.');
                $this->session->flashdata('Cancelbokmsg');
            }
            else{
                $this->session->set_flashdata('Cancelbokmsg','Booking is not Canceld.');
                $this->session->flashdata('Cancelbokmsg');
            }
        }
        else
        {
            //$res = $this->Generalmodel->deleteMulti('payments',array('payment_id'=>$id));
            $updateData['delete_status'] = '1';
            $updateData['update_date'] = date('Y-m-d H:i:s');
            $res = $this->Generalmodel->updateData('payments',$updateData,array('payment_id'=>$id));
            if(!empty($res)){
                $this->session->set_flashdata('Cancelbokmsg','Booking Cancel Successfully.');
            }
            else{
                $this->session->set_flashdata('Cancelbokmsg','Booking is not Cancel.');
            }
        }
        redirect('Instructor/ready');
    }
  
    public function addboookkkings()
    {
        $id = $this->input->post('inst_id');
        $stu_id = $this->input->post('stu_id');
        $time_id = $this->input->post('time_id');
        $date = $this->input->post('addbokdate');
        $times = $this->input->post('addboktime');
        
        $day = date('l', strtotime($date));
        $timestamp = strtotime($times) + 60*60*2;
        $endtimes = date('H:i', $timestamp);
        //echo $endtimes;exit; 
       
        $ran_id = 'Addational Booking';
        $price = 'offline';
        $todaydate = date('Y-m-d');
        $insertdata=[
                    'randam_id'=>$ran_id,
                    'booking_date'=>$date,
                    'time_id'=>$time_id,
                    'price'=>$price,
                    'student_id'=>$stu_id,
                    'create_date'=>$todaydate
                    ];
    
        $res2 = $this->Generalmodel->add('booking_confirm',$insertdata);
        $lastid = $this->db->insert_id();
        $updatedata = ['addational_booking_status'=>$lastid];
        $res = $this->Generalmodel->updateData('instructor_time_slots',$updatedata,array('id'=>$time_id));
        if($res)
        {
            $this->session->set_flashdata('adbokmsg','Booking Successfully.');
        }
        else
        {
            $this->session->set_flashdata('adbokmsg','Booking Not Done.');
        }
        redirect('Instructor/ready');
    }
    
    public function cptimg()
	{
	    $code1 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $code = substr(str_shuffle($code1), 0, 4);
		//$code=rand(1000,9999);
		$this->session->set_userdata('captchainstid',$code);
		$stu_cat = $this->session->userdata('captchainstid');
		$im = imagecreatetruecolor(80, 44);
		$bg = imagecolorallocate($im, 22, 86, 165);
		$fg = imagecolorallocate($im, 255, 255, 255);
		//imageTTFCenter($im, $code, 5, 5);	
		imagefill($im, 0, 0, $bg);
		imagestring($im, 5, 5, 5,  $code, $fg);
		header("Cache-Control: no-cache, must-revalidate");
		header('Content-type: image/png');
		imagepng($im);
		echo $im;
		imagedestroy($im);
		

	}	
	
	public function checkstuscaptcha($capt='')
	{
	    //print_r($_POST);
	   // $capt = $this->input->post('captcha');
	    $sescapt = $this->session->userdata('captchainstid');
	    
	    if(trim($sescapt) == trim($capt))
	    {  
	        $html = "<p style='color:green;'>Matched</p>";
            echo json_encode(array('success'=>'true','capmsg'=>$html)); 
	    }
	    else
	    {  
	        //$html = "<p style='color:red;'>Not Matched $sescapt - $capt </p>";
	        $html = "<p style='color:red;'>Not Matched</p>";
            echo json_encode(array('success'=>'false','capmsg'=>$html)); 
	    }
	}
	
	public function checkstatuscaptcha()
	{
	    $capt = $this->input->post('captcha');
	    //echo $capt;exit;
	    $sescapt = $this->session->userdata('captchainstid');
	    
	    
	    if($sescapt == $capt)
	    {
	        $html = "<p style='color:green;'>Matched</p>";
            echo json_encode(array("success"=>"true","capmsg"=>$html)); 
	    }
	    else
	    {
	        $html = "<p style='color:red;'>Not Matched</p>";
            echo json_encode(array('success'=>'false','capmsg'=>$html)); 
	    }
	}
    public function patms()
    {
        echo "success";
    }
    public function patmf()
    {
        echo "failure";
    }
}
?>