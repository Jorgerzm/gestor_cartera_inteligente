<script setup>
import { ref, onMounted } from 'vue';
import { getClientes } from '../services/api';

const clientes = ref([]);
const loading = ref(true);
const mensaje = ref('');

async function cargarClientes() {
  clientes.value = await getClientes();
}

async function eliminarCliente(id) {
  mensaje.value = '';
  const res = await fetch(`http://localhost:8000/api/clientes/${id}`, { method: 'DELETE' });
  if (res.ok) {
    mensaje.value = 'Cliente eliminado';
    await cargarClientes();
  } else {
    mensaje.value = 'Error al eliminar cliente';
  }
}

onMounted(async () => {
  await cargarClientes();
  loading.value = false;
});
</script>

<template>
  <div>
    <h2>Lista de Clientes</h2>
    <div v-if="loading">Cargando...</div>
    <ul v-else>
      <li v-for="cliente in clientes" :key="cliente.id">
        {{ cliente.nombre }} - {{ cliente.email }}
        <button @click="eliminarCliente(cliente.id)">Eliminar</button>
        <button @click="$emit('editar', cliente)">Editar</button>
      </li>
    </ul>
    <div v-if="mensaje">{{ mensaje }}</div>
  </div>
</template>

<style scoped>
ul { list-style: none; padding: 0; }
li { margin-bottom: 8px; }
</style>
