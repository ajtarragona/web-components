var TABLES=[];



var tgntabledefaults = {
	
};

TgnTable = function(obj,options){

	this.$element=obj;
	
	
	this.settings=tgntabledefaults;
	if(options) this.settings = $.extend(true, {}, this.settings, options); 
	
	
	
	
	this.init = function(){
		al("init() tgnTable");

		var o=this;
		//al(this);
		if(o.$element.is(".table-selectable")){
			//al("is selectable");
			o.$element.on("click","tbody tr",function(e){
				//al("click");
				if( $(e.target).is('td') || e.target==e.currentTarget ){
					var check=$(this).find('input[type=checkbox], input[type=radio]');
					if(check.prop('disabled')) return;
					check.prop('checked', !check.prop('checked')  ); 
				}
				//$(this).toggleClass('table-active');
			});
		}

		if(o.$element.is(".table-clickable")){
			//al("is clickable");
			var ev=o.$element.data("clicktype")?o.$element.data("clicktype"):"dblclick";

			o.$element.on(ev,"tbody tr",function(e){
				var url=$(this).data("url");
				if(url) window.location.href=url;
			});

			o.$element.on("touchend","tbody tr",function(e){
				var url=$(this).data("url");
				if(url) window.location.href=url;
			});
		}
		
	};


	

   
};




(function ( $ ) {
	
	$.fn.tgnTable = function( options ){
		return this.each(function(){
			var table=$(this);
			var settings={};
			if(table.data()) settings = $.extend(true, {}, settings, table.data()); 
			var table=new TgnTable(table,settings);
			table.init();

		});
	};

}( jQuery ));




$.fn.tgnAjaxTable = function(){

    return this.each(function(){
       
       var tablecontainer=$(this);
       if(!tablecontainer.is('.table-ajax-init')){
       		tablecontainer.addClass('table-ajax-init');

	       tablecontainer.on("click", 'thead th a, .pagination a',function(e){
	       		e.preventDefault();
	       		e.stopPropagation();
	       		//al("click");
	       		tablecontainer.startLoading();
	       		var href=$(this).attr("href");

	       		$.get(href,function(data){
	       			tablecontainer.stopLoading();
	       			tablecontainer.html(data);
	       			tablecontainer.tgnInitAll();
	       		})
	       });
	    }

    });
}
