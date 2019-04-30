@extends(isset($template)?$template:'ajtarragona-web-components::layout/master')

@section('title','Error '.$exception->getStatusCode())



@section('body')
<div class="pt-3">
	@alert(['type'=>'warning','title'=>__("tgn::error.".$exception->getStatusCode())])
		@if($exception->getMessage()) 
			<p>{!! $exception->getMessage() !!}</p>
		@endif
	@endalert
</div>
@endsection
