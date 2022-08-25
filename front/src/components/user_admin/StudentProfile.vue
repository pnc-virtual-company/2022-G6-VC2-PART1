<template>
    <div class="contain">
        <div class="contain-left">
            <div class="contain-img">
                <img src="https://i.pinimg.com/originals/62/3a/a8/623aa8f9933ee9a286871bf6e0782538.jpg" alt="">
            </div>
            <div class="user-name"><h2>{{student.name}}</h2></div>
            <div class="contain-menu">
                <nav>
                    <ul>
                        <li class="" :class="{'onPage': onAccount}" @click="pageAccount">Account</li>
                        <li class="" :class="{'onPage': onUpdate}" @click="pageUpdate">Update</li>
                        <li>Password</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="contain-right">
            <div class="account-detail" v-if="onAccount">
                <div>
                    <h1>User Information Detail</h1>
                    <div class="name flex"><strong>User Name: </strong><p>{{student.name}}</p></div>
                    <div class="gender flex"><strong>User Gender: </strong><p>{{student.gender}}</p></div>
                    <div class="Class-room flex"><strong>Class Room: </strong><p>{{student.class_room}}</p></div>
                    <div class="email flex"><strong>User Email: </strong><p>{{student.email}}</p></div>
                </div>
                <div>     
                     <button class="btn-back"><router-link  class="link-a" to="/" @click="$router.go(0)" >Back</router-link></button>
                </div>
            </div>
           
            <div class="update-detail" v-if="onUpdate">
                <h1>User Update Information</h1>
                <div class="name input">
                    <strong>User Name</strong><br>
                    <input type="text" v-model="name">
                </div>
                <div class="email input">
                    <strong>User Email</strong><br>
                    <input type="text" v-model="email">
                </div>
                <div class="flex" >
                    <div class="select">
                        <strong>User Gender</strong><br>
                        <select name="" id="" v-model="gender" >
                            <option value="male" >Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="select">
                        <strong>User Class Room</strong><br>
                        <!-- <input type="text" value="User Class"> -->
                        <select name="" id="" v-model="class_room">
                            <option value="Web 2022 A" >Web 2022 A</option>
                            <option value="Web 2022 B">Web 2022 B</option>
                            <option value="SNA 2022">SNA 2022</option>
                        </select>
                    </div>
                </div>
                <div class="button-group">
                    <button class="update" @click.prevent="updataStudent">Update</button>
                      <button class="concel"><router-link  class="link-a" to="/" @click="$router.go(0)" >Back</router-link></button>
                </div>
                
            </div>
        </div>
    </div>
</template>

<script>
import axios from '@/api/api';
// import { defineComponent } from '@vue/composition-api'

export default {
    props:{
        student:Array
    },
    data() {
        return{
            onAccount:true,
            onUpdate:false,
            name:'',
            email:'',
            gender: '',
            class_room:'',
        }
    },
    methods:{
        pageAccount(){
            this.onAccount = true;
            this.onUpdate = false
        },
        pageUpdate(){
            this.onAccount = false;
            this.onUpdate = true
            this.name=this.student.name
            this.email=this.student.email
            this.gender=this.student.gender
            this.class_room=this.student.class_room
        },
        // ___________ Updata Student____________
        updataStudent(){
            let student={
                name: this.name,
                email: this.email,
                gender: this.gender,
                class_room: this.class_room  
            }
            let id = JSON.parse(localStorage.getItem("studentid"));
            axios.post('students/' + id, student).then((res)=>{
                console.log(res.data)
            })

        },

    }
}
</script>


<style scoped>
    .contain{
        display: flex;
        width: 70%;
        margin: 50px auto;
        height: 70vh;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        border-radius: 4px;
    }
    .contain .contain-left{
        width: 40%;
        border-right: 1px solid rgba(210, 210, 210, 0.754);
    }
    .contain .contain-left .contain-img{
        align-items: center;
        justify-content: center;
        display: flex;
        padding: 15px 10px;
    }
    .contain .contain-left .contain-img img{
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 1px solid rgb(162, 162, 162) ;
    }
    .contain .contain-left .user-name{
        text-align: center;
        margin: 20px 0;
        padding: 0 10px;
    }
    .contain .contain-left .contain-menu nav ul li{
        border-bottom: 1px solid rgb(217, 217, 217);
        list-style: none;
        padding: 15px;
    }
    .onPage{
        background: #05B2E9;
    }
    .contain .contain-left .contain-menu nav ul li:hover{
        background: #05B2E9;
        cursor: pointer;
    }
    .contain .contain-right{
        width: 60%;
        padding: 50px;
    }
    /* on menu account */
    .contain .contain-right .account-detail{
        margin-top: 30px;
        line-height: 40px;
    }
    .contain .contain-right .account-detail .flex{
        align-items: center;
        justify-content: start;
        display: flex;
    }
    .contain .contain-right .account-detail .flex p{
        text-indent:20px;
    }
    /* on menu update */
    .contain .contain-right .update-detail .input{
        margin-top: 20px;
    }
    .contain .contain-right .update-detail .input input{
        padding: 10px;
        margin-top: 4px;
        font-size: 15px;
        width: 100%;
        outline: none;
        box-sizing: border-box;
        border: 1px solid rgb(213, 213, 213);
    }
    .contain .contain-right .update-detail .flex{
        display: flex;
        justify-content: space-between;
        width: 100%;
        /* gap: 50px; */
        /* background: tan; */
        box-sizing: border-box;
    }
    .contain .contain-right .update-detail .flex .select{
        margin-top: 10px;
        width:43%;
        /* background: teal; */
        box-sizing: border-box;
        margin-top: 20px;
    }
    .contain .contain-right .update-detail .flex .select select{
        border: 1px solid rgb(207, 207, 207);
        margin-top: 10px;
        width:100%;
    }
    .contain .contain-right .update-detail .button-group{
        margin-top: 20px;
        width: 100%;
        gap: 20px;
    }
    .contain .contain-right .update-detail .button-group .concel{
        background: #FFAD5C;
    }
    .contain .contain-right .update-detail .button-group .update{
        background: #05B2E9;
    }
   
    .link-a{
    text-decoration: none;
    }

    .btn-back {
    align-items: center;
    appearance: button;
    background-color: #0276FF;
    border-radius: 8px;
    border-style: none;
    box-shadow: rgba(255, 255, 255, 0.26) 0 1px 2px inset;
    box-sizing: border-box;
    color: rgb(0, 0, 0);
    cursor: pointer;
    display: flex;
    flex-direction: row;
    flex-shrink: 0;
    font-family: "RM Neue",sans-serif;
    font-size: 100%;
    line-height: 1.15;
    margin: 0;
    padding: 10px 21px;
    text-align: center;
    text-transform: none;
    transition: color .13s ease-in-out,background .13s ease-in-out,opacity .13s ease-in-out,box-shadow .13s ease-in-out;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    }

    .btn-back:active {
    background-color: #006AE8;
    }

    .btn-back:hover {
    background-color: #1C84FF;
    }
    .account-detail{
        display: flex;
        justify-content: space-around;
        align-items: flex-end;
    }
</style>