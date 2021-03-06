@extends('ajtarragona-web-components::layout/modal')

@section('id','modal-item')

@section('title', ( !$item->id ? __('tgn::demo.Add item') : ( __('tgn::demo.Item') . " " . $item->name ) ) )


@section('body')
	
	@if($item->id)
		@include('ajtarragona-web-components::demo.items._form_update')
	@else
		@include('ajtarragona-web-components::demo.items._form_create')
	@endif
@endsection


