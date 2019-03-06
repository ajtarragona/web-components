<div
    class="modal {{ $class or '' }}"
    id="{{ $id or 'modal' }}"
    {!! renderAttributes(isset($attributes)?$attributes:false) !!}
    {!! renderData(isset($data)?$data:false) !!}

>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    
                    <h5 class="modal-title">{!! $title or '&nbsp;' !!}</h5>
                    <span class="modal-buttons"></span>
                </div>

            <div class="modal-body">
                {!! $slot !!}
            </div>

            @isset($footer)
                <div class="modal-footer">
                    {!! $footer !!}
                </div>
            @endisset
        </div>
    </div>
</div>