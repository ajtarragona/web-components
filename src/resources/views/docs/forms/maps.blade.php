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
                    <td><code>color</code></td>
                    <td>
                        <p>Dels estils bootstrap (success, warning, etc.). Serà el color de la caixa de cerca o el botó d'afegir marcadors.</p>
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
                    <td><code>custommarkers</code></td>
                    <td>
                        <p>Defineix si es faran servir marcadors personalitzats</p>                    
                    </td>
                </tr>
            
                <tr>
                    <td><code>markeroptions</code></td>
                    <td>
                        <p>Defineix l'estil per defecte de les icones customitzades. Els estils de cada marcador sobrescriuran aquests.</p>                    
                        <ul>
                            <li><code>shape</code>: Defineix la forma (MAP_PIN, MAP_PIN_HOLE, MAP_PIN_ALT, SQUARE_PIN, SHIELD, ROUTE, SQUARE, SQUARE_ROUNDED, CIRCLE, CIRCLE_PIN)</li>
                            <li><code>backgroundcolor</code>: Defineix el color de fons del marcador (hexadecimal)</li>
                            <li><code>borderwidth</code>: Mida de la vora</li>
                            <li><code>bordercolor</code>: Color de la vora</li>
                            {{-- <li><code>label</code>: etiqueta a mostrar. </li>
                            <li><code>labelposition</code>: Posició de l'etiqueta: internal o external</li> --}}
                            <li><code>icon</code>: nom fontawesome de la icona</li>
                            <li><code>color</code>: color de l'etiqueta o icona</li>
                            <li><code>opacity</code>: Transparència de la icona (entre 0 i 1)</li>
                            <li><code>scale</code>: Escala. És un multiplicador. És a dir que escala 1 és la mida normal, 2 el doble, 0.5 la meitat, etc.</li>
                        </ul>
                    </td>
                </tr>
            
                <tr>
                    <td><code>theme</code></td>
                    <td>
                        <p>Podem personalitzar l'estil visual del mapa passant un array d'estils. <a href="https://mapstyle.withgoogle.com/">https://mapstyle.withgoogle.com/</a></p>                    
                    </td>
                </tr>
                <tr>
                    <td><code>shapes</code></td>
                    <td>
                        <p>Podem habilitar el dibuix de formes bàsiques, passant-les com array (rectangle, circle, polygon i polyline)</p>                    
                    </td>
                </tr>
                <tr>
                    <td><code>shapes_options</code></td>
                    <td>
                        <p>Podem definir l'estil de les formes dibuixades.</p>  
                        <ul>
                            <li><code>borderwidth</code>: Mida de la vora</li>
                            <li><code>bordercolor</code>: Color de la vora</li> 
                            <li><code>backgroundcolor</code>: Defineix el color de fons de la forma (hexadecimal)</li> 
                            <li><code>opacity</code>: Transparència de la forma (entre 0 i 1)</li>
                        </ul>
                                           
                    </td>
                </tr>
                </tr>
                <tr>
                    <td><code>showcoords</code></td>
                    <td>
                        <p>Posant true es mostrarà a sota un botó que mostrarà les coordenades dels diferents elements (marcadors, o formes) pintats al mapa.</p>                    
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
