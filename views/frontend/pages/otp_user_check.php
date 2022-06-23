<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<section class="login-form hs_astrology_team_main_wrapper">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12">
	        <h3 class="login-heading">Verify Your Mobile</h3>
	        <div class="margin-01">
	        	<form action="<?php echo base_url();?>user_controller/checkotp" method="post">
	          		<div class="row">
	                    <div class="col-md-12">
	                    	<div>
				              	<label class="input-lable">Enter OTP:</label><br>
				              	<input type="text" name="otps" placeholder="OTP" class="form-control" required/>
				              	<div style="text-align: center; margin-top: 20px;">
									<input type="submit" class="btn btn-default" name="submit" value="SUBMIT" />
								</div>
							</div>	
			            </div>
			        </div>    
		        </form>
	        </div>

	      </div>
	    </div>


      </div>
	  </div>
	</section>
</body>
</html>