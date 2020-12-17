<h1 class="display-4">Icones</h1>
<p class="lead">
	Podem crear icones Fontawesome o Bootstrap amb la directiva <mark><code>&commat;icon</code> </mark>
	<br/>També disposem de la directiva <mark><code>&commat;circleicon</code> </mark>
</p>
<p><a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">@icon('external-link-alt')  Documentació sobre icones Fontawesome</a></p>
<p><a href="https://icons.getbootstrap.com/" target="_blank">@icon('external-link-alt')  Documentació sobre icones Bootstrap</a></p>

<hr class="big"/>

@row
	
	@col(['size'=>6])
		<p>En aquest cas el primer paràmetre és el nom de la icona. Si incloem el prefix <code>bi-</code> s'utilitzaran icones Bootstrap. </p>
		<p>Si no fem servir prefix o bé fem servir el prefix <code>fa-</code>, es faran servir les icones Fontawesome.</p>
		<p>El segon paràmetre és un array d'arguments.</p>
		<table class="table table-sm">
			<thead>
				<tr>
					<th >Arguments</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				
				<tr>
					<td><code>color</code></td>
					<td>Color de la icona. Pot ser un color predefinit de bootstrap (info, success, alert, danger, primary, secondary, dark, light) o bé un color hexadecimal ( <code>#ff0000</code> ) o bé RGBA <code>rgba(0,0,0,0)</code> )</td>
				</tr>
				<tr>
					<td><code>bg-color</code></td>
					<td>Color de fons de la icona</td>
				</tr>
				
				<tr>
					<td><code>size</code></td>
					<td>Mida de la icona (xs,sm,md,lg,xl)</td>
				</tr>
				<tr>
					<td><code>type</code></td>
					<td>Tipus d'icona fontawesome (<code>fas</code>, <code>far</code>,<code>fal</code>,<code>fab</code>)</td>
				</tr>
				
				
				
			</tbody>
		</table>
		
		@includeIf('ajtarragona-web-components::docs.source.components.icons')

	@endcol

	@col(['size'=>6])


		@code(['lang'=>'java'])
			@includeSrc('ajtarragona-web-components::docs.source.components.icons')
		@endcode
		
	@endcol
@endrow
