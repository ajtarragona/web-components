<h1 class="display-4">Introducció</h1>
<p class="lead">El paquet Webcomponent de l'Ajuntament de Tarragona consisteix en una col·lecció d'utilitats per facilitar la creació d'aplicacions web amb el framework Laravel. <br/>Basat en <a href="https://getbootstrap.com/">Bootstrap</a> i <a href="https://jquery.com/">jQuery</a>, inclou alguns paquets externs com <a href="https://fontawesome.com/">Fontawesome</a>, <a href="https://developer.snapappointments.com/bootstrap-select/">Boostrap Select</a>, <a href="https://flatpickr.js.org/">Flatpicker</a> (dates) o <a href="https://twitter.github.io/typeahead.js/">Typeahead</a> (autocompletables) </p>

<hr class="big"/>
{{-- 
<p>
@button(['style'=>'secondary', 'href'=>route('webcomponents.docs',['page'=>'start.installation'])]) Instalació @icon('download') @endbutton
@button(['style'=>'secondary', 'href'=>route('webcomponents.docs',['page'=>'start.config'])]) Configuració @icon('cogs') @endbutton
</p> --}}

@includeif('ajtarragona-web-components::docs.mainmenu')
{{-- 
 <ul>
 	<li>
 		Components web (en forma de directives i components blade)
 		<ul>
 			<li>
				Layout
				<ul>
					<li>Master</li>
					<li>Master amb sidebar i toolbar</li>
		 			<li>Modal</li>
		 		</ul>
		 	</li>
 			<li>	
	 			Formularis
	 			<ul>
	 				<li>Text Inputs</li>
					<li>Textareas</li>
					<li>Date inputs</li>
					<li>File Inputs</li>
					<li>Checkboxes & Radios</li>
					<li>Selects</li>
					<li>Autocomplete selects</li>
					<li>Buttons</li>
				</ul>
			</li>
	 		<li>
	 			Maquetació
	 			<ul>
					<li>Rows & Columns</li>
					<li>Lists</li>
					<li>Cards</li>
					<li>Tabs</li>
					<li>Tables</li>
				</ul>
			</li>
	 		<li>
	 			Utils
	 			<ul>
					<li>Alerts</li>
					<li>Badges</li>
					<li>Breadcrumb</li>
					<li>Icones Fontawesome</li>
					<li>Modals</li>
					<li>Navs</li>
					<li>Paginació</li>
				</ul>
			</li>
		</ul>
 	</li>
	
 	<li>Validacio de forms ajax</li>
 	<li>Taules amb paginacio i ordenacio ajax</li>
 	<li>Settings de sessio</li>
 	<li>Helpers</li>
 </ul>
 --}}