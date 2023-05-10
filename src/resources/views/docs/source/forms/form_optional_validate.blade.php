@form([
	'method' => 'POST', 
	'id'=>'validate-form1', 
	'action' => route('webcomponents.docs.handle',['forms.form']), 
	'validator'=>'Ajtarragona\WebComponents\Requests\TestValidate', 
	'optionalvalidator'=>'Ajtarragona\WebComponents\Requests\OptionalValidate'
])	

	@input(['name'=>'campo_texto_mascara','icon'=>'plus','label'=>'Camp text','required'=>true,'helptext'=>'fds'])	
	@input(['name'=>'campo_texto3','icon'=>'plus','sidelabel'=>true,'label'=>'Camp text 2','required'=>true,'helptext'=>'fds'])	
	@input(['name'=>'campo_texto4','label'=>'Camp text numerico','required'=>true])	

	@button(['type'=>'submit'])
		Enviar @icon('chevron-right') 
	@endbutton
@endform
