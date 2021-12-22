
@radios([
	'name'=>'radio_vertical', 
	'container'=>true,
	'color'=>'info', 
	'options'=>[1=>"Vertical 1",2=>"Vertical 2",3=>"Vertical 3"],
	'checked'=> 2
]) 


@radios([
	'name'=>'radio_switch', 
	'container'=>true,
	'switch'=>true, 
	'options'=>[1=>"Switch 1",2=>"Switch 2",3=>"Switch 3"],
	'checked'=> 2
]) 


@radios([
	'name'=>'radio_horizontal', 
	'label'=>'Horizontales',
	'container'=>true,
	'options'=>[1=>"Horz. 1", 2=>"Horz. 2",3=>"Another 3"],
	'horizontal_width' => '30%',
	'horizontal'=>true,
	'checked'=> 1
]) 
