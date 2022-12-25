/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import router from "./Router/index";
import config from "./config";

window.Vue = require('vue').default;

window.globalAssetUrl = config.ASSET_URL;
window.globalBaseUrl = config.SITE_URL;

import VueRouter from "vue-router";
import SuiVue from 'semantic-ui-vue';
import VueTimepicker from 'vue2-timepicker'
// CSS
import 'vue2-timepicker/dist/VueTimepicker.css';
import Axios from "axios";
import VueAxios from "vue-axios";
import VueToast from "vue-toast-notification";
import "vue-toast-notification/dist/theme-sugar.css";

window.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
Vue.prototype.axios = Axios;

Vue.use(VueToast);
Vue.use(SuiVue);
Vue.use(VueRouter);
Vue.use(VueAxios, Axios);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('main-app', require('./App.vue').default);
Vue.component('vue-timepicker', VueTimepicker);
Vue.component('FullScreenLoader',Vue.extend(require('./components/layouts/FullScreenLoader.vue').default),{
    props: {
        active: Boolean,
    }
});

Vue.mixin({
    data: function () {
        return {
            get globalBaseUrl() {
                return config.SITE_URL;
            },
            get globalAssetUrl() {
                return config.ASSET_URL;
            },
        };
    },
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 window.addEventListener("load", function () {
    //your script
    const app = new Vue({
        el: "#app",
        router,
    });
});