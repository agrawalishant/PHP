<?php error_reporting(0);?>

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
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                      <?php } ?>

                      <?php //echo anchor('button','Edit',['data-toggle'=>'modal','data-target'=>'#profileModal']); ?>
                   </div>
                    <div class="userName">
                        <h4><?php echo ucfirst($res[0]['name']); ?></h4>
                    </div>
                </div>
                 <button type="button" class="fa fa-pencil-square-o" data-toggle="modal" data-target="#profileModal"></button>
                <div class="Profiletab">
                   <!--  <button class="tablinks" onclick="openCity(event, 'Paris')">Dashboard</button> -->
                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">MyProfile</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Booking</button>
                     <a href="<?php echo base_url('Book-Class');?>"> <button class="tablinks"> Book Class </button> </a>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12">
                <div id="London" class="tabcontent">
                    <h3>Student Profile</h3>
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
                                    <input type="text" name="email" value="<?php echo $res[0]['mobile']; ?>" class="form-control" disabled>
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
                                    <input type="text" name="email" value="<?php echo $res[0]['post_code']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    
					              <div class="md-30">
                          <!--  <h3>Additional Details</h3> -->
                        
                          <div class="form-group">
                              <div class="row">
                                  <div class="col-md-4 col-sm-12">
                                    <?php echo anchor("Student-MyProfile/".$res[0]['id'],'Edit Details',['class'=>'btn btn-primary']); ?> 
                                  </div>
                                  
                              </div>
                          </div>
    			              </div>
                        
                          <input type="hidden" name="id" value="<?php echo $res[0]['gender'];?>" >
                    </form>
                </div>

                <div id="Paris" class="tabcontent">
                  <!-- <h3>Student Profile</h3> -->
                  <!-- <form class="form-content">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4 col-sm-12">
                          <label>Name</label>
                          <input type="text" name="email" class="form-control">
                        </div>
                        <div class="col-md-4 col-sm-12">
                          <label>Phone</label>
                          <input type="text" name="email" class="form-control">
                        </div>
                        <div class="col-md-4 col-sm-12">
                          <label>Address</label>
                          <input type="textarea" name="email" class="form-control">
                        </div>
                      </div>
                    </div>
                  </form> -->
                  <?php if($this->session->userdata('nobookings')!= '') { ?>
                  <div class="alert alert-success">
                    <?php echo $this->session->userdata('nobookings'); ?>
                  </div>
                 <?php } else { if(!empty($result_time)) { ?>
                  <div class="in-pr-list md-30">
                    <h3>My Bookings</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="datatable">
                            <thead>
                                <tr>
                                    <th>Instructor</th>
                                    <th>Vehicle Type</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody id="myschedule">
                              <?php foreach($result_time as $values) {  
                                
                                    
                                        $booking_dates = explode(',',$values['booking_dates']);
                                        $i=0;
                                        //echo"<pre>";print_r($booking_dates);
                                        $time_slot_id = explode(',',$values['product_id']);
                                        
                                        //echo"<pre>";print_r($time_slot_id);exit;
                                        foreach($time_slot_id as $times) { 
                                        $instdata = $this->Generalmodel->get_all_where('instructor_time_slots',array('id'=>$times));    
                                        $day = $instdata[0]['day'];
                                        $start_time = $instdata[0]['start_time'];
                                        $end_time = $instdata[0]['end_time'];
                                        if(!empty($booking_dates[$i]) && !empty($start_time) && !empty($end_time)){
                                  ?>
                                    <tr>
                                    <?php 
                                        $inst_id = $values['inst_id'];
                                        $instdata = $this->Generalmodel->get_all_where('instructor_details',array('id'=>$inst_id));
                                       // echo "<pre>";print_r($instdata);
                                    ?>
                                    <td><?php echo $instdata[0]['name']; ?></td>
                                  <?php if($instdata[0]['category'] == 1) { ?>
                                    <td>Manual</td>
                                  <?php } else { ?>
                                    <td>Automatic</td>
                                  <?php } ?>
                                    <td><?php echo $booking_dates[$i]; ?></td>
                                    <td><?php echo $day; ?></td>
                                    <td><?php echo $start_time; ?></td>
                                    <td><?php echo $end_time; ?></td>
                                    <td>
                                        <?php if($values['delete_status']==1){ ?>
                                        <button class="btn btn-danger" onclick="alert('Booking Is Already Canceled By Instructor.Please Contact To Aministrator');">Cancel</button>
                                        <?php }else{ ?>
                                        <button class="btn btn-success" onclick="alert('Booking Is Confirmed');">Confirm</button>
                                        <?php } ?>
                                    </td>    
                                    </tr>    
                                    <?php $i++;} } ?>
                                    <!-- <td>Edit Delete</td> -->
                                
                              <?php } ?>  
                            </tbody>
                        </table>
                        <p><?php //echo $links; ?></p>
                    </div>
                  </div>  
                  <?php } } ?>    
                  
                </div>
                
                <!-- <div id="Tokyo" class="tabcontent">



                    <h3>Timing</h3>



                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>
                </div> -->
          		<!-- <div class="in-pr-list md-30">

                    <h3>Our Price List</h3>

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th>Days</th>

                                    <th>Automatice</th>

                                    <th>Manual</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>

                                    <td>Monday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Tuesday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Wednesday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Thursday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Friday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Saturday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                                <tr>

                                    <td>Sunday</td>

                                    <td>25 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                    <td>30 <i class="fa fa-gbp" aria-hidden="true"></i></td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div> -->
            </div>
        </div>
    </div> 
  <!-- Student Modal -->
<div id="profileModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="<?php echo site_url('ProfileImage');?>" method="post" enctype='multipart/form-data' >
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Update Image</h4>
      </div>
      <div class="modal-body">
        <input type="file" name="photo" accept="image/x-png,image/gif,image/jpeg">
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
</section>


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>