
@extends('ajtarragona-web-components::layout/master-sidebar')

@section('title', __('Demo').': '.$item->name)


@section('menu')
	@include('ajtarragona-web-components::demo._menu')
@endsection

	

@section('breadcrumb')
    @breadcrumb([
   		'items' =>[
   			['name'=>__("Demo"),"url"=>route('webcomponents.demo'),'icon'=>'home'],
   			['name'=>__("Items"),"url"=>route('webcomponents.demo.items.index')],
   			['name'=>$item->name],
   		]
   ])
	
@endsection
            
@section('actions')
	<label for="item-form-submit-btn" role="button" class="btn btn-primary btn-sm" tabindex="0">
	  @icon('save') @lang('Save')
	</label>
	


	<form method="post" action="{{ route('webcomponents.demo.items.destroy',[$item->id]) }}" data-confirm="@lang("Are you sure?")" class="tgn-form d-inline-block">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="DELETE">

			<button class="btn btn-danger btn-sm" type="submit"> @icon('trash') @lang("record.remove")</button>
	</form>
@endsection

@section('body')

	

	<div class="row">
		<div class="col-sm-6">
			{{-- <div class="card ">
				<div class="card-body"> --}}
					@include('ajtarragona-web-components::demo.items._form_update')
				{{-- </div>
			</div> --}}
		</div>
	

		
	</div>
	
	
@endsection

