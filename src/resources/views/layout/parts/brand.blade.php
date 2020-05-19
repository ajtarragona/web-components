<div class="brand">
	
	<h5 class="text-white">
		@if(\Route::has('home') )
			<a href="{{ route('home') }}" class="text-white">
		@endif
		@icon(config('webcomponents.icon','globe'),['size'=>'lg']) {{ config('app.name') }} 
		@if(\Route::has('home') )
			</a>
		@endif
	</h5>
</div>