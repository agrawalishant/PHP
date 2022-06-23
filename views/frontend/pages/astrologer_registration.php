
<style type="text/css">
  .change:hover{
    background: #fff;
    border: 1px solid #fe8a13;
    color: #fe8a13;
    transition: 0.4s all ease;
  }
.btn-sumbit{
  width: 350px;
  height: 40px;
  background: #fe8a13;
  color: white;
  font-size: large;
  border-radius: 20px;
  border: none;
}
#soo {
        display: none;
    }
</style>
<div class="hs_indx_title_main_wrapper">

  <div class="hs_title_img_overlay"></div>
    <div class="container">
      <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">
          <div class="hs_indx_title_left_wrapper">
            <h2>Astrologer Registration</h2>
          </div>
          
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">
          <div class="hs_indx_title_right_wrapper">
            <ul>
              <li><a href="#">Home</a> &nbsp;&nbsp;&nbsp;&gt; </li>
              <li>Astrologer Registration</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="top-01">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="form-heading">Astrologer Registration</h3>
          <?php if($this->session->flashdata('message') !='') { ?>
            <div class="alert alert-success">
              <?php echo $this->session->flashdata('message'); ?>  
            </div>
          <?php }  ?>
          <form action="<?php echo base_url('astro_submit'); ?>" method="post" enctype="multipart/form-data">
            <div class="margin">
             
              <div class="row">
                <div class="col-md-6">
                  <lable>Name<span class="span-tag-1">*</span> :</lable><br>
                  <input type="text" name="name" placeholder="Name" class="input-field" value="<?php echo set_value('name') ?>" required>
                </div>
                <div class="col-md-6">
                  <lable>Email:</lable><br>
                 
                  <input type="email" name="astro_email" placeholder="Email" id="email" class="input-field"onkeyup="ValidateEmail();"  value="<?php echo set_value('astro_email') ?>" required> 
                   
                  <span id="lblError" style="color: red"></span>
                </div>
                
              </div>



                 



                 <div class="row margin-top">



                   



                   <div class="col-md-6">



                     



                     <lable>Mobile No.<span class="span-tag-1">*</span> :</lable><br>



                     



                     <select class="input-select">



                       



                       <option>India - (+91)</option>



                       



                       <option>India - (+91)</option>



                       



                       <option>India - (+91)</option>



                       



                     </select>



                     



                     <input type="text" name="mobile" placeholder="Mobile No." class="input-field-01" id="contact_mobilenumber" pattern="[1-9]{1}[0-9]{9}" maxlength="10" value="<?php echo set_value('mobile') ?>" required>



                     



                   </div>



                   



                   <div class="col-md-6">



                     



                     <lable>Alternate No. :</lable><br>



                     



                     <select class="input-select">



                       



                       <option>India - (+91)</option>



                       



                       <option>India - (+91)</option>



                       



                       <option>India - (+91)</option>



                       



                     </select>



                     



                     <input type="text" placeholder="Whatsapp No." id="contact_mobilenumber" pattern="[1-9]{1}[0-9]{9}" maxlength="10" class="input-field-01">



                     



                   </div>



                   



                 </div>



                 



                 <div class="row margin-top">



                   



                   <div class="col-md-6">



                     



                     <lable>Gender<span class="span-tag-1">*</span> :</lable><br>



                     



                     <select class="input-select-01" name="gender">



                       



                       <!-- <option>Select Gender</option> -->



                       



                       <option value="male">Male</option>



                       



                       <option value="female">Female</option>



                       



                     </select>



                     



                   </div>



                   



                   <div class="col-md-6">
                     <lable>Date Of Birth<span class="span-tag-1">*</span> :</lable><br>
                     <input type="text" name="dob" id="datepicker"  name="dob" class="input-field" value="<?php echo set_value('dob') ?>" autocomplete="off"> 
                   </div>



                 </div>



                 <div class="row margin-top">



                   <div class="col-md-6">



                     <lable>Consultant Type<span class="span-tag-1">*</span> :</lable><br>



                     <select class="input-select-01" >



                       <option>Astrologer</option>



                     </select>



                   </div>



                   <div class="col-md-6">



                     <lable>Skill<span class="span-tag-1">*</span> :</lable><br>



                     <select name="skill" class="input-select-01" value="<?php echo set_value('skill') ?>" required="required">
                       <option value="">Select Your Skill</option>
                        <?php $all = fetchbyresult('category_astrologer');
                         foreach($all as $res){ ?>
                       <option value="<?php echo $res['cat_astr_id'];?>"><?php echo $res['cat_astr_title'];?></option>
                       <?php } ?>
                     </select>



                   </div>



                 </div>



                 <div class="row margin-top">



                   <div class="col-md-6">



                     <lable>Language<span class="span-tag-1">*</span> :</lable><br>
                     <input type="text" name="language" placeholder="Hindi,English" class="input-field" value="<?php echo set_value('language') ?>">
                   </div>



                   <div class="col-md-6">
                    <lable>Experience<span class="span-tag-1">*</span> :</lable><br>
                    <input type="text" name="exp" placeholder="Experience" class="input-field" value="<?php echo set_value('exp') ?>" required>
                   </div>



                 </div>



                 <div class="row margin-top">



                   <div class="col-md-6">



                     <lable>Complete Address<span class="span-tag-1">*</span> :</lable><br>



                     <input type="text" name="address" placeholder="Address" class="input-field" value="<?php echo set_value('address') ?>" required>



                   </div>



                   <div class="col-md-6">



                     <lable>City<span class="span-tag-1">*</span> :</lable><br>



                     <input type="text" name="city" placeholder="City" class="input-field" value="<?php echo set_value('city') ?>" required>



                   </div>



                 </div>



                 <div class="row margin-top">



                   <div class="col-md-6">



                     <lable>State<span class="span-tag-1">*</span> :</lable><br>



                     <input type="text" name="state" placeholder="State" class="input-field" value="<?php echo set_value('state') ?>" required>



                   </div>



                   <div class="col-md-6">



                     <lable>Country<span class="span-tag-1">*</span> :</lable><br>



                     <input type="text" name="country" placeholder="Country" class="input-field" value="<?php echo set_value('country') ?>" required>



                   </div>



                 </div>



                 <div class="row margin-top">



                   <div class="col-md-6">



                     <lable>Pincode<span class="span-tag-1">*</span> :</lable><br>



                     <input type="text" name="pincode" placeholder="Pincode" class="input-field" value="<?php echo set_value('pincode') ?>" required>



                   </div>
                   <div class="col-md-6">



