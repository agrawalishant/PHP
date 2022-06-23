<style>
.checked {
  color: orange;
}
.astro_predic_form {
  display: none;
}
</style>
<!-- CSS FOR CHAT START -->
<style>
.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
  display: none;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 100%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
.cht-hist li{
 width:100%;   
}
#menu {
    display: flex;
    justify-content: space-between;
    padding: 15px;
    background-color: #ff9800;
    color: #ffffff;
}
.mr-btm {
 margin-bottom:0px;   
}

.cht-contner {
    padding-bottom:0px;
}
div#chat_messages-01 {
    height: 200px;
    overflow: auto;
    background-color: #f5f5f5;
    position: relative;
    z-index: 9;
    padding-top: 5px !important;
    padding: 0;
    box-shadow: 0px 0px 5px 0px rgb(255 255 255 / 50%);
}
.cht-hght {
 height:220px;
 overflow:auto;
}
.astro-cht-icon {
        position: absolute;
    left: 10px;
    right: 10px;
    bottom: 0px;
    z-index: 0;
}
.astro-cht-section{
    height: 170px;
    overflow: auto;
}
.cht-hist > li.active > a, .cht-hist > li.active > a:hover, .cht-hist > li.active > a:focus {
        background-color: #ff9800;
}
.astro-cht-icon .form-control {
    height:auto;
    padding-right: 40px;
}
.cht-hist li a {
 border-radius:0px;   
}
.tel-chtIcon {
    font-size: 24px;
}
.tel-chtButton {
    position: relative;
    float: right;
    margin-top: -31px;
    right: 5px;
    padding: 2px 5px;
    border: none;
    background: none;
}
.noti {
    background-color: #506743;
    color: #ffffff;
    padding: 2px 7px;
    border-radius: 100%;
    float: right;
}
</style>
<script>
$(document).ready(function(){
    $("#myModalChat").modal({
        show:false,
        backdrop:'static'
    });
});
</script>

<!-- script for form submit --><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- DataTables CSS -->

<link href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css" rel="stylesheet" />



<!-- DataTables JS -->

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>


<?php

//$folder = $this->session->userdata('user_folder_name');

$astro_email = $this->session->userdata('astro_email');

$astro_name = $this->session->userdata('astro_name');

$astro_id = $this->session->userdata('astro_id');



$getdata = $this->db->get_where('astrologers', array('astro_id' => $astro_id))->row();

$call_wat = $getdata->astro_call_watting_time;

$chat_wat = $getdata->astro_chat_watting_time;

//$level = $getdata->user_level;

$astro_name=$getdata->astro_name;



if ($astro_id == ''||$astro_email==''||$astro_name=='') {

    redirect(base_url(), 'astrologer_login_page', 'refresh');

} ?>

<?php //  $astrobalance=fetchbyresult('wallet_astrologer');  

$astrobalance = fetchbyresultByCondiction('wallet_astrologer', array('wa_astrologer_id' => $astro_id));

if(!empty($astrobalance['0']['wa_wallet_amount']))

{

  $astrobal =  $astrobalance['0']['wa_wallet_amount'] ;

}

else{

  $astrobal = '0';

}

?>



