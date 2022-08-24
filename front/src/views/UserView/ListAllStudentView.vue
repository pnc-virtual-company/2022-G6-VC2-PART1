<template>
  <div v-if="!viewProfile" class="home">

   <listAllStudent :students="dataStudents" @user-id="isViewProfile"></listAllStudent>
  </div>
  <div v-if="viewProfile">
    <StudentProfile :student="dataStudent"/>
  </div>
</template>

<script>
// @ is an alias to /src
import listAllStudent from '@/components/user_admin/ListOfStudentProfile.vue'
import StudentProfile from '@/components/user_admin/StudentProfile.vue'
import axios from '../../axios-http'
const URL_LISTSTUDENTS = process.env.VUE_APP_API_URL + 'students'
const URL_STUDENTS = process.env.VUE_APP_API_URL + 'students/'
export default {
 components:{
  listAllStudent,
  StudentProfile
 },
 data(){
  return{
    dataStudents:[],
    viewProfile:false,
    dataStudent:[]
  }
 },
 methods:{
  getAllStudents(){
    axios.get(URL_LISTSTUDENTS).then((result) => {
      this.dataStudents= result.data;
    })
  },
  isViewProfile(id){
    if(this.viewProfile){
      this.viewProfile = false
      console.log(id);
    }else{
      this.viewProfile = true
      console.log(id);
      this.provideUserData(id)
    }
  },
  provideUserData(id){
    axios.get(URL_STUDENTS+id).then(res=>{
      console.log(res.data);
      this.dataStudent = res.data
    })
  }
 },
  mounted(){
    this.getAllStudents()
  }
}
</script>

<style scoped>
  .displayNone{
    display: none;
  }
</style>