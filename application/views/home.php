<!--Hero Page-->
<div class="hero-bg bg-screen" style="max-width:100%">
    <div class="container-fluid" style="padding: 0 30px">
        <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
            <p class="hero">Karena setiap momen berharga membutuhkan <span style="color: orangered">tempat</span> yang spesial</p>
        </div>
        <!--Search Form Button-->
        <div class="col-sm-12 col-xs-12 search-bar">
            <!--Input Search-->
            <!--<div class="input-group input-group-lg">
          <input type="text" class="form-control" placeholder="Cari tempat / ruang">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
          </span>
        </div>-->
            <!--Panel as a Search Bar-->
            <a href="#myModal" data-toggle="modal" style="text-decoration: none">
                <div class="panel panel-default" style="border-radius: 8px">
                    <div class="panel-body" style="color: grey; font-family: Open Sans; font-size: 1.3em; font-weight: 300">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <p style="display: inline; padding-left: 20px">Cari tempat / ruang</p>
                    </div>
                </div>
            </a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" role="document">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title title" id="myModalLabel">PENCARIAN VENUE</h4>
                    </div>
                    <div class="modal-body">
                        <form method="get" action="<?php echo base_url();?>search">
                            <input type="hidden" name="id" value="s"/>
                            <div class="form-group">
                                <label class="register-label" for="activity">Saya butuh ruangan</label>
                                <select class="form-control" id="activity" aria-describedby="basic-addon2" name="rt">
                                        <option value="all">Choose..</option>
                                    <?php foreach ($select_room_type->result() as $key) { ?>
                                        <option value="<?php echo $key->room_type_name; ?>"><?php echo $key->room_type_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="register-label" for="activity">Untuk Kegiatan</label>
                                <select class="form-control" id="activity" aria-describedby="basic-addon2" name="an">
                                        <option value="all">Choose..</option>
                                    <?php foreach ($select_activity_type->result() as $key) { ?>
                                        <option value="<?php echo $key->activity_name; ?>"><?php echo $key->activity_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="register-label" for="activity">Di daerah</label>
                                <select class="form-control" id="activity" aria-describedby="basic-addon2" name="ra">
                                        <option value="all">Choose..</option>
                                    <?php foreach ($select_room_area->result() as $key) { ?>
                                        <option value="<?php echo $key->room_area_name; ?>"><?php echo $key->room_area_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="register-label" for="activity">Pada tanggal</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                    <input class="form-control" type="text" name="daterange" placeholder="MM/DD/YYY" />
                                    <!--<input class="form-control" id="daterange" name="daterange" placeholder="MM/DD/YYY" type="text" aria-describedby="basic-addon1" />-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="register-label" for="activity">Dengan kapasitas (pax)</label>
                                <br />
                                <p class="slider-label" style="display: inline-block">50</p>
                                <p class="slider-label pull-right" style="display: inline-block">5.000</p>
                                <span style="padding: 20px 0">
                                    <input id="range3" type="text" name="cp" class="span2" value="" data-slider-min="50" data-slider-max="5000" data-slider-step="10" data-slider-value="[500,3000]"/>
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="register-label" for="activity">Dengan range harga (ribuan rupiah)</label>
                                <br />
                                <p class="slider-label" style="display: inline-block">100.000</p>
                                <p class="slider-label pull-right" style="display: inline-block">10.000.000</p>
                                <span style="padding: 20px 0">
                                    <input id="range4" type="text" name="pr" class="span2" value="" data-slider-min="100000" data-slider-max="10000000" data-slider-step="100000" data-slider-value="[500000,5000000]"/>
                                </span>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-color btn-search btn-custom btn-block">CARI VENUE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- START Sidebar -->
        <div class="col-md-5 front-sidebar pull-right">
            <form method="get" action="<?php echo base_url();?>search">
                <input type="hidden" name="id" value="s"/>
                <div class="col-md-12">
                    <div class="col-md-6 form-group">
                        <label class="control-label" for="activity">Saya butuh ruangan</label>
                        <select class="form-control" id="activity" aria-describedby="basic-addon2" name="rt">
                                <option value="all">Choose..</option>
                            <?php foreach ($select_room_type->result() as $key) { ?>
                                <option value="<?php echo $key->room_type_name; ?>"><?php echo $key->room_type_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="control-label" for="activity">Untuk Kegiatan</label>
                        <select class="form-control" id="activity" aria-describedby="basic-addon2" name="an">
                                <option value="all">Choose..</option>
                            <?php foreach ($select_activity_type->result() as $key) { ?>
                                <option value="<?php echo $key->activity_name; ?>"><?php echo $key->activity_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="control-label" for="activity">Di daerah</label>
                        <select class="form-control" id="activity" aria-describedby="basic-addon2" name="ra">
                                <option value="all">Choose..</option>
                            <?php foreach ($select_room_area->result() as $key) { ?>
                                <option value="<?php echo $key->room_area_name; ?>"><?php echo $key->room_area_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="control-label" for="activity">Pada tanggal</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                            <input class="form-control" type="text" name="daterange" />
                            <!--<input class="form-control" id="daterange" name="daterange" placeholder="MM/DD/YYY" type="text" aria-describedby="basic-addon1" />-->
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="control-label" for="activity">Dengan kapasitas (pax)</label>
                        <br />
                        <p class="slider-label" style="display: inline-block">50</p>
                        <p class="slider-label pull-right" style="display: inline-block">5.000</p>
                        <span style="padding: 20px 0"><input id="range1" type="text" name="cp" class="span2" value="" data-slider-min="50" data-slider-max="5000" data-slider-step="10" data-slider-value="[500,3000]"/></span>
                    </div>
                    <div class="col-md-12 form-group">
                        <label class="control-label" for="activity">Dengan range harga (ribuan rupiah)</label>
                        <br />
                        <p class="slider-label" style="display: inline-block">100.000</p>
                        <p class="slider-label pull-right" style="display: inline-block">10.000.000</p>
                        <span style="padding: 20px 0"><input id="range2" type="text" name="pr" class="span2" value="" data-slider-min="100000" data-slider-max="10000000" data-slider-step="100000" data-slider-value="[500000,5000000]"/></span>
                    </div>
                </div>
                <!--<div class="col-md-12">
              <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>
            </div>-->
                <div class="text-center">
                    <button type="submit" class="btn btn-color btn-search btn-custom">CARI VENUE</button>
                </div>
            </form>
        </div>
        <!-- END Content Detail -->
    </div>
</div>
<div class="container" style="padding-top: 50px; padding-bottom: 25px">
    <!-- START Other Places -->
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <h4 class="title">PROMOSI TEMPAT</h4>
            </div>
            <div class="col-md-4 col-sm-6 pull-right text-right">
                <a class="seemore" href="#">LIHAT TEMPAT LAINNYA</a>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
            <?php foreach ($searchVenue->result() as $key) { ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="place-thumb" style="margin-bottom:20px;">
                    <?php if($key->room_discount != '0') { ?>
                        <div class="disc-banner-small"><?php echo $key->room_discount; ?>% OFF</div>
                        <div class="star-banner-small tooltip-left" data-tooltip="Popular Venue"><i class="fa fa-star" aria-hidden="true"></i></div>
                    <?php } else { ""; } ?>
                    <?php if($key->room_favorit == '1') { ?>
                        <div class="star-banner-small tooltip-left" data-tooltip="Popular Venue"><i class="fa fa-star" aria-hidden="true"></i></div>
                    <?php } else { ""; } ?>
                    <img src="<?php echo base_url(); ?>upload/room/<?php echo $key->photo; ?>">
                    <div class="placethumb-detail">
                        <button type="button" class="btn btn-love favorite-banner tooltip-top" data-tooltip="Jadikan Favorit" onclick="javascript:addfavorite('<?php echo  $this->session->account_name;?>,<?php echo $key->id_room;?>');"><i class="fa fa-heart" aria-hidden="true"></i></button>
                        <p class="harga"><small>IDR</small> <?php echo $key->harga; ?> <small>/HARI</small></p>
                        <p class="tempat"><?php echo ucfirst($key->room_name); ?> <small>di</small> <?php echo ucfirst($key->room_area); ?></p>
                        <p class="deskripsi"><?php echo substr(ucfirst($key->room_description),0,200). '...'; ?></p>
                        <div class="placethumb-tag">
                            <i class="fa fa-tag fa-lg fa-flip-horizontal text-gray" aria-hidden="true"></i>
                            <?php $data = explode(",",$key->kegiatan);
                            for ($i = 0; $i < count($data); $i++) {
                                ?>
                                <button type="button" class="btn btn-tag btn-outline btn-xs place-tag"><?php echo $data[$i]; ?></button>
                            <?php } ?>
                        </div>
                        <a class="btn btn-color btn-block btn-white" style="margin: 10px 0" href="<?php echo base_url();?>search/detail/<?php echo $key->id_room; ?>">LIHAT DETAIL</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- END Other Places -->
</div>
<!--About Indovenue-->
<div class="container" style="padding: 25px">
    <h4 class="title">TENTANG INDOVENUE</h4>
    <br />
    <p class="deskripsi">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
<div class="container" style="padding-top: 25px; padding-bottom: 25px">
    <div class="col-md-12">
        <div class="col-md-3 col-sm-6 text-center" style="padding: 25px 10px">
            <img src="<?php echo base_url(); ?>assets/img/loupe.png" class="img-circle" style="border: 1px solid deepskyblue; height: 125px">
            <br />
            <br />
            <h4 class="title2">HEMAT WAKTU &amp; TENAGA</h4>
            <p class="deskripsi">Membantu survey venue tempat acara, tanpa harus capek dan pegal keliling satu per satu.</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center" style="padding: 25px 10px">
            <img src="<?php echo base_url(); ?>assets/img/give.png" class="img-circle" style="border: 1px solid deepskyblue; height: 125px">
            <br />
            <br />
            <h4 class="title2">BEBAS BIROKRASI</h4>
            <p class="deskripsi">Terbebas dari rumitnya proses birokrasi di lapangan. Memperlancar persiapan acara Anda.</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center" style="padding: 25px 10px">
            <img src="<?php echo base_url(); ?>assets/img/help.png" class="img-circle" style="border: 1px solid deepskyblue; height: 125px">
            <br />
            <br />
            <h4 class="title2">INFO LENGKAP</h4>
            <p class="deskripsi">Tersedia info lengkap untuk ruang venue tempat acara yang Anda cari dan butuhkan.</p>
        </div>
        <div class="col-md-3 col-sm-6 text-center" style="padding: 25px 10px">
            <img src="<?php echo base_url(); ?>assets/img/babi.png" class="img-circle" style="border: 1px solid deepskyblue; height: 125px">
            <br />
            <br />
            <h4 class="title2">HEMAT BIAYA</h4>
            <p class="deskripsi">Dengan biaya terjangkau, Anda mendapat ruang venue tempat acara yang tepat.</p>
        </div>
    </div>
</div>
<div class="container text-center" style="padding-top: 25px; padding-bottom: 25px">
    <h4 class="title">APA KATA MEREKA</h4>
    <h4 class="title2" style="font-weight: 300">VENUE DENGAN RATING TERBAIK</h4>
</div>
<!--TESTIMONI CAROUSEL START-->
<!--New test slider-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="padding: 20px 0">
    <!-- Indicators -->
    <!--<ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>-->
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <!--Item 1-->
        <?php $no = 1;
        foreach ($getVenueReviewBest->result() as $key)
        {
            ?>
        <div class="item <?php echo $no == 1 ? 'active':'';?>">
            <div class="row row-centered">
                <div class="col-md-8 col-sm-5 col-xs-8 col-centered text-left" style="border: 1px solid lightgrey; padding: 0">
                    <div class="col-md-6 col-sm-12 col-xs-12" style="padding: 0">
                        <img src="<?php echo base_url(); ?>upload/room/<?php echo $key->photo; ?>" alt="..." style="max-width:100%">
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12" style="padding: 0">
                        <div class="row" style="padding: 10px 0; margin: 0">
                            <div class="col-md-7 col-sm-7 col-xs-7">
                                <h4 class="title2"><?php echo $key->room_name; ?></h4>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5 text-right">
                                <h4 class="title2">
                                    <i class="<?php if ($key->rating_value > 0) echo 'fa fa-star'; else echo 'fa fa-star-o'?>" aria-hidden="true" style="color: deepskyblue"></i>
                                    <i class="<?php if ($key->rating_value > 1) echo 'fa fa-star'; else echo 'fa fa-star-o'?>" aria-hidden="true" style="color: deepskyblue"></i>
                                    <i class="<?php if ($key->rating_value > 2) echo 'fa fa-star'; else echo 'fa fa-star-o'?>" aria-hidden="true" style="color: deepskyblue"></i>
                                    <i class="<?php if ($key->rating_value > 3) echo 'fa fa-star'; else echo 'fa fa-star-o'?>" aria-hidden="true" style="color: deepskyblue"></i>
                                    <i class="<?php if ($key->rating_value > 4) echo 'fa fa-star'; else echo 'fa fa-star-o'?>" aria-hidden="true" style="color: deepskyblue"></i>
                                </h4>
                            </div>
                        </div>
                        <div class="row" style="padding: 20px; margin: 0">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object img-circle" src="<?php echo base_url(); ?>upload/account/<?php echo $key->account_photo; ?>" alt="..." style="max-height: 50px">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading title3"><?php echo empty($key->user_fullname) ? $key->account_name :  $key->user_fullname; ?></h4>
                                    <p class="deskripsi"><?php echo $key->rating_date; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="padding: 0 20px">
                            <p class="deskripsi"><?php echo ucfirst($key->rating_description); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
        <!--Item 2-->

    <!-- Controls -->
    <a class="left carousel-control " href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-menu-left glyphicon-chevron-left" aria-hidden="true" style="color: red"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-menu-right glyphicon-chevron-right" aria-hidden="true" style="color: red"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!--FOOTER START HERE-->

<!-- FOOTER END -->
<!-- Slider Picker -->
<script>
    $("#range1").slider({});
    $("#range2").slider({});
    $("#range3").slider({});
    $("#range4").slider({});
</script>
<!-- Script for Datepicker -->
<!--<script>
  $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
          format: 'mm/dd/yyyy',
          container: container,
          todayHighlight: true,
          autoclose: true,
      })
  })
</script>-->
<!-- Script for Datepicker -->
<script type="text/javascript">
    $(function() {
        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        }

        $('input[name="daterange"]').daterangepicker({
            "opens": "left",
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            }
        });
    });
</script>
<script>
    function addfavorite(data)
    {
        var datas = data.split(",")
        $.ajax({
            url:"<?php echo base_url() ?>user/addfavoriteroom",
            type:"POST",
            dataType:"JSON",
            data: { account_name: datas[0], id_room: datas[1] },
            success: function(data)
            {
                if(data.status)
                {
                    $('#msg').html("<div class='alert alert-success alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
                    $("#msg").fadeTo(2000, 500).slideUp(500, function() {
                        $("#msg").slideUp(500);
                    });
                }
                else
                {
                    $('#msg').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
                    $("#msg").fadeTo(2000, 500).slideUp(500, function() {
                        $("#msg").slideUp(500);
                    });
                }
            }
        })
    }
</script>