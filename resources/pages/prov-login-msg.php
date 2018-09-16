<?php
ob_start();
      $path = require $_SERVER['DOCUMENT_ROOT'].'/config/config-path.php';
      require_once $_SERVER['DOCUMENT_ROOT'].'/includes/session.inc.php';
      require $_SERVER['DOCUMENT_ROOT'].'/includes/connect.inc.php';
      if(isset($_SESSION['providerlogin'])){
            header('Location: /provider-profile');
        }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="theme-color" content="#4885ed" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WhenWing - Login</title>
<link rel="icon" href="images/logo.png">
<?php include 'includes/style.inc.php';?>
</head>
<body>
<?php include 'resources/templates/header-tmpl.php';?>
<?php include 'resources/templates/navigation-tmpl.php';?>
<?php include 'resources/templates/prov-login-msg-tmpl.php';?>
<?php include 'resources/templates/footer-tmpl.php';?>
<?php include 'includes/script.inc.php';?>
</body>
</html>
