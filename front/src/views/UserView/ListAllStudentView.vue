<template>
<div>
  <div v-if="!viewProfile" class="home">
    <listAllStudent
      :students="dataStudents"
      @user-id="isViewProfile"   
      @deleteItem="onDelete"
      @filter-student ="filterStudent"
    ></listAllStudent>
  </div>
  <div v-if="viewProfile">
    <StudentProfile :student="dataStudent" />
  </div>
</div>
</template>

<script>
// @ is an alias to /src
import listAllStudent from '@/components/user_admin/ListOfStudentProfile.vue'
import StudentProfile from '@/components/user_admin/StudentProfile.vue'
import axios from '@/api/api'

// const URL_LISTSTUDENTS = process.env.VUE_APP_API_URL + 'students'
// const URL_STUDENTS = process.env.VUE_APP_API_URL + 'students/'
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
    axios.get('students').then((result) => {
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
    axios.get('students/'+id).then(res=>{
      console.log(res.data);
      this.dataStudent = res.data
    })
  },
  // __________delete_________
  onDelete(id){
        axios.delete('students/' + id).then(() => {
        this.getAllStudents();
    })
 },
//  filter-student
filterStudent(data){
  if(data.search!=''){
    if(data.categorry=='name'){
      this.dataStudents = this.dataStudents.filter(student=>student.name.toLowerCase().includes(data.search.toLowerCase()))
    }
    else if(data.categorry=='class'){
      this.dataStudents = this.dataStudents.filter(student=>student.class_room.toLowerCase().includes(data.search.toLowerCase()))

    }
  }
  else{
    this.getAllStudents()
  }
}
},
mounted(){
    this.getAllStudents()
  }
}
</script>

<style scoped>
.displayNone {
  display: none;
}
</style>
