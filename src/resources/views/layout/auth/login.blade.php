@extends('ajtarragona-web-components::layout/master')

@section('title', 'Login')

@section('body')

<div class="login-container" >
	
		<div class="bg-image" style="background-image:url({{ asset(config('webcomponents.login_bg')) }})" ></div>


		<div class="card col-lg-3 col-md-6 col-sm-8 m-sm-0 m-2 p-0" >
			<div class="card-body d-flex align-items-center ">				
				
				
				<div class="row ">
					<div class="col-sm-12">
						{{-- <img src="{{ asset('vendor/ajtarragona/img/logo-tgn-negre.png')}}" title="tgn" class="img-fluid" /> --}}

						@includeFirst([
							'layout.auth.brand', 
							'ajtarragona-web-components::layout.auth.brand'
						])
            
						
					</div>
					
					<div class="col-sm-12 ">
							@form(['method'=>'POST','action'=>route('tgn.dologin')])
			                      
							@input([
								'container'=>true, 
								'icon'=>'user', 
								'name'=>'username', 
								'placeholder'=>__("tgn::auth.username"), 
								'value'=>old('name'),
								'class'=>'form-control-lg text-center',
								'containerclass'=>'border-left-0 border-right-0 border-top-0'
								])
							@input([
								'container'=>true, 
								'icon'=>'key', 
								'type'=>'password', 
								'name'=>'password', 
								'placeholder'=>__("tgn::auth.password"),
								'class'=>'form-control-lg text-center',
								'containerclass'=>'border-left-0 border-right-0 border-top-0'
								])
							{{-- @checkbox(['name'=>'remember', 'label'=>'Remember Me']) --}}
												
						 
							<div class="mt-4 " >
								@button(['type'=>'submit', 'size' =>'md', 'class'=>'btn-block'])
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
@endsection
