<template>
  <main class="main">
    <template v-if="loaded">
      <header class="channel-header">
        <h1 v-html="channel.title.rendered"></h1>
        <div v-html="channel.content.rendered"></div>
      </header>

      </div>
    </template>
  </main>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Page',
  data() {
    return {
      loaded: false,
      page: [],
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
    get() {
      this.loaded = false

      axios.get(`/wp-json/wp/v2/pages`, {
        params: {
          slug: this.slug
        }
      }).then((res) => {
        // Grab the first result from the returned array of channels
        this.channel = res.data[0]
        this.loaded = true
      })
    },
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
