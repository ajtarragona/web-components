


$.widget( "ajtarragona.tgnTable", {

    options: {
       selectable:false,
       clickable:false,
       selectSingle:false,
       selectStyle: 'default'
    },

    isInit: false,

    _create: function() {
        var o=this;
        // al("creating tgnTable");
        
        this.options = $.extend({}, this.options, this.element.data()); 
        this.rows=this.element.find("> tbody > tr");

		
		if(this.options.selectable){
			//al("is selectable");
			this._initSelectable();
			
			
		}

		if(this.options.clickable){
			//al("is clickable");
			var ev=this.element.data("clicktype")?this.element.data("clicktype"):"dblclick";
			// var url=$(this).data("url");

			
			var controlClick=this.element.data("control-click");


				//control+click
				
				this.element.on('click',"> tbody > tr", function(e){
					// al($(this));
					var url=$(this).data("url");
					// al(url);
					if(url){
						if (controlClick && e.ctrlKey){
							e.preventDefault();
							e.stopPropagation();
							window.open(url, '_blank');
						}else if(ev =="click" && !o.options.selectable){

							window.location.href=url;
						}
					}
				});

				this.element.on('dblclick',"> tbody > tr",function(e){
					var url=$(this).data("url");
					if(url && ev =="dblclick" && !o.options.selectable){
						window.location.href=url;
					}
				});

				this.startY=0;
				this.startX=0;
				this.yDistance=0;
				this.xDistance=0;
				this.touch=null;
				
				this.element.find("> tbody > tr").on("touchstart", function(event){
					o.touch = event.changedTouches[0];
					// event.preventDefault();
					o.startY = o.touch.clientY;
					o.startX = o.touch.clientX;

				});

				this.element.find("> tbody > tr").on("touchmove", function(event){
					o.touch = event.changedTouches[0];
					// event.preventDefault();

				});

				
				this.element.find("> tbody > tr").on('touchend', function(){

					o.yDistance = o.startY - o.touch.clientY;
					o.xDistance = o.startX - o.touch.clientX;
					var url=$(this).data("url");
					
					if(Math.abs(o.yDistance) < 30 && Math.abs(o.xDistance) < 30){
						if(url && !o.options.selectable){
							window.location.href=url;
						}
					}
				});

				// this.element.on("touchend","> tbody > tr",function(e){
				// 	if(!o.options.selectable){
				// 		var url=$(this).data("url");
				// 		if(url) window.location.href=url;
				// 	}
				// });
			
		}


		o.element.trigger("tgntable:ready" ); 

		
	
    },

   
    _initSelectable: function( ) {
    	var o=this;
        
        this.rows.each(function(i){
			var tr=$(this);
			var check=tr.find('.row-selector');//input[type=checkbox]., input[type=radio]');

			if(check.length>0){

				tr.find('.custom-control-label').on("click",function(e){
					e.preventDefault();
				});
				check.on("click",function(e){
					e.preventDefault();
				});
			}	
				

			tr.on("click",function(e){
				if(o.options.selectable  && ($(e.target).is('.custom-control-label') || $(e.target).is('td') || e.target==e.currentTarget )){
					o.toggleRow($(this));
				}
			});

				
		});
    },

    _rowDisabled : function (tr){
    	var check=tr.find('input[type=checkbox], input[type=radio]');
     	return (tr.is(".disabled") || (check.length>0 && check.prop('disabled')));
    },

    toggleRow: function( tr ) {
    	
		if(tr.is('.active')){
			this.deselectRow(tr);
		}else{
			this.selectRow(tr);
			
		}
	
    },  

    selectAll: function(  ) {
    	var o=this;
		if(this.options.selectable && !this.options.selectSingle){
    		this.rows.each(function(i){
    			o.selectRow($(this));
    		});
    	}
    },

    deselectAll: function(  ) {
		var o=this;
		this.rows.each(function(i){
			o.deselectRow($(this));
		});
		
    },

    getSelectStyle : function(){
    	return this.options.selectStyle=="default"?"table-active":"table-"+this.options.selectStyle;

    },

    selectRow: function( tr ) {
		if(!this.options.selectable ) return;

     	if(this.options.selectSingle){
			this.deselectAll();
		}

     	var check=tr.find('input[type=checkbox], input[type=radio]');
     	if(this._rowDisabled(tr)) return;

     	
		tr.addClass("active").addClass(this.getSelectStyle());
		tr.trigger('selected',{element:tr});
		if(check.length>0){
			check.prop('checked', true); 
			check.trigger('change');
		}


    },

    deselectRow: function( tr ) {
      	var check=tr.find('input[type=checkbox], input[type=radio]');

		if(this._rowDisabled(tr)) return;

		tr.removeClass("active").removeClass(this.getSelectStyle());
		tr.trigger('deselected',{element:tr});
		if(check.length>0){
			check.prop('checked', false); 
			check.trigger('change');
		}
    },

    getSelected : function(){
    	return this.rows.filter(".active");
	},
	 
	hasSelected : function(){
	 	return this.getSelected().length>0;
	},

	allSelected : function(){
	 	return this.getSelected().length == this.rows.length;
	},

	toggleSelectable : function(){
		this.options.selectable=!this.options.selectable;

		if(!this.options.selectable){
			this.deselectAll();
		}
   },

    refresh: function( ) {
        
    },

});




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
					if(tablecontainer.data("onsuccess")){
						executeCallback(tablecontainer.data("onsuccess"),tablecontainer);	
					}
	       		})
	       });
	    }

    });
}
