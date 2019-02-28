<figure 
	@isset($id) id="{{$id}}" @endif
    class="figure {{ $class or '' }}"
    {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}

>
    {{ $slot }}

    @isset($caption)
        <figcaption class="figure-caption">{!! $caption !!}</figcaption>
    @endisset
</figure>