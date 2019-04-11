@if(isset($icon) && $icon)
	<span class='input-icon @if(isset($iconposition)) icon-{{$iconposition}} @else icon-left @endif '>@icon($icon)</span>
@endif