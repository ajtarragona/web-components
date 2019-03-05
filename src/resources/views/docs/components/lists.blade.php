<h1 class="display-4">Lists</h1>
<p class="lead">
	Podem crear llistes Bootstrap amb la directiva <mark><code>&commat;list</code></mark>
	<br/>A més, disposem de la directiva  <mark><code>&commat;li</code></mark> cadascun dels items de la llista</p>
</p>
<p><a href="https://getbootstrap.com/docs/4.3/components/list-group/" target="_blank">@icon('external-link-alt')  Documentació sobre llistes Bootstrap</a></p>

<hr class="big"/>

@row
	
	@col(['size'=>6])
		<p>Directiva <code>&commat;list</code>:	</p>
		<table class="table table-sm">
			<thead>
				<tr>
					<th >Paràmetres</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					<td><code>flush</code></td>
					<td>
						<p>Deshabilita les vores de la llista</p>
					</td>
				</tr>

				
		
				
			</tbody>
		</table>

		<p>Directiva <code>&commat;li</code>:</p>
		<table class="table table-sm">
			<thead>
				<tr>
					<th >Paràmetres</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					<td><code>href</code></td>
					<td>
						<p>Enllaç al que apuntarà l'item de la llista</p>
					</td>
				</tr>
				<tr>
					<td><code>active</code></td>
					<td>
						<p>Booleà que indica si estarà actiu o no</p>
					</td>
				</tr>
				<tr>
					<td><code>style</code></td>
					<td>
						<p></p>
					</td>
				</tr>
				<tr>
					<td><code>disabled</code></td>
					<td>
						<p>Booleà que indica si està habilitat o no</p>
					</td>
				</tr>

				<tr>
					<td><code>icon</code></td>
					<td>Icona de l'etiqueta</td>
				</tr>


				<tr>
					<td><code>iconalign</code></td>
					<td>Posició de la icona (<code>left</code> o <code>right</code>)</td>
				</tr>
				<tr>
					<td><code>iconcolor</code></td>
					<td>Color de la icona. <a href="{{ route('webcomponents.docs',['page'=>'components.icons']) }}">Colors acceptats</a>.</td>
				</tr>	
		
				
			</tbody>
		</table>

		
		
		@includeIf('ajtarragona-web-components::docs.source.components.lists')
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.components.lists')
		@endcode
		
	@endcol
@endrow
