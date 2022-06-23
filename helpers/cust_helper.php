<?php 
    date_default_timezone_set('Asia/Kolkata');
    
   if ( ! function_exists('fetchbyresultwhere')) {  
 function fetchbyresultwhere($table="",$id="") {
      $CI =& get_instance();
      $CI->db->where($id);
      $query = $CI->db->get($table);   
      return $query->result_array();
    }
  }
  
   // rating code
if ( ! function_exists('rating')) {  
  function rating($astro_id) {
    $CI =& get_instance();
    //$query = $CI->db->where($where);
   // $query = $CI->db->get($table);   
   // return $query->result_array();
  
    $query = $CI->db->select('AVG(cr_rating) as rating');
    $query = $CI->db->from('comment_rating_astrologer');
    $query = $CI->db->where('cr_astro_id',$astro_id);
    $query = $CI->db->get();
    foreach($query->result_array() as $row)
    {
     return $row["rating"];
    }

  }
}
// rating code

   if ( ! function_exists('fetchbyresultwherelimitorder')) {  
    function fetchbyresultwherelimitorder($table="",$where="",$where2="",$limit="",$colum="",$ascdesc="") {
      $CI =& get_instance();
      $query =$CI->db->where($where);
      $query =$CI->db->or_where($where2);
      $query = $CI->db->limit($limit);
      $query = $CI->db->order_by($colum,$ascdesc);
      $query = $CI->db->get($table);   
      return $query->result_array();
    }
  }
   
   if ( ! function_exists('fetchbyresultwherelimitorders')) {  
    function fetchbyresultwherelimitorders($table="",$where="",$where2="",$limit="",$colum="",$ascdesc="") {
      $CI =& get_instance();
      $query =$CI->db->where($where);
      $query =$CI->db->or_where($where2);
      $query = $CI->db->limit($limit);
      $query = $CI->db->order_by($colum,$ascdesc);
      $query = $CI->db->get($table);   
      return true;
      //return $query->result_array();
    }
  }
   
   if ( ! function_exists('fetchbyresult')) {  
        function fetchbyresult($table="") {
          $CI =& get_instance();
          $query = $CI->db->get($table);   
          return $query->result_array();
        }
      }
      if ( ! function_exists('fetchbyresultByCondictionlimit')) {  
        function fetchbyresultByCondictionlimit($table="",$where="",$limit="") {
          $CI =& get_instance();
          $query = $CI->db->limit($limit);
          $query = $CI->db->where($where);
          $query = $CI->db->get($table);   
          return $query->result_array();
        }
      }
      if ( ! function_exists('fetchbyresultlimit')) {  



        function fetchbyresultlimit($table="",$limit="") {

      

          $CI =& get_instance();

         $query = $CI->db->limit($limit);

         $query = $CI->db->get($table);   

      

          return $query->result_array();

      

        }
}
      if ( ! function_exists('fetchbyresultByCondiction')) {  
        function fetchbyresultByCondiction($table="",$where) {
          $CI =& get_instance();
          $query = $CI->db->where($where);
          $query = $CI->db->get($table);   
          return $query->result_array();
        }
      }
      if ( ! function_exists('fetchbyresultByCondictionGroupbyCount')) {  
        function fetchbyresultByCondictionGroupbyCount($table="",$where,$groupby="") {
          $CI =& get_instance();
          $query = $CI->db->group_by($groupby);
          $query = $CI->db->where($where);
          $query = $CI->db->get($table); 
          return $query->num_rows();
        }
      }
      if ( ! function_exists('fetchbyresultByCondictionGroupby')) {  
        function fetchbyresultByCondictionGroupby($table="",$where,$groupby="",$id="") {
          $CI =& get_instance();
          $query = $CI->db->order_by($id,"DESC");
          $query = $CI->db->group_by($groupby);
          $query = $CI->db->where($where);
          $query = $CI->db->get($table); 
          
          return $query->result_array();
        }
      }
      if ( ! function_exists('fetchbyresultByCondictionOrderby')) {  
        function fetchbyresultByCondictionOrderby($table="",$where) {
          $CI =& get_instance();
        //   $query = $CI->db->select('sender_id');
        //   $query = $CI->db->DISTINCT();
        //   $query = $CI->db->order_by($orderby,"DESC");
        //   $query = $CI->db->where($where);
        //   $query = $CI->db->get($table); 
        //   return $query->result_array();
        $query = "SELECT sender_id,id FROM (SELECT sender_id, MAX(id) AS id FROM $table where $where GROUP BY sender_id DESC) as id ORDER BY id desc";
        return $query->result_array();
        }
      }
      if ( ! function_exists('fetchbyresultByCondictionRow')) {  
        function fetchbyresultByCondictionRow($table="",$where) {
          $CI =& get_instance();
          $query = $CI->db->where($where);
          $query = $CI->db->get($table);   
          return $query->num_rows();
        }
      }
      if ( ! function_exists('insertdatareturnlastid')) {  
        function insertdatareturnlastid($table="",$insertData="") {    
          $CI =& get_instance();    
         $query = $CI->db->insert($table,$insertData);   
         $insertId = $CI->db->insert_id();
        return  $insertId;
        //  return $query->result_array();
        }
      } 
      if ( ! function_exists('insertdata')) {  
        function insertdata($table="",$insertData="") {    
          $CI =& get_instance();    
         $query = $CI->db->insert($table,$insertData);   
        //  return $query->result_array();
        }
      } 
      if ( ! function_exists('addData')) {  
        function addData($table="",$insertData="") {    
          $CI =& get_instance();    
         $query = $CI->db->insert($table,$insertData);   
          return $query->result_array();
        }
      } 
    
      if ( ! function_exists('addDatas')) {  
        function addDatas($table="",$insertData="") {    
          $CI =& get_instance();    
         $query = $CI->db->insert($table,$insertData);   
          //return $query->result_array();
          return true;
        }
      }
        
      if ( ! function_exists('WalletaddData')) {  
        function WalletaddData($table="",$insertData="") {    
          $CI =& get_instance();    
         $query = $CI->db->insert($table,$insertData);   
          //return $query->result_array();
        }
      } 

      if ( ! function_exists('addWalletData')) {  
        function addWalletData($table="",$insertData="") {    
          $CI =& get_instance();    
         $query = $CI->db->insert($table,$insertData);   
          //return $query->result_array();
        }
      }
    
    if(!function_exists('deleteByWhere')){
    function deleteByWhere($table="",$where=""){
      $CI =& get_instance();
      $CI->db->delete($table,$where);
      return true;
    }
  }
    
      if ( ! function_exists('updateData')) {  
        function updateData($table="",$updateData="",$where="") {    
          $CI =& get_instance();   
          $CI->db->where($where);
          $CI->db->set($updateData);
          $query = $CI->db->update($table); 
          return true;
          //return $query->result_array();
        }
      }
     
    

      

      

    if(! function_exists('fetchpermission'))
    { 
      function fetchpermission($userid)
      {
        $CI =& get_instance();
        $query=$CI->Generalmodel->get_all_where('permission',array('admins_id'=>$userid));
        //$query = $CI->db->get_where('permission',$userid);
        if(!empty($query))
        {
            $peram=$query[0]['per_description'];
            $perm=explode(",",$peram);
            //print_r($peram);        
            return $perm;
        }
        else
        {
            $perm=array();
        }       
      }
    } 

    if ( ! function_exists('fetchbyrow')) {  



        function fetchbyrow($databasename="") {

      

          $CI =& get_instance();

      

         $query = $CI->db->get($databasename);   

      

          return $query->row();

      

        }

      

      }


    if ( ! function_exists('fetchby_wheres')) {  
      function fetchby_wheres($table="",$id="") {
        $CI =& get_instance();
        $CI->db->where($id);
        $query = $CI->db->get($table);   
        return $query->result_array();
        //return $query->row();
      }
    }


  if ( ! function_exists('fetchbyrow_where')) {  
        function fetchbyrow_where($table="",$id="") {
          $CI =& get_instance();
          $CI->db->where('id',$id);
          $query = $CI->db->get($table);   
          return $query->row();
        }
      }


      








      if ( ! function_exists('fetchbyrow_where_dbid')) {  



        function fetchbyrow_where_dbid($table="",$id="",$dbid="") {

      

          $CI =& get_instance();

      

          $CI->db->where($dbid,$id);

      

          $query = $CI->db->get($table);   

      

          return $query->row();

      

        }

      

      }




      if ( ! function_exists('fetchbyrow_where_dbid_like')) {  



        function fetchbyrow_where_dbid_like($table="",$id="",$dbid="") {

      

          $CI =& get_instance();

      
          $CI->db->where("$dbid LIKE '%$id%'");
         
         // $CI->db->where($dbid,$id);

      

          $query = $CI->db->get($table);   

      

          return $query->row();

      

        }

      

      }

      if ( ! function_exists('fetchbyresult_where')) {  
        function fetchbyresult_where($table="",$id="",$dbid="") {
          $CI =& get_instance();
          $CI->db->where($dbid,$id);
          $query = $CI->db->get($table);   
          return $query->result_array();
        }
      }
