<?php
//===============Upload file ==============

if ( ! function_exists('isSuperAdminLoggedIn')) {  
  function isSuperAdminLoggedIn() {
    $CI =& get_instance();
    if ($CI->session->userdata('dvAdmin_session')) {
      $user_info=$CI->session->userdata('dvAdmin_session');    
		return $user_info['logged_in'];
    } else
    return FALSE;
  }
}


if ( ! function_exists('getLoggedInUserId')) {  
  function getLoggedInUserId() {
    $CI =& get_instance();
    if ($CI->session->userdata('superadmin_information')) {
      $user_info=$CI->session->userdata('superadmin_information');    
		return $user_info['id'];
    } else
    return 0;
  }
}

function uploadImage($file,$tmpName,$path){
     move_uploaded_file($tmpName, $path.$file);
     return true;
 }

if (!function_exists('upload_file'))
{
    function upload_file($filename2='' , $upload_path='', $path_of_thumb='')
    {
        $allowed =  array('pdf','PDF','doc','docx','xlsx','xlt');
 
        $filename = $_FILES[$filename2]['name'];
 
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
 
        if(!in_array($ext,$allowed))
        {
            return FALSE;
        }
        else
        {
            if ($_FILES[$filename2]["error"] > 0)
            {
                return FALSE; 
            }
            else
            {
               $name = uniqid();
               if(move_uploaded_file($_FILES[$filename2]['tmp_name'],$upload_path.$name.'.'.$ext))
               return $name.'.'.$ext;
               else
               return FALSE;
            }
 
        }
    }
}
//======================create function upload image--

if (!function_exists('upload_image'))
{
    function upload_image($filename2='' , $upload_path='', $path_of_thumb='')
    {
        $allowed =  array('jpeg','JPEG','jpg','JPG','png','PNG');
 
        $filename = $_FILES[$filename2]['name'];
 
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
 
        if(!in_array($ext,$allowed))
        {
            return FALSE;
        }
        else
        {
            if ($_FILES[$filename2]["error"] > 0)
            {
                return FALSE; 
            }
            else
            {
               $name = uniqid();
               if(move_uploaded_file($_FILES[$filename2]['tmp_name'],$upload_path.$name.'.'.$ext))
               return $name.'.'.$ext;
               else
               return FALSE;
            }
 
        }
    }
}
//===========end===========
/**
 * create a encoded id for sequrity pupose 
 * 
 * @param string $id
 * @param string $salt
 * @return endoded value
 */
if (!function_exists('encode_id')) {

    function encode_id($id, $salt) {
        $ci = get_instance();
        $id = $ci->encrypt->encode($id . $salt);
        $id = str_replace("=", "~", $id);
        $id = str_replace("+", "_", $id);
        $id = str_replace("/", "-", $id);
        return $id;
    }

}

/**
 * decode the id which made by encode_id()
 * 
 * @param string $id
 * @param string $salt
 * @return decoded value
 */
if (!function_exists('decode_id')) {

    function decode_id($id, $salt) {
        $ci = get_instance();
        $id = str_replace("_", "+", $id);
        $id = str_replace("~", "=", $id);
        $id = str_replace("-", "/", $id);
        $id = $ci->encrypt->decode($id);
        if ($id && strpos($id, $salt) !== false) {
            return str_replace($salt, "", $id);
        }
    }

}
  if ( ! function_exists('alert')) { 

    function alert($msg='', $type='success_msg') {
      $CI =& get_instance();?>
      <?php if (empty($msg)): ?>
          <?php if ($CI->session->flashdata('success_msg')): ?>
            <?php echo success_alert($CI->session->flashdata('success_msg')); ?>
          <?php endif ?>
          <?php if ($CI->session->flashdata('error_msg')): ?>
            <?php echo error_alert($CI->session->flashdata('error_msg')); ?>
          <?php endif ?>
          <?php if ($CI->session->flashdata('info_msg')): ?>
            <?php echo info_alert($CI->session->flashdata('info_msg')); ?>
          <?php endif ?>
      <?php else: ?>
          <?php if ($type == 'success_msg'): ?>
            <?php echo success_alert($msg); ?>
          <?php endif ?>
          <?php if ($type == 'error_msg'): ?>
            <?php echo error_alert($msg); ?>
          <?php endif ?>
          <?php if ($type == 'info_msg'): ?>
            <?php echo info_alert($msg); ?>
          <?php endif ?>
      <?php endif; ?>
    <?php }
  }
 /**
* Success alert
*/
 if ( ! function_exists('success_alert')) {  
   function success_alert($msg = '') {?>

<div class="uk-notify-message uk-notify-message-success" style="opacity: 1; margin-top: 0px; margin-bottom: 10px;"><a class="uk-close"></a><div><a href="#" class="notify-action"></a> <?php echo $msg ?></div></div>
 
   <?php 
   }
 }
 
/**
* Error alert
*/
if ( ! function_exists('error_alert')) {  
  function error_alert($msg = '') {?>
  <div class="uk-notify-message uk-notify-message-danger" style="opacity: 1; margin-top: 0px; margin-bottom: 10px;"><a class="uk-close"></a><div><a href="#" class="notify-action"></a> <?php echo $msg ?></div></div>

  <?php 
  }
}
 
/**
* info alert
*/

if ( ! function_exists('info_alert')) { 
  function info_alert($msg = '') {?>
<div class="alert alert-info">
  <button data-dismiss="alert" class="close" type="button">×</button>
  <strong>Info: </strong> <?php echo $msg ?>
</div>
  <?php 
  }
}

