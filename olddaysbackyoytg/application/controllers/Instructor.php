<?php defined('BASEPATH') OR exit('No direct script access allowed');

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



        $address = $this->input->post('address');



        $post_code = $this->input->post('pin');



        $license = $this->input->post('license_no');



        $date = date('Y-m-d');







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



              		'password'=>$pwd,



          				'address'=>$address,



          				'post_code'=>$post_code,



          				'licence_no'=>$license,



                  'licence_photo'=>$imgdata,



          				'create_date'=>$date	



        			];



        $res = $this->Generalmodel->add('instructor_details',$insertdata);



        $last_insertid = $this->db->insert_id();



        







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



            echo "Data Not Inserted..";



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



            $this->session->set_userdata('instructor_session',$data);



            $result = $this->session->userdata('instructor_session');

            $id = $data['res'][0]['id'];

            $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));

            $this->load->view('frontend/header');



            $this->load->view('frontend/Instructorprofile',$data);



            $this->load->view('frontend/footer');    



          }



          else



          {



            $data['login_failed'] = True; 



            //$this->session->set_flashdata('loginmsg','Email Password is not Matched...Please Try Again...');



            $data['loginmsg'] = "Plese Verify Your Email OR Type correct Email And Password";



            $this->load->view('frontend/header');



            $this->load->view('frontend/login',$data);   



            $this->load->view('frontend/footer');



          }



      } 



      else



      {



        $data['login_failed'] = True; 



        $this->load->view('frontend/header');



        $this->load->view('frontend/login',$data);



        $this->load->view('frontend/footer');



      }



  }	



  



  public function updateprofile()



  {



    $id = $this->input->post('id');

    $email = $this->input->post('email');

    $dob = $this->input->post('dob');

    $mobile = $this->input->post('mobile');

    $gender = $this->input->post('gender');

    $license_no = $this->input->post('license_no');

    $address = $this->input->post('address');

    $pin = $this->input->post('pin');

    $date = date('Y-m-d');



    //echo $id,$dob,$gender;exit;



    $updatedata = [

                    'email'=>$email,

                    'dob' => $dob,

                    'mobile'=>$mobile,

                    'gender' => $gender,

                    'licence_no'=>$license_no,

                    'address'=>$address,

                    'post_code'=>$pin,

                    'update_date'=>$date

                  ];







    $res = $this->Generalmodel->updateData('instructor_details',$updatedata,array('id'=>$id));    

    //echo $this->db->last_query();exit;

    if(!empty($res))



      {



        $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('status'=> 1, 'id'=>$id ));



        



        $this->session->set_userdata('instructor_session',$data);



        $result['res'] = $this->session->userdata('instructor_session');



        //echo "<pre>";print_r($result);exit;



        $this->load->view('frontend/header');



        $this->load->view('frontend/Instructorprofile',$data);



        $this->load->view('frontend/footer');    



      }



  }

  public function myprofile($id)

  {

    $result['res'] = $this->session->userdata('instructor_session');

    $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=>$id,'status'=> 1));



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



  public function InsertCharges()

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

    

    $res = $this->Generalmodel->updateData('instructor_details',$insertdata,array('id'=>$id));

   //echo $this->db->last_query();exit;

    $data['result'] = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $id));

    $data['res'] = $this->Generalmodel->get_all_where('instructor_details',array('id'=> $id));

               

        $this->load->view('frontend/header');

        $this->load->view('frontend/Instructorprofile',$data);

        $this->load->view('frontend/footer');



   }
}

?>