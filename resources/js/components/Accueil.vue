
<template>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap">
    <div class="home-container">  
 <Hero/>     
      </div>
  </template>
  
 <script setup>
import Hero from "./Hero.vue";
</script>
  
  <style scoped>
  .footer {
  background-color:  #fdcc02;
  color:black;
  padding: 20px 0;
}
 
    .home-container {
       height: 1200;
        background-color: rgba(0, 0, 0, 0.888);
        animation: fadeIn 2s ease-out;
    }
  
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
      
.font-handwriting {
    font-family: 'Dancing Script', cursive;
}

  </style>
  