<!-- Event snippet for Add to cart conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-411001558/fNEPCL_Y8_gBENbF_cMB'});
  fbq('track', 'AddToCart');
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
<div class="hs_indx_title_main_wrapper">

        <div class="hs_title_img_overlay"></div>

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_left_wrapper">

                        <h2>Cart</h2>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 full_width">

                    <div class="hs_indx_title_right_wrapper">

                        <ul>

                            <li><a href="#">Home</a> &nbsp;&nbsp;&nbsp;&gt; </li>

                            <li>Cart</li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

</div>

<section class="hs-cart-section" id="result">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="hs-astro-cart-heading">
          <h3>Product Cart Details</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-md-12">
        <div class="hs-astro-cartbox">
          <div class="col-sm-12">
              <div class="hs-totalCar-heading">
                <h4>Cart</h4> 
              </div>
          </div>
		  <?php
        $no = 0;
        $data = array();  
        
        $subtotal=0;
        $its = array();
        $ccarat_id = array();
        $wweight = array();
        // print_r($cartItems);
        // for($i=0;$i<count($cartItems);$i++)
        // {
        //   implode($cartItems['id']);
        // }
        foreach ($cartItems as $items) {  
        $no++;
        $its[] = $items['id'];
       if(!empty($items['carat_id'])) {   $ccarat_id[] =$items['carat_id']; } else{   $ccarat_id[] ='0'; }
       if(!empty($items['carat_weight'])){  $wweight[] = $items['carat_weight'];}else{  $wweight[] = '0'; }
      ?>
     
          <div class="row cartbd-01">
            <div class="col-md-3">
              <div class="hs-astrocart-img">
                <img src="<?php echo base_url();?>/image/product/<?php echo $items['primage'];?>" alt="shop_product" style="width: 100%;">
              </div>
            </div>
            <div class="col-md-6">
              <div class="hs-astrocart-details">
                <h3><?php echo $items['name']; ?><?php if(!empty($items['carat_weight'])){echo $items['carat_weight']; echo "- Carat";};?></h3>
                <h5><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $items['price']; ?> &nbsp;<del><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $items['proriginalprice']; ?></del>&nbsp; <span>(<?php echo $items['prdiscount']; ?>% off)</span></h5>
                <a href="<?php echo site_url('astro_controller/removecart/'); ?><?php echo $items['rowid']; ?>"><span><i class="fa fa-trash" aria-hidden="true"></i></span> Remove item </a>
              </div>
            </div>
            <div class="col-md-3">
              <div class="hs-astrocart-incdenc">
                <div class="hs-table-price">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <input type="hidden" name="" id="rowid<?php echo $items['id']?>" value="<?php echo $items['rowid']; ?>" class="cart-form">
                        <td><a href="javascript:void(0)" id="dec" onclick="dec(<?php echo $items['id']?>)"> - </a></td>
                        <td><input type="text" name="" id="qty<?php echo $items['id']?>" value="<?php echo $items['qty']; ?>" class="cart-form" style="width: 60px;"></td>
                        <td><a href="javascript:void(0)" id="inc" onclick="inc(<?php echo $items['id']?>)"> + </a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
<?php 
$subtotal=$subtotal+$items['subtotal']; 
} 
$iteam_ids = implode(',',$its);
$ccarat_id1 = implode(',',$ccarat_id);
$wweight1 = implode(',',$wweight);
?>
     <input type="hidden" name="carat_id" id="carat_id" value="<?php if(!empty($ccarat_id1)){echo $ccarat_id1;}else{echo "0";} ;?>" >
      <input type="hidden" name="carat_weight" id="carat_weight" value="<?php if(!empty($wweight1)){echo $wweight1;}else{echo "0";};?>" >
            
        </div>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="hs-astro-purches-details hs-astro-cartbox">
            <h3>The Total Amount Of</h3>
            <div class="hs-astro-prodct-info">
                <p>Gross Amount</p>
                <!-- <p>Shipping</p> -->
            </div>
            <div class="hs-astro-prodct-info-01">

                <p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $subtotal; ?> </p>
                <!-- <p>Gratis</p> -->
            </div>
            <!-- <div class="clearfix"></div> -->
            <hr>
            <div class="hs-astro-prodct-info">
              <p>The Total Amount</p>
            </div>
            <div class="hs-astro-prodct-info-01">
              <p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $subtotal; ?> </p>
            </div>
            <!-- discount amount show hide-->
               
            <div id="disc_show" style="display:none">
                <div class="hs-astro-prodct-info" >
                  <p>Discount Amount</p>
                </div>
                <div class="hs-astro-prodct-info-01">
                <p id="disc_amt"></p> <i class="fa fa-inr" aria-hidden="true"></i>
                </div> 
                <div class="hs-astro-prodct-info" >
                  <p>Fina Total Discount Amount</p>
                </div>
                <div class="hs-astro-prodct-info-01">
                
                  <p id="disc_price"><i class="fa fa-inr" aria-hidden="true"></i> </p>
                </div>
                </div>
                                      <!-- hidden discount amount -->
                <input type="hidden" name="afterdiscountamount"  id="afterdiscountamount" />
                <input type="hidden" name="disc_amt"  id="disc_amt" />
                
               <!-- discount amount show hide -->
            <div class="clearfix"></div>
            <hr>
              <?php $se_id = $this->session->userdata('user_id'); $ik=0;?>
              <input type="hidden" name="sesid" id="sesids" value="<?php if(!empty($se_id)) { echo $se_id; }else { echo $se_id = 0 ; } ?>" />
              <?php if(!empty($se_id)) { 
                $results = fetchbyresultByCondiction('wallet',array('user_id'=>$se_id));
                if(!empty($results)){
                $amt = $results[0]['wallet_amt'];
                if($amt>0){
                	$ik=1;
                ?>
                <div class="hs-astro-prodct-info">
                  <p>Wallet Amount</p>
                  <?php if(!empty($subtotal) && ($subtotal>$amt)){?>
                  <p><input type="checkbox" name="ckboxwal" id="ckboxwal" onclick="ckboxwal();" />&nbsp;&nbsp; You want to Pay with Wallet</p>
                  <?php } ?>
                </div>
                <div class="hs-astro-prodct-info-01">
                  <p><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $amt; ?> </p>
                </div> 
                <div class="hs-astro-prodct-info-01"></div>
                
                <div id="showcalculations" style="display:none;">
                    <table style="margin-top:50px;width:100%;">
                        <tr style="border: 1px solid #dee2e6;">
                            <td style="border: 1px solid #dee2e6;padding: 5px;">Total Amount</td>
                            <td style="border: 1px solid #dee2e6;float:right;width:100%;text-align:right;padding: 5px;"><?php echo $subtotal; ?></td>
                        </tr>
                        <tr style="border: 1px solid #dee2e6;">
                            <td style="border: 1px solid #dee2e6;padding: 5px;">Wallet Amount</td>
                            <td style="border: 1px solid #dee2e6;float:right;width:100%;text-align:right;padding: 5px;"><?php echo '-  '.$amt; ?></td>
                        </tr>
                        <tr style="border: 1px solid #dee2e6;">
                            <td style="border: 1px solid #dee2e6;padding: 5px;">Final Amount</td>
                            <td style="border: 1px solid #dee2e6;float:right;width:100%;text-align:right;padding: 5px;"><?php echo $wallredAmtFina = $subtotal-$amt; ?></td>
                        </tr>
                    </table>  
                </div>
                <div class="clearfix"></div>
                <hr> 
                
                <!--discount  -->
               <div class="hs-astro-checkoutBtn "> 
                       <input type="text" name="coupan_code" id="coupan_code" class="form-control" placeholder="Discount Code">&nbsp; &nbsp;&nbsp;&nbsp;
                       <button type="submit" id="apply" >Apply</button>
             </div>
             <span id="cpn_codred" style="color:red;"></span>
             <span id="cpn_codgreen" style="color:green;"></span>
             <span id="disc_amt" style="color:green;"></span>
             <!-- discount -->

              <div class="hs-astro-checkoutBtn">
                <button onclick="payWallet();" id="hidwalbtn">Wallet</button>
               
                 
              <input type="hidden" name="walletamt" value="<?php echo $amt; ?>" id="walletamt" />
              <input type="hidden" name="userid" value="<?php echo $se_id; ?>" id="userid" />
              <?php } } }

               if($ik<1) { ?>
             <div class="hs-astro-checkoutBtn">
            <?php }  ?>  
              <button onclick="checklogin();" id="hideckbtn">Checkout</button>
              <button onclick="razorpaywr();" id="showckbtn" style="display:none;" >Checkout</button>
              <form id="myform" action="<?php echo base_url('checkout');?>" method="post" enctype="multipart/form">
                <?php $randam = uniqid(8); ?>
                <input type="hidden" name="randam" value="<?php echo $randam; ?>" id="randam" />
                <input type="hidden" name="totalamt" value="<?php if(!empty($subtotal)){echo $subtotal;} ?>" id="totalamt" />
                <input type="hidden" name="totalamt" value="<?php if(!empty($wallredAmtFina)){echo $wallredAmtFina;} ?>" id="finaltotalamt" />
                <input type="hidden" name="totalamt" value="<?php if(!empty($amt)){echo $amt;} ?>" id="finwal_amt" />
                <input type="hidden" name="Items" value="<?php echo $subtotal; ?>" id="Items" />
                <input type="hidden" name="Items_id" value="<?php echo $iteam_ids; ?>" id="Items_id" />
              </form>
            </div>
        </div>
        <div class="hs-astro-ptm-box hs-astro-cartbox">
          <h3>We Accept</h3>
          <div class="hs-astro-pmentmode">
            <img src="<?php echo base_url()?>assets/frontend/images/content/blog/visa.jpg" width="80px;">
            <img src="<?php echo base_url()?>assets/frontend/images/content/blog/Mastercard.jpg" width="80px;">
            <img src="<?php echo base_url()?>assets/frontend/images/content/blog/paypal-logo.png" width="80px;">
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 
<!-- *****************************************************Wallet Rechargs model ******************************* -->
    <div class="modal fade" id="walletRechargemodel" role="dialog">
        <div class="modal-dialog hs_astro_user_lgoin">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!-- <h4 class="modal-title">Add </h4> -->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5 hs-user-bnimg">
                            <div>
                                <img src="<?php echo base_url();?>image/websiteimages/paypal.png" style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-sm-7">

                            <br>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <h3 style="text-align: center;">Add Wallet Amount</h3>
                                    <?php //echo form_open(base_url().'wallet', array('class' => 'login-filed')); ?>
                                    <?php //echo form_open(base_url().'razorpay',array('class' => 'login-filed')); ?>
                                    <form action="#" method="post">
                                        <div class="form-group hs-usr-login-field" style="margin-top: 20px;">
                                            <!-- <label> <i class="fa fa-envelope-o" aria-hidden="true"></i> </label> -->
                                            <input type="text" name="walletamt" value="<?php if(!empty($wallredAmtFina)){echo $wallredAmtFina;}?>" id="amtwalls" class="form-control" required>
                                            <?php $unms = $this->session->userdata('user_first_name'); ?>
                                            <input type="hidden" name="usernames" id="usnams"
                                                value="<?php echo $unms; ?>">
                                        </div>
                                        <div class="hs-submodlBtn">
                                            <input type="submit" name="button" value="Recharge"
                                                class="form-control buy_now"> <br>
                                            <!--<script-->
                                            <!--     src="https://checkout.razorpay.com/v1/checkout.js"-->
                                            <!--     data-key="rzp_live_meWNXak65wUl3z"-->
                                            <!--     data-amount="10000"-->
                                            <!--     data-buttontext="BUY PASS"-->
                                            <!--     data-name="astrovedvakta.com"-->
                                            <!--     data-description="astro pay"-->
                                            <!--     data-image="http://astrovedvakta.com/image/websiteimages/favicon.ico"-->
                                            <!--     data-prefill.name="test"-->
                                            <!--     data-prefill.contact="9123123123"-->
                                            <!--     data-prefill.email="test@gmail.com"-->
                                            <!--     data-theme.color="#F8463F"-->
                                            <!-- ></script>-->
                                        </div>
                                        <?php //echo form_close(); ?>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- <button type="submit">Submit</button> -->
                </div>
                <!--  <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
            </div>
        </div>
    </div>
    <!--************************************************** Wallet Rechrge model ******************************-->

 <script>
	  $(document).on('click',"#apply",function(){
      var coupancode = $('#coupan_code').val();
      var amt = document.getElementById('totalamt').value;
      //alert(coupancode);
        $.ajax({
          type: "POST",
          url: "<?php echo base_url();?>checkcoupan",
          dataType: "json",
          data: {coupancode:coupancode,amt:amt},
          success: function(responce) {

           // console.log(responce);

            if(responce.success == 1){ 
              $('#cpn_codgreen').html(responce.msg);//get response
              $('#disc_amt').html(responce.disc_amt);//get response
             var disc_price= amt-responce.disc_amt;//amount caluclation
              $('#disc_price').html(disc_price);//to just show by id 
              var disc_amtt=responce.disc_amt;//discount amount
              $('#disc_amt').val(disc_amtt);//discount amount show on id
              $('#afterdiscountamount').val(disc_price);//to get in input field<!-- <input type="text" name="walletamt"  id="xyz" /> -->
              $('#cpn_codgreen').show();//for show
              $('#cpn_codred').hide();//for hide
              demoVisibility();//for hide
                
            }else if(responce.success==0){
              $('#cpn_codred').html(responce.msg); 
              $('#cpn_codred').show();
              $('#cpn_codgreen').hide();
              demohideVisibility();
            }
            },
        });
    });
    function demoVisibility()
     {
      document.getElementById("disc_show").style.display = "block";
     }
     function demohideVisibility()
     {
      document.getElementById("disc_show").style.display = "none";
     }
