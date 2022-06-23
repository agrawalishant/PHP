<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_controller extends CI_Controller

{

  public function __construct()
 {

        parent::__construct();
       $this->load->model('admin_model');
       // ob_flush();
       // $this->load->library('form_validation');

       //$this->load->helper('customhelper');
       $this->coupanstatuschange();

    }

 /************************************************ permisssion START ******************************/

public function permission_view($par1 = null, $par2 = null,$par3 = null)

{

  // if($par1=='delete')

  // {

  //  $this->admin_model->delete_subadmin($par2,$par3);

  // }

  if($par1=='update')

  {

    $id = $this->input->post('id');

    $checkboxdata = $this->input->post('check_list');
    if(!empty($checkboxdata))
    {
      $checked = implode(',',$checkboxdata);  
      //$data['per_description']=$this->input->post('per_description');
    }
    else
    {
      $checked = '';
    }
    $this->Generalmodel->updateData('permission',array('per_description' => $checked),array('admins_id' => $id));
  }

 $page_data['datadisplay']=$this->admin_model->permission_fetch();

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'permission';

 $page_data['page_title'] = 'permisssion View';

 $this->load->view('backend/index', $page_data);

}

// public function add_permission()

// {

//  // $data['name']=$this->input->post('name');

//  $this->admin_model->add_permission($data);

// }

/************************************************ permisssion END ******************************/

public function howtouse()
{
    $msg = $this->input->post('msg');
    $updateData['howtouse'] = $msg;
    $res = updateData('howtouse',$updateData,array('id'=>'1'));
    redirect(base_url().'admindashboard');
}

public function howtouse_view()
{
    $page_data['page_name'] = 'howtouse';
    $page_data['page_title'] = 'How To Use';
    $page_data['datadisplay']=$this->admin_model->fetchbyrow_where('howtouse','1');
    $this->load->view('backend/index', $page_data);
}
   

/************************************************ subadmin START ******************************/

public function subadmin_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_subadmin($par2,$par3);

  }

  // if($par1=='update')

  // {

  //   $data['title']=$this->input->post('title');

  // $data['short_description']=$this->input->post('short_description');

  // $data['long_description']=$this->input->post('long_description');

  //   $this->admin_model->update_subadmin($par2,$data);

  // }

 $page_data['datadisplay']=$this->admin_model->subadmin_fetch();

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'subadmin';

 $page_data['page_title'] = 'Subadmin View';

 $this->load->view('backend/index', $page_data);

}

public function add_subadmin()

{

  $data['name']=$this->input->post('name');

  $data['email']=$this->input->post('email');

  $data['mobile']=$this->input->post('mobile');

  $data['password']=sha1($this->input->post('password'));

  $data['level']="2";

  $this->admin_model->add_subadmin($data);

}

/************************************************  END ******************************/



/************************************************ forget password start*********/

 public function forgetpasswordpage()

    {
      $this->load->view('backend/forgetpassword');
    }



    public function email_forgetpassword()

    {

      $email = $this->input->post('email');      

      $findemail = $this->admin_model->ForgotPassword($email);  

     

      if($findemail){

       $this->admin_model->sendpassword($findemail);        

        }else{

       $this->session->set_flashdata('errormsg',' Email not found!');

       redirect(base_url().'forgetpassword_page','refresh');

   }

    }

/************************************************ forget password END ******************************/

/************************************************ DASHBOARD START******************************/

    public function dashboard()

    {

     $page_data['TotalBlog']=$this->admin_model->TotalBlog();
     $page_data['TotalProduct']=$this->admin_model->TotalProduct();
     $page_data['pending_comment']=$this->admin_model->pending_comment();
     $page_data['pending_order']=$this->admin_model->pending_order(); 
     $page_data['TotalNews']=$this->admin_model->TotalNews();

     $page_data['TotalFestival']=$this->admin_model->TotalFestival();

     $page_data['BlogMonthCount']=$this->admin_model->BlogMonthCount();
     $page_data['Pending_free_kundali_making']=$this->admin_model->Pending_free_kundali_making();
     $page_data['Pending_free_prediction']=$this->admin_model->Pending_free_prediction();
     $page_data['astrologerregisterthismonth']=$this->admin_model->astrologerregisterthismonth();
     $page_data['usersregisterthismonth']=$this->admin_model->usersregisterthismonth();
     $page_data['astrologerapppending']=$this->admin_model->astrologer_app_pending();
     $page_data['totalastrologer']=$this->admin_model->astrologer_approved();

     $page_data['page_name'] = 'dashboard';
     $page_data['page_title'] = 'Dashboard';
     $this->load->view('backend/index', $page_data);

    }

/************************************************ DASHBOARD END ******************************/

/************************************************ PROFILE START ******************************/

  

       public function profile($par1 = null, $par2 = null)

       {

        $id = $this->session->userdata('adminid');

       

        if($par1=='update')

         {

          $data['name']=$this->input->post('name');

          $data['email']=$this->input->post('email');

          $data['mobile']=$this->input->post('mobile');

          $this->admin_model->updateprofileinformation($data,$id);

         }

         if($par1=='password')

         {

          $this->form_validation->set_rules('old_pass', 'old password', 'required');

          $this->form_validation->set_rules('new_pass', 'new password', 'required');

          $this->form_validation->set_rules('confirm_pass', 'confirm password', 'required|matches[new_pass]');

          if($this->form_validation->run() == True) 

          {

              $old_pass=sha1($this->input->post('old_pass'));

              $new_pass=sha1($this->input->post('new_pass'));

              $this->admin_model->checkOldPass($old_pass,$new_pass,$id);

               //redirect(base_url() . 'profile', 'refresh');

          }

         

         }

        

       // $page_data['datadisplay']=$this->admin_model->fetchbyrow('admin');

       $page_data['datadisplay']=$this->admin_model->fetchbyrow_where('admin',$id);

        $page_data['page_name'] = 'profile';

        $page_data['page_title'] = 'profile';

        $this->load->view('backend/index', $page_data);

       }

 /************************************************ PROFILE END ******************************/
/************************************************ kundali charge START ******************************/

  

public function kundalicharges($par1 = null, $par2 = null)
{
 if($par1=='update')
  {
   $data['charges']=$this->input->post('charges');
  $this->admin_model->common_update('kundalicharges','id',1,'kundalicharges_view',$data);
 }
 $page_data['datadisplay']=$this->admin_model->fetchbyrow_where('kundalicharges',1);
 $page_data['page_name'] = 'kundali_charges';
 $page_data['page_title'] = 'kundali_charges';
 $this->load->view('backend/index', $page_data);
}

