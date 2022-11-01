<template>
  <div class="sign_in_up_bg">
      <div class="container">
        <div class="row justify-content-lg-center justify-content-md-center">
          <Header></Header>
          <div class="col-lg-6 col-md-8">
            <SignInComponent v-if="$route.name=='Login'"></SignInComponent>
            <SignUpComponent v-if="$route.name=='Register'"></SignUpComponent>
            <ForgotPassword v-if="$route.name=='ForgotPassword'"></ForgotPassword>
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

export default {
    name:"Auth",
    components:{
        SignInComponent,
        SignUpComponent,
        ForgotPassword,
        Header,
        Footer,
    },
    mounted(){
        $('.ui.checkbox').checkbox();
    }
}
</script>

<style>

</style>