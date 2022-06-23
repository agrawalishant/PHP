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
              if(!in_array('faqadd',$chpermission)){
            ?>

            <h1><?php echo $page_title; ?>   <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> Add FAQ</button>
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

                <h3 class="card-title">FAQ</h3>

              </div>

              <!-- /.card-header -->

              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>

               <tr>

                    <th>S.NO</th>

                    <th>QUESTION</th>

                    <th>ANSWER</th>

                    <th>ACTION</th>

                  </tr>

				  

                  </thead>

                  <tbody>

                  <?php

                  $sno=0;

               foreach($datadisplay as $faq):

                $sno++;

                 ?>

                  <tr>

                    <td><?php echo $sno;?></td>

                  

                   

                   <td><?php echo $a = word_limiter(strip_tags($faq['question']), 5);?></td>

                   <td><?php echo $a = word_limiter(strip_tags($faq['answer']), 5);?></td>

                     <td>

                      <?php

                            $chpermission = fetchpermission($id);

                            //print_r($chpermission);

                          if(!empty($chpermission)){

                          if(!in_array('faqview',$chpermission)){

                            //if(in_array("faqedit",$finalvalue))

                      ?>

                        <a  href="" data-toggle="modal" data-target="#modelview<?php echo $faq['faq_id'];?>" data-id="<?php echo $faq['faq_id'];?>" >  <i class="fas fa-eye"></i></a>

                      <?php } if(!in_array('faqedit',$chpermission)){ ?>

                        <a  href="" data-toggle="modal" data-target="#model<?php echo $faq['faq_id'];?>" data-id="<?php echo $faq['faq_id'];?>" >  <i class="fas fa-edit"></i></a>

                      <?php } if(!in_array('faqdelete',$chpermission)){ ?>

                        <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deletefaq/delete/<?php echo $faq['faq_id'];?>" > <i class="fas fa-trash"></i></a>

                      <?php } } ?>

                     </td>



                    </tr>

                    <?php endforeach;?>

                  </tbody>

                  <tfoot>

                  <tr>

                    <th>S.NO</th>

                    <th>QUESTION</th>

                    <th>ANSWER</th>

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
            <h4 class="modal-title" id="myModalLabel">Add FAQ</h4>

                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

                
            </div>

            

            <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

                <?php echo form_open_multipart(base_url().'add_faq'); ?>



              <!-- <div class="form-group">

                  <label></label>

                  <select class="form-control select2" style="width: 100%;" name="gallery_cat_id">

                    <?php foreach($categ as $dep){?>

                     <option value="<?php echo $dep['id_imgcat'];?>"><?php echo $dep['name'];?></option>

                   <?php } ?>

                  </select>

                </div> -->

                <div class="form-group">

                        <label for="inputName">Question</label>

                        <textarea id="question" name="question" class="form-control" rows="2" placeholder="Enter Question"></textarea>

                   </div>

                    <div class="form-group">

                        <label for="inputName">Answer</label>

                        <textarea id="answer" name="answer" class="form-control" rows="2" placeholder="Enter Answer"></textarea>

                   </div>

                   <!-- <div class="form-group">

                        <label for="inputName">Location</label>

                        <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location"/>

                    </div> -->

                    <!-- <div class="form-group">

                        <label for="inputEmail">Image upload</label>

                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">

                    </div> -->

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

<div class="modal fade" id="model<?php echo $iddata=$viewData['faq_id'];?>" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- Modal Header -->

            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Faq</h4>
                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

               

            </div>

            

            <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

                <?php echo form_open_multipart(base_url().'updatefaq/update/'.$iddata); ?>

               

                    <!-- <div class="form-group">

                        <label for="inputName">Name</label>

                        <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo $viewData['name'];?>"/>

                    </div>

                     -->

                    <div class="form-group">

                        <label for="inputName"> Question</label>

                        <textarea id="question" name="question" class="form-control" rows="2"><?php echo $viewData['question'];?></textarea>

                     </div>

                     <div class="form-group">

                        <label for="inputName"> Answer</label>

                        <textarea id="answer" name="answer" class="form-control" rows="2"><?php echo $viewData['answer'];?></textarea>

                     </div>

                   

                    <!-- <div class="form-group">

                        <label for="inputEmail">Image upload</label>

                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">

                    </div> -->

                    <!-- <div class="form-group">

                        <label for="inputEmail">OLD IMAGE</label>

                        <img style="width: 10%;" src="<?php echo base_url();?>/image/faq/<?php echo $viewData['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />

                   </td>

                    </div> -->

                   

                   

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

<div class="modal fade" id="modelview<?php echo $iddata=$viewData['faq_id'];?>" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- Modal Header -->

            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">View Faq</h4>
                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

                

            </div>

            

            <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

               

                <div class="form-group">

                        <label for="inputName">Question</label>

                        <!-- <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo $viewData['title'];?>"/>

                   -->

                   <p><?php echo $viewData['question'];?></p>

                    </div>

                    

                    <div class="form-group">

                        <label for="inputName">Answer</label>

                        <!-- <textarea id="short_description" name="short_description" class="form-control" rows="2"><?php echo $viewData['short_description'];?></textarea>

                  --><p><?php echo $viewData['answer'];?></p>

                   </div>

                

                    

                    <!-- <div class="form-group">

                        <label for="inputEmail">Image upload</label>

                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">

                    </div> -->

                    <!-- <div class="form-group">

                        <label for="inputEmail">IMAGE</label>

                        <img style="width: 10%;" src="<?php echo base_url();?>/image/faq/<?php echo $viewData['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />

                   </td>

                    </div> -->

                   

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