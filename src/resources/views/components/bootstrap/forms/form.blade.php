@php 

	$method=isset($method)?strtoupper($method):'GET';
	$formmethod=in_array($method,['GET','POST'])?$method:'POST';

@endphp
<form 
	@isset($id) id="{{$id}}" @endif
	method="{{ $formmethod }}" 
	action="{{ isset($action)?$action:'' }}" 
	class="{{ isset($class)?$class:'' }} tgn-form @istrue($inline) form-inline @endistrue @istrue($validator) validate @endistrue " 
	@if(isset($validator) || isset($optionalvalidator))
		data-validateurl="{{ route('webcomponents.formvalidator') }}" 
		@istrue($validator) data-validator="{{$validator}}" @endistrue 
		@istrue($optionalvalidator) data-optionalvalidator="{{$optionalvalidator}}" @endistrue 
		@istrue($validateonsubmit) data-validate-on-submit="true" @endistrue 
	@endif
	@istrue($validateonstart) data-validate-on-start="true" @endistrue 
	@istrue($validateonchange) data-validate-on-change="true" @endistrue 
	@isset($autofocus) data-autofocus="{{$autofocus}}" @endisset 
	@isset($autoselect) data-autoselect="{{$autoselect}}" @endisset 
	@istrue($confirm) data-confirm="{{$confirm}}" @endistrue 
	@isset($target) data-target="{{$target}}" @endisset 
	
	{!! html_attributes(isset($attributes)?$attributes:false) !!}
   	{!! html_attributes(isset($data)?$data:false,'data') !!}
	>
	
	@csrf
	@method($method)
	
	
	{{ $slot }}
</form>