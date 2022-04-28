@modalopener([
	'href'=>route('webcomponents.docs.modal'),
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
	'href'=>route('webcomponents.docs.modal'),
	'icon' => 'external-link-square-alt',
	'size'=>'lg',
	'style' => 'success',
	'class' =>'btn btn-success btn-sm'
])
	Modal ajax 2
@endmodalopener

<br/>

@modalopener([
	'href'=>route('webcomponents.docs.modal'),
	'maximizable'=>false,
	'draggable'=>false,
	'closable'=>true,
	'size'=>'sm',
	'valign'=>'center',
	'halign'=>'center',
	'dismissable'=>false,
	'class' =>'btn btn-success btn-sm'

])
	Modal ajax no close with Esc or click outside
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
	
	@slot('footer')
		@modalopener([
			'href'=>route('webcomponents.docs.modal'),
			'class' =>'btn btn-primary btn-sm',
			'halign' => 'right',
			'valign' => 'center'
		])
			Segunda modal
		@endmodalopener	
	@endslot
	
	
@endmodal


<button class="btn btn-secondary btn-sm" id="prompt-button">Prompt</button>
<button class="btn btn-secondary  btn-sm" id="confirm-button">Confirm</button>

