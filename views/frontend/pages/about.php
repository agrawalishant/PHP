
    <style>
    .hs-matchmaking-banner img {
height:400px !important
}</style>
    <!-- hs Navigation End -->

    <!-- hs About Title Start -->

    <div class="hs_indx_title_main_wrapper">

        <div class="hs_title_img_overlay"></div>

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_left_wrapper">

                        <h1>About Us</h1>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_right_wrapper">

                        <ul>

                            <li><a href="<?php echo base_url('front_page');?>">Home</a> &nbsp;&nbsp;&nbsp;> </li>

                            <li>About Us</li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- hs About Title End -->

    <!-- hs about ind wrapper Start -->

    <div class="hs_about_indx_main_wrapper hs_about_indx_inner_main_wrapper">

        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <div class="hs_about_heading_main_wrapper">
                        <div class="hs_about_heading_wrapper">
                            <h2>About <span> US </span></h2>
                            <h4><span></span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="hs_about_right_cont_wrapper">

                        <h4>About Astroved</h4><br>
                        <span></span>
                        <p><?php  
                        //$fetch_about = fetchbyrow('websiteinformation');
                        $fetch_about= fetchbyrow_where_dbid('contentmanagement','1',"cm_id");
                        echo $fetch_about->description;
                        ?></p>

                    </div>

                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">

                    <div class="hs_about_left_img_wrapper">

                        <!-- <img src="<?php echo base_url();?>image/websiteimages/f1.jpg" alt="about_img"/>
                        <img src="<?php echo base_url();?>image/websiteimages/f2.png" alt="about_img"/> -->

<!-- slider start -->

                <div class="hs_rs_four_slider_wrapper md-bottom">
                    <div class="owl-carousel owl-theme" data-interval="500"> 
                       
                        <div class="item" >

                                <div class="hs-matchmaking-banner" >

                                    <img src="<?php echo base_url();?>image/websiteimages/f1.jpg" alt="online_img" class="img-responsive" />

                                </div>

                            </div>

                            <div class="item " >

                                <div class="hs-matchmaking-banner" >

                                    <img src="<?php echo base_url();?>image/websiteimages/f2.png" alt="online_img" class="img-responsive" />

                                    <span class="offline"></span>

                                </div>
                            </div>
                    </div>
                </div>
           
<!-- slider end -->

                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- hs about ind wrapper End -->

    <!--hs astroved founders start -->
    <!-- <div class="hs_about_indx_main_wrapper hs_about_indx_inner_main_wrapper">

        <div class="container">

            <div class="row">
                <div class="col-xs-12">
                    <div class="hs_about_heading_main_wrapper">
                        <div class="hs_about_heading_wrapper">
                            <h2> Founders </h2>
                            <h4><span></span></h4>
                        </div>
                        <P>We have the World Famous Astrologers on the Best Astrology Website in India, practising both Indian Astrology and Western Astrology for astrology today. They will provide the best free horoscope astrology to you by analysing your birth chart and your astrology sign and will provide you with accurate future predictions online.</P>
                    </div>
                </div>
            </div>
            <div class="divider-01"></div>
            <div class="row">
              
                <div class="col-md-6">
                    <div class="hs-fondCard">
                        <div class="hs-astro-fond-image">
                            <img src="<?php echo base_url();?>assets/frontend/images/content/online3.jpg" alt="team-img">
                            <h5>Rajesh sharma</h5>
                        </div>
                        <div class="hs-astro-fond-content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="hs-fondCard">
                        <div class="hs-astro-fond-image">
                            <img src="<?php echo base_url();?>assets/frontend/images/content/online1.jpg" alt="team-img">
                            <h5>Rajesh sharma</h5>
                        </div>
                        <div class="hs-astro-fond-content">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div> -->
    <!-- hs astroved founders end -->

    <!-- hs astrology team wrapper Start -->

    <div class="hs_astrology_team_main_wrapper">

       <!-- <div class="container">

            <div class="row">

                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="hs_about_heading_main_wrapper">

                        <div class="hs_about_heading_wrapper">

                            <h2>Our <span> Team</span></h2>

                            <h4><span></span></h4>

                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum<br> auctor, nisi elit consequat hello Aenean world.</p>

                        </div>

                    </div>

                </div> 


                <div class="clearfix divider-01"></div>-->
               <!-- our team -->
               <?php 
               $fetch_team =fetchbyresult_where($table="astro_admin_team",'1','team_approved_status');
              
               foreach($fetch_team as $fteam){
               ?>
                <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                    <div class="hs_astro_team_img_main_wrapper">

                        <div class="hs_astro_img_wrapper">

                            <img src="<?php echo base_url();?>image/astroadminteam/<?php echo $fteam['team_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="team-img">

                        </div>

                        <div class="hs_astro_img_cont_wrapper">

                            <h2><a href="#"><?php echo $fteam['team_name'];?></a></h2>

                            

                        </div>

                    </div>

                </div> -->
                <?php } ?>
<!-- our team -->
             

            </div>
            
        </div>

    </div>

    <!-- hs astrology team wrapper End -->

   

    <!-- hs footer wrapper Start -->