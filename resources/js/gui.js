import Vue from 'vue'
import App from "./App";
import axios from "axios";

Vue.component('app', App);

Vue.use(function (vue, options) {
    vue.prototype.$axios = axios;
});

new Vue({
    el: '#app',
})