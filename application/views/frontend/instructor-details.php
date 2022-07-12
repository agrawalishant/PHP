  <?php //include 'header.php'; ?>
  <style>
      
     
     
      .n-hight {
              justify-content: center;
                  height: 300px;
      }
      
      @media (min-width:768px){
          .inst-section {
                padding-top:40px; 
          }
      }
      @media(max-width:576px){
          
      }
     
      }
  </style>
  <div class="warpper clearfix">
    
        <section id="home">
            <div class="container-page">
                <!--container-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xs-12" style="margin-top:100px;display:flex;">
                            <span class="title-h2"> Bookings</span>
                            <select class="form-control" id='src_postcode' name="src_postcode" style="width: 30%;margin-left: 25px;" onchange='srcpost();'>
                                <option value="0">Select PostCode</option>
                                <?php
                                    $postcode = $this->Generalmodel->get_all_whereGroupBy('instructor_postcode',array(1 => 1),'postcode');
                                    if(!empty($postcode)){
                                        foreach($postcode as $res){ ?>
                                            <option value="<?php echo $res['postcode']; ?>"><?php echo $res['postcode']; ?></option>            
                                    <?php    }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>    
            </div>
        </section>    
                    <!--<div class="row n-hight ins-from-pd">-->
                        
             
                    
                    
                     <!--<form class="form-inline n-form" action="/action_page.php"> -->
                <?php //echo form_open('Filter',['class'=>'form-inline n-form ', 'style'=>'display:none']);?>    
                    <!--<div class="form-group ">-->
                    <!--    <img src="<?php echo base_url();?>assets/images/location-map.png" class="form-width fm-icon" alt="">    -->
                    <!--    <input type="text" placeholder="Postcode" name="postcode" value="<?php echo set_value('postcode'); ?>" class="form-control bd0">-->
                    <!--</div>-->
                    <!--<div class="form-group ">-->
                        <!--<img src="<?php echo base_url();?>assets/images/location.png" class="form-width" alt="">       -->
                    <!--    <i class="fa fa-car fm-icon" aria-hidden="true"></i>-->
                    <!--    <select name="cars" id="cars" class="form-control bd0" value="<?php echo set_value('cars');?>">-->
                    <!--        <option value="volvo">Vehicle Type</option>-->
                    <!--        <option value="Manual">Manual</option>-->
                    <!--        <option value="Automated">Automated</option>-->
                    <!--    </select>-->
                    <!--</div>-->
                    <!--<div class="form-group ">-->
                    <!--    <i class="fa fa-calendar-check-o fm-icon" aria-hidden="true"></i>-->
                        <!--<input type="date" class="form-control bd0" value="<?php //echo set_value('sr_date');?>" name="sr_date" min="<?php //echo date('Y-m-d'); ?>">-->
                    <!--    <input type="text" name="sr_date" class="form-control bd0" value="<?php echo set_value('sr_date');?>" placeholder="Select Date" id="datepicker" >-->
                    <!--</div>-->
                    <?php //echo form_submit('submit','Search',['class'=>'btn btn-blue']);?>
                <!--</form>-->
                    <!--</div>-->
                <!--</div>-->
                <!--container-->
        <!--    </div>-->
        <!--</section>-->
        <!--Features app-->

        <section id="features-app" class="inst-section">
        
            <!--container-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="insHeading">
                            <h3 class="title-h2">OUR INSTRUCTOR</h3>
                        </div>
                    </div>
                </div>
                <div class="sr-line inst"></div>
                <?php if($this->session->flashdata('nodatas')!="Data Found") { ?>
                    <div class="alert alert-danger">
                      <?php echo $this->session->flashdata('nodatas'); ?>
                    </div>
                <?php } ?>
            </div>
            <div id="showinstructors"></div>
            <div class="container" id='hideinstructors'>
                <div class="row">
                    <?php if(!empty($details)) { foreach($details as $value) { ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item instbtn">
                            <div class="shadow-effect table-plan">
                                <?php if(!empty($value->instructor_profile_photo)) { ?>
                                <img src="<?php echo base_url('uploads/'.$value->instructor_profile_photo); ?>" /> 
                                <?php }else{ ?>
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
                                <h3><?php echo $value->instructor_name; ?></h3>
                                <!--<p><span>-->
                                <?php 
                                // $cat=$value->instructor_category;
                                // $a = 'instructor_'.$a_day; 
                                // $m = 'instructor_'.$m_day; 
                                // $a_charges = $value->$a ; 
                                // if($cat==2 || $cat==3){
                                // if(!empty($a_charges))
                                // { 
                                //   echo "Automated Charges: <i class='fa fa-gbp'></i>".$a_charges."/per hr";
                                // }}
                                // if($cat==1 || $cat==3){
                                // $m_charges = $value->$m;
                                // if(!empty($m_charges)) 
                                // {
                                //   echo "<br>"."Manual Charges: <i class='fa fa-gbp'></i>".$m_charges."/per hr";
                                // } }
                                ?>
                                    
                                <!--</span><sub> </sub></p>-->
                                <!--<p class="test-border"><?php //$cat=$value->instructor_category; if($cat==2) { ?>Automatic Car Instructor ! <?php //}elseif($cat==1){ ?>Manual Car Instructor !<?php //} else { ?>Both Car Instructor !<?php //} ?><span>4.8 rating </span> ! Highly Recommended</p>-->
                                <!--<div class="price-content-btn ">-->
                                <!--    <?php //$calender_date =  set_value('sr_date');?>-->
                                <!--    <?php //echo anchor('instructor/book_classes/'.encoding($value->instructor_id)."/".encoding($dais)."/".encoding($cat)."/".encoding($calender_date),'Book A Class',['class'=>'btn btn-green']); ?>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>    
                    <?php  } } ?>
                </div>
                <p><?php //echo $links; ?></p>
            </div>
        </section>
        <!--contact-->
        <?php //include 'footer.php'; ?>

    </div>
<script>
        function srcpost()
        {
            var postcode = document.getElementById('src_postcode').value;
            $.ajax({
                        url:'<?=base_url()?>Driving/searchpostcode',
                        method: 'post',
                        data: {postcode: postcode},
                        dataType: 'json',
                        success: function(response)
                        {
                       // console.log(response);
                            if(response.success == 'true')
                            {
                                $('#hideinstructors').hide();
                                $('#showinstructors').html(response.msg);
                            }
                        }
                   });
        }
    </script>    