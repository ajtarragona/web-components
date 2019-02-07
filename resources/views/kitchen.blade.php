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
	<h1>Icons</h1>
	<div>
		xs: @icon("star",['size'=>'xs','color'=>'success','visible'=>true],['datos'=>"123"])
		sm: @icon("star",['size'=>'sm','color'=>'info'])
		default: @icon("star")
		lg: @icon("star",['size'=>'lg','color'=>'danger'])
		xl: @icon("star",['size'=>'xl','color'=>'warning','bg-color'=>"secondary"])
	</div>

	<div>
		xs: @circleicon("star",['size'=>'xs','bg-color'=>'success','color'=>'white'])
		sm: @circleicon("star",['size'=>'sm','bg-color'=>'info','color'=>'white'])
		default: @circleicon("star",['bg-color'=>'primary','color'=>'white'])
		lg: @circleicon("star",['size'=>'lg','bg-color'=>'danger','color'=>'white'])
		xl: @circleicon("star",['size'=>'xl','bg-color'=>'rgba(100,40,60,0.5)','color'=>"#ffffff"])
		
	</div>


	<h1>Dump</h1>
	@dump(["a"=>32,"b"=>"dsds"])
@endsection



