<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8" />
    <title><?php if(!empty($page_title)) {echo $page_title;}else{echo "Astroved Vakta";}?></title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>image/websiteimages/favicon-16x16.png" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="AstrovedVakta" />
    <meta name="keywords" content="AstrovedVakta" />
    <meta name="author" content="AstrovedVakta" />
    <meta name="MobileOptimized" content="320" />
    <!-- font awsome script -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- Toster  Css -->
    <link href="<?php echo base_url();?>/assets/tostmsg/toastr.min.css" rel="stylesheet" />
    <!--srart theme style -->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url();?>assets/frontend/<?php echo base_url();?>assets/frontend/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/chat1.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/flaticon.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/sign_flaticon.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/owl.theme.default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/magnific-popup.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/style2.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/css/responsive2.css" />
    <!-- datepicker css start -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!-- datepicker css end -->
    <!-- favicon links -->
    <link rel="shortcut icon" type="image/png" href="images/header/favicon.ico" />
    <!----<script src='../../../google_analytics_auto.js'></script>--->
    <!-- font links -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <!----Animation------>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Code by Amit Starts -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KBGE8LD1NJ"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-KBGE8LD1NJ');
    </script>
    <!-- Global site tag (gtag.js) - Google Ads: 411001558 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-411001558"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'AW-411001558');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '140475397951113');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=140475397951113&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Code by Amit Ends -->
</head>

<body>
    <div class="hs_top_header_main_Wrapper">
        <div class="container">
            <div class="hs_header_logo_left hidden-xs">
                <div class="hs_logo_wrapper">
                    <a href="<?php echo base_url('front_page');?>">
                        <img src="<?php echo base_url();?>assets/frontend/images/header/aestro-logo-04.png"
                            class="img-responsive" alt="logo" title="Logo">
                    </a>
                </div>
            </div>
            <div class="hs_header_logo_right">
                <div class="hs_btn_wrapper">
                    <ul style="display:flex;">
                  
                  
                  
                        <?php if(empty($this->session->userdata('astro_id')) && empty($this->session->userdata('user_id')  ) ) {?>

                        <li><button type="button" data-toggle="modal" data-target="#myModal"
                                class="hs_btn_hover">Appointments</button></li>
                        <?php } 
elseif (!empty($this->session->userdata('astro_id')))
{?>
                        <li><a href="<?php echo base_url();?>astrologerdashboard" class="hs_btn_hover"
                                style="padding:20px 25px; display : inline-block; border-radius:30px;">Astro Dashboard</a></li>
                        <?php } 
elseif (!empty($this->session->userdata('user_id')))
 { ?>
                        <li><a href="<?php echo base_url();?>userdashboard" class="hs_btn_hover"
                                style="padding:20px 25px; display : inline-block; border-radius:30px;">User Dashboard</a></li>
                        <li style="margin-left: 15px;padding-top: 20px;"><a href="<?php echo base_url();?>cart" class="fa fa-shopping-cart"><span style="color:white;">Add To Cart</span></a></i>         
                        <?php } 
