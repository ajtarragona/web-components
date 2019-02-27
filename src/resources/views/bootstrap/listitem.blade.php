<{{ isset($href)?'a':'li' }}
    @isset($href) 
    	href="{{$href}}"
    @endif
    @isset($id) id="{{$id}}" @endif
    
    class="
        list-group-item
        @isset($style) 
	    	list-group-item-{{$style}}
	    @endif
        {{ $class or '' }}
        @istrue($active) active @endistrue
        @istrue($disabled) disabled @endistrue
    	@isset($href) 
	    	list-group-item-action
	    @endif
    "
   {!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}
>
   
  @include('ajtarragona-web-components::bootstrap.parts.icontext')

  
</{{ isset($href)?'a':'li' }}>

