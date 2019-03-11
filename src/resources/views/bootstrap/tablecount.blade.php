<div class="text-muted text-{{ $align }} {{ $class }} ">
	<small>
		
		@if($collection instanceof Illuminate\Pagination\LengthAwarePaginator)
			@if(isset($filter) && $filter->hasFilters())
				Filtered: {{ $collection->total() }}
			@else
				Count: {{  $collection->total() }} 
			@endif
		@else
			Count: {{ $collection->count() }}
		@endif
	</small>
</div>
	