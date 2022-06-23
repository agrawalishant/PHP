<style>
    /* .marquee-color{
        color: #fff;
        font-size: 20px;
    } */
</style>
<style>
.marquee-color {
    color: #fff;
    font-size: 20px;
    position: absolute !important;
    z-index: 999;
    top: 0px;
    left: 0px;
    right: 0px;
    line-height: 30px;
    height: 30px;
}
}
</style>

    <!-- hs Navigation End -->


    <!-- hs Slider Start -->

    <div class="hs_slider_main_wrapper">

        <div class="hs_slider_img_overlay"></div>

        <div class="hs_slider_heading_wrapper">

            <!-----<div class="hs_slider_logo_wraper">

                <img src="<?php echo base_url();?>assets/frontend/images/header/slider_logo.png" alt="logo" class="img-responsive" />


            </div>------>


          	<div data-aos="fade-up">


            <div class="hs_slider_logo_cont_wraper">


                <h2>Talk to Our <span> Expert </span> Astrologers</h2>


                <p style="color:#fff; font-size:20px; padding-top:30px;">Get Solution to all your problems.</p>


            </div>

      </div>

        </div>

        <div class="hs_slider_cont_wrapper">

            <div class="sun">

                <div class="star"></div>


				<div class="hs_waves2">


					<div class="hs_wave"></div>

					<div class="hs_wave"></div>

					<div class="hs_wave"></div>

					<div class="hs_wave"></div>

				</div>



            </div>

            <div class="mercury">

                <div class="planet">

                    <div class="shadow"></div>

                </div>

            </div>

            <div class="product">

                <div class="planet">

                    <div class="shadow"></div>

                </div>

            </div>

            <div class="pan-slide">

                <div class="planet">

                    <div class="shadow"></div>

                </div>

            </div>

            <div class="venus">

                <div class="planet">

                    <div class="shadow"></div>

                </div>


            </div>

            <div class="earth">


                <div class="planet">

                    <div class="shadow"></div>

                </div>

            </div>

            <div class="taro-slide">

                <div class="planet">

                    <div class="shadow"></div>

                </div>


            </div>

            <div class="mars">

                <div class="planet">


                    <div class="shadow"></div>



                </div>







            </div>







            <div class="jupiter">







                <div class="planet">







                    <div class="shadow"></div>


                </div>


            </div>

            <div class="marquee-color">
               
               <marquee onmouseover="this.stop();" onMouseOut="this.start()"> 

<!-- past -->

