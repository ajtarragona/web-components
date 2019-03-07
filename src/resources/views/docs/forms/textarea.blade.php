<h1 class="display-4">Textarea</h1>
<p class="lead">Podem crear camps de text llarg amb la directiva <mark><code>&commat;textarea</code></mark></p>

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
					<td><code>rows</code></td>
					<td>Files del camp</td>
				</tr>
				<tr>
					<td><code>autoheight</code></td>
					<td>Altura automàtica (s'adapta al contingut). Es fa servir el mòdul <a href="https://github.com/jackmoore/autosize" target="_blank">autosize</a>.</td>
				</tr>
				
				
			</tbody>
		</table>
	
		@form
			@includeIf('ajtarragona-web-components::docs.source.forms.textarea')
		@endform
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.textarea')
		@endcode
		
	@endcol
@endrow
