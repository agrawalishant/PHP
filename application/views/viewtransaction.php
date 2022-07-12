<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                       <div class="iq-header-title">
                          <h4 class="card-title"> Payment Information</h4>
                       </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <!--<form method="post" action="<?php //echo site_url('Instructor/'); ?>" >-->
                            <?php if(!empty($result)) { ?>
                                <div class="row">
                                    <input type="hidden" name="id" value="<?php if(isset($result[0]->id)){ echo $result[0]->id; } ?>" >
                                    <div class="form-group col-md-6">
                                        <label for="fname"> Payment Date:</label>
                                        <input type="text" class="form-control" value="<?php if(!empty($result[0]['create_date'])){ echo date('Y-M-d H:i:s', strtotime($result[0]['create_date'])); } ?>" >
                                    </div>
                                 
                                    <div class="form-group col-md-6">
                                        <label for="mobno">Gross Amount:</label>
                                        <input type="text" class="form-control" value="<?php if(!empty($result[0]['payment_gross'])){ echo $result[0]['payment_gross']; } ?>">
                                    </div>
                     
                                    <?php if(!empty($result[0]['inst_id'])){ 
                                        $id = $result[0]['inst_id'];
                                        $instDetails = $this->generalmodel->get_all_where('instructor_details',array('id'=>$id)); ?>
                                        <div class="form-group col-md-4">
                                            <label for="mobno">Instructor Name :</label>
                                            <input type="text" class="form-control" value="<?php echo $instDetails[0]['name']; ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="mobno">Instructor Mobile :</label>
                                            <input type="text" class="form-control" value="<?php echo $instDetails[0]['mobile']; ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="mobno">Instructor Email :</label>
                                            <input type="text" class="form-control" value="<?php echo $instDetails[0]['email']; ?>">
                                        </div>
                                    <?php } ?>
                     
                                    <?php if(!empty($result[0]['user_id'])){ 
                                        $id = $result[0]['user_id'];
                                        $stuDetails = $this->generalmodel->get_all_where('student_details',array('id'=>$id)); ?>
                                        <div class="form-group col-md-4">
                                            <label for="mobno">Student Name :</label>
                                            <input type="text" class="form-control" value="<?php if(!empty($stuDetails[0]['name'])){ echo $stuDetails[0]['name']; } ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="mobno">Student Mobile :</label>
                                            <input type="text" class="form-control" value="<?php if(!empty($stuDetails[0]['mobile'])){ echo $stuDetails[0]['mobile']; } ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="mobno">Student Email :</label>
                                            <input type="text" class="form-control" value="<?php if(!empty($stuDetails[0]['email'])){ echo $stuDetails[0]['email']; } ?>">
                                        </div>
                                    <?php } ?>       
                                </div>
                            <?php } ?>  
                            <!-- <button type="submit" class="btn btn-primary">Edit Instructor </button> -->
                            <!--<button type="button" onclick="window.history.back();" class="btn btn-primary">Back </button>-->
                            <!--</form>  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                       <div class="iq-header-title">
                          <h4 class="card-title"> Booking Details</h4>
                       </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <!--<form method="post" action="<?php //echo site_url('Instructor/'); ?>" >-->
                            <?php if(!empty($result)) { 
                                $date = explode(',',$result[0]['booking_dates']); 
                                $time = explode(',',$result[0]['product_id']);
                                $len = count($time);
                                for($i=0;$i<$len;$i++){
                                $TimeDetails = $this->generalmodel->get_all_where('instructor_time_slots',array('id'=>$time[$i]));
                                //echo $this->db->last_query();exit;
                                //print_r($TimeDetails);
                                if(!empty($date[$i]) && !empty($time[$i])){
                            ?>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="fname"> Boooking Date:</label>
                                        <input type="text" class="form-control" value="<?php if(!empty($date[$i])){ echo date('Y-M-d', strtotime($date[$i])); } ?>" >
                                    </div>
                                 
                                    <div class="form-group col-md-4">
                                        <label for="mobno">Start Time:</label>
                                        <input type="text" class="form-control" value="<?php if(!empty($TimeDetails[0]['start_time'])){ echo $TimeDetails[0]['start_time']; } ?>">
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="mobno">End Time:</label>
                                        <input type="text" class="form-control" value="<?php if(!empty($TimeDetails[0]['end_time'])){ echo $TimeDetails[0]['end_time']; } ?>">
                                    </div>
                            
                                </div>
                            <?php } } } ?>  
                            <!-- <button type="submit" class="btn btn-primary">Edit Instructor </button> -->
                            <button type="button" onclick="window.history.back();" class="btn btn-primary">Back </button>
                            <!--</form>  -->
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        
    </div>
</div>

   <!-- Wrapper END -->