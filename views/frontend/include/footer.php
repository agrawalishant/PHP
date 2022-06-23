<style type="text/css">
  .skiptranslate  {
    /*display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;*/
    color: #2f2e2e;
 /*   background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;*/
}
.xyz .goog-te-combo {
    width: 150px;
    height: 30px;
    line-height: 30px;
}
.goog-logo-link, .goog-logo-link:link, .goog-logo-link:visited, .goog-logo-link:hover, .goog-logo-link:active {
    /*font-size: 12px;*/
    /* font-weight: bold; */
    color: #2f2e2e;
    display: none;
    /*text-decoration: none;*/
}
.goog-logo-link img {
    display:none;
}
</style>   
<!-- hs enquiry form start-->
<?php if (!empty($this->session->userdata('user_id')) || (!empty($sl_id) && $sl_id == 9)) {?>
<div class="clearfix"></div>
<section class="astro_predic_form">
    <div class="container astro_pre_shad_form">
        <div class="row">
            <div class="col-sm-12">
                <div class="hs_about_heading_main_wrapper ">
                    <div class="hs_about_heading_wrapper hs-astro-matchform-headings">
                        <h2>Make <span> Kundli</span></h2>
                        <?php 
                            $uiuid = $this->session->userdata('user_id');
                            if(!empty($uiuid)){
                            $walamt = fetchbyresultwhere('wallet',array('user_id'=>$uiuid));
                            if(!empty($walamt)){$userwalletAmt = $walamt[0]['wallet_amt'];}
                            $kundli = fetchbyresultwhere('kundalicharges',array('id'=>1));
                            $kundliAmt = $kundli[0]['charges'];
                            }
                        ?>
                        <input type="hidden" id="userwalletAmt" value="<?php if(!empty($userwalletAmt)){ echo $userwalletAmt;} ?>" />
                        <input type="hidden" id="kundlicharges" value="<?php if(!empty($kundliAmt)){echo $kundliAmt;} ?>" />
                        <h4><span></span></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="divider-01"></div>
       
       <?php //echo form_open(base_url().'kundalienquiry'); ?>
        <form action="<?php echo base_url();?>kundalienquiry" method="post" id="subkundliform">
            <div class="row">
                <div class="col-md-3">
                    <div class="hs-astro-enquiry-ctform">
                        <label for="Name">Name</label>                  
                        <input type="text" name="fkun_name" id="fkun_name" class="form-control"placeholder="Name" required="required">
                        <input type="hidden" name="fkun_userid" value="<?php echo $uiuid; ?>" class="form-control" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hs-astro-enquiry-ctform">
                        <label for="Mobile">Mobile</label>                      
                        <input type="text" name="fkun_mobile" class="form-control" placeholder="Mobile" id="fkun_mobile" maxlength="10" required>
                    </div>
                </div>
                 <div class="col-md-3">
                    <div class="hs-astro-enquiry-ctform">
                       <label for="sel1">Gender</label>
                        <select class="form-control droupdown select2-hidden-accessible" name="fkun_gender" id="kundaligender" tabindex="-1" aria-hidden="true" required>
                           <option value="male">Male</option>
                           <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hs-astro-enquiry-ctform">
                        <label for="email">Email</label>                  
                        <input type="email" name="fkun_email" id="fkun_email" class="form-control"placeholder="Mail" required> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="hs-astro-enquiry-ctform">
                        <label for="date of birth">Date Of Birth</label>
                        <input type="date" name="fkun_dob" id="fkun_dob" class="form-control" placeholder="Birthday" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="hs-astro-enquiry-ctform">
                        <label for="birth time">Birth Time</label>
                        <input type="time" name="fkun_birth_time" id="fkun_birth_time" class="form-control" placeholder="Time" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="hs-astro-enquiry-ctform">
                        <label for="Birth place">Birth Place</label>                     
                        <input type="text" name="fkun_birth_place" id="fkun_birth_place" class="form-control"placeholder="Birth Place" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="hs-astro-enquiry-ctbtn">
                        <!--<input type="submit" name="submit" class="form-control" value="SUBMIT" >-->
                        <!--<input type="button" name="submit" class="form-control" value="SUBMIT" onclick="subKundli();" >-->
                        <input type="button" name="submit" class="form-control" value="SUBMIT" onclick="kundliPayWallet();" >
                    </div>
                </div> 
                <?php //echo form_close(); ?>          
            </div>
        </form>
    </div>
</section>
<?php } ?>
<!-- hs enquiry form end-->

   <!-- hs footer wrapper Start -->
