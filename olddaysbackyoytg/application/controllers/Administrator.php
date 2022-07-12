<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Controller
{
    function __construct()
    {
        parent::__construct();	
        $this->load->model('generalmodel');	
        //$this->load->helper('general_helper'); 
    }
    
	/*---check Auth---*/
    public function checkSession()
    {
        if ($this->session->userdata('dvAdmin_session')!= 1) {
          //$this->load->view('login');
          redirect('AdminManager');
        }
    }
	
	/*----dashboard----*/

 /* public function index()
    {
    $this->load->view('header');
    //$this->load->view('sidebar');    
    $this->load->view('index');
    $this->load->view('footer');  
    }
*/
    public function index()
    {	
        
  		$this->checkSession();
      //print_r($_SESSION);exit;
  		//$data['viewScript'] = 1;
        //$sessionBuildingId = $this->session->userdata('postdata')['email'];  
        //$sidebar['dashboard']="true";
        $this->load->view('header'); 
       $this->load->view('sidebar'); 
        $this->load->view('index');
        $this->load->view('footer');
    }
	
    public function userindex()
    {   
        $this->load->view('add_user');
    }	

    public function add_user(){ 
         $this->load->view('header'); 
      $this->load->view('sidebar');  
      $this->load->view('add_user'); 
      $this->load->view('footer');
    }

    public function profile(){  
      $this->load->view('header'); 
      $this->load->view('sidebar'); 
      $this->load->view('profile'); 
       $this->load->view('footer');
    }

    public function profile_edit(){
      $this->load->view('header'); 
      $this->load->view('sidebar');            
      $this->load->view('profile_edit'); 
      $this->load->view('footer');
    }

    public function user_list(){ 
        $sidebar["user_list"]="true";
      $this->load->view('header'); 
      $this->load->view('sidebar',$sidebar); 
      $data['result'] = $this->generalmodel->get_resultbyord('ex_multiusers_n_admins',array('delete_status'=>'0','role_id'=>2));
      $this->load->view('user_list',$data); 
      $this->load->view('footer');
    }

    public function about_data(){ 
      $sidebar['about_us']="true";
      $this->load->view('header'); 
      $this->load->view('sidebar');
      $data['result'] = $this->generalmodel->get_resultbyord('about_us',array());
      $this->load->view('contentpage',$data); 
      $this->load->view('footer');
    }

    public function ecom2(){ 
      $this->load->view('header'); 
      $this->load->view('sidebar');             
      $this->load->view('ecom2'); 
      $this->load->view('footer');
    }    

    public function ecom3(){ 
      $this->load->view('header'); 
      $this->load->view('sidebar');             
      $this->load->view('ecom3'); 
      $this->load->view('footer');
    }
    
     public function signupdetails(){ 
      $sidebar['visitor_details']="true";
      $this->load->view('header'); 
      $this->load->view('sidebar',$sidebar);
      $data['result'] = $this->generalmodel->get_resultbyord('exhibitor_visitors',array('delete_status'=>'0'));
      $this->load->view('signupdetails_list',$data); 
      $this->load->view('footer');
    }
    
    public function detailsOfUser($id){ 
      $this->load->view('header'); 
      $this->load->view('sidebar');
      $data['result'] = $this->generalmodel->get_resultbyord('exhibitor_visitors',array('id'=>$id));
      $data['exhibitions_list'] = $this->generalmodel->get_resultbyord('exhibitions_list',array());
      $this->load->view('detailsOfUser',$data); 
      $this->load->view('footer');
    }
    
    public function changeUserStatus($id){ 
        $id = $this->input->post('id');
        $data['user_status'] = $this->input->post('statusVal');
        $lastid = $this->generalmodel->modify('exhibitor_visitors','id',$id,$data);
        
      if($lastid){
         $return  = array('success'=>true,'msg'=>"Status Update");
       }else{
         $return  = array('success'=>false,'msg'=>"Something Went Wrong"); 
      }
     echo json_encode($return);
        
    }
    
    
     
      public function deleteAdmin($id){
          $this->checkSession();
          $data['delete_status'] = '1';
          $data['update_at'] = date('Y-m-d H:i:s');
      $result = $this->generalmodel->modify('ex_multiusers_n_admins','id',$id,$data);
          
          if($result){
            $this->session->set_flashdata('success_msg','Removed Successfully');
           redirect('user-list','refresh');
          }else{             
            $this->session->set_flashdata('success_msg','Not Verified');
          redirect('user-list','refresh');
          } 
     }   
     
    public function addNewUser(){
     if(!empty($_POST)){
               
     $fname = $this->input->post('name');
     $email = $this->input->post('email');
     $password = $this->input->post('password');
     $address = $this->input->post('address');
     $contact = $this->input->post('mobile');
      $data= array(          
            'name'=>$fname,
            'email'=>$email,
            'password'=>md5($password),
            'address'=>$address ,
            'mobile'=>$contact ,
            'role_id'=>'2' ,
            'created_at'=>date("Y-m-d H:i:s")
            );
               
         $result=$this->generalmodel->add('ex_multiusers_n_admins',$data);
          if($result){
            $this->session->set_flashdata('success_msg','Added Successfully');
           redirect('user-list','refresh');
          }else{             
            $this->session->set_flashdata('success_msg','Something went Wrong');
          redirect('user-list','refresh');
          } 

        }else{  $this->load->view('add-user'); }
           
       }
       
      
    
 //////////////////////////------ Instructor functions starts ---- //////////////////////////////////////////////

     public function instructor_list(){
           $this->checkSession();
           $this->load->view('header'); 
           $this->load->view('sidebar');
           $data['result'] = $this->generalmodel->get_resultbyord('instructor_details
',array('delete_status'=>'0'));
           $this->load->view('instructor_list',$data); 
           $this->load->view('footer');
      } 
      
   public function deleteInstructor($id){
          
          $data['delete_status'] = '1';
          $data['update_date'] = date('Y-m-d H:i:s');
      $result = $this->generalmodel->modify('instructor_details','id',$id,$data);

          if($result){
            $this->session->set_flashdata('success_msg','Removed Successfully');
           redirect('Administrator/instructor_list','refresh');
          }else{             
            $this->session->set_flashdata('success_msg','Not Verified');
          redirect('Administrator/instructor_list','refresh');
          } 
     }


 public function addeditInstructor($id=''){
       $this->load->view('header'); 
       $this->load->view('sidebar');
       
       if(!empty($_POST)){
         $id = $this->input->post('id');   
         $name = $this->input->post('name');   
         $exDate = $this->input->post('exDate'); 
         
         $data['name'] = $name;
         //$data['date_of_exhibition'] = $exDate;

         if($id!=''){ $data['updated_at'] = date('Y-m-d H:i:s');
             $result = $this->generalmodel->modify('instructor_details','id',$id,$data);
         }else{ $data['created_at'] = date("Y-m-d H:i:s") ;
             $result=$this->generalmodel->add('instructor_details',$data);
         }
         
          if($result){
            $this->session->set_flashdata('success_msg','Added Successfully');
           redirect('Administrator/instructor_list','refresh');
          }else{             
            $this->session->set_flashdata('success_msg','Something went Wrong');
          redirect('Administrator/instructor_list','refresh');
          } 
            
       }
       
       if(!empty($id)){
       $data['result'] = $this->generalmodel->get_resultbyord('instructor_details',array('id'=>$id));
       }
       
       $this->load->view('instructor_modify',$data); 
       $this->load->view('footer');
     }

//////////////////////////------ Instructor functions ends ---- //////////////////////////////////////////////
     

      public function changeExStatus(){
          $this->checkSession();
          $id = $this->input->post('id');
          $data['show_center'] = '1';
      $result = $this->generalmodel->modify('exhibitions_list','id',$id,$data);
      $this->generalmodel->modify('exhibitions_list','id!=',$id,array('show_center'=>0));
        if($result){
           $return  = array('success'=>true,'msg'=>"Status Update");
        }else{
           $return  = array('success'=>false,'msg'=>"Something Went Wrong"); 
       }
       echo json_encode($return);
     } 
  

//////////////////////////------ student functions starts ---- //////////////////////////////////////////////

public function student_list()
{   
   $this->checkSession();
   $this->load->view('header'); 
   $this->load->view('sidebar');
   $data['result'] = $this->generalmodel->get_resultbyord('student_details',array('delete_status'=>'0'));
   $this->load->view('student_list',$data); 
   $this->load->view('footer');
}

public function deletestudent($id){
      
      $data['delete_status'] = '1';
      $data['modified_date'] = date('Y-m-d H:i:s');
      $result = $this->generalmodel->modify('student_details','id',$id,$data);
      
      if($result){
        $this->session->set_flashdata('success_msg','Removed Successfully');
       redirect('Administrator/student_list','refresh');
      }else{             
        $this->session->set_flashdata('success_msg','Not Verified');
      redirect('Administrator/student_list','refresh');
      } 
    }




}
?>
