<h1 class="display-4">Checkboxes</h1>
<p class="lead">Podem crear checkboxes amb la directiva <mark><code>&commat;checkbox</code></mark></p>
<p class="lead">També disposem de la directiva <mark><code>&commat;checkboxes</code></mark></p>

<hr class="big"/>

<h2>Checkboxes individuals</h2>
			
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
					<td><code>color</code></td>
					<td>Color del check (success, info, danger ...)</td>
				</tr>
				<tr>
					<td><code>checked</code></td>
					<td>Booleà indicant si està marcat o no</td>
				</tr>
				
			</tbody>
		</table>
		@endcol
@endrow

@row
	@col(['size'=>6])	
			
			@form([
				'method'=>'POST',
				'action'=>route('webcomponents.docs.handle',['forms.checkbox'])
			])
				
				<div class="mb-3">
					@includeIf('ajtarragona-web-components::docs.source.forms.checkbox')
				</div>


				@button(['type'=>'submit','size'=>'sm'])
					Test @icon('chevron-right') 
				@endbutton
			@endform
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.checkbox')
		@endcode
		
	@endcol
@endrow

<hr class="big"/>

<h2>Grup de checkboxes</h2>
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
					<td>Array amb els valors marcats</td>
				</tr>
				
			</tbody>
		</table>
		@endcol
@endrow

@row
	@col(['size'=>6])	
		@form([
			'method'=>'POST',
			'action'=>route('webcomponents.docs.handle',['forms.checkbox'])
		])
			
			
				@includeIf('ajtarragona-web-components::docs.source.forms.checkboxes')

			@button(['type'=>'submit','size'=>'sm'])
				Test @icon('chevron-right') 
			@endbutton
		@endform
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.checkboxes')
		@endcode
		
	@endcol
@endrow
