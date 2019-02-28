<div
    @isset($id) id="{{$id}}" @endif
    class="
        {{ $class or '' }}
        alert alert-{{ $type or 'info'}}
        @istrue($autohide, 'alert-autohide')
        @istrue($dismissible, 'alert-dismissible')
        @istrue($animate, 'fade show')
    "
    {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}

    
    
    role="alert"
   
>
    @istrue($dismissible)
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <small aria-hidden="true">@icon("times")</small>
        </button>
    @endistrue

    @isset($title)
        <h6 class="alert-title">{!! $title !!}</h6>
    @endif
    
    {{ $slot }}
</div>