<?php 
    $chuser = fetchbyresultByCondictionGroupby('chat_messsage',array('reciver_id'=>$aid,'sender_id'=>$uid),'sender_id'); 
    $a=0;
    
    $i = $this->session->userdata('ivalue');
    if($i<1){$i=1;}
    foreach($chuser as $userid){  ++$a; $user_id = $userid = $uid; ?>
    <div id="home<?php echo $a;?>" class="tab-pane fade  <?php if($a==$i) { ?> in active <?php } ?>">
        <!--<h4>Start chat</h4>-->
        <?php
            $where = "((`sender_id`=$uid AND `reciver_id`=$aid) OR (`sender_id`=$aid AND `reciver_id`=$uid))";
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
              <?php } } ?>
          </div> 
        </div>
<?php } ?>

<script> 
    //var reciverid = document.getElementByClassName('sendersids<?php //echo $abc;?>').value;
    // setInterval(function(){chkmsg();},1000);
</script>