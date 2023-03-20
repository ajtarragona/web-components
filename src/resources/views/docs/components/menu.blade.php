<ul>
	@if(!isset($hideintro)) @include('ajtarragona-web-components::docs.menuitem',['route'=>'components.introduction','title'=>'Introducció']) @endif
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.alerts','title'=>icon('exclamation-triangle').' Alerts'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.badges','title'=>icon('certificate').' Badges'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.code','title'=>icon('terminal').' Code'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.breadcrumb','title'=>icon('angle-right').' Breadcrumb'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.icons','title'=>icon('file-image').' Icons'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.lists','title'=>icon('list').' Lists'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.tables','title'=>icon('table').' Tables'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.cards','title'=>icon('far fa-square').' Cards'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.modals','title'=>icon('window-maximize').' Modals'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.navs','title'=>icon('bars').' Navs'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.tabs','title'=>icon('angle-right').' Tabs'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.charts','title'=>icon('chart-pie').' Charts'])
	@include('ajtarragona-web-components::docs.menuitem',['route'=>'components.processes','title'=>icon('forward').' Batch Processes'])

</ul>