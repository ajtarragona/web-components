@input([
	'required'=>true,
	'name'=>'name', 
	'label'=>__('Name'),
	'value'=>$type->name
]) 


@textarea([
	'rows'=>5,
	'required'=>false,
	'name'=>'description', 
	'label'=>__('Description'),
	'value'=>$type->description
]) 
