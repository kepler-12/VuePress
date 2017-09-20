<template>
  <div
    class="app"
    id="app"
  >
    <app-header :user="user" />

    <div class="wrap">

      <!-- component matched by the route will render here -->
      <!-- <transition name="fade" appear> -->
      <router-view
        :user="user"
        :key="$route.fullPath"
      ></router-view>
        <!-- </transition> -->

        <app-footer />

    </div>

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
  },
  data() {
    return {
      user: {
        name: 'Zack Krida',
        email: 'zackwcote@gmail.com'
      }
    }
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
}

.wrap {
  height: 100vh;
  displaY: flex;
  flex-direction: column;
  width: calc(100% - 200px);
}

.main {
  flex-grow: 1;
  position: relative;
  overflow: hidden;
  height: 100vh;
  display: flex;
  flex-direction: column;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity .5s
}

.fade-enter,
.fade-leave-to {
  opacity: 0
}
</style>
