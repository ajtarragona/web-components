<div class="sidebar">

	<div class="sidebar-sticky flex-column d-flex">
		<header class="d-flex align-items-center flex-1">
            @include('ajtarragona-web-components::layout.parts.brand')
            <a class="sidebar-toggle ml-auto " href="#" data-session-setting="sidebar" data-session-toggle="true" data-session-value="{{ session('sidebar') }}" >@icon('bars')</a>
        </header>

        <div id="main-menu" class="flex-grow-1 ">
	        @includeIf('layout.menu')
	        
			@yield('menu')
		</div>

		<div class=" flex-1" id="secondary-menu">
			@include('ajtarragona-web-components::layout.parts.lang')
			@includeIf('acl::teams._teamselector')
			@includeIf('acl::_menu')
			@include('ajtarragona-web-components::layout.auth.widget')
		</div>
	</div>
</div>