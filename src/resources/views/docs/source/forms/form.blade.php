@form([
	'method'=>'POST',
	'action'=>route('webcomponents.docs.handle',['forms.form']), 
	'autofocus'=>"text2"
])

	
	@input(['name'=>'text','label'=>'Camp text'])
	@input(['name'=>'text2','label'=>'Camp text 2'])


	@button(['type'=>'submit'])
		Enviar @icon('chevron-right') 
	@endbutton
@endform
