<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?>   <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> ADD PRODUCT</button>
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
                    <th>TITLE</th>
                    <th>IMAGE</th>
                    <th>CATEGORY</th>
                    <th>ORIGINAL PRICE</th>
                    <th>DISCOUNT</th>
                    <th>FINAL PRICE</th>
                    <th>Details</th>
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
                    <td><?php echo $dtdisp['pr_title'];?></td>
                    <td class="tb-img-sect img-size-small"><img class="img-responsive" src="<?php echo base_url();?>/image/product/<?php echo $dtdisp['pr_image']; ?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                   </td>
                   <td><?php echo $dtdisp['cat_pro_title'];?></td>
                   
                   <td><?php echo $dtdisp['pr_originalprice'];?></td>
                   <td><?php echo $dtdisp['pr_discount'];?>%</td>
                   <td><?php echo $dtdisp['pr_finalprice'];?></td>
                   <td><?php echo $dtdisp['pr_pricedetail'];?></td>
                   <!-- <td><?php echo $a = word_limiter(strip_tags($dtdisp['question']), 5);?></td>
                   <td><?php echo $a = word_limiter(strip_tags($dtdisp['answer']), 5);?></td> -->
                     <td>
                        <!-- <a onclick="return confirm('Are you sure you want to Edit this item?');" href="<?php echo base_url();?>view/<?php echo $dtdisp['pr_id'];?>" > <i class="fas fa-eye"></i></a> -->
                        <!-- <a  href="" data-toggle="modal" data-target="#modelview<?php echo $dtdisp['pr_id'];?>" data-id="<?php echo $dtdisp['pr_id'];?>" >  <i class="fas fa-eye"></i></a> -->
                        <a  href="" data-toggle="modal" data-target="#model<?php echo $dtdisp['pr_id'];?>" data-id="<?php echo $dtdisp['pr_id'];?>" >  <i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deleteproduct/delete/<?php echo $dtdisp['pr_id'];?>" > <i class="fas fa-trash"></i></a>
                     </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>S.NO</th>
                    <th>TITLE</th>
                    <th>IMAGE</th>
                    <th>CATEGORY</th>
                    <th>ORIGINAL PRICE</th>
                    <th>DISCOUNT</th>
                    <th>FINAL PRICE</th>
                    <th>Details</th>
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
    <div class="modal-dialog modelincrease">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add PRODUCT</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
              
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'add_product'); ?>
                <div class="form-group">
                        <label for="inputName">Title</label>
                        <input type="text" class="form-control" id="pr_title" name="pr_title" placeholder="Enter title" />
                    </div>
                    <div class="form-group">
                        <label for="inputName">Description</label>
                        <textarea id="pr_description" name="pr_description" class="form-control ckeditor" rows="2" placeholder="Enter Description"></textarea>
                   </div>
                 
              <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select2" style="width: 100%;" name="pr_category" onchange="yntfun();" id="ytnchange" >
                  <option >Select Category</option>
                    <?php foreach($categ as $dep){?>
                     <option value="<?php echo $dep['cat_pro_id'];?>"><?php echo $dep['cat_pro_title'];?></option>
                   <?php } ?>
                  </select>
                </div>
                   <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    </div>
                    <div class="gmsthide" style="display:none;">
                        <div class="form-group">
                            <label for="inputEmail">Certificate Image upload</label>
                            <input type="file" name="c_userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                        </div>
                    </div>
                    
                    <div class="ynthide">
                      <div class="form-group">
                          <label for="inputName">Original Price / Per Carat</label>
                          <input type="text" class="form-control" id="pr_originalprice" name="pr_originalprice" placeholder="Enter Price"/>
                      </div>
                      <div class="form-group">
                          <label for="inputName">Discount</label>
                          <input type="text" class="form-control" id="pr_discount" name="pr_discount" placeholder="Enter discount"/>
                      </div>
                    </div>
                    <div style="display:none;" id="yntshow">
                      <div class="form-group">
                          <label for="inputName">Yantra Details</label>
                          <input type="text" class="form-control" id="pr_pricedetail" name="pr_pricedetail" placeholder="Enter Price Detail"/>
                      </div>
                    </div>
                <!-- <div class="form-group">
                        <label for="inputName">Title</label>
                        <textarea id="cat_pro_title" name="cat_pro_title" class="form-control" rows="2" placeholder="Enter Title"></textarea>
                   </div>
                    <div class="form-group">
                        <label for="inputName">Answer</label>
                        <textarea id="answer" name="answer" class="form-control" rows="2" placeholder="Enter Answer"></textarea>
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
<div class="modal fade" id="model<?php echo $iddata=$viewData['pr_id'];?>" role="dialog">
    <div class="modal-dialog modelincrease">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'updateproduct/update/'.$iddata); ?>
               
                    <div class="form-group">
                        <label for="inputName">Title</label>
                        <input type="text" class="form-control" id="pr_title" name="pr_title" placeholder="pr_title" value="<?php echo $viewData['pr_title'];?>"/>
                    </div>
                    
                    <!-- <div class="form-group">
                        <label for="inputName"> Title</label>
                        <input type="text" id="cat_pro_title" name="cat_pro_title" class="form-control" ><?php echo $viewData['cat_pro_title'];?></input>
                     </div> -->
                     <div class="form-group">
                        <label for="inputName"> Description</label>
                        <textarea id="answer" name="pr_description" class="form-control ckeditor" rows="2"><?php echo $viewData['pr_description'];?></textarea>
                     </div>
                     <!-- <div class="form-group">
                        <label for="inputName">Category</label>&nbsp;&nbsp;<span> <b> * Not Changeble</b></span> 
                        <input type="text" name="" value="<?php echo $viewData['pr_category']; ?>" readonly="readonly" class="form-control">
                        <select class="form-control select2" style="width: 100%;" name="pr_category" onchange="edtyntfun();" id="edityntch" >
                          <option value="0">Select Category</option>
                          <?php foreach($categ as $dep){?>
                            <option value="<?php echo $dep['cat_pro_id'];?>"<?php if($dep['cat_pro_id']==$viewData['pr_category']) echo 'selected="selected"';?>><?php echo $dep['cat_pro_title'];?></option>
                          <?php } ?>
                        </select>
                    </div> -->
                    <?php $yntid = $viewData['pr_category'];
                      if($yntid!=2)
                      {
                    ?>
                    
                      <div class="form-group">
                          <label for="inputName">Original Price / Per Carat</label>
                          <input type="text" class="form-control" id="pr_originalprice" name="pr_originalprice" placeholder="pr_originalprice" value="<?php echo $viewData['pr_originalprice'];?>"/>
                      </div>
                      <div class="form-group">
                          <label for="inputName">Discount</label>
                          <input type="text" class="form-control" id="pr_discount" name="pr_discount" placeholder="pr_discount" value="<?php echo $viewData['pr_discount'];?>"/>
                      </div>
                    
                  <?php }else{ ?>
                    
                      <div class="form-group">
                          <label for="inputName">Product Details</label>
                          <input type="text" class="form-control" id="pr_pricedetail" name="pr_pricedetail" placeholder="Yantra Details" value="<?php echo $viewData['pr_pricedetail'];?>"/>
                      </div>
                    
                  <?php } ?>
                    <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    </div>
                    <?php  if($viewData['pr_category'] == '1')  {?>
                    <div class="form-group">
                        <label for="inputEmail">Certificate Image upload</label>
                        <input type="file" name="c_userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="inputEmail">OLD IMAGE</label>
                        <img style="width: 10%;" src="<?php echo base_url();?>/image/product/<?php echo $viewData['pr_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
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
<div class="modal fade" id="modelview<?php echo $iddata=$viewData['pr_id'];?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">View data</h4>
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
                   <p><?php echo $viewData['pr_title'];?></p>
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

  function yntfun()
  {
    var yntid = document.getElementById('ytnchange').value;
    
    if(yntid==2)
    {
      $('.ynthide').hide();
      $('#yntshow').css('display','block');
      $('.gmsthide').css('display','none');
    }
    else if(yntid==1)
    {
        $('.gmsthide').css('display','block');
        $('.ynthide').show();
        $('#yntshow').css('display','none'); 
    }
    else
    {
      $('.ynthide').show();
      $('#yntshow').css('display','none'); 
      $('.gmsthide').css('display','none');
    }
  }
  </script>