<?php
$where = "((`sender_id`=$userid AND `reciver_id`=$astro_id) OR (`sender_id`=$astro_id AND `reciver_id`=$userid))";
$res = fetchbyresultByCondiction('chat_messsage',$where);
if(!empty($res)){
?>
<div id="oldchat">
    <?php 
       foreach($res as $row) { 
           $res = fetchbyresultByCondiction('user',array('user_id'=>$row['sender_id']));
           if(!empty($res[0]['user_first_name'])){$name = $res[0]['user_first_name'];}
           else{$name = $astro_name;}
           ?>
          <input type="hidden" name="" value="<?php echo $row['sender_id']; ?>" id="sendersids"/>
          <p><strong><?php echo $name.":"; ?></strong><span>&nbsp&nbsp<?php echo $row['message']; ?></span></p>
    <?php } ?>
</div> 
<?php } else { echo "No Messages"; }?>