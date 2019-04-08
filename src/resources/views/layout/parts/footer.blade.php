<footer id="meta-footer">
	
	@if(Auth::user())
		<span class="foot-item">
			@icon('user') {{ Auth::user()->name }}
		</span>
		@if(isset(Auth::user()->roles) && Auth::user()->roles->count()>0)
			<span class="foot-item">
				
					@icon('lock')
					@foreach(Auth::user()->roles as $r)
	                       <span class="bg-dark text-light pl-1 pr-1">{{$r->roleName()}}</span>
	                @endforeach

			</span>
		@endif
	     
	@endif
	<span class="foot-item">{!! config('webcomponents.credits') !!} </span>
</footer>