<h1 class="display-4">Select</h1>
<p class="lead">
	Podem crear camps select amb la directiva <mark><code>&commat;select</code></mark>
</p>
<p><a href="https://developer.snapappointments.com/bootstrap-select/" target="_blank">@icon('external-link-alt')  Web del plugin <strong>bootstrap-select</strong></a></p>

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
					<td><code>options</code></td>
					<td>
						Array de valors del select. <br/>
						Pots afegir divisors posant a null el valor.<br/>
						Pots fer grups d'opcions anidant arrays. Es farà servir la clau de l'array com a label del grup.
					</td>
				</tr>
				<tr>
					<td><code>multiple</code></td>
					<td><code>true</code> o <code>false</code></td>
				</tr>
				<tr>
					<td><code>selected</code></td>
					<td>Valor o array de valors pre-seleccionats</td>
				</tr>
				<tr>
					<td><code>show-deselector</code></td>
					<td>Mostra la creueta per deseleccionar</td>
				</tr>
				<tr>
					<td><code>renderhelper</code></td>
					<td>Per defecte un camp select que no tingui cap valor seleccionat no s'envia als formularis. Si posem aquest paràmetre a <code>true</code> sempre s'enviarà, en cas de no tenir res seleccionat s'enviarà amb valor null. </td>
				</tr>
				<tr>
					<td><code>size</code></td>
					<td>Mida del desplegable</td>
				</tr>

				<tr>
					<td><code>type</code></td>
					<td>Estil del desplegable (success, info, danger, etc.)</td>
				</tr>
				<tr>
					<td><code>live-search</code></td>
					<td>
						Mostra o amaga la caixa de búsqueda. Podem especificar <code>true</code>, <code>false</code>, <code>auto</code> o un valor numèric. <br>
						El valor <code>auto</code>  (per defecte) s'activa si hi han més de 10 elements (només si no treballem amb ajax).<br/> 
						Passant un valor numèric s'activarà a partir del valor numèric passat (només si no treballem amb ajax).
					</td>
				</tr>
				{{-- <tr>
					<td><code>width</code></td>
					<td>Ample de l'element (fit, auto, %, px). Per defecte 100%</td>
				</tr> --}}
				<tr>
					<td><code>actions-box</code></td>
					<td>Mostra els botons de seleccionar o deseleccionar tot (útil per selects multiples)</td>
				</tr>

				<tr>
					<td><code>url</code></td>
					<td>Si passem una url es carregaran els valors per ajax. <br/>
						La url ha de retornar un array d'objectes en format JSON amb els atributs <code>value</code> i <code>name</code>.<br/>
						Si l'objecte té l'atribut <code>divider</code> aquest serà un divisor.<br/>
						Si <code>value</code> és un array, s'interpretarà que és un optiongroup.

					</td>
				</tr>
				
				
			</tbody>
		</table>
	
		@form([
			'method'=>'POST',
			'action'=>route('webcomponents.docs.handle',['forms.select'])
		])
			
			@includeIf('ajtarragona-web-components::docs.source.forms.select')
			@button(['type'=>'submit','size'=>'sm'])
				Test @icon('chevron-right') 
			@endbutton
		@endform


		@livewire('form-tester',['view'=>'selects'])

		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.forms.select')
		@endcode
		
	@endcol
@endrow
