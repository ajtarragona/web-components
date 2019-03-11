
@select(
	[
		'icon'=>'archive', 
		'iconposition'=>'right',
		'label'=>'Select field', 
		'name'=>'campo_select',
		'placeholder'=>'Choose item...',
		'options'=>$selectoptions, 
		'required'=>false,
		'show-deselector' => true,
		'size'=>5,
		'live-search'=>true,
		
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
		'show-deselector' => false,
		
	]
) 
								
@select(
	[
		'name'=>'campo_select_multi2', 
		'label'=>'aaa',
		'options'=> $selectoptions,
		'multiple'=>true,
		'selected'=>[2,4],
		'actions-box'=>true,
		'icon' =>'star',
		'iconposition'=>'right',
		'type' => 'info'
	],
	[
		'selected-text-format' => "count > 3",
		'max-options' => 5
	]
) 
											
@select(
	[
		'name'=>'campo_select_multi3', 
		'label'=>'aaa',
		'icon' =>'star',
		'options'=> $selectoptions,
		'multiple'=>false,
		'type' => 'primary'
	]
) 											
@select(
	[
		'name'=>'campo_select_multi4', 
		'label'=>'aaa',
		'options'=> $selectoptions,
		'icon' =>'star',
		'multiple'=>false,
		'type' => 'secondary'
	]
) 
			