/************************************************ kundali charge END ******************************/

   

     /************************************************ WEBSITE INFORMATION START ******************************/

    public function websiteinformation($par1 = null, $par2 = null)

    {

      if($par1=='update')

      {

       $data['website_name']=$this->input->post('website_name');

       $data['title']=$this->input->post('title');

       $data['matter']=$this->input->post('matter');

       $data['about']=$this->input->post('about');

       $data['phone']=$this->input->post('phone');

       $data['email']=$this->input->post('email');

       $data['address']=$this->input->post('address');

       $data['latitude']=$this->input->post('latitude');

       $data['longitude']=$this->input->post('longitude');

       $data['facebook_link']=$this->input->post('facebook_link');

       $data['google_link']=$this->input->post('google_link');

       $data['yahoo_link']=$this->input->post('yahoo_link');

       $data['twitter_link']=$this->input->post('twitter_link');

       $data['tollfreenumber']=$this->input->post('tollfreenumber');

       $data['copyright']=$this->input->post('copyright');
       $data['tollfreenumber']=$this->input->post('tollfreenumber');

       $this->admin_model->update_websiteinformation($data);

      

      }

     $page_data['datadisplay']=$this->admin_model->fetchbyrow('websiteinformation');

     $page_data['page_name'] = 'websiteinformation';

     $page_data['page_title'] = 'Website Information';

     $this->load->view('backend/index', $page_data);

    }

/************************************************ WEBSITE INFORMATION END ******************************/



/************************************************ BLOG START ******************************/

public function blog_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_blog($par2,$par3);

  }

  if($par1=='update')

  {
    $string = str_replace(' ','',$this->input->post('blogseo_url'));
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    $data['blogseo_url']=$string;
    
    $data['title']=$this->input->post('title');

  $data['short_description']=$this->input->post('short_description');

  $data['long_description']=$this->input->post('long_description');

    $this->admin_model->update_blog($par2,$data);

  }

 $page_data['datadisplay_blog']=$this->admin_model->blog_fetch();

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'blog';

 $page_data['page_title'] = 'Blog View';

 $this->load->view('backend/index', $page_data);

}

public function add_blog()

{
  $string = str_replace(' ','',$this->input->post('blogseo_url'));
  $string = str_replace(array('[\', \']'), '', $string);
  $string = preg_replace('/\[.*\]/U', '', $string);
  $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
  $string = htmlentities($string, ENT_COMPAT, 'utf-8');
  $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
  $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
  $data['blogseo_url']=$string;

  $data['title']=$this->input->post('title');

  $data['short_description']=$this->input->post('short_description');

  $data['long_description']=$this->input->post('long_description');

  $data['published_by']=$this->input->post('published_by');



  $this->admin_model->add_blog($data);

}

/************************************************ BLOG END ******************************/
// **********************************Interested LIST *************************************
public function interested_user($par1 = null, $par2 = null)

{
  

 //$page_data['datadisplay']=$this->admin_model->fetchbyresult('user');
 $page_data['datadisplay']=$this->admin_model->fetchbyresultorderby('mobilenumber','id','desc');
//$page_data['datadisplay2']=$this->admin_model->fetchbyresult('user');
 $page_data['page_name'] = 'interested_users';

 $page_data['page_title'] = 'interested Userlist';

 $this->load->view('backend/index', $page_data);

}

// *********************************Interested USER LIST END ********************************

// **********************************USER LIST *************************************
public function userlist_view($par1 = null, $par2 = null)

{
  if($par1=='delete')
  {
    // $data['delete_status']=1;
    // $this->admin_model->common_update('user','user_id',$par2,'userlist_view',$data);
    $this->admin_model->common_delete('user','user_id',$par2,'userlist_view');//delete_userlist($par2);
  }
  if($par1=='active')
  {
    $data['delete_status']=0;
    $this->admin_model->common_update('user','user_id',$par2,'userlist_view',$data);
  
  }
  if($par1=='inactive')
  {
    $data['delete_status']=1;
    $this->admin_model->common_update('user','user_id',$par2,'userlist_view',$data);
  
  }
//   if($par1=='update')

//   {

//     $data['title']=$this->input->post('title');

//   $data['description']=$this->input->post('description');

//   $data['date']=$this->input->post('date');

//   $this->admin_model->update_festival($par2,$data);

//   }

 //$page_data['datadisplay']=$this->admin_model->fetchbyresult('user');
 $page_data['datadisplay']=$this->admin_model->fetchbyresultorderby('user','user_id','desc');
 $page_data['page_name'] = 'userlist';

 $page_data['page_title'] = 'Userlist View';

 $this->load->view('backend/index', $page_data);

}

// *********************************USER LIST END ********************************

/************************************************ FESTIVAL START ******************************/

public function festival_view($par1 = null, $par2 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_festival($par2);

  }

  if($par1=='update')

  {

    $data['title']=$this->input->post('title');

  $data['description']=$this->input->post('description');

  $data['date']=$this->input->post('date');

   $this->admin_model->update_festival($par2,$data);

  }

 $page_data['datadisplay']=$this->admin_model->fetchbyresult('festival');

 $page_data['page_name'] = 'festival';

 $page_data['page_title'] = 'Festival View';

 $this->load->view('backend/index', $page_data);

}

public function add_festival()

{

  $data['title']=$this->input->post('title');

  $data['description']=$this->input->post('description');

  $data['date']=$this->input->post('date');

  $this->admin_model->add_festival($data);

}

/************************************************ FESTIVAL END ******************************/



/************************************************ SERVICE START ******************************/

public function service_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_service($par2,$par3);

  }

  if($par1=='update')

  {
    $string = str_replace(' ','',$this->input->post('title'));
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    $data['url_title']=$string;
    $data['title']=$this->input->post('title');

  $data['name']=$this->input->post('name');

  $data['description']=$this->input->post('description');

  

    $this->admin_model->update_service($par2,$data);

  }

 $page_data['datadisplay']=$this->admin_model->fetchbyresult('services');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'services';

 $page_data['page_title'] = 'Services View';

 $this->load->view('backend/index', $page_data);

}

public function add_service()

