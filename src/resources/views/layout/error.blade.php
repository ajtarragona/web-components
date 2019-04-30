
@extends(isset($template)?$template:'ajtarragona-web-components::layout/master')

@section('title',__('Error :code',["code"=>$error->code]))


@section('body')
	<div class="pt-3">
		@alert(['type'=>'warning','class'=>''])
			<h3>{{ $error->title }}</h3>
			<p>{!! $error->message !!}</p>
			@if(isset($error->trace)) 
				<p>{!! $error->trace !!}</p>
			@endif

			@button(['class'=>'btn-warning','size'=>'sm' ,'href'=>url()->previous()])
				@icon('arrow-left') @lang("tgn::strings.Back") 
			@endbutton
		@endalert
	</div>
@endsection
