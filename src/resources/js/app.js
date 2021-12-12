require('./bootstrap');

window.Vue = require('vue');
import App from "./components/App";
import VueRouter from 'vue-router';
import router from "./router";
import toastr from "toastr";

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import store from './store'
import ScrollLoader from 'vue-scroll-loader'
import VuejsDialog from 'vuejs-dialog';
import wysiwyg from "vue-wysiwyg";
import "vue-wysiwyg/dist/vueWysiwyg.css";
import 'vuejs-dialog/dist/vuejs-dialog.min.css';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import '../css/app.css'

Vue.use(wysiwyg, {});
Vue.use(ScrollLoader)
Vue.use(VueRouter);
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(toastr)
Vue.use(VuejsDialog);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: { App },
    store,
    router
});