{
  $string = str_replace(' ','',$this->input->post('title'));
  $string = str_replace(array('[\', \']'), '', $string);
  $string = preg_replace('/\[.*\]/U', '', $string);
  $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
  $string = htmlentities($string, ENT_COMPAT, 'utf-8');
  $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
  $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
  $data['url_title']=$string;
  $data['title']=$this->input->post('title');

  $data['name']=$this->input->post('name');

  $data['description']=$this->input->post('description');



  $this->admin_model->add_service($data);

}

/************************************************ SERVICE END ******************************/

/************************************************ NEWS START  ******************************/

public function news_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_news($par2,$par3);

  }

  if($par1=='update')

  {

    $data['title']=$this->input->post('title');

  

  $data['description']=$this->input->post('description');

  

    $this->admin_model->update_news($par2,$data);

  }

 $page_data['datadisplay']=$this->admin_model->fetchbyresult('news');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'news';

 $page_data['page_title'] = 'News View';

 $this->load->view('backend/index', $page_data);

}

public function add_news()

{

  $data['title']=$this->input->post('title');

  

  $data['description']=$this->input->post('description');



  $this->admin_model->add_news($data);

}

/************************************************ NEWS END ******************************/



/************************************************ TESTIMONIAL START ******************************/

public function testimonial_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_testimonial($par2,$par3);

  }

  if($par1=='update')

  {

  $data['name']=$this->input->post('name');

  $data['description']=$this->input->post('description');

  $data['location']=$this->input->post('location');

  

    $this->admin_model->update_testimonial($par2,$data);

  }

 $page_data['datadisplay']=$this->admin_model->fetchbyresult('testimonial');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'testimonial';

 $page_data['page_title'] = 'Testimonial View';

 $this->load->view('backend/index', $page_data);

}

public function add_testimonial()

{

  $data['name']=$this->input->post('name');

  $data['description']=$this->input->post('description');

  $data['location']=$this->input->post('location');

  $this->admin_model->add_testimonial($data);

}

/************************************************ TESTIMONIAL END ******************************/

/************************************************ FAQ START ******************************/

public function faq_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_faq($par2);

  }

  if($par1=='update')

  {

    $data['question']=$this->input->post('question');

    $data['answer']=$this->input->post('answer');

    

    $this->admin_model->update_faq($par2,$data);

  }

 $page_data['datadisplay']=$this->admin_model->fetchbyresult('faq');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'faq';

 $page_data['page_title'] = 'FAQ VIEW';

 $this->load->view('backend/index', $page_data);

}

public function add_faq()

{

  $data['question']=$this->input->post('question');

  $data['answer']=$this->input->post('answer');

  

  $this->admin_model->add_faq($data);

}

/************************************************ FAQ END ******************************/

/************************************************ HOROSCOPE YEARLY START******************************/

public function horoscopeyearly_view($par1 = null, $par2 = null,$par3 = null)

{

  

  if($par1=='update')

  {

    $data['name']=$this->input->post('name');

    $data['profession']=$this->input->post('profession');

    $data['luck']=$this->input->post('luck');

    $data['emotion']=$this->input->post('emotion');

    $data['health']=$this->input->post('health');

    $data['love']=$this->input->post('love');

    $data['travel']=$this->input->post('travel');

    $data['description']=$this->input->post('description');

    $data['lucky_colour']=$this->input->post('lucky_colour');

    $data['lucky_number']=$this->input->post('lucky_number');

    $data['lucky_flower']=$this->input->post('lucky_flower');

    $data['yearofbirth']=$this->input->post('yearofbirth');
$data['datefirst']=$this->input->post('datefirst');
$data['datesecond']=$this->input->post('datesecond');
    //$data['daterange']=$this->input->post('daterange');
    // $userfile=$this->input->post('userfile');
    // if(!empty($userfile))
    // {
    //   $data['main_image'] = $userfile;
    //   $location = echo base_url()"assets";
    //   $imname = $userfile.".png";
    //   move_uploaded_file($imname,$location);
    // }

   $this->admin_model->update_horoscopeyearly($par2,$data);

  }

 $page_data['datadisplay']=$this->admin_model->fetchbyresult('horoscopeyearly');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'horoscopeyearly';

 $page_data['page_title'] = 'Horoscope Yearly ';

 $this->load->view('backend/index', $page_data);

}

/************************************************ HOROSCOPE YEARLY  ******************************/

/************************************************ CONTENT MANAGEMNT START******************************/

public function contentmgt_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_contentmgt($par2);

  }

  if($par1=='update')

  {

    $data['title']=$this->input->post('title');

    $data['description']=$this->input->post('description');

    

    $this->admin_model->update_contentmgt($par2,$data);

  }

 $page_data['datadisplay']=$this->admin_model->fetchbyresult('contentmanagement');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'contentmanagement';

 $page_data['page_title'] = 'Contentmanagement View';

 $this->load->view('backend/index', $page_data);

}

public function add_contentmgt()

{

  $data['title']=$this->input->post('title');

  $data['description']=$this->input->post('description');

  

  $this->admin_model->add_contentmgt($data);

}

/************************************************ CONTENT MANAGEMENT END ******************************/

/************************************************ PRODUCT CATEGORY START ******************************/

public function product_category_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_product_category($par2);

  }

  if($par1=='update')

  {

    $data['cat_pro_title']=$this->input->post('cat_pro_title');

   

    $this->admin_model->update_product_category($par2,$data);

  }

  $page_data['datadisplay']=$this->admin_model->fetchbyresult('category_product');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'category_product';

 $page_data['page_title'] = 'Category Product ';

 $this->load->view('backend/index', $page_data);

}

public function add_product_category()

{

  $data['cat_pro_title']=$this->input->post('cat_pro_title');

  

  $this->admin_model->add_product_category($data);

}

/************************************************ PRODUCT CATEGORY END ******************************/

/************************************************ CATEGORY ASTROLOGER START******************************/

public function category_astrologer_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->common_delete('category_astrologer','cat_astr_id',$par2,'category_astrologer_view');//($tablename,$dbtableid,$par2db_id,$redirectto)

  }

  if($par1=='update')

  {

    $data['cat_astr_title']=$this->input->post('cat_astr_title');

   

    $this->admin_model->common_update('category_astrologer','cat_astr_id',$par2,'category_astrologer_view',$data); //($tablename,$databaseid,$par2db_id,$redirectto,$data);

  }

  $page_data['datadisplay']=$this->admin_model->fetchbyresult('category_astrologer');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'category_astrologer';

 $page_data['page_title'] = 'Category Astrologer ';

 $this->load->view('backend/index', $page_data);

}

