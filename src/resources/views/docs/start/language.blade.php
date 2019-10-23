<h1 class="display-4">Idiomes</h1>

<hr class="big"/>

<p>S'inclou com a dependència de composer el paquet <a href="https://github.com/akaunting/language" target="_blank"><code>akaunting/language</code></a> que permet la selecció d'idioma per part de l'usuari.</p>

<p>Per habilitar-ho, cal seguir els següents passos:</p>
<p>Definir la variable a l'arxiu <code>.env</code>.</p>
@code
APP_LANGUAGE_SELECTOR = true
@endcode

<p>Definim el locale per defecte a l'arxiu <code>config/app.php</code></p>
@code
	'locale' => 'ca'
@endcode
{{-- 
<p>Opcionalment, afegim el Provider a l'arxiu <code>config/app.php</code></p>

@code(['lang'=>'bsh'])
'providers' => [
 	...
 	Akaunting\Language\Provider::class,
]
@endcode

<p>Opcionalment, afegim l'alias si volem fer servir la Facade:</p>
@code(['lang'=>'bsh'])
'aliases' => [
 	...
	'Language'   => Akaunting\Language\Facade::class,
]
@endcode --}}
		
<p>Publiquem la configuració:</p>
@code(['lang'=>'bsh'])
	php artisan vendor:publish --tag=language
@endcode

   
<p>Executem la migració (s'afegirà la columna locale a la taula d'usuaris):</p>
@code(['lang'=>'bsh'])
	php artisan migrate
@endcode


<p>Configurem els idiomes disponibles a l'arxiu <code>config/language.php</code>:</p>
@code(['lang'=>'bsh'])
    'allowed'       => ['en', 'ca'],
@endcode

<p>Al mateix arxiu, cal afegir l'idioma català a la llista d'idiomes del paquet:
@code(['lang'=>'bsh'])
'all' => [
	...
	['short' => 'ca',       'long' => 'ca-ES',      'english' => 'Catalan',             'native' => 'Català'],
	...
]
@endcode

     


<hr/>
<p><mark>Les rutes que volguem que siguin multiidioma hauràn de passar a través del middleware <code>language</code>.</mark></p>
@code(['lang'=>'java'])
Route::group(['middleware' => 'language'], function () {

	// Here your routes

});
@endcode