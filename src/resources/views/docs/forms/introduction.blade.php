<h1 class="display-4">Formularis</h1>
<p class="lead">El paquet inclou una sèrie de funcions per facilitar la creació de components de formularis Bootstrap.</p>

@include('ajtarragona-web-components::docs.forms.menu',['hideintro'=>true])


<p>En tots els casos, hi ha dues maneres de fer-les servir:</p>
<ul>
	<li>A través de directiva blade: <mark><code>&commat;nom_component($args)</code></mark> (recomanat)</li>
	<li>A través d'una funció helper:  <mark><code>&lbrace;&excl;&excl; nom_component($args) &excl;&excl;&rbrace;</code></mark>
</ul>

<hr class="big"/>

<p>Tots els components tenen en comú els següents paràmetres, a més dels particulars que es detallen a la seva plana de la documentació.</p>
<table class="table table-sm">
	
	<tbody>
		<tr>
			<td><code>id</code></td>
			<td>Id de l'element</td>
		</tr>
		<tr>
			<td><code>name</code></td>
			<td>Name de l'element</td>
		</tr>
		
		<tr>
			<td><code>value</code></td>
			<td>Valor de l'element</td>
		</tr>
		<tr>
			<td><code>label</code></td>
			<td>Etiqueta de l'element</td>
		</tr>
		<tr>
			<td><code>placeholder</code></td>
			<td>Placeholder de l'element</td>
		</tr>
		<tr>
			<td><code>sidelabel</code></td>
			<td>L'etiqueta es posicionarà a l'esquerra si posem <code>true</code></td>
		</tr>
		<tr>
			<td><code>disabled</code></td>
			<td>Si està deshabilitada</td>
		</tr>
		<tr>
			<td><code>readonly</code></td>
			<td>Si només és de lectura</td>
		</tr>
		<tr>
			<td><code>required</code></td>
			<td>Obligatori o no</td>
		</tr>
		<tr>
			<td><code>helptext</code></td>
			<td>Text d'ajuda</td>
		</tr>
		<tr>
			<td><code>container</code></td>
			<td>Indica si es renderitzarà el contenidor de l'element (per defecte <code>true</code>)</td>
		</tr>
		<tr>
			<td><code>containerclass</code></td>
			<td>Classes CSS extra que s'afegiran al contenidor del camp, separades per espais </td>
		</tr>
		<tr>
			<td><code>icon</code></td>
			<td>Nom de la icona fontawesome</td>
		</tr>
		<tr>
			<td><code>iconposition</code></td>
			<td>left o right</td>
		</tr>
		<tr>
			<td><code>class</code></td>
			<td>Classe o classes CSS, separades per espais </td>
		</tr>
					
		<tr>
			<td><code>attributes</code></td>
			<td>Atributs extra que s'afegiran a l'element HTML.</td>
		</tr>
		
		<tr>
			<td><code>data</code></td>
			<td>Atributs data extra que s'afegiran a l'element HTML.</td>
		</tr>
		
	</tbody>
</table>

