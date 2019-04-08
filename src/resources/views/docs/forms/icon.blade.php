<h1 class="display-4">Icones</h1>
<p class="lead">En aquest cas no existeix una directiva específica. Simplement hem d'utilitzar la directiva <mark><code>&commat;input</code></mark> indicant que el paràmetre <code>type</code> és <code>icon</code></p>

<p><a href="https://farbelous.io/fontawesome-iconpicker/" target="_blank">@icon('external-link-alt')  Web del plugin <strong>Iconpicker</strong></a></p>

<hr class="big"/>

@row
	
	@col(['size'=>6])
		
		
		
		@form
			@includeIf('ajtarragona-web-components::docs.source.forms.icon')
		@endform
		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.icon')
		@endcode
		
	@endcol
@endrow
