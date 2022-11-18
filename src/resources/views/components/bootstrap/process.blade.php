@php

    $theid=isset($id)?$id:uniqid('process');
@endphp

<div class="process-container d-flex" id="process-button-container-{{$theid}}" 
>
    <div class="flex-1">
        <button type="button"
            class="process-button text-nowrap {{ (isset($submit) && $submit ) ?'form-submit' : ''}} {{ isset($class)?$class:'' }}"
            @if(isset($url)) 
            data-url="{{ $url }}" 
            @elseif(isset($process))
                data-process="{{$process}}""
                data-process-params="{{isset($processparams)? json_encode($processparams) : ''}}"
            @endif
            id="process-button-{{$theid}}" 
            data-show-title="{{ $showtitle ?? "true" }}" 
            data-title="{{ isset($title) ? __('tgn::strings.Running: :name',['name'=>$title]): __("tgn::strings.Running process") }}"
            data-inline="{{ (isset($inline) && $inline) ? "true":"false" }}" 
            data-method="{{ $method ?? "GET" }}" 
            data-monitorclass="{{ $monitorclass ?? "" }}" 
            data-target="#{{ $theid }}-monitor" 
            data-confirm-message="{{ $confirm ?? false }}" 
            data-showconsole="{{ ( !isset($showconsole) || (isset($showconsole) && $showconsole ) )?"true":"false" }}" 
            data-showpercent="{{ ( !isset($showpercent) || (isset($showpercent) && $showpercent ) )?"true":"false" }}" 
            data-height="{{ isset($height) ? $height : '' }}" 
            data-color="{{ isset($style) ? $style : 'info' }}" 
            data-onsuccess="{{ $onsuccess ?? ''}}"
            data-onclose="{{ $onclose ?? ''}}"
            data-onerror="{{ $onerror ?? ''}}"
            data-striped="{{ (isset($striped) && $striped) ? "true":"false" }}"
            data-animated="{{ (isset($animated) && $animated) ? "true":"false" }}"
        >   
            @if(isset($icon)) @icon($icon) @endif
            {!! $slot !!}
        </button>
    </div>
        
</div>