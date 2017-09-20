<template>
  <div class="chat-frame">
    <section
      id="messages"
      class="messages-container"
    >
      <message
        :user="user"
        v-for="message in allMessages"
        :message="message"
        :key="message.id"
      ></message>

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
import axios from 'axios'
import Message from '../components/Message.vue'

export default {
  name: 'Chat',
  props: ['channel', 'comments', 'user'],
  components: { 'message': Message },
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
  methods: {
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
