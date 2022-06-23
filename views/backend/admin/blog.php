<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <?php  
              $id = $this->session->userdata('adminid');
              $chpermission = fetchpermission($id);
              if(!empty($chpermission)){
              if(!in_array('blogadd',$chpermission)){
            ?>
            <h1><?php echo $page_title; ?>   <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> Add Blog</button>

            <?php } } ?>

        

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

                <h3 class="card-title">BLOG</h3>

              </div>

              <!-- /.card-header -->

              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>

               <tr>

                    <th>S.NO</th>

                    <th>Title</th>

                    <th>Image</th>

                    <th>Short Description</th>

                    <th>Published By</th>

                    <th>ACTION</th>

                  </tr>

				  

                  </thead>

                  <tbody>

                  <?php

                  $sno=0;

               foreach($datadisplay_blog as $blog):

                $sno++;

                 ?>

                  <tr>

                    <td><?php echo $sno;?></td>

                    <td><?php echo $blog['title'];?></td>

                    <td class="tb-img-sect img-size-small"><img class="img-responsive" src="<?php echo base_url();?>/image/blog/<?php echo $blog['image']; ?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />

                   </td>

                   

                   <td><?php echo $a = word_limiter(strip_tags($blog['short_description']), 5);?></td>

                   <td><?php echo $blog['name'];?></td>

                     <td>
                        <?php 
                          $chpermission = fetchpermission($id);
                          if(!empty($chpermission)){
                          if(!in_array('blogview',$chpermission)){
                        ?>  

                        <!-- <a onclick="return confirm('Are you sure you want to Edit this item?');" href="<?php echo base_url();?>view/<?php echo $galle['gallery_id'];?>" > <i class="fas fa-eye"></i></a> -->

                        <a  href="" data-toggle="modal" data-target="#modelview<?php echo $blog['blog_id'];?>" data-id="<?php echo $blog['blog_id'];?>" >  <i class="fas fa-eye"></i></a>
                        
                        <?php } if(!in_array('blogedit',$chpermission)){ ?>
                        
                        <a  href="" data-toggle="modal" data-target="#model<?php echo $blog['blog_id'];?>" data-id="<?php echo $blog['blog_id'];?>" >  <i class="fas fa-edit"></i></a>
                        
                        <?php } if(!in_array('blogdelete',$chpermission)){?>
                        
                        <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deleteblog/delete/<?php echo $blog['blog_id'];?>/<?php echo $blog['image'];?>" > <i class="fas fa-trash"></i></a>

                        <?php } } ?>
                     </td>

                    </tr>

                    <?php endforeach;?>

                  </tbody>

                  <tfoot>

                  <tr>

                    <th>S.NO</th>

                    <th>Title</th>

                    <th>Image</th>

                    <th>Short Description</th>

                    <th>Published By</th>

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
            <h4 class="modal-title" id="myModalLabel">Add Blog</h4>
                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>
 </div>
 <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

                <?php echo form_open_multipart(base_url().'add_blog'); ?>



<!-- admin id is taken for publisher -->

<input type="hidden" class="form-control" id="published_by" name="published_by" value="<?php echo $id;?>"/>

                <!-- <div class="form-group">

                  <label></label>

                  <select class="form-control select2" style="width: 100%;" name="gallery_cat_id">

                    <?php foreach($categ as $dep){?>

                     <option value="<?php echo $dep['id_imgcat'];?>"><?php echo $dep['name'];?></option>

                   <?php } ?>

                  </select>

                </div> -->

                <div class="form-group">

<label for="inputName">SEO_URL (**WRITE ONLY IN ENGLISH)</label>

<input type="text" class="form-control" id="blogseo_url" name="blogseo_url"  placeholder="Enter ONLY ENGLISH WORDS ALPHABET ONLY **" required/>

</div>
                    <div class="form-group">

                        <label for="inputName">Title</label>

                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required/>

                    </div>

                    <div class="form-group">

                        <label for="inputName">Short Description</label>

                        <textarea id="short_description" name="short_description" class="form-control" rows="2" required></textarea>

                   </div>

                    <div class="form-group">

                        <label for="inputName">Long Description</label>

                        <textarea id="long_description" name="long_description" class="form-control" rows="2" required></textarea>

                    </div>

                    <div class="form-group">

                        <label for="inputEmail">Image upload</label>

                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()" required>

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
            <h4 class="modal-title" id="myModalLabel">Edit Blog</h4>
                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

               

            </div>

            

            <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

                <?php echo form_open_multipart(base_url().'updateblog/update/'.$iddata); ?>

               

                <div class="form-group">

<label for="inputName">SEO_URL (**WRITE ONLY IN ENGLISH)</label>

<!-- <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo $viewData['title'];?>"/> -->
<input type="text" class="form-control" id="blogseo_url" name="blogseo_url"   placeholder="Enter ONLY ENGLISH WORDS ALPHABET ONLY **" value="<?php echo $viewData['blogseo_url'];?>" required/>

</div>

                    <div class="form-group">

                        <label for="inputName">Title</label>

                        <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo $viewData['title'];?>" required/>

                    </div>

                    <div class="form-group">

                        <label for="inputName">Short Description</label>

                        <textarea id="short_description" name="short_description" class="form-control" rows="2" required><?php echo $viewData['short_description'];?></textarea>

                     </div>

                     <div class="form-group">

                        <label for="inputName">Long  Description</label>

                        <textarea id="long_description" name="long_description" class="form-control" rows="2" required><?php echo $viewData['long_description'];?></textarea>

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
            <h4 class="modal-title" id="myModalLabel">View Blog</h4>
                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

               

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