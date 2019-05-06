<{{ isset($href)?'a':'span' }}
    @isset($href) 
    	href="{{$href}}"
    @endif
    @isset($id) id="{{$id}}" @endif
    
    class="
        badge
        badge-{{ isset($type)?$type:'primary'}}
        {{ isset($class)?$class:'' }}
        @istrue($pill, 'badge-pill')
    "

    
    {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}


>
    @include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.parts.icontext')
</{{ isset($href)?'a':'span' }}>