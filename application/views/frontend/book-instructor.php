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
            <!--container-->
        <div class="container">
            <div class="row tim-sec"><?php //echo "<pre>";print_r($result);exit;?>
                <h3>Instructor Name:-  <?php if(!empty($result)) { echo ucfirst($result[0]['name']); } ?></h3>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
               <?php if(isset($category)) { ?>
                        
                    <?php if($category == 1 ) { ?>
                    <input type="hidden" value="1" id="vt" />
                    <input type="text" value="Manual"  disabled style="text-align: center;"/>
                    <?php } ?>
                    <?php if($category == 2 ) { ?>
                    <input type="hidden" value="2" id="vt" />
                    <input type="text" value="Automatic" disabled style="text-align: center;"/>
                    <?php } ?>
                    <?php if($category == 3 ) { ?>
                <select id="vt" class="form-control" style="width: 250px;" onchange="categ();">
                    <!--<option value="0">Select Vechical Type</option>-->
                    <option value="1">Manual</option>
                    <option value="2">Automatic</option>
                    <?php } ?>
                </select>
                <?php } ?>
                <div class="col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">

                    <div class="col-md-4 col-sm-12 col-xs-12 bhoechie-tab-menu">
                        <div class="list-group-item text-center">
                                <h3>Date</h3><?php //echo "<pre>";print_r($result_time); ?>
                                <input type="hidden" name="id" id="ids" value="<?php if(!empty($result_time)) { echo $result_time[0]['inst_id']; } ?>">
                                <i class="fa fa-calendar-check-o" aria-hidden="true"> View Calender</i>
                                <input type="date" class="form-control" name="dates" min="<?php echo date('Y-m-d');?>" value="<?php if(!empty($cal_value)) { echo $cal_value; } ?>" id="dates" onchange="myfunc();">
                                <input type="hidden" name="rad_id" id="rad_id" value="<?php echo uniqid(); ?>" />
                            </div>
                            <div class="list-group">
                                <?php 
                                    if(!empty($result_time)) { 
                                    $inst_id = $result_time[0]['inst_id'];
                                    $da = $result_time[0]['day'];
                                    //$day_time = $this->Generalmodel->get_all_whereGroupBy('instructor_time_slots',array('inst_id'=> $inst_id,'day!='=>$da),'day');
                                    $day_time = $this->Generalmodel->get_all_whereGroupBy('instructor_time_slots',array('inst_id'=> $inst_id,'day='=>$da),'day');
                                    //echo $this->db->last_query();exit;
                                    //echo $day_time[0]['day'];
                                    //echo "<pre>";print_r($day_time);exit;
                                ?>
                                
                                <a href="#" class="list-group-item active text-center ">
                                  <h4 class="glyphicon glyphicon-plane dayview"><?php echo $da; ?></h4>
                                </a>
                                
                                <?php } ?>
                            </div>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12 bhoechie-tab">
                            <div class="list-group-item text-center cl">
                                <h3>Time</h3>
                            </div>
                            <div class="table-responsive bhoechie-tab-content active timeslott">
                        <?php 
                        if(!empty($result_time)) { 
                            $details = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $inst_id,'day='=>$da));
                            $charg = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $inst_id));
                            if($category==1 ||3)
                            {$chrday = "manual_".strtolower($da); }
                            if($category==2)
                            {$chrday = "auto_".strtolower($da);}
                            
                            if(!empty($details))
                            {
                                foreach($result_time as $value) {
                        ?>
                            <table class="table table-bordered table-striped col-md-12">
                                <tbody class="dv-tm checks" >
                                    <tr>
                                        <td>
                                            <?php $chg=$charg[0][$chrday];?>
                                            <input type="checkbox" class="timeslots checksinput" name="timeslot[]" myprice="<?php echo $chg*2; ?>" value="<?php echo $value['id'];?>" />            
                                        </td>
                                        <td class="">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <?php echo $value['start_time']; ?> - <?php echo $value['end_time']; ?>    
                                        </td>
                                        <td class="td-01">
                                            <?php if(!empty($chg)) { ?><i class='fa fa-gbp'></i>
                                            <input type="hidden"  class="addchr" name="addchr[]" value="<?php echo $chg; ?>" />
                                            <?php echo $chg*2 ?>&nbsp&nbsp&nbsp&nbsp<?php echo "(<i class='fa fa-gbp'></i>".$chg."/hour)" ; } ?>    
                                            <?php //echo $chg; } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php 
                            }
                            }
                        }
                        else
                        {
                            echo '<span style="color:red;">No Time Slots Are Avaiable On This Day Please Select Another Day</span>';
                        }
                            ?>
                    </div>
                    <?php //foreach($day_time as $res) { ?>
                    <div class=" table-responsive bhoechie-tab-content ">
                    <?php if(!empty($result_time)) { 
                            $details = $this->Generalmodel->get_all_where('instructor_time_slots',array('inst_id'=> $inst_id,'day='=>$res['day']));
                            $chargs = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=> $inst_id));
                            if($category==1 || 3)
                            {$chday = "manual_".strtolower($res['day']); }
                            if($category==2)
                            {$chday = "auto_".strtolower($res['day']);}
                            
                            foreach($details as $value) {
                                     ?>
                            <table class="table table-bordered table-striped col-md-12">
                                <tbody class="dv-tm checks" >
                                    <tr>
                                        <td>
                                            <input type="checkbox"  class="timeslots checksinput" name="timeslot[]" myprice="<?php echo $chargs[0][$chday]*2; ?>" value="<?php echo $value['id'];?>" />
                                        </td>
                                        <td class="">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <?php echo $value['start_time']; ?> - <?php echo $value['end_time']; ?>
                                        </td>
                                        <td class="td-01">
                                            <i class='fa fa-gbp'></i><?php //echo $chargs[0][$chday]; ?>
                                            <?php echo $chargs[0][$chday]*2; ?>&nbsp&nbsp&nbsp&nbsp <?php echo "(<i class='fa fa-gbp'></i>".$chargs[0][$chday]."/hour)" ; ?>
                                            <input type="hidden"  class="addchr" name="addchr[]" value="<?php echo $chargs[0][$chday]; ?>" />    
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    <?php } } ?>
                        </div>
                    <?php //} ?>
        
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-12">
                            <!--<form action="<?php //echo site_url('Products/buySlots');?>" method="post" id="slotbookingform">-->
                            <form action="<?php echo site_url('Student/mmsgateway');?>" id="slotbookingform" method="post">    
                                <input type="hidden" name="timeslots_data[]" value='' id="timeslots_data" />
                                <input type="hidden" name="bkdates_data[]" value='' id="bookingdate_data" />
                                <input type="hidden" name="totalcharges_data" value='' id="totalcharges_data" />
                                <input type="hidden" name="inst_id" id="instructor_id" value='<?php echo $inst_id;?>'  />
                                <input type="hidden" name="randam_id" value='' id="randam_id"  />
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
                            <input type="checkbox" id="checkboexslog" /> I Agree
                            <a href="<?php echo base_url('Terms-Conditions');?>" target="_blank"> Terms & Conditions</a>
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
        
        <input type="hidden" name="checkAtoS[]" value='' id="checkAtoS" />  
    </section>
   <!--contact-->
