

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



                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>



                        <a href="#">Edit</a>



                    </div>



                    <div class="userName">



                        <h4><?php echo ucfirst($res[0]['name']); ?></h4>



                    </div>



                </div>



                <div class="Profiletab">



                   <!--  <button class="tablinks" onclick="openCity(event, 'Paris')">Dashboard</button> -->



                    <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">MyProfile</button>



                    <button class="tablinks" onclick="openCity(event, 'Paris')">Booking</button>



                    <!-- <button class="tablinks" onclick="openCity(event, 'Tokyo')">Time Slot</button> -->



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
                                    <label>Pincode</label>
                                    <input type="text" name="email" value="<?php echo $res[0]['post_code']; ?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    
					<div class="md-30">
                       <!--  <h3>Additional Details</h3> -->
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <!-- <button type="button" class="" data-toggle="modal" data-target="#myModal">Add Charges</button> -->
                                    <?php //echo anchor('button','Add Charges',['class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#myModal']); ?> 
                                    <?php echo anchor("Student/myprofile/".$res[0]['id'],'Edit Details',['class'=>'btn btn-primary']); ?> 
                                </div>
                                
                            </div>
                        </div>
    				</div>
                        
                            <input type="hidden" name="id" value="<?php echo $res[0]['gender'];?>" >
                           
                        
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



                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>



                </div>

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

  <div class="modal" id="myModal">

    <div class="modal-dialog">

      <div class="modal-content">

      

        <!-- Modal Header -->

        <!--

        <div class="modal-header">

          

          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>

		-->

      	<div class="modal-cont">

          <div class="columns">

            <ul class="price">

              <li class="header" style="background-color:#fe6439">Automatice <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>

             	<form>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Monday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Tuesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Wednesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Thursday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Friday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Saturday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Sunday">

                  </li>

            	</form>

            </ul>

            

          </div>

          <div class="columns">

            <ul class="price">

              <li class="header" style="background-color:#fe6439">Manual <br> <sub><i class="fa fa-gbp" aria-hidden="true"></i> pound/hour</sub></li>

              <form>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Monday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Tuesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Wednesday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Thursday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Friday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Saturday">

                  </li>

                  <li class="form-group">

                   <input type="text" name="value" class="form-control" placeholder="Sunday">

                  </li>

            	</form>

            </ul>

          </div>

        </div>

       <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Submit</button>

      </div>

      </div>

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