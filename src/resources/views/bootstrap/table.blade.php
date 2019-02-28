<table 
	@isset($id) id="{{$id}}" @endif
    class="table table-responsive {{ $class or '' }}"
    {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}
>
    {{ $slot }}
</table>