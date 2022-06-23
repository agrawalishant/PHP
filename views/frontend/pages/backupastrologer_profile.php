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
    background-color: #393d42;
    position: relative;
    z-index: 9;
    padding-top: 5px !important;
    padding: 0;
}
.cht-hght {
 height:200px;
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

</style>

<div class="hs_indx_title_main_wrapper">

        <div class="hs_title_img_overlay"></div>

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_left_wrapper">

                        <h2>Our Astrologers</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_right_wrapper">
                        <ul>
                            <li><a href="<?php echo base_url('front_page');?>">Home</a> &nbsp;&nbsp;&nbsp;&gt; </li>
                            <li>Our Astrologer</li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>
  <div class="clearfix divider-01"></div>
   <div class="container">
       <div class="row astro_row">
           <div class="col-sm-4 ">
              <div class="ast-img-02">
                <img src="<?php echo base_url();?>image/astrologers/<?php echo $astrologers_details[0]['astro_image'];?>" alt="team-img">
              </div>
           </div>
           <div class="col-sm-8 astro_im_icon">
               <h3><?php echo $astrologers_details[0]['astro_name'];?></h3>
               <p>
                <span>
                  <i class="fa fa-comments" aria-hidden="true"></i><strong>
                    <?php
                      $astrochatrate = $astrologers_details[0]['astro_chat_rate'];
                      $chatdisc=$astrologers_details[0]['astro_chat_rate_discount'];
                      if($chatdisc == 0)
                      {
                       echo "RS :". $astrochatrate." / min "; 
                       }else
                       {
                        $percentagechat = ($chatdisc / 100) * $astrochatrate;
                        $discpricechat=$astrochatrate-$percentagechat;
                         echo $discpricechat." / min " ;
                       }
                    ?></strong>
                </span>
                <span>
                  <i class="fa fa-phone" aria-hidden="true"></i><strong>
                    <?php 
                    $astrocallrate = $astrologers_details[0]['astro_calling_rate'];
                    $calldisc=$astrologers_details[0]['astro_calling_rate_discount'];
                    if($calldisc == 0 )
                    {
                     echo "RS :". $astrocallrate." / min "; 
                     }else
                     {
                      $percentagecall = ($calldisc / 100) * $astrocallrate;
                      $discpricecall=$astrocallrate-$percentagecall;
                       echo $discpricecall." / min " ;
                      }
                    ?>
                     </strong>
                </span>
                <span>
                  <i class="fa fa-file-text-o" aria-hidden="true"></i><strong>
                    <?php 
                    $astroreportrate = $astrologers_details[0]['astro_askreport_rate'];
                    $reportdisc=$astrologers_details[0]['astro_report_rate_discount'];
                  
                    if($reportdisc == 0 )
                    {
                     echo "RS :". $astroreportrate; 
                     }else
                     {
                      $percentagereport = ($reportdisc / 100) * $astroreportrate;
                      $discpricereport=$astroreportrate-$percentagereport;
                       echo $discpricereport ;
                      }
                    ?> / report</strong> 
                </span>
               </p>
               <p><?php echo $astrologers_details[0]['astro_language'];?></p>
               <p><i class="fa fa-graduation-cap" aria-hidden="true"></i> Exp <?php echo $astrologers_details[0]['astro_experience'];?> Years</p>
               <p> <?php 
                    $a=cat_fetch_join('astrologers_multiplecategories','category_astrologer',$astrologers_details[0]['astro_id']);
                    $c=0;
                    $ak = array();
                       foreach($a as $b){ $c++;
                    $ak[] = $b['cat_astr_title'];
                       }
                    echo implode(',',$ak); 
                    ?></p>
           </div>
       </div>
   </div>
  
   <div class="container">
       <div class="row">
           <input type="hidden" value="<?php echo $astrologers_details[0]['astro_id']; ?>" id="astros_ids" />
          <?php 
            $astros_id = $astrologers_details[0]['astro_id'];
            $astros_chat_stu = $astrologers_details[0]['astro_online_chat_status'];
            if(!empty($astros_chat_stu)) {
          ?>

            <div class="col-md-4" onclick="chat('<?php echo $astros_id;?>');">
              <a href="javascript:void(0);" class="hs-astro-profilechat">
                <i class="fa fa-comments" aria-hidden="true"></i>
                <p> Start Chat </p>
                <!-- <h5> <i class="fa fa-inr" aria-hidden="true"></i>  <?php //echo $astrochatrate = $astrologers_details[0]['astro_chat_rate'];?> / min <?php $chatdisc=$astrologers_details[0]['astro_chat_rate_discount']; if($chatdisc != 0 ){echo $chatdisc;}?></h5>
                -->
              <h5>  <?php
               $astrochatrate = $astrologers_details[0]['astro_chat_rate'];
                $chatdisc=$astrologers_details[0]['astro_chat_rate_discount'];
                  
                if($chatdisc == 0 )
                {
                 echo "RS :". $astrochatrate." / min "; 
                 }else
                 {
                  $percentagechat = ($chatdisc / 100) * $astrochatrate;
                  $discpricechat=$astrochatrate-$percentagechat;
                   echo"Rs &nbsp;".  $discpricechat ."&nbsp; &nbsp;<del> ".$astrochatrate."</del>&nbsp;&nbsp;" .$chatdisc. " % Disc"  ;
                 }
                 ?>
                
                

                </h5>
               
              </a>
            </div>
            <?php }else{ ?>
            <div class="col-md-4" onclick="callof();">
              <a href="javascript:void(0);" class="hs-astro-profilechat">
                <i class="fa fa-comments" aria-hidden="true"></i>
                <p> Start Chat </p>
                <h5> <i class="fa fa-inr" aria-hidden="true"></i>  <?php echo $astrologers_details[0]['astro_chat_rate'];?> / min </h5>
              </a>
            </div>
            <?php }?>
            <?php $astro_call_stu = $astrologers_details[0]['astro_online_call_status']; 
            
              if(!empty($astro_call_stu))
              {
            ?>
            <div class="col-md-4" onclick="call('<?php echo $astros_id;?>');">
              <a href="" class="hs-astro-profilechat">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <p> Start Call </p>
                <!-- <h5> <i class="fa fa-inr" aria-hidden="true"></i>  <?php echo $astrologers_details[0]['astro_calling_rate'];?> / min </h5> -->
                <h5>  <?php
               $astrocallrate = $astrologers_details[0]['astro_calling_rate'];
                $calldisc=$astrologers_details[0]['astro_calling_rate_discount'];
                  
                if($calldisc == 0 )
                {
                 echo "RS :". $astrocallrate." / min "; 
                 }else
                 {
                  $percentagecall = ($calldisc / 100) * $astrocallrate;
                  $discpricecall=$astrocallrate-$percentagecall;
                   echo"Rs &nbsp;".  $discpricecall ."&nbsp; &nbsp;<del> ".$astrocallrate."</del>&nbsp;&nbsp;" .$calldisc. " % Disc"  ;
                  } 
                 ?>

                </h5>
              </a>
            </div>
            <?php }else{ ?>
            <div class="col-md-4" onclick="callof();">
              <a href="" class="hs-astro-profilechat">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <p> Start Call </p>
                <h5> <i class="fa fa-inr" aria-hidden="true"></i>  <?php echo $astrologers_details[0]['astro_calling_rate'];?> / min </h5>
              </a>
            </div>
            <?php } $se_id = $astrologers_details[0]['astro_id']; ?>
            <input type="hidden" name="sesname" id="sesname" value="<?php echo $astrologers_details[0]['astro_name']; ?>" class="form-control" />
            <div class="col-md-4" onclick="checklgn();">
              <?php $se_id = $this->session->userdata('user_id'); ?>
              <?php $val = fetchbyresultByCondiction('user',array('user_id'=>$se_id)); if(!empty($val)){ ?>
              <input type="hidden" name="sesname" id="sesname" value="<?php echo $val[0]['user_first_name']; ?>" class="form-control" />
              <?php } //else { ?>
              <?php //$se_id = $this->session->userdata('astro_id'); ?>
              <?php //$val = fetchbyresultByCondiction('astrologers',array('astro_id'=>$se_id)); if(!empty($val)) { ?>
              <!--<input type="hidden" name="sesname" id="sesname" value="<?php echo $val[0]['astro_name']; ?>" class="form-control" />-->
              <?php  //}  } ?>
              
              <input type="hidden" name="sesid" id="sesids" value="<?php if(!empty($se_id)) { echo $se_id; }else { echo $se_id = 0 ; } ?>" />
              <a href="javascript:void(0);" class="hs-astro-profilechat">

                <i class="fa fa-file-text-o" aria-hidden="true"></i>

                <p> Ask Report </p>

                <!-- <h5> <i class="fa fa-inr" aria-hidden="true"></i>  <?php echo $astrologers_details[0]['astro_askreport_rate'];?> / Report </h5> -->
                <h5>  <?php
               $astroreportrate = $astrologers_details[0]['astro_askreport_rate'];
                $reportdisc=$astrologers_details[0]['astro_report_rate_discount'];
                  
                if($reportdisc == 0 )
                {
                 echo "RS :". $astroreportrate." / min "; 
                 }else
                 {
                  $percentagereport = ($reportdisc / 100) * $astroreportrate;
                  $discpricereport=$astroreportrate-$percentagereport;
                   echo"Rs &nbsp;".  $discpricereport."&nbsp; &nbsp;<del> ".$astroreportrate."</del>&nbsp;&nbsp;" .$reportdisc. " % Disc"  ;
                  }
                 ?>
                </h5>
              </a>
            </div>
          
       </div>
 
      <div class="divider-01 clearfix"></div>
        <div class="row">
           <div class="col-sm-12">
              <div class="hs-astro-info">
                <h3>About Astrologer</h3>
                 <p>
                  <?php echo $astrologers_details[0]['astro_description'];?> 
                 </p>
              </div>
           </div>
        </div>
         <?php $comments2=fetchbyresultByCondiction('comment_rating_astrologer',array('cr_astro_id'=>$astros_id,'cr_status'=>1)); ?>
       
      <div class="divider-01"></div>
        <div class="row">
          <div class="col-sm-12">
            <h4>Reviews:</h4>
          </div>
        </div>
        <div class="row">
            <div class="col-md-4">
              <div class="hs-astro-rate">
                  <!--<h3>4.95</h3>-->
                  <!--<p>-->
                  <!--<i class="fa fa-star checked"></i>-->
                  <!--<i class="fa fa-star checked"></i>-->
                  <!--<i class="fa fa-star checked "></i>-->
                  <!--<i class="fa fa-star-half-o checked"></i>-->
                  <!--<i class="fa fa-star"></i>-->
                  <!--</p>-->
                    <h3><?php $rt=rating($astros_id); echo $rt;  if($rt==''){echo $rt= 01 ;}?></h3>
                  <p>
                  <!-- <i class="fa fa-star checked"></i>
                  <i class="fa fa-star checked"></i>
                  <i class="fa fa-star checked "></i>
                  <i class="fa fa-star-half-o checked"></i>
                  <i class="fa fa-star"></i> -->
                  <?php
                	$starNumber = (isset($rt)) ? $rt : 0;
                	for( $x = 0; $x < 5; $x++ )
                    {
                        if( floor($starNumber)-$x >= 1 )
                        { echo '<i class="fa fa-star checked"></i>'; }
                        elseif( $starNumber-$x > 0 )
                        { echo '<i class="fa fa-star-half-o checked"></i>'; }
                        else
                        { echo '<i class="fa fa-star-o"></i>'; }
                  }
                 ?>
                  <p>
                    <i class="fa fa-user" aria-hidden="true"></i> total user
                  </p>
              </div>
            </div>
            <div class="col-md-8">
              <div class="hs-astrorate-bar">
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                    <span class="sr-only">70% Complete</span>
                  </div>
                </div>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                    <span class="sr-only">70% Complete</span>
                  </div>
                </div>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:25%">
                    <span class="sr-only">70% Complete</span>
                  </div>
                </div>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:12%">
                    <span class="sr-only">70% Complete</span>
                  </div>
                </div>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:2%">
                    <span class="sr-only">70% Complete</span>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
                  <?php $commentss=fetchbyresultByCondiction('comment_rating_astrologer',array('cr_astro_id'=>$astros_id,'cr_status'=>1)); ?>
    <?php foreach($commentss as $cmt){
              
              ?>
            <div class="hs-user-review-astro">
              <div class="hs-astro-userreview">
                
                <p class="bg-clr-01">K</p>
              
              </div>
              <div class="hs-astro-userreview-rating">
                <p>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                    <span> <?php echo$dte=date('d-M-Y',strtotime($cmt['cr_timestamp'])) ;?> </span>
                  </p>
                   <p> <?php echo $cmt['cr_comment'];?> </p>
              </div>
            </div>
             <?php } ?>
           <?php if(empty($cmt['cr_astro_id'])){?>
           <p>NO COMMENT FOUND</p>
           <?php } ?>
            <!-- review comm -->
            <!--<div class="hs-user-review-astro">-->
            <!--  <div class="hs-astro-userreview">-->
                
            <!--    <p class="bg-clr-02">M</p>-->
              
            <!--  </div>-->
            <!--  <div class="hs-astro-userreview-rating">-->
            <!--    <p>-->
            <!--      <i class="fa fa-star"></i>-->
            <!--      <i class="fa fa-star"></i>-->
            <!--      <i class="fa fa-star"></i>-->
            <!--      <i class="fa fa-star"></i>-->
            <!--      <i class="fa fa-star"></i>-->
            <!--      <span> 05 Dec 2020 </span>-->
            <!--      </p>-->
            <!--      <p> Very nice Atrologer.</p>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
        </div>
   </div>
<div class="divider-01"></div>

<!-- Modal -->
<div id="reportModal" class="modal fade" role="dialog">
  <div class="modal-dialog hs_astro_user_lgoin">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-5 hs-user-bnimg">
            <div>
              <img src="<?php echo base_url();?>image/websiteimages/report.png" style="width: 100%; height: 450px;">
            </div>
          </div>
          <div class="col-sm-7">
            <br>
            <div class="tab-content">
              <div id="home" class="tab-pane fade in active" >
                <h3 style="text-align: center;">Send Your Query</h3>
                <form id='myForm12' method="post" enctype= "multipart/form-data" class="login-filed">
                  <div class="form-group hs-usr-login-field" style="margin-top: 20px;">
                    <select id="cars" name="rp_type" class="dropdown-opt" onchange="subreport();">
                      <option value="0">Select Report</option>
                      <?php $ques = fetchbyresult('reportquestionoption');
                        foreach ($ques as $rque) { ?>
                          <option value="<?php echo $rque['rqo_id']; ?>"><?php echo $rque['rqo_question']; ?></option>
                       <?php }
                      ?>
                    </select>
                  </div>
                  <div class="subcatshow"></div>
                  <div class="form-group hs-usr-login-field " style="margin-top: 20px;">
                  <!-- hidden -->
                    <textarea  name="rp_description" id="des" rows="2" cols="50" value="Description" class="dropdown-opt" required="required"></textarea>
                    <input type="hidden" name="astroid_reportss" id="astroidreportss" value="<?php echo $astrologers_details[0]['astro_id'];?>" > 
                    <?php $user_id = $this->session->userdata('user_id');?>
                    <input type="hidden" name="usersss_id"  id="usersids" value="<?php echo $user_id;?>"> 
                    <input type="hidden" name="reports_rate"  id="reportssrates" value="<?php echo $astrologers_details[0]['astro_askreport_rate'];?>" > 
                    <?php $walletbalance = fetchby_wheres('wallet',array('user_id'=>$user_id));
                      foreach($walletbalance as $wb)
                      {
                        $balence = $wb['wallet_amt'];
                      ?>
                      <!-- hidden wallet balance -->
                      <input type="hidden" name="wallet_balance"  id="wallet_balance" value="<?php echo $balence;?>" > 
                      <?php } ?>
                  </div>
                  <div class="form-group hs-usr-login-field " style="margin-top: 20px;">
                    <lable>Upload</lable>
                    <input type="file" name="userfile" id="usfile" value="upload" class="form-group hs-usr-login-field" size="60" id="fUpload" required="required">
                  </div>
                  <div class="hs-submodlBtn">
                    <input type="button" name="insert_btn" onclick="subreport();" class="form-control" value="submit" id="insert_btn">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- <button type="submit">Submit</button> -->
      </div>
    </div>
  </div>
</div>

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
        <body>
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
                <p class="welcome">Welcome<b><?php echo $val[0]['user_first_name']; ?></b></p>
                <input type="hidden" value="<?php echo $user; ?>" id="useridforchat" />
                <input type="hidden" value="<?php echo $val[0]['user_first_name']; ?>" id="usernameforchat" />
                <button type="button" class="btn btn-danger" onclick="exitchat();" >Exit Chat</button>
                <!-- <p class="logout"><a id="exit" onclick="exitchat();" >Exit Chat</a></p> -->
            </div>
            
            <section id="content">
              <section class="main padder">
                <div class="clearfix">
                  <!--<h4><i class="fa fa-table"></i>Users</h4>-->
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <section class="panel mr-btm">
                      <div class="panel-body row cht-contner">
                        <div class="col-lg-12 cht-hght">
                            <div class="tab-content astro-cht-section" id="chat_messages">
                                <div id="home" class="tab-pane fade in active">
                                    <h4>Start chat</h4>
                                        <div id="oldchat">
                                            <?php 
                                                //echo "user= ".$user;
                                                $asids = $astrologers_details[0]['astro_id'];
                                                $where = "(`sender_id`=$user AND `reciver_id`=$asids) OR (`sender_id`=$asids AND `reciver_id`=$user)";
                                                //print_r($where);
                                                $res = fetchbyresultByCondiction('chat_messsage',$where);
                                                //echo $this->db->last_query();
                                                foreach($res as $row) {
                                                    $req = fetchbyresultByCondiction('user',array('user_id'=>$row['sender_id']));
                                                    if(!empty($req[0]['user_first_name'])){$name = $req[0]['user_first_name'];}
                                                    else{$name = $astrologers_details[0]['astro_name'];}
                                                    
                                                //  $res = fetchbyresultByCondiction('astrologers',array('astro_id'=>$asids));
                                                //  if(!empty($res[0]['astro_name'])){$name = $res[0]['astro_name'];}
                                                //  else{$name = $val[0]['user_first_name'];}
                                            ?>
                                            <input type="hidden" name="" value="<?php echo $user; ?>" id="sendersids"/>
                                            <p><strong><?php echo $name.":"; ?></strong><span>&nbsp&nbsp<?php echo $row['message']; ?></span></p>
                                        <?php } ?>
                                    </div>
                                </div>
                                
                                <!--<div id="menu-01" class="tab-pane fade in">-->
                                <!--  <h4>Start chat</h4>-->
                                <!--</div>-->
                            </div>
                            <div class="astro-cht-icon">
                                <div contenteditable="true" id="chatmsg" placeholder="Type here..." class="form-control chatmsgs" ></div>
                                <button class="tel-chtButton" onclick="sendsChat();" > 
                                    <i class="fa fa-telegram tel-chtIcon " aria-hidden="true"></i> 
                                </button>
                                <span id="userinfo"></span>
                            </div>
                        </div>
                      </div>
                    </section>
                    <input type="hidden" id="partnername" value="Astrologer" />
                  </div>
                </div>
              </section>
            </section>
          </div>

          <script>
            var base_url='<?php echo base_url();?>';
            var msgdata = document.getElementById('chatmsg').textContent;
            var reciverid = document.getElementById('astros_ids').value;
            var userid = document.getElementById('useridforchat').value;
            var username = document.getElementById('usernameforchat').value;

                
                // var uri = "<?php //echo base_url('astro_controller/chatsend');?>";
                // alert(uri);
                // $.ajax({
                //     url: uri,
                //     type: "POST",
                //     data: {sender:userid,msg:message,reciver:reciverid},
                //     dataType: "json",
                //     cache : false,
                //     success: function(result)
                //     {
                //         alert('working');
                //     },
                    
                // });

          </script>
           <script src="https://twillo.ml:9099/socket.io/socket.io.js" type="text/javascript"></script>  
          <script src="<?php echo base_url('assets/frontend/js/chat.js');?>"></script>  
        </body>
      </div>
    </div>
  </div>
<!-- Chat Modal Ends -->
<!-- Chat Script Start -->
<!--<script src="https://live.pnpuniverse.com:9001/socket.io/socket.io.js?v=2.0.15"></script>-->
<!-- Chat Script End -->

<script type="text/javascript">
    
    function sendsChat()
    {
        //var name = document.getElementsByClassName('chatmsgs').value;
        var reciverid = document.getElementById('astros_ids').value;
        var userid = document.getElementById('useridforchat').value;
        var message = document.getElementById('chatmsg').textContent;
        //alert(name);
        var uri = "<?php echo base_url('astro_controller/chatsend');?>";
        $.ajax({
            url: uri,
            type: "POST",
            data: {sender:userid,msg:message,reciver:reciverid},
            dataType: "json",
            cache : false,
            success: function(result)
            {
                //alert('working');
            },
            
        }); 
    }
    
    function sendmsg()
    {
        var name = document.getElementById('sesname').value;
        //alert(name);
        var dataString = {
                            //message : $("#message").val(),
                            from_user:name,
                            to_user:name
                        };
        var uri = "<?php echo base_url('astro_controller/chatsend');?>";        alert(uri);        
        $.ajax({
            url: uri,
            type: "POST",
            data: dataString,
            dataType: "json",
            cache : false,
            success: function(result)
            {
                alert('working');
            },
            // success: function(result)
            // {
            //     if(data.success ==true)
            //     {
            //         $(".msg_history").append("<div class='outgoing_msg'><div class='sent_msg'><p>"+data.message+"</p><span class='time_date'>"+data.date+"</span> </div></div>"); 
                    
            //         socket.emit('new_message', {
            //         email_from:"<?php //echo $this->session->userdata('user')['id'] ;?>",   
            //         email_to:"<?php //echo $user[0]['id'] ?>",  
            //         message: data.message,
            //         date: data.date,
            //         msgcount: data.msgcount
            //         });
            //         console.log(socket);
            //     }
            // },error: function(xhr, status, error)
            // {
            //     alert(error);
            // },
        });                
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

  function callof()
  {
    alert('Astrologer Is Offline Please Click Online Astrologer.');
    return false;
  }

  function call(astrooid)
  {
    var id = document.getElementById('sesids').value;
    //alert(id);
    if(id>0)
    {
      if(confirm('Please click OK For connecting Call'))
      {
        var callrate=document.getElementById('hiddencallingrate'+astrooid).value;
        var users_ids = document.getElementById('hiddenuser_id').value;
        var astrol_ids = astrooid;
        var walletbalance= document.getElementById('wallet_balance').value;
         // alert(astrooid)
         // alert(users_ids);
         // alert(walletbalance);exit;
        $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>call_data",
              data: {callrate: callrate, users_ids: users_ids,walletbalance: walletbalance,astrol_ids:astrol_ids },
              
              success: function(data){
                console.log(data);
              }
        });  
      }
      else
      {
        return false;
      }
    }
    else
    {
      if(confirm('First Login With User For Connecting Call.'))
      {
        $('#myModal').modal('show');
      }
      else
      {
        return false;
      }
    }  
  }

  function chat(astrooid)
  {
    var id = document.getElementById('sesids').value;
    var name = document.getElementById('sesname').value;
    //alert(id);alert(name);
    if(id>0)
    {
      if(confirm('Please click OK For connecting a Chat'))
      {
        $('#myModalChat').modal('show'); 
      }
      else
      {
        return false;
      }  
    }
    else
    {
      if(confirm('Login With User For Chat With Astrologer'))
      {
        $('#myModal').modal('show');
      }
      else
      {
        return false;
      }
    }
    
  }

  function checklgn()
  {
    var id = document.getElementById('sesids').value;
    
    if(id == 0)
    {
      if(confirm('Login With User'))
      {
        $('#myModal').modal('show');  
      }
      else
      {
        return false;
      }
    }
    else
    {
      $('#reportModal').modal('show');  
    } 
  }  
  
  function subreport()
  {
    var cat_type = document.getElementById('cars').value;

    if(cat_type==0)
    {
      $('.subcatshow').hide();
      alert('Please Select The Report');
      return false;
    }
    else
    {
      $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>subreport",
              data: {id: cat_type},
              
              success: function(response){
                $('.subcatshow').html(response);
              }
        });
    }  
  }
</script>
