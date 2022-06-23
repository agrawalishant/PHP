<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model

{
 public function __construct()

    {
      parent::__construct();
      // $this->table = 'astrologers'; 
    }
  
// pagination start*****************************************

public function record_count() 
{
  return $this->db->count_all("astrologers"); /* it counts all the rows from the database table. */ 
}
public function list2($limit,$offset)
{
    //19/02/2021  //   change 22/02/202 uncommented this and commented below code
    $query=$this->db->where('astro_approved_status',1)
                    ->limit($limit,$offset)
                    ->order_by('astro_ranking','ASC')
                     ->get('astrologers');
                     return $query->result_array();
    //19/02/2021  //   change 22/02/202 
//  $query = $this->db->select("*");
//  $query = $this->db->from('astrologers');
//  $query = $this->db->where('astro_approved_status',1);
// $query =  $this->db->limit($limit,$offset);
// $query =  $this->db->order_by('astro_ranking','ASC');
//   $query = $this->db->get(); //   change 22/02/202 $res2
 // return $query->result_array();
  
}

function totalUsers(){
  return $this->db->count_all_results('astrologers');
}

// pagination end *******************************************

    public function forgetpassword($page_data)
    {
      $emailphoneno = $page_data['emailphoneno'];
     
            $query1 = $this->db->where('user_email',$emailphoneno);
            $query1 = $this->db->get('user');
            $row=$query1->result_array();
           
            $query2 = $this->db->where('user_mobile',$emailphoneno);
            $query2 = $this->db->get('user');
            $row2=$query2->result_array();
      
            if($query1->num_rows()>0)
        {
            $passwordplain  = '@'.rand(999,9999).'$'.rand(999,9999);
            $newpass['user_password'] = sha1($passwordplain);
           
            $this->db->where('user_email', $emailphoneno);
            $this->db->update('user', $newpass); 

            $mail_message='Dear User'. "\r\n";
            $mail_message.='<br>Your new password is mentioned below.';
            $mail_message.='<br><b>New Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
            $mail_message.='<br>Please Update your password .';
            $mail_message.='<br>Thanks & Regards';
            $mail_message.='<br>Astro Vakta';    
            $client_email = $emailphoneno;
            $subject = 'New Password : Astro Vakta';
            $msg = "Password Detail - ".$mail_message;

            send_mail($client_email, $msg, $subject,'');
            $this->session->set_flashdata('success', 'Update password sent on your registered Email id');
             redirect(base_url() . 'front_page', 'refresh');

        } 
        elseif($query2->num_rows()>0)
        {
           $passwordplain  = '@'.rand(999,9999).'$'.rand(999,9999);
           $newpass['user_password'] = sha1($passwordplain);
          
            $this->db->where('user_mobile',$emailphoneno);
           $this->db->update('user', $newpass); 
           $contact=$emailphoneno;
           $msg ="YOUR NEW PASSWORD IS =>  $passwordplain";
           send_sms_new($contact, $msg);
           $this->session->set_flashdata('success', 'Update password sent on your registered Mobile id');
           redirect(base_url() . 'front_page', 'refresh');
           
        }
        else
        {
            $this->session->set_flashdata('error', 'Email / Mobile Not Found');
            redirect(base_url() . 'front_page', 'refresh');
        }
      }

    // =================forget password end





    public function register_data($data)
    {
      $this->db->insert('user',$data);
      $this->session->set_flashdata('success', 'Registration Successfully');
      redirect(base_url() . 'front_page', 'refresh');
    }

    public function update_user_profile_information($data,$par2)

    {
      $user_id=$par2;
      if (!empty($_FILES['userfile']['name'])) {
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/user/' . $user_id . '.png');
        $data['user_image'] = $user_id . '.png';
    }
     $query = $this->db->where('user_id', $user_id)
                         ->update('user', $data);

        $this->session->set_flashdata('success', 'Update Sucessfully');
        redirect(base_url() . 'userdashboard/profilemenu-07', 'refresh');
    }

    public function updatepartdetail($data,$par2)
{
      $user_id=$par2;
      $query = $this->db->where('user_id', $user_id)
                         ->update('user', $data);
       $this->session->set_flashdata('success', 'Update Sucessfully');
        redirect('userdashboard', 'refresh');
    }

    public function checkOldPass($old_pass,$new_pass,$id)
    {
      
        //$id = $this->session->userdata('user_id');
                //$this->db->where('username', $this->session->userdata('username'));
                $this->db->where('user_id', $id);
        $this->db->where('user_password',$old_pass);
        $query = $this->db->get('user');
        if($query->num_rows() > 0){
    
              $data['user_password']=$new_pass;
              $qpass = $this->db->where('user_id',$id)
                                ->update('user', $data);
            $this->session->set_flashdata('success', 'Data Saved');
               redirect(base_url() . 'userdashboard/profilemenu-07', 'refresh');
            }
        else
        {
            $this->session->set_flashdata('error', 'Old Password Not match');
          }
    }

// ***************************************************************************************
public function call_data()
{
  // $data['callrate']       = ;
  // $data['users_ids']      = ;
  // $data['walletbalance']  = ;
}
public function chat_data()
{
    // $data['chatrate']       = 
    // $data['users_ids']      = 
    // $data['walletbalance']  = 
}
// ***************************************************************************************

// commission start ***********************************************************************
//$par2=astro id , $par3=report id rp_id par1 = payfor
public function pay_to_astrologer_commission($userid,$astroid,$amount,$par4=NULL,$last_callinsertid)
{
    //this amount added to 3 database table wallet_history_astrologer , wallet_astrologer ,wallet_admin_final_amt
  //  $fetchdata       =   fetchbyresultByCondiction('reportsendtoastro',array('rp_id'=>$par3));
  //  $amount          =   $fetchdata['0']['rp_amountpaid'];
   $per_dedction    =  fetchbyresultByCondiction('astrologers',array('astro_id'=>$astroid));
   $percentageded   =  $per_dedction['0']['percentage_deduction'];
     if(!empty($percentageded))
     {
      $percentageded;
     }else{
      $percentageded=10;
     }
  $commission_created = ($percentageded /100)*$amount;
  
   $astrologer_final_amount   = $amount-$commission_created;
   $admin_final_amount        = $commission_created;
   $payfor=$par4;
    $astrologerid=$astroid;
  //  $reportid=$par3;


// --------insert to astrologer history 1)
    $data['wha_astro_id']=$astroid;
    $data['wha_id_all']=$last_callinsertid;//user_call_detail_history_user
    $data['wha_recevedfor']=$payfor;
    $data['wha_rec_amt_before_deduction']=$amount;
    $data['wha_rec_amt_after_deduction']=$astrologer_final_amount;
    $in= $this->db->insert('wallet_history_astrologer',$data);
    $insert_id = $this->db->insert_id($in);
// --------insert to astrologer wallet 2)
// add to astrologer wallet
$check = fetchby_wheres('wallet_astrologer',array('wa_astrologer_id'=>$astroid));
if(!empty($check))
{
    //print_r($check);exit;
    $w_amt = $check[0]['wa_wallet_amount'];
    //echo "amt = ".$amt;exit;
    $data2['wa_astrologer_id']=$astroid;
    $data2['wa_wallet_amount'] = $astrologer_final_amount+$w_amt;
    updateData('wallet_astrologer',$data2,array('wa_astrologer_id'=>$astroid));	
}
else
{
    $data2['wa_astrologer_id']=$astroid;
    $data2['wa_wallet_amount']=$astrologer_final_amount;
    addWalletData('wallet_astrologer',$data2);
}

// add to astrologer wallet end
//add to admin history 
$data3['wlla_recevedby_id']=$last_callinsertid;//user_call_detail_history_user;
$data3['wlla_receved_for']=$payfor;
$data3['wlla_amount']= $admin_final_amount;
addWalletData('wallet_history_admin',$data3);
//add to admin wallet
$adminwalllet = fetchby_wheres('wallet_admin',array('wad_adminid'=>'1'));
$admwlt=$adminwalllet['0']['wad_amt'];
$data5['wad_amt'] = $admin_final_amount+$admwlt;
updateData('wallet_admin',$data5,array('wad_adminid'=>'1'));
$this->session->set_flashdata('success', 'Data Sucessfully');

redirect(base_url() . 'userdashboard', 'refresh');

}

// commission end   ************************************************************************



// *******************************end astrowebsite **************//

  
    
    
//  public function update_profile_information($par1)

//     {
//       if (!empty($_FILES['userfile']['name'])) {

//      move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/admin/' . $par1 . '.png');

//         $data['image'] = $par1 . '.png';
// }

//         $data = array(

//             'name' => $this->input->post('name'),
//             'email' => $this->input->post('email'),
//             'mobile' => $this->input->post('mobile'),
//          );

//         $query = $this->db->where('id', $par1)

//             ->update('admin', $data);

//       //  $this->session->set_flashdata('success', 'Update Sucessfully');
//         redirect(base_url() . 'profile', 'refresh');
//     }

// public function checkOldPass($old_pass,$new_pass)
// {
//   $id = $this->session->userdata('id');
            
//             $this->db->where('id', $id);
//     $this->db->where('password',$old_pass);
//     $query = $this->db->get('admin');
//     if($query->num_rows() > 0){

//           $data['password']=$new_pass;
//           $qpass = $this->db->where('id',$id)
//                             ->update('admin', $data);
//         $this->session->set_flashdata('success', 'Data Saved');
//            redirect(base_url() . 'profile', 'refresh');
//         }
//     else
//     {
//         $this->session->set_flashdata('error', 'Old Password Not match');
//       }
// }


// =================forget password start
//funtion to get email of user to send password
 public function ForgotPassword($email)
 {
        $this->db->select('email');
        $this->db->from('user_register'); 
        $this->db->where('email', $email); 
        $query=$this->db->get();
        return $query->row_array();
 }
 public function sendpassword($data)
{
        $email = $data['email'];
        $query1=$this->db->query("SELECT *  from user_register where email = '".$email."' ");
        $row=$query1->result_array();
        if ($query1->num_rows()>0)
      
{
        $passwordplain = "";
        //$passwordplain  = $row[0]['first_name'].'@'.rand(999,9999);
        $passwordplain  = '@'.rand(999,9999).'$'.rand(999,9999);
        $newpass['password'] = sha1($passwordplain);
        $newpass['password_display'] = ($passwordplain);
        $this->db->where('email', $email);
        $this->db->update('user_register', $newpass); 
        $mail_message='Dear '.$row[0]['first_name'].','. "\r\n";
         $mail_message.='<br>Your new password is mentioned below.';
         
        $mail_message.='<br><b>New Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
        $mail_message.='<br>Please Update your password.';
        $mail_message.='<br>Thanks & Regards';
        $mail_message.='<br>1in100';    
        
        $client_email = $data['email'];
         
            $subject = 'New Password : 1in100';
            $msg = "Password Detail - ".$mail_message;
send_mail($client_email, $msg, $subject);
 $this->session->set_flashdata('mailverified', 'Update password sent on your registered Email id');
   redirect(base_url() . 'user_login_page', 'refresh');           
}

}

// =================forget password end
// public function botmanagement_userdatalist($par1)
// {

//     $query=$this->db->select('orderdb.*, user_register.*');
//           $this->db->from('orderdb','user_register');
//           $this->db->join('user_register', 'user_register.id = orderdb.user_id');
//           $this->db->where("orderdb.product_id LIKE '%$par1%'");
//         $this->db->where('orderdb.status','success');
//          // $this->db->where('orderdb.product_id',$par1);
//           $query = $this->db->get();
//           return $query->result_array();
// }
//    public function get_winner()
//     {
//         $userid = $this->session->userdata('id');
        
//      $query = $this->db->select('orderdb.user_id,orderdb.product_id,orderdb.status,orderdb.winner,raffle.r_id,raffle.r_prize,raffle.r_title,raffle.r_ticket_cost,prize.id,prize.title,prize.title,prize.description')
//                        ->from('orderdb')
//                        ->join('raffle', 'orderdb.product_id = raffle.r_id')
//                        ->join('prize', 'raffle.r_prize = prize.id')
//                       ->where('orderdb.user_id',$userid)
//                       ->where('orderdb.winner',1)
//                       ->where('orderdb.status','success')
//                       ->get();
//                     //  echo $this->db->last_query();exit;
//         if($query->num_rows()>0)
//         {
//             return $query->result_array();
//         }
//         else
//         {
//             return false;
//         } 
//     }
// =========================================================
//  public function get_yourraffle()
//     {
//         $userid = $this->session->userdata('id');
        
//      $query = $this->db->select('*')
//                        ->from('orderdb')
//                        ->join('raffle', 'orderdb.product_id = raffle.r_id')
//                     //   ->join('prize', 'raffle.r_prize = prize.id')
//                       ->where('orderdb.user_id',$userid)
//                                  // ->where('orderdb.winner',1)
//                       ->where('orderdb.status','success')
//                       ->get();
//                     //  echo $this->db->last_query();exit;
//         if($query->num_rows()>0)
//         {
//             return $query->result_array();
//         }
//         else
//         {
//             return false;
//         } 
//     }
// get winner detail
// public function winners($pid)
//     {
      
//         $userid = $this->session->userdata('id');
        
//      $query = $this->db->where("product_id LIKE '%$pid%'")
//                      ->where('user_id',$userid)
//                       ->where('winner',1)
//                       ->where('status','success')
//                       ->get('orderdb');
//                       //echo $this->db->last_query();exit;
//                      $query->result();
//         if($query->num_rows()>0)
//         {
//              $data2['button_status']=1;
//              $queryt = $this->db->where('user_id', $userid)
//                               ->where('winner',1)
//                                 ->where('status','success')
//                                 ->update('orderdb', $data2);
//             return $query->result();
//             // return true ;
           
//         }
       
//     }
// public function winners($pid)
//     {
      
//         $userid = $this->session->userdata('id');
        
//      $query = $this->db->where("product_id LIKE '%$pid%'")
//                      ->where('user_id',$userid)
//                       ->where('winner',1)
//                       ->where('status','success')
//                       ->get('orderdb');
//                       //echo $this->db->last_query();exit;
//                      $query->result();
//         if($query->num_rows()>0)
//         {
//             return $query->result();
//             // return true ;
//         }
       
//     }













// ==============================================================================
 // function RegisterUserCount()
 //    {
 //        $this->db->select('*');
 //        $this->db->from('user_register');
 //        $query = $this->db->get();
 //        return $query->num_rows();
 //    } 
// function ApprovedCount()
//     {
//        $this->db->select('approvedstatus');
//         $this->db->from('user_register');
//         $this->db->where('approvedstatus','1');
//         $query = $this->db->get();
//         return $query->num_rows();
//     }
    // multiple delete checkbox 
 //     function multiple_delete($id)
 // {
 //  $this->db->where('contact_id', $id);
 //  $this->db->delete('contactform');
 // }
//    public function dataview($par2)

//     {
//          $data['status']=1;
//         $this->db->where('contact_id', $par2)
//                  ->update('contactform', $data);
//       //  $this->session->set_flashdata('success', 'Update Sucessfully');
//        // redirect(base_url() . 'contactformdetail', 'refresh');
//     }



   




 // public function updateimage($par2)

 //    {

 //        move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/profile/' . $par2 . '.png');

 //        $data['employee_image'] = $par2 . '.png';

 //        $this->db->where('employee_id', $par2)

 //            ->update('employee', $data);

 //        $this->session->set_flashdata('success', 'Update Sucessfully');



 //        redirect(base_url() . 'profile_r', 'refresh');



 //    }

 //    public function updatepassword($id,$oldpass,$newpass)

 //    {

 //        //$data['employee_password'] = sha1($this->input->post('employee_password'));
 //             $data = array(

 //                'id' => $id,
               
 //            );
 //         $query = $this->db->get_where('admin', $data);

 //            $db_pass = $query->row()->password;
 //            if($db_pass == $oldpass){
 //             $data['password']=$newpass;
 //              $this->db->where('id', $id)

 //            ->update('admin', $data);
 // $this->session->set_flashdata('success', 'Update Sucessfully');
 //  redirect(base_url() . 'profile', 'refresh');
 //            }
 //            else
 //            {
 //               $this->session->set_flashdata('error', 'Plz check Old password');
 //                redirect(base_url() . 'profile', 'refresh');
 //            }
 //    }

//----------------last---------------------

}