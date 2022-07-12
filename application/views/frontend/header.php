<?php error_reporting(0);?>

<!DOCTYPE html>

<html lang="en">

<head>

    <!--Metas-->

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="DV Driving">

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

    <!--TimePicker Start-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/times.css" >
    <script src="<?php echo base_url();?>assets/js/time.js"></script>
    
    <!--TimePicker End-->    
    
    <script src="<?php echo base_url();?>assets/js/modernizr.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- DataTable -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.jqueryui.min.css">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css">

  <link rel="stylesheet" type="text/css" href="https://themes.audemedia.com/html/goodgrowth/css/owl.theme.default.min.css">
    
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!--Pagenation-->-->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> -->
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
                                <?php $in = $this->session->userdata('instructor_session'); if(empty($in)) { ?>
                                <?php echo anchor('Book-Class','Book Class'); ?>
                                <?php } ?>
                            </li>

                            <li>
                                <!-- <a href="covid-19.php" class="">Covid 19</a> -->
                                <?php echo anchor('covid','Covid 19'); ?>
                            </li>

                            <!--<li><a href="#" class="l">For instructors</a></li>-->

                            <!--<li><a href="#" class="">Services</a></li>-->

                            <li class="">
                                <!--<a href="login.php" class="btn btn-blue">Login</a>-->
                            <?php
                            $res = $this->session->userdata('instructor_session');
                            $sres = $this->session->userdata('student_session');
                            if(!empty($res) || !empty($sres)) {
                                if($res){
                             ?>
                             <li><a href="<?php echo base_url('Instructor-Ready');?>" class="">Hi ! <?php echo ucfirst($res['res'][0]['name']); ?></a></li>
                             <?php } 
                             else
                             { ?>
                             <li><a href="<?php echo base_url('Student-Ready');?>" class="">Hi ! <?php echo ucfirst($sres['res'][0]['name']); ?></a></li>
                             <?php }
                             echo anchor('Logout','Logout',['class'=>'l']); 
                             }
                             else
                             {
                                echo anchor('Login','Login',['class'=>'btn btn-blue']);    
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
<script>
    if ($('.form-date').prop('type') != "date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        //document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n');
        document.write('<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"><\/script>\n');
      }
    
</script>

<script>
/////////////////////////////////////////////////////
  $( function() {
    $( "#datepickerstu" ).datepicker({
        startDate: Date("yy-mm-dd")
    });
  });
  
   $( function() {
    $( "#datepickerupdate" ).datepicker({
        startDate: Date("yy-mm-dd")
    });
  });
  
$(function () {
    var $dp1 = $(".datepicker");
    $(document).ready(function () {
       $dp1.datepicker({
        changeYear: true,
        changeMonth: true,
        minDate: new Date(Date.now() + 24 * 60 * 60 * 1000),
        dateFormat: "yy-mm-dd",
        // dateFormat: "mm/dd/yy",
        yearRange: "-100:+20",
        });
    });
}); 
  

$(function () {
    var $dp1 = $(".dates");
$(document).ready(function () {
    
        $dp1.datepicker({
        changeYear: true,
        changeMonth: true,
        minDate: '0',
        dateFormat: "yy-mm-dd",
        // dateFormat: "mm/dd/yy",
        yearRange: "-100:+20",
        });
    });
}); 
    
  
  
$(function () {
    var $dp1 = $("#datepicker");
$(document).ready(function () {
    
        $dp1.datepicker({
        changeYear: true,
        changeMonth: true,
        minDate: '0',
        dateFormat: "yy-mm-dd",
        // dateFormat: "mm/dd/yy",
        yearRange: "-100:+20",
        });
    });
});
  
</script>        