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
                <h1>User Information Detail</h1>
                <div class="name flex"><strong>User Name: </strong><p>{{student.name}}</p></div>
                <div class="gender flex"><strong>User Gender: </strong><p>{{student.gender}}</p></div>
                <div class="Class-room flex"><strong>Class Room: </strong><p>{{student.class_room}}</p></div>
                <div class="email flex"><strong>User Email: </strong><p>{{student.email}}</p></div>
            </div>
            <div class="update-detail" v-if="onUpdate">
                <h1>User Update Information</h1>
                <div class="name input">
                    <strong>User Name</strong><br>
                    <input type="text" :value="student.name">
                </div>
                <div class="email input">
                    <strong>User Email</strong><br>
                    <input type="text" :value="student.email">
                </div>
                <div class="flex">
                    <div class="select">
                        <strong>User Gender</strong><br>
                        <select name="" id="">
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="select">
                        <strong>User Class Room</strong><br>
                        <!-- <input type="text" value="User Class"> -->
                        <select name="" id="">
                            <option value="Web 2022 A" selected>Web 2022 A</option>
                            <option value="Web 2022 B">Web 2022 B</option>
                            <option value="SNA 2022">SNA 2022</option>
                        </select>
                    </div>
                </div>
                <div class="button-group">
                    <button class="update">Update</button>
                    <button class="concel">Concel</button>
                </div>
                
            </div>
        </div>
    </div>
</template>

<script>
// import { defineComponent } from '@vue/composition-api'

export default {
    props:{
        student:Array
    },
    data() {
        return{
            onAccount:true,
            onUpdate:false
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
        }
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
</style>