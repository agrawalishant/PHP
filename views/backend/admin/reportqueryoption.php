<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1><?php echo $page_title; ?>   <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> ADD QUESTIONS</button>
           
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

                <h3 class="card-title">Questions</h3>

              </div>

              <!-- /.card-header -->

              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>

               <tr>

                    <th>S.NO</th>
                    <th>QUESTION</th>
                    <th>OPTION 1</th>
                    <th>OPTION 2</th>
                    <th>OPTION 3</th>
                    <th>OPTION 4</th>
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
                   <td><?php echo $a = word_limiter(strip_tags($faq['rqo_question']), 10);?></td>
                   <td><?php echo $faq['rqo_option1'];?></td>
                   <td><?php echo $faq['rqo_option2'];?></td>
                   <td><?php echo $faq['rqo_option3'];?></td>
                   <td><?php echo $faq['rqo_option4'];?></td>
                  
                   <!-- <td><?php echo $faq['cpn_status'];?></td> -->
                   <!-- <td><span class="badge badge-<?php if($faq['cpn_status']==0) {echo "danger";}elseif($faq['cpn_status']==2) {echo "warning";}else{echo "success";} ;?>"><?php if($faq['cpn_status']==0) {echo "EXPIRED";}elseif($faq['cpn_status']==2) {echo "WAITING";}else{ echo "RUNNING";} ;?></span></td> -->
 
                     <td>
                        <!-- <a  href="" data-toggle="modal" data-target="#modelview<?php echo $faq['rqo_id'];?>" data-id="<?php echo $faq['rqo_id'];?>" >  <i class="fas fa-eye"></i></a> -->
                        <a  href="" data-toggle="modal" data-target="#model<?php echo $faq['rqo_id'];?>" data-id="<?php echo $faq['rqo_id'];?>" >  <i class="fas fa-edit"></i></a>
                        <!-- <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deletetereportquestion/delete/<?php echo $faq['rqo_id'];?>" > <i class="fas fa-trash"></i></a> -->
                     </td>

                  </tr>
                   <?php endforeach;?>

                  </tbody>

                  <tfoot>

                  <tr>

                  <th>S.NO</th>
                    <th>QUESTION</th>
                    <th>OPTION 1</th>
                    <th>OPTION 2</th>
                    <th>OPTION 3</th>
                    <th>OPTION 4</th>
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
            <h4 class="modal-title" id="myModalLabel">ADD QUESTION</h4>

                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

                
            </div>

            

            <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

                <?php echo form_open(base_url().'add_reportquestion'); ?>

                <div class="form-group">
                <label for="inputName">QUESTION</label>
                <input type="text" class="form-control" id="rqo_question" name="rqo_question" placeholder="Enter Question"/>
                </div>
               
                <div class="form-group">
                    <label for="inputName">OPTION 1</label>
                    <input type="text" class="form-control" id="rqo_option1" name="rqo_option1" placeholder="Enter Option 1"/>
                </div>

                <div class="form-group">
                    <label for="inputName">OPTION 2</label>
                    <input type="text" class="form-control" id="rqo_option2" name="rqo_option2" placeholder="Enter Option 2"/>
                </div>
               
                <div class="form-group">
                    <label for="inputName">OPTION 3</label>
                    <input type="text" class="form-control" id="rqo_option3" name="rqo_option3" placeholder="Enter option 3"/>
                </div>

                <div class="form-group">
                    <label for="inputName">OPTION 4</label>
                    <input type="text" class="form-control" id="rqo_option4" name="rqo_option4" placeholder="Enter Option 4"/>
                </div>

                <!-- <div class="form-group">
                    <label for="inputName">End Date</label>
                    <input type="date" class="form-control" id="cpn_enddate" name="cpn_enddate" placeholder="Enter End Date"/>
                </div>



                <div class="form-group">
                    <label for="inputName">Description</label>
                    <textarea id="cpn_description" name="cpn_description" class="form-control" rows="2" placeholder="Enter Description"></textarea>
                </div> -->

              <!-- <div class="form-group">

                  <label></label>

                  <select class="form-control select2" style="width: 100%;" name="gallery_cat_id">

                    <?php// foreach($categ as $dep){?>

                     <option value="<?php //echo $dep['id_imgcat'];?>"><?php// echo $dep['name'];?></option>

                   <?php //} ?>

                  </select>

                </div> -->

                <!-- <div class="form-group">

                        <label for="inputName">Name</label>

                        <textarea id="question" name="question" class="form-control" rows="2" placeholder="Enter Question"></textarea>

                   </div>

                    <div class="form-group">

                        <label for="inputName">Answer</label>

                        <textarea id="answer" name="answer" class="form-control" rows="2" placeholder="Enter Answer"></textarea>

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

