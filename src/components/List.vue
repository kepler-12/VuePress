<template>
  <nav>
    <router-link
      v-for="post in posts"
      :key="post.id"
      :to="getPath(post.slug)"
      v-html=" '# ' + post.title.rendered"
    ></router-link>
  </nav>
</template>

<script>
import axios from 'axios'
import moment from 'moment'

export default {
  name: 'list',
  props: ['type', 'limit'],
  data() {
    return {
      posts: []
    }
  },
  methods: {
    timeFromNow(time) {
      return moment(time).fromNow()
    },
    getPath(slug) {
      return this.type === 'pages' ? `/${slug}` : `/channel/${slug}`
    }
  },
  mounted() {
    axios.get(`/wp-json/wp/v2/${this.type}`, {
      params: {
        per_page: this.limit
      }
    }).then(res => {
      this.posts = res.data
    })
  }
}
</script>

<style>
a {
  line-height: 1.4;
}
</style>
