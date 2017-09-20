<template>
  <footer class="footer">
    <p>VuePress | WordPress SPA using vue.js.</p>
    <small>&copy;{{ year }} Technology Therapy Group LLC. All Rights Reserved.</small>
  </footer>
</template>

<script>
import moment from 'moment'

export default {
  name: 'app-footer',
  data() {
    return {
      year: moment().year()
    }
  }
}
</script>

<style lang="scss">
.footer {
  display: flex;
  justify-content: space-between;
  text-align: center;
  background-color: #f5f5f5;
  color: #9e9e9e;
  padding: 1em;
  font-size: .8em;
}
</style>
