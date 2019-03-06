<h1 class="display-4">Input</h1>
<p class="lead">Podem crear camps de text amb la directiva <mark><code>&commat;input</code></mark></p>

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
					<td>Tipus de l'element (per defecte <code>text</code>)</td>
				</tr>
				
			</tbody>
		</table>
	

		@includeIf('ajtarragona-web-components::docs.source.forms.input')
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.input')
		@endcode
		
	@endcol
@endrow
