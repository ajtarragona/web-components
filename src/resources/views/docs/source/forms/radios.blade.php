
@radios([
	'name'=>'radio_vertical', 
	'container'=>true,
	'color'=>'info', 
	'options'=>[1=>"Vertical 1",2=>"Vertical 2",3=>"Vertical 3"],
	'checked'=> 2
]) 

@radios([
	'name'=>'radio_horizontal', 
	'label'=>'Horizontales',
	'container'=>true,
	'options'=>[1=>"Horz. 1", 2=>"Horz. 2"],
	'horizontal'=>true,
	'checked'=> 1
]) 