// =====================================================

      if ( ! function_exists('twotablejoin')) 
      {  
        function twotablejoin($table1="",$table2="",$joincondiction="",$condiction="") 
        {
          $CI =& get_instance();
          $CI->db->select('*');
          $CI->db->from($table1);
          $CI->db->where($condiction);
          $CI->db->join($table2,$joincondiction);
          $query = $CI->db->get();       
          return $query->result_array();
        }
      }
      
      if ( ! function_exists('cat_fetch_join')) 
      {  
        function cat_fetch_join($table1="",$table2="",$id="") 
        {
          $CI =& get_instance();
          $CI->db->select('*');
          $CI->db->from($table1);
          $CI->db->where('astrologer_id_m',$id);
          $CI->db->join($table2,'category_astrologer.cat_astr_id=astrologers_multiplecategories.astrologer_cat_id');
          $query = $CI->db->get();       
          return $query->result_array();
        }
      }

  // ======================

  if ( ! function_exists('fetchbyresultlimitorder')) {  



    function fetchbyresultlimitorder($table="",$limit="",$colum="",$ascdesc="") {

  

      $CI =& get_instance();

     $query = $CI->db->limit($limit);

     $query = $CI->db->order_by($colum,$ascdesc);

     $query = $CI->db->get($table);   

  

      return $query->result_array();

  

    }

  

  }
