@extends('ajtarragona-web-components::layout/master')

@section('title')
	Kitchen Sink
@endsection


@section('breadcrumb')
    bread
@endsection
              
@section('actions')
	actions
@endsection

@section('body')
	@icon("star")
	@icon("fab star",['size'=>'lg','color'=>'success','bg-color'=>"rgba(10,01,02)",'color'=>"danger"])
	@circleicon("fab star",['class'=>"otra clase", 'sdsd'=>'dsds','style'=>'fdfd','size'=>'lg','color'=>'success','bg-color'=>"rgba(10,01,02)",'color'=>"danger"])
	@circleicon("star")
@endsection



