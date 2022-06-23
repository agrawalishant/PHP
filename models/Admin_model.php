<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model

 {
 
 public function __construct()

    {
      parent::__construct();
    }


/******************************* E M A I L   S T A R T ***************************************/
//funtion to get email of user to send password
public function ForgotPassword($email)
{
       $this->db->select('email');
       $this->db->from('admin'); 
       $this->db->where('email', $email); 
       $query=$this->db->get();
       return $query->row_array();
}
public function sendpassword($data)
{
        $email = $data['email'];
        $query1=$this->db->query("SELECT *  from admin  where email = '".$email."' ");
        $row=$query1->result_array();
        if ($query1->num_rows()>0)
      
{
        $passwordplain = "";
        $passwordplain  = rand(999999999,9999999999);
        $newpass['password'] = md5($passwordplain);
        $this->db->where('email', $email);
        $this->db->update('admin', $newpass); 
        $mail_message='Dear '.$row[0]['name'].','. "\r\n";
        $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
        $mail_message.='<br>Please Update your password.';
        $mail_message.='<br>Thanks & Regards';
        $mail_message.='<br>Your company name';        
        date_default_timezone_set('Etc/UTC');
        require FCPATH.'assets/PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPSecure = "tls"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "yooursmtp";
        $mail->Port = 587;
        $mail->SMTPAuth = true;   
        $mail->Username = "your@email.com";    
        $mail->Password = "password";
        $mail->setFrom('admin@site', 'admin');
        $mail->IsHTML(true);
        $mail->addAddress($email);
        $mail->Subject = 'OTP from company';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;

if (!$mail->send()) {
     $this->session->set_flashdata('errormsg','Failed to send password, please try again!');
} else {
   $this->session->set_flashdata('success','Password sent to your email!');
}
  redirect(base_url().'forgetpassword_page','refresh');        
}
else
{  
 $this->session->set_flashdata('errormsg','Email not found try again!');
 redirect(base_url().'forgetpassword_page','refresh');
}
}
/*******************************   E M A I L       E N D ***************************************/
/*******************************C O M M O N   Q U E R Y   S T A R T ***************************************/
    public function fetchbyrow($databasename)
    {
       return $query=$this->db->get($databasename)->row();
    }
    public function fetchbyrow_where($databasename,$id)
    {
       return $query=$this->db->get_where($databasename,array('id' => $id))->row();
    }
    public function fetchbyresult($databasename)
    {
       return $query=$this->db->get($databasename)->result_array();
    }
    public function fetchbyresultorderby($databasename,$by,$ascdesc)
    {
       return $query= $this->db->order_by($by,$ascdesc)->get($databasename)->result_array();
    }

/*******************************C O M M O N   Q U E R Y   E N D  ***************************************/
    
/*******************************C O M M O N   Q U E R Y   S T A R T ***************************************/
public function common_add($tablename,$redirectto,$data)
{ 
    $this->db->insert($tablename,$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . $redirectto, 'refresh');
}
public function common_delete($tablename,$dbtableid,$par2db_id,$redirectto)
{ 
    $this->db->where($dbtableid,$par2db_id)
             ->delete($tablename);
           
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . $redirectto , 'refresh');
}
public function common_update($tablename,$databaseid,$par2db_id,$redirectto,$data)
{ 
   $this->db->where($databaseid,$par2db_id)
             ->update($tablename,$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . $redirectto , 'refresh');
}
/*******************************C O M M O N   Q U E R Y   E N D  ***************************************/
/******************************* permission START  ***************************************/
public function permission_fetch()
{
    $query=$this->db->select('permission.*,admin.*')
    ->from('permission','admin')
    ->join('admin', 'permission.admins_id = admin.id');
     $query = $this->db->get();
     return $query->result_array();
}
// public function add_permission($data)
// { 
//     $image = $_FILES['userfile']['name'];
//     $img =  str_replace(" ", "", $image);
//     $data['image'] = $img;
//     move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/profileadmin/'.$img);
//     $this->db->insert('admin',$data);
//     $this->session->set_flashdata('success', 'Data Add Sucessfully');
//     redirect(base_url() . 'subadmin_view', 'refresh');
// }

// public function delete_permission($par2,$par3)
// { 
    
//     $this->db->where('id',$par2)
//              ->delete('admin');

//              $path = 'image/profileadmin/'; 
//              $get_file = $path.$par3; 
//               if(file_exists($get_file))
//               { 
//               unlink($get_file); 
//               }
//     $this->session->set_flashdata('success', 'Data Delete Sucessfully');
//     redirect(base_url() . 'subadmin_view', 'refresh');
// }
// public function updatepermission($data,$par2)
// {
//  $query = $this->db->where('permission_id', $par2)
//                  ->update('permission', $data);

//     $this->session->set_flashdata('success', 'Data Update Sucessfully');

