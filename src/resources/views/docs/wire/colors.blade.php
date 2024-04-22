<div>
    <hr/>

    <h5>Livewire</h5>
    
    @input([
        'type'=>'color',
        'name'=>'color2',
        'wire:model'=>'value',
        'label'=>'Color', 
        'value'=>$value,
    ])


    @input([
        'type'=>'color',
        'name'=>'color',
        'id'=>'state_color_wire',
        'wire:model'=>'value',
        'label'=>'Color', 
        'value'=>$value,
        'class'=>'native'
    ])

{{ $value }}

</div>