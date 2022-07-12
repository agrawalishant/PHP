<section id="features-app" class="inst-section">
        
        <!--Search container-->
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12" style="display:flex;">
                    <span class="title-h2"> Bookings</span>
                    <select class="form-control" id='src_postcode' name="src_postcode" style="width: 30%;margin-left: 25px;" onchange='srcpost();'>
                        <option value="0">Select PostCode</option>
                        <?php
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
        
            <!--container-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <h3 class="title-h2">OUR INSTRUCTOR</h3>
                    </div>
                </div>
                <div class="sr-line inst"></div>
            </div>
            <div id="showinstructors"></div>
            <div class="container" id='hideinstructors'>
                <div class="row">
                    <?php if(!empty($details)) { foreach($details as $value) { ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item instbtn">
                            <div class="shadow-effect table-plan">
                                <?php if(!empty($value['profile_photo'])) { ?>
                                <img src="<?php echo base_url('uploads/'.$value['profile_photo']); ?>" /> 
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
                                <h3><?php echo $value['name']; ?></h3>
                                <!--<p><span></span><sub> </sub></p>-->
                                <!--<p class="test-border"><?php //$cat=$value['category']; if($cat==2) { ?>Automatic Car Instructor ! <?php //}elseif($cat==1){ ?>Manual Car Instructor !<?php //} else { ?>Both Car Instructor !<?php //} ?><span>4.8 rating </span> ! Highly Recommended</p>-->
                                <!--<div class="price-content-btn ">-->
                                <!--    <?php //echo anchor('Student/open_classes/'.encoding($value['id']).'/'.encoding($cat),'Book A Class',['class'=>'btn btn-green']); ?>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>    
                    <?php  } } else { ?>
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
        </section>
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