<section class="form-sec">
    <h1>Password Reset</h1>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cust-password']) && !empty($_POST['cust-password'])) {
        $custPassword = htmlspecialchars($_POST['cust-password']);
        $db = new DB();
        $hash_id = htmlspecialchars($_POST['cust-hash-key']);
        $db->query('SELECT  `customer_id`  from  `forgot_pwd_token` WHERE  `reset_token` = :reset_token');
        $db->bind(':reset_token', $hash_id);

        $exeRes = $db->single();
        if ($exeRes) {
            $customerPwd = htmlspecialchars($_POST['cust-password']);
            $customerPwd = password_hash($customerPwd, PASSWORD_BCRYPT);
            $db->query('UPDATE `ww_customers` SET `cust_password`= :cust_password WHERE `id` = :id');
            $db->bind(':cust_password', $customerPwd);
            $db->bind(':id', $exeRes['customer_id']);
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
