<?php
class Googlee_model extends CI_Model
{
  // function Is_already_register($id,$email)
 function Is_already_register($email)
 {
  // $this->db->where('oauth_uid', $id);
  $this->db->where('user_email', $email);
  
  $query = $this->db->get('user');
  if($query->num_rows() > 0)
  {
      //---
    // $query = $this->db->where('oauth_uid', $id)->get('user');
    $query = $this->db->where('user_email', $email)->get('user');
    $nameuser = $query->row()->user_first_name;
    $user_id = $query->row()->user_id;
    $user_first_name = $query->row()->user_first_name;
    $user_email = $query->row()->user_email;
    $folder = $query->row()->folder_name;
  //  30-04/2021 start april **************** Start
    $delete_status = $query->row()->delete_status;
    if ($delete_status == 1)
 {
    // $this->session->set_flashdata('error', 'REJECTED / BLOCKED By Admin' );
    //  redirect(base_url(). 'destroy', 'refresh');
      redirect(base_url(). 'login_controller/user_logoutforreject', 'refresh');
    //  $this->session->set_flashdata('error', 'REJECTED / BLOCKED By Admin' );
 } 
    // 30 april end *******************End
//   online status start
    $dataonline['user_online_status']='1';
    $online=$this->db->where('user_id',$user_id)
                    ->update('user',$dataonline);
//   online status start
   $this->session->set_userdata('user_id', $user_id);
   $this->session->set_userdata('user_email', $user_email);
   $this->session->set_userdata('user_first_name', $user_first_name);

 // type is use for folder functionality
    $this->session->set_userdata('user_folder_name', $folder);
    $this->session->set_flashdata('success', 'Welcome ' .  $user_first_name );

  
  //----
    return true;
   
  }
  else
  {
   return false;
  }
 }
//  function Update_user_data($data, $id)
 function Update_user_data($data, $email)
 {
  // $this->db->where('oauth_uid', $id);
  $this->db->where('user_email', $email);
  $this->db->update('user', $data);
 }

 function Insert_user_data($data)
 {
 $d= $this->db->insert('user', $data);
  $last_id = $this->db->insert_id($d);
  $wdt['user_id']=$last_id;
  $walletinsert = $this->Generalmodel->add('wallet',$wdt);
 }
}
?>