<h1 class="display-4">Breadcrumb</h1>
<p class="lead">
	Podem crear breadcrumbs Bootstrap amb la directiva <mark><code>&commat;breadcrumb</code></mark>

</p>
<p><a href="https://getbootstrap.com/docs/4.3/components/breadcrumb/" target="_blank">@icon('external-link-alt')  Documentació sobre breadcrumbs Bootstrap</a></p>

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
					<td><code>items</code></td>
					<td>
						<p>Array amb els diferents items del breadcrumb. Cada item accepta els següents paràmetres.</p>

						<table class="table table-sm">
							<tr>
								<td class="border-top-0"><code>name</code></td>
								<td class="border-top-0">Nom de l'enllaç</td>
							</tr>

							<tr>
								<td><code>url</code></td>
								<td>Url de l'enllaç</td>
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
						</table>
					</td>
				</tr>

				
		
				
			</tbody>
		</table>
		
		@includeIf('ajtarragona-web-components::docs.source.components.breadcrumbs')
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.components.breadcrumbs')
		@endcode
		
	@endcol
@endrow
