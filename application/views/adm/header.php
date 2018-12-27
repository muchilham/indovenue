<div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <!--<a href="index.html" class="logo"><span>Code<span>Fox</span></span><i class="mdi mdi-layers"></i></a>-->
                    <!-- Image logo -->
                    <a href="#" class="logo">
                        <span>
                            <img src="<?php echo base_url(); ?>assets/adm/images/logo.png" alt="" height="" width="80%">
                        </span>
                        <i>
                            <img src="<?php echo base_url(); ?>assets/adm/images/logo.png" alt="" height="20">
                        </i>
                    </a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left nav-menu-left">
                            <li>
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- <li class="hidden-xs">
                                <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                           class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li> -->
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="<?php echo base_url(); ?>assets/adm/images/account/<?php echo $this->session->account_photo; ?>" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li><a href="<?php echo base_url(); ?>adm/Main/logout">Logout</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metisMenu nav" id="side-menu">
                            <li class="menu-title">Navigation</li>
                            <li>
                                <a href="javascript: void(0);" aria-expanded="true"><i class="fi-disc"></i><span class="menu-arrow"></span><span> Account </span></a>
                                <ul class="nav-second-level nav" aria-expanded="true">
                                    <li><a href="<?php echo base_url(); ?>adm/Account">Account Tables</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" aria-expanded="true"><i class="fi-disc"></i><span class="menu-arrow"></span><span> Activity Type </span></a>
                                <ul class="nav-second-level nav" aria-expanded="true">
                                    <li><a href="<?php echo base_url(); ?>adm/Activity_type">Activity Type Tables</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" aria-expanded="true"><i class="fi-disc"></i><span class="menu-arrow"></span><span> Room Area </span></a>
                                <ul class="nav-second-level nav" aria-expanded="true">
                                    <li><a href="<?php echo base_url(); ?>adm/Room/room_area">Room Area Tables</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" aria-expanded="true"><i class="fi-disc"></i><span class="menu-arrow"></span><span> Room Master </span></a>
                                <ul class="nav-second-level nav" aria-expanded="true">
                                    <li><a href="<?php echo base_url(); ?>adm/Room/room_master">Room Master Tables</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" aria-expanded="true"><i class="fi-disc"></i><span class="menu-arrow"></span><span> Room Type </span></a>
                                <ul class="nav-second-level nav" aria-expanded="true">
                                    <li><a href="<?php echo base_url(); ?>adm/Room/room_type">Room Type Tables</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" aria-expanded="true"><i class="fi-disc"></i><span class="menu-arrow"></span><span> Booking </span></a>
                                <ul class="nav-second-level nav" aria-expanded="true">
                                    <li><a href="<?php echo base_url(); ?>adm/Booking">Booking Master</a></li>
                                </ul>
                            </li>

                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->