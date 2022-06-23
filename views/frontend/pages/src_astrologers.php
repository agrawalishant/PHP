<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="hs_shop_tabs_cont_sec_wrapper">
    <div class="tab-content">
      <div id="astro-profilemenu" class="tab-pane fade in active">
        <div class="row">
          <?php 
              //echo $name;exit;
              $where = "astro_name LIKE '%".$name."%'";
              $res = fetchby_wheres('astrologers',$where);
              //echo $this->db->last_query();exit;
              if(!empty($res))
                { 
                //print_r($res);
                foreach($res as $rows)
                { ?>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">
                    <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">
                      <div class="hs_astro_img_wrapper">
                        <img src="<?php echo base_url();?>image/astrologers/<?php echo $rows['astro_image'];?>" alt="team-img">
                        <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                        </div>
                      </div>
                      <div class="hs_astro_img_cont_wrapper">
                        <h2><?php echo $rows['astro_name'];?></h2>
                        <p><?php echo $rows['astro_language'];?></p>
                        <p><?php  $a=cat_fetch_join('astrologers_multiplecategories','category_astrologer',$rows['astro_id']);
                           $c=0;
                           foreach($a as $b){ $c++;
                            echo $b['cat_astr_title'].",";
                          }
                        ?></p>
                        <p>Exp: <?php echo $rows['astro_experience'];?> Years</p>
                        <p><i class="fa fa-inr" aria-hidden="true"></i>  <?php echo $rows['astro_calling_rate'];?> <!--<del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> --> / Min.</p>
                      </div>
                      <div class="hs_astro_img_bottom_cont">
                        <ul>
                          <li><a href="<?php echo base_url('astrotalk_profile/'.$rows['astro_id']); ?>"><i class="fa fa-eye"></i>&nbsp; View Profile</a></li>
                          <li><a data-toggle="pill" href="#home"></a><a href="#"><i class="fa fa-phone"></i>&nbsp; Call Now</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                <?php } ?>      
            <?php } else { echo "No Data Found..."; } ?>    
        </div>
      </div>
    </div>
  </div>
</div>            

<script type="text/javascript">
  function checklgn()
  {
    var id = document.getElementById('sesids').value;
    //alert(id);
    if(id == 0)
    {
      if(confirm('Login With User'))
      {
        $('#myModal').modal('show');  
      }
      else
      {
        return false;
      }
    }
    else
    {
      $('#reportModal').modal('show');  
      // var randam = document.getElementById('randam').value;
      // var totalamt = document.getElementById('totalamt').value;
      // var item = document.getElementById('Items').value;
      // var item_id = document.getElementById('Items_id').value;
      
      // $.ajax({
      //   url: "<?php echo base_url('products/addTopayment'); ?>",
      //   type: "post",
      //   data: {rand:randam,amt:totalamt,itm:item,itm_id:item_id} ,
      //   success: function (response) {
      //   },
      // });
      // $("#myForm12").submit();
    } 
  }  
  </script>