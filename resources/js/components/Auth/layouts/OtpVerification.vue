<template>
    <div class="sign_form">
        <h2>Email Verification</h2>
        <form>
            <div class="ui search focus mt-50">
                <div class="ui left icon input swdh95">
                    <input
                        class="prompt srch_explore"
                        type="number"
                        placeholder="OTP"
                        v-model="otp"
                    />
                    <i class="uil uil-comment-alt-verify icon icon2"></i>
                </div>
            </div>
            <button class="login-btn" type="button" @click="otpVerification()">Verify</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "OtpVerification",
    data(){
        return{
            id:-1,
            otp:"",
        }
    },
    mounted(){
        this.id=this.$route.params.id;
        if(typeof this.id == 'undefined'){
            this.$router.push({
                name: "Register",
            });
        } 
    },
    methods:{
        otpVerification(){
            if(this.otp == ""){
                Vue.$toast.open({
                    message: "Otp is required",
                    type: "error",
                    position: "top-right",
                });
                return;
            }
            this.$emit("toggle-loader");
            let formData = new FormData();
            
            formData.append('id', this.id);
            formData.append('otp', this.otp);
            
            axios
                .post(`${globalBaseUrl}instructor/otp_verification`,formData)
                .then((response) => {
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
                    if (response.data.status == 400) {
                        Vue.$toast.open({
                            message: response.data.message,
                            type: "warning",
                            position: "top-right",
                        });
                    }
                    this.$emit("toggle-loader");
                    
                })
                .catch((e) => {
                    this.$emit("toggle-loader");
                    
                    Vue.$toast.open({
                        message: "Something Went Wrong",
                        type: "error",
                        position: "top-right",
                    });
                    console.log(e);
                });
        }
    }
};
</script>

<style></style>
