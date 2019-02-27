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

    
    {!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}

>
    @include('ajtarragona-web-components::bootstrap.parts.icontext')
</{{ isset($href)?'a':'span' }}>