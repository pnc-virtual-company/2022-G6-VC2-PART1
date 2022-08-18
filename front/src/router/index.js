import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/ListAllStudentView.vue'
import ListAllLeaveView from '../views/ListAllLeaveView.vue'
import NewRequestView from '../views/NewRequestView.vue'
import CheckLeaveView from '../views/CheckLeaveView.vue'
import LoginView from '../views/LoginView.vue'
import UserNameView from '../views/UserNameView.vue'


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
    path: '/request',
    name: 'request',
    component: NewRequestView,
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView,
  },
  {
    path: '/register',
    name: 'register',
    component: UserNameView,
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
