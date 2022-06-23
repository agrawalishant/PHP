<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

           <h1><?php echo $page_title; ?>    <!-- <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> Add Festival</button> -->

            

        

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

                <h3 class="card-title"><?php echo $page_title; ?></h3>

              </div>

              <!-- /.card-header -->

              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>

               

                  <tr>

                    <th>S.NO</th>
                    <th>POST ON COMMENT</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>MOBILE</th>
                     <th>COMMENT</th>
                     <th>STATUS</th>
                    <th>ACTION</th>

                  </tr>

                  </thead>

                  <tbody>

                  <?php

                  $sno=0;

                //   $datadisplay=fetchbyresultlimitorder('enquiry','10000','enq_id','desc');

               foreach($datadisplay as $datadisp):

                $sno++;

                 ?>

                  <tr>

                    <td><?php echo $sno;?></td>
                     <!-- <td><?php echo $datadisp['title'];?></td> -->
                     <td><?php echo $add = word_limiter(strip_tags($datadisp['title']),2);?></td>
                     <td><?php echo $datadisp['comment_name'];?></td>
                     
                     <td><?php echo $datadisp['comment_email'];?></td>
                     <td><?php echo $datadisp['comment_mobile'];?></td>
                    <!-- <td><?php echo $datadisp['comment_comment'];?></td> -->
                   <td><?php echo $ad = word_limiter(strip_tags($datadisp['comment_comment']), 2);?></td>
                    <td><span class="badge badge-<?php if($datadisp['comment_status']==0) {echo "danger";}else{echo "success";} ;?>"><?php if($datadisp['comment_status']==0) {echo "NOT APP";}else{ echo "APPROVED";} ;?></span></td>
 
                 

                      <td>

                        <!-- <a onclick="return confirm('Are you sure you want to Edit this item?');" href="<?php echo base_url();?>view/<?php echo $datadisp['comment_id'];?>" > <i class="fas fa-eye"></i></a> -->

                        <a  href="" data-toggle="modal" data-target="#modelview<?php echo $datadisp['comment_id'];?>" data-id="<?php echo $datadisp['comment_id'];?>" >  <i class="fas fa-eye"></i></a>

                        <!-- <a  href="" data-toggle="modal" data-target="#model<?php echo $datadisp['comment_id'];?>" data-id="<?php echo $datadisp['comment_id'];?>" >  <i class="fas fa-edit"></i></a> -->

                        <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deletecommentsapproval/delete/<?php echo $datadisp['comment_id'];?>" > <i class="fas fa-trash"></i></a>
                        <?php if($datadisp['comment_status']==0)
                             {?>
                              <a onclick="return confirm('Are you sure you want to Active this item?');" href="<?php echo base_url();?>active_commentsapproval/active/<?php echo $datadisp['comment_id'];?>" style="color:green;" >APPROV</a>
                             <?php } else { ?>
                            
                            <a onclick="return confirm('Are you sure you want to Inactive this item?');" href="<?php echo base_url();?>deactive_commentsapproval/inactive/<?php echo $datadisp['comment_id'];?>" style="color:red" >DIS APPROV</a>
                          
                             <?php } ?>
                    
                     </td>

                    </tr>

                    <?php endforeach;?>

                  </tbody>

                  <tfoot>

                  <tr>
                  <th>S.NO</th>
                    <th>POST ON COMMENT</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>MOBILE</th>
                     <th>COMMENT</th>
                     <th>STATUS</th>
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

                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

                <h4 class="modal-title" id="myModalLabel">Add Festival</h4>

            </div>

            

            <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

                <?php echo form_open(base_url().'add_festival'); ?>

                    <div class="form-group">

                        <label for="inputName">Title</label>

                        <input type="text" class="form-control" id="title" name="title" placeholder="Title"/>

                    </div>

                    <div class="form-group">

                        <label for="inputEmail">Description</label>

                        <textarea id="description" name="description" class="form-control" rows="2"> </textarea>

                      

                    </div>

                    <div class="form-group">

                        <label for="inputEmail">Date</label>

                        <input type="date"  name="date" >

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

<div class="modal fade" id="model<?php echo $iddata=$viewData['comment_id'];?>" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- Modal Header -->

            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Festival</h4>
                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

                

            </div>

            

            <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

                <?php echo form_open(base_url().'updatefestival/update/'.$iddata); ?>

               

                <div class="form-group">

                        <label for="inputName">title</label>

                        <input type="text" class="form-control" id="title" name="title"placeholder="Enter title" value="<?php echo $viewData['title'];?>"/>

                    </div>

                    <div class="form-group">

                        <label for="inputEmail">Description</label>

                        <textarea id="description" name="description" class="form-control" rows="2"> <?php echo $viewData['description'];?></textarea>

                    </div>

                    <div class="form-group">

                        <label for="inputName">Date</label>

                        <input type="date"  name="date" value="<?php echo $viewData['date'];?>">

                        

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



<!-- model start view data-->

 

<?php if(!empty($datadisplay)){ foreach($datadisplay as $viewData){ ?>



<!-- Modal -->

<div class="modal fade" id="modelview<?php echo $iddata=$viewData['comment_id'];?>" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- Modal Header -->

            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">View COMMENT</h4>
                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

               

            </div>

            

            <!-- Modal Body -->

            <div class="modal-body">

                <p class="statusMsg"></p>

                <!-- <?php echo form_open(base_url().'updatefestival/update/'.$iddata); ?> -->

               

                <div class="form-group">

                        <label for="inputName">comment</label>

                        <!-- <input type="text" class="form-control" id="title" name="title"placeholder="Enter title" value="<?php echo $viewData['title'];?>"/> -->

                   <p><?php echo $viewData['comment_comment'];?></p>

                    </div>

                    <!-- <div class="form-group">

                        <label for="inputName">Email </label> -->

                        <!-- <input type="text" class="form-control" id="title" name="title"placeholder="Enter title" value="<?php echo $viewData['title'];?>"/> -->

                   <!-- <p><?php// echo $viewData['enq_email'];?></p>

                    </div> -->

                    <!-- <div class="form-group">

                        <label for="inputName">Enquiry Related To </label>

                        <input type="text" class="form-control" id="title" name="title"placeholder="Enter title" value="<?php echo $viewData['title'];?>"/>

                   <p><?php //echo $viewData['enq_relatedto'];?></p>

                    </div> -->

                  

                    <!-- <div class="form-group">

                        <label for="inputName">Date</label>

                        <input type="date"  name="date" value="<?php echo $viewData['date'];?>">

                        

                    </div> -->

                   

                   

            </div>

            <!-- Modal Footer -->

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                <!-- <button type="submit" name="submit" value="submit" class="btn btn-primary submitBtn" >SUBMIT</button> -->

            </div> <?php echo form_close(); ?>

        </div>

    </div>

</div>

  <!-- model end -->

  <?php }} ?>