<template>
  <main class="main">
    <form v-on:submit.prevent="createChannel()">
      <h1>Create A New Channel</h1>
      <input type="text" v-model="title" placeholder="Title" name="title" />
      <input type="text" v-model="content" placeholder="Content" name="content" />
      <input type="submit" value="Create" />
    </form>
  </main>
</template>

<script>
import axios from 'axios'

export default {
  name: 'CreateChannel',
  props: [],
  data() {
    return {
      title: "Channel Title",
      content: "",
    }
  },
  methods: {
    createChannel(e) {
      axios.post('/wp-json/wp/v2/posts', {
          title: this.title,
          content: this.content,
          status: 'publish'
      })
      .then(res => {
        this.$socket.emit('event', {
          response: 'posts',
          data: res.data
        })
      })
      .catch(console.error)
    }
  }
}
</script>

<style lang="scss">
form {
    display: flex;
    /* flex-wrap: wrap; */
    flex-direction: column;
    padding: 2em;
}

input {
  margin: .5em;
  width: 100%;
  padding: 1em;
  line-height: inherit;
  -webkit-appearance: none;
  border: 2px solid #233842;
  font-size: inherit;
  color: #233842;
}

.chat-frame {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

::placeholder {
  color: #acaca9;
  font-weight: 100;
}

</style>
