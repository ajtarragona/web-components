<div id="maintoolbar" >
	<div class="toolbar-toggle">@icon("ellipsis-v")</div>
	<div class="toolbar-content ">
		{{-- <div class="container-fluid"> --}}
			<div class="d-block d-md-flex justify-content-between align-items-center px-3">
				<div class="the-breadcrumb flex-grow-1 flex-shrink-1" style="min-width: 0;">
					{{-- <h3 class=" pb-0 mb-0">@yield('title')</h3> --}}
					
					 @hasSection('breadcrumb')
						 
						@yield('breadcrumb')
		              	
	              	@endif

				</div>
				<div class="flex-1 text-md-right py-3 the-actions flex-shrink-0">
					 @hasSection('actions')
							@yield('actions')
					@endif
				</div>
			</div>
		{{-- </div> --}}
		
	</div>
</div>