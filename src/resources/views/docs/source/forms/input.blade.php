@php 
    $value='dsds"dsds';
@endphp

@input

@input(['name'=>'camp_nom', 'label'=>'Camp text', 'value'=>$value])

@input(['name'=>'camp_nom1', 'label'=>'Camp text', 'value'=>'default value','helptext'=>'Ajuda del camp'])

@input(['name'=>'camp_nom2', 'label'=>'Deshabilitat','disabled'=>true])

@input(['name'=>'camp_pass', 'type'=>'password', 'label'=>'Camp password'])

@input(['name'=>'camp_nom3', 'label'=>'Label lateral','sidelabel'=>true ,'placeholder'=>'placeholder...'])

@input(['name'=>'camp_nom3_2', 'label'=>'Label lateral','sidelabel'=>true ,'placeholder'=>'placeholder...','helptext'=>'Ajuda del camp'])

@input(['name'=>'camp_nom3_3', 'label'=>'Curt','sidelabel'=>true ,'sidelabelwidth'=>'50px','placeholder'=>'placeholder...'])

@input(['name'=>'campo_texto_nolabel', 'placeholder'=>'Sense label']) 

@input(['helptext'=>"Text d'ajuda", 'name'=>'camp_ajuda', 'label'=>'Amb ajuda', 'required'=>true])

@input(['name'=>'camp_icona', 'icon'=>'star','label'=>'Icona'])

@input(['name'=>'camp_icona2', 'sidelabel'=>true , 'icon'=>'star','label'=>'Icona'])

@input(['name'=>'camp_icona3', 'icon'=>'id-badge', 'iconposition'=>'right', 'label'=>'Icona dreta'])

@input(['container'=>false,'class'=>'mb-3','name'=>'camp_nom4', 'label'=>'Sense container'])

@input(['name'=>'camp_nom5', 'label'=>'Info', 'icon'=>'star', 'value'=>'','containerclass'=>'bg-info'])

@input(['name'=>'camp_nom6', 'label'=>'Warning', 'icon'=>'star','value'=>'','containerclass'=>'bg-warning'])

@input(['name'=>'camp_nom7', 'label'=>'Dark', 'icon'=>'star','value'=>'','containerclass'=>'bg-dark'])
