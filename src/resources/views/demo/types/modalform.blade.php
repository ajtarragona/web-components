@extends('ajtarragona-web-components::layout/modal')

@section('id','modal-type')

@section('title', ( !$type->id ? __('record.add') : ( __('Type') . " " . $type->name ) ) )


@section('body')
	
	@if($type->id)
		@include('ajtarragona-web-components::demo.types._form_update')
	@else
		@include('ajtarragona-web-components::demo.types._form_create')
	@endif
@endsection


