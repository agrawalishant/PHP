// fordata table

  $(document).ready( function () {
	$('#example')
    	.addClass( 'nowrap' )
	    .dataTable( {
	    	responsive: true,
	    	columnDefs: [
			 { targets: [-1, -3], className: 'dt-body-right' }
		]
	} );
} );

$('body').on('change','#loading1', function(){

    var state = $('#loading1 :selected').val();
    var myurl = site_url + "Frontend/getcities/"+state ;
     
  $.ajax({
  url:myurl ,
  dataType:"json",
  success: function(res){
      var cityhtml = '<option value="0" selected disabled>Please Select City</option>';
      $(res).each(function(i,v){
      cityhtml += '<option value="'+v.name+'">'+v.name+'</option>';
     });
       $('body').find('#city').html(cityhtml); 
   },
  });
});

$('body').on('change','#loading2', function(){

    var state = $('#loading2 :selected').val();
    var myurl = site_url + "Frontend/getcities/"+state ;
     
  $.ajax({
  url:myurl ,
  dataType:"json",
  success: function(res){
      var cityhtml = '<option value="0" selected disabled>Please Select City</option>';
      $(res).each(function(i,v){
      cityhtml += '<option value="'+v.name+'">'+v.name+'</option>';
     });
       $('body').find('#city1').html(cityhtml); 
   },
  });
});

$(document).on('keypress', '#fname', function (event) {

 var regex = new RegExp("^[a-zA-Z ]+$");
 var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
      event.preventDefault();
      return false;
    } 
});

$(document).on('keypress', '#keyPerson', function (event) {

 var regex = new RegExp("^[a-zA-Z ]+$");
 var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
      event.preventDefault();
      return false;
    } 
});

var checkValidation = true;

