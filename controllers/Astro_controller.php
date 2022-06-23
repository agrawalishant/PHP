<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Astro_controller extends CI_Controller

{
    public function __construct()
    {
    	date_default_timezone_set('Asia/Kolkata');
        parent::__construct();
	//	$this->load->model('googlee_model');
    }
	
	public function index()
	{
// // google 
// include_once APPPATH . "libraries/vendor/autoload.php";

// $google_client = new Google_Client();

// $google_client->setClientId('436344221628-j06jsj4mtafhjb8vjpk8dr5ul5tp17jj.apps.googleusercontent.com'); //Define your ClientID

// $google_client->setClientSecret('_9oKPGjWmUfzFo_hgAbjJFXj'); //Define your Client Secret Key

// $google_client->setRedirectUri('http://testpnp.ml/astro/google_controller/login'); //Define your Redirect Uri

// $google_client->addScope('email');

// $google_client->addScope('profile');

// if(isset($_GET["code"]))
// {
//  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

//  if(!isset($token["error"]))
//  {
//   $google_client->setAccessToken($token['access_token']);

//   $this->session->set_userdata('access_token', $token['access_token']);

//   $google_service = new Google_Service_Oauth2($google_client);

//   $data = $google_service->userinfo->get();

//   $current_datetime = date('Y-m-d H:i:s');

//   if($this->googlee_model->Is_already_register($data['id']))
//   {
//    //update data
//    $user_data = array(
// 	'user_first_name' => $data['given_name'],
// 	'user_last_name'  => $data['family_name'],
// 	'user_email' => $data['email'],
// 	'user_image'=> $data['picture'],
// 	'user_timestamp' => $current_datetime
//    );

//    $this->googlee_model->Update_user_data($user_data, $data['id']);

//    redirect(base_url().'userdashboard','refresh');
//   }
//   else
//   {
//    //insert data
//    $user_data = array(
// 	'user_sms_verified'=>1,
// 	'user_approval_status'=>1,
// 	'user_approval_status'=>1,
// 	'oauth_provider'=>"google",
// 	'registerby'=>"google",
// 	'oauth_uid' => $data['id'],
// 	'user_first_name'  => $data['given_name'],
// 	'user_last_name'   => $data['family_name'],
// 	'user_email'  => $data['email'],
// 	'user_image' => $data['picture'],
// 	'user_timestamp'  => $current_datetime
//    );

//    $this->googlee_model->Insert_user_data($user_data);
//   }
//   $this->session->set_userdata('user_data', $user_data);
//  }
// }
// $login_button = '';

// $login_button = $google_client->createAuthUrl();
//   //$login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'image/websiteimages/google.png" /></a>';
//   $pagedata['login_button'] = $login_button;


// google
		$pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'index'; 
		$this->load->view('frontend/landing',$pagedata);
	
	}  

	
	public function astrologer_registration()
	{
		$pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'astrologer_registration'; 
		$this->load->view('frontend/landing',$pagedata);
	}

	public function services()
	{
		$pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'service'; 
		$this->load->view('frontend/landing',$pagedata);
	}

	public function match_making()
	{
		$pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'match_making'; 
		$this->load->view('frontend/landing',$pagedata);
	}

	public function prediction()
	{
		$pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'prediction'; 
		$this->load->view('frontend/landing',$pagedata);
	}

	public function productdetails($iid="")
	{
		// $id = decoding($iid);
		$pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'productdetails'; 
		$pagedata['pd_id'] = $iid; 
		$this->load->view('frontend/landing',$pagedata);
	}

	public function product($iid="")
	{
		$pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'product'; 
				 $pagedata['cat_product'] =	$this->Astro_model->get_table('*','category_product');
				 
				 
				  $condition="";
			 if($iid != "all")
			 {
				//   $id = decoding($iid);
				$id =$iid;
			 $conditionc=array("pr_category"=>$id);
			 $pagedata['products'] =	$this->Astro_model->get_table_condition('*','product',$conditionc);
			 
			  $limit =12;
			  //print_r($this->uri->segment(3)); die();
			  		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
					
					
					 $this->load->library('pagination');
		
		
		
		$config['base_url'] = site_url('product/'.$iid);
		$config['total_rows'] = count($pagedata['products']);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

	
		$pagedata['pagelinks'] = $this->pagination->create_links();
		 $condition=array("pr_category"=>$id);
	 $pagedata['product'] =	$this->Astro_model->get_table_condition_limit('*','product',$condition,$limit,$offset); 
	 	$pagedata['categoryids']=$id;
			
			 }
			else {
				
			 
			 
			 
			   $limit =12;
			  //print_r($this->uri->segment(3)); die();
			  		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			 $pagedata['products'] =	$this->Astro_model->get_table('*','product');


		 $this->load->library('pagination');
		
		
		
		$config['base_url'] = site_url('product/all');
		$config['total_rows'] = count($pagedata['products']);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

	
		$pagedata['pagelinks'] = $this->pagination->create_links();
			 $pagedata['product'] =	$this->Astro_model->get_table_condition_limit('*','product',$condition="",$limit,$offset); 
			 
			 
			}
		$this->load->view('frontend/landing',$pagedata);
	}

	public function contact()
	{
		$pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'contact'; 
		$this->load->view('frontend/landing',$pagedata);
	}

	public function services_landing($ids)
	{
		
		// $id = decoding($ids);
		$pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'service_landing';
		$pagedata['sl_id'] = $ids; 
		$this->load->view('frontend/landing',$pagedata);
	}

	

	public function astro_reg_submit()
	{
	      $this->form_validation->set_rules('astro_email', 'Email', 'required|valid_email|is_unique[astrologers.astro_email]');
	      $this->form_validation->set_rules('mobile', 'MOBILE', 'required|is_unique[astrologers.astro_mobile]');
	       if ($this->form_validation->run() == True) {
	   //   for seo url start 04-may-2021
	 $string = str_replace(' ','',$this->input->post('name'));
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    $insertdata['url_name']=$string;
	   //   for seo url end 04-may-2021
	      
	      
		$name = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('name'));
		$mobile = $this->input->post('mobile');
		$gender = $this->input->post('gender');
		$dob = $this->input->post('dob');
		$skill = $this->input->post('skill');
		$language =preg_replace('/[^A-Za-z0-9 ]/', '',  $this->input->post('language'));
		$exp = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('exp'));
		$skill = $this->input->post('skill');
		$address = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('address'));
		$city = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('city'));
		$state = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('state'));
		$country =preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('country'));
		$pincode = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('pincode'));
		$ac_number = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('ac_number'));
		$ac_type = $this->input->post('ac_type');
		$fisc = $this->input->post('fisc');
		$ac_name = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('ac_name'));
		$pan = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('pan'));
		$aadhar = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('aadhar'));
		$site = $this->input->post('site');
		$monthly_income = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('monthly_income'));
		$short_bio = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('short_bio'));
		$long_bio = preg_replace('/[^A-Za-z0-9 ]/', '', $this->input->post('long_bio'));
        $email = $this->input->post('astro_email');
        $password = SHA1($this->input->post('astro_password'));
        $orginalpass = $this->input->post('astro_password');

		$insertdata = [
						'astro_name' => $name,
						'astro_mobile' => $mobile,
						'gender' => $gender,
						'dob' => $dob,
						'skill' => $skill,
						'astro_language' => $language,
						'astro_experience' => $exp,
						'address' => $address,
						'city' => $city,
						'state' => $state,
						'country' => $country,
						'pincode' => $pincode,
						'ac_number' => $ac_number,
						'ac_type' => $ac_type,
						'ifsc' => $fisc,
						'ac_name' => $ac_name,
						'pancard' => $pan,
						'aadhar' => $aadhar,
						'site_name' => $site,
						'monthly_income' => $monthly_income,
						'short_bio' => $short_bio,
						'astro_email' => $email,
						'astro_password' => $password,
						'astro_pass' => $orginalpass,
						'long_bio' => $long_bio
					  ];
