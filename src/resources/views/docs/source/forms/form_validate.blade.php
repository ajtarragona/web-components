@form([
	'method' => 'POST', 
	'id'=>'validate-form1', 
	'action' => route('webcomponents.docs.handle',['forms.form']), 
	'validator'=>'Ajtarragona\WebComponents\Requests\TestValidate', 
	'validateonstart'=>false, 
	'validateonchange'=>true, 
	'autofocus'=>true
])	

	@input(['name'=>'campo_texto_mascara','icon'=>'plus','label'=>'Camp text','required'=>true,'helptext'=>'fds'])	
	@input(['name'=>'campo_texto3','icon'=>'plus','label'=>'Camp text 2','required'=>true])	
	@input(['name'=>'campo_texto4','label'=>'Camp text numerico','required'=>true])	

	@button(['type'=>'submit'])
		Enviar @icon('chevron-right') 
	@endbutton
@endform