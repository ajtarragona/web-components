@form([
	'method'=>'POST',
	'action'=>route('webcomponents.docs.handle',['forms.form'])
])

	
	@input(['name'=>'text','label'=>'Camp text'])


	@button(['type'=>'submit'])
		Enviar @icon('chevron-right') 
	@endbutton
@endform
