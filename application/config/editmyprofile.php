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
 <!--    <script src="<?php echo base_url();?>assets/js/main.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js"></script>
    <script>
      $(document).ready(function() {
            //  TESTIMONIALS CAROUSEL HOOK
            $('#clinet-testi').owlCarousel({
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
</head>

<body data-spy="scroll" data-target=".navbar-default" data-offset="100">
    <!-- Page Preloader -->
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
                    <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>assets/images/logo.png" class="n-logo" alt=""></a>
                    <!-- Logo -->
                    <!-- Get started -->
                    <div class="bar" onclick="myfunction()"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    <div class="ml-auto right-nav" id="nav">
                        <ul>
                            
                            <li><?php echo anchor('Driving/book_class','Book Class'); ?></li>
                            <li><?php echo anchor('Driving/covid','Covid 19'); ?></li>
                            <li><a href="#" class="inst-user"><i class="fa fa-user" aria-hidden="true"></i></a></li>    
                            <li><a href="covid-19.php" class="">Hi ! <?php echo ucfirst($res[0]['name']); ?></a></li>
                            
                            <!-- <li><a href="#" class="l">Logout</a></li> -->
                            <?php echo anchor('Driving/logout','Logout',['class'=>'l']); ?>

                        </ul>
                    </div>
                    <!-- Get started -->
                </div>
                <!--container-->
            </nav>
        </header>
        <!--Header-->
<section id="features-app" class="padd-80 head-section" style="background-color:#fff;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 clas-sm-12">
            </div>
        </div>
        <div class="row tb-m20">
            <div class="col-lg-3 col-sm-12">
                <div class="profile-heading">
                    <div class="userImg">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <a href="#">Edit</a>
                    </div>
                    <div class="userName">
                        <h4><?php echo ucfirst($res[0]['name']); ?></h4>
                    </div>
                </div>
                <div class="Profiletab">
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Dashboard</button>
                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">MyProfile</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Booking</button>
                    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Time Slot</button>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12">
                <div id="London" class="tabcontent">
                    <h3>Instructor Profile</h3>

                    <!-- <form class="form-content"> -->

                    <form>

                        <div class="form-group">
                            <div class="row">
                               <div class="col-md-6 col-sm-12">
                                    <label>Email</label>
                                    <input type="text" name="email" value="<?php echo $res[0]['email']; ?>" class="form-control" >
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <label>Contact Number</label>
                                    <input type="text" name="email" value="<?php echo $res[0]['mobile']; ?>" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>License Number</label>
                                    <input type="text" name="email" value="<?php echo $res[0]['licence_no']; ?>" class="form-control" >
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>License Photo-</label>
                                    <!-- <input type="file" name="email"> -->
                                    <img style="height:90px;width: 200px;" src="<?php echo base_url('uploads/'.$res[0]['licence_photo']);?>" alt="Image">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Date Of Birth</label>
                                    <input type="text" name="dob" value="<?php echo $res[0]['dob']; ?>" class="form-control" >
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Gender</label>
                                    <!-- <input type="file" name="email"> -->
                                    <input type="text" name="gender" value="<?php echo $res[0]['gender']; ?>" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address"  value="" ><?php echo $res[0]['address']; ?></textarea>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Pincode</label>
                                    <input type="text" name="email" value="<?php echo $res[0]['post_code']; ?>" class="form-control" >
                                </div>
                            </div>
                        </div>
                    
					<div class="md-30">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">                              
                                   <?php echo anchor('button','Edit Details',['class'=>'btn btn-primary']); ?> 
                                </div>
                                
                            </div>
                        </div>
    				</div>                      
                    </form>
                </div>

                <div id="Paris" class="tabcontent">
                    <h3>Student Profile</h3>
                    <form class="form-content">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                  <label>Name</label>
                                  <input type="text" name="email" class="form-control">
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label>Phone</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label>Address</label>
                                    <input type="textarea" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="Tokyo" class="tabcontent">
                    <h3>Timing</h3>
                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>
                </div>

          		<div class="in-pr-list md-30">
                    <h3>Our Price List</h3>
                    <div class="table-responsive">
                       <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Days</th>
                                    <th>Automatice</th>
                                    <th>Manual</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Monday</td>
                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>
                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <td>Tuesday</td>
                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>
                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <td>Wednesday</td>
                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>
                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <td>Thursday</td>
                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>
                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <td>Friday</td>
                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>
                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>
                                </tr>

                                <tr>

                                    <td>Saturday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Sunday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                            </tbody>

                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div> 

   <!-- The Modal -->

  <div class="modal" id="myModal">

    <div class="modal-dialog">

      <div class="modal-content">

      

        <!-- Modal Header -->

        <!--

        <div class="modal-header">

          

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

		-->

      	<div class="modal-cont">

          <div class="columns">

            <ul class="price">

              <li class="header" style="background-color:#fe6439">Automatice <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>

             	<form>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Monday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Tuesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Wednesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Thursday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Friday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Saturday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Sunday">

                  </li>

            	</form>

            </ul>

            

          </div>

          <div class="columns">

            <ul class="price">

              <li class="header" style="background-color:#fe6439">Manual <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>

              <form>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Monday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Tuesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Wednesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Thursday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Friday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Saturday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Sunday">

                  </li>

            	</form>

            </ul>

          </div>

        </div>

       <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>

      </div>

      </div>

    </div>

  </div>

</section>







<script>



function openCity(evt, cityName) {



  var i, tabcontent, tablinks;



  tabcontent = document.getElementsByClassName("tabcontent");



  for (i = 0; i < tabcontent.length; i++) {



    tabcontent[i].style.display = "none";



  }



  tablinks = document.getElementsByClassName("tablinks");



  for (i = 0; i < tablinks.length; i++) {



    tablinks[i].className = tablinks[i].className.replace(" active", "");



  }



  document.getElementById(cityName).style.display = "block";



  evt.currentTarget.className += " active";



}







// Get the element with id="defaultOpen" and click on it



document.getElementById("defaultOpen").click();



</script><!DOCTYPE html>



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



 <!--    <script src="<?php echo base_url();?>assets/js/main.js"></script> -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js"></script>



    <script>



      $(document).ready(function() {



            //  TESTIMONIALS CAROUSEL HOOK



            $('#clinet-testi').owlCarousel({



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
                    <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>assets/images/logo.png" class="n-logo" alt=""></a>
                    <!-- Logo -->
                    <!-- Get started -->
                    <div class="bar" onclick="myfunction()"><i class="fa fa-bars" aria-hidden="true"></i></div>
                    <div class="ml-auto right-nav" id="nav">
                        <ul>
                            
                            <li><?php echo anchor('Driving/book_class','Book Class'); ?></li>
                            <li><?php echo anchor('Driving/covid','Covid 19'); ?></li>
                            <li><a href="#" class="inst-user"><i class="fa fa-user" aria-hidden="true"></i></a></li>    
                            <li><a href="covid-19.php" class="">Hi ! <?php echo ucfirst($res[0]['name']); ?></a></li>
                            
                            <!-- <li><a href="#" class="l">Logout</a></li> -->
                            <?php echo anchor('Driving/logout','Logout',['class'=>'l']); ?>

                        </ul>
                    </div>
                    <!-- Get started -->
                </div>
                <!--container-->
            </nav>
        </header>
        <!--Header-->
<section id="features-app" class="padd-80 head-section" style="background-color:#fff;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 clas-sm-12">
            </div>
        </div>
        <div class="row tb-m20">
            <div class="col-lg-3 col-sm-12">
                <div class="profile-heading">



                    <div class="userImg">



                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>



                        <a href="#">Edit</a>



                    </div>



                    <div class="userName">



                        <h4><?php echo ucfirst($res[0]['name']); ?></h4>



                    </div>



                </div>



                <div class="Profiletab">



                    <button class="tablinks" onclick="openCity(event, 'Paris')">Dashboard</button>



                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">MyProfile</button>



                    <button class="tablinks" onclick="openCity(event, 'Paris')">Booking</button>



                    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Time Slot</button>



                </div>



            </div>



            <div class="col-lg-9 col-sm-12">



                <div id="London" class="tabcontent">



                    <h3>Instructor Profile</h3>



                    <!-- <form class="form-content"> -->

                    <form>

                        <div class="form-group">
                            <div class="row">
                               <div class="col-md-6 col-sm-12">
                                    <label>Email</label>
                                    <input type="text" name="email" value="<?php echo $res[0]['email']; ?>" class="form-control" disabled>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <label>Contact Number</label>
                                    <input type="text" name="email" value="<?php echo $res[0]['mobile']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>License Number</label>
                                    <input type="text" name="email" value="<?php echo $res[0]['licence_no']; ?>" class="form-control" disabled>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>License Photo-</label>
                                    <!-- <input type="file" name="email"> -->
                                    <img style="height:90px;width: 200px;" src="<?php echo base_url('uploads/'.$res[0]['licence_photo']);?>" alt="Image">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Date Of Birth</label>
                                    <input type="text" name="dob" value="<?php echo $res[0]['dob']; ?>" class="form-control" disabled>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Gender</label>
                                    <!-- <input type="file" name="email"> -->
                                    <input type="text" name="gender" value="<?php echo $res[0]['gender']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address"  value="" disabled><?php echo $res[0]['address']; ?></textarea>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Pincode</label>
                                    <input type="text" name="email" value="<?php echo $res[0]['post_code']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    
                    <div class="md-30">
                       <!--  <h3>Additional Details</h3> -->
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <label>Charges <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></label>
                                     <!-- <button type="button" class="" data-toggle="modal" data-target="#myModal">Add Charges</button> -->
                                    <?php echo anchor('button','Add Charges',['class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#myModal']); ?> 
                                    <?php echo anchor('button','Edit Details',['class'=>'btn btn-primary']); ?> 
                                </div>
                                
                            </div>
                        </div>
                    </div>
                        
                            <input type="hidden" name="id" value="<?php echo $res[0]['gender'];?>" >
                           
                        
                    </form>
                </div>

                <div id="Paris" class="tabcontent">
                    <h3>Student Profile</h3>
                    <form class="form-content">
                        <div class="form-group">
                            <div class="row">



                                <div class="col-md-4 col-sm-12">



                                     <label>Name</label>



                                    <input type="text" name="email" class="form-control">



                                </div>



                                <div class="col-md-4 col-sm-12">



                                    <label>Phone</label>



                                    <input type="text" name="email" class="form-control">



                                </div>



                                <div class="col-md-4 col-sm-12">



                                    <label>Address</label>



                                    <input type="textarea" name="email" class="form-control">



                                </div>



                            </div>



                        </div>



                    </form>



                </div>







                <div id="Tokyo" class="tabcontent">



                    <h3>Timing</h3>



                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>



                </div>

                <div class="in-pr-list md-30">

                    <h3>Our Price List</h3>

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th>Days</th>

                                    <th>Automatice</th>

                                    <th>Manual</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td>Monday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Tuesday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Wednesday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Thursday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Friday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Saturday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Sunday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>



            </div>



        </div>



    </div> 



   <!-- The Modal -->

  <div class="modal" id="myModal">

    <div class="modal-dialog">

      <div class="modal-content">

      

        <!-- Modal Header -->

        <!--

        <div class="modal-header">

          

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

        -->

        <div class="modal-cont">

          <div class="columns">

            <ul class="price">

              <li class="header" style="background-color:#fe6439">Automatice <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>

                <form>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Monday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Tuesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Wednesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Thursday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Friday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Saturday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Sunday">

                  </li>

                </form>

            </ul>

            

          </div>

          <div class="columns">

            <ul class="price">

              <li class="header" style="background-color:#fe6439">Manual <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>

              <form>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Monday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Tuesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Wednesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Thursday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Friday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Saturday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Sunday">

                  </li>

                </form>

            </ul>

          </div>

        </div>

       <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>

      </div>

      </div>

    </div>

  </div>

</section>







<script>



function openCity(evt, cityName) {



  var i, tabcontent, tablinks;



  tabcontent = document.getElementsByClassName("tabcontent");



  for (i = 0; i < tabcontent.length; i++) {



    tabcontent[i].style.display = "none";



  }



  tablinks = document.getElementsByClassName("tablinks");



  for (i = 0; i < tablinks.length; i++) {



    tablinks[i].className = tablinks[i].className.replace(" active", "");



  }



  document.getElementById(cityName).style.display = "block";



  evt.currentTarget.className += " active";



}







// Get the element with id="defaultOpen" and click on it



document.getElementById("defaultOpen").click();



</script>