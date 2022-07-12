
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
                        <!-- <a href="#">Edit</a> -->
                    </div>
                    <div class="userName">
                        <h4><?php echo ucfirst($res[0]['name']); ?></h4>
                    </div>
                </div>
                <!-- <div class="Profiletab">
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Dashboard</button>
                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">MyProfile</button>
                    <button class="tablinks" onclick="openCity(event, 'Paris')">Booking</button>
                    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Time Slot</button>
                </div> -->
            </div>
            <div class="col-lg-9 col-sm-12">
              <?php if($this->session->flashdata('Imagemsg')) { ?>
                <div class="alert alert-danger">
                  <?php echo $this->session->flashdata('Imagemsg'); ?>
                </div>
              <?php } ?>
                <div id="London" class="tabcontent">
                    <h3>Instructor Profile</h3>

                    <!-- <form class="form-content"> -->

                    <?php echo form_open('Instructor-UpdateProfile'); ?>

                        <div class="form-group">
                            <div class="row">
                               <!-- <div class="col-md-6 col-sm-12">
                                    <label>Email</label>
                                    <input type="text" name="email" value="<?php //echo $res[0]['email']; ?>" class="form-control" >
                                </div> -->

                                <div class="col-md-6 col-sm-12">
                                    <label>Contact Number</label>
                                    <input type="text" name="mobile" value="<?php echo $res[0]['mobile']; ?>" class="form-control" maxlength="11" minlength="9">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>License Number</label>
                                    <input type="text" name="license_no" value="<?php echo $res[0]['licence_no']; ?>" class="form-control" >
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>License Photo-</label>
                                    <!-- <input type="file" name="email"> -->
                                    <img style="height:90px;width: 200px;" src="<?php echo base_url('uploads/'.$res[0]['licence_photo']);?>" alt="Image">
                                    <button type="button" class="fa fa-pencil-square-o" data-toggle="modal" data-target="#LicenModal"></button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Date Of Birth</label>
                                    <!--<input type="date" name="dob" value="<?php echo $res[0]['dob']; ?>" class="form-control" required>-->
                                    <input type="text" name="dob"  id="datepickerupdate" value="<?php echo $res[0]['dob']; ?>" >
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Gender</label>
                                    <?php if($res[0]['gender'] == 'Male') { ?>
                                    <input type="radio" name="gender" value="Male" checked /> Male
                                    <input type="radio" name="gender" value="Female" /> Female
                                    <?php }else{ ?>
                                    <input type="radio" name="gender" value="Male"  /> Male  
                                    <input type="radio" name="gender" value="Female" checked/> Female
                                    <?php } ?>
                                    <!-- <input type="text" name="gender" value="<?php //echo $res[0]['gender']; ?>" class="form-control" > -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address"  value="" ><?php echo $res[0]['address']; ?></textarea>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Postcode</label>
                                    <input type="text" name="pin" value="<?php echo $res[0]['post_code']; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Account Holder Name</label>
                                    <input type='text' class="form-control" name="acname"  value="<?php if($res[0]['ac_name']){ echo $res[0]['ac_name']; }else{ echo '';}?>" > 
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Account Number</label>
                                    <input type="text" name="acnumber" value="<?php if($res[0]['ac_number']!=''){ echo $res[0]['ac_number']; }else{ echo '';}?>" class="form-control" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>Bank Name</label>
                                    <input type='text' class="form-control" name="bkname"  value="<?php if($res[0]['bk_name']){ echo $res[0]['bk_name']; }else{ echo '';}?>" > 
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Ifcs Code</label>
                                    <input type="text" name="ifsc" value="<?php if($res[0]['ifsc']!=''){ echo $res[0]['ifsc']; }else{ echo '';}?>" class="form-control" >
                                </div>
                            </div>
                        </div>
                        
					              <div class="md-30">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-4 col-sm-12">            
                                <input type="hidden" name="id" value="<?php echo $res[0]['id']; ?>" >                  
                                <?php echo form_submit('submit','Update',['class'=>'btn btn-primary']); ?> 
                                    <input type="button" value="Back" onclick="goBack()" class="btn btn-primary"> 
                              </div>
                            </div>
                          </div>
    				            </div>                      
                    </form>
                </div>

                <!-- <div id="Paris" class="tabcontent">
                    <h3>Student Profile</h3>
                    <form class="form-content">
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
                    </form>
                </div> -->

                <!-- <div id="Tokyo" class="tabcontent">
                 <h3>Timing</h3>
                  <form class="form-content">
                    <div class="form-group">
                      <div class="row justify-content">

                        <div class="col-md-4 col-sm-12">
                          <i class="fa fa-car fm-icon" aria-hidden="true"></i>
                          <select name="cars" id="cars" class="form-control">
                             <option value="0">Vehicle Type</option>
                             <option value="1">Manual</option>
                             <option value="2">Automated</option>
                          </select>
                        </div>
                        <div class="col-md-4 col-sm-12" id="dadt">
                          <i class="fa fa-calendar-check-o fm-icon" aria-hidden="true"></i>
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
                        </div>
                        <div class="col-md-4 col-sm-12">
                          <i class="fa fa-clock-o fm-icon" aria-hidden="true">&nbsp&nbspStart Date</i>
                          <input type="time" name="time" id="tm" class="form-control" min="09:00" max="15:00">
                        </div>
                        <span id="validity" style="color: red;"></span> 
                      </div>
                      <div class="col-sm-12 tm-shet" style="text-align: center;">
                        <input type="hidden" name="ids" id="ids" value="<?php echo $res[0]['id'];?>">
                        <input type='button' value="ADD" id="addon" class="btn btn-primary" />
                      </div>
                    </div>
                  </form>
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

   <!-- The Modal -->

  <!--<div class="modal" id="myModal">-->

  <!--  <div class="modal-dialog">-->

  <!--    <div class="modal-content">-->

      

  <!--    	<div class="modal-cont">-->

  <!--        <div class="columns">-->

  <!--          <ul class="price">-->

  <!--            <li class="header" style="background-color:#fe6439">Automatice <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>-->

  <!--           	<form>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Monday">-->

  <!--                </li>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Tuesday">-->

  <!--                </li>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Wednesday">-->

  <!--                </li>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Thursday">-->

  <!--                </li>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Friday">-->

  <!--                </li>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Saturday">-->

  <!--                </li>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Sunday">-->

  <!--                </li>-->

  <!--          	</form>-->

  <!--          </ul>-->

            

  <!--        </div>-->

  <!--        <div class="columns">-->

  <!--          <ul class="price">-->

  <!--            <li class="header" style="background-color:#fe6439">Manual <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>-->

  <!--            <form>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Monday">-->

  <!--                </li>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Tuesday">-->

  <!--                </li>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Wednesday">-->

  <!--                </li>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Thursday">-->

  <!--                </li>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Friday">-->

  <!--                </li>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Saturday">-->

  <!--                </li>-->

  <!--                <li class="form-group">-->

  <!--                 <input type="text" name="value" class="form-control" placeholder="Sunday">-->

  <!--                </li>-->

  <!--          	</form>-->

  <!--          </ul>-->

  <!--        </div>-->

  <!--      </div>-->

  <!--     <div class="modal-footer">-->

  <!--      <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>-->

  <!--    </div>-->

  <!--    </div>-->

  <!--  </div>-->

  <!--</div>-->

