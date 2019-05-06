<div 
	id="{{ isset($id)?$id:'' }}"
	class="tab-content {{ isset($class)?$class:'' }} @istrue($responsive,'responsive')" 
	{!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}
>
	{{ $slot }}
</div>