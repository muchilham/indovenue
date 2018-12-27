<style type="text/css">
    .ajax-load{
        background: transparent;
        padding: 10px 0px;
        width: 100%;
    }
</style>
<div class="container">
    <!--Search Form Button-->
    <div class="col-md-12 col-sm-12 col-xs-12 search-bar" style="margin-top:75px;">
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
      <div class="tag-group">
        <i class="fa fa-caret-left" aria-hidden="true" style="position: absolute; left: -5px; top: 68%;"></i>
        <div class="row text-center">
            <?php foreach ($select_room_type->result() as $key) { ?>
                <div class="col-md-2 col-sm-2 col-xs-4" style="padding: 5px !important">
                    <button type="button" class="btn btn-block btn-tagwhite"><?php echo $key->room_type_name; ?></button>
                </div>
            <?php } ?>
            <?php foreach ($select_activity_type->result() as $key) { ?>
                <div class="col-md-2 col-sm-2 col-xs-4" style="padding: 5px !important">
                    <button type="button" class="btn btn-block btn-tagwhite"><?php echo $key->activity_name; ?></button>
                </div>
            <?php } ?>
        </div>
        <i class="fa fa-caret-right" aria-hidden="true" style="position: absolute; right: -5px; top: 68%;"></i>
      </div>
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
              <form method="get" action="">
                  <input type="hidden" name="id" value="s"/>
                <div class="form-group">
                  <label class="register-label" for="activity">Saya butuh ruangan</label>
                  <select class="form-control" id="activity" aria-describedby="basic-addon2" name="rt">
                      <?php foreach ($select_room_type->result() as $key) { ?>
                          <option value="<?php echo $key->room_type_name; ?>"><?php echo $key->room_type_name; ?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="register-label" for="activity">Untuk Kegiatan</label>
                  <select class="form-control" id="activity" aria-describedby="basic-addon2" name="an">
                      <?php foreach ($select_activity_type->result() as $key) { ?>
                          <option value="<?php echo $key->activity_name; ?>"><?php echo $key->activity_name; ?></option>
                      <?php } ?>
                  </select>
                  </select>
                </div>
                <div class="form-group">
                  <label class="register-label" for="activity">Di daerah</label>
                  <select class="form-control" id="activity" aria-describedby="basic-addon2" name="ra">
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
                  <div class="text-center">
                      <button type="submit" class="btn btn-color btn-search btn-custom btn-block">SEMUA VENUE</button>
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
  </div>
  <div class="container frame-header">
    <div class="row">
      <!-- START Sidebar -->
      <div class="col-md-4 col-lg-4 hidden-sm hidden-xs">
        <div class="search-sidebar">
          <div class="col-md-12 col-lg-12">
            <form method="get" action="">
                <input type="hidden" name="id" value="s"/>
                <div class="col-md-12 col-lg-12 form-group">
                  <label class="control-label" for="activity">Saya butuh ruangan</label>
                  <select class="form-control" id="activity" aria-describedby="basic-addon2" name="rt">
                      <option value="all">Choose..</option>
                      <?php foreach ($select_room_type->result() as $key) { ?>
                          <option value="<?php echo $key->room_type_name; ?>"><?php echo $key->room_type_name; ?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="col-md-12 col-lg-12 form-group">
                  <label class="control-label" for="activity">Untuk Kegiatan</label>
                  <select class="form-control" id="activity" aria-describedby="basic-addon2"   name="an">
                      <option value="all">Choose..</option>
                      <?php foreach ($select_activity_type->result() as $key) { ?>
                          <option value="<?php echo $key->activity_name; ?>"><?php echo $key->activity_name; ?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="col-md-12 col-lg-12 form-group">
                  <label class="control-label" for="activity">Di daerah</label>
                  <select class="form-control" id="activity" aria-describedby="basic-addon2" name="ra">
                        <option value="all">Choose..</option>
                      <?php foreach ($select_room_area->result() as $key) { ?>
                          <option value="<?php echo $key->room_area_name; ?>"><?php echo $key->room_area_name; ?></option>
                      <?php } ?>
                    </select>
                </div>
                <div class="col-md-12 col-lg-12 form-group">
                  <label class="control-label" for="activity">Pada tanggal</label>
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                    <input class="form-control" type="text"  name="daterange"/>
    <!--                <input class="form-control" id="daterange"  placeholder="MM/DD/YYY" type="text" aria-describedby="basic-addon1" />-->
                  </div>
                </div>
                <div class="col-md-12 col-lg-12 form-group">
                  <label class="control-label" for="activity">Dengan kapasitas (pax)</label>
                  <br />
                  <p class="slider-label" style="display: inline-block">50</p>
                  <p class="slider-label pull-right" style="display: inline-block">5.000</p>
                  <span style="padding: 20px 0">
                      <input id="range1" name="cp" type="text" class="span2" value="" data-slider-min="50" data-slider-max="5000" data-slider-step="10" data-slider-value="[500,3000]"/>
                  </span>
                </div>
                <div class="col-md-12 col-lg-12 form-group">
                  <label class="control-label" for="activity">Dengan range harga (ribuan rupiah)</label>
                  <br />
                  <p class="slider-label" style="display: inline-block">100.000</p>
                  <p class="slider-label pull-right" style="display: inline-block">10.000.000</p>
                  <span style="padding: 20px 0">
                      <input id="range2" name="pr" type="text" class="span2" value="" data-slider-min="100000" data-slider-max="10000000" data-slider-step="100" data-slider-value="[500000,5000000]"/>
                  </span>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-color btn-search btn-custom">CARI VENUE</button>
              </div>
            </form>
        </div>

            <?php foreach ($select_room_type->result() as $key) { ?>
              <div class="col-md-4 col-lg-3" style="padding: 5px !important">
                    <button type="button" class="btn btn-block btn-tagwhite"><?php echo $key->room_type_name; ?></button>
              </div>
            <?php } ?>
            <?php foreach ($select_activity_type->result() as $key) { ?>
              <div class="col-md-4 col-lg-3" style="padding: 5px !important">
                      <button type="button" class="btn btn-block btn-tagwhite"><?php echo $key->activity_name; ?></button>
              </div>
            <?php } ?>
      </div>
      <!-- END Sidebar -->
      <div class="col-lg-8 col-md-8 search-description">
        <!-- START Gallery -->
        <!--   <div class="content"> -->
          <?php if($favoritVenue->num_rows() > 0)
          { ?>
        <section class="slider2">
          <ul style="width: 300%;">
              <?php foreach ($favoritVenue->result() as $key) { ?>
                <li style="width: 33.33%;">
                  <div class="image" style="background-image:url('<?php echo base_url(); ?>upload/room/<?php echo $key->photo; ?>');"></div>
                  <div class="slider-caption">
                    <h3><?php echo ucfirst($key->room_name); ?></h3>
                    <p>IDR <?php echo $key->harga; ?> /HARI</p>
                  </div>
                </li>
              <?php }?>
          </ul>
        </section>
        <div class="slider-nav">
          <span class="slide-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
          <span class="slide-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
        </div>
          <?php } ?>
        <!--    </div> -->
        <!-- END Gallery -->
        <h4 class="title text-center" style="margin: 30px 0; font-size:20px;"><?php foreach ($countVenue->result() as $key) { echo $key->count; }?> Venue Ditemukan</h4>
        <div class="col-md-12">
          <div class="row">
              <div id="msg4"></div>
              <div  id="infinite-scroll">
                  <?php
                    $this->load->view('venue', $searchVenue);
                  ?>
              </div>
          </div>
        </div>

          <div class="ajax-load text-center" style="display:none">
              <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
          </div>
        <!-- END Other Places -->
        <div class="text-center">
          <button type="button" class="btn btn-color btn-search btn-custom" id="moreVenue">MORE VENUE</button>
        </div>

      </div>
    </div>
  </div>
  <div style="background-color:#F7F7F7;">
    <div class="container" style="padding-top: 50px; padding-bottom: 25px;">
      <!-- START Other Places -->
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-6">
            <h4 class="title">TEMPAT TERBARU</h4>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-6 pull-right text-right">
            <a class="seemore" href="#">LIHAT TEMPAT LAINNYA</a>
          </div>
        </div>
      </div>
      <div class="col-md-12 search-description">
        <div class="row">
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
      <!-- END Other Places -->
    </div>
  </div>
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
                    $('#msg4').html("<div class='alert alert-success alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
                    $("#msg4").fadeTo(2000, 500).slideUp(500, function() {
                        $("#msg4").slideUp(500);
                    });
                }
                else
                {
                    $('#msg4').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
                    $("#msg4").fadeTo(2000, 500).slideUp(500, function() {
                        $("#msg4").slideUp(500);
                    });
                }
            }
        })
    }
</script>
<script type="text/javascript">
    var page = 1;
    $("#moreVenue").click(function() {
//        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
//        }
    });

    function loadMoreData(page){
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                if(data == " "){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#infinite-scroll").append(data);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('server not responding...');
            });
    }
</script>
