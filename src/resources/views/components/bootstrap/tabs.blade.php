<ul 
	class="nav nav-{{ (isset($pill) && $pill)?'pills':'tabs' }} {{ isset($class)?$class:'' }} 
		@istrue($justify,'nav-justified') 
		@istrue($vertical,'flex-column')  
		@istrue($responsive,'responsive')
		@istrue($underlined,'underlined')
		@isset($align)
		    @if($align=="center") justify-content-center @endif
			@if($align=="right")
				@if(isset($vertical) && $vertical) 
					tabs-right
				@else
					justify-content-end 
				@endif
			@endif
		@endif
	"
	{!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}
>
  {{ $slot }}
</ul>