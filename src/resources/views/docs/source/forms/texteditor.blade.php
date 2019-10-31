@texteditor(['label'=>"Editor simple mida fixa", "placeholder"=>"Escriu aquí ...",'name'=>"editor1",'height'=>'200px'])

@texteditor(['label'=>"Editor simple mida minima", "placeholder"=>"Escriu aquí ...",'name'=>"editor4",'min-height'=>'10em'])

@texteditor(['label'=>"Editor avançat", "placeholder"=>"Escriu aquí ...", 'name'=>"editor2", "toolbar"=>"advanced"])

@texteditor(['label'=>"Editor nomes lectura", 'name'=>"editor3", 'disabled'=>true,'readonly'=>true])

@texteditor([
	'label'=>"Editor bubble",
	'helptext'=>"Fes doble click per mostrar la barra d'eines", 
	'theme'=>'bubble',
	'name'=>"editor4",
	'value'=>'Contenido por <strong>defecto</strong>'
])
