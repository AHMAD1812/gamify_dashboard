<template>
    <div class="row justify-content-lg-center justify-content-md-center">
        <div class="col-lg-12">
            <div class="main_logo25" id="logo">
                <a href="index.html"
                    ><img src="images/gamify.png" alt="" width="150"
                /></a>
                <a href="index.html"
                    ><img
                        class="logo-inverse"
                        src="images/gamifyfavv.png"
                        alt=""
                /></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-8">
            <div class="sign_form">
                <h2>Welcome to Gamify</h2>
                <p>Sign Up and Start Learning!</p>
                <form>
                    <div class="ui search focus">
                        <div class="ui left icon input swdh11 swdh19">
                            <input
                                class="prompt srch_explore"
                                type="text"
                                name="fullname"
                                value=""
                                id="id_fullname"
                                required=""
                                maxlength="64"
                                placeholder="Full Name"
                            />
                        </div>
                    </div>
                    <div class="ui search focus mt-15">
                        <div class="ui left icon input swdh11 swdh19">
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
                        </div>
                    </div>
                    <div class="ui search focus mt-15">
                        <div class="ui left icon input swdh11 swdh19">
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
                        </div>
                    </div>
                    <div class="ui form mt-30 checkbox_sign">
                        <div class="inline field">
                            <div class="ui checkbox mncheck">
                                <input
                                    type="checkbox"
                                    tabindex="0"
                                    class="hidden"
                                />
                                <label
                                    >I’m in for emails with exciting discounts
                                    and personalized recommendations</label
                                >
                            </div>
                        </div>
                    </div>
                    <a href="sign_up_steps.html"
                        ><button class="login-btn" type="button">
                            Next
                        </button></a
                    >
                </form>
                <p class="sgntrm145">
                    By signing up, you agree to our
                    <a href="terms_of_use.html">Terms of Use</a> and
                    <a href="terms_of_use.html">Privacy Policy</a>.
                </p>
                <p class="mb-0 mt-30">
                    Already have an account? <a href="sign_in.html">Log In</a>
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
    name:"SignUpComponent",
    mounted(){
        $('.ui.checkbox').checkbox();
    }
};
</script>

<style></style>