<?php $fetch=fetchbyrow('websiteinformation');?>

 <div class="hs_footer_main_wrapper">



        <div class="container">



            <div class="row">



                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">



                    <div class="hs_footer_logo_wrapper">



                        <img src="<?php echo base_url();?>image/logo/<?php     
                         echo $fetch->logo2;?>" alt="footer_logo" class="img-responsive" />

                      <p style="text-align:justify;">
                         <!-- Now a days Online Astrology readings are gaining popularity and the traditional astrology practices and practitioners are being replaced by modern astrology softwares and astrology websites. -->
                       <!-- about us footer -->
                         <?php     
                         //echo $fetch->about;
                         echo $abts = word_limiter(strip_tags($fetch->about), 30);
                        ?>
                        <h3></h3> <b><a href="<?php echo base_url('about'); ?>" style="color:#fff;font-size:14px;">Read More.</a></b></h3>
                          </p>

                         <ul>



                            <li><a href="<?php     
                         echo $fetch->facebook_link;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>



                            <!-- <li><a href="<?php //echo $fetch->twitter_link;?>" target="_blank"><i class="fa fa-twitter"></i></a></li> -->



                            <!-- <li><a href="<?php echo $fetch->google_link;?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li> -->



                            <li><a href="<?php //echo $fetch->yahoo_link;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>



                        </ul>



                    </div>



                </div>



                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">



                    <div class="hs_footer_help_wrapper">



                        <h2>Important <span> Link</span></h2>



                        <ul class="list-unstyled footer-link">



							<li class="fo_link" style="padding-top:26px;"><a href="<?php echo base_url('front_page'); ?>" style="color:#fff;font-size:14px;">Home</a></li>



							<li class="fo_link"><a href="<?php echo base_url('about'); ?>" style="color:#fff; font-size:14px;">About Us</a></li>



							<li class="fo_link" style="padding-top:8px;color:#fff;"><a href="<?php echo base_url('services'); ?>"  style="color:#fff; font-size:14px;">Services</a></li>



							<li class="fo_link" style="padding-top:8px;color:#fff;"><a href="<?php echo base_url('product'); ?>"  style="color:#fff; font-size:14px;">Products</a></li>



						</ul>

                        <div id="google_translate_element" class="xyz"></div>

                       <!--- <div class="hs_footer_help_btn">



                            <ul>



                                <li><a href="#" class="hs_btn_hover">Free Quote</a></li>



                            </ul>



                        </div>--->



                    </div>



                </div>



                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">



                    <div class="hs_footer_help_wrapper">



                        <h2>Quick <span> Link</span></h2>



                        <ul class="list-unstyled footer-link">



							<li class="fo_link" style="padding-top:30px;color:#fff;"><a href="<?php echo base_url('match_making'); ?>" style="color:#fff;font-size:14px;">Match Making</a></li>



							<!-- <li class="fo_link" style="padding-top:8px;color:#fff;"><a href="<?php // echo base_url('prediction'); ?>" style="color:#fff; font-size:14px;">Predications</a></li> -->

                            <?php if(empty($this->session->userdata('astro_id')) && empty($this->session->userdata('user_id')  ) ) {?>

                                <li class="fo_link" style="padding-top:8px;color:#fff;"><a href="<?php echo base_url('astrologer_login_page'); ?>"  style="color:#fff; font-size:14px;">Astrologer Login</a></li>
                                <li class="fo_link" style="padding-top:8px;color:#fff;"><a href="<?php echo base_url();?>astrologer_registration"  style="color:#fff; font-size:14px;">Astrologer Registration</a></li>

                                <?php } ?>
                           

							<li class="fo_link" style="padding-top:8px;color:#fff;"><a href="<?php echo base_url('contact'); ?>"  style="color:#fff; font-size:14px;">Contact Us</a></li>



							<!--<li class="fo_link" style="padding-top:8px;color:#fff;"><a href="<?php echo base_url('blog'); ?>"  style="color:#fff; font-size:14px;">Blog</a></li>-->
                            <li class="fo_link" style="padding-top:8px;color:#fff;"><a href="<?php echo base_url('privacypolicy'); ?>"  style="color:#fff; font-size:14px;">Privacy Policy</a></li>
                            <li class="fo_link" style="padding-top:8px;color:#fff;"><a href="<?php echo base_url('termandcondition'); ?>"  style="color:#fff; font-size:14px;">Terms and Condition</a></li>

				

						</ul>



                        <!----<div class="hs_footer_help_btn">



                            <ul>



                                <li><a href="#" class="hs_btn_hover">Free Quote</a></li>



                            </ul>



                        </div>--->



                    </div>



                </div>



                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">



                    <div class="hs_footer_contact_wrapper">



                        <h2>Contact <span>Us</span></h2>



                        <ul class="cont-form-info">



                                <p><i class="fa fa-address-book" style="margin-right:4px;"></i>



                                    Address :-   <?php     
                         echo $fetch->address;?>



                                </p>



                                <p style="margin-top:10px;"><i class="fa fa-mobile" style="margin-right:6px; font-size:16px;"></i>

                                    Contact Number :- <br>


                                    <?php     
                         echo $fetch->phone;?>
                                         



                                 </p>



                                <p style="margin-top:10px;"><i class="fa fa-envelope" style="margin-right:6px; font-size:16px;"></i> 



                                    Email Address :-<br>


                                    <?php     
                         echo $fetch->email;?>
                                 
                                          



                                </p>



                               <!-- <p style="margin-top:10px;"><i class="ft fa fa-phone" style=" margin-right:6px; font-size:16px;"></i>



                                    Toll Free Number :-<br>


                                    <?php     
                         echo $fetch->tollfreenumber;?>
                                        

                                </p>-->



                            </ul>



                        <!----<div class="hs_footer_contact_input_wrapper">



                            <input type="text" placeholder="Email Address..."><i class="fa fa-envelope"></i>



                        </div>--->



                    </div>







                </div>







            </div>



        </div>



    </div>



    <!-- hs footer wrapper End -->



    <!-- hs bottom footer wrapper Start -->





    <div class="hs_bottom_footer_main_wrapper">



        <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>



        <div class="container">



            <div class="row">



                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">



                    <div class="footer_bottom_cont_wrapper">



                        <p><?php     
                         echo $fetch->copyright;?></p>

                    </div>

                </div>



            </div>



        </div>



    </div>
