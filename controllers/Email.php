<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Email extends CI_Controller {

		
		public function send_mail($toemail, $msg, $subject)
		{

			$sender_email = "contact@astrovedvakta.com";
			$user_password = "Abx@9876!@";
			$username = "Astro Vakta";
			$receiver_email = $toemail;
			$subject = $subject;
			$message = $msg;
			
			$this->emailConfig();

			// Sender email address
			$this->email->from($sender_email, $username);
			// Receiver email address.for single email
			$this->email->to($receiver_email);
			//send multiple email
		//	$this->email->to("abc@gmail.com,xyz@gmail.com,jkl@gmail.com");
			// Subject of email
			$this->email->subject($subject);
			// Message in email
			$this->email->message($message);
			// It returns boolean TRUE or FALSE based on success or failure
			
			$mail = ($this->email->send()) ? "Sent" : "Failed" ;
			echo $this->email->print_debugger();
			
			echo $mail;
		}

		
		/**
		 * Email Configurations
		 * ** Please deactivate Second-step verification for the smtp_user **
		 */
		private function emailConfig()
		{
			$config = array(
				'protocol' 	=> 'smtp' , 
				// 'smtp_host' => 'ssl://smtp.googlemail.com' ,
                'smtp_host' => 'ssl://astrovedvakta.com' , 
				'smtp_port' => 465 , 
				'smtp_user' => 'contact@astrovedvakta.com' ,
				'smtp_pass' => 'Abx@9876!@',
				'mailtype'	=> 'html', 
				'charset' 	=> 'utf-8', 
				'newline' 	=> "\r\n",  
				'wordwrap' 	=> TRUE 
				);
			
			// Load email library and passing configured values to email library
			$this->load->library('email',$config);
		}
	}

?>