<template>
<div>
  <nav>
    <div class="nav_left">
      <router-link to="/">List all students</router-link> 
      <router-link to="/checkleave">Cheack leave</router-link>
      <router-link to="/request">New Request</router-link>
      <router-link to="/leaveList">List Leave</router-link>
    </div>
    <div class="nav_right">
      <router-link to="/in">Sign in</router-link>
      <router-link to="/up">Sign up</router-link>
    </div>
  </nav>
  <router-view/>
</div>
</template>

<style scoped>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  width:100%;
  display:flex;
  justify-content:space-between;
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
  margin:10px;
  text-decoration: none;
}

nav a.router-link-exact-active {
  color: #42b983;
}
.nav_left,.nav_right{
  padding: 30px;
}

a { 
    display: inline-block; 
    position: relative; 
    color: #0087ca; 
  } 
   
a:after { 
    content: ''; 
    position: absolute; 
    width: 100%; 
    transform: scaleX(0); 
    height: 2px; 
    bottom: 0; 
    left: 0; 
    background-color: #0087ca; 
    transform-origin: bottom right; 
    transition: transform 0.25s ease-out; 
  } 
a:hover:after { 
    transform: scaleX(1); 
    transform-origin: bottom left; 
  }
</style>
