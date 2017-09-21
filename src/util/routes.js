import Channel from '../views/channel.vue'
import Page from '../views/page.vue'
import axios from 'axios'

export default [
  {
    path: '/channel/:slug?',
    component: Channel,
  },
  {
    path: '/:slug?',
    component: Page,
  },
]
