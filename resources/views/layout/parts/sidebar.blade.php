<div class="sidebar">

	<div class="sidebar-sticky flex-column d-flex">
		<header class="d-flex align-items-center">
            @include('ajtarragona-web-components::layout.parts.brand')
            <a class="sidebar-toggle ml-auto " href="#" data-session-setting="sidebar" data-session-toggle="true" data-session-value="{{ session('sidebar') }}" >@icon('bars')</a>
        </header>

		@yield('menu')

		<div class="mt-auto mb-4">
			@include('ajtarragona-web-components::layout.parts.lang')
			@include('ajtarragona-web-components::layout.parts.userwidget')
		</div>
	</div>
</div>