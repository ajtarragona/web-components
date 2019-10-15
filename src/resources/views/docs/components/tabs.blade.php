<h1 class="display-4">Tabs</h1>
<p class="lead">
	Podem crear tabs (pestanyes) Bootstrap amb el component <mark><code>&commat;tabs</code>, <code>&commat;tab</code>, <code>&commat;tabcontent</code> i <code>&commat;tabpane</code>.</mark>

</p>
<p><a href="https://getbootstrap.com/docs/4.3/components/navs/" target="_blank">@icon('external-link-alt')  Documentació sobre tabs Bootstrap</a></p>

<hr class="big"/>

@row
	
	@col(['size'=>6])

		<table class="table table-sm">
			<thead>
				<tr>
					<th >Paràmetres <code>&commat;tabs</code></th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					<td><code>align</code></td>
					<td>left, center, right</td>
				</tr>
				<tr>
					<td><code>pill</code></td>
					<td>true o false</td>
				</tr>
				<tr>
					<td><code>underlined</code></td>
					<td>true o false</td>
				</tr>
				<tr>
					<td><code>justify</code></td>
					<td>true o false</td>
				</tr>
				<tr>
					<td><code>vertical</code></td>
					<td>true o false</td>
				</tr>
				
				
			</tbody>
		</table>

		<table class="table table-sm">
			<thead>
				<tr>
					<th >Paràmetres <code>&commat;tab</code></th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					<td><code>persist</code></td>
					<td>Nom únic de la variable que es guardarà a sessió per persistir l'estat de les pestanyes </td>
				</tr>
				<tr>
					<td><code>href</code></td>
					<td>Id (amb l'#) del tabpane al que fa referència</td>
				</tr>
				<tr>
					<td><code>active</code></td>
					<td>true si ha d'estar actiu</td>
				</tr>
				
				
			</tbody>
		</table>
		
		@includeIf('ajtarragona-web-components::docs.source.components.tabs')

	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.components.tabs')
		@endcode
		
	@endcol
@endrow
