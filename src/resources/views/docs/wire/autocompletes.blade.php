<div>
    <hr/>

    <h5>Livewire</h5>
    
   
@autocomplete([
	'label'=>'Auto', 
	'name'=>'field_auto',
	// 'id' => 'auto1',
	'multiple'=> false,
	'url' => route('webcomponents.combo'),
	'savevalue' => false,
	'icon' => 'ellipsis-h',
	'min-length' => 1,
    'wire:model'=>'value'
])


{{ $value }}

</div>