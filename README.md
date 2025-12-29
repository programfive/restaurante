# 🍽️ Sistema de Gestión para Restaurante

Un sistema de gestión integral diseñado para optimizar las operaciones diarias de un restaurante, incluyendo la gestión de inventario, ventas, compras y usuarios. Construido con el stack TALL (Tailwind, Alpine.js, Laravel, Livewire) y utilizando **Filament PHP** para un panel de administración potente y elegante.

![Mockup del Sistema](../mockup.png)

## 🚀 Características Principales

*   **📦 Gestión de Inventario:** Control detallado de stock, lotes y fechas de vencimiento de productos.
*   **🛒 Punto de Venta (Ventas):** Registro rápido de ventas con cálculo automático de totales y detalles.
*   **🧾 Gestión de Compras:** Registro de ingresos de mercadería y control de proveedores.
*   **👥 Control de Accesos:** Sistema robusto de Roles y Permisos (Admin, Empleado, etc.) basado en Spatie Permissions.
*   **📊 Reportes:** Generación de reportes de ventas, inventario y compras en formato PDF.
*   **🚛 Proveedores:** Directorio de proveedores para agilizar las órdenes de compra.
*   **🗑️ Control de Desperdicios:** Registro de mermas o productos dañados para un balance preciso.

## 🛠️ Tecnologías Utilizadas

*   **Framework:** Laravel 10/11
*   **Panel Administrativo:** Filament PHP v3
*   **Base de Datos:** MySQL / MariaDB
*   **Estilos:** Tailwind CSS
*   **Entorno:** Laragon / XAMPP

## 📋 Requisitos Previos

*   PHP >= 8.2
*   Composer
*   Node.js & NPM
*   Extensión PHP `zip` habilitada.
*   Visual C++ Redistributable actualizado.

## ⚙️ Pasos de Instalación

1.  **Clonar el repositorio:**
    ```bash
    git clone [url-del-repositorio]
    cd restaurante-sistema/app
    ```

2.  **Instalar dependencias de PHP:**
    ```bash
    composer install
    ```

3.  **Configurar el entorno:**
    *   Copia el archivo `.env.example` a `.env`.
    *   Configura las credenciales de tu base de datos en el archivo `.env`.
    ```bash
    cp .env.example .env
    ```

4.  **Generar la clave de aplicación:**
    ```bash
    php artisan key:generate
    ```

5.  **Ejecutar migraciones y carga de datos (Seeders):**
    Este paso creará las tablas, los permisos y los datos de prueba iniciales.
    ```bash
    php artisan migrate:fresh --seed
    ```

6.  **Instalar dependencias de Frontend:**
    ```bash
    npm install
    npm run dev
    ```

7.  **Acceso al Sistema:**
    *   **URL:** `http://localhost/admin` (o la URL configurada en Laragon).
    *   **Usuario Admin:** `admin@ejemplo.com`
    *   **Contraseña:** `admin123`

## 📸 Captura de Pantalla

El sistema cuenta con un dashboard interactivo que muestra las métricas clave del negocio en tiempo real.

---
Desarrollado con ❤️ para la gestión eficiente de gastronomía.
