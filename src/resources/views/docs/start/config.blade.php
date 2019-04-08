<h1 class="display-4">Configuració</h1>

<hr class="big"/>

<p>Podem configurar els següents atributs a través del fitxer <code>.env</code>.</p>
@code
APP_CREDITS
APP_ICON
GOOGLE_MAPS_API_KEY
GOOGLE_MAPS_DEFAULT_ZOOM 
GOOGLE_MAPS_TGN_COORDS 
@endcode

<p>Opcionalment, podem publicar l'arxiu de configuració al nostre projecte:</p>
@code(['lang'=>'bsh'])
php artisan vendor:publish --tag=ajtarragona-web-components-config
@endcode

<mark>Això crearà l'arxiu de configuració <code>config\webcomponents.php</code>.</mark>

<hr/>

<p>Si volguéssim modificar alguna vista del paquet, les podem publicar dins del nostre projecte:</p>
@code(['lang'=>'bsh'])
php artisan vendor:publish --tag=ajtarragona-web-components-views
@endcode

<mark>Això copiarà les vistes a <code>resources\views\vendor\ajtarragona\web-components</code>.</mark>


