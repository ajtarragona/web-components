<h1 class="display-4">Helpers Laravel</h1>
<p class="lead">
	El paquet incorpora una sèrie de funcions Helpers a banda de les pròpies de Laravel.
</p>
<p><a href="https://laravel.com/docs/5.6/helpers" target="_blank">@icon('external-link-alt')  Documentació sobre helpers Laravel</a></p>

{{-- <hr class="big" id="html-helpers"/>

<h2>Html</h2>
<p>--TODO--</p>
 --}}
<hr class="big" id="boolean-helpers"/>

<h2>Boleans</h2>
<p class="lead"><mark><code>isTrue()</code></mark></p>
<p>La funció <code>isTrue()</code> retorna si el paràmetre passat és cert (pot ser el boolèa <code>true</code>, l'string "true", el número 1, etc.)</p>
@code
$b = isTrue("true"); //true
$b = isTrue("tururu"); //false
$b = isTrue(true); //true
$b = isTrue(1); //true
$b = isTrue(2); //false
@endcode

<p class="lead"><mark><code>isFalse()</code></mark></p>
<p>La funció <code>isFalse()</code> retorna si el paràmetre passat és fals (pot ser el boolèa <code>false</code>, l'string "false", el número 0, etc.)</p>
@code
$b = isTrue("false"); //true
$b = isTrue("fulsu"); //false
$b = isTrue(false); //true
$b = isTrue(0); //true
$b = isTrue(-1); //false
@endcode

<hr class="big" id="date-helpers"/>

<h2>Dates</h2>
<p class="lead"><mark><code>_now()</code></mark></p>
<p>La funció <code>_now()</code> retorna la data actual com a instància de <a href="https://carbon.nesbot.com/docs/" target="_blank">Carbon</a></p>
@code
$date = _now();
@endcode

<p class="lead"><mark><code>_now()</code></mark></p>
<p>La funció <code>_now()</code> retorna la data actual com a instància de <a href="https://carbon.nesbot.com/docs/" target="_blank">Carbon</a></p>
@code
$date = _now();
@endcode

<p class="lead"><mark><code>_date()</code></mark></p>
<p>La funció <code>_date()</code> retorna la data passada, en format dd/mm/aaaa, com a instància de <a href="https://carbon.nesbot.com/docs/" target="_blank">Carbon</a></p>
@code
$date = _date("31/12/2010"); 
@endcode


<p class="lead"><mark><code>_time()</code></mark></p>
<p>La funció <code>_time()</code> retorna la hora, en format hh:mm:ss, com a instància de <a href="https://carbon.nesbot.com/docs/" target="_blank">Carbon</a></p>
@code
$time = _time("14:23:12"); 
$time = _time("14:23"); 
$time = _time("14"); 
@endcode



<p class="lead"><mark><code>dateformat()</code></mark></p>
<p>La funció <code>dateformat()</code> formateja al format dd/mm/aaaa la data passada en format <a href="https://carbon.nesbot.com/docs/" target="_blank">Carbon</a> </p>
@code
$date = dateformat(_now()); 
@endcode

<p class="lead"><mark><code>dateformat()</code></mark></p>
<p>La funció <code>dateformat()</code> formateja la data passada en format <a href="https://carbon.nesbot.com/docs/" target="_blank">Carbon</a> al format passat. Si no passem cap format per defecte serà <code>d/m/Y</code>.</p>
@code
$date = dateformat(_now()); 
$date = dateformat(_date('31/12/2010'),"mm-dd-aaaa"); 
@endcode


<p class="lead"><mark><code>timeformat()</code></mark></p>
<p>La funció <code>timeformat()</code> formateja la hora passada en format <a href="https://carbon.nesbot.com/docs/" target="_blank">Carbon</a> al format passat. Si no passem cap format per defecte serà <code>H:i:s</code>.</p>
@code
$date = timeformat(_now()); 
@endcode



<p class="lead"><mark><code>datetimeformat()</code></mark></p>
<p>La funció <code>datetimeformat()</code> formateja la data passada en format <a href="https://carbon.nesbot.com/docs/" target="_blank">Carbon</a> al format passat. Si no passem cap format per defecte serà <code>d/m/Y H:i:s</code>.</p>
@code
$date = datetimeformat(_now()); 
@endcode