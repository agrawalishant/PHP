<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?>  
             <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> ADD ASTROLOGER</button>
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
                    <th>NAME</th>
                    <th>RANK</th>
                    <th>IMAGE</th>
                    <th>CATEGORY</th>
                    <th>Mail</th> 
                    <th>Password</th> 
                    <th>EXPERIENCE</th>
                    <th>MOBILE</th>
                    <!-- <th>Email VERIFACTION</th> -->
                    <th>APP STATUS</th>
                    
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
                    <td><?php echo $dtdisp['astro_name'];?></td>
                   <td><?php echo $dtdisp['astro_ranking'];?></td>
                    <td class="tb-img-sect"><img class="img-responsive img-size-small" src="<?php echo base_url();?>/image/astrologers/<?php echo $dtdisp['astro_image']; ?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                   </td>
                   <td>
                    <?php 
                    $a=cat_fetch_join('astrologers_multiplecategories','category_astrologer',$dtdisp['astro_id']);
                    // echo '<pre>';
                    // print_r($a);
                    // exit;
                    $ak = array();
                   foreach($a as $b)
                   {
                      $ak[] = $b['cat_astr_title'];
                   }
                   echo  implode(',',$ak);   
                    ?>
                    

                   </td>
                   <td><?php echo $dtdisp['astro_email'];?></td> 
                    <td><?php echo $dtdisp['astro_pass'];?></td>
                  <td><?php echo $dtdisp['astro_experience'];?></td>
                   <td><?php echo $dtdisp['astro_mobile'];?></td>
                     <td><span class="badge badge-<?php if($dtdisp['astro_approved_status']==0) {echo "danger";}else{echo "success";} ;?>"><?php if($dtdisp['astro_approved_status']==0) {echo "Not Verified";}else{ echo "Verified";} ;?></span></td>
 
                       <td>
                        <!-- <a onclick="return confirm('Are you sure you want to Edit this item?');" href="<?php echo base_url();?>view/<?php echo $dtdisp['astro_id'];?>" > <i class="fas fa-eye"></i></a> -->
                        <!-- <a  href="" data-toggle="modal" data-target="#modelview<?php echo $dtdisp['astro_id'];?>" data-id="<?php echo $dtdisp['astro_id'];?>" >  <i class="fas fa-eye"></i></a> -->
                        <a  href="" data-toggle="modal" data-target="#model<?php echo $dtdisp['astro_id'];?>" data-id="<?php echo $dtdisp['astro_id'];?>" >  <i class="fas fa-edit tbl-edit"></i></a>
                        <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deleteastrologers/delete/<?php echo $dtdisp['astro_id'];?>" > <i class="fas fa-trash tbl-edit"></i></a>
                        <?php if($dtdisp['astro_approved_status']==0)
                             {?>
                              <a onclick="return confirm('Are you sure you want to Active this item?');" href="<?php echo base_url();?>active_astrologer/active/<?php echo $dtdisp['astro_id'];?>" style="color:green;" >Active</a>
                             <?php } else { ?>
                            
                            <a onclick="return confirm('Are you sure you want to Inactive this item?');" href="<?php echo base_url();?>deactive_astrologer/inactive/<?php echo $dtdisp['astro_id'];?>" style="color:red" >InActive</a>
                          
                             <?php } ?>
                    
                     </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.NO</th>
                    <th>NAME</th>
                    <th>RANK</th>
                    <th>IMAGE</th>
                    <th>CATEGORY</th>
                    <th>Mail</th> 
                    <th>Password</th> 
                    <th>EXPERIENCE</th>
                    <th>MOBILE</th>
                    <!-- <th>Email VERIFACTION</th> -->
                    <th>APP STATUS</th>
                    
                    <th>ACTION</th>
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
            <h4 class="modal-title" id="myModalLabel">ADD ASTROLOGER</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
              
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'add_astrologers'); ?>
                    <div class="form-group">
                        <label for="inputName">NAME</label>
                        <input type="text" class="form-control" id="astro_name" name="astro_name" placeholder="Enter name" required/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">LANGUAGE</label>
                        <input type="text" class="form-control" id="astro_language" name="astro_language" placeholder="Enter language" required/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Description</label>
                        <textarea id="astro_description" name="astro_description" class="form-control ckeditor" rows="2" placeholder="Enter Description" required></textarea>
                   </div>
                 
              <!-- <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select2" style="width: 100%;" name="astro_category">
                  <option >Select Category</option>
                    <?php foreach($categ as $dep){?>
                     <option value="<?php echo $dep['cat_astr_id'];?>"><?php echo $dep['cat_astr_title'];?></option>
                   <?php } ?>
                  </select>
                </div> -->
                
                <div class="form-group">
                <label>Categories</label>
               
                <?php foreach($categ as $dep){?>
                          <input  type="checkbox" name="astrologer_cat_id[]" id="<?php echo $dep['cat_astr_id'];?>" value="<?php echo $dep['cat_astr_id'];?>" >
                         -- <label for="customCheckbox2"><?php echo $dep['cat_astr_title'];?></label>--
                          <?php } ?>
                </div>
              
             <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()" required>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Experience</label>
                        <input type="number" class="form-control" id="astro_experience" name="astro_experience" placeholder="Enter Experience" required/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Calling_rate</label>
                        <input type="number" class="form-control" id="astro_calling_rate" name="astro_calling_rate" placeholder="Enter Calling rate" required/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Chat_rate</label>
                        <input type="number" class="form-control" id="astro_chat_rate" name="astro_chat_rate" placeholder="Enter chat rate" required/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Ask Report</label>
                        <input type="number" class="form-control" id="astro_askreport_rate" name="astro_askreport_rate" placeholder="Enter Ask report" required />
                    </div>
                    <div class="form-group">
                        <label for="inputName">Mobile</label>
                        <input type="text" class="form-control" id="contact_mobilenumber" pattern="[1-9]{1}[0-9]{9}" maxlength="10" name="astro_mobile" placeholder="Enter mobile" required />
                    </div>
                    <div class="form-group">
                        <label for="inputName">Email</label>
                        <input type="email" class="form-control" id="astro_email" name="astro_email" placeholder="Enter Email" required />
                    </div>
                    <div class="form-group">
                        <label for="inputName">Password</label>
                        <input type="password" class="form-control" id="astro_password" name="astro_password" placeholder="Enter password" required/>
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
<div class="modal fade" id="model<?php echo $iddata=$viewData['astro_id'];?>" role="dialog">
    <div class="modal-dialog modelincrease">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Astrologer</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'updateastrologers/update/'.$iddata); ?>
               
                    <div class="form-group">
                        <label for="inputName">Title</label>
                        <input type="text" class="form-control" id="astro_name" name="astro_name" placeholder="astro_name" value="<?php echo $viewData['astro_name'];?>"/>
                    </div>
                     <div class="form-group">
                        <label for="inputName">Rank</label>
                        <input type="number" class="form-control" id="astro_ranking" name="astro_ranking" placeholder="rank" value="<?php echo $viewData['astro_ranking'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Language</label>
                        <input type="text" class="form-control" id="astro_language" name="astro_language" placeholder="astro_language" value="<?php echo $viewData['astro_language'];?>"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputName"> Description</label>
                        <textarea id="astro_description" name="astro_description" class="form-control ckeditor" rows="2"><?php echo $viewData['astro_description'];?></textarea>
                     </div>
                      <!-- <div class="form-group">
                        <label for="inputName">Category</label>
                        <select class="form-control select2" style="width: 100%;" name="astro_category">
                  <option >Select Category</option>
                    <?php foreach($categ as $dep){?>
                     <option value="<?php echo $dep['cat_astr_id'];?>"<?php if($dep['cat_astr_id'] == $viewData['astro_category']) echo 'selected="selected"';?>><?php echo $dep['cat_astr_title'];?></option>
                    
                  <?php } ?>
                  </select>
                    </div> -->

                    <div class="form-group">
                    <label for="inputName">Categories</label>
                  <?php foreach($categ as $dep){
                    //  //$table="",$id="",$dbid="" using helper
                     $sec_tbl= fetchbyresult_where('astrologers_multiplecategories',$viewData['astro_id'],'astrologer_id_m');
                   
                      ?>
                   
                    <input   <?php foreach($sec_tbl as $tbl) { if($tbl['astrologer_cat_id']==$dep['cat_astr_id']) { ?> checked <?php } } ?> 
                    type="checkbox" name="astrologer_cat_id[]" id="<?php echo $dep['cat_astr_id'];?>" value="<?php echo $dep['cat_astr_id'];?>" >
                         -- <label for="customCheckbox2"><?php echo $dep['cat_astr_title'];?></label>--
                         <?php } ?>
                    </div>


                    <div class="form-group">
                        <label for="inputName">Experience</label>
                        <input type="number" class="form-control" id="astro_experience" name="astro_experience" placeholder="astro_experience" value="<?php echo $viewData['astro_experience'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Calling Rate</label>
                        <input type="number" class="form-control" id="astro_calling_rate" name="astro_calling_rate" placeholder="astro_calling_rate" value="<?php echo $viewData['astro_calling_rate'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Chat rate</label>
                        <input type="number" class="form-control" id="astro_chat_rate" name="astro_chat_rate" placeholder="astro_chat_rate" value="<?php echo $viewData['astro_chat_rate'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Ask Report</label>
                        <input type="number" class="form-control" id="astro_askreport_rate" name="astro_askreport_rate" placeholder="astro_askreport_rate" value="<?php echo $viewData['astro_askreport_rate'];?>"/>
                    </div>

