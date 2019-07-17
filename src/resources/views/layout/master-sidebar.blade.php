<!doctype html>
<html lang="{{ app()->getLocale() }}" class="loading ">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="base-url" content="{{ url('') }}">
	<meta name="lang" content="{{ app()->getLocale() }}">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="{{ asset('vendor/ajtarragona/css/ajtarragona.css') }}" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('vendor/ajtarragona/img/favicon.ico') }}"/>
	
	
	@yield('css')
	@yield('meta')

	<title>@yield('title') | {{ config('app.name')}}</title>
</head>

<body data-spy="scroll" data-target=".scrollspied" data-offset="0" class="with-toolbar with-sidebar {{ session('sidebar')?"sidebar-open":"" }}" >
	<div id="app">
		@include('ajtarragona-web-components::layout.parts.sidebar')
		@include('ajtarragona-web-components::layout.parts.toolbar')

			

		
		<main role="main" id="main-container">
			
			@include('ajtarragona-web-components::layout.parts.messages')
			
			<div class="container-fluid">
				@yield('body')
			</div>

		</main>
		
		@include('ajtarragona-web-components::layout.parts.footer')

	</div>

	@routes
	
	<script src="{{ asset('vendor/ajtarragona/js/messages.js')}}" language="JavaScript"></script>
	<script src="{{ asset('vendor/ajtarragona/js/ajtarragona.js')}}" language="JavaScript"></script>
	
    @yield('js')
	
</body>
</html>