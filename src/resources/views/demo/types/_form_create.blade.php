
@form([
		'method' => 'POST', 
		'id'=>'type-form', 
		'action' => route('webcomponents.demo.types.store'), 
		'validator'=>'Ajtarragona\WebComponents\Requests\TypeValidate', 
		'validateonstart'=>false, 
		'validateonchange'=>false,
		'autofocus'=>true
	])	

	@include("ajtarragona-web-components::demo.types._form_fields")
	
	<hr/>
	
	@buttongroup
		@button(['type'=>'submit'])
			@icon('plus') @lang('Create')
		@endbutton
	@endbuttongroup

@endform




