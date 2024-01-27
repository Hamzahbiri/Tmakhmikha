<template>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container-flex">
        <router-link
            :to="{ name: 'Addarticle' }"
            class="btn btn-outline-light ms-4"
        >
            <i class="fa-solid fa-square-plus"></i>New
            Article</router-link
        >

        <router-link
            :to="{ name: 'Addcategorie' }"
            class="btn btn-outline-light ms-4"
        >
            <i class="fa-solid fa-square-plus"></i> New
            Categorie</router-link
        >

        <router-link
            :to="{ name: 'Addarticle' }"
            class="btn btn-outline-light ms-4"
        >
            <i class="fa-solid fa-square-plus"></i> New
            Command</router-link
        >
    </div>
</nav>

</template>
