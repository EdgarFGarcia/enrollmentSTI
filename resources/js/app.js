// require('./bootstrap');
// imports
import './bootstrap';
import Vue from 'vue';
import axios from 'axios';
import BootstrapVue from 'bootstrap-vue';
import navigation from '../js/navigation/Nav';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import VueToastr from "vue-toastr";

// use
Vue.use(BootstrapVue)
Vue.use(axios)
Vue.use(VueToastr, {
    defaultTimeout: 10000,
    defaultProgressBar: false,
    defaultProgressBarValue: 0,
    defaultType: "success",
    defaultPosition: "toast-top-right",
    defaultCloseOnHover: false,
    // defaultStyle: { "background-color": "green" },
    defaultClassNames: ["animated", "zoomInUp"]
});
// components
Vue.component('navigation', navigation);

import Routes from '../js/routes.js';
import App from '../js/views/App';
import { VERSION } from 'lodash';

const app = new Vue({
    el: '#app',
    router: Routes,
    render: h => h(App),
});