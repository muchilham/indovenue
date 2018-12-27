<footer>
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-7">
                <div class="center-block menu" style="padding: 20px 0">
                    <a href="<?php echo base_url();?>home" class="footer-nav">Home</a>
                    <a href="<?php echo base_url();?>home" class="footer-nav">Support</a>
                    <a href="<?php echo base_url();?>home" class="footer-nav">License</a>
                    <a href="<?php echo base_url();?>home" class="footer-nav">FAQ</a>
                    <a href="<?php echo base_url();?>home" class="footer-nav">Privacy &amp; Term</a>
                </div>
                <div class="center-block" style="padding: 20px 0">
                    <h1>Temukan Ruang Terbaik Untuk Kegiatanmu</h1>
                    <a href="<?php echo base_url();?>user/register" class="btn btn-tag btn-outline-2">DAFTAR SEKARANG</a>
                </div>
            </div>
            <div class="col-md-5">
                <p class="followus" style="padding-top: 20px">IKUTI KAMI DI</p>
                <div class="row">
                    <a href="#" class="socialicon"><i id="social-fb" class="fa fa-facebook-square fa-2x social"></i></a>
                    <a href="#" class="socialicon"><i id="social-tw" class="fa fa-twitter-square fa-2x social"></i></a>
                    <a href="#" class="socialicon"><i id="social-gp" class="fa fa-google-plus-square fa-2x social"></i></a>
                    <a href="#" class="socialicon"><i id="social-em" class="fa fa-envelope-square fa-2x social"></i></a>
                </div>
                <p class="navbar-custom followus" style="padding-top: 30px">KAMI ADALAH BAGIAN DARI</p>
                <div class="row">
                    <a href="#" class="socialicon startuplogo"><img src="<?php echo base_url(); ?>assets/img/1000sd-white.png" class="img-responsive"></a>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="footer-line"></div>-->
    <hr style="margin: 0px">
    <div class="container" style="padding: 20px">
        <div class="col-md-12">
            <div class="col-md-7 col-sm-7 col-xs-12 copyright">
                <p>All right reserved &copy; Indovenue</p>
            </div>
<!--            <div class="col-md-5 col-sm-5 col-xs-12">-->
<!--                <div class="center-block language">-->
<!--                    <button type="button" class="btn btn-color btn-white btn-indo" style="border-color:white !important;">Indonesia</button>-->
<!--                    <button type="button" class="btn btn-color btn-custom btn-ing">English</button>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </div>


    <!-- FOOTER END -->
    <!-- Slider Picker -->
    <script>
        $("#range1").slider({});
        $("#range2").slider({});
        $("#range3").slider({});
        $("#range4").slider({});
    </script>
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
    <!-- Script for Slider -->
    <script>
        // Can also be used with $(document).ready()
        $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: false
            });
        });
    </script>
    <script type="text/javascript">
        var // initial objects
            $slider = $('.slider2'),
            $wrapper = $slider.children('ul'),
            $slides = $wrapper.children('li'),
            // wrapper width
            wrapperWidth = $wrapper.width() * 1.6,
            // slide attributes
            slideCount = $slides.length,
            slideWidth = Math.round((100 / slideCount) * 100) / 100,
            slideHeight = $slides.height(),
            slideIndex = 0;
        // set window width & move to first slide
        $wrapper.css({
            width: slideCount * 100 + '%',
            //transform: 'translateX(' + ( - slideWidth + '%' ) + ')'
        });
        $slides.css({
            width: slideWidth + '%'
        });
        //$slides.last().prependTo('.slider ul');
        /*$(window).bind('load resize', function() {

          var adjustedHeight = $slides.width() * slideHeight / wrapperWidth;

          $wrapper.css({ height: Math.round(adjustedHeight * 100) / 100 });
        });*/
        // cache function since we'll use it a bunch
        function moveSlide(index) {
            $wrapper.css({
                transform: 'translateX(' + slideIndex * -slideWidth + '%)'
            });
        }

        function nextSlide() {
            if (slideIndex >= slideCount - 1) {
                slideIndex = 0;
                $wrapper.css({
                    transform: 'translateX(0)'
                });
            } else {
                slideIndex++;
                moveSlide(slideIndex);
            }
            // make it endless scrolling ?
            //$slides.first().prependTo('.slider ul');
        }

        function prevSlide() {
            if (slideIndex === 0) {
                slideIndex = slideCount - 1;
            } else {
                slideIndex--;
            }
            moveSlide(slideIndex);
            // make it endless scrolling?
            //$slides.first().prependTo('.slider ul');
        }
        $('.slide-next').on('click', function() {
            nextSlide();
        });
        $('.slide-prev').on('click', function() {
            prevSlide();
        });
    </script>


    <script src="<?php echo base_url(); ?>assets/js/jquery.easing.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.mousewheel.js"></script>
    <script defer src="<?php echo base_url(); ?>assets/js/demo.js"></script>
</footer>
</body>

</html>