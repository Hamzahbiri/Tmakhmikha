<template>
<div class="Login-container">
    <Navbar/>

    <div class="row justify-content-center">
      <div class="col-md-6 mt-5">
        <div class="card p-4">

          <div class="card-header display-4 font-handwriting text-light mb-4 text-center">Login</div>
          <div class="card-body">

            <div class="form-group">
             
              <div class="input-group">
                <span class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                </span>
                <input type="email" placeholder="Email" name="email" id="email" class="form-control" v-model="user.email" required autofocus autocomplete="off">
              </div>
            </div>
            <br>
            <div class="form-group">
           
              <div class="input-group">
                <span class="input-group-prepend">
                  <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                </span>
                <input type="password" placeholder="Password" name="password" id="password" class="form-control" v-model="user.password" required autocomplete="off">
              </div>
            </div>

            <div class="form-group text-center mt-4">
              <button class="btn btn-outline-primary btn-lg btn-dark-mode" @click="handleLogin">
                Login
              </button>
            </div>
            <div class="form-group text-center">
                <p class="lead text-light text-bold mt-5 ">Don't have an account?</p>
                <router-link :to="{ name: 'Register' }" >              
                Register
                </router-link>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>


</template>

<script setup>
import Navbar from "../Navbar.vue";
import axios from 'axios';
import { useRouter } from 'vue-router';
const router = useRouter();
let user = {}
const handleLogin = async () => {
    axios.post('http://localhost:8000/api/login/', user)
        .then((response) => {
            router.push({name:"Accueil"})
            localStorage.setItem('user', response.data.user.name)
            localStorage.setItem('token', response.data.token)
        })
        .catch(err => {
            console.log(err);
            alert(err)  
        })

}

</script>

<style scoped>


.Login-container {
  background:url(https://res.cloudinary.com/dwvs0ycjd/image/upload/v1706352973/Tmakhmikha/back_entu1f.jpg);
     background-repeat: no-repeat;
     background-size:cover;
     background-position: center;
    color: #ffffff; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    height: 750px;
    width: 100%;
  }

.btn-dark-mode {
width: 250px;
height: 50px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
  margin-bottom: 20px;
}
.fa-envelope,.fa-lock{
    font-size: 24px;
}
.card{
    background-color:transparent;
    
}
.font-handwriting {
    font-family: 'Dancing Script', cursive;
}
</style>