# Tarragona Web Components for Laravel 5.6

Aquest paquet incorpora:
 - Components web (en forma de directives i components blade)
 	- Formularis
 		- Text Inputs
		- Textareas
		- Date inputs
		- File Inputs
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
 - Helpers

## Instalació
```bash
composer require ajtarragona/web-components:"@dev"
```


## Configuració


1. Publicar assets en tu app:
```bash
php artisan vendor:publish  --tag=ajtarragona-web-components-assets --force
```
<small>Això copiarà els scripts i estils a la carpeta public del nostre projecte  `public\vendor\ajtarragona`.</small>



2. Publicar rutes per javascript:

Afegir Provider Laroute a l'arxiu `config/app.php`

```php
 'providers' => [
 	...
 	Lord\Laroute\LarouteServiceProvider::class,
 ]
```

Publicar configuració Laroute
```bash
php artisan vendor:publish --provider='Lord\Laroute\LarouteServiceProvider'
```

Posar rutes absolutes a `app/config/laroute.php`

Configurar correctament la ruta de l'aplicació `APP_URL` a l'arxiu `.env`

Publicar scripts laroute cada vegada que canviem una ruta
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
```html
<link href="{{ asset('vendor/ajtarragona/css/ajtarragona.css') }}" rel="stylesheet">
<script src="{{ asset('js/laroute.js')}}" language="JavaScript"></script>
<script src="{{ asset('vendor/ajtarragona/js/ajtarragona.js')}}" language="JavaScript"></script>
```



<!-- Opcionalment:
```bash
php artisan vendor:publish --tag=ajtarragona-web-components-config
```

Això copiarà l'arxiu a `config/webcomponents.php`.
 -->

## Demo
Disposem d'una demo dels diferents components a la ruta:
```bash
http://***/ajtarragona/webcomponents
```


## Publicar vistes
Si volguéssim modificar alguna vista del paquet, les podem publicar dins del nostre projecte:
```bash
php artisan vendor:publish --tag=ajtarragona-web-components-views
```

Això copiarà les vistes a `resources\views\vendor\ajtarragona\web-components`.


