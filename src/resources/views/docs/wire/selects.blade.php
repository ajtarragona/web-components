<div>
    <hr/>

    <h5>Livewire</h5>
    <p>Cal posar id='' perquè funcioni correctament</p>
    @select(
        [
            'icon'=>'archive', 
            'id'=>'',
            'iconposition'=>'right',
            'label'=>'Select field', 
            'name'=>'campo_select',
            'placeholder'=>'Choose item...',
            'options'=>$options, 
            'required'=>false,
            'show-deselector' => false,
            'size'=>5,
            'live-search'=>true,
            'wire:model'=>'value'
            
        ]
    ) 

    @select(
        [
            'icon'=>'archive', 

            'iconposition'=>'right',
            'label'=>'Select field', 
            'name'=>'campo_select',
            'id'=>'',
            'placeholder'=>'Choose item...',
            'options'=>$options, 
            'required'=>false,
            'show-deselector' => false,
            'size'=>5,
            'live-search'=>true,
            'wire:model'=>'value_multi',
            'multiple'=>true
            
        ]
    ) 

    {{ $value }}
</div>