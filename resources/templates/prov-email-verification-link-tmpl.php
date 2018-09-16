<section id="reg-successful">
<?php
if (isset($hash_id)) { //hash id is parameter 3 in url defined in index.php
    $db = new DB();
    $db->query('SELECT  `prov_id`,`is_active`  from  `ww_provider` WHERE  `prov_hash` = :prov_hash');
    $db->bind(':prov_hash', $hash_id);
    $exeRes = $db->single();
    if ($exeRes) {
        if ($exeRes['is_active'] == 0) {
            $db->query('UPDATE `ww_provider` SET `is_active`= 1  WHERE `prov_hash` = :prov_hash');
            $db->bind(':prov_hash', $hash_id);
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
    <p>Go to <a href="/provider-login">login</a> Page </p>
</section>
