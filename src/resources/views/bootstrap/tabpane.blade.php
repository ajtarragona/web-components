@php
	if(isset($persist) && isset($id)){
		//echo "OK";
		if(session($persist))  $active=session($persist)==$id;
	}
	
@endphp

<div 
	id="{{ $id or ''}}"
	class="tab-pane @istrue($fade,'fade')  @istrue($active,'show active') {{ $class or ''}} " 
	role="tabpanel" 
	{!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}
>
	{{ $slot }}
</div>