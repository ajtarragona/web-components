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
	'class'=>$containerclass,
	'hasfeedback' => (isset($helptext) && $helptext)
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
		{!! renderAttributes($attributes, $hiddenattributes) !!} 
		{!! renderData($data) !!}
	/>

	@isset($label)
		<label for="{{ $id }}" class="custom-control-label  ">{{ $label }}</label>
	@endisset

</div>
@endformgroup
	

	

