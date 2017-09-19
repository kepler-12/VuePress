<template>
  <footer class="footer">
    <p>VuePress | WordPress SPA using vue.js.</p>
    <p>
      <small>&copy;{{ year }}. All Rights Reserved.</small>
    </p>
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
  text-align: center;
  background-color: #f5f5f5;
  color: #9e9e9e;
  padding: 1em;
}
</style>
