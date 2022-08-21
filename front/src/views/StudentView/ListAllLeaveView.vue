<template>
    <StudentTableRequest/>
</template>

<script>
// import { ref } from 'vue'
// import axios from "../../api/api.js"
import axios from '../../axios-http';
import StudentTableRequest from '@/components/student/StudentTableRequest.vue'

export default{
    components:{
        StudentTableRequest
    },
    data() {
        return{
            leaveList:[]
        }
    },
    
    methods:{
        getAllLeave(){
            axios.get(process.env.VUE_APP_API_URL+'users').then(response=>{
                console.log(response);
            })
        }
    },
    mounted(){
        this.getAllLeave()
    }

    
}
</script>
