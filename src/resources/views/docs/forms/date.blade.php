<h1 class="display-4">Date</h1>
<p class="lead">En aquest cas no existeix una directiva específica. Simplement hem d'utilitzar la directiva <mark><code>&commat;input</code></mark> indicant que el paràmetre <code>type</code> és <code>date</code></p>


<p><a href="https://flatpickr.js.org" target="_blank">@icon('external-link-alt')  Web del plugin <strong>Flatpicker</strong></a></p>

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
					<td><code>date-format</code></td>
					<td>Format de la data. S'accepta: <code>d/m/Y</code>, <code>d/m/Y H:i</code> o bé <code>H:i</code></td>
				</tr>
				<tr>
					<td><code>mode</code></td>
					<td><code>multiple</code> per poder seleccionar més d'una data</td>
				</tr>
				
			</tbody>
		</table>
		
		@form([
			'method'=>'POST',
			'action'=>route('webcomponents.docs.handle',['forms.date'])
		])
			@includeIf('ajtarragona-web-components::docs.source.forms.date')
			@button(['type'=>'submit','size'=>'sm'])
				Test @icon('chevron-right') 
			@endbutton
		@endform
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.date')
		@endcode
		
	@endcol
@endrow
