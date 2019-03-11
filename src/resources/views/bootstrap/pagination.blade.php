
@isset($collection)
	<div class='pagination-container align-{{$align or 'left'}} {{$class or ''}}'>
	{!! $collection->appends(\Request::except($except))->links("pagination::".$paginationview,["align"=>$align,'class'=>$class]) !!}
	</div>
@endisset