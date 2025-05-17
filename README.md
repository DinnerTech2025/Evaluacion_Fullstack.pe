# Proyecto Laravel: Envío Masivo de Correos de Bienvenida

Este proyecto Laravel genera usuarios falsos y envía correos de bienvenida a 500 usuarios aleatorios usando colas para un procesamiento eficiente.

---

## Requisitos previos

Antes de comenzar, asegúrate de tener instalado:

-   PHP 8 o superior
-   Composer
-   Base de datos MySQL (u otra compatible)
-   Node.Js

---

## Instrucciones paso a paso para ejecutar el proyecto

### 1. Clonar el repositorio

Abre la terminal y clona el repositorio con:

```bash
git clone <URL_DEL_REPOSITORIO>
cd <NOMBRE_CARPETA_DEL_PROYECTO>
```

### 2. Instalar dependencias de PHP

usando el comando composer install

### 3. Configuracion del .env

Copiar los datos de .env.example a .env

### 4. Modifica los datos para la coneccion a Base de datos

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña

### 5. Genera una clave de Aplicacion

php artisan key:generate

### 6. Migra las tablas

php artisan migrate

### 7. Carga los 10000 Usuarios

php artisan db:seed --class=UserSeeder

### 8. Ejecutamos el worker para procesar la cola

php artisan queue:work

### 9. Enviamos los 500 correos a usuarios aleatorios

php artisan send:welcome-emails

### 10. Instalamos las dependencias de Node.Js (OPCIONAL)

npm install
