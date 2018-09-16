<section id="order-booking">
  <?php
if (isset($_SESSION['customerlogin'])) {
    if (isset($post_get_v2)) {
        $db = new DB();
        $customer_id = $_SESSION['customerlogin'];
        $provider_id = htmlspecialchars($post_get_v2);
        $order_hash = $md5Hash = md5(uniqid(rand(), true));
        if ($_SESSION['ord_category1'] == 'transport') {
            $db->query('INSERT INTO `ww_customer_order`(`order_hash`, `customer_id`, `provider_id`, `ord_category1`, `ord_category2`,`order_type1`, `order_type2`, `order_type3`, `order_type4`, `order_date`, `order_status`) VALUES(:order_hash, :customer_id, :provider_id, :ord_category1, :ord_category2, :order_type1, :order_type2, :order_type3, :order_type4, now(), 1)');
            $db->bind(':order_hash', $order_hash);
            $db->bind(':customer_id', $customer_id);
            $db->bind(':provider_id', $provider_id);
            $db->bind(':ord_category1', $_SESSION['ord_category1']);
            $db->bind(':ord_category2', $_SESSION['ord_category2']);
            $db->bind(':order_type1', $_SESSION['orderType1']);
            $db->bind(':order_type2', $_SESSION['orderType2']);
            $db->bind(':order_type3', $_SESSION['orderType3']);
            $db->bind(':order_type4', $_SESSION['orderType4']);
            $exeRes = $db->execute();

            $db->query('INSERT INTO `ww_cust_order_ext`(`order_hash`, `order_type5`, `order_type6`) VALUES (:order_hash, :order_type5, :order_type6)');
            $db->bind(':order_hash', $order_hash);
            $db->bind(':order_type5', $_SESSION['orderType5']);
            $db->bind(':order_type6', $_SESSION['orderType6']);
            $exeRes = $db->execute();
        } else {
            $db->query('INSERT INTO `ww_customer_order`(`order_hash`, `customer_id`, `provider_id`, `ord_category1`, `ord_category2`,`order_type1`, `order_type2`, `order_type3`, `order_type4`, `order_date`, `order_status`) VALUES(:order_hash, :customer_id, :provider_id, :ord_category1, :ord_category2, :order_type1, :order_type2, :order_type3, :order_type4, now(), 1)');
            $db->bind(':order_hash', $order_hash);
            $db->bind(':customer_id', $customer_id);
            $db->bind(':provider_id', $provider_id);
            $db->bind(':ord_category1', $_SESSION['ord_category1']);
            $db->bind(':ord_category2', $_SESSION['ord_category2']);
            $db->bind(':order_type1', $_SESSION['orderType1']);
            $db->bind(':order_type2', $_SESSION['orderType2']);
            $db->bind(':order_type3', $_SESSION['orderType3']);
            $db->bind(':order_type4', $_SESSION['orderType4']);
            $exeRes = $db->execute();
        }

        if ($exeRes) {
            echo '<h1>Order Successful</h1>
                <p>Thanks For Using WhenWing Services.</p>';
            $db->terminate();
        }
    } else {
        echo 'Something Went Wrong!!';

    }
} else {
    header('Location: /login');
}
?>
</section>
