<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!--<a href="#" class="brand-link">-->
    <!--    <img src="<?php echo base_url();?>assets/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"-->
    <!--        class="brand-image img-circle elevation-3" style="opacity: .8">-->
    <!--    <span class="brand-text font-weight-light">Admin panel</span>-->
    <!--</a>-->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url();?>/image/profileadmin/<?php echo $id;?>.png?nocache=<?php echo time(); ?>"
                    onerror="this.src='<?php echo base_url();?>/image/default';" class="img-circle elevation-2"
                    alt="User Image" />

                <!-- <img src="<?php echo base_url();?>image/profileadmin/admin.png" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $name;?><?php //echo $adminlevel;?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> 
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar <small>+ Custom Area</small></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>uPlot</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                UI Elements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/buttons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/sliders.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/modals.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/navbar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/timeline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/ribbons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ribbons</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>-->


                <!-- <li class="nav-header">EXAMPLES</li> -->

                <li class="nav-item">
                    <a href="<?php echo base_url();?>admindashboard" class="nav-link">
                        <i class="nav-icon far fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php if($adminlevel == '1'){?>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>subadmin_view" class="nav-link">
                        <i class="nav-icon far fas fa-user"></i>
                        <p>
                            Add Sub Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>permission_view" class="nav-link">
                        <i class="nav-icon far fas fa-lock"></i>
                        <p>
                            Permission
                        </p>
                    </a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>profile_view" class="nav-link">
                        <i class="nav-icon far fas fa-eye"></i>
                        <p>
                            PROFILE
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>astrologers_view" class="nav-link">
                        <i class="nav-icon far fas fa-star"></i>
                        <p>
                            Astrologers
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>userlist_view" class="nav-link">
                        <i class="nav-icon far fas fa-star"></i>
                        <p>
                            User List
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>interested_userlist_view" class="nav-link">
                        <i class="nav-icon far fas fa-star"></i>
                        <p>
                            Interested User List
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>coupan_view" class="nav-link">
                        <i class="nav-icon far fas fa-eye"></i>
                        <p>
                            COUPAN
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>Call-Coupan" class="nav-link">
                        <i class="nav-icon far fas fa-eye"></i>
                        <p>
                            Call COUPAN
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>kundalicharges_view" class="nav-link">
                        <i class="nav-icon far fas fa-eye"></i>
                        <p>
                            Kundali Charge
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>websiteinformation" class="nav-link">
                        <i class="nav-icon far fas fa-info"></i>
                        <p>
                            WEBSITE INFORMATION
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>amtrequestlist" class="nav-link">
                        <i class="nav-icon far fas fa-info"></i>
                        <p>
                            AMOUNT REQUEST
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>blog_view" class="nav-link">
                        <i class="nav-icon far fas fa-blog"></i>
                        <p>
                            BLOG
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>festival_view" class="nav-link">
                        <i class="nav-icon far fa-address-book"></i>
                        <p>
                            FESTIVAL
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>reportquestion_view" class="nav-link">
                        <i class="nav-icon far fa-address-book"></i>
                        <p>
                            REPORT QUESTION
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>services_view" class="nav-link">
                        <i class="nav-icon far fa-clone"></i>
                        <p>
                            SERVICES
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>notification_view" class="nav-link">
                        <i class="nav-icon far fa-building"></i>
                        <p>
                            Add notification
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>news_view" class="nav-link">
                        <i class="nav-icon far fa-calendar"></i>
                        <p>
                            NEWS
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url();?>faq_view" class="nav-link">
                        <i class="nav-icon far fa fa-question"></i>
                        <p>
                            F A Q
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>testimonial_view" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            TESTIMONIAL
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url();?>horoscopeyearly_view" class="nav-link">
                        <i class="nav-icon far fas fa-calendar-alt"></i>
                        <p>
                            HOROSCOPE YEARLY
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>contentmgt_view" class="nav-link">
                        <i class="nav-icon far fas fa-tasks"></i>
                        <p>
                            CONTENT MANAGEMENT
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
            <a href="<?php echo base_url();?>product_view" class="nav-link">
              <i class="nav-icon far fas fa-tasks"></i>
              <p>
                PRODUCT
              </p>
            </a>
          </li> -->
                <!-- multilevel product start-->
                <!-- multi level drop start -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>product_view" class="nav-link">
                                <i class="nav-icon far fa-building"></i>
                                <p>PRODUCT</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>sub_product_view" class="nav-link">
                                <i class="nav-icon far fa-id-badge"></i>
                                <p>SUB PRODUCT</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- multilevel product end -->
                <li class="nav-item">
                    <a href="<?php echo base_url();?>mmbanner_view" class="nav-link">
                        <i class="nav-icon far fas fa-flag"></i>
                        <p>
                            Match Making Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>aateam_view" class="nav-link">
                        <i class="nav-icon far fas fa-users"></i>
                        <p>
                            Admin Astro Team
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>language_astrologer_view" class="nav-link">
                        <i class="nav-icon far fas fa fa-language"></i>
                        <p>
                            Astrologer Language
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="<?php echo base_url();?>advertisement_view" class="nav-link">
                        <i class="nav-icon far fas fa fa-ad"></i>
                        <p>
                            Advertisement
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>commentappdisapp_view" class="nav-link">
                        <i class="nav-icon far fas fa fa-comment"></i>
                        <p>
                            Comment App/Disapp
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>astrocommentappdisapp_view" class="nav-link">
                        <i class="nav-icon far fas fa fa-comment"></i>
                        <p>
                            Astro Comment App/Disapp
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>orders_view" class="nav-link">
                        <i class="nav-icon far fas fa fa-shopping-cart"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>onlinepujadetail_view" class="nav-link">
                        <i class="nav-icon far fas fa fa-info-circle"></i>
                        <p>
                            Online Puja Detail
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url();?>predictiondataentry_view" class="nav-link">
                        <i class="nav-icon far fas fa fa-database"></i>
                        <p>
                            Prediction Data entry
                        </p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?php echo base_url();?>howtouse_view" class="nav-link">
                        <i class="nav-icon far fas fa fa-database"></i>
                        <p>
                            How To Use
                        </p>
                    </a>
                </li>

                <!-- multi level drop start -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>product_category_view" class="nav-link">
                                <i class="nav-icon far fa-building"></i>
                                <p>Product Catgory</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>category_astrologer_view" class="nav-link">
                                <i class="nav-icon far fa-id-badge"></i>
                                <p>Astrologer Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- multi level drop start -->
                <!-- multi level drop start -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            Enquiry's
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>enquiry_view" class="nav-link">
                                <i class="nav-icon far fas fa fa-language"></i>
                                <p>Enquiry</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>enquiryfreekundali_view" class="nav-link">
                                <i class="nav-icon far fa-id-badge"></i>
                                <p>Free Kundali</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo base_url();?>enquiryfreeprediction_view" class="nav-link">
                                <i class="nav-icon far fas fa fa-envelope"></i>
                                <p>Free predication</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- multi level drop start -->
                <!-- multi level drop start -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            History All
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo base_url();?>reportgen_user_history_adminpanel" class="nav-link">
                                <i class="nav-icon far fa-id-badge"></i>
                                <p>Report Gen(User to Astro)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>admin_comission_history" class="nav-link">
                                <i class="nav-icon far fa-id-badge"></i>
                                <p>Admin Comission history</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>transaction_view" class="nav-link">
                                <i class="nav-icon far fas fa fa-database"></i>
                                <p>
                                    Transactions All
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>historycall_view" class="nav-link">
                                <i class="nav-icon far fas fa fa-history"></i>
                                <p>
                                    History Call
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>historychat_view" class="nav-link">
                                <i class="nav-icon far fas fa fa-history"></i>
                                <p>
                                    History Chat
                                </p>
                            </a>
                        </li>




                    </ul>
                </li>

                <!-- multi level drop start -->





            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>