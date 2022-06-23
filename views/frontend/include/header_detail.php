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
                    <a href="<?php //echo base_url('front_page');?>">
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
                        <li style="margin-left: 15px;padding-top: 20px;"><a href="<?php echo base_url();?>destroy"><span style="color:white;">LOGOUT</span></a></i>         
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
                                                            style="max-width:350px">
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