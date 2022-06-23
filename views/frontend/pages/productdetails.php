    <?php $pd_id;?>
    <!-- hs Navigation End -->

    <!-- hs About Title Start -->

    <div class="hs_indx_title_main_wrapper">

        <div class="hs_title_img_overlay"></div>

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_left_wrapper">

                        <h2>Product Details</h2>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_right_wrapper">

                        <ul>

                            <li><a href="index.php">Home</a> &nbsp;&nbsp;&nbsp;> </li>

                            <li>Product Details</li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- hs About Title End -->

    <!-- hs sidebar Start -->

    <div class="hs_kd_sidebar_main_wrapper hs_num_sidebar_main_wrapper">
    <?php
    
    //$prd_details=fetchby_wheres('product',array('pr_id' => $pd_id));
    $prd_details=$this->db->select('*')->from('product')->where("pr_url_title LIKE '%$pd_id%'")->get()->result_array();
if(empty($prd_details))
     {
         redirect(base_url().'front_page','refresh');
     }

foreach($prd_details as $pdetil){
   $pd_id =  $pdetil['pr_id'];
?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 style="text-align: center;margin-top: 20px;"><?php echo $pdetil['pr_title'];?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12  col-xs-12">
                    <div class="hs_kd_left_sidebar_main_wrapper">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_ar_first_sec_wrapper">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <div class="hs_ar_first_sec_img_wrapper">
                                            <img src="<?php echo base_url();?>/image/product/<?php echo $pdetil['pr_image']; ?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="Missing Image" />
                                                <!-- <img src="images/content/shop/sp1.jpg" alt="arlies_img" /> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                            <div class="hs_ar_first_sec_img_cont_wrapper">
                                                <p><?php echo $pdetil['pr_description']; ?></p>
                                              
                                                <div class="hs-detail-cartBtn hs_btn_hover">
                                                    <!-- <a href="<?php echo base_url('astro_controller/add_to_card/'); ?><?php echo $pdetil['pr_id']; ?>">Add to Cart</a> -->
                                                    <?php 
                                                    if($pdetil['pr_category']==1)
                                                    { ?>
                                                        <p>
                                                               <a href="<?php echo base_url();?>image/certificate/<?php if(!empty($pdetil['pr_image_certificate'])){echo $pdetil['pr_image_certificate'] ;}?>" target="_blank" >Sample Certificate </a></p>
                                                    <?php }
                                                    if($pdetil['pr_category']==2)
                                                          {?>
                                                      
                                                        
                                                        <?php echo $pdetil['pr_description']; ?></p>
                                                         <?php }else{
                                                              ?>
                                                              <!-- check in product_subproduct start -->
                                                              
                                                              <?php 
                                                              $pricef=fetchbyresult_where('product',$pdetil['pr_id'],'pr_id'); 
                                                              $prd_price_percarat=$pricef[0]['pr_finalprice'];
                                                              $subcarat = fetchbyresult_where('product_subproduct',$pdetil['pr_id'],'sp_product_id'); 
                                                              $subcteavailable = fetchbyresult_where_returnrow('product_subproduct',$pdetil['pr_id'],'sp_product_id');
                                                              
                                                              if($subcteavailable == 0){
                                                              ?>
                                                               <a href="<?php echo base_url('astro_controller/add_to_card/'); ?><?php echo $pdetil['pr_id']; ?>">Add to Cart</a>
                                                               <?php }
                                                               else{?>
                                                              <!-- carat list start -->

                                                              <div class="table-responsive"> 
                                                                <table class="table table-border">
                                                                    <thead>
                                                                    <tr>
                                                                        
                                                                        <th class="align_tbl">Weight/Carat</th>
                                                                        <th  class="align_tbl">Rate/Carat</th>
                                                                        <th class="align_tbl">Actual Price</th>
                                                                        <th class="align_tbl">Select</th>
                                                                        
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach($subcarat as $sub_carat){?>
                                                                    <tr>
                                                                       <td><?php echo $sc1= $sub_carat['sp_weight_carat'];?></td>
                                                                        <td><?php echo $prd_price_percarat;?></td>
                                                                        <td><?php echo $total=($sc1*$prd_price_percarat);?></td>
                                                                        </td>
                                                                        <td><input type="radio" name="name" id="radioBtn" value="<?php echo $sub_carat['sp_id'];?>"  /></td>
                                                                        <!-- onclick="displayRadioValue(<?php echo $sub_carat['sp_id'];?>)" -->
                                                                    </tr>
                                                                   <?php }?>
                                                                    </tbody>
                                                                </table>
                                                              </div>
                                                               <!-- carat list start -->
                                                                <input type="hidden" name="product_id" id="hidden_product_id" value="<?php echo $pdetil['pr_id']; ?>" >
                                                               <a href="#" onclick="displayRadioValue()">Add to Cart</a>
                                                              
                                                               <?php } ?>
                                                            <!-- check in product_subproduct end -->
                                                              <?php }?>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <?php } ?>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="hs_kd_five_heading_sec_wrapper">
                                                <h2>Talk to an astrologer</h2>
                                                <h4><span></span></h4>
                                            </div>
                                        </div>
                                        <?php 
