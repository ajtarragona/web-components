@form([
	'action'=>route('webcomponents.docs.modal'),
	'method'=>'GET' ,
	'id'=>'ajax-form',
	'target'=>'modal'
])

	@input(['name'=>'text_ajax1','label'=>'Camp text'])
	@input(['name'=>'text_ajax2','label'=>'Camp text 2'])

	@button(['type'=>'submit'])
		Enviar @icon('chevron-right') 
	@endbutton
@endform

<hr/>

@row
	@col(['size'=>6])


		@form([
			'action'=>route('webcomponents.docs.showrequest'),
			'method'=>'POST' ,
			'id'=>'ajax-form2',
			'target'=>'#form-ajax-target'
		])

			@input(['name'=>'text_ajax3','label'=>'Camp text'])
			@input(['name'=>'text_ajax4','label'=>'Camp text 2'])

			@button(['type'=>'submit'])
				Enviar @icon('chevron-right') 
			@endbutton
		@endform
	@endcol
	@col(['size'=>6,'id'=>'form-ajax-target'])

	@endcol
@endrow
