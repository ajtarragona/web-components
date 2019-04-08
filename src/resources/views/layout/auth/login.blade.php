@extends('ajtarragona-web-components::layout/master')

@section('title', 'Login')

@section('body')
@row
	@container(['fluid'=>false])
		@row
		    <div class="col-sm-6 offset-sm-3">
				<div class="card mt-5">
		    		<div class="card-body">				
						<h4 class="card-title">{{ config('app.name')}}</h4>
						<h6 class="card-subtitle mb-4">@lang('tgn::auth.login-form')</h6>
								

					    @form(['method'=>'POST','action'=>route('tgn.dologin')])
					                      
					        @input(['container'=>true, 'icon'=>'user', 'name'=>'username', 'label'=>__("tgn::auth.username"), 'value'=>old('name')])
					        @input(['container'=>true, 'icon'=>'lock', 'type'=>'password', 'name'=>'password', 'label'=>__("tgn::auth.password")])
					        {{-- @checkbox(['name'=>'remember', 'label'=>'Remember Me']) --}}
					                            
					     
					        <div class="btn-group mt-4">
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
	    @endrow
	@endcontainer 
@endrow                  
@endsection
