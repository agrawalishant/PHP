

<section id="features-app" class="padd-80 head-section">
    <div class="container">
        
        <div class="row"> 
            <div class="col-md-3"></div>
            <div class="col-md-6 co-sm-12"> 
                <h2>Change Password</h2>
                <div class="sr-line"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 co-sm-12">
                <div class="tab-content">
                    <div >
                     <!-- <h3>Instructor</h3> -->
                       <?php echo form_open('Instructor/updatechangepwd',['class'=>'form-content danger']); 
                       ?>
                        
                       <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
                        <div class="form-group">
                            <label>New password</label>
                            <input type="password" name="n_pwd" class="form-control">
                            <span ><?php echo form_error('n_pwd'); ?></span>
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="nc_pwd" class="form-control">
                            <span ><?php echo form_error('nc_pwd'); ?></span>
                        </div>

                        

                        <div class="SignIn-btn">
                        <?php echo form_submit('submit','Update',['class'=>'SignIn-btn']); ?>       
                        </div>
                        
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

