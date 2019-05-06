<div 
	 @isset($id) id="{{$id}}" @endif
    class="border-left border-{{ isset($type)?$type:'info'}} pl-3"
    {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}
  >
	{!! $slot !!}
</div>