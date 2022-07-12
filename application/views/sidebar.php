  <style>
      
      .submenu {
          
          display:none;
           background: #E3E9EF;
      }
      
      .submenu a {
    padding-left: 30px !important;
}

.fa.fa-caret-down {
    position: absolute;
    right: 0px !important;
}
      
  </style>
  
  
   <?php $adminName = $this->session->userdata('superadmin_information');  ?> <div class="iq-sidebar">
         <div class="iq-sidebar-logo d-flex justify-content-between">
            <a href="<?php echo site_url(); ?>">
            <img src="<?php echo site_url('assets/images/logo.png'); ?>" class="img-fluid" alt="">
            <!--<span> DV Driving </span>-->
            </a>
            <div class="iq-menu-bt align-self-center">
               <div class="wrapper-menu">
                  <div class="line-menu half start"></div>
                  <div class="line-menu"></div>
                  <div class="line-menu half end"></div>
               </div>
            </div>

         </div>
         <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <!--<li class="iq-menu-title"><i class="ri-separator"></i><span>Main</span></li>-->
                     <li class="<?php //if($dashboard){echo "active" ; } ?>">
                       <a href="<?php echo site_url('Administrator/index'); ?>" class="iq-waves-effect"><i class="las la-home"></i><span>Dashboard</span></a></li>
                    
                      <?php //if($adminName['role']!=2){ ?>
                      <!-- <li class="<?php //if($user_list){ echo "active" ; } ?>"> <a href="<?php //echo site_url('user-list'); ?>" class="iq-waves-effect"><i class="las la-user-tie"></i><span> Admin List </a> </li> -->
                      <?php //} ?>
                   
                      <li class="<?php //if($visitor_details){ echo "active" ; } ?>"> <a href="<?php echo site_url('Administrator/student_list'); ?>" class="iq-waves-effect"><span> Student List </span></a>
                      </li>
                       
                     <li class="<?php //if($exhibition_list){ echo "active" ; } ?>">
                       <a href="<?php echo site_url('Administrator/instructor_list'); ?>" class="iq-waves-effect"><span> Instructor List </span></a>
                      <?php //echo anchor('Administrator/instructor_list','Instructor List',['class'=>'iq-waves-effect las la-user-tie']); ?>
                     </li>
                      
                     <!----<li class="dropdown">
                     <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                           Booking
                       </button>
                      <ul class="dropdown-menu">
                       <li class="dropdown-item">Students</li>
                     <li><a href="<?php //echo site_url('Administrator/inst_bookings'); ?>" class="iq-waves-effect"><i class="las la-user-tie"></i><span> Bookings </span></a>
                     </li>---->
                     <li> <a href="<?php echo site_url('Administrator/subcriber'); ?>" class="iq-waves-effect"><span> Subcriber List </span></a>
                      </li>
                     <li> <a href="<?php echo site_url('Administrator/transactions'); ?>" class="iq-waves-effect"><span> Transactions </span></a>
                      </li>
                      <li> <a href="<?php echo site_url('Administrator/cancelBooking'); ?>" class="iq-waves-effect"><span> Cancel Booking </span></a>
                      </li>
                      <li> <a href="<?php echo site_url('Administrator/postcode'); ?>" class="iq-waves-effect"><span> PostCode </span></a>
                      </li>
                      <!--<li> <a href="<?php //echo site_url('Administrator/addationalbookings'); ?>" class="iq-waves-effect"><span> Additional Booking </span></a>-->
                      <!--</li>-->
                      <!--<li> -->
                      <!--      <a href="#" class="iq-waves-effect dropdown">-->
                      <!--          <span> CMS1 </span> <i class="fa fa-caret-down" aria-hidden="true"></i>-->
                      <!--      </a>-->
                      <!--      <ul class="submenu">-->
                      <!--          <li><a href="#">Demo 1</a></li>-->
                      <!--          <li><a href="#">Demo 2</a></li>-->
                      <!--          <li><a href="#">Demo 1</a></li>-->
                      <!--          <li><a href="#">Demo 2</a></li>-->
                      <!--      </ul>-->
                      <!--</li>-->
                       <li> <a href="<?php echo site_url('Administrator/websiteinformation'); ?>" class="iq-waves-effect"><span> Website information </span></a>
                      </li>
                      <li> <a href="<?php echo site_url('Administrator/changepwd'); ?>" class="iq-waves-effect"><span> Change Password </span></a>
                      </li>
                        <!-- </ul>
                     </li> -->

                     <!--  <li class="<?php //if($about_us){ echo "active" ; } ?>"> <a href="<?php //echo site_url('about-us-data'); ?>" class="iq-waves-effect"><i class="las la-user-tie"></i><span> About us </span></a></li> -->
                       
                   
                       
                       
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
      </div>

        <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <div class="iq-sidebar-logo">
               <div class="top-logo">
                  <a href="<?php //echo site_url('dashboard'); ?>" class="logo">
                  <img src="<?php //echo site_url('assets/admin/images/logo.gif'); ?>" class="img-fluid" alt="">
                  <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.png" class="n-logo" alt=""></a>
                  <!--<span> DV Driving </span>-->
                  </a>
               </div>
            </div>
               <div class="navbar-breadcrumb">
                  <!--<h5 class="mb-0">Profile</h5>-->
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="<?php echo site_url('dashboard'); ?>">Home</a></li>
                       <li class="breadcrumb-item active" aria-current="page">Profile</li>-->
                     </ul>
                  </nav>
               </div>
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                       
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="line-menu half start"></div>
                        <div class="line-menu"></div>
                        <div class="line-menu half end"></div>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                       
                        
                        <li class="nav-item iq-full-screen"><a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>
                     </ul>
                  </div>
                  <ul class="navbar-list">
                     <li>
                        <a href="#" class="search-toggle iq-waves-effect bg-primary text-white"><img src="<?php echo site_url('assets/admin/images/user/1.jpg'); ?>" class="img-fluid rounded" alt="user"></a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Hello <?php //echo ucfirst($adminName['name']); ?> </h5>
                                    <!-- <span class="text-white font-size-12">Available</span> -->
                                 </div>
                                 <!-- <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class=" iq-card-icon iq-bg-primary">
                                          <i class="ri-file-user-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">My Profile</h6>
                                          <p class="mb-0 font-size-12">View personal profile details.</p>
                                       </div>
                                    </div>
                                 </a> -->
                                 <!-- <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-success-hover">
                                    <div class="media align-items-center">
                                       <div class=" iq-card-icon iq-bg-success">
                                          <i class="ri-profile-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Edit Profile</h6>
                                          <p class="mb-0 font-size-12">Modify your personal details.</p>
                                       </div>
                                    </div>
                                 </a> -->
                                 <!--<a href="account-setting.html" class="iq-sub-card iq-bg-primary-danger-hover">-->
                                 <!--   <div class="media align-items-center">-->
                                 <!--      <div class=" iq-card-icon iq-bg-danger">-->
                                 <!--         <i class="ri-account-box-line"></i>-->
                                 <!--      </div>-->
                                 <!--      <div class="media-body ml-3">-->
                                 <!--         <h6 class="mb-0 ">Account settings</h6>-->
                                 <!--         <p class="mb-0 font-size-12">Manage your account parameters.</p>-->
                                 <!--      </div>-->
                                 <!--   </div>-->
                                 <!--</a>-->
                                 <!--<a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-secondary-hover">-->
                                 <!--   <div class="media align-items-center">-->
                                 <!--      <div class=" iq-card-icon iq-bg-secondary">-->
                                 <!--         <i class="ri-lock-line mr-2"></i>-->
                                 <!--      </div>-->
                                 <!--      <div class="media-body ml-3">-->
                                 <!--         <h6 class="mb-0 ">Privacy Settings</h6>-->
                                 <!--         <p class="mb-0 font-size-12">Control your privacy parameters.</p>-->
                                 <!--      </div>-->
                                 <!--   </div>-->
                                 <!--</a>-->
                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="iq-bg-danger iq-sign-btn" href="<?php echo site_url('AdminManager/logout'); ?>" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
         
       
         <!-- TOP Nav Bar END -->