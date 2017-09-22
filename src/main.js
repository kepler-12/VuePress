import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'
import routes from './util/routes.js'
import io from 'socket.io-client';
import axios from "axios"

window.axios = axios;
window.axios.defaults.headers.common['X-WP-Nonce'] =
  document.head.querySelector('meta[name="nonce"]').content

Vue.use(VueRouter)

// Add the socket instance to Vue
Vue.prototype.$socket = io(`http://socket.kepler12.com`);

const router = new VueRouter({
  mode: 'history',
  base: __dirname, // eslint-disable-line
  routes
});

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