//     redirect(base_url() . 'permission_view', 'refresh');
// }

/******************************* permisssion END  ***************************************/

/******************************* subadmin START  ***************************************/
public function subadmin_fetch()
{
    $query = $this->db->get('admin');
     return $query->result_array();

}

public function add_subadmin($data)
{ 
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/profileadmin/'.$img);
    $this->db->insert('admin',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'subadmin_view', 'refresh');
}

public function delete_subadmin($par2,$par3)
{ 
    
    $this->db->where('id',$par2)
             ->delete('admin');

             $path = 'image/profileadmin/'; 
             $get_file = $path.$par3; 
              if(file_exists($get_file))
              { 
              unlink($get_file); 
              }
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'subadmin_view', 'refresh');
}

/******************************* subadmin END  ***************************************/
/******************************* DASHBOARD START  ***************************************/
public function TotalProduct()
{
    $this->db->select('*');
    $this->db->from('product');
    $query = $this->db->get();
    return $query->num_rows();
} 
function usersregisterthismonth()
{
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('`user_timestamp` >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)');
    $query = $this->db->get();
    return $query->num_rows();
}
function astrologerregisterthismonth()
{
    $this->db->select('*');
    $this->db->from('astrologers');
    $this->db->where('`timestamp` >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)');
    $query = $this->db->get();
    return $query->num_rows();
}

public function pending_comment()
{
    $this->db->select('*');
    $this->db->where('comment_status','0');
    $this->db->from('blogcomment');
    $query = $this->db->get();
    return $query->num_rows();
} 
public function pending_order()
{
    $this->db->select('*');
    $this->db->where('order_status','0');
    $this->db->where('product_id !=','');
    $this->db->from('payment');
    $query = $this->db->get();
    return $query->num_rows();
} 
public function astrologer_app_pending()
{
    $this->db->select('*');
    $this->db->where('astro_approved_status','0');
    $this->db->from('astrologers');
    $query = $this->db->get();
    return $query->num_rows();
} 
public function astrologer_approved()
{
    $this->db->select('*');
    $this->db->where('astro_approved_status','1');
    $this->db->from('astrologers');
    $query = $this->db->get();
    return $query->num_rows();
} 
public function Pending_free_kundali_making()
{
    $this->db->select('*');
    $this->db->where('status','0');
    $this->db->from('enquiry_freekundali');
    $query = $this->db->get();
    return $query->num_rows();
} 
public function Pending_free_prediction()
{
    $this->db->select('*');
    $this->db->where('p_status','0');
    $this->db->from('prediction');
    $query = $this->db->get();
    return $query->num_rows();
} 
public function TotalBlog()
{
    $this->db->select('*');
    $this->db->from('blog');
    $query = $this->db->get();
    return $query->num_rows();
} 
public function TotalNews()
{
    $this->db->select('*');
    $this->db->from('news');
    $query = $this->db->get();
    return $query->num_rows();
} 
public function TotalFestival()
{
    $this->db->select('*');
    $this->db->from('festival');
    $query = $this->db->get();
    return $query->num_rows();
} 
function BlogMonthCount()
{
// $query=$this->db->query('SELECT * FROM employees where  `created_at` >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)');
    $this->db->select('*');
    $this->db->from('blog');
    $this->db->where('`timestamp` >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)');
    $query = $this->db->get();
    return $query->num_rows();
}
/******************************* DASHBOARD END  ***************************************/
/******************************* PROFILE START  ***************************************/
public function updateprofileinformation($data,$par2)

{
  if (!empty($_FILES['userfile']['name'])) {

 move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/profileadmin/' . $par2 . '.png');

    $data['image'] = $par2 . '.png';
}
 $query = $this->db->where('id', $par2)
                 ->update('admin', $data);

    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() . 'profile_view', 'refresh');
}
public function checkOldPass($old_pass,$new_pass,$id)
{
  
           //$this->db->where('username', $this->session->userdata('username'));
    $this->db->where('id', $id);
    $this->db->where('password',$old_pass);
    $query = $this->db->get('admin');
    if($query->num_rows() > 0){

          $data['password']=$new_pass;
          $qpass = $this->db->where('id',$id)
                            ->update('admin', $data);
        $this->session->set_flashdata('success', 'Data Saved');
           redirect(base_url() . 'profile_view', 'refresh');
        }
    else
    {
        $this->session->set_flashdata('error', 'Password Not match');
      }
}
/******************************* PROFILE END  ***************************************/
  /******************************* WEBSITE INFORMATION START  ***************************************/

    public function update_websiteinformation($data)
    { 
        $par2 = 1;

    if(!empty($_FILES['userfile1']['name']))
    {
        $image1 = $_FILES['userfile1']['name'];
        $logo1 =  str_replace(" ", "", $image1);
        $data['logo1'] = $logo1;
        move_uploaded_file($_FILES['userfile1']['tmp_name'], 'image/logo/'.$logo1);
    }
    if(!empty($_FILES['userfile2']['name']))
    {
        $image2 = $_FILES['userfile2']['name'];
        $logo2 =  str_replace(" ", "", $image2);
        $data['logo2'] = $logo2;
        move_uploaded_file($_FILES['userfile2']['tmp_name'], 'image/logo/'.$logo2);
    }
    if(!empty($_FILES['userfile3']['name']))
    {
        $image3 = $_FILES['userfile3']['name'];
        $logo3 =  str_replace(" ", "", $image3);
        $data['favicon'] = $logo3;
        move_uploaded_file($_FILES['userfile3']['tmp_name'], 'image/logo/'.$logo3);
    }
    $this->db->where('info_id',$par2)
                 ->update('websiteinformation',$data);
        $this->session->set_flashdata('success', 'Data Update Sucessfully');
        redirect(base_url() . 'websiteinformation', 'refresh');
    }
