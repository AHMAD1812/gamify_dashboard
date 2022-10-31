<template>
  <span>
    <Header></Header>
    <Sidebar></Sidebar>
    <div class="wrapper">
        <Dashboard></Dashboard>
        <Footer></Footer>
    </div>
  </span>
</template>

<script>
import Header from './HeaderComponent.vue';
import Sidebar from './SidebarComponent.vue';
import Footer from './FooterComponent.vue';
import Dashboard from '../dashboard/index.vue';

export default {
    name:"Body",
    components:{
        Sidebar,
        Header,
        Footer,
        Dashboard,
    }
}
</script>

<style>

</style>