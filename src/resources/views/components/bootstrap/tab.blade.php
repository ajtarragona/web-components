@php
	if(isset($persist) && isset($href)){
		//echo "OK";
		$persistvalue=str_replace_first("#","",$href);
		if(session($persist)) $active=session($persist)==$persistvalue;
	}
	
@endphp

<li 
	@isset($id) id="{{$id}}" @endisset 
	class="nav-item {{ isset($class)?$class:'' }}" 
	role="tablist"
	{!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}

>
	<a class="nav-link @istrue($active,'active')" href="{{ isset($href)?$href:'#'}}" data-toggle="tab" role="tab" 
		@if(isset($persist)) data-session-setting="{{$persist}}" data-session-value="{{ str_replace_first('#','',$persistvalue) }}" @endif
	>
		  @include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.parts.icontext')
	</a>
</li>