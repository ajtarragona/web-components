<ul>
	@if(!isset($hideintro)) @include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.introduction','title'=>'Introducció']) @endif
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.form','title'=>'Forms'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.input','title'=>'Input'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.inputgroup','title'=>'Inputgroup'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.textarea','title'=>'Textarea'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.texteditor','title'=>'Text Editor'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.number','title'=>'Number'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.select','title'=>'Select'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.autocomplete','title'=>'Autocomplete'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.automention','title'=>'Mentions'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.checkbox','title'=>'Checkbox'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.radio','title'=>'Radio'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.date','title'=>'Date'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.file','title'=>'File'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.color','title'=>'Color picker '])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.icon','title'=>'Icon picker'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.button','title'=>'Buttons'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.buttongroup','title'=>'Buttongroups'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'forms.maps','title'=>'Maps'])

</ul>