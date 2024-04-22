<div>
    <hr/>

    <h5>Livewire</h5>
    <p>Cal posar id=''</p>
   
    @input(
        [
            'type'=>'icon', 
            'id'=>'',
            'name'=>'campo_icono', 
            'label'=>'Icona', 
            'placeholder'=>'Choose icon...',
            'wire:model'=>'value'
        ]
    ) 

{{ $value }}

</div>