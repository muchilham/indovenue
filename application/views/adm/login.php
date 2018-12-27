<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Indovenue - Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/adm/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/adm/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/adm/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url(); ?>assets/adm/js/modernizr.min.js"></script>

    </head>


    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">
                            <div class="account-pages">
                            <div id="msg" style="margin: 20px auto;max-width: 460px;"></div>
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <!-- <a href="#" class="text-success"> -->
                                                <span><img src="<?php echo base_url(); ?>assets/adm/images/logo.png" alt="" height=""></span>
                                            <!-- </a> -->
                                        </h2>
                                        <h5 class="text-uppercase font-bold m-b-5 m-t-50">Sign In</h5>
                                        <p class="m-b-0">Login to your Admin account</p>
                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" id="login-form" method="post" action="javascript:login();">

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">
                                                    <label for="emailaddress">Username</label>
                                                    <input class="form-control" type="text" id="username" required="" name="account_name" placeholder="Enter your username">
                                                </div>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">
                                                    <!-- <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your password?</small></a> -->
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" required="" id="password" name="account_password" placeholder="Enter your password">
                                                </div>
                                            </div>

                                            <div class="form-group m-b-20">
                                                <div class="col-xs-12">

                                                    <div class="checkbox checkbox-danger">
                                                        <input id="remember" type="checkbox" checked="">
                                                        <label for="remember">
                                                            Remember me
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group text-center m-t-10">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-md btn-block btn-danger waves-effect waves-light" type="submit">Sign In</button>
                                                </div>
                                            </div>

                                        </form>

                                        <!-- <div class="row">
                                            <div class="col-sm-12">
                                                <div class="text-center">
                                                    <button type="button" class="btn m-r-5 btn-facebook waves-effect waves-light">
                                                        <i class="fa fa-facebook"></i>
                                                    </button>
                                                    <button type="button" class="btn m-r-5 btn-googleplus waves-effect waves-light">
                                                        <i class="fa fa-google"></i>
                                                    </button>
                                                    <button type="button" class="btn m-r-5 btn-twitter waves-effect waves-light">
                                                        <i class="fa fa-twitter"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div> -->

                                        <!-- <div class="row m-t-50">
                                            <div class="col-sm-12 text-center">
                                                <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                                            </div>
                                        </div> -->

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.app.js"></script>
        <script> 
            function login() 
            {
                $.ajax({
                    url:"<?php echo base_url() ?>adm/Main/Login",
                    type:"POST",
                    dataType:"JSON",
                    data:$('#login-form').serialize(),
                    success: function(data)
                    {
                      if(data.status)
                      {
                        window.location = data.url;
                        // $('#msg').html("<div class='alert alert-success alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
                      }
                      else
                      {
                        $('#msg').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>Login Failed</div>");
                      }
                    }
              })
            }
        </script>

    </body>
</html>