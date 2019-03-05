<h1 class="display-4">Instal·lació</h1>
<p class="lead">Segueix les següents instruccions per instal·lar el paquet</p>

<hr class="big"/>


<p>Des de la carpeta del teu projecte laravel:

<p>1. Instal·lar el component via composer:</p>

@block

	@code(['lang'=>'bsh'])
		composer require ajtarragona/web-components:"@dev"
	@endcode

@endblock



<p>2. Publicar assets del package al teu projecte:</p>


@block
	@code(['lang'=>'bsh'])
		php artisan vendor:publish --tag=ajtarragona-web-components-assets --force
	@endcode

	<p><mark><strong>Nota:</strong> Això copiarà els scripts i estils a la carpeta <code>public\vendor\ajtarragona</code> del nostre projecte.</mark></p>
	<p><mark><strong>Nota:</strong> Cal republicar cada vegada que actualitzem el paquet.</mark></p>
@endblock


<p>3. Publicar rutes (necessari per alguns dels plugins javascript):</p>

@block
	<p>Primer afegim el Provider <a href="https://github.com/aaronlord/laroute" target="_blank">Laroute</a> a l'arxiu <code>config/app.php</code></p>

	@code(['lang'=>'bsh'])
	 'providers' => [
	 	...
	 	Lord\Laroute\LarouteServiceProvider::class,
	 ]
	@endcode

	<p>Publiquem la configuració del paquet Laroute:</p>
	@code(['lang'=>'bsh'])
	php artisan vendor:publish --provider='Lord\Laroute\LarouteServiceProvider'
	@endcode

	<p>Posem el paràmetre <code>'absolute' => true</code> a l'arxiu <code>app/config/laroute.php</code>.</p>
	<p>Configurar correctament la ruta de l'aplicació <code>APP_URL</code> a l'arxiu <code>.env</code>
	<p>Publiquem els scripts Laroute:</p>
	@code(['lang'=>'bsh'])
	php artisan laroute:generate
	@endcode

	{{-- 

	@code(['lang'=>'java'])
		@includeSrc('ajtarragona-web-components::docs.source.test')
	@endcode
	 --}}
	<p><mark><strong>Nota:</strong> Cal republicar els scripts laroute cada vegada que canviem una ruta</mark></p>
@endblock
