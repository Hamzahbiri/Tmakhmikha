<template>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap">


<div class="home-container">  
    <div class="Menu-container  ">  
  
    <Navbar/>       
    <div class="menu-section text-center">
      <h1 class="display-2 font-handwriting text-light mb-4">The Menu</h1>

      <div v-if="isLoading" class="loading-spinner"></div>
      </div>
      <Card/>
      
      <div class="container mt-3">
      <div v-for="category in categories" :key="category.id">
      <h2 class="mt-4 text-light">Nos {{ category.nomcategorie }}</h2>

      <div class="row">
        <div class="col-md-4 " v-for="art in filteredArticles(category.id)" :key="art.id">
          <div class="card mb-4 sh">
            <Image :src="art.imageart" class="card-img-top" alt="Image" width="415" height="350" preview/>
            <div class="card-body">
              <h5 class="card-title">{{ art.nomarticle }}</h5>
              <p class="card-text">{{ art.description }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <p class="card-text " ><strong>{{ art.prix }} $</strong></p>
                <ButtonAdd/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
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
.Menu-container {
  background:url(https://res.cloudinary.com/dwvs0ycjd/image/upload/v1706352973/Tmakhmikha/back_entu1f.jpg);
     background-repeat: no-repeat;
     background-size:cover;
     background-position: center;
    color: #ffffff; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    
    width: 100%;
  }
  .font-handwriting {
    font-family: 'Dancing Script', cursive;
}
.btnadd{
    width: 120px;

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
.loading-spinner {
  position: relative;
  left: 50%;
  border: 4px solid rgba(0, 0, 0, 0.1);
  border-radius: 50%;
  border-top: 4px solid #fdcc02; /* Use your brand color */
  width: 50px;
  height: 50px;
  animation: spin 1s linear infinite;
}
.btn:hover {
  transform: scale(1.1);
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.sh{
  box-shadow: 2px 2px 8px white;
}
.sht{
  text-shadow: 1px 1px 6px white;
}
.card-text{
  font-size: 14px;
 font-family:'Times New Roman', Times, serif;
}
</style>