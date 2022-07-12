<!-- Page Content  -->
<div id="content-page" class="content-page">
   <div class="container-fluid">
         
   <div class="row">
      <div class="col-lg-12">
         <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
               <div class="iq-header-title">
                  <h4 class="card-title"> Instructor Information</h4>
               </div>
               <?php echo anchor('Administrator/seecharges/'.$result[0]->id,'Charges',['class'=>'btn btn-primary']); ?>
               <?php echo anchor('Administrator/seeTime/'.$result[0]->id,'Time Slot',['class'=>'btn btn-primary']); ?>
            </div>
            <div class="iq-card-body">
               <div class="new-user-info">
               <form method="post" action="<?php echo site_url('Instructor/'); ?>" >
                  <div class="row">
                     <input type="hidden" name="id" value="<?php if(isset($result[0]->id)){ echo $result[0]->id; } ?>" >
                     <div class="form-group col-md-12">
                        <label for="fname"> Instructor Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Instructor Name" name="name" readonly value="<?php if(isset($result[0]->name)){ echo $result[0]->name; } ?>" >
                     </div>
                                 
                     <div class="form-group col-md-12">
                        <label for="mobno">Email:</label>
                        <input type="text" class="form-control" id="" placeholder="Instructor Date" name="exDate" readonly value="<?php if(isset($result[0]->email)){ echo $result[0]->email; } ?>">
                     </div>
                     
                     <div class="form-group col-md-12">
                        <label for="mobno">Gender :</label>
                        <input type="text" class="form-control" id="" placeholder="Instructor Date" name="exDate" readonly value="<?php if(isset($result[0]->gender)){ echo $result[0]->gender; } ?>">
                     </div>

                     <div class="form-group col-md-12">
                        <label for="mobno">Date OF Birth :</label>
                        <input type="text" class="form-control" id="" placeholder="Instructor Date" name="exDate" readonly value="<?php if(isset($result[0]->dob)){ echo $result[0]->dob; } ?>">
                     </div>

                     <div class="form-group col-md-12">
                        <label for="mobno">LIcense NO. :</label>
                        <input type="text" class="form-control" id="" placeholder="Instructor Date" name="exDate" readonly value="<?php if(isset($result[0]->licence_no)){ echo $result[0]->licence_no; } ?>">
                     </div>
                    
                    <div class="form-group col-md-12">
                        <label for="mobno">Mobile :</label>
                        <input type="text" class="form-control" id="" placeholder="Instructor Date" name="exDate" readonly value="<?php if(isset($result[0]->mobile)){ echo $result[0]->mobile; } ?>">
                     </div>
                           
                    <div class="form-group col-md-12">
                        <label for="mobno">Account Holder Name :</label>
                        <input type="text" class="form-control" name="acname" readonly value="<?php if(!empty($result[0]->ac_name)){ echo $result[0]->ac_name; }else{ echo '';} ?>">
                     </div>
                     
                     <div class="form-group col-md-12">
                        <label for="mobno">Account Number :</label>
                        <input type="text" class="form-control" name="acnumber" readonly value="<?php if(!empty($result[0]->ac_nunber)){ echo $result[0]->ac_number; }else{ echo '';} ?>">
                     </div>
                     
                     <div class="form-group col-md-12">
                        <label for="mobno">Bank Name :</label>
                        <input type="text" class="form-control" name="bkname" readonly value="<?php if(!empty($result[0]->bk_name)){ echo $result[0]->bk_name; }else{ echo '';} ?>">
                     </div>
                     
                     <div class="form-group col-md-12">
                        <label for="mobno">IFSC :</label>
                        <input type="text" class="form-control" name="ifsc" readonly value="<?php if(!empty($result[0]->ifsc)){ echo $result[0]->ifsc; }else{echo '';} ?>">
                     </div>
                              
                     <div class="form-group col-md-12">
                        <label for="mobno">License Photo:</label>
                        <img style="width:180px; height:115px;" src="<?php echo base_url('uploads/'. $result[0]->licence_photo);?>" alt="Image"/>
                           <?php if(!empty($result[0]->profile_photo)) { ?>
                        <label for="mobno">Profile Photo:</label>
                        <img style="width:180px; height:115px;" src="<?php echo base_url('uploads/'. $result[0]->profile_photo);?>" alt="Image"/>     
                        <?php }?>             
                     </div>
                  </div>
                  <!-- <button type="submit" class="btn btn-primary">Edit Instructor </button> -->
                     <button type="button" onclick="window.history.back();" class="btn btn-primary">Back </button>
               </form>  
            </div>
         </div>
      </div>
   </div>
   
   </div>
</div>
   

   <!-- Wrapper END -->