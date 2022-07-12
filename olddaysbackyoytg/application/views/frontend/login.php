

<section id="features-app" class="padd-80 head-section">

    <div class="container">

        <div class="row"> 

            <div class="col-lg-4 col-md-3 co-sm-12"></div>

            <div class="col-lg-4 col-md-6 co-sm-12"> 

            <h2>Log-In</h2>

            <?php if($this->session->flashdata('verifymail') !='') { ?>
                <div class="alert alert-warning" role="alert">
                  <?php echo $this->session->flashdata('verifymail'); ?>
                </div>
            <?php } ?>
            <?php if(isset($loginmsg)) { ?>
                <div class="alert alert-warning" role="alert">
                  <?php echo $loginmsg; ?>
                </div>
            <?php } ?>    
            <?php if($this->session->flashdata('mailverified') !='') { ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('mailverified'); ?>
                </div>
            <?php } ?>
            
            <div class="sr-line"></div>

              <ul class="nav nav-tabs lgTab">
                <?php if(!isset($login_failed)) { ?>      
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
            <?php if(!isset($login_failed)) { ?>   
                <div id="home" class="tab-pane fade in active show">

                    <h3>Login as Student</h3>

                    <!-- <form class="form-content"> -->
                    <?php echo form_open('Student/login',['class'=>'form-content danger']); ?>        
                        <div class="form-group">

                            <label>Email</label>

                            <input type="text" name="semail" class="form-control">
                             <span ><?php echo form_error('semail'); ?></span>
                        </div>

                        <div class="form-group">

                            <label>Password</label>

                            <input type="password" name="spwd" class="form-control">
                             <span ><?php echo form_error('spwd'); ?></span>
                        </div>

                        <div class="SignIn-btn">

                           <?php echo form_submit('submit','Login',['class'=>'SignIn-btn']); ?>

                       </div>

                        <div class="loginTab">

                            <h4>Not a member ? <?php echo anchor('Student/signin','Sign-Up'); ?></h4>

                        </div>

                    </form>

                </div>
                   
                <div id="menu1" class="tab-pane fade">

                    <h3>Login as Instructor</h3>
                    <?php if($this->session->flashdata('loginmsg') != '') { ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo $this->session->flashdata('loginmsg'); ?>
                        </div>
                    <?php } ?>    
                    <!-- <form class="form-content"> -->
                    <?php echo form_open('Instructor/login',['class'=>'form-content danger']); ?>    
                        <div class="form-group">

                            <label>Email</label>

                            <input type="text" name="email" class="form-control">
                             <span ><?php echo form_error('email'); ?></span>
                        </div>

                        <div class="form-group">

                            <label>password</label>

                            <input type="password" name="pwd" class="form-control">
                             <span ><?php echo form_error('pwd'); ?></span>
                        </div>

                        <div class="SignIn-btn">

                           <?php echo form_submit('submit','Login',['class'=>'SignIn-btn']); ?>

                       </div>

                        <div class="loginTab">

                            <h4>Not a member ? <?php echo anchor('Instructor/signin','Sign-Up'); ?></h4>

                        </div>

                    </form>

                </div>
            <?php } else { ?>
            
                <div id="home" class="tab-pane fade ">

                    <h3>Login as Student</h3>

                    <!-- <form class="form-content"> -->
                    <?php echo form_open('Student/login',['class'=>'form-content danger']); ?>        
                        <div class="form-group">

                            <label>Email</label>

                            <input type="text" name="semail" class="form-control">
                             <span ><?php echo form_error('semail'); ?></span>
                        </div>

                        <div class="form-group">

                            <label>password</label>

                            <input type="password" name="spwd" class="form-control">
                             <span ><?php echo form_error('spwd'); ?></span>
                        </div>

                        <div class="SignIn-btn">

                           <?php echo form_submit('submit','Login',['class'=>'SignIn-btn']); ?>

                       </div>

                        <div class="loginTab">

                            <h4>Not a member ? <?php echo anchor('Student/signin','Sign-Up'); ?></h4>

                        </div>

                    </form>

                </div>
                   
                <div id="menu1" class="tab-pane fade in active show">

                    <h3>Login as Instructor</h3>
                    <?php if($this->session->flashdata('loginmsg') != '') { ?>
                        <div class="alert alert-danger" role="alert">
                          <?php echo $this->session->flashdata('loginmsg'); ?>
                        </div>
                    <?php } ?>    
                    <!-- <form class="form-content"> -->
                    <?php echo form_open('Instructor/login',['class'=>'form-content danger']); ?>    
                        <div class="form-group">

                            <label>Email</label>

                            <input type="text" name="email" class="form-control">
                             <span ><?php echo form_error('email'); ?></span>
                        </div>

                        <div class="form-group">

                            <label>password</label>

                            <input type="password" name="pwd" class="form-control">
                             <span ><?php echo form_error('pwd'); ?></span>
                        </div>

                        <div class="SignIn-btn">

                           <?php echo form_submit('submit','Login',['class'=>'SignIn-btn']); ?>

                       </div>

                        <div class="loginTab">

                            <h4>Not a member ? <?php echo anchor('Instructor/signin','Sign-Up'); ?></h4>

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

