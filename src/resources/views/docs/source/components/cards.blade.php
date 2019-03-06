@card
	{{ $faker->paragraph() }}
@endcard


@card(['class'=>'mt-3','title'=> $faker->words(2,true) ,'subtitle'=>$faker->words(3,true)])
	@slot('header')
		{{ ucwords($faker->words(2,true)) }}
	@endslot
	@slot('footer')
		{{ ucwords($faker->words(2,true)) }}
	@endslot
	{{ $faker->paragraph() }}
@endcard


@card(['type'=>'warning','class'=>'mt-3'])
	@slot('header')
		@icon('exclamation-triangle') Warning
	@endslot
	{{ $faker->paragraph() }}
@endcard


@card(['type'=>'success','class'=>'mt-3'])
	@slot('footer')
		{{ ucwords($faker->words(2,true)) }}
	@endslot
	{{ $faker->paragraph() }}
@endcard


@card(['type'=>'danger','class'=>'mt-3','title'=> $faker->words(2,true) ,'subtitle'=>$faker->words(3,true)])
	@slot('footer')
		{{ ucwords($faker->words(2,true)) }}
	@endslot
	{{ $faker->paragraph() }}
@endcard


@card(['type'=>'info','class'=>'mt-3'])
	@slot('footer')
		{{ ucwords($faker->words(2,true)) }}
	@endslot
	{{ $faker->paragraph() }}
@endcard


@card(['type'=>'dark','class'=>'mt-3','title'=> $faker->words(2,true) ,'subtitle'=>$faker->words(3,true)])
	@slot('header')
		Dark
	@endslot
	{{ $faker->paragraph() }}
@endcard


@card(['class'=>'mt-3'])

	@slot('header')
		
		@tabs(['justify'=>isset($justify),'class'=>'card-header-tabs'])
			@tab(['href'=>'#tab1-card','active'=>true])
				{{ ucwords($faker->word) }}
			@endtab
			@tab(['href'=>'#tab2-card'])
				{{ ucwords($faker->word) }}
			@endtab
			@tab(['href'=>'#tab22-card'])
				{{ ucwords($faker->word) }}
			@endtab
		@endtabs			
	@endslot
	
	@tabcontent
		@tabpane(['fade'=>true,'active'=>true,'id'=>'tab1-card'])
			
			<h4 class="card-title">{{ ucwords($faker->words(2,true)) }}</h4>
			<h6 class="card-subtitle mb-3">{{ ucwords($faker->words(4,true)) }}</h6>
		
			{{ $faker->paragraph() }}
		@endtabpane
		@tabpane(['fade'=>true,'active'=>false,'id'=>'tab2-card'])
			<h4 class="card-title">{{ ucwords($faker->words(2,true)) }}</h4>
			<h6 class="card-subtitle mb-3">{{ ucwords($faker->words(4,true)) }}</h6>
			{{ $faker->paragraph() }}
		@endtabpane
		@tabpane(['fade'=>true,'active'=>false,'id'=>'tab22-card'])
			<h4 class="card-title">{{ ucwords($faker->words(2,true)) }}</h4>
			<h6 class="card-subtitle mb-3">{{ ucwords($faker->words(4,true)) }}</h6>
			{{ $faker->paragraph() }}
		@endtabpane
	@endtabcontent

@endcard

