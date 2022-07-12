  

  <script>

      $(document).ready(function() {

        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {

        e.preventDefault();

        $(this).siblings('a.active').removeClass("active");

        $(this).addClass("active");

        var index = $(this).index();

        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");

        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");

         });

        });

  </script>

  

  <div class="warpper clearfix">



        <!--Features app-->



    <section id="features-app" class="padd-80 head-section">
        
          
          <div class="container">
              <?php if($this->session->flashdata('bookedmsg')!='') { ?>
                <div class="alert alert-success">
                  <?php echo $this->session->flashdata('bookedmsg'); ?>
                </div>
                <?php } 
                if(!empty($result)) {
                ?>
                
                <div id="showmessg">
                    <h4>Name:- <?php echo $result[0]['name']; ?> </h4>
                </div>
                <?php } ?>
                <div class="row tim-sec">
                    <div class="row">
                        <div class="col-md-12">
                        <?php 
                        if(isset($category)) { ?>
                        
                            <?php if($category == 1 ) { ?>
                            <input type="hidden" value="1" id="vt" />
                            <input type="text" value="Manual" class="dr-test" disabled/>
                            <?php } ?>
                            <?php if($category == 2 ) { ?>
                            <input type="hidden" value="2" id="vt" />
                            <input type="text" value="Automatic" class="dr-test" disabled/>
                            <?php } ?>
                            <?php if($category == 3 ) { ?>
                        <select id="vt" class="form-control" style="width: 250px;" onchange="categ();">
                            <!--<option value="0">Select Vechical Type</option>-->
                            <option value="1">Manual</option>
                            <option value="2">Automatic</option>
                            <?php } ?>
                        </select>
                        <?php } ?>
                    </div> 
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
                        <div class="col-md-4 col-sm-12 col-xs-12 bhoechie-tab-menu">
                            <div class="list-group-item text-center">
                                <h3>Date</h3>
                                <input type="hidden" name="id" id="ids" value="<?php if(!empty($result_time)) { echo $result_time[0]['inst_id']; } ?>">
                                <i class="fa fa-calendar-check-o" aria-hidden="true"> View Calender</i>
                                <input type="date" class="form-control" name="dates" min="<?php echo date('Y-m-d'); ?>" id="dates" onchange="myfunc();">
                                <!--<input type="text" name="dates" class="form-control dates" id="dates" onchange="myfunc();">-->
                                <input type="hidden" name="rad_id" id="rad_id" value="<?php echo uniqid(); ?>" />
                            </div>
                            <div class="list-group">
                                <?php 
                                    if(!empty($result_time)) { 
                                    $inst_id = $result_time[0]['inst_id'];
                                    $da = $result_time[0]['day'];
                                    $day_time = $this->Generalmodel->get_all_whereGroupBy('instructor_time_slots',array('inst_id'=> $inst_id,'day!='=>$da),'day');
                                ?>
                                
                                <a href="#" class="list-group-item active text-center">
                                  <h4 class="glyphicon glyphicon-plane dayview"><?php echo $da; ?></h4>
                                </a>
                                <?php foreach($day_time as $res) { ?>
                                <a href="#" class="list-group-item  text-center dayhid">
                                  <h4 class="glyphicon glyphicon-plane"><?php echo $res['day']; ?></h4>
                                </a>
                                <?php } } ?>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12 bhoechie-tab">
                    <!-- flight section -->
                    <div class="list-group-item text-center cl">
                      <h3>Time</h3>
                    </div>
                    <div class="table-responsive bhoechie-tab-content active timeslott">
                      
                        <?php if(!empty($result_time)) { 
                             $details = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $inst_id,'day='=>$da));
                             $charg = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $inst_id));
                            if($category==1 ||3)
                            {$chrday = "manual_".strtolower($da); }
                            if($category==2)
                            {$chrday = "auto_".strtolower($da);}
                            
                            foreach($details as $value) {
                        ?>
                            <table class="table table-bordered table-striped col-md-12 amtcor">
                                <tbody class="dv-tm checks" >
                                    <!--<p>-->
                                    <tr>
                                        <td>
                                            <?php $chg=$charg[0][$chrday]; ?>
                                            <input type="checkbox" class="timeslots checksinput" name="timeslot[]" myprice="<?php echo $chg; ?>" value="<?php echo $value['id'];?>" />
                                        </td>
                                        <td class="">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <?php echo $value['start_time']; ?> - <?php echo $value['end_time']; ?>
                                        </td>                                        
                                        <td class="td-01">
                                            <?php if(!empty($chg)) { ?><i class='fa fa-gbp'></i>
                                            <input type="hidden"  class="addchr" name="addchr[]" value="<?php echo $chg; ?>" />
                                        <?php echo $chg*2 ?>&nbsp&nbsp&nbsp&nbsp<?php echo "(<i class='fa fa-gbp'></i>".$chg."/hour)" ; } ?>    
                                        </td>
                                        
                                    <!--</p>-->
                                    </tr>
                                </tbody>
                            </table>
                            <?php 
                            }
                        }
                            ?>
                    </div>
                    <?php if(!empty($day_time)) { foreach($day_time as $res) { ?>
                    <div class="table-responsive bhoechie-tab-content ">
                    <?php if(!empty($result_time)) { 
                            $details = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $inst_id,'day='=>$res['day']));
                            $chargs = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $inst_id));
                            if($category==1 ||3)
                            {$chday = "manual_".strtolower($res['day']); }
                            if($category==2)
                            {$chday = "auto_".strtolower($res['day']);}
                            $i=0;
                            foreach($details as $value) { ?>
                            <table class="table table-bordered table-striped col-md-12 amtcor" >
                                <tbody class="dv-tm checks" >
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="timeslots checksinput" name="timeslot[]" myprice="<?php echo $chargs[0][$chday]; ?>" value="<?php echo $value['id'];?>" />    
                                        </td>
                                        <td>
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <?php echo $value['start_time']; ?> - <?php echo $value['end_time']; ?>
                                        </td>
                                        <td class="td-01">
                                            <i class='fa fa-gbp'></i><?php echo $chargs[0][$chday]*2; ?>&nbsp&nbsp&nbsp&nbsp <?php echo "(<i class='fa fa-gbp'></i>".$chargs[0][$chday]."/hour)" ; ?>
                                            <input type="hidden"  class="addchr" name="addchr[]" value="<?php echo $chargs[0][$chday]; ?>" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    <?php } } ?>
                        </div>
                    <?php } } ?>
                    </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?php echo site_url('Products/buySlots');?>" id="slotbookingform" method="post">
                                <input type="hidden" name="timeslots_data[]" value='' id="timeslots_data" />
                                <input type="hidden" name="bkdates_data[]" value='' id="bookingdate_data" />
                                <input type="hidden" name="totalcharges_data" value='' id="totalcharges_data" />
                                <input type="hidden" name="inst_id" value='<?php echo $inst_id;?>' id="instructor_id"  />
                                <input type="hidden" name="randam_id" value='<?php echo $inst_id;?>' id="randam_id"  />
                                <?php $stu_id = $this->session->userdata('student_session'); $st_id = $stu_id['res'][0]['id']; //echo $st_id; ?> 
                                <input type="hidden" name="stu_id" value='<?php echo $st_id;?>' id="student_id"  />
                                <!--<input type="submit" class="btn btn-primary" name="submit_timeslot" value="Book Now" id="book_now_btn" />-->
                                <input type="button" class="btn btn-primary" name="submit_timeslot" value="Book Now" id="book_now_btn" onclick="gopaypal();" />
                            </form>
                        </div>
                    </div>  
                    <!-- content tab-->

                    <!-- content tab-->

                </div>
            </div>
   
            <!--container-->
        </div>
        <!--The Login Modal-->
        <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Student Login </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!--<form action="<?php //echo site_url('Student/paypalStuLogin');?>" method="post">-->
              <div class="modal-body">
                  
        
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                             <span ><?php echo form_error('email'); ?></span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                             <span ><?php echo form_error('password'); ?></span>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="checkboexslog" />
                            <a href="<?php echo base_url('Terms-Conditions');?>" target="_blank"> I Agree Terms & Conditions</a>
                        </div>
                    </div>
                      
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <span id="loginfailmsgshow"></span>
                      </div>
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="modelactionbtn" class="btn btn-primary" onclick="checkstulogin();">Login</button>
              </div>
              </div>
            </div>
          </div>
        </div>
        
    </section>

   <!--contact-->