<!-- Modal Start -->
<div id="myModalMakeKundli" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#ff880e;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select</h4>
      </div>
       <form action="#" method='post' id="modalkundlisub">
      <div class="modal-body" style="padding-top: 10px;padding-bottom: 20px;">
            <input type="radio" name="radio1" id="janam" value="701" style="width:auto;height:auto;display:inline-block;margin-right:10px;"/><label style="margin-right:20px;">Janam Patrika (701 Rs.)</label>
            <input type="radio" name="radio1" id="kundlimake" value="501" style="width:auto;height:auto;display:inline-block;margin-right:10px;"/><label style="margin-right:20px;">Kundali (501 Rs.)</label>
       </div>
      <div class="modal-footer" style="background-color:#ff880e;text-align: center;">
        <button type="button" name="submit" onclick="subKundli();" style="background: #ffffff;border: 0;color: #ff880e;padding: 7px 30px;border-radius: 43px;">SUBMIT</button>
      </div>
      </form>
    </div>

  </div>
</div>
<!-- Modal Ends-->

    <!-- hs bottom footer wrapper End -->
    <!--main js file start-->
    <!-- <script src="<?php //echo base_url();?>assets/frontend/js/jquery_min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script src="<?php echo base_url();?>assets/frontend/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/modernizr.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/jquery.menu-aim.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/parallax.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/owl.carousel.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/jquery.shuffle.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/jquery.countTo.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/jquery.inview.min.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url();?>assets/frontend/js/custom2.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script> AOS.init(); </script>
    <!--main js file end-->

