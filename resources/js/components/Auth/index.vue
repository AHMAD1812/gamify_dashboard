<template>
  <div class="sign_in_up_bg">
      <div class="container">
        <div class="row justify-content-lg-center justify-content-md-center">
          <Header></Header>
          <div class="col-lg-6 col-md-8">
            <SignInComponent v-if="$route.name=='Login'"></SignInComponent>
            <SignUpComponent v-if="$route.name=='Register'"></SignUpComponent>
            <ForgotPassword v-if="$route.name=='ForgotPassword'"></ForgotPassword>
            <OtpVerification v-if="$route.name=='OtpVerification'"></OtpVerification>
            <Footer></Footer>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import SignInComponent from './layouts/SignInComponent.vue';
import SignUpComponent from './layouts/SignUpComponent.vue';
import ForgotPassword from './layouts/ForgotPassword.vue';
import Header from './components/HeaderComponent.vue';
import Footer from './components/FooterComponent.vue';
import OtpVerification from './layouts/OtpVerification.vue';

export default {
    name:"Auth",
    components:{
        SignInComponent,
        SignUpComponent,
        ForgotPassword,
        Header,
        Footer,
        OtpVerification,
    },
    async mounted(){
        $('.ui.checkbox').checkbox();
        try {
            this.$store.dispatch('toggleLoader',true);
            let response = await axios.get(`${globalBaseUrl}instructor/is_user_login`);
            this.$store.dispatch('toggleLoader',false);
            if(response.data.status==200){
                this.$router.push({
                    name: "Dashboard",
                });
            }
        } catch (error) {
            this.$store.dispatch('toggleLoader',false);
            console.log(error);
            Vue.$toast.open({
              message:'Something Went Wrong',
              type: "error",
              position: "top-right",
            });
        }
    }
}
</script>

<style>

</style>