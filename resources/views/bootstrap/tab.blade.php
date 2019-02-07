@php
	if(isset($persist) && isset($href)){
		//echo "OK";
		$persistvalue=str_replace_first("#","",$href);
		if(session($persist)) $active=session($persist)==$persistvalue;
	}
	
@endphp

<li 
	@isset($id) id="{{$id}}" @endisset 
	class="nav-item {{ $class or '' }}" 
	role="tablist"
	{!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}
>
	<a class="nav-link @istrue($active,'active')" href="{{ $href or '#'}}" data-toggle="tab" role="tab" 
		@if(isset($persist)) data-session-setting="{{$persist}}" data-session-value="{{ str_replace_first('#','',$persistvalue) }}" @endif
	>
		  @include('ajtarragona-web-components::bootstrap.parts.icontext')
	</a>
</li>