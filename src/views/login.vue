<template>
  <main class="main">
    <form v-on:submit.prevent="login">
        <input type="text" name="username" placeholder="username" />
        <input type="password" name="password" placeholder="password" />
        <input type="submit"  />
    </form>
  </main>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Login',
  data() {
    return {
      loaded: false,
      channel: [],
      comments: []
    }
  },
  computed: {
    slug() {
      return this.$route.params.slug || 'home';
    }
  },
  mounted() {
    this.get()
  },
  methods: {
    login(e) {
      console.log(e);
    }
  }
}
</script>

<style>
h1,
p {
  margin: 0;
}

.channel-header {
  padding: .5em 1em;
  border-bottom: 1px solid #acaca9;
}
</style>
