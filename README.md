<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Backbone API ZipCodes

El proyecto es una API que extrae la información del código postal proporcionado en la URL.  
La URL es la siguiente:  
```
https://backbone.miguelcoria.com/api/zip-codes/CODIGO_POSTAL
```

- CODIGO_POSTAL: Es el código postal del que se desea obtener la información.  
  
  
### Pasos para instalar el proyecto
1. Clonar el repositorio a la carpeta local: [Github Project Link](https://github.com/mcoria08/backbone.git)
2. Ejecutar el comando: `composer install`  
3. Copiar el archivo `.env.example` al archivo `.env` y actualizar el nombre de la base de datos.  
4. Correr las migraciones: `php artisan migrate`  
5. Ejecutar el comando `php artisan upload:zipcodes` para llenar la tabla de `zip_codes` con la información que se encuentra en el archivo `database/data/zipcode-mexico.sql`  
  
  
### Descripción del Proyecto  
  
  sdfsdf
