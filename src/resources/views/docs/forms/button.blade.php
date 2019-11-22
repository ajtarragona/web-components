<section id="kitchen-buttons" class="py-5" >
	<hr />
	<h2>Buttons</h2>
	@row
		@col(['size'=>6])
			@button(['class'=>'ajax-button',"data"=>['url'=>route('webcomponents.combo'), 'onsuccess' => 'successAjaxCallback']])
				Ajax
			@endbutton

			@button
				Primary
			@endbutton
			@button(['disabled'=>true,'icon'=>'plus'])
				 Disabled
			@endbutton

			@button(['style'=>'secondary'])
				Secondary
			@endbutton

			

			@button(['style'=>'success','type'=>'button'])
				Success
			@endbutton

			@button(['style'=>'info','type'=>'button'])
				Info
			@endbutton

			@button(['style'=>'danger','type'=>'button'])
				Danger
			@endbutton

			@button(['style'=>'warning','type'=>'button','icon'=>'exclamation'])
				 Warning
			@endbutton

			@button(['style'=>'light','type'=>'button'])
				 Light
			@endbutton
			@button(['style'=>'dark','type'=>'button'])
				 Dark
			@endbutton
			
			


			<h5 class="mt-3">Dropdowns</h5>
			
			@button(['style'=>'success','type'=>'button'])
				@icon('info') Success
				
				@slot('dropdown')
					<a class="dropdown-item" href="#">Action</a>
				    <a class="dropdown-item" href="#">Another action</a>
				    <a class="dropdown-item" href="#">Something else here</a>
				    <div class="dropdown-divider"></div>
				    <a class="dropdown-item" href="#">Separated link</a>
				@endslot
			@endbutton


			


			@button(['style'=>'info','dropdirection'=>'left'])
				@icon('info') Login
				
				@slot('dropdown')
					<div style="width:400px">
						<h6 class="dropdown-header">Login form</h6>

						@form(['class'=>'p-3'])
							@input(['container'=>true,'name'=>'login','placeholder'=>'Login']) 
							@input(['container'=>true,'type'=>'password','name'=>'password','placeholder'=>'Password']) 
							@button Login @endbutton
						@endform
					</div>
				@endslot
			@endbutton

			@button(['style'=>'danger','dropdirection'=>'up'])
				@icon('search') Search
				
				@slot('dropdown')
					<div style="width:320px">
						<h6 class="dropdown-header">Search</h6>
						@form(['class'=>'px-2','inline'=>true])
							@input(['container'=>true,'name'=>'search','placeholder'=>'Login']) 
							@button(['size'=>'sm']) Search @endbutton
						@endform
					
					    <div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Action</a>
					    <a class="dropdown-item" href="#">Another action</a>
					    <div class="dropdown-divider"></div>
					    <a class="dropdown-item" href="#">Separated link</a>
					</div>
				@endslot
			@endbutton


			@button(['style'=>'warning','dropdirection'=>'right'])
				@icon('question-circle') Help
				
				@slot('dropdown')
					<div class="px-3" style="width:400px">
						{{ $faker->paragraphs(2,true) }}
					</div>
				@endslot
			@endbutton
			
				
			


			<h5 class="mt-3">Sizes</h5>

			
			@button(['size'=>'xs'])
				Boton XS 
			@endbutton
			@button(['size'=>'sm'])
				Boton SM 
			@endbutton
			@button()
				Boton MD 
			@endbutton
			@button(['size'=>'lg'])
				Boton LG
			@endbutton



		@endcol

		@col(['size'=>6])
			<h5 >Outlined</h5>
			
			@button(['style'=>'primary','outline'=>true])
				Primary
			@endbutton
			
			@button(['style'=>'secondary','outline'=>true])
				Secondary
			@endbutton


			@button(['style'=>'success','type'=>'button','outline'=>true])
				Success
			@endbutton

			@button(['style'=>'info','type'=>'button','outline'=>true])
				Info
			@endbutton

			@button(['style'=>'danger','type'=>'button','outline'=>true])
				Danger
			@endbutton

			@button(['style'=>'warning','type'=>'button','icon'=>'exclamation','outline'=>true])
				 Warning
			@endbutton

			@button(['style'=>'light','type'=>'button','outline'=>true])
				 Light
			@endbutton
			@button(['style'=>'dark','type'=>'button','outline'=>true])
				 Dark
			@endbutton

			
			<h5 class="mt-3">Pills</h5>

			@button(['style'=>'success','type'=>'submit','pill'=>true])
				Botón 2 @icon('arrow-right') 
			@endbutton

			@button(['style'=>'danger','type'=>'submit','pill'=>true])
				@circleicon('times',['class'=>'bg-light','size'=>'sm']) <br/> Botón 3 
			@endbutton
			
			
		@endcol
	@endrow

	<hr/>
		<h5>Buttongroup</h5>

		@buttongroup
			@button([])
				@icon('save') Save
			@endbutton

			@button(['outline'=>true])
				@icon('print') Print
			
				
				@slot('dropdown')
					<a class="dropdown-item" href="#">@icon('file-pdf',['color'=>'danger']) PDF</a>
				    <a class="dropdown-item" href="#">@icon('file-excel',['color'=>'success']) Excel</a>
				    
				@endslot
			@endbutton

			@button(['outline'=>true])
				@icon('trash',['color'=>'danger']) 
			@endbutton

			@button(['outline'=>true])
				@icon('cog') 
			@endbutton

		@endbuttongroup
		
		@buttongroup
			@button
				@icon('user-plus') Add
			@endbutton
			
			@button(['style'=>'success'])
				@icon('user-check')
			@endbutton

			@button(['style'=>'warning'])
				@icon('user-lock') 
			@endbutton

			@button(['style'=>'danger'])
				@icon('user-times')
			@endbutton

			@button
				@icon('cog') Settings
			
				
				@slot('dropdown')
					<a class="dropdown-item" href="#">Setting 1</a>
				    <a class="dropdown-item" href="#">Setting 2</a>
				    <div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Advanced</a>
				    
				@endslot
			@endbutton

			

		@endbuttongroup
</section>