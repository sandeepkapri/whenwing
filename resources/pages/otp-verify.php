<?php
$path = require $_SERVER['DOCUMENT_ROOT'] . '/config/config-path.php';
require_once $path['root'] . '/includes/session.inc.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["mobOtp"]) && isset($_POST["mobOtp"])) {
        if ($_SESSION['ww_otp'] == $_POST["mobOtp"]) {
            echo 1;
        } else {
            echo 0;
        }

    }
}
