<ul 
	@isset($id) id="{{$id}}" @endif 
	class="
		list-group 
		@istrue($flush) list-group-flush @endistrue
		{{ $class or '' }}    
	"
	{!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}
>
	{{ $slot }}
</ul>