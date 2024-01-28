<template>
    <div class="card flex justify-content-center">
      <Toast />
      <Button
        label="Order now"
        severity="warning"
        @click="showMultiple"
        :disabled="!isAuthenticated"
      />
    </div>
  </template>
  
  <script setup>
  import Button from 'primevue/button';
  import Toast from 'primevue/toast';
  import { useToast } from "primevue/usetoast";
  let isAuthenticated = false; 

if (localStorage.getItem('token'))
{
  isAuthenticated = true; 
}



  const toast = useToast();
  
  const showMultiple = () => {
    toast.add({ severity: 'info', summary: 'Info', detail: 'Order Successful !', life: 3050 });
  };
  



  </script>
  