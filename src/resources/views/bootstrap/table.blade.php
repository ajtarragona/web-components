<table 
	@isset($id) id="{{$id}}" @endif
    class="table table-responsive {{ $class or '' }}"
    {!! html_attributes(isset($attributes)?$attributes:false) !!}
    {!! html_attributes(isset($data)?$data:false,'data') !!}
>
    {{ $slot }}
</table>