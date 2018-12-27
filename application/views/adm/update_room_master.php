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
                                    <h4 class="page-title">Form Update Room Master</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="<?php echo base_url(); ?>adm/Dashboard">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>adm/Room/room_master">Room Master</a>
                                        </li>
                                        <li class="active">
                                            Update Room Master
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
                                    <?php echo form_open_multipart('adm/Room/update_data_master/'.$select_room_master->id_room); ?>
                                    <form action="" id="form-add" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="">Room Name<span class="text-danger">*</span></label>
                                            <input type="text" name="room_name" value="<?php echo $select_room_master->room_name; ?>" required placeholder="Enter Room Name" class="form-control" id="room_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Room Area<span class="text-danger">*</span></label>
                                            <select id="heard" class="form-control" name="room_area">
                                                <option value="">Choose..</option>
                                                <?php foreach ($select_room_area->result() as $key) { ?>
                                                <option value="<?php echo $key->room_area_name; ?>"<?php if($key->room_area_name === $select_room_master->room_area) echo 'selected="selected"';?>><?php echo $key->room_area_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Room Type<span class="text-danger">*</span></label>
                                            <select id="heard" class="form-control" name="room_type">
                                                <option value="">Choose..</option>
                                                <?php foreach ($select_room_type->result() as $key) { ?>
                                                <option value="<?php echo $key->room_type_name; ?>"<?php if($key->room_type_name === $select_room_master->room_type) echo 'selected="selected"';?>><?php echo $key->room_type_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Room Address<span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="room_address" rows="1" required><?php echo $select_room_master->room_address; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Room Description<span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="room_description" rows="1" required><?php echo $select_room_master->room_description; ?></textarea>
                                        </div>
                                        <fieldset class="gllpLatlonPicker">
                                            <!-- <input type="text" class="gllpSearchField">
                                            <input type="button" class="gllpSearchButton" value="search"> -->
                                            <br/><br/>
                                            <div class="gllpMap">Google Maps</div>
                                            <br>
                                            <div class="form-group">
                                                <label for="">Room Lat<span class="text-danger">*</span></label>
                                                <input type="text" required placeholder="Enter Room Lat" name="room_lat" class="form-control gllpLatitude" id="room_lat" value="<?php echo $select_room_master->room_lat; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Room Lon<span class="text-danger">*</span></label>
                                                <input type="text" required placeholder="Enter Room Lon" name="room_lon" class="form-control gllpLongitude" id="room_Lon" value="<?php echo $select_room_master->room_lon; ?>">
                                            </div>
                                        </fieldset>
                                        <div class="form-group">
                                            <label for="">Room Discount<span class="text-danger">*</span></label>
                                            <input id="demo1" type="text" value="55" name="demo1" value="<?php echo $select_room_master->room_discount; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Room Capacity<span class="text-danger">*</span></label>
                                            <input type="text" required placeholder="Enter Room Capacity" name="room_capacity" class="form-control" id="room_Capacity" value="<?php echo $select_room_master->room_capacity; ?>">
                                        </div>
                                        <div class="form-group">
                                        <label for="">Room Favorite</label>
                                            <div class="checkbox checkbox-danger">
                                            <?php if($select_room_master->room_favorit == '1')
                                            {
                                            ?>
                                                <input id="checkbox6" name="room_favorit" value="1" type="checkbox" checked="">
                                            <?php 
                                            }
                                            else
                                            { 
                                            ?>
                                                <input id="checkbox6" name="room_favorit" value="1" type="checkbox">
                                            <?php
                                            }
                                            ?>

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
                                                <?php 
                                                $last_harga="";
                                                $no = 1;
                                                foreach ($select_room_details as $key_harga) {
                                                    if($key_harga->details_type == '1')
                                                    {
                                                ?>
                                                <div id="delete<?php echo $no; ?>">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="userName">Details Name<span class="text-danger">*</span></label>
                                                        <input type="hidden" name="harga" hidden="" required placeholder="Enter harga" class="form-control" id="harga" value="1">
                                                        <input type="text" name="detail_name[]" value="<?php echo $key_harga->details_name; ?>" required placeholder="Enter Detail Name" class="form-control" id="detail_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="userName">Details Value<span class="text-danger">*</span></label>
                                                        <input type="text" name="detail_value_harga[]" value="<?php echo $key_harga->details_value; ?>" required placeholder="Enter Detail Value" class="form-control" id="detail_value">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                    <label for="userName">Details Description<span class="text-danger">*</span></label>
                                                      <div class="input-group">
                                                        <textarea class="form-control" name="detail_description[]" rows="1" required><?php echo $key_harga->details_description; ?></textarea>
                                                        <?php if($last_harga == "") { ?>
                                                        <span class="input-group-addon"><a onclick="harga()"><i class="fa fa-plus"></i></a></span>
                                                        <?php 
                                                        }
                                                        else
                                                        {
                                                        ?>
                                                        <span class="input-group-addon"><a onclick="delete_harga('<?php echo $no; ?>')"><i class="fa fa-minus"></i></a></span>
                                                        <?php
                                                        }
                                                        $last_harga = $no++;
                                                        ?>
                                                        
                                                      </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                </div>
                                                <?php
                                                }
                                                }
                                                ?>
                                            </div>
                                            <div class="tab-pane" id="fasilitas">
                                                <div class="tab-pane active fasilitas" id="home">
                                                <a onclick="fasilitas()"><button type="button" data-toggle="modal" data-target="#Delete" class="btn btn-icon waves-effect waves-light btn-success"> <i class="fa fa-plus"></i> </button></a>
                                                <br>
                                                <br>
                                                <input type="hidden" name="fasilitas" hidden="" required placeholder="Enter fasilitas" class="form-control" id="fasilitas" value="2">
                                                <?php 
                                                $last_fasilitas="";
                                                $no = 1;
                                                foreach ($select_room_details as $key_fasilitas) {
                                                    if($key_fasilitas->details_type == '2')
                                                    {
                                                ?>
                                                
                                                <div id="delete<?php echo $no; ?>">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="userName">Details Value<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                            
                                                            <input type="text" name="detail_value_fasilitas[]" value="<?php echo $key_fasilitas->details_value; ?>" required placeholder="Enter Detail Value" class="form-control" id="detail_value">
                                                            
                                                            <span class="input-group-addon"><a onclick="delete_fasilitas('<?php echo $no; ?>')"><i class="fa fa-minus"></i></a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        <label for="userName">Details Icon<span class="text-danger">*</span></label>
                                                          <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <div class="fileupload-new thumbnail" style="width: 100%; height: 250px;">
                                                                    <img src="<?php echo base_url(); ?>upload/fasilitas/<?php echo $key_fasilitas->details_icon; ?>" alt="" />
                                                                </div>
                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; max-height: 250px; line-height: 20px;"></div>
                                                                <br>
                                                                <span class="btn btn-default btn-file">
                                                                    <input name="file_fasilitas[]" class="fileupload-new" value="<?php echo $key_fasilitas->details_icon; ?>"><span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select File</span>
                                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                    <input type="file" name="file_fasilitas[]" value="<?php echo $key_fasilitas->details_icon; ?>"/>
                                                                </span>
                                                                   <!-- <button type="submit" name="upload" class="btn btn-sm btn-success fileupload-exists"> Done </button> -->
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    </div>
                                                <?php
                                                $no++;
                                                }
                                                }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="jenis_kegiatan">
                                                <div class="tab-pane active kegiatan" id="home">
                                                <label for="userName">Details Value<span class="text-danger">*</span></label>
                                                <?php 
                                                $last_kegiatan="";
                                                $no = 1;
                                                foreach ($select_room_details as $key_kegiatan) {
                                                    if($key_kegiatan->details_type == '3')
                                                    {
                                                ?>
                                                <div id="delete<?php echo $no; ?>">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        
                                                          <div class="input-group">
                                                          <input type="hidden" name="jenis_kegiatan" hidden="" required placeholder="Enter jenis_kegiatan" class="form-control" id="jenis_kegiatan" value="3">
                                                            <select id="heard" class="form-control" name="detail_value_kegiatan[]">
                                                                <option value="">Choose..</option>
                                                                <?php foreach ($select_activity_type->result() as $key) { ?>
                                                                <option value="<?php echo $key->activity_name; ?>"<?php if($key->activity_name === $key_kegiatan->details_value) echo 'selected="selected"';?>><?php echo $key->activity_name; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            <?php if($last_kegiatan == "") { ?>
                                                            <span class="input-group-addon"><a onclick="kegiatan()"><i class="fa fa-plus"></i></a></span>
                                                            <?php 
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                            <span class="input-group-addon"><a onclick="delete_kegiatan('<?php echo $no; ?>')"><i class="fa fa-minus"></i></a></span>
                                                            <?php
                                                            }
                                                            $last_kegiatan = $no++;
                                                            ?>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                                }
                                                ?>
                                                </div>
                                            </div>
                                            <div class="tab-pane dll" id="lainlain">
                                            <a onclick="dll()"><button type="button" data-toggle="modal" data-target="#Delete" class="btn btn-icon waves-effect waves-light btn-success"> <i class="fa fa-plus"></i> </button></a>
                                            <br>
                                            <br>
                                            <input type="hidden" name="lain_lain" required placeholder="Enter lain-lain" class="form-control" id="lain_lain" value="4">
                                            <?php 
                                                $last_lainlain="";
                                                $no = 1;
                                                foreach ($select_room_details as $key_lainlain) {
                                                    if($key_lainlain->details_type == '4')
                                                    {
                                                ?>
                                                <div id="delete<?php echo $no; ?>">
                                                <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="userName">Details Value<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                            
                                                            <input type="text" name="detail_value_lainlain[]" required placeholder="Enter Detail Value" class="form-control" id="detail_lainlain" value="<?php echo $key_lainlain->details_value; ?>">
                                                            <span class="input-group-addon"><a onclick="delete_dll('<?php echo $no; ?>')"><i class="fa fa-minus"></i></a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="userName">Details Icon<span class="text-danger">*</span></label>
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <div class="fileupload-new thumbnail" style="width: 100%; height: 250px;">
                                                                    <img src="<?php echo base_url(); ?>upload/lainlain/<?php echo $key_lainlain->details_icon; ?>" alt="" />
                                                                </div>
                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; max-height: 250px; line-height: 20px;"></div>
                                                                <br>
                                                                <span class="btn btn-default btn-file">
                                                                    <input name="file_lainlain[]" class="fileupload-new" value="<?php echo $key_lainlain->details_icon; ?>"><span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select File</span>
                                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                    <input type="file" value="<?php echo $key_lainlain->details_icon; ?>" name="file_lainlain[]"/>
                                                                </span>
                                                                   <!-- <button type="submit" name="upload" class="btn btn-sm btn-success fileupload-exists"> Done </button> -->
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    </div>
                                                <?php
                                                $no++;
                                                }
                                                }
                                                ?>
                                            </div>
                                            <div class="tab-pane" id="room">
                                                <div class="tab-pane active room" id="home">
                                                <a onclick="room()"><button type="button" data-toggle="modal" data-target="#Delete" class="btn btn-icon waves-effect waves-light btn-success"> <i class="fa fa-plus"></i> </button></a>
                                                <br>
                                                <br>
                                                <?php 
                                                $last_room="";
                                                $no = 1;
                                                foreach ($select_room_details as $key_room) {
                                                    if($key_room->details_type == '5')
                                                    {
                                                ?>
                                                <div id="delete<?php echo $no; ?>">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                        <div class="input-group">
                                                        <label for="userName">Image<span class="text-danger">*</span></label>
                                                            <span class="input-group-addon"><a onclick="delete_room('<?php echo $no; ?>')"><i class="fa fa-minus"></i></a></span>
                                                        </div>
                                                        
                                                          <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <div class="fileupload-new thumbnail" style="width: 100%; height: 250px;">
                                                                    <img src="<?php echo base_url(); ?>upload/room/<?php echo $key_room->details_icon; ?>" alt="" />
                                                                </div>
                                                                <div class="fileupload-preview fileupload-exists thumbnail" style="width: 100%; max-height: 250px; line-height: 20px;"></div>
                                                                <br>
                                                                <span class="btn btn-default btn-file">
                                                                    <input name="file_room[]" class="fileupload-new" value="<?php echo $key_room->details_icon; ?>"><span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select File</span>
                                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                    <input type="file" value="<?php echo $key_room->details_icon; ?>" name="file_room[]"/>
                                                                </span>
                                                                   <!-- <button type="submit" name="upload" class="btn btn-sm btn-success fileupload-exists"> Done </button> -->
                                                            </div>
                                                            
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    </div>
                                                <?php
                                                $no++;
                                                }
                                                }
                                                ?>
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
        <script>
            (function($) {

            // for ie9 doesn't support debug console >>>
            if (!window.console) window.console = {};
            if (!window.console.log) window.console.log = function () { };
            // ^^^

            $.fn.gMapsLatLonPicker = (function() {

                var _self = this;

                ///////////////////////////////////////////////////////////////////////////////////////////////
                // PARAMETERS (MODIFY THIS PART) //////////////////////////////////////////////////////////////
                _self.params = { 
                    defLat : <?php echo $select_room_master->room_lat; ?>,
                    defLng : <?php echo $select_room_master->room_lon; ?>,
                    defZoom : 20,
                    queryLocationNameWhenLatLngChanges: true,
                    queryElevationWhenLatLngChanges: true,
                    mapOptions : {
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        mapTypeControl: false,
                        disableDoubleClickZoom: true,
                        zoomControlOptions: true,
                        streetViewControl: false
                    },
                    strings : {
                        markerText : "Drag this Marker",
                        error_empty_field : "Couldn't find coordinates for this place",
                        error_no_results : "Couldn't find coordinates for this place"
                    },
                    displayError : function(message) {
                        alert(message);
                    }
                };


                ///////////////////////////////////////////////////////////////////////////////////////////////
                // VARIABLES USED BY THE FUNCTION (DON'T MODIFY THIS PART) ////////////////////////////////////
                _self.vars = {
                    ID : null,
                    LATLNG : null,
                    map : null,
                    marker : null,
                    geocoder : null
                };

                ///////////////////////////////////////////////////////////////////////////////////////////////
                // PRIVATE FUNCTIONS FOR MANIPULATING DATA ////////////////////////////////////////////////////
                var setPosition = function(position) {
                    _self.vars.marker.setPosition(position);
                    _self.vars.map.panTo(position);

                    $(_self.vars.cssID + ".gllpZoom").val( _self.vars.map.getZoom() );
                    $(_self.vars.cssID + ".gllpLongitude").val( position.lng() );
                    $(_self.vars.cssID + ".gllpLatitude").val( position.lat() );

                    $(_self.vars.cssID).trigger("location_changed", $(_self.vars.cssID));

                    if (_self.params.queryLocationNameWhenLatLngChanges) {
                        getLocationName(position);
                    }
                    if (_self.params.queryElevationWhenLatLngChanges) {
                        getElevation(position);
                    }
                };

                // for reverse geocoding
                var getLocationName = function(position) {
                    var latlng = new google.maps.LatLng(position.lat(), position.lng());
                    _self.vars.geocoder.geocode({'latLng': latlng}, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK && results[1]) {
                            $(_self.vars.cssID + ".gllpLocationName").val(results[1].formatted_address);
                        } else {
                            $(_self.vars.cssID + ".gllpLocationName").val("");
                        }
                        $(_self.vars.cssID).trigger("location_name_changed", $(_self.vars.cssID));
                    });
                };

                // for getting the elevation value for a position
                var getElevation = function(position) {
                    var latlng = new google.maps.LatLng(position.lat(), position.lng());

                    var locations = [latlng];

                    var positionalRequest = { 'locations': locations };

                    _self.vars.elevator.getElevationForLocations(positionalRequest, function(results, status) {
                        if (status == google.maps.ElevationStatus.OK) {
                            if (results[0]) {
                                $(_self.vars.cssID + ".gllpElevation").val( results[0].elevation.toFixed(3));
                            } else {
                                $(_self.vars.cssID + ".gllpElevation").val("");
                            }
                        } else {
                            $(_self.vars.cssID + ".gllpElevation").val("");
                        }
                        $(_self.vars.cssID).trigger("elevation_changed", $(_self.vars.cssID));
                    });
                };

                // search function
                var performSearch = function(string, silent) {
                    if (string == "") {
                        if (!silent) {
                            _self.params.displayError( _self.params.strings.error_empty_field );
                        }
                        return;
                    }
                    _self.vars.geocoder.geocode(
                        {"address": string},
                        function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                $(_self.vars.cssID + ".gllpZoom").val(11);
                                _self.vars.map.setZoom( parseInt($(_self.vars.cssID + ".gllpZoom").val()) );
                                setPosition( results[0].geometry.location );
                            } else {
                                if (!silent) {
                                    _self.params.displayError( _self.params.strings.error_no_results );
                                }
                            }
                        }
                    );
                };

                ///////////////////////////////////////////////////////////////////////////////////////////////
                // PUBLIC FUNCTIONS  //////////////////////////////////////////////////////////////////////////
                var publicfunc = {

                    // INITIALIZE MAP ON DIV //////////////////////////////////////////////////////////////////
                    init : function(object) {

                        if ( !$(object).attr("id") ) {
                            if ( $(object).attr("name") ) {
                                $(object).attr("id", $(object).attr("name") );
                            } else {
                                $(object).attr("id", "_MAP_" + Math.ceil(Math.random() * 10000) );
                            }
                        }

                        _self.vars.ID = $(object).attr("id");
                        _self.vars.cssID = "#" + _self.vars.ID + " ";

                        _self.params.defLat  = $(_self.vars.cssID + ".gllpLatitude").val()  ? $(_self.vars.cssID + ".gllpLatitude").val()       : _self.params.defLat;
                        _self.params.defLng  = $(_self.vars.cssID + ".gllpLongitude").val() ? $(_self.vars.cssID + ".gllpLongitude").val()      : _self.params.defLng;
                        _self.params.defZoom = $(_self.vars.cssID + ".gllpZoom").val()      ? parseInt($(_self.vars.cssID + ".gllpZoom").val()) : _self.params.defZoom;

                        _self.vars.LATLNG = new google.maps.LatLng(_self.params.defLat, _self.params.defLng);

                        _self.vars.MAPOPTIONS        = _self.params.mapOptions;
                        _self.vars.MAPOPTIONS.zoom   = _self.params.defZoom;
                        _self.vars.MAPOPTIONS.center = _self.vars.LATLNG;

                        _self.vars.map = new google.maps.Map($(_self.vars.cssID + ".gllpMap").get(0), _self.vars.MAPOPTIONS);
                        _self.vars.geocoder = new google.maps.Geocoder();
                        _self.vars.elevator = new google.maps.ElevationService();

                        _self.vars.marker = new google.maps.Marker({
                            position: _self.vars.LATLNG,
                            map: _self.vars.map,
                            title: _self.params.strings.markerText,
                            draggable: true
                        });

                        // Set position on doubleclick
                        google.maps.event.addListener(_self.vars.map, 'dblclick', function(event) {
                            setPosition(event.latLng);
                        });

                        // Set position on marker move
                        google.maps.event.addListener(_self.vars.marker, 'dragend', function(event) {
                            setPosition(_self.vars.marker.position);
                        });

                        // Set zoom feld's value when user changes zoom on the map
                        google.maps.event.addListener(_self.vars.map, 'zoom_changed', function(event) {
                            $(_self.vars.cssID + ".gllpZoom").val( _self.vars.map.getZoom() );
                            $(_self.vars.cssID).trigger("location_changed", $(_self.vars.cssID));
                        });

                        // Update location and zoom values based on input field's value
                        $(_self.vars.cssID + ".gllpUpdateButton").bind("click", function() {
                            var lat = $(_self.vars.cssID + ".gllpLatitude").val();
                            var lng = $(_self.vars.cssID + ".gllpLongitude").val();
                            var latlng = new google.maps.LatLng(lat, lng);
                            _self.vars.map.setZoom( parseInt( $(_self.vars.cssID + ".gllpZoom").val() ) );
                            setPosition(latlng);
                        });

                        // Search function by search button
                        $(_self.vars.cssID + ".gllpSearchButton").bind("click", function() {
                            performSearch( $(_self.vars.cssID + ".gllpSearchField").val(), false );
                        });

                        // Search function by gllp_perform_search listener
                        $(document).bind("gllp_perform_search", function(event, object) {
                            performSearch( $(object).attr('string'), true );
                        });

                        // Zoom function triggered by gllp_perform_zoom listener
                        $(document).bind("gllp_update_fields", function(event) {
                            var lat = $(_self.vars.cssID + ".gllpLatitude").val();
                            var lng = $(_self.vars.cssID + ".gllpLongitude").val();
                            var latlng = new google.maps.LatLng(lat, lng);
                            _self.vars.map.setZoom( parseInt( $(_self.vars.cssID + ".gllpZoom").val() ) );
                            setPosition(latlng);
                        });
                    },

                    // EXPORT PARAMS TO EASILY MODIFY THEM ////////////////////////////////////////////////////
                    params : _self.params

                };

                return publicfunc;
            });
                
            $(document).ready( function() {
                if (!$.gMapsLatLonPickerNoAutoInit) {
                    $(".gllpLatlonPicker").each(function () {
                        $obj = $(document).gMapsLatLonPicker(); 
                        $obj.init( $(this) );
                    });
                }
            });

            $(document).bind("location_changed", function(event, object) {
                console.log("changed: " + $(object).attr('id') );
            });

            }(jQuery));
        </script>
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

            function delete_harga(no)
            {
              $('#delete'+no).remove();
            }
            function delete_fasilitas(no)
            {
              $('#delete'+no).remove();
            }
            function delete_kegiatan(no)
            {
              $('#delete'+no).remove();
            }
            function delete_dll(no)
            {
              $('#delete'+no).remove();
            }
            function delete_room(no)
            {
              $('#delete'+no).remove();
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