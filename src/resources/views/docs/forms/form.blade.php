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
					<td>Podem indicar el nom del camp que vulguem que s'enfoqui automàticament, o bé posar <code>true</code> per enfocar el primer </td>
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

<h2>Validació opcional</h2>

@row
	
	@col(['size'=>6])
		<p>Es poden fer validacions AJAX opcionals. S'avisa a l'usuari però se li permet igualment enviar el formulari a través d'una modal de confirmació. Cal indicar la classe del validador amb el paràmetre <code>optionalvalidator</code>.</p>
		@includeIf('ajtarragona-web-components::docs.source.forms.form_optional_validate')
	@endcol
	@col(['size'=>6])

		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.form_optional_validate')
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


<hr class="big"/>


<h2>Formulari AJAX que retorna una vista</h2>
@row
	
	@col(['size'=>6])
		<p>Podem crear formularis que facin el submit via Ajax i es carreguin a la mateixa pàgina o bé en una finestra modal.</p>
		<p>Per fer-ho cal passar el paràmetre <code>target</code> indicant o bé el selector CSS de l'element sobre el que volem que es carregui el resultat o bé l'string <code>modal</code>. 
		@includeIf('ajtarragona-web-components::docs.source.forms.form_ajax')
	@endcol

	@col(['size'=>6])

		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.form_ajax')
		@endcode
	@endcol
@endrow
