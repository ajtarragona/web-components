<h1 class="display-4">Utilitats CSS</h1>
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
<p>Cal afegir la classe <code>anim</code> a més a més d'alguna de les següents:</p>
@row
	@col
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
	@endcol

	@col
		<ul class="list-unstyled">
			<li>
				<span class="badge badge-info badge-pill anim from-right " >from-right</span>
			</li>
			<li><span class="badge badge-info badge-pill  anim  from-left " >from-left</span></li>
			<li><span class="badge badge-info badge-pill  anim  from-top delay-1" >from-top</span></li>
			<li><span class="badge badge-info badge-pill  anim  from-bottom delay-1" >from-bottom</span></li>
			<li><span class="badge badge-info badge-pill  anim  from-center delay-2" >from-center</span></li>
			<li><span class="badge badge-info badge-pill  anim  rotate-from-center delay-2" >rotate-from-center</span></li>
			<li><span class="badge badge-info badge-pill  anim  grow-top delay-3" >grow-top</span></li>
			<li><span class="badge badge-info badge-pill  anim  grow-bottom delay-4" >grow-bottom</span></li>
			<li><span class="badge badge-info badge-pill  anim  grow-left delay-5" >grow-left</span></li>
			<li><span class="badge badge-info badge-pill  anim  grow-right delay-6" >grow-right</span></li>
			<li><span class="badge badge-info badge-pill  anim  flip-x delay-7" >flip-x</span></li>
			<li><span class="badge badge-info badge-pill  anim  flip-y delay-8" data-scrollwatch="false">flip-y</span></li>
		</ul>
	@endcol
@endrow
<p>Per defecte les animacions es reprodueixen sempre que l'element "entra" a la pantalla. Si volem deshabilitar aquest comportament hem d'afegir l'atribut <code>data-scrollwatch="false"</code>.</p>
<p>A més a més, disposem de la opció de endarrerir l'efecte d'aparició amb la classe <code>delay-{numero}</code>, sent numero un valor entre 0 (sense delay) fins 8 (màxim delay).</p>

<h5>Animacions cícliques</h5>
<p>Cal afegir la classe alguna de les següents classes CSS:</p>
<ul>
	<li><code>spin</code> - Gira  @icon('star',['class'=>'spin'])</li>
	<li><code>beat</code> - Batega   @icon('star',['class'=>'beat'])</li>
	<li><code>bounce</code> - Rebota @icon('star',['class'=>'bounce'])</li>
	<li><code>blink</code> - Parpelleja @icon('star',['class'=>'blink'])</li>
	<li><code>orbit</code> - Orbita @icon('star',['class'=>'orbit'])</li>
	
</ul>

<mark><strong>Nota:</strong> L'animació no funcionarà si l'element té <code>display: inline</code></mark>


<hr class="big" id="colors-utils"/>


<h2>Colors</h2>

<p>A més a més dels colors predefinits de Bootstrap (success, info, danger, warning...), s'afegeixen alguns colors extra a les utilitats de color de fons <code>bg-{color}</code>, colors de text <code>text-{color}</code> o colors de vores <code>border-{color}</code></p>

<span class="bg-gray-100">gray-100</span> 
<span class="bg-gray-200">gray-200</span> 
<span class="bg-gray-300">gray-300</span> 
<span class="bg-gray-400">gray-400</span> 
<span class="bg-gray-500">gray-500</span> 
<span class="bg-gray-600 text-white">gray-600</span> 
<span class="bg-gray-700 text-white">gray-700</span> 
<span class="bg-gray-800 text-white">gray-800</span> 
<span class="bg-blue text-white">blue</span> 
<span class="bg-indigo text-white">indigo</span> 
<span class="bg-purple text-white">purple</span> 
<span class="bg-pink text-white">pink</span> 
<span class="bg-red text-white">red</span> 
<span class="bg-orange text-white">orange</span> 
<span class="bg-yellow text-white">yellow</span> 
<span class="bg-green text-white">green</span> 
<span class="bg-teal text-white">teal</span> 
<span class="bg-cyan text-white">cyan</span>





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




