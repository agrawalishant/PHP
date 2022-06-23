<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
// ********************************START LOGIN USER************************************************
    public function login_user()
    {
        $email = $this->input->post('email');

        $password = SHA1($this->input->post('password'));



        $data1 = $this->Generalmodel->get_all_where('user', array('user_email' => $email, 'user_password' => $password));

        
        if (!empty($data1)) {

        	$uid = $data1[0]['user_id'];

        	$data2 = $this->Generalmodel->get_all_where('wallet', array('user_id' => $uid));
            
            $data = array('success' => "true", 'msg' => "success", 'userdata' => $data1, 'walletdata' => $data2);

            echo json_encode($data);

        } else {

            $data = array('success' => 'true', 'msg' => "Email and Password is Incorrect");

            echo json_encode($data);

        }

    }

// ********************************END LOGIN USER************************************************

    // ********************************START register USER************************************************

    public function user_register()
    {
        $data['user_first_name'] = $this->input->post('user_first_name');
        $data['user_last_name'] = $this->input->post('user_last_name');
        $email = $data['user_email'] = $this->input->post('user_email');
        $mobile = $data['user_mobile'] = $this->input->post('user_mobile');
        $data['user_password'] = SHA1($this->input->post('password'));
        $data['password'] = $this->input->post('password');
        $data['registerby'] = "Mobile Application";

        $digits_needed=6;
        $otp='';
        $count=0;
        while ($count < $digits_needed) 
        {
            $random_digit = mt_rand(0,9);
            $otp .= $random_digit;
            $count++;
        }
        $data['otp'] = $otp;

        $checkuser = $this->db->where(array('user_email' => $email))->get('user')->num_rows();
        
        if ($checkuser > 0) {

            $result = array('success' => 'true', 'msg' => "Already Registered");
        }
        else
        {
            $res = $this->Generalmodel->add('user', $data);
            $last_id = $this->db->insert_id();
            $wdt['user_id'] = $last_id;
            $walletinsert = $this->Generalmodel->add('wallet', $wdt);

            send_sms_new($mobile, $otp);
            $userdata = $this->db->where(array('user_id' => $last_id))->get('user')->result_array();
            $result = array('success'=>'true','msg'=>'Registered Sucessfully','msg1'=>$userdata);
        }

        echo json_encode($result);
    }

    public function googleLogin()
    {
        $name = $data['user_first_name'] = $this->input->post('user_first_name');
        //$data['user_last_name'] = $this->input->post('user_last_name');
        $email = $data['user_email'] = $this->input->post('user_email');
        $data['user_mobile'] = $this->input->post('user_mobile');
        $data['user_gender'] = $this->input->post('user_gender');
        $data['user_password'] = SHA1($this->input->post('password'));
        $data['password'] = $this->input->post('password');
        $data['registerby'] = "Google Application";

        $checkuser = $this->db->where(array('user_email' => $email))->get('user')->result_array();
        if (!empty($checkuser))
        {
            $user_id = $checkuser[0]['user_id'];
            $req = fetchbyresultwhere('user',array('user_id' => $user_id));
            $wallet = fetchbyresultwhere('wallet',array('user_id' => $user_id));
            $result = array('success' => 'true', 'msg' => "Welcome ".ucfirst($name),'Details'=>$req,'Wallet'=>$wallet);
        }
        else
        { 
            $res = $this->Generalmodel->add('user', $data);
            if(!empty($res))
            {
                $last_id = $this->db->insert_id();
                $wdt['user_id'] = $last_id;
                $walletinsert = $this->Generalmodel->add('wallet',$wdt);
    
                $userdata = $this->db->where(array('user_id' => $last_id))->get('user')->result_array();
                $wallet = fetchbyresultwhere('wallet',array('user_id' => $last_id));
                $result = array('success'=>'true','msg'=>'Login Sucessfully','Details'=>$userdata,'Wallet'=>$wallet);
            }
            else
            {
                $result = array('success'=>'true','msg'=>'Login Fail Please Try Again');
            }
        }
        echo json_encode($result);
    }

    public function facebookLogin()
    {
        $name = $data['user_first_name'] = $this->input->post('user_first_name');
        //$data['user_last_name'] = $this->input->post('user_last_name');
        $email = $data['user_email'] = $this->input->post('user_email');
        $data['user_mobile'] = $this->input->post('user_mobile');
        $data['user_gender'] = $this->input->post('user_gender');
        $data['user_password'] = SHA1($this->input->post('password'));
        $data['password'] = $this->input->post('password');
        $data['registerby'] = "Facebook Application";

        $checkuser = $this->db->where(array('user_email' => $email))->get('user')->resutle_array();
        if (!empty($checkuser)) 
        {
            $user_id = $checkuser[0]['user_id'];
            $req = fetchbyresultwhere('user',array('user_id' => $user_id));
            $wallet = fetchbyresultwhere('wallet',array('user_id' => $user_id));
            $result = array('success' => 'true', 'msg' => "Welcome ".ucfirst($name),'Details'=>$req,'Wallet'=>$wallet);
        }
        else
        { 
            $res = $this->Generalmodel->add('user', $data);
            if(!empty($res))
            {
                $last_id = $this->db->insert_id();
                $wdt['user_id'] = $last_id;
                $walletinsert = $this->Generalmodel->add('wallet', $wdt);
    
                $userdata = $this->db->where(array('user_id' => $last_id))->get('user')->result_array();
                $wallet = fetchbyresultwhere('wallet',array('user_id' => $last_id));
                $result = array('success'=>'true','msg'=>'Login Sucessfully','Details'=>$userdata,'Wallet'=>$wallet);
            }
            else
            {
                $result = array('success'=>'true','msg'=>'Login Fail Please Try Again');
            }
        }
        echo json_encode($result);
    }

    public function user_register1()

    {

        $datas['user_first_name'] = $this->input->post('user_first_name');

        $userfirstname = $this->input->post('user_first_name');

        $datas['user_last_name'] = $this->input->post('user_last_name');

        $datas['user_mobile'] = $this->input->post('user_mobile');

        $mobile = $this->input->post('user_mobile');

        $datas['user_email'] = $this->input->post('user_email');

        $email = $this->input->post('user_email');

        $datas['user_password'] = sha1($this->input->post('user_password'));

        $datas['registerby'] = "Android Application";

        $checkuser = $this->db->where(array('user_email' => $email))->get('user')->num_rows();

        if ($checkuser > 0) {

            $data = array('status' => 'true', 'msg' => "Already Registered");

            echo json_encode($data);

        } else {

            $result = $this->Generalmodel->add('user', $datas);

            $last_id = $this->db->insert_id();

            $wdt['user_id'] = $last_id;

            $walletinsert = $this->Generalmodel->add('wallet', $wdt);

            if (!empty($result)) {

                $digits_needed = 6;

                $otp = ''; // set up a blank string

                $count = 0;

                while ($count < $digits_needed) {

                    $random_digit = mt_rand(0, 9);

                    $otp .= $random_digit;

                    $count++;

                }

                $otps = "Dear " . $userfirstname . ", " . "Your Mobile Verification code is " . $otp . "Thank You Astroved Vakta.";

                send_sms_new($mobile, $otps);

            }

            $data = array('status' => "true", 'msg' => "success", 'otp' => $otps, 'session_register_userid' => $last_id);

            echo json_encode($data);



        }

    }

    // ********************************START otp check************************************************

    public function checkotps()

    {
        $opt = $this->input->post('otp');
        $userid = $this->input->post('userid');

        $userdata = $this->db->where(array('user_id' => $userid))->get('user')->result_array();
        if(!empty($userdata)){ $typeopt = $userdata[0]['otp']; }else {$typeopt=0;}
        if ($opt == $typeopt) {

            //updateData('user', array('user_sms_verified' => 1), array('user_id' => $session_register_userid));

            $data = array('success' => 'true', 'msg' => 'OTP is Verified');

            echo json_encode($data);

        } else {

            $data = array('success' => "true", 'msg' => "OTP is Incorrect");

            echo json_encode($data);

        }
    }