/******************************* WEBSITE INFORMATION  ***************************************/
 
/******************************* BLOG START  ***************************************/
public function blog_fetch()
{
    $query=$this->db->select('blog.*, admin.id,admin.name')
    ->from('blog','admin')
    ->join('admin', 'blog.published_by = admin.id');
     $query = $this->db->get();
     return $query->result_array();

}
public function add_blog($data)
{ 
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/blog/'.$img);
    $this->db->insert('blog',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'blog_view', 'refresh');
}

public function delete_blog($par2,$par3)
{ 
    
    $this->db->where('blog_id',$par2)
             ->delete('blog');

             $path = 'image/blog/'; 
             $get_file = $path.$par3; 
              if(file_exists($get_file))
              { 
              unlink($get_file); 
              }
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'blog_view', 'refresh');
}
public function update_blog($par2,$data)
{ 
    
    if(!empty($_FILES['userfile']['name']))
    {
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/blog/'.$img);
    }
    $this->db->where('blog_id',$par2)
             ->update('blog',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'blog_view', 'refresh');
}
/******************************* BLOG END  ***************************************/

/******************************* FESTIVAL START  ***************************************/

public function delete_festival($par2)
{ 
    $this->db->where('festival_id',$par2)
             ->delete('festival');
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'festival_view', 'refresh');
}
public function add_festival($data)
{ 
    $this->db->insert('festival',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'festival_view', 'refresh');
}
public function update_festival($par2,$data)
{ 
    $this->db->where('festival_id',$par2)
             ->update('festival',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'festival_view', 'refresh');
}
/******************************* FESTIVAL END  ***************************************/

/******************************* SERVICE START  ***************************************/
public function add_service($data)
{ 
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/service/'.$img);
    $this->db->insert('services',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'services_view', 'refresh');
}

public function delete_service($par2,$par3)
{ 
    $this->db->where('services_id',$par2)
             ->delete('services');
             $path = 'image/service/'; 
             $get_file = $path.$par3; 
              if(file_exists($get_file))
              { 
              unlink($get_file); 
              }
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'services_view', 'refresh');
}
public function update_service($par2,$data)
{ 
    if(!empty($_FILES['userfile']['name']))
    {
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/service/'.$img);
    }
    $this->db->where('services_id',$par2)
             ->update('services',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'services_view', 'refresh');
}

/******************************* SERVICE END  ***************************************/
/******************************* NEWS START  ***************************************/

public function add_news($data)
{ 
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/news/'.$img);
    $this->db->insert('news',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'news_view', 'refresh');
}

public function delete_news($par2,$par3)
{ 
    $this->db->where('news_id',$par2)
             ->delete('news');
             $path = 'image/news/'; 
             $get_file = $path.$par3; 
              if(file_exists($get_file))
              { 
              unlink($get_file); 
              }
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'news_view', 'refresh');
}
public function update_news($par2,$data)
{ 
    if(!empty($_FILES['userfile']['name']))
    {
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/news/'.$img);
    }
    $this->db->where('news_id',$par2)
             ->update('news',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'news_view', 'refresh');
}
/******************************* NEWS END  ***************************************/

/******************************* TESTIMONIAL START  ***************************************/

public function add_testimonial($data)
{ 
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/testimonial/'.$img);
    $this->db->insert('testimonial',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'testimonial_view', 'refresh');
}
public function delete_testimonial($par2,$par3)
{ 
    $this->db->where('testimonial_id',$par2)
             ->delete('testimonial');
             $path = 'image/testimonial/'; 
             $get_file = $path.$par3; 
              if(file_exists($get_file))
              { 
              unlink($get_file); 
              }
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'testimonial_view', 'refresh');
}
public function update_testimonial($par2,$data)
{ 
    if(!empty($_FILES['userfile']['name']))
    {
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/testimonial/'.$img);
    }
    $this->db->where('testimonial_id',$par2)
             ->update('testimonial',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'testimonial_view', 'refresh');
}
/******************************* TESTIMONIAL END  ***************************************/


