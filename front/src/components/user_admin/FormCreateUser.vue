<template>
  <div class="contain">
    <div class="contain-form">
        <h3>Create New Account</h3>
        <div class="card-form">
            user name<input type="username" placeholder="username *" v-model="name" />
            email<input type="email" placeholder="Email Address *" v-model="email" />
            password<input type="password" placeholder="Your Password *" v-model="password" />
        </div>
        <div class="select">
            <div class="gender1">
                <div class="gender">
                    <select name="" id="">
                        <option value="male">Male</option>
                        <option value="male">Female</option>
                    </select>
                </div>
                <div class="choose-class">
                    <select name="" id="">
                        <option value="class">Class web A</option>
                        <option value="class">Class web B</option>
                        <option value="class">Class SNA A</option>
                    </select>
                </div>
            </div>

           
             <div class="teacherAndstudent">
                <div>
                    <input type="radio" name="school" value="student">Student
                </div>
                <div>
                    <input type="radio" name="school" value="teacher">Teacher
                </div>
            </div>
        </div>
        <div class="submit">
          <input class="submit-client" type="submit" value="Sign up" @click="$emit('create-user',{name:this.name, email:this.email, password:this.password, gender:this.gender})"/>
       </div>
    </div>
  </div>
</template>
<style scoped>
.contain {
    margin-top: 80px;
    box-sizing: border-box;
    width: 100%;
    align-items: center;
    justify-content: center;
    display: flex;
}
.contain .contain-form{
    width: 30%;
    border: 1px solid;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    padding: 20px;
}
h3 {
  color: black;
  font-size: 20px;
  padding-bottom: 15px;
}
.card-form {
  margin: auto;
  background: none;
  width: 100%;
  text-align: left;
}
.card-form input{
    margin-bottom: 10px;
    width: 100%;
    padding: 10px;
    outline: none;
    box-sizing: border-box;
}
.select{
    width: 100%;
}
.select .teacherAndstudent{
    width: 100%;
    font-size: 12px;
    align-items: center;
    justify-content: space-evenly;
    display: flex;
}
.gender1{
    display: flex;
    justify-content:space-between;
    width: 100%;
    margin-top:15px;

}
.gender1 .gender{
    width:48%;
}
.gender1 .gender select{
    width:100%;
}
.gender1 .choose-class{
     width:48%;
}
.select .gender1 .choose-class select{
    box-sizing: border-box;
    padding: 8px;
    width: 100%;
}
.submit-client {
  width: 75px;
  height: 25px;
  border: none;
  margin-top:30px;
  border-radius: 3px;
  font-size: 15px;
  margin-right: 30px;
  background-color: rgb(19, 185, 149);
}
.submit-client:hover {
  background-color:  rgb(9, 146, 117);
}
</style>
