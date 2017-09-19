<template>
  <div>
    <div v-if="loaded">
      <h1>Posts</h1>

      <post-list type="posts" :limit="5" />
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import PostList from '../components/PostList.vue'

export default {
  name: 'Archive',
  data() {
    return {
      loaded: false,
      page: [],
    }
  },
  components: {
    'post-list': PostList
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
        // Grab the first result from the returned array of pages
        this.page = res.data[0]
        this.loaded = true
      })
    }
  }
}
</script>
