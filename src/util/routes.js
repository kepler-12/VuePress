import Foo from '../pages/Foo.vue'
import Home from '../pages/Home.vue'
import Bar from '../pages/Bar.vue'

export default [
  {
    path: '/',
    component: Home
  },
  {
    path: '/foo',
    component: Foo
  },
  {
    path: '/bar',
    component: Bar
  }
]
