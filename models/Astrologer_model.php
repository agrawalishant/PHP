<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Astrologer_model extends CI_Model

{
 public function __construct()

    {
      parent::__construct();
    }
 /*******************************C O M M O N   Q U E R Y   S T A R T ***************************************/
public function common_add($tablename,$redirectto,$data)
{ 
    $this->db->insert($tablename,$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . $redirectto, 'refresh');
}
public function common_delete($tablename,$dbtableid,$par2db_id,$redirectto)
{ 
    $this->db->where($dbtableid,$par2db_id)
             ->delete($tablename);
           
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . $redirectto , 'refresh');
}
public function common_update($tablename,$databaseid,$par2db_id,$redirectto,$data)
{ 
   $this->db->where($databaseid,$par2db_id)
             ->update($tablename,$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . $redirectto , 'refresh');
}
/*******************************C O M M O N   Q U E R Y   E N D  ***************************************/

    public function update_astrologer_profile_information($data,$par2,$data2)

    {
      $astro_id=$par2;
      if (!empty($_FILES['userfile']['name'])) {
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/astrologers/' . $astro_id . '.png');
        $data['astro_image'] = $astro_id . '.png';
}
     $query = $this->db->where('astro_id', $astro_id)
                         ->update('astrologers',$data);
              
                         $this->db->where('astrologer_id_m',$par2)
                         ->delete('astrologers_multiplecategories');
                         
                 for($i=0;$i<count($data2['astrologer_cat_id']);$i++)
                 {
                 $a= $data2['astrologer_cat_id'][$i];
                 $this->db->insert('astrologers_multiplecategories',array('astrologer_cat_id' => $a,'astrologer_id_m' => $par2));
                 }
        $this->session->set_flashdata('success', 'Update Sucessfully');
        redirect(base_url() . 'astrologerdashboard', 'refresh');
    }
    public function checkOldPass($old_pass,$new_pass,$id,$orig_pass)
    {
      
        //$id = $this->session->userdata('user_id');
                //$this->db->where('username', $this->session->userdata('username'));
                $this->db->where('astro_id', $id);
        $this->db->where('astro_password',$old_pass);
        $query = $this->db->get('astrologers');
        if($query->num_rows() > 0){
    
              $data['astro_password']=$new_pass;
              $data['astro_pass']=$orig_pass;
              $qpass = $this->db->where('astro_id',$id)
                                ->update('astrologers', $data);
            $this->session->set_flashdata('success', 'Data Saved');
               redirect(base_url() . 'astrologerdashboard', 'refresh');
            }
        else
        {
            $this->session->set_flashdata('error', 'Old Password Not match');
          }
    }

    public function forgetpassword($page_data)
    {
      $emailpassword = $page_data['emailpassword'];
     
     $query1 = $this->db->where('astro_email',$emailpassword);
     $query1 = $this->db->get('astrologers');
     $row=$query1->result_array();

     $query2 = $this->db->where('astro_email',$emailpassword);
     $query2 = $this->db->get('astrologers');
     $row2=$query2->result_array();


        if($query1->num_rows()>0)
        {
            $passwordplain  = '@'.rand(999,9999).'$'.rand(999,9999);
            $newpass['astro_password'] = sha1($passwordplain);
           
            $this->db->where('astro_email', $email);
            $this->db->update('astrologers', $newpass); 

            $mail_message='Dear User'. "\r\n";
            $mail_message.='<br>Your new password is mentioned below.';
            $mail_message.='<br><b>New Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
            $mail_message.='<br>Please Update your password .';
            $mail_message.='<br>Thanks & Regards';
            $mail_message.='<br>Astro Vakta';    
            $client_email = $email;
            $subject = 'New Password : Astro Vakta';
            $msg = "Password Detail - ".$mail_message;

            send_mail($client_email, $msg, $subject,'');
            $this->session->set_flashdata('success', 'Update password sent on your registered Email id');
             redirect(base_url() . 'astrologer_login_page', 'refresh');

        } 
        elseif($query2->num_rows()>0)
          {
            $passwordplain  = '@'.rand(999,9999).'$'.rand(999,9999);
            $newpass['astro_password'] = sha1($passwordplain);
           
            $this->db->where('astro_mobile', $emailpassword);
            $this->db->update('astrologers', $newpass); 
            $contact=$emailpassword;
           $msg ="YOUR NEW PASSWORD IS =>  $passwordplain";
            send_sms_new($contact, $msg);
            $this->session->set_flashdata('success', 'Update password sent on your registered Mobile id');
          }
        else
        {
            $this->session->set_flashdata('error', 'Email/Password Not Found');
            redirect(base_url() . 'astrologer_login_page', 'refresh');
        }
      }

public function send_reply_report_astrologer($data)
{
 $data2['rp_sendsolution'] = $data['rp_sendsolution']; 
 $replyid=$data['replyid'];
 $userid= $data['replyuser_id'];
 $astrologerid=$data['replyastro_id'];
 $randam = uniqid(8);

  //    this is for image/pdf upload start -----------
  if (!empty($_FILES['userfile']['name'])) {
    $etc = $_FILES['userfile']['name'];
    $etcdata =  str_replace(" ", "",$etc);
    $dataname = $randam.$etcdata;
   $data2['rp_solution_attachment'] = $dataname;
   move_uploaded_file($_FILES['userfile']['tmp_name'], 'pdfimagedoc/astrologertouser/'.$dataname);
}
//    this is for image/pdf upload end -----------
$data2['rp_problem_solve_status'] = 1;//update success status

$qry=$this->db->where('rp_id',$replyid)
              ->where('rp_user_id',$userid)
              ->where('rp_astro_id',$astrologerid)
              ->update('reportsendtoastro',$data2);
              $this->session->set_flashdata('success', 'Report Submitted Successfully');
              redirect(base_url() . 'astrologerdashboard', 'refresh');

}







// *******************************end astrowebsite **************//


//----------------last---------------------

}