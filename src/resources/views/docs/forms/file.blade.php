<h1 class="display-4">Arxius</h1>
<p class="lead">Podem crear camps d'arxiu amb la directiva <mark><code>&commat;fileinput</code></mark></p>

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
					<td><code>hidebutton</code></td>
					<td>Permet amagar el botó</td>
				</tr>
				
			</tbody>
		</table>
		
		@form
			@includeIf('ajtarragona-web-components::docs.source.forms.file')
		@endform
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.file')
		@endcode
		
	@endcol
@endrow
