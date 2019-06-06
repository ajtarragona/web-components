@input(
	[
		'type'=>'number', 
		'name'=>'campo_numerico', 
		'label'=>'Number', 
		'placeholder'=>'Enter num...'
	]
) 


@input(
	[
		'type'=>'number', 
		'name'=>'campo_numerico2', 
		'label'=>'Number decimals', 
		'placeholder'=>'Enter num...',
		'value' => 10
	],
	[
		'decimals'=>2,
		'min'=>10,
		'max'=>20
	]
) 

@input(
	[
		'type'=>'number', 
		'sidelabel' => true,
		'name'=>'campo_numerico3', 
		'label'=>'',
		'placeholder'=>'Import en dolars',
		'containerclass'=>'bg-info',
		'icon'=>'money-check-alt'
	],
	[
		'decimals'=>4,
		'prefix' => "$"
	]
) 

@input(
	[
		'type'=>'number', 
		'sidelabel' => true,
		'name'=>'campo_numerico4', 
		'label'=>'Euros',
		'placeholder'=>'Import en euros',
		'containerclass'=>'bg-warning',
		'icon'=>'money-check-alt',
		'iconposition'=>'right'
	],
	[
		'decimals'=>4,
		'postfix' => "€"
	]
) 
