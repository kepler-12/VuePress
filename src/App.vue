<template>
  <div class="app" id="app">
    <app-header />
    <!-- component matched by the route will render here -->
    <router-view class="main"></router-view>
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

<style lang="scss">
body,
html {
  color: #616161;
  margin: 0;
  padding: 0;
  font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", "Roboto", "Helvetica Neue", Arial, sans-serif;
}

*,
*:before,
*:after {
  box-sizing: border-box;
}

.app {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  justify-content: space-between;
}

.main {
  flex-grow: 1;
  padding: 1em;
}
</style>
