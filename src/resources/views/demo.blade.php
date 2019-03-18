@extends('ajtarragona-web-components::layout/master-sidebar')

@section('title')
	@lang('Demo')
@endsection

@section('menu')
	@include('ajtarragona-web-components::demo._menu')
@endsection

@section('breadcrumb')
   @breadcrumb([
   		'items' =>[
   			['name'=>__("Demo"),'icon'=>'home']
   		]
   ])
    	

	
@endsection
  

@section('body')
	
	
	<h1>Welcome to the Demo</h1>
	Th

	
	

@endsection

