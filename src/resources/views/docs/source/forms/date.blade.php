@input(
	[
		'type'=>'date', 
		'icon'=>'calendar-alt', 
		'name'=>'campo_fecha', 
		'label'=>'Data', 
		'placeholder'=>'Enter date...',
		'value' => _now()
		
	]
) 
@input(
	[
		'type'=>'date', 
		'icon'=>'calendar-alt', 
		'name'=>'campo_fecha_input', 
		'label'=>'Write Data', 
		'placeholder'=>'Type date...'		
],['allow-input' => 'true']
) 

@input(
	[
		'type'=>'date', 
		'icon'=>'calendar-alt', 
		'name'=>'campo_fecha_multiple', 
		'label'=>'Data multiple', 
		'placeholder'=>'Choose dates...',
		'sidelabel' => true
		
		
	],
	[
		'mode' => "multiple"
	]
) 

@input(
	[
		'type'=>'date', 
		'containerclass'=>'bg-success',
		'icon'=>'clock', 
		'name'=>'campo_hora', 
		'label'=>'Hora', 
		'placeholder'=>'Enter time...'
	],
	[
		'date-format' => 'H:i'
 
	]
) 
@input(
	[
		'type'=>'date', 
		'icon'=>'calendar', 
		'name'=>'campo_fecha_hora', 
		'label'=>'Fecha y hora', 
		'placeholder'=>'Enter date and time...',
		'value' => datetimeformat(_now())
	],
	[
		'date-format' => 'd/m/Y H:i'
	]
) 