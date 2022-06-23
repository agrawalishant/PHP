<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

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
                          <th>USER</th>
                          <th>ASTROLOGER</th>
                          <!-- <th>AMOUNT PAID</th> -->
                          <th>TYPE</th>
                          <th>REQUESTED DATE</th>
                          <th>SOLVE DATE</th>
                          <th>REPORT STATUS</th>
                          <th>PAYMENT STATUS</th>
                          <th>ACTION</th>
                  </tr>
				  
                  </thead>
                  <tbody>
                  <?php

$sno=0;
//   $datadisplay=fetchbyresultlimitorder('enquiry','10000','enq_id','desc');
//fetchbyresultorderby('reportsendtoastro','rp_id','desc')
$datadisplay=fetchbywhereorder2('reportsendtoastro','','asc','rp_astrologer_pay_status','desc','rp_problem_solve_status') ;
foreach($datadisplay as $datadisp):
$sno++;
?>
                 
                  <tr >
                  <td><?php echo $sno;?></td>
                   
                     <td><?php $nm=fetchbyresult_where('user',$datadisp['rp_user_id'],'user_id') ;
                               //print_r($nm);
                              echo $nm['0']['user_first_name'];
                              echo $datadisp['rp_user_id'];
                     ?></td>
                     <td>
                     <?php $ast_nm=fetchbyresult_where('astrologers',$datadisp['rp_astro_id'],'astro_id') ;
                               //print_r($nm);
                              echo $ast_nm['0']['astro_name'];
                     ?>
                     <?php echo $datadisp['rp_astro_id'];?></td>
                     <!-- <td><?php echo $datadisp['rp_amountpaid'];?></td> -->
                     <td><?php echo $datadisp['rp_type'];?></td>
                     <td><?php echo date('d-M-Y',strtotime($datadisp['rp_timestamp']));?></td>
                     <td><?php  if($datadisp['rp_solvedate']=='0000-00-00 00:00:00')  {echo "PENDING ";} else{  echo date('d-Y-M',strtotime($datadisp['rp_solvedate'])); }?></td>

                     <td><span class="badge badge-<?php if($datadisp['rp_problem_solve_status']=='0') {echo "danger";}else{echo "success";} ;?>"><?php if($datadisp['rp_problem_solve_status']=='0') {echo "WAITING";}else{ echo "CREATED";} ;?></span></td>
                     <td><span class="badge badge-<?php if($datadisp['rp_astrologer_pay_status']=='0') {echo "danger";}else{echo "success";} ;?>"><?php if($datadisp['rp_astrologer_pay_status']=='0') {echo "NOT PAID";}else{ echo "PAID";} ;?></span></td>
                     <td>
                     <?php if($datadisp['rp_problem_solve_status'] !='0') {?>
                      <a  href="" data-toggle="modal" data-target="#modelview<?php echo $datadisp['rp_id'];?>" data-id="<?php echo $datadisp['rp_id'];?>" >  <i class="fas fa-eye"></i></a>
                      <?php if($datadisp['rp_astrologer_pay_status']=='0'){?>
                      <a onclick="return confirm('Are you sure you want to PAY TO THIS ASTROLOGER ?');" href="<?php echo base_url();?>paytoastrologer/payreport/<?php echo $datadisp['rp_astro_id'];?>/<?php echo $datadisp['rp_id'];?>" style="color:green;" ><i class="fas fa fa-reply" style="color: #000; font-size:25px;"></i></a>
                      <?php }} ?>
                      </td>
                     
                    
                                        
               <!-- <td><?php echo $a = word_limiter(strip_tags($datadisp['enq_message']), 10);?></td> -->

                    <!-- <td> -->

                        <!-- <a onclick="return confirm('Are you sure you want to Edit this item?');" href="<?php echo base_url();?>view/<?php echo $datadisp['fkun_id'];?>" > <i class="fas fa-eye"></i></a> -->

                        <!-- <a  href="" data-toggle="modal" data-target="#modelview<?php echo $datadisp['fkun_id'];?>" data-id="<?php echo $datadisp['fkun_id'];?>" >  <i class="fas fa-eye"></i></a> -->

                        <!-- <a  href="" data-toggle="modal" data-target="#model<?php echo $datadisp['fkun_id'];?>" data-id="<?php echo $datadisp['fkun_id'];?>" >  <i class="fas fa-edit"></i></a> -->

                        <!-- <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deleteenquiryfreekundali/delete/<?php echo $datadisp['fkun_id'];?>" > <i class="fas fa-trash"></i></a> -->
                        <?php //if($datadisp['status']==0)
                            //   {?>
                               <!-- <a onclick="return confirm('Are you sure you want to Active this item?');" href="<?php echo base_url();?>active_freekun/active/<?php echo $datadisp['fkun_id'];?>" style="color:green;" >Created</a> -->
                              <!-- <?php //} else //{ ?> -->
                            
                             <!-- <a onclick="return confirm('Are you sure you want to Inactive this item?');" href="<?php echo base_url();?>deactive_freekun/inactive/<?php echo $datadisp['fkun_id'];?>" style="color:red" >Not Created</a> -->
                          
                              <!-- <?php// } ?> -->
                    
                     <!-- </td> -->
                     <!-- <td> -->
                        
                        <!-- <a  href="" data-toggle="modal" data-target="#modelview<?php echo $dtdisp['user_id'];?>" data-id="<?php echo $dtdisp['user_id'];?>" >  <i class="fas fa-eye"></i></a> -->
                        <!-- <a  href="" data-toggle="modal" data-target="#model<?php echo $dtdisp['user_id'];?>" data-id="<?php echo $dtdisp['user_id'];?>" >  <i class="fas fa-edit"></i></a> -->
                        <!-- <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deletetelanguage_astrologer/delete/<?php echo $dtdisp['la_id'];?>" > <i class="fas fa-trash"></i></a> -->
                     <!-- </td> -->

                    </tr>

                    <?php   endforeach;?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.NO</th>
                          <th>USER</th>
                          <th>ASTROLOGER</th>
                          <!-- <th>AMOUNT PAID</th> -->
                          <th>TYPE</th>
                          <th>REQUESTED DATE</th>
                          <th>SOLVE DATE</th>
                          <th>REPORT STATUS</th>
                          <th>PAYMENT STATUS</th>
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

