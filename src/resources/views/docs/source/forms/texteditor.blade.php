@texteditor(['label'=>"Editor simple mida fixa", "placeholder"=>"Escriu aquí ...",'name'=>"editor1",'height'=>'400px'])

@texteditor(['label'=>"Editor simple mida minima", "placeholder"=>"Escriu aquí ...",'name'=>"editor4"])

@texteditor(['label'=>"Editor avançat amb autocompletat", "placeholder"=>"Escriu { per mostrar els usuaris", 'name'=>"editor2", "toolbar"=>"advanced",'hint-url' =>route('webcomponents.docs.userscombo')])

@texteditor(['label'=>"Editor nomes lectura", 'name'=>"editor3", 'readonly'=>true ,'value'=>"Texto"])
{{-- 
@texteditor([
	'label'=>"Editor popup",
	'helptext'=>"Fes doble click per mostrar la barra d'eines", 
	'air-mode'=>true,
	'name'=>"editor4",
	'value'=>'Contenido por <strong>defecto</strong>'
]) --}}
