<template>
    <div>
        <div class="search-bar">
            <input type="text" placeholder="search" class="search" v-model="search">
            <select name="" id="" class="search">
                <option value="class">Class</option>
                <option value="name">Name</option>
                <option value="batch">Batch</option>
            </select>
            <button class="button-search">Search</button>
        </div>
        <table>
            <tr> 
                <th>IMAGE</th> 
                <th>NAME</th> 
                <th>BATCH</th> 
                <th>CLASS</th> 
                <th>MORE</th> 
            </tr> 
            <tr  v-for="student of students" :key="student">
                <td>
                    <img v-if="student.picture == null" class="circle" src="../../assets/user.png"  alt="">
                    <img v-else class="circle" :src="'http://127.0.0.1:8000/storage/images/'+student.picture"  alt="">
                </td>
                <td>{{student.name}}</td>
                <td>{{student.bacth+' '}}</td>
                <td>{{student.class_room}}</td>
                <td class="group-button">
                    <button class="detail" @click="provideUserId(student.id)">DETAIL</button>
                    <button class="delete" @click="deleteStudents(student.id)">DELETE</button>
                </td>
            </tr>
        </table>

    </div>
</template>
<script>
    // import 
    export default {
        props:{
            students:Array
        },
        data(){
            return {
                search:''
            }
        },
        methods:{
            provideUserId(id){
                this.$emit('user-id',id);
                localStorage.setItem("studentid",id)
            },
            //________delete student__________
            deleteStudents(deleteId){
                this.$emit('deleteItem', deleteId)
            }
        },
        watch:{
            search(){
                this.$emit('filter-student', this.search)
            }
        }
    }
</script>

<style scoped>
*{
    outline: none;
    border: none;
}
.search-bar{
    width: 80%;
    margin: 0 auto;
    align-items: right;
    justify-content: right;
    display: flex;
    margin-top: 50px;
    gap: 10px;
}
.search{
    padding: 0 10px;
    border-radius: 3px;
    border: 1px solid gainsboro;
    width: 20%;
    height: 40px;
}
select{
    padding: 10px;
}
.button-search{
    width: 80px;
    height: 40px;
    background: #FFAD5C;
    border-radius: 4px;
}
.card{
    width: 50%;
    margin:15px auto;
    padding: 5px;
    background: rgb(230, 230, 230);
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 5px;
    box-shadow: rgb(109, 108, 108) 0 2px 8px;
}
.card-title{
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 40%;

}
.circle{
    padding: 10px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-right: 4px;
    justify-content: center;
    align-items: center;
    display: flex;
    color: wheat;
    font-size: 20px;
}
.btn-orange{
    padding: 0.5rem;
    border-radius: 5px;
    background: orange;
}
.btn-red{
    padding: 0.5rem;
    border-radius: 5px;
    background: rgb(243, 48, 44);
}
/*  */
table {
  border-collapse: collapse;
  width: 80%;
  margin: auto;
  box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
  margin-top: 20px;
}
table th{
    background: #05B2E9;
    text-align: center;
    padding: 12px;
}

table td {
    padding: 8px;
    text-align: center;
    border-bottom: 1px solid #DDD;
    width: 16%;
}
table .group-button{
    width: 30%;
    gap: 20px;
}
table .group-button .detail{
    gap: 20px;
    background: #05B2E9;
    padding: 6px 20px;
    margin-right: 15px;
    border-radius: 4px;
}
table .group-button .delete{
    gap: 20px;
    background: #FFAD5C;
    padding: 6px 20px;
    margin-right: 15px;
    border-radius: 4px;
}

</style>