<input type="hidden" class="okass" id="okas" value="<?php echo $astro_id ; ?>" name="astro_id" >

    <!-- hs Navigation End -->



    <!-- hs About Title Start -->



    <div class="hs_indx_title_main_wrapper">



        <div class="hs_title_img_overlay"></div>



        <div class="container">



            <div class="row">



                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">



                  <div class="hs_indx_title_left_wrapper">



                    <h2><?php echo $page_title;?></h2>

                   </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">



                    <div class="hs_indx_title_right_wrapper">

                      

                      <ul>



                        <li><a href="<?php echo base_url('astrologerdashboard'); ?>">Home</a> &nbsp;&nbsp;&nbsp;> </li>



                        <li><?php echo $page_title;?></li>



                      </ul>



                    </div>



                </div>



            </div>



        </div>



    </div>



    <!-- hs About Title End -->



    <!-- hs sidebar Start -->



    <div class="hs_blog_categories_main_wrapper">

      <div class="container">

        <div class="row">

          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="hs_shop_tabs_sec_wrapper mb-15">

              <div class="available-balance">

                <h4 style="float: left;margin-bottom: 0px;margin-top: 20px;font-weight: 600;color: #f88713;"> WELCOME :- <?php echo $astro_name;?> </h4>

                    <a href="#">Available balance <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $astrobal ;?> </a>


                    <a href="<?php echo base_url();?>logout_astrologer" class="recharge-btn">Logout</a>               
              </div>

            </div>      

          </div>

        </div>
       

        <div class="row">



          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">



            <div class="hs_blog_right_sidebar_main_wrapper">



              <div class="row">



                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                

                      <!-- <div class="hs_blog_right_search_wrapper">



                        <input type="text" placeholder="Search Astrologers..">

                        <button type="submit"><i class="fa fa-search"></i></button>



                      </div> -->

                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                      <div class="hs_blog_right_cate_list_heading_wrapper" style="margin-top: 0px !important;">

                        <h4 style="color: #fff;">AstroVed</h4>

                      </div>



                      <div class="hs_blog_right_cate_list_cont_wrapper" >

                          <ul class="nav nav-pills hs-astro-user-tabs">

                            <li class="active">

                              <a data-toggle="pill" href="#user-profilemenu"> 

                                <i class="fa fa-cog" aria-hidden="true"></i>

                               &nbsp; Profile

                              </a>

                            </li>

                            <li>

                              <a data-toggle="pill" href="#profilemenu-01">

                                <i class="fa fa-google-wallet" aria-hidden="true"> 

                                </i>&nbsp;REPORT GENERATION REQUEST / HISTORY

                              </a>

                            </li> 

                            <li>

                              <a data-toggle="pill" href="#profilemenu-10">

                                <i class="fa fa-paper-plane" aria-hidden="true"> 

                                </i>&nbsp; PAYMENT REPORT

                              </a>

                            </li>

                            <li>

                              <a data-toggle="pill" href="#profilemenu-11">

                                <i class="fa fa fa-money" aria-hidden="true"> 

                                </i>&nbsp; PAYMENT REQUEST 

                              </a>

                            </li>

                            <li>

                              <a data-toggle="pill" href="#profilemenu-12">

                                <i class="fa fa-paper-plane" aria-hidden="true"> 

                                </i>&nbsp;PAYMENT REQUEST HISTORY FROM ADMIN

                              </a>

                            </li>

                            <li>

                              <a data-toggle="pill" href="#profilemenu-06"> 

                                <i class="fa fa-female" aria-hidden="true"></i>

                               &nbsp; Customer Support

                              </a>

                            </li>

                            <li>

                              <a data-toggle="pill" href="#profilemenu-09"> 

                                <i class="fa fa-bell" aria-hidden="true"></i>

                               &nbsp; Notification

                              </a>

                            </li>     
                                 
                             <li>

                              <a data-toggle="pill" href="#profilemenu-14">

                                <i class="fa fa-paper-plane" aria-hidden="true"> 

                                </i>&nbsp; Chat History

                              </a>

                            </li>
                            <li>

                                  <a data-toggle="pill" href="#profilemenu-15">

                                    <i class="fa fa-paper-plane" aria-hidden="true"> 

                                    </i>&nbsp;Call History

                                  </a>
                                
                            </li>
                             <li>
                                <?php 
                                    $ch = fetchbyresultByCondictionGroupbyCount('chat_messsage',array('reciver_id'=>$astro_id,'reading_status'=>0),'sender_id'); 
                                    $this->session->set_userdata('asid',$astro_id);
                                    $asid = $this->session->userdata('asid');
                                    $this->session->set_userdata('asname',$astro_name);
                                    $asname = $this->session->userdata('asname');
                                    if(!empty($ch)){
                                ?>
                                <!--<a data-toggle="pill" href="#profilemenu-16" onclick="chatopenstart();" >-->
                                <!--    <i class="fa fa-paper-plane" aria-hidden="true"></i> -->
                                <!--    <b><span style="color:green">Chat &nbsp;&nbsp;&nbsp;<span><?php echo $ch; ?></span></span></b>   -->
                                <!--</a>-->
                                
                                <a href="<?php echo base_url('astrochat'); ?>" target="_blank" >
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i> 
                                    <b><span style="color:green">Chat &nbsp;&nbsp;&nbsp;<span><?php echo $ch; ?></span></span></b>   
                                </a>
                                <?php }else{ ?>
                                <!--<a data-toggle="pill" href="#profilemenu-16" onclick="chatopenstart();">-->
                                <!--    <i class="fa fa-paper-plane" aria-hidden="true"></i> -->
                                <!--    &nbsp;Chat    -->
                                <!--</a>-->
                                <a href="<?php echo base_url('astrochat'); ?>" target="_blank" >
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i> 
                                    &nbsp;Chat
                                </a>
                                <?php } ?>
                            </li>

                          </ul>

                      </div>

                  </div>

              </div>

            </div>

          </div>



          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <div class="hs_blog_left_sidebar_main_wrapper">

              <div class="row">

                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                          <div class="hs_shop_tabs_cont_sec_wrapper" style="margin-top:0px !important;">

                            <div class="tab-content">

                             <!-- profile -->

                              <!-- <div id="profilemenu-07" class="tab-pane fade"> -->

                                <div id="user-profilemenu" class="tab-pane fade in active">

                                  <div class="hs-astro-profile-seting">

                                    <div class="row">

                                      <div class="col-md-8">

                                        <div class="hs-astro-profile-section divider-01">

                                          <div class="hs-astroProfile-heading">

                                            <h3>Profile Information</h3>

                                          </div>

                                          <div class="row">

                                            <?php echo form_open_multipart(base_url().'update_astrologer_profile/updateprofile/'.$astro_id); ?>

                                            <div class="col-md-6">

                                              <div class="hs-astroProfile-form">

                                                <div class="hs-astroProfile-form-icon">

                                                  <i class="fa fa-user" aria-hidden="true"></i>

                                                </div>

                                                <div class="hs-astroProfile-form-content">

                                                  <div class="form-group">

                                                    <label>Name</label>

                                                    <input type="text" placeholder="Enter Name" name="astro_name" value="<?php echo $nm=$getdata->astro_name;?>" class="form-control" onfocus="this.placeholder=''" onblur="this.placeholder='Enter Name'">



                                                  </div>

                                                </div>

                                              </div>

                                            </div>

                                            <div class="col-md-6">

                                              <div class="hs-astroProfile-form">

                                                <div class="hs-astroProfile-form-icon">

                                                  <i class="fa fa-envelope-o" aria-hidden="true"></i>

                                                </div>

                                                <div class="hs-astroProfile-form-content">

                                                  <div class="form-group">

                                                    <label>Email</label>

                                                    <input type="email" name="astro_email" value="<?php echo $e=$getdata->astro_email;?>" placeholder="Enter Email" class="form-control" onfocus="this.placeholder=''" onblur="this.placeholder='Enter Email'">

 

                                                  </div>

                                                </div>

                                              </div>

                                            </div>

                                          </div>

                                          <div class="row">

                                            <div class="col-md-6">

                                              <div class="hs-astroProfile-form">

                                                <div class="hs-astroProfile-form-icon">

                                                  <i class="fa fa-phone" aria-hidden="true"></i>

                                                </div>

                                                <div class="hs-astroProfile-form-content">

                                                  <div class="form-group">

                                                    <label>Mobile Number</label>

                                                    <input type="text" name="astro_mobile" value="<?php echo $m=$getdata->astro_mobile;?>" id="contact_mobilenumber" pattern="[1-9]{1}[0-9]{9}" maxlength="10" placeholder="Enter Number" class="form-control" onfocus="this.placeholder=''" onblur="this.placeholder='Enter Number'">



                                                  </div>

                                                </div>

                                              </div>  

                                              

                                            </div>

                                            <div class="col-md-6">

                                              <div class="hs-astroProfile-form">

                                                <div class="hs-astroProfile-form-icon">

                                                  <i class="fa fa-bandcamp" aria-hidden="true"></i>

                                                </div>

                                                <div class="hs-astroProfile-form-content">

                                                  <div class="form-group">

                                                    <label>Country</label>

                                                    <input type="text" name="country" class="form-control" value="<?php echo $e=$getdata->country;?>">

                                                  </div>

                                                </div>

                                              </div>

                                            </div>

                                          </div>

                                          <div class="row">

                                            <div class="col-md-6">

                                              <div class="hs-astroProfile-form">

                                                <div class="hs-astroProfile-form-icon">

                                                  <i class="fa fa-cogs" aria-hidden="true"></i>

                                                </div>

                                                <div class="hs-astroProfile-form-content">

                                                  <div class="form-group">

                                                    <label>Skills</label>

                                                    <input type="text" name="skill" class="form-control" value="<?php echo $e=$getdata->skill;?>">

                                                  </div>

                                                </div>

                                              </div>  

                                              

                                            </div>

                                            <div class="col-md-6">

                                              <div class="hs-astroProfile-form">

                                                <div class="hs-astroProfile-form-icon">

                                                  <i class="fa fa-language" aria-hidden="true"></i>

                                                </div>

                                                <div class="hs-astroProfile-form-content">

                                                  <div class="form-group">

                                                    <label>Language</label>

                                                    <input type="text" name="astro_language" class="form-control" value="<?php echo $e=$getdata->astro_language;?>">

                                                  </div>

                                                </div>

                                              </div>

                                            </div>

                                          </div>

                                          <div class="row">

                                            <div class="col-md-6">

                                              <div class="hs-astroProfile-form">

                                                <div class="hs-astroProfile-form-icon">

                                                  <i class="fa fa-graduation-cap" aria-hidden="true"></i>

                                                </div>

                                                <div class="hs-astroProfile-form-content">

                                                  <div class="form-group">

                                                    <label>Experience</label>

                                                    <input type="text" name="astro_experience" class="form-control" value="<?php echo $e=$getdata->astro_experience;?>">

                                                  </div>

                                                </div>

                                              </div>  

                                              

                                            </div>

                                            <div class="col-md-6">

                                              <div class="hs-astroProfile-form">

                                                <div class="hs-astroProfile-form-icon">

                                                  <i class="fa fa-university" aria-hidden="true"></i>

                                                </div>

                                                <div class="hs-astroProfile-form-content">

                                                  <div class="form-group">

                                                    <label>Bank Account Number</label>

                                                    <input type="text" name="ac_number" class="form-control" value="<?php echo $e=$getdata->ac_number;?>">

                                                  </div>

                                                </div>

                                              </div>

                                            </div>

                                          </div>

                                          <div class="row">

                                            <div class="col-sm-12">

                                              <div class="hs-astroProfile-form">

                                                <div class="hs-astroProfile-form-icon">

                                                  <i class="fa fa-address-card-o" aria-hidden="true"></i>

                                                </div>

                                                <div class="hs-astroProfile-form-content">

                                                  <div class="form-group">

                                                    <label>Address</label>

                                                    

                                                    <input type="text" name="address" class="form-control" value="<?php echo $e=$getdata->address;?>">

                                                  </div>

                                                </div>

                                              </div>

                                            </div>

                                          </div>

                                              <!-- categories -->

                                              <div class="row">

                                                <div class="col-sm-12">

                                                  <div class="hs-astroProfile-form">

                                                    <div class="hs-astroProfile-form-icon">

                                                      <i class="fa fa-address-card-o" aria-hidden="true"></i>

                                                    </div>

                                                    <div class="hs-astroProfile-form-content">

                                                      <div class="form-group">

                                                        <label>categories</label>

                                                        <?php 

                                                        $categ=fetchbyresult('category_astrologer');

                                                        foreach($categ as $dep){

                                                                //  //$table="",$id="",$dbid="" using helper

                                                                $sec_tbl= fetchbyresult_where('astrologers_multiplecategories',$astro_id,'astrologer_id_m');

                                                              

                                                                  ?>

                                                              

                                                                <input   <?php foreach($sec_tbl as $tbl) { if($tbl['astrologer_cat_id']==$dep['cat_astr_id']) { ?> checked <?php } } ?> 

                                                                type="checkbox" name="astrologer_cat_id[]" id="<?php echo $dep['cat_astr_id'];?>" value="<?php echo $dep['cat_astr_id'];?>" >

                                                                    -- <label for="customCheckbox2"><?php echo $dep['cat_astr_title'];?></label>--

                                                                    <?php } ?>

                                                        <!-- <input type="text" name="address" class="form-control" value="<?php echo $e=$getdata->address;?>"> -->

                                                      </div>

                                                    </div>

                                                  </div>

                                                </div>

                                              </div>

                                              <!-- categories -->

                                          <div class="hs-astroProfile-form">

                                            <div class="hs-astroProfile-form-img">

                                            <img src="<?php echo base_url();?>image/astrologers/<?php echo $e=$getdata->astro_image;?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" class="team-img">

 

                                            </div>

                                            <div class="hs-astroProfile-form-content">

                                              <div class="form-group">

                                                <label>Profile image</label>

                                                <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">

  

                                              </div>

                                            </div>

                                          </div>

                                        </div>



                                        <button name="submit1" type="submit" value="submit" class="astroprofile-updt-btn">UPDATE</button>

                                        <?php echo form_close(); ?>

                                        <div class=" hs-astro-profile-status hs-astro-profile-section">

                                          <h4>Astrologer Login Information</h4>

                                          <div class="table-responsive">

                                            <table class="table"> 

                                              <thead>

                                                <tr>

                                                  <th><h4>Type</h4></th>

                                                  <th><h4>Status</h4></th>

                                                  <th><h4>Next Online Time</h4></th>

                                                </tr>

                                              </thead>

                                              <tbody>

                                              <!--<tr>

                                                    <td>Report</td>

                                                        <td>

                                                          <label class="hs-astroprofile-switch">

                                                            <input type="checkbox">

                                                            <span class="hs-astroprofileslider"></span>

                                                          </label>

                                                        </td>

                                                        <td>

                                                          <input type="text" name="name" class="form-control">

                                                        </td>

                                                    </tr> -->



                                                <!-- chat start -->

                                                <tr>

                                                  <td>Chat<?php  $chtst=$getdata->astro_online_chat_status; ?></td>

                                                  <td>

                                                  	<?php if(!empty($chat_wat) && $chtst==0) { ?>

                                                  	<img src="<?php echo base_url('assets/frontend/images/content/OFF.PNG');?>" onclick="calwatim('<?php echo $chat_wat; ?>');">

                                                  	<?php }else{ ?>

                                                    <label class="hs-astroprofile-switch">

                                                      <input type="hidden" name="" value="<?php echo $chtst;?>" id="chat_time_ck" />

                                                      <input type="checkbox" id="onoffchat" <?php if($chtst == 1){ ?> checked="checked"  <?php }else{ } ?> value="<?php echo $chtst;?>" >

                                                     <span class="hs-astroprofileslider"></span>

                                                    </label>

                                                	<?php } ?>

                                                  </td>

                                                  <td>

                                                    <select class="form-control" name="chat_watime" id="chat_watime" onchange="chatwatime();">

                                                      

                                                      <?php 

                                                      if(!empty($chat_wat) && $chtst==0) 

                                                      { ?>

                                                      <option value="<?php echo $chat_wat;?>"><?php echo "Wait for ".$chat_wat;echo " min";?></option>	

                                                      <?php }else { ?>

                                                      	<option value="0">Select Watting Minutes For Chat</option>

                                                      <?php 	

                                                      $a = 60/5;

                                                      for($i=1;$i<=$a;$i++)

                                                      { ?>  

                                                      <option value="<?php echo $i*5;?>"><?php echo $i*5;echo " min";?></option>

                                                      <?php } } ?>

                                                    </select>

                                                  </td>

                                                </tr>

                                                <!-- chat end -->



                                                <!-- call start -->

                                                <tr>

                                                  <td>Call<?php $cllst=$getdata->astro_online_call_status; //echo $cllst,$call_wat; ?></td>

                                                  <td>

                                                  	<?php if($call_wat != '' && $cllst==0) { ?>

                                                  	<img src="<?php echo base_url('assets/frontend/images/content/OFF.PNG');?>" onclick="calwatim('<?php echo $call_wat; ?>');">

                                                  	<?php }else{ ?>

                                                    <label class="hs-astroprofile-switch">

                                                      <input type="hidden" name="" value="<?php echo $cllst;?>" id="call_time_ck" />

                                                      <input type="checkbox" id="onoffcall" <?php if($cllst == '1'){ ?> checked  <?php }else{ } ?> value="<?php echo $cllst;?>">

                                                      <span class="hs-astroprofileslider"></span>

                                                    </label>

                                                	<?php } ?>

                                                  </td>

                                                  <td>

                                                    <select class="form-control" name="call_watime" id="call_watime" onchange="callwatime();">

                                                    <?php if(!empty($call_wat) && $cllst==0) { ?>

                                                    <option value="<?php echo $call_wat;?>"><?php echo "Wait For ".$call_wat;echo " min";?></option>

                                                    <?php }else{ ?>	

                                                      <option value="0">Select Watting Minutes For Call</option>

                                                      <?php 

                                                      $a = 60/5;

                                                      for($i=1;$i<=$a;$i++)

                                                      { ?>  

                                                      <option value="<?php echo $i*5;?>"><?php echo $i*5;echo " min";?></option>

                                                      <?php } } ?>

                                                    </select>

                                                    <!-- <input type="text" name="time" class="form-control" placeholder="Enter Watting Minutes For Call"> -->

                                                  </td>

                                                  <!-- <td>

                                                    <button type="button" id="callwaitsub" class="btn btn-primary" style="color: #fff;background-color: #fe8a13;border-color: #2196f3;">Submit</button>

                                                  </td> -->

                                                </tr>

                                                <!-- call end -->

                                                <!-- <tr>

                                                  <td>Promotional</td>

                                                  <td>

                                                    <label class="hs-astroprofile-switch">

                                                      <input type="checkbox">

                                                      <span class="hs-astroprofileslider"></span>

                                                    </label>

                                                  </td>

                                                  <td>

                                                    <input type="text" name="name" class="form-control">

                                                  </td>

                                                </tr> -->

                                              </tbody>

                                            </table>

                                          </div>  

                                        </div>

                                      </div>

                                     

                                      <div class="col-md-4">

                                        <div class="hs-astro-profile-section">

                                          <div class="hs-astroProfile-heading">

                                            <h4>Change Password</h4>

                                          </div>

                                          <div class="hs-astroProfile-form">

                                            <div class="hs-astroProfile-form-icon">

                                              <i class="fa fa-unlock" aria-hidden="true"></i>

                                            </div>

                                            <?php echo form_open_multipart(base_url().'update_astrologer_password/updatepassword/'); ?>

                                     

                                            <div class="hs-astroProfile-form-content" style="width: 100%;">

                                              <div class="form-group">

                                                <label>Old Password</label>

                                                <input type="Password" name="oldpassword" class="form-control">

                                              </div>

                                            </div>

                                          </div>

                                          <div class="hs-astroProfile-form">

                                            <div class="hs-astroProfile-form-icon">

                                              <i class="fa fa-lock" aria-hidden="true"></i>

                                            </div>

                                            <div class="hs-astroProfile-form-content">

                                              <div class="form-group">

                                                <label>New Password</label>

                                                <input type="Password" name="newpassword" class="form-control">

                                              </div>

                                            </div>

                                          </div>

                                          <div class="hs-astroProfile-form">

                                            <div class="hs-astroProfile-form-icon">

                                              <i class="fa fa-lock" aria-hidden="true"></i>

                                            </div>

                                            <div class="hs-astroProfile-form-content">

                                              <div class="form-group">

                                                <label>Confirm Password</label>

                                                <input type="Password" name="confpassword" class="form-control">

                                              </div>

                                            </div>

                                          </div>

                                          <div class="hs-astroProfile-form">

                                            <div class="">

                                              <div class="form-group">

                                              <button name="submit" type="submit" value="submit" class="astroprofile-updt-btn">UPDATE</button>

                                          

                                                <!-- <input type="button" name="button" value="Change Password" class="form-control chngepaswordBtn"> -->

                                              </div>

                                            </div>

                                            <?php echo form_close(); ?>

                                          </div>

                                        </div>
                                      </div>
                                      <!-- Discount Start -->
                                      <div class="col-md-4">
                                        <div class="hs-astro-profile-section">
                                          <div class="hs-astroProfile-heading">
                                            <h4>Update Discounts And Rate</h4>
                                            <!-- <h6>TYPE 0 for NO  Discounts</h6> -->
                                          </div>

                                          <div class="hs-astroProfile-form">
                                            <div class="hs-astroProfile-form-icon">
                                              <i class="fa fa-comments" aria-hidden="true"></i>
                                            </div>
                                            <?php echo form_open_multipart(base_url().'update_astrologer_discount/updatediscount/'.$astro_id); ?>                                   
                                            <div class="hs-astroProfile-form-content" style="width: 100%;">
                                              <div class="form-group">
                                                <label>Chat Discount %</label>
                                                <input type="number" name="astro_chat_rate_discount" class="form-control" placeholder="Enter Discount %" value="<?php echo $crdis=$getdata->astro_chat_rate_discount;?>">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="hs-astroProfile-form">
                                            <div class="hs-astroProfile-form-icon">
                                              <i class="fa fa-phone" aria-hidden="true"></i>
                                            </div>
                                            <div class="hs-astroProfile-form-content">
                                              <div class="form-group">
                                                <label>Call Discount %</label>
                                                <input type="number" name="astro_calling_rate_discount" class="form-control" placeholder="Enter Discount %" value="<?php echo $clrdi=$getdata->astro_calling_rate_discount;?>">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="hs-astroProfile-form">
                                            <div class="hs-astroProfile-form-icon">
                                              <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                            </div>
                                            <div class="hs-astroProfile-form-content">
                                              <div class="form-group">
                                                <label>Report Discount %</label>
                                                <input type="number" name="astro_report_rate_discount" class="form-control" placeholder="Enter Discount %" value="<?php echo $rrdisc=$getdata->astro_report_rate_discount;?>">
                                              </div>
                                            </div>
                                          </div>
