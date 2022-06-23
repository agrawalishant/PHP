    <!-- hs Navigation End -->

    <!-- hs About Title Start -->

    <div class="hs_indx_title_main_wrapper">

        <div class="hs_title_img_overlay"></div>

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_left_wrapper">

                        <h1 style="font-size: 20px;color: #ffffff;text-transform: uppercase;">Our Products</h1>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_right_wrapper">

                        <ul>

                            <li><a href="<?php echo base_url('front_page');?>">Home</a> &nbsp;&nbsp;&nbsp;> </li>

                            <li>Our Products</li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- hs About Title End -->

    <!-- hs sidebar Start -->

    <div class="hs_blog_categories_main_wrapper">

        <div class="container">

            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">

                    <div class="hs_blog_right_sidebar_main_wrapper">

                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="hs_blog_right_search_wrapper">

                                    <input type="text" placeholder="Products Search.." name="" id="searchproduct" />

                                    <button type="button" id="src_btn"><i class="fa fa-search"></i></button>

                                </div>

                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="hs_blog_right_cate_list_heading_wrapper">

                                    <h2>TOP CATEGORIES</h2>

                                </div>

                                <div class="hs_blog_right_cate_list_cont_wrapper">

                                    <ul>
                                         <?php //print_r($cat_product); ?>   
                                       	<li <?php if(empty($categoryids)) { ?> class="active" <?php } ?>><a href="<?php echo site_url('');?>product/all">All</a></li>
									   <?php if(count($cat_product)>0) { $i=0;
										foreach($cat_product as $row)
										{ $i++;
										?>

                                       <!-- <li ><a data-toggle="pill" href="#as-profilemenu-0<?php echo $i;?>"><?php echo $row['cat_astr_title'];?></a></li>-->
									   <li <?php if(@$categoryids==$row['cat_pro_id']) { ?> class="active" <?php } ?> ><a  href="<?php echo site_url('');?>product/<?php echo $row['cat_pro_id']; ?>"><?php echo $row['cat_pro_title'];?></a></li>
									 

									<?php }} ?>


                                    </ul>

                                </div>

                            </div>

                            

                        </div>

                    </div>

                </div>

                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

                    <div class="hs_blog_left_sidebar_main_wrapper">

                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="hs_shop_tabs_sec_wrapper">

                                    <ul class="nav nav-pills">
                                       <li class="active"><a data-toggle="pill" href="#home">Products</a></li>
                                    </ul>

                                </div>

                            </div>
                            <div class="show_product"></div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide_product">

                                <div class="hs_shop_tabs_cont_sec_wrapper">

                                    <div class="tab-content">

                                        <div id="home" class="tab-pane fade in active">

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                                                </div>
                                                <?php if(count($product)>0) { $i=0;
                                                    foreach($product as $rows)
                                                { $i++;
                                                    ?>
<!-- product start -->
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
												

                                                    <div class="hs_shop_prodt_main_box hs-shope-page-clr">

                                                        <div class="hs_shop_prodt_img_wrapper">

                                                            <img src="<?php echo base_url();?>image/product/<?php echo $rows['pr_image'];?>" alt="shop_product">

                                                            <!-- <a href="<?php echo site_url('');?>add_to_card/<?php echo $rows['pr_id'];?>">Add to Cart</a> -->
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
                                                        </div>

                                                        <div class="hs_shop_prodt_img_cont_wrapper">

                                                            <h2><a href="#"><?php echo $rows['pr_title'];?></a></h2>
                                                          <?php if($rows['pr_category']==2)
                                                          {?>
                                                            <h3><?php echo $ee = substr($rows['pr_pricedetail'], 0, 30);//echo $rows['pr_pricedetail'];?></h3>

                                                         <?php }else{
                                                              ?>
                                                              <h3>₹<?php echo $rows['pr_finalprice'];?> &nbsp;<del>₹<?php echo $rows['pr_originalprice'];?> </del>&nbsp; <span><?php echo $rows['pr_discount'];?> % Disc</span></h3>

                                                       <?php   }
                                                              ?>
                                                            <!-- <h3>₹<?php echo $rows['pr_finalprice'];?> &nbsp;<del>₹<?php echo $rows['pr_originalprice'];?> </del>&nbsp; <span><?php echo $rows['pr_discount'];?> % Disc</span></h3> -->

                                                            <!-- <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star"></i>

                                                            <i class="fa fa-star-o"></i>

                                                            <i class="fa fa-star-o"></i> -->

                                                            <!-- <h4>Offers <span>Special Price</span></h4> -->
                                                            <div class="hs-productdetailsBtn">
                                                                <!-- <a href="<?php echo base_url();?>productdetails/<?php echo encoding($rows['pr_id']);?>">View Details</a> -->
                                                                <a href="<?php echo base_url();?>productdetails/<?php echo $rows['pr_url_title'];?>">View Details</a>
                                                           
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <?php if($i%3==0) { ?>
                                                <div class="clearfix"></div> <?php } 
                                                  ?>  	
	                                           <?php }} ?>
<!--product end  -->
                                               

                                             

                                                <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 visible-lg visible-md">-->
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                    <div class="pager_wrapper">

                                                        <ul class="pagination">
                                                           <?php echo $pagelinks ?>
                                                            

                                                        </ul>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div id="menu1" class="tab-pane fade">

                                            <div class="row">

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                    <div class="hs_kd_first_sec_wrapper">

                                                        <h2>390+ Produts Search</h2>

                                                        <h4><span></span></h4>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                

            </div>

        </div>

    </div>