public function add_category_astrologer()

{

  $data['cat_astr_title']=$this->input->post('cat_astr_title');

  $this->admin_model->common_add('category_astrologer','category_astrologer_view',$data);//common_add($tablename,$redirectto,$data)

}

/************************************************ CATEGORY ASTROLOGER END  ******************************/

/************************************************ PRODUCT START ******************************/

public function product_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_product($par2,$par3);

  }

  if($par1=='update')

  {

// for seo url start
$string = str_replace(' ','',$this->input->post('pr_title'));
  $string = str_replace(array('[\', \']'), '', $string);
  $string = preg_replace('/\[.*\]/U', '', $string);
  $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
  $string = htmlentities($string, ENT_COMPAT, 'utf-8');
  $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
  $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
  $data['pr_url_title']=$string;
// for seo url end

    $tit = $this->input->post('pr_title');
    $abc = str_replace('(','- ',$tit);
    $fin_tit = str_replace(')','',$abc);
    $data['pr_title']=$fin_tit;
    //print_r($data);exit;
     $data['pr_description']=$this->input->post('pr_description');

     // $data['pr_category']=$this->input->post('pr_category');
      if(!empty($this->input->post('pr_category')))
      {
      $data['pr_category']=$this->input->post('pr_category');
      }
      if(!empty($this->input->post('pr_originalprice')))
      {
      $data['pr_originalprice']=$this->input->post('pr_originalprice');
      }
      if(!empty($this->input->post('pr_discount')))
      {
      $data['pr_discount']=$this->input->post('pr_discount');
      }
      if(!empty($this->input->post('pr_pricedetail')))
      {
      $data['pr_pricedetail']=$this->input->post('pr_pricedetail');
      }
 

  if(!empty($this->input->post('pr_discount')))
  {
    $perc=$this->input->post('pr_discount');

    $oriprice=$this->input->post('pr_originalprice');

    $discprice = ($perc / 100) * $oriprice;

    $new_finalprice=$oriprice-$discprice;

    $data['pr_finalprice']=$new_finalprice;

  }

  else{
    if(!empty($this->input->post('pr_originalprice'))){
    $data['pr_finalprice']=$this->input->post('pr_originalprice');
       }
  }

  

    $this->admin_model->update_product($par2,$data);

  }

 $page_data['datadisplay']=$this->admin_model->product_fetch();

 $page_data['categ']=$this->admin_model->fetchbyresult('category_product');



 $page_data['page_name'] = 'product';

 $page_data['page_title'] = 'Product ';

 $this->load->view('backend/index', $page_data);

}

public function add_product()

{

// for seo url start
$string = str_replace(' ','',$this->input->post('pr_title'));
  $string = str_replace(array('[\', \']'), '', $string);
  $string = preg_replace('/\[.*\]/U', '', $string);
  $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
  $string = htmlentities($string, ENT_COMPAT, 'utf-8');
  $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
  $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
  $data['pr_url_title']=$string;
// for seo url end

  $tit = $this->input->post('pr_title');
  $abc = str_replace('(','- ',$tit);
  $fin_tit = str_replace(')','',$abc);
  $data['pr_title']=preg_replace('/[^A-Za-z0-9 ]/', '', $tit);
  //$data['pr_title']=$this->input->post('pr_title');

  $data['pr_description']=$this->input->post('pr_description');

  $data['pr_category']=$this->input->post('pr_category');

  //$data['pr_originalprice']=$this->input->post('pr_originalprice');

 // $data['pr_discount']=$this->input->post('pr_discount');
 if(!empty($this->input->post('pr_originalprice')))
 {
 $data['pr_originalprice']=$this->input->post('pr_originalprice');
 }
 if(!empty($this->input->post('pr_discount')))
 {
 $data['pr_discount']=$this->input->post('pr_discount');
 }
 if(!empty($this->input->post('pr_pricedetail')))
 {
 $data['pr_pricedetail']=$this->input->post('pr_pricedetail');
 }
 

  if(!empty($this->input->post('pr_discount')))

  {

    $perc=$this->input->post('pr_discount');

    $oriprice=$this->input->post('pr_originalprice');

    $discprice = ($perc / 100) * $oriprice;

    $new_finalprice=$oriprice-$discprice;

    $data['pr_finalprice']=$new_finalprice;

  }

  else{
    if(!empty($this->input->post('pr_originalprice')))
    {
    $data['pr_finalprice']=$this->input->post('pr_originalprice');
    }
  }

  $this->admin_model->add_product($data);

}

/************************************************ PRODUCT END ******************************/
/************************************************ SUB PRODUCT START ******************************/

public function sub_product_view($par1 = null, $par2 = null,$par3 = null)

{
 if($par1=='delete')
 {
  $this->admin_model->common_delete('product_subproduct','sp_id',$par2,'sub_product_view');//delete_product($par2,$par3);
 }
 if($par1=='update')

 {
  $data['sp_weight_carat']=$this->input->post('sp_weight_carat');
  $this->admin_model->common_update('product_subproduct','sp_id',$par2,'sub_product_view',$data);
 }

 $page_data['datadisplay']=$this->admin_model->sub_product_fetch();
 $page_data['product1']=fetchbyresult('product');
$page_data['page_name'] = 'sub_product';
$page_data['page_title'] = 'Sub Product ';
$this->load->view('backend/index', $page_data);
}

public function sub_add_product()
{
$sp_product_id=$this->input->post('sp_product_id');
$data['sp_weight_carat']=$this->input->post('sp_weight_carat');
$ar=$this->input->post('sp_weight_carat');
// print_r(count($ar));exit;
for($i=0;$i<count($ar);$i++)
{
 insertdata('product_subproduct',array('sp_product_id' => $sp_product_id,'sp_weight_carat' => $ar[$i]));
}
redirect(base_url().'sub_product_view','refresh');
//$data['sp_price']=$this->input->post('sp_price');
//$this->admin_model->sub_add_product($data);

}

/************************************************ SUB PRODUCT END ******************************/


/************************************************ Astrologers START ******************************/

