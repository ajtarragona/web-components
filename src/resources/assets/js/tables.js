


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
        al("creating tgnTable");
        
        this.options = $.extend({}, this.options, this.element.data()); 
        this.rows=this.element.find("> tbody > tr");

		
		if(this.options.selectable){
			//al("is selectable");
			this._initSelectable();
			
			
		}

		if(this.options.clickable){
			//al("is clickable");
			var ev=this.element.data("clicktype")?this.element.data("clicktype"):"dblclick";

			this.element.on(ev,"> tbody > tr",function(e){
				if(!o.options.selectable){
					var url=$(this).data("url");
					if(url) window.location.href=url;
				}
			});

			this.element.on("touchend","> tbody > tr",function(e){
				if(!o.options.selectable){
					var url=$(this).data("url");
					if(url) window.location.href=url;
				}
			});
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
