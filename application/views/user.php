<style>
    .animated {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
    }

    .star-rating {
        line-height:32px;
        font-size:3em;
        text-align: center;
        padding-left: 12px;
        opacity: 0.9;
    }
    .star-rating .fa-star{color: #F4D03F;}

    .rating{
        line-height:32px;
        font-size:3em;
        text-align: center;
        padding-left: 12px;
        opacity: 0.9;
    }
    .rating .fa-star{color: #F4D03F;}

    .comment-list .row {
        margin-bottom: 0px;
    }
    .comment-list .panel .panel-heading {
        padding: 4px 15px;
        position: absolute;
        border:none;
        /*Panel-heading border radius*/
        border-top-right-radius:0px;
        top: 1px;
    }
    .comment-list .panel .panel-heading.right {
        border-right-width: 0px;
        /*Panel-heading border radius*/
        border-top-left-radius:0px;
        right: 16px;
    }
    .comment-list .panel .panel-heading .panel-body {
        padding-top: 6px;
    }
    .comment-list figcaption {
        /*For wrapping text in thumbnail*/
        word-wrap: break-word;
    }
    /* Portrait tablets and medium desktops */
    @media (min-width: 768px) {
        .comment-list .arrow:after, .comment-list .arrow:before {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border-style: solid;
            border-color: transparent;
        }
        .comment-list .panel.arrow.left:after, .comment-list .panel.arrow.left:before {
            border-left: 0;
        }
        /*****Left Arrow*****/
        /*Outline effect style*/
        .comment-list .panel.arrow.left:before {
            left: 0px;
            top: 30px;
            /*Use boarder color of panel*/
            border-right-color: inherit;
            border-width: 16px;
        }
        /*Background color effect*/
        .comment-list .panel.arrow.left:after {
            left: 1px;
            top: 31px;
            /*Change for different outline color*/
            border-right-color: #FFFFFF;
            border-width: 15px;
        }
        /*****Right Arrow*****/
        /*Outline effect style*/
        .comment-list .panel.arrow.right:before {
            right: -16px;
            top: 30px;
            /*Use boarder color of panel*/
            border-left-color: inherit;
            border-width: 16px;
        }
        /*Background color effect*/
        .comment-list .panel.arrow.right:after {
            right: -14px;
            top: 31px;
            /*Change for different outline color*/
            border-left-color: #FFFFFF;
            border-width: 15px;
        }
    }
    .comment-list .comment-post {
        margin-top: 6px;
    }
</style>
<div class="container" style="padding:60px 0px 0px 0px; width:100%; margin-bottom:30px;">
    <ul class="nav nav-tabs dashboard-tab">
        <li class="active"><a data-toggle="tab" href="#overview">Overview</a></li>
        <li><a data-toggle="tab" href="#booking">My Booking</a></li>
        <li><a data-toggle="tab" href="#ulasan">Ulasan</a></li>
    </ul>
    <div class="tab-content">
        <div id="overview" class="tab-pane fade in active">
            <div class="mobile-nopadding col-md-12">
                <div class="mobile-nopadding col-md-4 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 side-profile">
                        <!-- User Avatar -->
                        <div class="profile-pic text-center col-md-12 col-sm-5" style="z-index:1000;">
                            <button class="button-avatar">
                                <img src="<?php echo base_url().$this->session->account_photo; ?>" class="img-circle center">
                                <i class="fa fa-camera" aria-hidden="true" style="display: inline; text-align: center; vertical-align: middle; align-items: center;"></i>
                            </button>
                            <h2><?php echo $this->session->user_fullname; ?></h2>
                            <div id="msg4"><?php echo $this->session->flashdata('notif'); ?></div>
                            <div class="profile-btn">
                                <button type="button" class="btn btn-overview" href="#editProfile" data-toggle="modal" style="margin: 10px">Ubah</button>
                                <button type="button" class="btn btn-overview" href="#editPassword" data-toggle="modal" style="margin: 10px; width: 180px;">Ubah Kata sandi</button><br>
                                <a href="<?php echo base_url();?>user/logout"><button type="button" class="btn btn-overview" style="margin: 10px">Keluar</button></a>
                            </div>
                        </div>
                        <!-- Modal for 'Edit' Button Start to Edit Profile-->
                        <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" role="document">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h1 class="modal-title title" id="myModalLabel">Edit Profile</h1>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url(); ?>User/updateuser/<?php echo $this->session->account_name; ?>"  method="post" id="form-update">
                                            <div class="form-group">
                                                <label class="register-label" for="name">Nama</label>
                                                <div class="input-group" style="width:100%">
                                                    <input type="text" class="form-control" placeholder="" id="name" user_fullname="name" name="user_fullname" value="<?php echo $this->session->user_fullname; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="register-label" for="handphone">No Handphone</label>
                                                <div class="input-group" style="width:100%">
                                                    <input type="number" class="form-control" placeholder="" id="number" user_contact="number" name="user_contact" value="<?php echo $this->session->user_contact; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="register-label" for="address">Alamat</label>
                                                <textarea class="form-control" rows="3" id="address" name="user_address"><?php echo $this->session->user_address; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="register-label" for="city">Kota</label>
                                                <select class="form-control" id="kota" name="user_country">
                                                    <option class="input-group" <?php if($this->session->user_address == "Jakarta, Indonesia"){?>selected<?php } else{}?>>Jakarta, Indonesia</option>
                                                    <option <?php if($this->session->user_address == "Jakarta, Indonesia"){?>selected<?php } else{}?>>Semarang, Indonesia</option>
                                                    <option <?php if($this->session->user_address == "Jakarta, Indonesia"){?>selected<?php } else{}?>>Surabaya, Indonesia</option>
                                                    <option <?php if($this->session->user_address == "Jakarta, Indonesia"){?>selected<?php } else{}?>>Yogyakarta, Indonesia</option>
                                                </select>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-register">SIMPAN</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" role="document">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h1 class="modal-title title" id="myModalLabel">Ubah Kata Sandi</h1>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url(); ?>User/updateaccountpassword/<?php echo $this->session->account_name; ?>"  method="post" id="form-update">
                                            <div class="form-group">
                                                <label class="register-label" for="name">Katasandi Lama</label>
                                                <div class="input-group" style="width:100%">
                                                    <input type="password" class="form-control" placeholder="************" id="oldpassword" name="oldpassword">
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="form-group">
                                                <label class="register-label" for="name">Katasandi Baru</label>
                                                <div class="input-group" style="width:100%">
                                                    <input type="password" class="form-control" placeholder="************" id="newpassword" name="newpassword">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="register-label" for="name">Konfirmasi Katasandi</label>
                                                <div class="input-group" style="width:100%">
                                                    <input type="password" class="form-control" placeholder="************" id="confirmnewpassword" name="confirmnewpassword">
                                                </div>
                                            </div>
                                            <div id="checkpassword"></div>
                                            <div class="text-center">
                                                <button type="submit" id="btn-password" class="btn btn-register">SIMPAN</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- User Profile Description -->
                        <div class="profile-desc col-md-12 col-sm-7 col-xs-12">
                            <div class="row profile-text">
                                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <h5><?php echo $this->session->account_email; ?></h5></div>
                            </div>
                            <div class="row profile-text">
                                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
                                    <i class="fa fa-mobile" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <h5><?php echo $this->session->user_contact; ?></h5></div>
                            </div>
                            <div class="row profile-location">
                                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <h5><?php echo $this->session->user_address; ?></h5></div>
                            </div>
                            <div class="row profile-text">
                                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                    <h5><?php echo $this->session->user_country; ?></h5></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 nopadding border-overview">
                    <!-- Venue Status Start -->
                    <div class="col-md-12" style="padding: 30px 10px">
                        <h4 class="title">Venue Status</h4>
                        <!-- Venue Status onclick to show details venue -->
                        <?php foreach ($getVenueLastBooking->result() as $key) { ?>
                        <div class="venue-status mobile-nopadding" onclick="showVenueOverView()">
                                <div class="col-md-2 col-sm-2 col-xs-2 text-center ellipsis" style="border-right: 1px solid;">
                                    <h4><?php echo date('M',strtotime($key->booking_createdate)); ?></h4>
                                    <h2><?php echo date('d',strtotime($key->booking_createdate)); ?></h2>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-7 ellipsis" style="margin-left:10px;">
                                    <h3><?php echo $key->room_name; ?></h3>
                                    <h4>
                                        <?php echo ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days == 0 ? 1 : ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days;?> Hari  &#8226  IDR <?php echo $key->harga;?> /Hari
                                    </h4>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-3 ellipsis">
                                    <h1>
                                        <?php if($key->count == 1) {
                                            echo "Menunggu ";
                                            echo "<br>";
                                            echo "Pembayaran";
                                            echo "<br>";
                                            echo "DP";
                                        }
                                        else if($key->count == 2){
                                            echo "Cek";
                                            echo "<br>";
                                            echo "Ketesediaan";
                                            echo "<br";
                                            echo "Venue";
                                        }
                                        else if($key->count == 3){
                                            echo "Menunggu";
                                            echo "<br>";
                                            echo "Pembayaran";
                                            echo "<br>";
                                            echo "Pelunasan";
                                        }
                                        else if($key->count == 4){
                                            echo "Selesai";
                                        }
                                        else
                                        {
                                            echo "Dibatalkan";
                                        }
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        <!-- Venue Status End -->
                        <!-- Details Venue Collapsable Start -->
                        <div id="venue-detail-overview" class="mobile-nopadding">
                            <div class="close-venue" onclick="closeVenueOverView()"><i class="fa fa-times-thin fa-2x" aria-hidden="true"></i></div>
                            <div class="col-md-7 col-sm-7 col-sm-push-5 venue-description">
                                <h5><b>Transaction ID</b></h5>
                                <p><?php echo strtoupper($key->id_booking); ?></p>
                                <h5><b>Note from Venue Owner</b></h5>
                                <p><?php echo $key->booking_description;?></p>
                                <h5><b>Details</b></h5>
                                <div id="textbox">
                                    <p>
                                        <span class="alignleft">Harga Venue (per Hari)</span>
                                        <span class="alignright"><?php echo $key->harga; ?> IDR</span>
                                    </p>
                                </div>
                                <div id="textbox">
                                    <p>
                                        <span class="alignleft">Lama Sewa</span>
                                        <span class="alignright"><?php echo ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days == 0 ? 1 : ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days;?> Hari</span>
                                    </p>
                                </div>
                                <div id="textbox">
                                    <p>
                                        <span class="alignleft">Tambahan</span>
                                        <span class="alignright">-</span>
                                    </p>
                                </div>
                                <hr width="100%" style="color:#BDBDBD;background-color:#BDBDBD;height:1px;">
                                <h5>
                                    <span class="alignleft"><b>Total</b></span>
                                    <span class="alignright"><?php echo (((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days == 0 ? 1 : ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days) * str_replace(".","",$key->harga); ?> IDR</span>
                                </h5>
                            </div>
                            <div class="col-md-5 col-sm-4 col-sm-pull-7">
                                <div class="place-thumb" style="margin-bottom:20px;">
                                    <button type="button" class="btn btn-close-banner" onclick="deletefavorite('<?php echo  $this->session->account_name;?>,<?php echo $key->id_room;?>');"><i class="fa fa-times-thin" aria-hidden="true"></i></button>
                                    <?php if($key->room_discount != '0') { ?>
                                        <div class="disc-banner-small"><?php echo $key->room_discount; ?>% OFF</div>
                                        <div class="star-banner-small tooltip-left" data-tooltip="Popular Venue"><i class="fa fa-star" aria-hidden="true"></i></div>
                                    <?php } else { ""; } ?>
                                    <?php if($key->room_favorit == '1') { ?>
                                        <div class="star-banner-small tooltip-left" data-tooltip="Popular Venue"><i class="fa fa-star" aria-hidden="true"></i></div>
                                    <?php } else { ""; } ?>
                                    <img src="<?php echo base_url(); ?>upload/room/<?php echo $key->photo; ?>">
                                    <div class="placethumb-detail">
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
                        </div>
                        <?php } ?>
                        <!-- Details Venue Collapsable End -->
                    </div>
                    <!-- Favorite Venue Start -->
                    <div class="col-md-12">
                        <h4 class="title">My Favorite Venue</h4>
                    </div>
                    <div class="col-md-12"">
                        <div  id="favoritevenue">
                        <?php
                            $this->load->view('favoritevenue', $getVenueFavorit);
                        ?>
                        </div>
                    </div>


                    <!-- Favorite Venue End -->
                </div>
            </div>
        </div>
        <div id="booking" class="tab-pane fade in">
            <div class="container" style="padding-top: 20px; padding-bottom: 25px">
                <!-- Active Venue Status Start -->
                <div class="col-md-12">
                    <h4 class="title">Active Venue</h4>
                    <!-- Venue Status onclick to show details venue -->
                    <?php foreach ($getVenueLastBooking->result() as $key) { ?>
                        <div class="venue-status mobile-nopadding" onclick="showVenueBooking()">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center ellipsis" style="border-right: 1px solid;">
                                <h4><?php echo date('M',strtotime($key->booking_createdate)); ?></h4>
                                <h2><?php echo date('d',strtotime($key->booking_createdate)); ?></h2>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-7 ellipsis" style="margin-left:10px;">
                                <h3><?php echo $key->room_name; ?></h3>
                                <h4>
                                    <?php echo ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days == 0 ? 1 : ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days;?> Hari  &#8226  IDR <?php echo $key->harga;?> /Hari
                                </h4>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-3 ellipsis">
                                <h1>
                                    <?php if($key->count == 1) {
                                        echo "Menunggu ";
                                        echo "<br>";
                                        echo "Pembayaran";
                                        echo "<br>";
                                        echo "DP";
                                    }
                                    else if($key->count == 2){
                                        echo "Cek";
                                        echo "<br>";
                                        echo "Ketesediaan";
                                        echo "<br";
                                        echo "Venue";
                                    }
                                    else if($key->count == 3){
                                        echo "Menunggu";
                                        echo "<br>";
                                        echo "Pembayaran";
                                        echo "<br>";
                                        echo "Pelunasan";
                                    }
                                    else if($key->count == 4){
                                        echo "Selesai";
                                    }
                                    else
                                    {
                                        echo "Dibatalkan";
                                    }
                                    ?>
                                </h1>
                            </div>
                        </div>
                        <!-- Venue Status End -->
                        <!-- Details Venue Collapsable Start -->
                        <div id="venue-detail-booking" class="mobile-nopadding">
                            <div class="close-venue" onclick="closeVenueBooking()"><i class="fa fa-times-thin fa-2x" aria-hidden="true"></i></div>
                            <div class="col-md-7 col-sm-7 col-sm-push-5 venue-description">
                                <h5><b>Transaction ID</b></h5>
                                <p><?php echo strtoupper($key->id_booking); ?></p>
                                <h5><b>Note from Venue Owner</b></h5>
                                <p><?php echo $key->booking_description;?></p>
                                <h5><b>Details</b></h5>
                                <div id="textbox">
                                    <p>
                                        <span class="alignleft">Harga Venue (per Hari)</span>
                                        <span class="alignright"><?php echo $key->harga; ?> IDR</span>
                                    </p>
                                </div>
                                <div id="textbox">
                                    <p>
                                        <span class="alignleft">Lama Sewa</span>
                                        <span class="alignright"><?php echo ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days == 0 ? 1 : ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days;?> Hari</span>
                                    </p>
                                </div>
                                <div id="textbox">
                                    <p>
                                        <span class="alignleft">Tambahan</span>
                                        <span class="alignright">-</span>
                                    </p>
                                </div>
                                <hr width="100%" style="color:#BDBDBD;background-color:#BDBDBD;height:1px;">
                                <h5>
                                    <span class="alignleft"><b>Total</b></span>
                                    <span class="alignright"><?php echo (((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days == 0 ? 1 : ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days) * str_replace(".","",$key->harga);; ?> IDR</span>
                                </h5>
                            </div>
                            <div class="col-md-5 col-sm-4 col-sm-pull-7">
                                <div class="place-thumb" style="margin-bottom:20px;">
                                    <button type="button" class="btn btn-close-banner" onclick="deletefavorite('<?php echo  $this->session->account_name;?>,<?php echo $key->id_room;?>');"><i class="fa fa-times-thin" aria-hidden="true"></i></button>
                                    <?php if($key->room_discount != '0') { ?>
                                        <div class="disc-banner-small"><?php echo $key->room_discount; ?>% OFF</div>
                                        <div class="star-banner-small tooltip-left" data-tooltip="Popular Venue"><i class="fa fa-star" aria-hidden="true"></i></div>
                                    <?php } else { ""; } ?>
                                    <?php if($key->room_favorit == '1') { ?>
                                        <div class="star-banner-small tooltip-left" data-tooltip="Popular Venue"><i class="fa fa-star" aria-hidden="true"></i></div>
                                    <?php } else { ""; } ?>
                                    <img src="<?php echo base_url(); ?>upload/room/<?php echo $key->photo; ?>">
                                    <div class="placethumb-detail">
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
                        </div>
                    <?php } ?>
                    <!-- Active Venue Status End -->

                    <!-- Details Venue Collapsable End -->
                </div>
                <!-- History Venue Status Start -->
                <div class="col-md-12">
                    <h4 class="title">History</h4>
                    <?php foreach ($getVenueBooking->result() as $key) { ?>
                        <div class="venue-status mobile-nopadding">
                            <div class="col-md-2 col-sm-2 col-xs-2 text-center ellipsis" style="border-right: 1px solid;">
                                <h4><?php echo date('M',strtotime($key->booking_createdate)); ?></h4>
                                <h2><?php echo date('d',strtotime($key->booking_createdate)); ?></h2>
                            </div>
                            <div class="col-md-8 col-sm-8 col-xs-7 ellipsis" style="margin-left:10px;">
                                <h3><?php echo $key->room_name; ?></h3>
                                <h4>
                                    <?php echo ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days == 0 ? 1 : ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days;?> Hari  &#8226  IDR <?php echo $key->harga;?> /Hari
                                </h4>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-3 ellipsis">
                                <h1>
                                    <?php if($key->count == 1) {
                                        echo "Menunggu ";
                                        echo "<br>";
                                        echo "Pembayaran";
                                        echo "<br>";
                                        echo "DP";
                                    }
                                    else if($key->count == 2){
                                        echo "Cek";
                                        echo "<br>";
                                        echo "Ketesediaan";
                                        echo "<br";
                                        echo "Venue";
                                    }
                                    else if($key->count == 3){
                                        echo "Menunggu";
                                        echo "<br>";
                                        echo "Pembayaran";
                                        echo "<br>";
                                        echo "Pelunasan";
                                    }
                                    else if($key->count == 4){
                                        echo "Selesai";
                                    }
                                    else
                                    {
                                        echo "Dibatalkan";
                                    }
                                    ?>
                                </h1>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- History Venue Status End -->
            </div>
        </div>
        <div id="ulasan" class="tab-pane fade in">
            <div class="container" style="padding-top: 20px; padding-bottom: 25px">
                <div class="page__wrapper hidden-xs">
                    <div id="inbox-wrapper">
                        <div id="msg5"></div>
                        <div class="col-lg-12">
                            <section class="comment-list">
                                <?php $no = 1; foreach ($getVenueForReviewBooking->result() as $key) { ?>
                                    <div class="row">
                                        <div class="venue-status mobile-nopadding">
                                            <div class="col-md-2 col-sm-2 col-xs-2 text-center ellipsis" style="border-right: 1px solid;">
                                                <h4><?php echo date('M',strtotime($key->booking_createdate)); ?></h4>
                                                <h2><?php echo date('d',strtotime($key->booking_createdate)); ?></h2>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-7 ellipsis" style="margin-left:10px;">
                                                <h3><?php echo $key->room_name; ?></h3>
                                                <h4>
                                                    <?php echo ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days;?> Hari  &#8226  IDR <?php echo $key->harga;?> /Hari
                                                </h4>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-3 ellipsis">
                                                <h1>
                                                    <?php if($key->count == 1) {
                                                        echo "Menunggu ";
                                                        echo "<br>";
                                                        echo "Pembayaran";
                                                        echo "<br>";
                                                        echo "DP";
                                                    }
                                                    else if($key->count == 2){
                                                        echo "Cek";
                                                        echo "<br>";
                                                        echo "Ketesediaan";
                                                        echo "<br";
                                                        echo "Venue";
                                                    }
                                                    else if($key->count == 3){
                                                        echo "Menunggu";
                                                        echo "<br>";
                                                        echo "Pembayaran";
                                                        echo "<br>";
                                                        echo "Pelunasan";
                                                    }
                                                    else if($key->count == 4){
                                                        echo "Selesai";
                                                    }
                                                    else
                                                    {
                                                        echo "Dibatalkan";
                                                    }
                                                    ?>
                                                </h1>
                                            </div>
                                        </div>
                                        <!-- Venue Status End -->
                                        <!-- Details Venue Collapsable Start -->
                                        <div id="venue-detail-overview" class="mobile-nopadding">
                                            <div class="col-md-9 col-sm-9 col-sm-push-3 venue-description">
                                                <div class="panel panel-default arrow left">
                                                    <header class="panel-heading right">
                                                        <div class="comment-user">
                                                            <time class="comment-date pull-right" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Pesanan selesai: <?php echo (new DateTime($key->booking_end))->format( ' j F Y g:i A');?></time>
                                                        </div>
                                                    </header>
                                                    <div class="panel-body">
                                                        <header class="text-left">
                                                            <div class="comment-user">
                                                                <h3 class="" style="margin-left:20px;"><?php echo $key->id_booking;?></h3>
                                                            </div>
                                                        </header>
                                                        <?php if(empty($key->rating_date))
                                                        {
                                                            ?>
                                                            <form method="post" action="javascript:addratingroom('<?php echo $key->id_booking;?>')" id="form-review-<?php echo $key->id_booking;?>">
                                                                <div class="comment-post form-group">
                                                                    <input type="hidden" name="id_room" value="<?php echo $key->id_room;?>">
                                                                    <input type="hidden" name="id_booking" value="<?php echo $key->id_booking;?>">
                                                                    <div class="rating">
                                                                        <a href="javascript:void(0)" onClick="Star_rate(1,'<?php echo $key->id_booking; ?>')" id="star<?php echo $key->id_booking; ?>_1"><i class="fa fa-star-o"></i></a>
                                                                        <input type="radio" name="rating_value" id="star_<?php echo $key->id_booking; ?>_1" value="1" style="display:none" >
                                                                        <a href="javascript:void(0)" onClick="Star_rate(2,'<?php echo $key->id_booking; ?>')"  id="star<?php echo $key->id_booking; ?>_2"><i class="fa fa-star-o"></i></a>
                                                                        <input type="radio" name="rating_value" id="star_<?php echo $key->id_booking; ?>_2" value="2" style="display:none" >
                                                                        <a href="javascript:void(0)" onClick="Star_rate(3,'<?php echo $key->id_booking; ?>')"  id="star<?php echo $key->id_booking; ?>_3"><i class="fa fa-star-o"></i></a>
                                                                        <input type="radio" name="rating_value" id="star_<?php echo $key->id_booking; ?>_3" value="3" style="display:none" >
                                                                        <a href="javascript:void(0)" onClick="Star_rate(4,'<?php echo $key->id_booking; ?>')"  id="star<?php echo $key->id_booking; ?>_4"><i class="fa fa-star-o"></i></a>
                                                                        <input type="radio" name="rating_value" id="star_<?php echo $key->id_booking; ?>_4" value="4" style="display:none" >
                                                                        <a href="javascript:void(0)" onClick="Star_rate(5,'<?php echo $key->id_booking; ?>')"  id="star<?php echo $key->id_booking; ?>_5"><i class="fa fa-star-o"></i></a>
                                                                        <input type="radio" name="rating_value" id="star_<?php echo $key->id_booking; ?>_5" value="5" style="display:none" >
                                                                    </div>
                                                                    <br>
                                                                    <label>Berikan ulasan untuk tempat ini:</label>
                                                                    <h6 class="pull-right" id="count_message<?php echo $key->id_booking; ?>">200 Remaining</h6>
                                                                    <textarea maxlength="200" class="form-control textarea" rows="5" style="resize: none" name="rating_description" id="Message<?php echo $key->id_booking; ?>" placeholder="Message" onkeyup="input_message('<?php echo $key->id_booking; ?>')"></textarea>
                                                                </div>
                                                                <p class="text-right"><button type="submit"  class="btn btn-default btn-md" >Kirim</button></p>
                                                            </form>
                                                        <?php }

                                                        else
                                                        {
                                                        ?>
                                                            <div class="comment-post form-group">
                                                                <div class="rating">
                                                                    <a href="javascript:void(0)" ><i class="<?php if ($key->rating_value > 0) echo 'fa fa-star'; else echo 'fa fa-star-o'?>"></i></a>
                                                                    <a href="javascript:void(0)" ><i class="<?php if ($key->rating_value > 1) echo 'fa fa-star'; else echo 'fa fa-star-o'?>"></i></a>
                                                                    <a href="javascript:void(0)" ><i class="<?php if ($key->rating_value > 2) echo 'fa fa-star'; else echo 'fa fa-star-o'?>"></i></a>
                                                                    <a href="javascript:void(0)" ><i class="<?php if ($key->rating_value > 3) echo 'fa fa-star'; else echo 'fa fa-star-o'?>"></i></a>
                                                                    <a href="javascript:void(0)" ><i class="<?php if ($key->rating_value > 4) echo 'fa fa-star'; else echo 'fa fa-star-o'?>"></i></a>
                                                                </div>
                                                                <br>
                                                                <label>Berikan ulasan untuk tempat ini:</label>
                                                                <textarea maxlength="200" class="form-control textarea" style="border:none; resize: none" rows="5" readonly><?php echo $key->rating_description;?></textarea>
                                                            </div>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-sm-pull-9">
                                                <div class="place-thumb" style="margin-bottom:20px; min-height: 355px">
                                                    <img class="img-responsive" src="<?php echo base_url(); ?>upload/room/<?php echo $key->photo; ?>">
                                                    <div class="placethumb-detail">
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
                                        </div>
                                    </div>
                                    <hr>
                                <?php } ?>
                                <!-- Details Venue Collapsable End -->

                            </section>
                        </div>
                    </div>
                </div>
                <div class="page__wrapper visible-xs hidden-sm-up">
                    <div id="inbox-wrapper">
                        <div class="col-lg-12">
                            <section class="comment-list">
                                <!-- First Comment -->
                                <?php $no = 1; foreach ($getVenueForReviewBooking->result() as $key) { ?>
                                    <div class="row">
                                        <div class="venue-status mobile-nopadding">
                                            <div class="col-md-2 col-sm-2 col-xs-2 text-center ellipsis" style="border-right: 1px solid;">
                                                <h4><?php echo date('M',strtotime($key->booking_createdate)); ?></h4>
                                                <h2><?php echo date('d',strtotime($key->booking_createdate)); ?></h2>
                                            </div>
                                            <div class="col-md-8 col-sm-8 col-xs-7 ellipsis" style="margin-left:10px;">
                                                <h3><?php echo $key->room_name; ?></h3>
                                                <h4>
                                                    <?php echo ((new Datetime($key->booking_start))->diff(new Datetime($key->booking_end)))->days;?> Hari  &#8226  IDR <?php echo $key->harga;?> /Hari
                                                </h4>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-3 ellipsis">
                                                <h1>
                                                    <?php if($key->count == 1) {
                                                        echo "Menunggu ";
                                                        echo "<br>";
                                                        echo "Pembayaran";
                                                        echo "<br>";
                                                        echo "DP";
                                                    }
                                                    else if($key->count == 2){
                                                        echo "Cek";
                                                        echo "<br>";
                                                        echo "Ketesediaan";
                                                        echo "<br";
                                                        echo "Venue";
                                                    }
                                                    else if($key->count == 3){
                                                        echo "Menunggu";
                                                        echo "<br>";
                                                        echo "Pembayaran";
                                                        echo "<br>";
                                                        echo "Pelunasan";
                                                    }
                                                    else if($key->count == 4){
                                                        echo "Selesai";
                                                    }
                                                    else
                                                    {
                                                        echo "Dibatalkan";
                                                    }
                                                    ?>
                                                </h1>
                                            </div>
                                        </div>
                                        <!-- Venue Status End -->
                                        <!-- Details Venue Collapsable Start -->
                                        <div id="venue-detail-overview" class="mobile-nopadding">
                                            <div class="col-md-9 col-sm-9 col-sm-push-3 venue-description">
                                                <div class="panel panel-default arrow left">
                                                    <header class="panel-heading right">
                                                        <div class="comment-user">
                                                            <time class="comment-date pull-right" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Pesanan selesai: <?php echo (new DateTime($key->booking_end))->format( ' j F Y g:i A');?></time>
                                                        </div>
                                                    </header>
                                                    <div class="panel-body">
                                                        <header class="text-left">
                                                            <div class="comment-user">
                                                                <h3 class="" style="margin-left:20px;"><?php echo $key->id_booking;?></h3>
                                                            </div>
                                                        </header>
                                                        <?php if(empty($key->rating_date))
                                                        {
                                                            ?>
                                                            <form method="post" action="javascript:addratingroom('<?php echo $key->id_booking;?>')" id="form-review-<?php echo $key->id_booking;?>">
                                                                <div class="comment-post form-group">
                                                                    <input type="hidden" name="id_room" value="<?php echo $key->id_room;?>">
                                                                    <input type="hidden" name="id_booking" value="<?php echo $key->id_booking;?>">
                                                                    <div class="rating">
                                                                        <a href="javascript:void(0)" onClick="Star_rate(1,'<?php echo $key->id_booking; ?>')" id="star<?php echo $key->id_booking; ?>_1"><i class="fa fa-star-o"></i></a>
                                                                        <input type="radio" name="rating_value" id="star_<?php echo $key->id_booking; ?>_1" value="1" style="display:none" >
                                                                        <a href="javascript:void(0)" onClick="Star_rate(2,'<?php echo $key->id_booking; ?>')"  id="star<?php echo $key->id_booking; ?>_2"><i class="fa fa-star-o"></i></a>
                                                                        <input type="radio" name="rating_value" id="star_<?php echo $key->id_booking; ?>_2" value="2" style="display:none" >
                                                                        <a href="javascript:void(0)" onClick="Star_rate(3,'<?php echo $key->id_booking; ?>')"  id="star<?php echo $key->id_booking; ?>_3"><i class="fa fa-star-o"></i></a>
                                                                        <input type="radio" name="rating_value" id="star_<?php echo $key->id_booking; ?>_3" value="3" style="display:none" >
                                                                        <a href="javascript:void(0)" onClick="Star_rate(4,'<?php echo $key->id_booking; ?>')"  id="star<?php echo $key->id_booking; ?>_4"><i class="fa fa-star-o"></i></a>
                                                                        <input type="radio" name="rating_value" id="star_<?php echo $key->id_booking; ?>_4" value="4" style="display:none" >
                                                                        <a href="javascript:void(0)" onClick="Star_rate(5,'<?php echo $key->id_booking; ?>')"  id="star<?php echo $key->id_booking; ?>_5"><i class="fa fa-star-o"></i></a>
                                                                        <input type="radio" name="rating_value" id="star_<?php echo $key->id_booking; ?>_5" value="5" style="display:none" >
                                                                    </div>
                                                                    <br>
                                                                    <label>Berikan ulasan untuk tempat ini:</label>
                                                                    <h6 class="pull-right" id="count_message<?php echo $key->id_booking; ?>">200 Remaining</h6>
                                                                    <textarea maxlength="200" class="form-control textarea" rows="5" style="resize: none" name="rating_description" id="Message<?php echo $key->id_booking; ?>" placeholder="Message" onkeyup="input_message('<?php echo $key->id_booking; ?>')"></textarea>
                                                                </div>
                                                                <p class="text-right"><button type="submit"  class="btn btn-default btn-md" >Kirim</button></p>
                                                            </form>
                                                        <?php }

                                                        else
                                                        {
                                                            ?>
                                                            <div class="comment-post form-group">
                                                                <div class="rating">
                                                                    <a href="javascript:void(0)" ><i class="<?php if ($key->rating_value > 0) echo 'fa fa-star'; else echo 'fa fa-star-o'?>"></i></a>
                                                                    <a href="javascript:void(0)" ><i class="<?php if ($key->rating_value > 1) echo 'fa fa-star'; else echo 'fa fa-star-o'?>"></i></a>
                                                                    <a href="javascript:void(0)" ><i class="<?php if ($key->rating_value > 2) echo 'fa fa-star'; else echo 'fa fa-star-o'?>"></i></a>
                                                                    <a href="javascript:void(0)" ><i class="<?php if ($key->rating_value > 3) echo 'fa fa-star'; else echo 'fa fa-star-o'?>"></i></a>
                                                                    <a href="javascript:void(0)" ><i class="<?php if ($key->rating_value > 4) echo 'fa fa-star'; else echo 'fa fa-star-o'?>"></i></a>
                                                                </div>
                                                                <br>
                                                                <label>Berikan ulasan untuk tempat ini:</label>
                                                                <textarea maxlength="200" class="form-control textarea" style="border:none; resize: none" rows="5" readonly><?php echo $key->rating_description;?></textarea>
                                                            </div>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-sm-pull-9">
                                                <div class="place-thumb" style="margin-bottom:20px; min-height: 355px">
                                                    <img class="img-responsive" src="<?php echo base_url(); ?>upload/room/<?php echo $key->photo; ?>">
                                                    <div class="placethumb-detail">
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
                                        </div>
                                    </div>
                                    <hr>
                                <?php } ?>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Function Script for showVenue Start -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#confirmnewpassword').blur(function(){
            var pass = $('#newpassword').val();
            var pass2 = $('#confirmnewpassword').val();
            if(pass != pass2)
            {
                $('#checkpassword').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'> Password tidak sama! </div>");
                $("#btn-password").prop('disabled', true);
            }
            else
            {
                $('#checkpassword').html("<div class='alert alert-success alert-dismissible fade in' role='alert'> Password sama! </div>");
                $("#btn-password").prop('disabled', false);
            }

        });
    });
</script>
<script>

    function Star_rate(rate,id_booking)
    {
//As per the value of rate parameter, mark respective radio button as “checked”
        var btn = document.getElementById("star_"+id_booking+"_"+rate);
        btn.checked = true;
//display correct rate stars images
        var star = document.getElementById("star"+id_booking+"_"+rate).innerHTML;
        var empty_star = '<i class="fa fa-star-o"></i>';
        var full_star = '<i class="fa fa-star"></i>';
        if(star == empty_star)   //if an empty star is clicked, rating is done till that star
        {
            for(i = rate; i>0; i--)
            {
                document.getElementById("star"+id_booking+"_"+i).innerHTML = full_star;
            }
        }

        else if(star == full_star) //if a full star anchor is clicked, rating is reduced to that star
        {
            for(i = rate; i <= 5; i++)
            {
                document.getElementById("star"+id_booking+"_"+(i+1)).innerHTML = empty_star;
            }
        }
    }

</script>
<script type="text/javascript">
    var text_max = 200;

    function input_message(id_booking) {
        var text_length = $('#Message' + id_booking).val().length;
        var text_remaining = text_max - text_length;
        $('#count_message' + id_booking).html(text_remaining + ' remaining');
    }


</script>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            jQuery("#msg4").fadeTo(2000, 500).slideUp(500, function () {
                jQuery("#msg4").slideUp(500);
            });
        });
    });


    function showVenueOverView() {
        var x = document.getElementById('venue-detail-overview');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
    }

    function closeVenueOverView() {
        var x = document.getElementById('venue-detail-overview');
        if (x.style.display === 'block') {
            x.style.display = 'none';
        }
    }
</script>
<script>
    function showVenueBooking() {
        var x = document.getElementById('venue-detail-booking');
        if (x.style.display === 'none') {
            x.style.display = 'block';
        } else {
            x.style.display = 'none';
        }
    }

    function closeVenueBooking() {
        var x = document.getElementById('venue-detail-booking');
        if (x.style.display === 'block') {
            x.style.display = 'none';
        }
    }

    function deletefavorite(data) {
        var datas = data.split(",")
        $.ajax({
            url:"<?php echo base_url() ?>user/deletefavoriteroom",
            type:"POST",
            dataType:"JSON",
            data: { account_name: datas[0], id_room: datas[1] },
            success: function(result)
            {
                //console.log(result.result);
                if(result.status)
                {
                    $('#msg4').html("<div class='alert alert-success alert-dismissible fade in' role='alert'>"+result.msg+"</div>");
                    $("#msg4").fadeTo(2000, 500).slideUp(500, function() {
                        $("#msg4").slideUp(500);
                    });
//                    $('#favoritevenue').empty();
//                    $('#favoritevenue').append(result.result);
                }
                else
                {
                    $('#msg4').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+result.msg+"</div>");
                    $("#msg4").fadeTo(2000, 500).slideUp(500, function() {
                        $("#msg4").slideUp(500);
                    });
                }
            }
        });
    }
    function addratingroom(idbooking) {
        $.ajax({
            url:"<?php echo base_url() ?>user/addroomrating",
            type:"POST",
            dataType:"JSON",
            data: $("#form-review-" + idbooking).serialize(),
            success: function(result)
            {
                //console.log(result.result);
                if(result.status)
                {
                    setTimeout(function(){// wait for 5 secs(2)
                        window.location.reload() // then reload the page.(3)
                    }, 5000);
                }
                else
                {
                    $('#msg5').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+result.msg+"</div>");
                    $("#msg5").fadeTo(2000, 500).slideUp(500, function() {
                        $("#msg5").slideUp(500);
                    });
                }
            }
        });
    }
