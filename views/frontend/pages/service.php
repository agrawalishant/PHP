<?php 
$wal_amt = 0;
if(!empty($userss_id = $this->session->userdata('user_id'))){
     $userss_id = $this->session->userdata('user_id');
    $wal = fetchbyresultByCondiction('wallet',array('user_id'=>$userss_id));
    $wal_amt =  $wal[0]['wallet_amt'];
    
}
   ?>
 
 <input type="hidden" name="wallet_balance" id="wallet_balance" value=<?php echo $wal_amt;?> >
 <input type="hidden" name="hiddenuser_id" id="hiddenuser_id" value=<?php echo $userss_id;?> >
    
    <!-- hs Navigation End -->



    <!-- hs About Title Start -->


    <div class="hs_indx_title_main_wrapper">


        <div class="hs_title_img_overlay"></div>


        <div class="container">


            <div class="row">


                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">


                    <div class="hs_indx_title_left_wrapper">


                        <h1>Services</h1>


                    </div>


                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_right_wrapper">

                        <ul>

                            <li><a href="<?php echo base_url('front_page');?>">Home</a> &nbsp;&nbsp;&nbsp;> </li>

                            <li>Services</li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- hs About Title End -->



    <!-- hs about ind wrapper Start -->


    <!-- <div class="hs_about_indx_main_wrapper hs_about_indx_inner_main_wrapper">

        <div class="container">


            <div class="row">



                <div class="col-xs-12">



                    <div class="hs_about_heading_main_wrapper">



                        <div class="hs_about_heading_wrapper">



                            <h2>About <span> Astroved </span></h2>



                            <h4><span></span></h4>



                        </div>



                    </div>



                </div>



                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                    <div class="hs_about_right_cont_wrapper">







                        <h4>HoroScope Revels The Will Of God</h4><br>



                        <span></span>



                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod



                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,



                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo



                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse



                        cillum dolore eu fugiat nulla pariatur. </p>



                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod



                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,



                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo



                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse



                        cillum dolore eu fugiat nulla pariatur. </p>


                    </div>



                </div>


                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">


                    <div class="hs_about_left_img_wrapper">


                        <img src="<?php echo base_url();?>assets/frontend/images/content/astro-ab-02.png" alt="about_img"/>


                    </div>


                </div>


            </div>


        </div>


    </div> -->


    <!-- hs about ind wrapper End -->

    <!-- hs Counter wrapper Start -->

<!--     <div class="hs_counter_main_wrapper">


    <div class="hs_counter_cont_wrapper hs_counter_cont_wrapper1">

        <div class="count-description">

            <div class="hs_main_cycle_main">

                    <span class="timer">25</span>

                </div>


                <h5 class="con1">Trusted by<br> Million Clients</h5>







            </div>







        </div>







        <div class="hs_counter_cont_wrapper">







            <div class="count-description">







                <div class="hs_main_cycle_main">







                    <span class="timer">73</span>







                </div>







                <h5 class="con2">Years of<br> Experience







                </h5>







            </div>







        </div>







        <div class="hs_counter_cont_wrapper">







            <div class="count-description">







                <div class="hs_main_cycle_main">







                    <span class="timer">45</span>







                </div>







                <h5 class="con3">Types of <br> Horoscopes







                </h5>







            </div>







        </div>







        <div class="hs_counter_cont_wrapper">







            <div class="count-description">







                <div class="hs_main_cycle_main">







                    <span class="timer">99</span>







                </div>







                <h5 class="con4">Qualified <br> Astrologers







                </h5>







            </div>







        </div>







        <div class="hs_counter_cont_wrapper hs_counter_cont_wrapper5">







            <div class="count-description">







                <div class="hs_main_cycle_main">







                    <span class="timer">89</span>







                </div>







                <h5 class="con4">Sucess<br> Horoscope







                </h5>







            </div>







        </div>







    </div> -->







    <!-- hs Counter wrapper End -->





