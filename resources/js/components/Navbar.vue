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
  
        <router-link :to="{ name: 'Login' }" class="btn btn-outline-light ms-4 fw-bold">
                <i class="fa-solid fa-user me-2"></i>
                Login
            </router-link>

            <button @click="logout">Logout</button>
      </div>
    </nav>
           

  </template>

  <script setup>
import axios from 'axios';
import { useRouter } from 'vue-router';
const router = useRouter();
const logout = async () => {
    let token = ""

    token = localStorage.getItem('token')
    console.log(token)
    axios.post('http://localhost:8000/api/logout', null, {

        headers: {
            'Authorization': `Bearer ${token}`
        }
    })

        .then((response) => {
            console.log(response)
            localStorage.removeItem('token')
            localStorage.removeItem('user')
            router.push("/login")
        })
        .catch(err => { console.log(err); alert(err) })

}
</script>
  <style scoped>
 
</style>