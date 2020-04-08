<div id="maintoolbar" >
	<div class="toolbar-toggle">@icon("ellipsis-v")</div>
	<div class="toolbar-content ">
		<div class="container-fluid">
			<div class="row align-items-center">
				<div class="col-md-6 the-breadcrumb">
					{{-- <h3 class=" pb-0 mb-0">@yield('title')</h3> --}}
					
					 @hasSection('breadcrumb')
						 
						@yield('breadcrumb')
		              	
	              	@endif

				</div>
				<div class="col-md-6 text-md-right py-3 the-actions">
					 @hasSection('actions')
							@yield('actions')
					@endif
				</div>
			</div>
		</div>
		
	</div>
</div>