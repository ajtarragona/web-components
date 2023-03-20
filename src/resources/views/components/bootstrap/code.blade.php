<pre 
	@isset($id) id="{{$id}}" @endif
	class="prettyprint theme-{{ $theme ?? 'dark'}} 
		{!! (isset($linenums) && $linenums)?'linenums':'' !!}
		{!! (isset($lang))?'lang-'.$lang:'' !!} 
		{{ $class ?? ''}}
	"

	data-copy="{!! isset($copy)?($copy?"true":"false"):"true" !!}"
	

><code>@php

echo htmlentities($slot);

@endphp</code></pre>