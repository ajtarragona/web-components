<h1 class="display-4">Estils</h1>

<hr class="big"/>


	<p>Podem modificar els estils gràfics CSS (colors, vores, arrodoniments...). Per a fer-ho cal seguir una sèrie de passes.</p>

	<p>En primer lloc, hem de crear un arxiu <code>app.scss</code> a la nostra aplicació. Típicament a <code>resources/assets/sass</code>.</p>
	<p>En aquest arxiu, cal importar, en primer lloc, l'arxiu de variable del paquet web-components, a continuació sobrescriure valor de les variables que volguem, i finalment, incloure la resta d'estil del paquet web-components:</p>
	
	@code(['lang'=>'css'])
		@includeSrc('ajtarragona-web-components::docs.source.start.theme-css-imports')
	@endcode
	

	

	<p>Si no ho està, cal incloure la generació de l'arxiu css a l'arxiu <code>webpack.mix.js</code>.</p>
	@code(['lang'=>'java'])
	mix.sass('src/resources/assets/sass/app.scss', 'src/public/css')
	@endcode

	<p>Aleshores, cal compilar els nostres assets mitjançant webpack:</p>
	@code(['lang'=>'java'])
	npm run prod
	@endcode


	<p>Finalment, a les nostres vistes <code>blade</code> en comptes d'extendre les plantilles per defecte en tenim dues d'alternatives:</p>
	<p><mark>@icon('file')  ajtarragona-web-components::layout/themable</mark></p>
	<p><mark>@icon('file')  ajtarragona-web-components::layout/themable-sidebar</mark></p>

	<p>També, en aquestes vistes caldrà incloure el nou arxiu css que hem creat prèviament:</p>
	@code(['lang'=>'java'])
		@includeSrc('ajtarragona-web-components::docs.source.start.layout-themable-sidebar')
	@endcode

		
	