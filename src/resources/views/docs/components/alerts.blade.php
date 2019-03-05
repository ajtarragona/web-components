<h1 class="display-4">Alerts</h1>
<p class="lead">
	Podem crear alerts Bootstrap amb el component <mark><code>&commat;alert</code> &hellip; <code>&commat;endalert</code></mark>

</p>
<p><a href="https://getbootstrap.com/docs/4.3/components/alerts/" target="_blank">@icon('external-link-alt')  Documentació sobre alerts Bootstrap</a></p>

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
					<td>Tipus d'alert (info, success, alert, danger, primary, secondary, dark, light)</td>
				</tr>
				<tr>
					<td><code>title</code></td>
					<td>Títol de l'alert</td>
				</tr>

				<tr>
					<td><code>autohide</code></td>
					<td>L'alert s'amagarà automàticament si ho posem a <code>true</code>.</td>
				</tr>
				
				<tr>
					<td><code>dismissible</code></td>
					<td>Posar a <code>false</code> si volem que l'alert no es pugui tancar.</td>
				</tr>
				
				{{-- <tr>
					<td><code>animate</code></td>
					<td>Id de l'element</td>
				</tr>
				 --}}
				
				
			</tbody>
		</table>
		
		@includeIf('ajtarragona-web-components::docs.source.components.alerts')

	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.components.alerts')
		@endcode
		
	@endcol
@endrow
