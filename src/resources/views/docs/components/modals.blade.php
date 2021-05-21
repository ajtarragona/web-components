<h1 class="display-4">Modals</h1>
<p class="lead">
	Podem crear modals Bootstrap amb el component <mark><code>&commat;modalopener</code> &hellip; <code>&commat;endmodalopener</code></mark>
</p>
<p class="lead">
	Tenim dos opcions per carregar les modals: vía AJAX, definint una url a carregar (a través del paràmetre <code>href</code>) o bé amb modals en local, indicant l'ID de l'element a carregar (a través del paràmetre <code>target</code>).
</p>
<p class="lead">
	En cas de carregar la modal vía AJAX, hem d'assegurar-nos que la vista que carreguem a través del controlador extengui una plantilla que no inclogui tota la estructura html. Al paquet s'inclou una <a href="{{ route('webcomponents.docs',['page'=>'layout.templates']) }}#template-modal">plantilla</a> expressament per això.
</p>

<p class="lead">
	En cas de carregar la modal en local, disposem del component  <mark><code>&commat;modal</code> &hellip; <code>&commat;endmodal</code></mark>, que ens renderitza l'estructura necessària per que la modal es visualitzi correctament.
</p>

<p><a href="https://getbootstrap.com/docs/4.3/components/modal/" target="_blank">@icon('external-link-alt')  Documentació sobre modals Bootstrap</a></p>

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
					<td><code>href</code></td>
					<td>Ruta que obrirà la modal via AJAX</td>
				</tr>
				<tr>
					<td><code>target</code></td>
					<td>ID de l'element HTML que obrirà la modal. Ha d'existir localment</td>
				</tr>
				
				<tr>
					<td><code>style</code></td>
					<td>Estil de la modal (success, info...)</td>
				</tr>
				<tr>
					<td><code>size</code></td>
					<td>Mida de la modal: <code>sm</code>, <code>md</code>, <code>lg</code> o <code>xl</code>. Per defecte <code>md</code></td>
				</tr>
				<tr>
					<td><code>valign</code></td>
					<td>Alineació vertical de la modal: <code>top</code>, <code>center</code>, <code>bottom</code>. Per defecte <code>top</code></td>
				</tr>
				<tr>
					<td><code>halign</code></td>
					<td>Alineació horitzontal: <code>left</code>, <code>center</code>, <code>right</code>. Per defecte <code>center</code></td>
				</tr>
				<tr>
					<td><code>animate</code></td>
					<td><code>true</code> o <code>false</code> indicant si es mostra l'animació d'obertura. Per defecte <code>true</code></td>
				</tr>
				<tr>
					<td><code>maximizable</code></td>
					<td><code>true</code> o <code>false</code> indicant si la modal es pot maximitzar. Per defecte <code>true</code></td>
				</tr>
				<tr>
					<td><code>closable</code></td>
					<td><code>true</code> o <code>false</code> indicant si la modal es pot tancar. Per defecte <code>true</code></td>
				</tr>
				<tr>
					<td><code>dismissable</code></td>
					<td><code>true</code> o <code>false</code> indicant si la modal es pot tancar prement la tecla ESC o fent clic a fora de la modal. Per defecte <code>true</code></td>
				</tr>
				<tr>
					<td><code>draggable</code></td>
					<td><code>true</code> o <code>false</code> indicant si la modal es pot arrossegar. Per defecte <code>true</code></td>
				</tr>
				<tr>
					<td><code>padding</code></td>
					<td>Per defecte el contingut de la modal té un marge interior. Es pot deshabilitar posant <code>false</code></td>
				</tr>
				<tr>
					<td><code>method</code></td>
					<td>La url que obre la modal es carrega per <code>GET</code> per defecte. Podem canviar aquest mètode.</td>
				</tr>
			</tbody>
		</table>
		

		@includeIf('ajtarragona-web-components::docs.source.components.modals')

		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.components.modals')
		@endcode
		
	@endcol
@endrow
