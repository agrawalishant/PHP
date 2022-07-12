<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Driving extends CI_Controller 

{
	public function __construct()
	{
		parent::__construct();    
		$this->load->model('Generalmodel');
		date_default_timezone_set('Asia/Kolkata');
		ob_start();
	}

	public function index()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/index');
		$this->load->view('frontend/footer');
    }

  	public function login()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/login');
		$this->load->view('frontend/footer');
    }

	public function book_class()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/book-instructor');
		$this->load->view('frontend/footer');
    }

    public function covid()
	{
		$this->load->view('frontend/header');
		$this->load->view('frontend/covid-19');
		$this->load->view('frontend/footer');
    }    

    public function logout() 
	 {  
	 	$this->session->unset_userdata('instructor_session');
		$this->session->sess_destroy('instructor_session');
		$this->session->unset_userdata('student_session');
		$this->session->sess_destroy('student_session');
		redirect('Driving/index');
	 }


}
?>