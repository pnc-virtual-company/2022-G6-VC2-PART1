<template>
    <div>
        <div class="search-bar">
            <input type="text" placeholder="search" class="search" v-model="search">
            <!-- <button class="btn-orange">Search</button> -->
        </div>
        <div class="card" v-for="student of students" :key="student" >
            <div class="card-title">
                <div class="circle">SLMS</div>
                <div>
                    <h3>{{student.name}}</h3>
                    <label>{{student.class_room}}</label>
                </div>
            </div>
            <div>
                <button class="btn-orange" @click="provideUserId(student.id)">read more</button>
                <button class="btn-red" @click="deleteStudents(student.id)">delete</button>
            </div>
        </div>
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
    display: flex;
    justify-content: center;
    align-items: center;
    
    /* background: #000; */
    padding: 5px;
}
.search{
    padding: 7px;
    margin-right: 10px;
    border-radius: 10px;
    background: rgb(216, 216, 216);
    width: 20%;
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
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: #000;
    margin-right: 4px;
    display: flex;
    justify-content: center;
    align-items: center;
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
</style>