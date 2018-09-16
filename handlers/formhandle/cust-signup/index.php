<?php
$path = require $_SERVER['DOCUMENT_ROOT'] . '/config/config-path.php';
include $path['root'] . '/includes/connect.inc.php';
function sendVerificationLink($receiverEmail, $hashVal)
{
    $to = $receiverEmail;
    $subject = "Email Verification";

    $message = '<p>Verify Your Email by clicking the link below.</p>
  <a href="https://whenwing.com/customer-email-verification/hash/' . $hashVal . '">Verify Your Account</a>
  ';
    $headers = 'MIME-Version: 1.0' . PHP_EOL;
    $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . PHP_EOL;
    $headers .= 'From: <no-reply@whenwing.com>' . PHP_EOL;

    mail($to, $subject, $message, $headers);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cust-name']) && isset($_POST['cust-email']) && isset($_POST['cust-mobile']) && isset($_POST['cust-password'])) {
        if (!empty($_POST['cust-name']) && !empty($_POST['cust-email']) && !empty($_POST['cust-mobile']) && !empty($_POST['cust-password'])) {

            $custName = htmlspecialchars($_POST['cust-name']);
            $custEmail = htmlspecialchars($_POST['cust-email']);
            $custMobile = htmlspecialchars($_POST['cust-mobile']);
            $custPassword = htmlspecialchars($_POST['cust-password']);
            $custPassword = password_hash($custPassword, PASSWORD_BCRYPT);

            $db = new DB();
            $db->query('SELECT  `email`  from  `ww_customers` WHERE  `email` = :email');
            $db->bind(':email', $custEmail);
            $exeRes = $db->resultset();
            if (count($exeRes) == 0) {
                $db->query('INSERT INTO `ww_customers`(`fullname`, `email`, `mobile`,`cust_hash`,`cust_password`,`reg_date`) VALUES (:fullname, :email, :mobile, :cust_hash, :cust_password, now())');
                $db->bind(':fullname', $custName);
                $db->bind(':email', $custEmail);
                $db->bind(':mobile', $custMobile);
                $md5Hash = md5(uniqid(rand(), true));
                $db->bind(':cust_hash', $md5Hash);
                $db->bind(':cust_password', $custPassword);
                $exeRes = $db->execute();
                if ($exeRes) {
                    sendVerificationLink($custEmail, $md5Hash);
                    header('Location: /registration-successful');
                    $db->terminate();
                }
            } else {
                echo 'User Already Registered';
            }

        } else {
            echo 'Name, email and Message Field Can\'t be empty';
        }
    }
}
