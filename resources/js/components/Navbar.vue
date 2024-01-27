<template>
     
    <nav class="navbar navbar-expand-md">
      <div class="container justify-content-center">
        <router-link :to="{name: 'Accueil'}" class="btn btn-outline-light ms-4 fw-bold">
          <i class="fa-solid fa-home me-2"></i>Home
        </router-link>

        <router-link :to="{name: 'Menu'}" class="btn btn-outline-light ms-4 fw-bold">
          <i class="fa-solid fa-bars me-2"></i>Menu
        </router-link>
  
        <router-link :to="{name:''}" class="btn btn-outline-light ms-4 fw-bold">
          <i class="fa-solid fa-fire  me-2"></i>Specials / Promotions
        </router-link>
  
  
  
        <router-link :to="{name:'AboutUS'}" class="btn btn-outline-light ms-4 fw-bold">
          <i class="fa-solid fa-users me-2"></i>About Us
        </router-link>
    
        <router-link :to="{name: 'Viewarticles'}" class="btn btn-outline-light ms-4 fw-bold">
          <i class="fa-solid fa-cogs me-2"></i>Administration
        </router-link>
  
        <router-link :to="{name:''}" class="btn btn-outline-light ms-4 fw-bold">
          <i class="fa-solid fa-user me-2"></i>Login / Sign Up
        </router-link>
      </div>
    </nav>
           

  </template>
  <style scoped>
 
</style>