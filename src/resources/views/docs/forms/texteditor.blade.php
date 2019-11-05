<h1 class="display-4">Text editor</h1>
<p class="lead">Podem crear camps de text amb format amb la directiva <mark><code>&commat;texteditor</code></mark></p>
<p>Es basa en el mòdul <a href="https://quilljs.com/docs/" target="_blank">@icon('external-link-alt') QuillJS</a></p>
		
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
					<td><code>theme</code></td>
					<td>Tema a utilitzar (<code>snow</code> o <code>bubble</code>).</td>
				</tr>
				<tr>
					<td><code>toolbar</code></td>
					<td>Barra d'eines a utilitzar (<code>simple</code> o <code>advanced</code>).</td>
				</tr>
				<tr>
					<td><code>height</code></td>
					<td>Alçada de l'editor. Si no s'especifica l'alçada s'adaptarà al contingut.</td>
				</tr>
				<tr>
					<td><code>min-height</code></td>
					<td>Alçada mínima de l'editor. Si el contingut és més gran s'adaptarà la mida.</td>
				</tr>
				
				
			</tbody>
		</table>
	

		@form([
			'method'=>'POST',
			'action'=>route('webcomponents.docs.handle',['forms.texteditor'])
		])
			@includeIf('ajtarragona-web-components::docs.source.forms.texteditor')
			@button(['type'=>'submit','size'=>'sm'])
				Test @icon('chevron-right') 
			@endbutton
		@endform
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.texteditor')
		@endcode
		
	@endcol
@endrow
