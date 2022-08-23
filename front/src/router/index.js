import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/UserView/ListAllStudentView.vue'
import ListAllLeaveView from '../views/StudentView/ListAllLeaveView.vue'
import NewRequestView from '../views/StudentView/NewRequestView.vue'
import CheckLeaveView from '../views/UserView/CheckLeaveView.vue'
import LoginView from '../views/LoginView.vue'
import CreateUserView from '../views/UserView/CreateUserView.vue'
import SignOutView from '../views/SignOutView.vue'
import StudentProfileView from '../views/UserView/StudentProfileView.vue'


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
    path: '/createuser',
    name: 'createuser',
    component: CreateUserView,
  },
  {
    path: '/signout',
    name: 'signout',
    component: SignOutView,
  },
  {
    path: '/studentprofile',
    name: 'studentprofile',
    component: StudentProfileView,
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
