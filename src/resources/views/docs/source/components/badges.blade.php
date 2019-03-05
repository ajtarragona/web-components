@badge
	@icon('tag') Primary
@endbadge

@badge(['type'=>'secondary'])
	Secondary
@endbadge

@badge(['type'=>'danger','icon'=>'exclamation'])
	Danger
@endbadge

@badge(['type'=>'info'])
	Info
@endbadge

@badge(['type'=>'warning'])
	Warning
@endbadge

@badge(['type'=>'success','icon'=>'check','iconalign'=>'right'])
	Success
@endbadge


@badge(['href'=>'#','type'=>'light'])
	Light Linked
@endbadge

@badge([
	'type'=>'dark',
	'pill'=>true,
	'href'=>'#',
	'icon'=>'plus',
	'iconalign'=>'right',
	'iconcolor'=>'warning'
])
	Dark Pill
@endbadge

<h1 class="mt-2">Títol amb @badge Etiqueta @endbadge </h1>
