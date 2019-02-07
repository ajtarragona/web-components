<div 
	id="{{ $id or ''}}"
	class="tab-content {{ $class or ''}} @istrue($responsive,'responsive')" 
	{!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}
>
	{{ $slot }}
</div>