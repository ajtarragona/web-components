
@form([
	'method' => 'PUT', 
	'id'=>'item-form', 
	'action' => route('webcomponents.demo.items.update',[$item->id]), 
	// 'validator'=>'Ajtarragona\WebComponents\Requests\ItemValidate', 
	// 'validateonstart'=>false, 
	// 'validateonchange'=>false,
	'autofocus'=>true
])	

	@include("ajtarragona-web-components::demo.items._form_fields")
	
	
	
	@buttongroup
		@button(['id'=>'item-form-submit-btn','type'=>'submit','value'=>'submit','name'=>'submitaction','hidden'=>true])
			@icon('save') @lang('tgn::demo.Save')
		@endbutton
	@endbuttongroup

@endform






		
		
		
		
			
		
	