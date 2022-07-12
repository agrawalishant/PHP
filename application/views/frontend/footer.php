<style>

.whatsup-desk-view a i {
    color: #fff;
    font-size: 45px;
}
.whatsup-mob-view a i {
    color: #fff;
    font-size: 35px;
}

    .whatsup-desk-view {
    visibility: visible;
    position: fixed;
    right: 10px;
    bottom: 10px;
   background: #29ac00;

    z-index: 999;
    width: 60px !important;
    height: 60px;
    border-radius: 100%;
    
}

    .whatsup-mob-view {
        visibility: hidden;
        position: fixed;
    right: 10px;
    bottom: 10px;
   background: #29ac00;

    z-index: 999;
    width: 60px !important;
    height: 60px;
    border-radius: 100%;
    
}
    
    
    @media(max-width:767px){
.whatsup-desk-view {
      visibility: hidden;
     display: none !important;
    
}
.whatsup-mob-view {
    visibility: visible;
        z-index: 1;
            width: 50px !important;
    height: 50px;
    border-radius: 100%;
}
} 
    
</style>


 
  
  
  
  <!-- Footer-->

    <footer class="footer ">
        <div class="container-page ">

            <div class="footer-warpper ">

                <div class="footer-top">
                    <!--container-->
                    <div class="container ">

                        <div class="footer-top  clearfix ">

                            <div class="footer-bottom-content clearfix ">

                                <div class="row">
                                    <div class= "logo-footer col-lg-3 col-sm-6">
                                        <div class="content-footer">
                                            <img src="<?php echo base_url();?>assets/images/dv-white-logo.png" alt="">
                                            <!--<h5><a href="tel:+02088908135"  style="color:#FFFFFF">Phone No.:- 02088908135</a></h5>-->
                                            <h5><a href="tel:+07928043288" style="color:#FFFFFF">Mobile No:- 07928043288</a></h5>
                                            <h5>Address:- 36 Parkfield Road, Feltham, Greater London, </h5>
                                           <h5> TW13 7LG, United Kingdom</h5>
                                            <h5>Email ID:- info@dvdrive.co.uk</h5>
                                            
                                            <ul class="footer-social-icon" >
                                                <li><a href="https://www.facebook.com/Dvdrive-104783624913510" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="https://twitter.com/dvdrive" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                                 <li><a href="https://www.instagram.com/dv.drive/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                                   <li class="whatsup-desk-view"><a href="https://web.whatsapp.com/send?phone=447928043288&text=Hi,I%20would%20like%20to%20know%20more%20about%20DV%20Driving"><i class="fa fa-whatsapp"></i></a></li>
                                                   <li class="whatsup-mob-view"><a href="https://api.whatsapp.com/send?phone=447928043288&text=Hi,I%20would%20like%20to%20know%20more%20about%20DV%20Driving"><i class="fa fa-whatsapp"></i></a></li>
                                                 
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="content-footer">

                                            <h5>Our Products</h5>

                                            <ul class="list-menu ft-menu">
                                                <li>
                                                    <a href=""><img src="https://www.dvdrive.co.uk/assets/images/play-store-icon.png" class="play-stor-img" alt=""></a>
                                                    <a href="https://play.google.com/store/apps/details?id=com.pnpuniverse.mock_up_test"><img src="https://www.dvdrive.co.uk/assets/images/store-icon-02.png" class="play-stor-img"></a>
                                                    <a href="">Mock up </a>
                                                    
                                                </li>


                                                <li>
                                                    <img src="https://www.dvdrive.co.uk/assets/images/play-store-icon.png" class="play-stor-img" alt="">
                                                     <img src="https://www.dvdrive.co.uk/assets/images/store-icon-02.png" class="play-stor-img">
                                                    <a href=" ">Instructor training</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div style="width: 215px;margin-left: 12px;margin-top: 28px;">
                                        <div class="content-footer">
                                             <div class="text-footer ">
                                                
                                                <ul class="list-menu ">
                                                    <li style="line-height: 2;">
                                                        <a href="<?php echo base_url('Terms-Conditions');?>">Instructor Terms & Conditions</a>
                                                    </li>
                                                    <li style="line-height: 2;">
                                                        <a href="<?php echo base_url('Terms-Conditions2');?>">Student Terms & Conditions</a>
                                                    </li>
                                                    <li style="line-height: 2;">
                                                        <a href="https://www.gov.uk/government/publications/car-show-me-tell-me-vehicle-safety-questions/car-show-me-tell-me-vehicle-safety-questions" target="_blank" >Show me Tell me</a>
                                                    </li>
                                                     <li style="line-height: 2;">
                                                        <a href="<?php echo base_url('Privacy-Policy');?>">Privacy Policy</a>
                                                    </li>
                                                    <li style="color: #fff;line-height: 2;">
                                                        ICO Certification<br>Ref. No.-ZA790714
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4  col-sm-6 col-xs-12">

                                        <div class="content-footer">

                                           <!--  <img src="assets/images/icons/email-1.svg" alt=""> -->

                                            <h5>Enquiry Form</h5>

                                            <!-- Newsletter -->
                                             
                                            <div class="subscribe-form">

                                                <!-- <form action="#" method="post" class="subscribe-mail"> -->
                                                    <div class="form-group ft-form">
                                                        <input type="email" name="submail" id="smailber" class="form-control email-input" placeholder="Enter your email" required>
                                                        <input type="text" name="number" id="sbnumber" class="form-control email-input" placeholder="Enter your number" required>
                                                        <textarea id="w3review" name="w3review" rows="4" cols="37" class="form-control" placeholder="Type your Message" ></textarea>
                                                    </div>
                                                    <button type="button" class="subBtn" onclick="Subscribemails();">Submit</button>
                                                    <span id="shsubmail" style="color: white;"></span> 
                                                    <span id="shsubmails" style="color: white;"></span>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                        <!-- Newsletter -->

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <!--container-->
                </div>

            </div>
        </div>

      

    </footer>

    <!--Footer -->
    <!-- jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.jqueryui.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript">
     
     $(document).ready(function() {
        $('#datatableinstboooking').DataTable();
     });
        
     $(document).ready(function() {
        $('#datatable').DataTable();
     });
     $(document).ready(function() {
        $('#example_datatable').DataTable();
     });
     $(document).ready(function() {
        $('#postcode_datatable').DataTable();
     });
    $(document).ready(function() {
        $('#holiday_datatable').DataTable();
     });


    function goBack() {
      window.history.back()
    }

    function Subscribemails()
    {
        var submail = document.getElementById("smailber").value;
        var subnumber = document.getElementById("sbnumber").value;
        var submessage = document.getElementById("w3review").value;
        
        if(submail =='')
        {
            alert('Please Fill the Email');
            return false;
        }
        if(subnumber=='')
        {
            alert('Please Fill the Number');
            return false;
        }
        if(subnumber.length != 10)
        {
            alert('Mobile number must be 10 digits');
            return false;
        }
        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if(submail.match(mailformat))
        {
             uri = '<?=base_url()?>Driving/subscribe';
            //alert(uri);
            $.ajax({
              url:uri,
              type: "POST", 
              dataType:'json',
              data:{ sumail : submail, subnumber : subnumber, submessage : submessage },
              success: function (res){

                if(res.success == '1'){ 
                     $('#shsubmail').html(res.submsg);
                     $('#smailber').val(' ');
                     $('#sbnumber').val(' ');
                     $('#w3review').val(' ');
                   }
                if(res.success == '0'){ 
                     $('#shsubmails').html(res.submsg);
                     $('#smailber').val(' ');
                     $('#sbnumber').val(' ');
                     $('#w3review').val(' ');
                   }      
              },
          });
        }
        else
        {
        alert("You have entered an invalid email address!");
        return false;
        }
        
            
        
    } 

    function myFunction() 
    {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function myFunctions() 
    {
      var x = document.getElementById("myInputs");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
//////////////////// Image Validate ////////////////////////
    
    function ValidateExtension() 
    {
        var allowedFiles = [".jpg", ".jpeg", ".png",".gif"];
        var fileUpload = document.getElementById("photo").value;
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        if (regex.test(fileUpload)!=true) { 
            alert('Invalid file type');
            $("#photo").val('');
            return false;
        }
        else
        {
            return true;    
        }
    }
    
    
    </script>
</body>
</html>
