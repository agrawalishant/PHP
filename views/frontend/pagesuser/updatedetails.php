<?php $user_id = $this->session->userdata('user_id');

$getdata = $this->db->get_where('user', array('user_id' => $user_id))->row(); ?>

<style>
	button {
		outline: none;
		border: none;
	}
	.border-01 {
    padding-top: 20px;
    padding-bottom: 20px;
}
@media(max-width: 767px){
	.input-parent {
    margin-left: 20px;
}
}
</style>
<body>
<div class="hs_indx_title_main_wrapper">

        <div class="hs_title_img_overlay"></div>

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_left_wrapper">

                        <h2>User Details</h2>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_right_wrapper">

                        <ul>

                            <li><a href="#">Home</a> &nbsp;&nbsp;&nbsp;&gt; </li>	

                            <li> User Details </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>
<div class="clearfix"></div>
	<section>

		<div class="container">

			<div class="row">

				<div class="col-8 border-01">

					<div class="row">

						<div class="col-12 pd-01">

							<div class="align">

								<h3 class="heading">User Form</h3>

							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-md-6 pd-01">

							<div>

							<?php echo form_open_multipart(base_url().'update_profile_user/updatepartdetail/'.$user_id); ?>

								<div class="input-parent">

									<label class="input-lable">Date of Birth:-</label><br>

									<input type="date" class="form-control" placeholder="Enter DOB" value="" name="user_dob" class="input-type" required>

								</div>

								<div class="input-parent">

									<label class="input-lable">Place of Birth:-</label><br>

									<input type="text" class="form-control" placeholder="Enter Place of Birth" name="user_placeofbirth" class="input-type" required>

								</div>

								<div class="input-parent">

									<label class="input-lable">Country:-</label><br>

									<input type="text" class="form-control" placeholder="Enter Country" name="user_country" class="input-type" required >

								</div>

								<div class="input-parent">

									<label class="input-lable">Gender:-</label><br>

									<select class="input-text  form-control droupdown select2-hidden-accessible myForm123" name="user_gender" tabindex="-1" aria-hidden="true" required="">

                                            <!-- <option value="<?php echo $row3['id']; ?>"<?php if($data['r_status']==$row3['id']) echo 'selected="selected"';?>><?php echo $row3['status'];?></option> -->

                                            <?php $male=$getdata->user_gender; 

                                            if($male == 'male') { ?>

                                            

                                            <option value="male" selected="selected">male</option>

                                            <option value="female">female</option>

											<?php }else{?>

                                            <option value="female" selected="selected">female</option>

                                            <option value="male">male</option>

											<?php } ?>

                                            </select>

                        

								</div>

							</div>

						</div>

						<div class="col-md-6 pd-01">

							<div>

							    <div class="input-parent">

									<label class="input-lable">Time of Birth:-</label><br>

									<input type="time" class="form-control" placeholder="Enter Time of Birth" name="user_timeofbirth" class="input-type" required>

								</div>

								<div class="input-parent">

									<label class="input-lable">State:-</label><br>

									<input type="text" class="form-control" placeholder="Enter State" name="user_state" class="input-type" required>

								</div>

								<div class="input-parent">

									<label class="input-lable">Occupation:-</label><br>

									<input type="text" class="form-control" placeholder="Enter Occupation" name="user_occupation" class="input-type" required>

								</div>
                             	<div class="input-parent">

									<label class="input-lable">Mobile:-</label><br>

									<input type="number" class="form-control" placeholder="Enter Mobile" name="user_mobile" class="input-type" id="contact_mobilenumber" pattern="[1-9]{1}[0-9]{9}" required>

								</div>
								<div class="input-parent">

									<label class="input-lable">Maritual Status:-</label><br>

									<select class="input-select" name="user_maritalstatus" required>

									<option value="NeverMarried">Unmarried</option>



										<option value="Married">Married</option>



										<option value="Divorced">Divorced</option>



										<option value="Widow">Widow</option>



									</select>

								</div>

							</div>

						</div>

					</div>

					<div class="row">

						<div class="col-12 pd-01">

							<div class="align">

								<!-- <a href="#" class="submit-link">Submit</a> -->

								<button name="submit" type="submit" value="submit" class="update-btn">UPDATE</button>

							</div>

						</div>

					</div>



					<?php echo form_close(); ?>

				</div>

			</div>

		</div>

	</section>

</body>

