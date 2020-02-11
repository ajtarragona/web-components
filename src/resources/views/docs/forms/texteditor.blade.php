<h1 class="display-4">Text editor</h1>
<p class="lead">Podem crear camps de text amb format amb la directiva <mark><code>&commat;texteditor</code></mark></p>
<p>Es basa en el mòdul <a href="https://summernote.org/" target="_blank">@icon('external-link-alt') Summernote</a></p>
		
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
				{{-- <tr>
					<td><code>air-mode</code></td>
					<td>Activa el mode popup.</td>
				</tr> --}}
				<tr>
					<td><code>toolbar</code></td>
					<td>Barra d'eines a utilitzar (<code>simple</code> o <code>advanced</code>).</td>
				</tr>
				<tr>
					<td><code>height</code></td>
					<td>Alçada de l'editor. Si no s'especifica l'alçada s'adaptarà al contingut.</td>
				</tr>
				<tr>
					<td><code>hint-url</code></td>
					<td>Url de l'autocompletable amb el caràcter <code>{</code>.</td>
				</tr>
				
				{{-- <tr>
					<td><code>hint-trigger</code></td>
					<td>Caràcter per llençar l'autocompletable. Per defecte.</td>
				</tr> --}}
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
