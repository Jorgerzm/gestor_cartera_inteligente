
<script setup>
import { ref, onMounted } from 'vue';
import ClienteForm from './components/ClienteForm.vue';
import OperacionForm from './components/OperacionForm.vue';
import ClientesList from './components/ClientesList.vue';
import OperacionesList from './components/OperacionesList.vue';

const pingMessage = ref('Cargando...');

onMounted(async () => {
  try {
    const res = await fetch('http://localhost:8000/api/ping');
    const data = await res.json();
    pingMessage.value = data.message;
  } catch (e) {
    pingMessage.value = 'Error al conectar con el backend';
  }
});
</script>

<template>
  <h1>Frontend Vue 3 + Backend Laravel</h1>
  <p>
    <strong>API /api/ping:</strong> {{ pingMessage }}
  </p>
  <ClienteForm />
  <ClientesList />
  <OperacionForm />
  <OperacionesList />
  <p>
    Visit <a href="https://vuejs.org/" target="_blank" rel="noopener">vuejs.org</a> to read the documentation
  </p>
</template>

<style scoped></style>