/******************************* FAQ START  ***************************************/

public function add_faq($data)
{ 
    $this->db->insert('faq',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'faq_view', 'refresh');
}
public function delete_faq($par2)
{ 
    $this->db->where('faq_id',$par2)
             ->delete('faq');
           
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'faq_view', 'refresh');
}
public function update_faq($par2,$data)
{ 
   $this->db->where('faq_id',$par2)
             ->update('faq',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'faq_view', 'refresh');
}
/******************************* FAQ END  ***************************************/
/******************************* HOROSCOPE START  ***************************************/

public function update_horoscopeyearly($par2,$data)
{ 
  if(!empty($_FILES['userfile']['name']))
  {
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['main_image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/horoscopeyearly/'.$img);
  }
   $this->db->where('horoscope_id',$par2)
             ->update('horoscopeyearly',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'horoscopeyearly_view', 'refresh');
}
/******************************* HOROSCOPE END  ***************************************/
/******************************* CONTENT MANAGEMENT START  ***************************************/
public function add_contentmgt($data)
{ 
    $this->db->insert('contentmanagement',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'contentmgt_view', 'refresh');
}
public function delete_contentmgt($par2)
{ 
    $this->db->where('cm_id',$par2)
             ->delete('contentmanagement');
           
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'contentmgt_view', 'refresh');
}
public function update_contentmgt($par2,$data)
{ 
   $this->db->where('cm_id',$par2)
             ->update('contentmanagement',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'contentmgt_view', 'refresh');
}
/******************************* CONTENT MANAGEMENT END  ***************************************/

/******************************* CATEGORY PRODUCT START  ***************************************/

public function add_product_category($data)
{ 
    $this->db->insert('category_product',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'product_category_view', 'refresh');
}
public function delete_product_category($par2)
{ 
    $this->db->where('cat_pro_id',$par2)
             ->delete('category_product');
           
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'product_category_view', 'refresh');
}
public function update_product_category($par2,$data)
{ 
   $this->db->where('cat_pro_id',$par2)
             ->update('category_product',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'product_category_view', 'refresh');
}
/******************************* CATEGORY PRODUCT  ***************************************/

/******************************* PRODUCT START  ***************************************/
public function product_fetch()
{
    $query=$this->db->select('product.*,category_product.*')
    ->from('product','category_product')
    ->join('category_product', 'product.pr_category = category_product.cat_pro_id');
     $query = $this->db->get();
     return $query->result_array();

}
public function add_product($data)
{ 
    if(!empty($_FILES['c_userfile']['name']))
    {
        $image_c = $_FILES['c_userfile']['name'];
        $img_c =  str_replace(" ", "", $image_c);
        $data['pr_image_certificate'] = $img_c;
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/certificate/'.$img_c);   
    }

    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['pr_image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/product/'.$img);
   
   
    $this->db->insert('product',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'product_view', 'refresh');
}
public function delete_product($par2)
{ 
    $this->db->where('pr_id',$par2)
             ->delete('product');
            //  $path = 'image/product/'; 
            //  $get_file = $path.$par3; 
            //   if(file_exists($get_file))
            //   { 
            //   unlink($get_file); 
            //   }
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'product_view', 'refresh');
}
public function update_product($par2,$data)
{ 
    if(!empty($_FILES['c_userfile']['name']))
    {
        $image_c = $_FILES['c_userfile']['name'];
        $img_c =  str_replace(" ", "", $image_c);
        $data['pr_image_certificate'] = $img_c;
        move_uploaded_file($_FILES['c_userfile']['tmp_name'], 'image/certificate/'.$img_c);   
    }
    if(!empty($_FILES['userfile']['name']))
    {
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['pr_image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/product/'.$img);
    }
    $this->db->where('pr_id',$par2)
             ->update('product',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'product_view', 'refresh');
}
/******************************* PRODUCT END  ***************************************/
/*******************************SUB PRODUCT START  ***************************************/
public function sub_product_fetch()
{
    $query=$this->db->select('product.*,product_subproduct.*')
    ->from('product','product_subproduct')
    ->join('product_subproduct', 'product.pr_id = product_subproduct.sp_product_id');
     $query = $this->db->get();
     return $query->result_array();

}
public function sub_add_product($data)
{ 
    $this->db->insert('product_subproduct',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'sub_product_view', 'refresh');
}


/******************************* sub PRODUCT END  ***************************************/
/******************************* Astrologers START  ***************************************/
public function active_astrologers($par2)
{
    $data['astro_approved_status'] = 1;
    $this->db->where('astro_id', $par2)
        ->update('astrologers', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() . 'astrologers_view', 'refresh');
}

