@extends('ajtarragona-web-components::layout/modal')

@section('title', $faker->words(3,true) )


@section('body')
	
	{{ $faker->paragraph() }}
	<hr/>
	
	@texteditor(['label'=>"Editor simple mida minima", "placeholder"=>"Escriu aquí ...",'name'=>"editor4"])

	@if(isset($request))
		@include('ajtarragona-web-components::docs.source.layout.showrequest')
	@endif
@endsection
