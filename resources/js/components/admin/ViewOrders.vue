<template>
    <div>
        <div v-if="isLoading">
            <h2>Loading ....</h2>
        </div>
        <div v-else>
            <div class="bg-dark">
                <Navbar />
            </div>
            <Options />
            <table class="table table-striped table-dark shadow-lg">
                <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">client</th>
                        <th scope="col">Items</th>
                        <th scope="col">Prix Total</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="order in orders" :key="order.id">

                        <td>{{ order.id }}</td>
                        <td>{{ getUserName(order.user_id) }}</td>
                        <td>{{ getItems(order.id) }}</td>
                        <td>{{ getPrixTotal(order.id)}}</td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import Navbar from "../Navbar.vue";
import Options from "../Options.vue";

import { ref, onMounted } from "vue";
import axios from "axios";

const orders = ref([]);
const articles = ref([]);
const items = ref([]);
const users = ref([]);
const isLoading = ref(true);
const getOrders = async () => {
    await getarticles();
    await getUsers();
    await getOrderItems();
    await axios
        .get("http://localhost:8000/api/orders")
        .then((res) => {
            orders.value = res.data;
            isLoading.value = false;
        })
        .catch((error) => {
            console.log(error);
        });
};

const getOrderItems = async () => {
    await axios
        .get("http://localhost:8000/api/orderItems")
        .then((res) => {
            items.value = res.data;
        })
        .catch((error) => {
            console.log(error);
        });
};

const getarticles = async () => {
    await axios
        .get("http://localhost:8000/api/articles")
        .then((res) => {
            articles.value = res.data;
        })
        .catch((error) => {
            console.log(error);
        });
};


const getUsers = async () => {
    await axios
        .get("http://localhost:8000/api/users")
        .then((res) => {
            users.value = res.data;
        })
        .catch((error) => {
            console.log(error);
        });
};

onMounted(() => {

    getOrders();
    console.log(orders.value);
});


const getUserName = (user_id) => {
    const user = users.value.find((usr) => usr.id === user_id);
    return user ? user.name : "";
};

const getItems = (order_id) => {
    const concerned = items.value.filter((itm) => itm.order_id === order_id);
    const concerned_articles = concerned.map(item => item.article_id);
    const order_articles = articles.value.filter((art) => concerned_articles.includes(art.id)).map(art => art.nomarticle)
    return order_articles.join(",");
}


const getPrixTotal = (order_id)=>{
    const concerned = items.value.filter((itm) => itm.order_id === order_id);
    const concerned_articles = concerned.map(item => item.article_id);
    return articles.value.filter((art) => concerned_articles.includes(art.id)).map(art => art.prix).map(Number).reduce((partialSum, a) => partialSum + a, 0);
}
</script>
<style scoped></style>
