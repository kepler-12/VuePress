<template>
  <nav>
    <router-link
      v-for="single in singles"
      :key="single.id"
      :to="getPath(single.slug)"
      v-if="single.slug !== 'home'"
      v-html="styledName(single)"
    ></router-link>
  </nav>
</template>

<script>
import moment from 'moment'

export default {
  name: 'list',
  props: ['type', 'limit'],
  data() {
    return {
      singles: []
    }
  },
  methods: {
    getItems() {
      axios.get(`/wp-json/wp/v2/${this.type}`, {
        params: {
          per_page: this.limit
        }
      }).then(res => {
        this.singles = res.data
      })
    },
    styledName(single) {
      const prefix = this.type === 'posts' ? '# ' : ''
      return prefix + single.title.rendered
    },
    listenForNew() {
      // When new channels are created, push them to the 'singles' list
      this.$socket.on('posts', (data) => {
        this.singles.push(data)
        // this.$router.push(this.getPath(data.slug))
      });
    },
    timeFromNow(time) {
      return moment(time).fromNow()
    },
    getPath(slug) {
      return this.type === 'pages' ? `/${slug}` : `/channel/${slug}`
    }
  },
  mounted() {
    this.getItems()

    if (this.type === 'posts') {
      this.listenForNew();
    }
  }
}
</script>

<style>
a {
  line-height: 1.4;
}
</style>
