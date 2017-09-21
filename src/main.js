import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'
import routes from './util/routes.js'
import io from 'socket.io-client';

// For testing the word press rest api!
// Remove when confident.
import axios from "axios"
window.axios = axios;

Vue.use(VueRouter)

//Add the socket instance to the VUE
Vue.prototype.$socket = io('http://localhost:3020');

const router = new VueRouter({
  mode: 'history',
  base: __dirname, // eslint-disable-line
  routes
});

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
