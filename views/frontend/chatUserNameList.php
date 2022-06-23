<?php 
    $chuser = $this->Astro_model->getChatUser('chat_messsage',array('reciver_id'=>$astro_id));
    $i=0;
    foreach($chuser as $userid){  $i++;
    $nm = fetchbyresultByCondiction('user',array('user_id'=>$userid['sender_id']));
    foreach($nm as $nms)
    {
    $reciver_ids = $nms['user_id'];
    $notification = countwhere('chat_messsage',array('sender_id'=>$reciver_ids,'reading_status'=>0));
?>
<input type="hidden" id="useri<?php echo $i;?>" value="<?php echo $reciver_ids; ?>" />
<?php if($uid!=$reciver_ids) {?>
<li onclick="trysesi('<?php echo $i;?>');" <?php if($i==1) { ?> class="active" <?php } ?>> <a style="text-decoration:none;height:25px;width:100%;" href="<?php echo base_url(); ?>astrochat/<?php echo encoding($reciver_ids); ?>/<?php echo encoding($astro_id); ?>"><img src="https://astrovedvakta.com/image/profileadmin/1.png" style="width:25px;"> <span> <?php echo $nms['user_first_name']; ?> </span><?php if (!empty($notification)){ ?><span class="noti hienoti<?php echo $i;?>"><?php echo $notification; ?></span><?php } ?> </a></li>
<?php }else{ ?>
<li onclick="trysesi('<?php echo $i;?>');" <?php if($i==1) { ?> class="active" <?php } ?>> <a style="text-decoration:none;height:25px;width:100%;" href="<?php echo base_url(); ?>astrochat/<?php echo encoding($reciver_ids); ?>/<?php echo encoding($astro_id); ?>"><img src="https://astrovedvakta.com/image/profileadmin/1.png" style="width:25px;"> <span> <?php echo $nms['user_first_name']; ?> </span> </a></li>
<?php } } } ?>