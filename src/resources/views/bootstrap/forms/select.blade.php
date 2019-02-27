@php
	if($errors->has($name)) $containerclass.=' is-invalid ';
@endphp

@formgroup([
	'container'=> $container,
	'label'=> $label,
	'name'=>$name, 
	'sidelabel'=> $sidelabel,
	'disabled'=> $disabled, 
	'required'=> $required, 
	'outlined'=> $outlined, 
	'id'=> $id, 
	'size'=> $size, 
	'class'=>$containerclass
])

	@include('ajtarragona-web-components::bootstrap.forms.inputicon')

	@if($renderhelper)
		<input type="hidden" name="{{$name}}" value="" />
	@endif

	<select "
		id="{{$id }}"
	    name="{{ $name }}" 
		class=" loading {{ $class }} " 
		@istrue($required ,'required="required"')
		@istrue($disabled ,'disabled="true"')
		@istrue($readonly ,'readonly="true"')
		@istrue($multiple ,'multiple="true"')

		title="{{ istrue($required)?'':$placeholder }}" 
		placeholder="{{ $placeholder }}" 
		
		{!! renderAttributes($attributes, $hiddenattributes) !!} 
		{!! renderData($data) !!}
	>
	{{-- 	@isfalse($required) 
			<option value="">{{ $placeholder }}</option>
		@endisfalse --}}

    	@if(isset($options) && $options && is_array($options))
			{{-- @dump($options) --}}
			@foreach($options as $key=>$option)
				<option value="{{ $key }}" @if(isset($selected) && in_array($key, $selected)) selected="true" @endif >{{$option}}</option>
			@endforeach
		@endif
	</select>
	@include('ajtarragona-web-components::bootstrap.forms.helptext')

 


@endformgroup