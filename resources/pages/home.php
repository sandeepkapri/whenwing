<?php $path = require $_SERVER['DOCUMENT_ROOT'].'/config/config-path.php'?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>WhenWing</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="theme-color" content="#4885ed" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="images/logo.png">
<?php include 'includes/style.inc.php';?>
</head>
<body>
<?php include 'resources/templates/header-tmpl.php';?>
<?php include 'resources/templates/navigation-tmpl.php';?>
<?php include 'resources/templates/location-popup-tmpl.php';?>
<?php include 'resources/templates/disp-images-tmpl.php';?>
<?php include 'resources/templates/homepage-services-list-tmpl.php';?>
<?php include 'resources/templates/footer-tmpl.php';?>
<?php include 'includes/script.inc.php';?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsS0r2f4REsT82evaRyQ1c8Ok6MiHUgB0"
    async defer></script>
</body>
</html>