<!--  -->
                                          <div class="hs-astroProfile-form">
                                            <div class="hs-astroProfile-form-icon">
                                              <i class="fa fa-phone" aria-hidden="true"></i>
                                            </div>
                                            <div class="hs-astroProfile-form-content">
                                              <div class="form-group">
                                                <label>Calling Rate</label>
                                                <input type="number" name="astro_calling_rate" class="form-control" placeholder="Enter Calling rate" value="<?php echo $rrcaling=$getdata->astro_calling_rate;?>">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="hs-astroProfile-form">
                                            <div class="hs-astroProfile-form-icon">
                                              <i class="fa fa-comments" aria-hidden="true"></i>
                                            </div>
                                            <div class="hs-astroProfile-form-content">
                                              <div class="form-group">
                                                <label>Chat Rate</label>
                                                <input type="number" name="astro_chat_rate" class="form-control" placeholder="Enter Chat rate" value="<?php echo $rrchatrt=$getdata->astro_chat_rate;?>">
                                              </div>
                                            </div>
                                          </div>

                                          <div class="hs-astroProfile-form">
                                            <div class="hs-astroProfile-form-icon">
                                              <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                            </div>
                                            <div class="hs-astroProfile-form-content">
                                              <div class="form-group">
                                                <label>Report Rate </label>
                                                <input type="number" name="astro_askreport_rate" class="form-control" placeholder="Enter Report rate" value="<?php echo $rrrprate=$getdata->astro_askreport_rate;?>">
                                              </div>
                                            </div>
                                          </div>
<!--  -->
                                          <div class="hs-astroProfile-form">
                                            <div class="">
                                              <div class="form-group">
                                              <button name="submit" type="submit" value="submit" class="astroprofile-updt-btn">UPDATE</button>
                                                <!-- <input type="button" name="button" value="Change Password" class="form-control chngepaswordBtn"> -->
                                              </div>
                                            </div>

                                            <?php echo form_close(); ?>

                                          </div>
                                        </div>
                                      </div>
                                      <!-- Discount End -->
                                    </div>
                                  </div>
                                </div>

                      

                      <!-- profile End -->



                               



<!-- **************************************REPORT GENERATION REQUEST ********************************************** -->

<div id="profilemenu-01" class="tab-pane fade">

  <div class="row bg-color-01">


