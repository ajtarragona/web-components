 initSidebar = function( ){
 	
 	function toggleTooltips(){
 		$('.sidebar').find('.nav-link').each(function(){
	 		var tt=$(this);
	 		if(tt.closest('.tgn-nav').is('.tgn-nav-dropdown')){
	 			tt.tooltip('disable');
	 			return;
	 		}

	 		if($('body').is('.sidebar-open')){
				tt.tooltip('disable');
			}else{
				tt.tooltip('enable');
			}
		});
 	}
	

	toggleTooltips();
		
	


	$('.sidebar-toggle').on('click',function(){
		
		if($('body').is('.sidebar-open')){
			$('#main-menu').tgnNav('collapseAll');
		}

		//$('#main-menu').data('was-opened',$('body').is('.sidebar-open'));

		$('body').toggleClass('sidebar-open');
		//al('toggle tooltips');
		toggleTooltips();
		//$('.sidebar').find('.nav-link').tooltip('toggleEnabled');

		
	});
}