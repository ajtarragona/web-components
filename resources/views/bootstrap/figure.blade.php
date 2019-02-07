<figure 
	@isset($id) id="{{$id}}" @endif
    class="figure {{ $class or '' }}"
    {!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}
>
    {{ $slot }}

    @isset($caption)
        <figcaption class="figure-caption">{!! $caption !!}</figcaption>
    @endisset
</figure>