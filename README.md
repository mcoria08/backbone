<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://media.licdn.com/dms/image/C4E1BAQFnqLUyiIC3uQ/company-background_10000/0/1612321148050?e=1677096000&v=beta&t=uqs0LNay9Lp_oCLCuG3XJPFyfXbJoH_pvcPWG_NRNJw" width="500"></a></p>


## Backbone API ZipCodes

El proyecto es una API que extrae la información del código postal proporcionado en la URL.  
La URL es la siguiente:  
```
https://backbone.miguelcoria.com/api/zip-codes/CODIGO_POSTAL
```

- CODIGO_POSTAL: Es el código postal del que se desea obtener la información.  
  
### Descripción del Proyecto  
El proyecto toma como recurso la información contenida en el archivo XLS del siguiente link [Descarga de Códigos Postales](https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/CodigoPostal_Exportar.aspx).
Generé un nuevo archivo con la lista de sentencias para crear los registros en la tabla `zip_codes`. El archivo se encuentra ubicado en `/database/data/zipcode-mexico.sql`. 

Esta tabla contiene la información de todos los códigos postales del pais eliminando los caracteres especiales para permitir la correcta creación del archivo JSON de respuesta de la petición.

Cambié la configuración del sistema de caché de `file` a `database` para dar un mejor rendimiento del sistema. Igualmenté implemente un tiempo de vida a la petición de `1 día` para dar tiempos de respuestas más rápidos de las peticiones. Cnsiderando que la información no cambia con frecuencia creo que ese periodo es congruente.  





  
### Pasos para instalar el proyecto

1. Clonar el repositorio a la carpeta local: [Github Project Link](https://github.com/mcoria08/backbone.git proyectobackbone)
2. Cambiarse a la carpeta del proyecto `cd proyectobackbone` y ejecutar el comando: `composer install`  
3. Copiar el archivo `.env.example` al archivo `.env`: `cp .env.example .env` y actualizar el nombre de la base de datos.  
4. Correr las migraciones: `php artisan migrate`
5. Ejecutar el comando `php artisan upload:zipcodes` para llenar la tabla de `zip_codes` con la información que se encuentra en el archivo `database/data/zipcode-mexico.sql`  
6. Generar la llave del proyecto `php artisan key:generate`  
7. Correr el proyecto `php artisan serve`
8. Endpoint: `http://127.0.0.1:8001/api/zip-codes/23054`  

### Prerequisitos
- Composer 
- PHP 8.0
- Npm & NodeJS



