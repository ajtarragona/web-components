@php
	if($errors->has($name)) $containerclass.=' is-invalid ';
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
	'label' => $sidelabel?$label:false
])


@if($sidelabel)
<div class="form-control-container pt-2 pb-2">
@endif
<div class="checkbox-group @istrue($horizontal,'input-group') " id="{{$id}}" >
	
	@isset($options)
		@foreach($options as $key=>$option)
			@php 
				$id='checkbox_'. str_replace('[]', '', $name).'_'.kebab_case($key);
			@endphp

			<div class="{{ $class }} ">
				<input 
					type="checkbox" 
					name="{{$name}}" 
					id="{{$id}}" 
					value="{{$key}}" 
					@if($checked && is_array($checked) && in_array($key, $checked)) checked="true" @endif 
					@istrue($disabled ,'disabled="true"') 
					@istrue($readonly ,'readonly="true"')
					class="custom-control-input " 
				/>

				
				<label for="{{ $id }}" class="custom-control-label  ">{{ $option }}</label>
				

			</div>
		@endforeach
	@endisset
</div><!--.checkbox-group-->
@if($sidelabel)
</div>
@endif

@endformgroup
	

	

