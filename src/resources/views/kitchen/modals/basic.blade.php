@extends('ajtarragona-web-components::layout.modal')


@section('title', $faker->words(3,true) )


@section('body')
	
	{{ $faker->paragraph() }}
	
@endsection