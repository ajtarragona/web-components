<div class="text-muted text-{{ $align }} {{ $class }} ">
	<small>
		
		@if($collection instanceof Illuminate\Pagination\LengthAwarePaginator)
			@if(isset($filter) && $filter->hasFilters())
				@lang('filteredcount',['count'=> $collection->total() ]) 
			@else
				@lang('totalcount',['count'=> $collection->total() ]) 
			@endif
		@else
			@lang('totalcount',['count'=> $collection->count() ]) 
		@endif
	</small>
</div>
	