$astroteam_fetch=fetchbyresultlimit('astrologers','4');
foreach($astroteam_fetch as $feastro)
{?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">



                    <div class="hs_astro_team_img_main_wrapper">



                        <div class="hs_astro_img_wrapper">



                            <img src="<?php echo base_url();?>image/astrologers/<?php echo $feastro['astro_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" alt="team-img">



                        </div>



                        <div class="hs_astro_img_cont_wrapper">



                            <h2><a href="#"><?php echo $feastro['astro_name'];?></a></h2>



                            <p>   <?php 
                    $a=cat_fetch_join('astrologers_multiplecategories','category_astrologer',$feastro['astro_id']);
                    
                    $ak = array();
                    foreach($a as $b)
                     {
                         $ak[] = $b['cat_astr_title'];
                     }
                    $ik = implode(',',$ak);
                    $len = strlen($ik);
                    if($len>20)
                    {
                     echo substr($ik,0,20)."...";
                    }
                    else
                    {
                     echo substr($ik,0,20);
                    }
                   
                    ;?></p>



                            <!-- <ul>



                                <li>Charges :</li>



                                <li>₹<?php echo $feastro['astro_calling_rate'];?> / Min.</li>



                            </ul> -->



                        </div>



                        <!-- <div class="hs_astro_img_bottom_cont">



                            <ul>



                                <li><a href="<?php echo base_url();?>astrotalk_profile/<?php echo $feastro['astro_id'];?> "><i class="fa fa-eye"></i>&nbsp; View Profile</a></li>



                                <li><a href="#"><i class="fa fa-phone"></i>&nbsp; Call Now</a></li>



                            </ul>



                        </div> -->



                    </div>



                </div>
                <?php }?>
                                        <!-- <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                            <div class="hs_astro_team_img_main_wrapper hs_kd_five_box_sec_wrapper">
                                                <div class="hs_astro_img_wrapper">
                                                   <img src="images/content/online3.jpg" alt="online_img" class="img-responsive">
                                                </div>
                                                <div class="hs_astro_img_cont_wrapper">
                                                    <h2><a href="astrologer_profile.php">Pranav</a></h2>
                                                    <p>Magic ball reader</p>
                                                    <ul>
                                                        <li>Charges :</li>
                                                        <li><i class="fa fa-inr" aria-hidden="true"></i> 10 <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</li>
                                                    </ul>
                                                </div>
                                                <div class="hs_astro_img_bottom_cont">

                                                    <ul>
                                                        <li><a href="astrologer_profile.php"><i class="fa fa-eye"></i>&nbsp; View Profile</a></li>

                                                        <li><a href="#"><i class="fa fa-phone"></i>&nbsp; Call Now</a></li>

                                                    </ul>

                                                </div>

                                            </div>

                                        </div> -->
                                       

                                        <div class="clearfix divider-01"></div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



        </div>



    </div>



    <!-- hs sidebar End -->









    <!-- hs footer wrapper Start -->


<input type="hidden" name="carat_id" id="carat_id" >
    <script> 
        function displayRadioValue() { 
            var prod_id = document.getElementById('hidden_product_id').value;
            var ele = document.getElementsByName('name'); 
            var carat_id = $("input[name='name']:checked").val();
          if(!$("input[name='name']:checked").val())
          {
              alert("PLZ SELECT PRODUCT");
              return false;
          }else{
           window.location.href = "<?php echo base_url();?>astro_controller/add_to_card_bycarat/" + carat_id +'/'+prod_id;
           
        } 
           
        } 
    </script> 