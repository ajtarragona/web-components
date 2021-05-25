<h1 class="display-4">Autocomplete</h1>
<p class="lead">
	Podem crear camps autocompletables amb la directiva <mark><code>&commat;autocomplete</code></mark>
</p>

<p><a href="http://twitter.github.io/typeahead.js" target="_blank">@icon('external-link-alt')  Web del plugin <strong>typeahead.js</strong></a></p>

<p><a href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples" target="_blank">@icon('external-link-alt')  Web del plugin <strong>Bootstrap Tags Input</strong></a></p>

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
					<td><code>url</code></td>
					<td>
						Url que retornarà les dades. Cal que es retorni un array d'objectes amb els atributs <code>"value"</code> i <code>"name"</code>, en format JSON.<br/>
						L'atribut name no hauria d'incloure codi html, ja que no es pot visualitzar bé al camp de text.<br/>
						Si incloem un tercer atribut "suggestion" al json retornat aquest serà el que es mostrarà al desplegable i aquest si que pot contenir codi html. 
					</td>
				</tr>
				<tr>
					<td><code>multiple</code></td>
					<td><code>true</code> o <code>false</code></td>
				</tr>
				<tr>
					<td><code>savevalue</code></td>
					<td>Si posem <code>true</code> (per defecte ho és) es valor que es guardarà (i que s'enviarà al formulari) serà el <code>value</code> retornat al json. Si no, es guardarà el <code>name</code>.</td>
				</tr>
				<tr>
					<td><code>showvalue</code></td>
					<td>Si ho posem a <code>true</code> es mostrarà el valor de l'item seleccionat al costat del nom.</td>
				</tr>
				<tr>
					<td><code>value</code></td>
					<td>Valor seleccionat per defecte. En els camps múltiples ha de ser un array (encara que sigui un sol element).</td>
				</tr>
				<tr>
					<td><code>valuename</code></td>
					<td>En cas que <code>savevalue</code> sigui <code>true</code>, si volem que per defecte es mostri el nom de l'item seleccionat l'hem de posar aqui. En els camps múltiples ha de ser un string amb els valors separats per <code>##</code>.</td>
				</tr>

				<tr>
					<td><code>min-length</code></td>
					<td>Mida mínima del terme de cerca amb que es començarà l'autocompletat.</td>
				</tr>

				
				
			</tbody>
		</table>

		<p><mark>El text escrit al camp s'enviarà a la request del controlador com a un paràmetre amb el nom <code>term</code>.</mark></p>
			
		<p><mark>En els camps que tinguin <code>savevalue</code> a <code>true</code> a més del propi valor del camp també s'enviarà el nom amb un paràmetre <code>content_{nom_camp}</code>.</mark></p>

		<p><mark>En els camps multiples, el valor s'enviarà com un string amb els valors separats per comes.</mark></p>
	
		@form([
			'method'=>'POST',
			'action'=>route('webcomponents.docs.handle',['forms.autocomplete'])
		])
			@includeIf('ajtarragona-web-components::docs.source.forms.autocomplete')
			@button(['type'=>'submit','size'=>'sm'])
				Test @icon('chevron-right') 
			@endbutton
		@endform
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.autocomplete')
		@endcode
		
	@endcol
@endrow