</body>
</html>
<script type="text/javascript">
   function myfunction() {
  document.getElementById('soo').style.display = "block";
}

    function myfun() 
    {
        $('#no').val(' '); 
        $('#nos').val(' ');
        document.getElementById('soo').style.display = "none";
    }

    $(document).ready(function() 
    {
        $( "#datepicker" ).datepicker({ 
            dateFormat: 'dd-mm-yy', 
        });
    });

</script>



<!-- tost message flash start -->
	<!-- Toster js -->

    <script src="<?php echo base_url();?>/assets/tostmsg/toastr.min.js"></script>

<script>



// success_toast();

// error_toast();

//---------------------error message display

<?php 

$msg=$this->session->flashdata('error');

if(isset($msg)) : ?>

toastr.error("<?php echo $msg?>");

<?php endif ?>

// -------------------success messge display

<?php 

$msg=$this->session->flashdata('success');

if(isset($msg)) : ?>

toastr.success("<?php echo $msg?>");

<?php endif ?>

// ---------------------------------------



function success_toast()

{

	//toastr["success"](" Sucessfully.");

	toastr.success("success message");

}

function error_toast()

{

	toastr.error("error message");

	//toastr["error"]("Error.");

}

</script>

<script>




toastr.options = {

  "closeButton": false,

  "debug": false,

  "newestOnTop": false,

  "progressBar": false,

  "positionClass": "toast-top-right",

  "preventDuplicates": false,

  "onclick": null,

  "showDuration": "300",

  "hideDuration": "1000",

  "timeOut": "5000",

  "extendedTimeOut": "1000",

  "showEasing": "swing",

  "hideEasing": "linear",

  "showMethod": "fadeIn",

  "hideMethod": "fadeOut"

}</script>

<!-- tost flash message end -->
<!-- for form contact mobile no -->
<script type="text/javascript">
   $("#contact_mobilenumber").on("input", function() {
  var nonNumReg = /[^0-9]/g
  $(this).val($(this).val().replace(nonNumReg, ''));
});
    </script>
    <!-- for form contact mobile no -->



    <!-- form validation script-->
    <!-- form validation script -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>
<style>form .error {
  color: #ff0000;
}</style>
  <script>
      
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='registration']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      user_first_name: "required",
      user_last_name: "required",
      user_email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      user_password: {
        required: true,
        minlength: 5
      }
    },
    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
        form.action = "<?php echo base_url().'user_register_submit';?>"; 
      form.submit();
      
    }
  });
});
    /////// Search Products ///////////////
  
  $(document).on("click","#src_btn",function() {
    var sr = document.getElementById("searchproduct").value;
    var uri = '<?php echo base_url('astro_controller/searchproducts')?>';

    $.ajax({
        url: uri,
        type: "post",
        data: {vlu:sr},

        success: function (response) {
          // alert('welcome');
          // console.log(response.msg);
          
          $('.hide_product').hide();
          $('.show_product').html(response);
        },
    });

  });

$(document).on("click",".sub-btn",function() {

    var sr = document.getElementById("searchastro").value;
    var uri = '<?php echo base_url('astro_controller/searchastro')?>';
   
    $.ajax({
        url: uri,
        type: "post",
        data: {vlu:sr},

        success: function (response) {
          // alert('welcome');
          // console.log(response.msg);
          
          $('.hide_astro').hide();
          $('.show_astro').html(response);
      },
    });
  });

</script>

<!-- form validation script -->
    
<!--Start of Tawk.to Script-->

<script type="text/javascript">

// var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
// (function(){
// var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
// s1.async=true;
// s1.src='https://embed.tawk.to/60093cf0c31c9117cb70e9b3/1esi1c43g';
// s1.charset='UTF-8';
// s1.setAttribute('crossorigin','*');
// s0.parentNode.insertBefore(s1,s0);
// })();
</script> 
<!--End of Tawk.to Script-->

