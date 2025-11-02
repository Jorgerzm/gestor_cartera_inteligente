
# Gestor Cartera Inteligente - Backend

Proyecto backend para gestión de clientes y operaciones financieras, desarrollado en Laravel 9 y MySQL.

## Requisitos

- PHP >= 8.1
- Composer
- MySQL
- Node.js (opcional para frontend)

## Instalación

1. Clona el repositorio y entra en la carpeta `backend`.
2. Instala dependencias:
	```powershell
	composer install
	```
3. Copia el archivo de entorno:
	```powershell
	copy .env.example .env
	```
4. Configura tu base de datos en `.env`.
5. Genera la clave de la aplicación:
	```powershell
	php artisan key:generate
	```
6. Ejecuta las migraciones:
	```powershell
	php artisan migrate
	```

## Uso

Para iniciar el servidor de desarrollo:
```powershell
php artisan serve
```
El backend estará disponible en `http://localhost:8000`.

## Endpoints principales

- `/api/clientes` CRUD de clientes
- `/api/operaciones` CRUD de operaciones

## Solución de problemas

- Si tienes errores de permisos en Windows, verifica que las carpetas dentro de `storage` existen y tienen permisos de escritura.
- Si la API no responde, revisa las rutas en `routes/api.php` y los controladores.
