<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Adminox - Responsive Web App Kit</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="">

        <!-- DataTables -->
        <link href="<?php echo base_url(); ?>assets/adm/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/adm/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/adm/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/adm/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/adm/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/adm/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/adm/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>assets/adm/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

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
            <?php include"header.php"; ?>



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
                                    <h4 class="page-title">Account</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="<?php echo base_url(); ?>adm/Dashboard">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Account
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-12">
                            <div id="msg"></div>
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Account Tables</b></h4>
                                    <p class="text-muted font-14 m-b-30">
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="m-b-30">
                                                <a href="<?php echo base_url(); ?>adm/Account/add_account" id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Account Name</th>
                                            <th>Account Password</th>
                                            <th>Account Email</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>


                                        <tbody id="show_data_account">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include"footer.php"; ?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>

        <div id="Delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Delete This Data !</h5>
                    </div>
                    <form action="javascript:delete_account();" method="post" id="form-delete">
                    <div class="modal-body">
                        <input type="hidden" name="account_name" id="account_name" value=""/>
                        <p style="font-size: 16px">Are you sure want delete this ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.slimscroll.js"></script>

        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/dataTables.colVis.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <!-- init -->
        <script src="<?php echo base_url(); ?>assets/adm/pages/jquery.datatables.init.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                view_table_account();
                $('#datatable').dataTable();
            });

            function view_table_account(){
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url(); ?>adm/Account/view_table_account',
                    async : false,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i;
                        var no=1;
                        for(i=0; i<data.length; i++){
                            var datas = '\''+data[i].account_name+'\'';
                            html += '<tr>'+
                                    '<td>'+ no++ +'</td>'+
                                    '<td>'+data[i].account_name+'</td>'+
                                    '<td>'+data[i].account_password+'</td>'+
                                    '<td>'+data[i].account_email+'</td>'+
                                    '<td class="actions"><a href="<?php echo base_url(); ?>adm/Account/view_update_account/'+data[i].account_name+'"><button type="button" class="btn btn-icon waves-effect waves-light btn-primary"> <i class="fa fa-pencil"></i> </button></a> <button type="button" data-toggle="modal" data-target="#Delete" onclick="javascript:setValueAccountName('+datas+');" class="btn btn-icon waves-effect waves-light btn-danger"> <i class="fa fa-trash"></i> </button></td>'+
                                    '</tr>';
                        }
                        $('#show_data_account').html(html);

                    }
     
                });
            }
            function setValueAccountName(account_name)
            {
                $("#account_name").val(account_name);
            }

            function delete_account()
            {
                $.ajax({
                    url:"<?php echo base_url() ?>adm/Account/delete_account",
                    type:"POST",
                    dataType:"JSON",
                    data:$('#form-delete').serialize(),
                    success: function(response)
                    {
                        $('#Delete').modal('hide');
                        if(response.status == "true")
                        {
                            $('#msg').html("<div class='alert alert-success alert-dismissible fade in' role='alert'>Delete Data Success</div>");
                        }
                        else
                        {
                            $('#msg').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>Delete Data Failed</div>");
                        }                         
                        setTimeout(function(){ $("#msg").hide(); }, 4000);
                        setTimeout(function(){
                            location.reload(); 
                        }, 5000);

                        // window.location.reload();

                    }
                })
            }
 
            // TableManageButtons.init();

        </script>


    </body>
</html>