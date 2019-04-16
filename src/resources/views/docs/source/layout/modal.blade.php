@extends('ajtarragona-web-components::layout/modal')

@section('title', $faker->words(3,true) )


@section('body')
	
	{{ $faker->paragraph() }}
	
	@if(isset($request))
		@include('ajtarragona-web-components::docs.source.layout.showrequest')
	@endif
@endsection
