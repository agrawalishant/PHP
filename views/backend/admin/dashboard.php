<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ACCOUNT BALANCE : 
            <?php $adminaccbalance=fetchbyresultByCondiction('wallet_admin',array('wad_adminid'=>'1')); echo $adminaccbalance[0]['wad_amt'];?></h1>
                 
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $page_title; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- top row -->
        <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $pending_order; ?></h3>

                <p>PENDING ORDERS</p>
              </div>
              <div class="icon">
                <i class="fas fa-shipping-fast"></i>
              </div>
              <a href="<?php echo base_url();?>orders_view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $pending_comment; ?></h3>

                <p>PENDING COMMENTS</p>
              </div>
              <div class="icon">
                <i class="far fa-comments"></i>
              </div>
              <a href="<?php echo base_url();?>commentappdisapp_view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $usersregisterthismonth; ?></h3>

                <p>USERS REGISTER THIS MONTH</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="<?php echo base_url();?>userlist_view" class="small-box-footer"> More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $astrologerregisterthismonth; ?></h3>
                  <p>ASTROLOGER REGISTER MONTH</p>
              </div>
              <div class="icon">
                <i class="ion ion-planet"></i>
              </div>
              <a href="<?php echo base_url();?>astrologers_view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $totalastrologer; ?></h3>
                  <p>TOTAL ASTROLOGER'S</p>
              </div>
              <div class="icon">
                <i class="ion ion-planet"></i>
              </div>
              <a href="<?php echo base_url();?>astrologers_view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $astrologerapppending; ?></h3>
                  <p>ASTROLOGER PENDING APPROVAL</p>
              </div>
              <div class="icon">
                <i class="ion ion-planet"></i>
              </div>
              <a href="<?php echo base_url();?>astrologers_view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $TotalProduct; ?></h3>

                <p>TOTAL PRODUCT</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url();?>product_view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $Pending_free_kundali_making; ?></h3>

                <p>PENDING FREE KUNDALI</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-information"></i>
              </div>
              <a href="<?php echo base_url();?>enquiryfreekundali_view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $Pending_free_prediction; ?></h3>

                <p>PENDING FREE PREDICTION</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-analytics"></i>
              </div>
              <a href="<?php echo base_url();?>enquiryfreeprediction_view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $TotalBlog; ?></h3>

                <p>TOTAL BLOG</p>
              </div>
              <div class="icon">
                <i class="fas fa-blog"></i>
              </div>
              <a href="<?php echo base_url();?>blog_view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $TotalNews; ?><sup style="font-size: 20px"></sup></h3>

                <p>TOTAL NEWS</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url();?>news_view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $TotalFestival; ?></h3>

                <p>TOTAL FESTIVAL</p>
              </div>
              <div class="icon">
                <i class="ion ion-earth"></i>
              </div>
              <a href="<?php echo base_url();?>festival_view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $BlogMonthCount; ?></h3>

                <p>TOTAL BLOG THIS MONTH</p>
              </div>
              <div class="icon">
                <i class="fab fa-blogger"></i>
              </div>
              <a href="<?php echo base_url();?>blog_view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- end row -->
        <!-- /.row -->
        <!-- Main row -->
     
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>