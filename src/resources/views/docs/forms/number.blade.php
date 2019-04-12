<h1 class="display-4">Numeros</h1>
<p class="lead">En aquest cas no existeix una directiva específica. Simplement hem d'utilitzar la directiva <mark><code>&commat;input</code></mark> indicant que el paràmetre <code>type</code> és <code>number</code></p>


<p><a href="https://www.virtuosoft.eu/code/bootstrap-touchspin/" target="_blank">@icon('external-link-alt')  Web del plugin <strong>bootstrap-touchspin</strong></a></p>

<hr class="big"/>

@row
	
	@col(['size'=>6])
		<p>A la web del plugin podem trobar els parámetres data que se li poden passar.</p>
		<p>Aqui hi ha alguns exemples:</p>
		<table class="table table-sm">
			<thead>
				<tr>
					<th >Paràmetres data</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					<td><code>min</code></td>
					<td>Valor mínim</td>
				</tr>
				<tr>
					<td><code>max</code></td>
					<td>Valor màxim</td>
				</tr>

				<tr>
					<td><code>decimals</code></td>
					<td>Número de decimals</td>
				</tr>
				<tr>
					<td><code>prefix</code></td>
					<td>Prefix</td>
				</tr>

				<tr>
					<td><code>postfix</code></td>
					<td>Sufix</td>
				</tr>
				
			</tbody>
		</table>
		
		@form([
			'method'=>'POST',
			'action'=>route('webcomponents.docs.handle',['forms.number'])
		])
			@includeIf('ajtarragona-web-components::docs.source.forms.number')
			@button(['type'=>'submit','size'=>'sm'])
				Test @icon('chevron-right') 
			@endbutton
		@endform
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.number')
		@endcode
		
	@endcol
@endrow
