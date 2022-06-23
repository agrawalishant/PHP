<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<div class="hs_indx_title_main_wrapper">



        <div class="hs_title_img_overlay"></div>



        <div class="container">



            <div class="row">



                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">



                    <div class="hs_indx_title_left_wrapper">



                        <h2>Astrologer Login</h2>



                    </div>



                </div>



                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">



                    <div class="hs_indx_title_right_wrapper">



                        <ul>



                            <li><a href="#">Home</a> &nbsp;&nbsp;&nbsp;&gt; </li>



                            <li>Astrologer Login</li>



                        </ul>



                    </div>



                </div>



            </div>



        </div>

</div>



<section class="login-form hs_astrology_team_main_wrapper">

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <h3 class="login-heading">Astrologers Login</h3>

        <div class="margin-01">
        <form id='myForm12' method="post" >
          <div class="row">
          
            <div class="col-md-12">

              <label class="input-lable">Email:</label><br>

              <input type="email" placeholder="Email ID" class="input-text" name="astro_email" required="required">

            </div>

            <div class="col-md-12">

              <label class="input-lable">Password:</label><br>

              <input type="password" placeholder="Password" class="input-text" name="astro_password" required="required">

            </div>
            
            <div class="col-md-12 checkbox-parent">
            <a href="#" class="hs-astro-fgtBtn" data-toggle="modal" data-target="#astroforgetpasswordmodel">forgot password ?</a>
                       
              <!-- <input type="checkbox" class="check-box"><p class="checkbox-paragraph">By signing in, you agree to our <a href="#" class="TandC-link">terms and conditions</a></p> -->
              <p class="checkbox-paragraph">By signing in, you agree to our <a href="<?php echo base_url();?>privacypolicy" target="_blank" class="TandC-link">terms and conditions</a></p>
            </div>

            <div class="col-md-12 btn-1" style="border-bottom: 0px; !important">
            <input type="button" name="submitnormal_btn" class="login-btn" value="submit" id="submitnormal_btn" >
              <!-- <a href="#" class="login-btn">Login</a> -->

            </div>

            <!-- <div class="col-md-12 checkbox-parent"> -->

              <!-- <input type="checkbox" class="check-box"><p class="checkbox-paragraph">By signing in, you agree to our <a href="#" class="TandC-link">terms and conditions</a></p> -->
              <!-- <p class="checkbox-paragraph">By signing in, you agree to our <a href="<?php echo base_url();?>privacypolicy" target="_blank" class="TandC-link">terms and conditions</a></p> -->
            
            <!-- </div> -->

            <!-- <div class="col-md-12 btn"> -->

              <!-- <a href="#" class="login-btn-01">

                <i class="fa fa-google-plus" aria-hidden="true"></i> Google Login

              </a> -->
              <!-- <input type="button" name="social_btn" class="login-btn-01" value="Google Login" id="social_btn"> -->
            <!-- </div> -->
           
          </div>
          </form>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- forget password model -->

<div class="modal fade" id="astroforgetpasswordmodel" role="dialog">
    <div class="modal-dialog hs_astro_user_lgoin">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">LogIn</h4> -->
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-5 hs-user-bnimg">
                        <div>
                            <img src="<?php echo base_url();?>image/websiteimages/user-login-image.png" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-sm-7">
                       
                        <br>
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <h3 style="text-align: center;">Forget Password</h3>
                                  <?php echo form_open(base_url().'astrologer_forgetpassword', array('class' => 'login-filed')); ?>  <div class="form-group hs-usr-login-field">
                                        <label> <i class="fa fa-envelope-o" aria-hidden="true"></i> </label>
                                        <input type="text" name="emailpassword" placeholder="Email id / Password" class="form-control" required>
                                        <?php $us = $this->uri->segment(2); ?>
                                        <input type="hidden" name="uri" value="<?php echo $us; ?>" />
                                    </div>
                                    <!-- <div class="form-group hs-usr-login-field">
                                        <label> <i class="fa fa-lock" aria-hidden="true"></i> </label>
                                        <input type="password" name="user_password" placeholder="Password" class="form-control" required>
                                    </div> -->
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> -->
                       <!-- <a href="#" class="hs-astro-fgtBtn" data-toggle="modal" data-target="#forgetpasswordmodel">forgot password ?</a> -->
                                    <div class="hs-submodlBtn">
                                        <input type="submit" name="button" value="submit" class="form-control"> <br>
                                    </div>
                                   <?php echo form_close(); ?>
                            </div>
                          
                        </div>
                    </div>
                </div>
                <!-- <button type="submit">Submit</button> -->
            </div>
           <!--  <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>
<!-- forget password model -->

<script>

$('#submitnormal_btn').click(function(){
 
  
    var form = document.getElementById("myForm12");
    
    form.action = "<?php echo base_url();?>astrologer_login_submit";
    form.submit();
});

$('#social_btn').click(function(){
    //alert("hello");
    
    var form = document.getElementById("myForm12");
    form.action = "<?php echo base_url();?>astrologer_login_submit";
    form.submit();
});

</script>
