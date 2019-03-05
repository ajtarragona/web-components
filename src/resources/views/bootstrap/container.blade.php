<div @isset($id) id="{{$id}}" @endif

	class="container{{ ( !isset($fluid) || ( isset($fluid) && isTrue($fluid) ) )?"-fluid":"" }}  {{ $class or '' }} " 
	style="{{ $style or '' }}" 
 	 {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}

>
	{{ $slot }}
</div>