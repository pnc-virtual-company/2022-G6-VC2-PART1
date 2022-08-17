<template>
  <div class="home">
   <h1>list</h1>
   <listAllStudent></listAllStudent>
  </div>
</template>

<script>
// @ is an alias to /src
import listAllStudent from '@/components/user_admin/ListOfStudentProfile.vue'


export default {
 components:{
  listAllStudent,
 }
}
</script>
