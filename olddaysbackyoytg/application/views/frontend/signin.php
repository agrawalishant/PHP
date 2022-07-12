

<section id="features-app" class="padd-80 head-section">
    <div class="container">

        <div class="row"> 
            <div class="col-md-3"></div>
            <div class="col-md-6 co-sm-12"> 
                <h2>Sign-up</h2>
                <div class="sr-line"></div>

                  <ul class="nav nav-tabs justify-content-center">
                    <?php if(!isset($login_failed)) { ?>      
                    <li><a class="active" data-toggle="tab" href="#home">Student Sign-up</a></li>
                    <li class="tb-2"><a data-toggle="tab" href="#menu1">Instructor Sign-up</a></li>
                    <?php } else { ?> 
                    <li class="tb-2"><a data-toggle="tab" href="#home">Student Login</a></li>
                    <li ><a class="active" data-toggle="tab" href="#menu1">Instructor Login</a></li>
                    <?php } ?>
                  </ul>

            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">

            <div class="col-md-3"></div>

            <div class="col-md-6 co-sm-12">
            <div class="tab-content">
                <?php if(!isset($login_failed)) { ?> 
                <div id="home" class="tab-pane fade in active show">
                    <h3>Register as Student</h3>
                    <?php echo form_open('Student/signup',['class'=>'form-content danger']); ?>    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="sname" value="<?php echo set_value('sname'); ?>" class="form-control">
                            <span ><?php echo form_error('sname'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="semail" value="<?php echo set_value('semail'); ?>" class="form-control">
                            <span ><?php echo form_error('semail'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Create password</label>
                            <input type="password" name="spwd" class="form-control">
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
                                    <input type="Date" name="sdob" class="form-control">
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

                        <div class="SignIn-btn">
                            <?php echo form_submit('submit','Register',['class'=>'SignIn-btn']); ?>   
                        </div>

                        <div class="loginTab">
                            <h4>You have already Sign-up ?
                            <?php echo anchor('login','Log-In'); ?>    
                            </h4>
                        </div>
                    </form>
                </div>

                <div id="menu1" class="tab-pane fade">
                    <h3>Register as Instructor</h3>
                        <?php echo form_open_multipart('Instructor/signup',['class'=>'form-content danger']); ?>            
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control">
                        <span ><?php echo form_error('name'); ?></span>
                    </div>

                    <div class="form-group">
                       <label>Email</label>
                        <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
                        <span ><?php echo form_error('email'); ?></span>
                    </div>

                    <div class="form-group">
                        <label>Create password</label>
                        <input type="password" name="pwd" class="form-control">
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
                                <input type="Date" name="dob" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>License Number</label>
                        <input type="text" name="license_no" value="<?php echo set_value('license_no'); ?>" class="form-control">
                        <span ><?php echo form_error('license_no'); ?></span>
                    </div>

                    <div class="form-group">
                        <label>License ID-</label>
                        <input type="file" name="photo" class="form-control">
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

                    <div class="SignIn-btn">
                        <?php echo form_submit('submit','Register',['class'=>'SignIn-btn']); ?>       
                    </div>

                    <div class="loginTab">
                        <h4>You have already Sign-up ?
                        <?php echo anchor('Driving/login','Log-In'); ?>    
                        </h4>
                    </div>
                    </form>
                </div>
                <?php } else { ?>
                    <div id="home" class="tab-pane fade ">
                     <h3>Register as Student</h3>
                     <?php echo form_open('Student/signup',['class'=>'form-content danger']); ?>    
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="sname" value="<?php echo set_value('sname'); ?>" class="form-control">
                            <span ><?php echo form_error('sname'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="semail" value="<?php echo set_value('semail'); ?>" class="form-control">
                            <span ><?php echo form_error('semail'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Create password</label>
                            <input type="password" name="spwd" class="form-control">
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
                                    <input type="Date" name="sdob" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="saddress" value="<?php echo set_value('saddress'); ?>" ></textarea>
                            <span ><?php echo form_error('saddress'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Pincode</label>
                            <input type="text" name="spin" value="<?php echo set_value('spin'); ?>" class="form-control">
                            <span ><?php echo form_error('spin'); ?></span>
                        </div>

                        <div class="SignIn-btn">
                            <?php echo form_submit('submit','Register',['class'=>'SignIn-btn']); ?>   
                        </div>

                        <div class="loginTab">
                            <h4>You have already Sign-up ?
                            <?php echo anchor('login','Log-In'); ?>    
                            </h4>
                        </div>
                      </form>
                    </div>

                <div id="menu1" class="tab-pane fade in active show">
                    <h3>Register as Instructor</h3>
                        <?php echo form_open_multipart('Instructor/signup',['class'=>'form-content danger']); ?>            
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control">
                        <span ><?php echo form_error('name'); ?></span>
                    </div>

                    <div class="form-group">
                       <label>Email</label>
                        <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control">
                        <span ><?php echo form_error('email'); ?></span>
                    </div>

                    <div class="form-group">
                        <label>Create password</label>
                        <input type="password" name="pwd" class="form-control">
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
                        <label>License Number</label>
                        <input type="text" name="license_no" value="<?php echo set_value('license_no'); ?>" class="form-control">
                        <span ><?php echo form_error('license_no'); ?></span>
                    </div>

                    <div class="form-group">
                        <label>ID proof-</label>
                        <input type="file" name="photo">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" value="<?php echo set_value('address'); ?>" ></textarea>
                        <span ><?php echo form_error('address'); ?></span>
                    </div>

                    <div class="form-group">
                        <label>Pincode</label>
                        <input type="text" name="pin" value="<?php echo set_value('pin'); ?>" class="form-control">
                        <span ><?php echo form_error('pin'); ?></span>
                    </div>

                    <div class="SignIn-btn">
                        <?php echo form_submit('submit','Register',['class'=>'SignIn-btn']); ?>       
                    </div>

                    <div class="loginTab">
                        <h4>You have already Sign-up ?
                        <?php echo anchor('Driving/login','Log-In'); ?>    
                        </h4>
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

