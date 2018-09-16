<?php
$path = require $_SERVER['DOCUMENT_ROOT'] . '/config/config-path.php';
include $path['root'] . '/includes/connect.inc.php';
require_once $path['root'] . '/includes/session.inc.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cust-email']) && isset($_POST['cust-password'])) {
        if (!empty($_POST['cust-email']) && !empty($_POST['cust-password'])) {

            $custEmail = htmlspecialchars($_POST['cust-email']);
            $custPassword = htmlspecialchars($_POST['cust-password']);
            $db = new DB();
            $db->query('SELECT  `id`,`cust_password`,`active_status`  from  `ww_customers` WHERE  `email` = :email');
            $db->bind(':email', $custEmail);
            $exeRes = $db->single();
            if (password_verify($custPassword,$exeRes['cust_password'])) {
                $_SESSION['customerlogin'] = $exeRes['id'];
                header('Location: /profile');
                $db->terminate();
            }else{
                $customerLoginErr = "Incorrect Credentials.";

            }

        } else {
            $customerLoginErr = 'Name, email and Message Field Can\'t be empty';
        }
    }
}
?>
