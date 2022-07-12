      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title"> Bookings List</h4>
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
                                    <th> Instructor Name</th>
                                    <th> Student Name</th>
                                    <th> Vechical Type</th>
                                    <th> Date</th>
                                    <th> Start Time</th>
                                    <th> End Time</th>
                                 </tr>
                             </thead>
                             <div id="tableactive">
                             <tbody>
                                 
                                 <?php $i = 0; if(!empty($result)){ foreach($result as $userDetails){ $i++; ?>
                                 <tr>
                                    <td class="text-center"><?php echo $i; ?>.</td>
                                    <?php //$data['result'] = $this->generalmodel->get_all_where('instructor_details',array('id'=>$userDetails->instructor_name));?>
                                    <td> <?php echo ucfirst($userDetails->instructor_name); ?></td>
                                    <td> <?php echo $userDetails->student_name; ?> </td>
                                    <td> 
                                      <?php 
                                        $type = $userDetails->vechical_type; 
                                        if($type == 1)
                                        {
                                          echo "Manual";
                                        }
                                        else
                                        {
                                          echo "Automatic";
                                        }
                                      ?> 

                                    </td>
                                    <td> <?php echo $userDetails->booking_date; ?> </td>
                                    <td> <?php echo $userDetails->booking_start_time; ?> </td>
                                    <td> <?php echo $userDetails->booking_end_time; ?> </td>
                                 </tr> 
                                 
                                 <?php } } ?>
                                                           
                             </tbody>
                             </div>
                           </table>
                        <!--</div>-->
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
 </div>

