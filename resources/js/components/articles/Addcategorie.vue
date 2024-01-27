<template>
    <div class="col-md-6 offset-md-3 mt-4">
      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          <h4 class="card-title text-center m-0">Ajout Categorie</h4>
        </div>
        <div class="card-body">
          <form @submit.prevent="addCategorie">
            <div class="mb-3">
              <label for="nom" class="form-label">Nom Categorie</label>
              <input type="text" class="form-control" id="nom" v-model="categorie.nomcategorie" required>
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
  import { ref } from 'vue';
  import { useRouter } from 'vue-router';
  import axios from 'axios';
  
  const categorie = ref({ nomcategorie: '' });
  const router = useRouter();
  
  const addCategorie = async () => {
    try {
      await axios.post('http://localhost:8000/api/categories', categorie.value);
      router.push('/administration');
    } catch (error) {
      console.error(error);
    }
  };
  </script>
  
  <style scoped>

  </style>
  