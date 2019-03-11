@php 

	$method=isset($method)?strtoupper($method):'GET';
	$formmethod=in_array($method,['GET','POST'])?$method:'POST';

@endphp
<form 
	@isset($id) id="{{$id}}" @endif
	method="{{ $formmethod }}" 
	action="{{ $action or ''}}" 
	class="{{ $class or '' }} tgn-form @istrue($inline) form-inline @endistrue @istrue($validator) validate @endistrue " 
	@istrue($validator) data-validateurl="{{ route('webcomponents.formvalidator') }}" data-validator="{{$validator}}" data-validate-on-submit="true" @endistrue 
	@istrue($validateonstart) data-validate-on-start="true" @endistrue 
	@istrue($validateonchange) data-validate-on-change="true" @endistrue 
	@isset($autofocus) data-autofocus="{{$autofocus}}" @endisset 
	@istrue($confirm) data-confirm="{{$confirm}}" @endistrue 
	
	{!! html_attributes(isset($attributes)?$attributes:false) !!}
   		{!! html_attributes(isset($data)?$data:false,'data') !!}

	>
	
	@csrf
	@method($method)
	
	
	{{ $slot }}
</form>