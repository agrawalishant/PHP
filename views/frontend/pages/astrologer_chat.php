<style>
.checked {
  color: orange;
}
.astro_predic_form {
  display: none;
}
</style>
<!-- CSS FOR CHAT START -->
<style>
.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
  display: none;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 11%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 18px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {
  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 100%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
.cht-hist li{
 width:100%;   
}
#menu {
    display: flex;
    justify-content: space-between;
    padding: 15px;
    background-color: #ff9800;
    color: #ffffff;
}
.mr-btm {
 margin-bottom:0px;   
}

.cht-contner {
    padding-bottom:0px;
}
div#chat_messages-01 {
    height: 200px;
    overflow: auto;
    background-color: #f5f5f5;
    position: relative;
    z-index: 9;
    padding-top: 5px !important;
    padding: 0;
    box-shadow: 0px 0px 5px 0px rgb(255 255 255 / 50%);
}
.cht-hght {
 height:220px;
 overflow:auto;
}
.astro-cht-icon {
    width:90%;
}
.astro-cht-section{
    height: 170px;
    overflow: auto;
}
/*.cht-hist > li.active > a, .cht-hist > li.active > a:hover, .cht-hist > li.active > a:focus {*/
/*        background-color: #ff9800;*/
/*        color:#ffff;*/
/*}*/
.astro-cht-icon .form-control {
    height:auto;
    padding-right: 40px;
}


.astro-cht-section {
    height: 170px;
    overflow: auto;
    transform: rotate(180deg);
    direction: rtl;
}

div#oldchat {
    transform: rotate(180deg);
    direction: ltr;
}



.cht-hist li a {
 border-radius:0px;   
}
.tel-chtIcon {
    font-size: 24px;
}
.tel-chtButton {
    position: relative;
    float: right;
    margin-top: -31px;
    right: 5px;
    padding: 2px 5px;
    border: none;
    background: none;
}
.noti {
    background-color: #506743;
    color: #ffffff;
    padding: 2px 7px;
    border-radius: 100%;
    float: right;
    margin-right:10px;
}
.uschat{
    background-color: #f5c666;
    height: 40px;
    border-radius: 10px;
    padding: 12px;
    margin: 12px;
    width: 90%;
    text-align:left;
}
.astrochat{
    background-color: #2a8c3dc7;
    width: 90%;
    padding: 12px;
    margin: 12px;
    border-radius: 10px;
    text-align:right;
}
.chattext{
    border: 1px solid;
    height: 15px;
    border-radius: 5px;
    padding: 10px;
    margin: 12px;
}
li{
    width: 100%;
    background-color: #f1de5c;
    color: #fff;
    display: flex;
    height: 40px;
    padding:5px;
}
.cht-hist li a{
    text-decoration:none;
    color:#fff;
    font-size:18px;
    width:100%;
}
.cht-hist li img{
    width: 25px;
    margin-top: 5px;
    float: left;
    margin-right: 14px;
}
.onmouse {
    transition: all 0.6s;
}
.onmouse:hover {
    background-color: #ff9800;
}
</style>
<!--<script src="https://code.jquery.com/jquery-3.6.0.js"></script>-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<?php
    $astro_name = $this->session->userdata('asname');
    $astro_id = $this->session->userdata('asid');
