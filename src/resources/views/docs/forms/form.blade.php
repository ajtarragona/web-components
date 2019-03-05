<h1 class="display-4">Formularis</h1>
<p class="lead">Podem crear formularis amb la directiva <mark><code>&commat;form</code></mark></p>


<hr class="big"/>

@row
	
	@col(['size'=>6])

		<table class="table table-sm">
			<thead>
				<tr>
					<th >Paràmetres</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					<td><code>action</code></td>
					<td>Acció del formulari (ruta del controlador)</td>
				</tr>
				<tr>
					<td><code>method</code></td>
					<td>Mètode del formulari. Per defecte <code>GET</code></td>
				</tr>
				<tr>
					<td><code>confirm</code></td>
					<td>Text de confirmació del formulari</td>
				</tr>
				<tr>
					<td><code>validator</code></td>
					<td>Ruta completa de la classe <code>Request</code> que validarà el formulari</td>
				</tr>
				<tr>
					<td><code>validateonstart</code></td>
					<td>Booleà que indica si es validarà el formulari quan carregui</td>
				</tr>
				<tr>
					<td><code>validateonchange</code></td>
					<td>Booleà que indica si es validarà el formulari quan canvii</td>
				</tr>
				<tr>
					<td><code>autofocus</code></td>
					<td>Booleà que posarà el cursor sobre el primer camp del formulari</td>
				</tr>
				<tr>
					<td><code>inline</code></td>
					<td>Booleà que indica si formulari serà en línea</td>
				</tr>
				
			</tbody>
		</table>
		
	@endcol
@endrow

@row
	
	@col(['size'=>6])
		@includeIf('ajtarragona-web-components::docs.source.forms.form')
	@endcol

	@col(['size'=>6])

		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.form')
		@endcode
	@endcol
@endrow

<hr class="big"/>

<h2>Validació</h2>

@row
	
	@col(['size'=>6])
		<p>El paquet permet fer validacions AJAX dels formularis definint la classe validadora a través del paràmetre <code>validator</code>.</p>
		@includeIf('ajtarragona-web-components::docs.source.forms.form_validate')
	@endcol
	@col(['size'=>6])

		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.form_validate')
		@endcode
	@endcol
@endrow

<hr class="big"/>


<h2>Confirmació</h2>
@row
	
	@col(['size'=>6])
		<p>El paquet permet afegir una confirmació prèvia a l'enviament del formulari</p>
		@includeIf('ajtarragona-web-components::docs.source.forms.form_confirm')
	@endcol

	@col(['size'=>6])

		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.form_confirm')
		@endcode
	@endcol
@endrow



<hr class="big"/>


<h2>Layout de formulari</h2>
@row
	
	@col(['size'=>6])
		<p>Mitjançant files i columnes de bootstrap podem composar formularis complexos.</p>
		<p>També disposem de la directiva <a href="{{ route('webcomponents.docs',['page'=>'forms.inputgroup']) }}"><code>&commat;inputgroup</code></a> i <a href="{{ route('webcomponents.docs',['page'=>'forms.buttongroup']) }}"><code>&commat;buttongroup</code></a>.</p>
		@includeIf('ajtarragona-web-components::docs.source.forms.form_layout')
	@endcol

	@col(['size'=>6])

		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.form_layout')
		@endcode
	@endcol
@endrow
