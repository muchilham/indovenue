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

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/adm/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/adm/css/responsive.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url(); ?>assets/adm/js/modernizr.min.js"></script>
        <link href="<?php echo base_url() ?>assets/adm/css/bootstrap-fileupload.min.css" rel="stylesheet">

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
                                    <h4 class="page-title">Form Update Account</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="<?php echo base_url(); ?>adm/Dashboard">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>adm/Account">Account</a>
                                        </li>
                                        <li class="active">
                                            Update Account
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                            <div id="msg"></div>
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Form Update</h4>
                                    <p class="text-muted font-14 m-b-20">
                                    </p>

                                    <form action="<?php echo base_url() ?>adm/Account/update_data/<?php echo $select_account_get->account_name; ?>" id="form-add" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="userName">User Name<span class="text-danger">*</span></label>
                                            <input type="text" name="account_username" value="<?php echo $select_account_get->account_name; ?>" required placeholder="Enter username" class="form-control" id="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="emailAddress">Email address<span class="text-danger">*</span></label>
                                            <input type="email" value="<?php echo $select_account_get->account_email; ?>" required placeholder="Enter email" name="account_email" class="form-control" id="emailAddress">
                                        </div>
                                        <div class="form-group">
                                            <label for="pass1">Password<span class="text-danger">*</span></label>
                                            <input id="pass1" type="password" value="<?php echo $select_account_get->account_password; ?>" name="account_password" placeholder="Password" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="passWord2">Confirm Password<span class="text-danger">*</span></label>
                                            <input data-parsley-equalto="#pass1" type="password" required placeholder="Password" class="form-control" id="passWord2">
                                        </div>
                                        <div class="form-group">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 300px; height: 250px;">
                                                    <img src="<?php echo base_url(); ?>assets/adm/images/account/<?php echo $select_account_get->account_photo; ?>" alt="" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="width: 300px; max-height: 250px; line-height: 20px;"></div>
                                                <br>
                                                <span class="btn btn-default btn-file">
                                                    <input name="file" class="fileupload-new"><span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select File</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" name="file"/>
                                                </span>
                                                   <!-- <button type="submit" name="upload" class="btn btn-sm btn-success fileupload-exists"> Done </button> -->
                                            </div>
                                        </div>
                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-default waves-effect m-l-5">
                                                Cancel
                                            </button>
                                        </div>

                                    </form>
                                </div> <!-- end card-box -->
                            </div>
                        </div>

                        <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include "footer.php"; ?>

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

        <!-- Parsley js -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adm/plugins/parsleyjs/parsley.min.js"></script>
        <script src="<?php echo base_url() ?>assets/adm/js/bootstrap-fileupload.min.js"></script>
        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });
            // $(function () {
            //     $('#demo-form').parsley().on('field:validated', function () {
            //         var ok = $('.parsley-error').length === 0;
            //         $('.alert-info').toggleClass('hidden', !ok);
            //         $('.alert-warning').toggleClass('hidden', ok);
            //     })
            //             .on('form:submit', function () {
            //                 return false; // Don't submit form for this demo
            //             });
            // });

            function add()
            {
                $.ajax({
                    url:"<?php echo base_url() ?>adm/Account/add_data",
                    type:"POST",
                    dataType:"JSON",
                    data:$('#form-add').serialize(),
                    success: function(response)
                    {
                        $("#form-add").each(function(){
                            this.reset();
                        });
                        if(response.status == "true")
                        {
                            $('#msg').html("<div class='alert alert-success alert-dismissible fade in' role='alert'>Update Data Success</div>");
                        }
                        else
                        {
                            $('#msg').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>Update Data Failed</div>");
                        }                         
                        setTimeout(function(){ $("#msg").hide(); }, 4000);
                        setTimeout(function(){
                            location.reload(); 
                        }, 5000);

                    }
                })
            }
        </script>

    </body>
</html>