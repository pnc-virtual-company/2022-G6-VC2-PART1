<template>
<div>
  <nav>
    <router-link to="/">List all students</router-link> |
    <router-link to="/checkleave">Cheack leave</router-link>|
    <router-link to="/username">User name</router-link>|
    <router-link to="/signout">Sign out</router-link>
  </nav>
  <router-view/>
</div>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
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
