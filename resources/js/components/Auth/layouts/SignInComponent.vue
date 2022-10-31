<template>
  <div class="row justify-content-lg-center justify-content-md-center">
          <div class="col-lg-12">
            <div class="main_logo25" id="logo">
              <a href="index.html"
                ><img src="images/gamify.png" alt="" width="150"
              /></a>
              <a href="index.html"
                ><img class="logo-inverse" src="images/gamifyfavv.png" alt=""
              /></a>
            </div>
          </div>
          <div class="col-lg-6 col-md-8">
            <div class="sign_form">
              <h2>Welcome Back</h2>
              <p>Log In to Your Gamify Account!</p>
              <form>
                <div class="ui search focus mt-15">
                  <div class="ui left icon input swdh95">
                    <input
                      class="prompt srch_explore"
                      type="email"
                      name="emailaddress"
                      value=""
                      id="id_email"
                      required=""
                      maxlength="64"
                      placeholder="Email Address"
                    />
                    <i class="uil uil-envelope icon icon2"></i>
                  </div>
                </div>
                <div class="ui search focus mt-15">
                  <div class="ui left icon input swdh95">
                    <input
                      class="prompt srch_explore"
                      type="password"
                      name="password"
                      value=""
                      id="id_password"
                      required=""
                      maxlength="64"
                      placeholder="Password"
                    />
                    <i class="uil uil-key-skeleton-alt icon icon2"></i>
                  </div>
                </div>
                <div class="ui form mt-30 checkbox_sign">
                  <div class="inline field">
                    <div class="ui checkbox mncheck">
                      <input type="checkbox" tabindex="0" class="hidden" />
                      <label>Remember Me</label>
                    </div>
                  </div>
                </div>
                <a href="instructor_dashboard.html"><button class="login-btn" type="button">Sign In</button></a>
              </form>
              <p class="sgntrm145">
                Or <a href="forgot_password.html">Forgot Password</a>.
              </p>
              <p class="mb-0 mt-30 hvsng145">
                Don't have an account? <a href="sign_up.html">Sign Up</a>
              </p>
            </div>
            <div class="sign_footer">
              <img src="images/gamifyfavv.png" alt="" />© 2022
              <strong>Gamify</strong>. All Rights Reserved.
            </div>
          </div>
        </div>
</template>

<script>
export default {
    name:"SignInComponent",
    mounted(){
        $('.ui.checkbox').checkbox();
    }
}
</script>

<style>

</style>