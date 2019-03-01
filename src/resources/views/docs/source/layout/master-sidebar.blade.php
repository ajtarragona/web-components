@extends('ajtarragona-web-components::layout/master-sidebar')


@section('breadcrumb')
	@breadcrumb([
    	'items'=> [
    		['name'=>__("Home"), "url"=>route('home')],
    		['name'=> "Pàgina"]
    	]

    ])

@endsection


@section('actions')
	
	@button(['type'=>'submit','size'=>'sm','style'=>'danger']) 
		@icon('disk') @icon('trash') Eliminar
	@endbutton

@endsection



@section('body')

Aqui el contingut de la pàgina

@endsection

