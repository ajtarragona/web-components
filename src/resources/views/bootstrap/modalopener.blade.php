	<a 
		class="tgn-modal-opener {{ $class or '' }}"

		@if(isset($href))
			href="{{ $href }}" 
		@else
			{{-- type="button" --}}
			href="#" 
			@if(isset($target))
				data-toggle="modal"
				data-target="{{ $target }}"
			@endif
		@endif

		data-animate="{{ $animate or 'true'}}" 
		data-style="{{ $style or 'default'}}" 
		data-size="{{ $size or ''}}" 
		data-valign="{{ $valign or 'top'}}"
		data-halign="{{ $halign or 'center'}}"
		data-maximizable = "{{ $maximizable or 'true'}}"
		data-closable = "{{ $closable or 'true'}}"
		data-draggable = "{{ $draggable or 'true'}}"
		data-padding = "{{ $padding or 'true'}}"
		data-method = "{{ $method or 'get'}}"

	>
	    @include('ajtarragona-web-components::bootstrap.parts.icontext')
	</a>
