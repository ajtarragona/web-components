<ol 
	@isset($id) id="{{$id}}" @endif
    class="
        {{ $class or '' }}
        breadcrumb mb-0 py-4 px-0
    "
    {!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}

>
    {{ $slot }}
</ol>