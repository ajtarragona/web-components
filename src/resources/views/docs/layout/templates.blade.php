<h1 class="display-4">Plantilles</h1>
<p class="lead">El paquet proporciona tres plantilles per fer servir a les nostres vistes blade.</p>

<hr class="big"  id="template-master"/>


<h1 >Master</h1>
<p><mark>@icon('file') ajtarragona-web-components::layout/master</mark></p>

@row
	
	@col(['size'=>7])

		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.layout.master')
		@endcode
				
	@endcol
	@col(['size'=>5])
		<table class="table table-sm">
			<thead>
				<tr>
					<th >Seccions</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><code>css</code></td>
					<td>Estils o arxius css extra</td>
				</tr>
				<tr>
					<td><code>meta</code></td>
					<td>Metas al header </td>
				</tr>
							
				<tr>
					<td><code>title</code></td>
					<td>Títol de la pàgina</td>
				</tr>
				
				<tr>
					<td><code>body</code></td>
					<td>Contingut de la pàgina</td>
				</tr>
				<tr>
					<td><code>js</code></td>
					<td>Scripts o arxius javascript extra</td>
				</tr>
				
			</tbody>
		</table>
	@endcol
@endrow

<hr class="big" id="template-master-sidebar"/>


<h1>Master-sidebar</h1>
<p>La <a href="{{ route('webcomponents.demo') }}">Demo</a> utilitza la plantilla master-sidebar.</p>
<p><mark>@icon('file')  ajtarragona-web-components::layout/master-sidebar</mark></p>

@row
	
	@col(['size'=>7])

		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.layout.master-sidebar')
		@endcode
				
	@endcol
	@col(['size'=>5])
		<table class="table table-sm">
			<thead>
				<tr>
					<th >Seccions</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><code>css</code></td>
					<td>Estils o arxius css extra</td>
				</tr>
				<tr>
					<td><code>meta</code></td>
					<td>Metas al header </td>
				</tr>
							
				<tr>
					<td><code>title</code></td>
					<td>Títol de la pàgina</td>
				</tr>
				
				<tr>
					<td><code>body</code></td>
					<td>Contingut de la pàgina</td>
				</tr>
				<tr>
					<td><code>js</code></td>
					<td>Scripts o arxius javascript extra</td>
				</tr>

				<tr>
					<td><code>menu</code></td>
					<td>Espai a la barra lateral (sidebar) per mostrar el menú principal</td>
				</tr>
				<tr>
					<td><code>breadcrumb</code></td>
					<td>Espai a la barra superior (toolbar) per mostrar el breadcrumb</td>
				</tr>
				<tr>
					<td><code>actions</code></td>
					<td>Espai a la barra superior (toolbar) per mostrar els botons d'acció</td>
				</tr>
				
			</tbody>
		</table>
	@endcol
@endrow

<hr class="big" id="template-modal"/>


<h1>Modal</h1>
<p>Si voleu mostrar modals, podeu extendre aquesta plantilla, que només conté la estructura necessària per mostrar finestres modals de Bootstrap.</p>
<p><mark>@icon('file') ajtarragona-web-components::layout/modal</mark></p>
@row
	
	@col(['size'=>7])

		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.layout.modal')
		@endcode
				
	@endcol

	@col(['size'=>5])
		<table class="table table-sm">
			<thead>
				<tr>
					<th >Seccions</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><code>id</code></td>
					<td>Id de la modal (per CSS o javascript)</td>
				</tr>
				
							
				<tr>
					<td><code>title</code></td>
					<td>Títol de la modal</td>
				</tr>
				
				<tr>
					<td><code>body</code></td>
					<td>Contingut de la modal</td>
				</tr>
		
				<tr>
					<td><code>actions</code></td>
					<td>Espai al footer de la modal per mostrar els botons d'acció</td>
				</tr>
				
			</tbody>
		</table>
	@endcol
@endrow


<hr class="big"/>

<p>Anternativament, si no es volen fer servir les plantilles que proporciona el paquet, podeu incloure tant els estils com els scripts manualment a les vostres plantilles:</p>

@code
	@includeSrc('ajtarragona-web-components::docs.source.layout.includeassets')
@endcode

<p>També podem incloure les variables de l'aplicació (que inclouen les de bootstrap) per fer servir als nostres arxius sass:</p>

@code
	@import "../../../vendor/ajtarragona/web-components/src/resources/assets/sass/_variables";
@endcode