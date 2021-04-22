var NAVS=[];



var tgnnavdefaults = {
	navigation : 'drilldown',
	dropdownonhover : true,
	hoverdelay : 0,

};

TgnNav = function(obj,options){

	

	this.$element=obj;
	this.settings=tgnnavdefaults;
	if(options) this.settings = $.extend(true, {}, this.settings, options); 
	
	this.collapseAll = function(){
		//al("Collapsing");
		var o=this;
		var $nav=this.$element;
		if(o.settings.navigation=='drilldown'){
			$nav.removeClass("opened");
			$nav.find(".opened").removeClass("opened");
			$nav.closest(".drilldown-wrap").css("height", 'auto');
		}else if(o.settings.navigation=='collapse'){
			$nav.find(".open").removeClass("open");
			$nav.find(".subnav.show").removeClass("show");
			$nav.find("> li >.toggler").addClass("collapsed");
			
		}

	}

	this.init = function(btn){
		var o=this;
		var $nav=this.$element;

		console.group("TgnNav");
		//al(o.settings);
		
		if(!$nav.is(".init")){
				
		
		 	if(o.settings.navigation=='drilldown'){
		 		o.initDrilldownNav();
		 	}else if(o.settings.navigation=='collapse'){ // || nav.is('.tgn-nav-accordion')){
		 		o.initCollapsableNav();
		 	}else{
		 		o.initDropdownNav();
			}		

			$nav.addClass("init");
		}
		console.groupEnd();
	};




	this.initCollapsableNav=function(){
		// al('CollapsableNav');
		var o=this;
		var $nav=this.$element;

		$nav.find('.has-submenu > .toggler').on("click",function(e){ 
			$(this).parent().toggleClass("open");
			//item.siblings().removeClass("open");
		});
		$nav.find('.has-submenu > span').on("click",function(e){ 
			$(this).parent().find("> .toggler ").click();
		});
		
		/*
		$(this).parent().children(".collapse").collapse('toggle');

		*/
	}


	this.initDropdownNav=function(){
		// al('DropdownNav');
		var o=this;
		var $nav=this.$element;

		
		function openItem(item){
			//al(item);
			if(!item.is(".open")){
				item.addClass("open");
				item.siblings().removeClass("open");
			}
			if(item.data("navtimer")) clearTimeout(item.data("navtimer"));


			
			
		}

		function closeItem(item){
			item.removeClass("open");
			if(item.data("navtimer")) clearTimeout(item.data("navtimer"));
		}

		function toggleItem(item){
			if(item.is(".open")) closeItem(item);
			else openItem(item);
		}


	
		//if($(this).find('.dropdown-menu > .has-submenu').size()>0){
		if(o.settings.dropdownonhover){
			$nav.find('.has-submenu').on("mouseenter",function(e){
				var item=$(this);
				if(!$(this).is(".open")){
					var timer=setTimeout(function(){
						openItem(item);
					},o.settings.hoverdelay);
					$(this).data("navtimer",timer);
				}
			});
		}

		$nav.find('.has-submenu').on("mouseleave",function(e){
			var item=$(this);
			closeItem(item);
			
		});

		$nav.find('.has-submenu > span').on("click",function(e){ 
			e.preventDefault(); 
			e.stopPropagation(); 
			toggleItem($(this).parent());
			
		});
		

		$nav.find('a:not(.dropdown-toggle)').on("click",function(e){ 
			$(this).closest(".nav").find("li.active").removeClass('active');
			$(this).parent().addClass('active');
			
			
		});

		$nav.find('.has-submenu > .toggler').on("click",function(e){ 
			e.preventDefault(); 
			e.stopPropagation(); 
			toggleItem($(this).parent());
		
		} );
	}



	this.initDrilldownNav=function(){
	 	// al('DrilldownNav');
		var o=this;
		var $nav=this.$element;


 		var wrapper=$("<div class='drilldown-wrap'/>");
 		wrapper.css("height", $nav.outerHeight());
 		$nav.wrap(wrapper);


 		$nav.find(".opener").on("click",function(e){
 			e.preventDefault();
 			e.stopPropagation();

 			var sub=$(this).closest('li').find('> ul');
 			$(this).closest(".drilldown-wrap").css("height", sub.outerHeight());

 			//sub.addClass("open");
 			$(this).closest("li").addClass("opened");
 			$(this).closest("li").closest("ul").addClass("opened");
 			//$(".wrapper").css("height", $('[data-drilldown-sub]').outerHeight())
 		});

 		$nav.find(".back").on("click",function(e){
 			e.preventDefault();
 			e.stopPropagation();
 			var sub=$(this).closest('ul');
 			var parentli=sub.parent();
 			var parentul=parentli.parent();
 			$(this).closest(".drilldown-wrap").css("height", parentul.outerHeight());

 			//sub.removeClass("open");
 			parentli.removeClass("opened");
 			parentul.removeClass("opened");
 		});
	 	
	}
   
};



(function ( $ ) {
		
	

	$.fn.tgnNav = function( options ){
		 var arg = arguments;

		 return this.each(function () {
	        var $this = $(this);
	        $this.settings={};
	        if($this.data()) $this.settings = $.extend(true, {}, $this.settings, $this.data()); 
			if(options) $this.settings = $.extend(true, {}, $this.settings, options); 
	        	

	        //guardo la clase como data del elemento del dom
	        var data = $this.data('tgnNavPlugin');
	        if (!data) $this.data('tgnNavPlugin', (data = new TgnNav($this, $this.settings)));

	        //si se llama a un método del plugin
	        if (typeof options === 'string') {
	        	//al(options);
	            if (arg.length > 1) {
	                data[options].apply(data, Array.prototype.slice.call(arg, 1));
	            } else {
	                data[options]();
	            }
	        }else{
	        	data.init();
	        }
	    });
		

	};

}( jQuery ));









