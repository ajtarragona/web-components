<div 
	 @isset($id) id="{{$id}}" @endif
    class="border-left border-{{ $type or 'info'}} pl-3"
    {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}
  >
	{!! $slot !!}
</div>