</script> 
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

// function chkcoupancode()
// {
//  var coupan_code = document.getElementById('coupan_code').value; 
//  //alert(coupan_code);
//  if(!empty(coupan_code))
//  {alert();
//  $.ajax({
//             type: "POST",
//             url: "<?php echo base_url();?>checkcoupan",
//             data: {coupancode:coupan_code},
//             success: function(data){
//               alert(data);
//             //  $('#stage').html(data);
//                // location.reload();
//             }
//         }); 

//       }else{
//         alert("not exist hello");
//       }
// }


    function payWallet()
    {
        if(document.getElementById('afterdiscountamount').value) 
        {
             // alert('if');
            var amt = document.getElementById('afterdiscountamount').value; 
            var discountamt = document.getElementById('disc_amt').value; 
        }else {
            //alert('else');
            var amt = document.getElementById('totalamt').value; 
            var discountamt = 0;
        }
        var walletamt = document.getElementById('walletamt').value; 
        var userid = document.getElementById('userid').value; 
        var productid = document.getElementById('Items_id').value; 
        var carat_id = document.getElementById('carat_id').value; 
        var carat_weight = document.getElementById('carat_weight').value;
    
        if (parseFloat(amt) > parseFloat(walletamt))
        {
            if(confirm('Please Recharge wallet insuficent amount'))
            {
                $('#walletRechargemodel').modal('show');
            }
            else
            {
                return false;
            }
    }
    else
    {   
        if(amt==0)
        {alert('Invalid Amount For Pay');return false;}
        	if(confirm('Payment Pay From Your Wallet'))
        	{
        	    alert('Payment Done Successfully');
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url()?>astro_controller/walletpayment",
                    data: {amt:amt,userid:userid,productid:productid,discountamt:discountamt,carat_id:carat_id,carat_weight:carat_weight},
                    success: function(data){
                        location.reload();
                    }
                });    
        	}
        	else
        	{
        	    return false;
        	}
        //}
        // else
        // {
        //     alert('Invalid Amount For Pay');
        //     reurn false;
        // }
    }
  }
  
  function walletpay()
  {
    
    if(document.getElementById('afterdiscountamount').value) {
    var amt = document.getElementById('afterdiscountamount').value; 
    var discountamt = document.getElementById('disc_amt').value; 
  }
  else {
    var amt = document.getElementById('totalamt').value; 
    var discountamt = 0;
  }
  //	var amt = document.getElementById('totalamt').value; 
    var walletamt = document.getElementById('walletamt').value; 
    var userid = document.getElementById('userid').value; 
    var productid = document.getElementById('Items_id').value;
    var carat_id = document.getElementById('carat_id').value; 
    var carat_weight = document.getElementById('carat_weight').value;
  	$.ajax({
            type: "post",
            url: "<?php echo base_url()?>astro_controller/walletpayment",
            data: {amt:amt,userid:userid,productid:productid,discountamt:discountamt,carat_id:carat_id,carat_weight:carat_weight },
            success: function(data){
                location.reload();
            }
        });
  }

  function checklogin()
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
    //   var randam = document.getElementById('randam').value;
        var totalamt = parseInt(document.getElementById('totalamt').value);
    //   var item = document.getElementById('Items').value;
    //   var item_id = document.getElementById('Items_id').value;
        
    //   alert("aaaaa");
        if(totalamt>0){
        razorpay();}else{
            alert('Amount Is Not Valid');return false;
        }
    //   $.ajax({
    //     // url: "<?php echo base_url('products/addTopayment'); ?>",
    //     url: "<?php echo base_url('Checkout_razorpay/addTopayment'); ?>",
    //     type: "post",
    //     data: {rand:randam,amt:totalamt,itm:item,itm_id:item_id} ,
    //     success: function (response) {
    //     },
    //   });
     // $("#myform").submit();
    }
  }