if(! function_exists('date_format_by_db')) { 
  function date_format_by_db($date)
  {
      if($date!="")
      {
        $data=date("Y-m-d",strtotime($date));
      }
      else
      {
        $data="";
      }
      return $data;
  }
}

   if(! function_exists('date_format_for_datepicker')) { 
      function date_format_for_datepicker($date)
      {
          $date_form=explode("_" , $date);
          return $date_form[2].'-'.$date_form[1].'-'.$date_form[0];
      }
  }

  if(! function_exists('change_ft_data')) { 
    function change_ft_data($data='')
    {
      $data1 = explode('**',$data);
      foreach($data1 as $val)
      {
        $sparkservice1="";
        $data2 = explode('@@@',$val);
        if(isset($data2[1]))
        {
          $sparkservice1 = explode(',',$data2[1]);
        }
        if(isset($sparkservice1) && $sparkservice1!="")
        {
          for($l=0;$l<count($sparkservice1);$l++)
          {
            echo "service name :".$data2[0]." ";
            echo "Contact :".$sparkservice1[$l]."<br>";
           /* $ft_clients=$this->model->get_record("group_ft",array("service_name"=>$data2[0],"contact"=>$sparkservice1[$l]));
            if(count($ft_clients)>0)
            {
              $this->model->update("group_ft",array("service_name"=>$data2[0],"contact"=>$sparkservice1[$l],"createdate"=>date("Y-m-d")),array("service_name"=>$data2[0],"contact"=>$sparkservice1[$l]));
            }
            else
            {
              $this->model->add("group_ft",array("service_name"=>$data2[0],"contact"=>$sparkservice1[$l],"createdate"=>date("Y-m-d")));
            }*/
          }
        }
      }
    }
    }
    //-------------Pagination------------
    
    if(! function_exists('pagination'))
    { 
        function pagination($url, $rowscount, $per_page)
        {
            $ci = & get_instance();
            $ci->load->library('Ajax_pagination');
            $config = array();
            $config['base_url'] = site_url($url);
            $config["total_rows"] = $rowscount;
            $config["per_page"] = $per_page;
            $config['link_func']  = 'allpagination';
            $config['full_tag_open'] = '<nav><ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            //$ci->pagination->initialize($config);
            $ci->ajax_pagination->initialize($config);
            //return $ci->ajax_pagination->create_links();
        }
    }
    //-------------Pagination------------
    if(! function_exists('fav_query'))
    { 
        function fav_query($url, $rowscount, $per_page)
        {
            $ci = & get_instance();
            $ci->load->library('Fav_pagination');
            $config = array();
            $config['base_url'] = site_url($url);
            $config["total_rows"] = $rowscount;
            $config["per_page"] = $per_page;
            $config['link_func']  = 'favpagination';
            $config['full_tag_open'] = '<nav><ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            //$ci->pagination->initialize($config);
            $ci->fav_pagination->initialize($config);
            //return $ci->ajax_pagination->create_links();
        }
    }
    
    //-----------
    /*if(! function_exists('Ci_pagination'))
    { 
        function Ci_pagination($url, $rowscount, $per_page)
        {
            
        }
    }*/

    if(! function_exists('permission')) { 
      function permission($attr)
      {
        $CI =& get_instance();
          $perm="";
          $uid=$CI->session->userdata['CIA_admiN_loggeD_iN']['loggeduser_id'];
          $user_per=$CI->mainmodel->get_record("administrator",array("id"=>$uid));
          if(count($user_per)>0)
          {
            $perm=explode("," , $user_per[0]['permessions']);
          }
          if(in_array($attr, $perm))
          {
            return true;
          }
          else
          {
            return false;
          }
      }
  }

  if(! function_exists('get_profile_pic')) { 
    function get_profile_pic()
    {
        $CI =& get_instance();
        $user_id = $CI->session->userdata['CIA_admiN_loggeD_iN']['loggeduser_id'];
        $profile_pic = $CI->mainmodel->get_somedata('profile_pic','administrator',array('id'=> $user_id));
        if(count($profile_pic)>0)
        {
          return $profile_pic[0]['profile_pic'];
        }
        else
        {
          return false;
        }
    }
  }


  if (!function_exists('do_core_upload_file'))
{
    function do_core_upload_file($filename2='' , $upload_path='', $path_of_thumb='')
    {
        
    $allowed = array('pdf','PDF','doc','docx','jpeg','JPEG','jpg','JPG','png','PNG','xlsx','xlt','gif','GIF');
    $filename = $_FILES[$filename2]['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
 
        if(!in_array($ext,$allowed))
        {
            return FALSE;
        }
        else
        {
            if ($_FILES[$filename2]["error"] > 0)
            {
                return FALSE; 
            }
            else
            {
               $name = uniqid();           
              if(move_uploaded_file($_FILES[$filename2]['tmp_name'],$upload_path.$filename))
           
               return $filename;
               else
               return FALSE;
            }
 
        }
    }
}

if ( ! function_exists('get_data')) {  

  function get_data($table="",$id="") {

    $CI =& get_instance();

    $CI->db->where('id',$id);

    $query = $CI->db->get($table);   

    return $query->row();

  }

}

if ( ! function_exists('get_data_column')) {  

  function get_data_column($table="",$column="",$id="") {

    $CI =& get_instance();

    $CI->db->where($column,$id);

    $query = $CI->db->get($table);   

    return $query->row();

  }

}

if ( ! function_exists('getPermission')) {  

  function getPermission() {

    $CI =& get_instance();
  	$user_info=$CI->session->userdata('superadmin_information');    
  	$role=$user_info['logged_in'];
    $CI->db->where('id',$role);
  	$query = $CI->db->get('user_role');   
  	$permissions=$query->row();
  	$per=$permissions->permissions;
  	$result=explode(",",$per);
    return $result;

  }

}

?>