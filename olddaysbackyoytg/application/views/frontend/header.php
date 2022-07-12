<!DOCTYPE html>

<html lang="en">

<head>

    <!--Metas-->

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Crosp Landing page Template">

    <title>DV DRIVING</title>



    <!--External Stylesheets css-->



    <!-- Bootstrap -->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">



    <!--Animate -->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">



    <!--Slick -->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/slick.css">
    

    <!-- Magnific Popup-->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/magnific-popup.css">



    <!--Template Stylesheets css-->



    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css">



    <!-- Favicon -->

    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" type="image/x-icon">

    <link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png" type="image/x-icon">



    <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">







    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css">

  <link rel="stylesheet" type="text/css" href="https://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css">



    

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <!-- Bootstrap Plugins -->

    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/jquery.easing.js"></script>

    <script src="<?php echo base_url();?>assets/js/wow.min.js"></script>

   

    <script src="<?php echo base_url();?>assets/js/jquery.scrollUp.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/slick.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/mo.min.js"></script>

    <!-- Main js -->

 <!--    <script src="<?php //echo base_url();?>assets/js/main.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js"></script>

   <script>

      $(document).ready(function() {

            //  TESTIMONIALS CAROUSEL HOOK

            $('.clinet-testi').owlCarousel({

                loop: true,

                center: true,

                items: 3,

                margin: 0,

                autoplay: true,

                dots:true,

                autoplayTimeout: 8500,

                smartSpeed: 450,

                responsive: {

                  0: {

                    items: 1

                  },

                  768: {

                    items: 2

                  },

                  1170: {

                    items: 3

                  }

                }

            });

          });



    </script> 

<script>

   

function myfunction() {

  var x = document.getElementById("nav");

  if (x.style.display === "block") {

    x.style.display = "none";

  } else {

    x.style.display = "block";

  }

}





</script>





    <!--[if lt IE 9]>

  <script src="<?php echo base_url();?>assets/js/html5shiv.min.js"></script>

  <script src="<?php echo base_url();?>assets/js/respond.min.js"></script>

<![endif]-->

</head>



<body data-spy="scroll" data-target=".navbar-default" data-offset="100">



    <!-- Page Preloader -->



    <!-- <div id="loading-page">

        <div id="loading-center-page">

            <div id="loading-center-absolute">



                <div class="loader"></div>

            </div>

        </div>



    </div> -->

    <!-- Page Preloader -->



    <!-- Page Content -->



    <div class="warpper clearfix">



        <!--sidebar menu-->



        <!-- Header -->



        <header class="navbar-header clearfix">



            <nav class="navbar navbar-expand-lg fixed-top">



                <!--container-->

                <div class="container">



                    <!-- Logo -->

                    <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.png" class="n-logo" alt=""></a>

                    <!-- Logo -->



                    <!-- Get started -->

                    <div class="bar" onclick="myfunction()"><i class="fa fa-bars" aria-hidden="true"></i></div>

                    <div class="ml-auto right-nav" id="nav">

                        <ul>



                            <li>
                                <!-- <a href="book-instructor.php" class="">Book Class</a> -->
                                <?php echo anchor('','Book Class'); ?>
                            </li>

                            <li>
                                <!-- <a href="covid-19.php" class="">Covid 19</a> -->
                                <?php echo anchor('Driving/covid','Covid 19'); ?>
                            </li>

                            <!--<li><a href="#" class="l">For instructors</a></li>-->

                            <!--<li><a href="#" class="">Services</a></li>-->

                            <li class="side-btn">
                                <!--<a href="login.php" class="btn btn-blue">Login</a>-->
                            <?php
                            $res = $this->session->userdata('instructor_session');
                            $sres = $this->session->userdata('student_session');
                            if(!empty($res) || !empty($sres)) {
                                if($res){
                             ?>
                             <li><a href="#" class="">Hi ! <?php echo ucfirst($res['res'][0]['name']); ?></a></li>
                             <?php } 
                             else
                             { ?>
                             <li><a href="#" class="">Hi ! <?php echo ucfirst($sres['res'][0]['name']); ?></a></li>
                             <?php }
                             echo anchor('Driving/logout','Logout',['class'=>'l']); 
                             }
                             else
                             {
                                echo anchor('Driving/login','Login',['class'=>'btn btn-blue']);    
                             } ?>
                                 
                            </li>
                        

                        </ul>



                    </div>

                    <!-- Get started -->



                </div>



                <!--container-->

            </nav>



        </header>

        <!--Header-->