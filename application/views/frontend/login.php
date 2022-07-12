<section id="features-app" class="padd-80 head-section">

    <div class="container">

        <div class="row"> 

            <div class="col-lg-4 col-md-3 co-sm-12"></div>

            <div class="col-lg-4 col-md-6 co-sm-12"> 

            <h2>Log-In</h2>

            <?php if($this->session->flashdata('bookedlog') !='') { ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $this->session->flashdata('bookedlog'); ?>
                </div>
            <?php } ?>
            <?php if($this->session->flashdata('verifymail') !='') { ?>
                <div class="alert alert-warning" role="alert">
                  <?php echo $this->session->flashdata('verifymail'); ?>
                </div>
            <?php } ?>
            <?php if($this->session->flashdata('loginstatusmsg') !='') { ?>
                <div class="alert alert-warning" role="alert">
                  <?php echo $this->session->flashdata('loginstatusmsg'); ?>
                </div>
            <?php } ?>
            <?php if($this->session->flashdata('loginmsg') !='') { ?>
                <div class="alert alert-warning" role="alert">
                  <?php echo $this->session->flashdata('loginmsg'); ?>
                </div>
            <?php } ?>
            <?php if($this->session->flashdata('inloginstatusmsg') !='') { ?>
                <div class="alert alert-warning" role="alert">
                  <?php echo $this->session->flashdata('inloginstatusmsg'); ?>
                </div>
            <?php } ?>
            <?php if($this->session->flashdata('inloginmsg') !='') { ?>
                <div class="alert alert-warning" role="alert">
                  <?php echo $this->session->flashdata('inloginmsg'); ?>
                </div>
            <?php } ?>
            <?php if($this->session->flashdata('mailverified') !='') { ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('mailverified'); ?>
                </div>
            <?php } ?>
            <?php if($this->session->flashdata('payses') !='') { ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $this->session->flashdata('payses'); ?>
                </div>
            <?php } ?>
            <div class="sr-line"></div>

              <ul class="nav nav-tabs lgTab">
                <?php if($login_failed != 'Failed') { ?>      
                <li><a class="active" data-toggle="tab" href="#home">Student Login</a></li>
                <li class="tb-2"><a data-toggle="tab" href="#menu1">Instructor Login</a></li>
                <?php } else { ?> 
                <li class="tb-2"><a data-toggle="tab" href="#home">Student Login</a></li>
                <li ><a class="active" data-toggle="tab" href="#menu1">Instructor Login</a></li>
                <?php } ?>
              </ul>

            </div>

            <div class="col-lg-4 col-md-3 co-sm-12"></div>

        </div>

        <div class="row">

            <div class="col-lg-4 col-md-3 co-sm-12"></div>

            <div class="col-lg-4 col-md-6 co-sm-12">

                <div class="tab-content">
            <?php if($login_failed != 'Failed') { ?>   
                
                <div id="home" class="tab-pane fade in active show">

                    <h3>Login as Student</h3>

                    <!-- <form class="form-content"> -->
                    <form action="<?php echo base_url();?>Student-Login" method="post" class="form-content danger stufom1" >
                    <?php //echo form_open('Student-Login',['class'=>'form-content danger']); ?>        
                        <div class="form-group">

                            <label>Email</label>

                            <input type="text" name="semail" class="form-control">
                             <span ><?php echo form_error('semail'); ?></span>
                        </div>

                        <div class="form-group Pas-icon">

                            <label>Password</label>

                            <input type="password" name="spwd" class="form-control" id="myInputs">
                            <i class="fa fa-eye-slash" onclick="myFunctions()"></i>
                             <span ><?php echo form_error('spwd'); ?></span>
                        </div>
                        
                        <div class="form-group">
                            <input type="checkbox" id="checkboxstu1" />  I Agree
                            <a href="<?php echo base_url('Terms-Conditions2');?>" target="_blank">  Terms & Conditions</a>
                        </div>

                        <div class="SignIn-btn">
                            <button type="button" class="SignIn-btn" name="stu1login" onclick="stu1agr();">Login</button>
                           <?php //echo form_submit('submit','Login',['class'=>'SignIn-btn']); ?>

                       </div>

                        <div class="loginTab">

                            <h4>Not a member ? <?php echo anchor('Student-Signin','Sign-Up'); ?></h4>

                        </div>

                    </form>

                </div>
                   
                <div id="menu1" class="tab-pane fade">

                    <h3>Login as Instructor</h3>
                    <!--<?php //if($this->session->flashdata('loginmsg') != '') { ?>-->
                    <!--    <div class="alert alert-danger" role="alert">-->
                    <!--      <?php //echo $this->session->flashdata('loginmsg'); ?>-->
                    <!--    </div>-->
                    <!--<?php //} ?>    -->
                    <!-- <form class="form-content"> -->
                    <form action="Instructor-Login" method="post" class="form-content danger instfrm1">
                    <?php //echo form_open('Instructor-Login',['class'=>'form-content danger']); ?>    
                        <div class="form-group">

                            <label>Email</label>

                            <input type="text" name="email" class="form-control">
                             <span ><?php echo form_error('email'); ?></span>
                        </div>

                        <div class="form-group Pas-icon">

                            <label>Password</label>

                            <input type="password" name="pwd" class="form-control" id="myInput">
                            <i class="fa fa-eye-slash" onclick="myFunction()"></i>
                             <span ><?php echo form_error('pwd'); ?></span>
                        </div>

                        <div class="form-group">
                            <input type="checkbox" id="checkboxinst1" />  I Agree
                            <a href="<?php echo base_url('Terms-Conditions2');?>" target="_blank"> Student Terms & Conditions </a>And
                            <a href="<?php echo base_url('Terms-Conditions');?>" target="_blank"> Instructor Terms & Conditions</a>
                        </div>

                        <div class="SignIn-btn">
                        <button type="button" name="inst1login" class="SignIn-btn" onclick="inst1agr();">Login</button>    
                           <?php //echo form_submit('submit','Login',['class'=>'SignIn-btn']); ?>

                       </div>

                        <div class="loginTab">

                            <h4>Not a member ? <?php echo anchor('Instructor-Signin','Sign-Up'); ?></h4>

                        </div>

                    </form>

                </div>
                
            <?php } else { ?>
            
                <div id="menu1" class="tab-pane fade in active show">

                    <h3>Login as Instructor</h3>
                    <?php //if($this->session->flashdata('loginmsg') != '') { ?>
                        <!--<div class="alert alert-danger" role="alert">-->
                          <?php //echo $this->session->flashdata('loginmsg'); ?>
                        <!--</div>-->
                    <?php //} ?>    
                    <!-- <form class="form-content"> -->
                    <form action="<?php echo base_url();?>Instructor-Login" method="post" class="form-content danger instfom2"> 
                    <?php //echo form_open('Instructor-Login',['class'=>'form-content danger']); ?>    
                        <div class="form-group">

                            <label>Email</label>

                            <input type="text" name="email" class="form-control">
                             <span ><?php echo form_error('email'); ?></span>
                        </div>

                        <div class="form-group Pas-icon">

                            <label>password</label>

                            <input type="password" name="pwd" class="form-control" id="myInput">
                            <i class="fa fa-eye-slash" onclick="myFunction()"></i>
                             <span ><?php echo form_error('pwd'); ?></span>
                        </div>
                        
                        <div class="form-group">
                            <input type="checkbox" id="checkboxinst2" /> I Agree
                            <a href="<?php echo base_url('Terms-Conditions2');?>" target="_blank"> Student Terms & Conditions</a> And
                            <a href="<?php echo base_url('Terms-Conditions');?>" target="_blank"> Instructor Terms & Conditions</a>
                        </div>
                        
                        <div class="SignIn-btn">
                            <button type="button" class='SignIn-btn' name="login" onclick="inst2agr();">Login</button>
                           <?php //echo form_submit('submit','Login',['class'=>'SignIn-btn']); ?>

                       </div>

                        <div class="loginTab">

                            <h4>Not a member ? <?php echo anchor('Instructor-Signin','Sign-Up'); ?></h4>

                        </div>

                    </form>

                </div>
                
                <div id="home" class="tab-pane fade ">

                    <h3>Login as Student</h3>

                    <!-- <form class="form-content"> -->
                    <form action="Student-Login" method="post" class="form-content danger stufom2"> 
                    <?php //echo form_open('Student-Login',['class'=>'form-content danger']); ?>        
                        <div class="form-group">

                            <label>Email</label>

                            <input type="text" name="semail" class="form-control">
                             <span ><?php echo form_error('semail'); ?></span>
                        </div>

                        <div class="form-group Pas-icon">

                            <label>password</label>

                            <input type="password" name="spwd" class="form-control" id="myInputs">
                            <i class="fa fa-eye-slash" onclick="myFunctions()"></i>
                             <span ><?php echo form_error('spwd'); ?></span>
                        </div>
                        
                        <div class="form-group">
                            <input type="checkbox" id="checkboxstu2" /> I Agree
                            <a href="<?php echo base_url('Terms-Conditions');?>" target="_blank"> Terms & Conditions</a>
                        </div>    
                        
                        <div class="SignIn-btn">
                            <button type="button" class="SignIn-btn" onclick="stu2agr();">Login</button>
                           <?php //echo form_submit('submit','Login',['class'=>'SignIn-btn']); ?>

                       </div>

                        <div class="loginTab">

                            <h4>Not a member ? <?php echo anchor('Student-Signin','Sign-Up'); ?></h4>

                        </div>

                    </form>

                </div>

            <?php } ?>    
            </div>

            </div>

            <div class="col-lg-4 col-md-3 co-sm-12"></div>

        </div>

    </div> 

</section>
<script>
    function stu1agr()
    {
        if(document.getElementById("checkboxstu1").checked)
        {   
            $(".stufom1").submit();
        }
        else
        {
            alert("Please Agree Terms & Conditions");
            return false;
        }
    }
    function inst1agr()
    {
        if(document.getElementById("checkboxinst1").checked)
        {   
            $(".instfrm1").submit();
        }
        else
        {
            alert("Please Agree Terms & Conditions");
            return false;
        }
    }
    function stu2agr()
    {
        if(document.getElementById("checkboxstu2").checked)
        {   
            $(".stufom2").submit();
        }
        else
        {
            alert("Please Agree Terms & Conditions");
            return false;
        }
    }
    function inst2agr()
    {
        if(document.getElementById("checkboxinst2").checked)
        {   
            $(".instfom2").submit();
        }
        else
        {
            alert("Please Agree Terms & Conditions");
            return false;
        }
    }
</script>
