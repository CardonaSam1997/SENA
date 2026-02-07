## RUTA DE DESCARGA
1. Descargar el proyecto git clone https://github.com/CardonaSam1997/SENA.git

## Tecnologías y Librerías Utilizadas

## Arquitectura del Proyecto

El proyecto utiliza una arquitectura híbrida:

- **API REST** – Consumo mediante endpoints protegidos con Laravel Sanctum
- **Web (Blade)** – Renderizado de vistas para interacción directa

### Backend
- **Laravel (API + Web)** – Backend y servicios REST
- **Laravel Sanctum** – Autenticación para API

- **Laravel** – Framework backend
- **MySQL** – Base de datos relacional
- **Laravel Sanctum** – Autenticación por tokens
- **Laravel Auth** – Sistema de autenticación
- **Laravel Notifications** – Envío de notificaciones
- **Laravel Mail** – Envío de correos electrónicos
- **Laravel CORS** – Configuración de CORS

### Frontend
- **Blade** – Motor de plantillas de Laravel
- **Bootstrap** – Estilos y componentes UI
- **SweetAlert2** – Alertas y notificaciones visuales

### Infraestructura
- **Docker** – Contenerización del proyecto


  
## GENERAR LLAVE 
1. Abrir la terminal en el proyecto "SENA"
2. Ejecutar el comando "copy .env.example .env"
3. Descargar librerias con el comando "composer install"
4. Crear la llave "php artisan key:generate"
5. Desplegamos mysql y creamos la BD "bussines_task"
6. Ejecutamos el comando "php artisan migrate:refresh --seed para crear las tablas de BD e insertar datos ficticios"
7. Desplegamos el proyecto con "php artisan serve --host=0.0.0.0 --port=8000"
8. Abrimos el navegador y accedemos a "localhost:8000"

## ENDPOINTS API
Base
http://localhost:8000/api

```
Test

Endpoint de prueba
GET → http://localhost:8000/api/test
```

```
Autenticación

Iniciar sesión
POST → http://localhost:8000/api/login

JSON
{     
    "email":"empresa2@mail.com",
    "password":"123"
}
```

```
Registro

Registrar usuario
POST → http://localhost:8000/api/register

{
    "username":"pepe32",
    "email":"pepe32@gmail.com",
    "password":"123456*",
    "password_confirmation": "123456*"    
}

Obtener rol del usuario
GET → http://localhost:8000/api/register/{user}/role

Registrar profesional
POST → http://localhost:8000/api/register/{user}/professional

{
  "document": "1248569",
  "name": "Samuel",
  "last_name": "Cardona",
  "birth_date": "1998-05-10",
  "address": "Calle 123",
  "experience": 3,
  "service_type": "software",
  "academic_education": "Ingeniería de Sistemas",
  "gender": "M",
  "age": "26"
}

Registrar empresa
POST → http://localhost:8000/api/register/{user}/company

{
  "nit": "900123456",
  "name": "Tech Solutions",
  "address": "Av Siempre Viva 742",
  "service_type": "tecnologia",
  "web": "https://techsolutions.com"
}
```

```
Usuarios
Cambiar contraseña (Auth: Sanctum)
PUT → http://localhost:8000/api/users/change-password


```

```
Empresa – Tareas

(Auth: Sanctum + role: company)

Listar tareas
GET → http://localhost:8000/api/company/tasks

Crear tarea
POST → http://localhost:8000/api/company/tasks

### Body (form-data)
 ______________________________________________________
| Key              | Tipo    | Descripción             |
|------------------|---------|-------------------------|
| title            | string  | Título de la tarea      |
| area             | string  | Área o categoría        |
| content          | string  | Descripción de la tarea |
| money            | string  | Pago ofrecido           |
| expiration_date  | string  | Fecha de expiración     |
| files[]          | file    | Archivos adjuntos       |
 ------------------------------------------------------

Actualizar tarea
PUT → http://localhost:8000/api/company/tasks/{task}

### Body (form-data)
 ______________________________________________________
| Key              | Tipo    | Descripción             |
|------------------|---------|-------------------------|
| title            | string  | Título de la tarea      |
| area             | string  | Área o categoría        |
| content          | string  | Descripción de la tarea |
| money            | string  | Pago ofrecido           |
| expiration_date  | string  | Fecha de expiración     |
| files[]          | file    | Archivos adjuntos       |
 ------------------------------------------------------

Eliminar tarea
DELETE → http://localhost:8000/api/company/tasks/{task}
```




## IMPORTANTE
Importante (no olvidar)

El scheduler solo funciona si el cron del servidor está activo:

* * * * * php /ruta/a/tu/proyecto/artisan schedule:run