?>
                    </ul>

                </div>
                <!------<div class="hs_header_add_wrapper hidden-xs hidden-sm">
                    <div class="hs_header_add_icon">
                        <i class="fa fa-home" style="color:#fff;"></i>
                    </div>
                    <div class="hs_header_add_icon_cont">
                        <h5>Address</h5>
                        <p>Indore</p>
                    </div>
                </div>----->
                <?php 
                    date_default_timezone_set('Asia/Kolkata');
                    $date = date('h:i:s a', time());
                    $id = array();
                    $caltim = array();
                    $res = fetchbyresult('astrologers');
                    if(!empty($res))
                    {
                        foreach($res as $rowk)
                        {
                             if($rowk['astro_call_watting_time'] != '')
                             {
                                 $idpi[] = $rowk['astro_id'];
                                 $caltim[] = $rowk['astro_call_watting_time'];
                             }    
                        }
                        if(!empty($idpi))
                        {
                            for($i=0;$i<=count($idpi);$i++)
                            {
                                $is = @$idpi[$i];
                                $time = @$caltim[$i];
                                $rs = fetchbyresultByCondiction('astrologers',array('astro_id'=>$is,'astro_call_watting_time'=>$time));
                                if(!empty($rs))
                                {
                                    //echo "<br>table timt= ";print_r($rs[0]['astro_call_time']);
                                    $sav = $rs[0]['astro_call_time'];
                                    $expire_stamp = date("h:i:s a",strtotime($sav." +".$time." minutes"));
                                    //$expire_stamp = date("h:i:s a",strtotime($sav." +5 minutes"));  //example
                                    //echo $date;
                                    //echo "<br>last= ".$expire_stamp;
                                     if($date > $expire_stamp)
                                     {
                                        $updateData = [
                                                        'astro_call_watting_time'=>" ",
                                                        'astro_online_call_status'=>1,
                                                        'astro_call_time'=>' '    
                                                    ];
                                        updateData('astrologers',$updateData,array('astro_id'=>$is));
                                     }
                                }
                            }
                        }
                    }
                    // codeing For Chat
                    $resut = fetchbyresult('astrologers');
                    if(!empty($resut))
                    {
                        foreach($res as $rowk)
                        {
                             if($rowk['astro_chat_watting_time'] != '')
                             {
                                 $idpicht[] = $rowk['astro_id'];
                                 $chttim[] = $rowk['astro_chat_watting_time'];
                             }    
                        }
                        //print_r($idpicht);
                        if(!empty($idpicht))
                        {
                            for($i=0;$i<=count($idpicht);$i++)
                            {
                                $ischt = @$idpicht[$i];
                                $timecht = @$chttim[$i];
                                
                                $rsct = fetchbyresultByCondiction('astrologers',array('astro_id'=>$ischt,'astro_chat_watting_time'=>$timecht));
                                
                                if(!empty($rsct))
                                {
                                    $sav = $rsct[0]['astro_chat_time'];
                                    $expire_stamp = date("h:i:s a",strtotime($sav." +".$timecht." minutes"));
                                     if($date > $expire_stamp)
                                     {
                                        $updateData = [
                                                        'astro_chat_watting_time'=>" ",
                                                        'astro_online_chat_status'=>1,
                                                        'astro_chat_time'=>' '    
                                                    ];
                                        updateData('astrologers',$updateData,array('astro_id'=>$ischt));
                                     }
                                }
                            }
                        }
                    }
                ?>
                <div class="hs_header_add_wrapper hidden-xs hidden-sm">
                    <div class="hs_header_add_icon">
                        <i class="fa fa-phone" style="color:#fff;"></i>
                    </div>
                    <div class="hs_header_add_icon_cont">
                        <h5>Talk to Astrologers</h5>
                        <p>+91-9772811811</p>
                    </div>
                </div>
                
                
                <div class="hs_header_add_wrapper hidden-xs hidden-sm">
                    
                    <img src="https://www.astrovedvakta.com/assets/frontend/images/header/f2.png" style="width: 190px;">
                </div>
                
                
                
                
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog hs_astro_user_lgoin">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <!-- <h4 class="modal-title">LogIn</h4> -->
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-5 hs-user-bnimg">
                                        <div>
                                            <img src="<?php echo base_url();?>image/websiteimages/user-login-image.png"
                                                style="width: 100%; height: 506px;">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="hs-userlogin-menu">
                                            <ul class="nav nav-pills">
                                                <li class="active"><a data-toggle="pill" href="#home">Login</a></li>
                                                <li><a data-toggle="pill" href="#menu1">Sign up</a></li>
                                            </ul>
                                        </div>
                                        <br>
                                        <div class="tab-content">
                                            <div id="home" class="tab-pane fade in active">
                                                <h3 style="text-align: center;">User Login</h3>
                                                <?php echo form_open(base_url().'user_login_submit', array('class' => 'login-filed')); ?>
                                                <div class="form-group hs-usr-login-field">
                                                    <label> <i class="fa fa-envelope-o" aria-hidden="true"></i> </label>
                                                    <input type="email" name="user_email" placeholder="Email id"
                                                        class="form-control" required>
                                                    <?php $us = $this->uri->segment(2); ?>
                                                    <input type="hidden" name="uri" value="<?php echo $us; ?>" />
                                                </div>
                                                <div class="form-group hs-usr-login-field">
                                                    <label> <i class="fa fa-lock" aria-hidden="true"></i> </label>
                                                    <input type="password" name="user_password" placeholder="Password"
                                                        class="form-control" required>
                                                </div>
                                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->
                                                <a href="#" class="hs-astro-fgtBtn" data-toggle="modal"
                                                    data-target="#forgetpasswordmodel">forgot password ?</a>
                                                <div class="hs-submodlBtn">
                                                    <input type="submit" name="button" value="Login"
                                                        class="form-control"> <br>
                                                </div>
                                                <div class="hs-submodlBtn" style="margin-bottom: 0; height: 42px;">
                                                    <!-- <input type="submit" name="button" value="Google Login" class="form-control" style="border-radius: 30px; height: 40px; background-color: #dd4b39; color: #fff; font-weight: 700; font-size: 20px;"> <br> -->
                                                    <!-- Display sign in button -->
                                                    <a style=" color: #fc595a; font-size: 20px;"
                                                        href="<?php echo $cusgoo=customgoogle(); //if(!empty($login_button)) echo $login_button; ?>"
                                                        <i class="fa fa-google" aria-hidden="true"></i> <span
                                                            style="color: #405ead;"> Sign In With Google </span>
                                                    </a>
                                                </div>
                                                <div>
                                                    <p style="text-align: center;">
                                                    </p>
                                                </div>
                                                <div class="hs-submodlBtn">
                                                    <!--<input type="submit" name="button" value="facebook Login" class="form-control" style="border-radius: 30px; height: 40px; background-color: #4867aa; color: #fff; font-weight: 700; font-size: 20px;"> <br>-->
                                                    <a href="<?php echo base_url().'Facebook_controller'; //if(!empty($login_button)) echo $login_button; ?>">
                                                        <img src="<?php echo base_url('image/websiteimages/facebook.PNG'); ?>"
                                                            style="width:100%">
                                                    </a>
                                                </div>

                                                <h6>By signing up, you agree to our <a
                                                        href="<?php echo base_url();?>termandcondition" target="_blank"
                                                        class="astro-anchr-clr"> Terms of Use </a> and <a
                                                        href="<?php echo base_url();?>privacypolicy" target="_blank"
                                                        class="astro-anchr-clr"> Privacy Policy.</a></h6>
                                                <?php echo form_close(); ?>
                                            </div>
                                            <div id="menu1" class="tab-pane fade">
                                                <h3 style="text-align: center;">Signup to Astroved</h3>
                                                <?php echo form_open(base_url().'user_register_submit', array('class' => 'login-filed')); ?>
                                                <!-- <form name="registration" action="#" method="post"> -->
                                                <div class="form-group hs-usr-login-field">
                                                    <label> <i class="fa fa-user" aria-hidden="true"></i> </label>
                                                    <input type="text" id="user_first_name" name="user_first_name"
                                                        placeholder="First Name" class="form-control" required>
                                                </div>
                                                <div class="form-group hs-usr-login-field">
                                                    <label> <i class="fa fa-user" aria-hidden="true"></i> </label>
                                                    <input type="text" id="user_last_name" name="user_last_name"
                                                        placeholder="Last Name" class="form-control" required>
                                                </div>
                                                <div class="form-group hs-usr-login-field">
                                                    <label> <i class="fa fa-phone" aria-hidden="true"></i> </label>
                                                    <input type="text" id="user_mobile" name="user_mobile"
                                                        placeholder="Mobile" class="form-control"
                                                        pattern="[1-9]{1}[0-9]{9}" maxlength="10" required>
                                                </div>
                                                <div class="form-group hs-usr-login-field">
                                                    <label> <i class="fa fa-envelope-o" aria-hidden="true"></i> </label>
                                                    <input type="email" id="user_email" name="user_email"
                                                        placeholder="Email id" class="form-control" required>
                                                </div>
                                                <div class="form-group hs-usr-login-field">
                                                    <label> <i class="fa fa-lock" aria-hidden="true"></i> </label>
                                                    <input type="password" id="user_password" name="user_password"
                                                        placeholder="Password" class="form-control" required>
                                                </div>
                                                <div class="hs-submodlBtn">
                                                    <input type="submit" name="submit" value="Signup"
                                                        class="form-control">
                                                </div>
                                                <?php echo form_close(); ?>
                                                <h6 style="padding-bottom: 8px; margin-top: 31px;">By signing up, you
                                                    agree to our <a href="<?php echo base_url();?>termandcondition"
                                                        target="_blank" class="astro-anchr-clr"> Terms of Use </a> and
                                                    <a href="<?php echo base_url();?>privacypolicy" target="_blank"
                                                        class="astro-anchr-clr"> Privacy Policy.</a>
                                                </h6>

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
            </div>

        </div>

    </div>




    <!-- hs top header End -->


    <!-- hs Navigation Start -->

    <div class="hs_navigation_header_wrapper">

        <div class="container">

            <div id="search_open" class="gc_search_box">

                <input type="text" placeholder="Search here">

                <button><i class="fa fa-search" aria-hidden="true"></i></button>

            </div>

            <div class="row">



                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                    <nav class="hs_main_menu hidden-xs">

                        <ul>
                            <li>
                                <!--<?php if($page_name=='index') {echo 'active';}?>-->
                                <a class="menu-button2 " href="<?php echo base_url('front_page'); ?>">Home</a>

                            </li>
                            <li>
                                <!--<?php if($page_name=='about') {echo 'active';}?>-->
                                <a class="menu-button2 " href="<?php echo base_url('about'); ?>">About Us</a>
                            </li>
                            <li>
                                <!--<?php if($page_name=='service_landing') {echo 'active';}?><?php if($page_name=='service') {echo 'active';}?>-->
                                <div class="dropdown-wrapper menu-button">
                                    <a class="menu-button" href="<?php echo base_url('services');?>">Services</a>
                                    <div class="drop-menu hs_mega_menu">
                                        <!-- service fetch -->
                                        <?Php 
                                        $fetch_service=fetchbyresultlimitorder('services','4','services_id','asc');
                                        foreach($fetch_service as $fservice){
                                        ?>
                                        <!-- <a class="menu-button" href="<?php echo base_url(); ?>services_landing/<?php echo encoding($fservice['services_id']); ?>"><?php echo $fservice['title']; ?></a> -->
                                        <a class="menu-button" href="<?php echo base_url(); ?>services_landing/<?php echo $fservice['url_title']; ?>"><?php echo $fservice['title']; ?></a>
                                      
                                        <?php } ?>
                                        <!-- service fetch -->
                                        <!--
                                             
                                            <a class="menu-button" href="#">Family & Children</a>

                                        <a class="menu-button" href="#">Custom Report</a>

                                        <a class="menu-button" href="#">Business</a> -->

                                        <a class="menu-button" href="<?php echo base_url('services');?>">View All</a>

                                    </div>

                                </div>
                            </li>
                            <li>
                                <!--<?php if($page_name == 'product') {echo 'active';}?>-->
                                <a class="menu-button2 " href="<?php echo base_url('product/all');?>">Products</a>
                            </li>

                            <li>

                                <div class="dropdown-wrapper menu-button">

                                    <a class="menu-button" href="javascript:void(0)">Horoscope</a>

                                    <div class="drop-menu hs_mega_menu">


                                        <!-- horoscope yearly fetch english_name-->
                                        <?Php 
                                            $fetch_horoscope=fetchbyresultlimitorder('horoscopeyearly','13','horoscope_id','asc');
                                            foreach($fetch_horoscope as $fhoros){
                                        ?>
                                        <a class="menu-button"
                                            href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo $fhoros['english_name']; ?>"><?php echo $fhoros['english_name']; ?></a>
                                        <?php } ?>
                                        <!-- horoscope yearlye fetch -->

                                        <!--<a class="menu-button" href="aries.php">Aries</a> 
                                            <a class="menu-button" href="#">Taurus</a>

                                        <a class="menu-button" href="#">Gemini</a>

                                        <a class="menu-button" href="#">Cancer</a>

                                        <a class="menu-button" href="#">Leo</a>

                                        <a class="menu-button" href="#">Virgo</a>

                                        <a class="menu-button" href="#">Libra</a>

                                        <a class="menu-button" href="#">Scorpio</a>

                                        <a class="menu-button" href="#">Sagittarius</a>

                                        <a class="menu-button" href="#">Capricon</a>

                                        <a class="menu-button" href="#">Aquarius</a>

                                        <a class="menu-button" href="#">Pisces</a> -->

                                    </div>

                                </div>

                            </li>

                            <!-- <li>

                                <a class="menu-button2" href="<?php echo base_url('prediction');?>">Prediction</a>

                            </li> -->

                            <li>
                                <!--<?php if($page_name=='match_making') {echo 'active';}?>-->
                                <a class="menu-button2" href="<?php echo base_url('match_making');?>">Match Making</a>

                            </li>
                            <?php if(empty($astro_id=$this->session->userdata('astro_id'))){ ?>
                            <li>
                                <!--<?php if($page_name=='our_astrologers') {echo 'active';}?>-->
                                <a class="menu-button2 " href="<?php echo base_url('astrotalk/all');?>">Talk to
                                    Astrologer</a>

                            </li>
                            <?php } ?>
                            <!--<?php if($page_name=='blog_all') {echo 'active';}?>-->
                            <li>

                                <a class="menu-button2" href="<?php echo base_url('blog'); ?>">Blog</a>

                            </li>

                            <li>
                                <!--<?php if($page_name=='contact') {echo 'active';}?>-->
                                <a class="menu-button2" href="<?php echo base_url('contact'); ?>">Contact </a>

                            </li>

                        </ul>

                    </nav>


                    <header class="mobail_menu visible-xs">

                        <div class="container-fluid">

                            <div class="row">

                                <div class="col-xs-8 col-sm-6">

                                    <div class="hs_logo">
                                        <a href="<?php echo base_url('index'); ?>"><img
                                                src="<?php echo base_url();?>assets/frontend/images/header/aestro-logo-04.png"
                                                class="img-responsive" alt="Logo" title="Logo"></a>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-6">

                                    <div class="cd-dropdown-wrapper">

                                        <a class="house_toggle" href="#0">

                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="511.63px" height="511.631px" viewBox="0 0 511.63 511.631"
                                                style="enable-background:new 0 0 511.63 511.631;" xml:space="preserve">

                                                <g>

                                                    <g>

                                                        <path
                                                            d="M493.356,274.088H18.274c-4.952,0-9.233,1.811-12.851,5.428C1.809,283.129,0,287.417,0,292.362v36.545


																	c0,4.948,1.809,9.236,5.424,12.847c3.621,3.617,7.904,5.432,12.851,5.432h475.082c4.944,0,9.232-1.814,12.85-5.432


																	c3.614-3.61,5.425-7.898,5.425-12.847v-36.545c0-4.945-1.811-9.233-5.425-12.847C502.588,275.895,498.3,274.088,493.356,274.088z" />

                                                        <path
                                                            d="M493.356,383.721H18.274c-4.952,0-9.233,1.81-12.851,5.427C1.809,392.762,0,397.046,0,401.994v36.546


																	c0,4.948,1.809,9.232,5.424,12.854c3.621,3.61,7.904,5.421,12.851,5.421h475.082c4.944,0,9.232-1.811,12.85-5.421


																	c3.614-3.621,5.425-7.905,5.425-12.854v-36.546c0-4.948-1.811-9.232-5.425-12.847C502.588,385.53,498.3,383.721,493.356,383.721z" />

                                                        <path
                                                            d="M506.206,60.241c-3.617-3.612-7.905-5.424-12.85-5.424H18.274c-4.952,0-9.233,1.812-12.851,5.424

																	C1.809,63.858,0,68.143,0,73.091v36.547c0,4.948,1.809,9.229,5.424,12.847c3.621,3.616,7.904,5.424,12.851,5.424h475.082


																	c4.944,0,9.232-1.809,12.85-5.424c3.614-3.617,5.425-7.898,5.425-12.847V73.091C511.63,68.143,509.82,63.861,506.206,60.241z" />

                                                        <path d="M493.356,164.456H18.274c-4.952,0-9.233,1.807-12.851,5.424C1.809,173.495,0,177.778,0,182.727v36.547


																	c0,4.947,1.809,9.233,5.424,12.845c3.621,3.617,7.904,5.429,12.851,5.429h475.082c4.944,0,9.232-1.812,12.85-5.429

																	c3.614-3.612,5.425-7.898,5.425-12.845v-36.547c0-4.952-1.811-9.231-5.425-12.847C502.588,166.263,498.3,164.456,493.356,164.456z
																	" />

                                                    </g>

                                                </g>
                                                <g>
                                                </g>


                                                <g>

                                                </g>
                                                <g>

                                                </g>

                                                <g>

                                                </g>

                                                <g>

                                                </g>
                                                <g>
                                                </g>
                                                <g>
                                                </g>
                                                <g>

                                                </g>

                                                <g>

                                                </g>
                                                <g>
                                                </g>

                                                <g>
                                                </g>
                                                <g>

                                                </g>


                                                <g>

                                                </g>

                                                <g>

                                                </g>

                                                <g>

                                                </g>

                                            </svg>

                                        </a>

                                        <nav class="cd-dropdown">

                                            <h2><a href="index.php">Astroved Vakta</a></h2>

                                            <a href="#0" class="cd-close">Close</a>

                                            <ul class="cd-dropdown-content">

                                                <li>
                                                    <form class="cd-search">
                                                        <input type="search" placeholder="Search...">
                                                    </form>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('front_page'); ?>">Home</a>


                                                </li>
                                                <!-- .has-children -->

                                                <li>
                                                    <a href="<?php echo base_url('about'); ?>">About US</a>
                                                </li>
                                                <!-- .has-children -->

                                                <li class="has-children">

                                                    <a href="<?php echo base_url('services');?>">Services</a>

                                                    <ul class="cd-secondary-dropdown is-hidden">

                                                        <li class="go-back"><a href="#0">Menu</a></li>
                                                        <!-- service fetch -->
                                                        <?Php 
