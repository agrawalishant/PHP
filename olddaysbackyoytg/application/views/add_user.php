  

      <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
           

            <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">New Admin Information</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="new-user-info">
                           <form method="post" action="<?php echo site_url('addNewUser'); ?>" >
                              <div class="row">
                                 <div class="form-group col-md-6">
                                   <label for="fname">Full Name:</label>
                                   <input type="text" class="form-control" id="fname" placeholder="Full Name" name="name" required >
                                 </div>
                                 
                                 <div class="form-group col-md-6">
                                    <label for="mobno">Mobile Number:</label>
                                    <input type="text" class="form-control" id="mobno" placeholder="Mobile Number" name="mobile" >
                                 </div>
                           
                                 <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="" placeholder="Email" name="email" >
                                 </div>
                                 
                                  <div class="form-group col-md-6">
                                    <label for="email">Address:</label>
                                    <input type="text" class="form-control" id="" placeholder="Address" name="address" >
                                 </div>
                               
                              </div>
                              <hr>
                              <h5 class="mb-3">Security</h5>
                              <div class="row">
                                
                                 <div class="form-group col-md-6">
                                    <label for="pass">Password:</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                     <span class="error password"> </span>
                                 </div>
                                 <div class="form-group col-md-6">
                                    <label for="rpass">Repeat Password:</label>
                                    <input type="password" class="form-control checkPassword" id="repass" placeholder="Repeat Password" >
                                     <span class="error repass"> </span>
                                 </div>
                              </div>
                              <!--<div class="checkbox">-->
                              <!--   <label><input class="mr-2" type="checkbox">Enable Two-Factor-Authentication</label>-->
                              <!--</div>-->
                              <button type="submit" class="btn btn-primary">Add New Admin</button>
                           </form>
                        </div>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <!-- Wrapper END -->

