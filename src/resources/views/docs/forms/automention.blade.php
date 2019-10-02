<h1 class="display-4">Mentions</h1>
<p class="lead">
    Podem crear camps amb mencions autocompletables, tipus Twitter, afegint la classe <code>automention</code> 
    a les directives <mark><code>&commat;input</code></mark> o <mark><code>&commat;textarea</code></mark>
</p>

<p><a href="https://github.com/zurb/tribute" target="_blank">@icon('external-link-alt')  Web del plugin <strong>TributeJs</strong></a></p>

<hr class="big"/>



@row
	@col(['size'=>6])
		<table class="table table-sm">
			<thead>
				<tr>
					<th >Paràmetres data</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><code>url</code></td>
					<td>Url que retornarà les dades. Cal que es retorni un array d'objectes amb els atributs <code>"value"</code> (el que es veurà un cop seleccionat) i <code>"key"</code> (el que es veurà al desplegable), en format JSON.</td>
                </tr>
                <tr>
					<td><code>trigger</code></td>
					<td>Caràcter que dispararà l'autocompletat. Per defecte és <code>@</code></td>
                </tr>

                <tr>
					<td><code>pre</code></td>
					<td>Text o codi html que es renderitzarà abans de la menció.</td>
                </tr>

                <tr>
					<td><code>post</code></td>
					<td>Text o codi html que es renderitzarà després de la menció.</td>
                </tr>

                <tr>
					<td><code>prekey</code></td>
					<td>Text que es renderitzarà abans de la menció internament.</td>
                </tr>

                <tr>
					<td><code>postkey</code></td>
					<td>Text que es renderitzarà després de la menció internament.</td>
                </tr>

			</tbody>
		</table>

	
		@form([
			'method'=>'POST',
			'action'=>route('webcomponents.docs.handle',['forms.automention'])
		])
			@includeIf('ajtarragona-web-components::docs.source.forms.automention')
            
            @button(['type'=>'submit','size'=>'sm'])
				Test @icon('chevron-right') 
			@endbutton
		@endform
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.automention')
		@endcode
		
	@endcol
@endrow
