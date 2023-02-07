<template>
  <scale-loader :loading="loading" :color="color" size="30px"></scale-loader>
</template>

<script>
import ScaleLoader from 'vue-spinner/src/ScaleLoader.vue';
export default {
    name:"SpinnerLoader",
    components: {
      ScaleLoader
    },
    props:['color','loading'],
}
</script>

<style>

</style>