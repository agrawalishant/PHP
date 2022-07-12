
<style>
  label.prText {
    margin-left: 15px;
}
.tm-shet {
    margin-top: 20px;
}
</style>
<!-- <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/datepicker.js"></script> -->
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
                        
                    </div>
                      <div class="userName">
                        <h4><?php echo ucfirst($res[0]['name']); ?></h4>
                      </div>
                        <?php echo anchor('button','Edit',['data-toggle'=>'modal','data-target'=>'#profileModal']); ?>
                  </div>
                <div class="Profiletab">



                    <button class="tablinks" onclick="openCity(event, 'Paris')">Dashboard</button>



                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">MyProfile</button>



                    <button class="tablinks" onclick="openCity(event, 'Paris')">Booking</button>



                    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Time Slot</button>
                </div>
            </div>
            <div class="col-lg-9 col-sm-12">



                <div id="London" class="tabcontent">



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
                                    <input type="text" name="email" value="<?php echo $res[0]['mobile']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <label>License Number</label>
                                    <input type="text" name="email" value="<?php echo $res[0]['licence_no']; ?>" class="form-control" disabled>
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
                                    <label>Pincode</label>
                                    <input type="text" name="email" value="<?php echo $res[0]['post_code']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    
					<div class="md-30">
                       <!--  <h3>Additional Details</h3> -->
                        
                        <div class="form-group">
                          <label class="prText">Charges <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></label>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    
                                     <!-- <button type="button" class="" data-toggle="modal" data-target="#myModal">Add Charges</button> -->
                                    <?php echo anchor('button','Add Charges',['class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#myModal']); ?> 
                                    <?php echo anchor("Instructor/myprofile/".$res[0]['id'],'Edit Details',['class'=>'btn btn-primary']); ?> 
                                </div>
                                
                            </div>
                        </div>
    				</div>
                        
                            
                           
                        
                    </form>
                </div>

                <div id="Paris" class="tabcontent">
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

                </div>







                <div id="Tokyo" class="tabcontent">
                  <h3>Timing</h3>
                  <form class="form-content">
                    <div class="form-group">
                      <div class="row">

                        <div class="col-md-3 col-sm-12">
                          <i class="fa fa-car fm-icon" aria-hidden="true"></i>
                          <select name="cars" id="cars" class="form-control">
                             <option value="0">Vehicle Type</option>
                             <option value="1">Manual</option>
                             <option value="2">Automated</option>
                          </select>
                        </div>
                        <div class="col-md-3 col-sm-12" id="dadt">
                          <!-- <label>Date & Time</label> -->
                          <i class="fa fa-calendar-check-o fm-icon" aria-hidden="true"></i>
                          <input type="date" name="date" id="dat" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-12">
                          <i class="fa fa-clock-o fm-icon" aria-hidden="true"></i>
                          <input type="time" name="time" id="tm" class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-12 tm-shet">
                          <input type='button' value="ADD" id="addon" class="btn btn-primary" />
                          <?php //$js = 'onClick="addappend()"';
                                //echo form_button('button','ADD',['id'=>'addon','class'=>'btn btn-primary']);?>
                        </div>

                      </div>
                    </div>
                  </form>
                  <table class="alert alert-dark" id="divadd" > 
                    <tr class="locationRepeat" >
                      
                    </tr>
                  </table>
                          
                  <!-- <div id="divadd1" class="alert alert-dark" role="alert">
                    This is a dark alert—check it out!
                  </div> -->

                                  
                </div>

          		<div class="in-pr-list md-30">

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

                                    <td><?php if(isset($result)) { echo $result[0]['auto_monday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(isset($result)) { echo $result[0]['manual_monday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                                <tr>

                                    <td>Tuesday</td>

                                    <td><?php if(isset($result)) { echo $result[0]['auto_tuesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(isset($result)) { echo $result[0]['manual_tuesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                                <tr>

                                    <td>Wednesday</td>

                                    <td><?php if(isset($result)) { echo $result[0]['auto_wednesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(isset($result)) { echo $result[0]['manual_wednesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                                <tr>

                                    <td>Thursday</td>

                                    <td><?php if(isset($result)) { echo $result[0]['auto_thursday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(isset($result)) { echo $result[0]['manual_thursday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                                <tr>

                                    <td>Friday</td>

                                    <td><?php if(isset($result)) { echo $result[0]['auto_friday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(isset($result)) { echo $result[0]['manual_friday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                                <tr>

                                    <td>Saturday</td>

                                    <td><?php if(isset($result)) { echo $result[0]['auto_saturday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(isset($result)) { echo $result[0]['manual_saturday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                                <tr>

                                    <td>Sunday</td>

                                    <td><?php if(isset($result)) { echo $result[0]['auto_sunday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(isset($result)) { echo $result[0]['manual_sunday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>



            </div>



        </div>



    </div> 

<!-- // new modal-->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="<?php echo site_url('Instructor/InsertCharges');?>" method="post" >
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">ADD Charges</h4>
      </div>
      <div class="modal-body">
         <div class="columns">

            <ul class="price">

              <li class="header" style="background-color:#fe6439">Automatice <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>

              <!-- <form> -->

                  <li class="form-group">

                   <input type="text" name="a_monday" value="<?php if(isset($result)) { echo $result[0]['auto_monday'] ; } ?>" class="form-control" placeholder="Monday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="a_tuesday" value="<?php if(isset($result)) { echo $result[0]['auto_tuesday'] ; } ?>" class="form-control" placeholder="Tuesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="a_wednesday" value="<?php if(isset($result)) { echo $result[0]['auto_wednesday'] ; } ?>" class="form-control" placeholder="Wednesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="a_thursday" value="<?php if(isset($result)) { echo $result[0]['auto_thursday'] ; } ?>" class="form-control" placeholder="Thursday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="a_friday" value="<?php if(isset($result)) { echo $result[0]['auto_friday'] ; } ?>" class="form-control" placeholder="Friday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="a_saturday" value="<?php if(isset($result)) { echo $result[0]['auto_saturday'] ; } ?>" class="form-control" placeholder="Saturday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="a_sunday" value="<?php if(isset($result)) { echo $result[0]['auto_sunday'] ; } ?>" class="form-control" placeholder="Sunday">

                  </li>

              <!-- </form> -->

            </ul>

          </div>

          <div class="columns">

            <ul class="price">

              <li class="header" style="background-color:#fe6439">Manual <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>

              <!-- <form> -->

                  <li class="form-group">

                   <input type="text" name="m_monday" value="<?php if(isset($result)) { echo $result[0]['manual_monday'] ; } ?>" class="form-control" placeholder="Monday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="m_tuesday" value="<?php if(isset($result)) { echo $result[0]['manual_tuesday'] ; } ?>" class="form-control" placeholder="Tuesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="m_wednesday" value="<?php if(isset($result)) { echo $result[0]['manual_wednesday'] ; } ?>" class="form-control" placeholder="Wednesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="m_thursday" value="<?php if(isset($result)) { echo $result[0]['manual_thursday'] ; } ?>" class="form-control" placeholder="Thursday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="m_friday" value="<?php if(isset($result)) { echo $result[0]['manual_friday'] ; } ?>" class="form-control" placeholder="Friday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="m_saturday" value="<?php if(isset($result)) { echo $result[0]['manual_saturday'] ; } ?>" class="form-control" placeholder="Saturday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="m_sunday" value="<?php if(isset($result)) { echo $result[0]['manual_sunday'] ; } ?>" class="form-control" placeholder="Sunday">

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

<!-- // new modal-->

<div id="profileModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="<?php echo site_url('Instructor/instimageupdate');?>" method="post" enctype='multipart/form-data' >
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Update Image</h4>
      </div>
      <div class="modal-body">
        <input type="file" name="photo">
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

   <!-- The Modal -->



</section>
 
<script>


  $( document ).ready(function() {
  $('#dadt').datepicker({
        todayBtn: "linked",
        format: "m/d/yyyy",
        autoclose: true,
        orientation: "top",
        //endDate: Date("m/d/yyyy"),
        //beforeShowDate: Date("m/d/yyyy"),

  });
})

 $("#addon").click(function(){
    var cart = document.getElementById("cars").value ;
    var dadt = document.getElementById("dat").value ;
    var tmt = document.getElementById("tm").value ;
    var slottmt;
    
    var arr = tmt.split(':');
    var slothr = parseInt(arr[0]);
    var slottmt = slothr + 2;
    var slotmin = parseInt(arr[1]);



    //$('body').on('click','.myclass',function(){
    var exitTime = moment.utc('10:00 AM','hh:mm').add(2,'hour').format('hh:mm A'); 
    console.log(exitTime);
  // });

    
    alert(tmt);alert(slottmt);alert(exitTime);
    if(cart == 0 && dadt =='' && tmt =='')
    {
      alert('Please add the proper field..');
    }
    else
    {
      if(cart == 1 && dadt !='' && tmt !='')
      {
        $("#divadd").append('<tr><td>Manual</td><td>'+dadt+'</td><td>'+'['+tmt +'-'+ slottmt+':'+slotmin+']</td><td><p class="remove removeAppend"><i class="fa fa-minus-circle"></i></p></td></tr>');
      }
      else if(cart == 2 && dadt !='' && tmt !='') 
      {
        $("#divadd").append('<tr class="locationRepeat"><td>Automatice</td><td>'+dadt+'</td><td>'+'['+tmt +'-'+ slottmt+':'+slotmin+']</td><td><p class="remove removeAppend"><i class="fa fa-minus-circle"></i></p></td></tr>');
      }
      else
      {
        alert('on');
      }

    }  

    $('body').on('click','.removeAppend',function(){
                $(this).parents('.locationRepeat').remove();
            });

  });


////////////////////////////////////////////////////////////////
function myfun(event) { 
    document.getElementById("tg").click();
    var img = document.getElementById("tg").value ;
    //alert(img);

    
    $( "#tg" ).change(function(e) {
    var id=$('#ins_id').val();
    var file=$('#tg').val();
    //alert(file);
    uri = '<?=base_url()?>Instructor/instimageupdate';
    //alert(uri);
    $.ajax({
        url:uri,
        type: "POST",
        data:{ photo: file , inst_id: id },
        cache: true,
        contentType: 'multipart/form-data',
        processData: false,
        success: function (data){
            $('#h_image').hide();
            $('#s_image').show();
        },
    });
  });  
}

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