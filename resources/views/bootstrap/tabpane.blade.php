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
	{!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}
>
	{{ $slot }}
</div>