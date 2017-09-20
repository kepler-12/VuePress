<template>
  <article class="message">
    <img
      class="avatar"
      :src="message.author_avatar_urls['48']"
      alt=""
    >
      <div class="message-inner">
        <header class="message__header">
          <p class="message__author">{{ message.author_name }}</p>
          <small class="date">{{ formattedDateTime(message.date) }}</small>
        </header>

        <div
          class="message-content"
          v-html="message.content.rendered"
        ></div>
      </div>
  </article>
</template>

<script>
import moment from 'moment'

export default {
  name: 'message',
  props: ['message', 'user'],
  methods: {
    formattedDateTime(time) {
      return moment(time).format('MMM Do | HH:mma')
    },
  }
}
</script>


<style lang="scss">
.message {
  padding: .5em 1em;
  display: flex;
  align-items: flex-start;
}

.message__header * {
  display: inline;
}

.message__author {
  font-weight: bold;
}

.message:hover {
  background-color: #f3f3f3;
}

.avatar {
  margin-right: .5em;
  border-radius: 50%;
}

.message-content,
.message-content * {
  margin: 0;
  line-height: 1.4;
}

.date {
  margin-left: .5em;
  font-size: .75em;
  color: #acaca9;
}
</style>
