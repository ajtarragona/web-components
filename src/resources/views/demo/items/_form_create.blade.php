
@form([
		'method' => 'POST', 
		'id'=>'item-form', 
		'action' => route('webcomponents.demo.items.store'), 
		'validator'=>'Ajtarragona\WebComponents\Requests\ItemValidate', 
		'validateonstart'=>false, 
		'validateonchange'=>false,
		'autofocus'=>true
	])	

	@include("ajtarragona-web-components::demo.items._form_fields")
	
	<hr/>
	
	@buttongroup
		@button(['type'=>'submit'])
			@icon('plus') @lang('tgn::demo.Create')
		@endbutton
	@endbuttongroup

@endform




