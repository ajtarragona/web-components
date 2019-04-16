@extends('ajtarragona-web-components::layout/master')

@section('title')
	@lang('tgn::demo.Demo')
@endsection

@section('body')
	
	<div class="position-fixed d-flex flex-column align-items-center justify-content-center h-100 w-100">

        <h1 class="display-4 text-warning">Oops!</h1>
        <p>@lang("tgn::demo.Demo doesn't seem to be installed. You should run the following Artisan command in order to install it.")</p>
        @code(['copy'=>false])
        	php artisan ajtarragona:installdemo
        @endcode
        
        

    </div>
	

@endsection
