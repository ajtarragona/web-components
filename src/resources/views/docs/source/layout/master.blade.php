@extends('ajtarragona-web-components::layout/master')

@section('title')
	Master template example
@endsection


@section('body')

Aqui el contingut de la pàgina

@endsection


@section('js')
	<script>
		//some JS code
	</script>
	<script src="{{ asset('js/example.js')}}" language="JavaScript"></script>
@endsection


@section('css')
	<style>
		//some CSS styles
	</style>
	<link href="{{ asset('css/example.css') }}" rel="stylesheet">
@endsection