<!-- title -->
<div class="divider-01 clearfix"></div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                    <div class="hs_about_heading_main_wrapper">



                        <div class="hs_about_heading_wrapper">



                            <h1>Services <span> </span></h1>



                            <h4><span></span></h4>



                            

                        </div>



                    </div>



                </div>
<!-- title -->
    <!-- hs astrology services Start -->







    <div class="hs_astrology_team_main_wrapper ">



        <div class="container">

          

            <div class="row">







                            <div id="gridWrapper" class="clearfix">

<!-- service fetch -->
<?php $fetch_services=fetchbyresult('services');
foreach($fetch_services as $fservice){
?>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 portfolio-wrapper III_column" data-groups='[ "all"]'>

                                  	<div class="line-item text-center">

										<div class="online-image mb-3">

										<!-- <img src="<?php echo base_url();?>" alt="team-img"> -->
                                            <img src="<?php echo base_url();?>image/service/<?php echo $fservice['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';"  class="img-fluid"  style="width:270px;" alt="<?php echo $fservice['title'];?>">

										</div>

                                    	<div class="online-content">

											<h4 class="mb-1"><?php echo $fservice['title'];?></h4>

											<!-- <p><?php //echo $fservice['description'];?></p> -->
<p><?php echo $desa = word_limiter(strip_tags($fservice['description']), 25);?></p>
											<!-- <a href="<?php echo base_url();?>services_landing/<?php echo encoding($fservice['services_id']);?>" class="bookBtn">Read More </a> -->
                                           <!-- <?php //$titlesss = str_replace(' ','',$fservice['title']); ?> -->
                                            <a href="<?php echo base_url();?>services_landing/<?php echo $fservice['url_title'];?>" class="bookBtn">Read More </a>

										</div>







									</div>







                                    <!----<div class="hs_service_main_box_wrapper">







                                        <div class="hs_service_icon_main_wrapper">







                                            <div class="hs_service_icon_wrapper">







                                                <i class="flaticon-success"></i>







                                                <div class="btc_step_overlay"></div>







                                            </div>







                                        </div>







                                        <div class="hs_service_icon_cont_wrapper">







                                            <h2>Career</h2>







                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean .</p>







                                            <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>







                                        </div>







                                    </div>---->







                                </div>
<?php } ?>
<!-- service fetch -->








































                                







                                    <!----<div class="hs_service_main_box_wrapper">







                                        <div class="hs_service_icon_main_wrapper">







                                            <div class="hs_service_icon_wrapper">







                                                <i class="flaticon-pregnancy"></i>







                                                <div class="btc_step_overlay"></div>







                                            </div>







                                        </div>







                                        <div class="hs_service_icon_cont_wrapper">







                                            <h2>Pregnancy</h2>







                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean .</p>







                                            <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>







                                        </div>







                                    </div>----->







                                </div>















                              

                                    <!------<div class="hs_service_main_box_wrapper">







                                        <div class="hs_service_icon_main_wrapper">







                                            <div class="hs_service_icon_wrapper">







                                                <i class="flaticon-engagement-ring"></i>







                                                <div class="btc_step_overlay"></div>







                                            </div>







                                        </div>







                                        <div class="hs_service_icon_cont_wrapper">







                                            <h2>Manglik Dosha</h2>







                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean .</p>







                                            <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>







                                        </div>







                                    </div>------>







                                </div>















                          















                              





                                    <!-------<div class="hs_service_main_box_wrapper">







                                        <div class="hs_service_icon_main_wrapper">







                                            <div class="hs_service_icon_wrapper">







                                                <i class="flaticon-giftboxes"></i>







                                                <div class="btc_step_overlay"></div>







                                            </div>







                                        </div>







                                        <div class="hs_service_icon_cont_wrapper">







                                            <h2>Festivals</h2>







                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean .</p>







                                            <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>







                                        </div>







                                    </div>------->







                                </div>















                              





                                    <!------<div class="hs_service_main_box_wrapper">







                                        <div class="hs_service_icon_main_wrapper">







                                            <div class="hs_service_icon_wrapper">







                                                <i class="flaticon-baby-with-diaper"></i>







                                                <div class="btc_step_overlay"></div>







                                            </div>







                                        </div>







                                        <div class="hs_service_icon_cont_wrapper">







                                            <h2>Name Analysis</h2>







                                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean .</p>







                                            <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>







                                        </div>







                                    </div>----->







                                </div>







                            </div>







                            <!--/#gridWrapper-->







                        </div>







                        <!-- /.row -->







                    </div>







                    <!-- /.container -->







                </div>







                <!--/.portfolio-area-->







            </div>







        </div>







    </div>



           <!-- <div class="row">



                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                    <div class="hs_about_heading_main_wrapper">



                        <div class="hs_about_heading_wrapper">



                            <h2>Our <span> Services</span></h2>

                            <h4><span></span></h4>



                           

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 divider-01">

                    <div class="hs_astro_team_img_main_wrapper border-shad ">

                        <div class="hs_astro_img_wrapper">

                           <img src="<?php echo base_url();?>assets/frontend/images/content/education-img.png" alt="team-img">

                        </div>

                        <div class="hs_astro_img_cont_wrapper">

                            <center><h2><a href="#">Education</a></h2>

                            <p>Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.</p>

                         </center>    

                            <div class="r-btn">

                                <a href="#">&nbsp; Read More</a>

                            </div>

                        </div>

                    </div>

                </div>

                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 divider-01">

                    <div class="hs_astro_team_img_main_wrapper border-shad ">

                        <div class="hs_astro_img_wrapper">

                            <img src="<?php echo base_url();?>assets/frontend/images/content/sr-fm-img.png" alt="team-img">

                        </div>

                        <div class="hs_astro_img_cont_wrapper">

                            <center><h2><a href="#">Family & children</a></h2>

                                <p>Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.</p>

                            </center>  

                            <div class="r-btn">

                                <a href="#">&nbsp; Read More</a>

                            </div>  

                        </div>

                    </div>

                </div>

                 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 divider-01">

                    <div class="hs_astro_team_img_main_wrapper border-shad">

                        <div class="hs_astro_img_wrapper">

                            <img src="<?php echo base_url();?>assets/frontend/images/content/Astrology-report.png" alt="team-img">

                        </div>

                        <div class="hs_astro_img_cont_wrapper">

                        <center> <h2><a href="#">Costum Report</a></h2>

                            <p>Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.</p>

                         </center>  

                            <div class="r-btn">

                                <a href="#">&nbsp; Read More</a>

                            </div>  

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 divider-01">



                    <div class="hs_astro_team_img_main_wrapper border-shad">







                        <div class="hs_astro_img_wrapper">







                            <img src="<?php echo base_url();?>assets/frontend/images/content/business-services-img.png" alt="team-img">







                        </div>







                        <div class="hs_astro_img_cont_wrapper">







                         <center> <h2><a href="#">Business</a></h2>



                         



                            <p>Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.</p>



                         </center>    



                            <div class="r-btn">



                                <a href="#">&nbsp; Read More</a>



                            </div>



                        </div>







                    </div>







                </div>







                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 divider-01">







                    <div class="hs_astro_team_img_main_wrapper border-shad">







                        <div class="hs_astro_img_wrapper">







                            <img src="<?php echo base_url();?>assets/frontend/images/content/education-img.png" alt="team-img">







                        </div>







                        <div class="hs_astro_img_cont_wrapper">







                             <center> <h2><a href="#">Education</a></h2>







                                <p>Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.</p>



                            



                            </center>







                            <div class="r-btn">



                                <a href="#">&nbsp; Read More</a>



                            </div>



                        </div>                         







                    </div>







                </div>







                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 divider-01">







                    <div class="hs_astro_team_img_main_wrapper border-shad">







                        <div class="hs_astro_img_wrapper">







                            <img src="<?php echo base_url();?>assets/frontend/images/content/education-img.png" alt="image-missing" class="rotate img-responsive">







                        </div>







                        <div class="hs_astro_img_cont_wrapper">







                            <center> <h2><a href="#">Education</a></h2>







                            <p>Lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet.</p>



                             </center>



                            <div class="r-btn">



                                <a href="#">&nbsp; Read More</a>



                            </div> 



                        </div>







                    </div>







                </div>







            </div>



            <div class="hs-astro-list">



                <a href="#" class="hs-astro-list-Btn">View All Services </a>



            </div>



        </div>-->







    </div>







    <!-- hs astrology services End -->



