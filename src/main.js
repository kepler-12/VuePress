import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'
import routes from './util/routes.js'

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  base: __dirname, // eslint-disable-line
  routes
});

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
