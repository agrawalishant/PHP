<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //$this->load->model('user_model');
    }

	public function index()
	{
		$value['val'] = $this->user_model->getDatas('emp');
		$this->load->view('welcome_message',$value);
	}

	public function register(){
		$this->load->view('reistration');
	}

	public function regDataSave(){
		$Name = $this->input->post('name');
		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$dob = $this->input->post('dob');
		$photo = $_FILES['photo']['name'];

		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024"
		);
		$page_data['file_name'] =$_FILES['photo']['name'];
		move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$_FILES["photo"]["name"]);
		$data =[
				'emp_name' => $Name,
				'address' => $address,
				'email' => $email,
				'phone' => $phone,
				'dob' => $dob,
				'image' => $_FILES['photo']['name']
			];
		$this->user_model->regDataSave('emp',$data);
		$last_id = $this->db->insert_id();
		if($last_id>0){
			$value['val'] = $this->user_model->getDatas('emp');
			$this->load->view('welcome_message',$value);
		}
	}

	public function delete($id){
		$this->user_model->delete('emp',$id);
		redirect('welcome');
	}

	public function edit($id){
		$where = ['id',$id];
		$res['result'] = $this->user_model->getWhereData('emp',$id);
		$this->load->view('edit',$res);
	}

	public function update($id){
		$Name = $this->input->post('name');
		$address = $this->input->post('address');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$dob = $this->input->post('dob');
		$photo = $_FILES['photo']['name'];

		if(!empty($photo)){
			$config = array(
				'upload_path' => "./uploads/",
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "768",
				'max_width' => "1024"
			);
			$page_data['file_name'] =$_FILES['photo']['name'];
			move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$_FILES["photo"]["name"]);
			$data =[
				'emp_name' => $Name,
				'address' => $address,
				'email' => $email,
				'phone' => $phone,
				'dob' => $dob,
				'image' => $_FILES['photo']['name']
			];
			$this->user_model->update('emp',$id,$data);
		}else{
			$data =[
				'emp_name' => $Name,
				'address' => $address,
				'email' => $email,
				'phone' => $phone,
				'dob' => $dob
			];
			$this->user_model->update('emp',$id,$data);
		}
		redirect('welcome');
	}

}
?>
