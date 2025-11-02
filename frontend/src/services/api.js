export async function getClientes() {
  const res = await fetch('http://localhost:8000/api/clientes');
  return await res.json();
}

export async function getOperaciones() {
  const res = await fetch('http://localhost:8000/api/operaciones');
  return await res.json();
}
