<div
    @isset($id) id="{{$id}}" @endif

    class="card  @if(isset($type)) bg-{{$type}} text-white @endif {{ $class or '' }}"
    {!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}
>
    @isset($header)
        <div class="card-header">
            {!! $header !!}
        </div>
    @endisset
    
    
    @if(!isset($withbody) || $withbody)  <div class="card-body"> @endif
        @if(isset($title) || isset($subtitle))
           <div class="mb-3">
                @isset($title)
                    <h4 class="card-title">{!! $title !!}</h4>
                @endisset

                @isset($subtitle)
                   <h6 class="card-subtitle ">{!! $subtitle !!}</h6>
                @endisset
            </div>
        @endif
        {{ $slot }}

    @if(!isset($withbody) || $withbody)   </div> @endif

    @isset($footer)
        <div class="card-footer">
            {!! $footer !!}
        </div>
    @endisset
</div>