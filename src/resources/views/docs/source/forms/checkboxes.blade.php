
@checkboxes([
	'name'=>'check_vertical', 
	'container'=>true,
	'color'=>'info', 
	'options'=>[1=>"Vertical 1",2=>"Vertical 2",3=>"Vertical 3"],
	'checked'=>[1,2]
]) 

@checkboxes([
	'name'=>'check_horizontal', 
	'label'=>'Horizontales',
	'container'=>true,
	'options'=>[
		1=>"Horz. 1",
		2=>"Horz. 2",
		3=>"Horz. 3",
		4=>"Lalalala lala",
		5=>"Bla bla",
		6=>"Another option",
	],
	'horizontal'=>true,
	'horizontal_width' => '33%',
	'checked'=>[2]
]) 


@checkboxes([
	'name'=>'check_switches', 
	'container'=>true,
	'color'=>'success', 
	'switch'=>true, 
	'options'=>[1=>"Switch 1",2=>"Switch 2",3=>"Switch 3"],
	'checked'=>[3]
]) 