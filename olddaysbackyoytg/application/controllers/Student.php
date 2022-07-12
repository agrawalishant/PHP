<?php defined('BASEPATH') OR exit('No direct script access allowed');

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

  public function signup1()
	{

      if($this->form_validation->run('student_signup') == True)

        {
          $name = $this->input->post('sname');
          $email = $this->input->post('semail');
          $pwd = md5($this->input->post('spwd'));
          $mobile = $this->input->post('smobile');
          $address = $this->input->post('saddress');
          $post_code = $this->input->post('spin');
          $date = date('Y-m-d');
          $insertdata = [
            				'name'=>$name,
            				'email'=>$email,
            				'mobile'=>$mobile,
            				'password'=>$pwd,
            				'address'=>$address,
            				'post_code'=>$post_code,
            				'created_date'=>$date
          			];

          $res = $this->Generalmodel->add('student_details',$insertdata);
           $last_insertid = $this->db->insert_id();
           //echo "id= ".$last_insertid;exit;

          if($res)
            {

            // $this->email->from('support@dvdrivingschool.com', 'DV Driving School');
            // $this->email->to($email);
            // $this->email->subject('Verification Mail From DV Driving School');
            // $this->email->message('https://testpnp.ml/driving/Student/VerificationEmail/'.$last_insertid);
            // $this->email->send();
            // $this->email->send();

            	redirect('Student/login');
            }
            else
            {
              echo "Data Not Inserted..";
            }
        }
	    else
        {
        $this->load->view('frontend/header');  
        $this->load->view('frontend/signin');
        $this->load->view('frontend/footer');
      	}
  }

  public function signup()
  {

      if($this->form_validation->run('student_signup') == True)

        {
          $name = $this->input->post('sname');
          $email = $this->input->post('semail');
          $pwd = md5($this->input->post('spwd'));
          $mobile = $this->input->post('smobile');
          $dob = $this->input->post('sdob');
          $gender = $this->input->post('sgender');
          $address = $this->input->post('saddress');
          $post_code = $this->input->post('spin');
          $date = date('Y-m-d');
          $insertdata = [
                    'name'=>$name,
                    'email'=>$email,
                    'mobile'=>$mobile,
                    'dob'=>$dob,
                    'gender'=>$gender,
                    'password'=>$pwd,
                    'address'=>$address,
                    'post_code'=>$post_code,
                    'created_date'=>$date
                ];

          $res = $this->Generalmodel->add('student_details',$insertdata);
           $last_insertid = $this->db->insert_id();
           //echo "id= ".$last_insertid;exit;

          if($res)
            {

            // $postData = array(
            //                   'compname' => 'DV Driving School',
            //                   'subject' => 'Verification Mail From DV Driving School',
            //                   'email' => 'support@dvdrivingschool.com',
            //                   'client_email' => 'shikhabkte@gmail.com',
            //                   'msg' => 'Please Click the for Verify your Email ',
            //                   );


              $urls = base_url().'Student/VerificationEmail/'.$last_insertid;
            
              //echo $urls;exit; 
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
                //print_r($output);
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
          
          if(!empty($res))
          {
            $data['res'] = $this->Generalmodel->get_all_where('student_details',array('email'=>$email,'password'=>md5($pwd)));
            $this->session->set_userdata('student_session',$data);
            $result = $this->session->userdata('student_session');
            //echo "<pre>";print_r($result);exit;
            $this->load->view('frontend/header');
            $this->load->view('frontend/studentprofile',$data);
            $this->load->view('frontend/footer');     
          }
          else
          {
            $data['loginmsg'] = "Please Verify Your Email OR Type correct Email and password";
            $this->load->view('frontend/header');
            $this->load->view('frontend/login',$data); 
            $this->load->view('frontend/footer');  
          }
        } 
        else
        {
          $this->load->view('frontend/header');
          $this->load->view('frontend/login');
          $this->load->view('frontend/footer');
        }
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
    $date = date('Y-m-d');

    //echo $id,$dob,$gender;exit;

    $updatedata = [
                    'email'=>$email,
                    'dob' => $dob,
                    'mobile'=>$mobile,
                    'gender' => $gender,
                    'address'=>$address,
                    'post_code'=>$pin,
                    'modified_date'=>$date
                  ];



    $res = $this->Generalmodel->updateData('student_details',$updatedata,array('id'=>$id));    
    //echo $this->db->last_query();exit;
    if(!empty($res))

      {

        $data['res'] = $this->Generalmodel->get_all_where('student_details',array('status'=> 1, 'id'=>$id ));

        

        $this->session->set_userdata('student_session',$data);

        $result['res'] = $this->session->userdata('student_session');

        //echo "<pre>";print_r($result);exit;

        $this->load->view('frontend/header');

        $this->load->view('frontend/studentprofile',$data);

        $this->load->view('frontend/footer');    

      }

  }
  public function myprofile($id)
  {
    $result['res'] = $this->session->userdata('student_session');
    $data['res'] = $this->Generalmodel->get_all_where('student_details',array('id'=>$id,'status'=> 1));

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

}
?>