public function inactive_astrologers($par2)
{
    $data['astro_approved_status'] = 0;
    $this->db->where('astro_id', $par2)
        ->update('astrologers', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() . 'astrologers_view', 'refresh');
}

public function astrologers_fetch()
{
    $query=$this->db->select('astrologers.*')
                   ->from('astrologers')->order_by('astro_ranking','ASC');
   // ->join('category_astrologer', 'category_astrologer.cat_astr_id = astrologers.astro_category');
   $query = $this->db->get();
     return $query->result_array();
}


public function add_astrologers($data,$data2)
{ 
    // print_r($data2['astrologer_cat_id']);
    // exit;
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['astro_image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/astrologers/'.$img);

    $data['astro_cat']=implode(",",$data2['astrologer_cat_id']);

    $this->db->insert('astrologers',$data);
    // for insert again start
    $last_id=$this->db->insert_id();
    $data2['astrologer_id_m']=$last_id;

    for($i=0;$i<count($data2['astrologer_cat_id']);$i++)
       {
      $a= $data2['astrologer_cat_id'][$i];
      $this->db->insert('astrologers_multiplecategories',array('astrologer_cat_id' => $a,'astrologer_id_m' => $last_id));
       }
    
        // for insert again end
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'astrologers_view', 'refresh');
}
public function delete_astrologers($par2)
{ 
    $this->db->where('astro_id',$par2)
             ->delete('astrologers');
            //  $path = 'image/astrologers/'; 
            //  $get_file = $path.$par3; 
            //   if(file_exists($get_file))
            //   { 
            //   unlink($get_file); 
            //   }
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'astrologers_view', 'refresh');
}
public function update_astrologers($par2,$data,$data2)
{ 
    if(!empty($_FILES['userfile']['name']))
    {
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['astro_image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/astrologers/'.$img);
    }

    $this->db->where('astro_id',$par2)
             ->update('astrologers',$data);

     $this->db->where('astrologer_id_m',$par2)
             ->delete('astrologers_multiplecategories');
             
     for($i=0;$i<count($data2['astrologer_cat_id']);$i++)
     {
     $a= $data2['astrologer_cat_id'][$i];
     $this->db->insert('astrologers_multiplecategories',array('astrologer_cat_id' => $a,'astrologer_id_m' => $par2));
     }
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'astrologers_view', 'refresh');
}
/******************************* Astrologers END  ***************************************/
/*******************************MM BANNER START  ***************************************/
// public function update_matchmaking_banner($par2)

// {
//   if (!empty($_FILES['userfile']['name'])) {

//  move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/bannermatchmaking/' . '1' . '.png');

//     $data['image'] = '1' . '.png';
// }
//        $query = $this->db->where('mmb_id', '1')

//         ->update('mmbanner', $data);

//     $this->session->set_flashdata('success', 'Update Sucessfully');
//     redirect(base_url() . 'mmbanner_view', 'refresh');
// }


public function add_mmbanner($data)
{ 
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/bannermatchmaking/'.$img);
    $this->db->insert('mmbanner',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'mmbanner_view', 'refresh');
}

public function delete_mmbanner($par2,$par3)
{ 
    $this->db->where('mmb_id',$par2)
             ->delete('mmbanner');
             $path = 'image/bannermatchmaking/'; 
             $get_file = $path.$par3; 
              if(file_exists($get_file))
              { 
              unlink($get_file); 
              }
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'mmbanner_view', 'refresh');
}
public function update_mmbanner($par2,$data)
{ 
    if(!empty($_FILES['userfile']['name']))
    {
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/bannermatchmaking/'.$img);
    }
    $this->db->where('mmb_id',$par2)
             ->update('mmbanner',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'mmbanner_view', 'refresh');
}

/******************************* MM BANNER END  ***************************************/

/*******************************ASTROLOGERS  ADMIN TEAM START START  ***************************************/
public function active_aateam($par2)
{
    $data['team_approved_status'] = 1;
    $this->db->where('team_id', $par2)
        ->update('astro_admin_team', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() . 'aateam_view', 'refresh');
}
public function inactive_aateam($par2)
{
    $data['team_approved_status'] = 0;
    $this->db->where('team_id', $par2)
        ->update('astro_admin_team', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() . 'aateam_view', 'refresh');
}

