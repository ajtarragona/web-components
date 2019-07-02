<h1 class="display-4">Instal·lació</h1>
<p class="lead">Segueix les següents instruccions per instal·lar el paquet</p>

<hr class="big"/>


<p>Des de la carpeta del teu projecte laravel:

<p>1. Instal·lar el component via composer:</p>

@block

	@code(['lang'=>'bsh'])
		composer require ajtarragona/web-components:"dev-master"
	@endcode

@endblock



<p>2. Publicar assets del package al teu projecte:</p>


@block
<p>Disposem d'una comanda artisan que realitza tota la feina.</p>

@code(['lang'=>'bsh'])
php artisan ajtarragona:prepare
@endcode

<p><mark><strong>Nota:</strong> Això copiarà els scripts i estils a la carpeta <code>public\vendor\ajtarragona</code> del nostre projecte.</mark></p>
<p><mark><strong>Nota:</strong> Cal republicar cada vegada que actualitzem el paquet.</mark></p>

@endblock

<p>3. Inicialitzar Git:</p>
@code(['lang'=>'bsh'])
git init
git add .
git commit -am "first commit"
@endcode
{{-- <hr/> --}}

{{-- <h4>Configuració de les rutes</h4> --}}
	

{{-- @block
	<p>El paquet incorpora un paquet per que les rutes estiguin accessibles via Javascript. Per que funcioni cal realitzar el següent previament a publicar els recursos.</p>


	<p>Publiquem la configuració del paquet Laroute:</p>
	@code(['lang'=>'bsh'])
	php artisan vendor:publish --provider='Lord\Laroute\LarouteServiceProvider'
	@endcode

	<p>Modifiquem les següents línies de l'arxiu <code>app/config/laroute.php</code>:</p>
	
	@code(['lang'=>'php'])

	'path' => base_path('public/js'),
	...
	'absolute' => true,
	...
	'template' => base_path('vendor/lord/laroute/src/templates/laroute.js'),

	@endcode

	<p>Configurar correctament la ruta de l'aplicació <code>APP_URL</code> a l'arxiu <code>.env</code>
	


	<p><mark><strong>Nota:</strong> Un cop fet això tornem a executar la comanda <code>ajtarragona:prepare</code></mark></p>
@endblock
 --}}