<div class="table-responsive">
    <table class="table-tag table table-striped table-bordered" border="1" id="example1">



      <thead>



        <tr>



         <th class="tab-data">S.NO</th>



          <th class="tab-data">REQUEST BY</th>

          <!-- <th class="tab-data">Email</th>

          <th class="tab-data">MOBILE</th> -->

          <!-- <th class="tab-data">Recipient</th> -->



          <th class="tab-data">Amount Paid</th>



          <!-- <th class="tab-data">Type</th> -->



          <th class="tab-data">REQUEST DATE</th>

          <th class="tab-data">REQUEST DOCUMENT</th>
          <th class="tab-data">SENT DOCUMENT</th>
          <th class="tab-data">STATUS</th>

          <th class="tab-data">ACTION</th>



        </tr>



      </thead>



      <tbody>

       <!-- user report data view -->

          <?php 

          $sn=0;

         // $wallettrj=fetchby_wheres('wallet_recharge_history',array('wrh_user_id'=>$user_id));

          $userreportview = fetchbywhereorder2('reportsendtoastro',array('rp_astro_id'=>$astro_id),'desc','rp_id','asc','rp_problem_solve_status');

         //echo $this->db->last_query();

          foreach($userreportview as $urv){

            $sn++;

          

          ?>

        <tr>



          <td class="tab-data"><?php echo $sn; ?></td>



          <td class="tab-data"><?php $fnm=fetchbyresult_where('user',$urv['rp_user_id'],'user_id') ;

         echo  $fnm[0]['user_first_name'];

          ?></td>

          <!-- <td class="tab-data"><?php echo  $fnm[0]['user_email']; ?></td>

          <td class="tab-data"><?php echo  $fnm[0]['user_mobile']; ?></td> -->

          <td class="tab-data"><?php echo $urv['rp_amountpaid']; ?></td>

          <td class="tab-data"><?php echo $DTR=date('d-M-y h:i:sa',strtotime($urv['rp_timestamp'])); ?></td>

          <td class="tab-data"><a download href="<?php echo base_url();?>pdfimagedoc/usertoastrologer/<?php echo $urv['rp_attachment']; ?>">Download</a></td>
          
          <?php if($urv['rp_solution_attachment'] != NULL) { ?>
			        <td class="tab-data"><a  download href="<?php echo base_url();?>pdfimagedoc/astrologertouser/<?php echo $urv['rp_solution_attachment']; ?>">Download<?php //echo $urv['rp_solution_attachment']; ?></a></td>
      				<?php } else{?>
					<td>PENDING</td>
	      			<?php } ?>
          <!-- <td class="tab-data"><img src="images/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td> -->

          <!-- <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td> -->



       

          <?php if($urv['rp_problem_solve_status']==0){?>

         

              <td class="tab-data"><a href="#" class="pending-01">Pending</a></td>

              <?php } else {?>

              <td class="tab-data"><a href="#" class="completed-01">Success</a></td>

              <?php } ?>

              </td>

              <td class="tab-data">

              <!-- view data report request -->

              <a  href="#" data-toggle="modal" data-target="#modelinfoview<?php echo $urv['rp_id'];?>" data-id="<?php echo $urv['rp_id'];?>" ><i class="fas fa-eye" style="color: #000; font-size:25px;"></i></a>

                   

                              <?php if($urv['rp_problem_solve_status']==0)

                               {?>

                         <!-- upload reply -->    

                <a  href="#" data-toggle="modal" data-target="#modeupload<?php echo $urv['rp_id'];?>" data-id="<?php echo $a=$urv['rp_id'];?>" ><i class="fas fa fa-reply" style="color: #000; font-size:25px;"></i></a>

                <!-- upload reply -->  

                                <!-- <a onclick="return confirm('Are you sure you want to Active this item?');" href="<?php echo base_url();?>problemactive/active/<?php echo $urv['rp_id'];?>" style="color:green;" ><i class="fas fa-check" style="color: #008000; font-size:25px;"></i></a> -->

                               <?php } else { ?>

                              

                              <!-- <a onclick="return confirm('Are you sure you want to Inactive this item?');" href="<?php echo base_url();?>probleminactive/inactive/<?php echo $urv['rp_id'];?>" style="color:red" ><i class="fas fa-close" style="color: red; font-size:25px;"></i></a> -->

                            

                               <?php } ?>

              </td>

       </tr>

      <?php } ?>

      </tbody>



    </table>
    </div>
  </div>

</div>

<!-- user report data view -->

<!-- **************************************REPORT GENERATION REQUEST ********************************************** -->

  <!-- **************************************PAYMENT HISTORY ********************************************** -->

  <div id="profilemenu-10" class="tab-pane fade">



<div class="row bg-color-01">



  <table class="table-tag table table-striped table-bordered" border="1" id="example2">



    <thead>



      <tr>



       <th class="tab-data">S.NO</th>



        <th class="tab-data">PAID FOR</th>

        <th class="tab-data">AMOUNT</th>

        <th class="tab-data">DATE</th>

       </tr>



    </thead>



    <tbody>

     <!-- user report data view -->

        <?php 

        $sn=0;

       

        $astropayview = fetchbywhereorder('wallet_history_astrologer',array('wha_astro_id'=>$astro_id),'desc','wha_id');

       //echo $this->db->last_query();

        foreach($astropayview as $aspv){

          $sn++;

        

        ?>

      <tr>



        <td class="tab-data"><?php echo $sn; ?></td>



       

        <td class="tab-data"><?php echo  $aspv['wha_recevedfor']; ?></td>

        <td class="tab-data"><?php echo  $aspv['wha_rec_amt_after_deduction']; ?></td>

        

        <td class="tab-data"><?php echo $DrrTR=date('d-M-y h:i:sa',strtotime($aspv['wha_timestamp'])); ?></td>

        

     </tr>

<?php } ?>

       

</tbody>



  </table>



</div>



</div>

<!-- user report data view -->

<!-- **************************************PAYMENT HISTORY ********************************************** -->

  <!-- **************************************PAYMENT RECEIVED BY ADMIN SIDE ********************************************** -->

  <div id="profilemenu-12" class="tab-pane fade">

    <div class="row bg-color-01">

      <table class="table-tag table table-striped table-bordered" border="1" id="example6">
  
        <thead>
          <tr>
              <th class="tab-data">S.NO</th>

              <th class="tab-data">REQUEST DATE</th>

              <th class="tab-data">REQUEST AMOUNT</th>
              <th class="tab-data">AVAILABLE AMOUNT </th>
              <th class="tab-data">PAYMENT CREDITED DATE</th>
              <th class="tab-data">AMOUNT LEFT</th>
              <th class="tab-data">STATUS</th>

              <th class="tab-data">ACTION</th>
          </tr>
        </thead>
        <tbody>

            <?php 

            $sn=0;

            //fetchbywhereorder($table="",$id="",$ascdesc = "",$colum = "")

            // $amt_req_history=fetchby_wheres('request_amount_astrologer',array('ara_astro_id'=>$astro_id));
            $amt_req_history=fetchbywhereorder('request_amount_astrologer',array('ara_astro_id'=>$astro_id),'desc','ara_id');
            //echo $this->db->last_query();

            foreach($amt_req_history as $arh){

              $sn++;

            ?>
            
            <tr>

                <td class="tab-data"><?php echo $sn; ?></td>

                <td class="tab-data"><?php echo $REQd=date('d-M-y h:i:sa',strtotime($arh['ara_request_date'])); ?></td>

                <td class="tab-data"><?php echo $arh['ara_amount']; ?></td>
                <td class="tab-data"><?php echo $arh['ara_walletavailable_balance']; ?></td>

                <td class="tab-data"><?php if($arh['ara_paid_date'] !='0000-00-00 00:00:00'){echo $paiddt=date('d-M-y h:i:sa',strtotime($arh['ara_paid_date']));} ?></td>
                <td class="tab-data"><?php if($arh['ara_paid_date'] !='0000-00-00 00:00:00'){echo $arh['ara_deductedamount']; } ?></td>

                <!-- <td class="tab-data"><img src="images/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td> -->

                <!-- <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td> -->


                  <?php if($arh['ara_status']==0){?>

       
                <td class="tab-data"><a href="#" class="pending-01">Pending</a></td>

                  <?php } else {?>

                <td class="tab-data"><a href="#" class="completed-01">Success</a></td>

                  <?php } ?>

                  <!--  </td> -->

                <td class="tab-data">
                            <?php if($arh['ara_status']!=0)

                             {?>

                     <a  href="#" data-toggle="modal" data-target="#creditamtview<?php echo $arh['ara_id'];?>" data-id="<?php echo $arh['ara_id'];?>" ><i class="fas fa-eye" style="color: #000; font-size:25px;"></i></a>
           
                      <!-- <a  href="#" data-toggle="modal" data-target="#modeupload<?php echo $arh['ara_id'];?>" data-id="<?php echo $arh['ara_id'];?>" ><i class="fas fa fa-reply" style="color: #000; font-size:25px;"></i></a> -->


                              <!-- <a onclick="return confirm('Are you sure you want to Active this item?');" href="<?php echo base_url();?>problemactive/active/<?php echo $arh['ara_id'];?>" style="color:green;" ><i class="fas fa-check" style="color: #008000; font-size:25px;"></i></a> -->

                             <?php //} else { ?>

                            <!-- <a onclick="return confirm('Are you sure you want to Inactive this item?');" href="<?php echo base_url();?>probleminactive/inactive/<?php echo $arh['ara_id'];?>" style="color:red" ><i class="fas fa-close" style="color: red; font-size:25px;"></i></a> -->

                             <?php } ?>

                </td>

              </tr>

              <?php } ?>

        </tbody>

      </table>
    </div>

  </div>
  <div id="profilemenu-13" class="tab-pane fade">
    <div class="row">
      <div class="col-md-12">
        <h3>Offer's Diwali</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
          <div class="cht-ofer">
            <div class="cht-icon">
              <i class="fa fa-comments-o" aria-hidden="true"></i>
            </div>
            <div class="">
              <h3>Chat Offers</h3>
              <p>chat disconuted by 20rs/-</p>
            </div>
          </div>
      </div>
    </div>
  </div>



