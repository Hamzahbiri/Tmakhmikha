<template>
    <div class="marge">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Login</div>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">E-mail</label>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" class="form-control" v-model="user.email"
                                    required autofocus aotocomplete="off">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-md-right">Mot De Passe</label>
                            <div class="col-md-6">
                                <input type="password" name="password" id="password" class="form-control"
                                    v-model="user.password" required aotocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">

                                <button class="btn btn-primary" @click="handleLogin">
                                    Login
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from 'axios';
import { useRouter } from 'vue-router';
const router = useRouter();
let user = {}
const handleLogin = async () => {
    axios.post('http://localhost:8000/api/login/', user)
        .then((response) => {
            router.push({name:"Accueil"})
            localStorage.setItem('user', response.data.user.name)
            localStorage.setItem('token', response.data.token)
        })
        .catch(err => {
            console.log(err);
            alert(err)
        })

}

</script>

<style scoped></style>