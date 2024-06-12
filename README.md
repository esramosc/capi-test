## Instalación

Para poder correr la aplicación de forma local en entorno de desarrollo, se debe crear una base de datos en MySql donde se almacenará la información.

Se deben ejecutar los siguientes pasos en orden.

## Configurar base de datos en el archivo .env

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=laravel

DB_USERNAME=root

DB_PASSWORD=


## Ejecutar migraciones y el seeder

Ejecutar el siguiente comando en el root del proyecto:

php artisan migrate --seed

Se crearan las tablas necesarias para la aplicación y se agregaran 5000 registros de contactos con 2 teléfonos, 2 emailsy 2 direcciones ficticias.

## Correr la aplicación en el puerto 8000

Para correr la aplicación se debe ejecutar el siguiente comando en el root del proyecto:

php artisan serve

Esto hará accesible la aplicación en la dirección: http://localhost:8000/api

Estarán disponibles los siguientes endpoints:

contactos: 'contacts'
Teléfonos: 'phones'
Emails: 'emails'
Direcciones: 'addresses'
Reporte: 'report

## Soporte

Para cualquier duda o comentario, puede escribir al correo: esramosc@gmail.com