<!-- **************************************PAYMENT RECEIVED BY ADMIN SIDE ********************************************** -->



                                <div id="profilemenu-02" class="tab-pane fade">



                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp; report</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp; report</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp; report</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp; report</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp; report</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp; report</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp; report</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp; report</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp; report</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp; report</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp; report</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp; report</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>



                                </div>



                                <div id="profilemenu-03" class="tab-pane fade">

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; Chat</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; Chat</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; Chat</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; Chat</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; Chat</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; Chat</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; Chat</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>



                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; Chat</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; Chat</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; Chat</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; Chat</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>

                                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">



                                      <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">



                                        <div class="hs_astro_img_wrapper">



                                          <img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" alt="team-img">



                                          <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                                  <i class="fa fa-star"></i>



                                          </div>



                                        </div>



                                        <div class="hs_astro_img_cont_wrapper">



                                            <h2>Rashmi Doe</h2>



                                                <p>Telgu, English</p>



                                                <p>Vadic Vasu</p>



                                                <p>Exp: 8 Years</p>



                                                <p><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p>



                                        </div>



                                        <div class="hs_astro_img_bottom_cont">



                                          <div class="align-01">

                                            

                                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp; Chat</a>



                                          </div>



                                        </div>



                                      </div>



                                  </div>



                                </div>



                                <div id="profilemenu-04" class="tab-pane fade">



                                  <div class="row bg-color-01">



                                    <table class="table-tag" border="1">



                                      <thead>



                                        <tr>



                                          <th class="tab-data"><input type="checkbox"></th>



                                          <th class="tab-data">ID Invoice</th>



                                          <th class="tab-data">Date</th>



                                          <th class="tab-data">Recipient</th>



                                          <th class="tab-data">Amount</th>



                                          <th class="tab-data">Type</th>



                                          <th class="tab-data">Location</th>



                                          <th class="tab-data">Status</th>



                                        </tr>



                                      </thead>



                                      <tbody>



                                        <tr>



                                          <td class="tab-data"><input type="checkbox"></td>



                                          <td class="tab-data">#123412451</td>



                                          <td class="tab-data">#June 1, 2020, 08:22 AM</td>



                                          <td class="tab-data"><img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td>



                                          <td class="tab-data"><i class="fa fa-inr" aria-hidden="true"></i> 128.89</td>



                                          <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td>



                                          <td class="tab-data">Medan,<br> Sumut<br> Indonesia</td>



                                          <td class="tab-data"><a href="#" class="pending-link">Pending</a></td>



                                        </tr>



                                        <tr>



                                          <td class="tab-data"><input type="checkbox"></td>



                                          <td class="tab-data">#123412451</td>



                                          <td class="tab-data">#June 1, 2020, 08:22 AM</td>



                                          <td class="tab-data"><img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td>



                                          <td class="tab-data"><i class="fa fa-inr" aria-hidden="true"></i> 128.89</td>



                                          <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td>



                                          <td class="tab-data">Medan,<br> Sumut<br> Indonesia</td>



                                          <td class="tab-data"><a href="#" class="cancelled-link">cancelled</a></td>



                                        </tr>



                                        <tr>



                                          <td class="tab-data"><input type="checkbox"></td>



                                          <td class="tab-data">#123412451</td>



                                          <td class="tab-data">#June 1, 2020, 08:22 AM</td>



                                          <td class="tab-data"><img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td>



                                          <td class="tab-data"><i class="fa fa-inr" aria-hidden="true"></i> 128.89</td>



                                          <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td>



                                          <td class="tab-data">Medan,<br> Sumut<br> Indonesia</td>



                                          <td class="tab-data"><a href="#" class="completed-link">completed</a></td>



                                        </tr>



                                        <tr>



                                          <td class="tab-data"><input type="checkbox"></td>



                                          <td class="tab-data">#123412451</td>



                                          <td class="tab-data">#June 1, 2020, 08:22 AM</td>



                                          <td class="tab-data"><img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td>



                                          <td class="tab-data"><i class="fa fa-inr" aria-hidden="true"></i> 128.89</td>



                                          <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td>



                                          <td class="tab-data">Medan,<br> Sumut<br> Indonesia</td>



                                          <td class="tab-data"><a href="#" class="pending-link">Pending</a></td>



                                        </tr>



                                        <tr>



                                          <td class="tab-data"><input type="checkbox"></td>



                                          <td class="tab-data">#123412451</td>



                                          <td class="tab-data">#June 1, 2020, 08:22 AM</td>



                                          <td class="tab-data"><img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td>



                                          <td class="tab-data"><i class="fa fa-inr" aria-hidden="true"></i> 128.89</td>



                                          <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td>



                                          <td class="tab-data">Medan,<br> Sumut<br> Indonesia</td>



                                          <td class="tab-data"><a href="#" class="cancelled-link">cancelled</a></td>



                                        </tr>



                                        <tr>



                                          <td class="tab-data"><input type="checkbox"></td>



                                          <td class="tab-data">#123412451</td>



                                          <td class="tab-data">#June 1, 2020, 08:22 AM</td>



                                          <td class="tab-data"><img src="<?php echo base_url();?>image/astrologers/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td>



                                          <td class="tab-data"><i class="fa fa-inr" aria-hidden="true"></i> 128.89</td>



                                          <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td>



                                          <td class="tab-data">Medan,<br> Sumut<br> Indonesia</td>



                                          <td class="tab-data"><a href="#" class="completed-link">completed</a></td>



                                        </tr>



                                      </tbody>



                                    </table>



                                  </div>



                                </div>

<!-- amount request -->

                                <div id="profilemenu-11" class="tab-pane fade">



                                  <div class="">



                                    <div class="row">



                                      <div class="col-md-12">



                                        <div class="align-02">



                                          <h3 class="kundli-heading">Request Amount</h3>



                                          <p class="kundli-paragraph"><b>Make Request For Amount Withdrawl</b></p>



                                        </div>



                                      </div>



                                    </div>



                                    <div class="row">



                                      <div class="col-md-2">

                                        

                                      </div>



                                      <div class="col-md-8 astromall_form">

                                      <form id='myForm1234' action="<?php echo base_url();?>request_amount_astrologer/<?php echo $astro_id;?>" method="post" enctype="multipart/form-data" >

        

                                      <!-- <?php echo form_open(base_url().'request_amount_astrologer/'.$astro_id); ?> -->

                                      <!-- <form id='myForm1234' method="post" > -->



                                          <div class="row" style="display: flex;align-items: center;">



                                            <div class="col-md-6">

                                              <label class="lable-text">Amount</label><br>

                                              <input type="text"   class="input-type"id="requestedamount" name="amount" value="">

                                              <input type="hidden" id="availableamount" class="input-type" name="availableamount" value="<?php echo $astrobal ;?>">

                                            

                                            </div>

                                          

                                            <!-- <?php $reqcheck=fetchbyresultByCondiction('request_amount_astrologer',array('ara_astro_id'=> $astro_id,'ara_status' => '0'));

                                            ?> -->

                                            <!-- <input type="submit"  name="submit" class="form-control astroprofile-updt-btn" value="submit" id="insert_btn"> -->

                                            <input type="button" name="insert_btn" class="form-control astroprofile-updt-btn" value="submit" id="insert_btn">

							

                                            

                                       </div>



                                       <!-- <?php echo form_close(); ?> -->

                                          </form>

                                      </div>



                                      <div class="col-md-2">

                                        

                                      </div>



                                    </div>



                                  </div>



                                </div>

<!-- amount request end -->

                                <div id="profilemenu-06" class="tab-pane fade">

<?php $cdet=fetchbyrow('websiteinformation');?>

<div class="row">

  <div class="col-md-4">

    <div class="hs-custm-sup">

      <div class="hs-custm-sup-img">

        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>

      </div>

      <div class="hs-custm-supContent">

        <h3>Contact Number</h3>

        <p><?php echo $cdet->tollfreenumber;?></p>

      </div>

    </div>

  </div>

  <div class="col-md-4">

    <div class="hs-custm-sup">

      <div class="hs-custm-sup-img">

        <i class="fa fa-envelope-o" aria-hidden="true"></i>

      </div>

      <div class="hs-custm-supContent">

        <h3>Email</h3>

        <p><?php echo $cdet->email;?></p>

      </div>

    </div>

  </div>

  <div class="col-md-4">

    <div class="hs-custm-sup">

      <div class="hs-custm-sup-img">

        <i class="fa fa-map-marker" aria-hidden="true"></i>

      </div>

      <div class="hs-custm-supContent">

        <h3>Address</h3>

        <p><?php echo $cdet->address;?></p>

      </div>

    </div>

  </div>

</div>



</div>



<!-- call history start -->
<div id="profilemenu-15"  class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-15") { ?> in active <?php } ?>">

