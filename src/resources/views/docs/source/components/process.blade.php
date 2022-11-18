
@process([
    'class'=>'btn btn-primary btn-sm',
    'showtitle'=> false,
    'process'=>'\Ajtarragona\WebComponents\Processes\DemoProcess',
    'processparams'=>["steps"=>50],
    'inline' => true,
    'showconsole' => false
])
    Test 1
    
@endprocess



@process([
    'class'=>'btn btn-pink btn-sm',
    'showtitle'=> true,
    'title'=>'Fot-li canya!',
    'url'=> route('webcomponents.batchdemo') ,
    'inline' => true,
    'showconsole' => false,
    'striped'=>true,
    'animated'=>true,
    'showpercent'=>false,
    'style'=>'pink',
    'height'=>'5px',
    'showconsole' => true,
    'monitorclass'=>'border ml-2 bg-white'

])
    Test 2
    
@endprocess


<hr>
<h5>En finestra modal</h5>

@process([
    'class'=>'btn btn-secondary btn-sm',
    'icon' =>'stethoscope',
    'title'=> "Run demo!",
    'process'=>'\Ajtarragona\WebComponents\Processes\DemoProcess',
    'inline' => false,
    'monitorclass'=>'border',
    'confirm' => 'Estàs segur?',
    'striped'=>true,
    'animated'=>true,

])
    Test 3
    
@endprocess