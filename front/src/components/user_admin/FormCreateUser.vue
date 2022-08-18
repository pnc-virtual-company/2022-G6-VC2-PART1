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
            <div class="gender">
                <div>
                    <input type="radio" name="gender" value="male" v-model="gender">Male
                </div>
                <div>
                    <input type="radio" name="gender" value="female" id="" v-model="gender">Female
                </div>
            </div>
            <div class="age">
                <input type="number" placeholder="Your Age *" v-model="age"/>
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
      box-sizing: border-box;
      width: 100%;
      margin: auto;
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
.select .gender{
    width: 100%;
    font-size: 12px;
    align-items: center;
    justify-content: space-evenly;
    display: flex;
}
.select .age{
    width: 100%;
    box-sizing: border-box;
    margin: 10px 0; 
}
.select .age input{
    box-sizing: border-box;
    padding: 8px;
    width: 100%;
}
.submit-client {
  width: 70px;
  height: 20px;
  border: none;
  border-radius: 3px;
  font-size: 15px;
  margin-right: 30px;
  background-color: rgb(19, 185, 149);
}
.submit-client:hover {
  background-color:  rgb(9, 146, 117);
}
</style>
