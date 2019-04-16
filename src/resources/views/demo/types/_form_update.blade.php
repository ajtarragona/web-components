
@form([
	'method' => 'PUT', 
	'id'=>'type-form', 
	'action' => route('webcomponents.demo.types.update',[$type->id]), 
	'validator'=>'Ajtarragona\WebComponents\Requests\TypeValidate', 
	'validateonstart'=>false, 
	'validateonchange'=>false,
	'autofocus'=>true
])	

	@include("ajtarragona-web-components::demo.types._form_fields")
	
	
	
	@buttongroup
		@button(['id'=>'type-form-submit-btn','type'=>'submit','value'=>'submit','name'=>'submitaction','hidden'=>true])
			@icon('save') @lang('tgn::demo.Save')
		@endbutton
	@endbuttongroup

@endform






		
		
		
		
			
		
	