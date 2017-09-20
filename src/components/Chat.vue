<template>
  <div class="chat-frame">
    <section
      id="messages"
      class="messages-container"
    >
      <div class="messages">
        <div
          v-bind:key="message.id"
          class="message"
          v-for="message in allMessages"
        >
          <img
            class="avatar"
            :src="message.author_avatar_urls['48']"
            alt=""
          >
            <div class="message-inner">
              <div class="message__header">
                <p class="message__author">{{ message.author_name }}</p>
                <small class="date">{{ timeFromNow(message.date) }}</small>
              </div>
              <div
                class="message-content"
                v-html="message.content.rendered"
              ></div>
      </div>
  </div>
  </div>
  </section>

  <footer class="create-message">
    <input
      class="create-message"
      v-model="newMessage"
      type="text"
      @keypress.enter="submitMessage"
      :placeholder="'Post to ' + channel.title.rendered"
    >
  </footer>
  </div>
</template>

<script>
import moment from 'moment'
import axios from 'axios'

export default {
  name: 'Chat',
  props: ['channel', 'comments', 'user'],
  data() {
    return {
      newMessage: '',
      newMessages: [],
    }
  },
  computed: {
    allMessages() {
      return [...this.comments, ...this.newMessages]
    }
  },
  mounted() {
    console.log(this.post)
  },
  methods: {
    timeFromNow(time) {
      return moment(time).format('MMM Do | HH:mma')
    },
    submitMessage() {
      axios.post(`/wp-json/wp/v2/comments`, {
        author_email: this.user.email,
        author_name: this.user.name,
        content: this.newMessage,
        date: moment(),
        post: this.channel.id
      }).then((res) => {
        console.log(res.data)
        this.newMessages.push(res.data)
        this.newMessage = ''

        this.$nextTick(() => {
          const messagesContainer = document.getElementById('messages');
          messagesContainer.scrollTop = messagesContainer.scrollHeight - messagesContainer.clientHeight;
        })
      });
    }
  }
}
</script>


<style lang="scss">
.chat-frame {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.messages-container {
  flex-grow: 1;
  overflow: hidden;
  overflow-y: scroll;
}

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
  background-color: #e3e3e3;
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

.create-message {
  padding: 0 1em;
}

.create-message input {
  margin: 0;
  width: 100%;
  padding: 1em;
  line-height: inherit;
  -webkit-appearance: none;
  border: 2px solid grey;
  font-size: inherit;
}

::placeholder {
  color: #acaca9;
  font-weight: 100;
}
</style>
