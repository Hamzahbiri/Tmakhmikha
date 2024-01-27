
<template>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap">


    <div class="home-container">
      <div class="jumbotron text-center mb-4">
        <h1 class="display-2">Welcome to Our Restaurant</h1>
        <h1 class="display-3">Tmakhmikha !</h1>
       
        <p class="lead">Delicious food served with a smile!</p>
        <Navbar/>
      </div>

      <div class="menu-section text-center">
      <h1 class="display-2 font-handwriting mb-4">The Menu</h1>
      </div>

      <div v-if="isLoading" class="loading-spinner"></div>
<Card/>
      
      <div class="container mt-3">
    <div v-for="category in categories" :key="category.id">
      <h2 class="mt-4">Nos {{ category.nomcategorie }}</h2>

      <div class="row">
        <div class="col-md-4" v-for="art in filteredArticles(category.id)" :key="art.id">
          <div class="card mb-4">
            <Image :src="art.imageart" class="card-img-top" alt="Image" width="415" height="350" preview/>
            <div class="card-body">
              <h5 class="card-title">{{ art.nomarticle }}</h5>
              <p class="card-text">{{ art.description }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <p class="card-text"><strong>{{ art.prix }} $</strong></p>
                <ButtonAdd/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>

      <footer class="footer mt-5">
      <div class="container text-center">
        <p>&copy; 2024 Tmakhmikha. All rights reserved.</p>
      </div>
    </footer>

</div>
  </template>
  
  <script setup>
import Image from 'primevue/image';
import ButtonAdd from "./ButtonAdd.vue";
import Navbar from "./Navbar.vue";


import { ref,onMounted } from 'vue';
import axios from 'axios';

const articles=ref([])
const getarticles=async()=>{
await axios.get("http://localhost:8000/api/articles")
.then(res=>{
articles.value=res.data
isLoading.value=false

})
.catch(error=>{
console.log(error)
})
}
onMounted(() => {
getarticles();
});


const categories = ref({})

const getcategories = async()=>{
    try{
        await axios.get("http://localhost:8000/api/categories")
        .then(res=>{
            categories.value=res.data 
        })

    }catch(error){
        console.log(error)
    }
}
onMounted(() => {
    getcategories();
});
const filteredArticles = (categoryId) => {
  return articles.value.filter(article => article.categorieID === categoryId);
};

const isLoading = ref(true);

onMounted(() => {
  setTimeout(() => {
    isLoading.value = false;
  }, 4000); 
});
 
  </script>
  
  <style scoped>
  .footer {
  background-color:  #fdcc02;
  color:black;
  padding: 20px 0;
}
  .btnadd{
    width: 120px;

  }
    .home-container {
        background-color: antiquewhite;
        animation: fadeIn 3s ease-out;
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
  
    .jumbotron {
      background-color: #fdcc02;
      padding: 4rem 2rem;
      border-radius: 0.3rem;
    }
  
    .card {
      transition: transform 0.5s ease-in-out;
    }
  
    .card:hover {
      transform: scale(1.05);
    }

    .menu-section {
  width: 100%;
}

.font-handwriting {
    font-family: 'Dancing Script', cursive;
}
.btn:hover {
  transform: scale(1.1);
}
.loading-spinner {
  border: 4px solid rgba(0, 0, 0, 0.1);
  border-radius: 50%;
  border-top: 4px solid #fdcc02; /* Use your brand color */
  width: 30px;
  height: 30px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

  </style>
  