      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title"> Transaction List</h4>
                        </div>
                        <?php if($this->session->flashdata('success_msg')!='') { ?>
                            <div class="alert alert-success" style="margin-top: 20px;">
                              <?php echo $this->session->flashdata('success_msg'); ?>
                            </div>
                        <?php } ?>
                     </div>
                     <div class="iq-card-body">
                        <!--<div class="table-responsive">-->
                           <div class="row justify-content-between">
                              <div class="col-sm-12 col-md-6">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                   
                                 </div>
                              </div>
                              <!-- <div class="col-sm-12 col-md-6">
                                 <div class="user-list-files d-flex float-right">
                                    <a href="<?php //echo site_url('exhibition-add-edit'); ?>" class="chat-icon-phone">
                                     Add Instructor
                                     </a>
                                   
                                   </div>
                              </div> -->
                           </div>
                           <table id="example" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                             <thead>
                                 <tr>
                                    <th> SN </th>
                                    <th> Student Name</th>
                                    <th> Instructor Name</th>
                                    <!--<th> Transactions</th>-->
                                    <th> Gross Payment</th>
                                    <th> Payment Date <br> 
                                    (yyyy-mm-dd)</th>
                                    <th> Pay By</th>
                                    <th> Payment Status</th>
                                    <th> Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 
                                 <?php if(!empty($result)){ $i=0; foreach($result as $userDetails){  $i++;
                                     //echo "<pre>";print_r($userDetails);exit;
                                     $stu_id = $userDetails->user_id;
                                    $student_result = $this->generalmodel->get_all_where('student_details',array('id'=>$stu_id));
                                    $inst_id = $userDetails->inst_id;
                                    $instructor_result = $this->generalmodel->get_all_where('instructor_details',array('id'=>$inst_id));
                                    //echo "<pre>";print_r($student_result);exit;
                                    if($userDetails->payment_gross > 0){
                                 ?>
                                 <tr>
                                    <td class="text-center"><?php echo $i; ?>.</td>
                                    <td> <?php echo ucfirst($student_result[0]['name']); ?></td>
                                    <td> <?php echo ucfirst($instructor_result[0]['name']); ?></td>
                                    <td> <?php echo $userDetails->payment_gross; ?> </td>
                                    <td> <?php echo date('Y-M-d H:i:s', strtotime($userDetails->create_date)); ?> </td>
                                    <td> <?php echo $userDetails->payment_done_by; ?> </td>
                                    <td style="text-align: center!important; "> 
                                      <?php echo $userDetails->payment_status; ?>
                                     </td>
                                    
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="<?php echo site_url('Administrator/viewtransaction/'.$userDetails->payment_id); ?>"><i class="fa fa-eye"></i></a>
                                        <a onclick="return confirm('Do you want to delete this detail')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="<?php echo site_url('Administrator/deletetransaction/'.$userDetails->payment_id); ?>"><i class="ri-delete-bin-line"></i></a>
                                       </div>
                                    </td>
                                 </tr> 
                                 
                                 <?php } } } ?>
                                                           
                             </tbody>
                           </table>
                        <!--</div>-->
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
 </div>