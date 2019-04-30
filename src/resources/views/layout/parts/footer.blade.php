<footer id="meta-footer">
	
	@if(Auth::user())

		<a class="foot-item" href="#" data-toggle="popover" data-trigger="focus"  data-placement="top" title="{{ icon('user') }} @lang('tgn::auth.user')" data-content="<strong>User:</strong> {{ Auth::user()->username }}<br/><strong>Name:</strong> {{ Auth::user()->name }}<br/><strong>Email:</strong> {{ Auth::user()->email }}">
			@icon('user') {{ Auth::user()->name }}
		</a>

		


		@if(isset(Auth::user()->roles))
			
			@if($rols = Auth::user()->roleNames() )
				<a href="#" class="foot-item"  data-toggle="popover" data-trigger="focus"  data-placement="top" title="{{ icon('lock') }} @lang('tgn::auth.roles')" data-content="<span class='bg-dark text-light pl-1 pr-1'>{!! $rols->implode("</span><br/><span class='bg-dark text-light pl-1 pr-1'>") !!}</span>">
					@icon('lock') 
					<span class="bg-dark text-light pl-1 pr-1">{{ $rols->first() }}</span> 

					@if($rols->count() >1)
						<span class="bg-dark text-light pl-1 pr-1">{{ $rols->get(1) }}</span> 
						@if($rols->count() >2)
							@lang('tgn::auth.and_n_more',['count'=>$rols->count() - 2])
						@endif
					@endif
					
				</a>
			@endif
		@endif
	     
	@endif
	@if(config('webcomponents.credits'))
		<span class="foot-item">{!! config('webcomponents.credits') !!} </span>
	@endif
	{{-- @include('git-version::version-comment') --}}
	<span class="foot-item">@appVersion</span>
</footer>