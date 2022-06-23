
<?php  $sl_id;

//$blogdetails=fetchbyresult_where('blog',$sl_id,'blog_id');
$blogdetails=$this->db->select('*')->from('blog')->where("blogseo_url LIKE '%$sl_id%'")->get()->result_array();
if(empty($blogdetails))
     {
         redirect(base_url().'front_page','refresh');
     }

foreach($blogdetails as $fblogdetail){
    $sl_id=$fblogdetail['blog_id'];
?>
<div class="hs_indx_title_main_wrapper">

       <div class="hs_title_img_overlay"></div>

       <div class="container">

           <div class="row">

               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                   <div class="hs_indx_title_left_wrapper">

                   <h2><?php echo $page_title;?></h2>

                   </div>

               </div>

               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                   <div class="hs_indx_title_right_wrapper">

                       <ul>

                           <li><a href="#">Home</a> &nbsp;&nbsp;&nbsp;> </li>

                           <li><?php echo $page_title;?></li>

                       </ul>

                   </div>

               </div>

           </div>

       </div>

   </div>


  <div class="divider-01 clearfix"></div>
<div class="container">
   <div class="row">
       <div class="col-md-8">
           <div class="astrology_blog_img">
           <img src="<?php echo base_url();?>image/blog/<?php echo $fblogdetail['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';"  alt="blog_img">
			
           </div>
           <div class="astro_blog_contain">
               <!-- <strong>Astrology, Horoscope</strong><br><br> -->
               <h3><?php echo $fblogdetail['title'];?></h3><br>
               <p><?php echo $fblogdetail['long_description'];?></p><br><br>
               <div class="astro_blog_a">
                   

               </div>
           </div>  
           <div class="hs-astro-blog-coment">
               <div class="row">
                   <div class="col-sm-12"> 
                       <div class="hs_kd_first_sec_wrapper hs_ar_third_sec_heading_wrapper">
                           <h2>Comments</h2>
                           <h4><span></span></h4>
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-sm-12">
                          
                          <!-- comment -->
                          <?php $fetchcomment=fetchbyresult_where_status('blogcomment',$sl_id,'comment_blog_id','comment_status','1');
                          foreach($fetchcomment as $fcomm){
                          ?>
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="hs_rs_comment_main_wrapper">
                                   <div class="hs_rs_comment_img_wrapper">
                                       <img src="<?php echo base_url();?>image/defaultuser.png" alt="comment_img" style="width:100%;">
                                   </div>
                                   <div class="hs_rs_comment_img_cont_wrapper hs_rs_blog_single_comment_img_cont_wrapper">
                                       <h2><?php echo $fcomm['comment_name'];?><span><?php  $comdate = $fcomm['comment_timestamp'];
                                       echo $CommentDate = date("M-d-Y ", strtotime($comdate));
                                       ?></span> 
                                       <!-- <a href="#"> - Reply</a> -->
                                       </h2>
                                       <p>The actor, director and producer, son to well-known stunt choreographer of Bollywood, rried to one of the most vivacious, bubbly, live-wire actress, is none other than our dashing Ajay Devgan, originally named Vishal
                                           Devgan !</p>
                                   </div>
                               </div>
                           </div>
                           <?php } ?>
                           <!-- comment -->
                   </div>
               </div>
           </div>
           <div class="astro_blog_form divider-01">
       <div class="row">
         <div class="col-sm-12">
           <h3>Leave a Comments</h3>
         </div>
       </div>
               <div class="row">
<div class="col-md-12">
 <!-- <form action="/action_page.php" class="row"> -->
 <?php echo form_open(base_url().'comment_submit/'.$sl_id );  ?>
   <div class="form-group blog-leave-comment">
       <div class="col-md-4">
     <label for="Name">Name</label>
     <input type="Name" class="form-control" id="comment_name" name="comment_name"placeholder="Enter Name" onfocus="this.placeholder=''" onblur="this.placeholder='Enter Name'" required>
     </div>
     <div class="col-md-4">
   <label for="email">Email:</label>
   <input type="email" class="form-control" id="email" name="comment_email" placeholder="Enter email"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter Email'" required>
     </div>
     <div class="col-md-4">
     <label for="mobile">Mobile:</label>
     <input type="Mobilr" class="form-control" id="mob" name="comment_mobile" placeholder="Enter Number"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter Number'"required>
   </div>
   </div>
     <div class="col-md-12">
    <div class="form-group">
     <label for="comment">Comment:</label>
     <textarea class="form-control" rows="5" id="comment" name="comment_comment" required></textarea>
   </div>
   </div>
  <div class="col-md-12">

                   <div class="hs-astro-enquiry-ctbtn">

                       <input type="submit" name="submit" class="form-control" value="SUBMIT">

                   </div>

               </div>
               <?php echo form_close(); ?> 
</div>
</div>
           </div>

       </div>
       
   <div class=" col-md-4 col-sm-12 col-xs-12">
                   <div class="hs_blog_right_sidebar_main_wrapper">
                       <div class="row">
                          <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="hs_blog_right_search_wrapper">
                                   <input type="text" placeholder="Search">
                                   <button type="submit"><i class="fa fa-search"></i></button>
                               </div> 
                           </div>-->
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="hs_blog_right_cate_list_heading_wrapper">
                                   <h2>Recent Post</h2>
                               </div>
                               <!-- recent blog -->
<?php  $recentpost=fetchbyresultlimitorder('blog','5','blog_id','desc');
foreach($recentpost as $frpost){
?>
<div class="hs_blog_right_recnt_cont_wrapper">
                                   <div class="hs_footer_ln_img_wrapper">
                                   <a href="<?php echo base_url();?>blogs/<?php echo $frpost['blogseo_url'];?>"><img src="<?php echo base_url();?>image/blog/<?php echo $frpost['image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';"  class="img-responsive" alt="ln_img">
			
                                      
                                   </div>
                                   <div class="hs_footer_ln_cont_wrapper">
                                       <h4><a href="<?php echo base_url();?>blogs/<?php echo $frpost['blogseo_url'];?>"><?php echo $frpost['title'];?></a></h4>
                                       
                                       <p><?php  $originalDate = $frpost['timestamp'];
                                       echo $Date = date("d-M-Y", strtotime($originalDate));
                                       ?></p>
                                   </div>
                               </div>

                               <?php } ?>
                               <!-- recent blog -->
                               <!-- <div class="hs_blog_right_recnt_cont_wrapper">
                                   <div class="hs_footer_ln_img_wrapper">
                                       <img src="images/content/blog/b2.jpg" class="img-responsive" alt="ln_img">
                                   </div>
                                   <div class="hs_footer_ln_cont_wrapper">
                                       <h4>Astrolger Member in the life soltion.</h4>
                                       <p>12 May 2018</p>
                                   </div>
                               </div>
                               <div class="hs_blog_right_recnt_cont_wrapper">
                                   <div class="hs_footer_ln_img_wrapper">
                                       <img src="images/content/blog/b3.jpg" class="img-responsive" alt="ln_img">
                                   </div>
                                   <div class="hs_footer_ln_cont_wrapper">
                                       <h4>Astrolger Member in the life soltion.</h4>
                                       <p>12 May 2018</p>
                                   </div>
                               </div>
                               <div class="hs_blog_right_recnt_cont_wrapper">
                                   <div class="hs_footer_ln_img_wrapper">
                                       <img src="images/content/blog/b4.jpg" class="img-responsive" alt="ln_img">
                                   </div>
                                   <div class="hs_footer_ln_cont_wrapper">
                                       <h4>Astrolger Member in the life soltion.</h4>
                                       <p>12 May 2018</p>
                                   </div>
                               </div> -->
                           </div>
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               
                               <div class="hs_blog_right_cate_list_heading_wrapper">
                                  
                               </div>
                               <!-- advertisement -->
                               <?php
                                $fetchadvertise=random('advertisement','advt_id');
                               foreach($fetchadvertise as $fadvt){
                               ?>
                               <div class="hs_blog_right_cate_list_cont_wrapper">
                                   <img src="<?php echo base_url();?>image/advertisement/<?php echo  $fadvt['advt_image'];?>?nocache=<?php echo time(); ?>" onerror="this.src='<?php echo base_url();?>/image/default';" style="width: 100%;">
                               </div>
                               <?php } ?>
                               <!-- advertisement -->
                           </div>
                           
                       </div>
                   </div>
               </div>
   </div>
</div>
<div class="divider-01 clearfix"></div>
<style type="text/css" media="screen">

</style>
<?php } ?>