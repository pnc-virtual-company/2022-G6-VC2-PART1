import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/ListAllStudentView.vue'
import ListAllLeaveView from '../views/ListAllLeaveView.vue'
import SignOutView from '../views/SignOutView.vue'
import NewRequestView from '../views/NewRequestView.vue'
import CheckLeaveView from '../views/CheckLeaveView.vue'

const routes = [
  {
    path: '/',
    name: 'studentlist',
    component: HomeView
  },
  {
    path: '/checkleave',
    name: 'checkleave',
    component: CheckLeaveView
  },
  {
    path: '/leaveList',
    name: 'leaveList',
    component: ListAllLeaveView,
  },
  {
    path: '/signout',
    name: 'signout',
    component: SignOutView,
  },
  {
    path: '/request',
    name: 'request',
    component: NewRequestView,
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
