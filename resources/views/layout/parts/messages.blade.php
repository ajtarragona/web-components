{{-- <flash message="Hi There!" class="alert-flash"></flash> --}}

<div id="messages">
@if (session('success') || session('error') || session('info'))

   


	@if (session('success'))
		
		@alert(['type'=>'success','title'=> icon("check")." Genial!" ,'dismissible'=>true,'autohide'=>true])
		    {!! session('success') !!}
		@endalert


	@endif


	@if (session('error'))
		@alert(['type'=>'danger','title'=> icon("exclamation-circle")." Error!" ,'dismissible'=>true,'autohide'=>true])
		    {!! session('error') !!}
		@endalert


		
	@endif


	@if (session('info'))
		@alert(['type'=>'info','title'=> icon("info-circle")." Info" ,'dismissible'=>true,'autohide'=>true])
		    {!! session('info') !!}
		@endalert

	@endif
@endif
</div>