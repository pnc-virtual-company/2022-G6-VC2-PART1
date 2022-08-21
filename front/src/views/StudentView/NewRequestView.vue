<template>
    <section>
        <StudentFormRequest @data-request="createRequest"/>
        <!-- <StudentCardRequest/> -->
    </section>
    
</template>

<script>
// import { ref } from 'vue'
import StudentFormRequest from '@/components/student/StudentFormRequest.vue'
// import StudentCardRequest from '@/components/student/StudentCardRequest.vue'

export default{
    components:{
        StudentFormRequest,
        // StudentCardRequest
    },
    data() {
    
    },
    methods:{
        createRequest(newRequest){
            console.log(newRequest);
        }
    }
}
</script>


<style >
*{
    padding: 0;
    margin: 0;
    font-family: sans-serif;
}
.request{
    align-items: center;
    justify-content: center;
    display: flex;
    width: 100%;
    text-align: left;
}
.request .request-form{
    width: 60%;
    border-radius: 6px;
    border: 1px solid rgb(173, 173, 173);
}
.request .request-form .header{
    background-color: #55B4F4;
    align-items: center;
    justify-content: center;
    display: flex;
    height: 70px;
    width: 100%;
    font-weight: 600;
    font-size: 24px;
    border-radius: 6px 6px 0 0;
}
.request .request-form form{
    padding: 30px 60px;
}
.request .request-form .flex{
    align-items: center;
    justify-content: space-between;
    display: flex;
}
.request .request-form .flex input, select{
    width: 300px;
    align-items: center;
    justify-content: space-between;
    display: flex;
    margin-bottom: 18px;
    outline: none;
    padding: 7px;
    font-size: 16px;
}
.request .request-form .direction, .reason{
    width: 100%;
}
.request .request-form textarea{
    width: 100%;
    resize: none;
    margin-bottom: 13px;
    outline: none;
    mask-repeat: no-repeat;
}
.button-group{
    width: 100%;
    align-items: end;
    justify-content: end;
    display: flex;
}
.button-group button{
    padding: 8px;
    width: 90px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.button-group .concell{
    background-color: #FFAD5C;    
    margin-right: 10px;
}
.button-group .submit{
    background-color: #55B4F4;
}
.contant{
    align-items: center;
    justify-content: center;
    display: flex;
    text-align-last: left;
}
.contant .contant-card{
    width: 60%;
    margin-top: 30px;
}
.contant .contant-card .card{
    border: 1px solid rgb(186, 186, 186);
    border-top: 6px solid #55B4F4;
    border-radius: 5px;
    padding: 15px 60px;
    margin-bottom: 15px;
    line-height: 32px;
}
.contant .contant-card .card .flex{
    display: flex;
    justify-content: space-between;
}

</style>
