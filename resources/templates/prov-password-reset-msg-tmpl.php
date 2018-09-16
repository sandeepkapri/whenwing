<section class="form-sec">
    <h1>Provider Password Reset</h1>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cust-password']) && !empty($_POST['cust-password'])) {
        $db = new DB();
        $hash_id = htmlspecialchars($_POST['cust-hash-key']);
        $db->query('SELECT  `provider_id`  from  `prov_forgot_pwd_token` WHERE  `reset_token` = :reset_token');
        $db->bind(':reset_token', $hash_id);

        $exeRes = $db->single();
        if ($exeRes) {
            $providerPwd = htmlspecialchars($_POST['cust-password']);
            $providerPwd = password_hash($providerPwd, PASSWORD_BCRYPT);
            $db->query('UPDATE `ww_providers` SET `pwd`= :prov_password WHERE `prov_id` = :id');
            $db->bind(':prov_password', $providerPwd);
            $db->bind(':id', $exeRes['provider_id']);
            $exeResult = $db->execute();
            if ($exeResult) {
                echo ' <p>Your Password has been updated Successfully.</p>';
            }
        } else {
            echo '<p>Invalid Identity.</p>';
        }
    }
} else {
    echo '<p>Something Went Wrong.</p>';
}

?>
</section>
