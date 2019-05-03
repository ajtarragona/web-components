<div class="sidebar">

	<div class="sidebar-sticky flex-column d-flex">
		<header class="d-flex align-items-center">
            @include('ajtarragona-web-components::layout.parts.brand')
            <a class="sidebar-toggle ml-auto " href="#" data-session-setting="sidebar" data-session-toggle="true" data-session-value="{{ session('sidebar') }}" >@icon('bars')</a>
        </header>

        <div id="main-menu">
	        @includeIf('layout.menu')
	        
			@yield('menu')
		</div>

		<div class="mt-auto mb-4 " id="secondary-menu">
			@include('ajtarragona-web-components::layout.parts.lang')
			@includeIf('acl::teams._teamselector')
			@includeIf('acl::_menu')
			@include('ajtarragona-web-components::layout.auth.widget')
		</div>
	</div>
</div>