<!-- paste -->
                                                
                                                
                                                




               
                <?php //$marq=fetchbyresult('category_astrologer');   
                // $ak = array();
                 //foreach($marq as $mar){
                 //   $ak[] = $mar['cat_astr_title'];
              // } echo implode(',',$ak);?>
               </marquee>
           </div>





        </div>

    </div>
    <!-- hs Slider End -->
    <div class="clearfix"></div>
    <!-- bottom-slider-section start-->
    <section class="pd-10">
        <div class="container">
            <div class="row">
                <div class="col-md-4 asto-chat-section">
                    <div class="hs-astro-contact-info">
                        <div class="astro-chat-info">
                            <p><i class="fa fa-comment-o" aria-hidden="true"></i></p>
                        </div>
                        <div class="astro-chat-content">
                            <h3>Chat with astrologer</h3>
                            <h6>starting from 10rs per minute only</h6>
                        </div>
                        <div class="asto-cont-link" onclick="checklgn();">
                        <?php $se_id = $this->session->userdata('user_id'); $ik=0;?>
                        <input type="hidden" name="sesid" id="sesids" value="<?php if(!empty($se_id)) { echo $se_id; }else { echo $se_id = 0 ; } ?>" />         
                            <a href="javascript:void(0)"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 asto-chat-section">
                    <div class="hs-astro-contact-info">
                        <div class="astro-chat-info">
                            <p><i class="fa fa-phone" aria-hidden="true"></i></p>
                        </div>
                        <div class="astro-chat-content">
                            <h3>Talk to astrologer on call</h3>
                            <h6>starting from 10rs per minute only</h6>
                        </div>
                        <div class="asto-cont-link" onclick="checklgn();">
                  

                            <a href="javascript:void(0)"><i class="fa fa-angle-right" aria-hidden="true"></i></a>



                        </div>



                    </div>



                </div>



                <div class="col-md-4 asto-chat-section">



                    <div class="hs-astro-contact-info">



                        <div class="astro-chat-info">



                            <p><i class="fa fa-file-text-o" aria-hidden="true"></i></p>



                        </div>



                        <div class="astro-chat-content">



                            <h3>Get detailed manual report</h3>



                            <h6>starting from 500rs  only</h6>



                        </div>



                        <div class="asto-cont-link" onclick="checklgn();">



                            <a href="javascript:void(0)"><i class="fa fa-angle-right" aria-hidden="true"></i></a>



                        </div>



                    </div>



                </div>



            </div>



        </div>



    </section>



    <!-- bottom-slider-section end-->







    <!-- hs about ind wrapper Start -->







    <!-- <div class="hs_about_indx_main_wrapper">







        <div class="container">







            <div class="row">







                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                  	<div class="wow bounceInUp" data-wow-duration="1s" data-wow-delay="0s" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: bounceInUp;">







                    <div class="hs_about_heading_main_wrapper">







                      	<div data-aos="zoom-in">







                        <div class="hs_about_heading_wrapper">







                            <h2>About <span>Us</span></h2>







                            <h4><span></span></h4>







                        </div>







                      </div>







                    </div>







                </div>







                







                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">







                    <div class="hs_about_right_cont_wrapper">







                        <h2>HoroScope Revels Your Future</h2>







                        <p style="font-size:16px; line-height:30px;">Astrology, type of divination that involves the forecasting of earthly and human events through the observation and interpretation of the fixed stars, the Sun, the Moon, and the planets. Devotees believe that an understanding of the influence of the planets and stars on earthly affairs allows them to both predict and affect the destinies of individuals, groups, and nations. Though often regarded as a science throughout its history, astrology is widely considered today to be diametrically opposed to the findings and theories of modern Western science.</p>







                        







                        <div class="hs_effect_btn hs_about_btn">







                            <ul>







                                <li><a href="#" class="hs_btn_hover">Read more</a></li>







                            </ul>







                        </div>







                    </div>







                </div>







                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">







                    <div class="hs_about_left_img_wrapper">







                        <img src="<?php echo base_url();?>assets/frontend/images/content/imageaboutus.jpg" alt="about_img" />







                    </div>







                </div>







          	</div>







            </div>







        </div>







    </div> -->







    <!-- hs about ind wrapper End -->







    <!-- hs title wrapper Start -->







    <!---<div class="hs_title_main_wrapper">







        <div class="container">







            <div class="row">







                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">







                    <div class="hs_title_box_main_wrapper">







                        <div class="hs_title_img_wrapper">







                            <img src="<?php echo base_url();?>assets/frontend/images/content/title_img1.jpg" alt="totle_img">







                            <ul>







                                <li>$14</li>







                            </ul>







                        </div>







                        <div class="hs_title_img_cont_wrapper">







                            <h2><a href="#">Tarot Reading</a></h2>







                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin lorem quis.</p>







                            <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>







                        </div>







                    </div>







                </div>







                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">







                    <div class="hs_title_box_main_wrapper">







                        <div class="hs_title_img_wrapper">







                            <img src="<?php echo base_url();?>assets/frontend/images/content/title_img2.jpg" alt="totle_img">







                            <ul>







                                <li>$12</li>







                            </ul>







                        </div>







                        <div class="hs_title_img_cont_wrapper">







                            <h2><a href="#">Crystal ball reading</a></h2>







                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin lorem quis.</p>







                            <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>







                        </div>







                    </div>







                </div>







                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">







                    <div class="hs_title_box_main_wrapper">







                        <div class="hs_title_img_wrapper">







                            <img src="<?php echo base_url();?>assets/frontend/images/content/title_img3.jpg" alt="totle_img">







                            <ul>







                                <li>$22</li>







                            </ul>







                        </div>







                        <div class="hs_title_img_cont_wrapper">







                            <h2><a href="#">Palm Reading</a></h2>







                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin lorem quis.</p>







                            <h5><a href="#">Read More <i class="fa fa-long-arrow-right"></i></a></h5>







                        </div>







                    </div>







                </div>







            </div>







        </div>







    </div>----->







    <!-- hs title wrapper End -->







    <!-- hs sign wrapper Start -->







    <!------<div class="hs_sign_main_wrapper">







        <div class="container">







            <div class="hs_sign_heading_wrapper">







                <div class="hs_about_heading_main_wrapper">







                    <div class="hs_about_heading_wrapper">







                        <h2>Horoscope<span></span></h2>







                        <h4><span></span></h4>







                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum<br> auctor, nisi elit consequat hello Aenean world.</p>







                    </div>







                </div>







            </div>







            <div class="hs_sign_center_wrapper visible-xs visible-sm">







                <div class="hs_cycle_main_wrapper">







                    <div class="hs_cycle_img">







                        <img src="<?php echo base_url();?>assets/frontend/images/content/cycle.jpg" alt="circle_img">







                        <span class="pulse"></span>







                        <div class="hs_tab_shap1">







                            <a href="#">







						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-taurus-astrological-sign-symbol"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap2">







                            <a href="#">







						<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-aries-sign"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap3">







                            <a href="#">







						<svg version="1.1" id="Layer_3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-libra"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap4">







                            <a href="#">







						<svg version="1.1" id="Layer_4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-scorpio"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap5">







                            <a href="#">







						<svg version="1.1" id="Layer_5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-leo"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap6">







                            <a href="#">







						<svg version="1.1" id="Layer_6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-capricorn"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap7">







                            <a href="#">







						<svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-aquarius-zodiac-sign-symbol"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap8">







                            <a href="#">







						<svg version="1.1" id="Layer_8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p> <i class="flaticon-pisces-astrological-sign"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap9">







                            <a href="#">







						<svg version="1.1" id="Layer_9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-virgo-astrological-symbol-sign"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap10">







                            <a href="#">







						<svg version="1.1" id="Layer_10" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-leo"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap11">







                            <a href="#">







						<svg version="1.1" id="Layer_11" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-cancer"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap12">







                            <a href="#">







						<svg version="1.1" id="Layer_12" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-gemini-zodiac-sign-symbol"></i></p>







					</a>







                        </div>







                    </div>















                </div>







            </div>







            <div class="hs_sign_left_wrapper">







                <div class="row">







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_border_wrapper1">







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-aries-sign"></i>







                            </div>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Aries</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                            <span></span>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_left_tabs_border_wrapper2">







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-taurus-astrological-sign-symbol"></i>







                            </div>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Taurus</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                            <span></span>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_left_tabs_border_wrapper3">







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-gemini-zodiac-sign-symbol"></i>







                            </div>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Gemini</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                            <span></span>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_left_tabs_border_wrapper4">







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-cancer"></i>







                            </div>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Cancer</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                            <span></span>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_left_tabs_border_wrapper5">







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-leo"></i>







                            </div>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Leo</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                            <span></span>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_left_tabs_border_wrapper6">







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-virgo-astrological-symbol-sign"></i>







                            </div>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Virgo</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                            <span></span>







                        </div>







                    </div>







                </div>







            </div>







            <div class="hs_sign_right_wrapper visible-xs">







                <div class="row">







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_right_tabs_border_wrapper1">







                            <span></span>















                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-libra"></i>







                            </div>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Libra</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_right_tabs_border_wrapper2">







                            <span></span>







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-scorpio"></i>







                            </div>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Scorpio</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_right_tabs_border_wrapper3">







                            <span></span>







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-leo"></i>







                            </div>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Sagittairus







