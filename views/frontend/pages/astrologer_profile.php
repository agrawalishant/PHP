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
    background-color: #fe8a13;
    color: #fff;
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
.userchat{
    background-color: #f5c666;
    border-radius: 10px;
    padding: 12px;
    margin: 12px;
    text-align:left;
}
.astrochat{
    background-color: #2a8c3dc7;
    padding: 12px;
    margin: 12px;
    border-radius: 10px;
    text-align:right;
}
/*#oldchat {*/
/*    transform: rotate(180deg);*/
/*    direction: ltr;*/
/*}*/
/*.astro-cht-section {*/
/*    height: 170px;*/
/*    overflow: auto;*/
/*    transform: rotate(180deg);*/
/*    direction: rtl;*/
/*}*/
</style>

<div class="hs_indx_title_main_wrapper">
    <div class="hs_title_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">
                <div class="hs_indx_title_left_wrapper">
                    <h1 style="font-size: 20px;color: #ffffff;text-transform: uppercase;">Our Astrologers</h1>
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
                  <?php if(!empty($astrologers_details[0]['astro_image'])){ ?>
                <img src="<?php echo base_url();?>image/astrologers/<?php echo $astrologers_details[0]['astro_image'];?>" alt="team-img">
                <?php }?>
              </div>
           </div>
           <div class="col-sm-8 astro_im_icon">
               <?php if(!empty($astrologers_details[0]['astro_name'])){?>
               <h3><?php echo $astrologers_details[0]['astro_name'];?></h3>
               <?php }?>
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
                    <!-- 19/03/2021 start -->
                    <?php
                      $astrochatrate = $astrologers_details[0]['astro_chat_rate'];
                      $chatdisc=$astrologers_details[0]['astro_chat_rate_discount'];
                      if($chatdisc == 0)
                      { ?>
                       <!-- //echo "RS :". $astrochatrate." / min ";  -->
                       <input type="hidden" name="hiddenchatrate" id="hiddenchatrate" value="<?php echo $astrochatrate; ?>">
                      <?php }else
                       {
                        $percentagechat = ($chatdisc / 100) * $astrochatrate;
                        $discpricechat=$astrochatrate-$percentagechat;
                        ?> 
                        <input type="hidden" name="hiddenchatrate" value="<?php echo $discpricechat;?>">
                      <!-- //  echo $discpricechat." / min " ; -->
                      <?php }
                    ?>
                     <!-- 19/03/2021 end -->
                </span>
                <span>
                  <i class="fa fa-phone" aria-hidden="true"></i><strong>
                    <?php 
                    $astrocallrate = $astrologers_details[0]['astro_calling_rate'];
                    $calldisc=$astrologers_details[0]['astro_calling_rate_discount'];
                    if($calldisc == 0 )
                    { ?>
                        
                        <span id='swamt' style="display:none;">
                            RS : <span id='scouamt'><?php echo $astrocallrate ; ?></span> / min
                            <input type='hidden' value='<?php echo $astrocallrate; ?>' class="calamtc" id='callamtC' />    
                        </span>
                        <span id='hdamt'>
                            <?php echo "RS :".$astrocallrate." / min ";  ?>
                            <input type='hidden' value='<?php echo $astrocallrate; ?>' id='callamtCall' />
                        </span>   
                        
                    <?php } else
                     {
                      $percentagecall = ($calldisc / 100) * $astrocallrate;
                      $discpricecall=$astrocallrate-$percentagecall; ?>
                        
                        <span id='swamt' style="display:none;">
                            RS : <span id='scouamt'></span> / min
                            <input type='hidden' value='<?php echo $discpricecall; ?>' class="calamtc" id='callamtC' />
                        </span>
                        <span id='hdamt'>
                            <?php echo $discpricecall." / min " ;  ?>
                            <input type='hidden' value='<?php echo $discpricecall; ?>' id='callamtCall' />
                        </span>
                      
                    <?php  }
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
   </div><!-- 19/03/2021 start -->
<?php 
 $user_id = $this->session->userdata('user_id');
 if(!empty($user_id))
 {
?>
  <input type="hidden" value="<?php echo $user_id ;?>" id="hiddenuser_id" />
         
<?php } ?>





