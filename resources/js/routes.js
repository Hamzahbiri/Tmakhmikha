import Accueil from './components/Accueil.vue';
import Viewarticles from "./components/articles/Viewarticles.vue";
import Addarticle from "./components/articles/Addarticle.vue";
import Addcategorie from "./components/articles/Addcategorie.vue";
import Editarticle from "./components/articles/Editarticle.vue";
import AboutUS from "./components/AboutUs.vue";
import Menu from "./components/Menu.vue";
import Hero from "./components/Hero.vue";
import Options from "./components/Options.vue";
export const routes = [

{
    name: 'Accueil',
    path: '/',
    component: Accueil
},
{
    name:"Menu",
    path:"/Menu",
    component:Menu
}
,
{
    name:"Options",
    path:"/Options",
    component:Options
}
,
{
    name:"Hero",
    path:"/Hero",
    component:Hero
}
,
{
    name:"Viewarticles",
    path:"/administration",
    component:Viewarticles
},
{
    name:"AboutUS",
    path:"/AboutUS",
    component:AboutUS
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