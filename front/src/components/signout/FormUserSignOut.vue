<template>
    <div class="contain">
        <div class="contain-form">
            <div class="text"><h2>Are you sure to Sing out your account?</h2></div>
            <div class="button-group">
                <button class="orange" @click="$router.go(-1)">Concel</button>
                <button class="blue">
                    <router-link  class="link" to="/login"  @click="signOut">Confirm</router-link>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
// import { defineComponent } from '@vue/composition-api'

export default {
    data() {
        
    },
    methods:{
      signOut(){
        localStorage.setItem('user-role', '')
        localStorage.removeItem('user');
        localStorage.removeItem('email');
        localStorage.removeItem('token');
        this.$router.go()
      }
    }
}
</script>



<style scoped>
.contain{
    align-items: center;
    justify-content: center;
    display: flex;
    width: 100%;
    background: rgba(186, 186, 186, 0.549);
    height: 100vh;
    margin-top: -100px;
    z-index: 1;
    position: relative;
}
.contain .contain-form{
    background: white;
    /* border: 1px solid gray; */
    padding: 50px;
}
.contain .contain-form .text{
    padding: 20px 0;
}
.contain .contain-form .button-group{
    align-items: center;
    justify-content: center;
    display: flex;
    gap: 10px;
    margin-top: 10px;
}
.contain .contain-form .button-group .orange{
    background: orange;
}
.contain .contain-form .button-group  .blue{
       background: #05B2E9;
}
.link{
    text-decoration: none;
}
</style>