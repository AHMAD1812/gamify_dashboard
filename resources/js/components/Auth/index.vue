<template>
  <div class="sign_in_up_bg">
      <FullScreenLoader :active="loading"></FullScreenLoader>
      <div class="container">
        <div class="row justify-content-lg-center justify-content-md-center">
          <Header></Header>
          <div class="col-lg-6 col-md-8">
            <SignInComponent v-if="$route.name=='Login'" @toggle-loader="toggleLoader"></SignInComponent>
            <SignUpComponent v-if="$route.name=='Register'" @toggle-loader="toggleLoader"></SignUpComponent>
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
    data(){
      return {
        loading:false,
      }
    },
    mounted(){
        $('.ui.checkbox').checkbox();
    },
    methods:{
      toggleLoader(){
        this.loading=!this.loading;
      }
    }
}
</script>

<style>

</style>