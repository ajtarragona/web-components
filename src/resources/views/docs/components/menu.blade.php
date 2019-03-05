<ul>
	@if(!isset($hideintro)) @include('ajtarragona-web-components::docs.menuitem',['route'=>'components.introduction','title'=>'Introducció']) @endif
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.alerts','title'=>'Alerts'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.badges','title'=>'Badges'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.breadcrumb','title'=>'Breadcrumb'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.icons','title'=>'Icons'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.lists','title'=>'Lists'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.tables','title'=>'Tables'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.cards','title'=>'Cards'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.modals','title'=>'Modals'])

</ul>