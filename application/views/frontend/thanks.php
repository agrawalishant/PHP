<div class="warpper clearfix">
        <!--Features app-->
        <section id="features-app" class="padd-80 head-section">

            <!--container-->
            <?php 
            $randam = $this->uri->segment(3);
            $txn_id  = $_REQUEST['transactionUnique'];
            //echo 'txn = ';print_r($newdata['transactionUnique']);exit;
            //echo 'random = '.$randam;exit;
                 $getdetails = $this->Generalmodel->get_all_where('payments',array('randam_id'=>$randam));
                 //echo "<pre>";print_r($getdetails);
                 if(!empty($getdetails))
                 {//echo 'if';
                    $postcode = $this->session->userdata('postcode');
                     $updatedata = ['txn_id'=>$txn_id,'payment_done_by'=>'Debit/Credit','payment_status'=>'success'];
                     $res = $this->Generalmodel->updateData('payments',$updatedata,array('randam_id'=>$randam));
                 }
                 else
                 {//echo 'else';
                    //  $insertdata =  [
                    //                     '' => $    
                    //                 ];
                    //  $res = $this->Generalmodel->updateData('payments',$insertdata); 
                 }
                 $where = '`payment_gross`<1';
                $resq = $this->Generalmodel->deleteMulti('payments',$where); 
            ?>
            <div class="container">
                <div class="row align-items">
 					<div class="col-md-12 col-sm-12"> 
 					<div class="covid-content-section">
					<h2>Thank You</h2>
					<div class="sr-line"></div>
					<h3><i class="fa fa-check-circle-o" style="color:green;font-size: 38px;margin-right: 20px;"></i>SUCCESSFUL !</h3>
						<?php if(!empty($txn_id)){?>
						<p>
						    Thank you for payment , your transaction id <strong><?php echo $txn_id; ?></strong>
					</p>
					<?php }else{ ?>
					<p> <strong>Thank you for payment </strong> </p>
					<?php } ?>
				</div>
 				</div>
                <!-- content tab-->
                </div>
            <!--container-->
        </section>
    </div>