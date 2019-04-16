<div class="text-muted text-{{ $align }} {{ $class }} ">
	<small>
		
		@if($collection instanceof Illuminate\Pagination\LengthAwarePaginator)
			@if(isset($filter) && $filter->hasFilters())
			
				@lang("tgn::strings.Filtered: :count",["count"=>$collection->total()])
			@else
				@lang("tgn::strings.Count: :count",["count"=>$collection->total()])
			@endif
		@else
			@lang("tgn::strings.Count: :count",["count"=>$collection->count()])
		@endif
	</small>
</div>
	