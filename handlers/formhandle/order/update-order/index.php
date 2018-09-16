<?php
$path = require $_SERVER['DOCUMENT_ROOT'] . '/config/config-path.php';
require $path['root'] . '/includes/connect.inc.php';
require_once $path['root'] . '/includes/session.inc.php';
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    if (isset($_POST['orderId'])) {
        if (!empty($_POST['orderId'])) {
            $orderId = htmlspecialchars($_POST['orderId']);
            echo $Customer_id = htmlspecialchars($_SESSION['customerlogin']);
            $db = new DB();

            $db->query('UPDATE `ww_customer_order` SET `order_status`= 2  WHERE `order_id` = :order_id AND `customer_id` = :customer_id'  );
            $db->bind(':order_id', $orderId);
            $db->bind(':customer_id', $Customer_id);
            $exeRes = $db->execute();
            if ($exeRes) {
                echo 'Successfully Updated';
                $db->terminate();
            }

        }
    }
}
