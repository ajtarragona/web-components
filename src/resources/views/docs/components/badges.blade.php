<h1 class="display-4">Badges</h1>
<p class="lead">
	Podem crear badges o etiquetes Bootstrap amb el component <mark><code>&commat;badge</code> &hellip; <code>&commat;endbadge</code></mark>

</p>
<p><a href="https://getbootstrap.com/docs/4.3/components/badge/" target="_blank">@icon('external-link-alt')  Documentació sobre badges Bootstrap</a></p>

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
					<td><code>type</code></td>
					<td>Tipus d'etiqueta (info, success, alert, danger, primary, secondary, dark, light)</td>
				</tr>
				<tr>
					<td><code>pill</code></td>
					<td>Posar a <code>true</code> per arrodonir la etiqueta</td>
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

				<tr>
					<td><code>href</code></td>
					<td>Podem fer que la etiqueta sigui un enllaç si passem una url.</td>
				</tr>
				
				
				
			</tbody>
		</table>
		

		@includeIf('ajtarragona-web-components::docs.source.components.badges')

		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.components.badges')
		@endcode
		
	@endcol
@endrow
