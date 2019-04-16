@php
	if($errors->has($name)) $containerclass.=' with-feedback is-invalid ';
@endphp

@formgroup([
	'container'=> $container,
	'name'=>$name, 
	'disabled'=> $disabled, 
	'outlined'=> $outlined, 
	'id'=> $id, 
	'size'=> $size, 
	'class'=>$containerclass,
	'sidelabel' => $sidelabel,
	'label' => $sidelabel?$label:false,
	'hasfeedback' => (isset($helptext) && $helptext)
])

@if($sidelabel)
<div class="form-control-container pt-2">
@endif
	<div class=" {{ $class }} ">
		@if($renderhelper)
			<input type="hidden" name="{{$name}}" value="0" />
		@endif

		<input 
			type="checkbox" 
			name="{{$name}}" 
			id="{{$id}}" 
			@istrue($checked ,'checked="true"') 
			@istrue($disabled ,'disabled="true"') 
			@istrue($readonly ,'readonly="true"')
			class="custom-control-input"
			 value="{{$value}}" 
			{!! renderAttributes($attributes, $hiddenattributes) !!} 
			{!! renderData($data) !!}
		/>

		
			<label for="{{ $id }}" class="custom-control-label  ">@if(isset($label) && !$sidelabel){{ $label }}@endif</label>

	</div>
@if($sidelabel)
</div>
@endif
@endformgroup
	

	
