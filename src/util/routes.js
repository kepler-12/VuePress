import Page from '../pages/Page.vue'
import Post from '../pages/Post.vue'
import Archive from '../pages/Archive.vue'
import axios from 'axios'

export default [
  {
    path: '/posts',
    component: Archive
  },
  {
    path: '/posts/:slug?',
    component: Post
  },
  {
    path: '/:slug?',
    component: Page
  },
]
