@form([
	'method' => 'POST', 
	'id'=>'confirm-form3', 
	'action' => route('webcomponents.docs.handle',['forms.form']), 
	'confirm'=> "Text de confirmació"
])	

	@input(['name'=>'text','label'=>'Camp text'])


	@button(['type'=>'submit'])
		Enviar @icon('chevron-right') 
	@endbutton

@endform