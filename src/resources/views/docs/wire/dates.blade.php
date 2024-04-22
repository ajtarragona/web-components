<div>
    <hr/>

    <h5>Livewire</h5>
    
    @input(
        [
            'type'=>'date', 
            'icon'=>'calendar-alt', 
            'name'=>'campo_fecha', 
            'label'=>'Data', 
            'placeholder'=>'Enter date...',
            'value' => $data,
            'wire:model'=>'data'
            
        ]
    )  
    
    
    @input(
        [
            'type'=>'date', 
            'icon'=>'calendar-alt', 
            'name'=>'campo_fecha_multi', 
            'label'=>'Data multiple', 
            'placeholder'=>'Enter date...',
            'value' => $data_multi,
            'wire:model'=>'data_multi'
            
        ],
        [
            'mode' => "multiple"
        ]
    ) 
    {{-- @input(
        [
            'type'=>'date', 
            'icon'=>'calendar-alt', 
            'name'=>'campo_fecha_input', 
            'label'=>'Write Data', 
            'placeholder'=>'Type date...',
            'value' => $data,
            'wire:model'=>'data'	
    ],['allow-input' => 'true']
    )  --}}

    {{ $data }}
</div>