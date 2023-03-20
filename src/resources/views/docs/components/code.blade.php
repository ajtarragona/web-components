<h1 class="display-4">Code</h1>
<p class="lead">
	Podem crear blocs de codi amb la directiva <mark><code>&commat;code</code> &hellip; <code>&commat;endcode</code></mark>

</p>
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
					<td><code>theme</code></td>
					<td>Tema (light o dark). Per defecte dark</td>
				</tr>
				<tr>
					<td><code>linenums</code></td>
					<td>true si volem mostrar els números de línea</td>
				</tr>

				<tr>
					<td><code>lang</code></td>
					<td>Llenguatge a interpretar (java, php, html...).</td>
				</tr>
				
				<tr>
					<td><code>copy</code></td>
					<td>Mostrar el botó per copiar el codi. Per defecte true.</td>
				</tr>
				
				
				
				
			</tbody>
		</table>
		
		@includeIf('ajtarragona-web-components::docs.source.components.code')

	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.components.code')
		@endcode
		
	@endcol
@endrow
