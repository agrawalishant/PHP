<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $page_title; ?>  <!--  <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modaladd"><i class="fas fa-plus"></i> Add horoscope</button> -->
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
                <h3 class="card-title">Prediction</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
               <tr>
                    <th>S.NO</th>
                    
                    <th>IMAGE</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>ACTION</th>
                  </tr>
				  
                  </thead>
                  <tbody>
                  <?php
                  $sno=0;

                foreach($datadisplay as $Pd):
                $sno++;
                 ?>
                  <tr>
                    <td><?php echo $sno;?></td>
                  
                   <!-- <td><?php //echo $a = word_limiter(strip_tags($Pd['name']), 20);?></td> -->
                   <!-- <td><img style="width: 10%;" src="<?php echo base_url();?>/image/horoscopeyearly/<?php echo $Pd['pm_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" /></td> -->
                   <td class="tb-img-sect"><img class="img-responsive" src="<?php echo base_url();?>/image/prediction/<?php echo $Pd['pm_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                   </td>
                   <td><?php echo $a = word_limiter(strip_tags($Pd['pm_title']), 5);?></td>
                   <td><?php echo $aD = word_limiter(strip_tags($Pd['pm_description']), 5);?></td>
                     <td>
                        
                        <a  href="" data-toggle="modal" data-target="#modelview<?php echo $Pd['pm_id'];?>" data-id="<?php echo $Pd['pm_id'];?>" >  <i class="fas fa-eye"></i></a>
                      
                        <a  href="" data-toggle="modal" data-target="#model<?php echo $Pd['pm_id'];?>" data-id="<?php echo $Pd['pm_id'];?>" >  <i class="fas fa-edit"></i></a>
                      
                     </td>

                    </tr>
                    <?php endforeach;?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>S.NO</th>
                  <th>IMAGE</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
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
                <h4 class="modal-title" id="myModalLabel">Add horoscope</h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'add_horoscope'); ?>

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
<div class="modal fade" id="model<?php echo $iddata=$viewData['pm_id'];?>" role="dialog">
    <div class="modal-dialog edit-hor-modal">

        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit Prediction Matter</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <?php echo form_open_multipart(base_url().'updatepredictiondataentry/update/'.$iddata); ?>
               
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="pm_title" name="pm_title" placeholder="name" value="<?php echo $viewData['pm_title'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName"> Description</label>
                        <textarea id="profession" name="pm_description" class="form-control" rows="2"><?php echo $viewData['pm_description'];?></textarea>
                     </div>
                    <!-- <div class="form-group">
                        <label for="inputName"> Profession</label>
                        <textarea id="profession" name="profession" class="form-control" rows="2"><?php echo $viewData['profession'];?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="inputName"> luck</label>
                        <textarea id="luck" name="luck" class="form-control" rows="2"><?php echo $viewData['luck'];?></textarea>
                     </div> -->
                     <!-- <div class="form-group">
                        <label for="inputName"> emotion</label>
                        <textarea id="emotion" name="emotion" class="form-control" rows="2"><?php echo $viewData['emotion'];?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="inputName"> health</label>
                        <textarea id="health" name="health" class="form-control" rows="2"><?php echo $viewData['health'];?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="inputName"> love</label>
                        <textarea id="love" name="love" class="form-control" rows="2"><?php echo $viewData['love'];?></textarea>
                     </div>
                     <div class="form-group">
                        <label for="inputName"> travel</label>
                        <textarea id="travel" name="travel" class="form-control" rows="2"><?php echo $viewData['travel'];?></textarea>
                     </div>
                    <div class="form-group">
                        <label for="inputName">lucky_colour</label>
                        <input type="text" class="form-control" id="lucky_colour" name="lucky_colour" placeholder="Enter Lucky Colour" value="<?php echo $viewData['lucky_colour'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Lucky_number</label>
                        <input type="text" class="form-control" id="lucky_number" name="lucky_number" placeholder="Enter Lucky number" value="<?php echo $viewData['lucky_number'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Lucky flower</label>
                        <input type="text" class="form-control" id="lucky_flower" name="lucky_flower" placeholder="Enter Lucky flower" value="<?php echo $viewData['lucky_flower'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Year of birth</label>
                        <input type="text" class="form-control" id="yearofbirth" name="yearofbirth" placeholder="Enter yearofbirth" value="<?php echo $viewData['yearofbirth'];?>"/>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Date Range</label>
                        <input type="text" class="form-control" id="daterange" name="daterange" placeholder="Enter Date Range" value="<?php echo $viewData['daterange'];?>"/>
                    </div>-->
                    <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    </div> 
                    <div class="form-group">
                        <label for="inputEmail">OLD IMAGE</label>
                        <img style="width: 10%;" src="<?php echo base_url();?>/image/prediction/<?php echo $viewData['pm_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                   </td>
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
<div class="modal fade" id="modelview<?php echo $iddata=$viewData['pm_id'];?>" role="dialog">
    <div class="modal-dialog edit-hor-modal">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">View Matter</h4>
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
                       <p><?php echo $viewData['pm_title'];?></p>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Description</label>
                       <p><?php echo $viewData['pm_description'];?></p>
                    </div>
                   
                    
                    
                    <!-- <div class="form-group">
                        <label for="inputEmail">Image upload</label>
                        <input type="file" name="userfile" value="upload" class="control" size="60" id="fUpload" onchange="checkextension()">
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="inputEmail">IMAGE</label>
                        <img style="width: 10%;" src="<?php echo base_url();?>/image/horoscope/<?php echo $viewData['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
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