</div>

<script type="text/javascript">
        

  
  $( function() {
    $( ".dates" ).datepicker();
  });
  


    function gopaypal()
    {
        var bkdates_data = document.getElementById('bookingdate_data').value;
        var timeslots_data = document.getElementById('timeslots_data').value;
        var totalcharges_data = document.getElementById('totalcharges_data').value;
        var inst_id = document.getElementById('instructor_id').value;
        var student_id = document.getElementById('student_id').value;
        var randam_id = document.getElementById('randam_id').value;
        
        if(student_id >0)
        {
            uri = '<?=base_url()?>Instructor/bookingstus';
            
            $.ajax
            ({
                url:uri,
                type: "POST", 
                dataType:'json',
                data:{ ran_id : randam_id, time : timeslots_data },
                success: function (res)
                {
                },
            });
            $('#slotbookingform').submit();
            
        }
        else
        {
            $('#LoginModal').modal('show');
        }
        
    }
    
    function checkstulogin()
    {
        $('#loginfailmsgshow').html('');
        $('modelactionbtn').html('wait...');
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        
        if(email=='')
        {
            alert('Please write Email'); 
             $('modelactionbtn').html('Login');
             return (false);
        }
        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))
        {
          //  return (true);
        }
        else
        {
            alert('Type Proper Email');
             $('modelactionbtn').html('Login');
             return (false);
        }
        if(password=='')
        {
            alert('Please write Password'); 
            $('modelactionbtn').text('Login');
             return (false);
        }
        if(document.getElementById("checkboexslog").checked ==false)
        {
            alert("Please Agree Terms & Conditions ");
            return false;
        }
        url = '<?=base_url()?>Student/paypalStuLogin';
        
            $.ajax({
                url:url,
                method: 'post',
                data: {email: email, password : password },
                dataType: 'json',
                success: function(response)
                {
                    if(!response.success)
                    { 
                        //$('#loginfailmsgshow').html(response.logmsgemail);
                        $('#loginfailmsgshow').html(response.logmsg);
                         $('modelactionbtn').html('Login');
                    }
                    else
                    {
                        $('#loginfailmsgshow').html(response.logmsgok);
                        document.getElementById('student_id').value=response.studentid;
                        
                        setTimeout(function(){
                            $('#LoginModal').modal('hide');
                        }, 1000);
                        $('modelactionbtn').html('Login');
                    }
                }
            });
        
    }
        
    // function bookajvech()
    // {
    //     var Vechical = document.getElementById('vt').value; 
    //     var instids = document.getElementById('insid').value; 
    //     var starttime = document.getElementById('stime').value; 
    //     var endtime = document.getElementById('etime').value;        
        
    //     if(Vechical == 0 )
    //     {
    //         alert('Please Select Vechical Type');
    //         return false;
    //     }

    //      $.ajax({
    //             url:'<?=base_url()?>Student/bookingconfirmed',
    //             method: 'post',
    //             data: {vt: Vechical, instid : instids, st: starttime, et: endtime },
    //             dataType: 'json',
    //             success: function(response)
    //             {
    //                 if(response.success == 'true')
    //                 { 
    //                     $('#showmessg').html(response.jmsg);        
    //                 }
    //             }
    //       });
    // }


    function myfunc()
    {
        var id = document.getElementById('ids').value;
        var date = document.getElementById('dates').value;
        var Vechical = document.getElementById('vt').value;
        //alert(id);
        if(Vechical == 0 )
        {
            alert('Please Select Vechical Type');
            return false;
        }
        $.ajax({
                url:'<?=base_url()?>Instructor/book_class_date',
                method: 'post',
                data: {dates: date, instid : id, vtype: Vechical },
                dataType: 'json',
                success: function(response)
                {
               // console.log(response);
                    if(response.success == 'true')
                    {
                        $('.dayhid').hide();  
                        $('.dayview').html(response.jdays);  
                        $('.timeslott').html(response.jmsg);        
     //                   $('.timeslotthhhh').html(response.jdays);        
                    }
                    else
                    {
                        $('.timeslott').hide();
                        $('.jtimmsgs').html(response.jtimmsg);              
                    }
                }
           });
    }
    
    
     $(document).ready(function(){
        $('#book_now_btn').attr("disabled",true);
    });     

    $(document).on('click','.checks',function(){
        var ckdates = document.getElementById('dates').value;
        
        if(ckdates =='' )
        {
            alert('Please first select date for booking');
            //return false;
        }
        else
        {
            if($(this).find('input[name="timeslot[]"]').prop("checked") == true)
            {
                $(this).find('input[name="timeslot[]"]').prop('checked',false);
            }
            else{
            $(this).find('input[name="timeslot[]"]').prop('checked',true);
            }
            
            //$(document).ready(function(){
             $('#book_now_btn').attr("disabled",false);
            //$(".checks").click(function(){
                var timeslots='';
                var bkdate=''
                var addcharges=0;
                var come;
                var totalcharges=0;
                var slotCounter=0;
                var randam_id = document.getElementById('rad_id').value;
                
                        timeslots=$(this).find('input[name="timeslot[]"]').val();
                        come = $(this).find('input[name="timeslot[]"]').attr('myprice');
                        console.log(randam_id,ckdates,timeslots,come);
                        
                        $.ajax({
                                url:'<?=base_url()?>Instructor/booking_slots',
                                method: 'post',
                                data: {date: ckdates, time : timeslots, price: come, rand_id : randam_id },
                                dataType: 'json',
                                success: function(response)
                                {
                               // console.log(response);
                                    if(response.success == 'true')
                                    {
                                        $('#book_now_btn').attr("disabled",false);
                                        $('#timeslots_data').val(response.time);
                                        $('#bookingdate_data').val(response.date);
                                        $('#totalcharges_data').val(response.amt);
                                        $('#randam_id').val(response.randam);
                                    }
                                    else
                                    {
                                        $('#book_now_btn').attr("disabled",true);
                                    }
                                }
                           });
                        
                        //slotCounter++;
                    //}
                //}); 
                // if(slotCounter>0){
                //     $('#book_now_btn').attr("disabled",false);
                // }else{
                //     $('#book_now_btn').attr("disabled",true);
                // }
                // $('#timeslots_data').val(timeslots);
                // $('#bookingdate_data').val(bkdate);
                // $('#totalcharges_data').val(totalcharges);
           // });
        //});
        }
        
    });
    
   $('body').on('click','.checksinput',function(){ 
        if($(this).prop("checked") == true)
        {
            $(this).prop('checked',false);
     
        }
        else{
        $(this).prop('checked',true);
             //$('#book_now_btn').attr("disabled",false);
        }
        
    });

// $(document).on('click','.checks',function(){
//     if($(this).parents("tr").find('input[name="timeslot[]"]').prop("checked") == true)
//     {
//         $(this).parents("tr").find('input[name="timeslot[]"]').prop('checked',false);
 
//     }
//     else{
//     $(this).parents("tr").find('input[name="timeslot[]"]').prop('checked',true);
        
//     }
    
// });

// function categ()
// {
//     var Vechical = document.getElementById('vt').value;
//     if(Vechical ==  )
//     {
//         alert('Please Select Vechical Type');
//         return false;
//     }
//     else
//     {
//         alert('Please Select Vechical Type');
//         return false;
//     }
    
        
// }
    
</script>