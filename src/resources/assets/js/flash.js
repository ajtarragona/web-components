initFlashMessages = function ( ){
	$(".alert-autohide").delay(5000).slideToggle('fast',function(){$(this).remove();});
}


var tgnflashdefaults = {
	style: 'info',
	autohide : true,
	dismissible : true,
	fade: true,
	delaytime: 5000,
};


TgnFlash = function(body,title,options){

	//al("TgnFlash");
	this.title=title;
	this.body=body;
	//this.footer=false;
	
	this.settings=tgnflashdefaults;
	if(options) this.settings = $.extend(true, {}, this.settings, options); 

	//al(this.settings);

	this.construct = function(){
		var classes=['alert', 'tgn-alert', 'alert-'+this.settings.style];
		if(this.settings.autohide) classes.push('alert-autohide');
		if(this.settings.dismissible) classes.push('alert-dismissible');
		if(this.settings.fade) classes.push('fade');


		this.$alert=$('<div class="'+classes.join(' ')+'" role="alert">');

   		if(this.settings.dismissible){
   			this.$alert.append('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><small aria-hidden="true">'+_icon("times")+'</small></button>');
   		}
	
        if(this.title) this.$alert.append('<h6 class="alert-title">'+this.title+'</h6>');

		this.$alert.append('<div class="alert-body">'+this.body+'</div>');

		//this.$alert.append('<div class="alert-footer">'+this.footer+'</div>');
    	

    
	}


	this.show = function(){
		var o=this;
		$('#messages').append(this.$alert);

		setTimeout(function(){
			o.$alert.addClass('show');
			if(o.settings.autohide){
				setTimeout(function(){
					o.hide();
				}, o.settings.delaytime);
			}
		},10);
	}

	this.hide = function(){
		this.$alert.slideToggle('fast',function(){
			$(this).remove();
		});
	}

	this.construct();

}



TgnFlash.warning = function(body, title, options){
	if(!options) options={};
	options.style='warning';

	var flash = new TgnFlash(body,title,options);
	flash.show();
}


TgnFlash.info = function(body, title, options){
	if(!options) options={};
	options.style='info';

	var flash = new TgnFlash(body,title,options);
	flash.show();
}

TgnFlash.error = function(body, title, options){
	if(!options) options={};
	options.style='danger';

	var flash = new TgnFlash(body,title,options);
	flash.show();
}

TgnFlash.success = function(body, title, options){
	if(!options) options={};
	options.style='success';

	var flash = new TgnFlash(body,title,options);
	flash.show();

};


