      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title"> Website Details</h4>
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
                                $result = $this->generalmodel->get_all_where('websiteinformation',array('id'=>1));
                                //print_r($result);exit;
                                if(!empty($result)){
                           ?>
                           <form method="post" action="<?php echo base_url('Administrator/updatewebsiteinformation');?>">
                               <table>
                                   <tr>
                                       <td><label>Front section Top</label></td>
                                       <td>
                                          <label>TITLE</label> <input type="text" class="form-control" name="title_first" value='<?php echo $result[0]['title_first'];?>' required style="width:170%;" required/>
                                         <label>DESCRIPTION</label>  <textarea type="text" class="form-control" name="description_first"  required style="width:170%;" required><?php echo $result[0]['description_first'];?></textarea>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td><label>1st  step</label></td>
                                       <td>
                                           <label>TITLE</label> <input type="text" class="form-control" name="title_firststep" value='<?php echo $result[0]['title_firststep'];?>' required style="width:170%;" required/>
                                           <label>DESCRIPTION</label> <textarea type="text" class="form-control" name="description_firststep"  required style="width:170%;" required/><?php echo $result[0]['description_firststep'];?></textarea>
                                       </td>
                                   </tr>
                                    <tr>
                                       <td><label>2nd step</label></td>
                                       <td>
                                          <label>TITLE</label>  <input type="text" class="form-control" name="title_secondstep" value='<?php echo $result[0]['title_secondstep'];?>' required style="width:170%;" required/>
                                         <label>DESCRIPTION</label>   <textarea type="text" class="form-control" name="description__secondstep"  required style="width:170%;" required/><?php echo $result[0]['description__secondstep'];?></textarea>
                                       </td>
                                   </tr>
                                    <tr>
                                       <td><label>3rd step</label></td>
                                       <td>
                                          <label>TITLE</label>  <input type="text" class="form-control" name="title_thirdstep" value='<?php echo $result[0]['title_thirdstep'];?>' required style="width:170%;" required/>
                                         <label>DESCRIPTION</label>   <textarea type="text" class="form-control" name="description_thirdstep"  required style="width:170%;" required/><?php echo $result[0]['description_thirdstep'];?></textarea>
                                       </td>
                                   </tr>
                                  
                                  <tr>
                                       <td><label>Experienced Instructors 1st</label></td>
                                       <td>
                                          <label>TITLE</label>  <input type="text" class="form-control" name="title_exp1" value='<?php echo $result[0]['title_exp1'];?>' required style="width:170%;" required />
                                          <label>DESCRIPTION</label>  <textarea type="text" class="form-control" name="description_exp1"  required style="width:170%;" required/><?php echo $result[0]['description_exp1'];?></textarea>
                                       </td>
                                   </tr>
                                    <tr>
                                       <td><label>Experienced Instructors 2nd </label></td>
                                       <td>
                                           <label>TITLE</label> <input type="text" class="form-control" name="title_exp2" value='<?php echo $result[0]['title_exp2'];?>' required style="width:170%;" required />
                                          <label>DESCRIPTION</label>  <textarea type="text" class="form-control" name="description_exp2"  required style="width:170%;"required /><?php echo $result[0]['description_exp2'];?></textarea>
                                       
                                       </td>
                                   </tr>
                                    <tr>
                                       <td><label>Experienced Instructors 3rd </label></td>
                                          <td>  <label>TITLE</label> <input type="text" class="form-control" name="title_exp3" value='<?php echo $result[0]['title_exp3'];?>' required style="width:170%;" required />
                                           <label>DESCRIPTION</label> <textarea type="text" class="form-control" name="description_exp3"  required style="width:170%;" required/><?php echo $result[0]['description_exp3'];?></textarea>
                                       
                                      
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