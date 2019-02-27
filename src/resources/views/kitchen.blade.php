@extends('ajtarragona-web-components::layout/master-sidebar')

@section('title')
	@lang('Kitchen Sink')
@endsection

@section('menu')
	

@nav([
	'items' => [	
		[
			"title" => __('Home'),
			"icon" => 'home',
			"route" => 'webcomponents.kitchen'
		]
	],
	"navigation"=> 'drilldown',
	'id'=>'main-menu',
	'class'=>'nav-dark',
	'fullwidth'=>true

])


@endsection
{{-- 

@section('breadcrumb')
    @breadcrumb(["attributes"=>["pepe"=>"poop"], 'data'=>["caaca"=>43]])
    	@crumb(['name'=>__("Home"),"url"=>route('home'),'icon'=>'home'])
		@crumb(['name'=>__("Kitchen Sink"),'icon'=>'vial'])
	@endbreadcrumb

	
@endsection
               --}}

@section('body')
	
	
	@row
	
		@col(['size'=>2])
			@list(['flush'=>false,'class'=>'scrollspied sticky-top py-3','id'=>'kitchen-menu'])
				@li(['href'=>'#kitchen-alerts']) Alerts @icon('chevron-right',['class'=>'float-right mt-1']) @endli
				@li(['href'=>'#kitchen-badges']) Badges @icon('chevron-right',['class'=>'float-right mt-1']) @endli
				@li(['href'=>'#kitchen-icons']) Icons @icon('chevron-right',['class'=>'float-right mt-1']) @endli
				@li(['href'=>'#kitchen-lists']) Lists @icon('chevron-right',['class'=>'float-right mt-1']) @endli
				@li(['href'=>'#kitchen-tables']) Tables @icon('chevron-right',['class'=>'float-right mt-1']) @endli
				@li(['href'=>'#kitchen-tabs']) Tabs @icon('chevron-right',['class'=>'float-right mt-1']) @endli
				@li(['href'=>'#kitchen-cards'])	Cards @icon('chevron-right',['class'=>'float-right mt-1']) @endli
				@li(['href'=>'#kitchen-buttons']) Buttons @icon('chevron-right',['class'=>'float-right mt-1'])  @endli
				@li(['href'=>'#kitchen-forms']) Forms @icon('chevron-right',['class'=>'float-right mt-1'])  @endli	
				@li(['href'=>'#kitchen-navs']) Navs @icon('chevron-right',['class'=>'float-right mt-1']) @endli
				@li(['href'=>'#kitchen-modals']) Modals @icon('chevron-right',['class'=>'float-right mt-1'])  @endli
			@endlist
		@endcol


		@col(['size'=>10])
			@include('ajtarragona-web-components::kitchen.alerts')	
			
			
			@include('ajtarragona-web-components::kitchen.badges')	
			
			@include('ajtarragona-web-components::kitchen.icons')	
				
			
			@include('ajtarragona-web-components::kitchen.lists')
			
			
			{{-- @include('ajtarragona-web-components::kitchen.tables') --}}

			
			@include('ajtarragona-web-components::kitchen.tabs')	

			
			@include('ajtarragona-web-components::kitchen.cards')	
			
			
			@include('ajtarragona-web-components::kitchen.buttons')	
			
			
			@include('ajtarragona-web-components::kitchen.forms')	
				
			
			@include('ajtarragona-web-components::kitchen.navs')	

			
			@include('ajtarragona-web-components::kitchen.modals')	
		@endcol
	@endrow
	

@endsection

