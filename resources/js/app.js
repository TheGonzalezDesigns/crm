import Vue from "vue";
import Vuex from 'vuex'
import storeData from "./store/index"

require('./bootstrap');
require('bootstrap-css-only/css/bootstrap.min.css');
require("mdbvue/lib/css/mdb.min.css");
require('@fortawesome/fontawesome-free/css/all.min.css');

Vue.use(Vuex);

const store = new Vuex.Store(
    storeData
)
window.Vue = require('vue').default;

Vue.component('app-component', require('./components/App.vue').default);

const app = new Vue({
    el: '#app',
    store
});
