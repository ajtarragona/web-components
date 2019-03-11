@extends('ajtarragona-web-components::layout/master-sidebar')

@section('title',__('Add item'))


@section('body')

	

	<div class="row">
		<div class="col-sm-4">
			<div class="card ">
				<div class="card-body">
					@include('ajtarragona-web-components::demo.items._form_create')
				</div>
			</div>
		</div>
	

	</div>

	
	
@endsection

