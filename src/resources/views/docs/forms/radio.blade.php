<h1 class="display-4">Radio buttons</h1>
<p class="lead">Podem crear un grup de radio buttons amb la directiva <mark><code>&commat;radios</code></mark></p>

<hr class="big"/>

<h2>Grup de radio buttons</h2>
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
					<td><code>options</code></td>
					<td>Array clau/valor amb els diferents valors </td>
				</tr>
				<tr>
					<td><code>checked</code></td>
					<td>Valor seleccionat</td>
				</tr>
				
			</tbody>
		</table>
		@endcol
@endrow

@row
	@col(['size'=>6])	
		@form([
			'method'=>'POST',
			'action'=>route('webcomponents.docs.handle',['forms.radio'])
		])
			
			
				@includeIf('ajtarragona-web-components::docs.source.forms.radios')

			@button(['type'=>'submit','size'=>'sm'])
				Test @icon('chevron-right') 
			@endbutton
		@endform
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.radios')
		@endcode
		
	@endcol
@endrow
