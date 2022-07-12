<!-- Page Content  -->
<div id="content-page" class="content-page">
   <div class="container-fluid">
         
   <div class="row">
      <div class="col-lg-12">
         <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
               <div class="iq-header-title">
                  <h4 class="card-title"> Add/Edit Instructor Information</h4>
               </div>
            </div>
            <div class="iq-card-body">
               <div class="new-user-info">
               <form method="post" action="<?php echo site_url('Instructor/'); ?>" >
                  <div class="row">
                     <input type="hidden" name="id" value="<?php if(isset($result[0]->id)){ echo $result[0]->id; } ?>" >
                     <div class="form-group col-md-12">
                        <label for="fname"> Instructor Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Instructor Name" name="name" required value="<?php if(isset($result[0]->name)){ echo $result[0]->name; } ?>" >
                     </div>
                                 
                     <div class="form-group col-md-12">
                        <label for="mobno">Email:</label>
                        <input type="text" class="form-control" id="" placeholder="Instructor Date" name="exDate" required value="<?php if(isset($result[0]->email)){ echo $result[0]->email; } ?>">
                     </div>
                     
                     <div class="form-group col-md-12">
                        <label for="mobno">Gender :</label>
                        <input type="text" class="form-control" id="" placeholder="Instructor Date" name="exDate" required value="<?php if(isset($result[0]->gender)){ echo $result[0]->gender; } ?>">
                     </div>

                     <div class="form-group col-md-12">
                        <label for="mobno">Date OF Birth :</label>
                        <input type="text" class="form-control" id="" placeholder="Instructor Date" name="exDate" required value="<?php if(isset($result[0]->dob)){ echo $result[0]->dob; } ?>">
                     </div>

                     <div class="form-group col-md-12">
                        <label for="mobno">LIcense NO. :</label>
                        <input type="text" class="form-control" id="" placeholder="Instructor Date" name="exDate" required value="<?php if(isset($result[0]->licence_no)){ echo $result[0]->licence_no; } ?>">
                     </div>
                              
                     <div class="form-group col-md-12">
                        <label for="mobno">License Photo:</label>
                        <img style="width:180px; height:115px;" src="<?php echo base_url('uploads/'. $result[0]->licence_photo);?>" alt="Image"/>                  
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