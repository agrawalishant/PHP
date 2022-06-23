   
    <!-- hs Navigation End -->

    <!-- hs About Title Start -->

    <div class="hs_indx_title_main_wrapper">

        <div class="hs_title_img_overlay"></div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">
                    <div class="hs_indx_title_left_wrapper">

                        <h2><?php echo $page_title;?></h2>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_right_wrapper">

                        <ul>

                            <li><a href="index.php">Home</a> &nbsp;&nbsp;&nbsp;> </li>


                            <li><?php echo $page_title;?></li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- hs About Title End -->



    <!-- hs sidebar Start -->



    <div class="hs_kd_sidebar_main_wrapper hs_num_sidebar_main_wrapper">



        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <h3 style="text-align: center;margin-top: 20px;"><?php echo $page_title;?></h3>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-12  col-xs-12">
                <?php $fetchpujaservice=fetchbyresult('onlinepuja');
     foreach($fetchpujaservice as $fpservice){
     ?>
                   
                    <div class="hs_kd_left_sidebar_main_wrapper">

                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="hs_ar_first_sec_wrapper">

                                    <div class="row">

                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                            <div class="hs_ar_first_sec_img_wrapper">
                                            <img src="<?php echo base_url();?>image/onlinepuja/<?php echo $fpservice['op_image'] ; ?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="arlies_img" />

                                                <!-- <img src=" //images/content/shop/pitradosh-img.jpg" alt="arlies_img" /> -->

                                            </div>

                                        </div>

                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                                            <div class="hs_ar_first_sec_img_cont_wrapper">
                                                <h3><?php echo $fpservice['op_title'] ; ?></h3> <br>
                                               <p><?php echo $fpservice['op_description'] ; ?></p>
                                                <!-- <div class="hs-detail-cartBtn hs_btn_hover">
                                                    <a href="<?php echo base_url();?><?php echo $fpservice['op_id'] ; ?>">Book Now</a>
                                                </div> -->

                                            </div>

                                        </div>

                                        <div class="clearfix divider-01"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                   <?php } ?>
       
                </div>

            </div>

        </div>

    </div>

    <!-- hs sidebar End -->


<!-- hs enquiry form start-->





<!-- hs enquiry form end--> 

    <!-- hs footer wrapper Start -->






 