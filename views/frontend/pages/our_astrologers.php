<?php 
$wal_amt = 0;
if(!empty($userss_id = $this->session->userdata('user_id'))){
     $userss_id = $this->session->userdata('user_id');
    $wal = fetchbyresultByCondiction('wallet',array('user_id'=>$userss_id));
    $wal_amt =  $wal[0]['wallet_amt'];
    
}
   ?>
 
 <input type="hidden" name="wallet_balance" id="wallet_balance" value=<?php echo $wal_amt;?> >
 <input type="hidden" name="hiddenuser_id" id="hiddenuser_id" value=<?php echo $userss_id;?> >
    
    <!-- hs Navigation End -->
    <!-- hs About Title Start -->

    <div class="hs_indx_title_main_wrapper">

        <div class="hs_title_img_overlay"></div>

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_left_wrapper">

                        <h1 style="font-size: 20px;color: #ffffff;text-transform: uppercase;"><?php echo $page_title ;?></h1>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_right_wrapper">

                        <ul>

                            <li><a href="<?php echo base_url('front_page');?>">Home</a> &nbsp;&nbsp;&nbsp;> </li>

                            <li><?php echo $page_title ;?></li>

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
                                    <input type="text" placeholder="Search Astrologers.." name="astro" id="searchastro" >
                                    <button type="button" class="sub-btn"><i class="fa fa-search"></i></button>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                <div class="hs_blog_right_cate_list_heading_wrapper">

                                    <h4 style="color: #fff;">Astrologer's Categories</h4>

                                </div>

                                <div class="hs_blog_right_cate_list_cont_wrapper">

                                    <ul class="nav nav-pills hs-astro-user-tabs">
							<li <?php if(@$category) {} else { ?> class="active" <?php } ?>><a href="<?php echo site_url('');?>astrotalk/all">All</a></li>
									<?php if(count($cat_astro)>0) { $i=0;
										foreach($cat_astro as $row)
										{ $i++;
											?>

                                       <!-- <li ><a data-toggle="pill" href="#as-profilemenu-0<?php echo $i;?>"><?php echo $row['cat_astr_title'];?></a></li>-->
									   <li <?php if(@$category==$row['cat_astr_id']) { ?> class="active" <?php } ?> ><a  href="<?php echo site_url('');?>astrotalk/<?php echo encoding($row['cat_astr_id']); ?>"><?php echo $row['cat_astr_title'];?></a></li>
									 

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

                                      <li class="active">
                                          <a href="#">Our Astrologers</a>
                                      </li>
                                      
                                    </ul>

                                </div>
                                
                            </div>
                            <div class="show_astro"></div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide_astro">
                              <div class="hs_shop_tabs_cont_sec_wrapper">
                                <div class="tab-content">
                                  <div id="astro-profilemenu" class="tab-pane fade in active">
										                <div class="row">
                                      <?php if(count($astrologers)>0) 
                                        { $i=0;
                                				  foreach($astrologers as $rows)
                                						{ $i++;	?>
                                              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 hs-astro-card-pading">
												                        <div class="hs_astro_team_img_main_wrapper hs-astro-pro-card">
                                                  <div class="hs_astro_img_wrapper">
                                                      <div class="ast-img">
                                                      <img src="<?php echo base_url();?>image/astrologers/<?php echo $rows['astro_image'];?>" alt="team-img">
                                                 
                                                      </div>
                                                     <div class="hs_shop_prodt_img_cont_wrapper astro-star-raiting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                     </div>
                                                    </div>
                                                    <div class="hs_astro_img_cont_wrapper">
                                                      <h2><?php echo substr($rows['astro_name'],0,20);
                                                      ?></h2>
                                                      <p><?php //echo substr($rows['astro_language'],0,18)."...";
                                                      
                                                      $len = strlen($rows['astro_language']);
                                                       if($len>18)
                                                       {
                                                        echo substr($rows['astro_language'],0,18)."...";
                                                       }
                                                       else
                                                       {
                                                        echo substr($rows['astro_language'],0,18);
                                                       }

                                                      ?></p>
                                                      <p><?php $a=cat_fetch_join('astrologers_multiplecategories','category_astrologer',$rows['astro_id']);
                                                  					$c=0;
                                                            $ak = array();
                                                            foreach($a as $b){ $c++;
                                                              $ak[] =$b['cat_astr_title']; 
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
                                                           
                                                              ?></p>
                                                        <p>Exp: <?php echo $rows['astro_experience'];?> Years</p>
                                                        <!-- <p><i class="fa fa-inr" aria-hidden="true"></i>  <?php echo $rows['astro_calling_rate'];?> <del> <i class="fa fa-inr" aria-hidden="true"></i> 12 </del> / Min.</p> -->
                                                       <!--disc call start  -->
                                                                <p>  <?php
                                                                  $astrocallrate = $rows['astro_calling_rate'];
                                                                  $calldisc=$rows['astro_calling_rate_discount']; ?>
                                                                <input type="hidden" value='' id='sratecalval<?php echo $rows['astro_id'] ;?>' />
                                                                <div id='sratecal<?php echo $rows['astro_id'] ;?>'></div>
                                                                <div id='hratecal<?php echo $rows['astro_id'] ;?>'>
                                                                  <?php if($calldisc == 0 )
                                                                  {
                                                                  echo "RS :". $astrocallrate." / min "; 
                                                                  }else
                                                                  {
                                                                    $percentagecall = ($calldisc / 100) * $astrocallrate;
                                                                    $discpricecall=$astrocallrate-$percentagecall;
                                                                    
                                                                    echo"Rs &nbsp;".  $discpricecall ."&nbsp; &nbsp;<del> ".$astrocallrate."</del>&nbsp;&nbsp;" .$calldisc. " % Disc"  ;
                                                                    $astrocallrate=$discpricecall;
                                                                 ?>
                                                                  
                                                                  <?php } ?>
                                                                </div>
                                                                <span id='callCodeError<?php echo $rows['astro_id'] ;?>' style="display:none;color:red;">ok</span>
                                                                </p>
                                                  <!--  disc call end-->
                                                    </div>
                    <?php $se_id = $this->session->userdata('user_id'); $ik=0;?>
                    <input type="hidden" name="sesid" id="sesids" value="<?php if(!empty($se_id)) { echo $se_id; }else { echo $se_id = 0 ; } ?>" />
             
                                                    <div class="hs_astro_img_bottom_cont">
                                                      <ul>
                                                        <li><a href="<?php echo base_url('astrotalk_profile/'.$rows['astro_id']); ?>"><i class="fa fa-eye"></i>&nbsp; View Profile</a></li>
                                                      
                                                        <li style="display: inline-flex;margin-left: 161px;margin-top: -22px;" onclick="checklgn(<?php echo $rows['astro_id'];?>);">

                                                     <?php if(!empty($userss_id) && $wal_amt > 10 && $rows['astro_online_status']==1)
                                                    { 
                                                     ?>
                                                    <input type="hidden" name="hiddencallingrate" id="hiddencallingrate<?php echo $rows['astro_id'];?>" value="<?php echo $astrocallrate;?>" >
  
                                                    <a href="#"><i class="fa fa-circle" <?php if($rows['astro_online_status']=='1'){?> style="color : green ;"<?php } else{ ?>style="color : red ;" <?php } ?>aria-hidden="true"></i></a>&nbsp;
                                                        <!--<a href="javascript:void(0);"data-toggle="pill" ></a>-->
                                                        <a style="display:block;" id='hcallbtn<?php echo $rows['astro_id'] ;?>' onclick="call(<?php echo $rows['astro_id'];?>);"><i class="fa fa-phone"></i>&nbsp; Call Now</a>
                                                        <a style="display:none;" id='scallbtn<?php echo $rows['astro_id'] ;?>' onclick="couponCall(<?php echo $rows['astro_id'];?>);"><i class="fa fa-phone"></i>&nbsp; Call Now</a>
                                                        </li>
                                                     
                                                     <?php }else{ ?>
                                                        <a href="javascript:void(0);"><i class="fa fa-circle" <?php if($rows['astro_online_status']=='1'){?> style="color : green ;"<?php } else{ ?>style="color : red ;" <?php } ?>aria-hidden="true"></i>&nbsp; </a>
                                                        <a href="javascript:void(0);" data-toggle="pill" ></a> <a href="javascript:void(0);"><i class="fa fa-phone"></i>&nbsp; Call Now</a></li>
                                                        <?php } ?>                                 
                                                     
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </div>
											                        <?php }} else { echo "No Data Found"; } ?>
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
                                        <div id="as-profilemenu-01" class="tab-pane fade">
                                          <h3>Menu 1</h3>
                                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                        <div id="as-profilemenu-02" class="tab-pane fade">
                                          <h3>Menu 1</h3>
                                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                        <div id="as-profilemenu-03" class="tab-pane fade">
                                          <h3>Menu 1</h3>
                                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                        <div id="as-profilemenu-04" class="tab-pane fade">
                                          <h3>Menu 1</h3>
                                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                        <div id="as-profilemenu-05" class="tab-pane fade">
                                          <h3>Menu 1</h3>
                                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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



    <!-- hs sidebar End -->



    <!-- hs client slider wrapper Start -->



<!--     <div class="hs_client_slider_main_wrapper hs_shop_pp_border_top_line">



        <div class="container">



            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                <div class="hs_client_slider_wrapper">



                    <div class="owl-carousel owl-theme">



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/logo01.png" alt="client_img" />



                            </div>



                        </div>



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/logo02.png" alt="client_img" />



                            </div>



                        </div>



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/logo03.png" alt="client_img" />



                            </div>



                        </div>



                        <div class="item">



                            <div class="hs_client_img_wrapper">



                                <img src="<?php echo base_url();?>assets/frontend/images/content/logo04.png" alt="client_img" />



                            </div>



                        </div>



                    </div>



                </div>



            </div>



        </div>



    </div> -->



    <!-- hs client slider wrapper End -->

   <!-- hs footer wrapper Start -->

  <script type="text/javascript">

  function checklgn($astroid)
  {
      
    var id = document.getElementById('sesids').value;
    //alert(id);
    if(id == 0)
    {
      if(confirm('Login With User'))
      {
        $('#myModal').modal('show');  
      }
    //   else
    //   {
    //     return false;
    //   }
    }
//     else
//     {
//     //  $('#reportModal').modal('show');  
//    // $('#checkonlinestatus').html('1');
//     } 
  }  
  </script>

<!-- *****************************SCRIPT FOR CALL START************************************************* -->
<script>
  function callof()
  {
    alert('Astrologer Is Offline Please Click Online Astrologer.');
    return false;
  }

function call(astrooid)
{
    var id = document.getElementById('sesids').value;
    if(id>0)
    {  
      if(confirm('Do You have Apply Promo Code'))
      {
            var promocode = prompt("Enter Promo Code",);
            var callrate=document.getElementById('hiddencallingrate'+astrooid).value;
            var users_ids = document.getElementById('hiddenuser_id').value;
            var astrol_ids = astrooid;
            var walletbalance= document.getElementById('wallet_balance').value;
           // alert(astrooid);
           // alert(callrate);
           // alert(users_ids);
           // alert(walletbalance);
            $.ajax({
                  type: "POST",
                  url: "<?php echo base_url();?>Call_Code",
                  data: {callrate: callrate,code: promocode, users_ids: users_ids,walletbalance: walletbalance,astrol_ids:astrol_ids },
                  dataType:'json',
                  success: function(data){
                      
                      if(data.success=='true'){
                        $('#hratecal'+astrol_ids).hide();
                        $('#hcallbtn'+astrol_ids).css('display','none');
                        $('#scallbtn'+astrol_ids).css('display','block');
                        $('#sratecal'+astrol_ids).html(data.msg);
                        $('#sratecalval'+astrol_ids).val(data.msg);
                      }else{
                        $('#callCodeError'+astrol_ids).css('display','block');
                        $('#callCodeError'+astrol_ids).html(data.msg);
                      }
                  }
            });
      } 
      else {
      if(confirm('Please click OK For connecting a Call')){
      var callrate=document.getElementById('hiddencallingrate'+astrooid).value;
      var users_ids = document.getElementById('hiddenuser_id').value;
      var astrol_ids = astrooid;
      var walletbalance= document.getElementById('wallet_balance').value;
       // alert(astrooid);
       // alert(callrate);
       // alert(users_ids);
       // alert(walletbalance);
      $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>call_data",
              data: {callrate: callrate, users_ids: users_ids,walletbalance: walletbalance,astrol_ids:astrol_ids },
              
              success: function(data){
                console.log(data);
                  //   $('#result').html(data);
                 // location.reload();
              }
          });
      }
      else
      {
        return false;
      }}
    }
    else
    {
      alert('First Login with User then Call Connect.');
    }

}

function couponCall(astrooid)
{
    if(confirm('Please click OK For connecting a Call')){
      var callrate=document.getElementById('sratecalval'+astrooid).value;
      var users_ids = document.getElementById('hiddenuser_id').value;
      var astrol_ids = astrooid;
      var walletbalance= document.getElementById('wallet_balance').value;
       // alert(astrooid);
       // alert(callrate);
       // alert(users_ids);
       // alert(walletbalance);
      $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>call_data",
              data: {callrate: callrate, users_ids: users_ids,walletbalance: walletbalance,astrol_ids:astrol_ids },
              
              success: function(data){
                console.log(data);
                  //   $('#result').html(data);
                 // location.reload();
              }
          });
      }
}

</script>
<!-- *****************************SCRIPT FOR CALL END************************************************* -->