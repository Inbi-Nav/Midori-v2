# REST API – Sistema de Gestión E-commerce
---
Esta API REST implementa un sistema de gestión para Midori con control de usuarios, productos, pedidos y pagos, utilizando autenticación basada en **tokens Bearer**.


## Requisitos

- PHP - 8.2
- Composer
- Laravel 12
- Laravel Passport
---
##  Cómo iniciar el proyecto

- Clonar el repositorio:
  - git clone **url-repo**
  - composer install
  - cp .env.example .env
  - php artisan key:generate
  - php artisan migrate:fresh --seed
  - php artisan passport:install
  - php artisan passport:client --personal
  - php artisan serve 

---
## Credenciales de administrador 
 - **email**: admin@midori.com
 - **password**: admin123

 ## Registro
Al registrarse por primera vez, el usuario obtiene el rol CLIENT por defecto.
  - **POST - /api/register**
- Campos obligatorios 
  - **name, email, password** 

  ## Login
- Una vez registrado correctamente, el usuario puede autenticarse. 
    - **POST - /api/login**
 - credenciales 
    - **email, password** 

 ## Roles del sistema
La API maneja tres tipos de usuarios:

 **CLIENTE** - usuario final que compra productos

 Puede:
  - Ver productos
  - Crear pedidos
  - Realizar pagos
  - Consultar sus pedidos
  - Solicitar convertirse en proveedor

---

**PROVEEDOR** - Responsable de gestionar productos y pedidos

Puede:
- Crear, modificar y eliminar productos
- Crear y gestionar categorías
- Consultar pedidos
- Cambiar el estado de los pedidos

El proveedor no se crea directamente. Debe ser aprobado por el administrador.

---

**ADMIN** - Usuario con privilegios de supervision

Puede:

- Ver todos los usuarios registrados
- Aprobar solicitudes de proveedores
- Consultar estadísticas generales del sistema
- Gestionar usuarios

## Solicitar convertirse en proveedor

1. El cliente envía la solicitud:
 - POST /api/users/request-provider
2. El administrador consulta las solicitudes:
- GET /api/provider-request
3. El administrador aprueba la solicitud:
- PATCH /api/users/{id}/approve-provider 

## Endpoints de productos
- GET /api/products
- GET /api/products/{id}
- POST /api/products - (proveedor)
- PUT /api/products/{id} - (proveedor)
- DELETE /api/products/{id} - (proveedor)

## Endpoints de pedidos
- POST /api/orders - (cliente)
- GET /api/orders/me - (cliente)
- GET /api/orders - (proveedor)
- PATCH /api/orders/{id}/status - (proveedor)

## Endpoints de pago
- POST /api/payments - (cliente)

## Endpoints de administrador
- GET /api/users 
- GET /api/users/{id}
- PUT /api/users/{id}
- DELETE /api/users/{id}
- GET /api/provider-request
- PATCH /api/users/{id}/approve-request

## SEGURIDAD
- Todas las rutas protegidas usan auth:api
- El acceso se restringe por rol mediante middleware
- La autenticación se basa en **Bearer Tokens**
- Sin token -> 401
- Token sin permisos -> 403 

## API Documentation

La documentación completa de la API está disponible mediante Laravel Scribe:

http://localhost:8000/docs

Incluye:
  - Endpoints
  - Métodos HTTP
  - Parámetros
  - Autenticación
  - Ejemplos de respuesta
