# 📦 Setup del Proyecto

Este proyecto requiere una configuración específica para funcionar correctamente, incluyendo herramientas como Composer y Node.js. A continuación se detallan los pasos necesarios para configurar y ejecutar el proyecto localmente.

## 🧰 Requisitos Previos

Antes de comenzar, asegúrate de tener instalado lo siguiente en tu sistema:
- Composer
- Node.js

Puedes descargar Composer desde [getcomposer.org](https://getcomposer.org/download/) y Node.js desde [nodejs.org](https://nodejs.org/).

## 🔧 Instalación de Dependencias

Una vez clonado el repositorio, navega al directorio del proyecto y ejecuta los siguientes comandos:

```bash
composer install  # Instala las dependencias de PHP
npm install       # Instala las dependencias de Node.js
```

🚀 Ejecución del Proyecto
Para compilar y preparar los archivos estáticos del proyecto, ejecuta:
npm run dev

Este comando compilará los assets necesarios para el proyecto utilizando herramientas como Webpack o Gulp, según esté configurado.

🗄️ Configuración de la Base de Datos
Necesitarás importar las estructuras de las tablas a tu sistema de gestión de bases de datos. Encuentra los scripts SQL en el directorio sql/ del proyecto. Importa estos archivos a tu base de datos para configurar las tablas necesarias.


Puedes usar la siguiente estructura:

```bash
CREATE TABLE `habitaciones` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `tipo` enum('estándar','suite','deluxe') NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `disponibilidad` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` enum('confirmada','pendiente','cancelada') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `tipo` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

```


## Descripción del Proyecto de Sistema de Reservas de Habitaciones
## Objetivo General
El objetivo de este proyecto es desarrollar un sistema web que permita a los usuarios ver y reservar habitaciones en línea, con funcionalidades adicionales de gestión para administradores. El sistema proporciona una interfaz clara y amigable para que los usuarios puedan verificar la disponibilidad de habitaciones y hacer reservas, sujeto a autenticación.

## Funcionalidades Clave

## Para Usuarios:

# Visualización de Habitaciones: Los usuarios pueden navegar por una lista de habitaciones disponibles, donde cada entrada muestra información detallada como el tipo de habitación, precio, y disponibilidad actual.

Reservas: Para realizar una reserva, los usuarios deben estar autenticados (logueados). Esto asegura una gestión segura de las reservas y proporciona una capa adicional de seguridad al sistema.
Gestión de Usuario: Los usuarios pueden crear cuentas, iniciar sesión, y gestionar sus reservas.
Para Administradores:
Dashboard Administrativo: Al iniciar sesión, los usuarios con roles de administrador son redirigidos a un dashboard donde pueden ver un resumen de todas las reservas y las habitaciones.
Gestión de Habitaciones y Reservas: Los administradores pueden añadir, editar o eliminar habitaciones, así como modificar el estado de las reservas (por ejemplo, de 'pendiente' a 'confirmada' o 'cancelada').
Tecnologías Utilizadas
Frontend: HTML, CSS, y JavaScript para una interfaz de usuario interactiva.
Backend: PHP para el manejo de la lógica del servidor y MySQL para la gestión de la base de datos.
Herramientas: Composer para la gestión de dependencias de PHP y Node.js junto con npm para manejar librerías y scripts del lado del cliente.
Estado Actual del Proyecto
Actualmente, el proyecto permite la visualización de habitaciones y la autenticación de usuarios. Las funcionalidades de reserva están operativas bajo autenticación. El panel de administración está en desarrollo y pronto permitirá a los administradores gestionar habitaciones y reservas directamente desde el dashboard.

Planes Futuros
Complejizar la Gestión de Usuarios: Incluir roles más granulares para los usuarios y permitir a los administradores gestionar cuentas de usuario.
Ampliar Funciones del Dashboard: Añadir análisis de datos de reservas y ocupación de habitaciones para proporcionar insights valiosos a los administradores.
Mejorar la Interfaz de Usuario: Continuar mejorando la interfaz para hacerla más intuitiva y accesible, incluyendo adaptaciones para dispositivos móviles.