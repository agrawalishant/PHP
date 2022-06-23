<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?>   <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> Add Advertisement</button>
            </h1>
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
          <div class="col-12">
          
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">News</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
               <tr>
                    <th>S.NO</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>ACTION</th>
                  </tr>
				  
                  </thead>
                  <tbody>
                  <?php
                  $sno=0;
               foreach($datadisplay as $dtdisp):
                $sno++;
                 ?>
                  <tr>
                    <td><?php echo $sno;?></td>
                    <td><?php echo $dtdisp['advt_title'];?></td>
                    
                    <td class="tb-img-sect"><img class="img-responsive" src="<?php echo base_url();?>/image/advertisement/<?php echo $dtdisp['advt_image']; ?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                   </td>
                   <td><?php echo $dtdisp['advt_href'];?></td>
                   <!-- <td><?php echo $a = word_limiter(strip_tags($dtdisp['description']), 5);?></td> -->
                   
                     <td>
                        <!-- <a onclick="return confirm('Are you sure you want to Edit this item?');" href="<?php echo base_url();?>view/<?php echo $dtdisp['advt_id'];?>" > <i class="fas fa-eye"></i></a> -->
                        <!-- <a  href="" data-toggle="modal" data-target="#modelview<?php echo $dtdisp['advt_id'];?>" data-id="<?php echo $dtdisp['advt_id'];?>" >  <i class="fas fa-eye"></i></a> -->
                        <a  href="" data-toggle="modal" data-target="#model<?php echo $dtdisp['advt_id'];?>" data-id="<?php echo $dtdisp['advt_id'];?>" >  <i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deleteadvertisement/delete/<?php echo $dtdisp['advt_id'];?>/<?php echo $dtdisp['advt_image'];?>" > <i class="fas fa-trash"></i></a>
                     </td>

                    </tr>
                    <?php endforeach;?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.NO</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>ACTION</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- model start add data-->

<!-- Modal -->
<div class="modal fade" id="modaladd" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add News</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'add_advertisement'); ?>

              <!-- <div class="form-group">
                  <label></label>
                  <select class="form-control select2" style="width: 100%;" name="gallery_cat_id">
                    <?php foreach($categ as $dep){?>
                     <option value="<?php echo $dep['id_imgcat'];?>"><?php echo $dep['name'];?></option>
                   <?php } ?>
                  </select>
                </div> -->
                    <div class="form-group">
                        <label for="inputName">Title</label>
                        <input type="text" class="form-control" id="advt_title" name="advt_title" placeholder="Enter Title" required/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Link</label>
                        <input type="text" class="form-control" id="advt_href" name="advt_href" placeholder="Enter Link" required/>
                    </div>
                    <!-- <div class="form-group">
                        <label for="inputName">Description</label>
                        <textarea id="description" name="description" class="form-control" rows="2"></textarea>
                   </div>
                    -->
                    <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()" >
                    </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary submitBtn" >SUBMIT</button>
            </div> <?php echo form_close(); ?>
        </div>
    </div>
</div>
  <!-- model end -->

  <!-- model for edit data start -->
  <!-- model start updatedata data-->
 
  <?php if(!empty($datadisplay)){ foreach($datadisplay as $viewData){ ?>

<!-- Modal -->
<div class="modal fade" id="model<?php echo $iddata=$viewData['advt_id'];?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Advertisement</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
               
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'updateadvertisement/update/'.$iddata); ?>
               
                    <div class="form-group">
                        <label for="inputName">Title</label>
                        <input type="text" class="form-control" id="advt_title" name="advt_title" placeholder="title" value="<?php echo $viewData['advt_title'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Link</label>
                        <input type="text" class="form-control" id="advt_href" name="advt_href" placeholder="title" value="<?php echo $viewData['advt_href'];?>"/>
                    </div>
                    <!-- <div class="form-group">
                        <label for="inputName"> Description</label>
                        <textarea id="short_description" name="description" class="form-control" rows="2"><?php echo $viewData['description'];?></textarea>
                     </div> -->
                     
                    <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">OLD IMAGE</label>
                        <img style="width: 10%;" src="<?php echo base_url();?>/image/advertisement/<?php echo $viewData['advt_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                   </td>
                    </div>
                   
                   
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary submitBtn" >SUBMIT</button>
            </div> <?php echo form_close(); ?>
        </div>
    </div>
</div>
  <!-- model end -->
  <?php }} ?>
<!-- model start viewdata data-->
 
<?php if(!empty($datadisplay)){ foreach($datadisplay as $viewData){ ?>

<!-- Modal -->
<div class="modal fade" id="modelview<?php echo $iddata=$viewData['advt_id'];?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">View News</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
               
                <div class="form-group">
                        <label for="inputName">Title</label>
                        <!-- <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo $viewData['title'];?>"/>
                   -->
                   <p><?php echo $viewData['title'];?></p>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputName">Description</label>
                        <!-- <textarea id="short_description" name="short_description" class="form-control" rows="2"><?php echo $viewData['short_description'];?></textarea>
                  --><p><?php echo $viewData['description'];?></p>
                   </div>
                     
                    <!-- <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    </div> -->
                    <div class="form-group">
                        <label for="inputEmail">IMAGE</label>
                        <img style="width: 10%;" src="<?php echo base_url();?>/image/news/<?php echo $viewData['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                   </td>
                    </div>
                   
            </div>
            <!-- Modal Footer -->
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary submitBtn" >SUBMIT</button>
            </div>--> 
        </div>
    </div>
</div>
  <!-- model end -->
  <?php }} ?>
  <script>
      function checkextension() {
  var file = document.querySelector("#fUpload");
  if ( /\.(jpe?g|png|gif)$/i.test(file.files[0].name) === false ) { alert("not an image!"); }
}
  </script>