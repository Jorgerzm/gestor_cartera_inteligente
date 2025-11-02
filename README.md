
# Frontend - Gestor Inteligente de Cartera

SPA desarrollada en Vue 3 + TypeScript para la gestión de clientes y operaciones financieras. Se conecta al backend Laravel vía API REST.

## Características
- Listado y gestión de clientes y operaciones (CRUD)
- Integración con backend Laravel
- Estilos modernos y componentes reutilizables

## Instalación
1. Entra en la carpeta `frontend`.
2. Instala dependencias:
   ```sh
   npm install
   ```
3. Ejecuta el servidor de desarrollo:
   ```sh
   npm run dev
   ```
   Accede a `http://localhost:5173`

## Uso con Docker
Puedes levantar el frontend junto al backend usando Docker Compose:
```sh
cd ../docker
docker-compose up --build
```
El frontend estará disponible en `http://localhost:8080`.

## Configuración
- El archivo `src/services/api.js` contiene la URL base para la API. Modifícalo si cambias el puerto o el host del backend.

## Recomendaciones de desarrollo
- Usa [VS Code](https://code.visualstudio.com/) + [Vue (Official)](https://marketplace.visualstudio.com/items?itemName=Vue.volar)
- Instala [Vue.js devtools](https://chromewebstore.google.com/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd)

## Compilar para producción
```sh
npm run build
```

