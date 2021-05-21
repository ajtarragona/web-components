	<a 
		class="tgn-modal-opener {{ isset($class)?$class:'' }}"

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

		data-animate="{{ isset($animate)?$animate:'true'}}" 
		data-style="{{ isset($style)?$style:'default'}}" 
		data-size="{{ isset($size)?$size:'' }}" 
		data-valign="{{ isset($valign)?$valign:'top'}}"
		data-halign="{{ isset($halign)?$halign:'center'}}"
		data-maximizable = "{{ isset($maximizable)?$maximizable:'true'}}"
		data-closable = "{{ isset($closable)?$closable:'true'}}"
		data-draggable = "{{ isset($draggable)?$draggable:'true'}}"
		data-padding = "{{ isset($padding)?$padding:'true'}}"
		data-method = "{{ isset($method)?$method:'get'}}"
		data-dismissable = "{{ isset($dismissable)?$dismissable:true}}"

	>
	    @include('ajtarragona-web-components::components.'.config("webcomponents.theme").'.parts.icontext')
	</a>