<lable>Password<span class="span-tag-1">*</span> :</lable><br>



<input type="password" name="astro_password" placeholder="Enter password" class="input-field" value="<?php echo set_value('astro_password') ?>" required>



</div>



                 </div>



                 <div class="row margin-top">



                   <div class="col-md-6">



                     <lable>Bank Account Number:</lable><br>



                     <input type="text" name="ac_number" placeholder="Bank Account Number" class="input-field" value="<?php echo set_value('ac_number') ?>">



                   </div>



                   <div class="col-md-6">



                     <lable>Account Type:<span class="span-tag-1">*</span> :</lable><br>



                     <select name="ac_type" class="input-select-01">



                       <option value=" ">Select Account Type:</option>



                       <option value="saving">Saving</option>



                       <option value="current">Current</option>



                     </select>



                   </div>



                 </div>



                 <div class="row margin-top">



                   <div class="col-md-6">



                     <lable>IFSC Code :</lable><br>



                     <input type="text" name="fisc" placeholder="IFSC Code" class="input-field" value="<?php echo set_value('fisc') ?>">



                   </div>



                   <div class="col-md-6">



                     <lable>Account Holder Name :</lable><br>



                     <input type="text" name="ac_name" placeholder="Bank Account Name" class="input-field" value="<?php echo set_value('ac_name') ?>">



                   </div>



                 </div>



                 <div class="row margin-top">



                   <div class="col-md-6">



                     <lable>PAN Card Number :</lable><br>



                     <input type="text" name="pan" placeholder="PAN Card Number" class="input-field" value="<?php echo set_value('pan') ?>">



                   </div>



                   <div class="col-md-6">



                     <lable>Aadhar Card Number :</lable><br>



                     <input type="text" name="aadhar" placeholder="Aadhar Card Number" class="input-field" value="<?php echo set_value('aadhar') ?>">



                   </div>



                 </div>



                 <div class="row margin-top">



                   <div class="col-md-6">



                     <lable>Profile Pic<span class="span-tag-1">*</span></lable> <sub>(jpg, png, jpeg only)</sub><br>



                     <!--<input type="file" name="profile_image" class="input-field" required>-->
    <input type="file" name="profile_image" value="upload" class="input-field" id="fUpload" onchange="checkextension()" required>
                


                   </div>



                   <div class="col-md-6">



                     <lable>Upload ID Proof<span class="span-tag-1">*</span></lable> <sub>(jpg, png, jpeg only)</sub><br>



                     <!--<input type="file" name="idproof" class="input-field" required>-->
 <input type="file" name="idproof" value="upload" class="input-field" id="fUpload" onchange="checkextension()" required>


                   </div>



                 </div>



                 <div class="row margin-top">



                    <div class="col-md-12">
                      <lable>Are you working on any other online portal?</lable><br>
                      <input type="radio" name="yes" class="input-radio" checked onclick="myfun();"> No
                      <input type="radio" name="yes" class="input-radio" onclick="myfunction();"> Yes
                    </div>
                  </div>
                  
                  <div class="row margin-top"> 
                    <div id="soo">
                      <div class="col-md-6">
                        <lable>Name of sites:</lable><br>
                        <input type="text" name="site" id="no" placeholder="Name of portals where you have worked" class="form-control" />
                      </div>

                      <div class="col-md-6">
                        <lable>Monthly Earning</lable><br>
                        <input type="text" name="monthly_income" id="nos" placeholder="Enter Your Monthly Income from Astrology" class="form-control" />
                      </div>
                    </div>  
                  </div>
                  
                  <div class="row margin-top">  
                    <div class="col-md-12">
                      <lable>Short bio :</lable><br>
                      <input type="text" name="short_bio" placeholder="Short bio" class="form-control" value="<?php echo set_value('short_bio') ?>" />
                    </div>
                  </div>
                  
                  <div class="row margin-top">  
                    <div class="col-md-12">
                      <lable>Long bio :</lable><br>
                      <input type="text" name="long_bio" class="form-control" style="height:80px;" value="<?php echo set_value('long_bio') ?>"/>
                    </div>
                  </div>

                  <div class="row margin-top">
                    <div class="col-md-12"><center>
                      <input type="submit" name="submit" value="Submit" class="btn-sumbit change" /></center>
                    </div>
                  </div>
            </div>
          </form>
        </div>  
      </div>
    </div>
  </section>
   <?php 
  $emaiddetail=fetchbyresult('astrologers');
