<ul 
	class="nav nav-{{ (isset($pill) && $pill)?'pills':'tabs' }} {{ $class or '' }} 
		@istrue($justify,'nav-justified') 
		@istrue($vertical,'flex-column')  
		@istrue($responsive,'responsive')
		@istrue($underlined,'underlined')
		@isset($align)
		    @if($align=="center") justify-content-center @endif
		    @if($align=="right") justify-content-end @endif
		@endif
	"
	{!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}
>
  {{ $slot }}
</ul>