<?php 
defined('BASEPATH') or exit('No direct script access allowed');

Class Basic_controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	// *********************START services******************

	public function services()
	{
		$id = $this->input->post('id');
	    if(!empty($id))
	    {
	        $data1 = fetchbyresultwhere('services',array('services_id'=>$id));
			foreach($data1 as $data2)
			{
				$data['services_id']=$data2['services_id'];
				$data['title']=$data2['title'];
				$data['name']=$data2['name'];
				$data['description']=strip_tags($data2['description']);
				
				$data['href']=$data2['href'];
				$data['image']=$data2['image'];
				$data['type']=$data2['type'];
				$data['timestamp']=$data2['timestamp'];
				
			}
	    }
	    else
	    {
	        $data1 = fetchbyresult('services'); 
			foreach($data1 as $data2)
			{
				
				$data3['services_id']=$data2['services_id'];
				$data3['title']=$data2['title'];
				$data3['name']=$data2['name'];
				   $des=strip_tags($data2['description']);
				$data3['description']=str_replace("&nbsp;","", $des);    
				$data3['href']=$data2['href'];
				$data3['image']=$data2['image'];
				$data3['type']=$data2['type'];
				$data3['timestamp']=$data2['timestamp'];
			
				$data[] = $data3;
			}   
		
	    }
		
		if(!empty($data))
		{
		    $data=array('success'=>"true",'msg'=>"Services Available",'userdata'=>$data);
		    echo json_encode($data);
		}
		else
		{
		    $data=array('success'=>'true','msg'=>"No services Found");
		    echo json_encode($data);
		}
	}

	// *****************END services************************



	// *****************START horoscopeyearly****************

	public function horoscopeyearly()
	{
	    $id = $this->input->post('id');
	    if(!empty($id))
	    {
	        $data = fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>$id));
			foreach($data as $d)
			  
			{
			 
				$data1['horoscope_id']=$d['horoscope_id'];
				$data1['name']=$d['name'];
				$data1['english_name']=$d['english_name'];
				$data1['daterange']=$d['daterange'];
				$data1['datefirst']=$d['datefirst'];
				$data1['datesecond']=$d['datesecond'];
				$data1['main_image']=$d['main_image'];
				$data1['image']=$d['image'];
// --------------------------------
                $data1['hindi_name']=$d['hindi_name'];
				$data1['lucky_colour']=$d['lucky_colour'];
				$data1['lucky_number']=$d['lucky_number'];
				$data1['lucky_flower']=$d['lucky_flower'];
				$data1['yearofbirth']=$d['yearofbirth'];
				$data1['profession']=$d['profession'];
				$data1['luck']=$d['luck'];
				$data1['emotion']=$d['emotion'];
				$data1['health']=$d['health'];
				$data1['love']=$d['love'];
				$data1['travel']=$d['travel'];
// --------------------------------

								   $da=$d['description'];
			  
								  $ab=strip_tags($da);
				 $data1['description']=str_replace("&nbsp;","", $ab);
				$data2[]=$data1;
			}
			$data=$data2; 
	    }
	    else
	    {
	        $data = fetchbyresult('horoscopeyearly'); 
			
               foreach($data as $d)
			  
			   {
				
				   $data1['horoscope_id']=$d['horoscope_id'];
				   $data1['name']=$d['name'];
				   $data1['english_name']=$d['english_name'];
				   $data1['daterange']=$d['daterange'];
				   $data1['datefirst']=$d['datefirst'];
				   $data1['datesecond']=$d['datesecond'];
				   $data1['main_image']=$d['main_image'];
				   $data1['image']=$d['image'];


				                      $da=$d['description'];
				 
				                     $ab=strip_tags($da);
				    $data1['description']=str_replace("&nbsp;","", $ab);
				   $data2[]=$data1;
			   }

		// 	$ab=strip_tags($data);
		// $data1['description']=str_replace("&nbsp;","", $ab);
		
		$data=$data2; 
	    }
	    
	    if(!empty($data))
	    {
	        $data=array('success'=>"true",'msg'=>"success",'userdata'=>$data);
	        echo json_encode($data);
	    }
	    else
	    {
	        $data=array('success'=>'false','msg'=>"No Horoscopeyearly Found");
	        echo json_encode($data);
	    }
	}

	// *****************END horoscopeyearly****************

	// *****************START blog***************************

	public function blog()
	{
	    $id = $this->input->post('id');
	    if(!empty($id))
	    {
	    	$data1 = fetchbyresultwhere('blog',array('blog_id'=>$id));
	    	$data2 = fetchbyresultwhere('blogcomment',array('comment_blog_id'=>$id));
	    }
		else
		{
			$data1 = fetchbyresult('blog');
			$data2 = fetchbyresult('blogcomment');
		}
		if(!empty($data1))
		{
			
		    $data=array('success'=>"true",'msg'=>"Blogs Available",'blog'=>$data1,'comment'=>$data2);
		    echo json_encode($data);
		}
		else
		{
		    $data=array('success'=>'false','msg'=>"No blog Found");
		    echo json_encode($data);
		}
	}

	// ****************END blog*****************************

	// ******************START webiteminformation****************

	public function websiteinformation()
	{
	    $data = fetchbyresult('websiteinformation');
		$data1['website_name']=strip_tags($data[0]['website_name']);
		$data1['title']=strip_tags($data[0]['title']);
		$data1['matter']=strip_tags($data[0]['matter']);
		$ab=strip_tags($data[0]['about']);
		$data1['about']=str_replace("&nbsp;","", $ab);
		$data1['phone']=$data[0]['phone'];
		$data1['email']=$data[0]['email'];
		$data1['address']=strip_tags($data[0]['address']);
		$data1['facebook_link']=$data[0]['facebook_link'];
		$data1['google_link']=$data[0]['google_link'];
		$data1['yahoo_link']=$data[0]['yahoo_link'];
		$data1['twitter_link']=$data[0]['twitter_link'];
		$data1['tollfreenumber']=$data[0]['tollfreenumber'];
		$data1['copyright']=$data[0]['copyright'];
		$data1['logo2']=$data[0]['logo2'];
		$data1['logo1']=$data[0]['logo1'];
		$data2[]=$data1;
		if(!empty($data))
		{
		    $data=array('success'=>"true",'msg'=>"Data Available",'userdata'=>$data2);
		    echo json_encode($data);
		}
		else
		{
		    $data=array('status'=>'false','msg'=>"No Data Found");
		    echo json_encode($data);
		}
	}

	// ***********END webiteminformation********************

	// **********************advertisement Start*******************
	public function advertisement()
	{
	    $data1 = fetchbyresult('advertisement');
	    
		if(!empty($data1))
		{
		    $data=array('success'=>"true",'msg'=>"Images Available",'advertisement'=>$data1);
		    echo json_encode($data);
		}
		else
		{
		    $data=array('success'=>'false','msg'=>"No Image Found");
		    echo json_encode($data);
		}
	}
	
	public function howToUse()
	{
	    $data1 = fetchbyresult('howtouse');
	    
		if(!empty($data1))
		{
		    $data=array('success'=>"true",'msg'=>"Data Found",'data'=>$data1);
		}
		else
		{
		    $data=array('success'=>'false','msg'=>"No Data Found");
		}
		echo json_encode($data);
	}
	// **********************advertisement Ends*******************


	public function news()					// News
	{
		$id = $this->input->post('id');

		if(!empty($id))
		{
			$data1 = fetchbyresultwhere('news',array('news_id'=>$id));
		}
		else
		{
			$data1 = fetchbyresult('news');	
		}
	    
		if(!empty($data1))
		{
		    $data=array('success'=>"true",'msg'=>"Images Available",'News'=>$data1);
		}
		else
		{
		    $data=array('success'=>'false','msg'=>"No Data Found");
		}
		echo json_encode($data);
	}


	public function enquiry()
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$msg = $this->input->post('message');

		$InputData = [
						'enq_name' => $name,
						'enq_email' => $email,
						'enq_mobilenumber' => $phone,
						'enq_message' => $msg
					];
		$data = addData('enquiry',$InputData);
		if(!empty($data))
		{
			$result = array('success'=>'true','msg'=>'Enquiry Submited Successfully.');
		}
		else
		{
			$result = array('success'=>'true','msg'=>'Some Thing Went Wrong.');
		}
		echo json_encode($result);
	}

	// ***********START notificaton*********************

	public function notification()

	{

	 
	$data = fetchbyresult('notification');

	if(!empty($data))

	{

	    $data=array('success'=>"true",'msg'=>'Data Found','data'=>$data);

	    echo json_encode($data);

	}

	else

	{

	    $data=array('success'=>'true','msg'=>"No Data Found");

	    echo json_encode($data);

	}

	}

	// ***************END notificaton**************

	// ******************START Aboutus***************

	public function aboutus()
	{
		// $data = fetchbyrow_where_dbid('contentmanagement','1',"cm_id");
		$data1=$this->db->get_where('contentmanagement',array('cm_id'=>1))->result_array();
		 $data2['title']=strip_tags($data1[0]['title']);
		$data2['description']=strip_tags($data1[0]['description']);
		$data[]=$data2;
		if(!empty($data))
		{
		    $data=array('success'=>"true",'msg'=>"success",'data'=>$data);
		    echo json_encode($data);
		}
		else
		{
		    $data=array('success'=>'true','msg'=>"No Data Found");
		    echo json_encode($data);
		}
	}

	// ********************END aboutus*************************

	// *****************START Term & Condiction**************

	// public function terms()
	// {
	// 	$data = fetchbyrow_where_dbid('contentmanagement','2',"cm_id");
		
	// 	if(!empty($data))
	// 	{
	// 	    $data=array('success'=>"true",'msg'=>"success",'notification'=>$data);
	// 	    echo json_encode($data);
	// 	}
	// 	else
	// 	{
	// 	    $data=array('success'=>'true','msg'=>"No Data Found");
	// 	    echo json_encode($data);
	// 	}
	// }

	// ********************END Term & Condiction*************************

	// *****************START Privacy Policy**************

	public function policy()
	{
		$data = fetchbyrow_where_dbid('contentmanagement','3',"cm_id");
		
		if(!empty($data))
		{
		    $data=array('success'=>"true",'msg'=>"success",'notification'=>$data);
		    echo json_encode($data);
		}
		else
		{
		    $data=array('success'=>'true','msg'=>"No Data Found");
		    echo json_encode($data);
		}
	}

	// ********************END Privacy Policy*************************

	// *******START termscondition****************************

	public function termscondition()
	{
		// $data = fetchbyrow_where_dbid('contentmanagement','2',"cm_id");
		$data1=$this->db->get_where('contentmanagement',array('cm_id'=>2))->result_array();
		$data2['title']=strip_tags($data1[0]['title']);
		$ab=strip_tags($data1[0]['description']);
		$data2['description']=str_replace("&nbsp;","", $ab);  
		
		$data[]=$data2;
		if(!empty($data))
		{
		    $data=array('success'=>'true','msg'=>'Data Found','data'=>$data);
		    echo json_encode($data);
		}
		else
		{
		    $data=array('success'=>'true','msg'=>"No Data Found");
		    echo json_encode($data);
		}
	}

	// ****************END termscondition***************************

	// *****************START privacypolicy***************

	public function privacypolicy()
	{
		// $data = fetchbyrow_where_dbid('contentmanagement','3',"cm_id");
		$data1=$this->db->get_where('contentmanagement',array('cm_id'=>3))->result_array();
		$data2['title']=strip_tags($data1[0]['title']);
		$data2['description']=strip_tags($data1[0]['description']);
		$data[]=$data2;
		if(!empty($data))
		{
		    $data=array('success'=>"true",'msg'=>"success",'data'=>$data);
		    echo json_encode($data);
		}
		else
		{
		    $data=array('success'=>'true','msg'=>"No Data Found");
		    echo json_encode($data);
		}
	}

	// **********END privacypolicy*************************

	// *******************START Calling*********

	public function calling()
	{
		$astreologer_number = $this->input->post('astro_number');
		$astro_id = $this->input->post('astro_id');
		$usernumber = $this->input->post('user_number');
		$user_id = $this->input->post('user_id');
		$totalSecs = $this->input->post('second');

		if(!empty($astreologer_number) || !empty($usernumber) || !empty($totalSecs))
		{
			$datassgg = array('agent' => $astreologer_number, 'customer' => $usernumber, 'seconds' => $totalSecs);
 			$data_string = json_encode($datassgg);  
			calling($data_string);	
			$insertdata = [
							'uch_user_id' => $user_id,
							'uch_astro_id' => $astro_id,
							'uch_call_start_time' => date('Y-m-d H:i:s'),
						];
			$res = addDatas('user_call_detail_history_user',$insertdata);
			$data=array('success'=>'true','msg'=>"Data Add In Call History Successfully.");
		    echo json_encode($data);
		}
		else
		{
			$data=array('success'=>'true','msg'=>"Incorrect Data Please Try Again");
		    echo json_encode($data);
		}
	}

	// ************************END Calling*********************


	// *******************START astrologer Call History*********

	public function astroCallHistory()
	{
		$astroid = $this->input->post('astro_id');
		//$astroid = 34;
		if(!empty($astroid))
		{
			$select = "`user_call_detail_history_user`.`uch_totaltime` as `totaltime`,`user_call_detail_history_user`.`uch_call_start_time` as `starttime`,`user_call_detail_history_user`.`uch_call_end_time` as `endtime`, `user`.`user_first_name` as `firstname`, `user`.`user_last_name` as `lastname`";
			$join_condiction = "user.user_id = user_call_detail_history_user.uch_user_id";
			$where = "user_call_detail_history_user.uch_astro_id =".$astroid." AND user_call_detail_history_user.astro_delete_status = 0";
			$res = getJoinData($select,'user_call_detail_history_user','user',$join_condiction,$where);
			//echo "<pre>";print_r($res);exit;
			//echo $this->db->last_query();exit;
			$data=array('success'=>'true','msg'=>$res);
		}
		else
		{
			$data=array('success'=>'true','msg'=>"Incorrect Data Please Try Again");
		}
		echo json_encode($data);
	}

	public function astroDELETECallHistory()
	{
		$astroid = $this->input->post('astroid');
		$updateData = [
						'astro_delete_status' => 1,
					];
		$data = updateData('user_call_detail_history_user',$updateData,array('uch_astro_id'=>$astroid));
		//echo $this->db->last_query();exit;
		if(!empty($data))
		{
		    $data=array('success'=>"true",'msg'=>"Data Deleted Successfully");
		}
		else
		{
		    $data=array('success'=>'true','msg'=>"Data Not Deleted");
		}
		echo json_encode($data);
	}

	public function userDELETECallHistory()
	{
		$userid = $this->input->post('userid');
		$updateData = [
						'user_delete_status' => 1,
					];
		$data = updateData('user_call_detail_history_user',$updateData,array('uch_user_id'=>$userid));
		//echo $this->db->last_query();exit;
		if(!empty($data))
		{
		    $data=array('success'=>"true",'msg'=>"Data Deleted Successfully");
		}
		else
		{
		    $data=array('success'=>'true','msg'=>"Data Not Deleted");
		}
		echo json_encode($data);
	}

	// ************************END astrologer Call History*********************


	// *******************START user Call History*********

	public function userCallHistory()
	{
		$userid = $this->input->post('user_id');
		if(!empty($userid))
		{
			$select = "`user_call_detail_history_user`.`uch_totaltime` as `totaltime`,`user_call_detail_history_user`.`uch_call_start_time` as `starttime`,`user_call_detail_history_user`.`uch_call_end_time` as `endtime`,  `astrologers`.`astro_name` as `astroName`";
			$join_condiction = "astrologers.astro_id = user_call_detail_history_user.uch_astro_id";
			$where = "user_call_detail_history_user.uch_user_id =".$userid." AND user_call_detail_history_user.user_delete_status = 0";
			$res = getJoinData($select,'user_call_detail_history_user','astrologers',$join_condiction,$where);
			//echo $this->db->last_query();exit;
			$data=array('success'=>'true','msg'=>$res);
		}
		else
		{
			$data=array('success'=>'true','msg'=>"Incorrect Data Please Try Again");
		}
		echo json_encode($data);
	}

	// ************************END user Call History*********************

	public function matchmaking()			//Match Making
	{
		$B_name = $this->input->post('b_name');
		$B_gender = $this->input->post('b_gender');
		$B_mobilecountrycode = $this->input->post('b_mobilecountrycode');
		$B_mobile = $this->input->post('b_mobile');
		$B_dob = date('Y-m-d',strtotime($this->input->post('b_dob')));
		$B_maritalstatus = $this->input->post('b_maritalstatus');
		$B_hr = $this->input->post('b_hr');
		$B_min = $this->input->post('b_min');
		$B_email = $this->input->post('b_email');
		$B_language = $this->input->post('b_language');
		$B_birthplace = $this->input->post('b_birthplace');

		$G_name = $this->input->post('g_name');
		$G_gender = $this->input->post('g_gender');
		$G_mobilecountrycode = $this->input->post('g_mobilecountrycode');
		$G_mobile = $this->input->post('g_mobile');
		$G_dob = date('Y-m-d',strtotime($this->input->post('g_dob')));
		$G_maritalstatus = $this->input->post('g_maritalstatus');
		$G_hr = $this->input->post('g_hr');
		$G_min = $this->input->post('g_min');
		$G_email = $this->input->post('g_email');
		$G_languB_languageage = $this->input->post('g_language');
		$G_birthplace = $this->input->post('g_birthplace');

		if(!empty($B_name)){ $Insertdata['mm_name_first'] = $B_name; }
		if(!empty($B_gender)){ $Insertdata['mm_gender_first'] = $B_gender; }
		if(!empty($B_mobilecountrycode)){ $Insertdata['mm_countrycode_first'] = $B_mobilecountrycode; }
		if(!empty($B_mobile)){ $Insertdata['mm_mobile_first'] = $B_mobile; }
		if(!empty($B_dob)){ $Insertdata['mm_dob_first'] = $B_dob; }
		if(!empty($B_maritalstatus)){ $Insertdata['mm_maritalstatus_first'] = $B_maritalstatus; }
		if(!empty($B_hr)){ $Insertdata['mm_birthhour_first'] = $B_hr; }
		if(!empty($B_min)){ $Insertdata['mm_birthmin_first'] = $B_min; }
		if(!empty($B_email)){ $Insertdata['mm_email_first'] = $B_email; }
		if(!empty($B_language)){ $Insertdata['mm_language_first'] = $B_language; }
		if(!empty($B_birthplace)){ $Insertdata['mm_birthplace_first'] = $B_birthplace; }
	
		if(!empty($G_name)){ $Insertdata['mm_name_sec'] = $G_name; }
		if(!empty($G_gender)){ $Insertdata['mm_gender_sec'] = $G_gender; }
		if(!empty($G_mobilecountrycode)){ $Insertdata['mm_countrycode_sec'] = $G_mobilecountrycode; }
		if(!empty($G_mobile)){ $Insertdata['mm_mobile_sec'] = $G_mobile; }
		if(!empty($G_dob)){ $Insertdata['mm_dob_sec'] = $G_dob; }
		if(!empty($G_maritalstatus)){ $Insertdata['mm_maritalstatus_sec'] = $G_maritalstatus; }
		if(!empty($G_hr)){ $Insertdata['mm_birthhour_sec'] = $G_hr; }
		if(!empty($G_min)){ $Insertdata['mm_birthmin_sec'] = $G_min; }
		if(!empty($G_email)){ $Insertdata['mm_email_sec'] = $G_email; }
		if(!empty($G_language)){ $Insertdata['mm_language_sec'] = $G_language; }
		if(!empty($G_birthplace)){ $Insertdata['mm_birthplace_sec'] = $G_birthplace; }

		$res = addData('matchmaking',$Insertdata);
		if(!empty($res))
		{
			$result=array('success'=>'true','msg'=>"Data Submited Successfully.");
		}
		else
		{
			$result=array('success'=>'true','msg'=>"Incorrect Data Please Try Again.");
		}
		echo json_encode($result);
	}

	public function blogComments()
	{
		$blogid = $this->input->post('blogid');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$comment = $this->input->post('comment');
		
		if(!empty($blogid)){ $Insertdata['comment_blog_id'] = $blogid; }
		if(!empty($name)){ $Insertdata['comment_name'] = $name; }
		if(!empty($email)){ $Insertdata['comment_email'] = $email; }
		if(!empty($mobile)){ $Insertdata['comment_mobile'] = $mobile; }
		if(!empty($comment)){ $Insertdata['comment_comment'] = $comment; }

		$res = addData('blogcomment',$Insertdata);
		if(!empty($res))
		{
			$result=array('success'=>'true','msg'=>"Data Submited Successfully.");
		}
		else
		{
			$result=array('success'=>'true','msg'=>"Incorrect Data Please Try Again.");
		}
		echo json_encode($result);	
	}

	public function kundli()
	{
		$userid = $this->input->post('userid');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$mobile = $this->input->post('mobile');
		$gender = $this->input->post('gender');
		$dob = $this->input->post('dob');
		$birthtime = $this->input->post('birthtime');
		$birthplace = $this->input->post('birthplace');
		
		if(!empty($userid)){ $Insertdata['user_id'] = $userid; }
		if(!empty($name)){ $Insertdata['fkun_name'] = $name; }
		if(!empty($email)){ $Insertdata['fkun_email'] = $email; }
		if(!empty($mobile)){ $Insertdata['fkun_mobile'] = $mobile; }
		if(!empty($gender)){ $Insertdata['fkun_gender'] = $gender; }
		if(!empty($dob)){ $Insertdata['fkun_dob'] = $dob; }
		if(!empty($birthtime)){ $Insertdata['fkun_birth_time'] = $birthtime; }
		if(!empty($birthplace)){ $Insertdata['fkun_birth_place'] = $birthplace; }

		$res = addData('enquiry_freekundali',$Insertdata);
		if(!empty($res))
		{
			$result=array('success'=>'true','msg'=>"Data Submited Successfully.");
		}
		else
		{
			$result=array('success'=>'true','msg'=>"Incorrect Data Please Try Again.");
		}
		echo json_encode($result);	
	}

	// end of file
}
?>