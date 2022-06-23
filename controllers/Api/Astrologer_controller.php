<?php 
defined('BASEPATH') or exit('No direct script access allowed');
Class Astrologer_controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  // ***************START LOGIN ASTROLOGER******************

  public function login_astrologer()
  {
    $email = $this->input->post('email');
    $password =  sha1($this->input->post('password'));
    $data = $this->Generalmodel->get_all_where('astrologers',array('astro_email'=>$email,'astro_password'=>$password));
    if(!empty($data))
    {
        $astroid = $data[0]['astro_id'];
        $wallet = $this->Generalmodel->get_all_where('wallet_astrologer',array('wa_astrologer_id'=>$astroid));
        $data=array('success'=>"true",'msg'=>"Login Successfully.",'userdata'=>$data,'Amount'=>$wallet);
        echo json_encode($data);
    }
    else
    {
        $data=array('success'=>'true','msg'=>"Email And Password Is Not Matched");
        echo json_encode($data);
    }
  }

  // ****************END LOGIN ASTROLOGER*************************

    public function forgetpassword()
    {
        $emailphoneno = $this->input->post('emailphoneno');
        
        $query = $this->db->where('astro_email', $emailphoneno);
        $query = $this->db->or_where('astro_mobile', $emailphoneno);
        $query = $this->db->get('astrologers');
        $row = $query->result_array();
        //echo $this->db->last_query();exit;
        $id = $row[0]['astro_id'];
        //print_r($row);exit;    
        
        if(!empty($row[0]))
        {
            
            //$passwordplain = '@' . rand(999, 9999) . '$' . rand(999, 9999);
            $passwordplain = rand(999, 9999);
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'mail.astrovedvakta.com',
                'smtp_port' => 465,
                'smtp_user' => 'support@astrovedvakta.com',
                'smtp_pass' => 'PasswordSS@987',
                'mailtype'  => 'html', 
                'charset'   => 'iso-8859-1'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            
            // Set to, from, message, etc.
            $this->email->from('info@astrovedvakta.com','info@astrovedvakta.com');
            $this->email->to($emailphoneno);
            $this->email->subject('Password From Astrovedvakta');
            $this->email->message("This Your OTP ".$passwordplain);
            $result = $this->email->send();
            $updateData['new_password'] = $passwordplain;
            updateData('astrologers',$updateData,array('astro_id'=>$id));
            $data = array('status'=>'true','msg'=>'OTP Send Sucessfully','data'=>$row);
        }
        else 
        {
            $data = array('status' => "true", 'msg' => "Wrong Email ");
        }
        echo json_encode($data);
    }
    
    public function checkotp()  
    {
        $astroid = $this->input->post('astroid');
        $otp = $this->input->post('otp');
        
        $query = $this->db->where('astro_id', $astroid);
        $query = $this->db->get('astrologers');
        $row = $query->result_array();
        $chk = $row[0]['new_password'];
        //print_r($row);exit;    
        
        if(!empty($row[0]))
        {
            if($otp == $chk)
            {
                $updateData['new_password'] = '';
                updateData('astrologers',$updateData,array('astro_id'=>$astroid));
                $data = array('status'=>'true','msg'=>'OTP Verified Sucessfully');
            }    
            else 
            {
                $data = array('status' => "true", 'msg' => "Wrong OTP");
            }
        }
        else 
        {
            $data = array('status' => "true", 'msg' => "User Is Not Found");
        }
        echo json_encode($data);
    }
    
    public function newPassword()   
    {
        $astroid = $this->input->post('astroid');
        $new = $this->input->post('newpwd');
        $confirm = $this->input->post('confirmpwd');
        
        $query = $this->db->where('astro_id', $astroid);
        $query = $this->db->get('astrologers');
        $row = $query->result_array();
        //print_r($row);exit;    
        
        if(!empty($row[0]))
        {
            if($new == $confirm)
            {
                $updateData['astro_password'] = sha1($new);
                $updateData['astro_pass'] = $new;
                updateData('astrologers',$updateData,array('astro_id'=>$astroid));
                $data = array('status'=>'true','msg'=>'Password Updated Sucessfully');
            }    
            else 
            {
                $data = array('status' => "true", 'msg' => "New Password And Confirm Password Is Not Matched");
            }
        }
        else 
        {
            $data = array('status' => "true", 'msg' => "User Is Not Found");
        }
        echo json_encode($data);
    }

  // *******************START astrologer***********************

  public function astrologers()
  {
    $data = fetchbyresultwhere('astrologers',array('astro_approved_status' => 1 ));
    if(!empty($data))
    {
        $data=array('success'=>"true",'msg'=>"true",'userdata'=>$data);
        echo json_encode($data);
    }
    else
    {
        $data=array('success'=>'true','msg'=>"No Astrologer Found");
        echo json_encode($data);
    }
  }


    public function astrologerskills()
    {
        $data = fetchbyresultwhere('astrologers',array('astro_approved_status' => 1 ));
        if(!empty($data))
        {
            foreach($data as $res){
                $r[] = $res['astro_cat'];
            }
            foreach($r as $q){
                $i[] = explode(',',$q); 
                foreach($i as $re){
                    foreach($re as $as){
                        $datas[] = fetchbyresultwhere('category_astrologer',array('cat_astr_id'=>$as)); 
                    }
                    //$req[] = $datas;
                }$req[] = $datas;
            }
            $data=array('success'=>"true",'msg'=>"true",'userdata'=>$req);
        }
        else
        {
            $data=array('success'=>'true','msg'=>"No Astrologer Found");
        }
        echo json_encode($data);
    }
  // ********************END astrologer******************************
  public function searchastrologers()
  {
    $astroname=$this->input->post('searchastrologer');
   // $data = fetchbyresultwhere('astrologers',array('astro_approved_status' => 1 ));
    $data = $this->db->select('*')->from('astrologers')->where("astro_name LIKE '%$astroname%'")->get()->result_array();
    if(!empty($data))
    {
        $data=array('success'=>"true",'msg'=>"true",'userdata'=>$data);
        echo json_encode($data);
    }
    else
    {
        $data=array('success'=>'true','msg'=>"No Astrologer Found");
        echo json_encode($data);
    }
  }
  // *************START astrologer categories**********************

  public function category_astrologer()
  {
    $data = fetchbyresult('category_astrologer');
    if(!empty($data))
    {
        $data=array('success'=>"true",'msg'=>"true",'userdata'=>$data);
        echo json_encode($data);
    }
    else
    {
        $data=array('success'=>'false','msg'=>"No Astrologer Category Found");
        echo json_encode($data);
    }
  }

  // **************END astrologer categories***********************

  // ************START register USER***************************

  public function astrologer_register1()
  {
    $name = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('name'));
    $mobile = $this->input->post('mobile');
    $gender = $this->input->post('gender');
    $dob = $this->input->post('dob');
    $language =preg_replace('/[^A-Za-z0-9 ]/', '',  $this->input->post('language'));
    $exp = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('exp'));
    $skill = $this->input->post('skill');
    $address = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('address'));
    $city = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('city'));
    $state = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('state'));
    $country =preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('country'));
    $pincode = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('pincode'));
    $ac_number = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('ac_number'));
    $ac_type = $this->input->post('ac_type');
    $fisc = $this->input->post('fisc');
    $ac_name = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('ac_name'));
    $pan = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('pan'));
    $aadhar = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('aadhar'));
    $site = $this->input->post('site');
    $monthly_income = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('monthly_income'));
    $short_bio = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('short_bio'));
    $long_bio = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('long_bio'));
    $email = $this->input->post('astro_email');
    $password = md5($this->input->post('astro_password'));
    $orginalpass = $this->input->post('astro_password');

    $digits_needed=6;
    $otp='';
    $count=0;
    while ($count < $digits_needed) 
    {
        $random_digit = mt_rand(0,9);
        $otp .= $random_digit;
        $count++;
    }

    if(!empty($otp)){$insertdata['otp'] = $otp;}
    if(!empty($name)){$insertdata['astro_name'] = $name;}
    if(!empty($mobile)){$insertdata['astro_mobile'] = $mobile;}
    if(!empty($gender)){$insertdata['gender'] = $gender;}
    if(!empty($dob)){$insertdata['dob'] = $dob;}
    if(!empty($skill)){$insertdata['skill'] = $skill;}
    if(!empty($language)){$insertdata['astro_language'] = $language;}
    if(!empty($exp)){$insertdata['astro_experience'] = $exp;}
    if(!empty($address)){$insertdata['address'] = $address;}
    if(!empty($city)){$insertdata['city'] = $city;}
    if(!empty($state)){$insertdata['state'] = $state;}
    if(!empty($country)){$insertdata['country'] = $country;}
    if(!empty($pincode)){$insertdata['pincode'] = $pincode;}
    if(!empty($ac_type)){$insertdata['ac_type'] = $ac_type;}
    if(!empty($fisc)){$insertdata['ifsc'] = $fisc;}
    if(!empty($ac_name)){$insertdata['ac_name'] = $ac_name;}
    if(!empty($pan)){$insertdata['pancard'] = $pan;}
    if(!empty($aadhar)){$insertdata['aadhar'] = $aadhar;}
    if(!empty($site)){$insertdata['site_name'] = $site;}
    if(!empty($monthly_income)){$insertdata['monthly_income'] = $monthly_income;}
    if(!empty($short_bio)){$insertdata['short_bio'] = $short_bio;}
    if(!empty($email)){$insertdata['astro_email'] = $email;}
    if(!empty($password)){$insertdata['astro_password'] = $password;}
    if(!empty($orginalpass)){$insertdata['astro_pass'] = $orginalpass;}
    if(!empty($long_bio)){$insertdata['long_bio'] = $long_bio;}

    // 20/02/2021 start
    $image1 = base64_decode($this->input->post("profile_image"));    // photo
    $f = finfo_open();
    $mime_type = finfo_buffer($f, $image1, FILEINFO_MIME_TYPE);
    $value = explode("/",$mime_type);
    for($i=0;$i<count($value);$i++)
    {
      $first = $value[0];
      $second = $value[1];
    }
    $image_name = md5(uniqid(rand(), true));
    $filename = $image_name.'.'.$second;
    if(!empty($filename)){$insertdata['astro_image'] = $filename;}

    $image2 = base64_decode($this->input->post("idproof"));    // photo
    $f = finfo_open();
    $mime_type = finfo_buffer($f, $image2, FILEINFO_MIME_TYPE);
    $value = explode("/",$mime_type);
    for($i=0;$i<count($value);$i++)
    {
      $first = $value[0];
      $second = $value[1];
    }
    $image_name = md5(uniqid(rand(), true));
    $filename2 = $image_name.'.'.$second;
    if(!empty($filename2)){$insertdata['astro_image_document'] = $filename2;}
    // $image1 = $_FILES['profile_image']['name'];
    // $img1 =  str_replace(" ", "", $image1);
    // $insertdata['astro_image'] = $img1;
    // move_uploaded_file($_FILES['profile_image']['tmp_name'], 'image/astrologers/'.$img1);
    // $image2 = $_FILES['idproof']['name'];
    // $img2 =  str_replace(" ", "", $image2);
    // $insertdata['astro_image_document'] = $img2;
    // move_uploaded_file($_FILES['idproof']['tmp_name'], 'image/astrologers/'.$img1);
    // 20/02/2021  end
        $res = $this->Generalmodel->add('astrologers',$insertdata);
        $last_id = $this->db->insert_id();
        $data = $this->Generalmodel->add('wallet_astrologer',array('wa_astrologer_id'=>$last_id,'wa_wallet_amount'=>'0'));
    // 20/02/2021 start
        //  $datai['astrologer_id_m'] = $last_id;
        //  $datai['astrologer_cat_id'] = $this->input->post('skill');
        // $incat = $this->Generalmodel->add('astrologers',$datai);
       
    if(!empty($res))
    {
        $data=array('success'=>"true",'msg'=>$res);
        echo json_encode($data);
    }
    else
    {
        $data=array('success'=>'true','msg'=>"Not Registered");
        echo json_encode($data);
    }
  }

  public function astrologer_register()
  {
    $this->form_validation->set_rules('astro_email', 'Email', 'required|valid_email|is_unique[astrologers.astro_email]');
	      $this->form_validation->set_rules('mobile', 'MOBILE', 'required|is_unique[astrologers.astro_mobile]');
	       if ($this->form_validation->run() == True) {
    $name = $this->input->post('name');
    $mobile = $this->input->post('mobile');
    $gender = $this->input->post('gender');
    $dob = $this->input->post('dob');
    $language =$this->input->post('language');
    $exp =$this->input->post('exp');
    $skill = $this->input->post('skill');
    $address = $this->input->post('address');
    $city = $this->input->post('city');
    $state = $this->input->post('state');
    $country =$this->input->post('country');
    $pincode = $this->input->post('pincode');
    $ac_number = $this->input->post('ac_number');
    $ac_type = $this->input->post('ac_type');
    $fisc = $this->input->post('fisc');
    $ac_name = $this->input->post('ac_name');
    $pan = $this->input->post('pan');
    $aadhar = $this->input->post('aadhar');
    $site = $this->input->post('site');
    $monthly_income = $this->input->post('monthly_income');
    $short_bio = $this->input->post('short_bio');
    $long_bio = $this->input->post('long_bio');
    $email = $this->input->post('astro_email');
    $password = SHA1($this->input->post('astro_password'));
    $orginalpass = $this->input->post('astro_password');

    $digits_needed=6;
    $otp='';
    $count=0;
    while ($count < $digits_needed) 
    {
        $random_digit = mt_rand(0,9);
        $otp .= $random_digit;
        $count++;
    }

    if(!empty($otp)){$insertdata['otp'] = $otp;}
    if(!empty($name)){$insertdata['astro_name'] = $name;}
    if(!empty($mobile)){$insertdata['astro_mobile'] = $mobile;}
    if(!empty($gender)){$insertdata['gender'] = $gender;}
    if(!empty($dob)){$insertdata['dob'] = $dob;}
    if(!empty($skill)){$insertdata['skill'] = $skill;}
    if(!empty($language)){$insertdata['astro_language'] = $language;}
    if(!empty($exp)){$insertdata['astro_experience'] = $exp;}
    if(!empty($address)){$insertdata['address'] = $address;}
    if(!empty($city)){$insertdata['city'] = $city;}
    if(!empty($state)){$insertdata['state'] = $state;}
    if(!empty($country)){$insertdata['country'] = $country;}
    if(!empty($pincode)){$insertdata['pincode'] = $pincode;}
    if(!empty($ac_type)){$insertdata['ac_type'] = $ac_type;}
    if(!empty($fisc)){$insertdata['ifsc'] = $fisc;}
    if(!empty($ac_name)){$insertdata['ac_name'] = $ac_name;}
    if(!empty($pan)){$insertdata['pancard'] = $pan;}
    if(!empty($aadhar)){$insertdata['aadhar'] = $aadhar;}
    if(!empty($site)){$insertdata['site_name'] = $site;}
    if(!empty($monthly_income)){$insertdata['monthly_income'] = $monthly_income;}
    if(!empty($short_bio)){$insertdata['short_bio'] = $short_bio;}
    if(!empty($email)){$insertdata['astro_email'] = $email;}
    if(!empty($password)){$insertdata['astro_password'] = $password;}
    if(!empty($orginalpass)){$insertdata['astro_pass'] = $orginalpass;}
    if(!empty($long_bio)){$insertdata['long_bio'] = $long_bio;}

    // 20/02/2021 start
    $image1 = base64_decode($this->input->post("profile_image"));    // photo
    $f = finfo_open();
    $mime_type = finfo_buffer($f, $image1, FILEINFO_MIME_TYPE);
    $value = explode("/",$mime_type);
    for($i=0;$i<count($value);$i++)
    {
      $first = $value[0];
      $second = $value[1];
    }
    $image_name = md5(uniqid(rand(), true));
    $filename = $image_name.'.'.$second;
    if(!empty($filename)){$insertdata['astro_image'] = $filename;}

    $image2 = base64_decode($this->input->post("idproof"));    // photo
    $f = finfo_open();
    $mime_type = finfo_buffer($f, $image2, FILEINFO_MIME_TYPE);
    $value = explode("/",$mime_type);
    for($i=0;$i<count($value);$i++)
    {
      $first = $value[0];
      $second = $value[1];
    }
    $image_name = md5(uniqid(rand(), true));
    $filename2 = $image_name.'.'.$second;
    if(!empty($filename2)){$insertdata['astro_image_document'] = $filename2;}
    // $image1 = $_FILES['profile_image']['name'];
    // $img1 =  str_replace(" ", "", $image1);
    // $insertdata['astro_image'] = $img1;
    // move_uploaded_file($_FILES['profile_image']['tmp_name'], 'image/astrologers/'.$img1);
    // $image2 = $_FILES['idproof']['name'];
    // $img2 =  str_replace(" ", "", $image2);
    // $insertdata['astro_image_document'] = $img2;
    // move_uploaded_file($_FILES['idproof']['tmp_name'], 'image/astrologers/'.$img1);
    // 20/02/2021  end
        $res = $this->Generalmodel->add('astrologers',$insertdata);
        $last_id = $this->db->insert_id();
    // 20/02/2021 start
        //  $datai['astrologer_id_m'] = $last_id;
        //  $datai['astrologer_cat_id'] = $this->input->post('skill');
        // $incat = $this->Generalmodel->add('astrologers',$datai);
    $req = fetchbyresultwhere('astrologers', array('astro_id' => $last_id));       
    if(!empty($req))
    {
        $data=array('success'=>"true",'msg'=>"success",'data'=>$req);
        echo json_encode($data);
    }
    else
    {
        $data=array('success'=>'true','msg'=>"Not Registered");
        echo json_encode($data);
    }

  }
  else
  {
    $data=array('success'=>'true','msg'=>"Already  Registered");
        echo json_encode($data);
  }
  }