</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_right_tabs_border_wrapper4">







                            <span></span>







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-capricorn"></i>







                            </div>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">







Capricorn







</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_right_tabs_border_wrapper5">







                            <span></span>







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-aquarius-zodiac-sign-symbol"></i>







                            </div>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">







Aquarius







</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_right_tabs_border_wrapper6">







                            <span></span>







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-gemini-zodiac-sign-symbol"></i>







                            </div>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Pisces







</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                        </div>







                    </div>







                </div>







            </div>







            <div class="hs_sign_center_wrapper hidden-sm hidden-xs">







                <div class="hs_cycle_main_wrapper">







                    <div class="hs_cycle_img">







                        <img src="<?php echo base_url();?>assets/frontend/images/content/cycle.jpg" alt="circle_img">







                        <span class="pulse"></span>







                        <div class="hs_tab_shap1">







                            <a href="#">







						<svg version="1.1" id="Layer_13" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-taurus-astrological-sign-symbol"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap2">







                            <a href="#">







						<svg version="1.1" id="Layer_14" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-aries-sign"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap3">







                            <a href="#">







						<svg version="1.1" id="Layer_15" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-libra"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap4">







                            <a href="#">







						<svg version="1.1" id="Layer_16" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-scorpio"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap5">







                            <a href="#">







						<svg version="1.1" id="Layer_17" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-leo"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap6">







                            <a href="#">







						<svg version="1.1" id="Layer_18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-capricorn"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap7">







                            <a href="#">







						<svg version="1.1" id="Layer_19" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-aquarius-zodiac-sign-symbol"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap8">







                            <a href="#">







						<svg version="1.1" id="Layer_20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-gemini-zodiac-sign-symbol"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap9">







                            <a href="#">







						<svg version="1.1" id="Layer_21" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-virgo-astrological-symbol-sign"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap10">







                            <a href="#">







						<svg version="1.1" id="Layer_22" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-leo"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap11">







                            <a href="#">







						<svg version="1.1" id="Layer_23" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-cancer"></i></p>







					</a>







                        </div>







                        <div class="hs_tab_shap12">







                            <a href="#">







						<svg version="1.1" id="Layer_24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"







							 width="68.811px" height="64.729px" viewBox="0 0 68.811 64.729" enable-background="new 0 0 68.811 64.729" xml:space="preserve">







						<path fill-rule="evenodd" clip-rule="evenodd" d="M0,52.763c0,0,26.125,0.367,42.664,11.967l26.147-46.796







							c0,0-30.278-18.234-68.054-17.929L0,52.763z"/>







						</svg>







						<p><i class="flaticon-gemini-zodiac-sign-symbol"></i></p>







					</a>







                        </div>







                    </div>















                </div>







            </div>







            <div class="hs_sign_right_wrapper hidden-xs">







                <div class="row">







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_right_tabs_border_wrapper1">







                            <span></span>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Libra</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-libra"></i>







                            </div>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_right_tabs_border_wrapper2">







                            <span></span>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Scorpio</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-scorpio"></i>







                            </div>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_right_tabs_border_wrapper3">







                            <span></span>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Sagittairus</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                            <div class="hs_slider_tabs_icon_wrapper">







                                 <i class="flaticon-sagittarius-arrow-sign"></i>







                            </div>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_right_tabs_border_wrapper4">







                            <span></span>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Capricorn</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-capricorn"></i>







                            </div>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_right_tabs_border_wrapper5">







                            <span></span>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Aquarius</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                            <div class="hs_slider_tabs_icon_wrapper">







                                <i class="flaticon-aquarius-zodiac-sign-symbol"></i>







                            </div>







                        </div>







                    </div>







                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                        <div class="hs_sign_left_tabs_wrapper hs_sign_left_tabs_wrapper_2 hs_sign_right_tabs_border_wrapper6">







                            <span></span>







                            <div class="hs_slider_tabs_icon_cont_wrapper">







                                <ul>







                                    <li><a href="#" class="hs_tabs_btn">Pisces</a></li>







                                    <li>31 March - 12 October</li>







                                </ul>







                            </div>







                            <div class="hs_slider_tabs_icon_wrapper">







                                 <i class="flaticon-pisces-astrological-sign"></i>







                            </div>







                        </div>







                    </div>







                </div>







            </div>







        </div>







    </div>------->







    <!-- hs sign wrapper End -->







    <!-- hs service wrapper Start -->







    <div class="">







    <div class="container">







        <div class="row home_alignment">







            <div class="col-md-12 text-center">







                <div class="bg-white button_margin pic_margin">







                    <div class="hs_about_heading_wrapper pd-10" style="padding-top:36px;">







                        <h2>Horoscope</h2>







                        <h4><span></span></h4>    







                    </div>



                    







                    <!----<p class="elements_desc">What kind of day will it be for you today? Use your free horoscope to plan your day, every day -







                        instantly!</p>---->



                    <div class="row home_align">

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 hs-astro-horscp-section pd-10  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInDown;">

                            <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(1); ?>" class="sign_circle bg-aries">
                                <img src="<?php echo base_url();?>assets/frontend/images/header/icon-1.png" alt="image-missing" class="rotate">

                            </a>

                            <div class="main">

                                <div class="sign_card text-center signs_bg">

                                    <p>

                                     	<span class="text-aries signs_clr font16">Aries</span><br>

                                        <span>Mesh Raashi</span> <br>
                                             <?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>1));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span>

                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 hs-astro-horscp-section pd-10  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInDown;">

                            <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(2); ?>" class="sign_circle bg-aries">

                                <img src="<?php echo base_url();?>assets/frontend/images/header/icon-2.png" alt="image-missing" class="rotate" >

                            </a>

                            <div class="main">

                                <div class="sign_card text-center signs_bg">

                                    <p>

                                      <span class="text-taurus signs_clr font16">Taurus</span><br>

                                      <span>Vrushabh Raashi</span><br>

                                    	<span class="signtext_clr font12">
                                    	    <?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>2));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                         echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?>
                                    	    
                                    	</span>

                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="clearfix visible-xs-block"></div>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 hs-astro-horscp-section pd-10  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInDown;">

                            <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(3); ?>" class="sign_circle bg-aries">

                                <img src="<?php echo base_url();?>assets/frontend/images/header/icon-3.png" alt="image-missing" class="rotate">

                            </a>

                            <div class="main">

                                <div class="sign_card text-center signs_bg">

                                    <p>

                                  <span class="text-gemini signs_clr font16">Gemini</span><br>

                                  <span>Mithun Raashi</span><br>

                                  <span class="signtext_clr font12"><?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>3));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span></p>

                                </div>

                            </div>

                        </div>

                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 hs-astro-horscp-section pd-10   wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInDown;">

                            <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(4); ?>" class="sign_circle bg-aries">

                                <img src="<?php echo base_url();?>assets/frontend/images/header/icon-4.png" alt="image-missing" class="rotate">

                            </a>

                            <div class="main">

                                <div class="sign_card text-center signs_bg">

                                    <p>

                                        <span class="text-cancer signs_clr font16">Cancer</span><br>

                                        <span>Kark Raashi</span><br>

                                        <span class="signtext_clr font12"><?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>4));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span>

                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="clearfix visible-xs-block"></div>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 hs-astro-horscp-section pd-10  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInDown;">

                            <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(5); ?>" class="sign_circle bg-aries">

                                <img src="<?php echo base_url();?>assets/frontend/images/header/icon-5.png" alt="image-missing" class="rotate">

                            </a>

                            <div class="main">

                                <div class="sign_card text-center signs_bg">

                                    <p>

                                        <span class="text-leo signs_clr font16">Leo</span><br>

                                        <span>Sinh Raashi</span> <br>

                                        <span class="signtext_clr font12"><?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>5));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span>

                                  </p>

                                </div>

                            </div>

                        </div>

                    <!-- desktop view -->    

                        <!-- desktop view -->    

                        <div class="row hs-hsp-desktop-view">

                            <div class="col-lg-2 col-md-3  hs-astro-horscp-section pd-10  wow fadeInDown" data-wow-duration    ="1s" data-wow-delay="0.1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInDown;">

                                <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(6); ?>" class="sign_circle bg-aries">

                                    <img src="<?php echo base_url();?>assets/frontend/images/header/icon-6.png" alt="image-missing" class="rotate">

                                </a>

                                <div class="main">

                                <div class="sign_card text-center signs_bg">

                                    <p>

                                        <span class="text-virgo signs_clr font16">Virgo</span><br>

                                        <span>Kanya Raashi</span><br>

                                        <span class="signtext_clr font12"><?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>6));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span>

                                    </p>

                                </div>

                                </div>

                            </div>
                            <div class="col-lg-7 col-md-6">
                                <img src="<?php echo base_url();?>assets/frontend/images/content/service-horoscope-img-01.png" class="hs-astro-horscop-img">
                            </div>

                            <div class="col-lg-2 col-md-3 hs-astro-horscp-section pd-10 float-right  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInDown;">

                                <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(7); ?>" class="sign_circle bg-aries">

                                    <img src="<?php echo base_url();?>assets/frontend/images/header/icon-7.png" alt="image-missing" class="rotate">

                                </a>

                                <div class="main">

                                    <div class="sign_card text-center signs_bg">

                                      <p>

                                       <span class="text-libra signs_clr font16">Libra</span><br>

                                       <span>Tula Raashi</span><br>

                                        <span class="signtext_clr font12"><?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>7));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span>

                                      </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    <!-- mobile-view -->    



                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 hs-astro-horscp-section pd-10 hsp-mb-view wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInDown;">

                            <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(6); ?>" class="sign_circle bg-aries">

                                <img src="<?php echo base_url();?>assets/frontend/images/header/icon-6.png" alt="image-missing" class="rotate">

                            </a>

                            <div class="main">

                                <div class="sign_card text-center signs_bg">

                                    <p>

                                        <span class="text-virgo signs_clr font16">Virgo</span><br>

                                        <span>Kanya Raashi</span><br>

                                        <span class="signtext_clr font12"><?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>6));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span>

                                    </p>

                                </div>

                            </div>

                        </div>

                        <div class="clearfix visible-xs-block hsp-mb-view"></div>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 hs-astro-horscp-section pd-10 hsp-mb-view  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInDown;">

                            <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(7); ?>" class="sign_circle bg-aries">

                                <img src="<?php echo base_url();?>assets/frontend/images/header/icon-7.png" alt="image-missing" class="rotate">

                            </a>

                            <div class="main">

                                <div class="sign_card text-center signs_bg">

                                  <p>

                                   <span class="text-libra signs_clr font16">Libra</span><br>

                                   <span>Tula Raashi</span><br>

                                    <span class="signtext_clr font12"><?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>7));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span>

                                  </p>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 hs-astro-horscp-section pd-10  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInDown;">

                            <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(8); ?>" class="sign_circle bg-aries">

                                <img src="<?php echo base_url();?>assets/frontend/images/header/icon-8.png" alt="image-missing" class="rotate">

                            </a>

                            <div href="signs_single_post.html" class="main">

                                <div class="sign_card text-center signs_bg">

                                   <p>

                                        <span class="text-scorpio signs_clr font16">Scorpio</span><br>

                                        <span>Vruschik Raashi</span><br>

                                        <span class="signtext_clr font12"><?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>8));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span>

                                  </p>

                                </div>

                            </div>

                        </div>

                        <div class="clearfix visible-xs-block"></div>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 hs-astro-horscp-section pd-10  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInDown;">

                            <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(9); ?>" class="sign_circle bg-aries">

                                <img src="<?php echo base_url();?>assets/frontend/images/header/icon-9.png" alt="image-missing" class="rotate">

                            </a>

                            <div class="main">

                                <div class="sign_card text-center signs_bg">

                                    <p>

                                      <span class="text-sagittarius signs_clr font16">Sagittarius</span><br>

                                      <span>Dhanu Raashi</span><br>

                                    <span class="signtext_clr font12"><?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>9));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span>

                                  </p>

                                </div>

                            </div>

                        </div>

                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 hs-astro-horscp-section pd-10  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInDown;">

                            <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(10); ?>" class="sign_circle bg-aries">

                                <img src="<?php echo base_url();?>assets/frontend/images/header/icon-10.png" alt="image-missing" class="rotate">

                            </a>

                            <div class="main">

                                <div class="sign_card text-center signs_bg">

                                    <p>

                                    <span class="text-capricorn signs_clr font16">Capricorn</span><br>

                                    <span>Makar Raashi</span><br>

                                    <span class="signtext_clr font12"><?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>10));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span>

                                  </p>

                                </div>

                            </div>

                        </div>

                        <div class="clearfix visible-xs-block"></div>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 hs-astro-horscp-section pd-10  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInDown;">

                            <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(11); ?>" class="sign_circle bg-aries">

                                <img src="<?php echo base_url();?>assets/frontend/images/header/icon-11.png" alt="image-missing" class="rotate">

                            </a>

                            <div  class="main">

                                <div class="sign_card text-center signs_bg">

                                    <p>

                                      <span class="text-aquarius signs_clr font16">Aquarius</span><br>

                                      <span>Kumbh Raashi</span><br>

                                    <span class="signtext_clr font12"><?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>11));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span>

                                  </p>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 hs-astro-horscp-section pd-10  wow fadeInDown pic_margin" data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInDown;">

                            <a href="<?php echo base_url(); ?>horoscopeyearly_landing/<?php echo encoding(12); ?>" class="sign_circle bg-aries">

                                <img src="<?php echo base_url();?>assets/frontend/images/header/icon-12.png" alt="image-missing" class="rotate">

                            </a>

                            <div  class="main">

                                <div class="sign_card text-center signs_bg">

                                  <p>

                                    <span class="text-pisces signs_clr font16">Pisces</span><br>

                                    <span>Meen Raashi</span><br>

                                    <span class="signtext_clr font12"><?php $tofrom=fetchbyresultwhere('horoscopeyearly',array('horoscope_id'=>12));//fetchbyresult();?>
                                    	<span class="signtext_clr font12"><?php 
                                    echo date('d-M',strtotime($tofrom['0']['datefirst'])); echo " TO "; echo date('d-M',strtotime($tofrom['0']['datesecond']));
                                    	?></span>

                                  </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

	</div>



    <div class="hs_service_main_wrapper home_bg">







        <div class="container">







            <div class="row">







                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                    <div class="hs_about_heading_main_wrapper">







                        <div class="hs_about_heading_wrapper">







                            <h2>Our <span> services</span></h2>







                            <h4><span></span></h4>







                            <!---<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum<br> auctor, nisi elit consequat hello Aenean world.</p>---->







                        </div>







                    </div>







                </div>

                <div class="portfolio-area ptb-100">


                    <div class="container">



                        <div class="portfolio-filter clearfix text-center">



                            <ul id="filter">

                                <li><a class="active" data-group="all">All</a></li>

                                <li><a data-group="1">Paid Services</a></li>

                                <li><a data-group="0"> Free Services</a></li>


                            </ul>


                        </div>

                        <div class="row">

