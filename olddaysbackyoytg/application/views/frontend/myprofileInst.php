

<section id="features-app" class="padd-80 head-section">
    <div class="container">
        
        <div class="row"> 
            <div class="col-md-3"></div>
            <div class="col-md-6 co-sm-12"> 
                <h2>MY Profile</h2>
                <div class="sr-line"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 co-sm-12">
                <div class="tab-content">
                    <div >
                     <h3>Instructor</h3>
                       <?php echo form_open_multipart('Instructor/signup',['class'=>'form-content danger']); 
                        if(!empty($result)) { foreach($result as $res) {
                       ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="<?php echo $res['name']; ?>" class="form-control">
                            <span ><?php echo form_error('name'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
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
                            <input type="text" name="mobile" class="form-control">
                            <span ><?php echo form_error('mobile'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>License Number</label>
                            <input type="text" name="license_no" class="form-control">
                            <span ><?php echo form_error('license_no'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>ID proof-</label>
                            <input type="file" name="photo">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address"></textarea>
                            <span ><?php echo form_error('address'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Pincode</label>
                            <input type="text" name="pin" class="form-control">
                            <span ><?php echo form_error('pin'); ?></span>
                        </div>

                        <div class="SignIn-btn">
                        <?php echo form_submit('submit','Register',['class'=>'SignIn-btn']); ?>       
                        </div>
                        <?php } } ?>
                        </form>
                    </div>    
                    
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-md-3"></div>
    </div> 
</section>

