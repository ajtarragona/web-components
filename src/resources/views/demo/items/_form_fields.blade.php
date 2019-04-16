@input([
	'required'=>true,
	'name'=>'name', 
	'label'=>__('tgn::demo.Name'),
	'value'=>$item->name
]) 


@textarea([
	'rows'=>5,
	'required'=>false,
	'name'=>'description', 
	'label'=>__('tgn::demo.Description'),
	'value'=>$item->description
]) 

@input([
	'required'=>true,
	'type' =>'number',
	'name'=>'number', 
	'label'=>__('tgn::demo.Number'),
	'value'=>$item->number
]) 

@select([
	'name'=>'type_id', 
	'required'=>true,
	'show-deselector'=>true,
	'label'=>__('tgn::demo.Type'),
	'options'=>$types,
	'selected'=>$item->type_id,
	'live-search'=>true
]) 

