import Channel from '../views/channel.vue'
import Page from '../views/page.vue'
import Login from '../views/login.vue'
import CreateChannel from '../views/createChannel.vue'
import axios from 'axios'

export default [
  {
    path: '/login',
    component: Login,
  },
  {
    path: '/create',
    component: CreateChannel,
  },
  {
    path: '/channel/:slug?',
    component: Channel,
  },
  // {
  //   path: '/:slug?',
  //   component: Page,
  // },
]
