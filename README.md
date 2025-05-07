<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**
- **[Romega Software](https://romegasoftware.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).




## INSTALACIÓN WINDOWS
instalar paquete AMP (ej. XAMPP)

- 1.a) Instalar Composer (ejecutable)

https://getcomposer.org/download/

1.b) Instalar Git (ejecutable)

https://git-scm.com/downloads

1.c) Instalar Visual Studio Code (ejecutable)

https://code.visualstudio.com/download

- Crear la BD vacía en PhpMyAdmin --> speedupbd

- importar dump de BD

- 1ro: estructura_dump / 2do: configuracion_dump / 3ro: users_dump / 4to: example_dump

- Con Git --> Descargar el proyecto Laravel desde el repositorio de Bitbucket en /xampp/htdocs

4.a) importar dir de imágenes

public/storage/

Configurar Laravel --> archivo .env

(tomar .env.example para configurar)

MAILTRAP – crear cuenta y configurar en el .env (ver apartado Mailtrap)

Correr el comando para instalar librerías

`composer install`

Correr el comando para instalar librerías (si corresponde)

`npm install`

Correr el comando de limpieza

`limpieza.sh`

Agregar virtual host en Windows

C:\Windows\System32\drivers\etc\hosts --> 127.0.0.1 fixup.local speedup.nova.local

C:\xampp\apache\conf\extra\httpd-vhosts.conf -->

```
<VirtualHost *:80>

DocumentRoot C:/xampp/htdocs/

ServerName localhost

</VirtualHost>

<VirtualHost *:80>

ServerName speedup.nova.local

DocumentRoot "C:/xampp/htdocs/speedup-nova-repo/public"

<Directory "C:/xampp/htdocs/speedup-nova-repo/public">

   AllowOverride All

   Options Indexes FollowSymLinks

   Allow from all

   Require all granted

</Directory>

</VirtualHost>
```

10) Para ingresar al sistema --> http://speedup.nova.local/

user: admin.bgh@aziende.global / admin.default@aziende.global

pass: test1234 

11) Mailtrap --> darse de alta en el servicio y actualizar .env

## Instalación Nova

Manual: Installation | Laravel Nova 

revisar --> composer.json

y correr

`php artisan nova:install`

## Repo Nova: componentes

Commands: para correr script manualmente o schedules

Enums: para harcodear valores estáticos

Models: para asociar con tabla y definir relaciones

Nova Resources: para abm de modelos

Nova Actions: para ejecutar scripts sobre un resource

Nova Filters: para implementar filtros en los resources

Observers: para ejecutar acciones post transacciones

## Commit / Push / Pull

1. Se debe crear una rama por cada ticket --> nombreapellido/xxx-zzzz,

reemplazando nombreapellido por el nombre y apellido del developer, xxx por el id del ticket y zzzz por título del ticket, sin espacios en blanco, (por ejemplo nicolasfuentes/spedres-68-endpoint-getsucursales) para subir las modificaciones particulares y dicha rama, debe extender de la rama dev

Nota: las ramas Master, Dev, Test, Pre y Prod, solo las manipulan los implementadores.

`git pull origin dev`

Antes de empezar a trabajar con ticket, correr

`git pull origin dev`

4c) Para subir cambios:

    1- hacer commit de los cambios a subir (mensaje = codigo ticket + titulo ticket)

    2- correr --> `git pull origin dev `
    para sincronizar con la rama dev

    3- hacer push

## JIRA

1- los tickets nacen en el estado TO DO (Para hacer)
2- Cuando se toma un ticket, pasarlo a ANÁLISIS, ingresar la fecha de comienzo en el ticket (start date de Jira), y realizar una análisis de cómo sería la solución, estimarlo en horas, e ingresar dicha estimación (estimación original de Jira), y la fecha de entrega (fecha de vencimiento en Jira)
3- Cuando se empieza a trabajar en un ticket, pasar a "EN CURSO".
4- Cuando se termina un ticket, pasar a "EN TEST" y cargar las horas trabajadas en "seguimiento de tiempo".

**LARAVEL VERSION 8.83.5**