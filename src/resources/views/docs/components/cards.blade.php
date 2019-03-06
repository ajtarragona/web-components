<h1 class="display-4">Cards</h1>
<p class="lead">
	Podem crear cards Bootstrap amb el component <mark><code>&commat;card</code> &hellip; <code>&commat;endcard</code></mark>
	<br/>
	A banda de l'slot principal, que conté el body de la card, aquest component té dos slots més per al <code>header</code> i el <code>footer</code>.

</p>
<p><a href="https://getbootstrap.com/docs/4.3/components/card/" target="_blank">@icon('external-link-alt')  Documentació sobre cards Bootstrap</a></p>

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
					<td><code>title</code></td>
					<td>Títol de la card</td>
				</tr>
				<tr>
					<td><code>subtitle</code></td>
					<td>Subtítol de la card</td>
				</tr>

				<tr>
					<td><code>type</code></td>
					<td>Estil de la card (success, info, danger, warning...)</td>
				</tr>

				
			</tbody>
		</table>
		

		@includeIf('ajtarragona-web-components::docs.source.components.cards')

		
	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.components.cards')
		@endcode
		
	@endcol
@endrow
