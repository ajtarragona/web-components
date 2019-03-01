<h1 class="display-4">Grid</h1>
<p class="lead">El paquet proporciona una parell de directives per renderitzar files i columnes de bootstrap.</p>

<hr/>

<h1>Files</h1>
@row
	
	@col(['size'=>7])

		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.rows')
		@endcode
	@endcol
	@col
		<table class="table table-sm">
			<thead>
				<tr>
					<th >Paràmetres</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><code>id</code></td>
					<td>Id de l'element</td>
				</tr>
				<tr>
					<td><code>class</code></td>
					<td>Classe o classes CSS, separades per espais </td>
				</tr>
							
				<tr>
					<td><code>attributes</code></td>
					<td>Atributs extra que s'afegiran a l'element HTML.</td>
				</tr>
				
				<tr>
					<td><code>data</code></td>
					<td>Atributs data extra que s'afegiran a l'element HTML.</td>
				</tr>
				
			</tbody>
		</table>
	@endcol
@endrow


<hr/>

<h1>Columnes</h1>
<p>Les columnes han d'anar sempre dins d'una fila.</p>
<p>Fent servir aquesta directiva les columnes sempre seran responsive. Es mostraran amb la mida indicada fins al breakpoint sm, moment en que passen a ocupar tot l'ample de la fila.</p>

@row
	@col(['size'=>7])
		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.cols')
		@endcode

	@endcol
	@col
		<table class="table table-sm">
			<thead>
				<tr>
					<th>Paràmetres</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><code>size</code></td>
					<td>Indica el número de columnes que ocuparà dins la graella de 12. Si no indiquem res, es distribuiran automàticament.</td>
				</tr>
				<tr>
					<td><code>class</code></td>
					<td>Classe o classes CSS, separades per espais </td>
				</tr>
							
				<tr>
					<td><code>attributes</code></td>
					<td>Atributs extra que s'afegiran a l'element HTML.</td>
				</tr>
				
				<tr>
					<td><code>data</code></td>
					<td>Atributs data extra que s'afegiran a l'element HTML.</td>
				</tr>
				
			</tbody>
		</table>
	@endcol
@endrow