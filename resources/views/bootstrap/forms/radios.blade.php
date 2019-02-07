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
	'class'=>$containerclass
])


<div class="radio-group @istrue($horizontal,'input-group') " id="{{$id}}" >

	@isset($options)
		@foreach($options as $key=>$option)
			@php 
				$idf=$id.'_'.kebab_case($key);
			@endphp

			<div class="{{ $class}} ">
				<input 
					type="radio" 
					name="{{$name}}" 
					id="{{$idf}}" 
					@if($key ==$checked) checked="true" @endif  
					@istrue($disabled ,'disabled="true"') 
					@istrue($readonly ,'readonly="true"')
					class="custom-control-input " 
					value="{{ $key }}" 
				/>
			
				<label for="{{ $idf }}" class="custom-control-label  ">{{ $option }}</label>
				

			</div>
		@endforeach
	@endisset

</div><!--.radio-group-->

@endformgroup


	

	