//    astrologer_register3  16 / july / 2021 final register
public function astrologer_register3()
  {
    $this->form_validation->set_rules('astro_email', 'Email', 'required|valid_email|is_unique[astrologers.astro_email]');
	      $this->form_validation->set_rules('mobile', 'MOBILE', 'required|is_unique[astrologers.astro_mobile]');
	       if ($this->form_validation->run() == True) {
    $name = $this->input->post('name');
    $mobile = $this->input->post('mobile');
    $gender = $this->input->post('gender');
    $dob = $this->input->post('dob');
    $language =$this->input->post('language');
    $exp =$this->input->post('exp');
    $skill = $this->input->post('skill');
    $address = $this->input->post('address');
    $city = $this->input->post('city');
    $state = $this->input->post('state');
    $country =$this->input->post('country');
    $pincode = $this->input->post('pincode');
    $ac_number = $this->input->post('ac_number');
    $ac_type = $this->input->post('ac_type');
    $fisc = $this->input->post('fisc');
    $ac_name = $this->input->post('ac_name');
    $pan = $this->input->post('pan');
    $aadhar = $this->input->post('aadhar');
    $site = $this->input->post('site');
    $monthly_income = $this->input->post('monthly_income');
    $short_bio = $this->input->post('short_bio');
    $long_bio = $this->input->post('long_bio');
    $email = $this->input->post('astro_email');
    $password = SHA1($this->input->post('astro_password'));
    $orginalpass = $this->input->post('astro_password');

    $digits_needed=6;
    $otp='';
    $count=0;
    while ($count < $digits_needed) 
    {
        $random_digit = mt_rand(0,9);
        $otp .= $random_digit;
        $count++;
    }

    if(!empty($otp)){$insertdata['otp'] = $otp;}
    if(!empty($name)){$insertdata['astro_name'] = $name;}
    if(!empty($mobile)){$insertdata['astro_mobile'] = $mobile;}
    if(!empty($gender)){$insertdata['gender'] = $gender;}
    if(!empty($dob)){$insertdata['dob'] = $dob;}
    if(!empty($skill)){$insertdata['skill'] = $skill;}
    if(!empty($language)){$insertdata['astro_language'] = $language;}
    if(!empty($exp)){$insertdata['astro_experience'] = $exp;}
    if(!empty($address)){$insertdata['address'] = $address;}
    if(!empty($city)){$insertdata['city'] = $city;}
    if(!empty($state)){$insertdata['state'] = $state;}
    if(!empty($country)){$insertdata['country'] = $country;}
    if(!empty($pincode)){$insertdata['pincode'] = $pincode;}
    if(!empty($ac_type)){$insertdata['ac_type'] = $ac_type;}
    if(!empty($fisc)){$insertdata['ifsc'] = $fisc;}
    if(!empty($ac_name)){$insertdata['ac_name'] = $ac_name;}
    if(!empty($pan)){$insertdata['pancard'] = $pan;}
    if(!empty($aadhar)){$insertdata['aadhar'] = $aadhar;}
    if(!empty($site)){$insertdata['site_name'] = $site;}
    if(!empty($monthly_income)){$insertdata['monthly_income'] = $monthly_income;}
    if(!empty($short_bio)){$insertdata['short_bio'] = $short_bio;}
    if(!empty($email)){$insertdata['astro_email'] = $email;}
    if(!empty($password)){$insertdata['astro_password'] = $password;}
    if(!empty($orginalpass)){$insertdata['astro_pass'] = $orginalpass;}
    if(!empty($long_bio)){$insertdata['long_bio'] = $long_bio;}

    // 20/02/2021 start
    // $image1 = base64_decode($this->input->post("profile_image"));    // photo
    // $f = finfo_open();
    // $mime_type = finfo_buffer($f, $image1, FILEINFO_MIME_TYPE);
    // $value = explode("/",$mime_type);
    // for($i=0;$i<count($value);$i++)
    // {
    //   $first = $value[0];
    //   $second = $value[1];
    // }
    // $image_name = md5(uniqid(rand(), true));
    // $filename = $image_name.'.'.$second;
    // if(!empty($filename)){$insertdata['astro_image'] = $filename;}

    // $image2 = base64_decode($this->input->post("idproof"));    // photo
    // $f = finfo_open();
    // $mime_type = finfo_buffer($f, $image2, FILEINFO_MIME_TYPE);
    // $value = explode("/",$mime_type);
    // for($i=0;$i<count($value);$i++)
    // {
    //   $first = $value[0];
    //   $second = $value[1];
    // }
    // $image_name = md5(uniqid(rand(), true));
    // $filename2 = $image_name.'.'.$second;
    // if(!empty($filename2)){$insertdata['astro_image_document'] = $filename2;}
    // // $image1 = $_FILES['profile_image']['name'];
    // $img1 =  str_replace(" ", "", $image1);
    // $insertdata['astro_image'] = $img1;
    // move_uploaded_file($_FILES['profile_image']['tmp_name'], 'image/astrologers/'.$img1);
    // $image2 = $_FILES['idproof']['name'];
    // $img2 =  str_replace(" ", "", $image2);
    // $insertdata['astro_image_document'] = $img2;
    // move_uploaded_file($_FILES['idproof']['tmp_name'], 'image/astrologers/'.$img1);
    // 20/02/2021  end
        $image1 = base64_decode($this->input->post("profile_image"));       
        $image_name1 = md5(uniqid(rand(), true));
        $filename1 = $image_name1. '.' . 'png';
        //rename file name with random number
         $path1 = "image/astrologers/".$filename1;
        //image uploading folder path
         file_put_contents($path1, $image1);
     if(!empty($filename1)){$insertdata['astro_image'] = $filename1;}
      
      $image2 = base64_decode($this->input->post("idproof"));       
        $image_name2 = md5(uniqid(rand(), true));
        $filename2 = $image_name2. '.' . 'png';
        //rename file name with random number
         $path2 = "image/astrologers/".$filename2;
        //image uploading folder path
         file_put_contents($path2, $image2);
     if(!empty($filename2)){$insertdata['astro_image_document'] = $filename2;}
      
      
        $res = $this->Generalmodel->add('astrologers',$insertdata);
        $last_id = $this->db->insert_id();
    // 20/02/2021 start
        //  $datai['astrologer_id_m'] = $last_id;
        //  $datai['astrologer_cat_id'] = $this->input->post('skill');
        // $incat = $this->Generalmodel->add('astrologers',$datai);
    $req = fetchbyresultwhere('astrologers', array('astro_id' => $last_id));       
    if(!empty($req))
    {
        $data=array('success'=>"true",'msg'=>"success",'data'=>$req);
        echo json_encode($data);
    }
    else
    {
        $data=array('success'=>'true','msg'=>"Not Registered");
        echo json_encode($data);
    }

  }
  else
  {
    $data=array('success'=>'true','msg'=>"Already  Registered");
        echo json_encode($data);
  }
  }
    public function astrologerGoogle()
    {
        $name = $this->input->post('name');
        $mobile = $this->input->post('mobile');
        $gender = $this->input->post('gender');
        $email = $this->input->post('astro_email');
        $password = SHA1($this->input->post('astro_password'));
        $orginalpass = $this->input->post('astro_password');
        
        if(!empty($name)){$insertdata['astro_name'] = $name;}
        if(!empty($mobile)){$insertdata['astro_mobile'] = $mobile;}
        if(!empty($gender)){$insertdata['gender'] = $gender;}
        if(!empty($email)){$insertdata['astro_email'] = $email;}
        if(!empty($password)){$insertdata['astro_password'] = $password;}
        if(!empty($orginalpass)){$insertdata['astro_pass'] = $orginalpass;}
        
        $checkuser = $this->db->where(array('astro_email' => $email))->get('astrologers')->result_array();
        if (!empty($checkuser)) 
        {
            $astro_id = $checkuser[0]['astro_id'];
            $req = fetchbyresultwhere('astrologers',array('astro_id' => $astro_id));
            $wallet = fetchbyresultwhere('wallet_astrologer',array('wa_astrologer_id' => $astro_id));
            $result = array('success' => 'true', 'msg' => "Welcome ".ucfirst($name),'Details'=>$req,'wallet'=>$wallet);
        }
        else
        {
            $res = $this->Generalmodel->add('astrologers',$insertdata);
            if(!empty($res))
            {
                $last_id = $this->db->insert_id();
                $wdt['wa_astrologer_id'] = $last_id;
                $walletinsert = $this->Generalmodel->add('wallet_astrologer', $wdt);
                $req = fetchbyresultwhere('astrologers',array('astro_id' => $last_id));       
                $wallet = fetchbyresultwhere('wallet_astrologer',array('wa_astrologer_id' => $last_id));
                $result = array('success'=>"true",'msg'=>"Login Successfully",'data'=>$req,'wallet'=>$wallet);
            }
            else
            {
                $result = array('success'=>'true','msg'=>'Login Fail Please Try Again');
            }
        }   
        echo json_encode($result);
    }

    public function astrologerFacebook()
    {
        $name = $this->input->post('name');
        $mobile = $this->input->post('mobile');
        $gender = $this->input->post('gender');
        $email = $this->input->post('astro_email');
        $password = SHA1($this->input->post('astro_password'));
        $orginalpass = $this->input->post('astro_password');
        
        if(!empty($name)){$insertdata['astro_name'] = $name;}
        if(!empty($mobile)){$insertdata['astro_mobile'] = $mobile;}
        if(!empty($gender)){$insertdata['gender'] = $gender;}
        if(!empty($email)){$insertdata['astro_email'] = $email;}
        if(!empty($password)){$insertdata['astro_password'] = $password;}
        if(!empty($orginalpass)){$insertdata['astro_pass'] = $orginalpass;}
        
        $checkuser = $this->db->where(array('astro_email' => $email))->get('astrologers')->result_array();
        //print_r($checkuser);exit;
        if (!empty($checkuser)) 
        {
            $astro_id = $checkuser[0]['astro_id'];
            $req = fetchbyresultwhere('astrologers',array('astro_id' => $astro_id));
            $wallet = fetchbyresultwhere('wallet_astrologer',array('wa_astrologer_id' => $astro_id));
            $result = array('success' => 'true', 'msg' => "Welcome ".ucfirst($name),'Details'=>$req,'wallet'=>$wallet);
        }
        else
        {
            $res = $this->Generalmodel->add('astrologers',$insertdata);
            if(!empty($res))
            {
                $last_id = $this->db->insert_id();
                $wdt['wa_astrologer_id'] = $last_id;
                $walletinsert = $this->Generalmodel->add('wallet_astrologer', $wdt);
                $req = fetchbyresultwhere('astrologers',array('astro_id' => $last_id));       
                $wallet = fetchbyresultwhere('wallet_astrologer',array('wa_astrologer_id' => $last_id));
                $result = array('success'=>"true",'msg'=>"Login Successfully",'data'=>$req,'wallet'=>$wallet);
            }
            else
            {
                $result = array('success'=>'true','msg'=>'Login Fail Please Try Again');
            }
        }   
        echo json_encode($result);
    }

    public function astroCheckotp()
    {
        $opt = $this->input->post('otp');
        $astroid = $this->input->post('astroid');

        $userdata = $this->db->where(array('astro_id' => $astroid))->get('astrologers')->result_array();
        if(!empty($userdata)){ $typeopt = $userdata[0]['otp']; }else {$typeopt=0;}
        if ($opt == $typeopt) {
            $data = array('success' => 'true', 'msg' => 'OTP is Verified');
            echo json_encode($data);
        } else {
            $data = array('success' => "true", 'msg' => "OTP is Incorrect");
            echo json_encode($data);
        }
    }
  // **************END register USER*************************

  // ****************START astrologersbyid********************************

   public function astrologersbyid()

   {

       $astro_id = $this->input->post('astro_id');

        $name = fetchbyresultwhere('astrologers', array('astro_id' => $astro_id));

   

       if (!empty($name)) {
           $res = array();
           $cat = explode(',',$name[0]['astro_cat']);
           foreach ($cat as $value) {
              $nm = fetchbyresultwhere('category_astrologer', array('cat_astr_id' => $value));
              $res[] = $nm[0]['cat_astr_title'];
            } //print_r($res);exit;
           // $req = 0;
           // for($i=0;$i<count($res);$i++) {
           //   //$req.=','.$res[$i];
           //   echo $req = $res[$i];
           // }exit;
           $res = implode(",",$res);
           $data = array('success' => "true", 'msg' => "Data found", 'name' => $name,'category'=>$res);

           echo json_encode($data);

       } else {

           $data = array('success' => "true", 'msg' => "No data Found");

           echo json_encode($data);

       }

   }

  // ********************End astrologersbyid**************************

  // **************START astrologer name **********************

  public function astrologername($id)
  {
    $astro_id = $id;
    $name=$this->db->select('astrologers.astro_name')

                 ->from('astrologers')

                 ->where('astro_id', $astro_id)->get()

                 ->result_array();
    if (!empty($name))
    {
      $data = array('success' => "true", 'msg' => "Data found", 'name' => $name);
      echo json_encode($data);
    }
    else
    {
      $data = array('success' => "true", 'msg' => "No data Found");
      echo json_encode($data);
    }
  }

  // ******************END astrologername ***************************
  // **************START Reports **********************
  public function reports()
  {
    $result=fetchbyresult('reportquestionoption');  
    if (!empty($result))
    {
        $data = array('success' => "true",'msg' => 'success', 'reportdata' => $result);
    }
    else
    {
      $data = array('success' => "true", 'msg' => "No data Found");
    }
    echo json_encode($data);
  }
  
  public function reportsOptions()
  {
    $id = $this->input->post('name');
    if(!empty($id))
    {
        $where = "rqo_question LIKE '%$id%'";
        $result=fetchbyresultwhere('reportquestionoption',$where);
        //echo $this->db->last_query();exit;
        if (!empty($result))
        {
          $data = array('success' => "true",'msg' => 'success', 'reportdata' => $result);
        }
        else
        {
          $data = array('success' => "true", 'msg' => "No data Found");
        }
    }    
    echo json_encode($data);
  }
  // ******************END Reports ***************************

  // ******************Start ReportsById***************************
  public function reportSend()
  {
    $userid = $this->input->post('userid');
    $astroid = $this->input->post('astroid');
    $reportAmt = $this->input->post('reportamt');
    $selectReport = $this->input->post('selectRepport');
    $option1 = $this->input->post('option1');
    $name = $this->input->post('name');
    
    // $option2 = $this->input->post('option2');
    // $option3 = $this->input->post('option3');
    // $option4 = $this->input->post('option4');
    if(!empty($name))
    {
        $where = "rqo_question LIKE '%$name%'";
        $result=fetchbyresultwhere('reportquestionoption',$where);
        //print_r($result);exit;
        $id = $result[0]['rqo_id'];
        $op1 = $result[0]['rqo_option1'];
        $op2= $result[0]['rqo_option2'];
        $op3 = $result[0]['rqo_option3'];
        $op4 = $result[0]['rqo_option4'];
        
        if(!empty($result)){
            $k = 1;
            $option = explode(',',$option1);
            $len = count($option);
            $option1 = $option2 = $option3 = $option4 = 0;
            for($i=0;$i<$len;$i++){
                $ko = $option[$i];
                if($op1 == $ko){
                    $option1 = $ko; 
                }if($op2 == $ko){
                    $option2 = $ko; 
                }if($op3 == $ko){
                    $option3 = $ko; 
                }if($op4 == $ko){
                    $option4 = $ko; 
                }
            }
            if(!empty($option1)){$option1 = 'on';}
            if(!empty($option2)){$option2 = 'on';}
            if(!empty($option3)){$option3 = 'on';}
            if(!empty($option4)){$option4 = 'on';}
        } 
    
        //  if(!empty($option2))
        //   {
        //   $option2="on";
        //   }
        //  if(!empty($option3))
        //   {
        //   $option3="on";
        //   }
        //  if(!empty($option4))
        //   {
        //   $option4="on";
        //   }
        
        $reportdescription = $this->input->post('reportdescription');
    
        $result=fetchbyresultwhere('wallet',array('user_id'=>$userid));
        $walamt = $result[0]['wallet_amt'];
        if(!empty($walamt) && $walamt>=$reportAmt)
        {  
          $image = base64_decode($this->input->post("photo"));
         
          $f = finfo_open();
          $mime_type = finfo_buffer($f, $image, FILEINFO_MIME_TYPE);
          $value = explode("/",$mime_type);
          for($i=0;$i<count($value);$i++)
          {
            $first = $value[0];
            $second = $value[1];
          }
          //print_r($second);exit;
          $image_name = md5(uniqid(rand(), true));
          if($second=='pdf')
          {
            $filename = $image_name . '.' . 'pdf';  
          }
          else
          {
            $filename = $image_name . '.' . 'png';  
          }
          // MY CODE STARRT 11 may -2021 start 100 % working code but comment
                  //  $image = base64_decode($this->input->post("rp_solution_attachment"));       
                  //  $image_name = md5(uniqid(rand(), true));
                  //  $filename = $image_name . '.' . 'png';
                  //   $path = "pdfimagedoc/astrologertouser/".$filename;
                  //   file_put_contents($path, $image);
                  //   $data = array('rp_solution_attachment'=>$filename);
          // MY CODE STARRT 11 may -2021 start  end 
          $Insertdata = [
                          'rp_user_id' => $userid,
                          'rp_astro_id' => $astroid,
                          'rp_amountpaid' => $reportAmt,
                          'rp_type' => $selectReport,
                          'rp_description' => $reportdescription,
                          'rp_op1' => $option1,
                          'rp_op2' => $option2,
                          'rp_op3' => $option3,
                          'rp_op4' => $option4,
                          'rp_attachment' => $filename
                        ];
           
           $path = base_url().'pdfimagedoc/usertoastrologer/'.$filename;
          
          // $etc = $_FILES['photo']['name'];
          // $etcdata =  str_replace(" ", "",$etc);
          // echo  'name = '.$dataname = $randam.$etcdata;exit;
          // $data2['rp_attachment'] = $dataname;
          // $image = base64_encode($filename);
          // move_uploaded_file($image, 'pdfimagedoc/usertoastrologer/'. $image);
          
          // $path = base_url().'pdfimagedoc/usertoastrologer/'.$filename;
          // file_put_contents($path, $image);
          //  exit;
          $ret = fetchbyresultwhere('wallet_admin',array('wad_id'=>1));    
          $amt = $ret[0]['wad_amt'] + $reportAmt;
          $UpdateData = ['wad_amt' => $amt];
          updateData('wallet_admin',$UpdateData,array('wad_id'=>1));
          $req = addDatas('reportsendtoastro',$Insertdata);
          $last = $this->db->insert_id();            
          $result=fetchbyresultwhere('reportsendtoastro',array('rp_id'=>$last));  
          $data = array('status' => "true", 'msg'=>'Submitted successfully');
          //'data' => $result
        }
        else
        {
          $data = array('success' => "true", 'msg' => "Insufficent Amount In Your Wallet Plese Recharge");
        }
    }
    else
    {
      $data = array('success' => "true", 'msg' => "Plese Select the above field");
    }
    echo json_encode($data);
  }
  // ******************END ReportsById***************************
  
  public function showAstroProfile()				// Show Astrologer Profile
  {
		$astroid = $this->input->post('astroid');
		$res = fetchbyresultwhere('astrologers',array('astro_id'=>$astroid)); 
		if(!empty($res))
		{
			$result = array('success'=>'true','msg'=>'Data Found','data'=>$res);
		}
		else
		{
			$result = array('success'=>'true','msg'=>'Data Is Not Updated');
		}
		echo json_encode($result);
  }

  public function updateAstroProfile()				// Submit Update Astrologer
  {
		$astroid = $this->input->post('astroid'); 
		$name = $this->input->post('name');  	
		$email = $this->input->post('email');  	
		$mobile = $this->input->post('mobile');  	
		$country = $this->input->post('country');  	
		$skill = $this->input->post('skill'); 
		$language = $this->input->post('language'); 
		$exp = $this->input->post('exp'); 
		$ac_number = $this->input->post('ac_number'); 
		$address = $this->input->post('address'); 

		if(!empty($name)){$UpdateData['astro_name'] = $name;}
		if(!empty($email)){$UpdateData['astro_email'] = $email;}
		if(!empty($language)){$UpdateData['astro_language'] = $language;}
		if(!empty($exp)){$UpdateData['astro_experience'] = $exp;}
		if(!empty($country)){$UpdateData['country'] = $country;}
		if(!empty($mobile)){$UpdateData['astro_mobile'] = $mobile;}
		if(!empty($ac_number)){$UpdateData['ac_number'] = $ac_number;}
		if(!empty($address)){$UpdateData['address'] = $address;}
		if(!empty($skill)){$UpdateData['skill'] = $skill;}

    $image1 = base64_decode($this->input->post("profile_image"));    // photo
    $f = finfo_open();
    $mime_type = finfo_buffer($f, $image1, FILEINFO_MIME_TYPE);
    $value = explode("/",$mime_type);
    for($i=0;$i<count($value);$i++)
    {
      $first = $value[0];
      $second = $value[1];
    }
    $image_name = md5(uniqid(rand(), true));
    $filename = $image_name.'.'.$second;
    if(!empty($filename)){$UpdateData['astro_image'] = $filename;}

		$res = updateData('astrologers',$UpdateData,array('astro_id'=>$astroid)); 
		if(!empty($res))
		{
			$result = array('success'=>'true','msg'=>'Data Updated Successfully.');
		}
		else
		{
			$result = array('success'=>'true','msg'=>'Data Is Not Updated');
		}
		echo json_encode($result);
  }

  public function astroChangePassword()     //Change Password
  {
    $astroid = $this->input->post('astroid');
    $res = fetchbyresultwhere('astrologers',array('astro_id'=>$astroid)); 
    $oldpwd = $this->input->post('oldpwd');
    $newpwd = $this->input->post('newpwd');
    $cfmpwd = $this->input->post('cfmpwd');
    if($oldpwd == $res[0]['astro_pass'])
    {
        if($newpwd == $cfmpwd)
        {
            $UpdateData = ['astro_password' => sha1($newpwd),'astro_pass' => $newpwd];
            $res = updateData('astrologers',$UpdateData,array('astro_id'=>$astroid)); 
            if(!empty($res))
            {
                $result = array('success'=>'true','msg'=>'Password Changed Successfully.');
            }
            else
            {
                $result = array('success'=>'true','msg'=>'Password Is Not Changed.');
            }
        }
        else
        {
            $result = array('success'=>'true','msg'=>'New Password And Confirm Password Is Not Matched.');
        }
    }
    else
    {
        $result = array('success'=>'true','msg'=>'Old Password Is Not Correct.');
    }
    echo json_encode($result);
  }

  public function updateDiscountRate()      // Update Discount and Rate
  {
      $astroid = $this->input->post('astroid');
      $chatdis = $this->input->post('chatdis');
      $calldis = $this->input->post('calldis');
      $reportdis = $this->input->post('reportdis');
      $callrate = $this->input->post('callrate');
      $chatrate = $this->input->post('chatrate');
      $reportrate = $this->input->post('reportrate');

      if(!empty($chatdis)){$UpdateData['astro_chat_rate_discount'] = $chatdis;}
      if(!empty($calldis)){$UpdateData['astro_calling_rate_discount'] = $calldis;}
      if(!empty($reportdis)){$UpdateData['astro_report_rate_discount'] = $reportdis;}
      if(!empty($callrate)){$UpdateData['astro_calling_rate'] = $callrate;}
      if(!empty($chatrate)){$UpdateData['astro_chat_rate'] = $chatrate;}
      if(!empty($reportrate)){$UpdateData['astro_askreport_rate'] = $reportrate;}

      $res = updateData('astrologers',$UpdateData,array('astro_id'=>$astroid)); 
      if(!empty($res))
      {
        $result = array('success'=>'true','msg'=>'Data Updated Successfully.');
      }
      else
      {
        $result = array('success'=>'true','msg'=>'Data Is Not Updated');
      }
      echo json_encode($result);
  }
  // ***************************balance 02-may-2021 ******************************* 02-may-2021
  public function showbalance()				// Show Astrologer Profile
  {
		$astroid = $this->input->post('astroid');
		
    // $astrobalance = fetchbyresultByCondiction('wallet_astrologer', array('wa_astrologer_id' => $astroid));
    $astrobalance=$this->db->get_where('wallet_astrologer',array('wa_astrologer_id'=> $astroid))->result_array();
if(!empty($astrobalance))

{

  $res =  $astrobalance ;
	$result = array('success'=>'true','msg'=>'Data Found','data'=>$res);
}

else{

 // $astrobal = '0';
  $result = array('success'=>'true','msg'=>'Data Not Found');
}
    
  	echo json_encode($result);
  }
  // ***************************statt*******************************
   // ***************************balance 02-may-2021 ******************************* 02-may-2021
   public function showpaymentreport()				// Show Astrologer Profile
   {
     $astro_id = $this->input->post('astroid');
     
     $astropayview = fetchbywhereorder('wallet_history_astrologer',array('wha_astro_id'=>$astro_id),'desc','wha_id');

 
 if(!empty($astropayview))
 
 {
 
   
   $result = array('success'=>'true','msg'=>'Data Found','data'=>$astropayview);
 }
 
 else{
 
   
   $result = array('success'=>'true','msg'=>'No History Found');
 }
     
     echo json_encode($result);
   }
   // ***************************statt*******************************
   //    **********************************start amount_request_astrologer*******************************************
