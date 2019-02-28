# Tarragona Web Components for Laravel 5.6

Aquest paquet incorpora:
 - Components web (en forma de directives i components blade)
 	- Formularis
 		- Inputs
		- Textareas
		- Checkboxes & Radios
		- Selects
		- Autocomplete selects
		- Buttons
 	- Maquetació
		- Rows & Columns
		- Lists
		- Cards
		- Tabs
		- Tables
 	- Utils
		- Alerts
		- Badges
		- Breadcrumb
		- Icones Fontawesome
		- Modals
		- Navs
		- Paginació
 - Plantilles Blade
 	- Master
 	- Master amb sidebar i toolbar
 	- Modal
 - Validacio de forms ajax
 - Taules amb paginacio i ordenacio ajax
 - Settings de sessio
 

## Instalació
```bash
composer require ajtarragona/web-components:"@dev"
```


## Configuració


- Publicar assets en tu app
```bash
php artisan vendor:publish  --tag=ajtarragona-web-components-assets --force
```
Això copiarà els scripts i estils a la carpeta public del nostre projecte  `public\vendor\ajtarragona`.


- Publicar rutes per javascript

```bash
php artisan laroute:generate
```


## Ús

En tus vistas puedes extender la plantilla que incorpora el paquete
```php
@extends('ajtarragona-web-components::layout/master')
@extends('ajtarragona-web-components::layout/master-sidebar')
@extends('ajtarragona-web-components::layout/modal')
```

O bien, incluir los assets en tu plantilla
<link href="{{ asset('vendor/ajtarragona/css/ajtarragona.css') }}" rel="stylesheet">
<script src="{{ asset('js/laroute.js')}}" language="JavaScript"></script>
<script src="{{ asset('vendor/ajtarragona/js/ajtarragona.js')}}" language="JavaScript"></script>




<!-- Opcionalment:
```bash
php artisan vendor:publish --tag=ajtarragona-web-components-config
```

Això copiarà l'arxiu a `config/webcomponents.php`.
 -->



## Publicar vistes
Si volguéssim modificar alguna vista del paquet, les podem publicar dins del nostre projecte:
```bash
php artisan vendor:publish --tag=ajtarragona-web-components-views
```

Això copiarà les vistes a `resources\views\vendor\ajtarragona\web-components`.


