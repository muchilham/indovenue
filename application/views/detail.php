<!--Hero Page-->
  <br>

  <div class="container">
    <div class="row">
        <?php foreach ($getVenueMasterByID->result() as $key) { ?>
      <div class="col-md-12">
        <div id="msg2" ></div>
        <h1 class="detail"><?php echo ucfirst($key->room_name); ?></h1>
      </div>
      <!-- START Content Detail -->
      <div class="col-md-8 detail-description">
        <!-- START Gallery -->
        <div class="flexslider">
          <ul class="slides">
              <?php foreach ($getVenueDetailsPhotoByID->result() as $detailsPhoto){ ?>
            <li data-thumb="<?php echo base_url(); ?>upload/room/<?php echo $detailsPhoto->details_icon;?>">
              <div class="image" style="background-image:url('<?php echo base_url(); ?>upload/room/<?php echo $detailsPhoto->details_icon;?>"></div>
            </li>
              <?php } ?>
          </ul>
        </div>
        <!-- END Gallery -->
        <h4 class="title">DESKRIPSI</h4>
        <p><?php echo ucfirst($key->room_description); ?></p>
        <br>
        <a href class="seemore">LIHAT LAYOUT RUANGAN</a>
        <hr>
        <h4 class="title">DETAIL HARGA</h4>
      <?php foreach ($getVenueDetailsPriceByID->result() as $detailsPrice) { ?>
        <div class="row">
          <div class="col-md-4"><?php echo ucfirst($detailsPrice->details_name); ?></div>
          <div class="col-md-4">IDR <strong><?php $harga = $detailsPrice->details_value; echo ucfirst($detailsPrice->details_value); ?></strong></div>
          <div class="col-md-4 align-right"><?php echo ucfirst($detailsPrice->details_description); ?></div>
        </div>
        <br>
      <?php } ?>
        <hr>
        <h4 class="title">FASILITAS</h4>
        <div class="amenities">
            <?php foreach ($getVenueDetailsFasilitasByID->result() as $detailsFasilitas) { ?>
              <img src="<?php echo base_url(); ?>upload/fasilitas/<?php echo $detailsFasilitas->details_icon; ?>" width="20px" height="20px"> <?php echo $detailsFasilitas->details_value; ?>
              <br>
            <?php }
            if($getVenueDetailsDllByID->num_rows() != 0)
            {
            ?>
          <div class="amenitiesall">
            <!-- If closed -->
            <span id="amenitiesclosed">
            <a class="openamenities" data-toggle="collapse" data-target="#detailamenities"><img class="rotate180" src="<?php echo base_url(); ?>assets/img/amenities/arrow-up.png"> Lihat fasilitas lainnya</a>
            </span>
            <!-- If closed -->
          </div>
          <div id="detailamenities" class="collapse">
            <ul>
                <?php foreach ($getVenueDetailsDllByID->result() as $detailsDll) { ?>
                <li><?php echo $detailsDll->details_value; ?></li>
                <?php } ?>
            </ul>
          </div>
        </div>
          <?php } ?>
        <hr>
        <!-- Maps -->
        <h4 class="title">LOKASI</h4>
        <p><?php echo $key->room_address;?></p>
        <div class="map-overlay" onClick="style.pointerEvents='none'"></div><iframe
                  width="600"
                  height="450"
                  frameborder="0" style="border:0"
                  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAb-brvQAX9zoRln_34rYD44T5xLV9DTI4
    &q=<?php echo $key->room_lat;?>,<?php echo $key->room_lon;?>" allowfullscreen>
          </iframe>
          <hr>
          <?php } ?>
        <!-- Comment -->
        <h4 class="title">TESTIMONI</h4>
        <div class="row">
          <!-- START Individual Comment -->
            <?php
            if($getVenueDetailsReviewByID->num_rows() > 0) {
                foreach ($getVenueDetailsReviewByID->result() as $key) {
                ?>
                <div class="col-md-12" style="padding: 0">
                    <div class="row" style="padding: 20px; margin: 0">
                        <div class="col-md-8">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object img-circle"
                                         src="<?php echo base_url(); ?>upload/account/<?php echo $key->account_photo; ?>"
                                         alt="..." style="max-height: 50px">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading title3"><?php echo empty($key->user_fullname) ? $key->account_name : $key->user_fullname; ?></h4>
                                    <!--                    <p class="deskripsi">Panitia Seminar Nasional Pendidikan</p>-->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="align-right">
                                <h4 class="title2">
                                    <i class="<?php if ($key->rating_value > 0) echo 'fa fa-star'; else echo 'fa fa-star-o' ?>"
                                       aria-hidden="true" style="color: deepskyblue"></i>
                                    <i class="<?php if ($key->rating_value > 1) echo 'fa fa-star'; else echo 'fa fa-star-o' ?>"
                                       aria-hidden="true" style="color: deepskyblue"></i>
                                    <i class="<?php if ($key->rating_value > 2) echo 'fa fa-star'; else echo 'fa fa-star-o' ?>"
                                       aria-hidden="true" style="color: deepskyblue"></i>
                                    <i class="<?php if ($key->rating_value > 3) echo 'fa fa-star'; else echo 'fa fa-star-o' ?>"
                                       aria-hidden="true" style="color: deepskyblue"></i>
                                    <i class="<?php if ($key->rating_value > 4) echo 'fa fa-star'; else echo 'fa fa-star-o' ?>"
                                       aria-hidden="true" style="color: deepskyblue"></i>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding: 0 20px">
                        <p class="deskripsi"><?php echo ucfirst($key->rating_description); ?></p>
                    </div>
                </div>
                <!-- END Individual Comment -->
                <div class="col-md-12">
                    <hr>
                </div>
            <?php }
            }
            else
            {
            ?>
            <div class="col-md-12" style="padding: 0 20px">
                <p class="deskripsi">Belum ada testimoni.</p>
            </div>
            <?php } ?>
        </div>
      </div>
      <!-- START Content Detail -->
      <!-- START Sidebar -->
      <div class="col-md-4 hidden-sm hidden-xs">
        <div class="floating-sidebar">
          <div class="detail-sidebar2">
            <h4 class="title">PESAN SEKARANG</h4>
            <div>