<div class="row bg-color-01">
  <!-- table-tag border="1"-->
  <table class="table table-striped table-bordered"  id="example3">

    <thead>

      <tr>
        <th class="tab-data">S.NO</th>
        <th class="tab-data">User</th>
        <th class="tab-data">Call Date</th>
        <th class="tab-data">Total Time</th>
        <!-- <th class="tab-data">Call Start Time</th>
        <th class="tab-data">Call End Time</th> -->
        <th class="tab-data">Call Rate(Min)</th>
        <th class="tab-data">Call Status</th>
      </tr>

    </thead>

    <tbody>
    <?php 
    //$orderhistroy = fetchby_wheres('payment', array('user_id' => $user_id));
    $calldetailhistory = fetchbywhereorder('user_call_detail_history_user', array('uch_astro_id' => $astro_id),'desc','uch_id');
    $i=0;
    foreach($calldetailhistory as $cllh){
      $i++;
    ?>
      <tr>

        <!-- <td class="tab-data"><input type="checkbox"></td> -->
        <td class="tab-data"><?php echo $i;?></td>
        <td class="tab-data">
        <?php $cuid=fetchbyresult_where('user',$cllh['uch_user_id'],'user_id'); echo $cuid['0']['user_first_name'];?>
        </td>
        <td class="tab-data"><?php echo $dtes=date('Y-m-d',strtotime($cllh['uch_timestamp'])); ?></td>
        <td class="tab-data"><?php echo $cllh['uch_totaltime'];?></td>
        <!-- <td class="tab-data"><?php //echo $stime=date('H:i:s',strtotime($cllh['uch_call_start_time'])); ?></td>
        <td class="tab-data"><?php //echo $etime=date('H:i:s',strtotime($cllh['uch_call_end_time'])); ?></td> -->
        <td class="tab-data"><?php echo $cllh['uch_astro_call_rate'];?></td>
        <!-- <td class="tab-data"><?php //echo $foh['product_id'];?></td> -->
        <!-- <td class="tab-data"><img src="images/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td> -->
        
        <!-- <td class="tab-data"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $foh['total_amt'];?></td>
        
        <td class="tab-data"><?php  //if($foh['pay_by'] == 'Wallet'){echo 'WALLET'; } else {echo 'PAYMENT GATEWAY';};?></td> -->

        <!-- <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td> -->

        <!-- <td class="tab-data">Medan,<br> Sumut<br> Indonesia</td> -->
        <?php if($cllh['uch_status']=='0'){?>
          <td class="tab-data"><a href="#" class="pending-link">Call Failed</a></td>
        <?php } else {?>
          <td class="tab-data"><a href="#" class="completed-link">Call Success</a></td>
        <?php } ?>
      </tr>
      <?php } ?>
      

    </tbody>

  </table>

</div>

</div>
<!-- call history end -->
<!-- chat histroy start -->
<div id="profilemenu-14"  class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-14") { ?> in active <?php } ?>">

<div class="row bg-color-01">
<!-- table-tag border="1"-->
<table class="table table-striped table-bordered"  id="example5">

<thead>

  <tr>
    <th class="tab-data">S.NO</th>
    <th class="tab-data">User</th>
    <th class="tab-data">Chat Date</th>
    <th class="tab-data">Total Chat time(MIN)</th>
    <!-- <th class="tab-data">Chat Start Time</th>
    <th class="tab-data">Chat End Time</th> -->
    <th class="tab-data">Chat Rate(MIN)</th>
    <th class="tab-data">Chat Status</th>
  </tr>

</thead>

<tbody>
<?php 
//$orderhistroy = fetchby_wheres('payment', array('user_id' => $user_id));
$chatdetailhistory = fetchbywhereorder('user_chat_detail_history', array('ucth_astro_id' => $astro_id),'desc','ucth_id');
$i=0;
foreach($chatdetailhistory as $chth){
  $i++;
?>
  <tr>

    <!-- <td class="tab-data"><input type="checkbox"></td> -->
    <td class="tab-data"><?php echo $i;?></td>
    <td class="tab-data"><?php $cuid=fetchbyresult_where('user',$chth['ucth_user_id'],'user_id'); if(!empty($cuid)){$cuid[0]['user_first_name'];}?></td>
    <td class="tab-data"><?php echo $cdtes=date('Y-m-d',strtotime($chth['ucth_timestamp'])); ?></td>
    <td class="tab-data"><?php echo $chth['ucth_totaltime'];?></td>
    <!-- <td class="tab-data"><?php //echo $cstime=date('H:i:s',strtotime($chth['ucth_chat_starttime'])); ?></td>
    <td class="tab-data"><?php //echo $cetime=date('H:i:s',strtotime($chth['ucth_chat_endtime'])); ?></td> -->
    <td class="tab-data"><?php echo $chth['ucth_astro_chatrate'];?></td>
    <!-- <td class="tab-data"><?php //echo $foh['product_id'];?></td> -->
    <!-- <td class="tab-data"><img src="images/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td> -->
    <!-- <td class="tab-data"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $chth['total_amt'];?></td>
    <td class="tab-data"><?php  //if($foh['pay_by'] == 'Wallet'){echo 'WALLET'; } else {echo 'PAYMENT GATEWAY';};?></td> -->
   <!-- <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td> -->
    <!-- <td class="tab-data">Medan,<br> Sumut<br> Indonesia</td> -->
    <?php if($chth['ucth_status']=='0'){?>
      <td class="tab-data"><a href="#" class="pending-link">Call Failed</a></td>
    <?php } else {?>
      <td class="tab-data"><a href="#" class="completed-link">Call Success</a></td>
    <?php } ?>
  </tr>
  <?php } ?>
  

</tbody>

</table>

</div>

</div>
<!-- chat history end -->








                                <div id="profilemenu-08" class="tab-pane fade">



                                  <div class="container width-01">



                                    <div class="row">



                                      <div class="col-md-12">



                                        <div class="row">



                                          <div class="col-md-7">



                                            <div class="display-01">



                                              <img src="<?php echo base_url();?>image/astrologers/content/online3.jpg" class="team-img-01">

                                              

                                            </div>



                                            <div class="display">



                                              <h2>Chrisitian Pierce</h2>



                                              <p>QA Automation Lead</p>

                                              

                                            </div>                                            

                                          </div>



                                          <div class="col-md-5">



                                            <div class="score-parent">

                                              

                                              <p class="ranking-paragraph">Average Score</p>



                                              <p class="score">4.2</p>



                                            </div>



                                            <div class="star-01">



                                              <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                              <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                              <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                              <i class="fa fa-star-half-o star-icon" aria-hidden="true"></i>



                                            </div>



                                          </div>



                                        </div>



                                      </div>



                                    </div>



                                    <div class="row">



                                      <div class="col-md-12">



                                        <h4 class="Summary">Feedback Summary</h4>



                                      </div>



                                    </div>



                                    <div class="row row-mt">



                                      <div class="col-md-6">



                                        <div>



                                          <h3 class="skill">Personal Skills and Competence</h3>



                                        </div>



                                      </div>



                                      <div class="col-md-6">



                                        <div>



                                        </div>



                                      </div>



                                    </div>



                                    <div class="row row-mt-01">



                                      <div class="col-md-6">



                                        <h4>Leadership Skills</h4>

                                        

                                      </div>



                                      <div class="col-md-6">



                                        <div class="float">



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>

                                          

                                        </div>

                                        

                                      </div>

                                      

                                    </div>



                                    <div class="row row-mt-01">



                                      <div class="col-md-6">



                                        <h4>English Language Knowledge</h4>

                                        

                                      </div>



                                      <div class="col-md-6">



                                        <div class="float">



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-half-o star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-o star-icon" aria-hidden="true"></i>

                                          

                                        </div>

                                        

                                      </div>

                                      

                                    </div>



                                    <div class="row row-mt-01">



                                      <div class="col-md-6">



                                        <h4>Problem Solving</h4>

                                        

                                      </div>



                                      <div class="col-md-6">



                                        <div class="float">



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-o star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-o star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-o star-icon" aria-hidden="true"></i>

                                          

                                        </div>

                                        

                                      </div>

                                      

                                    </div>



                                    <div class="row row-mt-01">



                                      <div class="col-md-6">



                                        <h4>Programming Skill</h4>

                                        

                                      </div>



                                      <div class="col-md-6">



                                        <div class="float">



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-half-o star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-o star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-o star-icon" aria-hidden="true"></i>

                                          

                                        </div>

                                        

                                      </div>

                                      

                                    </div>



                                    <div class="row row-mt-01">



                                      <div class="col-md-6">



                                        <h4>Ability to Learn</h4>

                                        

                                      </div>



                                      <div class="col-md-6">



                                        <div class="float">



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-o star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-o star-icon" aria-hidden="true"></i>

                                          

                                        </div>

                                        

                                      </div>

                                      

                                    </div>



                                    <div class="row row-mt-01">



                                      <div class="col-md-6">



                                        <h4>Work Flow Behaviour</h4>

                                        

                                      </div>



                                      <div class="col-md-6">



                                        <div class="float">



                                          <i class="fa fa-star star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-o star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-o star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-o star-icon" aria-hidden="true"></i>



                                          <i class="fa fa-star-o star-icon" aria-hidden="true"></i>

                                          

                                        </div>

                                        

                                      </div>

                                      

                                    </div>



                                  </div>



                                </div>



                                <div id="profilemenu-09" class="tab-pane fade">



                                  <div class="row">

                                    <div class="col-sm-12">

                                                <!-- notification -->

                                     <?php $fetnotif=fetchbyresultlimitorder('notification','10','nfc_id','desc');

                                     foreach($fetnotif as $fnc){

                                     ?>

                                    <div class="hs-user-notification">

                                        <h3>N</h3>

                                        <div class="hs-as-notify">

                                          <p><?php echo $fnc['nfc_detail'];?></p>

                                          <h6><?php echo $dte=date('d-M-Y',strtotime($fnc['timestamp'])) ;?></h6>

                                        </div>

                                      </div>

                                      <?php } ?>

<!-- notification -->

                                      

                                    </div>

                                  </div>

                                </div>



                            </div>



                          </div>



                      </div>



                  </div>



              </div>



          </div>



        </div>



      </div>



    </div>



    <!-- hs sidebar End -->





   <!-- hs footer wrapper Start -->

