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
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
            <form method="post" action="<?php echo base_url('regDataSave');?>" enctype="multipart/form-data">

              	<div class="row">
                  <div class="form-outline">
                  	<label class="form-label" for="firstName">Name</label>
                    <input type="text" name="name" class="form-control form-control-lg" required="required" />
                  </div>
                </div>  
                <div class="row">
                  <div class="form-outline">
                  	<label class="form-label" for="Address">Address</label>
                    <textarea name="address" class="form-control form-control-lg"></textarea>
                  </div>
                </div>
              <div class="row">
                <div class="form-outline">
                	<label class="form-label" for="email">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg" required="required" />
                </div>            
              </div>
              <div class="row">
                <div class="form-outline">
                  <label class="form-label" for="Phone">Phone</label>
                    <input type="number" maxlength="10" name="phone" class="form-control form-control-lg" required="required" />
                </div>            
              </div>
              <br>
              <div class="row">
                <div class="form-outline">
                  <label class="form-label" for="DOB">Date Of Birth</label>
                    <input type="date" name="dob" class="form-control form-control-lg" required="required" max="<?php echo date('Y-m-d');?>" />
                </div>       
              </div>
              <br>
              <div class="row">
                <div class="form-outline">
                  <label class="form-label" for="emailAddress">Image</label>
                    <input type="file" name="photo" class="form-control form-control-lg" required="required" />
                </div>            
              </div>
              <br>
              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                <button class="btn btn-primary btn-lg" onclick="history.back()">Back</button>
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
