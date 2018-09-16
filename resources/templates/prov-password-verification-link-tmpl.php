<section class="form-sec">
    <form id="cust-reset-pwd-form" action="/prov-password-reset-message/" method="POST">
        <div>
            <p class="form-title">Provider Password Recovery</p>
            <p>(Password must be 6 - 20 digit, should have a number and a special character.)</p>
            <div>
                <span class="input-title">Enter New Password </span>
                <span class="error error-pwd"></span>
            </div>
            <input type="password" name="cust-password" class="inp-text-1" required>
            <div>
                <span class="input-title">Confirm New Password</span>
                <span class="error error-cnf-pwd"></span>
            </div>
            <input type="password" name="cust-cnf-password" class="inp-text-1" required>
            <input type="hidden" name="cust-hash-key" value="<?php if (isset($hash_id)) {
    echo $hash_id;
}
?>">
            <div class="btn cust-reset-pwd-btn">Submit</div>
        </div>
    </form>
</section>
