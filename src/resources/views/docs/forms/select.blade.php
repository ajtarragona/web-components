<h1 class="display-4">Select</h1>
<p class="lead">
	Podem crear camps select amb la directiva <mark><code>&commat;select</code></mark>
</p>
<p><a href="https://developer.snapappointments.com/bootstrap-select/" target="_blank">@icon('external-link-alt')  Web del plugin <strong>bootstrap-select</strong></a></p>

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
					<td><code>options</code></td>
					<td>Array de valors del select.</td>
				</tr>
				<tr>
					<td><code>multiple</code></td>
					<td><code>true</code> o <code>false</code></td>
				</tr>
				<tr>
					<td><code>selected</code></td>
					<td>Valor o array de valors pre-seleccionats</td>
				</tr>
				<tr>
					<td><code>show-deselector</code></td>
					<td>Mostra la creueta per deseleccionar</td>
				</tr>
				<tr>
					<td><code>renderhelper</code></td>
					<td>Mostra la creueta per deseleccionar</td>
				</tr>
				<tr>
					<td><code>size</code></td>
					<td>Mida del desplegable</td>
				</tr>
				<tr>
					<td><code>live-search</code></td>
					<td>Mostra o amaga la caixa de búsqueda</td>
				</tr>
				<tr>
					<td><code>width</code></td>
					<td>Ample de l'element (fit, auto, %, px). Per defecte 100%</td>
				</tr>
				<tr>
					<td><code>actions-box</code></td>
					<td>Mostra els botons de seleccionar o deseleccionar tot (útil per selects multiples)</td>
				</tr>
				
				
			</tbody>
		</table>
		
		
		@includeIf('ajtarragona-web-components::docs.source.forms.select')
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.select')
		@endcode
		
	@endcol
@endrow