<!-- *****************************************MODEL START TO VIEW credit view data************************************************* -->

<!-- view report model start -->

<?php if(!empty($amt_req_history)){ foreach($amt_req_history as $viewData){ ?>

<!-- Modal -->

<div id="creditamtview<?php echo $viewData['ara_id'];?>" class="modal fade" role="dialog">

<div class="modal-dialog hs_astro_user_lgoin">

    <!-- Modal content-->

    <div class="modal-content">

        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <!-- <h4 class="modal-title">Add </h4> -->

        </div>

        <div class="modal-body">

            <div class="row">

                <!-- <div class="col-sm-5 hs-user-bnimg">

                    <div>

                        <img src="<?php echo base_url();?>image/websiteimages/viewdata.PNG" style="width: 100%;">

                    </div>

                </div> -->

                <div class="col-sm-7">

                   

                    <br>

                    <div class="tab-content">

                        <div id="home" class="tab-pane fade in active" >

                            <h3 style="text-align: center;">VIEW DATA</h3>

                                      

                                <form id='myForm12' method="post"  class="login-filed">

                           

                                    <div class="form-group hs-usr-login-field " style="margin-top: 20px;">

                                   

                                    <lable>PAYMENT DETAIL</lable>

                                    <p><?php echo $viewData['ara_detail_payment'];?></p>

                                    </div>

                               

                                     <?php //echo form_close(); ?>

                               </form>

                        </div>

                      

                    </div>

                </div>

            </div>

            <!-- <button type="submit">Submit</button> -->

        </div>

       <!--  <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div> -->

    </div>

</div>



</div>

<?php }} ?>

<!-- view report model end -->

<!-- *****************************************MODEL END TO VIEW credit amount data************************************************* -->



<!-- *****************************************MODEL START TO VIEW USER DTA************************************************* -->

<!-- view report model start -->

<?php if(!empty($userreportview)){ foreach($userreportview as $viewData){ ?>

<!-- Modal -->

<div id="modelinfoview<?php echo $viewData['rp_id'];?>" class="modal fade" role="dialog">

<div class="modal-dialog hs_astro_user_lgoin">

    <!-- Modal content-->

    <div class="modal-content">

        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <!-- <h4 class="modal-title">Add </h4> -->

        </div>

        <div class="modal-body">

            <div class="row">

                <div class="col-sm-5 hs-user-bnimg">

                    <div>

                        <img src="<?php echo base_url();?>image/websiteimages/viewdata.PNG" style="width: 100%;">

                    </div>

                </div>

                <div class="col-sm-7">

                   

                    <br>

                    <div class="tab-content">

                        <div id="home" class="tab-pane fade in active" >

                            <h3 style="text-align: center;">VIEW DATA</h3>

                                      

                                <form id='myForm12' method="post"  class="login-filed">

                           

                                    <div class="form-group hs-usr-login-field " style="margin-top: 20px;">

                                    <lable>PROBLEM RELATED TO </lable>

                                    <p><?php  $prt=fetchbyresultByCondiction('reportquestionoption',array('rqo_id'=>$viewData['rp_type'])); echo $prt['0']['rqo_question'];//echo $viewData['rp_type'];?></p>

                                    <lable>DESCRIPTION</lable>

                                    <p><?php echo $viewData['rp_description'];?></p>
                                    <lable>OPTIONS</lable>
                                    <p><?php if(!empty($viewData['rp_op1'])){ echo $prt['0']['rqo_option1']; }?></p>
                                    <p> <?php if(!empty($viewData['rp_op2'])){ echo $prt['0']['rqo_option2']; }?></p>
                                    <p><?php if(!empty($viewData['rp_op3'])){ echo $prt['0']['rqo_option3']; }?></p>
                                    <p><?php if(!empty($viewData['rp_op4'])){ echo $prt['0']['rqo_option4']; }?></p>
                                     
                                     
                                    </div>

                               

                                     <?php //echo form_close(); ?>

                               </form>

                        </div>

                      

                    </div>

                </div>

            </div>

            <!-- <button type="submit">Submit</button> -->

        </div>

       <!--  <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div> -->

    </div>

</div>



</div>

<?php }} ?>

<!-- view report model end -->

<!-- *****************************************MODEL END TO VIEW USER DTA************************************************* -->



<!-- *****************************************MODEL START TO REPLY TO USER************************************************* -->

<?php if(!empty($userreportview)){ foreach($userreportview as $viewData){ ?>

<!-- Modal -->

<div id="modeupload<?php echo $viewData['rp_id'];?>" class="modal fade" role="dialog">

<div class="modal-dialog hs_astro_user_lgoin">

    <!-- Modal content-->

    <div class="modal-content">

        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <!-- <h4 class="modal-title">Add </h4> -->

        </div>

        <div class="modal-body">

            <div class="row">

                <div class="col-sm-5 hs-user-bnimg">

                    <div>

                        <img src="<?php echo base_url();?>image/websiteimages/senddata.PNG" style="width: 100%;">

                    </div>

                </div>

                <div class="col-sm-7">

                   

                    <br>

                    <div class="tab-content">

                        <div id="home" class="tab-pane fade in active" >

                            <h3 style="text-align: center;">REPLY TO USER</h3>

                                      

                                <!-- <form id='myForm12' method="post" enctype="multipart/form-data" class="login-filed"> -->

                                <?php echo form_open_multipart(base_url().'send_reply_report_fromastrologer'); ?>

                                       <div class="form-group hs-usr-login-field " style="margin-top: 20px;">

                                            <lable>Detail</lable>

                                            <textarea  name="rp_sendsolution" rows="2" cols="50" value="Description" class="dropdown-opt" required></textarea>

                                      <input type="hidden" name="replyid" value="<?php echo $viewData['rp_id'];?>">

                                      <input type="hidden" name="replyuser_id" value="<?php echo $viewData['rp_user_id'];?>">

                                      <input type="hidden" name="replyastro_id" value="<?php echo $viewData['rp_astro_id'];?>">

                                       </div>

                                         

                                        <div class="form-group hs-usr-login-field " style="margin-top: 20px;">

                                        <lable>Upload</lable>

                                        <input type="file" name="userfile" value="upload" class="form-group hs-usr-login-field" size="60" id="fUpload" onchange="checkextension()">

                                         </div>

                                         <div class="hs-submodlBtn">

                                            <!-- <input type="submit" name="button" value="Submit" class="form-control"> <br> -->

                                            <input type="submit"  name="submit" class="form-control" value="submit" id="insert_btn">

                                           </div>

                                         <?php echo form_close(); ?>

                        </div>

                      

                    </div>

                </div>

            </div>

            <!-- <button type="submit">Submit</button> -->

        </div>

       <!--  <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div> -->

    </div>
</div>
</div>

<?php }} ?>
<!-- Chat Modal Start -->
  <!-- The Modal -->
 
  
  
  <!-- Chat Modal Start -->
  <!-- The Modal -->
 
  <div class="modal fade" id="myModalChat">
    <div class="modal-dialog">
      <div class="modal-content">
        <head>
          <meta charset="utf-8" />
          <title>Chat Application</title>
          <meta name="description" content="Chat Application" />
          <!-- <link rel="stylesheet" type="text/css" href="<?php //echo base_url();?>assets/frontend/css/style_chat.css" /> -->
        </head>
        <body id=''>
          <div id="wrapper">
            <div id="menu">
                <?php  
                  if($this->session->userdata('user_id')) {
                    $user=  $this->session->userdata('user_id'); 
                  }
                  else if($this->session->userdata('astro_id'))
                  {
                    $user=  $this->session->userdata('astro_id'); 
                  }
                  else
                  {
                   $user="";
                  }
                ?>
                <p class="welcome">Welcome <b>&nbsp&nbsp&nbsp<?php echo $astro_name; ?></b></p>
                <button type="button" class="btn btn-danger" onclick="exitchat();" >Exit Chat</button>
                <!-- <p class="logout"><a id="exit" onclick="exitchat();" >Exit Chat</a></p> -->
            </div>
            
            <section id="content">
              <section class="main padder" >
                <div class="clearfix">
                  <!--<h4><i class="fa fa-table"></i>Users</h4>-->
                </div>
                <div class="row">
                  <div class="col-lg-12" style="height:250px;">
                    <section class="panel mr-btm">
                      <!--<header class="panel-heading">Chat With <span >Astrologer</span></header>-->
                      <div class="panel-body row cht-contner">
                        <!--<div class="col-md-12" >-->
                        <!--</div>-->
                        <div class="col-lg-4" id="chat_messages-01" style="height:220px;">
                            <ul class="nav nav-pills cht-hist" id="cht-hist">
                                <?php   
                                    $chuser = $this->Astro_model->getChatUser('chat_messsage',array('reciver_id'=>$astro_id));
                                    $i=0;
                                    foreach($chuser as $userid){  $i++;
                                    $nm = fetchbyresultByCondiction('user',array('user_id'=>$userid['sender_id']));
                                    foreach($nm as $nms){
                                        $reciver_ids = $nms['user_id'];
                                    
                                    $notification = countwhere('chat_messsage',array('sender_id'=>$reciver_ids,'reading_status'=>0));
                                    
                                ?>
                                <input type="hidden" id="useri<?php echo $i;?>" value="<?php echo $reciver_ids; ?>" />
                                <li onclick="trysesi('<?php echo $i;?>');" <?php if($i==1) { ?> class="active" <?php } ?>><a data-toggle="pill" href="<?php echo base_url(); ?>astrochat/<?php echo encoding($reciver_ids); ?>/<?php echo encoding($astro_id); ?>"><img src="https://astrovedvakta.com/image/profileadmin/1.png" style="width:25px;"> <span> <?php echo $nms['user_first_name']; ?> </span><?php if (!empty($notification)){ ?><span class="noti hienoti<?php echo $i;?>"><?php echo $notification; ?></span><?php } ?> </a></li>
                                <?php } } ?>
                            </ul>
                        </div>
                        <div class="col-lg-8 cht-hght" id="reloadss">
                            
                                <div class="tab-content astro-cht-section" id="chat_messages">
                                <div  id="shcht">
                                 
                                </div>
                               
                            </div>
                            
                            <div class="astro-cht-icon">
                                <div contenteditable="true" id="chatmsg" placeholder="Type here..." class="form-control" ></div>
                                <!--<button class="tel-chtButton"> -->
                                <!--    <i class="fa fa-telegram tel-chtIcon" aria-hidden="true"></i> -->
                                <!--</button>-->
                                <span id="userinfo"></span>
                            </div>
                        </div>
                        
                        <!--<div class="col-md-12">-->
                          <?php //for($ii=1;$ii<=20;$ii++){ ?>
                            <!-- <span class="emoji">
                            <img width="25"  src="<?php //echo site_url('assets/emoji/'.$ii.'.png');?>" />
                            </span> -->
                          <?php //} ?>
                        <!--</div>-->
                        <input type="hidden" value="" id="idsis" name="" />
                      </div>
                    </section>
                    <input type="hidden" id="partnername" value="Astrologer" />
                  </div>
                </div>
              </section>
            </section>
          
        
           <!--  <div id="chatbox"></div> -->
        
           <!--  <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
            </form> -->
          </div>
         <script>
            var base_url='<?php echo base_url();?>';
            var msgdata = document.getElementById('chatmsg').textContent;
            //var reciverid = '<?php echo $reciver_ids; ?>';
            var userid = '<?php echo $astro_id; ?>';
            var username = '<?php echo $astro_name; ?>';
 
          </script>
            <script src="https://twillo.ml:9099/socket.io/socket.io.js" type="text/javascript"></script>  
            <script src="<?php echo base_url('assets/frontend/js/chat.js');?>"></script>
        </body>
      </div>
    </div>
  </div>
