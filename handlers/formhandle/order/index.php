<?php
$path = require $_SERVER['DOCUMENT_ROOT'] . '/config/config-path.php';
include $path['root'] . '/includes/connect.inc.php';
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    if (isset($_POST['order-type1']) && isset($_POST['order-type2']) && isset($_POST['order-type3']) && isset($_POST['order-type4'])) {
        if (!empty($_POST['order-type1']) && !empty($_POST['order-type2']) && !empty($_POST['order-type3']) && !empty($_POST['order-type4'])) {

            $customer_id = 123;
            $provider_id = 533;
            $order_type1 = htmlspecialchars($_POST['order-type1']);
            $order_type2 = htmlspecialchars($_POST['order-type2']);
            $order_type3 = htmlspecialchars($_POST['order-type3']);
            $order_type4 = htmlspecialchars($_POST['order-type4']);

            $db = new DB();
            $db->query('INSERT INTO `ww_customer_order`(`customer_id`, `provider_id`, `order_type1`, `order_type2`, `order_type3`, `order_type4`, `order_date`, `order_status`) VALUES(:customer_id, :provider_id, :order_type1, :order_type2, :order_type3, :order_type4, now(), 1)');
            $db->bind(':customer_id', $customer_id);
            $db->bind(':provider_id', $provider_id);
            $db->bind(':order_type1', $order_type1);
            $db->bind(':order_type2', $order_type2);
            $db->bind(':order_type3', $order_type3);
            $db->bind(':order_type4', $order_type4);
            $exeRes = $db->execute();
            if ($exeRes) {
                echo 'Your Order has been placed Successfully!!';
                $db->terminate();
            }

        } else {
            echo 'Name, email and Message Field Can\'t be empty';
        }
    }
}
