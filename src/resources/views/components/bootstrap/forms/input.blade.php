@php
	if($errors->has($name)) $containerclass.=' with-feedback is-invalid ';
@endphp

@formgroup([
	'container'=> $container,
	'label'=> $label,
	'sidelabel'=> $sidelabel,
	'name'=>$name, 
	'disabled'=> $disabled, 
	'required'=> $required, 
	'outlined'=> $outlined, 
	'id'=> $id, 
	'size'=> $size, 
	'class'=>$containerclass,
	'hasfeedback' => (isset($helptext) && $helptext)

])

	
	
	@include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.forms.inputicon')
	
	<div class="flex-grow-1 form-control-container" >
		
		@if($type=="file")
		<div class="custom-file">
		@endif
		
		

		<input 
			id="{{ $id }}"
			type="{{ $type }}" 
			name="{{ $name }}" 
			class="{{ $class  }} " 
			value="{{ isset($value)?$value:old($name) }}" 
			@istrue($required ,'required="required"')
			@istrue($disabled ,'disabled="true"')
			@istrue($readonly ,'readonly="true"')
			@istrue($multiple ,'multiple="true"')
			title="{{ $title }}" 
			placeholder="{{ $placeholder }}" 
			lang="{{ app()->getLocale() }}"


			{!! renderAttributes($attributes, $hiddenattributes) !!} 
			{!! renderData($data) !!}
			

		/>
		
		@if($type=="file")
		<label class="custom-file-label" for="{{$id}}">{{ $placeholder }}</label>
		</div>
		@endif
	</div>
	
	{{-- @dump($data) --}}
	@include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.forms.helptext')



@endformgroup
