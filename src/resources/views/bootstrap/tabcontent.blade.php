<div 
	id="{{ $id or ''}}"
	class="tab-content {{ $class or ''}} @istrue($responsive,'responsive')" 
	{!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}
>
	{{ $slot }}
</div>