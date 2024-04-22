<h1 class="display-4">Colors</h1>
<p class="lead">En aquest cas no existeix una directiva específica. Simplement hem d'utilitzar la directiva <mark><code>&commat;input</code></mark> indicant que el paràmetre <code>type</code> és <code>color</code></p>

<p><a href="https://farbelous.io/bootstrap-colorpicker/tutorial-Basics.html" target="_blank">@icon('external-link-alt')  Web del plugin <strong>bootstrap-colorpicker</strong></a></p>

<hr class="big"/>

@row
	
	@col(['size'=>6])
		
		
		<p>A la web del plugin podem trobar els parámetres data que se li poden passar.</p>
		
		<p>A més, podem fer servir els següents:</p>
		<table class="table table-sm">
			<thead>
				<tr>
					<th >Paràmetres</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					<td><code>swatches</code></td>
					<td>Array de colors per defecte de la paleta</td>
				</tr>
				
			</tbody>
		</table>

		@form
			@includeIf('ajtarragona-web-components::docs.source.forms.color')
			@livewire('form-tester',['view'=>'colors'])
		@endform
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.color')
		@endcode
		
	@endcol
@endrow
