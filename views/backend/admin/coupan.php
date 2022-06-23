<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

           

            <h1><?php echo $page_title; ?>   <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> ADD COUPAN</button>
           
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

                <h3 class="card-title">COUPAN</h3>

              </div>

              <!-- /.card-header -->

              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>

               <tr>

                    <th>S.NO</th>
                    <th>NAME</th>
                    <th>CODE</th>
                    <th>AMOUNT</th>
                    <th>START DATE</th>
                    <th>END DATE</th>
                    
                    <th>CODE ABOVE MIN AMOUNT</th>
                    <!-- <th>STATUS</th> -->
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
                   <td><?php echo $a = word_limiter(strip_tags($faq['cpn_name']), 5);?></td>
                   <td><?php echo $faq['cpn_code'];?></td>
                   <td><?php echo $faq['cpn_amount'];?></td>
                   <td><?php echo $faq['cpn_startdate'];?></td>
                   <td><?php echo $faq['cpn_enddate'];?></td>
                   <td><?php echo $faq['cpn_disc_min_amound'];?></td>
                   <!-- <td><?php echo $faq['cpn_status'];?></td> -->
                   <!-- <td><span class="badge badge-<?php if($faq['cpn_status']==0) {echo "danger";}elseif($faq['cpn_status']==2) {echo "warning";}else{echo "success";} ;?>"><?php if($faq['cpn_status']==0) {echo "EXPIRED";}elseif($faq['cpn_status']==2) {echo "WAITING";}else{ echo "RUNNING";} ;?></span></td> -->
 
                     <td>
                        <a  href="" data-toggle="modal" data-target="#modelview<?php echo $faq['cpn_id'];?>" data-id="<?php echo $faq['cpn_id'];?>" >  <i class="fas fa-eye"></i></a>
                        <a  href="" data-toggle="modal" data-target="#model<?php echo $faq['cpn_id'];?>" data-id="<?php echo $faq['cpn_id'];?>" >  <i class="fas fa-edit"></i></a>
                        <!-- <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deletecoupan/delete/<?php echo $faq['cpn_id'];?>" > <i class="fas fa-trash"></i></a> -->
                     </td>

                  </tr>
                   <?php endforeach;?>

                  </tbody>

                  <tfoot>

                  <tr>

                  <th>S.NO</th>
                    <th>NAME</th>
                    <th>CODE</th>
                    <th>AMOUNT</th>
                    <th>START DATE</th>
                    <th>END DATE</th>
                   
                    <th>CODE ABOVE MIN AMOUNT</th>
                    <!-- <th>STATUS</th> -->
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
            <h4 class="modal-title" id="myModalLabel">Add Coupan</h4>

                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

                
            </div>

            

            <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

                <?php echo form_open(base_url().'add_coupan'); ?>

                <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="cpn_name" name="cpn_name" placeholder="Enter name"/>
                </div>
               
                <div class="form-group">
                    <label for="inputName">Code</label>
                    <input type="text" class="form-control" id="cpn_code" name="cpn_code" placeholder="Enter Coupan Code"/>
                </div>

                <div class="form-group">
                    <label for="inputName">Amount</label>
                    <input type="text" class="form-control" id="cpn_amount" name="cpn_amount" placeholder="Enter Amount"/>
                </div>
                <div class="form-group">
                    <label for="inputName">Discount in Amount (Amount above this amount)</label>
                    <input type="text" class="form-control" id="cpn_disc_min_amound" name="cpn_disc_min_amound" placeholder="Enter Amount"/>
                </div>
                <div class="form-group">
                    <label for="inputName">Start Date</label>
                    <input type="date" class="form-control" id="cpn_startdate" name="cpn_startdate" placeholder="Enter Start date"/>
                </div>

                <div class="form-group">
                    <label for="inputName">End Date</label>
                    <input type="date" class="form-control" id="cpn_enddate" name="cpn_enddate" placeholder="Enter End Date"/>
                </div>



                <div class="form-group">
                    <label for="inputName">Description</label>
                    <textarea id="cpn_description" name="cpn_description" class="form-control" rows="2" placeholder="Enter Description"></textarea>
                </div>

              <!-- <div class="form-group">

                  <label></label>

                  <select class="form-control select2" style="width: 100%;" name="gallery_cat_id">

                    <?php foreach($categ as $dep){?>

                     <option value="<?php echo $dep['id_imgcat'];?>"><?php echo $dep['name'];?></option>

                   <?php } ?>

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

<div class="modal fade" id="model<?php echo $iddata=$viewData['cpn_id'];?>" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- Modal Header -->

            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Coupan</h4>
                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>
               </div>

            <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

                <?php echo form_open(base_url().'updatecoupan/update/'.$iddata); ?>

               

                    <div class="form-group">

                        <label for="inputName">Name</label>

                        <input type="text" class="form-control" id="cpn_name" name="cpn_name" placeholder="name" value="<?php echo $viewData['cpn_name'];?>"/>

                    </div>

                    

                    <div class="form-group">

                        <label for="inputName"> Description</label>

                        <textarea id="cpn_description" name="cpn_description" class="form-control" rows="2"><?php echo $viewData['cpn_description'];?></textarea>

                     </div>

                   
                     <div class="form-group">

                      <label for="inputName">Code</label>

                      <input type="text" class="form-control" id="cpn_code" name="cpn_code" placeholder="name" value="<?php echo $viewData['cpn_code'];?>"/>

                      </div> 

                      <div class="form-group">

                      <label for="inputName">Amount</label>

                      <input type="text" class="form-control" id="cpn_amount" name="cpn_amount" placeholder="name" value="<?php echo $viewData['cpn_amount'];?>"/>

                      </div>

                      <div class="form-group">

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

<div class="modal fade" id="modelview<?php echo $iddata=$viewData['cpn_id'];?>" role="dialog">

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