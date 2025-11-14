## RUTA DE DESCARGA
- Para desplegar el proyecto descargarlo en la carpeta de xampp
- Guardar en xampp/htdocs
- Desplegar el servicio de apache en xampp
  
## GENERAR LLAVE 
- Abrir la terminal en el proyecto "SENA"
- Ejecutar el comando "copy .env.example .env"
- Crear la llave "php artisan key:generate"

## INTERACCION
- Al ingresar al "localhost/SENA/public/" podemos presionar el boton de login
  para intecturar con las otras pestañas o tambien podemos interactuar con las diferentes rutas.
- Si interactuas con los botones, seras llevado a "http://localhost/SENA/public/iniciar-sesion", alli debes interactuar con "¿No tienes cuenta? Registrate"
- Si presionas iniciar sesion fallara, porque no se creo ninguna funcionalidad para ese boton, ni redireciona a ningun lado

- Puede jugar con el formulario de registro, presionando el boton sin llenar los campos y luego selecionando cualquiera de las 2 tarjetas que aparecen 

## ENDPOINTS 
- Cuando una url espera una variable "{id}" borramos las llaves y colocamos un numero, para que funcione
- Se puede ingresar cualquier numero, no hay un numero fijo, no hay validacion momentanea
  
localhost/SENA/public/
localhost/SENA/public/calificar
localhost/SENA/public/configuracion
localhost/SENA/public/crear
localhost/SENA/public/detalles-trabajo
localhost/SENA/public/iniciar-sesion
localhost/SENA/public/listar
localhost/SENA/public/moderador
localhost/SENA/public/notifications
localhost/SENA/public/profesionales
localhost/SENA/public/profesionales/{id}
localhost/SENA/public/professional/PendingTask
localhost/SENA/public/professional/buscarTarea
localhost/SENA/public/professional/configuracion
localhost/SENA/public/professional/notification
localhost/SENA/public/recuperar-password
localhost/SENA/public/registro
localhost/SENA/public/registro-empresa
localhost/SENA/public/registro-profesional
localhost/SENA/public/rol
localhost/SENA/public/storage/{path}
localhost/SENA/public/up
