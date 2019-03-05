@alert {{ $faker->paragraph() }} @endalert


@alert(['title'=>$faker->words(3,true),'type'=>'warning','dismissible'=>true])
	{{ $faker->paragraph() }} 
@endalert


@alert(['title'=>$faker->words(3,true),'type'=>'success','dismissible'=>false])
	{{ $faker->paragraph() }}
@endalert


@alert(['title'=>$faker->words(3,true),'type'=>'secondary','dismissible'=>true])
	{{ $faker->paragraph() }}
@endalert


@alert(['title'=>$faker->words(3,true),'type'=>'danger','dismissible'=>true])
	{{ $faker->paragraph() }}
@endalert


@alert([
	'title'=>icon('exclamation-triangle').' '.$faker->words(3,true),
	'type'=>'dark',
	'autohide'=>true
])
	
	<p>Este mensaje se autodestruirá en 5 segundos.</p>
	{{ $faker->paragraph() }}

@endalert