public function astrologers_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='active')

  {
    $check = fetchbyresultByCondiction('astrologers',array('astro_id'=>$par2,'astro_verification_status'=>1));
    if(!empty($check))
    {
         //  19/02/2021 start
      $senddetails=fetchbyresultwhere('astrologers',array('astro_id'=>$par2));
      $name=$senddetails[0]['astro_name'];
      $mobile=$senddetails[0]['astro_mobile'];
      $email=$senddetails[0]['astro_email'];
      $password=$senddetails[0]['astro_pass'];
      $msg="Dear  ". $name .",  Your profile is verified By Compliance Department. Please Login with mentioned URL & credential. Login URL:-  https://testpnp.ml/astro/astrologer_login_page"." Username/Email :-  ".$email."  ,Password :-  ".$password." Thank You, www.astrovedvakta.com";
      send_sms_new($mobile,$msg);
       //  19/02/2021 end
      $this->admin_model->active_astrologers($par2);  
      
    }
    else
    {
      $this->session->set_flashdata('error','Astrologer Mobile is not varified');
    }

  }

  if($par1=='inactive')

  {

   $this->admin_model->inactive_astrologers($par2);

  }

  if($par1=='delete')

  {

   $this->admin_model->delete_astrologers($par2);

  }

  if($par1=='update')

  {
//   for seo url start 04 may-2021
	 $string = str_replace(' ','',$this->input->post('astro_name'));
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    $data['url_name']=$string;
	   //   for seo url end 04 may-2021
  $data['astro_name']=$this->input->post('astro_name');
  $data['astro_ranking']=$this->input->post('astro_ranking');
  $data['astro_language']=$this->input->post('astro_language');

  $data['astro_description']=$this->input->post('astro_description');

  $data['astro_experience']=$this->input->post('astro_experience');

  $data['astro_calling_rate']=$this->input->post('astro_calling_rate');

  $data['astro_chat_rate']=$this->input->post('astro_chat_rate');

  $data['astro_askreport_rate']=$this->input->post('astro_askreport_rate');

  $data['percentage_deduction_chat']=$this->input->post('percentage_deduction_chat');
  $data['percentage_deduction_call']=$this->input->post('percentage_deduction_call');
  $data['percentage_deduction_report']=$this->input->post('percentage_deduction_report');

$data['astro_calling_rate_discount']=$this->input->post('astro_calling_rate_discount');
  $data['astro_chat_rate_discount']=$this->input->post('astro_chat_rate_discount');
  $data['astro_report_rate_discount']=$this->input->post('astro_report_rate_discount');

  $data['astro_mobile']=$this->input->post('astro_mobile');
  $data['astro_email']=$this->input->post('astro_email');
  $data2['astrologer_cat_id']=$this->input->post('astrologer_cat_id');

  $this->admin_model->update_astrologers($par2,$data,$data2);

  }

 $page_data['datadisplay']=$this->admin_model->astrologers_fetch();

 $page_data['categ']=$this->admin_model->fetchbyresult('category_astrologer');

 



 $page_data['page_name'] = 'astrologers';

 $page_data['page_title'] = 'Astrologers';

 $this->load->view('backend/index', $page_data);

}

public function add_astrologers()

{

 //   for seo url start 04 may-2021
	 $string = str_replace(' ','',$this->input->post('astro_name'));
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    $data['url_name']=$string;
	   //   for seo url end 04 may-2021
  $data['astro_name']=$this->input->post('astro_name');

  $data['astro_language']=$this->input->post('astro_language');

  $data['astro_description']=$this->input->post('astro_description');



  $data['astro_experience']=$this->input->post('astro_experience');



  $data['astro_calling_rate']=$this->input->post('astro_calling_rate');

  $data['astro_chat_rate']=$this->input->post('astro_chat_rate');

  $data['astro_askreport_rate']=$this->input->post('astro_askreport_rate');

  $data['astro_email']=$this->input->post('astro_email');
  $data['astro_password']=sha1($this->input->post('astro_password'));
  $data['astro_mobile']=$this->input->post('astro_mobile');

  $data2['astrologer_cat_id']=$this->input->post('astrologer_cat_id');

  // $service_name = implode(',',$_POST['service_name']);

  // echo $service_name;

  $this->admin_model->add_astrologers($data,$data2);

}

/************************************************ Astrologers END ******************************/

/************************************************ MATCH MAKING BANNER START ******************************/

// public function mmbanner_view($par1 = null, $par2 = null,$par3 = null)

// {

//   if($par1=='update')

//   {

//   $this->admin_model->update_matchmaking_banner($par2);

//   }

//  $page_data['datadisplay']=$this->admin_model->fetchbyrow('mmbanner');

//  //$page_data['categ']=$this->admin_model->fetchbyresult('category_astrologer');

 



//  $page_data['page_name'] = 'mmbanner';

//  $page_data['page_title'] = 'Match Making Banner ';

//  $this->load->view('backend/index', $page_data);

// }

public function mmbanner_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_mmbanner($par2,$par3);

  }

  if($par1=='update')

  {

    $data['mmb_title']=$this->input->post('mmb_title');

     $this->admin_model->update_mmbanner($par2,$data);

  }

  $page_data['datadisplay']=$this->admin_model->fetchbyresult('mmbanner');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'mmbanner';

 $page_data['page_title'] = 'Match Making Banner';

 $this->load->view('backend/index', $page_data);

}

public function add_mmbanner()

{

  $data['mmb_title']=$this->input->post('mmb_title');

  $this->admin_model->add_mmbanner($data);

}

/************************************************ MM BANNER END ******************************/

/************************************************ ASTROLOGERS  ADMIN TEAM START ******************************/

public function aateam_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='active')

  {

   $this->admin_model->active_aateam($par2);

  }

  if($par1=='inactive')

  {

   $this->admin_model->inactive_aateam($par2);

  }

  if($par1=='delete')

  {

   $this->admin_model->delete_aateam($par2,$par3);

  }

  if($par1=='update')

  {

  $data['team_name']=$this->input->post('team_name');

  $data['team_post']=$this->input->post('team_post');

 

  $this->admin_model->update_aateam($par2,$data);

  }

 $page_data['datadisplay']=$this->admin_model->fetchbyresult('astro_admin_team');

 //$page_data['categ']=$this->admin_model->fetchbyresult('category_astrologer');

 



 $page_data['page_name'] = 'aateam';

 $page_data['page_title'] = 'Astrologers Admin team';

 $this->load->view('backend/index', $page_data);

}

public function add_aateam()

{

  $data['team_name']=$this->input->post('team_name');

  $data['team_post']=$this->input->post('team_post');



  $this->admin_model->add_aateam($data);

}

/************************************************ ASTROLOGERS  ADMIN TEAM  END ******************************/

/************************************************ LANGUAGE START******************************/

