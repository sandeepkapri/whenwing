<section class="form-sec">
<p class="form-title"><span>Service Provider</span> Signup/Login</p>
<div class="switch-form"><p class="provider-tab active-f-tab">Become a Provider</p><p class="login-tab">Login</p></div>
<form id="provider-signup-form" action="/registration-provider-submit" method="POST" enctype="multipart/form-data">
        <div class="signup-1">
            <div>
                <span class="input-title">Full Name</span>
                <span class="error error-prov-name"></span>
            </div>
            <input type="text" name="prov-name" class="inp-text-1">
            <div>
                <span class="input-title">Mobile Number</span>
                <span class="otp">Get OTP</span>
                <span class="error error-prov-contact"></span>
            </div>
            <input type="text" name="prov-contact"  class="inp-text-1">
            <div>
                <span class="input-title">OTP</span>
                <span class="error error-prov-otp"></span>
            </div>
            <input type="text" name="prov-otp" class="inp-text-1">
            <span class="error error-prov-cnext center"></span>
            <div class="btn signup-next-btn">Next</div>
        </div>
        <div class="signup-2">
            <span class="input-title-1">Personal Details</span>
            <div>
                <span class="input-title">Email</span>
                <span class="error error-prov-email"></span>
            </div>
            <input type="text" name="prov-email" class="inp-text-1">
            <div>
			    <span class="input-title">Password</span>
                <span class="error error-password"></span>
            </div>
            <input type="Password" name="prov-password" class="inp-text-1">
            <div>
			    <span class="input-title">Confirm Password</span>
                <span class="error error-cnf-password"></span>
            </div>
            <input type="Password" name="prov-cnf-password" class="inp-text-1">
            <div>
                <span class="input-title">Date of Birth</span>
                <span class="error error-prov-dob"></span>
            </div>
            <input type="date" name="prov-dob" class="inp-text-1">
            <div>
                <span class="input-title">Gender</span>
                <span class="error error-prov-gender"></span>
            </div>
            <select class="inp-text-1 inp-sel" name="prov-gender">
                <option value="" disabled selected>Choose Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
            </select>

            <div>
                <span class="input-title">Address</span>
                <span class="error error-prov-addr"></span>
            </div>
            <input type="text" name="prov-addr" class="inp-text-1">

            <div>
                <span class="input-title">Pincode</span>
                <span class="error error-prov-pin"></span>
            </div>
            <input type="text" name="prov-pin" class="inp-text-1">

            <div>
                <span class="input-title">State</span>
                <span class="error error-prov-state"></span>
            </div>
            <select class="inp-text-1 inp-sel" name="prov-state">
                <option value="" disabled selected>Choose Your State</option>
                <option>Delhi NCR</option>
                <option>Andhra Pradesh</option>
                <option>Arunachal Pradesh</option>
                <option>Assam</option>
                <option>Bihar</option>
                <option>Chhattisgarh</option>
                <option>Goa</option>
                <option>Gujarat</option>
                <option>Haryana</option>
                <option>Himachal Pradesh</option>
                <option>Jammu and Kashmir</option>
                <option>Jharkhand</option>
                <option>Karnataka</option>
                <option>Kerala</option>
                <option>Madhya Pradesh</option>
                <option>Maharashtra</option>
                <option>Manipur</option>
                <option>Meghalaya</option>
                <option>Mizoram</option>
                <option>Nagaland</option>
                <option>Odisha</option>
                <option>Punjab</option>
                <option>Rajasthan</option>
                <option>Sikkim</option>
                <option>Tamil Nadu</option>
                <option>Telangana</option>
                <option>Tripura</option>
                <option>Uttar Pradesh</option>
                <option>Uttarakhand</option>
                <option>West Bengal</option>
            </select>
            <span class="input-title-1">Service Details</span>
            <div>
                <span class="input-title">Field</span>
                <span class="error error-prov-field"></span>
            </div>
            <select class="inp-text-1 inp-sel" name="prov-field">
                <option disabled selected>Choose Your Field</option>
                <option >Home Services</option>
        		<option >Appliance Repair</option>
        		<option >Transport</option>
        		<option >Personal Services</option>
        		<option >Showroom</option>
        		<option >Education</option>
        		<option >Wedding/Party</option>
            </select>
            <!--Hidden Fields for Transport -->
            <div class="transport hidden">
                <div>
                    <span class="input-title">Vehicle Type</span>
                    <span class="error error-provh-vehicle"></span>
                </div>
                <select class="inp-text-1 inp-sel" name="provh-vehicle">
                    <option disabled selected>Choose Your Vehicle</option>
                    <option >Car</option>
                    <option >Bike</option>
                    <option >Auto</option>
                    <option >Scooty</option>
                </select>
                <div>
                    <span class="input-title">Licence/Permit</span>
                    <span class="error error-provh-license"></span>
                </div>
                <input type="text" name="provh-license" class="inp-text-1">
                <div>
                    <span class="input-title">Upload License Photo(Max 4 MB)</span>
                    <span class="error error-provh-lic-photo"></span>
                </div>
                <input type="file" name="provh-lic-photo" class="inp-file">
            </div>
            <!-- End Hidden Fields for Transport -->

            <!--Hidden Fields for Education -->
            <div class="education hidden">
                <div>
                    <span class="input-title">About your Degree/Diploma</span>
                    <span class="error error-provh-degree"></span>
                </div>
                <input type="text" name="provh-degree" class="inp-text-1">
                <div>
                    <span class="input-title">Method </span>
                    <span class="error error-provh-method"></span>
                </div>
                <select class="inp-text-1 inp-sel" name="provh-method">
                    <option disabled selected>Choose Your Method</option>
                    <option >Webcam</option>
                    <option >Notes</option>
                    <option >Meeting</option>
                    <option >Video</option>
                    <option >All</option>
                </select>
                <div>
                    <span class="input-title">Upload Degree Photo(Max 4 MB)</span>
                    <span class="error error-provh-deg-img"></span>
                </div>
                <input type="file" name="provh-deg-img" class="inp-file">
            </div>
            <!-- End Hidden Fields for Education -->
            <div>
                <span class="input-title">Service</span>
                <span class="error error-prov-service"></span>
            </div>
            <select class="inp-text-1 inp-sel" name="prov-service">
                <option value="" disabled selected>Choose Your Service</option>
            </select>
            <div>
			    <span class="input-title">Specialities</span>
                <span class="error error-speciality"></span>
            </div>
            <input type="text" name="prov-speciality" class="inp-text-1">
            <div>
                <span class="input-title">Work Experience</span>
                <span class="error error-prov-workexp"></span>
            </div>
            <select class="inp-text-1 inp-sel" name="prov-workexp">
                <option value="" disabled selected>Choose Your Experience</option>
                <option>Fresher</option>
                <option>1 Year</option>
                <option>2 Year</option>
                <option>3 Year</option>
                <option>4 Year</option>
                <option>5 Year</option>
                <option>6 Year</option>
                <option>7 Year</option>
                <option>8 Year</option>
                <option>9 Year</option>
                <option>10 Year</option>
                <option>10+ Year</option>
            </select>
            <div>
                <span class="input-title">Previous Record</span>
                <span class="error error-prov-record"></span>
            </div>
            <textarea class="inp-text-1" name="prov-record"></textarea>
            <div>
                <span class="input-title">About Yourself and Price details</span>
                <span class="error error-prov-about"></span>
            </div>
            <textarea  class="inp-text-1" name="prov-about"></textarea>

            <span class="input-title-1">Upload Id Proof</span>
            <div>
                <span class="input-title">Front Side(Max 4 MB)</span>
                <span class="error error-prov-front-id"></span>
            </div>
            <input type="file" name="prov-front-id" class="inp-file">
            <div>
                <span class="input-title">Back Side(Max 4 MB)</span>
                <span class="error error-prov-back-id"></span>
            </div>
            <input type="file" name="prov-back-id" class="inp-file">
            <div>
                <div class="error center provider-submit-error"></div>
                <div class="btn signup-prov-btn">Submit</div>
                <div class="btn signup-prev-btn">&larr;</div>
            </div>
        </div>
</form>
<form id="provider-login-form"  method="POST" action="/provider-login-message" class="hidden">
        <div>
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
            <a href="/provider-forgot-password" class="forgot-password">Forgot Password?</a>
            <div class="error center provider-signin-error"></div>
            <div class="btn provider-login-btn">Sign in</div>
            <div class="acc-link"><a href="/become-a-provider">Dont have an account? Create New Account</a></div>
        </div>
    </form>
</section>
