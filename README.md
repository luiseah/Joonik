# Reto Alegra
Sistema de Donación de Comida para Restaurantes (Reto Alegra)

## Tabla de Contenidos
1. [Objetivo](#objetivo)
2. [Requisitos del Reto](#objetivo-específicos)
    1. [Características de la Interfaz de Usuario](#características-de-la-interfaz-de-usuario)
3. [Arquitectura de Microservicios con Docker](#arquitectura-de-microservicios-con-docker)
    1. [Arquitectura de los servicios](#arquitectura-de-los-servicios)
4. [Modelo Entidad Relación](#modelo-entidad-relación)
5. [Postman Endpoints](#postman-endpoints)
6. [Entrega Final](#entrega-final)

## Objetivo
Este reto tiene como objetivo principal crear un sistema que gestione de forma eficiente el proceso de donación de platos de comida en un restaurante utilizando una arquitectura de microservicios en Docker y desarrollando tanto el backend como el frontend.

## Objetivo Específicos:
### Características de la Interfaz de Usuario
- El gerente del restaurante puede hacer pedidos de platos a la cocina presionando un botón.
- La cocina selecciona aleatoriamente una receta de una lista predefinida de 6 platos y solicita los ingredientes necesarios a la bodega.
- La bodega verifica si tiene los ingredientes; si no, realiza compras a un mercado externo.
- La plaza de mercado puede tener o no los ingredientes disponibles para la venta.
- La cocina prepara el plato cuando se tienen todos los ingredientes y los ingredientes disponibles se actualizan.

## Arquitectura de Microservicios con Docker
- Separar el backend y el frontend en diferentes servicios.
- Usar Laravel para el backend.
- Buena calidad y seguridad del código.

### Descripción General
Este sistema está diseñado utilizando una arquitectura de microservicios desplegada en AWS, con componentes separados en contenedores Docker que se ejecutan en una instancia EC2. El sistema maneja la gestión de pedidos en un restaurante con varias capas de servicios.

1. #### Componentes Principales

    1. **AWS Cloud**:
       La infraestructura está desplegada en la nube de AWS utilizando una instancia EC2 dentro de una VPC (Virtual Private Cloud) que aloja los servicios del sistema.

    2. **Instancia EC2**:
        - **EC2 Instance Micro**: El sistema está alojado en una instancia pequeña de EC2, que ejecuta múltiples contenedores Docker para los diferentes servicios.
        - **Docker Containers**: Se ejecutan varios contenedores Docker que separan cada servicio del sistema.

    3. **Servicios en Docker**:
        - **Webserver Service (Nginx)**: Maneja las peticiones HTTP y redirige el tráfico a los servicios correspondientes.
        - **Frontend Service**: Desarrollado con **Vue.js** y **Node.js**, maneja la interfaz de usuario (UI) del sistema.
        - **Backend Service**: Implementado con **Laravel 11** corriendo sobre **PHP-FPM 8.3**, se encarga de la lógica de negocio y la gestión de los endpoints.
        - **Worker Service**: Utiliza **PHP-FPM 8.3** para procesar tareas en segundo plano y trabajos programados.
        - **Cache Service**: Usa **Redis** para almacenamiento en caché, optimizando el rendimiento del sistema.
        - **DB Service**: Usa **PostgreSQL** para el almacenamiento persistente de los datos.

    4. **API Gateway**:
        - Un **API Gateway** en AWS gestiona el tráfico entrante y dirige las solicitudes HTTP hacia los servicios apropiados.
        - Los endpoints de la API están expuestos en el puerto TCP/IP 9000, con rutas que incluyen `/orders`, `/ingredients`, `/recipes` y `/purchases`.

    5. **Cliente (Manager Restaurant)**:
        - Un cliente (gerente del restaurante) interactúa con el sistema mediante una interfaz web, enviando solicitudes HTTP a la API.
        - Las operaciones incluyen la gestión de pedidos, ver ingredientes, recetas, y realizar compras.

2. #### Endpoints Expuestos

- **GET /orders**: Obtener la lista de pedidos.
- **POST /orders**: Crear un nuevo pedido.
- **GET /ingredients**: Obtener los ingredientes disponibles.
- **GET /recipes**: Obtener las recetas disponibles.
- **GET /purchases**: Consultar el historial de compras.

3. #### Conclusión
Esta arquitectura es escalable, con cada componente aislado en su propio contenedor Docker. Utiliza Redis para caché y PostgreSQL para almacenamiento de datos, mientras que AWS EC2 y el API Gateway aseguran que el sistema esté accesible y gestionado de manera eficiente en la nube.


![Descripcion de la imagen](.doc/architecture-diagram.png)

## Modelo Entidad Relación

Este modelo entidad-relación gestiona un sistema de pedidos de comida en un restaurante, integrando usuarios, pedidos, recetas, ingredientes y compras.

1. #### Entidades del Sistema

    1. **Users (Usuarios)**:
       Almacena la información de los usuarios (gerentes), quienes pueden realizar múltiples pedidos.

    2. **Orders (Pedidos)**:
       Representa los pedidos realizados, vinculados a un usuario y una receta. Contiene el estado y fecha de finalización. Un pedido puede generar múltiples compras si faltan ingredientes.

    3. **Recipes (Recetas)**:
       Define las recetas disponibles, cada una vinculada a múltiples pedidos y una lista de ingredientes necesarios.

    4. **Ingredients (Ingredientes)**:
       Registra los ingredientes con su stock y uso. Cada ingrediente está relacionado con varias recetas y compras.

    5. **Purchases (Compras)**:
       Registra la compra de ingredientes cuando no están en stock. Cada compra está vinculada a un pedido y un ingrediente específico.

    6. **Recipe_Ingredient (Ingredientes de Recetas)**:
       Relaciona las recetas con sus ingredientes, indicando la cantidad necesaria de cada uno.

2. #### Relación General
Los Gerentes gestionan pedidos, cada pedido se vincula a una receta, y cada receta requiere ingredientes. Si faltan ingredientes, se registran compras. El modelo asegura la escalabilidad y gestión eficiente de los pedidos y el stock de ingredientes en el restaurante.

![Descripcion de la imagen](.doc/erd-restaurant.png)

## Postman Endpoints
[enlace](https://www.postman.com/teamluis/workspace/alegra-restaurant-challenge/overview)

## Entrega Final
- Despliegue en un servidor accesible. [Servidor t2.micro](http://ec2-34-193-41-56.compute-1.amazonaws.com/) 
- Código alojado en un repositorio privado de GitHub.  [Repositorio](https://github.com/luiseah/alegra)
- Cumplir con los criterios de microservicios, evitando una arquitectura monolítica.
- El sistema debe ser escalable, fácil de usar, y pensado para grandes volúmenes de pedidos. Además, se espera que el código esté bien estructurado, seguro, y que implemente buenas prácticas de desarrollo.

## Instalación

### Local

```bash
# Copiar las variables de entorno.
cp ./backend/.env.example ./backend/.env
cp ./frontend/.env.example ./frontend/.env

# Generar las imagenes de los servicios.
$ docker compose build

# Levantar los servicios.
$ docker compose up -d
```

### AWS

```bash
# Copiar las variables de entorno.
cp ./backend/.env.aws ./backend/.env
cp ./frontend/.env.aws ./frontend/.env

# Generar las imagenes de los servicios.
$ docker compose build

# Levantar los servicios.
$ docker compose up -d
```
