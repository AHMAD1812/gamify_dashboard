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
                        v-model="email"
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
                        placeholder="Password"
                        v-model="password"
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
            <!-- <router-link :to="{ name: 'Dashboard' }"> -->
                <button class="login-btn mt-3" type="button" @click="login()">
                    Sign In
                </button>
            <!-- </router-link> -->
        </form>
        <p class="sgntrm145">
            or <router-link :to="{ name: 'ForgotPassword' }"
                >Forgot Password</router-link>.
        </p>
        <p class="mb-0 mt-10 hvsng145">
            or login with
        </p>
        <div class="social-auth">
            <img :src="`${globalBaseUrl}images/facebook.png`" class="social-img"/>
            <img :src="`${globalBaseUrl}images/google.png`" class="social-img"/>
        </div>
        <p class="mb-0 mt-20 hvsng145">
            Don't have an account? <router-link :to="{ name: 'Register' }">Sign Up</router-link>
        </p>
    </div>
</template>

<script>
export default {
    name: "SignInComponent",
    data(){
        return{
            email:'',
            password:'',
        }
    },
    mounted() {
        $(".ui.checkbox").checkbox();
    },
    methods:{
        login(){
            if(this.validateData()){
                this.$store.dispatch('toggleLoader',true);
                let formData = new FormData();
                formData.append('email', this.email);
                formData.append('password', this.password);
                axios
                    .post(globalBaseUrl+"instructor/login_process",formData)
                    .then((response) => {
                        this.$store.dispatch('toggleLoader',false);
                        if (response.data.status == 200) {
                            Vue.$toast.open({
                                message: response.data.message,
                                type: "success",
                                position: "top-right",
                            });
                            this.$router.push({
                                name: "Dashboard",
                            });
                        }
                        if (response.data.status == 320) {
                            Vue.$toast.open({
                                message: response.data.message,
                                type: "warning",
                                position: "top-right",
                            });
                            this.$router.push({
                                name: "OtpVerification",
                                params: {
                                    id: response.data.data,
                                },
                            });
                        }
                        if (response.data.status == 400) {
                            Vue.$toast.open({
                                message: response.data.message,
                                type: "warning",
                                position: "top-right",
                            });
                        }
                    })
                    .catch((e) => {
                        this.$store.dispatch('toggleLoader',false);
                        Vue.$toast.open({
                            message: "Something Went Wrong",
                            type: "error",
                            position: "top-right",
                        });
                        console.log(e);
                    });
            }
        },
        validateData(){
            if(this.email == ""){
                this.errorToast("Email is required");
                return false;
            }else if(this.password == ""){
                this.errorToast("Password are required");
                return false;
            }
            return true;
        },
        errorToast(message) {
            Vue.$toast.open({
                message: message,
                type: "error",
                position: "top-right",
            });
        },
    }
};
</script>

<style></style>
