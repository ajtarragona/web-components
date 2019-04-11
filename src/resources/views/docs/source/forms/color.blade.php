@input(
	[
		'type'=>'color', 
		'name'=>'campo_color', 
		'label'=>'Color', 
		'placeholder'=>'Choose color...'
	]
)
@input(
	[
		'type'=>'color',
		'containerclass'=>'bg-info',
		'name'=>'campo_color2', 
		'label'=>'Sense transparència', 
		'placeholder'=>'Choose color...'
	],
	[
		'use-alpha'=> false
	]
) 

@input(
	[
		'type'=>'color', 
		'name'=>'campo_color3', 
		'label'=>'Valor per defecte',
		'value' =>'rgb(48, 90, 162)',
		'placeholder'=>'Choose color...'
	]
) 

@input(
	[
		'type'=>'color', 
		'name'=>'campo_color4', 
		'containerclass'=>'bg-warning',
		'label'=>'Mostres', 
		'sidelabel'=>true, 
		'value' =>'primary',
		'placeholder'=>'Choose color...'
	],
	[
		'swatches'=> [
			'primary' => '#bf002c',
			'secondary'=> '#55595c',
            'success'=> '#4BBF73',
            'info'=> '#1F9BCF',
            'warning'=> '#f0ad4e',
            'danger'=> '#d9534f',
       	]
	]
) 
