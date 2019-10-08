<h1 class="display-4">Maps</h1>
<p class="lead">
	Podem crear mapes de Google amb la directiva <mark><code>&commat;gmap</code></mark>
	<p>Es pot configurar l'API de google amb la variable <code>GOOGLE_MAPS_API_KEY</code> a l'arxiu <code>.env</code>.</p>
</p>
<p><a href="https://developers.google.com/maps/documentation" target="_blank">@icon('external-link-alt')  Documentació API Google Maps</a></p>

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
                    <td><code>search</code></td>
                    <td>
                        <p></p>
                    </td>
                </tr>
                
				<tr>
					<td><code>multiple</code></td>
					<td>
						<p></p>
					</td>
                </tr>
                
                <tr>
                    <td><code>zoom</code></td>
                    <td>
                        <p></p>
                    </td>
                </tr>
                <tr>
                    <td><code>center</code></td>
                    <td>
                        <p></p>
                    </td>
                </tr>

                <tr>
                    <td><code>addmarkerbtn</code></td>
                    <td>
                        <p></p>
                    </td>
                </tr>

                <tr>
                    <td><code>markers</code></td>
                    <td>
                        <p></p>
                    </td>
                </tr>

				
		
				
			</tbody>
		</table>


		
		
		@includeIf('ajtarragona-web-components::docs.source.forms.maps')
		
	@endcol

	@col(['size'=>6])

		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.maps')
		@endcode
		
	@endcol
@endrow
