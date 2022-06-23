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
              <?php echo form_open_multipart(base_url().'update_websiteinformation/update'); ?>
                 
                <!-- <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">About University</label>
                    <textarea id="abu1" name="description" class="form-control" rows="2"><?php echo $datadisplayaboutus->description;?></textarea>
                  </div>
                </div> -->
               
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Website name</label>
                    <input type="text" class="form-control" id="website_name" name="website_name" placeholder="website_name" value="<?php echo $datadisplay->website_name ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo $datadisplay->title ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Matter </label>
                    <textarea id="matter" name="matter" class="form-control" rows="2"><?php  ?><?php echo $datadisplay->matter ;?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">About</label>
                    <textarea id="about" name="about" class="form-control" rows="2"><?php  ?><?php echo $datadisplay->about ;?></textarea>
                   </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="phone" value="<?php echo $datadisplay->phone ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $datadisplay->email ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="address" value="<?php echo $datadisplay->address ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Latitude</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="latitude" value="<?php echo $datadisplay->latitude ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Longitude</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="longitude" value="<?php echo $datadisplay->longitude ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook_link</label>
                    <input type="text" class="form-control" id="facebook_link" name="facebook_link" placeholder="facebook_link" value="<?php echo $datadisplay->facebook_link ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Google_link</label>
                    <input type="text" class="form-control" id="google_link" name="google_link" placeholder="google_link" value="<?php echo $datadisplay->google_link ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Yahoo_link</label>
                    <input type="text" class="form-control" id="yahoo_link" name="yahoo_link" placeholder="yahoo_link" value="<?php echo $datadisplay->yahoo_link ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Twitter_link</label>
                    <input type="text" class="form-control" id="twitter_link" name="twitter_link" placeholder="twitter_link" value="<?php echo $datadisplay->twitter_link ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">copyright</label>
                    <input type="text" class="form-control" id="copyright" name="copyright" placeholder="copyright" value="<?php echo $datadisplay->copyright ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Toll Free no</label>
                    <input type="text" class="form-control" id="tollfreenumber" name="tollfreenumber" placeholder="tollfreenumber" value="<?php echo $datadisplay->tollfreenumber ;?>" required/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">logo1</label>
    <!-- <input type="text" class="form-control" id="logo1" name="logo1" placeholder="logo1" value="<?php echo $datadisplay->logo1 ;?>"/> -->
                      <input type="file" name="userfile1" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    
                  </div>
                  <div class="form-group">
                        <label for="inputEmail">OLD Logo 1</label>
                        <img style="width: 10%;" src="<?php echo base_url();?>/image/logo/<?php echo $datadisplay->logo1 ;?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                  
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">logo2</label>
                    <input type="file" name="userfile2" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    
                  </div>
                  <div class="form-group">
                        <label for="inputEmail">OLD Logo 2</label>
                        <img style="width: 10%;" src="<?php echo base_url();?>/image/logo/<?php echo $datadisplay->logo2 ;?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                  
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">favicon</label>
                    <input type="file" name="userfile3" value="upload" class="control" size="60" id="fUpload" >
                    
                  </div>
                  <div class="form-group">
                        <label for="inputEmail">OLD Favicon icon</label>
                        <img style="width: 5%;" src="<?php echo base_url();?>/image/logo/<?php echo $datadisplay->favicon ;?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                  
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