function razorpay2()
{
    alert("razorpay check test2");
}
  function inc(a) {
    var qty = document.getElementById('qty'+a).value;
      var rowid = document.getElementById('rowid'+a).value;
    qty++;
    if(qty <= 10) {
      document.getElementById('qty'+a).value = qty;
    }
  $.ajax({
            type: "GET",
            url: "<?php echo base_url()?>astro_controller/updateItemQty",
            data: {qty: qty, rowid: rowid },
            success: function(data){
                //    $('#result').html(data);
                location.reload();
            }
        });
  
  }
  
  /*Decrement*/
  function dec(a) {
    var qty = document.getElementById('qty'+a).value;
      var rowid = document.getElementById('rowid'+a).value;
    qty--;
    if(qty > 0){
      document.getElementById('qty'+a).value = qty;
    }

      $.ajax({
            type: "GET",
            url: "<?php echo base_url()?>astro_controller/updateItemQty",
            data: {qty: qty, rowid: rowid },
            
            success: function(data){
                //   $('#result').html(data);
                location.reload();
            }
        });
  }
  
    function ckboxwal()
    {
        var x=$("#ckboxwal").is(":checked");
        if(x)
        {
            $('#showcalculations').css('display','block'); 
            $('#hidwalbtn').hide();
            $('#hideckbtn').hide();
            $('#showckbtn').css('display','block');
        }
        else
        {
            $('#showcalculations').css('display','none');  
            $('#hidwalbtn').show();
            $('#hideckbtn').show();
            $('#showckbtn').css('display','none');
        }
    }
  
</script>