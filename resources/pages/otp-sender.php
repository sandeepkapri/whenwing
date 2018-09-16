<?php
$path = require $_SERVER['DOCUMENT_ROOT'] . '/config/config-path.php';
require_once $path['root'] . '/includes/session.inc.php';
$otpVal = mt_rand(100000, 999999);
$_SESSION['ww_otp'] = $otpVal;
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    if (isset($_POST["mobNum"]) && isset($_POST["mobNum"])) {
        // Authorisation details.
        $username = "amitsharma3381@gmail.com";
        $hash = "cba603599af8c60edb3653048f466f2a5f75486301de1dfd8751b5b757c83b73";

        // Config variables. Consult http://api.textlocal.in/docs for more info.
        $test = "0";
        $otpVal = mt_rand(100000, 999999);
        $_SESSION['ww_otp'] = $otpVal;
        // Data for text message. This is the text message data.
        $sender = "WhenWing"; // This is who the message appears to be from.
        $numbers = $_POST["mobNum"]; // A single number or a comma-seperated list of numbers
        $message = "Your OTP is "+$otpVal;
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = urlencode($message);
        $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers . "&test=" . $test;
        $ch = curl_init('http://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        echo $result = curl_exec($ch); // This is the result from the API
        curl_close($ch);

    }
}
