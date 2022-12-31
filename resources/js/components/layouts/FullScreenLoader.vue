<template>
    <vue-element-loading :active="active" spinner="line-wave" color="#3454b4" :is-full-screen="true"/>
  </template>
  
  <script>
  import VueElementLoading from "vue-element-loading";
  
  export default {
      name:"FullScreenLoader",
      props:{
          active: {
              type: Boolean,
              default: true // or set true
          }
      },
      components: {
          VueElementLoading
      }
  };
  </script>
  
  <style>
  
  </style>