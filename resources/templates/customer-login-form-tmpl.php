<section class="form-sec">
    <form id="cust-login-form"  method="POST">
        <div>
            <p class="form-title"><span>Customer</span> Login</p>
            <div class="error center">
                <?php if (isset($customerLoginErr)) {
    echo $customerLoginErr;
}
?>
            </div>
            <div>
                <span class="input-title">Email</span>
                <span class="error error-email"></span>
            </div>
            <input type="text" name="cust-email" class="inp-text-1">
            <div>
			    <span class="input-title">Password</span>
                <span class="error error-password"></span>
            </div>
            <input type="Password" name="cust-password" class="inp-text-1">
            <a href="/forgot-password" class="forgot-password">Forgot Password?</a>
            <div class="error center cust-signin-error"></div>
            <div class="btn cust-login-btn">Sign in</div>
            <div class="acc-link"><a href="/sign-up">Dont have an account? Create New Account</a></div>
        </div>
    </form>
</section>
