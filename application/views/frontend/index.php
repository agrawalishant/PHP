<?php //include 'header.php'; ?>   

 <script type="text/javascript">

    //   if ($('.form-date').prop('type') != "date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
    //     document.write('<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
    //     document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
    //     document.write('<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
    //   }
    </script>
    <script>
    //   jQuery(function($){ //on document.ready
    //     $('.form-date').datepicker({ dateFormat: 'yy-mm-dd' });
    //   })
    </script>


<style>
/*   input.form-control.bd0 {*/
/*    text-transform: uppercase; */
/*    font-size: 12px;*/
/*    font-weight: 600;*/
/*}*/

</style>
        <!--Begin Hero Section-->



        <section id="home">



            <div class="container-page">



                <!--container-->



                <div class="container">



                    <div class="row n-hight">



                        <div class="col-md-5 col-xs-5 col-sm-5 col-12">



                            <!--text-->



                            <div class="hero-text">

<?php $webinfo=$this->db->where('id',1)->get('websiteinformation')->result_array();

?>

                                <h3><?php echo $webinfo[0]['title_first'] ;?></h3>

                                <div class="sr-line"></div>

                                <h6> <?php echo $webinfo[0]['description_first'] ;?></h6>


                            </div>



                            <!--text-->



                        </div>

                        <div class="col-md-7 col-xs-7 col-sm-7 col-12">



                            <!-- slider image -->



                         



                                <img src="<?php echo base_url();?>assets/images/slider-img-01.png" class="pd-tp-140" alt="">

                            <!-- slider image -->



                        </div>

                    </div>
                            
				<!-- <form class="form-inline n-form" action="<?php //echo base_url('Driving/filter');?>">  -->
                <?php echo form_open('Filter',['class'=>'form-inline n-form']);?>                  
                    <div class="form-group ">
                        <img src="<?php echo base_url();?>assets/images/location-map.png" class="form-width fm-icon" alt="">    
                        <input type="text" placeholder="Postcode" name="postcode" value="<?php echo set_value('postcode');?>" class="form-control bd0">
                    </div>
                    <div class="form-group ">
                        <!--<img src="<?php //echo base_url();?>assets/images/location.png" class="form-width" alt="">       -->
                         <i class="fa fa-car fm-icon" aria-hidden="true"></i>
                        <select name="cars" id="cars" class="form-control bd0" value="<?php echo set_value('cars');?>">
                            <option value="volvo">Vehicle Type</option>
                            <option value="Manual">Manual</option>
                            <option value="Automated">Automated</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <i class="fa fa-calendar-check-o fm-icon" aria-hidden="true"></i>
                        <!--<input type="date" class="form-control bd0" value="<?php// echo set_value('sr_date');?>" name="sr_date" min="<?php //echo date('Y-m-d'); ?>">-->
                        <input type="text" placeholder="Select Date" name="sr_date" id="datepicker" class="disableFuturedate form-control bd0">
                    </div>
                    <?php echo form_submit('submit','Search',['class'=>'btn btn-blue']);?>
                    <!-- <a href="instructor-details.php" class="btn btn-blue">Search</a> -->
                </form>
                
            </div>
          <!--container-->
        </div>
    </section>



        <!-- about block colored-->



       





        <!--About app-->



      



        <!--Features -->



        <section id="features" class="service-icon-sec">



            <div class="">



                <!--container-->

                <div class="container">



                    <div class="row">



                        <div class="row-centered">

                            <div class="col-centered col-lg-12">



                                <!--text-->

                                <p>How it Works</p>

                                <h2 class="title-h2">DV Drive With 3 following steps</h2>



                               <!--  <p class="font-p mg-tp-30 mg-bt-30">

                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae

                                </p> -->

                                <!--text-->

                                

                                <!--  <img src="<?php //echo base_url();?>assets/images/Component 2.png" alt=""> -->

                            </div>



                        </div>



                        

                    </div>

                    <!-- <div class="sr-border-img">

                                    <img src="<?php //echo base_url();?>assets/images/service-border.png">

                        </div>

                        <div class="sr-border-img">

                                    <img src="<?php //echo base_url();?>assets/images/service-border.png" style="margin-left: 380px;">

                                </div> -->

                     <!-- service block-->

                    <div class="row service-section">

                        <div class="col-lg-4 col-md-4">

                            <div class="service-block">

                                <i class="fa fa-map-marker sr-icon" aria-hidden="true"></i>

                            </div>

                            <div class="service-block">

                            

                                <h3><?php echo $webinfo[0]['title_firststep'] ;?></h3>

                                <p><?php echo $webinfo[0]['description_firststep'] ;?>

                                </p>

                            </div>



                        </div>



                        <!-- service block-->



                        <!-- service block-->



                        <div class="col-lg-4 col-md-4">

                            <div class="service-block">

                                <i class="fa fa-briefcase sr-icon" aria-hidden="true"></i>

                            </div>

                            <div class="service-block">

                                

                                <h3><?php echo $webinfo[0]['title_secondstep'] ;?></h3>

                                <p>

                                    <?php echo $webinfo[0]['description__secondstep'] ;?>

                                </p>



                            </div>



                        </div>



                        <!-- service block-->



                        <!-- service block-->

                        <div class="col-lg-4 col-md-4">

                            <div class="service-block">

                              <i class="fa fa-calendar-check-o sr-icon" aria-hidden="true"></i>

                            </div>

                            <div class="service-block">



                                <h3><?php echo $webinfo[0]['title_thirdstep'] ;?></h3>

                                <p>

                                    <?php echo $webinfo[0]['description_thirdstep'] ;?>

                                </p>



                            </div>



                        </div>

                    </div>

                </div>



                <!--container-->



            </div>

        </section>



        <!--Features -->



        <!--Features app-->



        <section id="features-app" class="padd-80">



            <!--container-->



            <div class="container">

                <div class="row">





                    <div class="col-md-6 col-sm-12">



                      <img src="<?php echo base_url();?>assets/images/side-img.png" alt="">



                    </div>





                    <div class="col-md-6 col-sm-12">

                         <div class="service-heading">

                            <p>Our Experienced Instructors</p>

                            <h3>Feel the best experience with our Instructors</h3>

                        </div>


                        <div class="sr-line" ></div>



                        <!-- tabs-->



                        <ul class="setps-content">



                            <li data-slide="1" class="setps-content-inner step1 active">

                                <div class="step-content-number ">

                                    <i class="fa fa-tags" aria-hidden="true"></i>

                                </div>

                                <div class="step-content-text">

                                    <h3><?php echo $webinfo[0]['title_exp1'] ;?></h3>

                                    <p><?php echo $webinfo[0]['description_exp1'] ;?></p>
                                </div>



                            </li>



                            <li data-slide="2" class="setps-content-inner step2">

                                <div class="step-content-number">

                                   <i class="fa fa-shopping-bag" aria-hidden="true"></i>

                                </div>

                                <div class="step-content-text">

                                   <h3><?php echo $webinfo[0]['title_exp2'] ;?></h3>

                                    <p><?php echo $webinfo[0]['description_exp2'] ;?></p>

                                </div>



                            </li>



                            <li data-slide="3" class="setps-content-inner step3">

                                <div class="step-content-number">

                                   <i class="fa fa-cogs" aria-hidden="true"></i>

                                </div>

                                <div class="step-content-text">

                                    <h3><?php echo $webinfo[0]['title_exp3'] ;?></h3>

                                    <p><?php echo $webinfo[0]['description_exp3'] ;?></p>

                                </div>



                            </li>



                        </ul>



                        <!-- tabs-->



                    </div>



                    <!-- content tab-->



                    <!-- content tab-->



                </div>



            </div>

            <!--container-->



        </section>



        <!--Features app -->


        <!-- pricing table -->

	<section id="pricing">
        <div class="container-pagee">
                <!--container-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                           <!-- text -->
                        <div class="text-center">
                            <p>Car type and Drivers</p>
                            <h2 class="title-h2">Explore our top instructors Performance</h2>
                            <div class="testi-tab">
                                <ul class="nav nav-tabs">
                                    <li>
                                       <a class="active" data-toggle="tab" href="#auto-tab">AUTO</a>
                                    </li>
                                    <li class="tb-2">
                                       <a data-toggle="tab" href="#mannual-tab">MANUAL</a>
                                    </li>
                                </ul>
                            </div>
                        <div class="tab-content">
                            <div id="auto-tab" class="tab-pane fade in show active">
                                <section class="testimonials">
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <div id="clinet-testi" class="clinet-testi owl-carousel">
                                        <!--TESTIMONIAL 1 -->
                                            <?php foreach($automatic as $auto) { ?>
                                            <div class="item">
                                                <div class="shadow-effect table-plan">
                                                    <?php if(!empty($auto['profile_photo'])) { ?>
                                                    <img src="<?php echo base_url('uploads/'.$auto['profile_photo']); ?>" />
                                                    <?php }else{ ?>
                                                    <img src="<?php echo base_url(); ?>uploads/download.png" />
                                                    <?php } ?>
                                                <!--<div class="price">-->
                                               <!--  <button>Honda Civic</button> -->
                                            <!--</div>-->
                                            <h3><?php echo $auto['name']; ?></h3>
                                            <!--<p><span>£ 35</span><sub> /per hr</sub></p>-->
                                            <!--<p class="test-border">Auto Car Instructor ! <span>4.8 rating </span> ! Highly Recommended</p>-->
                                            <!--<div class="price-content-btn ">                                        -->
                                                <!--<a href="book-instructor.php" class="btn btn-green ">Book A Class</a>-->
                                                <?php //echo anchor('Student/open_classes/'.encoding($auto['id']).'/'.encoding($auto['category']),'Book A Class',['class'=>'btn btn-green']); ?>
                                            <!--</div>-->
                                        </div>
                                    </div>
                                            <?php } ?>
                                    <!--END OF TESTIMONIAL 1 -->       
                                </section>
                            </div>

                            <div id="mannual-tab" class="tab-pane fade">
                                <section class="testimonials">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div id="clinet-testi" class="clinet-testi owl-carousel">
                                        <!--TESTIMONIAL 1 -->
                                                <?php foreach($manual as $man) { ?>
                                                    <div class="item">
                                                        <div class="shadow-effect table-plan">
                                                            <?php if(!empty($man['profile_photo'])) { ?>
                                                            <img src="<?php echo base_url('uploads/'.$man['profile_photo']); ?>" />
                                                            <?php }else{ ?>
                                                            <img src="<?php echo base_url(); ?>uploads/download.png" />
                                                            <?php } ?>
                                                            <!--<div class="price">-->
                                                                <!-- <button>Honda Civic</button> -->
                                                            <!--</div>-->
                                                            <h3><?php echo $man['name']; ?></h3>
                                                            <!--<p><span>£ 35</span><sub> /per hr</sub></p>-->
                                                            <!--<p class="test-border">Automatic Car Instructor ! <span>4.8 rating </span> ! Highly Recommended</p>-->
                                                            <!--<div class="price-content-btn ">-->
                                                                <!--<a href="book-instructor.php" class="btn btn-green ">Book A Class</a>-->
                                                                <?php //echo anchor('Student/open_classes/'.$man['id'],'Book A Class',['class'=>'btn btn-green']); ?>
                                                            <!--</div>-->
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <!--END OF TESTIMONIAL 1 -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>

    <!-- END OF TESTIMONIALS -->

    

           



        <!-- testimonials end-->

                </div>

                            

                            



                            <!-- text -->



                            <!-- table -->



                            <!-- table -->



                        </div>



                    </div>

                </div>

                <!--container-->



            </div>



        </section>



        



        <!-- pricing table -->



        <!-- testimonials start -->

           

    <!-- END OF TESTIMONIALS -->

    

           



        <!-- testimonials end-->

        <!--contact-->



    </div>



    <!-- Footer-->



   <?php //include 'footer.php'; ?>



    <!--Footer -->

    <!-- jQuery -->

    <!-- <script src="<?php //echo base_url();?>assets/js/jquery-3.3.1.min.js"></script> -->

    

</body>

</html>