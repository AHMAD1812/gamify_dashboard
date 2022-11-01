<template>
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
        <p class="mb-0 mt-30">Go Back <router-link :to="{name:'Login'}">Log In</router-link></p>
    </div>
</template>

<script>
export default {
    name: "ForgotPassword",
};
</script>

<style></style>
