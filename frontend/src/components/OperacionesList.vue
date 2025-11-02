<script setup>
import { ref, onMounted } from 'vue';
import { getOperaciones } from '../services/api';

const operaciones = ref([]);
const loading = ref(true);
const mensaje = ref('');

async function cargarOperaciones() {
  operaciones.value = await getOperaciones();
}

async function eliminarOperacion(id) {
  mensaje.value = '';
  const res = await fetch(`http://localhost:8000/api/operaciones/${id}`, { method: 'DELETE' });
  if (res.ok) {
    mensaje.value = 'Operación eliminada';
    await cargarOperaciones();
  } else {
    mensaje.value = 'Error al eliminar operación';
  }
}

onMounted(async () => {
  await cargarOperaciones();
  loading.value = false;
});
</script>

<template>
  <div>
    <h2>Lista de Operaciones</h2>
    <div v-if="loading">Cargando...</div>
    <ul v-else>
      <li v-for="op in operaciones" :key="op.id">
        Cliente: {{ op.cliente?.nombre || 'Sin cliente' }} | Tipo: {{ op.tipo }} | Monto: {{ op.monto }} | Fecha: {{ op.fecha }}
        <button @click="eliminarOperacion(op.id)">Eliminar</button>
        <button @click="$emit('editar', op)">Editar</button>
      </li>
    </ul>
    <div v-if="mensaje">{{ mensaje }}</div>
  </div>
</template>

<style scoped>
ul { list-style: none; padding: 0; }
li { margin-bottom: 8px; }
</style>