public function add_aateam($data)
{ 
    
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['team_image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/astroadminteam/'.$img);
    
    $this->db->insert('astro_admin_team',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'aateam_view', 'refresh');
}
public function delete_aateam($par2,$par3)
{ 
    $this->db->where('team_id',$par2)
             ->delete('astro_admin_team');
             $path = 'image/astroadminteam/'; 
             $get_file = $path.$par3; 
              if(file_exists($get_file))
              { 
              unlink($get_file); 
              }
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'aateam_view', 'refresh');
}
public function update_aateam($par2,$data)
{ 
    if(!empty($_FILES['userfile']['name']))
    {
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['team_image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/astroadminteam/'.$img);
    }
    $this->db->where('team_id',$par2)
             ->update('astro_admin_team',$data);

    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'aateam_view', 'refresh');
}
/******************************* ASTROLOGERS  ADMIN TEAM  END  ***************************************/
/******************************* Enquiry  END  ***************************************/
public function delete_enquiry($par2)
{ 
    $this->db->where('enq_id',$par2)
             ->delete('enquiry');
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'enquiry_view', 'refresh');
}
/******************************* Enquiry  END  ***************************************/
/******************************* advertisement START  ***************************************/

public function add_advertisement($data)
{ 
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['advt_image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/advertisement/'.$img);
    $this->db->insert('advertisement',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'advertisement_view', 'refresh');
}

public function delete_advertisement($par2,$par3)
{ 
    $this->db->where('advt_id',$par2)
             ->delete('advertisement');
             $path = 'image/advertisement/'; 
             $get_file = $path.$par3; 
              if(file_exists($get_file))
              { 
              unlink($get_file); 
              }
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'advertisement_view', 'refresh');
}
public function update_advertisement($par2,$data)
{ 
    if(!empty($_FILES['userfile']['name']))
    {
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['advt_image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/advertisement/'.$img);
    }
    $this->db->where('advt_id',$par2)
             ->update('advertisement',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'advertisement_view', 'refresh');
}
/******************************* advertisement END  ***************************************/

/******************************* ENQUIRY FREE KUNDALISTART   ***************************************/
public function active_FREEKUNDALI($par2)
{
    $data['status'] = 1;
    $this->db->where('fkun_id', $par2)
        ->update('enquiry_freekundali', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() . 'enquiryfreekundali_view', 'refresh');
}
public function inactive_FREEKUNDALI($par2)
{
    $data['status'] = 0;
    $this->db->where('fkun_id', $par2)
        ->update('enquiry_freekundali', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() . 'enquiryfreekundali_view', 'refresh');
}
/******************************* ENQUIRY FREE KUNDALI eND   ***************************************/

/******************************* onlinepujadetail START  ***************************************/
// public function onlinepujadetail_fetch()
// {
//     $query=$this->db->select('product.*,category_product.*')
//     ->from('product','category_product')
//     ->join('category_product', 'product.pr_category = category_product.cat_pro_id');
//      $query = $this->db->get();
//      return $query->result_array();

// }
public function add_onlinepujadetail($data)
{ 
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['op_image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/onlinepuja/'.$img);
    $this->db->insert('onlinepuja',$data);
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'onlinepujadetail_view', 'refresh');
}
public function delete_onlinepujadetail($par2,$par3)
{ 
    $this->db->where('op_id',$par2)
             ->delete('onlinepuja');
             $path = 'image/onlinepuja/'; 
             $get_file = $path.$par3; 
              if(file_exists($get_file))
              { 
              unlink($get_file); 
              }
    $this->session->set_flashdata('success', 'Data Delete Sucessfully');
    redirect(base_url() . 'onlinepujadetail_view', 'refresh');
}
public function update_onlinepujadetail($par2,$data)
{ 
    if(!empty($_FILES['userfile']['name']))
    {
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['op_image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/onlinepuja/'.$img);
    }
    $this->db->where('op_id',$par2)
             ->update('onlinepuja',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'onlinepujadetail_view', 'refresh');
}
/******************************* PRODUCT END  ***************************************/

/******************************* commentappdisapp START   ***************************************/

public function blogcommentfetch_join()
{
    $query=$this->db->select('blog.*,blogcomment.*')
    ->from('blog','blogcomment')
    ->join('blogcomment', 'blog.blog_id = blogcomment.comment_blog_id')
    ->order_by('blogcomment.comment_id','desc');
     $query = $this->db->get();
     return $query->result_array();

}
public function active_blogcomments($par2)
{
    $data['comment_status'] = 1;
    $this->db->where('comment_id', $par2)
        ->update('blogcomment', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() . 'commentappdisapp_view', 'refresh');
}
public function inactive_blogcomments($par2)
{
    $data['comment_status'] = 0;
    $this->db->where('comment_id', $par2)
        ->update('blogcomment', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() . 'commentappdisapp_view', 'refresh');
}
/******************************* commentappdisapp  eND   ***************************************/
/******************************* prediction START   ***************************************/
public function active_FREEpre($par2)
{
    $data['p_status'] = 1;
    $this->db->where('p_id', $par2)
        ->update('prediction', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() . 'enquiryfreeprediction_view', 'refresh');
}
public function inactive_FREEpre($par2)
{
    $data['p_status'] = 0;
    $this->db->where('p_id', $par2)
        ->update('prediction', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() . 'enquiryfreeprediction_view', 'refresh');
}
/******************************* prediction  eND   ***************************************/

