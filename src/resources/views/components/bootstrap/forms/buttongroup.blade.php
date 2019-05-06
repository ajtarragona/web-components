<div
    @isset($id) id="{{$id}}" @endif
    class="btn-group {{ isset($class)?$class:'' }}"
    role="group"
    {!! html_attributes(isset($attributes)?$attributes:false) !!}
   	{!! html_attributes(isset($data)?$data:false,'data') !!}
>
    {{ $slot }}
</div>