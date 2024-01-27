
<template>
    <div class="card flex justify-content-center">
        <Toast />
        <Button label="Order now" severity="warning" @click="showMultiple()" />
    </div>
</template>

<script setup>

import Button from 'primevue/button';

import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast";
const toast = useToast();

const showMultiple = () => {
    toast.add({ severity: 'info', summary: 'Info', detail: 'Order Successful !', life: 3050 });
};
</script>
