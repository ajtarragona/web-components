<div
    @isset($id) id="{{$id}}" @endif
    class="
        {{ $class or '' }}
        alert alert-{{ $type or 'info'}}
        @istrue($autohide, 'alert-autohide')
        @istrue($dismissible, 'alert-dismissible')
        @istrue($animate, 'fade show')
    "
    {!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}
    
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