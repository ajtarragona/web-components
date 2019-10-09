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
                        <p>Activa o desactiva el buscador de carrers.</p>
                    </td>
                </tr>
                
				<tr>
					<td><code>multiple</code></td>
					<td>
						<p>Multiple admetrà afegir diversos marcadors</p>
					</td>
                </tr>
                
                <tr>
                    <td><code>zoom</code></td>
                    <td>
                        <p>Nivell de zoom per defecte. Si hi ha marcadors s'ajustarà per que es visualitzin tots.</p>
                    </td>
                </tr>
                <tr>
                    <td><code>center</code></td>
                    <td>
                        <p>Defineix la localització del centre del mapa. Format string (Lat,Lng)</p>
                    </td>
                </tr>
                <tr>
                    <td><code>geolocate</code></td>
                    <td>
                        <p>Si s'activa, ubica el centre del mapa a la teva localització. S'ignora el paràmetre <code>center</code>.</p>
                    </td>
                </tr>

                <tr>
                    <td><code>addmarkerbtn</code></td>
                    <td>
                        <p>Activa el botó per afegir marcadors manualment.</p>
                    </td>
                </tr>

                <tr>
                    <td><code>addmarkerbtntext</code></td>
                    <td>
                        <p>Text que es mostrará al botó d'afegir marcador.</p>
                    </td>
                </tr>
                <tr>
                    <td><code>animation</code></td>
                    <td>
                        <p>Activa l'animació d'aparició dels marcadors.</p>
                    </td>
                </tr>

                <tr>
                    <td><code>markers</code></td>
                    <td>
                        <p>Array de marcadors.</p>
                        <p>Cada marcador pot tenir els atributs: <code>name</code>, <code>location</code> (array <code>lat</code> i <code>lng</code>) i opcionalment <code>infobox</code>.</p>                    
                    </td>
                </tr>
                <tr>
                    <td><code>cluster</code></td>
                    <td>
                        <p>Activa l'agrupació de marcadors.</p>                    
                    </td>
                </tr>

				<tr>
                        <td><code>controls</code></td>
                        <td>
                            <p>Activa o desactiva els controls de google maps.</p>                    
                            <p><code>zoom</code>, <code>mapType</code>, <code>scale</code>, <code>streetView</code>, <code>rotate</code>, <code>fullscreen</code></p>
                        </td>
                    </tr>
                
		
				
			</tbody>
		</table>


		@form([
			'method'=>'POST',
			'action'=>route('webcomponents.docs.handle',['forms.maps'])
		])
			@includeIf('ajtarragona-web-components::docs.source.forms.maps')
		
            @button(['type'=>'submit','size'=>'sm'])
				Test @icon('chevron-right') 
			@endbutton
		@endform
		
		
	@endcol

	@col(['size'=>6])

		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.maps')
		@endcode
		
	@endcol
@endrow
