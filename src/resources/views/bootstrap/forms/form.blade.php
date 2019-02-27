@php 

	$method=isset($method)?strtoupper($method):'GET';
	$formmethod=in_array($method,['GET','POST'])?$method:'POST';

@endphp
<form 
	@isset($id) id="{{$id}}" @endif
	method="{{ $formmethod }}" 
	action="{{ $action or ''}}" 
	class="{{ $class or '' }} tgn-form @istrue($inline) form-inline @endistrue @istrue($validator) validate @endistrue " 
	@istrue($validator) data-validateurl="{{ url('validation') }}" data-validator="{{$validator}}" data-validate-on-submit="true" @endistrue 
	@istrue($validateonstart) data-validate-on-start="true" @endistrue 
	@istrue($validateonchange) data-validate-on-change="true" @endistrue 
	@istrue($autofocus) data-autofocus="true" @endistrue 
	@istrue($confirm) data-confirm="{{$confirm}}" @endistrue 
	
	{!! html_attributes(isset($attributes)?$attributes:false) !!}
   		{!! html_attributes(isset($data)?$data:false,'data') !!}

	>
	
	@csrf
	@method($method)
	
	
	{{ $slot }}
</form>