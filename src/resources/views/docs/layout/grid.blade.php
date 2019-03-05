<h1 class="display-4">Graella</h1>
<p class="lead">El paquet proporciona una parell de directives per renderitzar files (rows) i columnes (columns) de bootstrap.</p>
<p><a href="https://getbootstrap.com/docs/4.3/layout/grid/" target="_blank">@icon('external-link-alt')  Documentació sobre graelles Bootstrap</a></p>

<hr class="big"/>

<h1>Files</h1>
@row
	
	@col(['size'=>6])
		<p>Podem crear files Bootstrap amb el component <mark><code>&commat;row</code> &hellip; <code>&commat;endrow</code></mark></p>

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


		<p><mark>Podem utilitzar les <a href="{{ route('webcomponents.docs',['page'=>'utils']) }}#row-gap-utils">utilitats d'espaiat de files</a> per definir l'espaiat entre colummes de la graella.</mark></p>

		
	@endcol

	@col(['size'=>6])
		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.layout.rows')
		@endcode
		
	@endcol

@endrow


<hr class="big"/>


<h1>Columnes</h1>
@row

	@col(['size'=>6])
		<p>Podem crear columnes Bootstrap amb el component <mark><code>&commat;col</code> &hellip; <code>&commat;endcol</code></mark></p>

		<p>Les columnes han d'anar sempre dins d'una fila.</p>
		<p>Fent servir aquesta directiva les columnes sempre seran responsive. Es mostraran amb la mida indicada fins al breakpoint <code>sm</code>, moment en que passen a ocupar tot l'ample de la fila.</p>
		<p>Si no indiquem l'atribut <code>size</code> les columnes es distribueixen automàticament.</p>
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

	@col(['size'=>6])
		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.layout.cols')
		@endcode
		
	@endcol

@endrow

<hr class="big"/>

<h1>Container</h1>


@row

	@col(['size'=>6])

		<p>Podem crear containers Bootstrap amb el component <mark><code>&commat;container</code> &hellip; <code>&commat;endcontainer</code></mark></p>
		<p>Les plantilles incorporades al paquet ja envolcallen tot en un <code>container-fluid</code> de bootstrap, però igualment també disposem del component <code>&commat;container</code> per si per exemple volem anidar files dins de columnes:</p>

		<table class="table table-sm">
			<thead>
				<tr>
					<th>Paràmetres</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><code>fluid</code></td>
					<td>Indica si serà un container fluid (que ocupa tot l'espai horitzontal) o no (ample màxim definit per Bootstrap). Per defecte és <code>true</code>.</td>
				</tr>
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

	@col(['size'=>6])
		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.layout.container')
		@endcode
	@endcol

@endrow
