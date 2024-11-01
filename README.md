
# Proyecto Joonik

Esta guía te ayudará a configurar y ejecutar La prueba técnica de Joonik utilizando Docker Compose. Asegúrate de tener instalados Docker y Docker Compose en tu sistema.

## Prerrequisitos

- Docker
- Docker Compose

## Instrucciones para la puesta en marcha

1. **Clona el repositorio**:
   ```bash
   git clone https://github.com/luiseah/Joonik.git
   cd Joonik
   ```

2. **Construye y levanta los servicios**:
   Ejecuta Docker Compose para construir y levantar todos los servicios:
   ```bash
   docker compose up --build
   ```
   Este comando construirá y levantará cada servicio definido en `docker-compose.yml`.

3. **Configuración de Hosts**:
   Asegúrate de añadir las siguientes entradas en tu archivo `/etc/hosts` para poder acceder a los servicios por los dominios locales configurados:

   ```bash
   127.0.0.1 backend.local
   127.0.0.1 frontend.local
   ```

   Esto permitirá que las solicitudes desde el navegador o herramientas como Postman se resuelvan correctamente.
4. **Subir los servicios**:
   Para subir todos los servicios en ejecución:
   ```bash
   docker compose up -d
   ```

5. **Detén los servicios**:
   Para detener todos los servicios en ejecución:
   ```bash
   docker compose down
   ```

## Información adicional

- **Base de datos**: El proyecto utiliza PostgreSQL como base de datos predeterminada.
- **Cache**: Redis está incluido para funciones de caché.

---

Este `README.md` proporciona una guía básica para ejecutar el proyecto Joonik utilizando Docker Compose.

---
## Ejecución de pruebas

   ```bash
   docker exec -it backend php artisan test // Ejecución de pruebas backend
 
   docker exec -it backend composer lint // Ejecución lint
   ```

## Postman

En el siguiente enlace se encuentra la colección de Postman para realizar las pruebas de los servicios

https://www.postman.com/teamluis/joonik/request/jxi6i3v/get-locations

## Acceder al Frontend

Para acceder al frontend, puedes ingresar a la siguiente URL:

http://frontend.local/