<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                       <div class="iq-header-title">
                          <h4 class="card-title"> Edit Postcode</h4>
                       </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                            <?php if(!empty($result)) { ?>
                                <form method="post" action="<?php echo site_url('Administrator/submiteditpostcode/'.$result[0]->id); ?>" >
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="fname"> Postcode:</label>
                                            <input type="text" name="postcode" class="form-control" value="<?php if(!empty($result[0]->postcode)){ echo $result[0]->postcode; } ?>" >
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Edit</button> 
                                    <button type="button" onclick="window.history.back();" class="btn btn-primary">Back </button>
                                </form>  
                            <?php } ?>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   <!-- Wrapper END -->