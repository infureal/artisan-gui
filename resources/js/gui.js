import Vue from 'vue'
import App from "./App";
import axios from "axios";

Vue.component('app', App);

Vue.use(function (vue, options) {
    vue.prototype.$axios = axios;
});

Vue.directive('click-outside', {
    bind(el, binding, vnode) {
        el.clickOutsideEvent = (event) => {
            if (!(el === event.target || el.contains(event.target))) {
                vnode.context[binding.expression](event);
            }
        };
        document.body.addEventListener('click', el.clickOutsideEvent);
    },
    unbind(el) {
        document.body.removeEventListener('click', el.clickOutsideEvent);
    },
});

new Vue({
    el: '#app',
})