<!-- Chat Modal Ends -->
<!-- Chat Modal Ends -->


<!-- *****************************************MODEL END TO VIEW USER DTA************************************************* -->

<script type="text/javascript">
// setInterval(function(){ $('.cht-hist').load(window.location.href + '.cht-hist');
//  },2000);

// function reads(astroname,astroid,isid)
// {
//     var uri = "<?php echo base_url('Astrologer_controller/chatshowss') ?>";
//   //alert(reciverid);
//     $.ajax({
//         url: uri,
//         type: "POST",
//         data: {astroname:astroname,astroid:astroid,isid:isid},
//         dataType: "json",
//         cache : false,
//         success: function(result)
//         {
//             $('#shcht').html(result.msg);
//         },
//     });
// }
setInterval(function(){ reloads(astroname,astroid,isid);},1000);
    function reloads12(astroname,astroid,isid)
    {
       //var astroname = '<?php echo $astro_name;?>';
       //var astroid = '<?php echo $astro_id;?>';
       //var isid = document.getElementById("idsis").value;
       var uri = "<?php echo base_url('Astrologer_controller/chatshowss') ?>";
       //alert(reciverid);
        $.ajax({
            url: uri,
            type: "POST",
            data: {astroname:astroname,astroid:astroid,isid:isid},
            dataType: "json",
            cache : false,
            success: function(result)
            {
                $('#shcht').html(result.msg);
            },
        });
    }
    
    function trysesi(idsi)
    {
       var useri = document.getElementById("useri"+idsi).value;
       var astroid = '<?php echo $astro_id;?>';
       var astroname = '<?php echo $astro_name;?>';
       var uri = "<?php echo base_url('Astrologer_controller/notification') ?>";
       //alert(uri);
        $.ajax({
            url: uri,
            type: "POST",
            data: {useri:useri,astroid:astroid,idsi:idsi},
            dataType: "json",
            cache : false,
            success: function(result)
            {
                console.log(result.msg);
                $('.hienoti'+idsi).hide();
            },
        });
        document.getElementById("idsis").value=idsi;
        if(idsi>0)
        {//alert(idsi);
        reloads(astroname,astroid,idsi);
          //  setInterval(function(){reloads(astroname,astroid,idsi);},1000);
        }
    }
    
    function exitchat()
    {
        if(confirm('Are You Exit From Tha Chat.'))
        {
          $('#myModalChat').modal('hide'); 
        }
        else
        {
          return false;
        }
    }

    function chatopenstart()
    {
        $('#myModalChat').modal('show'); 
    }

    function exitchatastro()
    {
        if(confirm('Are You Exit From Tha Chat.'))
        {
          $('#myModalChatAstro').modal('hide'); 
        }
        else
        {
          return false;
        }
    }

  $(document).ready( function () {

    $('#example').DataTable();

  });

  $(document).ready( function () {

    $('#example1').DataTable();

  });

  $(document).ready( function () {

    $('#example2').DataTable();

  });

  $(document).ready( function () {

    $('#example3').DataTable();

  });
  $(document).ready( function () {

$('#example4').DataTable();

});
$(document).ready( function () {

$('#example5').DataTable();

});
$(document).ready( function () {

$('#example6').DataTable();

});



<!-- on off toggle button -->



$("#onoffchat").on("change", function(event) {

   var astro_id = document.getElementById("okas").value;

   var statusct = document.getElementById("chat_time_ck").value;	 

   //alert(statusct);

   if(statusct==1)

   {

        alert("Are You Sure To OFF"); 

        var par = 'chat_off';

        $.ajax({

        type: "POST",

            url: "<?php echo base_url();?>chat_off",

            data: {astro_id: astro_id,par:par },           

            success: function(data){

            	location.reload();

            }

          });

	

 	}

 	else

 	{

 		alert("Are You Sure To ON"); 

       	var par = 'chat_on';

       	$.ajax({

            type: "POST",

            url: "<?php echo base_url();?>chat_on",

            data: {astro_id: astro_id,par:par },          

            success: function(data){

        		location.reload();	

            }

          });

 	}

});



function calwatim(time)

{

	//alert(time);

	//var time = document.getElementById("call_time_ck").value;

	alert('You are Already offline for '+time+' minutes.');

	//alert('You are Already offline for few minutes.');

    return false;

}



$("#onoffcall").on("change", function(event) 

{

  	var astro_id = document.getElementById("okas").value;

  	var statuses = document.getElementById("call_time_ck").value;	

  	//alert(statuses);  

    if(statuses==1)

    {

      	var par = 'call_off';

        alert("Are You Sure To OFF");

        $.ajax({

        type: "POST",

            url: "<?php echo base_url();?>call_off",

            data: {astro_id: astro_id,par:par },           

            success: function(data){

            	location.reload();

            }

        });	

 	}

 	else

 	{

 		alert("Are You Sure To ON");    

        var par = 'call_on';   

        $.ajax({

        type: "POST",

            url: "<?php echo base_url();?>call_on",

            data: {astro_id: astro_id,par:par },           

            success: function(data){

            	location.reload();

            }

          });  

 	}

});



function callwatime()

{

  var min = document.getElementById('call_watime').value;

  var astro_id = document.getElementById("okas").value;

  //alert(min);

  if(min == 0)

  {

    return false;

  }

  else

  {

    var uri = "<?php echo base_url();?>wattingtime/call";

    $.ajax({

      type: "POST",

      url: uri,

      data: {astro_id: astro_id,min:min },           

      success: function(data){

        location.reload();

      }

    });

  }

}



function chatwatime()

{

  var min = document.getElementById('chat_watime').value;

  var astro_id = document.getElementById("okas").value;



  if(min == 0)

  {

    return false;

  }

  else

  {

    var uri = "<?php echo base_url();?>wattingtime/chat";

    $.ajax({

      type: "POST",

      url: uri,

      data: {astro_id: astro_id,min:min },           

      success: function(data){

        location.reload();

      }

    });

  }

}

</script>

<!-- on off -->





<!-- browser check login -->

<script>
    $(document).mousemove(function() 
    {
        var params="";
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4)
            {
                if(xmlhttp.status==200){
                }
            }
        }
        xmlhttp.open("POST",'<?php echo base_url('login_controller/browserloginUpdate');?>', true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(params);
    });



function timeout(){

$.ajax({

url: "<?php echo site_url('login_controller/browsertimeout');?>",

type: 'GET',

success: function(res) {

var t =JSON.parse(res);

console.log(t);

if(t.success==true){

location.reload();

}else{

console.log(2);

}

}

});

}

abc();



function abc(){



t=setInterval(timeout, 20000);

}

</script>

<!-- browser check -->

  

  <!-- request amount -->

  <script>

  $('#insert_btn').click(function(){

    var form = document.getElementById("myForm1234");

    var availableamount = document.getElementById('availableamount').value;

    var requestedamount = document.getElementById('requestedamount').value;

   // alert(requestedamount);

   // alert(availableamount);

if(parseFloat(requestedamount) > parseFloat(availableamount))

{

  alert("Plz insert less amount then available balance");

  return false;

}

else{

  $('#myForm1234').submit();

    //    form.action = "http://bar.com";

    //  form.action = "<?php echo base_url();?>request_amount_astrologer/".$astro_id;

    // // <?php //echo form_open(base_url().'request_amount_astrologer/'.$astro_id); ?>

    // form.submit();

    // alert();

  }

});</script> <!-- request amount -->