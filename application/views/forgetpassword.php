<!DOCTYPE html>
<html>
<head>
    <title>Indovenue Front</title>
    <meta http-equiv="Content-Type" content="text/html" charset="windows-1252">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Selection-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Open+Sans:300,400" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/simple-line-icons.css">
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <!-- START BOOTSTRAP -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css"">
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.min.css">
    <!-- END BOOTSTRAP -->
    <!--Bootstrap-slider-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-slider.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-slider.min.js"></script>
    <!-- Include Date Range Picker -->
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css">-->
    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/daterangepicker.css" />
    <!-- START CUSTOM CSS -->
    <!-- Flexslider -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flexslider.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flexslider.js"></script>
    <!-- START CUSTOM CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<body>
<!-- Indovenu's Logo -->
  <a class="logo-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>assets/img/logo.png" style="max-height: 100%"></a>
  <!-- Register Section Start -->
  <div class="col-lg-7 col-md-7 col-md-push-5 col-sm-12 col-xs-12 register-section">
    <!-- 'Jadi Partner' Section Start-->
    <div class="row text-right partner">
      <div class="col-md-4 col-md-offset-5 col-sm-4 col-sm-offset-6">
        <p>Sudah punya<br>Akun Indovenue?</p>
      </div>
      <div class="col-md-2 col-sm-2">
            <a href="#loginModal" data-toggle="modal" class="btn btn-become-partner">Masuk</a>
      </div>
    </div>
    <!-- 'Jadi Partner' Section End-->
    
    <!-- Register Form Start -->
    <div class="center-hor-ver" style="padding-top: 50px">
    <div class="form-bg">
      <div class="header-form">
        <h3>Reset Password</h3>
      </div>
        <div id="msg"></div>
      <form method="post" action="javascript:reset_password();" id="form-update">
        <div class="form-group">
          <label class="register-label" for="email">Email</label>
          <div class="input-group" style="width:100%;">
            <input type="email" class="form-control" placeholder="andrew.moore@gmail.com" id="account_name" name="account_name">
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-register">SUBMIT</button>
        </div>
      </form>
      <hr width="100%" style="background-color:lightgrey; height:.5px">
      <div class="ajax-load text-center" style="display:none">
          <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
      </div>
    </div>
    </div>
    <!-- Register Form End -->
    
    <!-- Footer for Register Form Start -->
    <div class="footer-form">
      <p>By clicking "Sign Up" I agree to Indovenue’s <span style="color: orangered;"><strong>Terms of Service</strong></span>.</p>
    </div>
    <!-- Footer for Register Form End -->
  </div>
  <!-- Register Section End -->
  
  <!-- Login Section Start -->
  <div class="col-lg-5 col-md-5 col-md-pull-7 col-sm-12 col-xs-12 login-bg">
    <div class="col-md-12 ">
      <div class="section-login">
        <h2 class="title">Raih Pendapatan yang Lebih Optimal Bersama Kami</h2>
          <br>
          <p>Punya venue dan ingin menjadi partner Indovenue?</p>
          <p>Indovenue memberikan cras quis nulla commodo, aliquam lectus sed, blandit . Duis tincidunt urna non pretium porta. Cras ullamcorper bibendum bibendum.</p>
        <br>
        <button type="button" class="btn btn-login" href="#partnerModal" data-toggle="modal">Jadi Partner</button>
      </div>
     </div>
      <!-- Logo Login -->
      
        <div class="col-md-12 section-logo-login">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="logo-login">
              <img src="<?php echo base_url(); ?>assets/img/uber.png">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="logo-login">
              <img src="<?php echo base_url(); ?>assets/img/linkedin.png">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="logo-login">
              <img src="<?php echo base_url(); ?>assets/img/paypal.png">
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <div class="logo-login">
              <img src="<?php echo base_url(); ?>assets/img/twitter.png">
            </div>
          </div>
        </div>
      
    
  </div>
  <!-- Login Section Start -->
  <!-- Modal for 'Masuk' Button Start-->
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" role="document">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h1 class="modal-title title" id="myModalLabel">Masuk</h1>
        </div>
        <div class="modal-body">
            <div id="msg1"></div>
            <form id="login-form" method="post" action="javascript:login();">
            <div class="form-group">
              <label class="register-label" for="email">Email</label>
              <div class="input-group" style="width:100%">
                <input type="email" class="form-control" placeholder="example@email.com" id="email" name="account_email">
              </div>
            </div>
            <div class="form-group">
              <label class="register-label" for="password">Password</label>
              <div class="input-group" style="width:100%">
                <input type="password" class="form-control" placeholder="********" id="password" name="account_password">
              </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 forget">
                    <a href="<?php echo base_url();?>user/forgetpassword"><i>Lupa password?</i></a>
                </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-register">MASUK</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="partnerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h1 class="modal-title title" id="myModalLabel">Reset Password</h1>
            </div>
            <div class="modal-body">
                <div id="msg1"></div>
                <form method="post" action="javascript:reset_password();" id="form-update">
                    <div class="form-group">
                        <label class="register-label" for="email">Email</label>
                        <div class="input-group" style="width:100%;">
                            <input type="email" class="form-control" placeholder="andrew.moore@gmail.com" id="account_name" name="account_name">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-register">SUBMIT</button>
                    </div>
                </form>
                <div class="ajax-load text-center" style="display:none">
                  <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- Modal for 'Masuk' Button End-->
</body>
</html>
<script>
    function reset_password()
    {
        $.ajax(
        {
            url:"<?php echo base_url() ?>User/resetpassword",
            type:"POST",
            dataType:"JSON",
            data:$('#form-update').serialize(),
            beforeSend: function()
            {
                $('.ajax-load').show();
            }
        })
        .done(function(response)
        {
            $('#form-update').each(function()
            {
                this.reset();
            });
            if(response.status == 'true')
            {
                $('#msg').html("<div class='alert alert-success alert-dismissible fade in' role='alert'>Silahkan Cek Email Anda</div>");
            }
            else
            {
                $('#msg').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>" + response.msg + "</div>");
            }
            
            $('.ajax-load').hide();
            setTimeout(function(){ $('#msg').hide(); }, 4000);
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
            $('#msg').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>Terjadi Kesalahan!</div>");


            $('.ajax-load').hide();
            setTimeout(function(){ $('#msg').hide(); }, 4000);
        });
    }
</script>
<script>
    function login()
    {
        $.ajax({
            url:"<?php echo base_url() ?>user/login",
            type:"POST",
            dataType:"JSON",
            data:$('#login-form').serialize(),
            success: function(data)
            {
                if(data.status)
                {
                    window.location = "<?php echo base_url();?>home";
                }
                else
                {
                    $('#msg1').html("<div class='alert alert-danger alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
                    $("#msg1").fadeTo(2000, 500).slideUp(500, function() {
                        $("#msg1").slideUp(500);
                    });
                }
            }
        })
    }
</script>