/******************************* PREDICTION DATA ENTRY START  ***************************************/

public function update_predictiondataentry($par2,$data)
{ 
  if(!empty($_FILES['userfile']['name']))
  {
    $image = $_FILES['userfile']['name'];
    $img =  str_replace(" ", "", $image);
    $data['pm_image'] = $img;
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'image/prediction/'.$img);
  }
   $this->db->where('pm_id',$par2)
             ->update('predectionmatter',$data);
    $this->session->set_flashdata('success', 'Data update Sucessfully');
    redirect(base_url() . 'predictiondataentry_view', 'refresh');
}
/******************************* PREDICTION DATA ENTRY END  ***************************************/
/******************************* report generation history admin panel start START START   ***************************************/
public function active_report_user($par2)
{
    $data['rp_problem_solve_status'] = 1;
    $this->db->where('rp_id', $par2)
        ->update('reportsendtoastro', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() .'astrologerdashboard', 'refresh');
}
public function inactive_report_user($par2)
{
    $data['rp_problem_solve_status'] = 0;
    $this->db->where('rp_id', $par2)
        ->update('reportsendtoastro', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() . 'astrologerdashboard', 'refresh');
}
//$par2=astro id , $par3=report id rp_id par1 = payfor
//*** *** this function also used in admin and user model dont change except rediredct url ***  ***
public function pay_to_astrologer($par1,$par2,$par3)
{
    //this amount added to 3 database table wallet_history_astrologer , wallet_astrologer ,wallet_admin_final_amt
   $fetchdata       =   fetchbyresultByCondiction('reportsendtoastro',array('rp_id'=>$par3));
   $amount          =   $fetchdata['0']['rp_amountpaid'];
   $per_dedction    =  fetchbyresultByCondiction('astrologers',array('astro_id'=>$par2));
   $percentageded   =  $per_dedction['0']['percentage_deduction'];
     
  $commission_created = ($percentageded /100)*$amount;
  
   $astrologer_final_amount   = $amount-$commission_created;
   $admin_final_amount        = $commission_created;
  
 
    $payfor=$par1;
    $astrologerid=$par2;
    $reportid=$par3;


// --------insert to astrologer history 1)
    $data['wha_astro_id']=$astrologerid;
    $data['wha_id_all']=$reportid;
    $data['wha_recevedfor']=$payfor;
    $data['wha_rec_amt_before_deduction']=$amount;
    $data['wha_rec_amt_after_deduction']=$astrologer_final_amount;
   $in= $this->db->insert('wallet_history_astrologer',$data);
    $insert_id = $this->db->insert_id($in);
// --------insert to astrologer wallet 2)
// add to astrologer wallet
$check = fetchby_wheres('wallet_astrologer',array('wa_astrologer_id'=>$astrologerid));
if(!empty($check))
{
    //print_r($check);exit;
    $w_amt = $check[0]['wa_wallet_amount'];
    //echo "amt = ".$amt;exit;
    $data2['wa_astrologer_id']=$astrologerid;
    $data2['wa_wallet_amount'] = $astrologer_final_amount+$w_amt;
    updateData('wallet_astrologer',$data2,array('wa_astrologer_id'=>$astrologerid));	
}
else
{
    $data2['wa_astrologer_id']=$astrologerid;
    $data2['wa_wallet_amount']=$astrologer_final_amount;
    addWalletData('wallet_astrologer',$data2);
}

// add to astrologer wallet end
//add to admin history 
$data3['wlla_recevedby_id']=$reportid;
$data3['wlla_receved_for']=$payfor;
$data3['wlla_amount']= $admin_final_amount;
addWalletData('wallet_history_admin',$data3);
//add to admin wallet
$adminwalllet = fetchby_wheres('wallet_admin',array('wad_adminid'=>'1'));
$admwlt=$adminwalllet['0']['wad_amt'];
$data5['wad_amt'] = $admin_final_amount+$admwlt;
updateData('wallet_admin',$data5,array('wad_adminid'=>'1'));
//update status for payment
$data4['rp_astrologer_pay_status']='1';
$data4['rp_astrologer_pay_tranjectionid']=$insert_id;
$data4['rp_astrologer_pay_date']=date('Y-m-d H:i:s');
updateData('reportsendtoastro',$data4,array('rp_id'=>$reportid));


$this->session->set_flashdata('success', 'Data Add Sucessfully');

redirect(base_url() . 'reportgen_user_history_adminpanel', 'refresh');

}
/******************************* reportgeneration history admin panel END   ***************************************/

