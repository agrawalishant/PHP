      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title"> Addational Bookings </h4>
                        </div>
                       
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
                                    <th> Date</th>
                                    <th> Day</th>
                                    <th> Start Time</th>
                                    <th> End Time</th>
                                    <th> Payment Status</th>
                                    <th> Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 
                                 <?php if(!empty($result)){ $i=0; foreach($result as $userDetails){  $i++;
                                     //echo "<pre>";print_r($userDetails);exit;
                                    $stu_id = $userDetails->addational_booking_status;
                                    //echo $stu_id;
                                    $booking_result = $this->generalmodel->get_all_where('booking_confirm',array('id'=>$stu_id));
                                    
                                    $stus_id = $booking_result[0]['student_id'];
                                    $student_result = $this->generalmodel->get_all_where('student_details',array('id'=>$stus_id));
                                    $inst_id = $booking_result[0]['time_id'];
                                    $instructor_time = $this->generalmodel->get_all_where('instructor_time_slots',array('id'=>$inst_id));
                                    $in_id = $instructor_time[0]['inst_id'];
                                    $instructor_result = $this->generalmodel->get_all_where('instructor_details',array('id'=>$in_id));
                                    
                                    //echo "<pre>";print_r($student_result);exit;
                                 ?>
                                 <tr>
                                    <td class="text-center"><?php echo $i; ?>.</td>
                                    <td> <?php echo ucfirst($student_result[0]['name']); ?></td>
                                    <td> <?php echo ucfirst($instructor_result[0]['name']); ?></td>
                                    <td> <?php echo $booking_result[0]['booking_date']; ?> </td>
                                    <td> <?php $date = $booking_result[0]['booking_date']; $day = date('l', strtotime($date)); echo $day; ?> </td>
                                    <td> <?php echo $instructor_time[0]['start_time']; ?> </td>
                                    <td> <?php echo $instructor_time[0]['end_time']; ?> </td>
                                    <td style="text-align: center!important; "> Offline </td>
                                    
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                        <a onclick="return confirm('Do you want to delete this detail')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="<?php echo site_url('Administrator/deleteaddationalbookings/'.$stu_id); ?>"><i class="ri-delete-bin-line"></i></a>
                                       </div>
                                    </td>
                                 </tr> 
                                 
                                 <?php } } ?>
                                                           
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