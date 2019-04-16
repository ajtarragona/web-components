@extends('ajtarragona-web-components::layout/master-sidebar')

@section('title')
	 @lang('tgn::demo.Types')
@endsection

@section('menu')
	@include('ajtarragona-web-components::demo._menu')
@endsection

	

@section('breadcrumb')
    @breadcrumb([
   		'items' =>[
   			['name'=>__("tgn::demo.Demo"),"url"=>route('webcomponents.demo'),'icon'=>'home'],
   			['name'=>__("tgn::demo.Types")]
   		]
   ])
	
@endsection
              
              
@section('actions')
	 <button class="btn @if($typefilter->hasFilters()) btn-outline-dark @else btn-light @endif btn-sm" type="button" data-toggle="collapse" data-target="#typefilter" aria-expanded="false" aria-controls="userfilters">@icon('filter') @lang("tgn::demo.Filters")</button>

	@modalopener(['href'=>route('webcomponents.demo.types.modal.create'),'class'=>'btn btn-sm btn-light'])
		@icon('plus') @lang("tgn::demo.Add type")
	@endmodalopener


@endsection

@section('body')
<div class="mt-3">
	<div id="typefilter" class="collapse @if($typefilter->hasFilters()) show @endif">@include('ajtarragona-web-components::demo.types._filter_fields')</div>
	
	<div class="table-responsive">
		<table class="table table-response ">
			<thead>
				<tr>
					<th>@sortablelink('id',__('tgn::demo.ID'))</th>
					<th>@sortablelink('name',__('tgn::demo.Name'))</th>
					<th>@sortablelink('description',__('tgn::demo.Description'))</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($types as $type)
					<tr>
						<td data-title="{{ __('tgn::demo.ID') }}">{{ $type->id }}</td>
						<td data-title="{{ __('tgn::demo.Name') }}"><a href="{{ route('webcomponents.demo.types.show',[$type->id]) }} ">  {{ $type->name}}</a></td>
						<td data-title="{{ __('tgn::demo.Description') }}">{{ $type->description }}</td>
						
						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@pagination(['collection'=>$types]) 
	
</div>

	
@endsection