//   ASTROLOGER RANKING ORDER WHERE
   if ( ! function_exists('astrologerfetchorderlimitwhere')) {
    function astrologerfetchorderlimitwhere($table="",$colum="",$ascdesc="",$where="") 
    {
        $CI =& get_instance();
        $query =$CI->db->where($where);
        $query = $CI->db->order_by($colum,$ascdesc);
        $query = $CI->db->get($table);   
        return $query->result_array();
      }
}

  if ( ! function_exists('astrologerfetchbyresult')) {  



    function astrologerfetchbyresult($table="") {

  

      $CI =& get_instance();

  

     $query = $CI->db->get($table);   

  

      return $query->result_array();

  

    }

  

  }



  if ( ! function_exists('blog_author_fetch_join')) {  

        

    function blog_author_fetch_join() {

   $CI =& get_instance();

      $CI->db->select('*,blog.image as bimage,blog.timestamp as btimestamp');

      $CI->db->from('blog');

      $CI->db->where('blog_approval_status','1');

      $CI->db->join('admin','admin.id=blog.published_by');
      $query = $CI->db->order_by('blog_id','desc');
      $query = $CI->db->get();   

      return $query->result_array();

  

    }

  

  }

  

  if ( ! function_exists('random')) {  



    function random($table="", $by="") {

  

      $CI =& get_instance();

      $query = $CI->db->order_by($by,'RANDOM');

      $query = $CI->db->limit(1);

     $query = $CI->db->get($table);   

  

      return $query->result_array();

    }

  }

  if ( ! function_exists('fetchbyresult_where_status')) {  



    function fetchbyresult_where_status($table="",$id="",$dbid="",$dbstatus="",$statusequaltooneorzero="") {

  

      $CI =& get_instance();

  

      $CI->db->where($dbid,$id);
      $CI->db->where($dbstatus,$statusequaltooneorzero);
  

      $query = $CI->db->get($table);   

  

      return $query->result_array();

  

    }

  

  }


  if ( ! function_exists('countwhere')) {  



    function countwhere($tableName, $filters = NULL) {
      $CI =& get_instance();
      if ($filters != NULL) {
       
        $CI->db->where($filters);
        $count = $CI->db->count_all_results($tableName);
        return $count;
      }
      else
      {
        $count = $CI->db->count_all($tableName);
                 return $count;
      }
      
    }

  }

  
