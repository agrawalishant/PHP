<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1><?php echo $page_title; ?>   <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> Add Language</button>
            </h1> -->
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
                    <th>USER ID</th>
                    <th>UNIQUE ID</th>
                    <th>TOTAL AMOUNT</th>
                    <th>PRODUCT ID</th>
                    <th>TRANSECTION ID</th>
                    <th>PAYMENT STATUS</th>
                    <th>PAID BY</th>
                    <th>PAID FOR</th>
                    <th>DATE</th>
                  </tr>
				  
                  </thead>
                  <tbody>
                  <?php
                  $sno=0;
                  $datadisplay=fetchbyresultlimitorder('payment','1000000','payment_id','desc');//fetchbyresult('payment');
               foreach($datadisplay as $dtdisp):
                $sno++;
                 ?>
                 
                  <tr >
                    <td><?php echo $sno;?></td>
                    <td><?php
                     $u=fetchbyresultByCondiction('user',array('user_id' => $dtdisp['user_id']));
                     if(!empty($u)){
                    echo $u[0]['user_first_name']; }
                    ?></td>
                    <td><?php echo $dtdisp['unique_id'];?></td>
                    <td><?php echo $dtdisp['total_amt'];?></td>
                    <td><?php 
                    if(!empty($dtdisp['product_id'])){
                     $p=fetchbyresultByCondiction('product',array('pr_id' => $dtdisp['product_id']));
                     if(!empty($p)){
                     echo @$p[0]['pr_title'];}
                    }
                    ?></td>
                    <td><?php if($dtdisp['txn_id']==''){echo "WALLET PAID";}else{echo $dtdisp['txn_id'];};?></td>
                  
                    <td <?php if($dtdisp['payment_status'] != 'Success'){?> style="background : red "<?php } ?>><?php echo $dtdisp['payment_status'];?></td>
                    <td><?php echo $dtdisp['pay_by'];?></td>
                    <td><?php echo $dtdisp['payfor'];?></td>
                    <td><?php echo $dte=date('d-M-Y h:i:sa',strtotime($dtdisp['timestamp']));?></td>
                   <!-- <td><?php echo $a = word_limiter(strip_tags($dtdisp['question']), 5);?></td>
                   <td><?php echo $a = word_limiter(strip_tags($dtdisp['answer']), 5);?></td> -->
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
                    <th>USER ID</th>
                    <th>UNIQUE ID</th>
                    <th>TOTAL AMOUNT</th>
                    <th>PRODUCT ID</th>
                    <th>TRANSECTION ID</th>
                    <th>PAYMENT STATUS</th>
                    <th>PAID BY</th>
                    <th>PAID FOR</th>
                    <th>DATE</th>
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
            <h4 class="modal-title" id="myModalLabel">Add Language</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
              
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'add_language_astrologer'); ?>

              <!-- <div class="form-group">
                  <label></label>
                  <select class="form-control select2" style="width: 100%;" name="gallery_cat_id">
                    <?php foreach($categ as $dep){?>
                     <option value="<?php echo $dep['id_imgcat'];?>"><?php echo $dep['name'];?></option>
                   <?php } ?>
                  </select>
                </div> -->
                <!-- <div class="form-group">
                        <label for="inputName">Title</label>
                        <textarea id="cat_pro_title" name="cat_pro_title" class="form-control" rows="2" placeholder="Enter Title"></textarea>
                   </div>
                    <div class="form-group">
                        <label for="inputName">Answer</label>
                        <textarea id="answer" name="answer" class="form-control" rows="2" placeholder="Enter Answer"></textarea>
                   </div> -->
                   <div class="form-group">
                        <label for="inputName">Language</label>
                        <input type="text" class="form-control" id="la_title" name="la_title" placeholder="Enter Language"/>
                    </div>
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
<div class="modal fade" id="model<?php echo $iddata=$viewData['user_id'];?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Language</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'updatelanguage_astrologer/update/'.$iddata); ?>
               
                    <div class="form-group">
                        <label for="inputName">Language</label>
                        <input type="text" class="form-control" id="la_title" name="la_title" placeholder="la_title" value="<?php echo $viewData['la_title'];?>"/>
                    </div>
                    
                    <!-- <div class="form-group">
                        <label for="inputName"> Title</label>
                        <input type="text" id="cat_pro_title" name="cat_pro_title" class="form-control" ><?php echo $viewData['cat_pro_title'];?></input>
                     </div> -->
                     <!-- <div class="form-group">
                        <label for="inputName"> Answer</label>
                        <textarea id="answer" name="answer" class="form-control" rows="2"><?php echo $viewData['answer'];?></textarea>
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
<div class="modal fade" id="modelview<?php echo $iddata=$viewData['user_id'];?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">View Category</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
              
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
               
                <div class="form-group">
                        <label for="inputName">Title</label>
                        <!-- <input type="text" class="form-control" id="title" name="title" placeholder="title" value="<?php echo $viewData['title'];?>"/>
                   -->
                   <p><?php echo $viewData['cat_astr_title'];?></p>
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
  if ( /\.(jpe?g|png|gif)$/i.test(file.files[0].name) === false ) { alert("Not an image!"); }
}
  </script>