function step_one(){
    checkValidation = true;

    var name = document.getElementById('fname').value;
    if (name == '') {
        $('.FullName').html('Please Enter Name');
        $('#fname').focus();
        checkValidation = false;  return false;
    } else { 
        $('.FullName').html('');
        checkValidation = true; }

    var UserName = document.getElementById('uname').value;
    if (UserName == '') {
        $('.username').html('Please Enter User Name');
        $('#uname').focus();
        checkValidation = false;  return false;
    } else {  $('.username').html(''); 
    checkValidation = true; }

    var password = document.getElementById('password').value;
    if (password == '') {
        $('.password').html('Please Enter Password');
        $('#password').focus();
        checkValidation = false; return false;
    } else { $('.password').html(''); checkValidation = true; }

    var repassword = document.getElementById('repass').value;
    if (repassword == '') {
        $('.repass').html('Please Re-Type Your Password');
        $('#repass').focus();
        checkValidation = false; return false;
    } else { checkValidation = true; $('.repass').html(''); }

    var password = document.getElementById('password').value;
    var repassword = document.getElementById('repass').value;
    if (password == repassword) { 
        checkValidation = true;  
        $('.repass').html('');  } else {
        $('#password').focus(); $('#repass').focus();
        $('.repass').html('Your password does not Match ');
        checkValidation = false;  return false;
    }

    var profession = document.getElementById('profession').value;
    if (profession == '') {
       $('.profession').html('Please Select Your Profession');
       $('#profession').focus();
       checkValidation = false; return false;
    } else { $('.profession').html(''); checkValidation = true; }

    var state = document.getElementById('loading1').value;
    if (state == '') {
        $('.state').html('Please Select Your State');
        $('#loading1').focus();
        checkValidation = false; return false; 
        } else { $('.state').html(''); checkValidation = true; }

    var city = document.getElementById('city').value;
    if (city == 0) {
        $('.city').html('Please Select Your City');
        $('#city').focus();
        checkValidation = false; return false; 
        } else { $('.city').html(''); checkValidation = true; }

    var emailfilter = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
    var regemailid = emailfilter.test(document.getElementById("email").value);
    (regemailid);
    if (regemailid == false) {
        $('.email').html("Please Enter a valid Mail ID");
        $("#email").focus();
          checkValidation = false; return false; 
        } else {  
          $('.email').html(""); checkValidation = true; }

    var contact = document.getElementById('partycontact').value;
    if (contact == '') {
        $('.contact').html('Please Enter Contact number');
        $('#partycontact').focus();
        checkValidation = false; return false; 
        } else { 
           $('.contact').html(''); checkValidation = true; }

    if(isNaN(contact)) {
        $('.contact').html("Enter the valid Mobile Number(Like : 9876543210)");
        $("#partycontact").focus();
        checkValidation = false; return false; 
        } else {   
          $('.contact').html(""); checkValidation = true; }
          
     if((contact.length < 10) || (contact.length > 10))
    {
    alert(" Your Mobile Number must be 1 to 10 Integers");
    document.getElementById("partycontact").focus();
    $('#partycontact').css('border-color','#ff0000');
    return false;
    }else{
    $('#partycontact').css('border-color','#000000');
    }

    if (!(contact.charAt(0)=="9" || contact.charAt(0)=="8"||contact.charAt(0)=="7"||contact.charAt(0)=="6"))
    {
    alert("Mobile No. should start with 9 or 8 or 7 or 6 ");
    document.getElementById('partycontact').focus();
    $('#partycontact').css('border-color','#ff0000');
    return false;
    }else{
    $('#partycontact').css('border-color','#000000');
    }          

    if(checkValidation == true) {
      $('.btnNextDummy').css('display','none');
      $('.btnNext').css('display','block');
      $('.btnNext').click();
 
    var modalurl = site_url + "send-sms-email";
    var fname = $('#fname').val();
    var uname = $('#uname').val();
    var password = $('#password').val();
    var email = $('#email').val();
    var partycontact = $('#partycontact').val();

    $.ajax({
        url: modalurl,
        type: "POST",
        data: { fname :fname, uname : uname, password :password,
                email : email, partycontact :partycontact } ,
        dataType: "json",
        success: function(result) {
            if (result.success == true) {
                alert(" OTP is Send on your Entered Mobile ");
                  $('#edocmbl').val(result.otp);
                  $('#getthisid').val(result.lastid);
               } else if (result.success == false) {
                  alert("Something Went Wrong");
             }
           }
         });
       }else{
          return false; 
       }
    }
   
   function checkotp(){
        
     var otp = document.getElementById('verifyOtp').value;
      if (otp == '') {
        $('.otp').html('Please Enter Verification Code to proceed');
        $('#verifyOtp').focus();
        checkValidation = false; return false; 
        } else { $('.otp').html(''); checkValidation = true; }
        
        
    var checkOtp = document.getElementById('edocmbl').value;
    if (otp == checkOtp) { 
        checkValidation = true;  
        $('.otp').html('');  } else {
        $('#verifyOtp').focus();
        $('.otp').html('Your OTP does not Match please try again');
        checkValidation = false;  return false;
    }  
        
     if(checkValidation == true){
       $('.btnNextDummy1').css('display','none');
       $('.btnNext1').css('display','block');
       $('.btnNext1').click();
     }
         
    }   
    
    function resendOption(){
        
    var modalurl = site_url + "send-sms-email";
    var fname = $('#fname').val();
    var uname = $('#uname').val();
    var password = $('#password').val();
    var email = $('#email').val();
    var partycontact = $('#partycontact').val();

    $.ajax({ 
        url: modalurl,
        type: "POST",
        data: { fname :fname, uname : uname, password :password,
                email : email, partycontact :partycontact } ,
        dataType: "json",
        success: function(result) { 
            if (result.success == true) {
                alert("OTP is Send on your Entered Mobile ");
                $('#edocmbl').val(result.otp); 
                $('#getthisid').val(result.lastid);
            } else if (result.success == false) {
                alert("Something Went Wrong");
            }
          }
         });
       
      } 

 function step_three(){
   
   var name = document.getElementById('companyName').value;
    if (name == '') {
        $('.companyName').html('Please Enter Company Name');
        $('#companyName').focus();
        checkValidation = false;  return false;
    } else { 
        $('.companyName').html('');
        checkValidation = true; }

   var keyPerson = document.getElementById('keyPerson').value;
    if (keyPerson == '') {
        $('.keyPerson').html("Please Enter Key person's Name");
        $('#keyPerson').focus();
        checkValidation = false;  return false;
    } else { 
        $('.keyPerson').html('');
        checkValidation = true; }
    
     var designation = document.getElementById('designation').value;
    if (designation == '') {
        $('.designation').html("Please Enter Key person's Designation");
        $('#designation').focus();
        checkValidation = false;  return false;
    } else { 
        $('.designation').html('');
        checkValidation = true; }
        
   var cm_address = document.getElementById('cm_address').value;
    if (cm_address == '') {
        $('.cm_address').html("Please Enter Company's Address");
        $('#cm_address').focus();
        checkValidation = false;  return false;
    } else { 
        $('.cm_address').html('');
        checkValidation = true; }
    
    var state = document.getElementById('loading2').value;
    if (state == '') {
        $('.cm_state').html('Please Select State');
        $('#loading2').focus();
        checkValidation = false; return false; 
        } else { $('.cm_state').html(''); checkValidation = true; }

    var city = document.getElementById('city1').value;
    if (city == 0) {
        $('.cm_city').html('Please Select City');
        $('#city1').focus();
        checkValidation = false; return false; 
        } else { $('.cm_city').html(''); checkValidation = true; }
        
      var cm_mobile = document.getElementById('cm_mobile').value;
    if (cm_mobile == '') {
        $('.cm_mobile').html('Please Enter Contact number');
        $('#cm_mobile').focus();
        checkValidation = false; return false; 
        } else { 
           $('.cm_mobile').html(''); checkValidation = true; }

    if(isNaN(cm_mobile)) {
        $('.cm_mobile').html("Enter the valid Mobile Number(Like : 9876543210)");
        $("#cm_mobile").focus();
        checkValidation = false; return false; 
        } else { $('.cm_mobile').html(""); checkValidation = true; }
          
    if((cm_mobile.length < 10) || (cm_mobile.length > 10))
    {
    $('.cm_mobile').html(" Your Mobile Number must be 1 to 10 Integers");
    $("cm_mobile").focus();
    return false;
    }else{ $('.cm_mobile').html(""); checkValidation = true; }

    if (!(cm_mobile.charAt(0)=="9" || cm_mobile.charAt(0)=="8"||cm_mobile.charAt(0)=="7"||cm_mobile.charAt(0)=="6"))
    {
        $('.cm_mobile').html("Mobile No. should start with 9 or 8 or 7 or 6 ");
        $('cm_mobile').focus();
        $('#cm_mobile').css('border-color','#ff0000');
        return false;
        }else{ $('.cm_mobile').html(""); checkValidation = true; }          
          
    var cm_email = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
    var regemailid = cm_email.test(document.getElementById("cm_email").value);
    (regemailid);
    if (regemailid == false) {
        $('.cm_email').html("Please Enter a valid Mail ID");
        $("#cm_email").focus();
          checkValidation = false; return false; 
        } else {  
          $('.cm_email').html(""); checkValidation = true; }
          
    var productServices = document.getElementById('productServices').value;
    if (productServices == '') {
        $('.productServices').html('Please Enter Product and Services');
        $('#productServices').focus();
        checkValidation = false;  return false;
    } else { 
        $('.productServices').html('');
        checkValidation = true; }
        
//     var visitingCard = document.getElementById("visitingCard").value;
//     var ext = visitingCard.split('.').pop().toLowerCase();
    
//     if(visitingCard == ""){
//         $('.photo').html("Please upload Visiting Card");
//         $("#visitingCard").focus();
//         checkValidation = false;  return false;  
//      }else{
//          $('.photo').html(""); checkValidation = true; }
    
//     if(visitingCard!="") ['pdf','doc','docx','xls']
//     {    
//      if($.inArray(ext, ['png','jpg','jpeg']) == -1)
//       {
//         $('.photo').html("Wrong File Format!..Please Select Right Format");
//         document.getElementById("visitingCard").focus();
//         $('#visitingCard').css('border-color','#ff0000');
//         return false; checkValidation = false;
//       }else{
//          $('.photo').html(""); checkValidation = true; }
//     } 

//  var brochure = document.getElementById("brochure").value;
//  var ext1 = brochure.split('.').pop().toLowerCase();
 
//      if(brochure == ""){
//         $('.brochure').html("Please upload Brochure");
//         $("#brochure").focus();
//         checkValidation = false;  return false;  
//     }   else{
//          $('.brochure').html(""); checkValidation = true; }
    
// if(brochure != ""){
// if(brochure!="") ['txt','php','html']
// {    
//  if($.inArray(ext1, ['png','jpg','jpeg','pdf','doc','docx','xls']) == -1)
//   {
//     $('.brochure').html("Wrong File Format!..Please Select Right Format");
//     document.getElementById("brochure").focus();
//     $('#brochure').css('border-color','#ff0000');
//     return false; checkValidation = false;
//   } else{
//          $('.brochure').html(""); checkValidation = true; }
// } }

    if(checkValidation == true) {
      $('.btnNextDummy2').css('display','none');
      $('.btnNext2').css('display','block');
      $('.btnNext2').click();
  }    
}

 $('body').on('click','.userStatus', function(){ 
     
      var id=  $(this).attr('id');
      var statusVal=  $(this).attr('myValue');
      var modalurl = site_url + "changeUserStatus";
        $.ajax({
        url: modalurl,
        type: "POST",
        data: { id :id, statusVal : statusVal } ,
        dataType: "json",
        success: function(result) {
            if (result.success == true) {
                alert(result.msg);
                  window.location.reload();
               } else if (result.success == false) {
                alert(result.msg);
             }
           }
         });
 });
 
 $('body').on('keyup','.checkPassword',function(){ 
    var password = document.getElementById('password').value;
    if (password == '') {
        $('.password').html('Please Enter Password');
        $('#password').focus();
        checkValidation = false; return false;
    } else { $('.password').html(''); checkValidation = true; }

    var repassword = document.getElementById('repass').value;
    if (repassword == '') {
        $('.repass').html('Please Re-Type Your Password');
        $('#repass').focus();
        checkValidation = false; return false;
    } else { checkValidation = true; $('.repass').html(''); }

    var password = document.getElementById('password').value;
    var repassword = document.getElementById('repass').value;
    if (password == repassword) { 
        checkValidation = true;  
        $('.repass').html('');  } else {
        $('#password').focus(); $('#repass').focus();
        $('.repass').html('Your password does not Match ');
        checkValidation = false;  return false;
    }
    
 });
 
  $('body').on('keyup','#email', function(){ 
      var email =  $(this).val();
      var modalurl = site_url + "checkEmailExist";
        $.ajax({
        url: modalurl,
        type: "POST",
        data: { email : email } ,
        dataType: "json",
        success: function(result) {
            if (result.success == true) {
                $('.email').html('');
               } else if (result.success == false) {
                 $('.email').html(result.msg);
                  $('#email').val('');
                 return false;
             }
           }
         });
 });
 
   $('body').on('keyup','#partycontact', function(){ 
      var mobile =  $(this).val();
      var modalurl = site_url + "checkMobileExist";
        $.ajax({
        url: modalurl,
        type: "POST",
        data: { mobile : mobile } ,
        dataType: "json",
        success: function(result) {
            if (result.success == true) {
                $('.contact').html('');
               } else if (result.success == false) {
                 $('.contact').html(result.msg);
                 $('#partycontact').val('');
                 return false;
             }
           }
         });
 });
 
  
 function checkEmailmobileExist(){ 
      var mobileoremail = $('#checkCredentials').val();
      
      if(mobileoremail == '') {
        $('.errorCheck').html('Please Enter Credentials');
        $('#checkCredentials').focus();
        return false;
    } else {  $('.errorCheck').html(''); }
    
      var modalurl = site_url + "check-Email-mobile-Exist";
        $.ajax({
        url: modalurl,
        type: "POST",
        data: { mobileoremail : mobileoremail } ,
        dataType: "json",
        success: function(result) { 
            if (result.success == true) {
                $('.successmsg').html(result.msg);
               } else if (result.success == false) {
                 $('.errorCheck').html(result.msg);
                 $('#checkCredentials').val('');
                 return false;
             }
           }
         });
 }
 
 setTimeout(function() { $('.cencel').click(); }, 1000);
 
 function checklogin(){
      var UserName = document.getElementById('username').value;
    if (UserName == '') {
        $('.username').html('Please Enter User Name');
        $('#username').focus();
        return false;
    } else {  $('.username').html(''); }

    var password = document.getElementById('password').value;
    if (password == '') {
        $('.password').html('Please Enter Password');
        $('#password').focus();
        return false;
    } else { $('.password').html(''); }
     
 }
 
  $('body').on('change','#centerExhibition', function(){ 
     
      var id=  $(this).attr('myid');
      var modalurl = site_url + "changeExStatus";
        $.ajax({
        url: modalurl,
        type: "POST",
        data: { id :id } ,
        dataType: "json",
        success: function(result) {
            if (result.success == true) {
                alert(result.msg);
                  // window.location.reload();
               } else if (result.success == false) {
                 alert(result.msg);
             }
           }
         });
 });