<!-- fetch service start -->
                            <div id="gridWrapper" class="clearfix">

<!--  data-groups='["all","website"]'> business website -->
<?php $fetch_services=fetchbyresult('services');
foreach($fetch_services as $fservice){
?>
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 portfolio-wrapper III_column" data-groups='[ "all","<?php echo $fservice['type'];?>"]'>



                                  	<div class="line-item text-center">


										<div class="online-image mb-3">

                                       
											<img src="<?php echo base_url();?>image/service/<?php echo $fservice['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';"  class="img-fluid" alt="<?php echo $fservice['title'];?>">

										</div>

                                    	<div class="online-content">


											<h4 class="mb-1"><?php echo $fservice['title'];?></h4>


											<p><?php echo $a = word_limiter(strip_tags($fservice['description']),15);?></p>


											<a href="<?php echo base_url();?>services_landing/<?php echo  encoding($fservice['services_id']);?>" class="bookBtn" title="Ask a Question">Book Now</a>

										</div>

									</div>

                                </div>
<?php } ?>
<!-- fetch service end -->





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







    <!-- hs service wrapper End -->







    <!-- hs news slider wrapper Start -->







    <!----<div class="hs_news_slider_main_wrapper">







        <div class="container">







            <div class="row">







                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                    <div class="hs_news_slider_bg_wrapper">







                        <div class="hs_news_slider_bg_overlay"></div>







                        <div class="row">







                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                                <div class="hs_news_slider_wrapper">







                                    <div class="owl-carousel owl-theme">







                                        <div class="item">







                                            <div class="hs_news_slider_cont_wrapper">







                                                <h2>Today Horoscope</h2>







                                                <h3>Believe in things that can fortunately<br> change your life</h3>







                                                <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem<br> quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>







                                                <div class="hs_effect_btn hs_news_slider_btn_wrapper">







                                                    <ul>







                                                        <li><a href="#" class="hs_btn_hover">Read more</a></li>







                                                    </ul>







                                                </div>







                                            </div>







                                        </div>







                                        <div class="item">







                                            <div class="hs_news_slider_cont_wrapper">







                                                <h2>Today Horoscope</h2>







                                                <h3>Believe in things that can fortunately<br> change your life</h3>







                                                <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem<br> quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>







                                                <div class="hs_effect_btn hs_news_slider_btn_wrapper">







                                                    <ul>







                                                        <li><a href="#" class="hs_btn_hover">Read more</a></li>







                                                    </ul>







                                                </div>







                                            </div>







                                        </div>







                                        <div class="item">







                                            <div class="hs_news_slider_cont_wrapper">







                                                <h2>Today Horoscope</h2>







                                                <h3>Believe in things that can fortunately<br> change your life</h3>







                                                <p>This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem<br> quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>







                                                <div class="hs_effect_btn hs_news_slider_btn_wrapper">







                                                    <ul>







                                                        <li><a href="#" class="hs_btn_hover">Read more</a></li>







                                                    </ul>







                                                </div>







                                            </div>







                                        </div>







                                    </div>







                                </div>







                            </div>







                        </div>







                    </div>







                </div>







            </div>







        </div>







    </div>----->







    <!-- hs news slider wrapper End -->







    <!-- speak to our expert start-->



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
$fetch_astrologerss=fetchbyresultByCondiction('astrologers',array('astro_approved_status'=>'1'))   ;                     //fetchbyresult('astrologers');
foreach($fetch_astrologerss as $fastrologers){
?>
                          <a href="<?php echo base_url('astrotalk_profile/'.$fastrologers['astro_id']); ?>">
                                <div class="item hs-astro-expert">
 <!--<li><a href="<?php echo base_url('astrotalk_profile/'.$fastrologers['astro_id']); ?>"><i class="fa fa-eye"></i>&nbsp; View Profile</a></li>-->
                                                      
                                <div class="hs_online_img_wrapper  astro-img-slide">
<div class="ast-img-01">
                                    <img src="<?php echo base_url();?>image/astrologers/<?php echo $fastrologers['astro_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="online_img" class="img-responsive" />
                                    <?php if($fastrologers['astro_online_status'] != '1') {
                                        ?>
                                    <span class="offline"></span>
                                    <?php } else{?>
                                        <span class="online"></span> <?php } ?>
                                </div>
                                </div>
                                <div class="hs-astro-exp-info">

                                    <h3><?php echo $fastrologers['astro_name'];?></h3>

                                    <!-- <p>Hindi , English , gujrati</p> -->
                                    <!-- pankaj -->
                                    <?php 
                    $a=cat_fetch_join('astrologers_multiplecategories','category_astrologer',$fastrologers['astro_id']);
                    $ak = array();
                   foreach($a as $b){
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
                   ?>
                                    <!-- <p>Vedic Astrology,Tarot Reading.</p> -->

                                </div>

                            </div></a>
<?php } ?>
                     <!-- astrologers -->      

                        </div>

                    </div>

                </div>

                <div class="col-sm-12">

                    <div class="hs-astro-list">

                        <a href="<?php echo base_url('astrotalk/all');?>" class="hs-astro-list-Btn-01">View All Astrologers </a>

                    </div>

                </div>

            </div>

        </div>

    </div>    



    <!-- speak to our expert end-->









    <!-- hs latest news wrapper Start -->




<!----------Start Blog Div----------------->


   <!-- <div class="hs_latest_news_main_wrapper">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="hs_about_heading_main_wrapper">

                        <div class="hs_about_heading_wrapper">

                            <h2>Our <span>Blogs</span></h2>

                            <h4><span></span></h4>

                           
                        </div>

                    </div>

                </div>

<?php $fetch_blog=fetchbyresultlimit('blog','3');
foreach($fetch_blog as $fblog){
?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                    <div class="hs_lest_news_box_wrapper">

                        <div class="hs_lest_news_img_wrapper">

                            <img src="<?php echo base_url();?>image/blog/<?php echo $fblog['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="blog_img">

                            <div class="hs_lest_news_date_wrapper">

                                <ul>
                                <?php 
                                $originalDate = $fblog['timestamp'];
                               
                                ?>
                               


                                    <li><?php echo $Date = date("d", strtotime($originalDate));?></li>

                                    <li><?php echo $yrmonth = date("M", strtotime($originalDate));?></li>

                                </ul>

                            </div>

                        </div>

                        <div class="hs_lest_news_cont_wrapper">

                            <h5><?php echo $fblog['title'];?></h5>

                            <p><?php  echo $bla = word_limiter(strip_tags($fblog['short_description']), 30);?></p>

                            <h4><a href="<?php echo base_url();?>blogs/<?php echo encoding($fblog['blog_id']);?>">Read More <i class="fa fa-long-arrow-right"></i></a></h4>
                            
                                      
                        </div>

                    </div>

                </div>
<?php } ?>
              

            </div>

        </div>

    </div>--->


<!----------End Blog Div----------------->




    <!-- hs latest news wrapper End -->

    <div class="clearfix"></div>

    <!-- hs-our product wrapper start -->



    <section class="hs_our_product_wrapper">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="hs_about_heading_main_wrapper">

                        <div class="hs_about_heading_wrapper wht">

                            <h2>Our <span>Products</span></h2>

                            <h4><span></span></h4>

                           <!---- <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum<br> auctor, nisi elit consequat hello Aenean world.</p>---->

                        </div>

                    </div>

                </div>

            </div>

            <div class="divi-01-"></div>

            <div class="row">
<!-- product -->
<?php 
//$fetch_prd=fetchbyresultlimit('product','3');
$fetch_prd=fetchbyresultwhere('product',array('pr_category'=> 1));
foreach($fetch_prd as $fpro){
?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                    <div class="hs_shop_prodt_main_box">

                        <div class="hs_shop_prodt_img_wrapper">

                            <img src="<?php echo base_url();?>image/product/<?php echo $fpro['pr_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="shop_product">

                                <?php if($fpro['pr_category']==1) {?>
                                <?php }else{?>
                                <a href="<?php echo base_url('astro_controller/add_to_card/'); ?><?php echo $fpro['pr_id']; ?>">Add to Cart</a>
                                <?php } ?>   
                        </div>

                        <div class="hs_shop_prodt_img_cont_wrapper">

                            <h2><a href="#"><?php echo $fpro['pr_title'];?></a></h2>
                            <?php if($fpro['pr_category']==2) {?>
                            <h3><?php echo $fpro['pr_pricedetail'];?></h3>
                            <?php }else{?>
                            <h3>₹ <?php echo $fpro['pr_finalprice'];?> &nbsp;<del><?php echo $fpro['pr_originalprice'];?></del>&nbsp; <span>(<?php echo $fpro['pr_discount'];?>% off)</span></h3>
                            <?php } ?> 
                            

                                <!-- <i class="fa fa-star"></i>

                                <i class="fa fa-star"></i>

                                <i class="fa fa-star"></i>

                                <i class="fa fa-star-o"></i>

                                <i class="fa fa-star-o"></i> -->

                                <!-- <h4>Offers <span>Special Price</span></h4> -->
                                <div class="hs-productdetailsBtn">
                                    <a href="<?php echo base_url();?>productdetails/<?php echo encoding($fpro['pr_id']);?>">View Details</a>
                                 </div>
                        </div>

                    </div>

                </div>
                <?php } ?>
<!-- product -->
               

            </div>

            <div class="hs-all-product">

                <a href="<?php echo base_url('product/all'); ?>">View All</a>

            </div>

        </div>

    </section>



    


    
    <div class="hs_testi_slider_main_wrapper">







        <div class="container">







            <div class="row">







                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                    <div class="hs_about_heading_main_wrapper">







                        <div class="hs_about_heading_wrapper">







                            <h2 style="color:#fff;">Our <span> Testimonials</span></h2>







                            <h4><span></span></h4>




                        </div>







                    </div>







                </div>







                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                    <div class="hs_testi_slider_wrapper">







                        <div class="owl-carousel owl-theme">

<!-- testimonial fetch-->
<?php 
$fetch_testimonia = fetchbyresult('testimonial');
if(!empty($fetch_testimonia)) {
foreach($fetch_testimonia as $ftestimonial){
?>
<div class="item">

 <div class="row">
     <div class="col-sm-12">
<div class="hs_testi_cont_main_wrapper">
  <div class="hs_testi_quote_wrapper">

   <i class="fa fa-quote-left"></i>

   </div>
   <div class="hs_testi_client_main_wrapper">

      <div class="hs_testi_client_cont_img_sec ">
    
 <img src="<?php echo base_url();?>image/testimonial/<?php echo $ftestimonial['image'];?>?nocache=<?php echo time(); ?> " onerror="this.src='<?php echo base_url();?>/image/default';" alt="testi_img">

  </div>

  </div>

     <div class="hs_testi_cont_inner_wrapper">

 <div class="hs_testi_quote_cont_wrapper">
 
   <p><?php echo $a = word_limiter(strip_tags( $ftestimonial['description']), 50);?></p>



                                                </div>



                                            </div>



                                            <div class="hs_testi_client_cont_sec">

                             <h2><?php echo $ftestimonial['name'] ;?></h2>



                                            </div>



                                        </div>



                                    </div>



                                </div>



                            </div>

                            <?php } } else { echo "No Data Found"; } ?>
<!-- testimonial -->
                           </div>







                    </div>







                </div>







            </div>







        </div>







    </div>







    <!-- hs testi slider wrapper End -->







    <!-- hs advert wrapper Start -->







    <!------<div class="hs_advert_main_wrapper">







        <div class="hs_advert_img_overlay"></div>







        <div class="container">







            <div class="row">







                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                    <div class="hs_advert_cont_wrapper">







                        <h1>STOP SELF-SABOTAGE: USING<br> THE ZODIAC TO GET YOUR LIFE BACK ON TRACK</h1>







                        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec<br> sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>







                        <div class="hs_effect_btn hs_advert_btn_wrapper">







                            <ul>







                                <li><a href="#" class="hs_btn_hover">Read more</a></li>







                            </ul>







                        </div>







                    </div>







                </div>







            </div>







        </div>







    </div>------->







    <!-- hs advert wrapper End -->







    <!-- hs client slider wrapper Start -->



<!-- 



    <div class="hs_client_slider_main_wrapper">







        <div class="container">







            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">







                <div class="hs_client_slider_wrapper">



                    <div class="owl-carousel owl-theme">



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/horoscope-icon-01.png" alt="client_img" />



                            </div>



                        </div>



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/horoscope-icon-02.png" alt="client_img" />



                            </div>



                        </div>



                        <div class="item">







                            <div class="hs_client_img_wrapper">







                                <img src="<?php echo base_url();?>assets/frontend/images/content/horoscope-icon-03.png" alt="client_img" />







                            </div>







                        </div>







                        <div class="item">







                            <div class="hs_client_img_wrapper">







                                <img src="<?php echo base_url();?>assets/frontend/images/content/horoscope-icon-04.png" alt="client_img" />







                            </div>







                        </div>







                        <div class="item">







                            <div class="hs_client_img_wrapper">







                                <img src="<?php echo base_url();?>assets/frontend/images/content/horoscope-icon-05.png" alt="client_img" />







                            </div>







                        </div>



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/horoscope-icon-06.png" alt="client_img" />



                            </div>



                        </div>



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/horoscope-icon-07.png" alt="client_img" />



                            </div>



                        </div>



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/horoscope-icon-08.png" alt="client_img" />



                            </div>



                        </div>



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/horoscope-icon-09.png" alt="client_img" />



                            </div>



                        </div>



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/horoscope-icon-10.png" alt="client_img" />



                            </div>



                        </div>



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/horoscope-icon-11.png" alt="client_img" />



                            </div>



                        </div>



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/horoscope-icon-12.png" alt="client_img" />



                            </div>



                        </div>







                    </div>







                </div>







            </div>







        </div>







    </div> -->



    <!-- hs client slider wrapper End -->



    <!-- hs online slider wrapper Start -->



	<!------Talk TO astrology---->  



  

    <!-- hs online slider wrapper End -->







    <!-- hs footer wrapper Start -->



    <!-- check session start -->
    <script type="text/javascript">
  function checklgn()
  {
    var id = document.getElementById('sesids').value;
    //alert(id);
    if(id == 0)
    {
      if(confirm('Login With User'))
      {
        $('#myModal').modal('show');  
      }
      else
      {
       
        return false;
      }
    }
    else
    {
       // alert("Hello! I am an alert box!!");
       window.location = "<?php echo base_url();?>userdashboard";
      //  action = "<?php echo base_url();?>raffle";
    } 
  }  </script>
    <!-- check session end -->



