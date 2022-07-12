<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class AdminManager extends CI_Controller {

	function __construct()

    {

       parent::__construct();

       $this->load->model('generalmodel');

    }

	

	 public function index()

	 {

     

		$this->form_validation->set_rules('email','Email','trim|required');

		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run()==TRUE)

		{

			$email = $this->input->post('email');

			$password = $this->input->post('password');

			$remember = $this->input->post('remember');



			//echo $email."<br>".$password;exit;

			$result=$this->generalmodel->login('ex_multiusers_n_admins',$email,$password);

			//echo $this->db->last_query();exit;

			//print_r($result);exit;

			$this->session->set_userdata('dvAdmin_session',$result);

			

	   //     if($result){ 

	   //     	if(!empty($remember)) {

				// setcookie ("member_login",$result->name,time()+ (10 * 365 * 24 * 60 * 60));

				// } else {

				// if(isset($_COOKIE["member_login"])) {

				// 	setcookie ("member_login","");

				// } }

				//  print_r(get_cookie("member_login"));

			redirect('Administrator'); 

	          $this->load->view('index');	

	        	

			 } else {

	             

			$this->load->view('login');
			}
			

		

	   

		//redirect('AdminManager');

	 }

	

	/*---logout---*/



	public function logout() 

	 {  

	 	$this->session->unset_userdata('dvAdmin_session');    

		$this->session->sess_destroy('dvAdmin_session');


  //    	print_r($_SESSION);exit;

     	

	//	$this->session->unset_userdata('otherAdmin_information');

	//	$this->session->unset_userdata('postdata');

		//$this->session->set_flashdata('success_msg',"Successfully Logout");

		//redirect('AdminManager/index');

		$this->load->view('login');

	 }



}
?>