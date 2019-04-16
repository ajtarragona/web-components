@extends('ajtarragona-web-components::layout/master-sidebar')

@section('title',__('tgn::demo.Add type'))


@section('body')
<div class="mt-3">
	

	<div class="row">
		<div class="col-sm-4">
			<div class="card ">
				<div class="card-body">
					@include('ajtarragona-web-components::demo.types._form_create')
				</div>
			</div>
		</div>
	

	</div>

</div>
	
@endsection

