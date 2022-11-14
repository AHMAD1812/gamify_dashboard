<template>
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
            <div class="ui form mt-15 checkbox_sign">
                <div class="inline field">
                    <div class="ui checkbox mncheck">
                        <input type="checkbox" tabindex="0" class="hidden" />
                        <label>Remember Me</label>
                    </div>
                </div>
            </div>
            <router-link :to="{ name: 'Dashboard' }"
                ><button class="login-btn mt-3" type="button">
                    Sign In
                </button></router-link
            >
        </form>
        <p class="sgntrm145">
            Or <router-link :to="{ name: 'ForgotPassword' }"
                >Forgot Password</router-link>.
        </p>
        <p class="mb-0 mt-20 hvsng145">
            Don't have an account? <router-link :to="{ name: 'Register' }">Sign Up</router-link>
        </p>
    </div>
</template>

<script>
export default {
    name: "SignInComponent",
    mounted() {
        $(".ui.checkbox").checkbox();
    },
};
</script>

<style></style>
