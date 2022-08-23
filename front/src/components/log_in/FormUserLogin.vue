<template>
  <div class="contain" @submit.prevent>
    <div class="contain-form">
      <h3>User Login</h3>
      <div class="card-form">
        email<input
          type="email"
          placeholder="Email Address *"
          v-model="email"
        />
        password<input
          type="password"
          placeholder="Your Password *"
          v-model="password"
        />
      </div>
      <div class="submit">
        <button type="submit" value="Sign in" @click="loginUser">Login</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "../../axios-http";
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    loginUser() {
      let log_in = {
        email: this.email,
        password: this.password,
      };
      axios
        .post(process.env.VUE_APP_API_URL + "login", log_in)
        .then((response) => {
          console.log(response.data);
        });
    },
  },
};
</script>

<style scoped>
.contain {
  box-sizing: border-box;
  width: 100%;
  margin: auto;
  align-items: center;
  justify-content: center;
  display: flex;
}
.contain .contain-form {
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
.card-form input {
  margin-bottom: 10px;
  width: 100%;
  padding: 10px;
  outline: none;
  box-sizing: border-box;
}
.submit button {
  width: 100%;
  height: 5vh;
  border: none;
  margin: auto;
  border-radius: 3px;
  font-size: 15px;
  background-color: rgb(19, 185, 149);
}
</style>