if ( ! function_exists('fetchbywhereorder')) {  

function fetchbywhereorder($table="",$id="",$ascdesc = "",$colum = "") {

        $CI =& get_instance();
        $CI->db->where($id);

    if($colum != "" && $ascdesc != "") {
      $query = $CI->db->order_by($colum,$ascdesc);
    }
    $query = $CI->db->get($table);   
    return $query->result_array();
    //return $query->row();
  }
}
if ( ! function_exists('fetchbywhereorder2')) {  

  function fetchbywhereorder2($table="",$id="",$ascdesc = "",$colum = "",$ascdesc2 = "",$colum2 = "") {
  
          $CI =& get_instance();
          if($id != "" ) {
          $CI->db->where($id);
          }
      if($colum != "" && $ascdesc != "") {
        $CI->db->order_by($colum2,$ascdesc2);
        $CI->db->order_by($colum,$ascdesc);
         
      }
      $query = $CI->db->get($table);   
      return $query->result_array();
      //return $query->row();
    }
  }



      if (!function_exists('send_mail')) 

      {

         function send_mail($toemail, $msg, $subject, $attachment='') 

         {
          
         $ci=&get_instance();
         $ci->load->library('email');

         $config['protocol'] = 'smtp';
         $config['smtp_host'] = 'ssl://astrovedvakta.com'; //smtp host name

         $config['smtp_port'] = '465'; //smtp port number

         $config['smtp_user'] = 'contact@astrovedvakta.com';//info@1in100.uk

         $config['smtp_pass'] = 'Abx@9876!@'; //1in100@uk $from_email password

         $config['mailtype'] = 'html';
        //  $config['smtp_crypto'] = 'ssl';
        
         $config['charset'] = 'utf-8';

         $config['wordwrap'] = TRUE;

         $config['newline'] = "\r\n"; //use double quotes

         $ci->email->initialize($config);

         $ci->email->from('contact@astrovedvakta.com','Astro Vakta'); 

         $ci->email->to($toemail);

         $ci->email->subject($subject); 

         $ci->email->message($msg);

         if(isset($attachment)){ $ci->email->attach($attachment); }

         $ci->email->send();

       }

     } 



   if(!function_exists('encoding')){

     function encoding($str){

         $one = serialize($str);

         $two = @gzcompress($one,9);

         $three = addslashes($two);

         $four = base64_encode($three);

         $five = strtr($four, '+/=', '-_.');

         return $five;

     }

    }


    




    if ( ! function_exists('decoding')) {

     function decoding($str){

       $one = strtr($str, '-_.', '+/=');

         $two = base64_decode($one);

         $three = stripslashes($two);

         $four = @gzuncompress($three);

         if ($four == '') {

             return "z1";

         } else {

             $five = unserialize($four);

             return $five;

         }

     }

    }  

