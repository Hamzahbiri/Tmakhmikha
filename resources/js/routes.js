import Accueil from './components/Accueil.vue';
import Viewarticles from "./components/articles/Viewarticles.vue";
import Addarticle from "./components/articles/Addarticle.vue";
import Addcategorie from "./components/articles/Addcategorie.vue";
import Editarticle from "./components/articles/Editarticle.vue";
export const routes = [

{
    name: 'Accueil',
    path: '/',
    component: Accueil
},
{
    name:"Viewarticles",
    path:"/administration",
    component:Viewarticles
},
{
    name:"Addarticle",
    path:"/addarticle",
    component:Addarticle
}
,
{
    name:"Editarticle",
    path:"/Editarticle",
    component:Editarticle
}
,
{
    name:"Addcategorie",
    path:"/addcategorie",
    component:Addcategorie
}


];