// ********************************END ************************************************

    // ********************************START ************************************************

    public function update_user_part_details()

    {

        $user_id = $this->input->post('user_id');

        $data['user_gender'] = $this->input->post('user_gender');

        $data['user_mobile'] = $this->input->post('user_mobile');

        $data['user_dob'] = $this->input->post('user_dob');

        $data['user_timeofbirth'] = $this->input->post('user_timeofbirth');

        $data['user_placeofbirth'] = $this->input->post('user_placeofbirth');

        $data['user_state'] = $this->input->post('user_state');

        $data['user_country'] = $this->input->post('user_country');

        $data['user_maritalstatus'] = $this->input->post('user_maritalstatus');

        $data['user_occupation'] = $this->input->post('user_occupation');

        $result = $this->Generalmodel->modifyMulti('user', $data, array('user_id' => $user_id));

        if (!empty($result)) {
            $userdata = $this->db->where(array('user_id' => $user_id))->get('user')->result_array();
            $data = array('success' => 'true', 'msg' => 'Data Updates Successfully.','msg1'=>$userdata);

            echo json_encode($data);

        } else {

            $data = array('success' => "true", 'msg' => "Not Updated");

            echo json_encode($data);

        }

        //$this->user_model->updatepartdetail($data,$userid);

    }

    // ********************************START ************************************************

    public function user_update_profile()
    {
        $user_id = $this->input->post('user_id');
        $datas['user_first_name'] = $this->input->post('user_first_name');
        $datas['user_last_name'] = $this->input->post('user_last_name');
        $datas['user_gender'] = $this->input->post('user_gender');
        $datas['user_mobile'] = $this->input->post('user_mobile');
        $datas['user_email'] = $this->input->post('user_email');
        $datas['user_dob'] = $this->input->post('user_dob');
        $datas['user_timeofbirth'] = $this->input->post('user_timeofbirth');
        $datas['user_placeofbirth'] = $this->input->post('user_placeofbirth');
        $datas['user_state'] = $this->input->post('user_state');
        $datas['user_country'] = $this->input->post('user_country');
        $datas['user_maritalstatus'] = $this->input->post('user_maritalstatus');
        $datas['user_occupation'] = $this->input->post('user_occupation');     

        $image = base64_decode($this->input->post("user_image"));       
        $image_name = md5(uniqid(rand(), true));
        $filename = $image_name . '.' . 'png';
        //rename file name with random number
         $path = "image/user/".$filename;
        //image uploading folder path
         file_put_contents($path, $image);
        // image is bind and upload to respective folde

        // https://www.hostmystory.com/how-to-upload-image-using-rest-api-in-php-codeigniter

        $datas = array('user_image'=>$filename);

       

        $result = $this->Generalmodel->modifyMulti('user', $datas, array('user_id' => $user_id));

        if (!empty($result)) {
            $userdata = $this->db->where(array('user_id' => $user_id))->get('user')->result_array();
            $data = array('success' => 'true', 'msg' => 'User Profile Update Successfully.','msg1'=>$userdata);

            echo json_encode($data);

        } else {

            $data = array('success' => "true", 'msg' => "Already Updated ");

            echo json_encode($data);

        }

    }



    public function userupdateprofile2()

    {



        //echo    $proimage = $this->input->post('user_image');



        //    echo $image = base64_decode($this->input->post("user_image"));

        //   exit;



        //     if(!empty($proimage))



        //     {



        //       $image = base64_decode($proimage);



        //       $image_name = sha1($proimage);



        //       $filename = $image_name . '.' . 'png';



        //      $path = 'image/user/'.$filename;



        //       file_put_contents($path,$image);



        //       $datas['user_image'] = $filename;

        //    }
    }

    // ********************************START ************************************************

    public function forgetpassword()
    {
        $emailphoneno = $this->input->post('emailphoneno');
        
        $query = $this->db->where('user_email', $emailphoneno);
        $query = $this->db->or_where('user_mobile', $emailphoneno);
        $query = $this->db->get('user');
        $row = $query->result_array();
        $id = $row[0]['user_id'];
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
            updateData('user',$updateData,array('user_id'=>$id));
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
        $userid = $this->input->post('userid');
        $otp = $this->input->post('otp');
        
        $query = $this->db->where('user_id', $userid);
        $query = $this->db->get('user');
        $row = $query->result_array();
        $chk = $row[0]['new_password'];
        //print_r($row);exit;    
        
        if(!empty($row[0]))
        {
            if($otp == $chk)
            {
                $updateData['new_password'] = '';
                updateData('user',$updateData,array('user_id'=>$userid));
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
        $userid = $this->input->post('userid');
        $new = $this->input->post('newpwd');
        $confirm = $this->input->post('confirmpwd');
        
        $query = $this->db->where('user_id', $userid);
        $query = $this->db->get('user');
        $row = $query->result_array();
        //print_r($row);exit;    
        
        if(!empty($row[0]))
        {
            if($new == $confirm)
            {
                $updateData['user_password'] = sha1($new);
                $updateData['user_pass'] = $new;
                updateData('user',$updateData,array('user_id'=>$userid));
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
    
    // ********************************START ************************************************

    public function wallet_history()

    {

        $user_id = $this->input->post('user_id');
        $userbalance=$this->db->get_where('wallet',array('user_id'=> $user_id))->result_array();
        $wallettrj = fetchbywhereorder('wallet_recharge_history', array('wrh_user_id' => $user_id), 'desc', 'wrh_id');

        if (!empty($wallettrj)) {

            $data = array('success' => "true", 'msg' => "Data found", 'msg1' => $wallettrj,'balance'=>$userbalance);
        } else {

            $data = array('success' => "true", 'msg' => "No Record Found");
        }
        echo json_encode($data);
    }

      // ********************************START ************************************************

      public function userbyid()

      {

          $user_id = $this->input->post('user_id');

           $name = fetchbywhereorder('user', array('user_id' => $user_id), 'desc', 'user_id');

        //   $name = $this->Generalmodel->get_all_where('user',array('user_id'=>$user_id));

          if (!empty($name)) {

              $data = array('success' => "true", 'msg' => "Data found", 'name' => $name);

              echo json_encode($data);

          } else {

              $data = array('success' => "true", 'msg' => "No data Found");

              echo json_encode($data);

          }

      }

    

    // ********************************START ************************************************



    public function call_history()

    {

        $user_id = $this->input->post('user_id');



        // $calldetailhistory = fetchbywhereorder('user_call_detail_history_user', array('uch_user_id' => $user_id), 'desc', 'uch_id');

        $calldetailhistory=$this->db->select('*')->from('user_call_detail_history_user')->where('uch_user_id',$user_id)->order_by('uch_id','DESC')->join('astrologers','user_call_detail_history_user.uch_astro_id=astrologers.astro_id')->get()->result_array();
      

        if (!empty($calldetailhistory)) {

            

            $data = array('success' => "true", 'msg' => "Data found", 'data' => $calldetailhistory);

            

        } else {

            $data = array('success' => "true", 'msg' => "No History Found");

        }
        echo json_encode($data);
    }

    // ********************************START ************************************************

    public function chat_history()

    {

        $user_id = $this->input->post('user_id');

        // $chatdetailhistory = fetchbywhereorder('user_chat_detail_history', array('ucth_user_id' => $user_id), 'desc', 'ucth_id ');
        $chatdetailhistory=$this->db->select('*')->from('user_chat_detail_history')->where('ucth_user_id',$user_id)->order_by('ucth_id','DESC')->join('astrologers','user_chat_detail_history.ucth_astro_id=astrologers.astro_id')->get()->result_array();
     


        if (!empty($chatdetailhistory)) {

            $data = array('success' => "true", 'msg'=>'Data Found','data' => $chatdetailhistory);

            

        } else {

            $data = array('success' => "true", 'msg' => "No History Found");

        }
        echo json_encode($data);
    }

    // ********************************START ************************************************

    public function request_reportdetail()

    {

        $user_id = $this->input->post('user_id');

        // $reqreportview10 = fetchbywhereorder2('reportsendtoastro', array('rp_user_id' => $user_id), 'desc', 'rp_id', 'asc', 'rp_problem_solve_status');
        $reqreportview10=$this->db->select('*')->from('reportsendtoastro')->where('rp_user_id',$user_id)->order_by('rp_id','desc')->order_by('rp_problem_solve_status','asc')
                         ->join('astrologers','reportsendtoastro.rp_astro_id=astrologers.astro_id')->get()->result_array();
     


        if (!empty($reqreportview10)) {

            $data = array('success' => "true", 'msg' => "Data found", 'data' => $reqreportview10);

            

        } else {

            $data = array('success' => "true", 'msg' => "No History Found");

        }
        echo json_encode($data);
    }

    // ********************************START ************************************************

    public function orderhistory()

    {

        $user_id = $this->input->post('user_id');

        // $orderhistroy = fetchbywhereorder('payment', array('user_id' => $user_id), 'desc', 'payment_id');
        $data1=$this->db->select('*')->from('payment')->where('user_id',$user_id)->order_by('payment_id','DESC')->join('product','product.pr_id=payment.product_id')->get()->result_array();
         foreach($data1 as $data2)
         {
            $data3['payment_id']=$data2['payment_id'];
            $data3['unique_id']=$data2['unique_id'];
            $data3['user_id']=$data2['user_id'];
            $data3['total_amt']=$data2['total_amt'];
            $data3['discount_amount']=$data2['discount_amount'];
             $data3['product_id']=$data2['product_id'];
            $data3['carat_id']=$data2['carat_id'];
            $data3['carat_weight']=$data2['carat_weight'];
            $data3['txn_id']=$data2['txn_id'];
            $data3['payment_status']=$data2['payment_status'];
            $data3['pay_by']=$data2['pay_by'];
            $data3['payfor']=$data2['payfor'];
            $data3['order_status']=$data2['order_status'];
            $data3['timestamp']=$data2['timestamp'];
            // $data3['pr_id']=$data2['pr_id'];
            // $data3['pr_title']=$data2[''];
            $data3['pr_category']=$data2['pr_category'];
            $data3['pr_originalprice']=$data2['pr_originalprice'];
            $data3['pr_pricedetail']=$data2['pr_pricedetail'];
            $data3['pr_discount']=$data2['pr_discount'];
            $data3['pr_finalprice']=$data2['pr_finalprice'];
          
           
                $exp=$data3['product_id'];
              
              $nme= explode(',',$exp);
              //explode(" ",$str)
              $aa[]="";
              foreach($nme as $pname)
              {
              // print_r($pname);
              $fetchdta123=fetchbyresultByCondiction('product',array('pr_id'=>$pname));
              if(count($fetchdta123)>0) {
                $aa[]= $fetchdta123[0]['pr_title'];
              }
              }
              $data3['pr_title']=  implode(',',$aa);
                $aa =array();

            $orderhistroy[] = $data3;
         }

        if (!empty($orderhistroy)) {

            $data = array('success' => "true", 'msg' => "Data found", 'msg1' => $orderhistroy);

            

        } else {

            $data = array('success' => "true", 'msg' => "No History Found");

        }
        echo json_encode($data);
    }

    // ********************************START ************************************************

    // created for get detail report request generate

    public function get_detailedreport()

    {

        $resport = astrologerfetchorderlimitwhere('astrologers', 'astro_ranking', 'ASC', array('astro_approved_status' => 1));

        $questionfetch = fetchbyresult('reportquestionoption');
        if(empty($questionfetch)){$questionfetch=0;}


        if (!empty($resport)) {

            $data = array('success' => "true", 'msg' => "Data found", 'astrologers' => $resport, 'reporttype' => $questionfetch);

            

        } else {

            $data = array('success' => "true", 'msg' => "No Data Found");

        }

        echo json_encode($data);

    }

    public function send_detailedreport_requesttoastrologer()

    {

        $astro_id = $this->input->post('astroid_reportss');

        $user_id = $this->input->post('usersss_id');

        $amt_report = $this->input->post('reports_rate');

        // MY CODE STARRT 11 may -2021 start 100 % working code but comment
              //  $image = base64_decode($this->input->post("rp_solution_attachment"));       
              //  $image_name = md5(uniqid(rand(), true));
              //  $filename = $image_name . '.' . 'png';
              //   $path = "pdfimagedoc/astrologertouser/".$filename;
              //   file_put_contents($path, $image);
              //   $data = array('rp_solution_attachment'=>$filename);
      // MY CODE STARRT 11 may -2021 start  end 
      
      
      
      
      $randam = uniqid(8);

        $results = fetchbyresultByCondiction('wallet', array('user_id' => $user_id));

        $updateamt = $results[0]['wallet_amt'] - $amt_report;

        updateData('wallet', array('wallet_amt' => $updateamt), array('user_id' => $user_id));

        $insertdata = [

            'unique_id' => $randam,

            'user_id' => $user_id,

            'total_amt' => $amt_report,

            'payfor' => 'REPORT GENERATION',

            'payment_status' => 'Success',

            'pay_by' => 'Wallet',

        ];

        WalletaddData('payment', $insertdata);

        $data2['rp_user_id'] = $user_id;

        $data2['rp_astro_id'] = $astro_id;

        $data2['rp_amountpaid'] = $amt_report;

        $data2['rp_type'] = $this->input->post('rp_type');

        $data2['rp_description'] = $this->input->post('rp_description');

        if (!empty($this->input->post('op1'))) {

            $data2['rp_op1'] = $this->input->post('op1');

        }

        if (!empty($this->input->post('op2'))) {

            $data2['rp_op2'] = $this->input->post('op2');

        }

        if (!empty($this->input->post('op3'))) {

            $data2['rp_op3'] = $this->input->post('op3');

        }

        if (!empty($this->input->post('op4'))) {

            $data2['rp_op4'] = $this->input->post('op4');

        }

        insertdata('reportsendtoastro', $data2);

// -----------------------------------

        if (!empty($astro_id && $user_id && $amt_report)) {

            $data = array('success' => "success", 'msg' => "Data Send sucessfully");

            echo json_encode($data);

        } else {

            $data = array('success' => "success", 'msg' => "Data missing /No Balance/Plz Recharge");

            echo json_encode($data);

        }



    }

    // ******************************** END ************************************************

    // ********************************START ************************************************

    public function commentrateastrologer()

    {

        $data1['cr_user_id']=$this->input->post('cr_user_id');

        $data1['cr_astro_id']=$this->input->post('cr_astro_id');

        $data1['cr_comment']=$this->input->post('cr_comment');

        $data1['cr_rating']=$this->input->post('cr_rating');

        

         $cmrtastro = $this->Generalmodel->add('comment_rating_astrologer',$data1); 

    if(!empty($cmrtastro))

    {

       $data=array('success' => "success", 'msg' => "Rate sucessfully");

       echo json_encode($data);

    }else{

       $data=array('success' => "fail", 'msg' => "Data not updated");

       echo json_encode($data);

    }

        

    }  // ******************************** END ************************************************

       // ********************************astrologer name ************************************************

   public function username($id)
   {
       $user_id = $id;    
      $name=$this->db->select('user.user_first_name')
                   ->from('user')
                   ->where('user_id', $user_id)->get()
                   ->result_array();
       if (!empty($name)) {
           $data = array('success' => "success", 'msg' => "Data found", 'name' => $name);
           echo json_encode($data);
       } else {
           $data = array('success' => "success", 'msg' => "No data Found");
           echo json_encode($data);
       }
   }

  // ********************************START ************************************************
  // ********************************product purchase ************************************************
// ********************************cart pay wallet product purchase by wallet start 07/may/2021************************************************
public function cartpayWallet()
{
    $walletamt = $this->input->post('walletamt');
    	$amt = $this->input->post('amt');

        if($amt > $walletamt)
        {
            $data = array('status'=>'success', 'msg' => "Plz Recharge Wallet");
            echo json_encode($data);
        }
        else{
    	
        $userid = $this->input->post('userid');
    	$productid = $this->input->post('productid');
    	$discountamt = $this->input->post('discountamt');

		$carat_id = $this->input->post('carat_id');
		$carat_weight = $this->input->post('carat_weight');

    	$randam = uniqid(8);

    	$results = fetchbyresultByCondiction('wallet',array('user_id'=>$userid));
    	$updateamt = $results[0]['wallet_amt'] - $amt;
    	updateData('wallet',array('wallet_amt'=>$updateamt),array('user_id'=>$userid));
    	$insertdata = [
    					'unique_id' => $randam,
    					'user_id' => $userid,
						'total_amt' => $amt,
						'discount_amount'=>$discountamt,
    					'product_id' => $productid,
    					'payment_status' => 'Success',
    					'pay_by' => 'Wallet',
						'carat_id' => $carat_id,
						'carat_weight' => $carat_weight
    				];
    	WalletaddData('payment',$insertdata);
        $data = array('status'=>'success', 'msg' => "Transaction Completed Successfully");
        echo json_encode($data);

    	
                }
 
  
}
// ********************************product purchase by wallet end ************************************************
// ******************************wallet balance start
  // ***************************balance 02-may-2021 ******************************* 02-may-2021
  public function showbalance()				
  {
		$user_id = $this->input->post('user_id');
		
    // $astrobalance = fetchbyresultByCondiction('wallet_astrologer', array('wa_astrologer_id' => $astroid));
    $userbalance=$this->db->get_where('wallet',array('user_id'=> $user_id))->result_array();
if(!empty($userbalance))

{

  $res =  $userbalance ;
	$result = array('success'=>'true','msg'=>'Data Found','data'=>$res);
}

else{

 // $astrobal = '0';
  $result = array('success'=>'true','msg'=>'Data Not Found');
}
    
  	echo json_encode($result);
  }
  public function showbalance2()				// Show Astrologer Profile
  {
		$user_id = $this->input->post('user_id');
		
    // $astrobalance = fetchbyresultByCondiction('wallet_astrologer', array('wa_astrologer_id' => $astroid));
    $userbalance=$this->db->get_where('wallet',array('user_id'=> $user_id))->result_array();
if(!empty($userbalance))

{

  $res =  $userbalance ;
	$result = array('success'=>'true','msg'=>'Data Found','data'=>$res);
}

else{

 // $astrobal = '0';
  $result = array('success'=>'true','msg'=>'Data Not Found');
}
    
  	echo json_encode($result);
  }
// **************************************************
// ********************************recharge wallet ************************************************
public function rechargewallet() {
    if($this->input->post('user_id') != '')
    {
        $totalamt = $this->input->post('totalAmount');
        $user_id = $this->input->post('user_id');
        $randam_id = uniqid(8);
        //$userID = $userID.",".$randam;
        
        // *********
        $data['user_id'] = $user_id;
        $data['unique_id'] = $randam_id;
        $data['payment_status'] = "success";
        
        // 21/01/2021 start insert to recharege histroy------wallet recharge history
        $data2['wrh_payment_status'] = 'Success';
        $data2['wrh_user_id'] = $user_id;
        $data2['wrh_amount'] =$totalamt;
        $data2['wrh_txn_id'] =$randam_id;
        
        insertdata('wallet_recharge_history',$data2);
        //--------------end wallet recharge history
        $check = fetchby_wheres('wallet',array('user_id'=>$user_id));
        if(!empty($check))
        {
            //print_r($check);exit;
            $amt = $check[0]['wallet_amt'];
            //echo "amt = ".$amt;exit;
            $data['wallet_amt'] =  $totalamt+$amt;
            updateData('wallet',$data,array('user_id'=>$user_id));	
        }
        else
        {
            addWalletData('wallet',$data);
        }
    
        // $data['title'] = 'Razorpay Success | TechArise';
      
        $data = array('status'=>'success', 'msg' => "Transaction Completed Successfully");
        echo json_encode($data);
    }  else
    {
        echo json_encode(array('status'=>'success','msg'=>'NOT WORKING / TRANJECTION FAIL'));
    }
} 
// *********************************recharge wallet END*****************************************************
public function cart_razorpaysuccess() {
    if($this->input->post('user_id') != '')
    {
        $totalamt = $this->input->post('totalAmount');
      
        $randam_id = uniqid(8);
      
         $data['title'] = 'Razorpay Success ';
    //  ****OLD CODE
     $user_id = $this->input->post('user_id');
    $rand = $randam_id;
    $amt = $totalamt;
    // $itm = $this->input->post('item');
    $itm_id = $this->input->post('item_id');
    $carat_id = $this->input->post('carat_id');
    $carat_weight = $this->input->post('carat_weight');
    $insertdata = [
                    'unique_id' => $rand,            
                    'user_id' => $user_id,            
                    'total_amt' => $amt, 
                    'product_id' => $itm_id, 
                    'payment_status'=>'success',
                    'pay_by'=>'Online',
                    'payfor'=>'product Purchase',
                    'carat_id' => $carat_id,
                    'carat_weight' => $carat_weight
                ];
     //$data['payment_status'] = "success";
    insertdata('payment',$insertdata);
  //  redirect('cart','refresh');
    // $destroy = $this->cart->destroy();
    
     
    //  ***OLD CODE
        
       
       $data = array('status'=>'success', 'msg' => "Working/ Paid");
       echo json_encode($data);
    }  else
    {
        $data = array('status'=>'success', 'msg' => "Not Paid / Not working");
       echo json_encode($data);
     
    }
} 

public function callCouponCode()
{
    $code       = $this->input->post('code');
    $callrate       = $this->input->post('callrate');
    $users_ids      = $this->input->post('user_id');
    $astrol_ids     =$this->input->post('astro_id'); 
    $walletbalance  = $this->input->post('walletbalance');
    $date = date('Y-m-d');
    
    $codeDetails=fetchbyresultByCondiction('callcoupon',array('codename'=>$code));//fetchresult('callcoupon');
    if(!empty($codeDetails))
    {
        $enddate = $codeDetails[0]['enddate'];
        if($enddate>=$date)
        {
            $codepersent = $codeDetails[0]['codepercent'];   
            if($codepersent>0)
            {
                $peramt = ($callrate*$codepersent)/100;
                $finalamt = $callrate-$peramt;    
                $result = array('success'=>'true','msg'=>'Code Applied Successfully','data'=>$finalamt);
            }
        }
        else
        {
            $result = array('success'=>'false','msg'=>'Code Expired Try Another');
        }
    }
    else
    {
        $result = array('success'=>'false','msg'=>'Invalid Code Try Another');
    }
    echo json_encode($result);
}

// end of file

}
?>