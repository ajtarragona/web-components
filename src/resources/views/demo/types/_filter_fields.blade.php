<div class="mb-3 align-items-end ">

	@form(['method'=>"POST", "action"=>route('webcomponents.demo.types.filter'),"class"=>" form-inline justify-content-center"])
		
				@input(['container'=>true,'name'=>'textfilter', 'label'=>__('Name or description'),'value'=>$typefilter->textfilter]) 
			
				
							
				@button(['type'=>'submit','value'=>'submit','name'=>'submitaction','size'=>'sm','style'=>'secondary']) @icon('search') @lang('Do filter') @endbutton

				@button(['type'=>'submit','style'=>'light','size'=>'sm','outline'=>false,'value'=>'clear','name'=>'submitaction']) @icon('times') @lang('Clear filter') @endbutton
			

	@endform
	
	@tablecount(['collection'=> $types,'filter'=>$typefilter,'class'=>'mt-3'])
	
</div>