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
    {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}

>
   
  @include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.parts.icontext')

  
</{{ isset($href)?'a':'li' }}>

