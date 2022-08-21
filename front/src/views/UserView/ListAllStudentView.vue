<template>
  <div class="home">

   <listAllStudent :students="dataStudents"></listAllStudent>
  </div>
</template>

<script>
// @ is an alias to /src
import listAllStudent from '@/components/user_admin/ListOfStudentProfile.vue'
import axios from '../../axios-http'
const URL_LISTSTUDENTS = process.env.VUE_APP_API_URL + 'students'
export default {
 components:{
  listAllStudent,
 },
 data(){
  return{
    dataStudents:[]
  }
 },
 methods:{
  getStudents(){
    axios.get(URL_LISTSTUDENTS).then((result) => {
      this.dataStudents= result.data;
    })
  }
 },
  mounted(){
    this.getStudents()
  }
}
</script>
