<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="hs_shop_tabs_cont_sec_wrapper">
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="row">
                    <?php 
                        $where = "pr_title LIKE '%".$title."%'";
                        $res = fetchby_wheres('product',$where);
                        //echo $this->db->last_query();exit;
                        if(!empty($res))
                        {   $i=0;
                            //print_r($res);
					        foreach($res as $rows)
					 	    { $i++; ?>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
								    <div class="hs_shop_prodt_main_box hs-shope-page-clr">
                                        <div class="hs_shop_prodt_img_wrapper">
                                            <img src="<?php echo base_url();?>image/product/<?php echo $rows['pr_image'];?>" alt="shop_product">
                                        
                                        
                                            <!-- <a href="<?php echo site_url('astro_controller/');?>add_to_card/<?php echo $rows['pr_id'];?>">Add to Cart</a> -->
                                       <!-- edit 04/03/2021 start-->
                                       <?php if($rows['pr_category']==2)
                                                          {?>
                                                           

                                                         <?php }else{
                                                              ?>
                                                              <!-- check in product_subproduct start -->
         
                                                              <?php  
                                                              $subcteavailable = fetchbyresult_where_returnrow('product_subproduct',$rows['pr_id'],'sp_product_id');
                                                              if($subcteavailable == 0){
                                                              ?>
                                                             <a href="<?php echo site_url('');?>add_to_card/<?php echo $rows['pr_id'];?>">Add to Cart</a>
                                                            <?php }?>
                                                            <!-- check in product_subproduct end -->
                                                            
                                                            <?php   }
                                                              ?>
                                       <!-- edit 04/03/2021 end -->
                                        </div>
                                        <div class="hs_shop_prodt_img_cont_wrapper">
                                            <h2><a href="javascript:void(0)"><?php echo $rows['pr_title'];?></a></h2>
                                           
                                            <!-- <h3>₹<?php echo $rows['pr_finalprice'];?> &nbsp;<del>₹<?php echo $rows['pr_originalprice'];?> </del>&nbsp; <span><?php echo $rows['pr_discount'];?> % Disc</span></h3> -->
 <!-- edit 04/03/2021 start-->
 <?php if($rows['pr_category']==2)
                                                          {?>
                                                            <h3><?php echo $ee = substr($rows['pr_pricedetail'], 0, 30);//echo $rows['pr_pricedetail'];?></h3>

                                                         <?php }else{
                                                              ?>
                                                              <h3>₹<?php echo $rows['pr_finalprice'];?> &nbsp;<del>₹<?php echo $rows['pr_originalprice'];?> </del>&nbsp; <span><?php echo $rows['pr_discount'];?> % Disc</span></h3>

                                                       <?php   }
                                                              ?>
<!-- edit 04/03/2021 end -->
                                            <!-- <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i> -->
                                            <!-- <h4>Offers <span>Special Price</span></h4> -->
                                             <!-- <h4>Offers <span>Special Price</span></h4> -->
                                             <div class="hs-productdetailsBtn">
                                                                <a href="<?php echo base_url();?>productdetails/<?php echo $rows['pr_url_title'];?>">View Details</a>
                                                            </div>
                                        </div>
                                    </div>
                                </div>
                           	<?php } ?>
                        <?php } else { echo "No Data Found"; } ?>
                </div>
            </div>                    
        </div>
    </div>
</div>    