import Page from '../pages/Page.vue'
import axios from 'axios'

export default [
  {
    path: '/:slug?',
    component: Page
  }
]
