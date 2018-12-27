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
        <link rel="shortcut icon" href="assets/adm/images/favicon.ico">

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
                                    <h4 class="page-title">Room Master</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="<?php echo base_url(); ?>adm/Dashboard">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Room Master
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                            <div id="msg"></div>
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Booking Master Tables</b></h4>
                                    <p class="text-muted font-14 m-b-30">
                                    </p>
                                    
                                    <table id="datatable_master" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Id Booking</th>
                                            <th>Id Room</th>
                                            <th>Booking Start</th>
                                            <th>Booking End</th>
                                            <th>Booking Create Date</th>
                                            <th>Account Name</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>


                                        <tbody id="show_data_booking_master">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->

                <?php include"footer.php"; ?>

            </div>

            <div id="booking" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Confirm Data !</h5>
                        </div>
                         <form action="<?php echo base_url(); ?>adm/Booking/add_detail_booking" method="post" id="form-add">
                        <div class="modal-body">
                           
                                <input type="hidden" name="status_booking" id="status_booking" value=""/>
                                <input type="hidden" name="id_booking" id="bookId" value=""/>
                                <input type="hidden" name="account_name" id="account_name" value=""/>
                                <label for="">Booking Description</label>
                                <textarea class="form-control" name="booking_description" rows="1" required></textarea>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                        </form>
                    </div>
                </div>
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
                view_table_booking_master();
                $('#datatable_master').dataTable();
            });
          
            function view_table_booking_master(){
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url(); ?>adm/Booking/view_booking_master',
                    async : false,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i;
                        var no=1;
                        var count = "";
                        var canceled = "";

                        for(i=0; i<data.length; i++){
                            var id_booking = '\''+data[i].id_booking+'\'';
                            var counts = '\''+data[i].count+'\'';
                            var account_name = '\''+data[i].account_name+'\'';
                            if(data[i].count == 0)
                            {
                                count= "";
                                canceled = '<button type="button" class="btn btn-icon waves-effect waves-light btn-danger" disabled> Canceled </button></td>'
                            }
                            else if(data[i].count == 1)
                            {
                               count= '<button type="button" onclick="SetValueBooking('+id_booking+','+counts+','+account_name+')" data-toggle="modal" data-target="#booking" class="btn btn-icon waves-effect waves-light btn-primary"> Accept Book </button>';
                               canceled = '<button type="button" onclick="CanceledBooking('+id_booking+','+account_name+')" class="btn btn-icon waves-effect waves-light btn-danger"> Canceled </button></td>'
                            }
                            else if(data[i].count == 2)
                            {
                               count= '<button type="button" onclick="SetValueBooking('+id_booking+','+counts+','+account_name+')" data-toggle="modal" data-target="#booking" class="btn btn-icon waves-effect waves-light btn-warning"> Confirm Book </button>';
                               canceled = '<button type="button" onclick="CanceledBooking('+id_booking+','+account_name+')" class="btn btn-icon waves-effect waves-light btn-danger"> Canceled </button></td>'
                            }
                            else if(data[i].count == 3)
                            {
                               count= '<button type="button" onclick="SetValueBooking('+id_booking+','+counts+','+account_name+')" data-toggle="modal" data-target="#booking" class="btn btn-icon waves-effect waves-light btn-success"> Finish </button>';
                               canceled = '<button type="button" onclick="CanceledBooking('+id_booking+','+account_name+')" class="btn btn-icon waves-effect waves-light btn-danger"> Canceled </button></td>'
                            }
                            else
                            {
                               count= '<button type="button" onclick="SetValueBooking('+id_booking+','+counts+','+account_name+')" disabled class="btn btn-icon waves-effect waves-light btn-default"> Finished </button>';
                               canceled = ''
                            }

                            html += '<tr>'+
                                    '<td>'+ no++ +'</td>'+
                                    '<td>'+data[i].id_booking+'</td>'+
                                    '<td>'+data[i].id_room+'</td>'+
                                    '<td>'+data[i].booking_start+'</td>'+
                                    '<td>'+data[i].booking_end+'</td>'+
                                    '<td>'+data[i].booking_createdate+'</td>'+
                                    '<td>'+data[i].account_name+'</td>'+
                                    '<td class="actions">'+count+'</td>'+
                                    '<td class="actions">'+canceled+'</td>'+
                                    '<td>'+
                                    '</tr>';
                        }
                        $('#show_data_booking_master').html(html);
                    }
     
                });
            }

            function SetValueBooking(id_booking,count,account_name) {
                $("#booking #bookId").val(id_booking);
                $("#status_booking").val(count);
                $("#account_name").val(account_name);
            }
            function CanceledBooking(id_booking,account_name) {
                $.ajax({
                    url:"<?php echo base_url() ?>adm/Booking/canceled_booking",
                    type:"POST",
                    dataType:"JSON",
                    data:{id_booking : id_booking, account_name : account_name},
                    success: function(response)
                    {
                        $('#booking').modal('hide');
                        if(response.status == "true")
                        {
                            $('#msg').html("<div class='alert alert-success alert-dismissible fade in' role='alert'>"+response.msg+"</div>");
                        }
                        else
                        {
                            $('#msg').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+response.msg+"</div>");
                        }
                        setTimeout(function(){ $("#msg").hide(); }, 4000);
                        setTimeout(function(){
                            location.reload();
                        }, 5000);

                    }
                })
            }

            function description()
            {
                $.ajax({
                    url:"<?php echo base_url() ?>adm/Booking/add_detail_booking",
                    type:"POST",
                    dataType:"JSON",
                    data:$('#form-add').serialize(),
                    success: function(response)
                    {
                        $('#booking').modal('hide');
                        if(response.status == "true")
                        {
                            $('#msg').html("<div class='alert alert-success alert-dismissible fade in' role='alert'>Add Data Success</div>");
                        }
                        else
                        {
                            $('#msg').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>Add Data Failed</div>");
                        }                         
                        setTimeout(function(){ $("#msg").hide(); }, 4000);
                        setTimeout(function(){
                            location.reload(); 
                        }, 5000);

                    }
                })
            }
 
            // TableManageButtons.init();

        </script>


    </body>
</html>