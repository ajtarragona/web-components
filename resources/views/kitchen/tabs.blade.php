<section id="kitchen-tabs" class="py-5">
	<hr />
	@row	
		@col(['size'=>6])

			<h2>Tabs</h2>
			

			@include('ajtarragona-web-components::kitchen.tabtemplate',['align'=>'left'])
			<hr/>
			@include('ajtarragona-web-components::kitchen.tabtemplate',['align'=>'left','underlined'=>true])
			
			<hr/>

			@include('ajtarragona-web-components::kitchen.tabtemplate',['align'=>'center'])
			<hr/>

			@include('ajtarragona-web-components::kitchen.tabtemplate',['align'=>'right'])

			<h4 class='mt-4'>Justificades</h4>
			@include('ajtarragona-web-components::kitchen.tabtemplate',['align'=>'left','justify'=>true])

			<h4 class='mt-4'>Verticals</h4>
			@row
				@col(['size'=>4])
					@tabs(['vertical'=>true])
						@tab(['href'=>'#tab3','persist'=>'kitchen-tab','active'=>true])
							{{ $faker->words(2,true) }}
						@endtab
						@tab(['href'=>'#tab4','persist'=>'kitchen-tab'])
							{{ $faker->words(2,true) }}
						@endtab
					@endtabs
				@endcol
				@col(['size'=>8])


					@tabcontent
						@tabpane(['fade'=>false,'id'=>'tab3','persist'=>'kitchen-tab'])
							<div class="p-2">{{ $faker->paragraph() }}</div>
						@endtabpane
						@tabpane(['fade'=>false,'id'=>'tab4','persist'=>'kitchen-tab'])
							<div class="p-2">{{ $faker->paragraph() }}</div>
						@endtabpane
					@endtabcontent
				@endcol
			@endrow

			<hr/>

			@row
				
				@col(['size'=>8])


					@tabcontent
						@tabpane(['fade'=>false,'active'=>true,'id'=>'tab3-2'])
							<div class="p-2">{{ $faker->paragraph() }}</div>
						@endtabpane
						@tabpane(['fade'=>false,'active'=>false,'id'=>'tab4-2'])
							<div class="p-2">{{ $faker->paragraph() }}</div>
						@endtabpane
					@endtabcontent
				@endcol

				@col(['size'=>4])
					@tabs(['vertical'=>true,'align'=>'right'])
						@tab(['href'=>'#tab3-2','active'=>true])
							{{ $faker->words(2,true) }}
						@endtab
						@tab(['href'=>'#tab4-2'])
							{{ $faker->words(2,true) }}
						@endtab
					@endtabs
				@endcol
			@endrow

		@endcol


		@col(['size'=>6])

			<h2>Pills</h2>

			@include('ajtarragona-web-components::kitchen.tabtemplate',['align'=>'left','pill'=>true])
			<hr/>
			@include('ajtarragona-web-components::kitchen.tabtemplate',['align'=>'center','pill'=>true])
			<hr/>
			@include('ajtarragona-web-components::kitchen.tabtemplate',['align'=>'right','pill'=>true])

			<h4 class='mt-4'>Justificades</h4>

			@include('ajtarragona-web-components::kitchen.tabtemplate',['align'=>'left','justify'=>true,'pill'=>true])
			
			<h4 class='mt-4'>Verticals</h4>
			
			@row
				@col(['size'=>4])
					@tabs(['pill'=>true,'vertical'=>true])
						@tab(['href'=>'#tab3-pill','active'=>true])
							{{ strtoupper($faker->words(2,true)) }}
						@endtab
						@tab(['href'=>'#tab4-pill'])
							{{ strtoupper($faker->words(2,true)) }}
						@endtab
					@endtabs
				@endcol
				@col(['size'=>8])


					@tabcontent
						@tabpane(['fade'=>false,'active'=>true,'id'=>'tab3-pill'])
							<div class="p-2">{{ $faker->paragraph() }}</div>
						@endtabpane
						@tabpane(['fade'=>false,'active'=>false,'id'=>'tab4-pill'])
							<div class="p-2">{{ $faker->paragraph() }}</div>
						@endtabpane
					@endtabcontent
				@endcol
			@endrow

		@endcol
	@endrow
</section>