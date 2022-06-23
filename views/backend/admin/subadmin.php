<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?>   <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> Add Subadmin</button>
            
        
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
                <h3 class="card-title">Sub Admin </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
               <tr>
                    <th>S.NO</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Mobile</th>
                  
                    <th>ACTION</th>
                  </tr>
				  
                  </thead>
                  <tbody>
                  <?php
                  $sno=0;
               foreach($datadisplay as $data):
                $sno++;
                 ?>
                 
                  <tr>
                    <td><?php echo $sno;?></td>
                    <td><?php echo $data['name'];?></td>
                    <td class="tb-img-sect img-size-small"><img class="img-responsive " src="<?php echo base_url();?>/image/profileadmin/<?php echo $data['image']; ?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                   </td>
                   
                   <!-- <td><?php echo $a = word_limiter(strip_tags($data['short_description']), 5);?></td> -->
                   <td><?php echo $data['email'];?></td>
                   <td><?php echo $data['mobile'];?></td>
                  
                     <td>
                        <!-- <a onclick="return confirm('Are you sure you want to Edit this item?');" href="<?php echo base_url();?>view/<?php echo $galle['gallery_id'];?>" > <i class="fas fa-eye"></i></a> -->
                        <!-- <a  href="" data-toggle="modal" data-target="#modelview<?php echo $data['id'];?>" data-id="<?php echo $data['id'];?>" >  <i class="fas fa-eye"></i></a> -->
                        <!-- <a  href="" data-toggle="modal" data-target="#model<?php echo $data['id'];?>" data-id="<?php echo $data['id'];?>" >  <i class="fas fa-edit"></i></a> -->
                       <?php if($data['level']!=1){?>
                        <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deletesubadmin/delete/<?php echo $data['id'];?>/<?php echo $data['image'];?>" > <i class="fas fa-trash"></i></a>
                  <?php } ?>
                     </td>
                    </tr>
                    
                    <?php endforeach;?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.NO</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    
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
            <h4 class="modal-title" id="myModalLabel">Add Subadmin</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'add_subadmin'); ?>


                <!-- <div class="form-group">
                  <label></label>
                  <select class="form-control select2" style="width: 100%;" name="gallery_cat_id">
                    <?php foreach($categ as $dep){?>
                     <option value="<?php echo $dep['id_imgcat'];?>"><?php echo $dep['name'];?></option>
                   <?php } ?>
                  </select>
                </div> -->
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Enter password"/>
                    </div>
                    <!-- <div class="form-group">
                        <label for="inputName">Short Description</label>
                        <textarea id="short_description" name="short_description" class="form-control" rows="2"></textarea>
                   </div> -->
                    <!-- <div class="form-group">
                        <label for="inputName">Long Description</label>
                        <textarea id="long_description" name="long_description" class="form-control" rows="2"></textarea>
                    </div> -->
                    <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
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
 
  <?php if(!empty($datadisplay_blog)){ foreach($datadisplay_blog as $viewData){ ?>

<!-- Modal -->
<div class="modal fade" id="model<?php echo $iddata=$viewData['blog_id'];?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Blog</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'updateblog/update/'.$iddata); ?>
               
                    <div class="form-group">
                        <label for="inputName">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo $viewData['title'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Short Description</label>
                        <textarea id="short_description" name="short_description" class="form-control" rows="2"><?php echo $viewData['short_description'];?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="inputName">Long  Description</label>
                        <textarea id="long_description" name="long_description" class="form-control" rows="2"><?php echo $viewData['long_description'];?></textarea>
                     </div>
                    <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">OLD IMAGE</label>
                        <img style="width: 10%;" src="<?php echo base_url();?>/image/blog/<?php echo $viewData['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
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
 
<?php if(!empty($datadisplay_blog)){ foreach($datadisplay_blog as $viewData){ ?>

<!-- Modal -->
<div class="modal fade" id="modelview<?php echo $iddata=$viewData['blog_id'];?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">View Blog</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'updateblog/update/'.$iddata); ?>
               
                    <div class="form-group">
                        <label for="inputName">Title</label>
                        <!-- <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo $viewData['title'];?>"/>
                   -->
                   <p><?php echo $viewData['title'];?></p>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Short Description</label>
                        <!-- <textarea id="short_description" name="short_description" class="form-control" rows="2"><?php echo $viewData['short_description'];?></textarea>
                  --><p><?php echo $viewData['short_description'];?></p>
                   </div>
                     <div class="form-group">
                        <label for="inputName">Long  Description</label>
                        <!-- <textarea id="long_description" name="long_description" class="form-control" rows="2"><?php echo $viewData['long_description'];?></textarea>
          --><p><?php echo $viewData['long_description'];?></p>
         </div>
                    <!-- <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    </div> -->
                    <div class="form-group">
                        <label for="inputEmail">IMAGE</label>
                        <img style="width: 10%;" src="<?php echo base_url();?>/image/blog/<?php echo $viewData['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                   </td>
                    </div>
                   
                   
            </div>
            <!-- Modal Footer -->
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary submitBtn" >SUBMIT</button>
            </div>--> <?php echo form_close(); ?> 
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