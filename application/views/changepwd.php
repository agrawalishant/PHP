      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title"> Change Password</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <!--<div class="table-responsive">-->
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-6">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                   
                                 </div>
                              </div>
                           </div>
                           <?php 
                                if($this->session->flashdata('msgpwd')){ ?>
                                  <div class="alert alert-danger">
                                      <?php echo $this->session->flashdata('msgpwd'); ?>
                                    </div>  
                            <?php }
                                $result = $this->generalmodel->get_all_where('ex_multiusers_n_admins',array('id'=>1));
                                //print_r($result);exit;
                                if(!empty($result)){
                           ?>
                           <form method="post" action="<?php echo base_url('Administrator/subpwd');?>">
                               <table>
                                   <tr>
                                       <td><label>UserName</label></td>
                                       <td>
                                           <input type="text" class="form-control" name="name" value='<?php echo $result[0]['name'];?>' required style="width:170%;"/>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td><label>Email</label></td>
                                       <td>
                                           <input type="email" class="form-control" name="email" value='<?php echo $result[0]['email'];?>' required style="width:170%;"/>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td><label>New Password</label></td>
                                       <td>
                                           <input type="password" class="form-control" name="pwd" value='' required style="width:170%;"/>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td><label>Confirm Password</label></td>
                                       <td>
                                           <input type="password" name="cfmpwd" value='' class="form-control" required style="width:170%;"/>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td></td>
                                       <td><center><input type='submit' name="submit" value="submit"/></center></td>
                                   </tr>
                               </table>
                           </form>
                           <?php } ?>
                        <!--</div>-->
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
 </div>