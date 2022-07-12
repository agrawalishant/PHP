<script type="text/javascript">
   var site_url = "<?php echo site_url(); ?>";
</script>
<!-- Footer -->
      <footer class="bg-white iq-footer">
         <div class="container-fluid">
            <div class="row">
               <!--<div class="col-lg-6">-->
               <!--   <ul class="list-inline mb-0">-->
               <!--     <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>-->
               <!--     <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>-->
               <!--   </ul>-->
               <!--</div>-->
               <!--<div class="col-lg-6 text-right">-->
               <!--   Copyright 2020 <a href="#"> Exhibition </a> All Rights Reserved.-->
               <!--</div>-->
            </div>
         </div>
      </footer>
      <!-- Footer END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
      <script src="<?php echo site_url('assets/admin/js/jquery.min.js'); ?> "></script>
      <script src="<?php echo site_url('assets/admin/js/popper.min.js'); ?> "></script>
      <script src="<?php echo site_url('assets/admin/js/bootstrap.min.js'); ?> "></script>
      <!-- Appear JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/jquery.appear.js'); ?> "></script>
      <!-- Countdown JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/countdown.min.js'); ?> "></script>
      <!-- Counterup JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/waypoints.min.js'); ?> "></script>
      <script src="<?php echo site_url('assets/admin/js/jquery.counterup.min.js'); ?> "></script>
      <!-- Wow JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/wow.min.js'); ?> "></script>
      <!-- Apexcharts JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/apexcharts.js'); ?> "></script>
      <!-- Slick JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/slick.min.js'); ?> "></script>
      <!-- Select2 JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/select2.min.js'); ?> "></script>
      <!-- Owl Carousel JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/owl.carousel.min.js'); ?> "></script>
      <!-- Magnific Popup JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/jquery.magnific-popup.min.js'); ?> "></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/smooth-scrollbar.js'); ?> "></script>
      <!-- lottie JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/lottie.js'); ?> "></script>
      <!-- Chart Custom JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/chart-custom.js'); ?> "></script>
      <!-- Custom JavaScript -->
      <script src="<?php echo site_url('assets/admin/js/custom.js'); ?> "></script>
      <script src="<?php echo site_url('assets/admin/js/mycustomjs.js'); ?> "></script>
      <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript">


$('body').on('click','.active',function(){ 
  var ac = $(this).attr('myid');
  
  uri = '<?=base_url()?>Administrator/active';
  
     $.ajax({
     type: "POST",
     url: uri, 
     data: {id: ac},
     dataType: "text",  
     cache:false,
     success: 
          function(response){
            window.location.reload();
          }
      });

});


$('body').on('click','.inactive',function(){
        var ac = $(this).attr('myid');
     
     uri = '<?=base_url()?>Administrator/inactive';
  
     $.ajax({
     type: "POST",
     url: uri, 
     data: {id: ac},
     dataType: "text",  
     cache:false,
     success: 
          function(response){
            window.location.reload();
          }
      });
    });



   // profile pic upload At Admin

    $(document).on('change','#profileId #image',function(e){

       var fileName = e.target.files[0].name;
       var image = $('#image').val();
       var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

        if(!img_ex.exec(image)){
            alert('Please upload only .jpg/.jpeg/.png/.gif file.');
            $('#image').val('');
            return false;

        }else{
         
         var th=$(this);
         var url=baseurl+'/update_profile_image';

          $.ajax({
             type:'POST',
             url:url,
             data: new FormData($('#profileId')[0]),
             processData: false,
             contentType: false, 
             dataType:'json',
             beforeSend: function()
          {
            $('.loading').fadeIn();
          },
           success:function(data){

            if(data.success==true){

            $('#imagePreview').attr("src", baseurl+data.targetPath);
            $('#image').attr("value", baseurl+data.targetPath);

             }else if(data.success==false){

              window.location.href = data.redirect;
       
             }else{

               $.each(data.errors, function(key, value) {
               $('.loading').fadeOut(5000);
               var element = $('#' + key);
               jQuery('.alert-danger'+key).show();
               jQuery('.alert-danger'+key).append(value);

            });
          }
        }
      });
     }
   });

$(document).ready(function(){
  $(".dropdown").click(function(){
    $(".submenu").slideToggle(1000);
  });
});
</script>
  
 </body>
</html>