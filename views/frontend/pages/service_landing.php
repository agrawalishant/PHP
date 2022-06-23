<?php $sl_id ;
//$flandingpages_data=fetchbyrow_where_dbid('services',$sl_id,'title');
//$flandingpages_data=fetchbyrow_where_dbid_like('services',$sl_id,'title');
//->like('title' ,$sl_id)
// ->where("title LIKE '%$sl_id%'")
$flandingpages_data=$this->db->select('*')->from('services')->where("url_title LIKE '%$sl_id%'")->get()->row();
if(empty($flandingpages_data))
     {
         redirect(base_url().'front_page','refresh');
     }
// $sl_id=trim($sl_id);
// $where="`title` LIKE '%$sl_id%'";
// $flandingpages_data=$this->front_model->fetchbyrow_like('services',$where);
?>

    <!-- hs Navigation End -->



    <!-- hs About Title Start -->


    <div class="hs_indx_title_main_wrapper">

        <div class="hs_title_img_overlay"></div>

        <div class="container">


            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">


                    <div class="hs_indx_title_left_wrapper">

                        <h1 style="font-size: 20px;color: #ffffff;text-transform: uppercase;"> <?php echo $flandingpages_data->title ; ?></h1>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_right_wrapper">

                        <ul>

                            <li><a href="<?php echo base_url('front_page'); ?>">Home</a> &nbsp;&nbsp;&nbsp;> </li>

                            <li><?php echo $flandingpages_data->title ; ?></li>

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

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

                    <div class="hs_kd_left_sidebar_main_wrapper">

                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="hs_ar_first_sec_wrapper">

                                    <div class="row">

                                        <div class="col-md-4 col-sm-6 col-xs-12">

                                            <div class="hs_ar_first_sec_img_wrapper">

                                                <img src="<?php echo base_url();?>image/service/<?php echo $flandingpages_data->image ; ?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="arlies_img" />

                                            </div>

                                        </div>

                                        <div class="col-md-8 col-sm-6 col-xs-12">

                                            <div class="hs_ar_first_sec_img_cont_wrapper">

                                                <p><?php echo $flandingpages_data->description ; ?></p>

                                                <?php if(!empty($flandingpages_data->href)){ ?>
                                             
                                               <!-- <h3><a href="<?php echo base_url();?><?php echo $flandingpages_data->href;?>" class="bookBtn">Read More </a> </h3>-->
                                                 
                                                 <?php } ?>

                                               
                                                <!-- <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                </p> -->
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                            <div class="hs_kd_five_heading_sec_wrapper">


                                                <h2>Talk to live an astrologer</h2>


                                                <h4><span></span></h4>


                                            </div>


                                        </div>

<!-- ASTROLOGers -->
<?php 
$astroteam_fetch=fetchbyresultlimit('astrologers','3');
foreach($astroteam_fetch as $feastro)
{?>
                                        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">



                                            <div class="hs_astro_team_img_main_wrapper hs_kd_five_box_sec_wrapper">


                                                <div class="hs_astro_img_wrapper">


                                                   <img src="<?php echo base_url();?>image/astrologers/<?php echo $feastro['astro_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="online_img" class="img-responsive">
                                             


                                                </div>



                                                <div class="hs_astro_img_cont_wrapper">

                                                    <h2><a href="<?php echo base_url();?>astrotalk_profile/<?php echo $feastro['astro_id'];?>"><?php echo $feastro['astro_name'];?></a></h2>

                                                    <p><?php 
                    $a=cat_fetch_join('astrologers_multiplecategories','category_astrologer',$feastro['astro_id']);
                    $ak = array();
                    foreach($a as $b)
                    {
                      $ak[] = $b['cat_astr_title'];
                    }
                    $ik = implode(',',$ak);
                    $len = strlen($ik);
                    if($len>20)
                    {
                     echo substr($ik,0,20)."...";
                    }
                    else
                    {
                     echo substr($ik,0,20);
                    }
                    ?></p>

                                                    <!-- <ul>

                                                        <li>Charges :</li>


                                                        <li>₹<?php echo $feastro['astro_calling_rate'];?> / Min.</li>
                                                      


                                                    </ul> -->



                                                </div>



                                                <!-- <div class="hs_astro_img_bottom_cont">



                                                    <ul>



                                                        <li><a href="<?php echo base_url();?>astrotalk_profile/<?php echo $feastro['astro_id'];?>"><i class="fa fa-eye"></i>&nbsp; View Profile</a></li>



                                                        <li><a href="#"><i class="fa fa-phone"></i>&nbsp; Call Now</a></li>



                                                    </ul>



                                                </div> -->



                                            </div>



                                        </div>
<?php } ?>
<!-- ASTROLOGers -->

                                        



                                        <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                                            



                                        </div> -->

                                        <div class="clearfix divider-01"></div>

                                      <div class="">



                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">



                                           



                                        </div>



                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">



                                           



                                        </div>

                                        



                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                                            



                                        </div>



                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">





                                        </div>



                                      </div>



                                    </div>



                                </div>



                            </div>



                        </div>



                    </div>



                </div>



                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">



                    <div class="hs_kd_right_sidebar_main_wrapper">



                        <div class="row">



                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                                <div class="hs_kd_right_first_sec_wrapper">



                                    <div class="hs_kd_right_first_sec_heading">



                                        <h2>kundali patrika</h2>



                                    </div>



                                    <div class="hs_kd_right_first_sec_img_heading">



                                        <img src="<?php echo base_url();?>assets/frontend/images/content/kundali/patrika.jpg" alt="patrika" />



                                    </div>



                                    <div class="hs_kd_right_first_sec_img_price_heading">



                                        <ul>



                                            <li>Kundli Patrika</li>



                                            <!--<li><i class="fa fa-inr" aria-hidden="true"></i> 26</li>-->



                                        </ul>



                                    </div>



                                </div>



                            </div>



                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                                <div class="hs_kd_right_first_sec_wrapper2">



                                    <div class="hs_kd_right_first_sec_heading">



                                        <h2>Mangal Dosh</h2>



                                    </div>



                                    <div class="hs_kd_right_first_sec_img_heading">



                                        <img src="<?php echo base_url();?>assets/frontend/images/content/kundali/patrika2.jpg" alt="patrika" />



                                    </div>



                                    <!--<div class="hs_kd_right_first_sec_img_price_heading">



                                        <ul>



                                            <li>Kundli Patrika</li>



                                            <li> <i class="fa fa-inr" aria-hidden="true"></i> 26</li>



                                        </ul>



                                    </div>-->



                                </div>



                            </div>



                           







                        </div>



                    </div>



                </div>



            </div>



        </div>



    </div>



    <!-- hs sidebar End -->

    <!-- hs footer wrapper Start -->
   