      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title"> Instructor List</h4>
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
                                    <th> Email/Id</th>
                                    <th> password</th>
                                    <th> License no.</th>
                                    <th> Status</th>
                                    <th> Action</th>
                                 </tr>
                             </thead>
                             <div id="tableactive">
                             <tbody>
                                 
                                 <?php $i = 0; if(!empty($result)){ foreach($result as $userDetails){ $i++; ?>
                                 <tr>
                                    <td class="text-center"><?php echo $i; ?>.</td>
                                    <td> <?php echo ucfirst($userDetails->name); ?></td>
                                    <td> <?php echo $userDetails->email; ?> </td>
                                    <td> <?php echo $userDetails->password; ?> </td>
                                    <td style="text-align: center!important; "> 
                                      <?php echo $userDetails->licence_no; ?>
                                     </td>
                                    <td>
                                      <?php
                                      $ids = $userDetails->id;
                                      $status = $userDetails->active_status;
                                      if($status == 0) 
                                      { ?>
                                        <button type="button" name="inactive" myid="<?php echo $ids; ?>" id="resinactive" class="btn btn-danger inactive" >Inactive</button>
                                      <?php  //echo "Inactive";
                                      }
                                      else
                                      { ?>
                                        
                                        <button type="button" name="active" myid="<?php echo $ids; ?>" id="resactive" class="btn btn-success active" >Active</button>
                                     <?php   //echo "Active";
                                      }
                                      
                                      ?>
                                    </td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                         
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="view" href="<?php echo site_url('Administrator/addeditInstructor/'.$userDetails->id); ?>"><i class="fa fa-eye"></i></a>
                                          
                                        <a onclick="return confirm('Do you want to delete this detail')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="<?php echo site_url('Administrator/deleteInstructor/'.$userDetails->id); ?>"><i class="ri-delete-bin-line"></i></a>
                                       </div>
                                    </td>
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
