      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title"> Student List</h4>
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
                                    <th> Email/Id</th>
                                    <th> Password</th>
                                    <th> Mobile</th>
                                    <th> Address</th>
                                    <!--<th> Date</th>-->
                                    <th> Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 
                                 <?php $i = 0; if(!empty($result)){ foreach($result as $userDetails){ $i++; ?>
                                 <tr>
                                    <td class="text-center"><?php echo $i; ?>.</td>
                                    <td> <?php echo ucfirst($userDetails->name); ?></td>
                                    <td> <?php echo $userDetails->email; ?> </td>
                                    <td> <?php echo $userDetails->passward; ?> </td>
                                    <td> <?php echo $userDetails->mobile; ?> </td>
                                    <td style="text-align: center!important; "> 
                                      <?php echo $userDetails->address; ?>
                                     </td>
                                    
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                         
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="<?php echo site_url('Administrator/addeditstudent/'.$userDetails->id); ?>"><i class="fa fa-eye"></i></a>
                                          
                                        <a onclick="return confirm('Do you want to delete this detail')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="<?php echo site_url('Administrator/deletestudent/'.$userDetails->id); ?>"><i class="ri-delete-bin-line"></i></a>
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