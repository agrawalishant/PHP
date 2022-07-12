<!doctype html>
<html lang="en">
   
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title> DV Driving Admin Dashboard </title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="<?php echo site_url('assets/images/favicon.png'); ?>" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="<?php echo site_url('assets/admin/css/bootstrap.min.css'); ?>">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="<?php echo site_url('assets/admin/css/typography.css'); ?>">
      <!-- Style CSS -->
      <link rel="stylesheet" href="<?php echo site_url('assets/admin/css/style.css'); ?>">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="<?php echo site_url('assets/admin/css/responsive.css'); ?>">
   </head>

   <body>
      <!-- loader Start -->
      <div id="loading">
         
      </div>

      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container p-0">
                <div class="row no-gutters">
                    <div class="col-sm-12 align-self-center">
                        <div class="sign-in-from bg-white">

                            <h1 class="mb-0"> Log in</h1>
                            <p>Enter your email address and password to access admin panel.</p>
                               <!-- <form method="post" action="<?php //echo site_url('login_admin'); ?>"> -->
                        <?php echo form_open('AdminManager/index'); ?>        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control mb-0" id="email" name="email" placeholder="Enter email">
                                    <span class="text-danger"><?php echo form_error('email'); ?> </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <!--<a href="#" class="float-right">Forgot password?</a>-->
                                    <input type="password" class="form-control mb-0" type="password" id="password" name="password" placeholder="Password">
                                    <span class="text-danger"><?php echo form_error('password'); ?> </span>
                                </div>
                                <div class="d-inline-block w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right"> Log in</button>
                                </div>
                               <?php /*<div class="sign-info">
                                    <span class="dark-color d-inline-block line-height-2">Don't have an account? <a href="#">Sign up</a></span>
                                    <ul class="iq-social-media">
                                        <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                        <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                        <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                    </ul>
                                </div> */ ?> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="<?php echo site_url('assets/admin/js/jquery.min.js'); ?>"></script>
      <script src="<?php echo site_url('assets/admin/js/popper.min.js'); ?>"></script>
      <script src="<?php echo site_url('assets/admin/js/bootstrap.min.js'); ?>"></script>
      <!-- Appear JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/jquery.appear.js'); ?>"></script>
      <!-- Countdown JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/countdown.min.js'); ?>"></script>
      <!-- Counterup JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/waypoints.min.js'); ?>"></script>
      <script src="<?php echo site_url('assets/admin/js/jquery.counterup.min.js'); ?>"></script>
      <!-- Wow JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/wow.min.js'); ?>"></script>
      <!-- Apexcharts JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/apexcharts.js'); ?>"></script>
      <!-- Slick JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/slick.min.js'); ?>"></script>
      <!-- Select2 JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/select2.min.js'); ?>"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/owl.carousel.min.js'); ?>"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/jquery.magnific-popup.min.js'); ?>"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/smooth-scrollbar.js'); ?>"></script>
      <!-- Chart Custom JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/chart-custom.js'); ?>"></script>
      <!-- Custom JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/custom.js'); ?>"></script>
   </body>

</html>