// *******************************************************credit to astrologer account
 public function credit_to_astrologer($par2,$par3,$par4,$data)
{ 
    $data['ara_status']='1';
    $data['ara_paid_date'] =date('Y-m-d H:i:s');
    $amount = $par4;
    $astroid=$par3;
    $this->db->where('ara_id',$par2);
    $this->db->update('request_amount_astrologer',$data);
   $fetwalletdata=fetchbyresult_where('wallet_astrologer',$astroid,'wa_astrologer_id') ;
   $fwalletdta=$fetwalletdata[0]['wa_wallet_amount'];
   $finalamount=$fwalletdta-$amount;
//  ********* 1
    $data2['wa_wallet_amount']=$finalamount;
    $this->db->where('wa_astrologer_id',$astroid);
    $this->db->update('wallet_astrologer',$data2);
// ******** 2
    $data3['ara_deductedamount']=$finalamount;
    $this->db->where('ara_id',$par2);
    $this->db->update('request_amount_astrologer',$data3);
// ********
    $this->session->set_flashdata('success', 'Data Add Sucessfully');
    redirect(base_url() . 'amtrequestlist', 'refresh');
}
//******************************************************** */

/******************************* astro commentappdisapp START   ***************************************/

public function astrocommentfetch_join()
{
    $query=$this->db->select('comment_rating_astrologer.*,astrologers.*')
    ->from('astrologers','comment_rating_astrologer')
    ->join('comment_rating_astrologer', 'comment_rating_astrologer.cr_astro_id = astrologers.astro_id')
   ->order_by('comment_rating_astrologer.cr_user_id','desc');
     $query = $this->db->get();
     return $query->result_array();

}
public function active_astrocomments($par2)
{
    $data['cr_status'] = 1;
    $this->db->where('cr_id', $par2)
        ->update('comment_rating_astrologer', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() .'astrocommentappdisapp_view', 'refresh');
}
public function inactive_astrocomments($par2)
{
    $data['cr_status'] = 0;
    $this->db->where('cr_id', $par2)
        ->update('comment_rating_astrologer', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() .'astrocommentappdisapp_view', 'refresh');
}
/*******************************astro  commentappdisapp  eND   ***************************************/
/******************************* ORDER START   ***************************************/

public function order()
{
    $query=$this->db->select('payment.*,user.*')
    ->from('payment','user')
    ->join('user', 'payment.user_id = user.user_id')
    ->where('product_id !=', '')
    ->order_by('payment.payment_id','desc');
     $query = $this->db->get();
    // echo $this->db->last_query(); die();
     return $query->result_array();

}
public function active_orders($par2)
{
    $data['order_status'] = 1;
    $this->db->where('payment_id', $par2)
        ->update('payment', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() .'orders_view', 'refresh');
}
public function inactive_orders($par2)
{
    $data['order_status'] = 0;
    $this->db->where('payment_id', $par2)
        ->update('payment', $data);
    $this->session->set_flashdata('success', 'Data Update Sucessfully');

    redirect(base_url() .'orders_view', 'refresh');
}
/*******************************ORDER p  eND   ***************************************/
/*******************************CALL HISTORY ADMIN    ***************************************/
public function call_history_admin()
{
    $query=$this->db->select('user_call_detail_history_user.*,user.*,astrologers.*')
    ->from('user_call_detail_history_user','user','astrologers')
    ->join('user', 'user_call_detail_history_user.uch_user_id = user.user_id')
    ->join('astrologers', 'user_call_detail_history_user.uch_astro_id = astrologers.astro_id')
    ->order_by('user_call_detail_history_user.uch_id','desc');
     $query = $this->db->get();
    // echo $this->db->last_query(); die();
     return $query->result_array();

}
/*******************************CALL HISTORY ADMIN  END  ***************************************/
/*******************************Chat HISTORY ADMIN    ***************************************/
public function chat_history_admin()
{
    $query=$this->db->select('user_chat_detail_history.*,user.*,astrologers.*')
    ->from('user_chat_detail_history','user','astrologers')
    ->join('user','user_chat_detail_history.ucth_user_id = user.user_id')
    ->join('astrologers','user_chat_detail_history.ucth_astro_id = astrologers.astro_id')
    ->order_by('user_chat_detail_history.ucth_id','desc');
     $query = $this->db->get();
    //echo $this->db->last_query(); die();
  //  print_r( $query->result_array());exit;
     return $query->result_array();

}
/*******************************Chat HISTORY ADMIN  END  ***************************************/

// public function interested_fetch()
// {
//     $query=$this->db->select('user.*,mobilenumber.*')
//     ->from('user','mobilenumber')
//     ->join('mobilenumber', 'user.user_mobile = mobilenumber.m_user_mobile');
//      $query = $this->db->get();
//      return $query->result_array();
// }

    // end----------------------------

}
?>