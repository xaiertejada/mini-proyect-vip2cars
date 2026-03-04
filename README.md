# Mini Proyecto PHP MVC – Gestión de Vehículos y Clientes (VIP2CARS)

Este proyecto fue desarrollado como parte de una prueba técnica para demostrar conocimientos en desarrollo backend con PHP utilizando arquitectura MVC, modelado de base de datos, migraciones, validaciones y buenas prácticas de desarrollo.

El sistema permite gestionar clientes y sus vehículos mediante un CRUD completo. Además, incluye paginación, búsqueda, validaciones estrictas de formularios y medidas básicas de seguridad.

---

# Tecnologías utilizadas

El proyecto fue desarrollado utilizando las siguientes tecnologías:

* PHP 8.x
* MySQL / MariaDB
* Arquitectura MVC
* PDO (Prepared Statements)
* Composer
* Phinx (Migraciones y Seeds)
* HTML5
* CSS
* JavaScript básico para validación de formularios

---

# Funcionalidades del sistema

El sistema permite realizar las siguientes acciones:

* Registrar clientes y vehículos
* Listar vehículos registrados
* Editar información del cliente y vehículo
* Eliminar vehículos
* Buscar vehículos por placa o documento
* Paginación de resultados
* Validaciones estrictas de formularios
* Protección básica contra XSS
* Prevención de SQL Injection mediante prepared statements

---

# Modelado de Base de Datos – Sistema de Encuestas

Como parte de la evaluación técnica se solicitó diseñar el modelo entidad–relación para un sistema de encuestas anónimas.

Este modelo se encuentra en la carpeta:

database/schema/

Archivos incluidos:

* encuestas.sql
* diagrama_encuestas.png

El modelo contiene las siguientes tablas:

* encuestas
* preguntas
* opciones
* respuestas

Cada tabla posee sus respectivas claves primarias y relaciones mediante claves foráneas.

---

# Estructura del proyecto

El proyecto sigue una arquitectura MVC organizada de la siguiente manera:

App/
Controllers
Models
Validators
Views

Core/

config/

database/
migrations
seeds
schema

public/

composer.json
composer.lock
phinx.php
README.md
.gitignore

---

# Requisitos del sistema

Para ejecutar el proyecto es necesario contar con:

* PHP >= 8.0
* Composer
* MySQL o MariaDB
* Apache o Nginx
* Extensión PDO habilitada en PHP

---

# Instalación del proyecto

## 1. Clonar el repositorio

Abrir una terminal y ejecutar:

git clone https://github.com/tu-usuario/mini-proyect-vip2cars.git

Luego entrar al proyecto:

cd mini-proyect-vip2cars

---

## 2. Instalar dependencias

Ejecutar:

composer install

Esto instalará todas las dependencias necesarias en la carpeta:

vendor/

---

## 3. Configurar la base de datos

Abrir el archivo:

config/config.php

Editar la configuración de conexión según tu entorno:

'dev' => [
'url' => 'http://vip2cars.local/',
'database' => [
'hostname' => 'localhost',
'database' => 'vip2cars',
'username' => 'root',
'password' => '',
'port' => '3306',
],
],

---

## 4. Crear base de datos

Crear manualmente la base de datos en MySQL.

Ejemplo usando consola MySQL:

CREATE DATABASE vip2cars;

---

## 5. Ejecutar migraciones

Las migraciones crearán las tablas necesarias para el sistema.

Ejecutar el siguiente comando:

vendor/bin/phinx migrate

Esto creará las tablas:

* clientes
* vehiculos

---

## 6. Ejecutar seeds (datos de prueba)

Para insertar datos de prueba ejecutar:

vendor/bin/phinx seed:run

Esto insertará registros iniciales para poder probar el sistema.

---

# Configuración del servidor web

El servidor web debe apuntar al directorio:

public/

Ejemplo de configuración con Apache:

DocumentRoot /ruta-del-proyecto/public

El proyecto incluye un archivo `.htaccess` que permite utilizar URLs amigables.

---

# Rutas principales del sistema

Las rutas implementadas son:

/ → listado de vehículos
/vehiculos/create → registrar vehículo
/vehiculos/edit/{id} → editar vehículo
/vehiculos/delete/{id} → eliminar vehículo

---

# Seguridad implementada

El sistema implementa varias medidas básicas de seguridad:

* Uso de Prepared Statements para evitar SQL Injection
* Escapado de salida con htmlspecialchars
* Validación estricta de formularios
* Restricción de longitud de campos
* Sanitización de entradas

---

# Validaciones implementadas

Se aplican validaciones tanto en frontend como en backend.

Validaciones para Cliente:

* Nombres: solo letras
* Apellidos: solo letras
* Documento: solo números (8 dígitos)
* Correo: formato email válido
* Teléfono: solo números

Validaciones para Vehículo:

* Placa: formato alfanumérico
* Marca: solo letras
* Modelo: alfanumérico
* Año de fabricación: dentro de rango válido

---

# Cómo probar el sistema

Pasos para ejecutar el proyecto:

1. Clonar el repositorio
2. Ejecutar composer install
3. Crear la base de datos vip2cars
4. Ejecutar migraciones con phinx
5. Ejecutar seeds para datos de prueba
6. Configurar servidor web apuntando a la carpeta public
7. Abrir el sistema en el navegador

---

# Autor: Alexis Tejada Chung

Proyecto desarrollado como parte de una prueba técnica para evaluación de habilidades en desarrollo backend con PHP.