<!-- deduction -->
                    <div class="form-group">
                        <label for="inputName">Percentage Deduction Calling </label>
                        <input type="number" class="form-control" id="percentage_deduction_call" name="percentage_deduction_call" placeholder="percentage_deduction_call" value="<?php echo $viewData['percentage_deduction_call'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Percentage Deduction Chat </label>
                        <input type="number" class="form-control" id="percentage_deduction_chat" name="percentage_deduction_chat" placeholder="percentage_deduction_chat" value="<?php echo $viewData['percentage_deduction_chat'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Percentage Deduction Report</label>
                        <input type="number" class="form-control" id="percentage_deduction_report" name="percentage_deduction_report" placeholder="percentage_deduction_report" value="<?php echo $viewData['percentage_deduction_report'];?>"/>
                    </div>
<!-- deduction -->

<!-- discount -->
                    <div class="form-group">
                        <label for="inputName">Discount Calling<?php echo $viewData['astro_calling_rate_discount'];?> </label>
                        <input type="number" class="form-control" id="astro_calling_rate_discount" name="astro_calling_rate_discount" placeholder="astro_calling_rate_discount" value="<?php echo $viewData['astro_calling_rate_discount'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Discount Chat </label>
                        <input type="number" class="form-control" id="astro_chat_rate_discount" name="astro_chat_rate_discount" placeholder="astro_chat_rate_discount" value="<?php echo $viewData['astro_chat_rate_discount'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Discount Report</label>
                        <input type="number" class="form-control" id="astro_report_rate_discount" name="astro_report_rate_discount" placeholder="astro_report_rate_discount" value="<?php echo $viewData['astro_report_rate_discount'];?>"/>
                    </div>
<!-- discount -->
                    <div class="form-group">
                        <label for="inputName">Mobile</label>
                        <input type="text" class="form-control" id="contact_mobilenumber" pattern="[1-9]{1}[0-9]{9}" maxlength="10" name="astro_mobile" placeholder="astro_mobile" value="<?php echo $viewData['astro_mobile'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Email</label>
                        <input type="email" class="form-control" id="astro_email" name="astro_email" placeholder="astro_email" value="<?php echo $viewData['astro_email'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">OLD IMAGE</label>
                        <img style="width: 10%;" src="<?php echo base_url();?>/image/astrologers/<?php echo $viewData['astro_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
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
<div class="modal fade" id="modelview<?php echo $iddata=$viewData['astro_id'];?>" role="dialog">
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
  </script>