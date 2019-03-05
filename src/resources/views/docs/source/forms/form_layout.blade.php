@form([
	'method'=>'POST',
	'action'=>route('webcomponents.docs.handle',['forms.form'])
])

	@input(['name'=>'text','label'=>'Camp text'])
	
	@row
		@col
			@input(['name'=>'text1','label'=>'Camp text'])
		@endcol
		@col
			@input(['name'=>'text2','label'=>'Camp text'])
		@endcol
	@endrow


	@row(['class'=>'gap-0'])
		@col(['size'=>3])
			@input(['name'=>'text3','label'=>'Camp text'])
		@endcol
		@col(['size'=>9])
			@input(['name'=>'text4','label'=>'Camp text'])
		@endcol
	@endrow

	
	@inputgroup
		@input(['name'=>'text5','placeholder'=>'000','class'=>'text-center'])
		@input(['name'=>'text6','placeholder'=>'000','class'=>'text-center'])
		@input(['name'=>'text7','placeholder'=>'000','class'=>'text-center'])
	@endinputgroup

	@buttongroup
		@button(['type'=>'submit','size'=>'sm','name'=>'action','value'=>'default'])
			Enviar @icon('chevron-right') 
		@endbutton
		@button(['type'=>'submit','size'=>'sm','style'=>'secondary','name'=>'action','value'=>'alternate'])
			Enviar alternatiu @icon('chevron-right') 
		@endbutton
	@endbuttongroup

@endform
