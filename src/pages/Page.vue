<template>
  <div>
    <div v-if="loaded">
      <h1 v-html="page.title.rendered"></h1>
      <div v-html="page.content.rendered"></div>
    </div>
  </div>
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
  mounted() {
    const slug = this.$route.params.slug || 'home'
    axios.get(`/wp-json/wp/v2/pages`, {
      params: {
        slug
      }
    }).then((res) => {
      // Grab the first result from the returned array of pages
      this.page = res.data[0]
      this.loaded = true
    })
  },
}
</script>
