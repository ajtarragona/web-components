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
	
	<div class="mt-3">
	
	<h1>Welcome to the Demo</h1>

	{{-- @input(["class"=>"automention"], ['url'=>route('webcomponents.mentions')]) --}}
	
	</div>
	

	
	

@endsection

