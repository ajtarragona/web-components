{{-- <flash message="Hi There!" class="alert-flash"></flash> --}}

<div id="messages">
@if (session('success') || session('error') || session('info'))

   


	@if (session('success'))
		
		@alert(['type'=>'success','title'=> icon("check")." ".__("tgn::strings.Cool!") ,'dismissible'=>true,'autohide'=>true])
		   @if(is_array(session('success')) || is_object(session('success')))
		   	<pre>{{ var_dump(session('success')) }}</pre>
		   @else
		   		{!! session('success') !!}
		   @endif
		@endalert


	@endif


	@if (session('error'))
		@alert(['type'=>'danger','title'=> icon("exclamation-circle")." ".__("tgn::strings.Error") ,'dismissible'=>true,'autohide'=>true])
		   @if(is_array(session('error')) || is_object(session('error')))
		   		<pre>{{ var_dump(session('error')) }}</pre>
		   @else
		   		{!! session('error') !!}
		   @endif
		@endalert


		
	@endif


	@if (session('info'))
		@alert(['type'=>'info','title'=> icon("info-circle")." ".__("tgn::strings.Info") ,'dismissible'=>true,'autohide'=>true])
		   @if(is_array(session('info')) || is_object(session('info')))
		   		<pre>{{ var_dump(session('info')) }}</pre>
		   @else
		   		{!! session('info') !!}
		   @endif
		@endalert

	@endif
@endif
</div>