
@isset($collection)
	<div class='pagination-container align-{{ isset($align)?$align:'left'}} {{isset($class)?$class:''}}'>
	{!! $collection->appends(\Request::except($except))->links("pagination::".$paginationview,["align"=>$align,'class'=>$class]) !!}
	</div>
@endisset