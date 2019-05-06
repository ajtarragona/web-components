
@isset($dropdown)
<div class="btn-group drop{{ isset($dropdirection)?$dropdirection:'' }}">
@endisset

<{{ isset($href)?'a':'button' }} 
	@isset($id) id="{{$id}}" @endisset
	@isset($name) name="{{ $name }}" @endisset
	@isset($value) value="{{ $value }}" @endisset
	@isset($dropdown) data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endisset
	
	
	@istrue($disabled ,'disabled="true"')
	@istrue($readonly ,'readonly="true"')
	@istrue($hidden ,'style="display:none"')
		
	@if(!isset($href)) 
		type="{{  isset($type)?$type:'button'}}" 
	@else 
		href="{{ $href }}"
	@endif

	
	class="
		btn 
		btn-@istrue($outline, 'outline-'){{  isset($style)?$style:'primary' }}  
		{{  isset($class)?$class:''  }} 
		@istrue($pill, 'btn-pill')
		@isset($dropdown) dropdown-toggle @endisset
		@isset($size) btn-{{$size}} @endisset

		"
		
		{!! html_attributes(isset($attributes)?$attributes:false) !!}
   		{!! html_attributes(isset($data)?$data:false,'data') !!}
	>

	 @include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.parts.icontext')

</{{ isset($href)?'a':'button' }} >


@isset($dropdown)
	<div class="dropdown-menu">
		{!! $dropdown !!}		    
	</div>
</div><!--.btn-group-->
@endisset
			 	