<div class="modal fade" id="model<?php echo $iddata=$viewData['rp_id'];?>" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- Modal Header -->

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">

                    <span aria-hidden="true">&times;</span>

                    <span class="sr-only">Close</span>

                </button>

                <h4 class="modal-title" id="myModalLabel">Edit Festival</h4>

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
<div class="modal fade" id="modelview<?php echo $iddata=$viewData['rp_id'];?>" role="dialog">

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

                        <label for="inputName">Detail</label>

                        <!-- <input type="text" class="form-control" id="title" name="title"placeholder="Enter title" value="<?php echo $viewData['title'];?>"/> -->
        <?php if(!empty($viewData['rp_solution_attachment'])) { ?>
      <p> <a href="<?php echo base_url();?>pdfimagedoc/astrologertouser/<?php echo $viewData['rp_solution_attachment']; ?>"><?php echo $viewData['rp_solution_attachment']; ?></a>
       </p>  <?php } ?> 
                   <p><?php echo $viewData['rp_sendsolution'];?></p>

                    </div>

                    <!-- <div class="form-group">

                        <label for="inputName">Email </label> -->

                        <!-- <input type="text" class="form-control" id="title" name="title"placeholder="Enter title" value="<?php echo $viewData['title'];?>"/> -->

                   <!-- <p><?php echo $viewData['enq_email'];?></p>

                    </div>

                    <div class="form-group">

                        <label for="inputName">Enquiry Related To </label> -->

                        <!-- <input type="text" class="form-control" id="title" name="title"placeholder="Enter title" value="<?php echo $viewData['title'];?>"/> -->

                   <!-- <p><?php echo $viewData['enq_relatedto'];?></p>

                    </div>

                    <div class="form-group">

                        <label for="inputName">Mobile No</label> -->

                        <!-- <input type="text" class="form-control" id="title" name="title"placeholder="Enter title" value="<?php echo $viewData['title'];?>"/> -->

                   <!-- <p><?php //echo $viewData['enq_mobilenumber'];?></p>

                    </div>

                    <div class="form-group">

                        <label for="inputEmail">Message</label> -->

                        <!-- <textarea id="description" name="description" class="form-control" rows="2"> <?php echo $viewData['description'];?></textarea> -->

                        <!-- <p><?php// echo $viewData['enq_message'];?></p> -->

                    </div>

                    <!-- <div class="form-group">

                        <label for="inputName">Date</label>

                        <input type="date"  name="date" value="<?php //echo $viewData['date'];?>">

                        

                    </div> -->

                   

                   

            </div>

            <!-- Modal Footer -->

            <div class="modal-footer">

                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->

                <!-- <button type="submit" name="submit" value="submit" class="btn btn-primary submitBtn" >SUBMIT</button> -->

            </div> <?php echo form_close(); ?>

        </div>

    </div>

</div>
 <!-- model end -->
 <?php }} ?>





  <script>
$(document).ready( function () {
    $('#exptable').DataTable();
} );
</script>