</script>
<script class="jsMessageBubbleTemplate" type="text/x-handlebars-template">
    <li class="message__item current__user">
        <div class="comment__content">
            <div class="message__bubble">
                {{ messageBody }}
                <span class="message__date jsDate" data-date="{{ messageDate }}">{{ messageDate }}</span>
            </div>
        </div>
    </li>
</script>
<!-- script for send message -->
<script type="text/javascript">
    "use strict";

    var $YPCA = jQuery.noConflict(),
        YP = window.YP || {};

    YP.MessageCenter = (function($YPCA) {
        var messageCenter = {
            settings: {
                $messageThread: $YPCA('.jsCommentsWrap'),
                $messageBody: $YPCA('.jsMessageBody'),
                $messageItemBubble: $YPCA('.jsMessageBubbleTemplate'),
                $messageButton: $YPCA('.jsMessageSend')
            },

            _init: function() {
                messageCenter._scrollMessageViewportToBottom();
                messageCenter._addEventListener();
            },

            _addEventListener: function() {
                messageCenter.settings.$messageBody.on('keyup', function(e) {
                    var maxlength = $YPCA(this).attr('maxlength');

                    messageCenter.settings.$messageButton.prop('disabled', $YPCA(this).val().length === 0);

                    if ($YPCA(this).val().length >= maxlength) {
                        e.preventDefault();
                        $YPCA(this).val($YPCA(this).val().substr(0, maxlength));
                        return false;
                    }
                });
                $YPCA('.jsCommentContainer').on('click', '.jsMessageSend', function() {
                    messageCenter._appendMessageToBody(messageCenter.settings.$messageBody.val());
                    messageCenter._scrollMessageViewportToBottom();
                });
            },

            _scrollMessageViewportToBottom: function() {
                // [0] is essentially document.getElementbyId() jQuery style
                if (messageCenter.settings.$messageThread.length > 0) {
                    var container = $YPCA('.jsMsgScroll')[0];
                    container.scrollTop = container.scrollHeight;
                }
            },
            /**
             * Simulate "realtime" posting message visually in the conversation
             * @param body
             * @param date
             * @private
             */
            _appendMessageToBody: function(body) {
                // Retrieve the HTML from the script tag we setup in the template
                // We use the id (header) of the script tag to target it on the page
                var templateHandlebars = messageCenter.settings.$messageItemBubble.html(),
                    // The Handlebars.compile function returns a function to theTemplate variable

                    theTemplate = Handlebars.compile(templateHandlebars);

                messageCenter.settings.$messageThread.append(theTemplate({
                    messageBody: body
                }));
                messageCenter.settings.$messageBody.val('');
                messageCenter.settings.$messageButton.attr("disabled", true);

            },
        };

        $YPCA(function() {
            messageCenter._init();
        });
    })($YPCA);


</script>
<script src="<?php echo base_url(); ?>assets/js/jquery.easing.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.mousewheel.js"></script>
<script defer src="<?php echo base_url(); ?>assets/js/demo.js"></script>
<!-- Function Script for closeVenue End -->