<!--              <div class="form-group">-->
<!--                <label class="control-label" for="date">Tanggal Pemesanan</label>-->
<!--                  <br>-->
<!--                <label class="control-label" for="date">&emsp;Dari</label>-->
<!--                <div class="input-group">-->
<!--                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>-->
<!--                    <input class="form-control" type="date" id="booking_start" name="booking_start" placeholder="Dari"  />-->
<!--                </div>-->
<!--                <br>-->
<!--                <label class="control-label" for="date">&emsp;Sampai</label>-->
<!--                <div class="input-group">-->
<!--                  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> </span>-->
<!--                  <input class="form-control" type="date" id="booking_end" name="booking_end" placeholder="Sampai" />-->
<!--                </div>-->
<!--              </div>-->
                <div class="form-group">
                    <label class="register-label" for="activity">Pada tanggal</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                        <input class="form-control" type="text" name="daterange" id="booking_date" placeholder="MM/DD/YYY"  />
                        <!--<input class="form-control" id="daterange" name="daterange" placeholder="MM/DD/YYY" type="text" aria-describedby="basic-addon1" />-->
                    </div>
                </div>
              <div class="form-group">
                <label class="control-label" for="activity">Untuk Kegiatan</label>
                  <select class="form-control" id="activity" aria-describedby="basic-addon2" name="an">
                      <?php foreach ($getVenueActivityForBooking->result() as $key) {
                          $datas = explode(",",$key->kegiatan);
                          for($i = 0; $i<count($datas);$i++)
                          {
                          ?>
                          <option value="<?php echo $datas[$i]; ?>"><?php echo $datas[$i]; ?></option>
                      <?php }
                      } ?>
                  </select>
              </div>
              <div class="form-group">
                <label class="control-label" for="comment">Comment:</label>
                <textarea class="form-control" rows="2" name="booking_description" id="booking_description" placeholder="Silahkan tuliskan catatan tambahan anda di sini"></textarea>
              </div>
            </div>
            <div class="detail-price">
              <button
                      <?php if($this->session->logged_in) { ?> onclick="btnBookingClickHandler('<?php echo $this->uri->segment(3).",".$harga;?>'); " href="#myModal2" data-toggle="modal"
                      <?php }
                      else {  ?>  onclick="btnBookingClickHandler(null);" <?php } ?>
                      type="button" class="btn btn-color btn-booking" > Booking
              </button>
            </div>
          </div>
          <div class="text-center info">Silakan login terlebih dahulu untuk mem-booking venue. Atau register jika belum punya akun Indovenue.</div>
        </div>
      </div>
      <!-- END Content Detail -->
      <!-- START Other Places -->
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12">
            <hr>
          </div>
          <div class="col-md-4 col-xs-6">
            <h4 class="title">PROMOSI TEMPAT</h4>
          </div>
          <div class="col-md-4 col-xs-6 pull-right text-right">
            <a class="seemore" href="#">LIHAT TEMPAT LAINNYA</a>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="row">
            <div id="msg3"></div>
            <?php foreach ($newVenue->result() as $key) { ?>
                <div class="col-md-4 col-sm-6 col-xs-">
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
                            <a href="<?php echo base_url();?>search/detail/<?php echo $key->id_room; ?>" class="btn btn-color btn-block btn-white" style="margin: 10px 0">LIHAT DETAIL</a>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        </div>
      </div>
      <!-- END Other Places -->
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="title">TENTANG INDOVENUE</h4>
        <br />
        <p class="deskripsi">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>
  </div>
<div class="visible-xs visible-sm hidden-md hidden-lg buttonmobiledetail"><a href="<?php if($this->session->logged_in) { echo "#myModal"; } else { echo "#myModal3"; }?>" data-toggle="modal" style="text-decoration: none" class="btn-floating">Booking</a></div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title title" id="myModalLabel">Booking Now</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="form_booking2" action="javascript:booking2();">
                <div>
                    <div class="form-group">
                        <input class="form-control" name="id_room" type="hidden" value="<?php echo $this->uri->segment(3);?>"/>
                        <input class="form-control" name="booking_price" type="hidden" value="<?php echo $harga;?>"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="account_name" type="hidden" value="<?php echo $this->session->account_name;?>"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="date">Tanggal Pemesanan</label>
                        <br>
                        <label class="control-label" for="date">&emsp;Dari</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                            <input class="form-control" type="date" id="booking_start" name="booking_start" placeholder="Dari" <?php if($this->session->logged_in) { echo  ""; } else {  echo "disabled";}?> />
                        </div>
                        <br>
                        <label class="control-label" for="date">&emsp;Sampai</label>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> </span>
                            <input class="form-control" type="date" id="booking_end" name="booking_end" placeholder="Sampai"  <?php if($this->session->logged_in) { echo  ""; } else {  echo "disabled";}?>/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="activity">Untuk Kegiatan</label>
                        <select class="form-control" id="activity" aria-describedby="basic-addon2" name="an" <?php if($this->session->logged_in) { echo  ""; } else {  echo "disabled";}?>>
                            <?php foreach ($getVenueActivityForBooking->result() as $key) {
                                $datas = explode(",",$key->kegiatan);
                                for($i = 0; $i<count($datas);$i++)
                                {
                                    ?>
                                    <option value="<?php echo $datas[$i]; ?>"><?php echo $datas[$i]; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Alamat Email</label>
                        <input class="form-control" value="<?php echo $this->session->account_email;?>" name="account_email" placeholder="Masukkan alamat email" type="text" aria-describedby="basic-addon3" readonly="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="telp">Nomor Telepon</label>
                        <input class="form-control" value="<?php echo $this->session->user_contact;?>" name="account_phone" placeholder="Masukkan nomor telepon" type="text" aria-describedby="basic-addon4" />
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control" rows="5" name="booking_description"  id="comment" placeholder="Silahkan tuliskan catatan tambahan anda di sini"></textarea>
                    </div>
                </div>
                <div class="detail-price">
                    <button type="submit" class="btn btn-color btn-booking">Booking</button>
                </div>
                </form>
            </div>
            <!--<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title title" id="myModalLabel">Booking Now</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="javascript:booking();">
                <div>
                    Mohon untuk lengkapi data pribadi anda berikut untuk melanjutkan pemesanan:
                    <br>
                    <br>
                    <div class="form-group">
                        <label class="control-label" for="email">Alamat Email</label>
                        <input class="form-control" id="account_email" name="account_email" placeholder="Masukkan alamat email" type="text" value="<?php echo $this->session->account_email;?>" aria-describedby="basic-addon3" readonly=""/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="telp">Nomor Telepon</label>
                            <input class="form-control"  id="account_phone" name="account_phone" value="<?php echo $this->session->user_contact;?>" placeholder="Masukkan nomor telepon" type="text" aria-describedby="basic-addon4" />
                    </div>
                </div>
                <div class="detail-price">
                    <button type="submit" class="btn btn-color btn-booking">Booking</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title title" id="myModalLabel">Booking Now</h4>
            </div>
            <div class="modal-body">
                <div>
                    Silahkan login terlebih dahulu untuk melakukan pemesanan ini
                <div class="detail-price">
                    <a href="<?php echo base_url();?>user/register" class="btn btn-color btn-booking">Daftar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="http://momentjs.com/downloads/moment.js"></script>
<script>
    var data = [];
    function btnBookingClickHandler(datas) {
        if(datas == null)
        {
            window.location = "<?php echo base_url();?>user/register";
        }
        else
        {
            data = [];
            var booking_start =moment(new Date($('#booking_date').val().split("-")[0])).format("YYYY-MM-DD hh:mm:ss");
            var booking_end = moment(new Date($('#booking_date').val().split("-")[1])).format("YYYY-MM-DD hh:mm:ss");
            var id_room = datas.split(",")[0];
            var booking_price = datas.split(",")[1];
            console.log();
            data.push(id_room,booking_price,booking_start,booking_end,$('#activity').val(),$('#booking_description').val());
        }
    }
    function booking()
    {
        data.push($('#account_email').val(),$('#account_phone').val())
        $.ajax({
            url:"<?php echo base_url() ?>user/booking",
            type:"POST",
            dataType:"JSON",
            data: { id_room: data[0], booking_price: data[1], booking_start: data[2],booking_end: data[3],activity_name: data[4],booking_description: data[5],booking_status:0,account_name: '<?php echo $this->session->account_name;?>', account_email: data[6],account_contact: data[7]},
            success: function(data)
            {
                $('#myModal2').modal('hide');
                if(data.status)
                {
                    $('#msg2').html("<div style='margin-top: 100px;margin-bottom: -80px;' class='alert alert-success alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
                    $("#msg2").fadeTo(2000, 3000).slideUp(3000, function() {
                        $("#msg").slideUp(3000);
                    });
                }
                else
                {
                    $('#msg2').html("<div style='margin-top: 100px;margin-bottom: -80px;' class='alert alert-danger alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
                    $("#msg2").fadeTo(2000, 3000).slideUp(3000, function() {
                        $("#msg").slideUp(3000);
                    });
                }
            }
        })
    }

    function booking2()
    {
        $.ajax({
            url:"<?php echo base_url() ?>user/booking",
            type:"POST",
            dataType:"JSON",
            data:$('#form_booking2').serialize(),
            success: function(data)
            {
                $('#myModal').modal('hide');
                if(data.status)
                {
                    $('#msg2').html("<div style='margin-top: 100px;margin-bottom: -80px;' class='alert alert-success alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
                    $("#msg2").fadeTo(2000, 3000).slideUp(3000, function() {
                        $("#msg").slideUp(3000);
                    });
                }
                else
                {
                    $('#msg2').html("<div style='margin-top: 100px;margin-bottom: -80px;' class='alert alert-danger alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
                    $("#msg2").fadeTo(2000, 3000).slideUp(3000, function() {
                        $("#msg").slideUp(3000);
                    });
                }
            }
        })
    }

</script>
<script>
    $(document).ready(function() {
        var date_input = $('input[name="date"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format:'YYYY-MM-DD HH:mm:ss',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
 });
</script>
<!-- Script for Slider -->
<script>
    // Can also be used with $(document).ready()
    $(document).ready(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<!-- Scritp for Floating Sidebar -->
<script>
    $(document).scroll(function() {
        var scrollVal = $(document).scrollTop();
        $('.floating-sidebar').css('top', (scrollVal - 70) + 'px');
        if (scrollVal < 50) {
            $('.floating-sidebar').css('top', '0px');
        }
        if (scrollVal > 1600) {
            $('.floating-sidebar').css('top', '1600px');
        }
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
                    $('#msg3').html("<div class='alert alert-success alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
                    $("#msg3").fadeTo(2000, 500).slideUp(500, function() {
                        $("#msg3").slideUp(500);
                    });
                }
                else
                {
                    $('#msg3').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
                    $("#msg3").fadeTo(2000, 500).slideUp(500, function() {
                        $("#msg3").slideUp(500);
                    });
                }
            }
        })
    }
</script>

