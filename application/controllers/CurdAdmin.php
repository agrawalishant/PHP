<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
  class CrudAdmin extends CI_Controller
   {
     function __construct()
     {
        parent::__construct();	
        $this->load->library('email');
     }
    
	/*---check Auth---*/
    public function checkSession()
    {
        if (!isSuperAdminLoggedIn()) {
          redirect(base_url());
        }
    }

  public function send_sms_email(){ 
      
     if(!empty($_POST)){
      
     $fname = $this->input->post('fname');
     $uname = $this->input->post('uname');
     $password = $this->input->post('password');
     $toemail = $this->input->post('email');
     $partycontact = $this->input->post('partycontact');
     $randomNum = rand(999,9999); 
     $otp = rand(999,9999);

     $data= array('full_name'=>  $fname,'username'=>$uname,'password'=>$password,'email'=>$toemail,'mobile_primary'=>$partycontact,'registration_no'=>
  $randomNum,'created_at'=>date("Y-m-d H:i:s") );

  $lastid=$this->generalmodel->add('exhibitor_visitors',$data);
   
     $Votp = "Your Verification Code is ".$otp ;
     $msg = $Votp.'
     Thanking for Your Visitor Registration: 3 Days  Virtual International machine Tools Expo from 8-9-10 Sept 2020.
Visiting Time 12-7 PM. Entry is Free. Pl click www.onlineexpo.in to enter the hall.';

     send_sms($partycontact,$msg);
     
     // send Mail
     
$verifyUrl = site_url('verifyMail/'.$lastid);     
     
  $from_email= 'test@techville.in';
          $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'techville.in'; //smtp host name
        $config['smtp_port'] = '587'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'Mail@987456321'; //$from_email password
        // $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);

         $this->email->from($from_email, 'pnp Infotech'); 
         $this->email->to($toemail);
         $this->email->subject('VIRTUAL INTERNATIONAL MACHINE TOOLS EXPO'); 
         $this->email->message($Votp.'
Thanks for Visitor Registration for upcoming 3 Days Virtual International Machine Tools Expo.
Please click below link to verify for your Visitor registration.

'.$verifyUrl);

   $this->email->send();
        
  if($lastid){
    $return  = array('success'=>true,'msg'=>"Verification Code is Send on your Entered Mobile Number", 'lastid'=>$lastid, 'otp'=>$otp);
  }else{
     $return  = array('success'=>false,'msg'=>"Something Went Wrong"); 
  }
    echo json_encode($return);
  }
 }
 
 public function verifyMail($id)
 { 
   $data['email_verified'] = '1';   
 //  $uid = decode_id($id,'id');
   $result = $this->generalmodel->modify('exhibitor_visitors','id',$id,$data);
   
    if($result){
            // $this->session->set_flashdata('success_msg','Verified Successfully');
            // redirect('');
            
            echo "<script> alert('Email Verified Successfully'); window.location.href = 'http://pnpzones.ml/exhibition'; </script>" ;
              
          }else{             
            // $this->session->set_flashdata('success_msg','Not Verified');
            // redirect('');
            echo "<script> alert('Something went Wrong. Please try again later.'); window.location.href = 'http://pnpzones.ml/exhibition'; </script>" ;
          } 
    }

    public function checkEmail()
    { 
      $email = $this->input->post('email');  
      $lastid = $this->generalmodel->getSingleRowById('exhibitor_visitors','email',$email); 
      if($lastid){
          $return  = array('success'=>false,'msg'=>"Email already exists"); 
      }else{
          $return  = array('success'=>true);
      }
        echo json_encode($return);
    }
 
    public function checkMobile()
    { 
      $mobile = $this->input->post('mobile');  
      $lastid = $this->generalmodel->getSingleRowById('exhibitor_visitors','mobile_primary',$mobile); 
      if($lastid){
          $return  = array('success'=>false,'msg'=>"Mobile Number already exists"); 
      }else{
          $return  = array('success'=>true);
      }
       echo json_encode($return);
    }
 
    public function checkEmailmobileExist(){
          $mobileoremail = $this->input->post('mobileoremail');  
          $lastid = $this->generalmodel->getOrResult('exhibitor_visitors',array('mobile_primary'=>$mobileoremail,'email'=>$mobileoremail));
          
          if($lastid){
              
            //  SMS and Email
            $msg = '
Thanking for Your Visitor Registration: 3 Days  Virtual International machine Tools Expo from 8-9-10 Sept 2020. Your Reg No. is '.$lastid[0]->registration_no.' , User Name '.$lastid[0]->username.' And password is '. $lastid[0]->password.'
Visiting Time 12-7 PM. Entry is Free. Pl click www.onlineexpo.in to enter the hall.';

     send_sms($lastid[0]->mobile_primary,$msg);
     
     // send Mail
     
        $from_email= 'test@techville.in';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'techville.in'; //smtp host name
        $config['smtp_port'] = '587'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'Mail@987456321'; //$from_email password
        // $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);

         $this->email->from($from_email, 'pnp Infotech'); 
         $this->email->to($lastid[0]->email);
         $this->email->subject('VIRTUAL INTERNATIONAL MACHINE TOOLS EXPO'); 
         $this->email->message('
Thanks for Visitor Registration for upcoming 3 Days Virtual International Machine Tools Expo.
Your Reg No. is '.$lastid[0]->registration_no.' , User Name '.$lastid[0]->username.' And password is '. $lastid[0]->password.' Visiting Time 12-7 PM. Entry is Free. Pl click www.onlineexpo.in to enter the hall.');

   $this->email->send();
            
        $return  = array('success'=>true,'msg'=>"Record match, Credentials Send on Registered Mobile number and Email",$lastid); 
      }else{
        $return  = array('success'=>false,'msg'=>"Email/Mobile does not exist in Record");
    }
     echo json_encode($return);  
  }

  public function submit_sign_up(){  
      
   if(!empty($_POST)){      
  
   $usertype = $this->input->post('usertype');
   $profession = $this->input->post('profession');
   $state = $this->input->post('state');
   $city = $this->input->post('city');
   $toemail = $this->input->post('email');
   $companyName = $this->input->post('companyName');
   $keyPerson = $this->input->post('keyPerson');
   $designation = $this->input->post('designation');

   $cm_address = $this->input->post('cm_address');
   $cm_state = $this->input->post('cm_state');
   $cm_city = $this->input->post('cm_city');
   $com_pin = $this->input->post('com_pin');
   $cm_mobile = $this->input->post('cm_mobile');
   $cm_tel = $this->input->post('cm_tel');
   $cm_email = $this->input->post('cm_email');
   $productServices = $this->input->post('productServices');
   $exhibition = $this->input->post('exhibition');
   $send_visiting = $this->input->post('send_visiting');
   
   $allids = implode(',',$exhibition);
   
  if($_FILES['photo']['name']!="")
  {
      $image_name1 =do_core_upload_file('photo','./uploads/uploadVisiting/');
      if($image_name1!="")
      { $data['photo'] = $image_name1; }
  }
  
  if($_FILES['brochure']['name']!="")
  {
      $image_name2 =do_core_upload_file('brochure','./uploads/documents/');
      if($image_name2!="")
      { $data['brochure'] = $image_name2; }
  }
 
    $data['user_type'] = $usertype ;	
    $data['profession'] = $profession ;	
    $data['state'] = $state ;
    $data['city'] = $city ;
    $data['email'] = $toemail ;
    $data['company_name'] = $companyName ;
    $data['key_person_name'] = $keyPerson ;	
    $data['designation'] = $designation ;	
    $data['cm_address'] = $cm_address ;	
    $data['cm_state'] = $cm_state ;
    $data['cm_city'] = $cm_city ;
    $data['cm_pin'] = $com_pin ;	
    $data['cm_mobile'] = $cm_mobile ;	
    $data['cm_teleph'] = $cm_tel ;
    $data['cm_email'] = $cm_email ;
    $data['product_services'] = $productServices ;
    $data['interested_exhibition'] = $allids ;
    $data['send_visiting'] = $send_visiting ;
    $data['created_at'] = date('Y-m-d');
    
    $id = $this->input->post('lastid');
    
    $lastid = $this->generalmodel->modify('exhibitor_visitors','id',$id,$data);
 
    if($lastid ){
        // Generate pdf AND Send Mail
        $data['result'] = $this->generalmodel->get_resultbyord('exhibitor_visitors',array('id'=>$id));
        $data['ex_date'] = $this->generalmodel->get_resultbyord('exhibitions_list',array('delete_status'=>0,'show_center'=>1));
        $pdf = $this->load->view('frontend/visitingCard',$data,true);
        $this->load->library('M_pdf');
        $filename = time()."_visiting$lastid.pdf";
        $attachement=base_url().'uploads/visitingCard/'.$filename ;
        
        $this->m_pdf->pdf = new mPDF();
        $this->m_pdf->pdf->WriteHTML($pdf);
        $this->m_pdf->pdf->Output("./uploads/visitingCard/".$filename, "F");
        
        $im = new imagick("./uploads/visitingCard/".$filename);
        $im->setImageFormat( "jpg" );
        $img_name = time()."_order.jpg";
        $im->setSize(300,200);
        $im->writeImage("./uploads/visitingCard/".$img_name);
        $im->clear();
        $im->destroy();    
        $attachement=base_url().'uploads/visitingCard/'.$img_name ;
        
        $from_email= 'test@techville.in';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'techville.in'; //smtp host name
        $config['smtp_port'] = '587'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'Mail@987456321'; //$from_email password
        // $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->email->initialize($config);
        
         //$from_email = 'shikhaborkute@gmail.com' ;
         $this->email->from($from_email, 'pnp Infotech'); 
         $this->email->to($toemail);
         $this->email->subject('VIRTUAL INTERNATIONAL MACHINE TOOLS EXPO'); 
         $this->email->message('
You are Verified Visitor for Virtual 3 Days International Machine Tools Expo. Entry is Free from 12-7 PM Daily. Date: 8-9-10 Sept 2020. Please click www.onlineexpo.in to enter in Exhibitions Hall.
We are happy to deliver your Digital visiting Card. Please download and share in your whatsapp . Telegram and groups.

');
   $this->email->attach($attachement);
   $this->email->send();

        echo "<script> alert('Sign in Successfully. Thanks for Visitor Registration for upcoming 3 Days Virtual International Machine Tools Expo'); window.location.href = 'http://pnpzones.ml/exhibition'; </script>" ;
        
      }else{
         echo "<script> alert('Something went Wrong. Please Try again later'); window.location.href() = 'http://pnpzones.ml/exhibition';   </script>" ;
      }  

   }
  
 }

 public function visitingCard(){ 
     
     $data['result'] = $this->generalmodel->get_resultbyord('exhibitor_visitors',array('id'=>'4'));
     $data['ex_date'] = $this->generalmodel->get_resultbyord('exhibitions_list',array('delete_status'=>0,'show_center'=>1));
     $data['company_name'] = 'Test Company';
     $data['name']='Uncle';
     $data['cm_address']='cm_address';
     $data['cm_pin']='452003';
     $data['cm_teleph']='7410258963';
     $data['cm_mobile']='7410258963';
     $data['cm_email']='abc@gmail.com';
     $data['key_person_name']='RKA';
     $data['designation']='MD';
     $data['cm_city']='indore';

     $this->load->view('frontend/visitingCard',$data);
//exit;   
// $pdf = $this->load->view('frontend/visitingCard',$data,true);
        
//         $this->load->library('M_pdf');
//         $filename = time()."_order.pdf";
//         $this->m_pdf->pdf = new mPDF();
//         $this->m_pdf->pdf->WriteHTML($pdf);
//         $this->m_pdf->pdf->Output("./uploads/visitingCard/".$filename, "F");
        
//         $im = new imagick("./uploads/visitingCard/".$filename);
//         $im->setImageFormat( "jpg" );
//         $img_name = time()."_order.jpg";
//         $im->setSize(300,200);
//         $im->writeImage("./uploads/visitingCard/".$img_name);
//         $im->clear();
//         $im->destroy();    
//         $attachement=base_url().'uploads/visitingCard/'.$img_name ;
        
//           //$attachement=base_url().'uploads/visitingCard/'.$filename ;
          
//         $from_email= 'test@techville.in';
//         $config['protocol'] = 'smtp';
//         $config['smtp_host'] = 'techville.in'; //smtp host name
//         $config['smtp_port'] = '587'; //smtp port number
//         $config['smtp_user'] = $from_email;
//         $config['smtp_pass'] = 'Mail@987456321'; //$from_email password
//         // $config['mailtype'] = 'html';
//         $config['charset'] = 'iso-8859-1';
//         $config['wordwrap'] = TRUE;
//         $config['newline'] = "\r\n"; //use double quotes
//         $this->email->initialize($config);
        
//          $toemail = 'shikhaborkute@gmail.com' ;
//          $this->email->from($from_email, 'pnp Infotech'); 
//          $this->email->to($toemail);
//          $this->email->subject('VIRTUAL INTERNATIONAL MACHINE TOOLS EXPO'); 
//          $this->email->message('
// You are Verified Visitor for Virtual 3 Days International Machine Tools Expo. Entry is Free from 12-7 PM Daily. Date: 8-9-10 Sept 2020. Please click www.onlineexpo.in to enter in Exhibitions Hall.
// We are happy to deliver your Digital visiting Card. Please download and share in your whatsapp . Telegram and groups.

// ');
//   $this->email->attach($attachement);
//   $this->email->send();

 }
 

}  