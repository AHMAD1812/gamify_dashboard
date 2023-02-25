<template>
  <div class="text-center">
    <img :src="`${globalBaseUrl}files/no-found.png`"/>
    <div class="mb-20" style="font-size: 20px;">{{ message }}</div>
  </div>
</template>

<script>
export default {
    name:'UnavailableData',
    props:['message']
}
</script>

<style>

</style>