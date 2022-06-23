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
              <div class="card-header" style="background-color: #fd7e14;">
                <h3 class="card-title"><?php echo $page_title; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <!-- <form id="quickForm"> -->
              <?php echo form_open_multipart(base_url().'update_kundalicharges/update'); ?>
                 
               <div class="card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Charges</label>
                    <input type="number" class="form-control" id="charges" name="charges" placeholder="charges" value="<?php echo $datadisplay->charges ;?>" required/>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer" >
                  <button name="submit" type="submit" class="btn btn-primary" style="background-color: #fd7e14;">Submit</button>
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