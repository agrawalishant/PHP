    <!-- hs Navigation End -->

    <!-- hs About Title Start -->
    <?php $ddid = $this->session->userdata('usid'); 
    $getdata = $this->db->get_where('user', array('user_id' => $ddid))->row();
    ?>
    <div class="hs_indx_title_main_wrapper">

        <div class="hs_title_img_overlay"></div>

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_left_wrapper">

                        <h2>Prediction</h2>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_right_wrapper">

                        <ul>

                            <li><a href="<?php echo base_url('front_page');?>">Home</a> &nbsp;&nbsp;&nbsp;> </li>

                            <li>Prediction</li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

     <!-- hs About Title End -->

	<!--hs predication section start-->


	<div class="hs_astrology_team_main_wrapper ">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="hs_about_heading_main_wrapper">


                        <div class="hs_about_heading_wrapper">

                            <h2>Prediction</h2>

                            <h4><span></span></h4>

                        </div>

                    </div>



                </div>


            </div>

        </div>



    </div>


	<!--hs predication section end-->



	<!--hs form section start -->



	<div class="hs_predicition_form">

		

      <div class="container">

        

        <div class="row">

				

          <div class="col-md-2"></div>

          

          	<div class="col-md-8">

               <div class="mdss clsCls">
		
                  <div class="sectionhr aboutus qshead">			

                     <h3 class="h1tag">UPDATE PROFILE</h3>

                     <h4 class="check wow fadeInUp">UPDATE PROFILE</h4>

                  </div>
	
                 <!-- <form method="post" autocomplete="off" action="prediction" id="fmfree"> -->
                 <?php echo form_open(base_url().'prediction_submit'); ?>
                   <div class="row">

                         <div class="col-md-6">

                            <label>OCCUPATION</label>

                            <input type="text" name="user_occupation" placeholder="Occupation" class="form-control" autocomplete="off" required=""></div>

                                

                                <div class="col-md-6">

                                        

                                    <label>Gender</label>

                                        

                                    <select class="form-control droupdown select2-hidden-accessible myForm123" name="p_gender" required="">

                                            

                                        <option>Gender</option>

                                            

                                        <option value="male">Male</option>

                                            

                                        <option value="female">Female</option>

                                        

                                    </select>

                                    

                                </div>

					

                    </div>

                    <div class="row">

<div class="col-md-6">

   <label>STATE/label>

   <input type="text" name="user_state" placeholder="user_state" class="form-control" autocomplete="off" required=""></div>

       

       <div class="col-md-6">

               

          
               

           <label>COUNTRY</label>

<input type="text" name="user_country" placeholder="user_country" class="form-control" autocomplete="off" required=""></div>


           

       </div>



</div>





                  <div class="row">

<div class="col-md-6">

<label>Date of Birth</label>

<input value="" type="date" name="user_dob" class="form-control" placeholder="dd/mm/yyyy" required="" id="dp1609396207557"></div>

<div class="col-md-6">

<label>Marital Status</label>

<select class="form-control droupdown select2-hidden-accessible myForm123" name="user_maritalstatus" tabindex="-1" aria-hidden="true" required="">

<option value="">Marital Status</option>

<option value="Never Married">Unmarried</option>

<option value="Married">Married</option>

<option value="Divorced">Divorced</option>

<option value="Widow">Widow</option>

</select>

</div>

</div>


<div class="row">

<div class="col-md-6">

<label>Time of Birth</label>

<input value="" type="time" name="user_timeofbirth" class="form-control" placeholder="time" required="" ></div>

</div>

<div class="col-md-6">

<label>Place of birth</label>

<input value="" type="time" name="user_timeofbirth" class="form-control" placeholder="time" required="" ></div>


</div>


</div>



<div class="row">

<div class="col-sm-12">

<h5 id="horoscopeFormError" class="text-danger display-none"></h5>

</div>

</div>