?>
<div class="modal fade" id="myModalChat">
    <div class="modal-dialog">
      <div class="modal-content">
        <head>
          <meta charset="utf-8" />
          <title>Chat Application</title>
          <meta name="description" content="Chat Application" />
         
        </head>
        <body id=''>
          <div id="wrapper">
            <div id="menu">
                <?php  
                  if($this->session->userdata('user_id')) {
                    $user=  $this->session->userdata('user_id'); 
                  }
                  else if($this->session->userdata('astro_id'))
                  {
                    $user=  $this->session->userdata('astro_id'); 
                  }
                  else
                  {
                   $user="";
                  }
                ?>
                <p class="welcome">Welcome  <b>&nbsp&nbsp&nbsp<?php echo $astro_name; ?></b></p>
                <!--<button type="button" class="btn btn-danger" onclick="exitchat();" >Exit Chat</button>-->
                <!-- <p class="logout"><a id="exit" onclick="exitchat();" >Exit Chat</a></p> -->
            </div>
            
            <section id="content">
              <section class="main padder" >
                <div class="clearfix">
                  <!--<h4><i class="fa fa-table"></i>Users</h4>-->
                </div>
                <div class="row">
                  <div class="col-lg-12" style="height:250px;">
                    <section class="panel mr-btm">
                      <!--<header class="panel-heading">Chat With <span >Astrologer</span></header>-->
                      <div class="panel-body row cht-contner" style="display:flex;">
                        <!--<div class="col-md-12" >-->
                        <!--</div>-->
                        <div class="col-lg-4" id="chat_messages-01" style="height:auto;width:20%; ">
                            <ul class="nav nav-pills cht-hist" id="cht-hist" style="display:inline;">
                                <?php   
                                    $chuser = $this->Astro_model->getChatUser('chat_messsage',array('reciver_id'=>$astro_id));
                                    $i=0;
                                    foreach($chuser as $userid){  $i++;
                                    $nm = fetchbyresultByCondiction('user',array('user_id'=>$userid['sender_id']));
                                    foreach($nm as $nms){
                                        $reciver_ids = $nms['user_id'];
                                    $notification = countwhere('chat_messsage',array('sender_id'=>$reciver_ids,'reading_status'=>0));
                                ?>
                                <input type="hidden" id="useri<?php echo $i;?>" value="<?php echo $reciver_ids; ?>" />
                                <?php if(empty($uid)){$uid=0;} if($uid!=$reciver_ids) { ?>
                                <li class="onmouse" onclick="trysesi('<?php echo $i;?>');" <?php if($i==1) { ?> class="active" <?php } ?>><a  href="<?php echo base_url(); ?>astrochat/<?php echo encoding($reciver_ids); ?>/<?php echo encoding($astro_id); ?>"><img src="https://astrovedvakta.com/image/profileadmin/1.png" style="width:25px;"> <span> <?php echo $nms['user_first_name']; ?> </span><?php if (!empty($notification)){ ?><span class="noti hienoti<?php echo $i;?>"><?php echo $notification; ?></span><?php } ?> </a></li>
                                <?php }else{ ?>
                                <li class="onmouse" onclick="trysesi('<?php echo $i;?>');" <?php if($i==1) { ?> class="active" <?php } ?>><a  href="<?php echo base_url(); ?>astrochat/<?php echo encoding($reciver_ids); ?>/<?php echo encoding($astro_id); ?>"><img src="https://astrovedvakta.com/image/profileadmin/1.png" style="width:25px;"> <span> <?php echo $nms['user_first_name']; ?> </span> </a></li>
                                <?php } } ?>
                                <!--<li onclick="trysesi('<?php echo $i;?>');" style="cursor:default;" ><a ><img src="https://astrovedvakta.com/image/profileadmin/1.png" style="width:25px;"> <span> <?php echo $nms['user_first_name']; ?> </span> </a></li>-->
                                <?php }   ?>
                            </ul>
                        </div>
                        <div class="col-lg-8 " style="height:auto;width:75%">
                            <h4><span style="margin-left:22px;">Start Chat</span></h4>
                            <div class="tab-content astro-cht-section" style="height:500px;">
                                
                                    <?php 
                                        if(!empty($uid) && !empty($aid)){ ?>
                                        <div  id="shcht">
                                        <?php 
                                        $chuser = fetchbyresultByCondictionGroupby('chat_messsage',array('reciver_id'=>$aid,'sender_id'=>$uid),'sender_id'); 
                                        $a=0;
                                        $i = $this->session->userdata('ivalue');
                                        if($i<1){$i=1;}
                                        foreach($chuser as $userid){  ++$a; $user_id = $uid;?>
                                        <div id="home<?php echo $a;?>" class="tab-pane fade  <?php if($a==$i) { ?> in active <?php } ?>">
                                            <!--<h4>Start chat</h4>-->
                                            <?php
                                                $where = "((`sender_id`=$userid[sender_id] AND `reciver_id`=$astro_id) OR (`sender_id`=$astro_id AND `reciver_id`=$userid[sender_id]))";
                                                $res = fetchbyresultByCondiction('chat_messsage',$where);
                                             //echo $this->db->last_query();
                                            ?>
                                            <div id="oldchat">
                                               <?php 
                                                   foreach($res as $row) { 
                                                       $res = fetchbyresultByCondiction('user',array('user_id'=>$row['sender_id']));
                                                       if(!empty($res[0]['user_first_name'])){$name = $res[0]['user_first_name'];
                                                       ?>
                                                      <input type="hidden" name="" value="<?php echo $row['sender_id']; ?>" class="sendersids<?php echo $a;?>"/>
                                                      <div class="uschat">
                                                        <p><strong><?php echo $res[0]['user_first_name'].":"; ?></strong><span>&nbsp;&nbsp;<?php echo $row['message']; ?></span></p>
                                                      </div>
                                                  <?php } else{$name = $astro_name; ?>
                                                  <input type="hidden" name="" value="<?php echo $row['sender_id']; ?>" class="sendersids<?php echo $a;?>"/>
                                                    <div class="astrochat">
                                                      <p><span><?php echo $row['message']; ?></span>&nbsp;&nbsp;<strong><?php echo ": ".$astro_name; ?></strong></p>
                                                    </div>  
                                                    <?php   } } ?>
                                              </div> 
                                            </div>
                                    <?php } ?>     
                                </div>
                                <?php } ?>
                            </div>
                            <div class="astro-cht-icon">
                                <div class="chattext" contenteditable="true" id="chatmsg" placeholder="Type here..." class="form-control" ></div>
                                <span id="userinfo"></span>
                            </div>
                        </div>
                        
                    
                      </div>
                    </section>
                    
                  </div>
                </div>
              </section>
            </section>
          
          </div>
            <script>
                var base_url='<?php echo base_url();?>';
                var msgdata = document.getElementById('chatmsg').textContent;
                var reciverid = '<?php echo $uid; ?>';
                //var userid = '<?php echo $astro_id; ?>';
                var userid = '<?php echo $aid; ?>';
                var username = '<?php echo $astro_name; ?>';
            </script>
            <script src="https://twillo.ml:9099/socket.io/socket.io.js" type="text/javascript"></script>  
            <script src="<?php echo base_url('assets/frontend/js/chat.js');?>"></script>
        </body>
      </div>
    </div>
  </div>
  <script>
    
    setInterval(function(){userlist();},1000);
    setInterval(function(){reloads();},1000);
    
    function reloads()
    {
       var astroname = '<?php echo $astro_name;?>';
       var astroid = '<?php echo $aid;?>';
       var userid = '<?php echo $uid;?>';
       //var isid = document.getElementById("idsis").value;
       var uri = "<?php echo base_url('Astrologer_controller/chatshowss') ?>";
       //alert(reciverid);
        $.ajax({
            url: uri,
            type: "POST",
            data: {astroname:astroname,astroid:astroid,userid:userid},
            dataType: "json",
            cache : false,
            success: function(result)
            {
                $('#shcht').html(result.msg);
            },
        });
    }

    function userlist()
    {
        //alert('hii');
       //var astroname = '<?php //echo $astro_name;?>';
       var astroid = '<?php echo $aid;?>';
       var uid = '<?php echo $uid;?>';
       //var isid = document.getElementById("idsis").value;
       var uri = "<?php echo base_url('Astrologer_controller/chatAstroUserList') ?>";
       //alert(uri);
        $.ajax({
            url: uri,
            type: "POST",
            data: {uid:uid,astroid:astroid},
            dataType: "json",
            cache : false,
            success: function(result)
            {
                $('.cht-hist').html(result.msg);
            },
        });
    }
    
    function trysesi(idsi)
    {
       var useri = document.getElementById("useri"+idsi).value;
       var astroid = '<?php echo $astro_id;?>';
       var astroname = '<?php echo $astro_name;?>';
       var uri = "<?php echo base_url('Astrologer_controller/notification') ?>";
       //alert(uri);
        $.ajax({
            url: uri,
            type: "POST",
            data: {useri:useri,astroid:astroid,idsi:idsi},
            dataType: "json",
            cache : false,
            success: function(result)
            {
                //console.log(result.msg);
                $('.hienoti'+idsi).hide();
            },
        });
        document.getElementById("idsis").value=idsi;
        if(idsi>0)
        {//alert(idsi);
        reloads(astroname,astroid,idsi);
          //  setInterval(function(){reloads(astroname,astroid,idsi);},1000);
        }
    }
    
  </script>