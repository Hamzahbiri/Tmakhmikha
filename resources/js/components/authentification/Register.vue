<template>
    <div class="SignUp-container">
        <Navbar />

        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
        <div class="card p-4">
                    <div class="card-header display-4 font-handwriting text-light mb-4 text-center">Register</div> 
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </span>
                                <input
                                    id="name"
                                    placeholder="Enter your full name"
                                    type="text"
                                    class="form-control"
                                    v-model="user.name"
                                    required
                                    autofocus
                                    autocomplete="off"
                                    @focus="onInputFocus('name')"
                                    @blur="onInputBlur('name')"
                                />
                            </div>
                         
                        </div><br>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </span>
                                <input
                                    id="email"
                                    placeholder="Enter your email address"
                                    type="email"
                                    class="form-control"
                                    v-model="user.email"
                                    required
                                    autofocus
                                    autocomplete="off"
                                    @focus="onInputFocus('email')"
                                    @blur="onInputBlur('email')"
                                />
                            </div>
                           
                        </div>
<br>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </span>
                                <input
                                    id="password"
                                    placeholder="Password must be at least 8 characters"
                                    type="password"
                                    class="form-control"
                                    v-model="user.password"
                                    required
                                    autocomplete="off"
                                />
                            </div>
                          
                        </div>
<br>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </span>
                                <input
                                    id="password_confirmation"
                                    placeholder="Confirm your password"
                                    type="password"
                                    class="form-control"
                                    v-model="user.password_confirmation"
                                    required
                                    autocomplete="off"
                                />
                            </div>
                       
                        </div>
                        <br>
                        <div class="form-group text-center mt-4">
              <button class="btn btn-outline-primary btn-lg btn-dark-mode"  @click="handleSubmit">
                Register
              </button>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import Navbar from "../Navbar.vue";
import axios from "axios";
import { ref } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
let user = {};

const handleSubmit = async () => {
    axios
        .post("http://localhost:8000/api/register/", user)
        .then((response) => {
            router.replace({ name: "Login" });
        })
        .catch((err) => {
            errmsg.value = err.response.data.message;
            console.log(errmsg.value);
        });
};
</script>

<style scoped>
.SignUp-container{
    background: url(https://res.cloudinary.com/dwvs0ycjd/image/upload/v1706352973/Tmakhmikha/back_entu1f.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    height: 750px;
    width: 100%;
}

.btn-dark-mode {
    width: 250px;
    height: 50px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    margin-bottom: 20px;
}
.fa-envelope,.fa-user,
.fa-lock {
    font-size: 24px;
}
.card {
    background-color: transparent;
}
.font-handwriting {
    font-family: "Dancing Script", cursive;
}

</style>
