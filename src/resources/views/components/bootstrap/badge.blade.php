<{{ isset($href)?'a':'span' }}
    @isset($href) 
    	href="{{$href}}"
    @endif
    @isset($id) id="{{$id}}" @endif
    
    class="
        badge
        badge-{{ $type or 'primary'}}
        {{ $class or '' }}
        @istrue($pill, 'badge-pill')
    "

    
    {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}


>
    @include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.parts.icontext')
</{{ isset($href)?'a':'span' }}>