<!-- hs astrology team slider start-->



<div class="hs_astrology_team_main_wrapper">



        <div class="container">



            <div class="row">



                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                    <div class="hs_about_heading_main_wrapper">



                        <div class="hs_about_heading_wrapper">



                            <h2>Astrology <span> Team</span></h2>



                            <h4><span></span></h4>



                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum<br> auctor, nisi elit consequat hello Aenean world.</p>



                        </div>



                    </div>



                </div>

                <div class="clearfix divider-01"></div>

               
<!-- ASTROLOGY TEAM -->
<?php 
$astroteam_fetch=fetchbyresultByCondictionlimit('astrologers',array('astro_approved_status'=>'1'),'4');//fetchbyresultlimit('astrologers','4');
foreach($astroteam_fetch as $feastro)
{?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">



                    <div class="hs_astro_team_img_main_wrapper">



                        <div class="hs_astro_img_wrapper">



                            <img src="<?php echo base_url();?>image/astrologers/<?php echo $feastro['astro_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="team-img">



                        </div>



                        <div class="hs_astro_img_cont_wrapper">



                            <h2><a href="<?php echo base_url();?>astrotalk_profile/<?php echo $feastro['astro_id'];?>"><?php echo $feastro['astro_name'];?></a></h2>



                            <p>   <?php 
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



                                <li>₹<?php //echo $feastro['astro_calling_rate'];?> / Min.</li>



                            </ul> -->



                        </div>


                    </div>
                </div>
                <?php }?>
