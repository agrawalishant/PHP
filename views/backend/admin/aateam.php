<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?>   <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> ADD ADMIN ASTRO TEAM</button>
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
                    <th>IMAGE</th>
                    <th>POST</th>
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
                    <td><?php echo $dtdisp['team_name'];?></td>
                   
                    <td class="tb-img-sect img-size-small"><img class="img-responsive" src="<?php echo base_url();?>/image/astroadminteam/<?php echo $dtdisp['team_image']; ?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                   </td>
                   <td><?php echo $dtdisp['team_post'];?></td>
                   <td><span class="badge badge-<?php if($dtdisp['team_approved_status']==0) {echo "danger";}else{echo "success";} ;?>"><?php if($dtdisp['team_approved_status']==0) {echo "InActive";}else{ echo "Active";} ;?></span></td>
 
                  <!-- <td>
                     <?php 
                 //   $a=cat_fetch_join('astrologers_multiplecategories','category_astrologer',$dtdisp['astro_id']);
                    // echo '<pre>';
                    // print_r($a);
                    // exit;
                 //  foreach($a as $b){
                 //echo  $b['cat_astr_title']; echo ',';
                 //  }
                   
                    //;?> 
                   </td>-->
                  <!-- <td><?php echo $dtdisp['astro_experience'];?></td> -->
                   <!-- <td><?php echo $dtdisp['astro_charges'];?></td> -->
                   <!-- <td><?php echo $dtdisp['astro_mobile'];?></td> -->
                   <!-- <td><span class="badge badge-<?php if($dtdisp['astro_verification_status']==0) {echo "danger";}else{echo "success";} ;?>"><?php if($dtdisp['astro_verification_status']==0) {echo "Not Verified";}else{ echo "Verified";} ;?></span></td>
  -->
                     
                       <td>
                        <!-- <a onclick="return confirm('Are you sure you want to Edit this item?');" href="<?php echo base_url();?>view/<?php echo $dtdisp['team_id'];?>" > <i class="fas fa-eye"></i></a> -->
                        <!-- <a  href="" data-toggle="modal" data-target="#modelview<?php echo $dtdisp['team_id'];?>" data-id="<?php echo $dtdisp['team_id'];?>" >  <i class="fas fa-eye"></i></a> -->
                     
                       <!-- for edit -->
                        <a  href="" data-toggle="modal" data-target="#model<?php echo $dtdisp['team_id'];?>" data-id="<?php echo $dtdisp['team_id'];?>" >  <i class="fas fa-edit"></i></a>
                       <!-- for delete -->
                        <a onclick="return confirm('Are you sure you want to Delete this item?');" href="<?php echo base_url();?>deleteaateam/delete/<?php echo $dtdisp['team_id'];?>/<?php echo $dtdisp['team_image'];?>" > <i class="fas fa-trash"></i></a>
                       
                        <?php if($dtdisp['team_approved_status']==0)
                             {?>
                              <a onclick="return confirm('Are you sure you want to Active this item?');" href="<?php echo base_url();?>active_aateam/active/<?php echo $dtdisp['team_id'];?>" style="color:green;" >Active</a>
                             <?php } else { ?>
                            
                            <a onclick="return confirm('Are you sure you want to Inactive this item?');" href="<?php echo base_url();?>deactive_aateam/inactive/<?php echo $dtdisp['team_id'];?>" style="color:red" >InActive</a>
                          
                             <?php } ?>
                    
                     </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.NO</th>
                   <th>NAME</th>
                    <th>IMAGE</th>
                    <th>POST</th>
                     <th>APP STATUS</th>
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
            <h4 class="modal-title" id="myModalLabel">ADD ADMIN ASTRO TEAM</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
              
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'add_aateam'); ?>
                    <div class="form-group">
                        <label for="inputName">NAME</label>
                        <input type="text" class="form-control" id="team_name" name="team_name" placeholder="Enter name"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">POST</label>
                        <input type="text" class="form-control" id="team_post" name="team_post" placeholder="Enter Post"/>
                    </div>
                    <!-- <div class="form-group">
                        <label for="inputName">LANGUAGE</label>
                        <textarea id="astro_name" name="astro_language" class="form-control" rows="2" placeholder="Enter Language"></textarea>
                   </div> -->
                 
              <!-- <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select2" style="width: 100%;" name="astro_category">
                  <option >Select Category</option>
                    <?php foreach($categ as $dep){?>
                     <option value="<?php echo $dep['cat_astr_id'];?>"><?php echo $dep['cat_astr_title'];?></option>
                   <?php } ?>
                  </select>
                </div> -->
                
                <!-- <div class="form-group">
                <label>Categories</label>
               
                <?php foreach($categ as $dep){?>
                          <input  type="checkbox" name="astrologer_cat_id[]" id="<?php echo $dep['cat_astr_id'];?>" value="<?php echo $dep['cat_astr_id'];?>" >
                         -- <label for="customCheckbox2"><?php echo $dep['cat_astr_title'];?></label>--
                          <?php } ?>
                </div> -->
              


               <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    </div>
                    <!-- <div class="form-group">
                        <label for="inputName">Experience</label>
                        <input type="text" class="form-control" id="astro_experience" name="astro_experience" placeholder="Enter Experience"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Calling_rate</label>
                        <input type="text" class="form-control" id="astro_calling_rate" name="astro_calling_rate" placeholder="Enter Calling rate"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Chat_rate</label>
                        <input type="text" class="form-control" id="astro_chat_rate" name="astro_chat_rate" placeholder="Enter chat rate"/>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="inputName">Ask Report</label>
                        <input type="text" class="form-control" id="astro_askreport_rate" name="astro_askreport_rate" placeholder="Enter Ask report"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Mobile</label>
                        <input type="text" class="form-control" id="astro_mobile" name="astro_mobile" placeholder="Enter mobile"/>
                    </div> -->
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
<div class="modal fade" id="model<?php echo $iddata=$viewData['team_id'];?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Admin Astro Team</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'updateaateam/update/'.$iddata); ?>
               
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="team_name" name="team_name" placeholder="team_name" value="<?php echo $viewData['team_name'];?>"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputName">Post</label>
                        <input type="text" class="form-control" id="team_post" name="team_post" placeholder="team_post" value="<?php echo $viewData['team_post'];?>"/>
                    </div>
                    
                    <!-- <div class="form-group">
                        <label for="inputName"> Description</label>
                        <textarea id="answer" name="pr_description" class="form-control" rows="2"><?php echo $viewData['pr_description'];?></textarea>
                     </div> -->
                      <!-- <div class="form-group">
                        <label for="inputName">Category</label>
                        <select class="form-control select2" style="width: 100%;" name="astro_category">
                  <option >Select Category</option>
                    <?php foreach($categ as $dep){?>
                     <option value="<?php echo $dep['cat_astr_id'];?>"<?php if($dep['cat_astr_id'] == $viewData['astro_category']) echo 'selected="selected"';?>><?php echo $dep['cat_astr_title'];?></option>
                    
                  <?php } ?>
                  </select>
                    </div> -->

                    <!-- <div class="form-group">
                    <label for="inputName">Categories</label>
                  <?php foreach($categ as $dep){
                    //  //$table="",$id="",$dbid="" using helper
                     $sec_tbl= fetchbyresult_where('astrologers_multiplecategories',$viewData['astro_id'],'astrologer_id_m');
                   
                      ?>
                   
                    <input   <?php foreach($sec_tbl as $tbl) { if($tbl['astrologer_cat_id']==$dep['cat_astr_id']) { ?> checked <?php } } ?> 
                    type="checkbox" name="astrologer_cat_id[]" id="<?php echo $dep['cat_astr_id'];?>" value="<?php echo $dep['cat_astr_id'];?>" >
                         -- <label for="customCheckbox2"><?php echo $dep['cat_astr_title'];?></label>--
                         <?php } ?>
                    </div> -->
                    <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">OLD IMAGE</label>
                        <img style="width: 10%;" src="<?php echo base_url();?>/image/astroadminteam/<?php echo $viewData['team_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
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
<div class="modal fade" id="modelview<?php echo $iddata=$viewData['team_id'];?>" role="dialog">
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