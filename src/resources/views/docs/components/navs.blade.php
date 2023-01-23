<h1 class="display-4">Navs</h1>
<p class="lead">
	Podem crear modals menús de navegació amb el component <mark><code>&commat;nav</code></mark>
</p>
<p class="lead">
</p>

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
					<td><code>items</code></td>
					<td>
						Array amb els elements del menú de navegació.<br>
						Cada element és un array amb els següents atributs:
						<table class="table table-sm">
							<tbody>
								<tr>
									<td><code>title</code></td>
									<td>Títol de la opció de menú</td>
								</tr>
								<tr>
									<td><code>icon</code></td>
									<td>Icona de la opció de menú. (nom fontawesome o bootstrap icon)</td>
								</tr>
								<tr>
									<td><code>url</code></td>
									<td>Url del menú. ÉS opcional, per exemple per elements amb submenú.</td>
								</tr>
								<tr>
									<td><code>active</code></td>
									<td>Booleà que indica si la opció es mostrarà com a activa.</td>
								</tr>
								<tr>
									<td><code>visible</code></td>
									<td>Booleà que indica si el menú es mostrarà o no (per exemple en base a permisos de l'usuari)</td>
								</tr>
								<tr>
									<td><code>iconoptions</code></td>
									<td>Opcions de la icona (position, color, bg-color, circle)</td>
								</tr>
								<tr>
									<td><code>children</code></td>
									<td>Array d'elements del submenú</td>
								</tr>
							</tbody>
						</table>

					</td>
				</tr>
				<tr>
					<td><code>navigation</code></td>
					<td>Tipus de navegació: <code>drilldown</code>, <code>dropdown</code>, <code>collapse</code></td>
				</tr>
				<tr>
					<td><code>fullwidth</code></td>
					<td>Booleà que indica si el menú de navegació ocuparà tot l'ample</td>
				</tr>
				<tr>
					<td><code>class</code></td>
					<td>Classe css del menú de navegació.</td>
				</tr>
				
			</tbody>
		</table>
		
			<div class="mb-3">
				<h5>Drilldown</h5>
				@card(['withbody'=>false,'class'=>'mb-3'])
					
					
				@includeIf('ajtarragona-web-components::docs.source.components.nav-drilldown')


					

				@endcard
			</div>


			<div class="mb-3">
				<h5>Dropdown</h5>
				<p>El dropdown té alguns paràmetres més
				<table class="table table-sm">
					<tbody>
						
						<tr>
							<td><code>disposition</code></td>
							<td>horizontal o vertical</td>
						</tr>
						{{-- <tr>
							<td><code>dropdown-hover</code></td>
							<td>Booleà que indica si el menú es deplegarà al passar el ratolí per damunt (true) o al fer clic (false)</td>
						</tr>
						<tr>
							<td><code>hover-delay</code></td>
							<td>Milisegons que triga el menú en aparèixer quan es passa el ratolí per sobre</td>
						</tr> --}}
						<tr>
							<td><code>dropdown-direction</code></td>
							<td>Direcció del menú emergent (right o left)</td>
						</tr>
						<tr>
							<td><code>dropdown-vertical-direction</code></td>
							<td>Direcció vertical del menú emergent (top o bottom)</td>
						</tr>
					
						
					</tbody>
				</table>
				@card(['withbody'=>false,'type'=>'success','class'=>'mb-3'])
					@includeIf('ajtarragona-web-components::docs.source.components.nav-dropdown')
				@endcard
				@card(['withbody'=>false,'class'=>'mb-3'])
					@includeIf('ajtarragona-web-components::docs.source.components.nav-dropdown2')
				@endcard
			</div>
			<div class="mb-3">
			<h5>Collapse</h5>

				@card(['withbody'=>false,'type'=>'danger','class'=>'mb-3'])
				@includeIf('ajtarragona-web-components::docs.source.components.nav-collapse')

					
					


					
				@endcard
			</div>
		@endcol
		@col(['size'=>6])

			@tabs(['underlined'=>true])
				@tab(['href'=>'#tab-navs-1','active'=>true])
					Drilldown
				@endtab
				@tab(['href'=>'#tab-navs-2'])
					Dropdown
				@endtab
		
				@tab(['href'=>'#tab-navs-3'])
					Collapse
				@endtab
				
			
				
			@endtabs
			
			<div class="mt-2">
				@tabcontent
					@tabpane(['id'=>'tab-navs-1','active'=>true])
						@code(['lang'=>'java'])
							@includeSrc('ajtarragona-web-components::docs.source.components.nav-drilldown')
						@endcode
					@endtabpane

					@tabpane(['id'=>'tab-navs-2'])
						@code(['lang'=>'java'])
							@includeSrc('ajtarragona-web-components::docs.source.components.nav-dropdown')
						@endcode
						@code(['lang'=>'java'])
							@includeSrc('ajtarragona-web-components::docs.source.components.nav-dropdown2')
						@endcode
					@endtabpane
				
				
					@tabpane(['id'=>'tab-navs-3'])
						@code(['lang'=>'java'])
							@includeSrc('ajtarragona-web-components::docs.source.components.nav-collapse')
						@endcode
					@endtabpane
			
				@endtabcontent

			</div>
			
			
		@endcol
	@endrow
