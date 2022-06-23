<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form id="quickForm"> -->
              <?php echo form_open_multipart(base_url().'update_profile/update'); ?>
                 
               <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo $datadisplay->name ;?>" required/>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="mobile" value="<?php echo $datadisplay->mobile ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $datadisplay->email ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Image Upload</label>
                    <img style="width: 10%;" src="<?php echo base_url();?>/image/profileadmin/<?php echo $datadisplay->image;?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                    <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">PASSWORD UPDATE</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form id="quickForm"> -->
              <?php echo form_open_multipart(base_url().'update_profile/password'); ?>
                 
               <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Old Password</label>
                    <span style="color:red;font-weight:bold"><?php echo form_error('old_pass');?></span>
                    <input type="password" class="form-control" id="old_pass" name="old_pass" placeholder="old password" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">New Password</label>
                    <span style="color:red;font-weight:bold"><?php echo form_error('new_pass');?></span> 
                    <input type="password" class="form-control" id="new_pass" name="new_pass" placeholder="new password" />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                   <span style="color:red;font-weight:bold"><?php echo form_error('confirm_pass');?></span>
                        
                    <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" placeholder="confirm password" />
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
    CKEDITOR.replace( 'matter' );
    CKEDITOR.replace( 'about' );
  
    function checkextension() {
  var file = document.querySelector("#fUpload");
  if ( /\.(jpe?g|png|gif)$/i.test(file.files[0].name) === false ) { alert("not an image!"); }
}
  </script>