<!--Google Translater Start-->
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
  }
  
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--Google Translater Ends-->

<!-- for form contact mobile no -->
<script type="text/javascript">
   $("#contact_mobilenumber").on("input", function() {
  var nonNumReg = /[^0-9]/g
  $(this).val($(this).val().replace(nonNumReg, ''));
});
    </script>
<!-- *******************************************Rozar Payment Getway Starts************************************************************ -->    
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
//   razor pay script start***********************

function razorpay(){
    
      
var SITEURL = "<?php echo base_url(); ?>";
// $('body').on('click', '.buy_now', function(e){
var name = "PRODUCTS";//document.getElementById('usnams').value;    
var totalAmount = document.getElementById('totalamt').value; 
var item = document.getElementById('Items').value;
var item_id = document.getElementById('Items_id').value;
var carat_id = document.getElementById('carat_id').value; 
var carat_weight = document.getElementById('carat_weight').value;
var options = {
 "key": "rzp_live_meWNXak65wUl3z",//"rzp_test_VMEWGCmKKRxNhz",
"amount": totalAmount*100, // 2000 paise = INR 20
"name": name,
"description": "Payment",
//"image": "//www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
"handler": function (response){
$.ajax({
url: SITEURL + 'Checkout_razorpay/cartsuccess',
type: 'post',
dataType: 'json',
data: {totalAmount : totalAmount, item : item , item_id : item_id,carat_id:carat_id,carat_weight:carat_weight}, 

success: function(msg) 
{
    alert(msg);
   location.reload();
   window.location.href = SITEURL + 'userdashboard';
},
});
},
"theme": {
"color": "#fe8a13"
}
};
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();
//});
}
//   razor pay after wallet ridim remaining amount pay script start***********************

function razorpaywr(){
var SITEURL = "<?php echo base_url(); ?>";
// $('body').on('click', '.buy_now', function(e){
var name = "PRODUCTS";//document.getElementById('usnams').value;    
var totalAmount = document.getElementById('finaltotalamt').value; 
var item = document.getElementById('Items').value;
var item_id = document.getElementById('Items_id').value;
var carat_id = document.getElementById('carat_id').value; 
var carat_weight = document.getElementById('carat_weight').value;
var options = {
 "key": "rzp_live_meWNXak65wUl3z",//"rzp_test_VMEWGCmKKRxNhz",
"amount": totalAmount*100, // 2000 paise = INR 20
"name": name,
"description": "Payment",
//"image": "//www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
"handler": function (response){
$.ajax({
url: SITEURL + 'Checkout_razorpay/cartsuccess',
type: 'post',
dataType: 'json',
data: {totalAmount : totalAmount, item : item , item_id : item_id,carat_id:carat_id,carat_weight:carat_weight}, 

success: function(msg) 
{
    alert(msg);
   location.reload();
   window.location.href = SITEURL + 'userdashboard';
},
});
},
"theme": {
"color": "#fe8a13"
}
};
var rzp1 = new Razorpay(options);
rzp1.open();
e.preventDefault();
//});
}
    //   razorpay end ********************************
