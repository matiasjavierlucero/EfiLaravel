# Evaluacion Final Integradora-Programacion III - 



<a href="#"><img src="https://img.shields.io/badge/license-MIT-green"></a>
<a href="#"><img src="https://img.shields.io/badge/php-^7.2.28-blue"></a>
<a href="#"><img src="https://img.shields.io/badge/laravel-^7.29-red"></a>


## Sobre el proyecto
En el marco de la **Evaluacion Final Integradora (EFI)**, de la asignatura **Programacion III (Laravel)**, desarrolle una pequeña aplicacion web para simular la carga que realiza una asociacion de futbol, en este caso tomando como ejemplo la Liga Argentina de Futbol, y las categorias asociadas a AFA y Federacion de Futbol Profesional.


## Modelo de la Base de Datos

![Database_Model](https://github.com/matiasjavierlucero/EfiLaravel/blob/master/public/images/Diagram.png)

## Instalacion 

1. Crear un Schema DB, las credenciales seran necesarias para configurar el archivo .env.

2. Clone el repositorio **https://github.com/matiasjavierlucero/EfiLaravel**

3. Realizar 
    - **`composer install`**
    -  **`npm install`**

4. Realizar la migracion y el rellenado de datos
    - **`php artisan migrate --seed`**  
    
5. La migracion creara un usuario User : **santipalacios@gmail.com**, password **laravel**