<div @isset($id) id="{{$id}}" @endif

	class="container{{ ( !isset($fluid) || ( isset($fluid) && isTrue($fluid) ) )?"-fluid":"" }}  {{ isset($class)?$class:'' }} " 
	style="{{ isset($style)?$style:'' }}" 
 	 {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}

>
	{{ $slot }}
</div>