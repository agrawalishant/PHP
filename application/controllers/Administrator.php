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
    public function indexexample()
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
	
	public function index()
	{   
	    $this->checkSession();
	    $this->load->view('header'); 
        $this->load->view('sidebar'); 
        $data['inst'] = $this->generalmodel->get_count('instructor_details',array('active_status'=>'1'));
        $data['stu'] = $this->generalmodel->get_count('student_details',array('active_status'=>'1'));
        //echo "<pre>";print_r($data['stu']);exit;
        $this->load->view('dashboard',$data);
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
           $data['result'] = $this->generalmodel->get_resultbyord('instructor_details',array('delete_status'=>'0'));
           $this->load->view('instructor_list',$data); 
           $this->load->view('footer');
      } 
      
      public function active()
      {
        $ids = $this->input->post('id');
        $res = $this->generalmodel->updateData('instructor_details',array('active_status'=>0),array('id'=>$ids));
      }

      public function inactive()
      {
        $ids = $this->input->post('id');
        $res = $this->generalmodel->updateData('instructor_details',array('active_status'=>1),array('id'=>$ids));
      }

   public function deleteInstructor($id){
          
          $data['delete_status'] = '1';
          $data['update_date'] = date('Y-m-d H:i:s');
      $result = $this->generalmodel->deleteMulti('instructor_details',array('id'=>$id));
      //$result = $this->generalmodel->modify('instructor_details','id',$id,$data);

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
     
    public function cancelBooking()
    {   
       //$this->checkSession();
       $this->load->view('header'); 
       $this->load->view('sidebar');
       //$data['result'] = $this->generalmodel->get_resultbyord('instructor_postcode',array(1=>1));
       $data['result'] = $this->generalmodel->get_resultbyorder('payments',array('delete_status'=>1),'payment_id','DESC');
       $this->load->view('cancelbooking',$data); 
       $this->load->view('footer');
    }
     
     public function viewtransaction($id=''){
       $this->load->view('header'); 
       $this->load->view('sidebar');
       $data['result'] = $this->generalmodel->get_all_where('payments',array('payment_id'=>$id));
       $this->load->view('viewtransaction',$data); 
       $this->load->view('footer');
     }

    public function seecharges($instid)
     {
       $data['result'] = $this->generalmodel->get_all_where('instructor_charges',array('inst_id'=>$instid)); 
       //echo "<pre>";print_r($data);exit;
       $this->load->view('header'); 
       $this->load->view('sidebar');
       $this->load->view('instructor_charges',$data); 
       $this->load->view('footer');
     }
    
    public function seeTime($instid)
     { 
       $data['result'] = $this->generalmodel->get_all_whereGroupBy('instructor_time_slots',array('inst_id'=>$instid),'day'); 
       //echo "<pre>";print_r($data);exit;
       $this->load->view('header'); 
       $this->load->view('sidebar');
       $this->load->view('intructor_timeslot',$data); 
       $this->load->view('footer');
     }
    
    public function inst_bookings()
    {
     
     $select = 'instructor_details.id as instructor_id, instructor_details.name as instructor_name,student_details.id as student_id,student_details.name as student_name,booking.stu_id as bstu_id,booking.inst_id as binst_id,booking.vechical_type as vechical_type,booking.booking_date,booking.booking_start_time,booking.booking_end_time,';
      
     $data['result'] = $this->generalmodel->getJoinDataThreeTable($select,'booking','instructor_details','student_details','booking.inst_id=instructor_details.id','booking.stu_id=student_details.id',array(1=>1));

     //echo $this->db->last_query();exit;
   // echo "<pre>";print_r($data['result']);exit;    
      //$data['result'] = $this->generalmodel->get_all_where('bookings'); 
       $this->load->view('header'); 
       $this->load->view('sidebar');
       $this->load->view('instbooking_list',$data); 
       $this->load->view('footer');
    }

    public function subcriber()
     {
       $data['result'] = $this->generalmodel->get_all_where('subcribemail',array('delete_status'=>0)); 
       $this->load->view('header'); 
       $this->load->view('sidebar');
       $this->load->view('subcribe_list',$data); 
       $this->load->view('footer');
     }
    
    public function deletesubcribe($id){
      
      $data['delete_status'] = '1';
      $data['modified_date'] = date('Y-m-d H:i:s');
      $result = $this->generalmodel->modify('subcribemail','id',$id,$data);
      
      if($result){
        $this->session->set_flashdata('success_msg','Removed Successfully');
       redirect('Administrator/subcriber','refresh');
      }else{             
        $this->session->set_flashdata('success_msg','Not Verified');
      redirect('Administrator/subcriber','refresh');
      } 
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

public function deleteStudent($id){
          
          $data['delete_status'] = '1';
          $data['update_date'] = date('Y-m-d H:i:s');
      $result = $this->generalmodel->deleteMulti('student_details',array('id'=>$id));
      //$result = $this->generalmodel->modify('instructor_details','id',$id,$data);

          if($result){
            $this->session->set_flashdata('success_msg','Removed Successfully');
           redirect('Administrator/student_list','refresh');
          }else{             
            $this->session->set_flashdata('success_msg','Not Verified');
          redirect('Administrator/student_list','refresh');
          } 
     }    

public function addeditStudent($id=''){
       $this->load->view('header'); 
       $this->load->view('sidebar');
       
       if(!empty($_POST)){
         $id = $this->input->post('id');   
         $name = $this->input->post('name');   
         $exDate = $this->input->post('exDate'); 
         
         $data['name'] = $name;
         //$data['date_of_exhibition'] = $exDate;

         if($id!=''){ $data['updated_at'] = date('Y-m-d H:i:s');
             $result = $this->generalmodel->modify('student_details','id',$id,$data);
         }else{ $data['created_at'] = date("Y-m-d H:i:s") ;
             $result=$this->generalmodel->add('student_details',$data);
         }
         
          if($result){
            $this->session->set_flashdata('success_msg','Added Successfully');
           redirect('Administrator/student_list','refresh');
          }else{             
            $this->session->set_flashdata('success_msg','Something went Wrong');
          redirect('Administrator/student_list','refresh');
          } 
            
       }
       
       if(!empty($id)){
       $data['result'] = $this->generalmodel->get_resultbyord('student_details',array('id'=>$id));
       }
       
       $this->load->view('student_modify',$data); 
       $this->load->view('footer');
     }
     
     public function test()
     {
         $data['result'] = $this->generalmodel->resDataOrwhere('instructor_time_slots','12','Sunday','22:00','00:00');
         print_r( $data['result']); 
     }

    public function transactions()
    {   
       //$this->checkSession();
       $this->load->view('header'); 
       $this->load->view('sidebar');
       $data['result'] = $this->generalmodel->get_resultbyorder('payments',array('delete_status'=>0),'payment_id','DESC');
       //echo $this->db->last_query();exit;
       $this->load->view('transactions',$data); 
       $this->load->view('footer');
    }
    
     public function addationalbookings()
    {   
       //$this->checkSession();
       $this->load->view('header'); 
       $this->load->view('sidebar');
       $data['result'] = $this->generalmodel->get_resultbyord('instructor_time_slots',array('addational_booking_status>'=>0));
       $this->load->view('addbooking',$data); 
       $this->load->view('footer');
    }
    
    public function deleteaddationalbookings($id){
      
      $data['addational_booking_status'] = '0';
      //$data['modified_date'] = date('Y-m-d H:i:s');
      $res = $this->generalmodel->modify('instructor_time_slots','addational_booking_status',$id,$data);
      $result = $this->generalmodel->deleteMulti('booking_confirm',array('id'=>$id));
       
      if($result){
        $this->session->set_flashdata('success_msg','Removed Successfully');
       redirect('Administrator/addationalbookings','refresh');
      }else{             
        $this->session->set_flashdata('success_msg','Not Verified');
      redirect('Administrator/addationalbookings','refresh');
      } 
    }
    
    public function postcode()
    {   
       //$this->checkSession();
       $this->load->view('header'); 
       $this->load->view('sidebar');
       //$data['result'] = $this->generalmodel->get_resultbyord('instructor_postcode',array(1=>1));
       $data['result'] = $this->generalmodel->get_resultbyorder('instructor_postcode',array(1=>1),'id','DESC');
       $this->load->view('postcode',$data); 
       $this->load->view('footer');
    }
    
    public function editpostcode($id)
    {
        $data['result'] = $this->generalmodel->get_resultbyord('instructor_postcode',array('id'=>$id));
        if($data['result'])
        {
            $this->load->view('header'); 
            $this->load->view('sidebar');
            $this->load->view('editpostcode',$data); 
            $this->load->view('footer');          
        } 
    }
    
    public function submiteditpostcode($id)
    {
        $postcode = $this->input->post('postcode');
        $updateData['postcode'] = $postcode;
        $data = $this->generalmodel->updateData('instructor_postcode',$updateData,array('id'=>$id));
            
        if($data){
            $this->session->set_flashdata('success_msg','Postcode Updated Successfully');
            redirect('Administrator/postcode','refresh');
        }else{             
            $this->session->set_flashdata('success_msg','Postcode Not Update');
            redirect('Administrator/postcode','refresh');
        } 
    }
    
    public function deletepostcode($id)
    {
      $result = $this->generalmodel->deleteMulti('instructor_postcode',array('id'=>$id));
      
      if($result){
        $this->session->set_flashdata('success_msg','Postcode Removed Successfully');
       redirect('Administrator/postcode','refresh');
      }else{             
        $this->session->set_flashdata('success_msg','Not Delete');
      redirect('Administrator/postcode','refresh');
      } 
    }
    
    public function deletetransaction($id){
      
      $data['delete_status'] = '1';
      //$data['modified_date'] = date('Y-m-d H:i:s');
      $result = $this->generalmodel->modify('payments','payment_id',$id,$data);
      
      if($result){
        $this->session->set_flashdata('success_msg','Removed Successfully');
       redirect('Administrator/transactions','refresh');
      }else{             
        $this->session->set_flashdata('success_msg','Not Verified');
      redirect('Administrator/transactions','refresh');
      } 
    }
    
    public function changepwd()
    {
       $this->load->view('header'); 
       $this->load->view('sidebar');
       $this->load->view('changepwd'); 
       $this->load->view('footer');
    }
     
    public function subpwd()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $newpwd = $this->input->post('pwd');
        $cfmpwd = $this->input->post('cfmpwd');
        
        if($newpwd == $cfmpwd)
        {
            if(!empty($name)){$updateData['name'] = $name;}
            if(!empty($email)){$updateData['email'] = $email;}
            $updateData['password'] = md5($newpwd);
            $updateData['pwd'] = $newpwd;
            $data = $this->generalmodel->updateData('ex_multiusers_n_admins',$updateData,array('id'=>1));        
            if(!empty($data))
            {
               redirect('Administrator/index');
            }
            else
            {
                $this->session->set_flashdata('msgpwd', 'Data Is Not Updated');
                $this->session->flashdata('msgpwd');
                $this->load->view('header'); 
                $this->load->view('sidebar');
                $this->load->view('changepwd'); 
                $this->load->view('footer');
            }
        }
        else
        {
            $this->session->set_flashdata('msgpwd', 'New Password And Confirm Password Is Not Matched.');
            $this->session->flashdata('msgpwd');
            $this->load->view('header'); 
            $this->load->view('sidebar');
            $this->load->view('changepwd'); 
            $this->load->view('footer');
        }
    }
    
    public function websiteinformation()
    {
       $this->load->view('header'); 
       $this->load->view('sidebar');
       $this->load->view('websiteinformation'); 
       $this->load->view('footer');
    }
    public function updatewebsiteinformation()
    {
        $data['title_first'] = $this->input->post('title_first');
        $data['description_first'] = $this->input->post('description_first');
        $data['title_firststep'] = $this->input->post('title_firststep');
        $data['description_firststep'] = $this->input->post('description_firststep');
        $data['title_secondstep'] = $this->input->post('title_secondstep');
        $data['description__secondstep'] = $this->input->post('');
        $data['description__secondstep'] = $this->input->post('description__secondstep');
        $data['title_thirdstep'] = $this->input->post('title_thirdstep');
        $data['description_thirdstep'] = $this->input->post('description_thirdstep');
        $data['title_exp1'] = $this->input->post('title_exp1');
        $data['description_exp1'] = $this->input->post('description_exp1');
        $data['title_exp2'] = $this->input->post('title_exp2');
        $data['description_exp2'] = $this->input->post('description_exp2');
        $data['title_exp3'] = $this->input->post('title_exp3');
        $data['description_exp3'] = $this->input->post('description_exp3');
        
          
            $data = $this->generalmodel->updateData('websiteinformation',$data,array('id'=>1));        
            
                $this->load->view('header'); 
                $this->load->view('sidebar');
                $this->load->view('websiteinformation'); 
                $this->load->view('footer');
    }
    
    public function instPaymentDone()
    {
        $id = $this->input->post('ids');
        $updateData['adminpay_inst_status'] = '1';
        $data = $this->generalmodel->updateData('payments',$updateData,array('payment_id'=>$id));
        //echo $this->db->last_query();exit;
        //print_r($data);exit;
        if(!empty($data[0])){
            $result = array('success'=>'true','msg'=>'Data Updated Successfully');
        }
        else{
            $result = array('success'=>'false','msg'=>'Data Not Update');
        }
        echo json_encode($result);
    }
    
    public function recordDelete()
    {
        $id = $this->input->post('ids');      
        $data = $this->generalmodel->deleteMulti('payments',array('payment_id'=>$id));
        //print_r($data);exit;
        if(!empty($data[0])){
            $result = array('success'=>'true','msg'=>'Record Deleted Successfully');
        }
        else{
            $result = array('success'=>'false','msg'=>'Record Not Deleted');
        }
        echo json_encode($result);
    }
    
}
?>