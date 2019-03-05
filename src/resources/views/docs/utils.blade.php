<h1 class="display-4">Utilitats</h1>
<p class="lead">
	A banda de les utilitats CSS que ja incorpora Bootstrap (per espaiats, vores, colors, etc.) el paquet n'incorpora algunes altres.
</p>
<p><a href="https://getbootstrap.com/docs/4.3/utilities/borders/" target="_blank">@icon('external-link-alt')  Documentació sobre utilitats Bootstrap</a></p>

<hr class="big" id="animation-utils"/>

<h2>Animació</h2>

<p>El paquet incopora un seguit d'utilitats CSS per animacions. Hi ha dos tipus d'animacions:</p>
<ol>
	<li><strong>D'aparició</strong> - Es realitzen una vegada, quan carrega la pàgina</li>
	<li><strong>Cícliques</strong> - Es realitzen en bucle indefinidament</li>
</ol>

<h5>Animacions d'aparició</h5>
<p>Cal afegir la classe <code>anim</code> i la classe <code>in</code> a més a més d'alguna de les següents:</p>
<ul>
	<li><code>from-right</code> - Apareix des de la dreta</li>
	<li><code>from-left</code> - Apareix des de l'esquerra</li>
	<li><code>from-top</code> - Apareix des de dalt</li>
	<li><code>from-bottom</code> - Apareix des de sota</li>
	<li><code>from-center</code> - Apareix des del centre</li>
	<li><code>rotate-from-center</code> - Apareix rotant des del centre</li>
	<li><code>grow-top</code> - Apareix creixent des de dalt</li>
	<li><code>grow-bottom</code> - Apareix creixent des de sota</li>
	<li><code>grow-left</code> - Apareix creixent des de l'esquerra</li>
	<li><code>grow-right</code> - Apareix creixent des de la dreta</li>
	<li><code>flip-x</code> - Apareix girant en horitzontal</li>
	<li><code>flip-y</code> - Apareix girant en vertical</li>
</ul>

<p>A més a més, disposem de la opció de endarrerir l'efecte d'aparició amb la classe <code>delay-{numero}</code>, sent numero un valor entre 0 (sense delay) fins 8 (màxim delay).</p>

<h5>Animacions cícliques</h5>
<p>Cal afegir la classe alguna de les següents classes CSS:</p>
<ul>
	<li><code>spin</code> - Gira</li>
	<li><code>beat</code> - Batega</li>
	<li><code>bounce</code> - Rebota</li>
	<li><code>blink</code> - Parpelleja </li>
	
</ul>

<mark><strong>Nota:</strong> L'animació no funcionarà si l'element té <code>display: inline</code></mark>


<hr class="big" id="colors-utils"/>


<h2>Colors</h2>

<p>A més a més dels colors predefinits de Bootstrap (success, info, danger, warning...), s'afegeixen alguns colors extra a les utilitats de color de fons <code>bg-{color}</code>, colors de text <code>text-{color}</code> o colors de vores <code>border-{color}</code></p>

<code>gray-100</code>, 
<code>gray-200</code>, 
<code>gray-300</code>, 
<code>gray-400</code>, 
<code>gray-500</code>, 
<code>gray-600</code>, 
<code>gray-700</code>, 
<code>gray-800</code>, 
<code>blue</code>, 
<code>indigo</code>, 
<code>purple</code>, 
<code>pink</code>, 
<code>red</code>, 
<code>orange</code>, 
<code>yellow</code>, 
<code>green</code>, 
<code>teal</code>, 
<code>cyan</code>





<hr class="big" id="row-gap-utils"/>

<h2>Espaiat de files</h2>

<p>Podem utilitzar la classe CSS <code>gap-{size}</code> per definir l'espaiat entre colummes de la graella.</p>

<p>On <code>size</code> pot tenir aquests valors:</p>
<ul>
	<li><code>0</code> - Sense espaiat</li>
	<li><code>1</code> - Espai d'1px</li>
	<li><code>xs</code> - Espai molt petit</li>
	<li><code>sm</code> - Espai petit</li>
	<li><code>md</code> - Espai mitjà (per defecte)</li>
	<li><code>lg</code> - Espai gran</li>
	<li><code>xl</code> - Espai molt grau</li>
</ul>