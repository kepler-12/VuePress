<template>
  <div>
    <section class="post-list" v-for="post in posts" :key="post.id">
      <article>
        <h2 v-html="post.title.rendered"></h2>
        <p>Posted {{ timeFromNow(post.date) }}</p>
        <div v-html="post.excerpt.rendered"></div>
      </article>
    </section>
  </div>
</template>

<script>
import axios from 'axios'
import moment from 'moment'

export default {
  name: 'post-list',
  props: ['type', 'limit'],
  data() {
    return {
      posts: []
    }
  },
  methods: {
    timeFromNow(time) {
      return moment(time).fromNow()
    }
  },
  mounted() {
    axios.get(`/wp-json/wp/v2/${this.type}`, {
      params: {
        per_page: this.limit
      }
    }).then(res => {
      console.log(res)
      this.posts = res.data
    })
  }
}
</script>