$fetch_service=fetchbyresultlimitorder('services','4','services_id','asc');
foreach($fetch_service as $fservice){
?>


                                                        <!-- service fetch -->
                                                        <li>
                                                            <a
                                                                href="<?php echo base_url(); ?>services_landing/<?php echo $fservice['url_title']; ?>"><?php echo $fservice['title']; ?></a>
                                                        </li>
                                                        <?php } ?>

                                                        <li>
                                                            <a href="<?php echo base_url('services');?>">View All</a>
                                                        </li>
                                                    </ul>

                                                    <!-- .cd-secondary-dropdown -->

                                                </li>

                                                <li>
                                                    <a href="<?php echo base_url('product/all');?>">Products</a>
                                                </li>

                                                <li class="has-children">

                                                    <a href="#">Horoscope</a>

                                                    <ul class="cd-secondary-dropdown is-hidden">

                                                        <li class="go-back"><a href="#0">Menu</a></li>
                                                        <!-- horoscope yearly fetch -->
                                                        <?Php 
$fetch_horoscope=fetchbyresultlimitorder('horoscopeyearly','13','horoscope_id','asc');
foreach($fetch_horoscope as $fhoros){
?>

                                                        <li>
                                                            <a
                                                                href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo $fhoros['english_name']; ?>"><?php echo $fhoros['english_name']; ?></a>
                                                        </li>

                                                        <?php } ?>
                                                        <!-- horoscope yearlye fetch -->




                                                        <!-- .has-children -->
                                                    </ul>

                                                    <!-- .cd-secondary-dropdown -->
                                                </li>
                                                <!-- .has-children -->

                                                <li>
                                                    <a href="<?php echo base_url('prediction');?>">Prediction</a>
                                                </li>

                                                <li>
                                                    <a href="<?php echo base_url('match_making');?>">Match Making</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('astrotalk/all');?>">Talk to
                                                        Astrologer</a>
                                                </li>


                                                <!-- .has-children -->

                                                <li>
                                                    <a href="<?php echo base_url('blog'); ?>">Blog</a>

                                                </li>
                                                <!-- .has-children -->

                                                <li>

                                                    <a href="<?php echo base_url('contact'); ?>">Contact</a>

                                                </li>
                                            </ul>







                                            <!-- .cd-dropdown-content -->































                                        </nav>







                                        <!-- .cd-dropdown -->















                                    </div>







                                </div>







                            </div>







                        </div>







                        <!-- .cd-dropdown-wrapper -->







                    </header>







                </div>
            </div>

        </div>
    </div>

    <!-- <?php // echo  validation_errors() ;?> -->


    <!-- forget password model -->
    <div class="modal fade" id="forgetpasswordmodel222" role="dialog">
        <div class="modal-dialog hs_astro_user_lgoin" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>
    <!-- forget password model -->

    <div class="modal fade" id="forgetpasswordmodel" role="dialog">
        <div class="modal-dialog hs_astro_user_lgoin">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- <h4 class="modal-title">LogIn</h4> -->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5 hs-user-bnimg">
                            <div>
                                <img src="<?php echo base_url();?>image/websiteimages/user-login-image.png"
                                    style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-sm-7">

                            <br>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <h3 style="text-align: center;">Forget Password</h3>
                                    <?php echo form_open(base_url().'user_forgetpassword', array('class' => 'login-filed')); ?>
                                    <div class="form-group hs-usr-login-field">
                                        <!-- <label> <i class="fa fa-envelope-o" aria-hidden="true"></i> </label> -->
                                        <!-- <input type="text" name="user_email" placeholder="Email id" class="form-control" required> -->
                                        <input type="text" name="emailphoneno" placeholder="Email id / Phone"
                                            class="form-control" required>
                                        <?php $us = $this->uri->segment(2); ?>
                                        <input type="hidden" name="uri" value="<?php echo $us; ?>" />
                                    </div>
                                    <!-- <div class="form-group hs-usr-login-field">
                                        <label> <i class="fa fa-lock" aria-hidden="true"></i> </label>
                                        <input type="password" name="user_password" placeholder="Password" class="form-control" required>
                                    </div> -->
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->
                                    <!-- <a href="#" class="hs-astro-fgtBtn" data-toggle="modal" data-target="#forgetpasswordmodel">forgot password ?</a> -->
                                    <div class="hs-submodlBtn">
                                        <input type="submit" name="button" value="submit" class="form-control"> <br>
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
    <!-- forget password model -->

    <!-- for form contact mobile no -->
    <script type="text/javascript">
    $("#user_mobile").on("input", function() {
        var nonNumReg = /[^0-9]/g
        $(this).val($(this).val().replace(nonNumReg, ''));
    });
    </script>


    <script>
    // $(document).ready(function() {
    // $('#user_mobile').keyup(function() {
    //         var user_mobile = document.getElementById("user_mobile").value;
    //         if (user_mobile.length == 10) {
    //             alert(user_mobile);
    //         } else {

    //             //    // alert(user_mobile);
    //             // var data={'user_mobile':user_mobile};
    //             // $.post('<?php echo site_url('ajax_mobile_register') ?>',data,function(success){
    //             // if(success==1)
    //             //  {
    //             //    alert("Details Send Successfully");
    //             //  }
    //         });
    // }
    // });
    // });
    </script>
    <script>
    $(document).ready(function() {
            $('#user_mobile').keyup(function() {
                    var user_mobile = document.getElementById("user_mobile").value;
                    if (user_mobile.length == 10)
                    
                     {
                       // alert(user_mobile);
                        $.ajax({
                            url: "<?php echo base_url();?>ajax_mobile_register",
                            method: "post",
                            data: {
                                'user_mobile': user_mobile
                            },
                            dataType: "json",
                            success: function(response) 
                            {
                                console.log(response);
                            }
                                });
                    } 
                    //else consition

            });
    });
    </script>