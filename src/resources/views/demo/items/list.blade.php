@extends('ajtarragona-web-components::layout/master-sidebar')

@section('title')
	 @lang('tgn::demo.Items')
@endsection

@section('menu')
	 @include('ajtarragona-web-components::demo._menu')
@endsection

@section('breadcrumb')
    @breadcrumb([
   		'items' =>[
   			['name'=>__("tgn::demo.Demo"),"url"=>route('webcomponents.demo'),'icon'=>'home'],
   			['name'=>__("tgn::demo.Items")]
   		]
   ])
	
@endsection
              
              
@section('actions')
	 <button class="btn @if($itemfilter->hasFilters()) btn-outline-dark @else btn-light @endif btn-sm" type="button" data-toggle="collapse" data-target="#itemfilter" aria-expanded="false" aria-controls="userfilters">@icon('filter') @lang("tgn::demo.Filters")</button>

	@modalopener(['href'=>route('webcomponents.demo.items.modal.create'),'class'=>'btn btn-sm btn-light'])
		@icon('plus') @lang("tgn::demo.Add item")
	@endmodalopener


@endsection

@section('body')
<div class="mt-3">
	<div id="itemfilter" class="collapse @if($itemfilter->hasFilters()) show @endif">@include('ajtarragona-web-components::demo.items._filter_fields')</div>
	
	<div class="table-responsive">
		<table class="table table-response ">
			<thead>
				<tr>
					<th>@sortablelink('id',__('tgn::demo.ID'))</th>
					<th>@sortablelink('name',__('tgn::demo.Name'))</th>
					<th>@sortablelink('description',__('tgn::demo.Description'))</th>
					<th>@sortablelink('number',__('tgn::demo.Number'))</th>
					<th>@sortablelink('type_id',__('tgn::demo.Type'))</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items as $item)
					<tr>
						<td data-title="{{__('tgn::demo.ID')}}">{{ $item->id }}</td>
						<td data-title="{{__('tgn::demo.Name')}}"><a href="{{ route('webcomponents.demo.items.show',[$item->id]) }} ">  {{ $item->name}}</a></td>
						<td data-title="{{__('tgn::demo.Description')}}">{{ $item->description }}</td>
						<td data-title="{{__('tgn::demo.Number')}}">{{ $item->number }}</td>
						<td data-title="{{__('tgn::demo.Type')}}">{{ $item->type->name }}</td>
						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@pagination(['collection'=>$items]) 
</div>	


	
@endsection

