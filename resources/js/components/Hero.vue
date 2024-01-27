<template>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap">

<div class="jumbotron text-center mb-4">
    <h1 class="display-2 font-handwriting text-light sht ">Welcome to Our Restaurant</h1>
         <h1 class="display-3 font-handwriting text-light sht">Tmakhmikha !</h1>
         <Navbar/>     
          <p class="lead text-light text-bold mt-5 ">Delicious food served with a smile!</p>
      
      </div>
</template>

<script setup>
import Navbar from "./Navbar.vue";
</script>

<style  scoped>
 .jumbotron {
     background:url(https://res.cloudinary.com/dwvs0ycjd/image/upload/v1706352973/Tmakhmikha/back_entu1f.jpg);
     background-repeat: no-repeat;
     background-size: cover;
     background-position: auto;
     padding: 15%;
     border-radius: 0.3rem;
 
    }
.font-handwriting {
    font-family: 'Dancing Script', cursive;
}

</style>