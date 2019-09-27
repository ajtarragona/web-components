
@autocomplete([
	'label'=>'Auto', 
	'name'=>'field_auto',
	'id' => 'auto1',
	'multiple'=> false,
	'url' => route('webcomponents.combo'),
	'savevalue' => false,
	'icon' => 'ellipsis-h',
	'min-length' => 1,
])

@autocomplete([
	'label'=>'Auto valor', 
	'name'=>'field_auto_valor',
	'id' => 'auto2',
	'value' => 4,
	'valuename' => 'Opció 4',
	'multiple'=> false,
	'url' => route('webcomponents.combo'),
	'savevalue' => true,
	'showvalue' => false,
	'icon' => 'ellipsis-h',
	'min-length' => 2,
	'helptext' => "Comença a escriure 'Opc...'"
])



@autocomplete([
	'label'=>'Auto mostra valor', 
	'name'=>'field_auto_valor2',
	'id' => 'auto3',
	'value' => 4,
	'valuename' => 'Opció 4',
	'multiple'=> false,
	'url' => route('webcomponents.combo'),
	'savevalue' => true,
	'showvalue' => true,
	'icon' => 'ellipsis-h',
	'min-length' => 2,
])

@autocomplete([
	'label'=>'Auto multiple', 
	'name'=>'field_auto_multi',
	'id' => 'auto4',
	'value' => [3,5],
	'valuename' => 'Opció 3##Opció 5',
	'multiple'=> true,
	'url' => route('webcomponents.combo'),
	'savevalue' => true,
	'showvalue' => false,
	'icon' => 'ellipsis-h',
	'iconposition'=>'right'
])