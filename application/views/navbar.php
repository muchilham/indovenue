<!DOCTYPE html>
<html>
<head>
    <title>Indovenue </title>
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
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/handlebars-v4.0.10.js"></script>
    <!-- CSS for message and inbox-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/inbox.css">


</head>
<body>
<!-- Navbar Start-->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>assets/img/logo.png" style="max-height: 100%"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right navbar-custom">
                <li class="<?php if($this->router->fetch_class() == "home") {?>active<?php } else { } ?>"><a href="<?php echo base_url();?>home">Beranda</a></li>
                <li class="<?php if($this->router->fetch_class() == "about") {?>active<?php } else { } ?>"><a href="<?php echo base_url();?>about">Tentang Kami</a></li>
                <li class="<?php if($this->router->fetch_class() == "partner") {?>active<?php } else { } ?>"><a href="<?php echo base_url();?>partner">Jadi Partner</a></li>
                <li class="divider-vertical"></li>
                <?php if(!$this->session->logged_in)
                { ?>

                <!--Trigger Modal Login for Mobile -->
                <li class="modal-login"><a href="#loginModal" data-toggle="modal">Masuk</a></li>
                <!--Collapse Login for Dekstop and Tablet Start -->
                <li class="dropdown dropdown-login">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Masuk <span class="caret"></span></a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <h1>Masuk</h1>
                                    <div id="msg"></div>
                                    <form id="login-form" method="post" action="javascript:login();">
                                        <div class="form-group">
                                            <label class="register-label" for="email">Email</label>
                                            <div>
                                                <input type="email" class="form-control" placeholder="example@email.com" id="email" name="account_email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="register-label" for="password">Password</label>
                                            <div>
                                                <input type="password" class="form-control" placeholder="password anda" id="password" name="account_password">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 forget">
                                                <a href="<?php echo base_url();?>user/forgetpassword"><i>Lupa password?</i></a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <br>
                                            <button type="submit" class="btn btn-register" style="margin-top:0px;">MASUK</button>
                                        </div>
                                    </form>

<!--                                    <hr width="100%" style="color:#BDBDBD; background-color:lightgrey; height:0.5px">-->
<!--                                    <div class="text-center method">-->
<!--                                        <p>atau masuk dengan menggunakan metode lain</p>-->
<!--                                        <button type="button" class="btn btn-facebook" style="margin-top:0px;"><i class="fa fa-facebook" aria-hidden="true"></i> Login with Facebook</button>-->
<!--                                    </div>-->
                                    <br>

                                </div>
                                <!--<div class="bottom text-center">
                              </div>-->
                            </div>
                        </li>
                    </ul>
                </li>
                <!--Collapse Login for Dekstop and Tablet End -->
                <li class="daftar"><a href="<?php echo base_url();?>user/register">Daftar</a></li>
                <?php } else { ?>

                <li class="dropdown dropdown-profile">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-top:-10px;">
                        <img src="<?php echo base_url().$this->session->account_photo; ?>" class="img-circle center" width="40" height="40">
                        <b class="avatar-text"> <?php echo $this->session->account_email; ?></b>
                    </a>
                    <ul id="login-profile" class="dropdown-menu">
                        <li><a href="<?php echo base_url();?>user">Profil</a></li>
                        <li><a href="<?php echo base_url();?>user">Pesanan Saya</a></li>
                        <li><a href="<?php echo base_url();?>user">Pesan</a></li>
                        <li><a href="<?php echo base_url();?>user/logout">Keluar</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- Navbar End -->

<!-- Modal Login for Mobile Start -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h1 class="modal-title title" id="myModalLabel">Masuk</h1>
            </div>
            <div class="modal-body">
                <form id="login-form" method="post" action="javascript:login();">
                    <div class="form-group">
                        <label class="register-label" for="email">Email</label>
                        <div class="input-group-lg">
                            <input type="email" class="form-control" placeholder="example@email.com" id="email" name="account_email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="register-label" for="password">Password</label>
                        <div class="input-group-lg">
                            <input type="password" class="form-control" placeholder="password anda" id="password" name="account_password">
                        </div>
                    </div>
<!--                    <div>-->
<!--                        <div class="col-md-6 col-sm-6">-->
<!--                            <div class="form-group">-->
<!--                                <div class="input-group remember">-->
<!--                                    <input type="checkbox" name="remember" value="remember"> Ingat saya.-->
<!--                                    <br>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-6 col-sm-6 forget text-right">-->
<!--                            <a href="">Lupa password?</a>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="text-center">
                        <button type="submit" class="btn btn-register">MASUK</button>
                    </div>
                </form>
<!--                <hr width="100%" style="color:#BDBDBD; background-color: #BDBDBD; height:1px">-->
<!--                <div class="text-center method">-->
<!--                    <p>atau masuk dengan menggunakan metode lain</p>-->
<!--                    <button type="button" class="btn btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Login with Facebook</button>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>
<!-- Modal Login for Mobile End -->

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
                    window.location = data.url;
//                     $('#msg').html("<div class='alert alert-success alert-dismissible fade in' role='alert'>"+data.msg+"</div>");
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