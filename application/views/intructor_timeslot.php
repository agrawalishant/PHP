
<style type="text/css">
    
</style>
<div class="in-pr-list md-30">

                    <h3>Instructor Time Slot</h3>

                    <div class="table-responsive">
                           
                        <table class="table table-bordered table-striped">
                            <?php if(!empty($result)) { ?> 
                            <thead>

                                <tr>

                                    <th>Day</th>

                                    <th>Start Time</th>

                                    <th>End Time</th>

                                </tr>

                            </thead>

                            <tbody>

    `                           <?php foreach($result as $res) { ?>
                                <tr>
                                    
                                    <td><?php echo $res['day'] ; ?> </td>
                                <?php 
                                 $value = $this->generalmodel->get_all_where('instructor_time_slots',array('inst_id'=>$res['inst_id'],'day'=>$res['day'])); 
                                foreach($value as $val){    
                                ?>  
                                    <tr><td></td>
                                    <td><?php echo $val['start_time'] ; ?> </td>
                                    <td><?php echo $val['end_time'] ; ?></td>
                                    </tr>
                                <?php } ?>
                                </tr>
                                <?php } ?>

                            </tbody>
                            <?php }else{ ?>
                            <div class="alert alert-warning">
                              <strong><?php echo "No Record Found..."; ?></strong> 
                            </div>
                            <?php  } ?>
                        </table>
                            
                    </div>

                </div>