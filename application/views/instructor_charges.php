
<style type="text/css">
    
</style>
<div class="in-pr-list md-30">

                    <h3>Instructor Charges</h3>

                    <div class="table-responsive">
                           
                        <table class="table table-bordered table-striped">
                            <?php if(!empty($result)) { ?> 
                            <thead>

                                <tr>

                                    <th>Days</th>

                                    <th>Automatice</th>

                                    <th>Manual</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr>
                                    <?php //echo "<pre>";print_r($result);exit;?>

                                    <td>Monday</td>

                                    <td><?php if(!empty($result)) { echo $result[0]['auto_monday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(!empty($result)) { echo $result[0]['manual_monday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                                <tr>

                                    <td>Tuesday</td>

                                    <td><?php if(!empty($result)) { echo $result[0]['auto_tuesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(!empty($result)) { echo $result[0]['manual_tuesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                                <tr>

                                    <td>Wednesday</td>

                                    <td><?php if(!empty($result)) { echo $result[0]['auto_wednesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(!empty($result)) { echo $result[0]['manual_wednesday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                                <tr>

                                    <td>Thursday</td>

                                    <td><?php if(!empty($result)) { echo $result[0]['auto_thursday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(!empty($result)) { echo $result[0]['manual_thursday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                                <tr>

                                    <td>Friday</td>

                                    <td><?php if(!empty($result)) { echo $result[0]['auto_friday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(!empty($result)) { echo $result[0]['manual_friday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                                <tr>

                                    <td>Saturday</td>

                                    <td><?php if(!empty($result)) { echo $result[0]['auto_saturday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(!empty($result)) { echo $result[0]['manual_saturday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                                <tr>

                                    <td>Sunday</td>

                                    <td><?php if(!empty($result)) { echo $result[0]['auto_sunday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                    <td><?php if(!empty($result)) { echo $result[0]['manual_sunday'] ; ?> <i class="fa fa-gbp" aria-hidden="true"></i><?php } ?></td>

                                </tr>

                            </tbody>
                            <?php }else{ ?>
                            <div class="alert alert-warning">
                              <strong><?php echo "No Record Found..."; ?></strong> 
                            </div>
                            <?php  } ?>
                        </table>
                            
                    </div>

                </div>