@extends('ajtarragona-web-components::layout/master-sidebar')

@section('title')
	 @lang('Demo: Items')
@endsection

@section('menu')
	@include('ajtarragona-web-components::demo._menu')
@endsection

	

@section('breadcrumb')
    @breadcrumb([
   		'items' =>[
   			['name'=>__("Demo"),"url"=>route('webcomponents.demo'),'icon'=>'home'],
   			['name'=>__("Items")]
   		]
   ])
	
@endsection
              
              
@section('actions')
	 <button class="btn @if($itemfilter->hasFilters()) btn-outline-dark @else btn-light @endif btn-sm" type="button" data-toggle="collapse" data-target="#itemfilter" aria-expanded="false" aria-controls="userfilters">@icon('filter') @lang("Filters")</button>

	@modalopener(['href'=>route('webcomponents.demo.items.modal.create'),'class'=>'btn btn-sm btn-light'])
		@icon('plus') @lang("record.add")
	@endmodalopener


@endsection

@section('body')
	<div id="itemfilter" class="collapse @if($itemfilter->hasFilters()) show @endif">@include('ajtarragona-web-components::demo.items._filter_fields')</div>
	
	<div class="table-responsive">
		<table class="table table-response ">
			<thead>
				<tr>
					<th>@sortablelink('id',__('ID'))</th>
					<th>@sortablelink('name',__('Name'))</th>
					<th>@sortablelink('description',__('Description'))</th>
					<th>@sortablelink('number',__('Number'))</th>
					<th>@sortablelink('type_id',__('Type'))</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items as $item)
					<tr>
						<td data-title="ID">{{ $item->id }}</td>
						<td data-title="Name"><a href="{{ route('webcomponents.demo.items.show',[$item->id]) }} ">  {{ $item->name}}</a></td>
						<td data-title="Description">{{ $item->description }}</td>
						<td data-title="Number">{{ $item->number }}</td>
						<td data-title="Type">{{ $item->type->name }}</td>
						
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@pagination(['collection'=>$items]) 
	


	
@endsection

