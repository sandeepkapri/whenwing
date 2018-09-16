<section id="reg-successful">
<?php
if (isset($hash_id)) { //hash id is parameter 3 in url defined in index.php
    $db = new DB();
    $db->query('SELECT  `id`,`active_status`  from  `ww_customers` WHERE  `cust_hash` = :cust_hash');
    $db->bind(':cust_hash', $hash_id);
    $exeRes = $db->single();
    if ($exeRes) {
        if ($exeRes['active_status'] == 0) {
            $db->query('UPDATE `ww_customers` SET `active_status`= 1  WHERE `cust_hash` = :cust_hash');
            $db->bind(':cust_hash', $hash_id);
            $exeRes = $db->execute();
            if ($exeRes) {
                echo '<h1>Verification Successful</h1>';
                $db->terminate();
            }
        } else {
            echo '<h1 class="fs-md">User is active or Link is broken.</h1>';
        }
    } else {
        echo '<h1>Something went wrong.</h1>';
    }
} else {
    echo '<h1>Something went wrong.</h1>';
}

?>
    <p>Go to <a href="/login">login</a> Page </p>
</section>