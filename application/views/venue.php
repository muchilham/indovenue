<?php foreach ($searchVenue->result() as $key) { ?>
    <div class="col-md-6 col-sm-6 col-xs-12">
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