<!-- ASTROLOGY TEAM -->

            </div>

            <div class="hs-astro-list">

                <a href="<?php echo base_url();?>astrotalk/all" class="hs-astro-list-Btn">View All Astrologers </a>

            </div>

        </div>



    </div>



<!-- hs astrology team slider end -->

    <!-- hs footer wrapper Start -->

    <script>
  function checklgn($astroid)
  {
      
    var id = document.getElementById('sesids').value;
    //alert(id);
    if(id == 0)
    {
      if(confirm('Login With User'))
      {
        $('#myModal').modal('show');  
      }
    //   else
    //   {
    //     return false;
    //   }
    }
//     else
//     {
//     //  $('#reportModal').modal('show');  
//    // $('#checkonlinestatus').html('1');
//     } 
  }  
  </script>
  <!-- *****************************SCRIPT FOR CALL START************************************************* -->
<script>
  function callof()
  {
    alert('Astrologer Is Offline Please Click Online Astrologer.');
    return false;
  }

function call(astrooid)
{
  if(confirm('Please click OK For connecting a Call')){
var callrate=document.getElementById('hiddencallingrate'+astrooid).value;
var users_ids = document.getElementById('hiddenuser_id').value;
var astrol_ids = astrooid;
var walletbalance= document.getElementById('wallet_balance').value;
 // alert(astrooid);
 // alert(callrate);
 // alert(users_ids);
 // alert(walletbalance);
$.ajax({
            type: "POST",
            url: "<?php echo base_url();?>call_data",
            data: {callrate: callrate, users_ids: users_ids,walletbalance: walletbalance,astrol_ids:astrol_ids },
            
            success: function(data){
              console.log(data);
                //   $('#result').html(data);
               // location.reload();
            }
        });
}
else
{
  return false;
}
//alert(users_ids);
//alert(walletbalance);
}
</script>
<!-- *****************************SCRIPT FOR CALL END************************************************* -->