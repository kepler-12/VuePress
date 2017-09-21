import Channel from '../views/channel.vue'
import Page from '../views/page.vue'
import CreateChannel from '../views/createChannel.vue'

export default [
  {
    path: '/create',
    component: CreateChannel,
  },
  {
    path: '/channel/:slug?',
    component: Channel,
  }
]
