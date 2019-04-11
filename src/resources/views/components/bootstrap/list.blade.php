<ul 
	@isset($id) id="{{$id}}" @endif 
	class="
		list-group 
		@istrue($flush) list-group-flush @endistrue
		{{ $class or '' }}    
	"
	{!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}

>
	{{ $slot }}
</ul>