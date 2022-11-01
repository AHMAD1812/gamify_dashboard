<template>
    <span>
        <Body v-if="
                $route.name != 'Login' &&
                $route.name != 'Register' &&
                $route.name != 'ForgotPassword'
            "></Body>
        <Auth v-if="
                $route.name == 'Login' ||
                $route.name == 'Register' ||
                $route.name == 'ForgotPassword'
            "></Auth>
    </span>
</template>

<script>
import Body from './components/layouts/BodyComponent.vue';
import Auth from './components/Auth/index.vue';
export default {
    name:"App",
    components:{
        Body,
        Auth,
    }
}
</script>

<style>

</style>