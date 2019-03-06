@modalopener([
	'href'=>route('webcomponents.kitchen.modal'),
	'maximizable'=>false,
	'draggable'=>false,
	'closable'=>true,
	'size'=>'sm',
	'valign'=>'center',
	'halign'=>'center',
])
	Modal ajax
@endmodalopener


@modalopener([
	'href'=>route('webcomponents.kitchen.modal'),
	'icon' => 'external-link-square-alt',
	'style' => 'success',
	'class' =>'btn btn-success btn-sm'
])
	Modal ajax 2
@endmodalopener



@modalopener([
	'target'=>'#modal-local',
	'icon' => 'check',
	'style' => 'warning',
	'size'=>'lg',
	'animate' =>false,
	'draggable' =>true,
	'class' =>'btn btn-warning btn-sm',
	'halign' => 'right'
])
	Modal local
@endmodalopener


@modal(['id'=>'modal-local'])
	@slot('title')
		Título local
	@endslot
	
	Modal local
@endmodal

