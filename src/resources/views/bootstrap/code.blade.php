<pre 
	@isset($id) id="{{$id}}" @endif
	class="prettyprint 
		{!! (isset($linenums) && $linenums)?'linenums':'' !!}
		{!! (isset($lang))?'lang-'.$lang:'' !!}
	"

	data-copy="{!! isset($copy)?($copy?"true":"false"):"true" !!}"
	

><code>@php

echo htmlentities($slot);

@endphp</code></pre>