      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title"> Cancel Bookings List</h4>
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
                                    <th> Booking Date</th>
                                    <th> Cancel Date</th>
                                    <th> Pay Amount</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 
                                 <?php if(!empty($result)){ $i=0; foreach($result as $userDetails){  $i++;
                                    //echo "<pre>";print_r($userDetails);exit;
                                    $inst_id = $userDetails->inst_id;
                                    $stu_id = $userDetails->user_id;
                                    $instructor_result = $this->generalmodel->get_all_where('instructor_details',array('id'=>$inst_id));
                                    $student_result = $this->generalmodel->get_all_where('student_details',array('id'=>$stu_id));
                                    //echo "<pre>";print_r($student_result);exit;
                                 ?>
                                 <tr>
                                    <td class="text-center"><?php echo $i; ?>.</td>
                                    <td> <?php echo ucfirst($student_result[0]['name']); ?></td>
                                    <td> <?php echo ucfirst($instructor_result[0]['name']); ?></td>
                                    <td> <?php echo $userDetails->payment_gross; ?> </td>
                                    <td> <?php echo date('Y-M-d',strtotime($userDetails->booking_dates)); ?> </td>
                                    <td> <?php echo date('Y-m-d H:i:s',strtotime($userDetails->update_date)); ?> </td>
                                    <td><?php $status = $userDetails->adminpay_inst_status; $id = $userDetails->payment_id;?>
                                        <?php if($status>0){ ?>
                                        <button class="btn btn-success" onclick="alert('You Already Done The Payment');">Done</button>
                                        <button class="btn btn-warning" onclick="record(<?php echo $id?>);">Delete</button>
                                        <?php }else{ ?> 
                                        <button class="btn btn-danger" onclick="instPaymentDone(<?php echo $id?>);">Remaining</button>
                                        <?php }?>
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
 
 <script>
    function record(id)
    {   
        var id = id;
        if(confirm("Do you want to Delete the record"))
        {
            url = '<?php echo site_url('Administrator/recordDelete');?>';
            $.ajax({
                type:'POST',
                url:url,
                data: {ids:id}, 
                dataType:'json',
                success:function(responce){
                    //alert(responce.msg);
                    location.assign("https://www.dvdrive.co.uk/Administrator/cancelBooking");      
                },
            });
        }
        else
        {
            return false;         
        }
    }
    
    function instPaymentDone(id)
    {   
        var id = id;
        alert(id);
        if(confirm("If you Already Paid Amount To The Instructor Then Please Click On OK Button"))
        {
            url = '<?php echo site_url('Administrator/instPaymentDone');?>';
            $.ajax({
                type:'POST',
                url:url,
                data: {ids:id}, 
                dataType:'json',
                success:function(responce){
                    alert(responce.msg);
                    location.assign("https://www.dvdrive.co.uk/Administrator/cancelBooking");      
                },
            });
        }
        else
        {
            return false;         
        }
    }
 </script>