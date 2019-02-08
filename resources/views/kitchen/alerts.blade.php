<section id="kitchen-alerts" class="pb-5 pt-5">
	
	<h2 >Alerts</h2>
	@row
		@col(['size'=>12])
			
			@alert {{ $faker->paragraph() }} @endalert
			
			@alert(['title'=>$faker->words(3,true),'type'=>'warning','dismissible'=>true])
				{{ $faker->paragraph() }} 
			@endalert
		@endcol
		@col(['size'=>6])
			@alert(['title'=>$faker->words(3,true),'type'=>'success','dismissible'=>true])
				{{ $faker->paragraph() }}
			@endalert

			@alert(['title'=>$faker->words(3,true),'type'=>'secondary','dismissible'=>true])
				{{ $faker->paragraph() }}
			@endalert
		@endcol
		@col(['size'=>6])
			@alert(['title'=>$faker->words(3,true),'type'=>'dark','dismissible'=>true])
				{{ $faker->paragraph() }}
			@endalert
			
			@alert(['title'=>icon('exclamation-triangle').' '.$faker->words(3,true),'type'=>'danger','autohide'=>true])
				<p>Este mensaje se autodestruirá en 5 segundos.</p>
				{{ $faker->paragraph() }}

			@endalert

		@endcol
	@endrow

</section>