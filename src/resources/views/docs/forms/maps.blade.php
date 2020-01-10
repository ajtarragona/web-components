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
                        <p>Activa o desactiva el buscador de carrers. Per defecte <code>true</code></p>
                    </td>
                </tr>
                
				<tr>
					<td><code>multiple</code></td>
					<td>
						<p>Multiple admetrà afegir diversos marcadors. Per defecte <code>false</code></p>
					</td>
                </tr>
                
                <tr>
                    <td><code>zoom</code></td>
                    <td>
                        <p>Nivell de zoom per defecte. Per defecte <code>15</code></p>
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
                        <p>Si s'activa, ubica el centre del mapa a la teva localització. S'ignora el paràmetre <code>center</code>. Per defecte <code>true</code></p>
                    </td>
                </tr>
                <tr>
                    <td><code>fitbounds</code></td>
                    <td>
                        <p>Si hi ha marcadors ajustarà el centre i el zoom per que es visualitzin tots. Per defecte <code>false</code></p>
                    </td>
                </tr>

                <tr>
                    <td><code>addmarkerbtn</code></td>
                    <td>
                        <p>Activa el botó per afegir marcadors manualment. Per defecte <code>true</code></p>
                    </td>
                </tr>

                <tr>
                    <td><code>addmarkerbtntext</code></td>
                    <td>
                        <p>Text que es mostrará al botó d'afegir marcador. </p>
                    </td>
                </tr>
                <tr>
                    <td><code>animation</code></td>
                    <td>
                        <p>Activa l'animació d'aparició dels marcadors. Per defecte <code>false</code></p>
                    </td>
                </tr>

                <tr>
                    <td><code>markers</code></td>
                    <td>
                        <p>Array de marcadors o bé un sol marcador.</p>
                        <p>Cada marcador pot tenir els atributs: <code>name</code>, <code>location</code> (array <code>lat</code> i <code>lng</code>) i opcionalment <code>infobox</code>.</p>                    
                    </td>
                </tr>

                <tr>
                    <td><code>value</code></td>
                    <td>
                        <p>Equivalent a markers. Si es passa aquest valor i també el de markers, aquest precederà al que hi hagi a markers.</p>                    
                    </td>
                </tr>

                <tr>
                    <td><code>maptype</code></td>
                    <td>
                        <p>Tipus de mapa: <code>roadmap</code>, <code>satellite</code>, <code>hybrid</code>, <code>terrain</code>. Per defecte <code>roadmap</code></p>                    
                    </td>
                </tr>
                <tr>
                    <td><code>cluster</code></td>
                    <td>
                        <p>Activa l'agrupació de marcadors. Per defecte <code>false</code></p>                    
                    </td>
                </tr>

				<tr>
                    <td><code>controls</code></td>
                    <td>
                        <p>Activa o desactiva els controls de google maps.</p>                    
                        <p><code>zoom</code>, <code>mapType</code>, <code>scale</code>, <code>streetView</code>, <code>rotate</code>, <code>fullscreen</code></p>
                    </td>
                </tr>
            
                <tr>
                    <td><code>url</code></td>
                    <td>
                        <p>Defineix una URL d'on es llegiran els marcadors via AJAX</p>  
                        <p>S'espera un array de marcadors en format json. Cada marcador por tenir els següents atributs: <code>location</code> (lat i lng), <code>name</code>, <code>infobox</code>, <code>id</code> i <code>url</code>. En cas de rebre l'atribut url, s'ignorarà l'atribut infobox i aquesta es carregarà via ajax.</p>
                        <p>A la url se li passaran els paràmetres: <code>minlat</code>, <code>maxlat</code>, <code>minlng</code>, <code>maxlng</code> (la bounding box) i <code>ids</code> (els ids dels marcadors ja pintats).</p>
                    </td>
                </tr>
                <tr>
                    <td><code>method</code></td>
                    <td>
                        <p>Defineix una mètode amb que es cridarà a la URL ajax (per defecte GET)</p>                    
                    </td>
                </tr>
                <tr>
                    <td><code>customicons</code></td>
                    <td>
                        <p>Defineix si es faran servir les icones customitzades de marcadors</p>                    
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
