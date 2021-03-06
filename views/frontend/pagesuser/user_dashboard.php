<!-- Event snippet for Purchase conversion page -->
<script>
fbq('track', 'CompleteRegistration');

  gtag('event', 'conversion', {
      'send_to': 'AW-411001558/nWD2CO_x__gBENbF_cMB',
      'transaction_id': ''
  });
</script>

<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css" rel="stylesheet" />

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<?php
$folder = $this->session->userdata('user_folder_name');
$user_email = $this->session->userdata('user_email');
$user_first_name = $this->session->userdata('user_first_name');
$user_id = $this->session->userdata('user_id');

$getdata = $this->db->get_where('user', array('user_id' => $user_id))->row();
$level = $getdata->user_level;
$user_name=$getdata->user_first_name;
// 30-april start delete status reject from user
// $delete_status=$getdata->delete_status;
// if ($delete_status == 1)
//  {
//     // $this->session->set_flashdata('error', 'REJECTED / BLOCKED By Admin' );
//     //  redirect(base_url(). 'destroy', 'refresh');
//       redirect(base_url(). 'login_controller/user_logoutforreject', 'refresh');
//     //  $this->session->set_flashdata('error', 'REJECTED / BLOCKED By Admin' );
//  } 

// 30 april end

 if ($user_id == ''|| $user_email==''||$user_first_name=='')
 {
    redirect(base_url(). 'front_page', 'refresh');
 } 

//for checking details 

    
   $query = $getdata;//$this->db->get_where('user', array('user_id' => $userid))->row();
  // $dt = $query->row()->;
  $gender=$query->user_gender;
  $dob=$query->user_dob;
  $timeb=$query->user_timeofbirth;
  $placeofb=$query->user_placeofbirth;
  $state=$query->user_state;
  $country =$query->user_country;
  $mrts=$query->user_maritalstatus;
  $occ=$query->user_occupation;
  if(!empty($gender) && !empty($dob)&& !empty($timeb)&& !empty($placeofb) && !empty($state) && !empty($country) && !empty($mrts) && !empty($occ))
  {
    //redirect(base_url() .'userdashboard', 'refresh');
  }
  else{
    redirect(base_url() .'detailsfill', 'refresh');
  }
 
?>
<!-- for checking details -->
<input type="hidden" name="hiddenuser_id" id="hiddenuser_id" value="<?php echo $user_id;?>">

<!-- hs Navigation End -->

<!-- hs About Title Start -->