public function amount_request_astrologer()
{
  $astroid = $this->input->post('astroid');
  $data['ara_amount']= $this->input->post('amount');
  $data['ara_walletavailable_balance']= $this->input->post('availableamount');
  if($data['ara_walletavailable_balance'] > $data['ara_amount'])
  {
  $data['ara_astro_id']= $astroid;


    //  insertdata('request_amount_astrologer',$data);
    $ret= addDatas('request_amount_astrologer',$data);
    // addData('request_amount_astrologer',$data);
    if($ret==true)
    {
     $result = array('success'=>'true','msg'=>'Request Successfully');
     echo json_encode($result);
    }
    else{
      $result = array('success'=>'true','msg'=>'Request Fail Try Again');
     echo json_encode($result);
    }
  }
  else{
    $result = array('success'=>'true','msg'=>'Amount is greater then available Amount');
    echo json_encode($result);
  }
}

//    **********************************end amount_request_astrologer*******************************************
  //    **********************************start amount_request_history*******************************************
  public function amount_request_history()
  {
     $astroid = $this->input->post('astroid');
    
  
     $amt_req_history=fetchbywhereorder('request_amount_astrologer',array('ara_astro_id'=>$astroid),'desc','ara_id');
      
      if($amt_req_history)
      {
       $result = array('success'=>'true','msg'=>'Data Found','data'=>$amt_req_history);
       echo json_encode($result);
      }
      else{
        $result = array('success'=>'true','msg'=>'No Data Found');
       echo json_encode($result);
      }
    
    
  }
  
  //    **********************************end amount_request_history*******************************************
   //    **********************************start report generation request history*******************************************
   public function fetch_send_reply_report_fromastrologer()
   {
    $astro_id = $this->input->post('astroid');
    $userreportview = fetchbywhereorder2('reportsendtoastro',array('rp_astro_id'=>$astro_id),'desc','rp_id','asc','rp_problem_solve_status');
    if($userreportview)
    {
     $result = array('success'=>'true','msg'=>'Data Found','data'=>$userreportview);
     echo json_encode($result);
    }
    else{
      $result = array('success'=>'true','msg'=>'No Data Found');
     echo json_encode($result);
    }
   }
   public function send_reply_report_fromastrologer()
   {

               $data['rp_sendsolution']=$this->input->post('rp_sendsolution'); 
                $data['rp_id']=        $this->input->post('rp_id');
                $data['rp_user_id']=   $this->input->post('rp_user_id');
                $data['rp_astro_id']=  $this->input->post('rp_astro_id');
                $replyid=$data['rp_id'];
                $userid=$data['rp_user_id'];
                $astrologerid=$data['rp_astro_id'];
                // MY CODE STARRT
                $image = base64_decode($this->input->post("rp_solution_attachment"));       
                $image_name = md5(uniqid(rand(), true));
                $filename = $image_name . '.' . 'png';
                 $path = "pdfimagedoc/astrologertouser/".$filename;
                 file_put_contents($path, $image);
                 $data = array('rp_solution_attachment'=>$filename);
          // *************************************************************************************  MY CODE END 
          // ****************************************************************************************ISHAN SIR CODE STARRAT
                // $image1 = base64_decode($this->input->post("rp_solution_attachment"));    // photo
                // $f = finfo_open();
                // $mime_type = finfo_buffer($f, $image1, FILEINFO_MIME_TYPE);
                // $value = explode("/",$mime_type);
                // for($i=0;$i<count($value);$i++)
                // {
                //   $first = $value[0];
                //   $second = $value[1];
                // }
                // $image_name = md5(uniqid(rand(), true));
                // $filename = $image_name.'.'.$second;
                // if(!empty($filename)){$data['rp_solution_attachment'] = $filename;}
                // ******************************************************************************ISHAN SIR CODE END **************************************************************
             


$data['rp_problem_solve_status'] = 1;//update success status

$qry=$this->db->where('rp_id',$replyid)
              ->where('rp_user_id',$userid)
              ->where('rp_astro_id',$astrologerid)
              ->update('reportsendtoastro',$data);
              if ($this->db->affected_rows() == '1') {
                $result = array('success'=>'true','msg'=>'Update Sucessfully');
                echo json_encode($result);
            } else {
                 $result = array('success'=>'true','msg'=>'Failed');
                echo json_encode($result);
            }       

      
   }
   
   //    **********************************end amount_request_history*******************************************
    //    **********************************chat_history*******************************************
  public function chat_history()
  {
     $astroid = $this->input->post('astroid');
    
  
     $chat_history=$this->db->select('*')->from('user_chat_detail_history')->where('ucth_astro_id',$astroid)->order_by('ucth_id','DESC')->join('user','user_chat_detail_history.ucth_user_id=user.user_id')->get()->result_array();
     
   
      if($chat_history)
      {
       $result = array('success'=>'true','msg'=>'Data Found','data'=>$chat_history);
       echo json_encode($result);
      }
      else{
        $result = array('success'=>'true','msg'=>'No Data Found');
       echo json_encode($result);
      }
    
    
  }
  
  //    **********************************end achat_history*******************************************
   //    **********************************CAll_history*******************************************
   public function call_history()
   {
      $astroid = $this->input->post('astroid');
     
   
      $call_history=$this->db->select('*')->from('user_call_detail_history_user')->where('uch_astro_id',$astroid)->order_by('uch_id','DESC')->join('user','user_call_detail_history_user.uch_user_id=user.user_id')->get()->result_array();
      
    
       if($call_history)
       {
        $result = array('success'=>'true','msg'=>'Data Found','data'=>$call_history);
        echo json_encode($result);
       }
       else{
         $result = array('success'=>'true','msg'=>'No Data Found');
        echo json_encode($result);
       }
     
     
   }
   
   //    **********************************end call_history*******************************************
  // end of file
}
?>