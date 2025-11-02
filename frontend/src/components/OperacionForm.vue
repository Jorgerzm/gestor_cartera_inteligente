<script setup>
import { ref, onMounted } from 'vue';

const cliente_id = ref('');
const tipo = ref('');
const monto = ref('');
const fecha = ref('');
const estado = ref('');
const mensaje = ref('');
const clientes = ref([]);
const idEditar = ref(null);

onMounted(async () => {
  const res = await fetch('http://localhost:8000/api/clientes');
  clientes.value = await res.json();
});

async function crearOperacion() {
  mensaje.value = '';
  try {
    const res = await fetch('http://localhost:8000/api/operaciones', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ cliente_id: cliente_id.value, tipo: tipo.value, monto: monto.value, fecha: fecha.value, estado: estado.value })
    });
    if (res.ok) {
      mensaje.value = 'Operación creada correctamente';
      cliente_id.value = tipo.value = monto.value = fecha.value = estado.value = '';
      idEditar.value = null;
    } else {
      const data = await res.json();
      mensaje.value = data.message || 'Error al crear operación';
    }
  } catch (e) {
    mensaje.value = 'Error de conexión';
  }
}

async function editarOperacion() {
  mensaje.value = '';
  const res = await fetch(`http://localhost:8000/api/operaciones/${idEditar.value}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ cliente_id: cliente_id.value, tipo: tipo.value, monto: monto.value, fecha: fecha.value, estado: estado.value })
  });
  if (res.ok) {
    mensaje.value = 'Operación actualizada';
    cliente_id.value = tipo.value = monto.value = fecha.value = estado.value = '';
    idEditar.value = null;
  } else {
    mensaje.value = 'Error al actualizar operación';
  }
}

function cargarParaEditar(op) {
  idEditar.value = op.id;
  cliente_id.value = op.cliente_id;
  tipo.value = op.tipo;
  monto.value = op.monto;
  fecha.value = op.fecha;
  estado.value = op.estado;
}
</script>

<template>
  <div>
    <h3>Crear Operación</h3>
    <form @submit.prevent="crearOperacion">
      <select v-model="cliente_id" required>
        <option value="" disabled>Selecciona cliente</option>
        <option v-for="c in clientes" :key="c.id" :value="c.id">{{ c.nombre }}</option>
      </select>
      <input v-model="tipo" placeholder="Tipo" required />
      <input v-model="monto" placeholder="Monto" required type="number" step="0.01" />
      <input v-model="fecha" placeholder="Fecha" required type="date" />
      <input v-model="estado" placeholder="Estado" />
      <button type="submit">Crear</button>
    </form>
    <div v-if="mensaje">{{ mensaje }}</div>
  </div>
</template>

<style scoped>
form { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 8px; }
input, select { padding: 4px; }
button { padding: 4px 12px; }
</style>
