
    <?php if(!empty($result_time)) 
    { 
        //$id = $result_time[0]['inst_id'];//echo $id;
        //$chargs = $this->Generalmodel->get_all_where('instructor_charges',array('inst_id'=>$id));
        
        //print_r($id);
        //print_r($chargs);
        
            if(!empty($price))
            {
                foreach($result_time as $res) { ?>
    
                    <table class="table table-bordered table-striped col-md-12 amtcor" >
                        <tbody class="dv-tm checks" >
                            <tr>
                                <td>
                                    <?php 
                                            $diff = abs(strtotime($res['end_time']) - strtotime($res['start_time']));
                                            $totalHour = $diff/3600;
                                            $am = round($price*$totalHour);
                                            $charray = explode(",",$checkcheckbox);
                                            //print_r($checkcheckbox);exit;
                                        ?>  
                                            <input type="checkbox" class="timeslots checksinput" name="timeslot[]" myprice="<?php echo $am; ?>" value="<?php echo $res['id'];?>"                     
                                        <?php
                                            for($k=0;$k<count($charray);$k++)
                                            {
                                                if($charray[$k]==$res['id'])
                                                { 
                                                    echo $c="checked";
                                                }
                                                else
                                                { 
                                                    $c="";
                                                }
                                            ?>    
                                        
                                        <?php  } ?>
                                        />
                                    </td>
                                    <td>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                            		    <?php echo $res['start_time']; ?> - <?php echo $res['end_time']; ?>            
                                    </td>
                                    <td class="td-01">
                                        
                                        <i class='fa fa-gbp'></i><?php echo $am; ?> &nbsp&nbsp&nbsp&nbsp <?php echo "(<i class='fa fa-gbp'></i>".$price."/hour)" ; ?>
                            		    <input type="hidden"  class="addchr" name="addchr[]" value="<?php echo $am;//$chargs[0][$charges]; ?>" />    
                                    </td>
                                </tr>        
                            </tbody>
                        </table>
                <?php }  
            }    
            else
            { ?>
                <table class="table table-bordered table-striped col-md-12 amtcor" >
                    <tbody class="dv-tm checks" >
                        <tr>
                            <td class="td-01">
                                <?php echo "Price is not available in this day"; ?>
                            </td>
                        </tr>
                    </tbody>    
                </table>                            
            <?php } 
        
    } ?>   