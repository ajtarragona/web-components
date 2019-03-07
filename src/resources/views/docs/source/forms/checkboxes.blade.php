
@checkboxes([
	'name'=>'check_vertical', 
	'container'=>true,
	'containerclass'=>'p-3',
	'color'=>'info', 
	'options'=>[1=>"Vertical 1",2=>"Vertical 2",3=>"Vertical 3"],
	'checked'=>[1,2]
]) 

@checkboxes([
	'name'=>'check_horizontal', 
	'container'=>true,
	'containerclass'=>'p-3',
	'options'=>[1=>"Horz. 1",2=>"Horz. 2"],
	'horizontal'=>true,
	'checked'=>[2]
]) 
