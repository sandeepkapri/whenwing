<section class="form-sec">
    <h1>Provider Password Recovery</h1>
<?php
function sendPwdResetLink($receiverEmail, $hashVal)
{
    $to = $receiverEmail;
    $subject = "Email Verification";

    $message = '<p>Verify Your Email by clicking the link below.</p>
  <a href="https://whenwing.com/provider-password-verification/hash/' . $hashVal . '">Verify Your Account</a>
  ';
    $headers = 'MIME-Version: 1.0' . PHP_EOL;
    $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . PHP_EOL;
    $headers .= 'From: <no-reply@whenwing.com>' . PHP_EOL;

    mail($to, $subject, $message, $headers);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cust-email']) && !empty($_POST['cust-email'])) {
        $email_id = htmlspecialchars($_POST['cust-email']);
        $db = new DB();
        $db->query('SELECT  `prov_id`, `is_active`  from  `ww_provider` WHERE  `email_id` = :email');
        $db->bind(':email', $email_id);
        $exeRes = $db->single();
        if ($exeRes) {
            if ($exeRes['is_active'] != 0) {
                $md5Hash = md5(uniqid(rand(), true));
                $db->query('INSERT INTO `prov_forgot_pwd_token` (`provider_id`, `reset_token`, `date_created`) VALUES (:customer_id, :reset_token, now() )');
                $db->bind(':customer_id', $exeRes['prov_id']);
                $db->bind(':reset_token', $md5Hash);
                $exeResult = $db->execute();
                if ($exeResult) {
                    sendPwdResetLink($email_id, $md5Hash);
                    echo ' <p>A link has been sent to your email.</p>';
                }
            } else {
                echo '<p>This account is not active. <br>Activate it by clicking on the link sent to your email.</p>';
            }
        } else {
            echo '<p>No account is associated with this E-mail.</p>
                    <p> <a href="/become-a-provider">Create New Account</a></p>';
        }
    }
} else {
    echo '<p>Something Went Wrong.</p>';
}

?>
</section>