<div class="hs_indx_title_main_wrapper">
    <div class="hs_title_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">
                <div class="hs_indx_title_left_wrapper">
                    <h2>User Profile</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">
                <div class="hs_indx_title_right_wrapper">
                    <ul>
                        <li><a href="index.php">Home</a> &nbsp;&nbsp;&nbsp;> </li>
                        <li>User Profile</li>
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
            <div class="col-sm-6">
                <div class="hs_rs_four_slider_wrapper md-bottom">
                    <div class="owl-carousel owl-theme">
                        <!-- fetch banner -->
                        <?php
                            $fetch_banner=fetchbyresult('advertisement');
                            foreach($fetch_banner as $fbanner)
                            {?>
                        <div class="item">
                            <div class="hs-matchmaking-banner-01">
                                <!-- <img  src="<?php echo base_url();?>/image/advertisement/<?php echo $fbanner['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" /> -->
                                <img src="<?php echo base_url();?>image/advertisement/<?php echo  $fbanner['advt_image'];?>?nocache=<?php echo time(); ?>"
                                    onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image">

                                <!-- <img src="<?php echo base_url();?>assets/frontend/images/content/kundali/kundli-slideimg-01.png" alt="online_img" class="img-responsive" /> -->
                            </div>
                        </div>
                        <?php } ?>
                        <!-- fetch banner -->
                        <!-- <div class="item">

                                <div class="hs-matchmaking-banner">

                                    <img src="<?php echo base_url();?>assets/frontend/images/content/kundali/kundli-slideimg-02.png" alt="online_img" class="img-responsive" />

                                </div>

                            </div>

                            <div class="item ">

                                <div class="hs-matchmaking-banner">

                                    <img src="<?php echo base_url();?>assets/frontend/images/content/kundali/kundli-slideimg-03.png" alt="online_img" class="img-responsive" />

                                    <span class="offline"></span>

                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="hs_blog_right_search_wrapper text-right">
                    <h3 class="md-bottom">Welcome : <?php echo $user_first_name;?> </h3>
                </div>
                <div class="hs_shop_tabs_sec_wrapper">

                    <div class="available-balance">

                        <h4 class="md-bottom">Wallet Balance <i class="fa fa-inr" aria-hidden="true"></i>
                            <?php $walletbalance = fetchby_wheres('wallet',array('user_id'=>$user_id));

	                                if(!empty($walletbalance)) {
	                                foreach($walletbalance as $wb){
	                                  echo $wb['wallet_amt'];
	                                  
	                                ?>

                            <!-- hidden wallet balance -->
                            <input type="hidden" name="wallet_balance" id="wallet_balance"
                                value="<?php if(!empty($wb['wallet_amt'])){echo $wb['wallet_amt'];}else{ echo '0';}?>"
                                required>

                            <?php } }else{?>
                            <input type="hidden" name="wallet_balance" id="wallet_balance"
                                value="<?php if(!empty($wb['wallet_amt'])){echo $wb['wallet_amt'];}else{ echo '0';}?>"
                                required>
                            <?php } ?>
                        </h4>
                        <!-- <button type="button" data-toggle="modal" data-target="#myModal" class="hs_btn_hover">Appointments</button> -->
                        <a href="#" data-toggle="modal" data-target="#walletmodel" class="recharge-btn">Recharge
                            Wallet</a>
                        <a href="<?php echo base_url();?>logout_user" class="recharge-btn">Logout</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">

                <div class="hs_blog_right_sidebar_main_wrappe mb-15">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="hs_blog_right_cate_list_heading_wrapper">

                                <h4 style="color: #fff;">AstroVed </h4>

                            </div>
                            <div class="hs_blog_right_cate_list_cont_wrapper">

                                <ul class="nav nav-pills hs-astro-user-tabs">
                                    <li <?php if(@$this->uri->segment(2)=="") { ?> class="active" <?php } ?>>
                                        <a href="<?php echo site_url('userdashboard');?>">
                                            <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                            &nbsp; Talk To Astrologer
                                        </a>
                                    </li>
                                    <li <?php if($this->uri->segment(2)=="profilemenu-01") { ?> class="active"
                                        <?php } ?>>
                                        <a <?php if($this->uri->segment(2)=="profilemenu-01") { ?> data-toggle="pill"
                                            <?php } ?> href="<?php echo site_url('userdashboard');?>/profilemenu-01">
                                            <i class="fa fa-google-wallet" aria-hidden="true">
                                            </i>&nbsp; Wallet Recharge history
                                        </a>
                                    </li>
                                    <li <?php if($this->uri->segment(2)=="profilemenu-02") { ?> class="active"
                                        <?php } ?>>
                                        <a <?php if($this->uri->segment(2)=="profilemenu-02") { ?> data-toggle="pill"
                                            <?php } ?> href="<?php echo site_url('userdashboard');?>/profilemenu-02">
                                            <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                            &nbsp; Get Detailed Report
                                        </a>
                                    </li>
                                    <li <?php if($this->uri->segment(2)=='profilemenu-10') { ?> class="active"
                                        <?php } ?>>
                                        <a <?php if($this->uri->segment(2)=="profilemenu-10") { ?> data-toggle="pill"
                                            <?php } ?> href="<?php echo site_url('userdashboard');?>/profilemenu-10">
                                            <i class="fa fa-file-code-o" aria-hidden="true"></i>
                                            &nbsp; Requested Report Detail
                                        </a>
                                    </li>
                                    <li <?php if($this->uri->segment(2)=='profilemenu-03') { ?> class="active"
                                        <?php } ?>>
                                        <a <?php if($this->uri->segment(2)=="profilemenu-03") { ?> data-toggle="pill"
                                            <?php } ?> href="<?php echo site_url('userdashboard');?>/profilemenu-03">
                                            <i class="fa fa-commenting" aria-hidden="true"></i>
                                            &nbsp; Chat with Astrologer
                                        </a>
                                    </li>
                                    <li <?php if($this->uri->segment(2)=='profilemenu-04') { ?> class="active"
                                        <?php } ?>>
                                        <a <?php if($this->uri->segment(2)=="profilemenu-04") { ?> data-toggle="pill"
                                            <?php } ?> href="<?php echo site_url('userdashboard');?>/profilemenu-04">
                                            <i class="fa fa-sort-amount-desc" aria-hidden="true">
                                            </i>&nbsp; Order History
                                        </a>
                                    </li>
                                    <li <?php if($this->uri->segment(2)=='profilemenu-11') { ?> class="active"
                                        <?php } ?>>
                                        <a <?php if($this->uri->segment(2)=="profilemenu-11") { ?> data-toggle="pill"
                                            <?php } ?> href="<?php echo site_url('userdashboard');?>/profilemenu-11">
                                            <i class="fa fa-sort-amount-desc" aria-hidden="true">
                                            </i>&nbsp; Call History
                                        </a>
                                    </li>
                                    <li <?php if($this->uri->segment(2)=='profilemenu-12') { ?> class="active"
                                        <?php } ?>>
                                        <a <?php if($this->uri->segment(2)=="profilemenu-12") { ?> data-toggle="pill"
                                            <?php } ?> href="<?php echo site_url('userdashboard');?>/profilemenu-12">
                                            <i class="fa fa-sort-amount-desc" aria-hidden="true">
                                            </i>&nbsp; Chat History
                                        </a>
                                    </li>
                                    <li <?php if($this->uri->segment(2)=='profilemenu-05') { ?> class="active"
                                        <?php } ?>>
                                        <a <?php if($this->uri->segment(2)=="profilemenu-05") { ?> data-toggle="pill"
                                            <?php } ?> href="<?php echo site_url('userdashboard');?>/profilemenu-05">
                                            <i class="fa fa-male" aria-hidden="true"></i>
                                            &nbsp; Free Kundli
                                        </a>
                                    </li>
                                    <li <?php if($this->uri->segment(2)=='profilemenu-06') { ?> class="active"
                                        <?php } ?>>
                                        <a <?php if($this->uri->segment(2)=="profilemenu-06") { ?> data-toggle="pill"
                                            <?php } ?> href="<?php echo site_url('userdashboard');?>/profilemenu-06">
                                            <i class="fa fa-female" aria-hidden="true"></i>
                                            &nbsp; Customer Support
                                        </a>
                                    </li>
                                    <li <?php if($this->uri->segment(2)=='profilemenu-07') { ?> class="active"
                                        <?php } ?>>
                                        <a <?php if($this->uri->segment(2)=="profilemenu-07") { ?> data-toggle="pill"
                                            <?php } ?> href="<?php echo site_url('userdashboard');?>/profilemenu-07">
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                            &nbsp;Profile
                                        </a>
                                    </li>
                                    <!--    <li <?php if($this->uri->segment(2)=='profilemenu-13') { ?> class="active" <?php } ?>>-->
                                    <!--<a <?php if($this->uri->segment(2)=="profilemenu-13") { ?> data-toggle="pill" <?php } ?> href="<?php echo site_url('userdashboard');?>/profilemenu-13"> -->
                                    <!--  <i class="fa fa-star" aria-hidden="true"></i>-->
                                    <!--&nbsp; Rating-->
                                    <!--</a>-->
                                    <!--  </li>-->
                                    <li <?php if($this->uri->segment(2)=='profilemenu-09') { ?> class="active"
                                        <?php } ?>>
                                        <a <?php if($this->uri->segment(2)=="profilemenu-09") { ?> data-toggle="pill"
                                            <?php } ?> href="<?php echo site_url('userdashboard');?>/profilemenu-09">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            &nbsp; Notification
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#profilemenu-14" data-toggle="pill"><i class="fa fa-shopping-basket"
                                                aria-hidden="true"></i>
                                            &nbsp; Astro Gallery</a>
                                    </li>
                                    <li>
                                        <a href="#profilemenu-15" data-toggle="pill"><i class="fa fa-check"
                                                aria-hidden="true"></i>
                                            &nbsp; Match Making</a>
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

                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="hs_shop_tabs_cont_sec_wrapper">

                                <div class="tab-content">
                                    <?php $vchk = ctype_digit($this->uri->segment(2)); ?>
                                    <div id="user-profilemenu"
                                        class="tab-pane fade  <?php if(@$this->uri->segment(2)=="" or $vchk==1) { ?> in  active <?php } ?> ">

                                        <div class="row">
                                            <!-- astrologer -->
                                            <?php 
                                           //echo "<pre>";print_r($res2);
	                                            // $res = fetchbyresultByCondiction('astrologers',array('astro_approved_status'=>1));
	                                           // $res2= astrologerfetchorderlimitwhere('astrologers','astro_ranking','ASC',array('astro_approved_status'=>1));
                                              if(!empty($res2)){
                                              // echo "<pre>";print_r($res);
                                            //   change 22/02/202 $res2
                                              foreach($res2 as $row){
                                            ?>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">

                                                <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">

                                                    <!-- <a  href="astrologer_profile.php"> -->

                                                    <div class="hs_astro_img_wrapper img-dash-user">

                                                        <div class="ast-img">
                                                            <a
                                                                href="<?php echo base_url();?>astrotalk_profile/<?php echo $row['astro_id'];?>">
                                                                <img src="<?php echo base_url();?>image/astrologers/<?php echo $row['astro_image'];?>?nocache=<?php echo time(); ?>"
                                                                    onerror="this.src='<?php echo base_url();?>/image/default';"
                                                                    class="team-img">
                                                            </a>
                                                        </div>
                                                        <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">
                                                            <!-- <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i> -->
                                                        </div>
                                                    </div>

                                                    <div class="hs_astro_img_cont_wrapper">
                                                        <a
                                                            href="<?php echo base_url();?>astrotalk_profile/<?php echo $row['astro_id'];?>">
                                                            <h2><?php echo $nma = word_limiter(strip_tags($row['astro_name']), 5); ?>
                                                            </h2>
                                                        </a>
                                                        <p>
                                                            <?php $len = strlen($row['astro_language']);
                                                                  if($len>18)
                                                                  {
                                                                    echo substr($row['astro_language'],0,18)."...";
                                                                  }
                                                                  else
                                                                  {
                                                                    echo substr($row['astro_language'],0,18);
                                                                  } ?>
                                                        </p>

                                                        <p>
                                                            <?php 
                                                                  //$lan = fetchbyrow_where('astrologers',$row['astro_id']);
                                                                  //print_r($lan);
                
                                                                    $a=cat_fetch_join('astrologers_multiplecategories','category_astrologer',$row['astro_id']);
                                    
                                                                    $ak = array();
                                                                    foreach($a as $b){ 
                                                                      $ak[] =$b['cat_astr_title']; 
                                                                            }
                                                                    $ik = implode(',',$ak);
                                                                    $len = strlen($ik);
                                                                    if($len>20)
                                                                    {
                                                                      echo substr($ik,0,20)."...";
                                                                    }
                                                                    else
                                                                    {
                                                                      echo substr($ik,0,20);
                                                                    }
                                                                ?>
                                                        </p>

                                                        <p>Exp: <?php echo $row['astro_experience']; ?> Years</p>

                                                        <!--disc call start  -->
                                                        <p> <?php
                                                                    $astrocallrate = $row['astro_calling_rate'];
                                                                    $calldisc=$row['astro_calling_rate_discount']; ?>
                                                                    <input type="hidden" value='' id='sratecalval<?php echo $rows['astro_id'] ;?>' />
                                                                    <div id='sratecal<?php echo $row['astro_id'] ;?>'></div>
                                                                    <div id='hratecal<?php echo $row['astro_id'] ;?>'> 
                                                                      <?php if($calldisc == 0 )
                                                                      {
                                                                      echo "RS :". $astrocallrate." / min "; 
                                                                      }else
                                                                      {
                                                                        $percentagecall = ($calldisc / 100) * $astrocallrate;
                                                                        $discpricecall=$astrocallrate-$percentagecall;
                                                                        
                                                                        echo"Rs &nbsp;".  $discpricecall ."&nbsp; &nbsp;<del> ".$astrocallrate."</del>&nbsp;&nbsp;" .$calldisc. " % Disc"  ;
                                                                        $astrocallrate=$discpricecall;
                                                                      }
                                                                    ?>
                                                                    </div>
                                                            

                                                        </p>
                                                        <!--  disc call end-->
                                                        <!-- <p><i class="fa fa-inr" aria-hidden="true"></i> <?php// echo $row['astro_calling_rate']; ?> / Min.</p> -->
                                                        <input type="hidden" name="hiddencallingrate"
                                                            id="hiddencallingrate<?php echo $row['astro_id'];?>"
                                                            value="<?php echo $astrocallrate;?>">
                                                    </div>

                                                    <!-- </a> -->

                                                    <div class="hs_astro_img_bottom_cont">

                                                        <ul>

                                                            <li>

                                                                <a
                                                                    href="<?php echo base_url();?>astrotalk_profile/<?php echo $row['astro_id'];?>"><i
                                                                        class="fa fa-eye"></i>&nbsp; View Profile</a>

                                                            </li>

                                                            <li style="display: inline-flex;margin-left: 161px;margin-top: -22px;">
                                                                <a href="#"><i class="fa fa-circle"
                                                                        <?php if($row['astro_online_call_status']=='1'){?>
                                                                        style="color : green ;"
                                                                        <?php } else{ ?>style="color : red ;"
                                                                        <?php } ?>aria-hidden="true"></i>&nbsp; </a>
                                                                <?php 
                                                                      $user_id = $this->session->userdata('user_id');
                                                                      $wal = fetchbyresultByCondiction('wallet',array('user_id'=>$user_id));
                                                                      
                                                                      $wal_amt =  $wal[0]['wallet_amt'];
                                                                      $astro_id = $row['astro_id'];
                                                                      $res = fetchbyresultByCondictionRow('astrologers',array('astro_id'=>$astro_id,'astro_online_call_status'=>1));
                                                                      //echo $res[0]['astro_call_time'];
                                                                      //echo $this->db->last_query();
                                                                      //print_r($res);
                                                                      //echo $res[0]['astro_id'];
                                                                      $req = fetchbyresultByCondiction('astrologers',array('astro_id'=>$astro_id));
                                                                        $callrates = $req[0]['astro_calling_rate'];
                                                                        $timese = $req[0]['astro_call_watting_time'];
                                                                        if($timese > 0 )
                                                                        { ?>
                                                                <span style="color: #fe8a13;"><i
                                                                        class="fa fa-phone"></i>&nbsp; Wait
                                                                    <?php echo $timese; ?> min.</span>
                                                                <?php }
                                                                      else if(!empty($user_id) && ($wal_amt > $callrates) && !empty($res))
                                                                      { ?>
                                                                
                                                                <a style="display:block;" id='hcallbtn<?php echo $row['astro_id'] ;?>' onclick="call(<?php echo $row['astro_id']?>);"><i class="fa fa-phone"></i>&nbsp; Call Now</a>
                                                                <a style="display:none;" id='scallbtn<?php echo $row['astro_id'] ;?>' onclick="couponCall(<?php echo $row['astro_id'];?>);"><i class="fa fa-phone"></i>&nbsp; Call Now</a>        
                                                                <?php }else if($wal_amt <= $callrates){ ?>
                                                                <a data-toggle="pill" href="#home"></a><a href=""
                                                                    onclick="callwal(<?php echo $row['astro_id'];?>);"><i
                                                                        class="fa fa-phone"></i>&nbsp; Call Now</a>
                                                                <?php }else{ ?>
                                                                <a data-toggle="pill" href="#home"></a>
                                                                <a href="" onclick="callof();"><i
                                                                        class="fa fa-phone"></i>&nbsp; Call Now</a>
                                                                <?php } ?>
                                                            </li>

                                                        </ul>

                                                    </div>

                                                </div>

                                            </div>
                                            <?php } }?>
                                            <!-- astrologer -->
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 visible-lg visible-md">

                                                <div class="pager_wrapper">
                                                    <ul class="pagination">

                                                        <li class="btc_shop_pagi"><a
                                                                href="#"><?php echo $this->pagination->create_links(); ?></a>
                                                        </li>
                                                        <!-- <li><a href="#"><i class="fa fa-angle-left"></i></a></li> 

                                                            <li class="btc_shop_pagi"><a href="#">02</a></li>

                                                            <li class="btc_third_pegi btc_shop_pagi"><a href="#">03</a></li>

                                                            <li class="hidden-xs btc_shop_pagi"><a href="#">04</a></li>

                                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li> -->
                                                    </ul>
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                    <div id="profilemenu-01"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-01") { ?> in active <?php } ?>">

                                        <div class="row bg-color-01">

                                            <table class="table-tag table table-striped table-bordered" border="1"
                                                id="example1">

                                                <thead>

                                                    <tr>

                                                        <th class="tab-data"></th>
                                                        </th>

                                                        <th class="tab-data">TRANSATION ID</th>

                                                        <th class="tab-data">Date</th>

                                                        <!-- <th class="tab-data">Recipient</th> -->

                                                        <th class="tab-data">Amount</th>

                                                        <!-- <th class="tab-data">Type</th> -->



                                                        <th class="tab-data">Status</th>

                                                    </tr>

                                                </thead>

                                                <tbody>
                                                    <!-- wallet trjection -->
                                                    <?php 
                                                        $sn=0;
                                                      // $wallettrj=fetchby_wheres('wallet_recharge_history',array('wrh_user_id'=>$user_id));
                                                        $wallettrj= fetchbywhereorder('wallet_recharge_history',array('wrh_user_id'=>$user_id),'desc','wrh_id');
                                                        foreach($wallettrj as $wtrj){
                                                          $sn++;
                                                        // echo $wtrj['wallet_amt'];
                                                    ?>
                                                    <tr>

                                                        <td class="tab-data"><?php echo $sn; ?></td>

                                                        <td class="tab-data"><?php echo $wtrj['wrh_txn_id']; ?></td>

                                                        <td class="tab-data">
                                                            <?php echo $DTR=date('d-M-y h:i:sa',strtotime($wtrj['wrh_timestamp'])); ?>
                                                        </td>

                                                        <!-- <td class="tab-data"><img src="images/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td> -->

                                                        <td class="tab-data"><i class="fa fa-inr"
                                                                aria-hidden="true"></i>
                                                            <?php echo $wtrj['wrh_amount']; ?></td>

                                                        <!-- <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td> -->


                                                        <?php if($wtrj['wrh_payment_status']=='Pending'){?>

                                                        <td class="tab-data"><a href="#"
                                                                class="pending-link">Pending</a></td>
                                                        <?php } else {?>
                                                        <td class="tab-data"><a href="#"
                                                                class="completed-link">Success</a></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php } ?>
                                                    <!-- <td class="tab-data"><a href="#" class="pending-link">Pending</a></td> -->


                                                    <!-- wallet trjection -->

                                                </tbody>

                                            </table>

                                        </div>

                                    </div>

                                    <div id="profilemenu-02"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-02") { ?> in active <?php } ?>">

                                        <!--  get detail reporta -->
                                        <?php 
                                               // $resport = fetchbyresultByCondiction('astrologers',array('astro_approved_status'=>1));//fetchbyresult('astrologers');
                                              //22/02/2021 QUERY COMMENT AND CREATED NEW
                                               $resport =astrologerfetchorderlimitwhere('astrologers','astro_ranking','ASC',array('astro_approved_status'=>1));
                                                if(!empty($resport)){
                                                // echo "<pre>";print_r($res);
                                                $i=0;
                                                foreach($resport as $astrep){
                                                    $i++;
                                                ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">

                                            <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">

                                                <a href="astrologer_profile.php">

                                                    <div class="hs_astro_img_wrapper">

                                                        <div class="ast-img">
                                                            <a
                                                                href="<?php echo base_url();?>astrotalk_profile/<?php echo $astrep['astro_id'];?>">

                                                                <img src="<?php echo base_url();?>image/astrologers/<?php echo $astrep['astro_image'];?>?nocache=<?php echo time(); ?>"
                                                                    onerror="this.src='<?php echo base_url();?>/image/default';"
                                                                    class="team-img">
                                                            </a>
                                                        </div>
                                                        <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                        </div>

                                                    </div>

                                                    <div class="hs_astro_img_cont_wrapper">
                                                        <!-- online offline -->
                                                        <!-- <a href="#"><i class="fa fa-circle" <?php if($astrep['astro_online_status']=='1'){ ?> style="color : green ;"<?php } else{ ?>style="color : red ;" <?php } ?>aria-hidden="true"></i>&nbsp;  </a> -->
                                                        <a
                                                            href="<?php echo base_url();?>astrotalk_profile/<?php echo $astrep['astro_id'];?>">
                                                            <h2><?php echo $astrep['astro_name']; ?></h2>
                                                        </a>
                                                        <p>
                                                            <?php 
                                                                          $len = strlen($astrep['astro_language']);
                                                                      if($len>18)
                                                                      {
                                                                        echo substr($astrep['astro_language'],0,18)."..";
                                                                      }
                                                                      else
                                                                      {
                                                                        echo substr($astrep['astro_language'],0,18);
                                                                      } 
                                                                      ?>
                                                        </p>

                                                        <p>
                                                            <?php 
                                                                    //$lan = fetchbyrow_where('astrologers',$row['astro_id']);
                                                                    //print_r($lan);
                  
                                                                    $a=cat_fetch_join('astrologers_multiplecategories','category_astrologer',$astrep['astro_id']);
                                                                      $ak =array();
                                                                      foreach($a as $b){ 
                                                                        $ak[] =$b['cat_astr_title']; 
                                                                              }
                                                                      $ik = implode(',',$ak);
                                                                      $len = strlen($ik);
                                                                      if($len>20)
                                                                      {
                                                                        echo substr($ik,0,20)."...";
                                                                      }
                                                                      else
                                                                      {
                                                                        echo substr($ik,0,20);
                                                                      }
                                                                  ?>
                                                        </p>

                                                        <p>Exp: <?php echo $astrep['astro_experience']; ?> Years</p>

                                                        <!-- <p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $astrep['astro_askreport_rate']; ?>  / PER REPORT</p> -->
                                                        <!-- discoint report -->
                                                        <p>
                                                            <?php
                                                                      $astroreportrate = $astrep['astro_askreport_rate'];
                                                                      $reportdisc=$astrep['astro_report_rate_discount'];
                                                                        
                                                                      if($reportdisc == 0 )
                                                                      {
                                                                      echo "RS :". $astroreportrate." / min "; 
                                                                      }else
                                                                      {
                                                                        $percentagereport = ($reportdisc / 100) * $astroreportrate;
                                                                        $discpricereport=$astroreportrate-$percentagereport;
                                                                        echo"Rs &nbsp;".  $discpricereport."&nbsp; &nbsp;<del> ".$astroreportrate."</del>&nbsp;&nbsp;" .$reportdisc. " % Disc"  ;
                                                                        $astroreportrate=$discpricereport;
                                                                    ?>

                                                            <?php } ?>
                                                            <!-- <input type="hidden" name="reports_rate"
                                                                          id="reportssrates<?php echo $astrep['astro_id'];?>"
                                                                          value="<?php echo $astroreportrate ;?>"> -->

                                                        </p>
                                                        <!-- discount report -->
                                                    </div>

                                                </a>

                                                <div class="hs_astro_img_bottom_cont">

                                                    <div class="align-01">

                                                        <a href="#" data-toggle="modal"
                                                            data-target="#myModal<?php echo  $astrep['astro_id'];?>"
                                                            data-id="<?php echo  $astrep['astro_id'];?>"><i
                                                                class="fa fa-file-code-o" aria-hidden="true"></i>&nbsp;
                                                            report</a>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        <?php if($i%3==0) { ?>
                                        <div class="clearfix"></div>
                                        <?php }}}?>
                                        <!-- get detail reportastrologer -->

                                        <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">

                                                <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">

                                                  <div class="hs_astro_img_wrapper">

                                                    <img src="images/content/online2.jpg" alt="team-img">

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

                                              </div> -->
<!-- pagination 2 start -->
<!-- pagination 2 end -->

                                    </div>

                                    <div id="profilemenu-03"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-03") { ?> in active <?php } ?>">
                                        <!--  get chat -->
                                        <?php 
                                              $astchat = astrologerfetchorderlimitwhere('astrologers','astro_ranking','ASC',array('astro_approved_status'=>1));//fetchbyresult('astrologers');
                                              if(!empty($astchat)){
                                                //echo "<pre>";print_r($astchat);
                                                $i=0;
                                              foreach($astchat as $astch)
                                              {
                                                  $i++;
                                          ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">

                                            <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">

                                                <a href="astrologer_profile.php">

                                                    <div class="hs_astro_img_wrapper">

                                                        <div class="ast-img">
                                                            <img src="<?php echo base_url();?>image/astrologers/<?php echo $astch['astro_image'];?>?nocache=<?php echo time(); ?>"
                                                                onerror="this.src='<?php echo base_url();?>/image/default';"
                                                                class="team-img">
                                                        </div>

                                                        <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                        </div>

                                                    </div>

                                                    <div class="hs_astro_img_cont_wrapper">
                                                        <h2><?php echo $astch['astro_name']; ?></h2>

                                                        <p>
                                                            <?php  
                                                            $len = strlen($astch['astro_language']);
                                                            if($len>18)
                                                            {
                                                              echo substr($astch['astro_language'],0,18)."...";
                                                            }
                                                            else
                                                            {
                                                              echo substr($astch['astro_language'],0,18);
                                                            }
                                                          ?>
                                                        </p>

                                                        <p>
                                                            <?php 
                                                          //$lan = fetchbyrow_where('astrologers',$row['astro_id']);
                                                          //print_r($lan);
        
                                                          $a=cat_fetch_join('astrologers_multiplecategories','category_astrologer',$astch['astro_id']);
                            
                                                            $ak =array();
                                                            foreach($a as $b){ 
                                                              $ak[] =$b['cat_astr_title']; 
                                                                    }
                                                            $ik = implode(',',$ak);
                                                            $len = strlen($ik);
                                                            if($len>20)
                                                            {
                                                              echo substr($ik,0,20)."...";
                                                            }
                                                            else
                                                            {
                                                              echo substr($ik,0,20);
                                                            }
                                                         ?>
                                                        </p>

                                                        <p>Exp: <?php echo $astch['astro_experience']; ?> Years</p>
                                                        <!-- discount chat start -->
                                                        <p> <?php
                                                            $astrochatrate = $astch['astro_chat_rate'];
                                                              $chatdisc=$astch['astro_chat_rate_discount'];
                                                                
                                                              if($chatdisc == 0 )
                                                              {
                                                              echo "RS :". $astrochatrate." / min "; 
                                                              }else
                                                              {
                                                                $percentagechat = ($chatdisc / 100) * $astrochatrate;
                                                                $discpricechat=$astrochatrate-$percentagechat;
                                                                echo"Rs &nbsp;".  $discpricechat ."&nbsp; &nbsp;<del> ".$astrochatrate."</del>&nbsp;&nbsp;" .$chatdisc. " % Disc"  ;
                                                                $astrochatrate=$discpricechat;
                                                            ?>

                                                            <?php } ?>

                                                        </p>
                                                        <!-- discount chat end -->
                                                        <!-- <p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $astch['astro_chat_rate']; ?> / Min.</p> -->
                                                        <input type="hidden" name="hiddenastro_chatrate"
                                                            id="hiddenastrochatrate<?php echo $astch['astro_id'];?>"
                                                            value="<?php echo $astrochatrate; ?>">
                                                    </div>

                                                </a>

                                                <div class="hs_astro_img_bottom_cont">

                                                    <div class="align-01">
                                                        <?php 
                                                            $user_id = $this->session->userdata('user_id');
                                                            //echo "user= ".$user_id;
                                                            $walchat = fetchbyresultByCondiction('wallet',array('user_id'=>$user_id));

                                                          $walcht_amt =  $walchat[0]['wallet_amt'];
                                                          $astro_id = $astch['astro_id'];
                                                          $rescht = fetchbyresultByCondictionRow('astrologers',array('astro_id'=>$astro_id,'astro_online_chat_status'=>1));
                                                          //echo $rescht[0]['astro_chat_time'];
                                                          //echo $this->db->last_query();
                                                          //print_r($res);
                                                          //echo $res[0]['astro_id'];
                                                          //echo $astro_id;
                                                          $reqcht = fetchbyresultByCondiction('astrologers',array('astro_id'=>$astro_id));
                                                          //echo "<br>";print_r($reqcht);
                                                          $timesecht = $reqcht[0]['astro_chat_watting_time'];
                                                          //echo "time= ".$timesecht;
                                                          if($timesecht > 0 )
                                                          { ?>
                                                        <sapn style="color: #fe8a13;"></a><i
                                                                class="fa fa-commenting"></i>&nbsp; Wait
                                                            <?php echo $timesecht; ?> min.</span>
                                                            <?php }
                                                              else if(!empty($user_id) && ($walcht_amt > 10) && !empty($rescht))
                                                              {
                                                              ?>
                                                            <a onclick="chat(<?php echo $astch['astro_id'];?>);"><i
                                                                    class="fa fa-commenting"
                                                                    style="color:green;"></i>&nbsp; Chat Now</a>
                                                            <?php }else{ ?>
                                                            <a onclick="callof();"><i class="fa fa-commenting"
                                                                    style="color:red;"></i>&nbsp; Chat Now</a>

                                                            <?php } ?>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                        <?php if($i%3==0) { ?>
                                        <div class="clearfix"></div>
                                        <?php } }}?>
                                        <!-- get chat -->
                                        <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">

                                                <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">

                                                  <div class="hs_astro_img_wrapper">

                                                    <img src="images/content/online2.jpg" alt="team-img">

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

                                              </div> -->


                                    </div>
                                    <!-- history all -->
                                    <div id="profilemenu-04"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-04") { ?> in active <?php } ?>">

                                        <div class="row bg-color-01">
                                            <!-- table-tag border="1"-->
                                            <table class="table table-striped table-bordered" id="example">

                                                <thead>

                                                    <tr>

                                                        <th class="tab-data">S.NO</th>

                                                        <th class="tab-data">ID Invoice</th>

                                                        <th class="tab-data">Date</th>
                                                        <th class="tab-data">Product</th>

                                                        <!-- <th class="tab-data">Recipient</th> -->

                                                        <th class="tab-data">Amount</th>

                                                        <th class="tab-data">Pay By</th>

                                                        <!-- <th class="tab-data">Location</th> -->

                                                        <th class="tab-data">Status</th>

                                                    </tr>

                                                </thead>

                                                <tbody>
                                                    <?php 
                                                        //$orderhistroy = fetchby_wheres('payment', array('user_id' => $user_id));
                                                        $orderhistroy = fetchbywhereorder('payment', array('user_id' => $user_id),'desc','payment_id');
                                                        $i=0;
                                                        foreach($orderhistroy as $foh){
                                                          $i++;
                                                     ?>
                                                    <tr>

                                                        <!-- <td class="tab-data"><input type="checkbox"></td> -->
                                                        <td class="tab-data"><?php echo $i;?></td>
                                                        <td class="tab-data"><?php echo $foh['unique_id'];?></td>

                                                        <td class="tab-data">
                                                            <?php echo $dte=date('d-M-Y',strtotime($foh['timestamp'])); ?>
                                                        </td>
                                                        <!-- <td class="tab-data"><?php //echo $foh['product_id'];?></td> -->
                                                        <!-- <td class="tab-data"><img src="images/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td> -->
                                                        <td class="tab-data">
                                                            <?php
                                                                if(!empty($foh['product_id'])){
                                                                $exp=$foh['product_id'];
                                                              
                                                              $nme= explode(',',$exp);
                                                              //explode(" ",$str)
                                                              $aa[]="";
                                                              foreach($nme as $pname)
                                                              {
                                                              // print_r($pname);
                                                              $fetchdta123=fetchbyresultByCondiction('product',array('pr_id'=>$pname));
                                                              if(count($fetchdta123)>0) {
                                                                $aa[]= $fetchdta123[0]['pr_title'];
                                                              }
                                                              }
                                                                echo implode(',',$aa);
                                                                $aa =array();
                                                                
                                                                //$foh['product_id'];
                                                              }else{
                                                              echo  $foh['payfor'];
                                                              }
                                                            ?>
                                                        </td>
                                                        <td class="tab-data"><i class="fa fa-inr"
                                                                aria-hidden="true"></i><?php echo $foh['total_amt'];?>
                                                        </td>

                                                        <td class="tab-data">
                                                            <?php  if($foh['pay_by'] == 'Wallet'){echo 'WALLET'; } else {echo 'PAYMENT GATEWAY';};?>
                                                        </td>

                                                        <!-- <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td> -->

                                                        <!-- <td class="tab-data">Medan,<br> Sumut<br> Indonesia</td> -->
                                                        <?php if($foh['payment_status']=='Pending'){?>
                                                        <td class="tab-data"><a href="#"
                                                                class="pending-link">Pending</a></td>
                                                        <?php } else {?>
                                                        <td class="tab-data"><a href="#"
                                                                class="completed-link">Success</a></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php } ?>


                                                </tbody>

                                            </table>

                                        </div>

                                    </div>
                                    <!-- rate astrologer start -->
                                    <div id="profilemenu-13"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-13") { ?> in active <?php } ?>">

                                        <div class="row bg-color-01">
                                            <!-- table-tag border="1"-->
                                            <table class="table table-striped table-bordered" id="example3">

                                                <thead>

                                                    <tr>
                                                        <th class="tab-data">S.NO</th>
                                                        <th class="tab-data">Astrologer</th>
                                                        <th class="tab-data">Rate & Comment Astrologer</th>
                                                        <!-- <th class="tab-data">Call Date</th>
                                                            <th class="tab-data">Total Time</th>
                                                            <th class="tab-data">Call Start Time</th>
                                                            <th class="tab-data">Call End Time</th> 
                                                            <th class="tab-data">Call Rate(Min)</th>
                                                             <th class="tab-data">Call Status</th> -->
                                                    </tr>

                                                </thead>

                                                <tbody>
                                                    <?php 
                                                          // $fetchallreadytalkastrolloger = fetchbywhereorder('user_call_detail_history_user', array('uch_user_id' => $user_id),'desc','uch_id');
                                                            //$fetchallreadytalkastrolloger = fetchbywhereorder('reportsendtoastro', array('rp_user_id' => $user_id),'desc','rp_id');
                                                            $fetchallreadytalkastrolloger = fetchbywhereorder('astrologers', array('astro_approved_status' => 1),'desc','astro_id');
                                                          
                                                            $i=0;
                                                            foreach($fetchallreadytalkastrolloger as $fca){
                                                              $i++;
                                                         ?>
                                                    <tr>

                                                        <td class="tab-data"><?php echo $i;?></td>
                                                        <td class="tab-data"><?php echo $fca['astro_id'];?></td>
                                                        <!-- <td class="tab-data"><a href="#" class="completed-link">Rate & Comment</a></td> -->
                                                        <td class="tab-data"><a href="#" data-toggle="modal"
                                                                data-target="#commentratemodel<?php echo $fca['astro_id'];?>"
                                                                data-id="<?php echo $fca['astro_id'];?>"
                                                                class="recharge-btn">Rate & Comment</a></td>

                                                    </tr>
                                                    <?php } ?>


                                                </tbody>

                                            </table>

                                        </div>

                                    </div>
                                    <!-- rate astrologerend -->
                                    <!-- call history start -->
                                    <div id="profilemenu-11"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-11") { ?> in active <?php } ?>">

                                        <div class="row bg-color-01">
                                            <!-- table-tag border="1"-->
                                            <table class="table table-striped table-bordered" id="example5">

                                                <thead>

                                                    <tr>
                                                        <th class="tab-data">S.NO</th>
                                                        <th class="tab-data">Astrologer</th>
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
                                                        $calldetailhistory = fetchbywhereorder('user_call_detail_history_user', array('uch_user_id' => $user_id),'desc','uch_id');
                                                        $i=0;
                                                        foreach($calldetailhistory as $cllh){
                                                          $i++;
                                                      ?>
                                                    <tr>

                                                        <!-- <td class="tab-data"><input type="checkbox"></td> -->
                                                        <td class="tab-data"><?php echo $i;?></td>
                                                        <!-- $tf=fetchbyresultByCondiction('astrologers',array('astro_id'=>$cllh['uch_astro_id'])); echo $tf[0]['astro_name]; -->
                                                        <td class="tab-data"><?php
                                                        $ast_nm=fetchbyresult_where('astrologers',$cllh['uch_astro_id'],'astro_id') ;
                                                        //print_r($nm);
                                                        if(!empty($ast_nm['0']['astro_name'])){
                                                       echo $ast_nm['0']['astro_name'];
                                                            }
                                                        //echo $cllh['uch_astro_id'];
                                                        
                                                        ?></td>
                                                        <td class="tab-data">
                                                            <?php echo $dtes=date('Y-m-d',strtotime($cllh['uch_timestamp'])); ?>
                                                        </td>
                                                        <td class="tab-data"><?php echo $cllh['uch_totaltime'];?></td>
                                                        <!-- <td class="tab-data"><?php //echo $stime=date('H:i:s',strtotime($cllh['uch_call_start_time'])); ?></td>
                                                         <td class="tab-data"><?php //echo $etime=date('H:i:s',strtotime($cllh['uch_call_end_time'])); ?></td> -->
                                                        <td class="tab-data"><?php echo $cllh['uch_astro_call_rate'];?>
                                                        </td>
                                                        <!-- <td class="tab-data"><?php //echo $foh['product_id'];?></td> -->
                                                        <!-- <td class="tab-data"><img src="images/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td> -->

                                                        <!-- <td class="tab-data"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $foh['total_amt'];?></td>
              
                                                           <td class="tab-data"><?php  //if($foh['pay_by'] == 'Wallet'){echo 'WALLET'; } else {echo 'PAYMENT GATEWAY';};?></td> -->

                                                        <!-- <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td> -->

                                                        <!-- <td class="tab-data">Medan,<br> Sumut<br> Indonesia</td> -->
                                                        <?php if($cllh['uch_status']=='0'){?>
                                                        <td class="tab-data"><a href="#" class="pending-link">Call
                                                                Failed</a></td>
                                                        <?php } else {?>
                                                        <td class="tab-data"><a href="#" class="completed-link">Call
                                                                Success</a></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php } ?>


                                                </tbody>

                                            </table>

                                        </div>

                                    </div>
                                    <!-- call history end -->
                                    <!-- chat histroy start -->
                                    <div id="profilemenu-12"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-12") { ?> in active <?php } ?>">

                                        <div class="row bg-color-01">
                                            <!-- table-tag border="1"-->
                                            <table class="table table-striped table-bordered" id="example4">

                                                <thead>

                                                    <tr>
                                                        <th class="tab-data">S.NO</th>
                                                        <th class="tab-data">Astrologer</th>
                                                        <th class="tab-data">Chat Date</th>
                                                        <th class="tab-data">Total Chat time</th>
                                                        <!-- <th class="tab-data">Chat Start Time</th>
                                                              <th class="tab-data">Chat End Time</th> -->
                                                        <th class="tab-data">Chat Rate(MIN)</th>
                                                        <th class="tab-data">Chat Status</th>
                                                    </tr>

                                                </thead>

                                                <tbody>
                                                    <?php 
                                                      //$orderhistroy = fetchby_wheres('payment', array('user_id' => $user_id));
                                                      $chatdetailhistory = fetchbywhereorder('user_chat_detail_history', array('ucth_user_id' => $user_id),'desc','ucth_id ');
                                                      $i=0;
                                                      foreach($chatdetailhistory as $chth){
                                                        $i++;
                                                      ?>
                                                    <tr>

                                                        <!-- <td class="tab-data"><input type="checkbox"></td> -->
                                                        <td class="tab-data"><?php echo $i;?></td>
                                                        <td class="tab-data">
                                                           
                                                            <?php
                                                        $ast_nmes=fetchbyresult_where('astrologers',$chth['ucth_astro_id'],'astro_id') ;
                                                        //print_r($nm);
                                                        if(!empty($ast_nmes['0']['astro_name'])){
                                                       echo $ast_nmes['0']['astro_name'];
                                                            }
                                                        //echo $cllh['uch_astro_id'];
                                                        
                                                        ?>
                                                        
                                                        </td>
                                                        <td class="tab-data">
                                                            <?php echo $cdtes=date('Y-m-d',strtotime($chth['ucth_timestamp'])); ?>
                                                        </td>
                                                        <td class="tab-data"><?php
                                                       $from_time= strtotime($chth['ucth_chat_starttime']);
                                                       $to_time = strtotime($chth['ucth_chat_endtime']);
                                                        $fnll = round(abs($to_time - $from_time) / 60,2). " minute";
                                                         if($chth['ucth_totaltime'] != '0')
                                                          {
                                                           echo $fnll;
                                                          }
                                                          else{echo '0';}?></td>

                                                        <!-- <td class="tab-data"><?php echo $chth['ucth_totaltime'];?></td> -->
                                                        <!-- <td class="tab-data"><?php //echo $cstime=date('H:i:s',strtotime($chth['ucth_chat_starttime'])); ?></td>
                                                          <td class="tab-data"><?php //echo $cetime=date('H:i:s',strtotime($chth['ucth_chat_endtime'])); ?></td> -->
                                                        <td class="tab-data"><?php echo $chth['ucth_astro_chatrate'];?>
                                                        </td>
                                                        <!-- <td class="tab-data"><?php //echo $foh['product_id'];?></td> -->
                                                        <!-- <td class="tab-data"><img src="images/content/online2.jpg" class="user-img"> <a href="#"><b>David Oconner</b></a></td> -->
                                                        <!-- <td class="tab-data"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $chth['total_amt'];?></td>
                                                          <td class="tab-data"><?php  //if($foh['pay_by'] == 'Wallet'){echo 'WALLET'; } else {echo 'PAYMENT GATEWAY';};?></td> -->
                                                        <!-- <td class="tab-data"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i><span>Outcome</span></td> -->
                                                        <!-- <td class="tab-data">Medan,<br> Sumut<br> Indonesia</td> -->
                                                        <?php if($chth['ucth_status']=='0'){?>
                                                        <td class="tab-data"><a href="#" class="pending-link">Chat
                                                                Failed</a></td>
                                                        <?php } else {?>
                                                        <td class="tab-data"><a href="#" class="completed-link">Chat
                                                                Success</a></td>
                                                        <?php } ?>
                                                    </tr>
                                                    <?php } ?>


                                                </tbody>

                                            </table>

                                        </div>

                                    </div>
                                    <!-- chat history end -->
                                    <div id="profilemenu-05"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-05") { ?> in active <?php } ?>">

                                        <div class="">

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="align-02">

                                                        <h3 class="kundli-heading">Make Free Kundli</h3>

                                                        <p class="kundli-paragraph">Generate Free Astrology Kundli
                                                            Report</p>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-md-2">

                                                </div>

                                                <div class="col-md-8 astromall_form">

                                                    <form>

                                                        <div class="row">

                                                            <div class="col-md-6">

                                                                <label class="lable-text">Name</label><br>

                                                                <input type="text" placeholder="Name"
                                                                    class="input-type">

                                                            </div>

                                                            <div class="col-md-6">

                                                                <label class="lable-text">Gender</label><br>

                                                                <select class="select-type">

                                                                    <option>Male</option>

                                                                    <option>female</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-4">

                                                                <label class="lable-text">Birth Date</label><br>

                                                                <select class="select-type">

                                                                    <option>Day</option>

                                                                    <option>1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                    <option>4</option>

                                                                </select>

                                                            </div>

                                                            <div class="col-md-4">

                                                                <label class="lable-text">Birth Month</label><br>

                                                                <select class="select-type">

                                                                    <option>Month</option>

                                                                    <option>jan</option>

                                                                    <option>feb</option>

                                                                    <option>mar</option>

                                                                    <option>apr</option>

                                                                </select>

                                                            </div>

                                                            <div class="col-md-4">

                                                                <label class="lable-text">Birth Year</label><br>

                                                                <select class="select-type">

                                                                    <option>Year</option>

                                                                    <option>2000</option>

                                                                    <option>2001</option>

                                                                    <option>2002</option>

                                                                    <option>2003</option>

                                                                </select>

                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                            <div class="col-md-4">

                                                                <label class="lable-text">Birth Hour</label><br>

                                                                <select class="select-type">

                                                                    <option>Hour</option>

                                                                    <option>0</option>

                                                                    <option>1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                </select>

                                                            </div>

                                                            <div class="col-md-4">

                                                                <label class="lable-text">Birth Minute</label><br>

                                                                <select class="select-type">

                                                                    <option>Minute</option>

                                                                    <option>0</option>

                                                                    <option>1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                </select>

                                                            </div>

                                                            <div class="col-md-4">

                                                                <label class="lable-text">Birth Second</label><br>

                                                                <select class="select-type">

                                                                    <option>Second</option>

                                                                    <option>0</option>

                                                                    <option>1</option>

                                                                    <option>2</option>

                                                                    <option>3</option>

                                                                </select>

                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="lable-text">Birth Place</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    placeholder="Enter Your Birth Place">
                                                            </div>
                                                            <div class="col-md-12">

                                                                <div class="hs-astro-enquiry-ctbtn">

                                                                    <input type="button" name="button"
                                                                        class="form-control" value="SUBMIT">

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                                <div class="col-md-2">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div id="profilemenu-06"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-06") { ?> in active <?php } ?>">
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

                                    <div id="profilemenu-07"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-07") { ?> in active <?php } ?>">

                                        <div class="container width-01">

                                            <div class="row">

                                                <div class="col-md-5 shadow-01">

                                                    <h3 class="profile-heading">Profile Information</h3>


                                                    <?php echo form_open_multipart(base_url().'update_profile_user/updateprofile/'.$user_id); ?>


                                                    <i class="fa fa-user fa-icon" aria-hidden="true"></i><label
                                                        class="lable-text-01">Name</label><br>

                                                    <input type="text" placeholder="Enter Name" name="user_first_name"
                                                        value="<?php echo $nm=$getdata->user_first_name;?>"
                                                        class="input-text" onfocus="this.placeholder=''"
                                                        onblur="this.placeholder='Enter Name'" required>

                                                    <i class="fa fa-phone fa-icon" aria-hidden="true"></i><label
                                                        class="lable-text-01">Contact Number</label><br>

                                                    <input type="text" name="user_mobile"
                                                        value="<?php echo $m=$getdata->user_mobile;?>"
                                                        placeholder="Enter Number" class="input-text"
                                                        onfocus="this.placeholder=''"
                                                        onblur="this.placeholder='Enter Number'"
                                                        id="contact_mobilenumber" pattern="[1-9]{1}[0-9]{9}"
                                                        maxlength="10" required>
                                                    <!-- ssss  -->
                                                    <i class="fa fa-calendar  fa-icon" aria-hidden="true"></i><label
                                                        class="lable-text-01">user_dob</label><br>

                                                    <input type="date" name="user_dob"
                                                        value="<?php echo $m=$getdata->user_dob;?>"
                                                        placeholder="Enter birth date" class="input-text"
                                                        onfocus="this.placeholder=''"
                                                        onblur="this.placeholder='Enter Date of birth'" required>

                                                    <i class="fa fa-clock-o fa-icon" aria-hidden="true"></i><label
                                                        class="lable-text-01">Time of Birth</label><br>

                                                    <input type="time" name="user_timeofbirth"
                                                        value="<?php echo $m=$getdata->user_timeofbirth;?>"
                                                        placeholder="Enter time of birth" class="input-text"
                                                        onfocus="this.placeholder=''"
                                                        onblur="this.placeholder='Enter birthtime'" required>

                                                    <i class="fa fa-globe fa-icon" aria-hidden="true"></i><label
                                                        class="lable-text-01">Place of Birth</label><br>

                                                    <input type="text" name="user_placeofbirth"
                                                        value="<?php echo $m=$getdata->user_placeofbirth;?>"
                                                        placeholder="Enter place of birth" class="input-text"
                                                        onfocus="this.placeholder=''"
                                                        onblur="this.placeholder='Enter place of birth'" required>

                                                    <i class="fa fa-globe fa-icon" aria-hidden="true"></i><label
                                                        class="lable-text-01">State</label><br>

                                                    <input type="text" name="user_state"
                                                        value="<?php echo $m=$getdata->user_state;?>"
                                                        placeholder="Enter State" class="input-text"
                                                        onfocus="this.placeholder=''"
                                                        onblur="this.placeholder='Enter State'" required>
                                                    <i class="fa fa-clock-o fa-icon" aria-hidden="true"></i><label
                                                        class="lable-text-01">Country</label><br>
                                                    <input type="text" name="user_country"
                                                        value="<?php echo $m=$getdata->user_country;?>"
                                                        placeholder="Enter Country" class="input-text"
                                                        onfocus="this.placeholder=''"
                                                        onblur="this.placeholder='Enter Country'" required>
                                                    <i class="fa fa-briefcase fa-icon" aria-hidden="true"></i><label
                                                        class="lable-text-01">user_occupation</label><br>
                                                    <input type="text" name="user_occupation"
                                                        value="<?php echo $m=$getdata->user_occupation;?>"
                                                        placeholder="Enter Occupation" class="input-text"
                                                        onfocus="this.placeholder=''"
                                                        onblur="this.placeholder='Enter Occupation'" required>
                                                    <i class="fa fa-globe fa-icon" aria-hidden="true"></i><label
                                                        class="lable-text-01">Gender status</label><br>

                                                    <select
                                                        class="input-text form-control droupdown select2-hidden-accessible myForm123"
                                                        name="user_gender" tabindex="-1" aria-hidden="true" required="">
                                                        <!-- <option value="<?php echo $row3['id']; ?>"<?php if($data['r_status']==$row3['id']) echo 'selected="selected"';?>><?php echo $row3['status'];?></option> -->
                                                        <?php $male=$getdata->user_gender; 
                                                        if($male == 'male') { ?>


                                                        <option value="male" selected="selected">male</option>
                                                        <option value="female">female</option>
                                                        <?php }else{?>
                                                        <option value="female" selected="selected">female</option>
                                                        <option value="male">male</option>
                                                        <?php } ?>
                                                    </select>
                                                    <!-- marital -->


                                                    <i class="fa fa-globe fa-icon" aria-hidden="true"></i><label
                                                        class="lable-text-01">Marital status</label><br>

                                                    <select
                                                        class="input-text form-control droupdown select2-hidden-accessible myForm123"
                                                        name="user_maritalstatus" tabindex="-1" aria-hidden="true"
                                                        required="">

                                                        <!-- <option value="">Marital Status</option> -->
                                                        <!-- <option value="<?php echo $row3['id']; ?>"<?php if($data['r_status']==$row3['id']) echo 'selected="selected"';?>><?php echo $row3['status'];?></option> -->

                                                        <option value="NeverMarried"
                                                            <?php $ms=$getdata->user_maritalstatus; if($ms=='NeverMarried') echo 'selected="selected"'?>>
                                                            Unmarried</option>

                                                        <option value="Married"
                                                            <?php $ms=$getdata->user_maritalstatus; if($ms=='Married') echo 'selected="selected"' ?>>
                                                            Married</option>

                                                        <option value="Divorced"
                                                            <?php $ms=$getdata->user_maritalstatus; if($ms=='Divorced') echo 'selected="selected"' ?>>
                                                            Divorced</option>

                                                        <option value="Widow"
                                                            <?php $ms=$getdata->user_maritalstatus; if($ms=='Widow') echo 'selected="selected"' ?>>
                                                            Widow</option>
                                                        <option>Widower</option>

                                                    </select>


                                                    <!-- marital -->

                                                    <!-- ssss  -->

                                                    <i class="fa fa-envelope fa-icon" aria-hidden="true"></i><label
                                                        class="lable-text-01">Email</label><br>

                                                    <input type="email" name="user_email"
                                                        value="<?php echo $e=$getdata->user_email;?>"
                                                        placeholder="Enter Email" class="input-text"
                                                        onfocus="this.placeholder=''"
                                                        onblur="this.placeholder='Enter Email'" required>

                                                    <i class="fa fa-upload fa-icon" aria-hidden="true"></i><label
                                                        class="lable-text-01">Upload Prolie Image</label><br>

                                                    <input type="file" name="userfile" value="upload" class="control"
                                                        size="60" id="fUpload" onchange="checkextension()">
                                                    <div class="user-profile">

                                                        <h3>Profile Picture</h3>

                                                        <img src="<?php echo base_url();?>image/user/<?php echo $e=$getdata->user_image;?>?nocache=<?php echo time(); ?>"
                                                            onerror="this.src='<?php echo base_url();?>/image/default';"
                                                            class="team-img">
                                                        <!-- <img class="img-responsive" src="<?php echo base_url();?>/image/news/<?php echo $news['image']; ?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" /> -->
                                                        <!-- <a href="#" class="update-btn">
                                                          UPDATE
                                                        </a> -->
                                                        <button name="submit" type="submit" value="submit"
                                                            class="update-btn">UPDATE</button>
                                                        <?php echo form_close(); ?>
                                                    </div>

                                                </div>

                                                <div class="col-md-5 shadow-02">
                                                    <?php echo form_open_multipart(base_url().'update_user_password/updatepassword/'); ?>
                                                    <h3 class="profile-heading">Change Password</h3>

                                                    <label class="lable-text-01">Old Password</label><br>

                                                    <input type="Password" name="oldpassword"
                                                        placeholder="Enter Old Password" class="input-text"
                                                        onfocus="this.placeholder=''"
                                                        onblur="this.placeholder='Enter Old Password'">

                                                    <label class="lable-text-01">New Password</label><br>

                                                    <input type="Password" name="newpassword"
                                                        placeholder="Enter New Password" class="input-text"
                                                        onfocus="this.placeholder=''"
                                                        onblur="this.placeholder='Enter New Password'">

                                                    <label class="lable-text-01">Confirm Password</label><br>

                                                    <input type="Password" name="confpassword"
                                                        placeholder="Enter Confirm Password" class="input-text"
                                                        onfocus="this.placeholder=''"
                                                        onblur="this.placeholder='Enter Name'">

                                                    <button name="submit" type="submit" value="submit"
                                                        class="update-btn">UPDATE</button>
                                                    <?php echo form_close(); ?>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div id="profilemenu-08"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-08") { ?> in active <?php } ?>">

                                        <div class="container width-01">

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="row">

                                                        <div class="col-md-7">

                                                            <div class="display-01">

                                                                <img src="<?php echo base_url();?>images/content/online3.jpg"
                                                                    class="team-img-01">

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

                                                                <i class="fa fa-star-half-o star-icon"
                                                                    aria-hidden="true"></i>

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

                                    <!-- *********************************************requested report detail start profile 10******************************************************** -->
                                    <!-- *********************************************requested report detail start profile10******************************************************** -->

                                    <div id="profilemenu-10"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-10") { ?> in active <?php } ?>">
                                        <div class="row bg-color-01">
                                            <table class="table-tag table table-striped table-bordered" border="1"
                                                id="example2">
                                                <thead>
                                                    <tr>
                                                        <th class="tab-data">S.NO</th>
                                                        <th class="tab-data">REQUEST TO</th>
                                                        <th class="tab-data">AMOUNT PAID</th>
                                                        <th class="tab-data">REQUEST DATE</th>
                                                        <th class="tab-data">SOLVE DATE</th>
                                                        <th class="tab-data">DOCUMENT</th>
                                                        <th class="tab-data">STATUS</th>
                                                        <th class="tab-data">ACTION</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <!-- user report data view -->
                                                    <?php 
                                                        $sn=0;
                                                        // $wallettrj=fetchby_wheres('wallet_recharge_history',array('wrh_user_id'=>$user_id));
                                                        $reqreportview10 = fetchbywhereorder2('reportsendtoastro',array('rp_user_id'=>$user_id),'desc','rp_id','asc','rp_problem_solve_status');
                                                        //echo $this->db->last_query();
                                                        foreach($reqreportview10 as $urv){
                                                        $sn++; 
                                                    ?>
                                                    <tr>
                                                        <td class="tab-data"><?php echo $sn; ?></td>
                                                        <td class="tab-data">
                                                            <?php $fnm=fetchbyresult_where('astrologers',$urv['rp_astro_id'],'astro_id') ;if(!empty($fnm[0]['astro_name'])){echo  $fnm[0]['astro_name'];}?>
                                                        </td>
                                                        <!-- <td class="tab-data"><?php echo  $fnm[0]['user_email']; ?></td>
			                                              <td class="tab-data"><?php// echo  $fnm[0]['user_mobile']; ?></td> -->
                                                        <td class="tab-data"><?php echo $urv['rp_amountpaid']; ?></td>
                                                        <td class="tab-data">
                                                            <?php echo $DTR=date('d-M-y h:i:sa',strtotime($urv['rp_timestamp'])); ?>
                                                        </td>
                                                        <td class="tab-data">
                                                            <?php
                                                            if($urv['rp_solvedate'] == '0000-00-00 00:00:00')
                                                            {
                                                            echo "PENDING";
                                                            }else
                                                            {
                                                            echo $DTR2=date('d-M-y h:i:sa',strtotime($urv['rp_solvedate']));} ?></td>

                                                        <?php if($urv['rp_solution_attachment'] != NULL) { ?>
                                                        <td class="tab-data"><a
                                                                href="<?php echo base_url();?>pdfimagedoc/astrologertouser/<?php echo $urv['rp_solution_attachment']; ?>"><?php echo $urv['rp_solution_attachment']; ?></a>
                                                        </td>
                                                        <?php } else{?>
                                                        <td>NO DOCUMENT ATTACHED</td>
                                                        <?php } ?>
                                                        <?php if($urv['rp_problem_solve_status']==0){?>

                                                        <td class="tab-data"><a href="#" class="pending-01">Pending</a>
                                                        </td>
                                                        <?php } else {?>
                                                        <td class="tab-data"><a href="#"
                                                                class="completed-01">Success</a></td>
                                                        <?php } ?>
                                                        </td>
                                                        <td class="tab-data">

                                                            <!-- <a  href="#" data-toggle="modal" data-target="#modelinfoview<?php echo $urv['rp_id'];?>" data-id="<?php echo $urv['rp_id'];?>" ><i class="fas fa-eye" style="color: #000; font-size:25px;"></i></a> -->

                                                            <?php if($urv['rp_problem_solve_status']==1)
	                                                          {?>
                                                            <!-- view requested data -->
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#reportreplyfromastroview<?php echo $urv['rp_id'];?>"
                                                                data-id="<?php echo $urv['rp_id'];?>"><i
                                                                    class="fas fa-eye"
                                                                    style="color: #000; font-size:25px;"></i></a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- *********************************************requested report detail end******************************************************** -->
                                    <!-- *********************************************requested report detail end******************************************************** -->

                                    <div id="profilemenu-09"
                                        class="tab-pane fade <?php if($this->uri->segment(2)=="profilemenu-09") { ?> in active <?php } ?>">

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
                                                        <h6><?php echo $dte=date('d-M-Y',strtotime($fnc['timestamp'])) ;?>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <!-- notification -->
                                                <!-- <div class="hs-user-notification">
                                                        <h3>M</h3>
                                                        <div class="hs-as-notify">
                                                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                        <h6>3 hour ago</h6>
                                                        </div>
                                                      </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- astro gallery -->
                                    <div id="profilemenu-14" class="tab-pane fade in">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                            </div>
                                            <!-- t1 start-->
                                            <?php
                                           $product33=fetchbyresult('product');
                                           if(count($product33)>0) { $i=0;
                                                    foreach($product33 as $rows)
                                                { $i++;
                                                    ?>
                                            <!-- product start -->
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">


                                                <div class="hs_shop_prodt_main_box hs-shope-page-clr">

                                                    <div class="hs_shop_prodt_img_wrapper">

                                                        <img src="<?php echo base_url();?>image/product/<?php echo $rows['pr_image'];?>"
                                                            alt="shop_product">

                                                        <!--<a href="<?php echo site_url('');?>add_to_card/<?php echo $rows['pr_id'];?>">Add-->
                                                        <!--    to Cart</a>-->
                                                        <?php if($rows['pr_category']==2)
                                                          {?>


                                                        <?php }else{
                                                              ?>
                                                        <!-- <a href="<?php echo site_url('');?>add_to_card/<?php echo $rows['pr_id'];?>">Add to Cart</a> -->
                                                        <!-- check in product_subproduct start -->

                                                        <?php  
                                                              $subcteavailable = fetchbyresult_where_returnrow('product_subproduct',$rows['pr_id'],'sp_product_id');
                                                              if($subcteavailable == 0){
                                                              ?>
                                                        <a
                                                            href="<?php echo site_url('');?>add_to_card/<?php echo $rows['pr_id'];?>">Add
                                                            to Cart</a>
                                                        <?php }?>
                                                        <!-- check in product_subproduct end -->

                                                        <?php   }
                                                              ?>
                                                    </div>

                                                    <div class="hs_shop_prodt_img_cont_wrapper">

                                                        <h2><a
                                                                href="#"><?php echo substr($rows['pr_title'], 0, 30);?></a>
                                                        </h2>
                                                        <?php if($rows['pr_category']==2)
                                                          {?>
                                                        <h3><?php echo $ee = substr($rows['pr_pricedetail'], 0, 30);//echo $rows['pr_pricedetail'];?>
                                                        </h3>

                                                        <?php }else{
                                                              ?>
                                                        <h3>???<?php echo $rows['pr_finalprice'];?>
                                                            &nbsp;<del>???<?php echo $rows['pr_originalprice'];?>
                                                            </del>&nbsp; <span><?php echo $rows['pr_discount'];?> %
                                                                Disc</span></h3>

                                                        <?php   }
                                                              ?>
                                                        <!--<h4>???<?php echo $rows['pr_finalprice'];?>-->
                                                        <!--    &nbsp;<del>???<?php echo $rows['pr_originalprice'];?>-->
                                                        <!--    </del>&nbsp; <span><?php echo $rows['pr_discount'];?> %-->
                                                        <!--        Disc</span></h4>-->

                                                        <!-- <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star-o"></i>

                                                            <i class="fa fa-star-o"></i> -->

                                                        <!-- <h4>Offers <span>Special Price</span></h4> -->
                                                        <div class="hs-productdetailsBtn">
                                                            <a
                                                                href="<?php echo base_url();?>productdetails/<?php echo encoding($rows['pr_id']);?>">View
                                                                Details</a>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <?php if($i%3==0) { ?>
                                            <div class="clearfix"></div> <?php } 
                                                  ?>
                                            <?php }} ?>
                                            <!-- t1 end -->
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 visible-lg visible-md">

                                                <div class="pager_wrapper">

                                                    <ul class="pagination">
                                                        <!-- <?php echo $pagelinks ?> -->


                                                    </ul>

                                                </div>

                                            </div>
                                            <!-- pagination -->
                                        </div>

                                    </div>
                                    <!-- astro gallery -->
                                    <div id="profilemenu-15" class="tab-pane fade in">
                                        <div class="row">
                                            <!-- match making start -->
                                            <!--hs form section start -->


                                            <div class="hs_predicition_form">


                                                <div class="">


                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="mdss clsCls">

                                                                <div class="sectionhr aboutus qshead">

                                                                    <h3 class="h1tag">Marriage Horoscope Matching (Male)
                                                                    </h3>
                                                                    <p class="check wow fadeInUp"> Matchmaking for
                                                                        Marriage - Kundali Matching by date of birth</p>

                                                                </div>
                                                                <!-- <form method="post" autocomplete="off" action="prediction" id="fmfree"> -->
                                                                <?php echo form_open(base_url().'matchmaking_submit'); ?>
                                                                <div class="row">
                                                                    <div class="col-md-6">

                                                                        <label>Name</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_name_first');?></span>
                                                                        <input type="text" name="mm_name_first"
                                                                            placeholder="Name" class="form-control"
                                                                            autocomplete="off" required="">
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label>Gender</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_gender_first');?></span>
                                                                        <select
                                                                            class="form-control droupdown select2-hidden-accessible myForm123"
                                                                            name="mm_gender_first" required="">
                                                                            <option>Gender</option>
                                                                            <option value="male">Male</option>
                                                                            <option value="female">Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">

                                                                    <div class="col-md-6 col-xs-12">



                                                                        <label>Country Code</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_countrycode_first');?></span>


                                                                        <select name="mm_countrycode_first"
                                                                            class="form-control droupdown select2-hidden-accessible myForm123"
                                                                            tabindex="8" id="state" required="">



                                                                            <option
                                                                                style="color: #333;font-weight:normal;margin-bottom: 0px; font-size: 16px;"
                                                                                value="">Select</option>



                                                                            <option data-countrycode="DZ" value="213">
                                                                                Algeria (+213)</option>



                                                                            <option data-countrycode="AD" value="376">
                                                                                Andorra (+376)</option>



                                                                            <option data-countrycode="AO" value="244">
                                                                                Angola (+244)</option>



                                                                            <option data-countrycode="AI" value="1264">
                                                                                Anguilla (+1264)</option>



                                                                            <option data-countrycode="AG" value="1268">
                                                                                Antigua &amp; Barbuda (+1268)</option>



                                                                            <option data-countrycode="AR" value="54">
                                                                                Argentina (+54)</option>



                                                                            <option data-countrycode="AM" value="374">
                                                                                Armenia (+374)</option>



                                                                            <option data-countrycode="AW" value="297">
                                                                                Aruba (+297)</option>



                                                                            <option data-countrycode="AU" value="61">
                                                                                Australia (+61)</option>



                                                                            <option data-countrycode="AT" value="43">
                                                                                Austria (+43)</option>



                                                                            <option data-countrycode="AZ" value="994">
                                                                                Azerbaijan (+994)</option>



                                                                            <option data-countrycode="BS" value="1242">
                                                                                Bahamas (+1242)</option>



                                                                            <option data-countrycode="BH" value="973">
                                                                                Bahrain (+973)</option>



                                                                            <option data-countrycode="BD" value="880">
                                                                                Bangladesh (+880)</option>



                                                                            <option data-countrycode="BB" value="1246">
                                                                                Barbados (+1246)</option>



                                                                            <option data-countrycode="BY" value="375">
                                                                                Belarus (+375)</option>



                                                                            <option data-countrycode="BE" value="32">
                                                                                Belgium (+32)</option>



                                                                            <option data-countrycode="BZ" value="501">
                                                                                Belize (+501)</option>



                                                                            <option data-countrycode="BJ" value="229">
                                                                                Benin (+229)</option>





                                                                            <option data-countrycode="BM" value="1441">
                                                                                Bermuda (+1441)</option>



                                                                            <option data-countrycode="BT" value="975">
                                                                                Bhutan (+975)</option>



                                                                            <option data-countrycode="BO" value="591">
                                                                                Bolivia (+591)</option>



                                                                            <option data-countrycode="BA" value="387">
                                                                                Bosnia Herzegovina (+387)</option>



                                                                            <option data-countrycode="BW" value="267">
                                                                                Botswana (+267)</option>



                                                                            <option data-countrycode="BR" value="55">
                                                                                Brazil (+55)</option>



                                                                            <option data-countrycode="BN" value="673">
                                                                                Brunei (+673)</option>



                                                                            <option data-countrycode="BG" value="359">
                                                                                Bulgaria (+359)</option>



                                                                            <option data-countrycode="BF" value="226">
                                                                                Burkina Faso (+226)</option>



                                                                            <option data-countrycode="BI" value="257">
                                                                                Burundi (+257)</option>



                                                                            <option data-countrycode="KH" value="855">
                                                                                Cambodia (+855)</option>



                                                                            <option data-countrycode="CM" value="237">
                                                                                Cameroon (+237)</option>

                                                                            <option data-countrycode="CA" value="1">
                                                                                Canada (+1)</option>

                                                                            <option data-countrycode="CV" value="238">
                                                                                Cape Verde Islands (+238)</option>

                                                                            <option data-countrycode="KY" value="1345">
                                                                                Cayman Islands (+1345)</option>

                                                                            <option data-countrycode="CF" value="236">
                                                                                Central African Republic (+236)</option>

                                                                            <option data-countrycode="CL" value="56">
                                                                                Chile (+56)</option>

                                                                            <option data-countrycode="CN" value="86">
                                                                                China (+86)</option>

                                                                            <option data-countrycode="CO" value="57">
                                                                                Colombia (+57)</option>

                                                                            <option data-countrycode="KM" value="269">
                                                                                Comoros (+269)</option>

                                                                            <option data-countrycode="CG" value="242">
                                                                                Congo (+242)</option>

                                                                            <option data-countrycode="CK" value="682">
                                                                                Cook Islands (+682)</option>

                                                                            <option data-countrycode="CR" value="506">
                                                                                Costa Rica (+506)</option>

                                                                            <option data-countrycode="HR" value="385">
                                                                                Croatia (+385)</option>

                                                                            <option data-countrycode="CU" value="53">
                                                                                Cuba (+53)</option>

                                                                            <option data-countrycode="CY" value="90392">
                                                                                Cyprus North (+90392)</option>

                                                                            <option data-countrycode="CY" value="357">
                                                                                Cyprus South (+357)</option>

                                                                            <option data-countrycode="CZ" value="42">
                                                                                Czech Republic (+42)</option>

                                                                            <option data-countrycode="DK" value="45">
                                                                                Denmark (+45)</option>

                                                                            <option data-countrycode="DJ" value="253">
                                                                                Djibouti (+253)</option>

                                                                            <option data-countrycode="DM" value="1809">
                                                                                Dominica (+1809)</option>

                                                                            <option data-countrycode="DO" value="1809">
                                                                                Dominican Republic (+1809)</option>

                                                                            <option data-countrycode="EC" value="593">
                                                                                Ecuador (+593)</option>

                                                                            <option data-countrycode="EG" value="20">
                                                                                Egypt (+20)</option>

                                                                            <option data-countrycode="SV" value="503">El
                                                                                Salvador (+503)</option>

                                                                            <option data-countrycode="GQ" value="240">
                                                                                Equatorial Guinea (+240)</option>

                                                                            <option data-countrycode="ER" value="291">
                                                                                Eritrea (+291)</option>

                                                                            <option data-countrycode="EE" value="372">
                                                                                Estonia (+372)</option>

                                                                            <option data-countrycode="ET" value="251">
                                                                                Ethiopia (+251)</option>

                                                                            <option data-countrycode="FK" value="500">
                                                                                Falkland Islands (+500)</option>

                                                                            <option data-countrycode="FO" value="298">
                                                                                Faroe Islands (+298)</option>

                                                                            <option data-countrycode="FJ" value="679">
                                                                                Fiji (+679)</option>

                                                                            <option data-countrycode="FI" value="358">
                                                                                Finland (+358)</option>

                                                                            <option data-countrycode="FR" value="33">
                                                                                France (+33)</option>

                                                                            <option data-countrycode="GF" value="594">
                                                                                French Guiana (+594)</option>

                                                                            <option data-countrycode="PF" value="689">
                                                                                French Polynesia (+689)</option>

                                                                            <option data-countrycode="GA" value="241">
                                                                                Gabon (+241)</option>

                                                                            <option data-countrycode="GM" value="220">
                                                                                Gambia (+220)</option>

                                                                            <option data-countrycode="GE" value="7880">
                                                                                Georgia (+7880)</option>

                                                                            <option data-countrycode="DE" value="49">
                                                                                Germany (+49)</option>

                                                                            <option data-countrycode="GH" value="233">
                                                                                Ghana (+233)</option>

                                                                            <option data-countrycode="GI" value="350">
                                                                                Gibraltar (+350)</option>

                                                                            <option data-countrycode="GR" value="30">
                                                                                Greece (+30)</option>

                                                                            <option data-countrycode="GL" value="299">
                                                                                Greenland (+299)</option>

                                                                            <option data-countrycode="GD" value="1473">
                                                                                Grenada (+1473)</option>

                                                                            <option data-countrycode="GP" value="590">
                                                                                Guadeloupe (+590)</option>

                                                                            <option data-countrycode="GU" value="671">
                                                                                Guam (+671)</option>

                                                                            <option data-countrycode="GT" value="502">
                                                                                Guatemala (+502)</option>

                                                                            <option data-countrycode="GN" value="224">
                                                                                Guinea (+224)</option>

                                                                            <option data-countrycode="GW" value="245">
                                                                                Guinea - Bissau (+245)</option>

                                                                            <option data-countrycode="GY" value="592">
                                                                                Guyana (+592)</option>

                                                                            <option data-countrycode="HT" value="509">
                                                                                Haiti (+509)</option>

                                                                            <option data-countrycode="HN" value="504">
                                                                                Honduras (+504)</option>

                                                                            <option data-countrycode="HK" value="852">
                                                                                Hong Kong (+852)</option>

                                                                            <option data-countrycode="HU" value="36">
                                                                                Hungary (+36)</option>

                                                                            <option data-countrycode="IS" value="354">
                                                                                Iceland (+354)</option>

                                                                            <option data-countrycode="IN" value="91">
                                                                                India (+91)</option>

                                                                            <option data-countrycode="ID" value="62">
                                                                                Indonesia (+62)</option>

                                                                            <option data-countrycode="IR" value="98">
                                                                                Iran (+98)</option>

                                                                            <option data-countrycode="IQ" value="964">
                                                                                Iraq (+964)</option>

                                                                            <option data-countrycode="IE" value="353">
                                                                                Ireland (+353)</option>

                                                                            <option data-countrycode="IL" value="972">
                                                                                Israel (+972)</option>

                                                                            <option data-countrycode="IT" value="39">
                                                                                Italy (+39)</option>

                                                                            <option data-countrycode="JM" value="1876">
                                                                                Jamaica (+1876)</option>

                                                                            <option data-countrycode="JP" value="81">
                                                                                Japan (+81)</option>

                                                                            <option data-countrycode="JO" value="962">
                                                                                Jordan (+962)</option>

                                                                            <option data-countrycode="KZ" value="7">
                                                                                Kazakhstan (+7)</option>

                                                                            <option data-countrycode="KE" value="254">
                                                                                Kenya (+254)</option>

                                                                            <option data-countrycode="KI" value="686">
                                                                                Kiribati (+686)</option>

                                                                            <option data-countrycode="KP" value="850">
                                                                                Korea North (+850)</option>

                                                                            <option data-countrycode="KR" value="82">
                                                                                Korea South (+82)</option>

                                                                            <option data-countrycode="KW" value="965">
                                                                                Kuwait (+965)</option>

                                                                            <option data-countrycode="KG" value="996">
                                                                                Kyrgyzstan (+996)</option>

                                                                            <option data-countrycode="LA" value="856">
                                                                                Laos (+856)</option>

                                                                            <option data-countrycode="LV" value="371">
                                                                                Latvia (+371)</option>

                                                                            <option data-countrycode="LB" value="961">
                                                                                Lebanon (+961)</option>

                                                                            <option data-countrycode="LS" value="266">
                                                                                Lesotho (+266)</option>

                                                                            <option data-countrycode="LR" value="231">
                                                                                Liberia (+231)</option>

                                                                            <option data-countrycode="LY" value="218">
                                                                                Libya (+218)</option>

                                                                            <option data-countrycode="LI" value="417">
                                                                                Liechtenstein (+417)</option>

                                                                            <option data-countrycode="LT" value="370">
                                                                                Lithuania (+370)</option>

                                                                            <option data-countrycode="LU" value="352">
                                                                                Luxembourg (+352)</option>

                                                                            <option data-countrycode="MO" value="853">
                                                                                Macao (+853)</option>

                                                                            <option data-countrycode="MK" value="389">
                                                                                Macedonia (+389)</option>

                                                                            <option data-countrycode="MG" value="261">
                                                                                Madagascar (+261)</option>

                                                                            <option data-countrycode="MW" value="265">
                                                                                Malawi (+265)</option>

                                                                            <option data-countrycode="MY" value="60">
                                                                                Malaysia (+60)</option>

                                                                            <option data-countrycode="MV" value="960">
                                                                                Maldives (+960)</option>

                                                                            <option data-countrycode="ML" value="223">
                                                                                Mali (+223)</option>

                                                                            <option data-countrycode="MT" value="356">
                                                                                Malta (+356)</option>

                                                                            <option data-countrycode="MH" value="692">
                                                                                Marshall Islands (+692)</option>

                                                                            <option data-countrycode="MQ" value="596">
                                                                                Martinique (+596)</option>

                                                                            <option data-countrycode="MR" value="222">
                                                                                Mauritania (+222)</option>

                                                                            <option data-countrycode="YT" value="269">
                                                                                Mayotte (+269)</option>

                                                                            <option data-countrycode="MX" value="52">
                                                                                Mexico (+52)</option>

                                                                            <option data-countrycode="FM" value="691">
                                                                                Micronesia (+691)</option>

                                                                            <option data-countrycode="MD" value="373">
                                                                                Moldova (+373)</option>

                                                                            <option data-countrycode="MC" value="377">
                                                                                Monaco (+377)</option>

                                                                            <option data-countrycode="MN" value="976">
                                                                                Mongolia (+976)</option>

                                                                            <option data-countrycode="MS" value="1664">
                                                                                Montserrat (+1664)</option>

                                                                            <option data-countrycode="MA" value="212">
                                                                                Morocco (+212)</option>

                                                                            <option data-countrycode="MZ" value="258">
                                                                                Mozambique (+258)</option>

                                                                            <option data-countrycode="MN" value="95">
                                                                                Myanmar (+95)</option>

                                                                            <option data-countrycode="NA" value="264">
                                                                                Namibia (+264)</option>

                                                                            <option data-countrycode="NR" value="674">
                                                                                Nauru (+674)</option>

                                                                            <option data-countrycode="NP" value="977">
                                                                                Nepal (+977)</option>

                                                                            <option data-countrycode="NL" value="31">
                                                                                Netherlands (+31)</option>

                                                                            <option data-countrycode="NC" value="687">
                                                                                New Caledonia (+687)</option>

                                                                            <option data-countrycode="NZ" value="64">New
                                                                                Zealand (+64)</option>

                                                                            <option data-countrycode="NI" value="505">
                                                                                Nicaragua (+505)</option>

                                                                            <option data-countrycode="NE" value="227">
                                                                                Niger (+227)</option>

                                                                            <option data-countrycode="NG" value="234">
                                                                                Nigeria (+234)</option>

                                                                            <option data-countrycode="NU" value="683">
                                                                                Niue (+683)</option>

                                                                            <option data-countrycode="NF" value="672">
                                                                                Norfolk Islands (+672)</option>

                                                                            <option data-countrycode="NP" value="670">
                                                                                Northern Marianas (+670)</option>

                                                                            <option data-countrycode="NO" value="47">
                                                                                Norway (+47)</option>

                                                                            <option data-countrycode="OM" value="968">
                                                                                Oman (+968)</option>

                                                                            <option data-countrycode="PW" value="680">
                                                                                Palau (+680)</option>

                                                                            <option data-countrycode="PA" value="507">
                                                                                Panama (+507)</option>

                                                                            <option data-countrycode="PG" value="675">
                                                                                Papua New Guinea (+675)</option>

                                                                            <option data-countrycode="PY" value="595">
                                                                                Paraguay (+595)</option>

                                                                            <option data-countrycode="PE" value="51">
                                                                                Peru (+51)</option>

                                                                            <option data-countrycode="PH" value="63">
                                                                                Philippines (+63)</option>

                                                                            <option data-countrycode="PL" value="48">
                                                                                Poland (+48)</option>

                                                                            <option data-countrycode="PT" value="351">
                                                                                Portugal (+351)</option>

                                                                            <option data-countrycode="PR" value="1787">
                                                                                Puerto Rico (+1787)</option>

                                                                            <option data-countrycode="QA" value="974">
                                                                                Qatar (+974)</option>

                                                                            <option data-countrycode="RE" value="262">
                                                                                Reunion (+262)</option>

                                                                            <option data-countrycode="RO" value="40">
                                                                                Romania (+40)</option>

                                                                            <option data-countrycode="RU" value="7">
                                                                                Russia (+7)</option>

                                                                            <option data-countrycode="RW" value="250">
                                                                                Rwanda (+250)</option>

                                                                            <option data-countrycode="SM" value="378">
                                                                                San Marino (+378)</option>

                                                                            <option data-countrycode="ST" value="239">
                                                                                Sao Tome &amp; Principe (+239)</option>

                                                                            <option data-countrycode="SA" value="966">
                                                                                Saudi Arabia (+966)</option>

                                                                            <option data-countrycode="SN" value="221">
                                                                                Senegal (+221)</option>

                                                                            <option data-countrycode="CS" value="381">
                                                                                Serbia (+381)</option>

                                                                            <option data-countrycode="SC" value="248">
                                                                                Seychelles (+248)</option>

                                                                            <option data-countrycode="SL" value="232">
                                                                                Sierra Leone (+232)</option>

                                                                            <option data-countrycode="SG" value="65">
                                                                                Singapore (+65)</option>

                                                                            <option data-countrycode="SK" value="421">
                                                                                Slovak Republic (+421)</option>

                                                                            <option data-countrycode="SI" value="386">
                                                                                Slovenia (+386)</option>

                                                                            <option data-countrycode="SB" value="677">
                                                                                Solomon Islands (+677)</option>

                                                                            <option data-countrycode="SO" value="252">
                                                                                Somalia (+252)</option>

                                                                            <option data-countrycode="ZA" value="27">
                                                                                South Africa (+27)</option>

                                                                            <option data-countrycode="ES" value="34">
                                                                                Spain (+34)</option>

                                                                            <option data-countrycode="LK" value="94">Sri
                                                                                Lanka (+94)</option>

                                                                            <option data-countrycode="SH" value="290">
                                                                                St. Helena (+290)</option>

                                                                            <option data-countrycode="KN" value="1869">
                                                                                St. Kitts (+1869)</option>

                                                                            <option data-countrycode="SC" value="1758">
                                                                                St. Lucia (+1758)</option>

                                                                            <option data-countrycode="SD" value="249">
                                                                                Sudan (+249)</option>

                                                                            <option data-countrycode="SR" value="597">
                                                                                Suriname (+597)</option>

                                                                            <option data-countrycode="SZ" value="268">
                                                                                Swaziland (+268)</option>

                                                                            <option data-countrycode="SE" value="46">
                                                                                Sweden (+46)</option>

                                                                            <option data-countrycode="CH" value="41">
                                                                                Switzerland (+41)</option>

                                                                            <option data-countrycode="SI" value="963">
                                                                                Syria (+963)</option>

                                                                            <option data-countrycode="TW" value="886">
                                                                                Taiwan (+886)</option>

                                                                            <option data-countrycode="TJ" value="7">
                                                                                Tajikstan (+7)</option>

                                                                            <option data-countrycode="TH" value="66">
                                                                                Thailand (+66)</option>

                                                                            <option data-countrycode="TG" value="228">
                                                                                Togo (+228)</option>

                                                                            <option data-countrycode="TO" value="676">
                                                                                Tonga (+676)</option>

                                                                            <option data-countrycode="TT" value="1868">
                                                                                Trinidad &amp; Tobago (+1868)</option>

                                                                            <option data-countrycode="TN" value="216">
                                                                                Tunisia (+216)</option>

                                                                            <option data-countrycode="TR" value="90">
                                                                                Turkey (+90)</option>

                                                                            <option data-countrycode="TM" value="7">
                                                                                Turkmenistan (+7)</option>

                                                                            <option data-countrycode="TM" value="993">
                                                                                Turkmenistan (+993)</option>

                                                                            <option data-countrycode="TC" value="1649">
                                                                                Turks &amp; Caicos Islands (+1649)
                                                                            </option>

                                                                            <option data-countrycode="TV" value="688">
                                                                                Tuvalu (+688)</option>

                                                                            <option data-countrycode="UG" value="256">
                                                                                Uganda (+256)</option>

                                                                            <option data-countrycode="GB" value="44">UK
                                                                                (+44)</option>

                                                                            <option data-countrycode="UA" value="380">
                                                                                Ukraine (+380)</option>

                                                                            <option data-countrycode="AE" value="971">
                                                                                United Arab Emirates (+971)</option>

                                                                            <option data-countrycode="UY" value="598">
                                                                                Uruguay (+598)</option>

                                                                            <option data-countrycode="US" value="1">USA
                                                                                (+1)</option>

                                                                            <option data-countrycode="UZ" value="7">
                                                                                Uzbekistan (+7)</option>

                                                                            <option data-countrycode="VU" value="678">
                                                                                Vanuatu (+678)</option>

                                                                            <option data-countrycode="VA" value="379">
                                                                                Vatican City (+379)</option>

                                                                            <option data-countrycode="VE" value="58">
                                                                                Venezuela (+58)</option>

                                                                            <option data-countrycode="VN" value="84">
                                                                                Vietnam (+84)</option>

                                                                            <option data-countrycode="VG" value="84">
                                                                                Virgin Islands - British (+1284)
                                                                            </option>

                                                                            <option data-countrycode="VI" value="84">
                                                                                Virgin Islands - US (+1340)</option>

                                                                            <option data-countrycode="WF" value="681">
                                                                                Wallis &amp; Futuna (+681)</option>

                                                                            <option data-countrycode="YE" value="969">
                                                                                Yemen (North)(+969)</option>

                                                                            <option data-countrycode="YE" value="967">
                                                                                Yemen (South)(+967)</option>

                                                                            <option data-countrycode="ZM" value="260">
                                                                                Zambia (+260)</option>

                                                                            <option data-countrycode="ZW" value="263">
                                                                                Zimbabwe (+263)</option>

                                                                        </select>

                                                                    </div>

                                                                    <div class="col-md-6 col-xs-12">

                                                                        <label>Mobile</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_mobile_first');?></span>
                                                                        <input type="text" name="mm_mobile_first"
                                                                            placeholder="Mobile" class="form-control"
                                                                            id="contact_mobilenumber"
                                                                            pattern="[1-9]{1}[0-9]{9}" maxlength="10"
                                                                            autocomplete="off" required="">

                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-6">

                                                                        <label>Date of Birth</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_dob_first');?></span>
                                                                        <input type="date" name="mm_dob_first"
                                                                            class="form-control"
                                                                            placeholder="dd/mm/yyyy" required=""
                                                                            id="dp1609396207557">
                                                                    </div>

                                                                    <div class="col-md-6">

                                                                        <label>Marital Status</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_maritalstatus_first');?></span>
                                                                        <select
                                                                            class="form-control droupdown select2-hidden-accessible myForm123"
                                                                            name="mm_maritalstatus_first" tabindex="-1"
                                                                            aria-hidden="true" required="">

                                                                            <option value="">Marital Status</option>

                                                                            <option value="Never Married">Unmarried
                                                                            </option>

                                                                            <option value="Married">Married</option>

                                                                            <option value="Divorced">Divorced</option>

                                                                            <option value="Widow">Widow</option>

                                                                        </select>

                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-sm-6 form-group">

                                                                        <label>Birth Hour </label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_birthhour_first');?></span>
                                                                        <select
                                                                            class="form-control droupdown select2-hidden-accessible myForm123"
                                                                            name="mm_birthhour_first" tabindex="-1"
                                                                            aria-hidden="true" required="">

                                                                            <option value="">HH</option>

                                                                            <option value="00">00 (12 midnight)</option>

                                                                            <option value="01">01 (am)</option>

                                                                            <option value="02">02 (am)</option>

                                                                            <option value="03">03 (am)</option>

                                                                            <option value="04">04 (am)</option>

                                                                            <option value="05">05 (am)</option>

                                                                            <option value="06">06 (am)</option>

                                                                            <option value="07">07 (am)</option>

                                                                            <option value="08">08 (am)</option>

                                                                            <option value="09">09 (am)</option>

                                                                            <option value="10">10 (am)</option>

                                                                            <option value="11">11 (am)</option>

                                                                            <option value="12">12 (noon)</option>

                                                                            <option value="13">13 (1 pm)</option>

                                                                            <option value="14">14 (2 pm)</option>

                                                                            <option value="15">15 (3 pm)</option>

                                                                            <option value="16">16 (4 pm)</option>

                                                                            <option value="17">17 (5 pm)</option>

                                                                            <option value="18">18 (6 pm)</option>

                                                                            <option value="19">19 (7 pm)</option>

                                                                            <option value="20">20 (8 pm)</option>

                                                                            <option value="21">21 (9 pm)</option>

                                                                            <option value="22">22 (10 pm)</option>

                                                                            <option value="23">23 (11 pm)</option>

                                                                        </select>

                                                                    </div>

                                                                    <div class="col-sm-6 form-group">

                                                                        <label>Birth Minute</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_birthmin_first');?></span>
                                                                        <select
                                                                            class="form-control droupdown select2-hidden-accessible myForm123"
                                                                            name="mm_birthmin_first" tabindex="-1"
                                                                            aria-hidden="true" required="">

                                                                            <option value="">MM</option>

                                                                            <option value="00">00</option>

                                                                            <option value="01">01</option>

                                                                            <option value="02">02</option>

                                                                            <option value="03">03</option>

                                                                            <option value="04">04</option>

                                                                            <option value="05">05</option>

                                                                            <option value="06">06</option>

                                                                            <option value="07">07</option>

                                                                            <option value="08">08</option>

                                                                            <option value="09">09</option>

                                                                            <option value="10">10</option>

                                                                            <option value="11">11</option>

                                                                            <option value="12">12</option>

                                                                            <option value="13">13</option>

                                                                            <option value="14">14</option>

                                                                            <option value="15">15</option>

                                                                            <option value="16">16</option>

                                                                            <option value="17">17</option>

                                                                            <option value="18">18</option>

                                                                            <option value="19">19</option>

                                                                            <option value="20">20</option>

                                                                            <option value="21">21</option>

                                                                            <option value="22">22</option>

                                                                            <option value="23">23</option>

                                                                            <option value="24">24</option>

                                                                            <option value="25">25</option>

                                                                            <option value="26">26</option>

                                                                            <option value="27">27</option>

                                                                            <option value="28">28</option>

                                                                            <option value="29">29</option>

                                                                            <option value="30">30</option>

                                                                            <option value="31">31</option>

                                                                            <option value="32">32</option>

                                                                            <option value="33">33</option>

                                                                            <option value="34">34</option>

                                                                            <option value="35">35</option>

                                                                            <option value="36">36</option>

                                                                            <option value="37">37</option>

                                                                            <option value="38">38</option>

                                                                            <option value="39">39</option>

                                                                            <option value="40">40</option>

                                                                            <option value="41">41</option>

                                                                            <option value="42">42</option>

                                                                            <option value="43">43</option>

                                                                            <option value="44">44</option>

                                                                            <option value="45">45</option>

                                                                            <option value="46">46</option>

                                                                            <option value="47">47</option>

                                                                            <option value="48">48</option>

                                                                            <option value="49">49</option>

                                                                            <option value="50">50</option>

                                                                            <option value="51">51</option>

                                                                            <option value="52">52</option>

                                                                            <option value="53">53</option>

                                                                            <option value="54">54</option>

                                                                            <option value="55">55</option>

                                                                            <option value="56">56</option>

                                                                            <option value="57">57</option>

                                                                            <option value="58">58</option>

                                                                            <option value="59">59</option>

                                                                        </select>

                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-6">

                                                                        <label>Email</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_email_first');?></span>
                                                                        <input type="text" name="mm_email_first"
                                                                            class="form-control" placeholder="Email"
                                                                            autocomplete="off">

                                                                    </div>

                                                                    <div class="col-md-6">

                                                                        <label>Please Select Language</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_language_first');?></span>
                                                                        <select
                                                                            class="form-control droupdown select2-hidden-accessible myForm123"
                                                                            name="mm_language_first" tabindex="-1"
                                                                            aria-hidden="true" required="">

                                                                            <option value="hindi">Hindi</option>

                                                                            <option value="english">English</option>

                                                                        </select>

                                                                    </div>

                                                                    <div class="col-md-6">

                                                                        <label>Place of Birth </label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_birthplace_first');?></span>
                                                                        <input autocomplete="no-place-found"
                                                                            placeholder="Place of Birth" type="text"
                                                                            value="" class="form-control"
                                                                            name="mm_birthplace_first" id="search"
                                                                            required="">

                                                                        <input value="" class="hiddenclass"
                                                                            data-val="true"
                                                                            data-val-number="The field Sno must be a number."
                                                                            data-val-required="The Sno field is required."
                                                                            id="Sno" name="Sno" type="hidden">

                                                                    </div>

                                                                </div>



                                                                <div class="row">

                                                                    <div class="col-sm-12">

                                                                        <h5 id="horoscopeFormError"
                                                                            class="text-danger display-none"></h5>

                                                                    </div>

                                                                </div>

                                                                <input type="hidden" name="type"
                                                                    value="Free-Prediction">

                                                                <p class="text-center zero-margin">

                                                                    <!-- <button type="submit" name="submit_query" class="get_free"> Get Prediction </button> -->

                                                                </p>



                                                                <!-- </form> -->

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">


                                                            <div class="mdss clsCls">

                                                                <div class="sectionhr aboutus qshead">

                                                                    <h3 class="h1tag">Marriage Horoscope Matching
                                                                        (Female)</h3>
                                                                    <p class="check wow fadeInUp"> Matchmaking for
                                                                        Marriage - Kundali Matching by date of birth</p>

                                                                </div>
                                                                <!-- <form method="post" autocomplete="off" action="prediction" id="fmfree"> -->

                                                                <div class="row">
                                                                    <div class="col-md-6">

                                                                        <label>Name</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_name_sec');?></span>
                                                                        <input type="text" name="mm_name_sec"
                                                                            placeholder="Name" class="form-control"
                                                                            autocomplete="off" required="">
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label>Gender</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_gender_sec');?></span>
                                                                        <select
                                                                            class="form-control droupdown select2-hidden-accessible myForm123"
                                                                            name="mm_gender_sec" required="">
                                                                            <option>Gender</option>
                                                                            <option value="male">Male</option>
                                                                            <option value="female">Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row">



                                                                    <div class="col-md-6 col-xs-12">



                                                                        <label>Country Code</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_countrycode_sec');?></span>


                                                                        <select name="mm_countrycode_sec"
                                                                            class="form-control droupdown select2-hidden-accessible myForm123"
                                                                            tabindex="8" id="state" required="">



                                                                            <option
                                                                                style="color: #333;font-weight:normal;margin-bottom: 0px; font-size: 16px;"
                                                                                value="">Select</option>



                                                                            <option data-countrycode="DZ" value="213">
                                                                                Algeria (+213)</option>



                                                                            <option data-countrycode="AD" value="376">
                                                                                Andorra (+376)</option>



                                                                            <option data-countrycode="AO" value="244">
                                                                                Angola (+244)</option>



                                                                            <option data-countrycode="AI" value="1264">
                                                                                Anguilla (+1264)</option>



                                                                            <option data-countrycode="AG" value="1268">
                                                                                Antigua &amp; Barbuda (+1268)</option>



                                                                            <option data-countrycode="AR" value="54">
                                                                                Argentina (+54)</option>



                                                                            <option data-countrycode="AM" value="374">
                                                                                Armenia (+374)</option>



                                                                            <option data-countrycode="AW" value="297">
                                                                                Aruba (+297)</option>



                                                                            <option data-countrycode="AU" value="61">
                                                                                Australia (+61)</option>



                                                                            <option data-countrycode="AT" value="43">
                                                                                Austria (+43)</option>



                                                                            <option data-countrycode="AZ" value="994">
                                                                                Azerbaijan (+994)</option>



                                                                            <option data-countrycode="BS" value="1242">
                                                                                Bahamas (+1242)</option>



                                                                            <option data-countrycode="BH" value="973">
                                                                                Bahrain (+973)</option>



                                                                            <option data-countrycode="BD" value="880">
                                                                                Bangladesh (+880)</option>



                                                                            <option data-countrycode="BB" value="1246">
                                                                                Barbados (+1246)</option>



                                                                            <option data-countrycode="BY" value="375">
                                                                                Belarus (+375)</option>



                                                                            <option data-countrycode="BE" value="32">
                                                                                Belgium (+32)</option>



                                                                            <option data-countrycode="BZ" value="501">
                                                                                Belize (+501)</option>



                                                                            <option data-countrycode="BJ" value="229">
                                                                                Benin (+229)</option>





                                                                            <option data-countrycode="BM" value="1441">
                                                                                Bermuda (+1441)</option>



                                                                            <option data-countrycode="BT" value="975">
                                                                                Bhutan (+975)</option>



                                                                            <option data-countrycode="BO" value="591">
                                                                                Bolivia (+591)</option>



                                                                            <option data-countrycode="BA" value="387">
                                                                                Bosnia Herzegovina (+387)</option>



                                                                            <option data-countrycode="BW" value="267">
                                                                                Botswana (+267)</option>



                                                                            <option data-countrycode="BR" value="55">
                                                                                Brazil (+55)</option>



                                                                            <option data-countrycode="BN" value="673">
                                                                                Brunei (+673)</option>



                                                                            <option data-countrycode="BG" value="359">
                                                                                Bulgaria (+359)</option>



                                                                            <option data-countrycode="BF" value="226">
                                                                                Burkina Faso (+226)</option>



                                                                            <option data-countrycode="BI" value="257">
                                                                                Burundi (+257)</option>



                                                                            <option data-countrycode="KH" value="855">
                                                                                Cambodia (+855)</option>



                                                                            <option data-countrycode="CM" value="237">
                                                                                Cameroon (+237)</option>

                                                                            <option data-countrycode="CA" value="1">
                                                                                Canada (+1)</option>

                                                                            <option data-countrycode="CV" value="238">
                                                                                Cape Verde Islands (+238)</option>

                                                                            <option data-countrycode="KY" value="1345">
                                                                                Cayman Islands (+1345)</option>

                                                                            <option data-countrycode="CF" value="236">
                                                                                Central African Republic (+236)</option>

                                                                            <option data-countrycode="CL" value="56">
                                                                                Chile (+56)</option>

                                                                            <option data-countrycode="CN" value="86">
                                                                                China (+86)</option>

                                                                            <option data-countrycode="CO" value="57">
                                                                                Colombia (+57)</option>

                                                                            <option data-countrycode="KM" value="269">
                                                                                Comoros (+269)</option>

                                                                            <option data-countrycode="CG" value="242">
                                                                                Congo (+242)</option>

                                                                            <option data-countrycode="CK" value="682">
                                                                                Cook Islands (+682)</option>

                                                                            <option data-countrycode="CR" value="506">
                                                                                Costa Rica (+506)</option>

                                                                            <option data-countrycode="HR" value="385">
                                                                                Croatia (+385)</option>

                                                                            <option data-countrycode="CU" value="53">
                                                                                Cuba (+53)</option>

                                                                            <option data-countrycode="CY" value="90392">
                                                                                Cyprus North (+90392)</option>

                                                                            <option data-countrycode="CY" value="357">
                                                                                Cyprus South (+357)</option>

                                                                            <option data-countrycode="CZ" value="42">
                                                                                Czech Republic (+42)</option>

                                                                            <option data-countrycode="DK" value="45">
                                                                                Denmark (+45)</option>

                                                                            <option data-countrycode="DJ" value="253">
                                                                                Djibouti (+253)</option>

                                                                            <option data-countrycode="DM" value="1809">
                                                                                Dominica (+1809)</option>

                                                                            <option data-countrycode="DO" value="1809">
                                                                                Dominican Republic (+1809)</option>

                                                                            <option data-countrycode="EC" value="593">
                                                                                Ecuador (+593)</option>

                                                                            <option data-countrycode="EG" value="20">
                                                                                Egypt (+20)</option>

                                                                            <option data-countrycode="SV" value="503">El
                                                                                Salvador (+503)</option>

                                                                            <option data-countrycode="GQ" value="240">
                                                                                Equatorial Guinea (+240)</option>

                                                                            <option data-countrycode="ER" value="291">
                                                                                Eritrea (+291)</option>

                                                                            <option data-countrycode="EE" value="372">
                                                                                Estonia (+372)</option>

                                                                            <option data-countrycode="ET" value="251">
                                                                                Ethiopia (+251)</option>

                                                                            <option data-countrycode="FK" value="500">
                                                                                Falkland Islands (+500)</option>

                                                                            <option data-countrycode="FO" value="298">
                                                                                Faroe Islands (+298)</option>

                                                                            <option data-countrycode="FJ" value="679">
                                                                                Fiji (+679)</option>

                                                                            <option data-countrycode="FI" value="358">
                                                                                Finland (+358)</option>

                                                                            <option data-countrycode="FR" value="33">
                                                                                France (+33)</option>

                                                                            <option data-countrycode="GF" value="594">
                                                                                French Guiana (+594)</option>

                                                                            <option data-countrycode="PF" value="689">
                                                                                French Polynesia (+689)</option>

                                                                            <option data-countrycode="GA" value="241">
                                                                                Gabon (+241)</option>

                                                                            <option data-countrycode="GM" value="220">
                                                                                Gambia (+220)</option>

                                                                            <option data-countrycode="GE" value="7880">
                                                                                Georgia (+7880)</option>

                                                                            <option data-countrycode="DE" value="49">
                                                                                Germany (+49)</option>

                                                                            <option data-countrycode="GH" value="233">
                                                                                Ghana (+233)</option>

                                                                            <option data-countrycode="GI" value="350">
                                                                                Gibraltar (+350)</option>

                                                                            <option data-countrycode="GR" value="30">
                                                                                Greece (+30)</option>

                                                                            <option data-countrycode="GL" value="299">
                                                                                Greenland (+299)</option>

                                                                            <option data-countrycode="GD" value="1473">
                                                                                Grenada (+1473)</option>

                                                                            <option data-countrycode="GP" value="590">
                                                                                Guadeloupe (+590)</option>

                                                                            <option data-countrycode="GU" value="671">
                                                                                Guam (+671)</option>

                                                                            <option data-countrycode="GT" value="502">
                                                                                Guatemala (+502)</option>

                                                                            <option data-countrycode="GN" value="224">
                                                                                Guinea (+224)</option>

                                                                            <option data-countrycode="GW" value="245">
                                                                                Guinea - Bissau (+245)</option>

                                                                            <option data-countrycode="GY" value="592">
                                                                                Guyana (+592)</option>

                                                                            <option data-countrycode="HT" value="509">
                                                                                Haiti (+509)</option>

                                                                            <option data-countrycode="HN" value="504">
                                                                                Honduras (+504)</option>

                                                                            <option data-countrycode="HK" value="852">
                                                                                Hong Kong (+852)</option>

                                                                            <option data-countrycode="HU" value="36">
                                                                                Hungary (+36)</option>

                                                                            <option data-countrycode="IS" value="354">
                                                                                Iceland (+354)</option>

                                                                            <option data-countrycode="IN" value="91">
                                                                                India (+91)</option>

                                                                            <option data-countrycode="ID" value="62">
                                                                                Indonesia (+62)</option>

                                                                            <option data-countrycode="IR" value="98">
                                                                                Iran (+98)</option>

                                                                            <option data-countrycode="IQ" value="964">
                                                                                Iraq (+964)</option>

                                                                            <option data-countrycode="IE" value="353">
                                                                                Ireland (+353)</option>

                                                                            <option data-countrycode="IL" value="972">
                                                                                Israel (+972)</option>

                                                                            <option data-countrycode="IT" value="39">
                                                                                Italy (+39)</option>

                                                                            <option data-countrycode="JM" value="1876">
                                                                                Jamaica (+1876)</option>

                                                                            <option data-countrycode="JP" value="81">
                                                                                Japan (+81)</option>

                                                                            <option data-countrycode="JO" value="962">
                                                                                Jordan (+962)</option>

                                                                            <option data-countrycode="KZ" value="7">
                                                                                Kazakhstan (+7)</option>

                                                                            <option data-countrycode="KE" value="254">
                                                                                Kenya (+254)</option>

                                                                            <option data-countrycode="KI" value="686">
                                                                                Kiribati (+686)</option>

                                                                            <option data-countrycode="KP" value="850">
                                                                                Korea North (+850)</option>

                                                                            <option data-countrycode="KR" value="82">
                                                                                Korea South (+82)</option>

                                                                            <option data-countrycode="KW" value="965">
                                                                                Kuwait (+965)</option>

                                                                            <option data-countrycode="KG" value="996">
                                                                                Kyrgyzstan (+996)</option>

                                                                            <option data-countrycode="LA" value="856">
                                                                                Laos (+856)</option>

                                                                            <option data-countrycode="LV" value="371">
                                                                                Latvia (+371)</option>

                                                                            <option data-countrycode="LB" value="961">
                                                                                Lebanon (+961)</option>

                                                                            <option data-countrycode="LS" value="266">
                                                                                Lesotho (+266)</option>

                                                                            <option data-countrycode="LR" value="231">
                                                                                Liberia (+231)</option>

                                                                            <option data-countrycode="LY" value="218">
                                                                                Libya (+218)</option>

                                                                            <option data-countrycode="LI" value="417">
                                                                                Liechtenstein (+417)</option>

                                                                            <option data-countrycode="LT" value="370">
                                                                                Lithuania (+370)</option>

                                                                            <option data-countrycode="LU" value="352">
                                                                                Luxembourg (+352)</option>

                                                                            <option data-countrycode="MO" value="853">
                                                                                Macao (+853)</option>

                                                                            <option data-countrycode="MK" value="389">
                                                                                Macedonia (+389)</option>

                                                                            <option data-countrycode="MG" value="261">
                                                                                Madagascar (+261)</option>

                                                                            <option data-countrycode="MW" value="265">
                                                                                Malawi (+265)</option>

                                                                            <option data-countrycode="MY" value="60">
                                                                                Malaysia (+60)</option>

                                                                            <option data-countrycode="MV" value="960">
                                                                                Maldives (+960)</option>

                                                                            <option data-countrycode="ML" value="223">
                                                                                Mali (+223)</option>

                                                                            <option data-countrycode="MT" value="356">
                                                                                Malta (+356)</option>

                                                                            <option data-countrycode="MH" value="692">
                                                                                Marshall Islands (+692)</option>

                                                                            <option data-countrycode="MQ" value="596">
                                                                                Martinique (+596)</option>

                                                                            <option data-countrycode="MR" value="222">
                                                                                Mauritania (+222)</option>

                                                                            <option data-countrycode="YT" value="269">
                                                                                Mayotte (+269)</option>

                                                                            <option data-countrycode="MX" value="52">
                                                                                Mexico (+52)</option>

                                                                            <option data-countrycode="FM" value="691">
                                                                                Micronesia (+691)</option>

                                                                            <option data-countrycode="MD" value="373">
                                                                                Moldova (+373)</option>

                                                                            <option data-countrycode="MC" value="377">
                                                                                Monaco (+377)</option>

                                                                            <option data-countrycode="MN" value="976">
                                                                                Mongolia (+976)</option>

                                                                            <option data-countrycode="MS" value="1664">
                                                                                Montserrat (+1664)</option>

                                                                            <option data-countrycode="MA" value="212">
                                                                                Morocco (+212)</option>

                                                                            <option data-countrycode="MZ" value="258">
                                                                                Mozambique (+258)</option>

                                                                            <option data-countrycode="MN" value="95">
                                                                                Myanmar (+95)</option>

                                                                            <option data-countrycode="NA" value="264">
                                                                                Namibia (+264)</option>

                                                                            <option data-countrycode="NR" value="674">
                                                                                Nauru (+674)</option>

                                                                            <option data-countrycode="NP" value="977">
                                                                                Nepal (+977)</option>

                                                                            <option data-countrycode="NL" value="31">
                                                                                Netherlands (+31)</option>

                                                                            <option data-countrycode="NC" value="687">
                                                                                New Caledonia (+687)</option>

                                                                            <option data-countrycode="NZ" value="64">New
                                                                                Zealand (+64)</option>

                                                                            <option data-countrycode="NI" value="505">
                                                                                Nicaragua (+505)</option>

                                                                            <option data-countrycode="NE" value="227">
                                                                                Niger (+227)</option>

                                                                            <option data-countrycode="NG" value="234">
                                                                                Nigeria (+234)</option>

                                                                            <option data-countrycode="NU" value="683">
                                                                                Niue (+683)</option>

                                                                            <option data-countrycode="NF" value="672">
                                                                                Norfolk Islands (+672)</option>

                                                                            <option data-countrycode="NP" value="670">
                                                                                Northern Marianas (+670)</option>

                                                                            <option data-countrycode="NO" value="47">
                                                                                Norway (+47)</option>

                                                                            <option data-countrycode="OM" value="968">
                                                                                Oman (+968)</option>

                                                                            <option data-countrycode="PW" value="680">
                                                                                Palau (+680)</option>

                                                                            <option data-countrycode="PA" value="507">
                                                                                Panama (+507)</option>

                                                                            <option data-countrycode="PG" value="675">
                                                                                Papua New Guinea (+675)</option>

                                                                            <option data-countrycode="PY" value="595">
                                                                                Paraguay (+595)</option>

                                                                            <option data-countrycode="PE" value="51">
                                                                                Peru (+51)</option>

                                                                            <option data-countrycode="PH" value="63">
                                                                                Philippines (+63)</option>

                                                                            <option data-countrycode="PL" value="48">
                                                                                Poland (+48)</option>

                                                                            <option data-countrycode="PT" value="351">
                                                                                Portugal (+351)</option>

                                                                            <option data-countrycode="PR" value="1787">
                                                                                Puerto Rico (+1787)</option>

                                                                            <option data-countrycode="QA" value="974">
                                                                                Qatar (+974)</option>

                                                                            <option data-countrycode="RE" value="262">
                                                                                Reunion (+262)</option>

                                                                            <option data-countrycode="RO" value="40">
                                                                                Romania (+40)</option>

                                                                            <option data-countrycode="RU" value="7">
                                                                                Russia (+7)</option>

                                                                            <option data-countrycode="RW" value="250">
                                                                                Rwanda (+250)</option>

                                                                            <option data-countrycode="SM" value="378">
                                                                                San Marino (+378)</option>

                                                                            <option data-countrycode="ST" value="239">
                                                                                Sao Tome &amp; Principe (+239)</option>

                                                                            <option data-countrycode="SA" value="966">
                                                                                Saudi Arabia (+966)</option>

                                                                            <option data-countrycode="SN" value="221">
                                                                                Senegal (+221)</option>

                                                                            <option data-countrycode="CS" value="381">
                                                                                Serbia (+381)</option>

                                                                            <option data-countrycode="SC" value="248">
                                                                                Seychelles (+248)</option>

                                                                            <option data-countrycode="SL" value="232">
                                                                                Sierra Leone (+232)</option>

                                                                            <option data-countrycode="SG" value="65">
                                                                                Singapore (+65)</option>

                                                                            <option data-countrycode="SK" value="421">
                                                                                Slovak Republic (+421)</option>

                                                                            <option data-countrycode="SI" value="386">
                                                                                Slovenia (+386)</option>

                                                                            <option data-countrycode="SB" value="677">
                                                                                Solomon Islands (+677)</option>

                                                                            <option data-countrycode="SO" value="252">
                                                                                Somalia (+252)</option>

                                                                            <option data-countrycode="ZA" value="27">
                                                                                South Africa (+27)</option>

                                                                            <option data-countrycode="ES" value="34">
                                                                                Spain (+34)</option>

                                                                            <option data-countrycode="LK" value="94">Sri
                                                                                Lanka (+94)</option>

                                                                            <option data-countrycode="SH" value="290">
                                                                                St. Helena (+290)</option>

                                                                            <option data-countrycode="KN" value="1869">
                                                                                St. Kitts (+1869)</option>

                                                                            <option data-countrycode="SC" value="1758">
                                                                                St. Lucia (+1758)</option>

                                                                            <option data-countrycode="SD" value="249">
                                                                                Sudan (+249)</option>

                                                                            <option data-countrycode="SR" value="597">
                                                                                Suriname (+597)</option>

                                                                            <option data-countrycode="SZ" value="268">
                                                                                Swaziland (+268)</option>

                                                                            <option data-countrycode="SE" value="46">
                                                                                Sweden (+46)</option>

                                                                            <option data-countrycode="CH" value="41">
                                                                                Switzerland (+41)</option>

                                                                            <option data-countrycode="SI" value="963">
                                                                                Syria (+963)</option>

                                                                            <option data-countrycode="TW" value="886">
                                                                                Taiwan (+886)</option>

                                                                            <option data-countrycode="TJ" value="7">
                                                                                Tajikstan (+7)</option>

                                                                            <option data-countrycode="TH" value="66">
                                                                                Thailand (+66)</option>

                                                                            <option data-countrycode="TG" value="228">
                                                                                Togo (+228)</option>

                                                                            <option data-countrycode="TO" value="676">
                                                                                Tonga (+676)</option>

                                                                            <option data-countrycode="TT" value="1868">
                                                                                Trinidad &amp; Tobago (+1868)</option>

                                                                            <option data-countrycode="TN" value="216">
                                                                                Tunisia (+216)</option>

                                                                            <option data-countrycode="TR" value="90">
                                                                                Turkey (+90)</option>

                                                                            <option data-countrycode="TM" value="7">
                                                                                Turkmenistan (+7)</option>

                                                                            <option data-countrycode="TM" value="993">
                                                                                Turkmenistan (+993)</option>

                                                                            <option data-countrycode="TC" value="1649">
                                                                                Turks &amp; Caicos Islands (+1649)
                                                                            </option>

                                                                            <option data-countrycode="TV" value="688">
                                                                                Tuvalu (+688)</option>

                                                                            <option data-countrycode="UG" value="256">
                                                                                Uganda (+256)</option>

                                                                            <option data-countrycode="GB" value="44">UK
                                                                                (+44)</option>

                                                                            <option data-countrycode="UA" value="380">
                                                                                Ukraine (+380)</option>

                                                                            <option data-countrycode="AE" value="971">
                                                                                United Arab Emirates (+971)</option>

                                                                            <option data-countrycode="UY" value="598">
                                                                                Uruguay (+598)</option>

                                                                            <option data-countrycode="US" value="1">USA
                                                                                (+1)</option>

                                                                            <option data-countrycode="UZ" value="7">
                                                                                Uzbekistan (+7)</option>

                                                                            <option data-countrycode="VU" value="678">
                                                                                Vanuatu (+678)</option>

                                                                            <option data-countrycode="VA" value="379">
                                                                                Vatican City (+379)</option>

                                                                            <option data-countrycode="VE" value="58">
                                                                                Venezuela (+58)</option>

                                                                            <option data-countrycode="VN" value="84">
                                                                                Vietnam (+84)</option>

                                                                            <option data-countrycode="VG" value="84">
                                                                                Virgin Islands - British (+1284)
                                                                            </option>

                                                                            <option data-countrycode="VI" value="84">
                                                                                Virgin Islands - US (+1340)</option>

                                                                            <option data-countrycode="WF" value="681">
                                                                                Wallis &amp; Futuna (+681)</option>

                                                                            <option data-countrycode="YE" value="969">
                                                                                Yemen (North)(+969)</option>

                                                                            <option data-countrycode="YE" value="967">
                                                                                Yemen (South)(+967)</option>

                                                                            <option data-countrycode="ZM" value="260">
                                                                                Zambia (+260)</option>

                                                                            <option data-countrycode="ZW" value="263">
                                                                                Zimbabwe (+263)</option>

                                                                        </select>

                                                                    </div>

                                                                    <div class="col-md-6 col-xs-12">

                                                                        <label>Mobile</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_mobile_sec');?></span>
                                                                        <input type="text" name="mm_mobile_sec"
                                                                            placeholder="Mobile" class="form-control"
                                                                            autocomplete="off" id="contact_mobilenumber"
                                                                            pattern="[1-9]{1}[0-9]{9}" maxlength="10"
                                                                            required="">

                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-6">

                                                                        <label>Date of Birth</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_dob_sec');?></span>
                                                                        <input value="" type="date" name="mm_dob_sec"
                                                                            class="form-control"
                                                                            placeholder="dd/mm/yyyy" required=""
                                                                            id="dp1609396207557">
                                                                    </div>

                                                                    <div class="col-md-6">

                                                                        <label>Marital Status</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_maritalstatus_sec');?></span>
                                                                        <select
                                                                            class="form-control droupdown select2-hidden-accessible myForm123"
                                                                            name="mm_maritalstatus_sec" tabindex="-1"
                                                                            aria-hidden="true" required="">

                                                                            <option value="">Marital Status</option>

                                                                            <option value="Never Married">Unmarried
                                                                            </option>

                                                                            <option value="Married">Married</option>

                                                                            <option value="Divorced">Divorced</option>

                                                                            <option value="Widow">Widow</option>

                                                                        </select>

                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-sm-6 form-group">

                                                                        <label>Birth Hour </label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_birthhour_sec');?></span>
                                                                        <select
                                                                            class="form-control droupdown select2-hidden-accessible myForm123"
                                                                            name="mm_birthhour_sec" tabindex="-1"
                                                                            aria-hidden="true" required="">

                                                                            <option value="">HH</option>

                                                                            <option value="00">00 (12 midnight)</option>

                                                                            <option value="01">01 (am)</option>

                                                                            <option value="02">02 (am)</option>

                                                                            <option value="03">03 (am)</option>

                                                                            <option value="04">04 (am)</option>

                                                                            <option value="05">05 (am)</option>

                                                                            <option value="06">06 (am)</option>

                                                                            <option value="07">07 (am)</option>

                                                                            <option value="08">08 (am)</option>

                                                                            <option value="09">09 (am)</option>

                                                                            <option value="10">10 (am)</option>

                                                                            <option value="11">11 (am)</option>

                                                                            <option value="12">12 (noon)</option>

                                                                            <option value="13">13 (1 pm)</option>

                                                                            <option value="14">14 (2 pm)</option>

                                                                            <option value="15">15 (3 pm)</option>

                                                                            <option value="16">16 (4 pm)</option>

                                                                            <option value="17">17 (5 pm)</option>

                                                                            <option value="18">18 (6 pm)</option>

                                                                            <option value="19">19 (7 pm)</option>

                                                                            <option value="20">20 (8 pm)</option>

                                                                            <option value="21">21 (9 pm)</option>

                                                                            <option value="22">22 (10 pm)</option>

                                                                            <option value="23">23 (11 pm)</option>

                                                                        </select>

                                                                    </div>

                                                                    <div class="col-sm-6 form-group">

                                                                        <label>Birth Minute</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_birthmin_sec');?></span>
                                                                        <select
                                                                            class="form-control droupdown select2-hidden-accessible myForm123"
                                                                            name="mm_birthmin_sec" tabindex="-1"
                                                                            aria-hidden="true" required="">

                                                                            <option value="">MM</option>

                                                                            <option value="00">00</option>

                                                                            <option value="01">01</option>

                                                                            <option value="02">02</option>

                                                                            <option value="03">03</option>

                                                                            <option value="04">04</option>

                                                                            <option value="05">05</option>

                                                                            <option value="06">06</option>

                                                                            <option value="07">07</option>

                                                                            <option value="08">08</option>

                                                                            <option value="09">09</option>

                                                                            <option value="10">10</option>

                                                                            <option value="11">11</option>

                                                                            <option value="12">12</option>

                                                                            <option value="13">13</option>

                                                                            <option value="14">14</option>

                                                                            <option value="15">15</option>

                                                                            <option value="16">16</option>

                                                                            <option value="17">17</option>

                                                                            <option value="18">18</option>

                                                                            <option value="19">19</option>

                                                                            <option value="20">20</option>

                                                                            <option value="21">21</option>

                                                                            <option value="22">22</option>

                                                                            <option value="23">23</option>

                                                                            <option value="24">24</option>

                                                                            <option value="25">25</option>

                                                                            <option value="26">26</option>

                                                                            <option value="27">27</option>

                                                                            <option value="28">28</option>

                                                                            <option value="29">29</option>

                                                                            <option value="30">30</option>

                                                                            <option value="31">31</option>

                                                                            <option value="32">32</option>

                                                                            <option value="33">33</option>

                                                                            <option value="34">34</option>

                                                                            <option value="35">35</option>

                                                                            <option value="36">36</option>

                                                                            <option value="37">37</option>

                                                                            <option value="38">38</option>

                                                                            <option value="39">39</option>

                                                                            <option value="40">40</option>

                                                                            <option value="41">41</option>

                                                                            <option value="42">42</option>

                                                                            <option value="43">43</option>

                                                                            <option value="44">44</option>

                                                                            <option value="45">45</option>

                                                                            <option value="46">46</option>

                                                                            <option value="47">47</option>

                                                                            <option value="48">48</option>

                                                                            <option value="49">49</option>

                                                                            <option value="50">50</option>

                                                                            <option value="51">51</option>

                                                                            <option value="52">52</option>

                                                                            <option value="53">53</option>

                                                                            <option value="54">54</option>

                                                                            <option value="55">55</option>

                                                                            <option value="56">56</option>

                                                                            <option value="57">57</option>

                                                                            <option value="58">58</option>

                                                                            <option value="59">59</option>

                                                                        </select>

                                                                    </div>

                                                                </div>

                                                                <div class="row">

                                                                    <div class="col-md-6">

                                                                        <label>Email</label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_email_sec');?></span>
                                                                        <input type="email" name="mm_email_sec"
                                                                            class="form-control" placeholder="Email"
                                                                            autocomplete="off">

                                                                    </div>

                                                                    <div class="col-md-6">

                                                                        <label>Please Select Language</label>

                                                                        <select
                                                                            class="form-control droupdown select2-hidden-accessible myForm123"
                                                                            name="mm_language_sec" tabindex="-1"
                                                                            aria-hidden="true" required="">

                                                                            <option value="hindi">Hindi</option>

                                                                            <option value="english">English</option>

                                                                        </select>

                                                                    </div>

                                                                    <div class="col-md-6">

                                                                        <label>Place of Birth </label>
                                                                        <span style="color:red;"
                                                                            class="alert-btn"><?php echo form_error('mm_birthplace_sec');?></span>
                                                                        <input autocomplete="no-place-found"
                                                                            placeholder="Place of Birth" type="text"
                                                                            value="" class="form-control"
                                                                            name="mm_birthplace_sec" id="search"
                                                                            required="">

                                                                        <input value="" class="hiddenclass"
                                                                            data-val="true"
                                                                            data-val-number="The field Sno must be a number."
                                                                            data-val-required="The Sno field is required."
                                                                            id="Sno" name="Sno" type="hidden">

                                                                    </div>

                                                                </div>



                                                                <div class="row">

                                                                    <div class="col-sm-12">

                                                                        <h5 id="horoscopeFormError"
                                                                            class="text-danger display-none"></h5>

                                                                    </div>

                                                                </div>

                                                                <input type="hidden" name="type"
                                                                    value="Free-Prediction">

                                                                <p class="text-center zero-margin">

                                                                    <!-- <button type="submit" name="submit_query" class="get_free"> Get  Prediction </button> -->

                                                                </p>


                                                            </div>

                                                        </div>


                                                    </div>



                                                </div>



                                            </div>

                                            <!--hs form section end-->
                                            <div class="join"><button type="submit" name="submit_query"
                                                    class="get_free"> Get Prediction </button></div>
                                            <!-- button -->
                                            <?php echo form_close(); ?>
                                            <!-- match making end -->
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

    <!-- hs enquiry form start-->

    <div class="clearfix"></div>


    <!-- hs enquiry form end-->
    <!-- hs footer wrapper Start -->

    <!-- *****************************************************Wallet Rechargs model ******************************* -->
    <div class="modal fade" id="walletmodel" role="dialog">
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
                                <img src="<?php echo base_url();?>image/websiteimages/paypal.png" style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-sm-7">

                            <br>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <h3 style="text-align: center;">Add Wallet Amount</h3>
                                    <?php //echo form_open(base_url().'wallet', array('class' => 'login-filed')); ?>
                                    <?php //echo form_open(base_url().'razorpay',array('class' => 'login-filed')); ?>
                                    <form action="#" method="post">
                                        <div class="form-group hs-usr-login-field" style="margin-top: 20px;">
                                            <!-- <label> <i class="fa fa-envelope-o" aria-hidden="true"></i> </label> -->
                                            <input type="text" name="walletamt" placeholder="Enter Amount" id="amtwalls"
                                                class="form-control" required>
                                            <?php $unms = $this->session->userdata('user_first_name'); ?>
                                            <input type="hidden" name="usernames" id="usnams"
                                                value="<?php echo $unms; ?>">
                                        </div>
                                        <div class="hs-submodlBtn">
                                            <input type="submit" name="button" value="Recharge"
                                                class="form-control buy_now"> <br>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--************************************************** Wallet Rechrge model ******************************-->

    <!-- **************************************************MODEL FOR REPORT REQUEST START *******************************-->
    <?php if(!empty($resport)){ foreach($resport as $viewData){ ?>
    <!-- Modal -->
    <div id="myModal<?php echo $viewData['astro_id'];?>" class="modal fade" role="dialog">

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
                                <img src="<?php echo base_url();?>image/websiteimages/report.png"
                                    style="width: 100%; height: 466px;">
                            </div>
                        </div>
                        <div class="col-sm-7">

                            <br>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <h3 style="text-align: center;">Send Your
                                        Query<?php //echo $viewData['astro_askreport_rate'];?><?php //echo $viewData['astro_name'];?>
                                    </h3>

                                    <?php //echo form_open(base_url().'send_report_t_oastrologer', array('class' => 'login-filed')); ?>
                                    <form id='myForm12<?php echo $viewData['astro_id'];?>' method="post"
                                        enctype="multipart/form-data" class="login-filed">

                                        <div class="form-group hs-usr-login-field" style="margin-top: 20px;">
                                            <?php $quuestionfetch=fetchbyresult('reportquestionoption');
                                        //   print_r($questionfetch);
                                          ?>

                                            <select id="cars" name="rp_type" class="dropdown-opt selectedReport"
                                                required>

                                                <option value="default">SELECT REPORT TYPE</option>
                                                <!-- <option value="1"> opt1 </option>
                                                <option value="2"> opt2 </option> -->
                                                <?php foreach($quuestionfetch as $qt){ ?>
                                                <option value="<?php echo $qt['rqo_id'];?>">
                                                    <?php echo $qt['rqo_question'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="subcatshow"></div>
                                        <!-- <div class="form-group row">
                                  	<div class="col-sm-6">
                                  	<input type="checkbox" name="name" style="width: 10px; height: 10px">
                                  		<span>studies related</span>
                                  	</div>

                                  	<div class="col-sm-6">
                                  	<input type="checkbox" name="name" style="width: 10px; height: 10px"> 
                                  		<span>Exam related</span>	
                                  	</div>
                                  	<div class="col-sm-6">
                                  	<input type="checkbox" name="name" style="width: 10px; height: 10px"> 		<span>higher education</span>
                                  	</div>
                                  	<div class="col-sm-6">
                                  	<input type="checkbox" name="name" style="width: 10px; height: 10px"> 
                                  		<span>studies related</span>
                                  	</div>
                                  </div> -->
                                        <div class="form-group hs-usr-login-field " style="margin-top: 20px;">
                                            <!-- hidden -->
                                            <textarea placeholder="Mention Your Specific Problems" name="rp_description"
                                                rows="2" cols="50" value="Description" class="dropdown-opt"
                                                required></textarea>
                                            <!-- <p>Contact Us for Your Report: +91- 00000000 </p> -->
                                            <input type="hidden" name="astroid_reportss" id="astroidreportss"
                                                value="<?php echo $viewData['astro_id'];?>">
                                            <input type="hidden" name="usersss_id"
                                                id="usersids<?php echo $viewData['astro_id'];?>"
                                                value="<?php echo $user_id;?>">
                                            <!-- for disc for single -->
                                            <?php
                                                                      $astroreportrate = $viewData['astro_askreport_rate'];
                                                                      $reportdisc=$viewData['astro_report_rate_discount'];
                                                                        
                                                                      if($reportdisc == 0 )
                                                                      {
                                                                      echo "RS :". $astroreportrate." / min "; 
                                                                      }else
                                                                      {
                                                                        $percentagereport = ($reportdisc / 100) * $astroreportrate;
                                                                        $discpricereport=$astroreportrate-$percentagereport;
                                                                        echo"Rs &nbsp;".  $discpricereport."&nbsp; &nbsp;<del> ".$astroreportrate."</del>&nbsp;&nbsp;" .$reportdisc. " % Disc"  ;
                                                                        $astroreportrate=$discpricereport;
                                                                    ?>

                                            <?php } ?>
                                            <!-- for discount single -->

                                            <input type="hidden" name="reports_rate"
                                                id="reportssrates<?php echo $viewData['astro_id'];?>"
                                                value="<?php echo $astroreportrate;?>">




                                            <!-- <input type="hidden" name="namesss"  id="nammeess<?php echo $viewData['astro_id'];?>" value="<?php echo $viewData['astro_name'];?>" >  -->

                                            <!-- hidden -->
                                            <!-- <input type="text" name="walletamt" placeholder="Enter Amount" class="form-control" required>  -->
                                        </div>
                                        <div class="form-group hs-usr-login-field " style="margin-top: 20px;">
                                            <lable>Upload</lable>
                                            <input type="file" name="userfile" value="upload"
                                                class="form-group hs-usr-login-field" size="60" id="fUpload"
                                                onchange="checkextension()">
                                        </div>
                                        <div class="hs-submodlBtn">
                                            <!-- <input type="submit" name="button" value="Submit" class="form-control"> <br> -->
                                            <input type="button" onclick="abcd(<?php echo $viewData['astro_id'];?>);"
                                                name="insert_btn" class="form-control" value="submit" id="insert_btn">

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
    <!-- report model end -->
    <!-- ********************************MODEL FOR REPORT REQUEST END************************************************************** -->
    <!-- model for comment rating -->
    <!-- **************************************************MODEL FOR COMMENT RATING START *******************************-->
    <?php if(!empty($fetchallreadytalkastrolloger)){ foreach($fetchallreadytalkastrolloger as $viewData){ ?>
    <!-- Modal -->
    <div id="commentratemodel<?php echo $ac_astro =  $viewData['astro_id'];?>" class="modal fade" role="dialog">

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
                                <img src="<?php echo base_url();?>image/websiteimages/senddata.PNG"
                                    style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-sm-7">

                            <br>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <h3 style="text-align: center;">Comment Rate
                                        Astrologer<?php echo $ac_astro; ?><?php //echo $viewData['astro_askreport_rate'];?><?php //echo $viewData['astro_name'];?>
                                    </h3>

                                    <?php echo form_open(base_url().'commentrateastrologer', array('class' => 'login-filed')); ?>
                                    <!-- <form id='myForm12<?php echo $viewData['uch_astro_id'];?>' method="post"  enctype= "multipart/form-data" class="login-filed"> -->
                                    <!-- hidden start-->
                                    <input type="hidden" name="cr_astro_id" value="<?php echo $ac_astro;?>">
                                    <input type="hidden" name="cr_user_id" value="<?php echo $user_id;?>">
                                    <!-- hidden end -->
                                    <div class="form-group hs-usr-login-field" style="margin-top: 20px;">
                                        <lable>Rate Astrologer</lable>
                                        <select id="" name="cr_rating" class="dropdown-opt" required>
                                            <option value="">RATE ASTROLOGER </option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>

                                    <div class="form-group hs-usr-login-field " style="margin-top: 20px;">
                                        <lable>Comment Astrologer</lable>
                                        <textarea name="cr_comment" rows="2" cols="50" value="Description"
                                            class="dropdown-opt" required></textarea>
                                    </div>

                                    <div class="hs-submodlBtn">
                                        <input type="submit" name="button" value="Submit" class="form-control"> <br>
                                        <!-- <input type="button" onclick="abcd(<?php echo $viewData['astro_id'];?>);" name="insert_btn" class="form-control" value="submit" id="insert_btn"> -->

                                    </div>
                                    <?php echo form_close(); ?>
                                    <!-- </form> -->
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
    <?php } } ?>
    <!-- report model end -->
    <!-- ********************************MODEL FOR comment rating END************************************************************** -->

    <!-- model for comment rating -->
    <!--****************************************** MODEL FOR VIEW REQUESTED REPORT START********************************-->
    <!-- *****************************************MODEL START TO VIEW REQUESTED REPORT DTA************************************************* -->

    <?php if(!empty($reqreportview10)){ foreach($reqreportview10 as $viewData){ ?>
    <!-- Modal -->
    <div id="reportreplyfromastroview<?php echo $viewData['rp_id'];?>" class="modal fade" role="dialog">
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
                                <img src="<?php echo base_url();?>image/websiteimages/viewdata.PNG"
                                    style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-sm-7">

                            <br>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <h3 style="text-align: center;">VIEW DATA</h3>

                                    <form id='myForm12' method="post" class="login-filed">

                                        <div class="form-group hs-usr-login-field " style="margin-top: 20px;">
                                            <lable>PROBLEM REQUEST RELATED TO </lable>
                                            <p><?php echo $viewData['rp_type'];?></p>
                                            <lable>PROBLEM SOLUTION</lable>
                                            <p><?php echo $viewData['rp_sendsolution'];?></p>
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
</div>
<?php }} ?>

<!-- ****************************************** MODEL END FOR VIEW REQUESTED REPORT ***************************-->
<!-- *****************************************SCRIPT ********************************************************* -->
<!-- ****************************************SCRIPT ************************************************************* -->
<!-- *****************************SCRIPT FOR dropdown START************************************************* -->

<script type="text/javascript">
//function subreport() { 

$('body').on('change', '.selectedReport', function() {

    var cat_type = $(this).val();

    if (cat_type == 0) {
        $('.subcatshow').hide();
        // alert('Please Select The Report');
        return false;
    } else {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>subreport",
            data: {
                id: cat_type
            },

            success: function(response) {
                $('.subcatshow').html(response);
            }
        });
    }
});
</script>
<!-- *****************************SCRIPT FOR dropdown end************************************************* -->
<!-- *****************************SCRIPT FOR CALL START************************************************* -->
<script>
function callof() {
    alert('Astrologer Is Offline Please Click Online Astrologer.');
    return false;
}

function callwal() {
    alert('Please Recharge Your Wallet.');
    return false;
}

function call(astrooid) {
    if(confirm('Do You have Promo Code'))
    {
        var promocode = prompt("Enter Promo Code");
        var callrate = document.getElementById('hiddencallingrate' + astrooid).value;
        var users_ids = document.getElementById('hiddenuser_id').value;
        var astrol_ids = astrooid;
        var walletbalance = document.getElementById('wallet_balance').value;
        // alert(callrate);
        // alert(astrooid)
        // alert(users_ids);
        // alert(walletbalance);exit;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>Call_Code",
            data: {
                callrate: callrate,
                code: promocode,
                users_ids: users_ids,
                walletbalance: walletbalance,
                astrol_ids: astrol_ids
            },
            dataType:'json',
            success: function(data) {
                if(data.success=='true'){
                    $('#hratecal'+astrol_ids).hide();
                    $('#hcallbtn'+astrol_ids).css('display','none');
                    $('#scallbtn'+astrol_ids).css('display','block');
                    $('#sratecal'+astrol_ids).html(data.msg);
                    $('#sratecalval'+astrol_ids).val(data.msg);
                    return false;
                  }else{
                    $('#callCodeError'+astrol_ids).css('display','block');
                    $('#callCodeError'+astrol_ids).html(data.msg);
                  }
            }
        });
    }
    else
    {
        if (confirm('Please click OK For connecting a Call')) {
            var callrate = document.getElementById('hiddencallingrate' + astrooid).value;
            var users_ids = document.getElementById('hiddenuser_id').value;
            var astrol_ids = astrooid;
            var walletbalance = document.getElementById('wallet_balance').value;
            // alert(callrate);
            // alert(astrooid)
            // alert(users_ids);
            // alert(walletbalance);exit;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>call_data",
                data: {
                    callrate: callrate,
                    users_ids: users_ids,
                    walletbalance: walletbalance,
                    astrol_ids: astrol_ids
                },
            
                success: function(data) {
                    console.log(data);
                    //   $('#result').html(data);
                }
            });
        } else {
            return false;
        }
    }    
    //alert(users_ids);
    //alert(walletbalance);
    return false;
}

function couponCall(astrooid)
{
    if (confirm('Please click OK For connecting a Call')) {
        var callrate = document.getElementById('hiddencallingrate' + astrooid).value;
        var users_ids = document.getElementById('hiddenuser_id').value;
        var astrol_ids = astrooid;
        var walletbalance = document.getElementById('wallet_balance').value;
        // alert(callrate);
        // alert(astrooid)
        // alert(users_ids);
        // alert(walletbalance);exit;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>call_data",
            data: {
                callrate: callrate,
                users_ids: users_ids,
                walletbalance: walletbalance,
                astrol_ids: astrol_ids
            },
        
            success: function(data) {
                console.log(data);
                //   $('#result').html(data);
            }
        });
    }
}
</script>
<!-- *****************************SCRIPT FOR CALL END************************************************* -->

<!-- *****************************SCRIPT FOR REPORT REQUEST START************************************************* -->
<script>
function abcd(a) {
    var cat_type = document.getElementById('cars').value;
    //var cat_type = $(this).val();
    var form = document.getElementById("myForm12" + a);
    var astro_ids = a;
    var users_ids = document.getElementById('usersids' + a).value;
    var walletbalance = document.getElementById('wallet_balance').value;
    var reporttt_ratess = document.getElementById('reportssrates' + a).value;
    // var nmp=  document.getElementById('nammeess'+a).value;
    //alert(reporttt_ratess);
    if (cat_type == 0) {
        $('.subcatshow').hide();
        alert('Please Select The Report');
        return false;
    }
    if (parseFloat(reporttt_ratess) > parseFloat(walletbalance)) {
        alert('Please Recharge You Wallet Insuficent Amount');
        return false;
        $("#myModal".astro_ids).modal('hide');
    } else {
        var r = confirm("Are you sure you want to PAY AMOUNT RS : " + reporttt_ratess);
        if (r == true) {
            //alert('Thank You For Submit Query We will Revirt You in 24 hours.'); 
            alert('Payment Done Successfully.');
            form.action = "<?php echo base_url().'user_controller/walletpaymentforreport';?>";
            form.submit();
        } else {
            $("#myModal" + a).modal('hide');
            return false;
        }
    }
}
</script>
<!-- ************************************SCRIPT FOR REPORT REQUEST END************************************************* -->
<!-- ***********************************DATA TABLE SCRIPT START************************************************** -->
<!-- //$check = fetchby_wheres('wallet',array('user_id'=>$user_id)); -->
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
});
$(document).ready(function() {
    $('#example1').DataTable();
});
$(document).ready(function() {
    $('#example2').DataTable();
});
$(document).ready(function() {
    $('#example3').DataTable();
});
$(document).ready(function() {
    $('#example4').DataTable();
});
$(document).ready(function() {
    $('#example5').DataTable();
});
</script>
<!-- *******************************************DATA TABLE SCRIPT END************************************************************ -->
<script>
function checkextension() {
    var file = document.querySelector("#fUpload");
    if (/\.(jpe?g|png|gif|pdf)$/i.test(file.files[0].name) === false) {
        alert("not an image/pdf!");
    }
}
</script>
<!-- *******************************************Rozar Payment Getway Starts************************************************************ -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
// var SITEURL = "<?php echo base_url() ?>";
// $('body').on('click', '.buy_now', function(e) {
//     var name = document.getElementById('usnams').value;
//     var totalAmount = document.getElementById('amtwalls').value;
//     var product_id = $(this).attr("data-id");
//     var options = {
//         "key":  "rzp_live_meWNXak65wUl3z",//"rzp_test_VMEWGCmKKRxNhz",//
//         "amount": totalAmount * 100, // 2000 paise = INR 20
//         "name": name,
//         "description": "Payment",
//         //"image": "//www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
//         "handler": function(response) {
//             $.ajax({
//                 url: SITEURL + 'Checkout_razorpay/success',
//                 type: 'post',
//                 dataType: 'json',
//                 data: {
//                     totalAmount: totalAmount
//                 },
//                 success: function(msg) {
//                     $('#walletmodel').modal('hide');
//                     window.location.href = SITEURL + 'userdashboard';
//                 },
//             });
//         },
//         "theme": {
//             "color": "#fe8a13"
//         }
//     };
//     var rzp1 = new Razorpay(options);
//     rzp1.open();
//     e.preventDefault();
// });
 
</script>