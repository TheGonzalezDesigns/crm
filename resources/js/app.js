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

// Vue.mixin({
//     methods: {
//         fetchTasks: function(id) {
//             fetch(`api/tasks/${id}`)
//                 .then((res) => res.json())
//                 .then((data) => {
//                     this.$store.commit("tasks", data.data);
//                 })
//                 .catch((err) => console.error(err));
//         },
//     }
// });

// const Tasks = {
//     install(Vue, options) {
//         Vue.prototype.fetchTasks = (id) => {
//             fetch(`api/tasks/${id}`)
//                 .then((res) => res.json())
//                 .then((data) => {
//                     this.$store.commit("tasks", data.data);
//                 })
//                 .catch((err) => console.error(err));
//         }
//     }
// }
//
// Vue.use(Tasks);

const app = new Vue({
    el: '#app',
    store,
    // methods: {
    //     fetchTasks(id) {
    //         fetch(`api/tasks/${id}`)
    //             .then((res) => res.json())
    //             .then((data) => {
    //                 this.$store.commit("tasks", data.data);
    //             })
    //             .catch((err) => console.error(err));
    //     }
    // } // Experimental
});
