<div class="mb-3 align-items-end ">

	@form(['method'=>"POST", "action"=>route('webcomponents.demo.items.filter'),"class"=>" form-inline justify-content-center"])
		
				@input(['container'=>true,'name'=>'textfilter', 'label'=>__('tgn::demo.Name or description'),'value'=>$itemfilter->textfilter]) 
			
				@select(['container'=>true,'name'=>'type_id', 'label'=>__('tgn::demo.Type'),'required'=>false,'options'=>$types,'selected'=>$itemfilter->type_id,'multiple'=>true,'data'=>['actions-box'=>true,'width'=>'fit','selected-text-format'=>"count > 3"]]) 
				
							
				@button(['type'=>'submit','value'=>'submit','name'=>'submitaction','size'=>'sm','style'=>'secondary']) @icon('search') @lang('tgn::demo.Do filter') @endbutton

				@button(['type'=>'submit','style'=>'light','size'=>'sm','outline'=>false,'value'=>'clear','name'=>'submitaction']) @icon('times') @lang('tgn::demo.Clear filter') @endbutton
			

	@endform
	
	@tablecount(['collection'=> $items,'filter'=>$itemfilter,'class'=>'mt-3'])
	
</div>