<section id="kitchen-forms" class="py-5">
	<hr />
	<h2>Forms</h2>

	@row
		@col(['size'=>8])

						
			<div class="mb-3">
				<h5>Form inline</h5>
				@form(['method'=>'POST','action'=>route('webcomponents.kitchen.handle'),'inline'=>true])
					@input(['id'=>'pepe','container'=>true,'name'=>'campo_texto','icon'=>'user', 'label'=>'User','placeholder'=>'Enter text...','class'=>'', 'value'=>123])
					@input(['container'=>true,'name'=>'campo_password','icon'=>'lock','label'=>'Password', 'class'=>'','type'=>'password', 'placeholder'=>'Enter password...'])  
					@formgroup
						@button(['style'=>'info','type'=>'button','name'=>'action','value'=>'test','size'=>'sm'])
							Test 
						@endbutton
					@endformgroup

				@endform
			</div>

			<div class="mb-3">
				<h5>Form layout</h5>
				

				@form([
					'method'=>'POST',
					'action'=>route('webcomponents.kitchen.handle'),
					'validator'=>'Ajtarragona\WebComponents\Requests\TestValidate', 
					'validateonstart'=>false, 
					'validateonchange'=>false, 
					'autofocus'=>false
				])
					
					@row(['class'=>'gap-0'])
						@col(['size'=>5])
							@input(['container'=>true, 'required'=>true,'name'=>'campo_texto3', 'icon'=>'align-right', 'iconposition'=>'right', 'label'=>'Text', 'placeholder'=>'Enter text...', 'value'=>123]) 
							@input(['container'=>true, 'required'=>true,'name'=>'campo_texto_mascara', 'icon'=>'phone', 'iconposition'=>'left', 'label'=>'Phone', 'placeholder'=>'Enter phone...', 'value'=>'','data'=>['mask'=>'(+00) 000 000 000']]) 
						@endcol
						@col(['size'=>6])
							@input(['container'=>true, 'required'=>true,'name'=>'campo_texto4', 'icon'=>'align-left', 'label'=>'Numeric', 'placeholder'=>'Enter text...', 'value'=>123]) 
						@endcol
						@col(['size'=>1])
							@button(['style'=>'secondary','type'=>'button','name'=>'action','value'=>'test','size'=>'lg','class'=>'btn-block'])
								@icon('plus') 
							@endbutton
						
						@endcol
					@endrow

					@input(['container'=>true, 'name'=>'campo_regular_texto_nolabel', 'icon'=>'search', 'label'=>'No outline','outlined'=>false]) 

					
					@input(['container'=>true, 'name'=>'campo_texto_nolabel', 'icon'=>'search','placeholder'=>'No label']) 
					
					@input(['container'=>true, 'type'=>'file', 'name'=>'uploaded_file', 'icon'=>'file', 'label'=>'File']) 
					
					@input(['container'=>true, 'name'=>'campo_disabled',  'disabled'=>true, 'label'=>'Text disabled', 'placeholder'=>'Enter text...', 'value'=>123]) 

					@input(['container'=>true, 'type'=>'date', 'icon'=>'calendar-alt', 'name'=>'campo_fecha', 'label'=>'Date', 'placeholder'=>'Enter date...']) 

					@input(['type'=>'number','name'=>'campo_number', 'label'=>'Numero', 'placeholder'=>'Enter number...']) 
						

					@textarea(['container'=>true, 'icon'=>'bookmark', 'iconposition'=>'right','label'=>'Textarea', 'rows'=>4, 'name'=>'campo_textarea','placeholder'=>'Enter text...','value'=>123]) 


					@input([
						'name'=>'campo_icon', 
						'type' => 'icon',
						'label'=>__('Icon'),
						'value'=>''
					]) 

					@input([
						'name'=>'campo_color', 
						'type' => 'color',
						'label'=>__('Color'),
						'value'=>''
					]) 
					

					@select(['container'=>true, 'icon'=>'archive', 'iconposition'=>'right','label'=>'Select field', 'name'=>'campo_select','placeholder'=>'Choose item...','options'=>['1'=>'Opción 1','2'=>'Opción 2','3'=>'Opción 3','4'=>'Opción 4','5'=>'Opción 5','6'=>'Opción 6','7'=>'Opción 7','8'=>'Opción 8','9'=>'Opción 9','10'=>'Opción 10'], 'selected'=>2, 'required'=>false,'data'=>['size'=>5,'live-search'=>true,'width'=>'100%'] ]) 
						
					
					@select(['container'=>true, 'icon'=>'arrow-circle-right', 'name'=>'campo_select_multi', 'label'=>__('Select multiple'),'options'=>['1'=>'Opción 1','2'=>'Opción 2','3'=>'Opción 3','4'=>'Final'],'multiple'=>true,'selected'=>[2,4],'data'=>['actions-box'=>true,'width'=>'100%']]) 
			
					
					<hr/>
					
					@row
						@col(['size'=>6])
							<h6>Checks individuals</h6>
							@checkbox(['name'=>'check-default', 'label'=>'Label checkbox','value'=>123,'checked'=>true]) 
							@checkbox(['name'=>'check-secondary', 'label'=>'Secondary','value'=>123,'color'=>'secondary','checked'=>true]) 
							@checkbox(['name'=>'check-success', 'label'=>'Success','value'=>123,'color'=>'success','checked'=>true]) 
							@checkbox(['name'=>'check-info', 'label'=>'Info','value'=>123,'color'=>'info','checked'=>true]) 
							@checkbox(['name'=>'check-danger', 'label'=>'Danger','value'=>123,'color'=>'danger','checked'=>true]) 
							@checkbox(['name'=>'check-warning', 'label'=>'Warning','value'=>123,'color'=>'warning','checked'=>true]) 
							@checkbox(['name'=>'check-light', 'label'=>'Light','value'=>123,'color'=>'light','checked'=>true]) 
							@checkbox(['name'=>'check-dark', 'label'=>'Dark','value'=>123,'color'=>'dark','checked'=>true]) 
							
						@endcol

						@col(['size'=>6])
							<h6>Checks multiples</h6>
							@checkboxes(['name'=>'check_vertical', 'color'=>'info', 'options'=>[1=>"Vertical 1",2=>"Vertical 2",3=>"Vertical 3"],'checked'=>[1,2]]) 
							<hr/>
							@checkboxes(['name'=>'check_horizontal', 'options'=>[1=>"Horz. 1",2=>"Horz. 2"],'horizontal'=>true,'checked'=>[2]]) 

						@endcol
					@endrow
					<hr/>
					@row
						@col(['size'=>6])
							<h6>Radios individuals</h6>
							@radio(['name'=>'radio1', 'label'=>'Si','color'=>'success','value'=>'si fdf fd', 'checked'=>true]) 
							@radio(['name'=>'radio1', 'label'=>'No','color'=>'danger','value'=>'no']) 

						@endcol
						@col(['size'=>6])
							<h6>Radios multiples</h6>
							@radios(['name'=>'radio_vertical', 'color'=>'danger', 'options'=>[1=>"Vertical 1",2=>"Vertical 2",3=>"Vertical 3"],"checked"=>2]) 
							<hr/>
							@radios(['name'=>'radio_horizontal',  'options'=>[1=>"Horz. 1",2=>"Horz. 2"],'horizontal'=>true,"checked"=>1]) 

						@endcol
					@endrow
						
					

					<hr/>

					@button(['style'=>'success','type'=>'submit','name'=>'action','value'=>'default'])
						Enviar @icon('chevron-right') 
					@endbutton


					@button(['style'=>'secondary','outline'=>true,'type'=>'submit','name'=>'action','value'=>'alternate'])
						Alternate submit @icon('chevron-right') 
					@endbutton
				@endform

			</div>	


		@endcol
		
		@col(['size'=>4])
		
			@if(!empty($params))
				@dump($params)
			@endif

		@endcol
	@endrow

</section>