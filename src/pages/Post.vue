<template>
  <div>
    <div>
      <h1 v-html="post.title.rendered"></h1>
      <div v-html="post.content.rendered"></div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Post',
  props: ['post'],
  data() {
    return {
    }
  }
}
</script>
