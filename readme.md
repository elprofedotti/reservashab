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