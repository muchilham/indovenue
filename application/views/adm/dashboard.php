<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin - Indovenue</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/adm/images/favicon.ico">

        <!-- C3 charts css -->
        <link href="<?php echo base_url(); ?>assets/adm/plugins/c3/c3.min.css" rel="stylesheet" type="text/css"  />

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/adm/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url(); ?>assets/adm/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include "header.php"; ?>



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Adminox</a>
                                        </li>
                                        <li>
                                            <a href="#">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Dashboard 1
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <i class="mdi mdi-currency-usd widget-two-icon"></i>
                                    <div class="wigdet-two-content">
                                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Revenue</p>
                                        <h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">65841</span></h2>
                                        <p class="m-0">Jan - Apr 2017</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <i class="mdi mdi-account-multiple widget-two-icon"></i>
                                    <div class="wigdet-two-content">
                                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Total Unique Visitors</p>
                                        <h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">236521</span></h2>
                                        <p class="m-0">Jan - Apr 2017</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <i class="mdi mdi-crown widget-two-icon"></i>
                                    <div class="wigdet-two-content">
                                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Number of Transactions</p>
                                        <h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">563698</span></h2>
                                        <p class="m-0">Jan - Apr 2017</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <i class="mdi mdi-auto-fix widget-two-icon"></i>
                                    <div class="wigdet-two-content">
                                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Conversation Rate</p>
                                        <h2 class=""><span><i class="mdi mdi-arrow-up"></i></span> <span data-plugin="counterup">2.07</span>%</h2>
                                        <p class="m-0">Jan - Apr 2017</p>
                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->
                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include"footer.php"; ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.slimscroll.js"></script>

        <!-- Counter js  -->
        <script src="<?php echo base_url(); ?>assets/adm/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/counterup/jquery.counterup.min.js"></script>

        <!--C3 Chart-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adm/plugins/d3/d3.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adm/plugins/c3/c3.min.js"></script>

        <!--Echart Chart-->
		<script src="<?php echo base_url(); ?>assets/adm/plugins/echart/echarts-all.js"></script>

        <!-- Dashboard init -->
        <script src="<?php echo base_url(); ?>assets/adm/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.app.js"></script>

    </body>
</html>