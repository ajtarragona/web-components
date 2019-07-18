@extends('ajtarragona-web-components::layout/master')

@section('title', 'Login')

@section('body')

<div class="bg-dark vw-100 vh-100 fixed-top d-flex justify-content-center align-items-start overflow-auto" style="z-index:1">
	
	<div class="col-lg-4 col-md-6 col-sm-8">
		<div class="card mt-5" >
			<div class="card-body">				
				
				
				<div class="row">
					<div class="col-sm-4 col-6">
						<img src="{{ asset('vendor/ajtarragona/img/logo-tgn-negre.png')}}" title="tgn" class="img-fluid"/>
						<h2 class="card-title" style="text-transform: lowercase">{{ config('app.name')}}</h2>
						<h6 class="card-subtitle mb-4">@lang('tgn::auth.login-form')</h6>
				
					</div>
					
					<div class="col-sm-8 ">
							@form(['method'=>'POST','action'=>route('tgn.dologin')])
			                      
							@input(['container'=>true, 'icon'=>'user', 'name'=>'username', 'label'=>__("tgn::auth.username"), 'value'=>old('name')])
							@input(['container'=>true, 'icon'=>'lock', 'type'=>'password', 'name'=>'password', 'label'=>__("tgn::auth.password")])
							{{-- @checkbox(['name'=>'remember', 'label'=>'Remember Me']) --}}
												
						 
							<div class="btn-group mt-2 text-right" >
								@button(['type'=>'submit'])
									@lang('tgn::auth.login') @icon('sign-in-alt') 
								@endbutton
		
								{{-- @include('ajtarragona-web-components::auth._messages') --}}
		
							   {{--  <a class="btn btn-link" href="{{ route('password.request') }}">
												Forgot Your Password?
											</a> --}}
							</div>
		
						 @endform
					</div>
					
				</div>
				
						

			    


			</div>
		</div>
	</div>
		
			
</div>
@endsection
