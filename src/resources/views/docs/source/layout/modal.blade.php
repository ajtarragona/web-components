@extends('ajtarragona-web-components::layout/modal')

@section('title', $faker->words(3,true) )


@section('body')
	
	{{ $faker->paragraph() }}
	<hr/>
	
	@texteditor(['label'=>"Editor simple mida minima", "placeholder"=>"Escriu aquí ...",'name'=>"editor4"])
	@select(
		[
			'icon'=>'archive', 
			'iconposition'=>'right',
			'label'=>'Select field', 
			'name'=>'campo_select',
			'placeholder'=>'Choose item...',
			'options'=>$selectoptions, 
			'required'=>false,
			'show-deselector' => false,
			'size'=>5,
			'live-search'=>true,
			
		]
	) 

	@select(
		[
			'icon'=>'arrow-circle-right', 
			'name'=>'campo_select_multi', 
			'label'=>__('Select multiple'),
			'options'=> $selectoptions,
			'multiple'=>true,
			'selected'=>[2,4],
			'actions-box'=>true,
			'show-deselector' => false,
			
		]
	) 
	@if(isset($request))
		@include('ajtarragona-web-components::docs.source.layout.showrequest')
	@endif
@endsection
