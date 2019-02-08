initToolbar = function( ){


	$(document).on('keyup',function(evt) {
	    if (evt.keyCode == 27) {
	       $('body').removeClass('toolbar-open');
	       //$('body').removeClass('sidebar-open');
	    }
	});
	
	$('body').on('click',function(e){
		
		if($(e.target).closest('.toolbar-toggle').length==0 && $(e.target).closest('.sidebar-toggle').length==0){
			if($(this).is('.toolbar-open')) $(this).removeClass('toolbar-open');
			//if($(this).is('.sidebar-open')) $(this).removeClass('sidebar-open');
		}
	});

	$('#maintoolbar .toolbar-toggle').on('click',function(){
		$('body').toggleClass('toolbar-open');
		
	});
	
	 
	 if(!$('#maintoolbar .the-actions').html().trim()){
		$('#maintoolbar .toolbar-toggle').hide();
	 }
};