

    <!-- hs Navigation End -->

    <!-- hs About Title Start -->

    <div class="hs_indx_title_main_wrapper">

        <div class="hs_title_img_overlay"></div>

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_left_wrapper">

                        <h1 style="font-size: 20px;color: #ffffff;text-transform: uppercase;"><?php echo $page_title;?></h1>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_right_wrapper">

                        <ul>

                            <li><a href="<?php echo base_url('front_page'); ?>">Home</a> &nbsp;&nbsp;&nbsp;> </li>

                            <li><?php echo $page_title;?></li>

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

                <div class="col-xs-12">

                    <div class="hs_blog_left_sidebar_main_wrapper">

                        <div class="row">
                        <?php $fetchblogs=blog_author_fetch_join() ;
                        $i=0;
foreach($fetchblogs as $fblog){
    $i++;

?>
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                                <div class="hs_blog_box1_main_wrapper ast-blogmd-01">

                                    <div class="hs_blog_box1_img_wrapper">

                                        <img src="<?php echo base_url();?>image/blog/<?php echo $fblog['bimage'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="blog_img">

                                        <div class="hs_blog_Indx_date_wrapper">

                                            <ul>
<!-- test -->
<?php 
                                $originalDate = $fblog['btimestamp'];
                               
                                ?>
           
<!-- test -->
                                                <li><?php echo $Date = date("d", strtotime($originalDate));?></li>

                                                <li><?php echo $yrmonth = date("M", strtotime($originalDate));?></li>

                                            </ul>

                                        </div>
                                        <div class="hs-blog-astrologer-profile-img">
                                            <img src="<?php echo base_url();?>image/profileadmin/<?php echo $fblog['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" class="img-responsive">
                                        </div>

                                    </div>

                                    <div class="hs_blog_box1_cont_main_wrapper">

                                        <div class="hs_blog_cont_heading_wrapper">
                                        <!-- echo $a = word_limiter(strip_tags($aboutusmatter->description), 5); -->
                                            <h2><?php echo  substr($fblog['title'],0,100);//$addf = word_limiter(strip_tags($fblog['title']), 5);?></h2>

                                            <h4><span></span></h4>

                                            <p><?php echo substr($fblog['short_description'],0,160);?></p>

                                            <!-- <h5><a href="<?php echo base_url();?>blogs/<?php echo encoding($fblog['blog_id']);?>">Read More <i class="fa fa-long-arrow-right"></i></a></h5> -->
                                            <h5><a href="<?php echo base_url();?>blogs/<?php echo $fblog['blogseo_url'];?>">Read More <i class="fa fa-long-arrow-right"></i></a></h5>
                                        </div>

                                    </div>

                                    <div class="hs_blog_box1_bottom_cont_main_wrapper">

                                        <div class="hs_blog_box1_bottom_cont_left">

                                            <ul>
                                                <li><a href="#">1244 Likes</a></li>

                                                <li><a href="#"><?php echo $comm = countwhere('blogcomment', array('comment_blog_id' => $fblog['blog_id'],'comment_status' => '1'));?> Comments</a></li>

                                                <li><a href="#"> Share :</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php if($i%3==0) { ?>
                            <div class="clearfix"></div> <?php } } 
                            ?>  
                            <!-- <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                                <div class="hs_blog_box1_main_wrapper ast-blogmd-01">

                                    <div class="hs_blog_box1_img_wrapper">

                                        <img src="<?php echo base_url();?>assets/frontend/images/content/blog/bc1.jpg" alt="blog_img">

                                        <div class="hs_blog_Indx_date_wrapper">

                                            <ul>

                                                <li>29</li>

                                                <li>Oct</li>

                                            </ul>

                                        </div>
                                        <div class="hs-blog-astrologer-profile-img">
                                            <img src="<?php echo base_url();?>assets/frontend/images/content/online1.jpg" class="img-responsive">
                                        </div>

                                    </div>

                                    <div class="hs_blog_box1_cont_main_wrapper">

                                        <div class="hs_blog_cont_heading_wrapper">

                                            <h2>Rahu Enters Cancer and Ketu Enters Capricorn.</h2>

                                            <h4><span></span></h4>

                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit sequat ipsum, nec sagittis sem nibh id elit. </p>

                                            <h5><a href="blog_detail.php">Read More <i class="fa fa-long-arrow-right"></i></a></h5>

                                        </div>

                                    </div>

                                    <div class="hs_blog_box1_bottom_cont_main_wrapper">

                                        <div class="hs_blog_box1_bottom_cont_left">

                                            <ul>
                                                <li><a href="#">1244 Likes</a></li>
                                                <li><a href="#">256 Comments</a></li>
                                                <li><a href="#">Share :</a></li>
                                            </ul>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                                <div class="hs_blog_box1_main_wrapper ast-blogmd-01">

                                    <div class="hs_blog_box1_img_wrapper">

                                        <img src="<?php echo base_url();?>assets/frontend/images/content/blog/bc1.jpg" alt="blog_img">

                                        <div class="hs_blog_Indx_date_wrapper">

                                            <ul>

                                                <li>29</li>

                                                <li>Oct</li>

                                            </ul>

                                        </div>
                                        <div class="hs-blog-astrologer-profile-img">
                                            <img src="<?php echo base_url();?>assets/frontend/images/content/online1.jpg" class="img-responsive">
                                        </div>

                                    </div>

                                    <div class="hs_blog_box1_cont_main_wrapper">

                                        <div class="hs_blog_cont_heading_wrapper">

                                            <h2>Rahu Enters Cancer and Ketu Enters Capricorn.</h2>

                                            <h4><span></span></h4>

                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit sequat ipsum, nec sagittis sem nibh id elit. </p>

                                            <h5><a href="blog_detail.php">Read More <i class="fa fa-long-arrow-right"></i></a></h5>

                                        </div>

                                    </div>

                                    <div class="hs_blog_box1_bottom_cont_main_wrapper">

                                        <div class="hs_blog_box1_bottom_cont_left">

                                            <ul>

                                                <li><a href="#">1244 Likes</a></li>

                                                <li><a href="#">256 Comments</a></li>

                                                <li><a href="#">Share :</a></li>

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                                <div class="hs_blog_box1_main_wrapper ast-blogmd-01">

                                    <div class="hs_blog_box1_img_wrapper">

                                        <img src="<?php echo base_url();?>assets/frontend/images/content/blog/bc1.jpg" alt="blog_img">

                                        <div class="hs_blog_Indx_date_wrapper">

                                            <ul>

                                                <li>29</li>

                                                <li>Oct</li>

                                            </ul>

                                        </div>
                                        <div class="hs-blog-astrologer-profile-img">
                                            <img src="<?php echo base_url();?>assets/frontend/images/content/online1.jpg" class="img-responsive">
                                        </div>

                                    </div>

                                    <div class="hs_blog_box1_cont_main_wrapper">

                                        <div class="hs_blog_cont_heading_wrapper">

                                            <h2>Rahu Enters Cancer and Ketu Enters Capricorn.</h2>

                                            <h4><span></span></h4>

                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit sequat ipsum, nec sagittis sem nibh id elit.</p>

                                            <h5><a href="blog_detail.php">Read More <i class="fa fa-long-arrow-right"></i></a></h5>

                                        </div>

                                    </div>

                                    <div class="hs_blog_box1_bottom_cont_main_wrapper">

                                        <div class="hs_blog_box1_bottom_cont_left">

                                            <ul>

                                                <li><a href="#">1244 Likes</a></li>

                                                <li><a href="#">256 Comments</a></li>

                                                <li><a href="#">Share :</a></li>

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                                <div class="hs_blog_box1_main_wrapper ast-blogmd-01">

                                    <div class="hs_blog_box1_img_wrapper">

                                        <img src="<?php echo base_url();?>assets/frontend/images/content/blog/bc1.jpg" alt="blog_img">

                                        <div class="hs_blog_Indx_date_wrapper">

                                            <ul>

                                                <li>29</li>

                                                <li>Oct</li>

                                            </ul>

                                        </div>
                                        <div class="hs-blog-astrologer-profile-img">
                                            <img src="<?php echo base_url();?>assets/frontend/images/content/online1.jpg" class="img-responsive">
                                        </div>

                                    </div>

                                    <div class="hs_blog_box1_cont_main_wrapper">

                                        <div class="hs_blog_cont_heading_wrapper">

                                            <h2>Rahu Enters Cancer and Ketu Enters Capricorn.</h2>

                                            <h4><span></span></h4>

                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit sequat ipsum, nec sagittis sem nibh id elit. </p>

                                            <h5><a href="blog_detail.php">Read More <i class="fa fa-long-arrow-right"></i></a></h5>

                                        </div>

                                    </div>

                                    <div class="hs_blog_box1_bottom_cont_main_wrapper">

                                        <div class="hs_blog_box1_bottom_cont_left">

                                            <ul>

                                                <li><a href="#">1244 Likes</a></li>

                                                <li><a href="#">256 Comments</a></li>

                                                <li><a href="#">Share :</a></li>

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">

                                <div class="hs_blog_box1_main_wrapper ast-blogmd-01">

                                    <div class="hs_blog_box1_img_wrapper">

                                        <img src="<?php echo base_url();?>assets/frontend/images/content/blog/bc1.jpg" alt="blog_img">

                                        <div class="hs_blog_Indx_date_wrapper">

                                            <ul>

                                                <li>29</li>

                                                <li>Oct</li>

                                            </ul>

                                        </div>
                                        <div class="hs-blog-astrologer-profile-img">
                                            <img src="<?php echo base_url();?>assets/frontend/images/content/online1.jpg" class="img-responsive">
                                        </div>

                                    </div>

                                    <div class="hs_blog_box1_cont_main_wrapper">

                                        <div class="hs_blog_cont_heading_wrapper">

                                            <h2>Rahu Enters Cancer and Ketu Enters Capricorn.</h2>

                                            <h4><span></span></h4>

                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit sequat ipsum, nec sagittis sem nibh id elit.</p>

                                            <h5><a href="blog_detail.php">Read More <i class="fa fa-long-arrow-right"></i></a></h5>

                                        </div>

                                    </div>

                                    <div class="hs_blog_box1_bottom_cont_main_wrapper">

                                        <div class="hs_blog_box1_bottom_cont_left">

                                            <ul>

                                                <li><a href="#">1244 Likes</a></li>

                                                <li><a href="#">256 Comments</a></li>

                                                <li><a href="#">Share :</a></li>

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                            </div> -->
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>         
   