public function language_astrologer_view($par1 = null, $par2 = null,$par3 = null)

{

  // if($par1=='delete')

  // {

  //  $this->admin_model->common_delete('language_astrologer','la_id',$par2,'language_astrologer_view');//($tablename,$dbtableid,$par2db_id,$redirectto)

  // }

  if($par1=='update')

  {

    $data['la_title']=$this->input->post('la_title');

   

    $this->admin_model->common_update('language_astrologer','la_id',$par2,'language_astrologer_view',$data); //($tablename,$databaseid,$par2db_id,$redirectto,$data);

  }

  $page_data['datadisplay']=$this->admin_model->fetchbyresult('language_astrologer');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'language_astrologer';

 $page_data['page_title'] = 'Language Astrologer ';

 $this->load->view('backend/index', $page_data);

}

public function add_language_astrologer()

{

  $data['la_title']=$this->input->post('la_title');

  $this->admin_model->common_add('language_astrologer','language_astrologer_view',$data);//common_add($tablename,$redirectto,$data)

}

/************************************************ LANGUAGE  END  ******************************/



/************************************************ ENQUIRY START ******************************/

public function enquiry_view($par1 = null, $par2 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_enquiry($par2);

  }

 

 //$page_data['datadisplay']=$this->admin_model->fetchbyresult('enquiry');

 $page_data['page_name'] = 'enquiry';

 $page_data['page_title'] = 'Enquiry View';

 $this->load->view('backend/index', $page_data);

}



/************************************************ ENQUIRY END ******************************/

/************************************************ advertisement START  ******************************/

public function advertisement_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_advertisement($par2,$par3);

  }

  if($par1=='update')

  {

    $data['advt_title']=$this->input->post('advt_title');

  

  $data['advt_href']=$this->input->post('advt_href');

  

    $this->admin_model->update_advertisement($par2,$data);

  }//($databasename,$by,$ascdesc)

  $page_data['datadisplay']=$this->admin_model->fetchbyresultorderby('advertisement','advt_id','desc');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'advertisement';

 $page_data['page_title'] = 'Advertisement View';

 $this->load->view('backend/index', $page_data);

}

public function add_advertisement()

{

  $data['advt_title']=$this->input->post('advt_title');

  $data['advt_href']=$this->input->post('advt_href');

 $this->admin_model->add_advertisement($data);

}

/************************************************ advt END ******************************/



/************************************************ ENQUIRY FREE KUNDALISTART ******************************/

public function enquiryfreekundali_view($par1 = null, $par2 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->common_delete('enquiry_freekundali','fkun_id',$par2,'enquiryfreekundali_view');

  }

  if($par1=='active')

  {

   $this->admin_model->active_FREEKUNDALI($par2);

  }

  if($par1=='inactive')

  {

   $this->admin_model->inactive_FREEKUNDALI($par2);

  }

 $page_data['datadisplay']=$this->admin_model->fetchbyresultorderby('enquiry_freekundali','fkun_id','desc');

 $page_data['page_name'] = 'enquiryfreekundali';

 $page_data['page_title'] = 'Enquiry Free Kundali View';

 $this->load->view('backend/index', $page_data);

}



/************************************************ ENQUIRY FREE KUNDALI END ******************************/



/************************************************ notification START ******************************/

public function notification_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->common_delete('notification','nfc_id',$par2,'notification_view');

  }

  if($par1=='update')

  {

    $data['nfc_title']=$this->input->post('nfc_title');

    $data['nfc_detail']=$this->input->post('nfc_detail');

    $this->admin_model->common_update('notification','nfc_id',$par2,'notification_view',$data);

  }

 $page_data['datadisplay']=$this->admin_model->fetchbyresultorderby('notification','nfc_id','desc');

 $page_data['page_name'] = 'notification';

 $page_data['page_title'] = 'Notification View';

 $this->load->view('backend/index', $page_data);

}

public function add_notification()

{

  $data['nfc_title']=$this->input->post('nfc_title');

  $data['nfc_detail']=$this->input->post('nfc_detail');

  $this->admin_model->common_add('notification','notification_view',$data);

}

/************************************************ notification END ******************************/

/************************************************ onlinepujadetailSTART ******************************/

public function onlinepujadetail_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_onlinepujadetail($par2,$par3);

  }

  if($par1=='update')

  {

    $data['op_title']=$this->input->post('op_title');

    $data['op_description']=$this->input->post('op_description');
  


    $this->admin_model->update_onlinepujadetail($par2,$data);

  }

 //$page_data['datadisplay']=$this->admin_model->product_fetch();

//  $page_data['categ']=$this->admin_model->fetchbyresult('category_product');



 $page_data['page_name'] = 'onlinepujadetail';

 $page_data['page_title'] = 'onlinepujadetail ';

 $this->load->view('backend/index', $page_data);

}

public function add_onlinepujadetail()

{

  $data['op_title']=$this->input->post('op_title');

  $data['op_description']=$this->input->post('op_description');


  $this->admin_model->add_onlinepujadetail($data);

}

/************************************************ onlinepujadetail END ******************************/


/************************************************blog commentappdisapp START ******************************/

public function commentsapproval_view($par1 = null, $par2 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->common_delete('blogcomment','comment_id',$par2,'commentappdisapp_view');

  }

  if($par1=='active')

  {

   $this->admin_model->active_blogcomments($par2);

  }

  if($par1=='inactive')

  {

   $this->admin_model->inactive_blogcomments($par2);

  }

 $page_data['datadisplay']=$this->admin_model->blogcommentfetch_join();

 $page_data['page_name'] = 'commentsappdisapp';

 $page_data['page_title'] = 'Comments ';

 $this->load->view('backend/index', $page_data);

}

/************************************************blog commentappdisapp END ******************************/

/************************************************ prediction enq START ******************************/

public function enquiryfreeprediction_view($par1 = null, $par2 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->common_delete('prediction','p_id',$par2,'enquiryfreeprediction_view');

  }

  if($par1=='active')

  {

   $this->admin_model->active_FREEpre($par2);

  }

  if($par1=='inactive')

  {

   $this->admin_model->inactive_FREEpre($par2);

  }

 $page_data['datadisplay']=$this->admin_model->fetchbyresultorderby('prediction','p_id','desc');

 $page_data['page_name'] = 'enquiryfreeprediction';

 $page_data['page_title'] = 'Enquiry Free Predication View';

 $this->load->view('backend/index', $page_data);

}



