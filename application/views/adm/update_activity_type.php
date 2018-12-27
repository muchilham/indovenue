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
                                    <h4 class="page-title">Form Update Activity Type</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="<?php echo base_url(); ?>adm/Dashboard">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>adm/Activity_type">Activity Type</a>
                                        </li>
                                        <li class="active">
                                            Update Activity Type
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

                                    <form action="javascript:update('<?php echo $select_activity_get->id_activity; ?>');" id="form-update" method="get">
                                        <div class="form-group">
                                            <label for="userName">Activity Name<span class="text-danger">*</span></label>
                                            <input type="text" name="activity_name" value="<?php echo $select_activity_get->activity_name; ?>" required placeholder="Enter Activity Name" class="form-control" id="activity_name">
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

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('form').parsley();
            });

            function update($id_activity)
            {
                $.ajax({
                    url:"<?php echo base_url() ?>adm/Activity_type/update_data/"+$id_activity,
                    type:"POST",
                    dataType:"JSON",
                    data:$('#form-update').serialize(),
                    success: function(response)
                    {
                        $("#form-update").each(function(){
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