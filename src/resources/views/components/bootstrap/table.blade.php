<table 
	@isset($id) id="{{$id}}" @endif
    class="table table-responsive {{ isset($class)?$class:'' }}"
    {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}
>
    {{ $slot }}
</table>