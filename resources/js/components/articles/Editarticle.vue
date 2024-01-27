<template>

  <button class="btn btn-outline-primary mx-2" @click="visible= true">
   <i class="fa-solid fa-pen-to-square"></i>
  Edit
  </button>
  <Dialog
  v-model:visible="visible"  >
  <div class="row">
  <div class="col-md-6">.
  <label for="reference" class="form-label">Nom</label>
  
  <input type="text" class="form-control" id="reference" v-model="article.nomarticle">
  
  </div>
  <div class="col-md-6 ms-auto">
  <label for="designation" class="form-label">Description</label>
  
  <input type="texte" class="form-control" id="designation" v-model="article.description">
  </div>
  </div>
  <div class="row">
  <div class="col-md-6">.
  <label for="marque" class="form-label">Prix</label>
  <input type="text" class="form-control" id="marque" v-model="article.prix">
  </div>

  <div class="col-md-6 ms-auto">
<label for="categorie" class="form-label">Catégorie</label>
<select class="form-control" v-model="article.categorieID">
<option v-for="sc in categories" :key="sc.id" :value=sc.id>{{ sc.nomcategorie }}</option>
</select>
</div>
</div>

<div class="row">
<file-pond name="test" ref="pond" class-name="my-pond" label-idle="Drop files here..." allow-multiple="false"
accepted-file-types="image/jpeg, image/png" v-bind:files="myFiles" v-on:init="handleFilePondInit"
:server="serverOptions()"
/>
</div>
<br/>
<button type="submit" className="btn btn-outline-primary" @click="modifierproduit">
<i class="fa-solid fa-floppy-disk"></i>Enregister
</button>
<button type="button" className="btn btn-outline-primary" @click="cancel">
<i class="fa-solid fa-floppy-disk"></i>cancel
</button>

</Dialog>

</template>
<script setup>
import api from '../config/api.js';
import { ref,onMounted } from "vue"
import vueFilePond from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import Dialog from 'primevue/dialog';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
const FilePond = vueFilePond(FilePondPluginImagePreview);
const myFiles = ref([]);
const props=defineProps(['art'])
const visible = ref(false);
const article=ref({})
const Scategories = ref([]);
const getscategories=async()=>{

await api.get('/api/scategories').then(res => {
Scategories.value = res.data;
}).catch(error => {
console.log(error)
});
}

const handleFilePondInit = async() => {
if (article.value.imageart) {
myFiles.value = [
{
source: article.value.imageart,
options: { type: 'local' }
}
]
}
}
const loadarticle=()=>{
article.value=props.art
}
onMounted(() => {
getscategories();
loadarticle()
}

);
const modifierproduit=()=>{
api.put(`/api/articles/${article.value.id}`,article.value)
.then(() => {
visible.value=false
})
.catch(error => {
console.error("There was an error!", error);})

}
const cancel=()=>{visible.value=false
}
const serverOptions = () => { console.log('server pond');
return {
load: (source, load, error, progress, abort, headers) => {
var myRequest = new Request(source);
fetch(myRequest).then(function(response) {
response.blob().then(function(myBlob) {
load(myBlob);
});
});
},

process: (fieldName, file, metadata, load, error, progress, abort) => {
const data = new FormData();
            data.append("file", file);
            data.append("upload_preset", "iitsoir2024");
            data.append("cloud_name", "dwvs0ycjd");
            data.append("public_id", file.name);
  axios.post('https://api.cloudinary.com/v1_1/dwvs0ycjd/upload',data)
.then((response) => response.data)
.then((data) => {
article.value.imageart = data.url;
load(data);
})
.catch((error) => {
console.error('Error uploading file:', error);
error('Upload failed');
abort();
});
},
};
};
</script>
<style scoped>
</style>