# Midori
Midori es una aplicación **e-commerce** desarrollada con **PhP/Laravel-Blade/Tailwind**, inspirada a cultutra japonesa.  
El proyecto simula una tienda online completa, con gestión de usuarios, pedidos, pagos simulados y un panel de administración.

---

## Descripción del proyecto

**Midori** permite a los usuarios registrarse, explorar un productos, añadirlos a una cesta, realizar pedidos y consultar su historial de compras.  
Los administradores pueden gestionar pedidos y actualizar su estado a lo largo del proceso de compra.

El proyecto ha sido desarrollado como **proyecto académico**, con énfasis en:
- Arquitectura MVC
- Diseño relacional de base de datos
- Experiencia de usuario (UI/UX)

---

## Tecnologías y herramientas utilizadas

- **PHP**
- **Laravel**
- **MySQL**
- **Blade Templates**
- **Tailwind CSS**
- **Vite**
- **Livewire (cesta)**
- **Thunder Client (testing API)**

---

### Usuario estándar

- Registro e inicio de sesión
- Navegación por el catálogo
- Añadir productos a la cesta
- Realizar pedidos (pago simulado)
- Ver historial de pedidos
- Consultar estado del pedido (pending → shipped → delivered)
- Cancelar pedidos mientras estén en estado `pending` o `paid`

### Administrador

- Acceso a panel de administración
- Visualización de todos los pedidos
- Cambio de estado de pedidos
- Gestión del flujo del pedido

**Credenciales del administrador (demo):**

**Email:** admin@midori.com
**Contraseña:** midori2026

---

## Flujo de uso de la aplicación

1. El usuario se registra e inicia sesión.
2. Accede a la tienda y explora productos por categorías.
3. Añade productos a la cesta.
4. Finaliza la compra mediante un pago simulado.
5. Se crea un pedido con sus productos asociados.
6. El usuario visualiza el pedido en *My Orders*.
7. El administrador gestiona el estado del pedido.

---

## Base de datos

La base de datos sigue un diseño **relacional** y está compuesta por:

- **users** → Usuarios (cliente / admin)
- **categories** → Categorías de productos
- **products** → Productos disponibles
- **orders** → Pedidos
- **order_items** → Productos incluidos en cada pedido
- **payments** → Pagos simulados

---

## Estructura del proyecto

**app/**
  - Http/
   --  Controllers/          
 - Models/                   
 - Providers/               

**config/**                 

 **database/**
 -  migrations/              
 -  seeders/                 

 **public/**
  - index.php                   
  - .htaccess                   
  - assets/                  
**resources/**
 - views/                   
 - css/                     

**routes/**
 - web.php                     
 - api.php                      
 - console.php                 

**storage/**                   
**tests/**                       
