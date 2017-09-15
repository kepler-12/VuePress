<template>
  <div id="app">
    <app-header />
    <!-- component matched by the route will render here -->
    <router-view></router-view>
    <app-footer />
  </div>
</template>

<script>
import AppHeader from './components/AppHeader.vue'
import AppFooter from './components/AppFooter.vue'

export default {
  name: 'app',
  components: {
    AppHeader,
    AppFooter
  }
}
</script>