// 20/02/2021 start
    $image1 = $_FILES['profile_image']['name'];
    $img1 =  str_replace(" ", "", $image1);
    $insertdata['astro_image'] = $img1;
    move_uploaded_file($_FILES['profile_image']['tmp_name'], 'image/astrologers/'.$img1);
    $image2 = $_FILES['idproof']['name'];
    $img2 =  str_replace(" ", "", $image2);
    $insertdata['astro_image_document'] = $img2;
    move_uploaded_file($_FILES['idproof']['tmp_name'], 'image/astrologers/'.$img1);
// 20/02/2021  end
		$res = $this->Generalmodel->add('astrologers',$insertdata);
		$last_id = $this->db->insert_id();
	// 20/02/2021 start
	     $datai['astrologer_id_m'] = $last_id;
	     $datai['astrologer_cat_id'] = $this->input->post('skill');
		$incat = $this->Generalmodel->add('astrologers_multiplecategories',$datai);
	// 20/02/2021  end
		$this->session->set_userdata('asid',$last_id);
		if(!empty($res))
		{
			$this->session->set_flashdata('message', 'Submited Successfully.');
			$digits_needed=6;
			$otp=''; // set up a blank string
			$count=0;
			while ($count < $digits_needed) 
			{
			    $random_digit = mt_rand(0,9);
			    $otp .= $random_digit;
			    $count++;
			}
		$otps="Dear ".$name.", "."Your Mobile Verification code is ".$otp ."   Thank You Astroved Vakta.";
                    
			$this->session->set_userdata('otp',$otp);
			send_sms_new($mobile,$otps);
		}
	//	validation
}
else
{
    $this->session->set_flashdata('error','ALREADY EXIST EMAIL/MOBILE NO ');
        redirect('astrologer_registration');
}// 		validation
		//redirect('astrologer_registration');
		$this->load->view('frontend/include/header');
		$this->load->view('frontend/pages/otp_check');
		$this->load->view('frontend/include/footer');
	}

	public function checkotp()
	{
		$opt = $this->session->userdata('otp');
		$typeopt = $this->input->post('otps');
		if($opt==$typeopt)
		{	
			$id = $this->session->userdata('asid'); 
			$updatedata = "astro_verification_status";
			updateData('astrologers',array('astro_verification_status'=>1),array('astro_id'=>$id));
			$this->session->set_flashdata('success','Mobile Verified Successfully');
				// 19/02/2021 start
			$senddetails=fetchbyresultwhere('astrologers',array('astro_id'=>$id));
			$name=$senddetails[0]['astro_name'];
			$mobile=$senddetails[0]['astro_mobile'];
            $msg="Dear Astrologer Your Mobile Verification is completed.We will send you detail after Compliance Department";
			send_sms_new($mobile,$msg);
			// 19/02/2021 end
			redirect('astrologer_login_page');
		}
		else
		{
			$this->session->set_flashdata('error','OTP is not matched');	
			redirect('astrologer_registration');		
		}
	}

	public function astrotalk($iid="")
	{
		
		$pagedata['folder_name'] = 'pages';
        $pagedata['page_name'] = 'our_astrologers';
        $pagedata['page_title'] = 'Our Astrologers';
			 $pagedata['cat_astro'] =	$this->Astro_model->get_table('*','category_astrologer');
			 
		 
			 $condition="";
			 if($iid != "all")
			 {
				 $id = decoding($iid);
			 $conditionc=array("astrologer_cat_id"=>$id);
			 $pagedata['astrologer_id'] =	$this->Astro_model->get_table_condition('astrologer_id_m','astrologers_multiplecategories',$conditionc);
			 if(count($pagedata['astrologer_id']) > 0) {
			 foreach($pagedata['astrologer_id'] as $rs)
			 {
				 $rss[]=$rs['astrologer_id_m'];
				 
			 }
			 
		$ids = $rss;
		 }
		 else 
		 {
			 $ids="";
		 }
		 
		  $condition=array("astro_approved_status"=>1);
			  $limit =12;
			  //print_r($this->uri->segment(3)); die();
			  		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$pagedata['astrologerss'] =	$this->Astro_model->get_table_condition_in('*','astrologers',$condition,$ids);
		 $this->load->library('pagination');
		
		
		
		$config['base_url'] = site_url('astrotalk/'.$iid);
		$config['total_rows'] = count($pagedata['astrologerss']);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

	
		$pagedata['pagelinks'] = $this->pagination->create_links();
		// print_r($pagedata['pagelinks']); die();
		 
		 
		 
			 $condition=array("astro_approved_status"=>1);
			  
			$pagedata['astrologers'] =	$this->Astro_model->get_table_condition_in_limit_ranking('*','astrologers',$condition,$ids,$limit,$offset);
			$pagedata['category']=$id;
	      
			
			}
			else {
				
			 
			 
			 
			   $limit =12;
			  //print_r($this->uri->segment(3)); die();
			  		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $condition=array("astro_approved_status"=>1);
			 $pagedata['astrologerss'] =	$this->Astro_model->get_table_condition_ranking('*','astrologers',$condition);


		 $this->load->library('pagination');
		
		
		
		$config['base_url'] = site_url('astrotalk/all');
		$config['total_rows'] = count($pagedata['astrologerss']);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

	
		$pagedata['pagelinks'] = $this->pagination->create_links();
			 
			$condition=array("astro_approved_status"=>1);
			 $pagedata['astrologers'] =	$this->Astro_model->get_table_condition_limit_ranking('*','astrologers',$condition,$limit,$offset); 
			 
			 
			}
		$this->load->view('frontend/landing',$pagedata);
	}

    public function clingcoupun($id)
    {
        $code = $this->input->post('code');
        $callamt = $this->input->post('call_coupon_amt');
        
        $pagedata['amt_coppon'] = ($callamt * $res[0]['codepercent'])/100; 
        
        $pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'astrologer_profile';
		$pagedata['page_title'] = 'Astrologer Details';
		$condition=array("astro_id"=>$id);
		$pagedata['astrologers_details'] =	$this->Astro_model->get_table_condition('*','astrologers',$condition);
		if(!empty($pagedata['astrologers_details'])){
		$this->load->view('frontend/landing',$pagedata);
		}else{
			redirect(base_url().'userdashboard','refresh');
			
		}
    }

    public function callcoupon()
    {
        $code = $this->input->post('code');
        $callamt = $this->input->post('amt');
        $url = strrev($this->input->post('url'));
        // $res = explode('/',$url);
        // for($i=0;$i<1;$i++)
        // {
        //     $ul = $res[0];
        // }
        // $newstring = strrev($ul);
        // //$newstring = substr($url, -3);
        // $this->session->set_userdata('couponid',$newstring);
        // $this->session->userdata('couponid');
        
        if(!empty($code))
        {
            $date = date('Y-m-d');
            $res = fetchbyresultwhere('callcoupon',array('codename'=>$code));
            //echo $this->db->last_query();
            //print_r($res);exit;
            if(!empty($res))
            {
                if($res[0]['enddate'] >= $date)
                {
                    $amt = ($callamt * $res[0]['codepercent'])/100;
                    // $this->session->set_userdata('couponidamt',$amt);
                    // $this->session->userdata('couponidamt');
                    echo json_encode(array('success'=>'true','msg'=>$amt));
                }
                else
                {
                    echo json_encode(array('success'=>'false','msg'=>'Code Expired Try Another'));        
                }
            }  
            else
            {
                echo json_encode(array('success'=>'false','msg'=>'Invalid Code Try Again'));        
            }
        }
        else
        {
            echo json_encode(array('success'=>'false','msg'=>'Code Not Applyed'));
        }
    }

	public function astrotalk_profile($id)
	{
		//$id = decoding($iid);
		$pagedata['folder_name'] = 'pages';
		$pagedata['page_name'] = 'astrologer_profile';
		$pagedata['page_title'] = 'Astrologer Details';
		$condition=array("astro_id"=>$id);
		$pagedata['astrologers_details'] =	$this->Astro_model->get_table_condition('*','astrologers',$condition);
		if(!empty($pagedata['astrologers_details'])){
		$this->load->view('frontend/landing',$pagedata);
		}else{
			redirect(base_url().'userdashboard','refresh');
			
		}
	}

	function searchproducts()
	{
		$value = array();
		$value['title'] = $this->input->post('vlu');
		$html = $this->load->view('frontend/pages/src_product',$value,true);
		//$result = array('success'=>'true','msg'=>$html);
		echo $html;
	}

	function searchastro()
	{
		$value = array();
		$value['name'] = $this->input->post('vlu');
		$html = $this->load->view('frontend/pages/src_astrologers',$value,true);
		//$result = array('success'=>'true','msg'=>$html);
		echo $html;
	}

	function add_to_card($id)
	{
		
		$pagedata['folder_name'] = 'pages';
        $pagedata['page_name'] = 'add_to_cart';
        $pagedata['page_title'] = 'Cart';
		
		$condition=array("pr_id"=>$id);
		$pagedata['product'] =	$this->Astro_model->get_table_condition('*','product',$condition);
		//echo $this->db->last_query();
		$data = array(
				        'id'      => $pagedata['product'][0]['pr_id'],
				        'qty'     => 1,
				        'price'   =>$pagedata['product'][0]['pr_finalprice'],
				        'name'    => $pagedata['product'][0]['pr_title'],
				        'proriginalprice' => $pagedata['product'][0]['pr_originalprice'],
						'prdiscount' => $pagedata['product'][0]['pr_discount'],
						'primage' => $pagedata['product'][0]['pr_image'] 
					);
		//print_r($data);exit;
		$this->cart->insert($data);  	
		redirect('astro_controller/cart');
	}	
	function add_to_card_bycarat($carat_id,$product_id)
	{
		
	//	echo $product_id;
	//	echo $carat_id;
//	echo	$carat_id=$this->input->post("carat_id");
	//echo	$product_id=$this->input->post("hidden_product_id");
//exit;
        $subproductget=fetchbyresultwhere('product_subproduct',array('sp_id'=>$carat_id));
		$product=fetchbyresultwhere('product',array('pr_id'=>$product_id));
		
		$productprice=$product[0]['pr_finalprice'];
		$carat=$subproductget[0]['sp_weight_carat'];

		$finalprice=$carat*$productprice;
		//$pagedata['folder_name'] = 'pages';
       // $pagedata['page_name'] = 'add_to_cart';
       // $pagedata['page_title'] = 'Cart';
		
		$condition=array('pr_id'=>$product_id);
		$pagedata['product'] =	$this->Astro_model->get_table_condition('*','product',$condition);
		//echo $this->db->last_query();
		$data = array(
				        'id'      => $product_id,
						'carat_id' => $carat_id,
						'carat_weight' => $carat,
				        'qty'     => 1,
				        'price'   =>$finalprice,
				        'name'    => $pagedata['product'][0]['pr_title'],
				        'proriginalprice' => $pagedata['product'][0]['pr_originalprice'],
						'prdiscount' => $pagedata['product'][0]['pr_discount'],
						'primage' => $pagedata['product'][0]['pr_image'] 
					);
		//print_r($data);exit;
		$this->cart->insert($data);  	
		redirect('astro_controller/cart');
	}	

	function cart()
	{   
         
        $data['folder_name'] = 'pages';
        $data['page_name'] = 'add_to_cart';
        $data['page_title'] = 'Cart';

        $data['cartItems'] = $this->cart->contents();        
        $this->load->view('frontend/landing',$data);
    }

    function removecart($rowid)
    {
    	//echo $rowid;exit;
    	$remove = $this->cart->remove($rowid);
        //print_r($remove);exit;
        // Redirect to the cart page
        redirect('astro_controller/cart');
    }

    function updateItemQty()
    {
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        //echo $update?'ok':'err';
        redirect('astro_controller/cart');
    }

    function addItemQty($rowid,$qty)
    {
        $update = 0;
        
        // Get cart item info
        //$rowid = $this->input->get('rowid');
        //$qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){

        	$old = $this->cart->contents();
        	echo '<pre>';print_r($old);
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            print_r($data);exit;
            $update = $this->cart->update($data);
        }
        
        // Return response
        //echo $update?'ok':'err';
        redirect('astro_controller/cart');
    }

    public function walletpayment()
    {
    	$amt = $this->input->post('amt');
    	$userid = $this->input->post('userid');
    	$productid = $this->input->post('productid');
    	$discountamt = $this->input->post('discountamt');

		$carat_id = $this->input->post('carat_id');
		$carat_weight = $this->input->post('carat_weight');

    	$randam = uniqid(8);

    	$results = fetchbyresultByCondiction('wallet',array('user_id'=>$userid));
    	$updateamt = $results[0]['wallet_amt'] - $amt;
    	updateData('wallet',array('wallet_amt'=>$updateamt),array('user_id'=>$userid));
    	$insertdata = [
    					'unique_id' => $randam,
    					'user_id' => $userid,
						'total_amt' => $amt,
						'discount_amount'=>$discountamt,
    					'product_id' => $productid,
    					'payment_status' => 'Success',
    					'pay_by' => 'Wallet',
						'carat_id' => $carat_id,
						'carat_weight' => $carat_weight
    				];
    	WalletaddData('payment',$insertdata);
    	$destroy = $this->cart->destroy();
    	$this->session->set_flashdata('success','Transaction Completed Successfully');
    }
    
    public function KundliPayByWallet()
    {
        $wallet_amt = $this->input->post('amt');
        $kundlicharges = $this->input->post('kundlicharges');
        $user = $this->input->post('user');
        $results = fetchbyresultByCondiction('wallet',array('user_id'=>$user));
        if(!empty($results)){
    	    $updateamt = $results[0]['wallet_amt'] - $kundlicharges;
            updateData('wallet',array('wallet_amt'=>$updateamt),array('user_id'=>$user));
            $result = array('success'=>'true','msg'=>'Payment Done Succesfully.');
            
            $data['fkun_name']=preg_replace('/[^A-Za-z0-9 ]/', '',$this->input->post('fkun_name'));
            $data['user_id']=$user;
            $data['fkun_mobile']=$this->input->post('fkun_mobile');
            $data['fkun_gender']=$this->input->post('fkun_gender');
            $data['fkun_dob']=$this->input->post('fkun_dob');
            $data['fkun_email']=$this->input->post('fkun_email');
            $data['fkun_birth_time']=$this->input->post('fkun_birth_time');
            $data['wallet_pay_amt']=$kundlicharges;
            $data['fkun_birth_place']=preg_replace('/[^A-Za-z0-9 ]/', '',$this->input->post('fkun_birth_place'));
    
            $res = $this->front_model->freekundalienquierysubmit($data);
            if(!empty($res)){
                $last_id = $this->db->insert_id();
                $insrtdata = [
                            'wlla_recevedby_id' =>$last_id,
                            'wlla_receved_for' =>'Make Kundli',
                            'wlla_amount' =>$kundlicharges
                            ];
                $admin_wall_history = insertdata('wallet_history_admin',$insrtdata);
                
                $results = fetchbyresultByCondiction('wallet_admin',array('wad_id'=>1));
                $adminWalletAmt = $results[0]['wad_amt'];
                $finalAmt = $adminWalletAmt+$kundlicharges;
                updateData('wallet_admin',array('wad_amt'=>$finalAmt),array('wad_id'=>1));
            }
        }
        else
        {
            $result = array('success'=>'false','msg'=>'Payment Not Done.');
        }
        echo json_encode($result);
    }
    
    public function watting_time($check)
    {
    	$astro_id = $this->input->post('astro_id');
    	$min = $this->input->post('min');
    	$date = date('h:i:s a', time());	
    	if($check == 'call')
    	{
    		$updateData = [
    						'astro_call_watting_time'=>$min,
    						'astro_online_call_status'=>0,
    						'astro_call_time'=>$date	
    					];

    		updateData('astrologers',$updateData,array('astro_id'=>$astro_id));
    		
    	}
    	else if($check == 'chat')
    	{
    		$updateData = [
    						'astro_chat_watting_time'=>$min,
    						'astro_online_chat_status'=>0,
    						'astro_chat_time'=>$date	
    					];
    		updateData('astrologers',$updateData,array('astro_id'=>$astro_id));
    	}
	}
	public function destroy()
    {
        
        $this->session->sess_destroy();
        $this->session->unset_userdata('user_email');
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('user_first_name');
    $this->session->unset_userdata('user_folder_name');
    
        redirect(base_url().'front_page','refresh');
    }