foreach($emaiddetail as $ed){
  ?>
  <input type="hidden" name="emailhidden" id="emailhidden" value="<?php echo $ed['astro_email'];?>">
  <?php } ?>
 
<script type="text/javascript">
//     function checkemail() {
        
//         var email = document.getElementById("email").value;
//          var databaseemail= document.getElementById('emailhidden').value;
//         // alert(databaseemail);
//         //var lblError = document.getElementById("danger_email");
     
//          if(email == databaseemail)
//   {
//       alert(databaseemail);
       
//       document.getElementById('danger_email').innerHTML="EMAIL ALREADY EXISTS";
//       return false;
//   }
  //  }
</script>
<script type="text/javascript">
    function ValidateEmail() {
        var email = document.getElementById("email").value;
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!expr.test(email)) {
            lblError.innerHTML = "Invalid email address.";
        }
    }
</script>
  <script>
          function checkextension() {
  var file = document.querySelector("#fUpload");
  if ( /\.(jpe?g|png|gif)$/i.test(file.files[0].name) === false ) { alert("not an image!"); }
}
  </script>
  <!-- for form contact mobile no -->
<script type="text/javascript">
   $("#contact_mobilenumber").on("input", function() {
  var nonNumReg = /[^0-9]/g
  $(this).val($(this).val().replace(nonNumReg, ''));
});
    </script>
 