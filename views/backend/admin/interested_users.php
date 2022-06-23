<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">


                    <h1><?php echo $page_title; ?>
                        <!--<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> Add Festival</button>-->

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
                            <h3 class="card-title">Interested</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>

                                    <tr>
                                        <th>S.NO</th>
                                        <!-- <th>Name</th> -->
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <!-- <th>Email</th>
                  
                    <th>Registration Date</th>
                    <th>Registration By</th>
                    <th>ACTION</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                 
              
                  $sno=0;
               foreach($datadisplay as $datadisp):
                $sno++;
                 ?>
                                    <tr>
                                        <td><?php echo $sno;?></td>
                                        <td><?php echo $datadisp['m_user_mobile'];?></td>
                                        
                                        <td>
                                            <?php 
                     
                     $fdata=fetchbyresult('user');
                    foreach($fdata as $fd)
                    {
                      
                       if($datadisp['m_user_mobile'] == $fd['user_mobile'])
                             {
                               
                               ?>
                         <span class="badge badge-success ;?>">REGISTERED</span>
                        <?php  }
                    
                    }
                    
                     ?>
                                            <!-- <span
                         class="badge badge-<?php if($datadisp['user_mobile'] != $datadisplay2[0]['user_mobile']) {echo "danger";}else{echo "success";} ;?>"><?php if($datadisp['user_mobile'] != $datadisplay2[0]['user_mobile']) {echo "111 FORM NOT FILLED";} else { echo "222FORM FILLED";} ;?></span>
                                         -->
                                        </td>
                                        <td><?php echo date('d-M-Y',strtotime($datadisp['timestamp'])) ;?></td>
                                        <!-- <td><?php echo $datadisp['user_first_name'];?></td>
                    <td><?php echo $datadisp['user_email'];?></td> -->

                                        <!-- <td><?php echo $datadisp['user_timestamp'];?></td>
                       <td><?php echo strtoupper($datadisp['registerby']);?></td> -->
                                        <!-- <td> -->

                                        <!-- <a  href="" data-toggle="modal" data-target="#modelview<?php echo $datadisp['id'];?>" data-id="<?php echo $datadisp['id'];?>" >  <i class="fas fa-eye"></i></a> -->



                                        <!--<a  href="" data-toggle="modal" data-target="#model<?php echo $datadisp['id'];?>" data-id="<?php echo $datadisp['id'];?>" >  <i class="fas fa-edit"></i></a>-->



                                        <!-- <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deleteuserlist/delete/<?php echo $datadisp['id'];?>" > <i class="fas fa-trash"></i></a> -->

                                        <!-- </td> -->
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <!-- <th>Name</th>
                    <th>Email</th>
                   
                    <th>Registration Date</th>
                    <th>Registration By</th> 
                    <th>ACTION</th>-->
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
                <h4 class="modal-title" id="myModalLabel">Interested user</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>

            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open(base_url().'add_festival'); ?>
                <div class="form-group">
                    <label for="inputName">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" />
                </div>
                <div class="form-group">
                    <label for="inputEmail">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="2"> </textarea>

                </div>
                <div class="form-group">
                    <label for="inputEmail">Date</label>
                    <input type="date" name="date">
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary submitBtn">SUBMIT</button>
            </div> <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- model end -->

<!-- model for edit data start -->
<!-- model start updatedata data-->

<?php if(!empty($datadisplay)){ foreach($datadisplay as $viewData){ ?>

<!-- Modal -->
<div class="modal fade" id="model<?php echo $iddata=$viewData['id'];?>" role="dialog">
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
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title"
                        value="<?php echo $viewData['title'];?>" />
                </div>
                <div class="form-group">
                    <label for="inputEmail">Description</label>
                    <textarea id="description" name="description" class="form-control"
                        rows="2"> <?php echo $viewData['description'];?></textarea>
                </div>
                <div class="form-group">
                    <label for="inputName">Date</label>
                    <input type="date" name="date" value="<?php echo $viewData['date'];?>">

                </div>


            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary submitBtn">SUBMIT</button>
            </div> <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- model end -->
<?php }} ?>

<!-- model start view data-->

<?php if(!empty($datadisplay)){ foreach($datadisplay as $viewData){ ?>

<!-- Modal -->
<div class="modal fade" id="modelview<?php echo $iddata=$viewData['id'];?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">View Detail</h4>
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
                    <label for="inputName">Name</label>
                    <!-- <input type="text" class="form-control" id="title" name="title"placeholder="Enter title" value="<?php echo $viewData['title'];?>"/> -->
                    <p><?php echo $viewData['user_first_name'];?></p>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <!-- <textarea id="description" name="description" class="form-control" rows="2"> <?php echo $viewData['description'];?></textarea> -->
                    <p><?php echo $viewData['user_email'];?></p>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Mobile</label>
                    <!-- <textarea id="description" name="description" class="form-control" rows="2"> <?php echo $viewData['description'];?></textarea> -->
                    <p><?php echo $viewData['user_mobile'];?></p>
                </div>
                <div class="form-group">
                    <label for="inputEmail">State</label>
                    <!-- <textarea id="description" name="description" class="form-control" rows="2"> <?php echo $viewData['description'];?></textarea> -->
                    <p><?php echo $viewData['user_state'];?></p>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Country</label>
                    <!-- <textarea id="description" name="description" class="form-control" rows="2"> <?php echo $viewData['description'];?></textarea> -->
                    <p><?php echo $viewData['user_country'];?></p>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Occupation</label>
                    <!-- <textarea id="description" name="description" class="form-control" rows="2"> <?php echo $viewData['description'];?></textarea> -->
                    <p><?php echo $viewData['user_occupation'];?></p>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Date of Birth</label>
                    <!-- <textarea id="description" name="description" class="form-control" rows="2"> <?php echo $viewData['description'];?></textarea> -->
                    <p><?php echo $viewData['user_dob'];?></p>
                </div>

                <div class="form-group">
                    <label for="inputEmail">Registered by</label>
                    <!-- <textarea id="description" name="description" class="form-control" rows="2"> <?php echo $viewData['description'];?></textarea> -->
                    <p><?php echo $viewData['registerby'];?></p>
                </div>
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