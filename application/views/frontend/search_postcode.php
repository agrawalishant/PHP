<div class="container">
    <div class="row">
        <?php if(!empty($res)) { 
            foreach($res as $values){
            $inst = $values['inst_id'];
            $price = $values['prices'];
            $postcode = $values['postcode'];
            //$data['details'] = $this->Generalmodel->get_data_limits('instructor_details',array('active_status'=> 1),'3',$page);
            $selectData = 'instructor_postcode.prices,instructor_details.name,instructor_details.profile_photo,instructor_details.category,instructor_details.id';
            $joincondiction = 'instructor_details.id = instructor_postcode.inst_id';
            $where = "instructor_postcode.inst_id = $inst AND `instructor_postcode`.`postcode` = '$postcode' AND instructor_details.active_status =1";
            $req = $this->Generalmodel->getJoinDataTwoTables($selectData,'instructor_details','instructor_postcode',$joincondiction,$where,'3',$page);
            //echo $this->db->last_query();exit;
            //echo "<pre>";print_r($value);exit;
            foreach($req as $value){ 
        ?>  
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="item instbtn">
                <div class="shadow-effect table-plan">
                <?php    if(!empty($value->profile_photo)) { ?>
                    <img src="<?php echo base_url('uploads/'.$value->profile_photo); ?>" /> 
                    <?php } else { ?>
                    <img src="<?php echo base_url();?>uploads/download.png" />
                    <?php } ?>
                    <!--<div class="price">-->
                        <!-- <button>Honda Civic</button> -->
                        <!--<span class="fa fa-star checked"></span> -->
                        <!--<span class="fa fa-star checked"></span> -->
                        <!--<span class="fa fa-star checked"></span> -->
                        <!--<span class="fa fa-star checked"></span>-->
                        <!--<span class="fa fa-star"></span>-->
                    <!--</div>-->
                    <h3><?php if(!empty($value->name)){echo $value->name;} ?></h3>
                    <h5>Charges:- <i class="fa fa-gbp" aria-hidden="true"></i><?php if(!empty($value->prices)){echo $value->prices;} ?> / hour</h5>
                    <p><span></span><sub> </sub></p>
                    <p class="test-border"><?php if(!empty($value->category)){$cat=$value->category;} if($cat==2) { ?>Automatic Car Instructor ! <?php }elseif($cat==1){ ?>Manual Car Instructor !<?php } else { ?>Both Car Instructor !<?php } ?> Highly Recommended</p>
                    <div class="price-content-btn ">
                        <?php if(!empty($value->id)){$id = $value->id;}echo anchor('Student/open_classes/'.encoding($id).'/'.encoding($cat).'/'.encoding($price).'/'.encoding($secrchCode),'Book A Class',['class'=>'btn btn-green']); ?>
                    </div>
                    <?php //} ?>
                </div>
            </div>
        </div>    
        <?php } } } else { ?>
        
        <?php //if($this->session->flashdata('nodatas')!="Data Found") { ?>
        <div class="alert alert-danger" style="margin-left: 475px;">
          <?php 
          $this->session->set_flashdata('nodatas1','No Data Found');
          echo $this->session->flashdata('nodatas1');
          ?>
        </div>
        <?php //} ?>
        <?php } ?>
    </div>
    <p><?php echo $links; ?></p>
</div>