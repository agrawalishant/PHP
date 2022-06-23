<?php 
    //$asids = $astrologers_details[0]['astro_id'];
    $where = "(`sender_id`=$user AND `reciver_id`=$astro_id) OR (`sender_id`=$astro_id AND `reciver_id`=$user)";
    $res = fetchbyresultByCondiction('chat_messsage',$where);
    //$du = '30';
    //$c = date('Y-m-d G:i:s',strtotime("-$du sec"));
    foreach($res as $row) { 
        // if($row['timestamp']>date('Y-m-d G:i:s',strtotime("-$du sec"))){
             //$ChatStartTimeByUser = $row['timestamp'];
             //$id = $row['id'];
        //     if(!empty($ChatStartTimeByUser)){echo $rt = $cktime;}
        // }
        $req = fetchbyresultByCondiction('user',array('user_id'=>$row['sender_id']));
        if(!empty($req[0]['user_first_name'])){$name = $req[0]['user_first_name']; ?>
        <div class="userchat">
            <input type="hidden" value="<?php echo $user; ?>" id="sendersids"/>
            <p><strong><?php echo $name.":"; ?></strong><span>&nbsp;&nbsp;<?php echo $row['message']; ?></span></p>
        </div>
        <?php }else{$name = $astro_name; ?>
        <div class="astrochat">
            <input type="hidden" value="<?php echo $user; ?>" id="sendersids"/>
            <p><span><?php echo $row['message']; ?>&nbsp;&nbsp;</span><strong><?php echo ": ".$name; ?></strong></p>
        </div>
<?php } } ?>
<input type="hidden" value="<?php echo $this->session->userdata("lastid"); ?>" id="idLastNotification" />