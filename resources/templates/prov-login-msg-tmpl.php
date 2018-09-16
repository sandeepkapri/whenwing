<section class="form-sec">
    <h1>Provider Login</h1>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cust-email']) && isset($_POST['cust-password'])) {
        if (!empty($_POST['cust-email']) && !empty($_POST['cust-password'])) {
            $custEmail = htmlspecialchars($_POST['cust-email']);
            $custPassword = htmlspecialchars($_POST['cust-password']);
            $db = new DB();
            $db->query('SELECT  `prov_id`, `pwd`,`is_active`  from  `ww_provider` WHERE  `email_id` = :email_id AND `is_active` = 1');
            $db->bind(':email_id', $custEmail);
            $exeRes = $db->single();
            if (password_verify($custPassword, $exeRes['pwd'])) {
                if ($exeRes['is_active'] == 1) {
                    $_SESSION['providerlogin'] = $exeRes['prov_id'];
                    header('Location: /provider-profile');
                    $db->terminate();
                } else {
                    $customerLoginErr = "Account is Inactive.";
                }
            } else {
                $customerLoginErr = "Incorrect Credentials.";
            }

        } else {
            $customerLoginErr = 'Name, email and Message Field Can\'t be empty';
        }
    }
}
?>
</section>
