
@select(
	[
		'icon'=>'archive', 
		'iconposition'=>'right',
		'label'=>'Select field', 
		'name'=>'campo_select',
		'placeholder'=>'Choose item...',
		'options'=>$selectoptions, 
		'required'=>false,
		'show-deselector' => false,
		'size'=>5,
		'live-search'=>true,
		
	]
) 
		

		
@select(
	[
		'label'=>'With groups', 
		'name'=>'campo_select_groups',
		'placeholder'=>'Choose item...',
		'options'=>[
			
			"val3" =>"Valor3",
			"Grup 1" => [
				"val1" =>"Valor1",
				"val2" =>"Valor2",
			],
			"Grup 3" => [
				"val4" =>"Valor4",
				"val5" =>"Valor5",
			]
		], 
	]
) 


	
@select(
	[
		'label'=>'With divider', 
		'name'=>'campo_select_divider',
		'placeholder'=>'Choose item...',
		'options'=>[
			"val1" =>"Valor1",
			"val2" =>"Valor2",
			"valorr" => null,
			"val3" =>"Valor3",
			"val4" =>"Valor4",
			"val5" =>"Valor5",
		
		], 
	]
) 

@select(
	[
		'label'=>'Sidelabel', 
		'sidelabel'=>true,
		'name'=>'campo_select_side',
		'placeholder'=>'Choose item...',
		'options'=>$selectoptions, 
	]
) 
		
@select(
	[
		'label'=>'', 
		'sidelabel'=>true,
		'name'=>'campo_select_no_label',
		'placeholder'=>'Choose item...',
		'options'=>$selectoptions, 
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
			



@select(
	[
		'label'=>'Ajax select', 
		'name'=>'campo_select_ajax',
		'placeholder'=>'Choose ajax item...',
		'url'=> route('webcomponents.combo'),
		'required'=>false,
		'show-deselector' => true,
		'size'=>5,
		// 'selected'=>2
		
	]
) 
	

@select(
	[
		'label'=>'Ajax select multiple', 
		'name'=>'campo_select_ajax_multi',
		'placeholder'=>'Choose ajax item...',
		'url'=> route('webcomponents.combogroups'),
		'selected'=>[5,6,10,20],
		'multiple' =>true,
		'required'=>false,
		'show-deselector' => true,
		'size'=>5,
		'live-search'=>true,
		
	],
	[
		'selected-text-format' => "count > 3"
	]
) 
	
