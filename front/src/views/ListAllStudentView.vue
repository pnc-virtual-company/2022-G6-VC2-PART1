<template>
  <div class="home">

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
