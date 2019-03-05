<h1 class="display-4">Configuració</h1>

<hr class="big"/>

<p>El paquet no disposa de cap opció de configuració.</p>

<p>Si volguéssim modificar alguna vista del paquet, les podem publicar dins del nostre projecte:</p>
@code(['lang'=>'bsh'])
php artisan vendor:publish --tag=ajtarragona-web-components-views
@endcode

<mark>Això copiarà les vistes a <code>resources\views\vendor\ajtarragona\web-components</code>.</mark>