<input type="hidden" name="type" value="Free-Prediction">

<p class="text-center zero-margin">

<button type="submit" name="submit_query" class="get_free"> Submit </button>

</p>



<?php echo form_close(); ?>

</div>

          </div>  

          <div class="col-md-2">

            

          </div>

        </div>

        

      </div>

      

	</div>

	<!--hs form section end-->



	<!--hs predication section start-->



	

	<div class="hs_astrology_team_main_wrapper ">



        <div class="container">



            <div class="row">

  </div>



           



           

        </div>



    </div>









	<!--hs predication section end-->





    <!-- hs about ind wrapper Start -->



   <div class="hs_online_main_slider_wrapper">

        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <div class="hs_online_slider_left_cont pd-10">

                        <h2>Our <span> Astrologers !</span></h2>

                        <p>Free vedic astrology readings & calculations, daily horoscope, chinese astrology, western astrology based reading and reports.</p>

                    </div>

                </div>

                <div class="col-sm-12">

                    <div class="hs_online_slider_wrapper">

                        <div class="owl-carousel owl-theme">

                           <!-- astrologers -->
<?php 
$fetch_astrologerss=fetchbyresult('astrologers');
foreach($fetch_astrologerss as $fastrologers){
?>
                            <div class="item hs-astro-expert">

                                <div class="hs_online_img_wrapper">

                                    <img src="<?php echo base_url();?>image/astrologers/<?php echo $fastrologers['astro_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="online_img" class="img-responsive" />

                                    <span class="offline"></span>

                                </div>

                                <div class="hs-astro-exp-info">

                                    <h3><?php echo $fastrologers['astro_name'];?></h3>

                                    <!-- <p>Hindi , English , gujrati</p> -->
                                    <!-- pankaj -->
                                    <?php 
                    $a=cat_fetch_join('astrologers_multiplecategories','category_astrologer',$fastrologers['astro_id']);
                    
                   foreach($a as $b){
                 echo  $b['cat_astr_title']; echo ',';
                   }
                   
                    ;?>
                                    <!-- <p>Vedic Astrology,Tarot Reading.</p> -->

                                </div>

                            </div>
<?php } ?>
                     <!-- astrologers -->    

                            <!-- <div class="item hs-astro-expert">

                                <div class="hs_online_img_wrapper">

                                    <img src="<?php echo base_url();?>assets/frontend/images/content/online2.jpg" alt="online_img" class="img-responsive" />

                                    <span></span>

                                </div>

                                <div class="hs-astro-exp-info">

                                    <h3>Rajni</h3>

                                    <p>Hindi , English ,Marathi</p>

                                    <p>Numerology,Tarot Reading..</p>

                                </div>   

                            </div>

                            <div class="item hs-astro-expert">

                                <div class="hs_online_img_wrapper">

                                    <img src="<?php echo base_url();?>assets/frontend/images/content/online3.jpg" alt="online_img" class="img-responsive" />

                                    <span class="offline"></span>

                                </div>

                                <div class="hs-astro-exp-info">

                                    <h3>Pranav</h3>

                                    <p>Hindi , English , Malyalam</p>

                                    <p>Vedic Astrology,Vasthu..</p>

                                </div> 

                            </div>

                            <div class="item hs-astro-expert">

                                <div class="hs_online_img_wrapper">

                                    <img src="<?php echo base_url();?>assets/frontend/images/content/online4.jpg" alt="online_img" class="img-responsive" />

                                    <span></span>

                                </div>

                                <div class="hs-astro-exp-info">

                                    <h3>Neha</h3>

                                    <p>Hindi , English , Telgu</p>

                                    <p>Vedic Astrology,Numerology..</p>

                                </div> 

                            </div> -->

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>    



    <!-- hs about ind wrapper End -->



    <!-- hs Counter wrapper Start -->



    <!-- hs client slider wrapper End -->



    <!-- hs footer wrapper Start -->