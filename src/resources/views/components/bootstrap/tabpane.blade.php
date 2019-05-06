@php
	if(isset($persist) && isset($id)){
		//echo "OK";
		if(session($persist))  $active=session($persist)==$id;
	}
	
@endphp

<div 
	id="{{ isset($id)?$id:'' }}"
	class="tab-pane @istrue($fade,'fade')  @istrue($active,'show active') {{ isset($class)?$class:'' }} " 
	role="tabpanel" 
	{!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}
>
	{{ $slot }}
</div>