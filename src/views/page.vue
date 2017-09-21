<template>
  <main class="main">
    <div
      class="page-wrap"
      v-if="loaded"
    >
      <img
        class="featured-image"
        :src="page._embedded['wp:featuredmedia'][0].source_url"
        alt=""
      >

        <header class="page-header">
          <h1 v-html="page.title.rendered"></h1>
        </header>

        <div
          class="page-content"
          v-html="page.content.rendered"
        >
          </div>

          </div>
          </div class="page-wrap">
  </main>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Page',
  data() {
    return {
      loaded: false,
      page: {},
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
          slug: this.slug,
          _embed: true
        }
      }).then((res) => {
        // Grab the first result from the returned array of pages
        this.page = res.data[0]
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

.page-wrap {
  overflow-y: scroll;
  flex-grow: 1;
}

.featured-image {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.page-header,
.page-content {
  padding: .5em 1em;
}
</style>
