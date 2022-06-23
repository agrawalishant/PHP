<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<body>
	<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
  			<h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit Details</h3>
  			<?php // echo '<pre>';print_r($result);?>
		<form method="post" action="<?php echo base_url('update/').$result[0]->id;?>" enctype="multipart/form-data">
			<div class="row">
	          <div class="form-outline">
	          	<label class="form-label" for="Name">Name</label>
	            <input type="text" name="name" value="<?php echo $result[0]->emp_name;?>" class="form-control form-control-lg" required="required" />
	          </div>
	        </div>  
	        <div class="row">
	          <div class="form-outline">
	          	<label class="form-label" for="Address">Address</label>
	            <textarea name="address" class="form-control form-control-lg" required="required"><?php echo $result[0]->address;?></textarea>
	          </div>
	        </div>
	      <div class="row"> 
	        <div class="form-outline">
	        	<label class="form-label" for="Email">Email</label>
	            <input type="email" name="email" value="<?php echo $result[0]->email;?>" class="form-control form-control-lg" required="required" />
	        </div>            
	      </div>
	      <div class="row">
	        <div class="form-outline">
	          <label class="form-label" for="Phone">Phone</label>
	            <input type="number" name="phone" class="form-control form-control-lg" value="<?php echo $result[0]->phone;?>" maxlength="10" required="required" />
	        </div>            
	      </div>
	      <div class="row">
	        <div class="form-outline">
	          <label class="form-label" for="DOB">DOB</label>
	            <input type="date" name="dob" value="<?php echo $result[0]->dob;?>" class="form-control form-control-lg" required="required" max="<?php echo date('Y-m-d');?>" />
	        </div>            
	      </div>
	      <br>
	      <div class="row">
          <div class="form-outline">
          	<label class="form-label" for="emailAddress">Image</label>
              <input type="file" name="photo" class="form-control form-control-lg" />
          	<?php if(!empty($result[0]->image)){?>
          		<img src="<?php echo base_url('uploads/');?><?php echo $result[0]->image;?>" style="width:100px;">
          	<?php }?>
          </div>            
        </div>
        <br>
	      <div class="mt-4 pt-2">
	        <input class="btn btn-primary btn-lg" type="submit" value="Update" />
	        <button class="btn btn-primary btn-lg" onclick="history.back()">Back</button>
	      </div>	
		</form>

	</div></div></div></div></div></section>
</body>
</html>