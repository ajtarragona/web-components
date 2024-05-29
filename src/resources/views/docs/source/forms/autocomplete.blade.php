
@autocomplete([
	'label'=>'Auto', 
	'name'=>'field_auto',
	'id' => 'auto1',
	'multiple'=> false,
	'url' => route('webcomponents.combo'),
	'savevalue' => false,
	'icon' => 'ellipsis-h',
	'min-length' => 0,
])

<div class="mb-2" style="height:100px;overflow:hidden;outline:1px solid blue">

@autocomplete([
	'label'=>'Parent', 
	'name'=>'auto_parent',
	'id' => 'auto_parent',
	'multiple'=> false,
	'url' => route('webcomponents.combo'),
	'savevalue' => false,
	'icon' => 'ellipsis-h',
	'min-length' => 1,
	'parent'=>'body'
])
</div>

@autocomplete([
	'label'=>'Auto with html', 
	'name'=>'field_auto_html',
	'id' => 'autohtml',
	'multiple'=> false,
	'url' => route('webcomponents.combohtml'),
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
	'sidelabel' => true
])

@autocomplete([
	'label'=>'Auto multiple top', 
	'name'=>'field_auto_multi',
	'id' => 'auto4',
	'value' => [3,5],
	'valuename' => 'Opció 3##Opció 5',
	'multiple'=> true,
	'url' => route('webcomponents.combo'),
	'savevalue' => true,
	'showvalue' => false,
	'icon' => 'ellipsis-h',
	'iconposition'=>'right',
	'sidelabel' => true
])

@autocomplete([
	'label'=>'Auto multiple bottom', 
	'name'=>'field_auto_multi_bottom',
	'id' => 'auto4_2',
	'value' => [3,5],
	'valuename' => 'Opció 3##Opció 5',
	'multiple'=> true,
	'url' => route('webcomponents.combo'),
	'savevalue' => true,
	'showvalue' => false,
	'icon' => 'ellipsis-h',
	'iconposition'=>'right',
	'sidelabel' => true,
	'selected-style'=>'bottom'
])


@autocomplete([
	'label'=>'Auto multiple chips', 
	'name'=>'field_auto_multi_chips',
	'id' => 'auto4_3',
	'value' => [3,5],
	'valuename' => 'Opció 3##Opció 5',
	'multiple'=> true,
	'url' => route('webcomponents.combo'),
	'savevalue' => true,
	'showvalue' => false,
	'icon' => 'ellipsis-h',
	'iconposition'=>'right',
	'sidelabel' => true,
	'selected-style'=>'chips'
])



<div class="mb-2" style="height:100px;overflow:hidden;outline:1px solid blue">

@autocomplete([
	'label'=>'Auto multiple', 
	'name'=>'field_auto_multi_parent',
	'id' => 'field_auto_multi_parent',
	'value' => [3,5],
	'valuename' => 'Opció 3##Opció 5',
	'multiple'=> true,
	'url' => route('webcomponents.combo'),
	'savevalue' => true,
	'showvalue' => false,
	'icon' => 'ellipsis-h',
	'iconposition'=>'right',
	'sidelabel' => true,
	'parent'=>'body'
])
</div>