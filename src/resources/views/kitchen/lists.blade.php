<section id="kitchen-lists" class="py-5">
	<hr />
	<h2>Lists</h2>
	@row
		@col(['size'=>3])
			@list

				@li
					{{ $faker->sentence }}
				@endli
				
				@li(['href'=>route('webcomponents.kitchen').'#kitchen-lists'])
					Linked: {{ $faker->sentence }}
				@endli

				@li(['disabled'=>true, ])
					Disabled: {{ $faker->sentence }}
				@endli

				@li(['active'=>true])
					Active: {{ $faker->sentence }}
				@endli

				
			@endlist

			<h6 class="mt-3">Icons in list</h6>
			@list
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
		@endcol
		

		@col(['size'=>4])
			<h6 >Flushed (no borders)</h6>
			<div>
				@list(['flush'=>true])
					@li
						@include('ajtarragona-web-components::kitchen.fakecontent')
					@endli

					@li
						@include('ajtarragona-web-components::kitchen.fakecontent')
					@endli

					@li
						@include('ajtarragona-web-components::kitchen.fakecontent')
					@endli
				@endlist
			</div>
		@endcol
		
		@col(['size'=>4])
			<h6>Styles</h6>
			
			@list
				@li(['style'=>'primary','href'=>route('webcomponents.kitchen')])
					Primary
				@endli
				
				@li(['style'=>'secondary','href'=>route('webcomponents.kitchen')])
					Secondary
				@endli
				
				@li(['style'=>'success','href'=>route('webcomponents.kitchen')])
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
		
		@endcol

	@endrow
</section>