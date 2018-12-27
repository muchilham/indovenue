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
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/adm/css/jquery-gmaps-latlon-picker.css"/> -->

        <script src="<?php echo base_url(); ?>assets/adm/js/modernizr.min.js"></script>
        <link href="<?php echo base_url() ?>assets/adm/css/bootstrap-fileupload.min.css" rel="stylesheet">
        <style type="text/css">
            .gllpMap { width: 500px; height: 250px; }
        </style>

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
                                    <h4 class="page-title">Form Add Room Master</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="<?php echo base_url(); ?>adm/Dashboard">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>adm/Room/room_master">Room Master</a>
                                        </li>
                                        <li class="active">
                                            Add Room Master
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div id="msg"><?php echo $this->session->flashdata('notif'); ?></div>
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30">Form Add</h4>
                                    <?php echo form_open_multipart('adm/Room/add_data_master');?>
                                    <form action="" id="form-add" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Room Name<span class="text-danger">*</span></label>
                                            <input type="text" name="room_name" required placeholder="Enter Room Name" class="form-control" id="room_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Room Area<span class="text-danger">*</span></label>
                                            <select id="heard" class="form-control" name="room_area">
                                                <option value="">Choose..</option>
                                                <?php foreach ($select_room_area->result() as $key) { ?>
                                                <option value="<?php echo $key->room_area_name; ?>"><?php echo $key->room_area_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Room Type<span class="text-danger">*</span></label>
                                            <select id="heard" class="form-control" name="room_type">
                                                <option value="">Choose..</option>
                                                <?php foreach ($select_room_type->result() as $key) { ?>
                                                <option value="<?php echo $key->room_type_name; ?>"><?php echo $key->room_type_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Room Address<span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="room_address" rows="1" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Room Description<span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="room_description" rows="1" required></textarea>
                                        </div>
                                        <fieldset class="gllpLatlonPicker">
                                            <!-- <input type="text" class="gllpSearchField">
                                            <input type="button" class="gllpSearchButton" value="search"> -->
                                            <br/><br/>
                                            <div class="gllpMap">Google Maps</div>
                                            <br>
                                            <div class="form-group">
                                                <label for="">Room Lat<span class="text-danger">*</span></label>
                                                <input type="text" required placeholder="Enter Room Lat" name="room_lat" class="form-control gllpLatitude" id="room_lat">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Room Lon<span class="text-danger">*</span></label>
                                                <input type="text" required placeholder="Enter Room Lon" name="room_lon" class="form-control gllpLongitude" id="room_Lon">
                                            </div>
                                        </fieldset>
                                        <div class="form-group">
                                            <label for="">Room Discount<span class="text-danger">*</span></label>
                                            <input id="demo1" type="text" value="55" name="demo1">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Room Capacity<span class="text-danger">*</span></label>
                                            <input type="text" required placeholder="Enter Room Capacity" name="room_capacity" class="form-control" id="room_Capacity">
                                        </div>
                                        <div class="form-group">
                                        <label for="">Room Favorite</label>
                                            <div class="checkbox checkbox-danger">
                                                <input id="checkbox6" name="room_favorit" value="1" type="checkbox">
                                                <label for="">Room Favorite</label>
                                            </div>
                                        </div>
                                        <br>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#harga" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-home"></i></span>
                                                <span class="hidden-xs">Harga</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#fasilitas" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-user"></i></span>
                                                <span class="hidden-xs">Fasilitas</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#jenis_kegiatan" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                                                <span class="hidden-xs">Jenis Kegiatan</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#lainlain" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                                <span class="hidden-xs">Lain-lain</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#room" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                                <span class="hidden-xs">Room</span>
                                            </a>
                                        </li>
                                    </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane active harga" id="harga">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="userName">Details Name<span class="text-danger">*</span></label>
                                                        <input type="hidden" name="harga" hidden="" required placeholder="Enter harga" class="form-control" id="harga" value="1">
                                                        <input type="text" name="detail_name[]" required placeholder="Enter Detail Name" class="form-control" id="detail_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="userName">Details Value<span class="text-danger">*</span></label>
                                                        <input type="text" name="detail_value_harga[]" required placeholder="Enter Detail Value" class="form-control" id="detail_value">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label for="userName">Details Description<span class="text-danger">*</span></label>
                                                      <div class="input-group">
                                                        <textarea class="form-control" name="detail_description[]" rows="1" required></textarea>
                                                        <span class="input-group-addon"><a onclick="harga()"><i class="fa fa-plus"></i></a></span>
                                                      </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="fasilitas">
                                                <div class="tab-pane active fasilitas" id="home">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="userName">Details Value<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                            <input type="hidden" name="fasilitas" hidden="" required placeholder="Enter fasilitas" class="form-control" id="fasilitas" value="2">
                                                            <input type="text" name="detail_value_fasilitas[]" required placeholder="Enter Detail Value" class="form-control" id="detail_value">
                                                            <span class="input-group-addon"><a onclick="fasilitas()"><i class="fa fa-plus"></i></a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        <label for="userName">Details Icon<span class="text-danger">*</span></label>
                                                          <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <div class="fileupload-new thumbnail" style="width: 100%; height: 250px;">
                                                                    <img src="" alt="" />
                                                                </div>
                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; max-height: 250px; line-height: 20px;"></div>
                                                                <br>
                                                                <span class="btn btn-default btn-file">
                                                                    <input name="file" class="fileupload-new"><span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select File</span>
                                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                    <input type="file" name="file_fasilitas[]"/>
                                                                </span>
                                                                   <!-- <button type="submit" name="upload" class="btn btn-sm btn-success fileupload-exists"> Done </button> -->
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="jenis_kegiatan">
                                                <div class="tab-pane active kegiatan" id="home">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        <label for="userName">Details Value<span class="text-danger">*</span></label>
                                                          <div class="input-group">
                                                          <input type="hidden" name="jenis_kegiatan" hidden="" required placeholder="Enter jenis_kegiatan" class="form-control" id="jenis_kegiatan" value="3">
                                                            <select id="heard" class="form-control" name="detail_value_kegiatan[]">
                                                                <option value="">Choose..</option>
                                                                <?php foreach ($select_activity_type->result() as $key) { ?>
                                                                <option value="<?php echo $key->activity_name; ?>"><?php echo $key->activity_name; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <span class="input-group-addon"><a onclick="kegiatan()"><i class="fa fa-plus"></i></a></span>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane dll" id="lainlain">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="userName">Details Value<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                            <input type="hidden" name="lain_lain" required placeholder="Enter lain-lain" class="form-control" id="lain_lain" value="4">
                                                            <input type="text" name="detail_value_lainlain[]" required placeholder="Enter Detail Value" class="form-control" id="detail_lainlain">
                                                            <span class="input-group-addon"><a onclick="dll()"><i class="fa fa-plus"></i></a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="userName">Details Icon<span class="text-danger">*</span></label>
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <div class="fileupload-new thumbnail" style="width: 100%; height: 250px;">
                                                                    <img src="" alt="" />
                                                                </div>
                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; max-height: 250px; line-height: 20px;"></div>
                                                                <br>
                                                                <span class="btn btn-default btn-file">
                                                                    <input name="file" class="fileupload-new"><span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select File</span>
                                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                    <input type="file" name="file_lainlain[]"/>
                                                                </span>
                                                                   <!-- <button type="submit" name="upload" class="btn btn-sm btn-success fileupload-exists"> Done </button> -->
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                            </div>
                                            <div class="tab-pane" id="room">
                                                <div class="tab-pane active room" id="home">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        <div class="input-group">
                                                        <label for="userName">Image<span class="text-danger">*</span></label>
                                                        <span class="input-group-addon"><a onclick="room()"><i class="fa fa-plus"></i></a></span>
                                                        </div>
                                                        
                                                          <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <div class="fileupload-new thumbnail" style="width: 100%; height: 250px;">
                                                                    <img src="" alt="" />
                                                                </div>
                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; max-height: 250px; line-height: 20px;"></div>
                                                                <br>
                                                                <span class="btn btn-default btn-file">
                                                                    <input name="file" class="fileupload-new"><span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select File</span>
                                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                    <input type="file" name="file_room[]"/>
                                                                </span>
                                                                   <!-- <button type="submit" name="upload" class="btn btn-sm btn-success fileupload-exists"> Done </button> -->
                                                            </div>
                                                            
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="form-group text-right m-b-0">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-default waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- end col -->
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
        </script>
        <script src="<?php echo base_url(); ?>assets/adm/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAuISbZOqMOkG7TKPYlKuISyeM82uqE73s"></script>
        <script src="<?php echo base_url(); ?>assets/adm/js/jquery-gmaps-latlon-picker.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/adm/pages/jquery.form-advanced.init.js"></script>
        <script>
            function add()
            {
                $.ajax({
                    url:"<?php echo base_url() ?>adm/Room/add_data_master",
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
                            $('#msg').html("<div class='alert alert-success alert-dismissible fade in' role='alert'>Add Data Success</div>");
                        }
                        else
                        {
                            $('#msg').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>Add Data Failed</div>");
                        }                         
                        setTimeout(function(){ $("#msg").hide(); }, 4000);

                    }
                })
            }

            var counter = 0;

            function harga()
            {

              $(".harga").append('<div id="delete_harga'+ counter +'"><div class="col-md-12">'+
                                        '<div class="form-group">'+
                                        '<label for="userName">Details Name<span class="text-danger">*</span></label>'+
                                            '<input type="text" name="detail_name[]" required placeholder="Enter Detail Name" class="form-control" id="detail_name">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-12">'+
                                        '<div class="form-group">'+
                                            '<label for="userName">Details Value<span class="text-danger">*</span></label>'+
                                            '<input type="text" name="detail_value_harga[]" required placeholder="Enter Detail Value" class="form-control" id="detail_value">'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-12">'+
                                        '<div class="form-group">'+
                                        '<label for="userName">Details Name<span class="text-danger">*</span></label>'+
                                          '<div class="input-group">'+
                                            '<textarea class="form-control" name="detail_description[]" rows="2" required></textarea>'+
                                            '<span class="input-group-addon"><a onclick="close_harga('+ counter +')"><i class="fa fa-minus"></i></a></span>'+
                                          '</div>'+
                                        '</div>'+
                                        '<hr>'+
                                    '</div>'+
                                '</div></div>');
              counter++;

            }
            function fasilitas()
            {

              $(".fasilitas").append('<div id="delete_fasilitas'+ counter +'"><div class="col-md-12">'+
                                        '<div class="form-group">'+
                                            '<label for="userName">Details Value<span class="text-danger">*</span></label>'+
                                            '<div class="input-group">'+
                                            '<input type="text" name="detail_value_fasilitas[]" required placeholder="Enter Detail Value" class="form-control" id="detail_fasilitas">'+
                                            '<span class="input-group-addon"><a onclick="close_fasilitas('+ counter +')"><i class="fa fa-minus"></i></a></span>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                   '<div class="col-md-12">'+
                                        '<div class="form-group">'+
                                        '<label for="userName">Details Icon<span class="text-danger">*</span></label>'+
                                          '<div class="fileupload fileupload-new" data-provides="fileupload">'+
                                            '<div class="fileupload-new thumbnail" style="width: 100%; height: 250px;">'+
                                                '<img src="" alt="" />'+
                                            '</div>'+
                                            '<div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; max-height: 250px; line-height: 20px;"></div>'+
                                            '<br>'+
                                            '<span class="btn btn-default btn-file">'+
                                                '<input name="file" class="fileupload-new"><span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select File</span>'+
                                                '<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>'+
                                                '<input type="file" name="file_fasilitas[]"/>'+
                                            '</span>'+
                                        '</div>'+
                                        '</div>'+
                                        '<hr>'+
                                    '</div>'+
                                '</div></div>');
              counter++;

            }
            function kegiatan()
            {

              $(".kegiatan").append('<div id="delete_kegiatan'+ counter +'">'+
                                    '<div class="col-md-12">'+
                                        '<div class="form-group">'+
                                          '<div class="input-group">'+
                                             '<select id="heard" class="form-control" required="" name="detail_value_kegiatan[]">'+
                                                '<option value="">Choose..</option>'+
                                                '<?php foreach ($select_activity_type->result() as $key) { ?>'+
                                                '<option value="<?php echo $key->activity_name; ?>"><?php echo $key->activity_name; ?></option>'+
                                                '<?php } ?>'+
                                            '</select>'+
                                            '<span class="input-group-addon"><a onclick="close_kegiatan('+ counter +')"><i class="fa fa-minus"></i></a></span>'+
                                          '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div></div>');
              counter++;

            }
            function dll()
            {

              $(".dll").append('<div id="delete_dll'+ counter +'"><div class="col-md-12">'+
                                        '<div class="form-group">'+
                                            '<label for="userName">Details Value<span class="text-danger">*</span></label>'+
                                            '<div class="input-group">'+
                                            '<input type="text" name="detail_value_lainlain[]" required placeholder="Enter Detail Value" class="form-control" id="detail_lainlain">'+
                                            '<span class="input-group-addon"><a onclick="close_dll('+ counter +')"><i class="fa fa-minus"></i></a></span>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-12">'+
                                        '<div class="form-group">'+
                                        '<label for="userName">Details Icon<span class="text-danger">*</span></label>'+
                                          '<div class="fileupload fileupload-new" data-provides="fileupload">'+
                                            '<div class="fileupload-new thumbnail" style="width: 100%; height: 250px;">'+
                                                '<img src="" alt="" />'+
                                            '</div>'+
                                            '<div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; max-height: 250px; line-height: 20px;"></div>'+
                                            '<br>'+
                                            '<span class="btn btn-default btn-file">'+
                                                '<input name="file" class="fileupload-new"><span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select File</span>'+
                                                '<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>'+
                                                '<input type="file" name="file_lainlain[]"/>'+
                                            '</span>'+
                                        '</div>'+
                                        '</div>'+
                                        '<hr>'+
                                    '</div>'+
                                '</div></div>');
              counter++;

            }

            function room()
            {

              $(".room").append('<div id="delete_room'+ counter +'">'+
                                    '<div class="col-md-12">'+
                                        '<div class="form-group">'+
                                        '<div class="input-group">'+
                                        '<label for="userName">Image<span class="text-danger">*</span></label>'+
                                        '<span class="input-group-addon"><a onclick="close_room('+ counter +')"><i class="fa fa-minus"></i></a></span>'+
                                        '</div>'+
                                          '<div class="fileupload fileupload-new" data-provides="fileupload">'+
                                            '<div class="fileupload-new thumbnail" style="width: 100%; height: 250px;">'+
                                                '<img src="" alt="" />'+
                                            '</div>'+
                                            '<div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; max-height: 250px; line-height: 20px;"></div>'+
                                            '<br>'+
                                            '<span class="btn btn-default btn-file">'+
                                                '<input name="file" class="fileupload-new"><span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select File</span>'+
                                                '<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>'+
                                                '<input type="file" name="file_room[]"/>'+
                                            '</span>'+
                                        '</div>'+
                                        '</div>'+
                                        '<hr>'+
                                    '</div>'+
                                '</div></div>');
              counter++;

            }

            function close_harga(no)
            {
              $('#delete_harga'+no).remove();
            }
            function close_fasilitas(no)
            {
              $('#delete_fasilitas'+no).remove();
            }
            function close_kegiatan(no)
            {
              $('#delete_kegiatan'+no).remove();
            }
            function close_dll(no)
            {
              $('#delete_dll'+no).remove();
            }
            function close_room(no)
            {
              $('#delete_room'+no).remove();
            }
        </script>

    </body>
</html>