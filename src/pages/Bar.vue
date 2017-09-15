<template>
  <div>
    <h1>This page has an embedded "PostList" component.</h1>
    <PostList type="posts" limit="5" />
  </div>
</template>

<script>
import PostList from '../components/PostList.vue'

export default {
  name: 'Bar',
  components: {
    PostList
  }
}
</script>
