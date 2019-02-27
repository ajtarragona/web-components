 initSidebar = function( ){
 	
 	
	$('.sidebar').find('.nav-link').each(function(){

		var tt=$(this);
		if($('body').is('.sidebar-open')){
			tt.tooltip('disable');
		}else{
			tt.tooltip('enable');

		}
	});


	$('.sidebar-toggle').on('click',function(){
		
		if($('body').is('.sidebar-open')){
			$('#main-menu').tgnNav('collapseAll');
		}

		//$('#main-menu').data('was-opened',$('body').is('.sidebar-open'));

		$('body').toggleClass('sidebar-open');
		//al('toggle tooltips');
		$('.sidebar').find('.nav-link').tooltip('toggleEnabled');

		
	});
}