<div class="modal fade" id="model<?php echo $iddata=$viewData['rqo_id'];?>" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- Modal Header -->

            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Question</h4>
                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>
               </div>

            <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

                <?php echo form_open(base_url().'updatereportquestion/update/'.$iddata); ?>

               

                    <div class="form-group">

                        <label for="inputName">QUESTION</label>

                        <input type="text" class="form-control" id="rqo_question" name="rqo_question" placeholder="Question" value="<?php echo $viewData['rqo_question'];?>"/>

                    </div>

                    <div class="form-group">

                        <label for="inputName">OPTION 1</label>

                        <input type="text" class="form-control" id="rqo_option1" name="rqo_option1" placeholder="option1" value="<?php echo $viewData['rqo_option1'];?>"/>

                    </div>

                   
                     <div class="form-group">

                      <label for="inputName">OPTION 2</label>

                      <input type="text" class="form-control" id="rqo_option2" name="rqo_option2" placeholder="option2" value="<?php echo $viewData['rqo_option2'];?>"/>

                      </div> 

                      <div class="form-group">

                      <label for="inputName">OPTION 3</label>

                      <input type="text" class="form-control" id="rqo_option3" name="rqo_option3" placeholder="option3" value="<?php echo $viewData['rqo_option3'];?>"/>

                      </div>

                      <div class="form-group">

                        <label for="inputName">OPTION 4</label>

                        <input type="text" class="form-control" id="rqo_option4" name="rqo_option4" placeholder="option4" value="<?php echo $viewData['rqo_option4'];?>"/>

                        </div>
                    <!-- <div class="form-group">

                        <label for="inputName"> Description</label>

                        <textarea id="cpn_description" name="cpn_description" class="form-control" rows="2"><?php echo $viewData['cpn_description'];?></textarea>

                     </div> -->

                      <!-- <div class="form-group">

                      <label for="inputName">Start Date</label>

                      <input type="date" class="form-control" id="cpn_startdate" name="cpn_startdate" placeholder="startdate" value="<?php echo $viewData['cpn_startdate'];?>"/>

                      </div>

                      <div class="form-group">

                      <label for="inputName">End Date</label>

                      <input type="date" class="form-control" id="cpn_enddate" name="cpn_enddate" placeholder="cpn_enddate" value="<?php echo $viewData['cpn_enddate'];?>"/>

                      </div>                   
                      <div class="form-group">

                      <label for="inputName">Min Amt Disc</label>

                      <input type="text" class="form-control" id="cpn_disc_min_amound" name="cpn_disc_min_amound" placeholder="cpn_disc_min_amound" value="<?php echo $viewData['cpn_disc_min_amound'];?>"/>

                      </div> -->
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

<div class="modal fade" id="modelview<?php echo $iddata=$viewData['rqo_id'];?>" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- Modal Header -->

            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">View Data</h4>
                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

            </div>

            <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

               

                <div class="form-group">

                        <label for="inputName">Description</label>

                        <!-- <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo $viewData['title'];?>"/>

                   -->

                   <p><?php echo $viewData['cpn_description'];?></p>

                    </div>

                    

                    <!-- <div class="form-group">

                        <label for="inputName">Answer</label> 

                         <textarea id="short_description" name="short_description" class="form-control" rows="2"><?php echo $viewData['short_description'];?></textarea>

                  <p><?php //echo $viewData['answer'];?></p>

                   </div>
                            -->
                
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