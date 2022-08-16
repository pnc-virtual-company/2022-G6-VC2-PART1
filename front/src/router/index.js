import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/ListAllStudentView.vue'
import UserNameView from '../views/UserNameView.vue'
import SignOutView from '../views/SignOutView.vue'

const routes = [
  {
    path: '/',
    name: 'studentlist',
    component: HomeView
  },
  {
    path: '/checkleave',
    name: 'checkleave',
    component: () => import(/* webpackChunkName: "about" */ '../views/CheckLeaveView.vue')
  },
  {
    path: '/username',
    name: 'username',
    component: UserNameView,
  },
  {
    path: '/signout',
    name: 'signout',
    component: SignOutView,
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
