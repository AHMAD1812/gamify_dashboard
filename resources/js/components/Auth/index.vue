<template>
  <div class="sign_in_up_bg">
      <div class="container">
        <!-- <SignInComponent></SignInComponent> -->
        <!-- <SignUpComponent></SignUpComponent> -->
        <ForgotPassword></ForgotPassword>
      </div>
    </div>
</template>

<script>
import SignInComponent from './layouts/SignInComponent.vue';
import SignUpComponent from './layouts/SignUpComponent.vue';
import ForgotPassword from './layouts/ForgotPassword.vue';
export default {
    name:"Auth",
    components:{
        SignInComponent,
        SignUpComponent,
        ForgotPassword,
    },
    mounted(){
        $('.ui.checkbox').checkbox();
    }
}
</script>

<style>

</style>