// google
// google 
if ( ! function_exists('customgoogle')) {

  function customgoogle(){

include_once APPPATH . "libraries/vendor/autoload.php";

$google_client = new Google_Client();

$google_client->setClientId('436344221628-j06jsj4mtafhjb8vjpk8dr5ul5tp17jj.apps.googleusercontent.com'); //Define your ClientID

$google_client->setClientSecret('_9oKPGjWmUfzFo_hgAbjJFXj'); //Define your Client Secret Key

// $google_client->setRedirectUri('http://testpnp.ml/astro/google_controller/login'); //Define your Redirect Uri
$google_client->setRedirectUri('https://www.astrovedvakta.com/google_controller/login'); //Define your Redirect Uri

$google_client->addScope('email');

$google_client->addScope('profile');

if(isset($_GET["code"]))
{
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 if(!isset($token["error"]))
 {
  $google_client->setAccessToken($token['access_token']);

  $this->session->set_userdata('access_token', $token['access_token']);

  $google_service = new Google_Service_Oauth2($google_client);

  $data = $google_service->userinfo->get();

  $current_datetime = date('Y-m-d H:i:s');

  if($this->googlee_model->Is_already_register($data['id']))
  {
   //update data
   $user_data = array(
	'user_first_name' => $data['given_name'],
	'user_last_name'  => $data['family_name'],
	'user_email' => $data['email'],
	'user_image'=> $data['picture'],
	'user_timestamp' => $current_datetime
   );

   $this->googlee_model->Update_user_data($user_data, $data['id']);

   redirect(base_url().'userdashboard','refresh');
  }
  else
  {
   //insert data
   $user_data = array(
	'user_sms_verified'=>1,
	'user_approval_status'=>1,
	'user_approval_status'=>1,
	'oauth_provider'=>"google",
	'registerby'=>"google",
	'oauth_uid' => $data['id'],
	'user_first_name'  => $data['given_name'],
	'user_last_name'   => $data['family_name'],
	'user_email'  => $data['email'],
	'user_image' => $data['picture'],
	'user_timestamp'  => $current_datetime
   );

   $this->googlee_model->Insert_user_data($user_data);
  }
  $this->session->set_userdata('user_data', $user_data);
 }
}
$login_button = '';

$login_button = $google_client->createAuthUrl();
  //$login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'image/websiteimages/google.png" /></a>';
return  $pagedata['login_button'] = $login_button;
  }}
// google

// ==============================================================================================
// ======================================F A C E B O O K ========================================================
// facebook start

if ( ! function_exists('customfacebook')) {

  function customfacebook(){
     
    $userData = array(); 
         
    // Authenticate user with facebook 
    if($this->facebook->is_authenticated()){ 
        // Get user info from facebook 
        $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 

        // Preparing data for database insertion 
        $userData['oauth_provider'] = 'facebook'; 
        $userData['oauth_uid']    = !empty($fbUser['id'])?$fbUser['id']:'';; 
        $userData['user_first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
        $userData['user_last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
        $userData['user_email']        = !empty($fbUser['email'])?$fbUser['email']:''; 
        $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:''; 
        $userData['user_image']    = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
        $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 
         
         $userData = array(
                'user_sms_verified'=>1,
                'user_approval_status'=>1,
                'registerby'=>"facebook",
                'user_timestamp'=> date("Y-m-d H:i:s"),
                //'oauth_provider'=>"facebook",
                //'oauth_uid' => $data['id'],
               // 'user_first_name'  => $data['given_name'],
               // 'user_last_name'   => $data['family_name'],
               // 'user_email'  => $data['email'],
               // 'user_image' => $data['picture'],
               
               );
        // Insert or update user data to the database 
        $userID = $this->facebook_model->checkUser($userData); 
         
        // Check user data insert or update status 
        if(!empty($userID)){ 
            $data['userData'] = $userData; 
             
            // Store the user profile info into session 
            $this->session->set_userdata('userfacebook', $userData); 
        }else{ 
           $data['userData'] = array(); 
        } 
         
        // Facebook logout URL 
        $data['logoutURL'] = $this->facebook->logout_url(); 
    }
    else
    { 
        // Facebook authentication url 
        return  $data['authURL'] =  $this->facebook->login_url(); 
    } 
     
    // Load login/profile view 
  //  $this->load->view('user_authentication/index',$data); 
  redirect(base_url().'userdashboard','refresh');
  // redirect(base_url().'Facebook_controller','refresh');
  }}


// facebook end

if ( ! function_exists('fetchbyresult_where_returnrow')) {  
 function fetchbyresult_where_returnrow($table="",$id="",$dbid="") {
    $CI =& get_instance();
    $CI->db->where($dbid,$id);
    $query = $CI->db->get($table);   
    return $query->num_rows();
  }
}


?>