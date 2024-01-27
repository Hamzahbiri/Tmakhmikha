<template>
    <div>
        <div v-if="isLoading">
            <h2>Loading ....</h2>
        </div>
        <div v-else >
          <div class="bg-dark"><Navbar/></div>
           <Options/>
            <table class="table table-striped table-dark shadow-lg">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Description</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="art in articles" :key="art.id">
                        <td>
                            <img :src="art.imageart" width="150" height="150" />
                        </td>

                        <td>{{ art.nomarticle }}</td>
                        <td>{{ art.description }}</td>
                        <td>{{ getCategoryName(art.categorieID) }}</td>
                        <td>{{ art.prix }}</td>
                        <td>
                      
                          
                            <Editarticle :art="art" />
                        
                        </td>
                        <td>
                            <button
                                class="btn btn-outline-danger mx-2"
                                @click="deletearticle(art.id)"                            >
                                <i class="fa-solid fa-trash-can"></i>
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import api from "../config/api.js"; 
import Navbar from "../Navbar.vue";
import Options from "../Options.vue";

import Editarticle from "./Editarticle.vue";
import { ref, onMounted } from "vue";
import axios from "axios";

const articles = ref([]);
const categories = ref([]);
const isLoading = ref(true);
const getarticles = async () => {
    await axios
        .get("http://localhost:8000/api/articles")
        .then((res) => {
            articles.value = res.data;
            isLoading.value = false;
        })
        .catch((error) => {
            console.log(error);
        });
};
onMounted(() => {
    getarticles();
    getCategories();
});
const deletearticle = async (id) => {
    try {
        await axios.delete(`http://localhost:8000/api/articles/${id}`);

        getarticles();
    } catch (error) {
        console.log(error);
    }
};

const getCategories = async () => {
    try {
        const response = await axios.get(
            "http://localhost:8000/api/categories"
        );
        categories.value = response.data;
    } catch (error) {
        console.log(error);
    }
};

const getCategoryName = (categorieID) => {
    const category = categories.value.find((cat) => cat.id === categorieID);
    return category ? category.nomcategorie : "";
};
</script>
<style scoped>



</style>