/************************************************ prediction enq END ******************************/
/************************************************ prediction data entry START******************************/

public function predictiondataentry_view($par1 = null, $par2 = null,$par3 = null)

{

   if($par1=='update')

  {

    $data['pm_title']=$this->input->post('pm_title');

    $data['pm_description']=$this->input->post('pm_description');

  
   $this->admin_model->update_predictiondataentry($par2,$data);

  }

 $page_data['datadisplay']=$this->admin_model->fetchbyresult('predectionmatter');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');



 $page_data['page_name'] = 'predictiondataentry';

 $page_data['page_title'] = 'Prediction Data Entry ';

 $this->load->view('backend/index', $page_data);

}

/************************************************ prediction data entry   ******************************/

/************************************************ Transactions START ******************************/
public function transaction_view($par1 = null, $par2 = null)
{
 $page_data['page_name'] = 'transaction';
 $page_data['page_title'] = 'Transactions View';
 $this->load->view('backend/index', $page_data);
}
/************************************************ Transactions  ******************************/

/************************************************ Report START ******************************/
public function report_view($par1 = null, $par2 = null)
{
 $page_data['page_name'] = 'report';
 $page_data['page_title'] = 'Report';
 $this->load->view('backend/index', $page_data);
}
/************************************************ Report End ******************************/

/************************************************ reportgeneration history admin panel start START ******************************/

public function reportgen_user_history_adminpanel_view($par1 = null, $par2 = null,$par3 = null)

{
  if($par1=='active')

  {

   $this->admin_model->active_report_user($par2);

  }

  if($par1=='inactive')

  {

   $this->admin_model->inactive_report_user($par2);

  }
  if($par1=='payreport')

  {

  $this->admin_model->pay_to_astrologer($par1,$par2,$par3);

  }

// $page_data['datadisplay']=$this->admin_model->fetchbyresultorderby('reportsendtoastro','rp_id','desc');

 $page_data['page_name'] = 'reportgeneration_user_history';

 $page_data['page_title'] = 'Report Generation(USER TO ASTROLOGER)';

 $this->load->view('backend/index', $page_data);

}

/************************************************ reportgeneration history admin panel start END ******************************/
/************************************************ Transactions START ******************************/
public function admin_transaction_view($par1 = null, $par2 = null)
{
 $page_data['page_name'] = 'tranjection_history_admin';
 $page_data['page_title'] = 'Transactions View';
 $this->load->view('backend/index', $page_data);
}
/************************************************ Transactions  ******************************/
/************************************************ amount request by astrologer START ******************************/
// credit to astrologer account
public function amtrequestlist($par1 = null, $par2 = null, $par3 = null,$par4=null)
{
if($par1=='credit')
{
  $data['ara_detail_payment']=$this->input->post('ara_detail_payment');
  $this->admin_model->credit_to_astrologer($par2,$par3,$par4,$data);

}
 $page_data['page_name'] = 'amt_requestby_astrologer';
 $page_data['page_title'] = 'AMOUNT REQUEST';
 $this->load->view('backend/index', $page_data);
}
/************************************************ amount request by astrologe  ******************************/
/************************************************ coupan START ******************************/

public function coupan_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->delete_faq($par2);

  }

  if($par1=='update')

  {

   $data['cpn_name']=$this->input->post('cpn_name');
  $data['cpn_code']=$this->input->post('cpn_code');
  $data['cpn_amount']=$this->input->post('cpn_amount');
  $data['cpn_startdate']=$this->input->post('cpn_startdate');
  $data['cpn_enddate']=$this->input->post('cpn_enddate');
  $data['cpn_disc_min_amound']=$this->input->post('cpn_disc_min_amound');
  $data['cpn_description']=$this->input->post('cpn_description');
  $dttaken = date('d-m-Y',strtotime($data['cpn_startdate']));
  $todaydate = date('d-m-Y');
// if($dttaken > $todaydate)
// {
//   $data['cpn_status']=2;
// }
// elseif($dttaken = $todaydate)
// {
//   $data['cpn_status']=1;
// }
  $this->admin_model->common_update('coupan','cpn_id',$par2,'coupan_view',$data);

  }

 //$page_data['datadisplay']=$this->admin_model->fetchbyresult('coupan');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');
$page_data['datadisplay']=fetchbywhereorder2('coupan','','desc','cpn_status','desc','cpn_id');
$page_data['page_name'] = 'coupan';
$page_data['page_title'] = 'COUPAN VIEW';
$this->load->view('backend/index', $page_data);

}

public function call_coupan($par1 = null, $par2 = null,$par3 = null)  // Calling Coupon

{
  if($par1=='delete')

  {

   $this->admin_model->delete_faq($par2);

  }

  if($par1=='update')

  {

   $id=$this->input->post('codeid');
   $data['codename']=$this->input->post('cpn_name');
  $data['codepercent']=$this->input->post('cpn_amount');
  $data['startdate']=$this->input->post('cpn_startdate');
  $data['enddate']=$this->input->post('cpn_enddate');
  
  
//   $dttaken = date('d-m-Y',strtotime($data['startdate']));
//   $todaydate = date('d-m-Y');
// if($dttaken > $todaydate)
// {
//   $data['cpn_status']=2;
// }
// elseif($dttaken = $todaydate)
// {
//   $data['cpn_status']=1;
// }

updateData('callcoupon',$data,array('id'=>$id));
  //$this->admin_model->common_update('coupan','cpn_id',$par2,'coupan_view',$data);

  }

 //$page_data['datadisplay']=$this->admin_model->fetchbyresult('coupan');

 //$page_data['authordisplay']=$this->admin_model->fetchbyrow('admin');
$page_data['datadisplay']=fetchbyresult('callcoupon');
$page_data['page_name'] = 'callcoupan';
$page_data['page_title'] = 'Calling Coupon Codes';
$this->load->view('backend/index', $page_data);

}

public function add_callcoupan()

{
  $data['codename']=$this->input->post('cpn_name');
  
  $data['codepercent']=$this->input->post('cpn_amount');
  $data['startdate']=$this->input->post('cpn_startdate');
  $data['enddate']=$this->input->post('cpn_enddate');
  
//   $dttaken = date('d-m-Y',strtotime($data['cpn_startdate']));
//   $todaydate = date('d-m-Y');
// if($dttaken > $todaydate)
// {
//   $data['cpn_status']=2;
// }
// elseif($dttaken = $todaydate)
// {
//   $data['cpn_status']=1;
// }

  $this->admin_model->common_add('callcoupon','Call-Coupan',$data);
 // $this->admin_model->add_coupan($data);
}