<!--  -->
            <!-- 19/03/2021 end -->
   <div class="container">
       <div class="row">
           
           <div class="col-md-4">
                <!--<form action="#" method="post" id="chatFormCoupon">-->
                <!--    <label>Promo Code</label>-->
                <!--    <input type="text" name="chat_coupon" id="chatCoupontext" placeholder="Enter Chat Promo Code" style="border-radius: 0px;border: none;box-shadow: none;border-bottom: 1px solid #000;">-->
                <!--    <button name="apply" class="btn btn-primary" onclick="chatCoupon();">Apply</button>-->
                <!--</form>-->
            </div>
            
           <div class="col-md-8">
                <?php
                    //$url = strrev($_SERVER['REQUEST_URI']);
                    //echo $url = strrev($this->input->post('url'));
                    //$res = explode('/',$url);
                    // for($i=0;$i<1;$i++)
                    // {
                    //     $ul = $res[0];
                    // }
                    // $newstring = strrev($ul);
                    //echo 'ok = '.$this->session->userdata('couponid');
                    //if($this->session->userdata('couponid')==$newstring) { ?>
                <div id='callResultCoupon' style="display: none;">
                    <span id="callResultCoupons" style="color:Green;">Code Applyed Successfully</span>&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-primary" onclick="callCouponRemove();">Remove Code</button>
                </div>
                <form action="<?php echo base_url('astro_controller/clingcoupun/'); ?><?php echo $astrologers_details[0]['astro_id']; ?>" method="post" id="callFormCoupon">
                    <label>Promo Code</label>
                    <input type="text" name="call_coupon" id="callCoupontext" placeholder="Enter Calling Promo Code" style="border-radius: 0px;border: none;box-shadow: none;border-bottom: 1px solid #000;">
                    <input type="hidden" name="call_coupon_amt" value="<?php if(!empty($astrocallrate)){ echo $astrocallrate; }else{ echo $discpricecall; } ?>" />
                    <button type="button" name="apply" class="btn btn-primary" onclick="callCoupon();">Apply</button>&nbsp;&nbsp;&nbsp;
                    <span id="callCouponFalseMsg" style="color:red;"></span>
                </form>
            </div>
            
            <!--<div class="col-md-4">-->
                <!--<form action="#" method="post" id="reportFormCoupon">-->
                <!--    <label>Promo Code</label>-->
                <!--    <input type="text" name="report_coupon" id="reportCoupontext" placeholder="Enter Report Promo Code" style="border-radius: 0px;border: none;box-shadow: none;border-bottom: 1px solid #000;">-->
                <!--    <button name="apply" class="btn btn-primary" onclick="reportCoupon();">Apply</button>-->
                <!--</form>-->
            <!--</div>-->
           <?php $asid = $astrologers_details[0]['astro_id']; ?>
           <input type="hidden" value="<?php echo $astrologers_details[0]['astro_id']; ?>" id="astros_ids" />
          <?php 
            $user_id = $this->session->userdata('user_id');
            $walamt=0;
            if(!empty($user_id)){
            $wal = fetchbyresultByCondiction('wallet',array('user_id'=>$user_id));
            $walamt = $wal[0]['wallet_amt'];}
            $chtcarges = $astrochatrate;
            $astros_id = $astrologers_details[0]['astro_id'];
            $astros_chat_stu = $astrologers_details[0]['astro_online_chat_status'];
            if(!empty($astros_chat_stu) && $walamt>$chtcarges) { ?>
            
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
            <?php }elseif(empty($user_id) && !empty($astros_chat_stu)) { ?>
            <div class="col-md-4" onclick="chatLoginChk();">
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
            <?php }elseif(!empty($astros_chat_stu) && $walamt<=$chtcarges) { ?>
            <div class="col-md-4" onclick="callwal();">
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
            <?php } ?>
            <?php $astro_call_stu = $astrologers_details[0]['astro_online_call_status']; 
             $callcharges = $astrocallrate;
            
            if(!empty($astro_call_stu) && ($walamt>$callcharges)){ ?>
            <div class="col-md-4" onclick="call('<?php echo $astros_id;?>');">
              <a href="" class="hs-astro-profilechat">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <p> Start Call </p>
                <!-- <h5> <i class="fa fa-inr" aria-hidden="true"></i>  <?php echo $astrologers_details[0]['astro_calling_rate'];?> / min </h5> -->
                <h5>
                    <i class="fa fa-inr" aria-hidden="true"></i>
                    <span id='startwamt' style="display:none;">
                        <span id='satartcouamt'></span> / min
                    </span>
                    <span id='starthdamt'>
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
                   //echo"Rs &nbsp;".  $discpricecall ."&nbsp; &nbsp;<del> ".$astrocallrate."</del>&nbsp;&nbsp;" .$calldisc. " % Disc"  ;
                  echo $discpricecall." / min ";
                 } 
                 ?>
                </span>
                </h5>
              </a>
            </div>
            <?php }else if(!empty($astro_call_stu) && empty($user_id)){ ?>
            <div class="col-md-4" onclick="chatLoginChk();">
              <a href="" class="hs-astro-profilechat">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <p> Start Call </p>
                <h5><i class="fa fa-inr" aria-hidden="true"></i>
                    <span id='startwamt' style="display:none;">
                        <span id='satartcouamt'></span> / min
                    </span>
                    <span id='starthdamt'>
                    <?php
                        $calldisc=$astrologers_details[0]['astro_calling_rate_discount'];
                        if($calldisc == 0 )
                        { 
                            echo "RS :". $astrocallrate." / min "; 
                        }else
                        {
                          $percentagecall = ($calldisc / 100) * $astrocallrate;
                          $discpricecall=$astrocallrate-$percentagecall;
                           echo $discpricecall." / min ";
                        } ?>
                    </span>    
                      <!--<i class="fa fa-inr" aria-hidden="true"></i><?php //echo $astrologers_details[0]['astro_calling_rate'];?> / min -->
                </h5>
              </a>
            </div>
            <?php }else if(!empty($astro_call_stu) && ($walamt<=$callcharges)){ ?>
            <div class="col-md-4" onclick="callwal();">
              <a href="" class="hs-astro-profilechat">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <p> Start Call </p>
                <h5> <i class="fa fa-inr" aria-hidden="true"></i>
                    <!--<i class="fa fa-inr" aria-hidden="true"></i>  <?php //echo $astrologers_details[0]['astro_calling_rate'];?> / min -->
                    <span id='startwamt' style="display:none;">
                        <span id='satartcouamt'></span> / min
                    </span>
                    <span id='starthdamt'>
                    <?php
                        $calldisc=$astrologers_details[0]['astro_calling_rate_discount'];
                        if($calldisc == 0 )
                        { 
                            echo "RS :". $astrocallrate." / min "; 
                        }else
                        {
                            $percentagecall = ($calldisc / 100) * $astrocallrate;
                            $discpricecall=$astrocallrate-$percentagecall;
                            echo $discpricecall." / min ";
                        } ?>
                    </span>    
                </h5>
              </a>
            </div>
            <?php }else{ ?>
            <div class="col-md-4" onclick="callof();">
              <a href="" class="hs-astro-profilechat">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <p> Start Call </p>
                <h5> <i class="fa fa-inr" aria-hidden="true"></i>  
                    <span id='startwamt' style="display:none;">
                        <span id='satartcouamt'></span> / min
                    </span>
                    <span id='starthdamt'>
                        <?php
                            $calldisc=$astrologers_details[0]['astro_calling_rate_discount'];
                              
                            if($calldisc == 0 )
                            { 
                             echo "RS :". $astrocallrate." / min "; 
                             }else
                             {
                              $percentagecall = ($calldisc / 100) * $astrocallrate;
                              $discpricecall=$astrocallrate-$percentagecall;
                               echo $discpricecall." / min ";
                              } ?>
                    <!--<?php //echo $astrologers_details[0]['astro_calling_rate'];?> / min -->
                    </span>
                </h5>
              </a>
            </div>
            <?php } $se_id = $astrologers_details[0]['astro_id']; ?>
            
            <input type="hidden" name="sesname" id="sesname" value="<?php echo $astrologers_details[0]['astro_name']; ?>" class="form-control" />
            <div class="col-md-4" onclick="checklgn();">
              <?php $se_id = $this->session->userdata('user_id'); ?>
              <?php $val = fetchbyresultByCondiction('user',array('user_id'=>$se_id)); if(!empty($val)){ ?>
              <input type="hidden" name="sesname" id="sesname" value="<?php echo $val[0]['user_first_name']; ?>" class="form-control" />
              <?php } ?>
              
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
                 echo "RS :". $astroreportrate." / report "; 
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
                  <h3><?php $rt=rating($astros_id); echo $rt;  if($rt==''){echo $rt= 01 ;}?></h3>
                  <p>
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
 
  <div class="modal fade" id="myModalChat" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <head>
          <meta charset="utf-8" />
          <title>Chat Application</title>
          <meta name="description" content="Chat Application" />
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
                <p class="welcome">Welcome<b>&nbsp;&nbsp;&nbsp;<?php echo $val[0]['user_first_name']; $i=0;?></b></p> 
                <div class="timers">
                <?php 
                    //$chkusertimer = fetchbyresultByCondiction('chat_notification',array('user_id'=>$user,'astro_id'=>$asid,'astro_timeupdate_status'=>1));
                    //if(!empty($chkusertimer)){ echo date("H:i:s");}
                    // $startTimes = array();
                    // StopWatch::$startTimes[date("H:i:s")] = microtime(true); 
                ?>
                </div>
                <input type="hidden" value="<?php echo $user; ?>" id="useridforchat" />
                <input type="hidden" value="<?php if(!empty($val[0]['user_first_name'])){echo $val[0]['user_first_name'];}else{ echo 'blank'; } ?>" id="usernameforchat" />
                <!--<input type="text" value="<?php //echo $this->session->userdata("lastid"); ?>" id="userLastNotification" />-->
                <button type="button" class="btn btn-danger" onclick="exitchat();" >Exit Chat</button>
            </div>
            
            <section id="content">
              <section class="main padder">
                <div class="clearfix">
                  <!--<h4><i class="fa fa-table"></i>Users</h4>-->
                </div>
                <div class="row">
                  <div class="col-lg-12" style="height:250px;" >
                    <section class="panel mr-btm">
                      <div class="panel-body row cht-contner">
                        <div class="col-lg-12 cht-hght">
                            <div class="tab-content astro-cht-section" id="chat_messages">
                                
                                <div id="home" class="tab-pane fade in active">
                                    <h4>Start chat</h4>
                                        <div id="oldchat">
                                            <div id="shcht">
                                            <?php 
                                                $asids = $astrologers_details[0]['astro_id'];
                                                //$where = "(`sender_id`=$user AND `reciver_id`=$asids) OR (`sender_id`=$asids AND `reciver_id`=$user)";
                                                $where = "(`sender_id`='$user' AND `reciver_id`='$asids') OR (`sender_id`='$asids' AND `reciver_id`='$user')";
                                                $res = fetchbyresultByCondiction('chat_messsage',$where);
                                                
                                                  foreach($res as $row) { 
                                                      $req = fetchbyresultByCondiction('user',array('user_id'=>$row['sender_id']));
                                                      if(!empty($req[0]['user_first_name'])){$name = $req[0]['user_first_name'];
                                            ?>
                                            <div class="userchat">
                                                <input type="hidden" name="" value="<?php echo $user; ?>" id="sendersids"/>
                                                <p><strong><?php echo $name.":"; ?></strong><span>&nbsp;&nbsp;<?php echo $row['message']; ?></span></p>
                                            </div>
                                            <?php }else{$name = $astrologers_details[0]['astro_name']; 
                                            //$where = "(`sender_id`='$user' AND `reciver_id`='$asids') OR (`sender_id`='$asids' AND `reciver_id`='$user')";
                                            //$res = fetchbyresultByCondiction('chat_messsage',$where);
                                            ?>
                                            <div class="astrochat">
                                                <input type="hidden" name="" value="<?php echo $user; ?>" id="sendersids"/>
                                                <p><span><?php echo $row['message']; ?>&nbsp;&nbsp;</span><strong><?php echo ": ".$name; ?></strong></p>
                                            </div>
                                        <?php } } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="astro-cht-icon">
                                <div contenteditable="true" id="chatmsg" placeholder="Type here..." class="form-control chatmsgs" ></div>
                                <!--<button class="tel-chtButton" onclick="sendsChat();" > -->
                                <!--    <i class="fa fa-telegram tel-chtIcon " aria-hidden="true"></i> -->
                                <!--</button>-->
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
    //setInterval(function(){timer();},1000);
    function timer()
    {
        $('#timers').val();
    }
    //setInterval(function(){reloads();},1000);
    function reloads()
    {
        var user = '<?php echo $user;?>';
        var astroid = '<?php echo $astrologers_details[0]['astro_id'];?>';
        var astroname = '<?php echo $astrologers_details[0]['astro_name'];?>';
        var uri = "<?php echo base_url('Astrologer_controller/chatsuser') ?>";
       
        $.ajax({
            url: uri,
            type: "POST",
            data: {user:user,astroid:astroid,astroname:astroname},
            dataType: "json",
            cache : false,
            success: function(result)
            {
                $('#shcht').html(result.msg);
            },
            
        });
    }    
        
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
        var uri = "<?php echo base_url('astro_controller/chatsend');?>";
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
        });                
    }
  
  function exitchat()
  {
    var astroid = document.getElementById('astros_ids').value;
    var uid = document.getElementById('sesids').value;
    if(confirm('Are You Exit From The Chat.'))
    {
        uri = "<?php echo base_url('Astrologer_controller/notificationStatus');?>";
        $.ajax({
            url:uri,
            type:"POST",
            data:{uid:uid,astroid:astroid},
            dataype:"json",
            cache:false,
            success:function(result)
            {
                console.log(result);
            },
        });
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
        //var callrate=document.getElementById('hiddencallingrate'+astrooid).value;
        var callrate=document.getElementById('callamtC').value;
        var users_ids = document.getElementById('hiddenuser_id').value;
        var astrol_ids = astrooid;
        var walletbalance= document.getElementById('wallet_balance').value;
           //alert(callrate);return false;
        //   alert(users_ids);
        //   alert(astrol_ids);
        //   alert(walletbalance);exit;
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
    var hiddenchatrate = document.getElementById('hiddenchatrate').value;
    var wallet_balance = document.getElementById('wallet_balance').value;
    //alert(id);alert(name);alert(astrooid);
    if(id>0)
    {
        if(confirm('Please click OK For connecting a Chat'))
        {
            uri = "<?php echo base_url('Astrologer_controller/notificationActiveStatus');?>";
            $.ajax({
                url:uri,
                type:"POST",
                data:{uid:id,astroid:astrooid},
                dataype:"json",
                cache:false,
                success:function(result)
                {
                    console.log(result);
                },
            });  
            // 19/03/2021
            uri2 = "<?php echo base_url('User_controller/chat_data');?>";
            //alert(id);alert(astrooid);alert(hiddenchatrate);alert(wallet_balance);
            $.ajax({
                url:uri2,
                type:"POST",
                data:{hiddenuser_id:id,astros_ids:astrooid,hiddenchatrate:hiddenchatrate,wallet_balance:wallet_balance},
                dataype:"json",
                cache:false,
                success:function(result)
                {
                    console.log(result);
                },
            }); 
            // 19/03/2021
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
  
  function callwal() {
        alert('Please Recharge Your Wallet.');
        return false;
    }
  
  function chatLoginChk()
  {
        alert('Login With User.');
        return false;
    }
    
    function callCoupon()
    {
        var code = document.getElementById('callCoupontext').value;
        var amt = document.getElementById('callamtC').value;
        var url = window.location.href;
        
        $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>Calling-Coupan",
              data: {code: code, amt: amt, url:url},
              dataType: "json",
              success: function(response){
    
                if(response.success == 'true')
                {
                    console.log(response);
                    $('#callFormCoupon').hide();
                    $('#callResultCoupon').css("display", "block");
                    $('#swamt').css("display","block").css("display","inline");
                    $('#scouamt').html(response.msg);
                    $('.calamtc').val(response.msg);
                    $('#hdamt').hide();
                    $('#starthdamt').hide();
                    $('#startwamt').css("display","block").css("display","inline");
                    $('#satartcouamt').html(response.msg);
                    //$('#callFormCoupon').submit();
                    <?php //$astrocallrate='response.msg';?> 
                }
                else
                {
                    //$('#callCouponFalseMsg').css("display", "block");
                    $('#callCouponFalseMsg').html(response.msg);
                }
              }
        });
        
    }
    
    function callCouponRemove()
    {
        var am = document.getElementById('callamtCall').value;
        $('#callResultCoupon').css("display", "none");
        $('#callFormCoupon').show();
        $('#callCoupontext').val('');
        $('#swamt').css("display", "none");
        $('#startwamt').css("display", "none");
        $('#hdamt').show();
        $('#starthdamt').show();
        $('.calamtc').val(am);
        <?php //$this->session->unset_userdata('couponidamt');?>
    }
    
</script>