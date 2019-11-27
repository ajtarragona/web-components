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

<hr/>
<p>La confirmació també pot estar en el botó de submit</p>
@form([
	'method' => 'POST', 
	'id'=>'confirm-form4', 
	'action' => route('webcomponents.docs.handle',['forms.form']), 
])	

	@input(['name'=>'text4','label'=>'Camp text'])


	@button(['type'=>'submit'])
		Enviar sense confirmacio @icon('chevron-right') 
	@endbutton
	@button(['type'=>'submit','data'=>['confirm'=>true]])
		Enviar amb confirmacio @icon('chevron-right') 
	@endbutton

@endform


<hr/>
<p>O al revés, que el form tingui confirmacio i un botó concret no la tingui</p>
@form([
	'method' => 'POST', 
	'id'=>'confirm-form5', 
	'action' => route('webcomponents.docs.handle',['forms.form']), 
	'confirm'=> true
])	

	@input(['name'=>'text5','label'=>'Camp text'])


	@button(['type'=>'submit'])
		Enviar @icon('chevron-right') 
	@endbutton
	@button(['type'=>'submit','data'=>['confirm'=>false]])
		Enviar sense confirmacio @icon('chevron-right') 
	@endbutton

@endform
