@list(['class'=>'mb-3'])

	@li
		{{ $faker->sentence }}
	@endli
	
	@li(['href'=>'#'])
		Linked: {{ $faker->sentence }}
	@endli

	@li(['disabled'=>true, ])
		Disabled: {{ $faker->sentence }}
	@endli

	@li(['active'=>true])
		Active: {{ $faker->sentence }}
	@endli
	
@endlist




@list(['class'=>'mb-3'])

	@li(['icon'=>'plus'])
		<strong>Default</strong>
	@endli

	@li(['icon'=>'archive','iconcolor'=>'info'])
		<strong>With bootstrap color</strong>
	@endli

	@li(['icon'=>'archive','iconcolor'=>'#cc52cd'])
		<strong>With custom color</strong>
	@endli

	@li(['disabled'=>true, 'icon'=>'bell','iconalign'=>'right','iconcolor'=>'warning'])
		Right aligned. {{ $faker->sentence }}
	@endli

@endlist




@list(['flush'=>true, 'class'=>'mb-3'])
	
	@li
		@include('ajtarragona-web-components::docs.fakecontent')
	@endli

	@li
		@include('ajtarragona-web-components::docs.fakecontent')
	@endli

	@li
		@include('ajtarragona-web-components::docs.fakecontent')
	@endli

@endlist




@list(['class'=>'mb-3'])
	
	@li(['style'=>'primary','href'=>'#'])
		Primary
	@endli
	
	@li(['style'=>'secondary','href'=>'#'])
		Secondary
	@endli
	
	@li(['style'=>'success','href'=>'#'])
		Success
	@endli
	
	@li(['style'=>'info'])
		Info
	@endli
	
	@li(['style'=>'danger'])
		Danger
	@endli

	@li(['style'=>'warning'])
		Warning
	@endli

@endlist
		