</div>
<script type="text/javascript">

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
            if(confirm('Are You Sure For Bookings'))
            {
                $('#randam_id').val(randam_id);
                $('#slotbookingform').submit();
            }
            else
            {
                return false;
            }
            //$('#randam_id').val(randam_id);
            //$('#slotbookingform').submit();
            
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
/////////////////////////////////////////////
    function myfunc()
    {
        var id = document.getElementById('ids').value;
        var date = document.getElementById('dates').value;
        var Vechical = document.getElementById('vt').value;
        var checkAtoS = document.getElementById('checkAtoS').value;
        var arrToString = checkAtoS.toString(); 
        //alert(id);
        if(Vechical == 0 )
        {
            alert('Please Select Vechical Type');
            return false;
        }
        $.ajax({
                url:'<?=base_url()?>Instructor/book_class_date',
                method: 'post',
                data: {dates: date, instid : id, vtype: Vechical, AtoS:arrToString },
                dataType: 'json',
                success: function(response)
                {
                    if(response.success == 'true')
                    {
                        $('.dayhid').hide();  
                        $('.dayview').html(response.jdays);  
                        $('.timeslott').html(response.jmsg);        
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


 var checked_time_id=[];
    function checkedchebox(timeslots)
    {
        checked_time_id.push(timeslots);
        $('#checkAtoS').val(checked_time_id);
        console.log(checked_time_id);
    }
    
    function uncheckedchebox(timeslots)
    {
        //checked_time_id.unshift(timeslots);
        var len = checked_time_id.length;
        for( var i = 0; i < len; i++)
        {
            if ( checked_time_id[i] == timeslots)
            { 
                checked_time_id.splice(i,1); 
                $('#checkAtoS').val(checked_time_id);
            }
        }
        console.log(checked_time_id);
    }

  $(document).on('click','.checks',function(){
      var ckdates = document.getElementById('dates').value;
        if($(this).find('input[name="timeslot[]"]').prop("checked") == true)
        {
            $(this).find('input[name="timeslot[]"]').prop('checked',false);
            checktimeslots=$(this).find('input[name="timeslot[]"]').val();
                uncheckedchebox(checktimeslots);
        }
        else{
        $(this).find('input[name="timeslot[]"]').prop('checked',true);
             checktimeslots=$(this).find('input[name="timeslot[]"]').val();
                checkedchebox(checktimeslots);
        }
        
        //$(document).ready(function(){
         //$('#book_now_btn').attr("disabled",true);
        //$(".checks").click(function(){
            var timeslots='';
            var addcharges=0;
            var come;
            var totalcharges=0;
            var slotCounter=0;
            var randam_id = document.getElementById('rad_id').value;
                
                        timeslots=$(this).find('input[name="timeslot[]"]').val();
                        come = $(this).find('input[name="timeslot[]"]').attr('myprice');
                        
                      
                        
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
                           
           $(".checks").each(function() {
                 if ($(this).find('input[name="timeslot[]"]').prop('checked')==true){ 
                    timeslots=timeslots+$(this).find('input[name="timeslot[]"]').val()+",";
                    //alert(timeslots);
                    come = $(this).find('input[name="timeslot[]"]').attr('myprice');
                    addcharges = parseFloat(totalcharges) + parseFloat(come);
                    totalcharges=addcharges;
                    //alert(slotCounter);
                    slotCounter++;
                    //alert(totalcharges);
                }
            }); 
            if(slotCounter>0){
                $('#book_now_btn').attr("disabled",false);
            }else{
                $('#book_now_btn').attr("disabled",true);
            }
            $('#timeslots_data').val(timeslots);
            $('#totalcharges_data').val(totalcharges);
       // });
    //});
        
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


</script>