// ===============================================================
    public function chatsend()
    {
        $arr['reciver_id'] = $this->input->post('reciver');
        $arr['sender_id'] = $this->input->post('sender');
        $arr['message'] = $this->input->post('msg');
        //print_r($arr);
        $arr['status'] = 1;
        $this->db->insert('chat_messsage',$arr);
        echo json_encode($arr);
    }
    
    // public function showoldchat()
    // {
    //     $reciver_id = $this->input->post('reciver');
    //     $sender_id = $this->input->post('sender');
    //     $message = $this->input->post('msg');
    //     $astr = fetchbyresultByCondiction('astrologers',array('astrto_id'=>$reciver_id));
    //     $res = fetchbyresultByCondiction('chat_messsage',array('sender_id'=>$sender_id,'reciver_id'=>$reciver_id));
    //     foreach($res as $req)
    //     {
    //         $html = '<p><strong>'.$astr[0]['astro_name'].':</strong><span>'.$req['message'].'</span></p>';
    //     }
    //     echo json_encode(array('success'=>'true','msg'=>$html));
    // }
    
    public function chatsend1()
    {
        //$arr['msg'] = $this->input->post('message');
        $arr['from_user'] = $this->input->post('reciver');
        $arr['to_user'] = $this->input->post('sender');
        $arr['to_user'] = $this->input->post('msg');
        $arr['date'] = time();
        // $arr['status'] = 1;
        // $this->db->insert('tbl_msg',$arr);
        // $detail = $this->db->select('*')->from('tbl_msg')->where('id',$this->db->insert_id())->get()->row();
        // $msgCount = $this->db->select('*')->from('tbl_msg')->get()->num_rows();
        // $arr['message'] = $detail->msg;
        // $arr['date'] = date('h:i A | M d',$detail->date);
        // $arr['msgcount'] = $msgCount;
        // $arr['from_user'] = $detail->from_user;
        // $arr['success'] = true;
         echo json_encode($arr);
    }
    
}
?>