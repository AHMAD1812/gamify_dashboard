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
            <h2>Request a Password Reset</h2>
            <form>
              <div class="ui search focus mt-50">
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
              <button class="login-btn" type="submit">Reset Password</button>
            </form>
            <p class="mb-0 mt-30">Go Back <a href="sign_up.html">Sign In</a></p>
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
    name:"ForgotPassword",
}
</script>

<style>

</style>