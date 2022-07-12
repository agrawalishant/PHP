<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller 
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
    if ($this->session->userdata('student_session') == '' ) 
    {
      redirect('Driving');
    }
  }

    public function paypalStuLogin()
	{
	    
        $email = $this->input->post('email');
        $pwd = $this->input->post('password');
        
        $data['res'] = $this->Generalmodel->get_all_where('student_details',array('email'=>$email,'password'=>md5($pwd)));
        //$data = $this->Generalmodel->get_all_whereaffectedRow('student_details',array('email'=>$email,'status'=>1));
        if(!empty($data['res'])){
            $id = $data['res'][0]['id'];
            $udata = $this->Generalmodel->get_all_whereaffectedRow('student_details',array('id'=>$id,'status'=>1));
            if(!empty($udata))
            {
                $this->session->set_userdata('student_session',$data);
                $this->session->userdata('student_session');
                $html = "<span style='color:green;'>Login Successfully</span>";
                echo json_encode(array('success'=>true,'logmsgok'=>$html,'studentid'=>$id));
            }
            else
            {
                $html = "<span style='color:red;'>Please Verify yor Email</span>";
                echo json_encode(array('success'=>false,'logmsg'=>$html));    
            }
        }else{
            $html = "<span style='color:red;'>Login Password Is Not Correct</span>";
            echo json_encode(array('success'=>false,'logmsg'=>$html));
        }
        
    }

  public function signup()
  {
      if($this->form_validation->run('student_signup') == True)
        {
          $name = $this->input->post('sname');
          $email = $this->input->post('semail');
          $pwd = $this->input->post('spwd');
          $mobile = $this->input->post('smobile');
          $dob = $this->input->post('sdob');
          $newDate = date("Y-m-d", strtotime($dob));
          $gender = $this->input->post('sgender');
          $address = $this->input->post('saddress');
          $post_code = $this->input->post('spin');
          //$captcha = $this->input->post('stucaptcha');
          $captcha = '1';
          $date = date('Y-m-d');
          
            if($captcha == 1)
            {
                $checkemail = $this->Generalmodel->get_all_where('student_details',array('email'=>$email));
                if(empty($checkemail))
                {
                  $insertdata = [
                            'name'=>$name,
                            'email'=>$email,
                            'mobile'=>$mobile,
                            'dob'=>$newDate,
                            'gender'=>$gender,
                            'password'=>md5($pwd),
                            'passward'=>$pwd,
                            'address'=>$address,
                            'post_code'=>$post_code,
                            'created_date'=>$date
                        ];
    
                $res = $this->Generalmodel->add('student_details',$insertdata);
                $last_insertid = $this->db->insert_id();
                if($res)
                {
                  $urls = base_url().'Verification/'.$last_insertid;
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
    
                    $output = curl_exec($ch);
                    curl_close($ch);
                    $this->session->set_flashdata('verifymail','Please Verify Your Email ID. Then Login Here!');
                    redirect('Student/login');
                }
                else
                {
                  echo "Data Not Inserted..";
                }
              }
                else
                {
                  $this->session->set_flashdata('scheckemail','This Email ID is already exist!');
    	    	  redirect('Student/signin');
              }
            }
            else
            {
                $this->session->set_flashdata('checkcaptstu','Captcha Does Not Matched..');
    	    	redirect('Student/signin');
            }
        }
      else
        {
        $this->load->view('frontend/header');  
        $this->load->view('frontend/signin');
        $this->load->view('frontend/footer');
        }
  }



  public function VerificationEmail($id)
  {

    $res = $this->Generalmodel->updateData('student_details',array('status'=> 1 ),array('id'=>$id));

    $this->session->set_flashdata('mailverified','Your Email Id is Verified Please Login! ');

    $this->load->view('frontend/header');

    $this->load->view('frontend/login');

    $this->load->view('frontend/footer');

  }

 public function login()
 {
    if($this->form_validation->run('student_login') == True)
    {
        $email = $this->input->post('semail');
        $pwd = $this->input->post('spwd');
        $res = $this->Generalmodel->checklogin('student_details',array('status'=> 1, 'email'=>$email,'password'=>md5($pwd)));
        //$res = $this->Generalmodel->checklogin('student_details',array('status'=> 1, 'email'=>$email));
        if(!empty($res))
        {
            $data['res'] = $this->Generalmodel->get_all_where('student_details',array('email'=>$email,'password'=>md5($pwd)));
            $id = $data['res'][0]['id'];
        
            $this->session->set_userdata('student_session',$data);
            $result = $this->session->userdata('student_session');
            //$data['result_time'] = $this->Generalmodel->get_all_where('payments',array('user_id'=>$id));
            
            
            $config = array();
            $config["base_url"] = base_url() . "Student/login";
            $config["total_rows"] = $this->Generalmodel->get_count('payments',array('user_id'=> $id));
            $config["per_page"] = 3;
            $config["uri_segment"] = 3;
            $config['full_tag_open'] = '<div><ul class="pagination">';
            $config['full_tag_close'] = '</ul></div><!--pagination-->';
            //$config['first_link'] = '&laquo; First';
            //$config['first_tag_open'] = '<li class="prev page">';
            //$config['first_tag_close'] = '</li>';
            // $config['last_link'] = 'Last &raquo;';
            //$config['last_tag_open'] = '<li class="next page">';
            //$config['last_tag_close'] = '</li>';
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
            $data['result_time'] = $this->Generalmodel->get_data_limits('payments',array('user_id'=>$id),'3',$page);
            //echo $this->db->last_query();exit;
            
            
            
            if(empty($data['result_time']))
            {
              $this->session->set_userdata('nobookings','No Bookings Available');
            }
            $this->load->view('frontend/header');
            $this->load->view('frontend/studentprofile',$data);
            $this->load->view('frontend/footer');     
          }
        else
        {
            $ressult = $this->Generalmodel->checklogin('student_details',array('status'=> 0, 'email'=>$email,'password'=>md5($pwd)));
            if($ressult)
            {
                //$data['loginstatusmsg'] = "Plese Verify Your Email ";
                $this->session->set_flashdata('loginstatusmsg','Plese Verify Your Email ');
            }
            else
            {
                $this->session->set_flashdata('loginmsg','Type correct Email and password');
                //$data['loginmsg'] = "Type correct Email and password";    
            }
            
            $this->load->view('frontend/header');
            $this->load->view('frontend/login'); 
            $this->load->view('frontend/footer');
            //redirect('Student/ready');
          }
    } 
    else
    {
        if($this->session->userdata('student_session')!='')
        {   
            redirect('Student/ready');
        }
        $this->load->view('frontend/header');
        $this->load->view('frontend/login');
        $this->load->view('frontend/footer');
    }
 }

 public function ready()
  {
    $this->checkSession();
    $result = $this->session->userdata('student_session');
    $id = $result['res'][0]['id'];
    $data['res'] = $this->Generalmodel->get_all_where('student_details',array('id'=> $id));
    //$data['result_time'] = $this->Generalmodel->get_all_where('booking',array('stu_id'=>$id));
    //$data['result_time'] = $this->Generalmodel->get_all_where('payments',array('user_id'=>$id));
    
    
    
    $config = array();
    $config["base_url"] = base_url() ."Student/ready";
    $config["total_rows"] = $this->Generalmodel->get_count('payments',array('user_id'=> $id));
    $config["per_page"] = 1;
    $config["uri_segment"] = 3;
    $config['full_tag_open'] = '<div><ul class="pagination">';
    $config['full_tag_close'] = '</ul></div><!--pagination-->';
    // $config['first_link'] = '&laquo; First';
    // $config['first_tag_open'] = '<li class="prev page">';
    // $config['first_tag_close'] = '</li>';
    // $config['last_link'] = 'Last &raquo;';
    // $config['last_tag_open'] = '<li class="next page">';
    // $config['last_tag_close'] = '</li>';
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
    //$data['result_time'] = $this->Generalmodel->get_data_limits('payments',array('user_id'=>$id),'1',$page);
    $data['result_time'] = $this->Generalmodel->get_all_where_orderby('payments',array('user_id'=>$id),'payment_id','DESC');
    //echo $this->db->last_query();exit;
    
    
    if(empty($data['result_time']))
    {
      $this->session->set_userdata('nobookings','No Bookings Available');
    }
    $this->load->view('frontend/header');
    $this->load->view('frontend/studentprofile',$data);
    $this->load->view('frontend/footer'); 
  }

  public function signin()
	{
        $this->load->view('frontend/header');
    	$this->load->view('frontend/signin');
        $this->load->view('frontend/footer');
    }

  public function updateprofile()
  {
    $id = $this->input->post('esid');
    $email = $this->input->post('esemail');
    $dob = $this->input->post('esdob');
    $mobile = $this->input->post('esmobile');
    $gender = $this->input->post('esgender');
    $address = $this->input->post('esaddress');
    $pin = $this->input->post('espin');
    $acname = $this->input->post('acname');
    $acnumber = $this->input->post('acnumber');
    $bkname = $this->input->post('bkname');
    $ifsc = $this->input->post('ifsc');
    $date = date('Y-m-d');

    $updatedata = [
                    'email'=>$email,
                    'dob' => $dob,
                    'mobile'=>$mobile,
                    'gender' => $gender,
                    'address'=>$address,
                    'post_code'=>$pin,
                    'ac_name'=>$acname,
                    'ac_number'=>$acnumber,
                    'bk_name'=>$bkname,
                    'ifsc'=>$ifsc,
                    'modified_date'=>$date
                  ];

    $res = $this->Generalmodel->updateData('student_details',$updatedata,array('id'=>$id));    

    //echo $this->db->last_query();exit;

    // if(!empty($res))
    //   {
        $data['res'] = $this->Generalmodel->get_all_where('student_details',array('status'=> 1, 'id'=>$id ));
        $this->session->set_userdata('student_session',$data);
        $result['res'] = $this->session->userdata('student_session');
        $this->load->view('frontend/header');
        $this->load->view('frontend/studentprofile',$data);
        $this->load->view('frontend/footer');    
      //}

  }

  public function myprofile($id)
  {
    $result['res'] = $this->session->userdata('student_session');
    $data['res'] = $this->Generalmodel->get_all_where('student_details',array('id'=>$id,'status'=> 1));

    // $data['result_time'] = $this->Generalmodel->get_all_where('booking',array('stu_id'=>$id));
    // if(!empty($data['result_time']))
    // {
    //   $instid = $data['result_time'][0]['id'];
    //   $data['inst_result'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=>$instid)); 
    // }

    $this->load->view('frontend/header');
    $this->load->view('frontend/editstudentprofile',$data);
    $this->load->view('frontend/footer');

  }

  public function testmail()
  {

          

          $compemail = 'shikhabkte@gmail.com';

          $client_email = 'agrawalishant286@gmail.com';

          $compname = 'Pnp Infotech';

          $subject = 'Testing Mail From DV Driving School';

          $msg = "Please Click the Link for Verify your Email - "."https://testpnp.ml/driving/Student/VerificationEmail/1";

          

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

            

            print_r($output);

            

            curl_close($ch);

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
        echo 'Error on Upload Image..' ;
    } else {
        $img = array('upload_data' => $this->upload->data());
        $insertdata['profile_photo'] = $img['upload_data']['file_name'];
    }
    $imgdata = $insertdata['profile_photo'];
    $insertdata = ['profile_photo'=>$imgdata];

    $res = $this->Generalmodel->updateData('student_details',$insertdata,array('id'=>$id));
   //echo $this->db->last_query();exit;
    //$data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));
    $data['res'] = $this->Generalmodel->get_all_where('student_details',array('id'=> $id));

    $this->load->view('frontend/header');
    $this->load->view('frontend/studentprofile',$data);
    $this->load->view('frontend/footer');
  }

  public function open_classes($id,$cat,$price,$postcode)
  { 
    $id= decoding($id);
    $cat= decoding($cat);
    $price = decoding($price);
    $data['srcpostcode']= decoding($postcode);
    $data['category'] = $cat; 
    $data['price'] = $price; 
    $data['result_time'] = $this->Generalmodel->get_all_whereGroupBy('instructor_time_slots',array('inst_id'=> $id),'day');
    $data['result'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $id));

    $this->load->view('frontend/header');
    $this->load->view('frontend/booking_class',$data);
    $this->load->view('frontend/footer');
   
  } 

  public function bookingconfirm($instid,$stime,$etime)
  {
    if ($this->session->userdata('student_session') == '')
    { 
      $this->session->set_flashdata('bookedlog','Before Booking Login With Student..');    
      redirect('Student/login');
    }
    elseif ($this->session->userdata('insturctor_session') != '')
    { 
      $this->session->set_flashdata('bookedlog','Instructor Are Not Booking The Time Slots..');    
      redirect('Student/show_classes/'.$instid);
    }
    else
    {
      $this->session->set_flashdata('bookedmsg','Booking confirmed..');   
      redirect('Student/show_classes/'.$instid.'/'.$stime.'/'.$etime);  
    }
    
  }

  public function bookingconfirmed()
  {
    $ins_id = $this->input->post('instid');
    $v_type = $this->input->post('vt');
    $start_time = $this->input->post('st');
    $end_time = $this->input->post('et');

    if ($this->session->userdata('student_session') == '')
    { 
      $html = "<p style='color:red;'>Before Booking Login With Student..</p>";
      echo json_encode(array('success'=>'true','jmsg'=>$html)); 
    }
    elseif ($this->session->userdata('insturctor_session') != '')
    { 
      $html = "<p style='color:red;'>Instructor Are Not Booking The Time Slots..</p>";
      echo json_encode(array('success'=>'true','jmsg'=>$html)); 
    }
    else
    {
        
      $stu_id = $this->session->userdata('student_session');
      $stud_id = $stu_id['res'][0]['id'];
      $bokdate = $this->session->userdata('seday');
      $vechical = $this->session->userdata('vtype');
      $date = date('Y-m-d');

       $insertdata = [
                       'stu_id'=>$stud_id,
                       'inst_id'=>$ins_id,
                       'vechical_type'=>$vechical, 
                       'booking_date'=>$bokdate,
                       'booking_start_time'=>$start_time,
                       'booking_end_time'=>$end_time,
                       'create_date'=>$date
                     ];
       $res = $this->Generalmodel->add('booking',$insertdata);
      $html = "<p style='color:green;'>Booking confirmed..</p>";
      echo json_encode(array('success'=>'true','jmsg'=>$html)); 
      
      //redirect('Student/show_classes/'.$instid.'/'.$stime.'/'.$etime);  
    }

  }

  public function show_classes($id,$stime,$etime)
  { 
    $stu_id = $this->session->userdata('student_session');
    $stud_id = $stu_id['res'][0]['id'];
    $bokdate = $this->session->userdata('seday');
    $vechical = $this->session->userdata('vtype');
    $date = date('Y-m-d');

    $insertdata = [
                    'stu_id'=>$stud_id,
                    'inst_id'=>$id,
                    'vechical_type'=>$vechical, 
                    'booking_date'=>$bokdate,
                    'booking_start_time'=>$stime,
                    'booking_end_time'=>$etime,
                    'create_date'=>$date
                  ];
    $res = $this->Generalmodel->add('booking',$insertdata);
    $data['result_time'] = $this->Generalmodel->get_all_whereGroupBy('instructor_time_slots',array('inst_id'=> $id),'day');
    $this->load->view('frontend/header');
    $this->load->view('frontend/booking_class',$data);
    $this->load->view('frontend/footer');
  }

    public function cptimg()
	{
	    $code1 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $code = substr(str_shuffle($code1), 0, 4);
		//$code=rand(1000,9999);
		$this->session->set_userdata('captchaid',$code);
		$stu_cat = $this->session->userdata('captchaid');
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
	    //$capt = $this->input->post('captcha');
	    $sescapt = $this->session->userdata('captchaid');
	    if($sescapt == $capt)
	    {
	        $html = "<p style='color:green;'>Matched</p>";
            echo json_encode(array('success'=>'true','capmsg'=>$html)); 
	    }
	    else
	    {
	        $html = "<p style='color:red;'>Not Matched</p>";
            echo json_encode(array('success'=>'false','capmsg'=>$html)); 
	    }
	}
    
    public function thankyou()
    {
        $this->load->view('frontend/header');
        $this->load->view('frontend/thankyou',$data);
        $this->load->view('frontend/footer'); 
    }
    
    public function thankyou1($randam)
    {
        $data['rand'] = $randam;
        $this->load->view('frontend/header');
        $this->load->view('frontend/thanks',$data);
        $this->load->view('frontend/footer'); 
    }
    
    public function mmsgateway()
    {
        $inst_id = $this->input->post('inst_id');
        $postcode = $this->input->post('postcode');
        $date = $this->input->post('bkdates_data');
        $time_id = $this->input->post('timeslots_data');
        $data['rand'] = $ran_id = $this->input->post('randam_id');
        $todaydate = date('Y-m-d');
        $totalcharges_data = $this->input->post('totalcharges_data');
        
        $this->session->set_userdata('randam_session',$ran_id);
        $this->session->userdata('randam_session');
        
        if(!empty($totalcharges_data)){
            $data['amt'] = $totalcharges_data*100;
        }else{
            $data['amt'] = 0;
        }
        $cnt = sizeof($time_id);
        for($i=0;$i<$cnt;$i++)
        {
            $res = $this->Generalmodel->get_all_wherebk('booking',array('time_id'=>$time_id[$i],'randam_id'=>$ran_id));
            //echo $this->db->last_query();exit;
            //echo '<pre>';print_r($res);exit;
            if(!empty($res))
            {
                $data = $this->Generalmodel->deleteMulti('booking',array('time_id'=>$time_id[$i],'randam_id'=>$ran_id));  
            }
            else
            {
                $insertdata=[
                            'randam_id'=>$ran_id,
                            'booking_date'=>$date[$i],
                            'time_id'=>$time_id[$i],
                            'price'=>$totalcharges_data,
                            'create_date'=>$todaydate
                            ];
                $stu_id = $this->session->userdata('student_session');
                $st_id = $stu_id['res'][0]['id'];
                $InsertDatas=[
                            'randam_id'=>$ran_id,
                            'booking_date'=>$date[$i],
                            'time_id'=>$time_id[$i],
                            'price'=>$totalcharges_data,
                            'student_id'=>$st_id,
                            'create_date'=>$todaydate
                            ];            
                $res = $this->Generalmodel->add('booking',$insertdata);  
                $res2 = $this->Generalmodel->add('booking_confirm',$InsertDatas);  
            }
        }    
        
        $tim_ids = implode(',',$time_id);
        $dt = implode(',',$date);
        $InsertPayment=[
                    'randam_id'=>$ran_id,
                    'postcode'=>$postcode,
                    'booking_dates'=>$dt,
                    'product_id'=>$tim_ids,
                    'payment_gross'=>$totalcharges_data,
                    'currency_code'=>'GBP',
                    'user_id'=>$st_id,
                    'inst_id'=>$inst_id,
                    'create_date'=>$todaydate
                    ];            
        $res3 = $this->Generalmodel->add('payments',$InsertPayment);            
        if(!empty($res3)){
        //$this->load->view('frontend/pay',$data); }
        $this->load->view('frontend/gateway',$data); }
    }
}
?>  