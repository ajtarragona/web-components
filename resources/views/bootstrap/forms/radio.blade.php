@php
	if($errors->has($name)) $containerclass.=' is-invalid ';
@endphp

@formgroup([
	'container'=> $container,
	'name'=>$name, 
	'sidelabel'=> $sidelabel,
	'disabled'=> $disabled, 
	'outlined'=> $outlined, 
	'id'=> $id, 
	'size'=> $size, 
	'class'=>$containerclass
])




<div class="{{ $class }} ">
	<input 
		type="radio" 
		name="{{$name}}" 
		id="{{$id}}" 
		@istrue($checked ,'checked="true"')  
		@istrue($disabled ,'disabled="true"') 
		@istrue($readonly ,'readonly="true"')
		class="custom-control-input " 
		value="{{$value }}"
		 {!! html_attributes(isset($attributes)?$attributes:false) !!}
   		{!! html_attributes(isset($data)?$data:false,'data') !!}
	/>

	@isset($label)
		<label for="{{ $id }}" class="custom-control-label  ">{{ $label }}</label>
	@endisset

</div>
@endformgroup
	

	

