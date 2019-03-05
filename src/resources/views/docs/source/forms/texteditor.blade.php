@texteditor(['label'=>"Editor simple", "placeholder"=>"Escriu aquí ...",'name'=>"editor1",'height'=>'200px'])

@texteditor(['label'=>"Editor avançat", "placeholder"=>"Escriu aquí ...", "toolbar"=>"advanced"])

@texteditor(['label'=>"Editor nomes lectura", 'disabled'=>true,'readonly'=>true])

@texteditor([
	'label'=>"Editor bubble",
	'helptext'=>"Fes doble click per mostrar la barra d'eines", 
	'theme'=>'bubble',
	'value'=>'Contenido por <strong>defecto</strong>'
])
