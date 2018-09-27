<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Perpustakaan</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="./assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo $url; ?>assets/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo "><span>Perpustakaan </span><strong class="text-primary"> FMIPA UNIPA</strong></div>
            <form method="post" action="proses.php" class="text-left form-validate">
              <div class="form-group-material">
                <input autofocus id="login-username" type="text" name="loginUsername" required data-msg="Username tidak boleh kosong" class="input-material">
                <label for="login-username" class="label-material">Username</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="loginPassword" required data-msg="Password tidak boleh kosong" class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
              <div class="form-group">
                <button class="btn btn-primary" name="login">Masuk</button>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo $url; ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $url; ?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo $url; ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="<?php echo $url; ?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo $url; ?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo $url; ?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo $url; ?>assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="<?php echo $url; ?>assets/js/front.js"></script>
  </body>
</html>