public function add_coupan()

{
  $data['cpn_name']=$this->input->post('cpn_name');
  $data['cpn_code']=$this->input->post('cpn_code');
  $data['cpn_amount']=$this->input->post('cpn_amount');
  $data['cpn_startdate']=$this->input->post('cpn_startdate');
  $data['cpn_enddate']=$this->input->post('cpn_enddate');
  $data['cpn_disc_min_amound']=$this->input->post('cpn_disc_min_amound');
  $data['cpn_description']=$this->input->post('cpn_description');
  $dttaken = date('d-m-Y',strtotime($data['cpn_startdate']));
  $todaydate = date('d-m-Y');
if($dttaken > $todaydate)
{
  $data['cpn_status']=2;
}
elseif($dttaken = $todaydate)
{
  $data['cpn_status']=1;
}

  $this->admin_model->common_add('coupan','coupan_view',$data);
 // $this->admin_model->add_coupan($data);
}

function coupanstatuschange()
{
  $copid=fetchbyresult('coupan');
  $todaydate = date('d-m-Y');
  
  foreach($copid as $cpnid)
  {
    $coupanid=$cpnid['cpn_id'];
    $startdate=date('d-m-Y',strtotime($cpnid['cpn_startdate']));  // $cpnid['cpn_startdate'];
    $enddatedate=date('d-m-Y',strtotime($cpnid['cpn_startdate'])); // $cpnid['cpn_enddate'];
    if($startdate <= $todaydate &&  $enddatedate >= $todaydate)
    {
      $data['cpn_status'] = 1;
      $this->Generalmodel->modify('coupan','cpn_id',$coupanid, $data);
    }
    else
    {
      $data['cpn_status'] = 0;
      $this->Generalmodel->modify('coupan','cpn_id',$coupanid, $data);
    }
    // if($enddatedate == $todaydate)
    // {
    //    $data['cpn_status'] = 0;
    //    $this->Generalmodel->modify('coupan','cpn_id',$coupanid,$data);
    // }
    // if($enddatedate > $todaydate)
    // {
    //   $data['cpn_status'] = 1;
    //   $this->Generalmodel->modify('coupan','cpn_id',$coupanid, $data);
    // }
    // if($startdate > $todaydate)
    // {
    //   $data['cpn_status'] = 2;
    //   $this->Generalmodel->modify('coupan','cpn_id',$coupanid, $data);
    // }
    // if($enddatedate < $todaydate)
    // {
    //   $data['cpn_status'] = 0;
    //   $this->Generalmodel->modify('coupan','cpn_id',$coupanid, $data);
    // }
  }
 
}
/************************************************ coupan END ******************************/

/************************************************Astro commentappdisapp START ******************************/

public function astrocommentsapproval_view($par1 = null, $par2 = null)

{

  if($par1=='delete')

  {

   $this->admin_model->common_delete('comment_rating_astrologer','cr_id',$par2,'astrocommentappdisapp_view');

  }

  if($par1=='active')

  {

   $this->admin_model->active_astrocomments($par2);

  }

  if($par1=='inactive')

  {

   $this->admin_model->inactive_astrocomments($par2);

  }

 $page_data['datadisplay']=$this->admin_model->astrocommentfetch_join();

 $page_data['page_name'] = 'commentsastrologer';

 $page_data['page_title'] = 'Comments Astrologer';

 $this->load->view('backend/index', $page_data);

}

/************************************************astro commentappdisapp END ******************************/
/************************************************ report question START ******************************/

public function reportquestion_view($par1 = null, $par2 = null,$par3 = null)

{

  if($par1=='delete')

  {
   $this->admin_model->common_delete('reportquestionoption','rqo_id ',$par2,'reportquestion_view');//delete_reportquestion($par2);
  }

  if($par1=='update')
  {
  $data['rqo_question']=$this->input->post('rqo_question');
  $data['rqo_option1']=$this->input->post('rqo_option1');
  $data['rqo_option2']=$this->input->post('rqo_option2');
  $data['rqo_option3']=$this->input->post('rqo_option3');
  $data['rqo_option4']=$this->input->post('rqo_option4');
  $this->admin_model->common_update('reportquestionoption','rqo_id ',$par2,'reportquestion_view',$data);
  }

  $page_data['datadisplay']=$this->admin_model->fetchbyresultorderby('reportquestionoption','rqo_id','desc');
  $page_data['page_name'] = 'reportqueryoption';
  $page_data['page_title'] = 'Questions Option';
  $this->load->view('backend/index', $page_data);
  }
  public function add_reportquestion()
  {
    $data['rqo_question']=$this->input->post('rqo_question');
    $data['rqo_option1']=$this->input->post('rqo_option1');
    $data['rqo_option2']=$this->input->post('rqo_option2');
    $data['rqo_option3']=$this->input->post('rqo_option3');
    $data['rqo_option4']=$this->input->post('rqo_option4');
    $this->admin_model->common_add('reportquestionoption','reportquestion_view',$data);
  // $this->admin_model->add_coupan($data);
  }


/************************************************ report questionn END ******************************/
/************************************************orders_view START ******************************/

public function orders_view($par1 = null, $par2 = null)

{

  if($par1=='active')

  {

   $this->admin_model->active_orders($par2);

  }

  if($par1=='inactive')

  {

   $this->admin_model->inactive_orders($par2);

  }

 $page_data['datadisplay']=$this->admin_model->order();

 $page_data['page_name'] = 'orders';

 $page_data['page_title'] = 'orders_view';

 $this->load->view('backend/index', $page_data);

}

/************************************************orders_view END ******************************/
/************************************************history call_view admin section start ******************************/
//for admin section only use
function historycall_view()
{
  $page_data['datadisplay']=$this->admin_model->call_history_admin();
  $page_data['page_name']='history_call';
  $page_data['page_title']='History Call';
  $this->load->view('backend/index',$page_data);
}
/************************************************history call_view admin section end ******************************/
/************************************************history chat_view admin section start ******************************/
//for admin section only use
function historychat_view()
{
  $page_data['datadisplay']=$this->admin_model->chat_history_admin();
  $page_data['page_name']='history_chat';
  $page_data['page_title']='History chat';
  $this->load->view('backend/index',$page_data);
}
/************************************************history chat_view admin section end ******************************/

//end

}?>