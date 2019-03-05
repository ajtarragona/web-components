@extends('ajtarragona-web-components::layout/master')

@section('title')
	@lang('TGN Web Components')
@endsection

@section('body')
	<div class="position-fixed d-flex flex-column align-items-center justify-content-center h-100 w-100">

        <h1 class="display-4 text-gray-500">{{ env('APP_NAME') }}</h1>
        <p>Benvingut al package de components web Laravel de l'Ajuntament de Tarragona.</p>
        
        @buttongroup
            <a href="{{ route('webcomponents.docs') }}" class="btn btn-light btn-sm">@icon('file',['type'=>'far']) Documentació</a> 
            <a href="{{ route('webcomponents.kitchen') }}" class="btn btn-light btn-sm">Obrir la Demo @icon('arrow-right')</a>
        @endbuttongroup

    </div>

@endsection