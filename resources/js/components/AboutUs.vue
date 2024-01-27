<template>
 <div class="home-container">  
    
    <div class="about-us-container  ">
        <Navbar/>
      <h1 class="display-2 font-handwriting text-light mb-4 text-center">About Tmakhmikha</h1>
      
      <p class="mt-4">
        Welcome to Tmakhmikha, your go-to destination for a delightful online
        dining experience. At Tmakhmikha, we are passionate about bringing
        mouth-watering dishes right to your doorstep, allowing you to enjoy
        restaurant-quality meals in the comfort of your home.
      </p>
      <p>
        Our dedicated team of chefs crafts each dish with love and attention to
        detail, ensuring a culinary journey that tantalizes your taste buds.
        Whether you're craving classic favorites or exploring new flavors, Tmakhmikha
        has something special for every palate.
      </p>
      <p>
        Join us on a culinary adventure where quality meets convenience. We
        believe in creating memorable dining experiences, one delicious meal at a
        time.
      </p>
    </div>
    
    </div>
  </template>
  
  <script setup>
import Navbar from "./Navbar.vue";

  </script>
  
  <style scoped>
  .about-us-container {
    background:url(https://res.cloudinary.com/dwvs0ycjd/image/upload/v1706352973/Tmakhmikha/back_entu1f.jpg);
     background-repeat: no-repeat;
     background-size:cover;
     background-position: center;
    color: #ffffff; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    height: 750px;
    width: 100%;
  }
  

  p {
    margin-bottom: 15px;
    line-height: 1.5;
    margin-left: 10px;
  }
  
 
  p + p {
    margin-left: 10px;
    margin-top: 15px;
  }
  .font-handwriting {
    font-family: 'Dancing Script', cursive;
}
  </style>
  