</section>
    <!-- License Photo Update Modal-->
    <!-- The Modal -->
<div class="modal" id="LicenModal">
  <div class="modal-dialog">
    <form action="<?php echo site_url('Instructor/instlinceupdate');?>" method="post" enctype='multipart/form-data' >
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
      <h4 class="modal-title">Update Image</h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <input type="file" name="lincephoto" id="photo">
        <input type="hidden" name="inst_id" value="<?php echo $res[0]['id'];?>" >
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">

        <button type="submit" class="btn btn-default" onclick="ValidateExtension();" >Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
    </form>
  </div>
</div>

<!-- /////////////////////////////////////////////// -->    







<script>

    // function ValidateExtension() 
    // {
    //     var allowedFiles = [".jpg", ".jpeg", ".png",".gif"];
    //     var fileUpload = document.getElementById("photo").value;
    //     var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
    //     if (regex.test(fileUpload)!=true) {    
    //         alert('Invalid file type');
    //         return false;
    //     }
    //     else
    //     {
    //         return true;    
    //     }
    // }


////////////////////////////////////////////////////////
$("#addon").click(function(){
     var instid = document.getElementById("ids").value ;
    var cart = document.getElementById("cars").value ;
    var dadt = document.getElementById("day").value ;
    var tmt = document.getElementById("tm").value ;
    
   // var exitTime = moment(tmt,'HH:mm').add(2,'hour').format('HH:mm');     
   // var subTime = moment(tmt,'HH:mm').add(-2,'hour').format('HH:mm');  
        
    if(cart == 0 || dadt == 0 || tmt =='')
    {
      alert('Please add the proper field..');
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
              location.reload();
            }
              else{ console.log('elseeeeeeee');
                 $('#validity').html(res.msg);
              }
            
          },
      });     
    }  

    // $('body').on('click','.removeAppend',function(){
    //             $(this).parents('.locationRepeat').remove();
    //         });

  });



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

$( function() {
    $( "#datepickerupdate" ).datepicker({
        //startDate: Date("yy-mm-dd")
    });
  });

</script><!DOCTYPE html>

