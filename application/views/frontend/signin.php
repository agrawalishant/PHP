<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
<style>
    .dv-captcha
    {
        height: 40px;
        width: 260px;
        color: #fdc405;
        background: rgb(55 55 55);
        padding: 8px 50px;
        font-size: 20px;
        border-radius: 4px;
        font-family: 'Kaushan Script', cursive;
    }
    
</style>

<section id="features-app" class="padd-80 head-section">
    <div class="container">

        <div class="row"> 
            <div class="col-md-3"></div>
            <div class="col-md-6 co-sm-12"> 
                <h2>Sign-In</h2>
                <div class="sr-line"></div>
                
                  <ul class="nav nav-tabs justify-content-center">
                    <?php if($login_failed != 'Failed') { ?>      
                    <li><a class="active" data-toggle="tab" href="#home">Student Registration</a></li>
                    <li class="tb-2"><a data-toggle="tab" href="#menu1">Instructor Registration</a></li>
                    <?php } else { ?> 
                    <li class="tb-2"><a data-toggle="tab" href="#home2">Student Registration</a></li>
                    <li ><a class="active" data-toggle="tab" href="#menu2">Instructor Registration</a></li>
                    <?php } ?>
                  </ul>

            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">

            <div class="col-md-3"></div>

            <div class="col-md-6 co-sm-12">
            <div class="tab-content">
                 
                <?php if($login_failed != 'Failed') { ?> 
            <!--Student-->    
                <div id="home" class="tab-pane fade in active show">
                    
                    <h3>Register as Student</h3>
                    <?php echo form_open('Student-Signup',['class'=>'form-content danger stuform1']); ?>    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="sname" value="<?php echo set_value('sname'); ?>" class="form-control">
                            <span ><?php echo form_error('sname'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="semail" value="<?php echo set_value('semail'); ?>" class="form-control">
                            <span ><?php echo form_error('semail'); ?></span>
                            <?php if($this->session->flashdata('scheckemail') !='') { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $this->session->flashdata('scheckemail'); ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="form-group Pas-icon">
                            <label>Create password</label>
                            <input type="password" name="spwd" class="form-control" id="myInputs">
                            <i class="fa fa-eye-slash" onclick="myFunctions()"></i>
                            <span ><?php echo form_error('spwd'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="cpwd" class="form-control">
                            <span ><?php echo form_error('cpwd'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="smobile" value="<?php echo set_value('smobile'); ?>" class="form-control">
                            <span ><?php echo form_error('smobile'); ?></span>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Gender</label><br>
                                    <input type="radio" name="sgender" value="Male" checked /> Male
                                    <input type="radio" name="sgender" value="Female" /> Female   
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Date Of Birth</label>
                                    <!--<input type="Date" name="sdob" max="<?php //echo date('Y-m-d'); ?>" class="form-control">-->
                                    <input type="text" placeholder="Select Date" name="sdob" id="datepickerstu">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="saddress" value="<?php echo set_value('saddress'); ?>" ></textarea>
                            <span ><?php echo form_error('saddress'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Postcode</label>
                            <input type="text" name="spin" value="<?php echo set_value('spin'); ?>" class="form-control">
                            <span ><?php echo form_error('spin'); ?></span>
                        </div>
                        
                        <!--<div class="form-group">-->
                            <!--<label>Captcha</label> -->
                            
                        <!--    <div class="input-group">-->
                        <!--       <img src="<?php echo site_url('Student/cptimg');?>"  style="height: 40px; width: 260px;">-->
                        <!--    </div>-->
                            
                          
                            
                        <!--    <span id="showgreen" ></span>-->
                        <!--    <span id="showred" ></span>-->
                           
                           <!--<input type="hidden" class="form-control " id="enqirycapchacheck" value="<?php //echo substr(str_shuffle($code), 0, 4); ?>" />-->
                        <!--    <input type="text" class="form-control " placeholder="Enter Captcha" name="enqirycapcha" id="enqirycapcha" onkeyup="checkcaptcha();" style="margin-top:10px;" />-->
                        <!--    <input type="hidden" name="stucaptcha" value="" class="stucaptcha" id="clstuchek" /> -->
                        <!--</div>-->

                        <div class="form-group">
                            <input type="checkbox" id="checkboxstu" /> I Agree 
                            <a href="<?php echo base_url('Terms-Conditions');?>" target="_blank"> Terms & Conditions</a>
                        </div>

                        <div class="SignIn-btn">
                            <?php echo form_submit('submit','Register',['class'=>'SignIn-btn']); ?>   
                            <!--<button type="button" name="Register" value="Register" class="SignIn-btn" onclick="return ckcaptchafstu();" >Register</button>-->
                        </div>

                        <div class="loginTab">
                            <!--<h4>You have already Sign-up ?-->
                            <?php //echo anchor('login','Log-In'); ?>    
                            <!--</h4>-->
                        </div>
                    </form>
                </div> 
            <!--Instructor-->
                <div id="menu1" class="tab-pane fade">
                    <h3>Register as Instructor</h3>
                    <?php if($this->session->flashdata('datainsert') !='') { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('datainsert'); ?>
                        </div>
                    <?php } ?>
                        <?php echo form_open_multipart('Instructor-Signup',['class'=>'form-content danger instform1']); ?>            
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control">
                        <span ><?php echo form_error('name'); ?></span>
                    </div>

                    <div class="form-group">
                       <label>Email</label>
                        <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
                        <span ><?php echo form_error('email'); ?></span>
                        <?php if($this->session->flashdata('checkemail') !='') { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('checkemail'); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="form-group Pas-icon">
                        <label>Create password</label>
                        <input type="password" name="pwd" class="form-control" id="myInput">
                        <i class="fa fa-eye-slash" onclick="myFunction()"></i>
                        <!-- <i class="fa fa-eye-slash" aria-hidden="true"></i> -->
                        <span ><?php echo form_error('pwd'); ?></span>
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="c_pwd" class="form-control">
                        <span ><?php echo form_error('c_pwd'); ?></span>
                    </div>

                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" class="form-control">
                        <span ><?php echo form_error('mobile'); ?></span>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label>Gender</label><br>
                                <input type="radio" name="gender" value="Male" checked /> Male
                                <input type="radio" name="gender" value="Female" /> Female   
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label>Date Of Birth</label>
                                <!--<input type="Date" name="dob" max="<?php //echo date('Y-m-d'); ?>" class="form-control">-->
                                <input type="text" placeholder="Select Date" name="dob" id="datepicker1">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Category of Vechical</label><br>
                        <input type="radio" name="cat" value="1" checked /> Manual
                        <input type="radio" name="cat" value="2" /> Automatic
                        <!--<input type="radio" name="cat" value="3" /> Both   -->
                    </div>

                    <div class="form-group">
                        <label>License Number</label>
                        <input type="text" name="license_no" value="<?php echo set_value('license_no'); ?>" class="form-control">
                        <span ><?php echo form_error('license_no'); ?></span>
                        <?php if($this->session->flashdata('checklicence') !='') { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('checklicence'); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>ID proof-</label>
                        <input type="file" name="photo" id="photo" class="form-control" onchange="ValidateExtension();">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" value="<?php echo set_value('address'); ?>" ></textarea>
                        <span ><?php echo form_error('address'); ?></span>
                    </div>

                    <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" name="pin" value="<?php echo set_value('pin'); ?>" class="form-control">
                        <span ><?php echo form_error('pin'); ?></span>
                    </div>
                    
                    <!--<div class="form-group">-->
                            <!--<label>Captcha</label> -->
                            
                    <!--        <div class="input-group">-->
                    <!--           <img src="<?php echo site_url('Instructor/cptimg');?>"  style="height: 40px; width: 260px;">-->
                    <!--        </div>-->
                    <!--        <span id="showgreeninst" ></span>-->
                    <!--        <span id="showredinst" ></span>-->
                           <?php //if($this->session->flashdata('checkcapt') !='') { ?>
                            <!--<div class="alert alert-danger" role="alert">-->
                                <?php //echo $this->session->flashdata('checkcapt'); ?>
                            <!--</div>-->
                            <?php //} ?>
                           <!--<input type="text" class="form-control " placeholder="Enter Captcha" name="enqirycapcha" id="enqiryinstcapcha" onkeyup="checkinstcaptcha();" style="margin-top:10px;" />-->
                           <!-- <input type="hidden" name="instcaptcha" value="" class="instcaptcha" id="clintchek" /> -->
                    <!--    </div>-->
                        
                        <div class="form-group">
                            <input type="checkbox" id="checkboxInst1" /> I Agree
                            <a href="<?php echo base_url('Terms-Conditions2');?>" target="_blank"> Student Terms & Conditions</a> AND 
                            <a href="<?php echo base_url('Terms-Conditions');?>" target="_blank"> Instructor Terms & Conditions</a>
                        </div>
                        
                    <div class="SignIn-btn">
                        <!--<button type="button" name="Register" value="Register" class="SignIn-btn" onclick="return ckcaptchafin1();" >Register</button>-->
                        <?php echo form_submit('submit','Register',['class'=>'SignIn-btn']); ?>       
                    </div>

                    <div class="loginTab">
                        <!--<h4>You have already Sign-up ?-->
                        <?php //echo anchor('Driving/login','Log-In'); ?>    
                        <!--</h4>-->
                    </div>
                    </form>
                </div>
            
                <?php } else { ?>
            <!--Instructor-->
                <div id="menu2" class="tab-pane fade in active show">
                    <h3>Register as Instructor</h3>
                    <?php if($this->session->flashdata('datainsert') !='') { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('datainsert'); ?>
                        </div>
                    <?php } ?>
                    
                        <?php echo form_open_multipart('Instructor-Signup',['class'=>'form-content danger instform2']); ?>            
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control">
                        <span ><?php echo form_error('name'); ?></span>
                    </div>

                    <div class="form-group">
                       <label>Email</label>
                        <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
                        <span ><?php echo form_error('email'); ?></span>
                        <?php if($this->session->flashdata('checkemail') !='') { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('checkemail'); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="form-group Pas-icon">
                        <label>Create password</label>
                        <input type="password" name="pwd" class="form-control" id="myInput">
                        <i class="fa fa-eye-slash" onclick="myFunction()"></i>
                        <!-- <i class="fa fa-eye-slash" aria-hidden="true"></i> -->
                        <span ><?php echo form_error('pwd'); ?></span>
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="c_pwd" class="form-control">
                        <span ><?php echo form_error('c_pwd'); ?></span>
                    </div>

                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" class="form-control">
                        <span ><?php echo form_error('mobile'); ?></span>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <label>Gender</label><br>
                                <input type="radio" name="gender" value="Male" checked /> Male
                                <input type="radio" name="gender" value="Female" /> Female   
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <label>Date Of Birth</label>
                                <!--<input type="Date" name="dob" max="<?php //echo date('Y-m-d'); ?>" class="form-control">-->
                                <input type="text" placeholder="Select Date" name="dob" id="datepicker1">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Category of Vechical</label><br>
                        <input type="radio" name="cat" value="1" checked /> Manual
                        <input type="radio" name="cat" value="2" /> Automatic
                        <!--<input type="radio" name="cat" value="3" /> Both   -->
                    </div>
                    
                    <div class="form-group">
                        <label>License Number</label>
                        <input type="text" name="license_no" value="<?php echo set_value('license_no'); ?>" class="form-control">
                        <span ><?php echo form_error('license_no'); ?></span>
                        <?php if($this->session->flashdata('checklicence') !='') { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('checklicence'); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label>ID proof-</label>
                        <input type="file" name="photo" id="photo1" class="form-control" onchange="ImageValidateExtension();">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" value="<?php echo set_value('address'); ?>" ></textarea>
                        <span ><?php echo form_error('address'); ?></span>
                    </div>

                    <div class="form-group">
                        <label>Postcode</label>
                        <input type="text" name="pin" value="<?php echo set_value('pin'); ?>" class="form-control">
                        <span ><?php echo form_error('pin'); ?></span>
                    </div>

                    <!--<div class="form-group">-->
                            <!--<label>Captcha</label> -->
                            
                    <!--        <div class="input-group">-->
                    <!--           <img src="<?php echo site_url('Instructor/cptimg');?>"  style="height: 40px; width: 260px;">-->
                    <!--        </div>-->
                    <!--        <span id="showgreeninst" ></span>-->
                    <!--        <span id="showredinst" ></span>-->
                           
                    <!--       <input type="text" class="form-control " placeholder="Enter Captcha" name="enqirycapcha" id="enqiryinstcapcha" onkeyup="checkinstcaptcha();" style="margin-top:10px;" />-->
                    <!--        <input type="hidden" name="instcaptcha" value="" class="instcaptcha" id="instcaptcha" />                   -->
                    <!--    </div>-->

                    <div class="form-group">
                        <input type="checkbox" id="checkboxInst2" /> I Agree
                        <a href="<?php echo base_url('Terms-Conditions2');?>" target="_blank"> Student Terms & Conditions</a> AND 
                        <a href="<?php echo base_url('Terms-Conditions');?>" target="_blank"> Instructor Terms & Conditions</a>
                    </div>

                    <div class="SignIn-btn">
                        <!--<button type="button" name="Register" value="Register" class="SignIn-btn" onclick="return ckcaptchafin();" >Register</button>-->
                        <?php echo form_submit('submit','Register',['class'=>'SignIn-btn'],['onclick'=>'ckcaptchafin();']); ?>       
                    </div>

                    <div class="loginTab">
                        <!--<h4>You have already Sign-up ?-->
                        <?php //echo anchor('Driving/login','Log-In'); ?>    
                        <!--</h4>-->
                    </div>
                    </form>
                </div>
            <!--Student-->    
                <div id="home2" class="tab-pane fade ">
                     <h3>Register as Student</h3>
                     <?php echo form_open(base_url().'Student-Signup',['class'=>'form-content danger stuform2']); ?>    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="sname" value="<?php echo set_value('sname'); ?>" class="form-control">
                            <span ><?php echo form_error('sname'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="semail" value="<?php echo set_value('semail'); ?>" class="form-control">
                            <span ><?php echo form_error('semail'); ?></span>
                            <?php if($this->session->flashdata('scheckemail') !='') { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $this->session->flashdata('scheckemail'); ?>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="form-group Pas-icon">
                            <label>Create password</label>
                            <input type="password" name="spwd" class="form-control" id="myInputs">
                            <i class="fa fa-eye-slash" onclick="myFunctions()"></i>
                            <span ><?php echo form_error('spwd'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="cpwd" class="form-control">
                            <span ><?php echo form_error('cpwd'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="smobile" value="<?php echo set_value('smobile'); ?>" class="form-control">
                            <span ><?php echo form_error('smobile'); ?></span>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Gender</label><br>
                                    <input type="radio" name="sgender" value="Male" checked /> Male
                                    <input type="radio" name="sgender" value="Female" /> Female   
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Date Of Birth</label>
                                    <!--<input type="Date" name="sdob" max="<?php //echo date('Y-m-d'); ?>" class="form-control">-->
                                    <input type="text" placeholder="Select Date" name="sdob" id="datepickerstu">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="saddress" value="<?php echo set_value('saddress'); ?>" ></textarea>
                            <span ><?php echo form_error('saddress'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Postcode</label>
                            <input type="text" name="spin" value="<?php echo set_value('spin'); ?>" class="form-control">
                            <span ><?php echo form_error('spin'); ?></span>
                        </div>
                        
                        <!-- <div class="form-group">-->
                            <!--<label>Captcha</label> -->
                            
                        <!--    <div class="input-group">-->
                        <!--       <img src="<?php echo site_url('Student/cptimg');?>"  style="height: 40px; width: 260px;">-->
                        <!--    </div>-->
                        <!--    <span id="showgreen" ></span>-->
                        <!--    <span id="showred" ></span>-->
                        <!--   <?php if($this->session->flashdata('checkcaptstu') !='') { ?>-->
                        <!--    <div class="alert alert-danger" role="alert">-->
                        <!--        <?php echo $this->session->flashdata('checkcaptstu'); ?>-->
                        <!--    </div>-->
                        <!--    <?php } ?>-->
                           <!--<input type="hidden" class="form-control " id="enqirycapchacheck" value="<?php //echo substr(str_shuffle($code), 0, 4); ?>" />-->
                        <!--    <input type="text" class="form-control " placeholder="Enter Captcha" name="enqirycapcha" id="enqirycapcha" onkeyup="checkcaptcha();" style="margin-top:10px;" />-->
                        <!--    <input type="hidden" name="stucaptcha" value="" class="stucaptcha" id="clstuchek2" /> -->
                        <!--</div>-->
                        
                        <div class="form-group">
                            <input type="checkbox" id="checkboxStu2" /> I Agree 
                            <a href="<?php echo base_url('Terms-Conditions');?>" target="_blank"> Terms & Conditions</a>
                        </div>
                        
                        <div class="SignIn-btn">
                            <!--<button type="button" name="Register" value="Register" class="SignIn-btn" onclick=" ckcaptchafstu2(); checkagree2();" >Register</button>-->
                            <?php echo form_submit('submit','Register',['class'=>'SignIn-btn']); ?>   
                        </div>

                        <div class="loginTab">
                            <!--<h4>You have already Sign-up ?-->
                            <?php //echo anchor('login','Log-In'); ?>    
                            <!--</h4>-->
                        </div>
                      </form>
                    </div>                
                <?php } ?>    
            </div>
            </div>
            
            <div class="col-md-3"></div>
        </div>

    </div> 
</section>

<script>

$( function() {
    $( "#datepicker1" ).datepicker();
 } );
  

//////////////////////////// Student Captcha ////////
function ckcaptchafstu()
{
    var checkSTUcaptcha = document.getElementById("clstuchek").value;
    //alert(checkSTUcaptcha);
    if((checkSTUcaptcha == 1) && (document.getElementById("checkboxstu").checked))
    {   
        $(".stuform1").submit();
    }
    else if(checkSTUcaptcha != 1)
    {
        alert("Captcha Is Not Matched ");
        return false;    
    }
    else
    {
        alert("Please Agree Terms & Conditions ");
        return false;
    }
}

function ckcaptchafstu2()
{
    var checkSTUcaptcha = document.getElementById("clstuchek2").value;
    //alert(checkSTUcaptcha);
    if((checkSTUcaptcha == 1) && (document.getElementById("checkboxStu2").checked))
    {   //alert('submit form');
        $(".stuform2").submit();
    }
    else if(checkSTUcaptcha != 1)
    {
        alert("Captcha Is Not Matched ");
        return false;    
    }
    else
    {
        alert("Please Agree Terms & Conditions ");
        return false;
    }
    
}

function checkcaptcha()
{
    var checkSTUcaptcha = document.getElementById("enqirycapcha").value;
    //var check = document.getElementById("enqirycapchacheck").value;
    //alert(checkSTUcaptcha);
    
     var lenth = checkSTUcaptcha.length;
     if(lenth > 3)
     {
         $.ajax({
                url:'<?=base_url()?>Student/checkstuscaptcha/'+checkSTUcaptcha,
                method: 'post',
                data: {captcha : checkSTUcaptcha },
                dataType: 'json',
                success: function(response)
                {
                    if(response.success == 'true')
                    {
                        $(".stucaptcha").val(1);
                        $('#showgreen').html(response.capmsg);  
                        $('#showred').html(' ');
                    }
                    else
                    {
                        $(".stucaptcha").val(0);
                        $('#showgreen').html(' ');
                        $('#showred').html(response.capmsg);              
                    }
                }
           });
         
     }
}

//////////////////////////// Instructor Captcha ////////
function ckcaptchafin()
{
    var checkSTUcaptcha = document.getElementById("instcaptcha").value;
    //alert(checkSTUcaptcha);
    if((checkSTUcaptcha == 1) && (document.getElementById("checkboxInst2").checked))
    {   
        $(".instform2").submit();
        //$('#slotbookingform').submit();
    }
    else if(checkSTUcaptcha != 1)
    {
        
        alert("Captcha Is Not Matched ");
        return false;    
    }
    else
    {
        alert("Please Agree Terms & Conditions ");
        return false;
    }
}

function ckcaptchafin1()
{
    var checkSTUcaptcha = document.getElementById("clintchek").value;
    //alert(checkSTUcaptcha);
    if((checkSTUcaptcha == 1)&&(document.getElementById("checkboxInst1").checked))
    {   
        $(".instform1").submit();
    }
    else if(checkSTUcaptcha != 1)
    {
        alert("Captcha Is Not Matched ");
        return false;    
    }
    else
    {
        alert("Please Agree Terms & Conditions ");
        return false;
    }
    
    
}

function checkinstcaptcha()
{
    var checkSTUcaptcha = document.getElementById("enqiryinstcapcha").value;
    //var check = document.getElementById("enqirycapchacheck").value;
    //alert(checkSTUcaptcha);
    
     var lenth = checkSTUcaptcha.length;
     if(lenth > 3)
     {
         //alert(checkSTUcaptcha);
         $.ajax({
                url:'<?=base_url()?>Instructor/checkstuscaptcha/'+checkSTUcaptcha,
                method: 'post',
                data: {captcha : checkSTUcaptcha },
                dataType: 'json',
                success: function(response)
                {
                    if(response.success == 'true')
                    {
                        $(".instcaptcha").val(1);
                        $('#showgreeninst').html(response.capmsg);  
                        $('#showredinst').html(' ');
                    }
                    else
                    {
                        $(".instcaptcha").val(0);
                        $('#showgreeninst').html(' ');
                        $('#showredinst').html(response.capmsg);              
                    }
                }
           });
         
     }
}

/////////////////////////////////////////////////////////
    function ImageValidateExtension() 
    {
        // var allowedFiles = [".jpg", ".jpeg", ".png",".gif",".JPEG",".JPG"];
        // var fileUpload = document.getElementById("photo1").value;
        // var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        // if (regex.test(fileUpload)!=true) { 
        //     //document.getElementById("photo").innerHTML=" ";
        //     //document.getElementById("photo1").innerHTML = " ";
        //     $("#photo1").val('');
        //     alert('Invalid file type');
        //     return false;
        // }
        // else
        // {
        //     return true;    
        // }
        var file = document.querySelector("#photo1");
        if ( /\.(jpeg|png|gif|jpg)$/i.test(file.files[0].name) == false ) { $("#photo1").val(''); alert("Invalid File Type"); return false; }
    }
     
  
</script>