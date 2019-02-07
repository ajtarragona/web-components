# Tarragona Web Components for Laravel 5.6



## Instalació

```bash
composer require ajtarragona/web-components:"@dev"
```


```bash
php artisan vendor:publish --tag=ajtarragona-web-components
```

Això copiarà l'arxiu a `config/webcomponents.php`.



Compilar assets en el paquete

npm run dev


Publicar assets en tu app
php artisan vendor:publish  --tag=ajtarragona-web-components-assets --force


Incluir css en tu plantilla
<link href="{{ asset('vendor/ajtarragona/css/ajtarragona.css') }}" rel="stylesheet">
<script src="{{ asset('vendor/ajtarragona/js/ajtarragona.js')}}" language="JavaScript"></script>

