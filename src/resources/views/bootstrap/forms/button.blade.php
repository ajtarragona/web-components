
@isset($dropdown)
<div class="btn-group drop{{ $dropdirection or ''}}">
@endisset

<button 
	@isset($id) id="{{$id}}" @endisset
	@isset($name) name="{{ $name }}" @endisset
	@isset($value) value="{{ $value }}" @endisset
	@isset($dropdown) data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endisset
	
	
	@istrue($disabled ,'disabled="true"')
	@istrue($readonly ,'readonly="true"')
	@istrue($hidden ,'style="display:none"')
		
	type="{{ $type or 'button'}}" 
	class="
		btn 
		btn-@istrue($outline, 'outline-'){{ $style or 'primary' }}  
		{{ $class or '' }} 
		@istrue($pill, 'btn-pill')
		@isset($dropdown) dropdown-toggle @endisset
		@isset($size) btn-{{$size}} @endisset

		"
		{!! html_attributes(isset($attributes)?$attributes:false) !!}
   		{!! html_attributes(isset($data)?$data:false,'data') !!}
	>

	 @include('ajtarragona-web-components::bootstrap.parts.icontext')

</button>


@isset($dropdown)
	<div class="dropdown-menu">
		{!! $dropdown !!}		    
	</div>
</div><!--.btn-group-->
@endisset
			 	