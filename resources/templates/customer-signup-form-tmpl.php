<section class="form-sec">
    <form id="cust-signup-form" action="/handlers/formhandle/cust-signup/" method="POST">
        <div>
            <p class="form-title"><span>Create New Account</span></p>
            <div>
                <span class="input-title">Full Name</span>
                <span class="error error-name"></span>
            </div>
			<input type="text" name="cust-name" class="inp-text-1">
            <div>
                <span class="input-title">Email</span>
                <span class="error error-email"></span>
            </div>
            <input type="text" name="cust-email" class="inp-text-1">
            <div>
                <span class="input-title">Mobile</span>
                <span class="cust-otp">Get OTP</span>
                <span class="error error-mobile"></span>
            </div>
			<input type="text" name="cust-mobile" class="inp-text-1">
			<div>
                <span class="input-title">Password</span>
                <span class="error error-password"></span>
            </div>
			<input type="Password" name="cust-password" class="inp-text-1">
      <div>
          <span class="input-title">OTP</span>
          <span class="error error-cust-otp"></span>
      </div>
      <input type="text" name="cust-otp" class="inp-text-1">
            <div class="error center cust-signup-error"></div>
            <div class="btn cust-signup-btn">Sign Up</div>
            <div class="acc-link"><a href="/login">Already have an account? Sign In</a></div>
        </div>
    </form>
</section>
