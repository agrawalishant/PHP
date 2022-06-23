<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

/******************************************astrologer only************************************ */
/******************************************astrologer only************************************ */
/******************************************astrologer only************************************ */
    public function login_astrologer($data)
    {
        
        $query = $this->db->where(array('astro_email' => $data['astro_email']))
            ->get('astrologers');
           
        if ($query->num_rows() > 0) 
        {
            $query = $this->db->where(array('astro_email' => $data['astro_email'],
         'astro_password' => $data['astro_password']))
            ->get('astrologers');
           
            if ($query->num_rows() > 0) 
            {   
                            
                $data = array(
                    'astro_email' => $this->input->post('astro_email'),
                    'astro_password' => sha1($this->input->post('astro_password')),
                );
    
                $query = $this->db->get_where('astrologers', $data);
               $astro_name= $query->row()->astro_name;
    
    
                $astrologer_id = $query->row()->astro_id;
                $astro_name = $query->row()->astro_name;
                $astro_email = $query->row()->astro_email;
               // $folder = $query->row()->folder_name;
                //   online status start
                $dataonline['astro_online_chat_status']='1';
                $dataonline['astro_online_call_status']='1';
                $dataonline['astro_online_status']='1';
                $online=$this->db->where('astro_id',$astrologer_id)
                                ->update('astrologers',$dataonline);
                //   online status end
               
               $this->session->set_userdata('astro_id', $astrologer_id);
               $this->session->set_userdata('astro_email', $astro_email);
               $this->session->set_userdata('astro_name', $astro_name);
            
             // type is use for folder functionality
               // $this->session->set_userdata('user_folder_name', $folder);
                $this->session->set_flashdata('success', 'Welcome ' . $astro_name );
                // browser check status sent start============
                $data33['sc_astro_id']=$astrologer_id;
                $data33['sc_login_date']=date('Y-m-d H:i:s');
                $data33['sc_login_status']=1;
                 $brow= insertdata('statuscheck',$data33);
                $browserlastid=$this->db->insert_id();
                $this->session->set_userdata('browserinsertid',$browserlastid);
            // browser check status sent end============
               // redirect(base_url() . 'user_dashboard', 'refresh');
               //redirect(base_url() . 'basket_page', 'refresh');
              
               redirect(base_url() . 'astrologerdashboard', 'refresh');
               
              
            }
            else
            {
               $this->session->set_flashdata('error','username or password are incorrect. Please try again or reset password');
                redirect(base_url() . 'astrologer_login_page', 'refresh');    
            }
        }
        else
        {
            $this->session->set_flashdata('error','Email Not exist');
           // $this->session->set_flashdata('error1','Please Verify Your Email');
            redirect(base_url() . 'astrologer_login_page', 'refresh');
        }

    }


// ========================user login check
/******************************************User start*********************************** */
/******************************************User start*********************************** */
/******************************************User start*********************************** */
public function login_user($data)
    {
        $query = $this->db->where(array('user_email' => $data['user_email']))
            ->get('user');
    
        if ($query->num_rows() > 0) 
        {
            $query = $this->db->where(array('user_email' => $data['user_email'],
         'user_password' => $data['user_password']))
            ->get('user');
           
            if ($query->num_rows() > 0) 
            {   
                            
                $data = array(
                    'user_email' => $this->input->post('user_email'),
                    'user_password' => sha1($this->input->post('user_password')),
                );
    
                $query = $this->db->get_where('user', $data);
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
    
               // redirect(base_url() . 'user_dashboard', 'refresh');
               //redirect(base_url() . 'basket_page', 'refresh');
               //redirect(base_url() . 'userdashboard', 'refresh');
               
              
            }
            else
            {
               $this->session->set_flashdata('error','username or password are incorrect. Please try again or reset password');
                redirect(base_url() . 'front_page', 'refresh');    
            }
        }
        else
        {
            $this->session->set_flashdata('error','Email Not exist');
           // $this->session->set_flashdata('error1','Please Verify Your Email');
            redirect(base_url() . 'front_page', 'refresh');
        }

    }
    /********************************************admin login check ******************************************* */
    /********************************************admin login check ******************************************* */
    /********************************************admin login check ******************************************* */
// ====admin login check
public function login_admin($data)
{
    
    $query = $this->db->where(array('email' => $data['email'],
     'password' => $data['password']))
        ->get('admin');

    if ($query->num_rows() > 0) {

        $data = array(

            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password')),
        );

        $query = $this->db->get_where('admin', $data);

        $id = $query->row()->id;
        $name = $query->row()->name;
        $logintype = $query->row()->type;
        $adminlevel = $query->row()->level;

       
        $this->session->set_userdata('adminid', $id);
        $this->session->set_userdata('adminemail', $this->input->post('email'));
        $this->session->set_userdata('adminname', $name);
    
     // type is use for folder functionality
        $this->session->set_userdata('admintype', $logintype);
        $this->session->set_userdata('adminlevel', $adminlevel);
        $this->session->set_flashdata('success', 'Welcome ' . $name );

        redirect(base_url() . 'admindashboard', 'refresh');

    } else {

      //  $this->session->set_flashdata('error', 'Login Fail Plz Check Details');
       $this->session->set_flashdata('errormsg', 'Login Fail Plz Check Details');
        redirect(base_url() . 'login_page', 'refresh');

    }

}

/********************************************End ******************************************* */
//end
}
?>