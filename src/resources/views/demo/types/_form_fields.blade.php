@input([
	'required'=>true,
	'name'=>'name', 
	'label'=>__('tgn::demo.Name'),
	'value'=>$type->name
]) 


@textarea([
	'rows'=>5,
	'required'=>false,
	'name'=>'description', 
	'label'=>__('tgn::demo.Description'),
	'value'=>$type->description
]) 
