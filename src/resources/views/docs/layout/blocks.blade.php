<h1 class="display-4">Blocks</h1>

<hr class="big"/>

@row
	@col(['size'=>6])
		<p>Blocks de text</p>
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
					<td>Tipus de block (info, success, warning, danger)</td>
				</tr>
			
			</tbody>
		</table>
		@includeIf('ajtarragona-web-components::docs.source.layout.block')
			
	@endcol
	@col
		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.layout.block')
		@endcode
	@endcol
@endrow