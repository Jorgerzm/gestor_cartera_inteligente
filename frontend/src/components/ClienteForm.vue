<script setup>
import { ref } from 'vue';

const nombre = ref('');
const email = ref('');
const telefono = ref('');
const direccion = ref('');
const mensaje = ref('');

async function crearCliente() {
const idEditar = ref(null);
  mensaje.value = '';
  try {
    const res = await fetch('http://localhost:8000/api/clientes', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ nombre: nombre.value, email: email.value, telefono: telefono.value, direccion: direccion.value })
    });
    if (res.ok) {
      mensaje.value = 'Cliente creado correctamente';
      nombre.value = email.value = telefono.value = direccion.value = '';
    } else {
      const data = await res.json();
      idEditar.value = null;
      mensaje.value = data.message || 'Error al crear cliente';
    }
  } catch (e) {
    mensaje.value = 'Error de conexión';
  }
}
</script>

async function editarCliente() {
  mensaje.value = '';
  const res = await fetch(`http://localhost:8000/api/clientes/${idEditar.value}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ nombre: nombre.value, email: email.value, telefono: telefono.value, direccion: direccion.value })
  });
  if (res.ok) {
    mensaje.value = 'Cliente actualizado';
    nombre.value = email.value = telefono.value = direccion.value = '';
    idEditar.value = null;
  } else {
    mensaje.value = 'Error al actualizar cliente';
  }
}

function cargarParaEditar(cliente) {
  idEditar.value = cliente.id;
  nombre.value = cliente.nombre;
  email.value = cliente.email;
  telefono.value = cliente.telefono;
  direccion.value = cliente.direccion;
}
<template>
  <div>
    <h3>Crear Cliente</h3>
    <form @submit.prevent="crearCliente">
      <input v-model="nombre" placeholder="Nombre" required />
      <input v-model="email" placeholder="Email" required type="email" />
      <input v-model="telefono" placeholder="Teléfono" />
      <input v-model="direccion" placeholder="Dirección" />
      <button type="submit">Crear</button>
    </form>
    <div v-if="mensaje">{{ mensaje }}</div>
  </div>
</template>

<style scoped>
form { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 8px; }
input { padding: 4px; }
button { padding: 4px 12px; }
</style>
