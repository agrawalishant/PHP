<?php $fetch_coninfo=fetchbyrow('websiteinformation');?>
<div class="hs_indx_title_main_wrapper">


        <div class="hs_title_img_overlay"></div>


        <div class="container">


            <div class="row">


                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">


                    <div class="hs_indx_title_left_wrapper">


                        <h1 style="font-size: 20px;color: #ffffff;text-transform: uppercase;">Contact Us</h1>
<?php echo validation_errors(); ?>

                    </div>


                </div>


                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">


                    <div class="hs_indx_title_right_wrapper">


                        <ul>


                            <li><a href="#">Home</a> &nbsp;&nbsp;&nbsp;&gt; </li>


                            <li>Contact Us</li>


                        </ul>


                    </div>


                </div>


            </div>


        </div>



    </div>



<section class="clear">

  

   <div class="container clear-01">

     

     <div class="row">

       

       <div class="col-sm-12">

         

         <div class="hs_about_heading_main_wrapper">



               <div class="hs_about_heading_wrapper">


                   <h2>Contact <span> Us</span></h2>
  <!--flash message start-->
  <?php if($this->session->flashdata('success') !='') { ?>
                <div class="alert alert-success text-center" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div><?php } ?>
                <!--flash message end-->


                   <h4><span></span></h4>


               </div>

          </div>

       </div>

     </div>

     <div class="row">

       <div class="col-md-5 bg-color">

         <div class="contact-div">


           <div>

             <h3 class="contact-heading">Enquiry Form</h3>

           </div>
           <?php echo form_open(base_url().'enquiry'); ?>
           <div class="form-div">

           <!-- <input type="email" placeholder="Email" class="inputfield" onfocus="this.placeholder=''" onblur="this.placeholder='Email'"> -->
              <div class="form-group">
              <lable>Name</lable>
              <span style="color:red;" class="alert-btn"><?php echo form_error('enq_name');?></span>
                <input type="text" placeholder="Name" class="inputfield" name="enq_name" value="<?php echo set_value('enq_name');?>" required>

              </div>
              <div class="form-group">
              <lable>Email</lable>
              <span style="color:red;" class="alert-btn"><?php echo form_error('enq_email');?></span>
                <input type="email" placeholder="Email" class="inputfield" name="enq_email" value="<?php echo set_value('enq_email');?>" required>

              </div>
              <div class="form-group">
              <lable>Phone</lable>
              <span style="color:red;" class="alert-btn"><?php echo form_error('enq_mobilenumber');?></span>
                  <input type="text" id="contact_mobilenumber" placeholder="Phone Number" class="inputfield" name="enq_mobilenumber" pattern="\d{10}" maxlength="10" value="<?php echo set_value('enq_mobilenumber');?>" required>

              </div>
              <div class="form-group">
              <lable>Query Related To</lable>
              <span style="color:red;" class="alert-btn"><?php echo form_error('enq_relatedto');?></span>
                  <select class="form-control" name="enq_relatedto">
                    <option >Choose your query</option>
                    <option value="career related query">career related query</option>
                    <option value="marrige related query">marrige related query</option>
                    <option value="other">other</option>
                  </select>

              </div>
              <lable>Message</lable>
              <span style="color:red;" class="alert-btn"><?php echo form_error('enq_message');?></span>
                <textarea type="text" placeholder="Message" class="input-textarea" name="enq_message" value="<?php echo set_value('enq_message');?>" required></textarea>

                <!-- <?php //echo form_close(); ?> -->
           </div>

           <div class="btn-main-div">
           <input type="submit" value="SUBMIT" class="send-btn">
             <!-- <a href="#" class="send-btn">Send Message</a> -->
             <?php echo form_close(); ?>
           </div>

         </div>


       </div>


      <div class="col-md-5 bg-color">

          <div class="row contact-div">
           
           <div class="col-md-12">

             <div>

               <h3 class="contact-heading">Contact Info</h3>

             </div>

      </div>

          <div class="form-div">

            <div class="col-md-12 width">

               <div>

                 <i class="fa fa-map-marker contact-icons" aria-hidden="true"></i>

                 

               </div>

               

             </div>

             
             <div class="col-md-12 width-01">

               <div class="top">

                 <h2 class="contact-icons-heading">Address:</h2>

                 <p class="contact-icons-paragraph"><?php echo $fetch_coninfo->address; ?></p>
                 
               </div>

               
             </div>


           </div>

           

           <div class="form-div">

           

             <div class="col-md-12 width">

             

               <div>

               

                 <i class="fa fa-phone contact-icons" aria-hidden="true"></i>

               

               </div>

             

             </div>

             

             <div class="col-md-12 width-01">

               <div class="top">

                 <h2 class="contact-icons-heading">Phone:</h2>

                 <p class="contact-icons-paragraph"><?php echo $fetch_coninfo->phone; ?></p>

               </div>

             </div>

           </div>

           <div class="form-div">

             <div class="col-md-12 width">

               <div>

                 <i class="fa fa-pencil contact-icons" aria-hidden="true"></i>

               </div>

             

             </div>

             

             <div class="col-md-12 width-01">

             

               <div class="top">

               

                 <h2 class="contact-icons-heading">Email:</h2>


                 <p class="contact-icons-paragraph"><?php echo $fetch_coninfo->email; ?></p>

               

               </div>

             

             </div>

             

             <div>

             

               <div class="col-md-12">

               

                 <div>

                 

                   <h3 class="contact-heading">Social Icons</h3>

                 

                 </div>

               

               </div>

               

               <div class="col-md-12">

               

                 <div class="align">

                 

                   <a href="<?php echo $fetch_coninfo->facebook_link; ?>" class="social-links"><i class="fa fa-facebook social-icon" aria-hidden="true"></i></a>

                   

                   <a href="<?php echo $fetch_coninfo->twitter_link; ?>" class="social-links"><i class="fa fa-twitter social-icon" aria-hidden="true"></i></a>

                   

                   <a href="<?php echo $fetch_coninfo->google_link; ?>" class="social-links"><i class="fa fa-google social-icon" aria-hidden="true"></i></a>

                   

                   <!-- <a href="#" class="social-links"><i class="fa fa-youtube-play social-icon" aria-hidden="true"></i></a> -->

                 

                 </div>

                 

               </div>

             

             </div>

           

           </div>

         

         </div>

       

       </div>

     

     </div>

  

  </div>



</section>




<!-- for form contact mobile no -->
<script type="text/javascript">
   $("#contact_mobilenumber").on("input", function() {
  var nonNumReg = /[^0-9]/g
  $(this).val($(this).val().replace(nonNumReg, ''));
});
    </script>
    <!-- for form contact mobile no -->