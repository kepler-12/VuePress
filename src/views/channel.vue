<template>
  <main class="main">
    <template v-if="loaded">

      <header class="channel-header">
        <h1 v-html="channel.title.rendered"></h1>
        <div v-html="channel.content.rendered"></div>
      </header>

      <chat
        :user="user"
        :channel="channel"
        :comments="comments"
      />
      </div>

    </template>
  </main>
</template>

<script>
import axios from 'axios'
import Chat from '../components/Chat.vue'

export default {
  name: 'Channel',
  props: ['user'],
  components: {
    'chat': Chat,
  },
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
    get() {
      this.loaded = false

      axios.get(`/wp-json/wp/v2/posts`, {
        params: {
          slug: this.slug
        }
      }).then((res) => {
        // Grab the first result from the returned array of channels
        this.channel = res.data[0]
        this.loaded = true
        this.loadComments()
      })
    },
    loadComments() {
      axios.get(`/wp-json/wp/v2/comments`, {
        params: {
          per_page: -1,
          post: this.channel.id,
          order: 'asc'
        }
      }).then((res) => {
        this.comments = res.data
      })
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
