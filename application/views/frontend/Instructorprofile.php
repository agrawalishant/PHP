
<style>
  label.prText {tim
    margin-left: 15px;
}
.tm-shet {
    margin-top: 20px;
}
.justify-content
{
  justify-content: center;
}

</style>
<section id="features-app" class="padd-80 head-section" style="background-color:#fff;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 clas-sm-12">
            </div>
        </div>
        <div class="row tb-m20">
            <div class="col-lg-3 col-sm-12">
                <div class="profile-heading">



                    <div class="userImg">
                      <?php if(!empty($res[0]['profile_photo'])) { ?>
                       <img src="<?php echo base_url('uploads/'.$res[0]['profile_photo']); ?>" style="height: auto;width: 100px"/> 
                      <?php } else { ?>
                        <img src="<?php echo base_url(); ?>uploads/download.png" style="height: auto;width: 100px"/> 
                      <?php } ?>
                        
                    </div>
                      <div class="userName">
                        <h4><?php echo ucfirst($res[0]['name']); ?></h4>
                      </div>
                </div>
                  
                
                <button type="button" class="fa fa-pencil-square-o" data-toggle="modal" data-target="#profileImagemodal"></button>
                
                <?php 
                $profile_act="";
                $booking_act="";
                $timslot_act="";
                $holiday_act="";
                $postcode_act="";
                
                $profile_act_st="display:none;";
                $booking_act_st="display:none;";
                $timslot_act_st="display:none;";
                $holiday_act_st="display:none;";
                $postcode_act_st="display:none;";
                
              //  echo 'helllo'; print_r($_GET['tab']);
                if(isset($_GET['tab'])){ 
                    switch($_GET['tab']){
                        case "PROFILE":
                            $profile_act="active";
                            $profile_act_st="display:block;";
                        break;
                        
                        case "BOOKING":
                            $booking_act="active";
                            $booking_act_st="display:block;";
                        break;
                        
                        case "TIMESLOT":
                            $timslot_act="active";
                            $timslot_act_st="display:block;";
                        break;
                        
                        case "HOLIDAY":
                            $holiday_act="active";
                            $holiday_act_st="display:block;";
                        break;
                        
                        case "POSTCODE":
                            $postcode_act="active";
                            $postcode_act_st="display:block;";
                        break;
                        
                        default:
                            $profile_act_st="display:block;";
                            $profile_act="active";
                    }
              
                }else{
                    $profile_act_st="display:block;";
                            $profile_act="active";
                } 
               
                ?>
                <div class="Profiletab">    
                    
                    <button class="tablinks <?php echo $profile_act;?>" onclick="openCity(event, 'London')"  onclick="event.preventDefault();">MyProfile</button>
                    <button class="tablinks <?php echo $booking_act;?>" onclick="openCity(event, 'Paris')" onclick="event.preventDefault();">Booking</button>
                    <button class="tablinks <?php echo $timslot_act;?>" onclick="openCity(event, 'Tokyo')" onclick="event.preventDefault();">Time Slot</button>
                    <button class="tablinks <?php echo $holiday_act;?>" onclick="openCity(event, 'uk')" onclick="event.preventDefault();">Holiday</button>
                    <button class="tablinks <?php echo $postcode_act;?>" onclick="openCity(event, 'Brazil')" onclick="event.preventDefault();">Post Code</button>
                    
                </div>
            </div>
           
            <div class="col-lg-9 col-sm-12">
                <?php if($this->session->flashdata('upTime') !='') { ?>
                    <div class="alert alert-success" role="alert">
                      <?php echo $this->session->flashdata('upTime'); ?>
                    </div>
                <?php } ?>
                <?php if($this->session->flashdata('notUpTime') !='') { ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $this->session->flashdata('notUpTime'); ?>
                    </div>
                <?php } ?>
                <?php if($this->session->flashdata('adbokmsg') !='') { ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $this->session->flashdata('adbokmsg'); ?>
                    </div>
                <?php } ?>
                <?php if($this->session->flashdata('Cancelbokmsg') !='') { ?>
                    <div class="alert alert-success" role="alert">
                      <?php echo $this->session->flashdata('Cancelbokmsg'); ?>
                    </div>
                <?php } ?>
                <span id="lblError"></span>
              <div id="London" onclick="changeUrl('PROFILE')" class="tabcontent <?php echo $profile_act;?>" style="<?php echo $profile_act_st?> " >
                <h3>Instructor Profile</h3>
                <!-- <form class="form-content"> -->
                <form>
    
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <label>Email</label>
                        <input type="text" name="email" value="<?php echo $res[0]['email']; ?>" class="form-control" disabled>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <label>Contact Number</label>
                        <input type="text" name="mobile" value="<?php echo $res[0]['mobile']; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                     <div class="col-md-6 col-sm-12">
                        <label>License Number</label>
                        <input type="text" name="license_no" value="<?php echo $res[0]['licence_no']; ?>" class="form-control" disabled>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <label>License Photo-</label>
                        <!-- <input type="file" name="email"> -->
                        <img style="height:90px;width: 200px;" src="<?php echo base_url('uploads/'.$res[0]['licence_photo']);?>" alt="Image">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <label>Date Of Birth</label>
                        <input type="text" name="dob" value="<?php echo $res[0]['dob']; ?>" class="form-control" disabled>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <label>Gender</label>
                        <!-- <input type="file" name="email"> -->
                        <input type="text" name="gender" value="<?php echo $res[0]['gender']; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <label>Address</label>
                        <textarea class="form-control" name="address"  value="" disabled><?php echo $res[0]['address']; ?></textarea>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <label>Postcode</label>
                        <input type="text" name="pin" value="<?php echo $res[0]['post_code']; ?>" class="form-control" disabled>
                      </div>
                    </div>
                  </div>
                    
					        <div class="md-30">
                    <div class="form-group">
                      <label class="prText">Charges <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></label>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                           <?php  //$categoory = $res[0]['category'];
                        //   if($categoory == 3){
                        //   echo anchor('button','Add Charges',['class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#myModal']); }
                        //   if($categoory == 2){
                        //   	echo anchor('button','Add Charges',['class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#autoChargesAdd']); }
                        //   if($categoory == 1){
                          	//echo anchor('button','Add/Edit Charges',['class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#manualCgahesAdd']); }	
                          ?> 
                          <?php 
                          //$in = $res[0]['id'];
                          //echo "hi= ".$ciphertext = $this->encryption->encrypt($in);
                          //echo anchor("MyProfile/".$ciphertext,'Edit Details',['class'=>'btn btn-primary']);  
                          //echo $qw = encoding($msg);
                          //echo anchor("MyProfile/".$res[0]['id'],'Edit Details',['class'=>'btn btn-primary']);
                          echo anchor("MyProfile/".encoding($res[0]['id']),'Edit Details',['class'=>'btn btn-primary']);?> 
                        </div>
                      </div>
                    </div>
                  </div>
                        
                </form>
              
              <!-- =========Add Charges Display Both =========== -->
          	<?php if($categoory == 3){ ?>
	          <div class="in-pr-list md-30">
	              <?php if($this->session->set_flashdata('addch')!='') { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->set_flashdata('addch'); ?>
                                </div>
                            <?php } ?>
                    <?php if($this->session->set_flashdata('upch')!='') { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->set_flashdata('upch'); ?>
                                </div>
                            <?php } ?>        
	              
	            <!--<h3>Our Price List</h3>-->
	            <!--<div class="table-responsive">-->
	            <!--    <table class="table table-bordered table-striped">-->
	            <!--        <thead>-->
	            <!--            <tr>-->
	            <!--                <th>Days</th>-->
	            <!--                <th>Automatice</th>-->
	            <!--                <th>Manual</th>-->
	            <!--            </tr>-->
	            <!--        </thead>-->
	            <!--        <tbody>-->
	            <!--            <tr>-->
	            <!--                <td>Monday</td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['auto_monday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['manual_monday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--            </tr>-->
	            <!--            <tr>-->
	            <!--                <td>Tuesday</td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['auto_tuesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['manual_tuesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--            </tr>-->
	            <!--            <tr>-->
	            <!--                <td>Wednesday</td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['auto_wednesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['manual_wednesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--            </tr>-->
	            <!--            <tr>-->
	            <!--                <td>Thursday</td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['auto_thursday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['manual_thursday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--            </tr>-->
	            <!--            <tr>-->
	            <!--                <td>Friday</td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['auto_friday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['manual_friday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--            </tr>-->
	            <!--            <tr>-->
	            <!--                <td>Saturday</td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['auto_saturday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['manual_saturday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--            </tr>-->
	            <!--            <tr>-->
	            <!--                <td>Sunday</td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['auto_sunday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--                <td><?php if(!empty($result)) { echo $result[0]['manual_sunday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>-->
	            <!--            </tr>-->
	            <!--        </tbody>-->
	            <!--    </table>-->
	            <!--</div>-->
	          </div>
      		<?php } ?>
      		<!-- =========Add Charges Display Automatic =========== -->
      		<?php if($categoory == 2){ ?>
	          <div class="in-pr-list md-30">
	            <h3>Our Price List</h3>
	            <div class="table-responsive">
	                <table class="table table-bordered table-striped">
	                    <thead>
	                        <tr>
	                            <th>Days</th>
	                            <th>Automatice</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                            <td>Monday</td>
	                            <td><?php if(!empty($result)) { echo $result[0]['auto_monday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                        <tr>
	                            <td>Tuesday</td>
	                            <td><?php if(!empty($result)) { echo $result[0]['auto_tuesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
							</tr>
	                        <tr>
	                            <td>Wednesday</td>
	                            <td><?php if(!empty($result)) { echo $result[0]['auto_wednesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                        <tr>
	                            <td>Thursday</td>
	                            <td><?php if(!empty($result)) { echo $result[0]['auto_thursday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                        <tr>
	                            <td>Friday</td>
	                            <td><?php if(!empty($result)) { echo $result[0]['auto_friday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                        <tr>
	                            <td>Saturday</td>
	                            <td><?php if(!empty($result)) { echo $result[0]['auto_saturday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                        <tr>
	                            <td>Sunday</td>
	                            <td><?php if(!empty($result)) { echo $result[0]['auto_sunday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                    </tbody>
	                </table>
	            </div>
	          </div>
      		<?php } ?>
      		<!-- =========Add Charges Display Manual =========== -->
      		<?php if($categoory == 1){ ?>
	          <div class="in-pr-list md-30">
	            <h3>Our Price List</h3>
	            <div class="table-responsive">
	                <table class="table table-bordered table-striped">
	                    <thead>
	                        <tr>
	                            <th>Days</th>
	                            <th>Manual</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                            <td>Monday</td>
	                            <td><?php if(!empty($result)) { echo $result[0]['manual_monday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                        <tr>
	                            <td>Tuesday</td>
	                                 <td><?php if(!empty($result)) { echo $result[0]['manual_tuesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                        <tr>
	                            <td>Wednesday</td>
	                                 <td><?php if(!empty($result)) { echo $result[0]['manual_wednesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                        <tr>
	                            <td>Thursday</td>
	                                 <td><?php if(!empty($result)) { echo $result[0]['manual_thursday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                        <tr>
	                            <td>Friday</td>
	                            <td><?php if(!empty($result)) { echo $result[0]['manual_friday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                        <tr>
	                            <td>Saturday</td>
	                                 <td><?php if(!empty($result)) { echo $result[0]['manual_saturday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                        <tr>
	                            <td>Sunday</td>
	                            <td><?php if(!empty($result)) { echo $result[0]['manual_sunday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>
	                        </tr>
	                    </tbody>
	                </table>
	            </div>
	          </div>
      		<?php } ?>
              </div>
              
<!-- ======================My Profile Ends============================== -->              
<!-- =================== Bookings starts======================= -->
              <div id="Paris"  onclick="changeUrl('BOOKING')" class="tabcontent  <?php echo $booking_act;?>" style="<?php echo $booking_act_st?>">
                <?php if($this->session->userdata('nobookings')!= '') { ?>
                	<div class="alert alert-success">
					  <?php echo $this->session->userdata('nobookings'); ?>
					</div>
                 <?php } else{ if(!empty($bookings_details)) { ?>
                  <div class="in-pr-list md-30">
                    <h3>My Bookings</h3>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" style="width:99%;" id="datatableinstboooking">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Vehicle Type</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <!--<th>Add Bookings</th>-->
                                     <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody id="myschedule">
                              <?php foreach($bookings_details as $values) { ?>
                                
                                    
                                    <!--<td>-->
                                         <!--<button type="button" class="btn btn-primary" > + </button>-->
                                     <!--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addbookingModal"> + </button>-->
                                     <!--</td>-->
                                    <?php 
                                        $booking_dates = explode(',',$values['booking_dates']); 
                                        $i=0;
                                        $time_slot_id = explode(',',$values['product_id']);
                                        //echo"<pre>";print_r($time_slot_id);exit;
                                        foreach($time_slot_id as $times) {
                                        $instdatas = $this->Generalmodel->get_all_where('instructor_time_slots',array('id'=>$times));    
                                        $starttimees = $instdatas[0]['start_time'];
                                        $endtimees = $instdatas[0]['end_time'];
                                        //$booking_dates = explode(',',$values['booking_dates']); 
                                        if(!empty($booking_dates[$i]) && !empty($starttimees) && !empty($endtimees)){
                                    ?>
                                    
                                    <tr class="single-item">
                                    <?php 
                                        $stu_id = $values['user_id'];
                                        $inst_id = $values['inst_id'];
                                        //echo $stu_id;exit;
                                        $studata = $this->Generalmodel->get_all_where('student_details',array('id'=>$stu_id));
                                        $instdata = $this->Generalmodel->get_all_where('instructor_details',array('id'=>$inst_id));
                                        //echo "<pre>";print_r($instdata);
                                        
                                    ?>    
                                    <td><?php if(!empty($studata[0]['name'])){echo $studata[0]['name']; } ?></td>
                                  <?php if($instdata[0]['category'] !=2) { ?>
                                    <td>Manual</td>
                                  <?php } else { ?>
                                    <td>Automatic</td>
                                  <?php } ?>
                                    <td><?php echo $booking_dates[$i]; ?></td>
                                    <td><?php echo date('l', strtotime($booking_dates[$i]));//echo $instdatas[0]['day']; ?></td>
                                    <td><?php echo $starttimees; ?></td>
                                    <td><?php echo $endtimees; ?></td>
                                    <td>
                                        <?php 
                                        $ckdate = date('Y-m-d');
                                            if($booking_dates[$i] > $ckdate){
                                        ?>
                                        <a href="<?php echo site_url('Instructor/cancelBooking/'.$values['payment_id'].'/'.$times);?>" onclick=" return confirm('Click OK fro Delete Booking');" class="btn btn-danger">Cancel</a>
                                        <?php }else{?>                
                                        <button class="btn btn-success">Confirm</button>
                                        <?php } ?>
                                    </td>
                                    </tr>
                                    <?php $i++; } } } ?>
                                       
                            </tbody>
                        </table>
                        <p><?php //echo $links; ?></p>
                    </div>
                  </div>  
                  <?php } } ?> 
              </div>
<!-- =================== Time Slot Table Starts ======================================== -->
              <div id="Tokyo"  onclick="changeUrl('TIMESLOT')" class="tabcontent <?php echo $timslot_act;?>" style="<?php echo $timslot_act_st?>">
                <h3>Timing</h3>
                  <form class="form-content">
                    <div class="form-group">
                      <div class="row justify-content">

                        <div class="col-md-4 col-sm-12 ins-fa-icon">
                            
                          <i class="fa fa-car fm-icon" aria-hidden="true"></i>
                          
                          <select name="cars" id="cars" class="form-control">
                          <?php if(!empty($res)) { if($res[0]['category'] == 1){ ?><option value="1">Manual</option>
                          <?php } elseif($res[0]['category'] == 2){ ?><option value="2">Automated</option>
                          <?php } elseif($res[0]['category'] == 3){ ?>
                             <option value="0">Vehicle Type</option>
                             <option value="1">Manual</option>
                             <option value="2">Automated</option>
                            <?php } } ?>
                          </select>
                          <span id="vechiempty" style="color: red;"></span>
                        </div>
                        
                        <div class="col-md-4 col-sm-12 ins-fa-icon" id="dadt">
                          <!-- <label>Date & Time</label> -->
                          <i class="fa fa-calendar-check-o fm-icon" aria-hidden="true"></i>
                          <!-- <input type="date" name="date" id="dat" class="form-control"> -->
                          <select name="day" id="day" class="form-control" >
                             <option value="0">Select Day</option>
                             <option value="Monday">Monday</option>
                             <option value="Tuesday">Tuesday</option>
                             <option value="Wednesday">Wednesday</option>
                             <option value="Thursday">Thursday</option>
                             <option value="Friday">Friday</option>
                             <option value="Saturday">Saturday</option>
                             <option value="Sunday">Sunday</option>
                          </select>
                          <span id="dayempty" style="color: red;"></span>
                        </div>
                        
                        <div class="col-md-4 col-sm-12 ins-fa-icon">
                          <i class="fa fa-clock-o fm-icon" aria-hidden="true">&nbsp</i><b style="color:#000;">Start Time</b>
                          <!--<input type="time" name="time" id="tm" class="form-control" >-->
                    <!--Timepicker Starts    -->
                                <input type="text" onclick="timepicker(this,'a')" name="time" id="tm" placeholder="Select Time">
                    <!--Timepicker Ends    -->                

                          <span id="timempty" style="color: red;"></span>
                        </div>
                        <span id="validity" style="color: red;"></span> 
                      </div>
                      <div class="col-sm-12 tm-shet" style="text-align: center;">
                        <input type="hidden" name="ids" id="ids" value="<?php echo $res[0]['id'];?>">
                        <input type='button' value="Add" id="addon" class="btn btn-primary" />
                      </div>
                    </div>
                  </form>
                  <!-- <table class="alert alert-dark" id="divadd" > 
                    <tr class="locationRepeat" >
                      
                    </tr>
                  </table> -->
                          
                  <!-- <div id="divadd1" class="alert alert-dark" role="alert">
                    This is a dark alert—check it out!
                  </div> -->
                  <?php if(!empty($result_time)) { ?>
                  <div class="in-pr-list md-30">
                    <h3>Time Slot</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example_datatable">
                            <thead>
                                <tr>
                                    <th>Vehicle Type</th>
                                    <th>Days</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="myschedule">
                              <?php foreach($result_time as $values) { ?>
                                <tr>
                                  
                                  <?php if($values['vechical_type'] == 1) { ?>
                                    <td>Manual</td>
                                  <?php } else { ?>
                                    <td>Automatic</td>
                                  <?php } ?>
                                    <td><?php echo $values['day']; ?></td>
                                    <td><?php echo $values['start_time']; ?></td>
                                    <td><?php echo $values['end_time']; ?></td>
                                    <td>
                                       <button type="button" class="btn btn-primary" onclick="timecall(<?php echo $values['id']; ?>);">Edit</button>
                                          <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>Deletetimeslot/delete/<?php echo $values['id']; ?>" class="btn btn-primary">Delete</a>
                   
                                    </td>
                                    <!-- <td>Edit Delete</td> -->
                                </tr>
                              <?php } ?>  
                            </tbody>
                        </table>
                    </div>
                  </div>  
                  <?php } ?> 
              </div>
<!-- =================== Holiday Starts ======================================== -->
               <div id="uk"  onclick="changeUrl('HOLIDAY')" class="tabcontent <?php echo $holiday_act;?>" style="<?php echo $holiday_act_st?>">
                <h3>Holiday</h3>
                  <form class="form-content">
                    <div class="form-group">
                      <div class="row justify-content">

                        <div class="col-md-4 col-sm-12 ins-fa-icon" id="dadt">
                           <label>Start Date</label> 
                          <i class="fa fa-calendar-check-o fm-icon" aria-hidden="true"></i>
                            <input type="hidden" value="<?php echo $res[0]['id']; ?>" id="holi_inst_id" />    
                            <!--<input type="date" name="holidate" id="holidate" min="<?php echo date('Y-m-d'); ?>" class="form-control" onchange=holist();> -->
                            <input type="text" name="holidate"  id="holidate" placeholder="Select Date" class="datepicker form-control" onchange="endcalender(),holist()" />
                            <span id="dayempty" style="color: red;"></span>
                        </div>
                        
                        <div class="col-md-4 col-sm-12 ins-fa-icon" id="dadt">
                            <label>End Date</label> 
                            <i class="fa fa-calendar-check-o fm-icon" aria-hidden="true"></i>
                            <input type="hidden" value="<?php //echo $res[0]['id']; ?>" id="holi_inst_id1" />    
                            <input type="text" name="holidate1"  id="holidate1" placeholder="Select End Date" class="enddatepicker form-control" onchange="holist();" />
                            <!--<span id="dayempty" style="color: red;"></span>-->
                        </div>
                        
                        <div class="col-md-4 col-sm-12 ins-fa-icon">
                          <i class="fa fa-clock-o fm-icon" aria-hidden="true">&nbsp</i>
                          <label><b style="color:#000;">Time Slots</b></label>
                          <!--<input type="time" name="holitime" id="holitm" class="form-control" >-->
                          <select id="holitimes" name="" class="form-control">
                              <option value="0">Select Time</option>
                          </select>
                           <select id="abcd" name="" class="form-control" style="display:none;">
                              <option value="0">Select Time</option>
                          </select>
                          <span id="timempty" style="color: red;"></span>
                        </div>
                        <span id="validitytime" style="color: red;"></span> 
                      </div>

                        

                      <div class="col-sm-12 tm-shet" style="text-align: center;">
                        <input type="hidden" name="ids" id="ids" value="<?php echo $res[0]['id'];?>">
                        <input type='button' value="Add" id="addholiday" class="btn btn-primary" />
                      </div>
                    </div>
                  </form>
                  
                  
                  <?php if(!empty($hoilres)) { ?>
                  <div class="in-pr-list md-30">
                    <h3>Holiday Slots</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="holiday_datatable">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="myschedule">
                              <?php foreach($hoilres as $values) {
                              $hoilres = $this->Generalmodel->get_all_where('instructor_time_slots',array('id'=> $values['timeslot_id']));
                              //echo "<pre>";print_r($hoilres);
                              ?>
                                <tr>
                                    <td>
                                        <?php 
                                            $st_date = $values['start_date'];
                                            $ed_date = $values['end_date'];
                                            if($st_date == $ed_date)
                                            {
                                                echo $st_date;
                                            }
                                            else
                                            {
                                                echo $st_date." - ".$ed_date;
                                            }
                                            // $all_slots=array();
                                            // $holiday_dates=explode(",",$values['date']);
                                            // for($i=0;$i<count($holiday_dates);$i++)
                                            // {
                                            //     $all_slots=$holiday_dates[$i];
                                            //     $start_date=$holiday_dates[0];
                                            //     $last_date=$holiday_dates[$i];
                                            // }
                                            // if($start_date==$last_date)
                                            // {
                                            //     echo $start_date;
                                            // }
                                            // else
                                            // {
                                            //     echo $start_date." - ".$last_date;
                                            // }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($st_date==$ed_date)
                                            {
                                                echo $values['day'];
                                            }
                                            else
                                            {
                                                echo "All";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($st_date==$ed_date)
                                            {
                                                echo $hoilres[0]['start_time']; 
                                            }
                                            else
                                            {
                                                echo "All";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($st_date==$ed_date)
                                            {
                                                echo $hoilres[0]['end_time']; 
                                            }
                                            else
                                            {
                                                echo "All";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="holidel(<?php echo $values['id']; ?>);">Delete</button>
                                    </td>
                                    <!-- <td>Edit Delete</td> -->
                                </tr>
                              <?php } ?>  
                            </tbody>
                        </table>
                    </div>
                  </div>  
                  <?php } ?> 
              </div>
<!-- =================== Post Code ======================================== -->
                <div id="Brazil"  onclick="changeUrl('POSTCODE')" class="tabcontent <?php echo $postcode_act;?>" style="<?php echo $postcode_act_st?>">
                <h3>Add Post Code</h3>
                  <form class="form-content">
                    <div class="form-group">
                      <div class="row justify-content">

                        <div class="col-md-6 col-sm-12 ins-fa-icon" id="dadt">
                           <img src="<?php echo base_url();?>assets/images/location-map.png" class="form-width fm-icon" alt="">
                           <label>PostCode*</label> 
                            <input type="hidden" value="<?php echo $res[0]['id']; ?>" id="post_inst_id" />    
                            <input type="text" name="postcode" id="postcode" class="form-control" > 
                            <span id="postempty" style="color: red;"></span>
                            <span id="validitypost" style="color: red;"></span>
                        </div>
                         <div class="col-md-6 col-sm-12 ins-fa-icon" id="dadt">
                          
                           <label>Price*</label> 
                              
                            <input type="number" name="postprice" id="postprice" class="form-control" required> 
                            <span id="postprice" style="color: red;"></span>
                            <span id="validitypost" style="color: red;"></span>
                        </div>
                      </div>

                      <div class="col-sm-12 tm-shet" style="text-align: center;">
                        <input type="hidden" name="ids" id="ids" value="<?php echo $res[0]['id'];?>">
                        <input type='button' value="Add" id="addpostcode" class="btn btn-primary" />
                      </div>
                    </div>
                  </form>
                  
                  
                  <?php if(!empty($result_postcode)) { ?>
                  <div class="in-pr-list md-30">
                    <h3>Post Code</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="postcode_datatable">
                            <thead>
                                <tr>
                                    <th>Post Code</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="myschedule">
                              <?php if(!empty($result_postcode)) { foreach($result_postcode as $values) { ?>
                                <tr>
                                    <td><?php echo $values['postcode']; ?></td>
                                     <td><?php echo $values['prices']; ?><i class="fa fa-gbp"></i></td>
                                    <td>
                                        <a  href="" data-toggle="modal" data-target="#model<?php echo $values['id']; ?>" data-id="<?php echo $values['id']; ?>" class="btn btn-primary">Edit</a>
                                        <button type="button" class="btn btn-primary" onclick="postdel(<?php echo $values['id']; ?>);">Delete</button>
                                    </td>
                                    <!-- <td>Edit Delete</td> -->
                                </tr>
                              <?php } } ?>  
                            </tbody>
                        </table>
                    </div>
                  </div>  
                  <?php } ?> 
              </div>
              <!--POP START-->
               <!-- model start updatedata data-->
 
  <?php if(!empty($result_postcode)){ foreach($result_postcode as $viewData){ ?>

<!-- Modal -->
<div class="modal fade" id="model<?php echo $iddata=$viewData['id'];?>" role="dialog">
    <div class="modal-dialog modelincrease">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit PostCode</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'updateaddpostcode/update/'.$viewData['id'], array('id' => 'postmyid')); ?>
               
                     <div class="form-group">
                        <label for="inputName">Post Code</label>
                        <input type="text" class="form-control" id="postcodes" name="postcode" placeholder="name" value="<?php echo $viewData['postcode'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Price</label>
                        <input type="number" class="form-control" id="prices" name="prices" placeholder="prices" value="<?php echo $viewData['prices'];?>"/>
                    </div>
                      
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary submitBtn" >SUBMIT</button>
            </div> <?php echo form_close(); ?>
        </div>
    </div>
</div>
  <!-- model end -->
  <?php }} ?>
              <!--POP END-->
<!-- ===================Price List Table======================================== -->           		
            </div>
          </div>
    </div> 


<!-- // new modal For Time Picker -->
<div class="modal1 timepicker_wrapper" >
        <div class="modal-content">
            <div class="timepicker_wrapper_main">
                <p class="timepicker_header">
                    <b>12</b>:<b>00</b>
                    <b>AM</b>
                </p>
                <div class="timepicker_data_select">
                    <select onchange="changeTimepickerheader(this,'1')" size="5" class="timepicker_hour"></select>
                    <select onchange="changeTimepickerheader(this,'2')" size="5"  class="timepicker_minute"></select>
                    <select onchange="changeTimepickerheader(this,'3')" size="5" class="timepicker_ampm">
                        <option value="AM">AM</option><option value="PM">PM</option>
                    </select>
                </div>
                <div class="timepicker_control">
                    <button type="button" onclick="close_hide();">Close</button><button onclick="timepicker(this,'c')">Clear</button><button onclick="timepicker(this,'s')">Set</button>
                </div>
            </div>
        </div>
    </div>  
<!-- // new modal ADD charges For Both -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="<?php echo site_url('Instructor-InsertCharges');?>" method="post" >
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">ADD Charges</h4>
      </div>
      <div class="modal-body">
         <div class="columns">

            <ul class="price">

              <li class="header" style="background-color:#fe6439">Automated <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>

              <!-- <form> -->

                  <li class="form-group">

                   <input type="number" name="a_monday" value="<?php if(!empty($result)) { echo $result[0]['auto_monday'] ; } ?>" class="form-control" placeholder="Monday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="a_tuesday" value="<?php if(!empty($result)) { echo $result[0]['auto_tuesday'] ; } ?>" class="form-control" placeholder="Tuesday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="a_wednesday" value="<?php if(!empty($result)) { echo $result[0]['auto_wednesday'] ; } ?>" class="form-control" placeholder="Wednesday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="a_thursday" value="<?php if(!empty($result)) { echo $result[0]['auto_thursday'] ; } ?>" class="form-control" placeholder="Thursday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="a_friday" value="<?php if(!empty($result)) { echo $result[0]['auto_friday'] ; } ?>" class="form-control" placeholder="Friday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="a_saturday" value="<?php if(!empty($result)) { echo $result[0]['auto_saturday'] ; } ?>" class="form-control" placeholder="Saturday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="a_sunday" value="<?php if(!empty($result)) { echo $result[0]['auto_sunday'] ; } ?>" class="form-control" placeholder="Sunday">

                  </li>

              <!-- </form> -->

            </ul>

          </div>

          <div class="columns">

            <ul class="price">

              <li class="header" style="background-color:#fe6439">Manual <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>

              <!-- <form> -->

                  <li class="form-group">

                   <input type="number" name="m_monday" value="<?php if(!empty($result)) { echo $result[0]['manual_monday'] ; } ?>" class="form-control" placeholder="Monday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="m_tuesday" value="<?php if(!empty($result)) { echo $result[0]['manual_tuesday'] ; } ?>" class="form-control" placeholder="Tuesday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="m_wednesday" value="<?php if(!empty($result)) { echo $result[0]['manual_wednesday'] ; } ?>" class="form-control" placeholder="Wednesday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="m_thursday" value="<?php if(!empty($result)) { echo $result[0]['manual_thursday'] ; } ?>" class="form-control" placeholder="Thursday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="m_friday" value="<?php if(!empty($result)) { echo $result[0]['manual_friday'] ; } ?>" class="form-control" placeholder="Friday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="m_saturday" value="<?php if(!empty($result)) { echo $result[0]['manual_saturday'] ; } ?>" class="form-control" placeholder="Saturday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="m_sunday" value="<?php if(!empty($result)) { echo $result[0]['manual_sunday'] ; } ?>" class="form-control" placeholder="Sunday">

                  </li>

                <!-- </form> -->              

            </ul>

          </div>
          <input type="hidden" name="inst_id" value="<?php echo $res[0]['id'];?>" >
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" >Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </form>

  </div>
</div>
<!-- // New Modal ADD Cherges for Automaitc  -->
<div id="autoChargesAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="<?php echo site_url('Instructor-InsertAutoCharges');?>" method="post" >
    <div class="modal-content">
	    <div class="modal-header">
    	    <h4 class="modal-title">ADD Charges</h4>
      	</div>
    <div class="modal-body">
        
            <ul class="price">

              <li class="header" style="background-color:#fe6439">Automatice <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>

              <!-- <form> -->

                  <li class="form-group">

                   <input type="number" name="a_monday" value="<?php if(!empty($result)) { echo $result[0]['auto_monday'] ; } ?>" class="form-control" placeholder="Monday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="a_tuesday" value="<?php if(!empty($result)) { echo $result[0]['auto_tuesday'] ; } ?>" class="form-control" placeholder="Tuesday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="a_wednesday" value="<?php if(!empty($result)) { echo $result[0]['auto_wednesday'] ; } ?>" class="form-control" placeholder="Wednesday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="a_thursday" value="<?php if(!empty($result)) { echo $result[0]['auto_thursday'] ; } ?>" class="form-control" placeholder="Thursday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="a_friday" value="<?php if(!empty($result)) { echo $result[0]['auto_friday'] ; } ?>" class="form-control" placeholder="Friday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="a_saturday" value="<?php if(!empty($result)) { echo $result[0]['auto_saturday'] ; } ?>" class="form-control" placeholder="Saturday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="a_sunday" value="<?php if(!empty($result)) { echo $result[0]['auto_sunday'] ; } ?>" class="form-control" placeholder="Sunday">

                  </li>

              <!-- </form> -->
            </ul>
        
         <input type="hidden" name="inst_id" value="<?php echo $res[0]['id'];?>" >
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" >Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </form>
	</div>
</div>
<!-- // New Modal ADD Charges For MAnual  -->
<div id="manualCgahesAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<form action="<?php echo site_url('Instructor-InsertManualCharges');?>" method="post" >
    	<div class="modal-content">
      		<div class="modal-header">
		        <h4 class="modal-title">ADD Charges</h4>
      		</div>
      		<div class="modal-body">
         		
         			<ul class="price">

              <li class="header" style="background-color:#fe6439">Manual <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>

              <!-- <form> -->

                  <li class="form-group">

                   <input type="number" name="m_monday" value="<?php if(!empty($result)) { echo $result[0]['manual_monday'] ; } ?>" class="form-control" placeholder="Monday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="m_tuesday" value="<?php if(!empty($result)) { echo $result[0]['manual_tuesday'] ; } ?>" class="form-control" placeholder="Tuesday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="m_wednesday" value="<?php if(!empty($result)) { echo $result[0]['manual_wednesday'] ; } ?>" class="form-control" placeholder="Wednesday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="m_thursday" value="<?php if(!empty($result)) { echo $result[0]['manual_thursday'] ; } ?>" class="form-control" placeholder="Thursday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="m_friday" value="<?php if(!empty($result)) { echo $result[0]['manual_friday'] ; } ?>" class="form-control" placeholder="Friday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="m_saturday" value="<?php if(!empty($result)) { echo $result[0]['manual_saturday'] ; } ?>" class="form-control" placeholder="Saturday">

                  </li>

                  <li class="form-group">

                   <input type="number" name="m_sunday" value="<?php if(!empty($result)) { echo $result[0]['manual_sunday'] ; } ?>" class="form-control" placeholder="Sunday">

                  </li>

                <!-- </form> -->              

            </ul>
      			
          	<input type="hidden" name="inst_id" value="<?php echo $res[0]['id'];?>" >
      	</div>
      	<div class="modal-footer">
        	<button type="submit" class="btn btn-default" >Submit</button>
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      	</div>
      		</div>
  	</form>
  </div>
</div>
<!-- // new modal edit profile image -->

<div class="modal" id="profileImagemodal">
  <div class="modal-dialog">
     <form action="<?php echo site_url('Instructor-ImageUpdate');?>" method="post" enctype='multipart/form-data' >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Image</h4>
      </div>
      <div class="modal-body">
        <input type="file" id="photo" name="photo" accept="image/x-png,image/gif,image/jpeg">
        <input type="hidden" name="inst_id" value="<?php echo $res[0]['id'];?>" >
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" onclick="ValidateExtension();">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </form>
  </div>
</div>

   <!-- The Edit Time Modal -->

<div class="modal" id="editTime">
      <div class="modal-dialog">
        <div class="modal-content" style="border: 2px solid #fdc405;">
         <form action="<?php echo site_url('Instructor/inst_time_edit');?>" method="post" >    
          <div class="modal-header" style="    color: #fff;background: #373737;">
            <h4 class="modal-title">Edit Time Slot</h4>
            <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
          </div>
          <div class="modal-body">
            <table>
                <tr><div class="edtitimes">
                    
                </div></tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >Submit</button>
            <button type="button" class="btn btn-danger" id="closee" data-dismiss="modal" onclick="closed();">Close</button>
          </div>
         </form>
        </div>
      </div>
    </div>

    <!-- Additional Booking Modal -->

<div id="addbookingModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="<?php echo site_url('Instructor/addboookkkings');?>" method="post" enctype='multipart/form-data' >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Additional Bookings</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
      <div class="modal-body">
            <label>Date</label>
            <input type="date" name="addbokdate" id="addbokdate" min="<?php echo date('Y-m-d'); ?>"/>
            <label>Time</label>
            <input type="time" name="addboktime" id="addboktime" onchange="addationalbookings();"/><br>
            <!--<input type="radio" name="offline" id="offline" value="offline" checked/> Offline-->
            <!--&nbsp&nbsp&nbsp&nbsp-->
            <!--<input type="radio" name="offline" id="online" value="online" /> Online-->
            &nbsp&nbsp&nbsp&nbsp
            <span style="color:red;" class="showem"></span>
      </div>
      
      <div class="modal-footer">
          <input type="hidden" name="time_id" id="time_id" value="" >
          <input type="hidden" name="stu_id" id="stu_id" value="<?php echo $stu_id; ?>" >
          <input type="hidden" name="inst_id" id="insts" value="<?php echo $res[0]['id'];?>" >
        <button type="submit" class="btn btn-default btnsub" id="btnsub">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
    </form>        
  </div>
</div>
        <!--The Modal-->
</section>
 
<script>
var page_tab='';
////////////////////////////////////////////////////////
function closed()
{
    //$('#editTime').modal("hide");
    $("#editTime").hide("modal");
    
}

//////////////////////////////////////////////////////////
$(document).ready(function(){
        $('#btnsub').attr("disabled",true);
    });

function addationalbookings()
{
    var instids = document.getElementById("insts").value ;
    var dadt = document.getElementById("addbokdate").value ;
    var tmt = document.getElementById("addboktime").value ;
    //alert(dadt);
    
    uri = '<?=base_url()?>Instructor/addbookkings';
        $.ajax({
          url:uri,
          type: "POST", 
          dataType:'json',
          data:{ ids: instids, date:dadt , time:tmt },
          success: function (res){
             // alert(res.success);
              //console.log(res);
             // var res = JSON.parse(res1);
             // alert(res.success);
              if(res.success == 'true'){ 
                  $(".showem").text(res.addbokmsg);
                  $("#btnsub").attr("disabled",true);
                
                
              }
              else
              {//console.log('else');
                    $(".showem").text("");  
                    $("#time_id").val(res.time_id);
                    $("#btnsub").attr("disabled",false);
              }
          },
      });
}
////////////////////////////////////////////////////////////
function timecall(id)
{   
     uri = '<?=base_url()?>Instructor/edittimeslot';
        $.ajax({
          url:uri,
          type: "POST", 
          dataType:'json',
          data:{ ids: id },
          success: function (res){
              if(res.success == '1'){ 
            $("#editTime").show("modal");
            $('.edtitimes').html(res.msg);
              }
          },
      });
   // $("#editTime").modal("show");
    
}

function changeUrl(tabname=''){
   
    page_tab="https://www.dvdrive.co.uk/Instructor-Ready?tab="+tabname;
}

////////////////////// Time ADD ////////////////////////
 $("#addon").click(function(){
     var instid = document.getElementById("ids").value ;
    var cart = document.getElementById("cars").value ;
    var dadt = document.getElementById("day").value ;
    var tmt = document.getElementById("tm").value ;
    
   // var exitTime = moment(tmt,'HH:mm').add(2,'hour').format('HH:mm');     
   // var subTime = moment(tmt,'HH:mm').add(-2,'hour').format('HH:mm');  
        
    if(cart == 0)
    {
      $('#vechiempty').html('Select vehicle');
      return false;
    }
    if(dadt == 0)
    {
      $('#dayempty').html('Select Day');
      return false;
    }
    if(tmt =='')
    {
      $('#timempty').html('Select Time');
      return false;
    }
    else
    {
      //if()
            uri = '<?=base_url()?>Instructor/addtimeslot';
        //alert(uri);
        $.ajax({
          url:uri,
          type: "POST", 
          dataType:'json',
          data:{ car: cart , inst_id: instid, day : dadt, time : tmt },
          success: function (res){

            if(res.success == '1'){ 
              alert(res.msg);
              location.assign(page_tab);
              //location.reload();
            }
              else{
                 $('#validity').html(res.msg);
              }
            
          },
      });     
    }  

    // $('body').on('click','.removeAppend',function(){
    //             $(this).parents('.locationRepeat').remove();
    //         });

  });
  
/////////////////////////// Add Post Code //////////////////////////////  
$("#addpostcode").click(function(){
    
    var instid = document.getElementById("post_inst_id").value ;
    var code = document.getElementById("postcode").value ;
    var prices = document.getElementById("postprice").value ;
    if(code =='')
    {
      $('#postempty').html('Select Post Code');
      return false;
    }
    else
    {
        uri = '<?=base_url()?>Instructor/addpostcode';
        $.ajax({
          url:uri,
          type: "POST", 
          dataType:'json',
          data:{ code: code , inst_id: instid ,prices : prices},
          success: function (res){

            if(res.success == '1'){ 
              alert(res.msg);
              location.assign(page_tab);
              //location.reload();
            }
              else{
                 $('#validitypost').html(res.postmsg);
              }
          },
      });     
    }  
  });
  
function postdel(id)
    {
        
        uri = '<?=base_url()?>Instructor/deletepostcode';
        
        $.ajax
        ({
            url:uri,
            type: "POST", 
            dataType:'json',
            data:{ ids: id },
            success: function (res)
            {
                alert('Deleted Successfully');
                location.assign(page_tab);
                //location.reload();
            },
        });
    }  
  
/////////////////////////// ADD Holiday /////////////////////////////////////
$("#addholiday").click(function(){
    var instid = document.getElementById("ids").value ;
    var dadt = document.getElementById("holidate").value ;
    var enddadt = document.getElementById("holidate1").value ;
    var tmt = document.getElementById("holitimes").value ;
    
    if(enddadt=='' || enddadt<dadt || dadt=='')
    {
        alert('Please Select The Proper Date');
        return false;
    }
    else
    {
        uri = '<?=base_url()?>Instructor/addholidaytimeslot';
        $.ajax({
          url:uri,
          type: "POST", 
          dataType:'json',
          data:{ inst_id: instid, date : dadt, edate : enddadt, time : tmt },
          success: function (res){

            if(res.success == 'true'){ 
              alert(res.msg);
              location.assign(page_tab);
              //location.reload();
            }
              else{
                 $('#validitytime').html(res.msg);
              }
            
          },
      });     
    }  
  });
  
  
    function holidel(id)
    {
        
        uri = '<?=base_url()?>Instructor/deleteholiday';
        
        $.ajax
        ({
            url:uri,
            type: "POST", 
            dataType:'json',
            data:{ ids: id },
            success: function (res)
            {
                alert('Deleted Successfully');
                location.reload();
            },
        });
    }

    function endcalender()
    {
        $('.enddatepicker').datepicker('destroy');
        var dateholi = document.getElementById("holidate").value ;
        //alert(dateholi);
        
        $(".enddatepicker").datepicker({
        changeYear: true,
        changeMonth: true,
        changeDate: true,
        minDate: new Date(dateholi),
        dateFormat: "yy-mm-dd",
        yearRange: "-100:+20",
        });
   
    }

    function holist()
    {
        var dateholi = document.getElementById("holidate").value ;
        var enddateholi = document.getElementById("holidate1").value ;
        var inst_id = document.getElementById("holi_inst_id").value ;
       
        if(dateholi == enddateholi)
        {
             $('#holitimes').show();
               $('#abcd').hide();
             
            uri = '<?=base_url()?>Instructor/holidaystusduplicate';
            $.ajax
            ({
                url:uri,
                type: "POST", 
                dataType:'json',
                data:{ ids: inst_id, date : dateholi },
                success: function (res)
                {   
                    console.log(res.timemsg);
                    $('#holitimes').html(res.timemsg);
                },
            });
        }
        else
        {
             $('#abcd').show();
               $('#holitimes').hide();
        }
    }
  
/////////////////////////Image Validation///////////////////////////////////////

    // function ValidateExtension() 
    // {
    //     var allowedFiles = [".jpg", ".jpeg", ".png",".gif"];
    //     var fileUpload = document.getElementById("photo").value;
    //     var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
    //     alert(regex.test(fileUpload));
    //     if (regex.test(fileUpload)!=true) {    
    //         alert('Invalid file type');
    //         return false;
    //     }
    //     else
    //     {
    //         return true;    
    //     }
    // }

////////////////////////////////////////////////////////////////
function openCity(evt, cityName) 
{
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += "active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
///////////////////////////////////////////////////////
function close_hide()
{
    $(".modal1").hide();
}
////////////////////////////pagination/////////////////////////////
(function($) {
	var pagify = {
		items: {},
		container: null,
		totalPages: 1,
		perPage: 3,
		currentPage: 0,
		createNavigation: function() {
			this.totalPages = Math.ceil(this.items.length / this.perPage);

			$('.pagination', this.container.parent()).remove();
			var pagination = $('<div class="pagination"></div>').append('<a class="nav prev disabled" data-next="false"><</a>');

			for (var i = 0; i < this.totalPages; i++) {
				var pageElClass = "page";
				if (!i)
					pageElClass = "page current";
				var pageEl = '<a class="' + pageElClass + '" data-page="' + (
				i + 1) + '">' + (
				i + 1) + "</a>";
				pagination.append(pageEl);
			}
			pagination.append('<a class="nav next" data-next="true">></a>');

			this.container.after(pagination);

			var that = this;
			$("body").off("click", ".nav");
			this.navigator = $("body").on("click", ".nav", function() {
				var el = $(this);
				that.navigate(el.data("next"));
			});

			$("body").off("click", ".page");
			this.pageNavigator = $("body").on("click", ".page", function() {
				var el = $(this);
				that.goToPage(el.data("page"));
			});
		},
		navigate: function(next) {
			// default perPage to 5
			if (isNaN(next) || next === undefined) {
				next = true;
			}
			$(".pagination .nav").removeClass("disabled");
			if (next) {
				this.currentPage++;
				if (this.currentPage > (this.totalPages - 1))
					this.currentPage = (this.totalPages - 1);
				if (this.currentPage == (this.totalPages - 1))
					$(".pagination .nav.next").addClass("disabled");
				}
			else {
				this.currentPage--;
				if (this.currentPage < 0)
					this.currentPage = 0;
				if (this.currentPage == 0)
					$(".pagination .nav.prev").addClass("disabled");
				}

			this.showItems();
		},
		updateNavigation: function() {

			var pages = $(".pagination .page");
			pages.removeClass("current");
			$('.pagination .page[data-page="' + (
			this.currentPage + 1) + '"]').addClass("current");
		},
		goToPage: function(page) {

			this.currentPage = page - 1;

			$(".pagination .nav").removeClass("disabled");
			if (this.currentPage == (this.totalPages - 1))
				$(".pagination .nav.next").addClass("disabled");

			if (this.currentPage == 0)
				$(".pagination .nav.prev").addClass("disabled");
			this.showItems();
		},
		showItems: function() {
			this.items.hide();
			var base = this.perPage * this.currentPage;
			this.items.slice(base, base + this.perPage).show();

			this.updateNavigation();
		},
		init: function(container, items, perPage) {
			this.container = container;
			this.currentPage = 0;
			this.totalPages = 1;
			this.perPage = perPage;
			this.items = items;
			this.createNavigation();
			this.showItems();
		}
	};

	// stuff it all into a jQuery method!
	$.fn.pagify = function(perPage, itemSelector) {
		var el = $(this);
		var items = $(itemSelector, el);

		// default perPage to 5
		if (isNaN(perPage) || perPage === undefined) {
			perPage = 3;
		}

		// don't fire if fewer items than perPage
		if (items.length <= perPage) {
			return true;
		}

		pagify.init(el, items, perPage);
	};
})(jQuery);

$(".container").pagify(6, ".single-item");

////////////////////////////////////////////////////////
</script>