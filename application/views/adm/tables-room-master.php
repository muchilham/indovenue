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
                                    <h4 class="m-t-0 header-title"><b>Room Master Tables</b></h4>
                                    <p class="text-muted font-14 m-b-30">
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="m-b-30">
                                                <a href="<?php echo base_url(); ?>adm/Room/add_room_master" id="addToTable" class="btn btn-success waves-effect waves-light">Add <i class="mdi mdi-plus-circle-outline"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <table id="datatable_master" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Room Name</th>
                                            <th>Room Area</th>
                                            <th>Room Type</th>
                                            <th>Room Address</th>
                                            <th>Room Description</th>
                                            <th>Room Lat</th>
                                            <th>Room Lon</th>
                                            <th>Room Create Date</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>


                                        <tbody id="show_data_room_master">
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
                    <form action="javascript:delete_room_master();" method="post" id="form-delete">
                    <div class="modal-body">
                        <input type="hidden" name="room_master" id="room_master" value=""/>
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

        <div class="modal fade bs-example-modal-lg" id="modalLihat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Detail Narasumber</h6>
                                                                <hr class="light-grey-hr"/>
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="col-md-6 m-t-sm-50">
                                                                                    <!-- START carousel-->
                                                                                    <div id="carousel-example-captions-1" data-ride="carousel" class="carousel slide">
                                                                                        <ol class="carousel-indicators">
                                                                                            <li data-target="#carousel-example-captions-1" data-slide-to="0" class="active"></li>
                                                                                            <li data-target="#carousel-example-captions-1" data-slide-to="1"></li>
                                                                                            <li data-target="#carousel-example-captions-1" data-slide-to="2"></li>
                                                                                        </ol>
                                                                                        <div role="listbox" class="carousel-inner room">
                                                                                            <div class="item active">
                                                                                                <img src="assets/images/small/img-4.jpg" alt="First slide image">
                                                                                            </div>
                                                                                            <div class="item">
                                                                                                <img src="assets/images/small/img-5.jpg" alt="Second slide image">
                                                                                            </div>
                                                                                            <div class="item">
                                                                                                <img src="assets/images/small/img-6.jpg" alt="Third slide image">
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <!-- END carousel-->
                                                                                </div>
                                                                        </div>
                                                                            
                                                                        <div class="col-md-9">
                                                                            <div class="product-detail-wrap">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-4">Room Name :</label>
                                                                                            <div class="col-md-8">
                                                                                                <p id="room_name"></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-4">Room Area :</label>
                                                                                            <div class="col-md-8">
                                                                                                <p id="room_area"></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-4">Room Type :</label>
                                                                                            <div class="col-md-8">
                                                                                                <p id="room_type"></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-4">Room Address :</label>
                                                                                            <div class="col-md-8">
                                                                                                <p id="room_address"></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-4">Room Description :</label>
                                                                                            <div class="col-md-8">
                                                                                                <p id="room_description"></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-4">Room Capacity</label>
                                                                                            <div class="col-md-8 alamat">
                                                                                            <p id="room_capacity"></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-4">Room Discount</label>
                                                                                            <div class="col-md-8">
                                                                                            <p id="room_discount"></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="">
                                                                                <div class="panel-wrapper collapse in">
                                                                                    <div class="panel-body">
                                                                                        <div  class="pills-struct mt-40">
                                                                                            <ul role="tablist" class="nav nav-pills nav-pills-outline nav-pills-rounded" id="myTabs_13">
                                                                                                <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="home_tab_13" href="#harga">harga</a></li>
                                                                                                <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_13" role="tab" href="#fasilitas" aria-expanded="false">Fasilitas</a></li>
                                                                                                <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_13" role="tab" href="#jenis_kegiatan" aria-expanded="false">Jenis Kegiatan</a></li>
                                                                                                <li role="presentation" class=""><a  data-toggle="tab" id="profile_tab_13" role="tab" href="#lainlain" aria-expanded="false">Lain-lain</a></li>
                                                                                            </ul>
                                                                                            <div class="tab-content" id="myTabContent_13">
                                                                                                <div id="harga" class="tab-pane fade active in" role="tabpanel">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-3 tahun-gelar"></div>
                                                                                                        <div class="col-md-9 gelar"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div  id="fasilitas" class="tab-pane fade" role="tabpanel">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-3 tahun-profesi"></div>
                                                                                                        <div class="col-md-9 profesi"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div  id="jenis_kegiatan" class="tab-pane fade" role="tabpanel">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-3 tahun-lembaga"></div>
                                                                                                        <div class="col-md-4 lembaga"></div>
                                                                                                        <div class="col-md-5 singkatan"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div  id="lainlain" class="tab-pane fade" role="tabpanel">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-3 tahun-jabatan"></div>
                                                                                                        <div class="col-md-9 jabatan"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default text-left" data-dismiss="modal">Close</button>
                                                                </div>
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
                view_table_room_master();
                $('#datatable_master').dataTable();
            });
          
            function view_table_room_master(){
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url(); ?>adm/Room/view_room_master',
                    async : false,
                    dataType : 'json',
                    success : function(data){
                        var html = '';
                        var i;
                        var no=1;
                        for(i=0; i<data.length; i++){
                            var datas = '\''+data[i].id_room+'\'';
                            html += '<tr>'+
                                    '<td>'+ no++ +'</td>'+
                                    '<td>'+data[i].room_name+'</td>'+
                                    '<td>'+data[i].room_area+'</td>'+
                                    '<td>'+data[i].room_type+'</td>'+
                                    '<td>'+data[i].room_address+'</td>'+
                                    '<td>'+data[i].room_description+'</td>'+
                                    '<td>'+data[i].room_lat+'</td>'+
                                    '<td>'+data[i].room_lon+'</td>'+
                                    '<td>'+data[i].room_createdate+'</td>'+
                                    '<td class="actions"><button type="button" onclick="javascript:detail('+datas+');" class="btn btn-icon waves-effect waves-light btn-info"> <i class="fa fa-eye"></i> </button> <a href="<?php echo base_url(); ?>adm/Room/view_update_room_master/'+data[i].id_room+'"><button type="button" class="btn btn-icon waves-effect waves-light btn-primary"> <i class="fa fa-pencil"></i> </button></a> <button type="button" data-toggle="modal" data-target="#Delete" onclick="javascript:setValueidroom('+datas+');" class="btn btn-icon waves-effect waves-light btn-danger"> <i class="fa fa-trash"></i> </button></td>'+
                                    '</tr>';
                        }
                        $('#show_data_room_master').html(html);
                    }
     
                });
            }
            function setValueidroom(id_room)
            {
                $("#room_master").val(id_room);
            }
            function delete_room_master()
            {
                $.ajax({
                    url:"<?php echo base_url() ?>adm/Room/delete_room_master",
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

    function detail(id_room) 
    {
        $.ajax({
            url:"<?php echo base_url() ?>adm/Room/detail_room_master/"+id_room,
            type:"GET", 
            dataType:"JSON",
            success: function(data)
            {
                // if(data.select_narasumber.image == '')
                // {
                //     $('#image').html('<img src="<?php echo base_url(); ?>assets/dist/img/no_image.jpg" width="100%">')
                // }
                // else
                // {
                // $('#image').html('<img src="data.select_narasumber.image" width="100%">');
                // }
                $('#room_name').html(data.select_room_master.room_name);
                $('#room_area').html(data.select_room_master.room_area);
                $('#room_type').html(data.select_room_master.room_type);
                $('#room_address').html(data.select_room_master.room_address);
                $('#room_description').html(data.select_room_master.room_description);
                $('#room_discount').html(data.select_room_master.room_discount);
                $('#room_capacity').html(data.select_room_master.room_capacity);

                $('.room').empty()
                $.each(data.select_room_details, function(i, item) {
                    if(data.select_room_details[i].details_type == '5') 
                    {
                        $('.room ').append('<div class="item active"><img src="<?php echo base_url(); ?>upload/room/'+data.select_room_details[i].details_icon+'" width="100%" alt="First slide image"></div>');
                    }
                });

                $('#modalLihat').modal('show');
            }
      })
  }
</script>


    </body>
</html>