</script>
<!-- *******************************************Rozar Payment Getway Starts************************************************************ -->    
<script>
    function subKundli()
    {
        var totalAmount = 0;
        if(document.getElementById('janam').checked)
        { totalAmount = document.getElementById('janam').value;}
        else if(document.getElementById('kundlimake').checked)
        { totalAmount = document.getElementById('kundlimake').value;}
        //alert(totalAmount);
        if(totalAmount==701 || totalAmount==501){ 
            if(confirm('Before Submit Kundli '+totalAmount+' Rupees.'))
            {
                var SITEURL = "<?php echo base_url(); ?>";
                //var totalAmount = 501; 
                var options = {
                "key": "rzp_live_meWNXak65wUl3z",//"rzp_test_VMEWGCmKKRxNhz",
                "amount": totalAmount*100, // 2000 paise = INR 20
                //"name": name,
                "description": "Payment",
                //"image": "//www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
                "handler": function (response){
                $.ajax({
                url: SITEURL + 'Checkout_razorpay/kundliPaySuccess',
                type: 'post',
                dataType: 'json',
                data: {totalAmount : totalAmount}, 
                
                success: function(msg) 
                {
                    alert(msg);
                    $('#subkundli').submit();
                    location.reload();
                    //window.location.href = SITEURL + 'userdashboard';
                },
                });
                },
                "theme": {
                "color": "#fe8a13"
                }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
                e.preventDefault();        
            }
            else
            {
                return false;
            }
        }    
    }
</script>
<!-- *******************************************Make Kundli Pay With Wallet************************************************************ -->    
<script type="text/javascript">

    function kundliPayWallet()
    {
        var walletamt = document.getElementById('userwalletAmt').value;
        var kundlicharges = document.getElementById('kundlicharges').value;
        var user = "<?php if(!empty($uiuid)){echo $uiuid; }else{echo '0';} ?>";
        //alert(walletamt);alert(kundlicharges);
        var name = document.getElementById('fkun_name').value;
        var mobile = document.getElementById('fkun_mobile').value;
        var gender = document.getElementById('kundaligender').value;
        var email = document.getElementById('fkun_email').value;
        var dob = document.getElementById('fkun_dob').value;
        var birthtime = document.getElementById('fkun_birth_time').value;
        var birthplace = document.getElementById('fkun_birth_place').value;
        //alert(mobile);
        if(name==''){alert('Please Enter Name');return false;}
        if(mobile==''){alert('Please Enter Mobile');return false;}
        if(email==''){alert('Please Enter Email');return false;}
        if(dob==''){alert('Please Enter Date Of Birth');return false;}
        if(birthtime==''){alert('Please Enter Birth Time');return false;}
        if(birthplace==''){alert('Please Enter Birth Place');return false;}
        if(user==''){ 
        $('#myModalMakeKundli').modal('show'); 
        }else{
            if(confirm('Before Submit Kundli Pay '+ kundlicharges +' Rupee From Your Wallet.'))
            {
                if(parseFloat(walletamt) >= parseFloat(kundlicharges))
                {
                    $.ajax({
                        url: "<?php echo base_url();?>Astro_controller/KundliPayByWallet",
                        type: "post",
                        data: {amt:walletamt,user:user,kundlicharges:kundlicharges,fkun_name:name,fkun_mobile:mobile,fkun_gender:gender,fkun_email:email,fkun_dob:dob,fkun_birth_time:birthtime,fkun_birth_place:birthplace},
                        success: function (response) {
                            alert('Payment Done Successfully.');
                            location.reload();
                        },
                    }); 
                    //$('#subkundliform').submit();
                }
                else
                {
                    alert('Recharge Your Wallet For Making The Kundli');
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
    }
// ======****Wallet Recharge code Start*****=======    
var SITEURL = "<?php echo base_url() ?>";
$('body').on('click', '.buy_now', function(e) {
    var name = document.getElementById('usnams').value;
    var totalAmount = parseInt(document.getElementById('amtwalls').value);
    var totalAmount1 = parseFloat(document.getElementById('amtwalls').value);
    if(totalAmount1==totalAmount){totalAmount=totalAmount;}else{totalAmount=totalAmount+1;}
    var product_id = $(this).attr("data-id");
    var options = {
        "key":  "rzp_live_meWNXak65wUl3z",//"rzp_test_VMEWGCmKKRxNhz",//
        "amount": totalAmount * 100, // 2000 paise = INR 20
        "name": name,
        "description": "Payment",
        //"image": "//www.tutsmake.com/wp-content/uploads/2018/12/cropped-favicon-1024-1-180x180.png",
        "handler": function(response) {
            $.ajax({
                url: SITEURL + 'Checkout_razorpay/success',
                type: 'post',
                dataType: 'json',
                data: {
                    totalAmount: totalAmount
                },
                success: function(msg) {
                    $('#walletmodel').modal('hide');
                    window.location.href = SITEURL + 'userdashboard';
                },
            });
        },
        "theme": {
            "color": "#fe8a13"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
    e.preventDefault();
});    
    
</script>