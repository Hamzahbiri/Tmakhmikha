<template>
    <div class="col-md-6 offset-md-3 mt-4">
      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          <h4 class="card-title text-center m-0">Ajout Article</h4>
        </div>
        <div class="card-body">
          <form @submit.prevent="addArticle">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" v-model="article.nomarticle" required>
              </div>
              <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" v-model="article.description" required>
              </div>
            </div>
  
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="prix" class="form-label">Prix</label>
                <input type="text" class="form-control" id="prix" v-model="article.prix" required>
              </div>
              <div class="col-md-6">
                <label for="categorie" class="form-label">Catégorie</label>
                <select class="form-control" v-model="article.categorieID" required>            
                  <option v-for="sc in categories" :key="sc.id" :value="sc.id">{{ sc.nomcategorie }}</option>
                </select>
                
              </div>
            </div>
  
            <div class="row mb-3">
              <div class="col-md-12">
                <label for="imageart" class="form-label">Image</label>
                <input type="text" class="form-control" id="imageart" v-model="article.imageart" required>
              </div>
            </div>
  
            <div class="text-center">
              <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-floppy-disk"></i> Enregistrer
              </button>
              <router-link to="/administration" class="btn btn-danger mx-2">
                <i class="fa-solid fa-xmark"></i> Annuler
              </router-link>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>
  
<script setup>

 
import {ref, onMounted} from "vue"
import {useRouter} from "vue-router"
import axios from "axios"

const article = ref({})
const categories = ref({})
const router = useRouter();

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

const addArticle=async()=>{
    try{
        await axios.post(`http://localhost:8000/api/articles`,article.value)
        .then(()=>
        {
            router.push("/administration")
        })
    }catch(error){
        console.log(error);
    }

}

const categoryOptions = ref([]);

const fetchCategories = async () => {
  try {
    const response = await axios.get('http://localhost:8000/api/categories');
    categories.value = response.data;
    categoryOptions.value = categories.value.map((category) => ({ label: category.nomcategorie, value: category.id }));
  } catch (error) {
    console.error(error);
  }
};

onMounted(fetchCategories);
</script>

<style scoped>
</style>