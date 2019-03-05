
@select(
	[
		'icon'=>'archive', 
		'iconposition'=>'right',
		'label'=>'Select field', 
		'name'=>'campo_select',
		'placeholder'=>'Choose item...',
		'options'=>$selectoptions, 
		'selected'=>2, 
		'required'=>false,
		'show-deselector' => false,
		'size'=>5,
		'live-search'=>true,
		'width'=>'100%'
	]
) 
						
					
@select(
	[
		'icon'=>'arrow-circle-right', 
		'name'=>'campo_select_multi', 
		'label'=>__('Select multiple'),
		'options'=> $selectoptions,
		'multiple'=>true,
		'selected'=>[2,4],
		'actions-box'=>true,
		'width'=>'100%'
	]
) 
								
@select(
	[
		'container'=>false,
		'name'=>'campo_select_multi2', 
		'label'=>'',
		'options'=> $selectoptions,
		'multiple'=>true,
		'selected'=>[2,4],
		'actions-box'=>true,
		'width'=>'100%'
	],
	[
		'style'=>'btn-info'
	]
) 
			