# Gestor Inteligente de Cartera

Proyecto full stack para la gestión de cartera de clientes y operaciones financieras. Incluye backend en Laravel, frontend en Vue 3 + TypeScript y despliegue con Docker.

## Estructura del proyecto
```
gestor-cartera-inteligente/
├── backend/   # API Laravel
├── frontend/  # SPA Vue 3 + TypeScript
├── docker/    # Configuración Docker Compose
└── README.md  # Documentación general
```

## Tecnologías utilizadas
- **Backend:** PHP (Laravel 9)
- **Frontend:** Vue 3 + TypeScript
- **Base de datos:** MySQL/PostgreSQL
- **Docker:** Para desarrollo y despliegue local
- **Pruebas:** PHPUnit (backend), Jest (frontend)
- **Control de versiones:** Git

## Instalación rápida
1. Clona el repositorio y entra en la carpeta del proyecto:
   ```sh
   git clone https://github.com/Jorgerzm/gestor_cartera_inteligente.git
   cd gestor-cartera-inteligente
   ```
2. Levanta los servicios con Docker:
   ```sh
   cd docker
   docker-compose up --build
   ```
3. Accede a la aplicación web en `http://localhost:8080` y a la API en `http://localhost:8000`

## Instalación manual

### Backend (Laravel)
1. Entra en la carpeta `backend`.
2. Instala dependencias:
   ```sh
   composer install
   ```
3. Copia el archivo de entorno:
   ```sh
   cp .env.example .env
   ```
4. Configura tu base de datos en `.env`.
5. Genera la clave de la aplicación:
   ```sh
   php artisan key:generate
   ```
6. Ejecuta las migraciones:
   ```sh
   php artisan migrate
   ```
7. Inicia el servidor:
   ```sh
   php artisan serve
   ```
   Accede a `http://localhost:8000`

### Frontend (Vue 3)
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

## Endpoints principales
- `/api/clientes` CRUD de clientes
- `/api/operaciones` CRUD de operaciones

## Configuración y recomendaciones
- El archivo `frontend/src/services/api.js` contiene la URL base para la API. Modifícalo si cambias el puerto o el host del backend.
- Usa [VS Code](https://code.visualstudio.com/) + [Vue (Official)](https://marketplace.visualstudio.com/items?itemName=Vue.volar)
- Instala [Vue.js devtools](https://chromewebstore.google.com/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd)

## Compilar para producción
- Backend: sigue la documentación de Laravel para despliegue.
- Frontend:
   ```sh
   npm run build
   ```
