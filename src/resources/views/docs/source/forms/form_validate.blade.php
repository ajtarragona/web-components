@form([
	'method' => 'POST', 
	'id'=>'validate-form1', 
	'action' => route('webcomponents.docs.handle',['forms.form']), 
	'validator'=>'Ajtarragona\WebComponents\Requests\TestValidate', 
	'validateonstart'=>false, 
	'validateonchange'=>true
])	

	@input(['name'=>'campo_texto_mascara','icon'=>'plus','label'=>'Camp text','required'=>true,'helptext'=>'fds'])	
	@input(['name'=>'campo_texto3','icon'=>'plus','sidelabel'=>true,'label'=>'Camp text 2','required'=>true,'helptext'=>'fds'])	
	@input(['name'=>'campo_texto4','label'=>'Camp text numerico','required'=>true])	

	@button(['type'=>'submit'])
		Enviar @icon('chevron-right') 
	@endbutton
@endform

<hr/>
<p>Es pot deshabilitar la validació en un botó concret.</p>
@form([
	'method' => 'POST', 
	'id'=>'validate-form2', 
	'action' => route('webcomponents.docs.handle',['forms.form']), 
	'validator'=>'Ajtarragona\WebComponents\Requests\TestValidate', 
])	

	@input(['name'=>'campo_texto_mascara','icon'=>'plus','label'=>'Camp text','required'=>true,'helptext'=>'fds'])	
	@input(['name'=>'campo_texto3','icon'=>'plus','sidelabel'=>true,'label'=>'Camp text 2','required'=>true,'helptext'=>'fds'])	
	@input(['name'=>'campo_texto4','label'=>'Camp text numerico','required'=>true])	

	@button(['type'=>'submit'])
		Enviar validant @icon('chevron-right') 
	@endbutton

	@button(['type'=>'submit','data'=>['confirm'=>"S'enviarà sense validar",'validate'=>false]])
		Enviar sense validar @icon('chevron-right') 
	@endbutton
@endform