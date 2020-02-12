var MODALS=[];



var tgnmodaldefaults = {
	url: '',
	target: false,
	method : 'get',
	closable: true,
	maximizable: true,
	toggable: false,
	draggable: true,
	valign: 'top',
	halign: 'center',
	size:'sm',
	animate: true,
	style:'default',
	padding: true,
	strings:{
		loading : ___('strings.loading'),
		error : ___('strings.error'),
		cancel : ___('strings.cancel'),
		confirmation : ___('strings.confirmation'),
		confirm : ___('strings.confirm'),
		loaderror : ___('strings.loaderror'),
		loaderrormessage : ___('strings.loaderrormessage')
	},
	onsuccess : false

};

TgnModal = function(options){

	al("TgnModal");

	this.$dialog=false;
	this.title=false;
	this.body=false;
	this.footer=false;

	this.$opener=false;
	

	this.settings=tgnmodaldefaults;
	if(options) this.settings = $.extend(true, {}, this.settings, options); 
	
	this.setStyle = function(style){
		var o=this;
		o.settings.style=style;
		var isdark=$.inArray(o.settings.style, ['primary','success','danger','info'])!=-1;
		o.$dialog.find(".modal-header").removeClass(function (index, css) {
			return (css.match (/\bbg-\S+/g) || []).join(' '); // removes anything that starts with "page-"
		}).addClass('bg-'+o.settings.style);


		o.$dialog.find(".modal-title").removeClass('text-white');
		o.$dialog.find("button.close").removeClass('text-white');
		if(isdark){
			o.$dialog.find(".modal-title").addClass('text-white');
			o.$dialog.find(".button.close").addClass('text-white');
		}

		

	}

	this.initAutofocus = function(){
		if(this.$dialog.find("[autofocus]").length>0){
	    	this.$dialog.find("[autofocus]").last().focus();
	     }
	}
	this.setTitle = function(title){
		//if(title){
			this.title=title;
			this.render();
		//}
	}

	this.setProperties= function(){
		var o=this;
		
		if(o.settings.animate) o.$dialog.addClass('fade');
		o.$dialog.find('.modal-dialog').addClass('modal-'+o.settings.size);
		o.$dialog.find('.modal-dialog').addClass('halign-'+o.settings.halign);
		if(o.settings.valign=='center') o.$dialog.find('.modal-dialog').addClass('modal-dialog-centered');
		if(o.settings.valign=='bottom') o.$dialog.find('.modal-dialog').addClass('modal-dialog-bottom');


		if(o.settings.maximizable){
			o.$dialog.find('.modal-buttons').append($('<button type="button" class="maximize"><i class="far fa-window-maximize"></i></button>'));
		}
		if(o.settings.closable){
			o.$dialog.find('.modal-buttons').append($('<button type="button" class="close " data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'));
		}
		//this.render();
	}

	this.setId = function(id){
		// al("setID",id)
		if(!id || id.trim()==""){
			id='modal_'+_UUID();
		}
		// al(id);
		this.id=id;
		this.render();
	}

	this.setBody = function(body){
		if(body){
			//if(!body instanceof jQuery) body=$(body);
			this.body=body;
			this.render();
		}
	}

	this.setFooter = function(footer){
		if(footer){
			//if(!footer instanceof jQuery) footer=$(footer);
			this.footer=footer;
			this.render();
		}
	}

	this.construct = function(){
		var o=this;
		//al(isdark);
		if(o.isLocal()){
			//al("construct local");
			o.$dialog=$(o.settings.target);
			//al(o.$dialog);

		}else{

			
			var dialoghtml= 
			'<div class="modal" tabindex="-1" role="dialog" >'+
			'	<div class="modal-dialog">'+
			'		<div class="modal-content ">'+
			'			<div class="modal-header  "><h5 class="modal-title text-truncate"></h5><span class="modal-buttons"></span></div>'+
			'		</div>'+
			'	</div>'+
			'</div>';

			o.$dialog=$(dialoghtml);

			
			o.$dialog.prependTo('body');
		}

		if(!o.$dialog.is(".modalinit")){
			o.$dialog.addClass('modalinit');
			o.setProperties();
			
			o.setStyle(o.settings.style);


			//eventos

			o.$dialog.on('hide.bs.modal', function (e) {
				if(!o.isLocal()) o.destroy();
				al("CERRANDO");
			});

			//para multiples modales, manejo el zindex
			o.$dialog.on('show.bs.modal', function(event) {
				$(this).data('modal-index',$('.modal:visible').length);
			});

			o.$dialog.on('shown.bs.modal', function(event) {
			    var idx = $(this).data('modal-index');
			    var zindex=1040 + (10 * idx);

			    $(this).css('z-index', zindex);

			    //var idx = ($('.modal:visible').length) -1; // raise backdrop after animation.
			    $('.modal-backdrop').not('.stacked').css('z-index', (zindex-1));
			    $('.modal-backdrop').not('.stacked').addClass('stacked');

			    o.initAutofocus();
			});



			if(o.settings.draggable){
				o.$dialog.find('.modal-dialog').draggable({handle:'.modal-header'});
			}

			if(o.settings.maximizable){
				o.$dialog.find('.modal-header').on('dblclick',function(){
					o.toggleMaximized();
				});
				o.$dialog.find('.modal-header button.maximize').on('click',function(){
					o.toggleMaximized();
				});
			}
		}
	}


	this.toggleMaximized = function(){
		var o=this;
		o.$dialog.toggleClass("modal-maximized");
		$('body').toggleClass("modal-maximized");
		o.$dialog.find('button.maximize i').toggleClass('fa-window-maximize').toggleClass('fa-window-restore');
	}

	this.render = function(){
		var o=this;
		o.$dialog.attr('id',o.id);
		o.$dialog.find('.modal-title').html(o.title);
		if(o.body && o.$dialog.find('.modal-body').length==0) o.$dialog.find('.modal-content').append($("<div class='modal-body'/>"));
		if(o.footer && o.$dialog.find('.modal-footer').length==0) o.$dialog.find('.modal-content').append($("<div class='modal-footer'/>"));
		o.$dialog.find('.modal-body').html(o.body);
		if(!o.settings.padding) o.$dialog.find('.modal-body').addClass('p-0');
		
		o.$dialog.find('.modal-footer').html(o.footer);

		o.$dialog.modal('handleUpdate');
		o.$dialog.find('.modal-content').tgnInitAll();
		
	}

	this.open = function(){
		var o=this;
		//al(o.settings);
		var opts={ 
			backdrop: (o.settings.closable?true:'static'),  //no funciona ?
			keyboard: o.settings.closable, //no funciona ?
			show: true
		};

		//al(opts);
		//o.$dialog.modal();	
		o.$dialog.modal(opts);	
		
	}

	this.hide = function(){
		if(this.$dialog) this.$dialog.modal('hide');

		
	}

	this.destroy = function(){
		var o=this;
		o.title='';
		o.body='';
		o.footer='';
		o.render();
		//o.settings=o.defaults;
		o.$dialog.remove();

		if(o.$opener){
			o.$opener.removeClass('modalinit');
		}
		//$('.modal-backdrop').remove();
		$('body').removeClass("modal-maximized");
		//al("tgnModal destroyed");
		//o.$opener.off('click');
	}
 
	this.isLocal = function(){
		//al("isLocal:"+this.settings.url + "."+this.settings.target);
		return this.settings.url=='#';

	}

	this.doRequest = function(){
		var o=this;

		if(!o.isLocal()){
			//al("opening:" +o.settings.url);
			o.setTitle('<span class="fa fa-spinner spin d-inline-block"></span> '+o.settings.strings.loading+' ...');
			
			o.open();
			var params= o.settings.params;
			if(o.settings.method!="get") params=$.extend(true, {}, params, { _token: csrfToken() } ); 
		    //al(params);    

			$.ajax({
	            url: o.settings.url,
	            type: o.settings.method,
	            data: params,
	            dataType: 'html',
	            success: function(data){
	            	var content=$(data);
					if(o.$dialog.length>0){
						o.setId(content.attr('id'));
						o.setTitle(content.find('.modal-title').html());
						o.setBody(content.find('.modal-body').html());
						o.setFooter(content.find('.modal-footer').html());
						
					}
					 
					o.initAutofocus();
					executeCallback(o.settings.onsuccess,o.$dialog);	
				},
	            error: function(xhr){
	            	//al(xhr);
	                o.setStyle('danger');
					o.setTitle(o.settings.strings.error +" "+xhr.status );
					o.setBody("<code>"+xhr.statusText+"</code>");
					executeCallback(o.settings.onerror,o.$dialog);
	            }
	        });
	    }else{

	    }
	}


	this.initOpener = function(btn){
		var o=this;
		
		o.$opener=btn;

		
		al("init() tgnModal");
		if(!o.$opener.is(".modalinit")){
			o.$opener.addClass('modalinit');
	    	o.settings.url=o.$opener.attr("href");
	    	
			MODALS.push(this);

	    	//al(this.settings);
	    	//if(o.$opener.attr('href')!='#'){
		    	o.$opener.on("click",function(e){
		    		o.construct();
				
					e.preventDefault();
					//e.stopPropagation();
		    		
					o.doRequest();
					
				});
			//}
			
		}
	};


	

   
};


TgnModal.alert = function(body,title,options){
	
	options = $.extend(true, {}, tgnmodaldefaults, options ); 
	options.maximizable=false;
	var modal = new TgnModal(options);
	modal.construct();
	modal.setTitle(title);
	modal.setBody(body);
	modal.open();
};



TgnModal.open = function(url,method,params,options){
	
	options = $.extend(true, {}, tgnmodaldefaults, options ); 
	options.url=url;
	options.method=method;
	options.params=params;
	
	var modal = new TgnModal(options);
	modal.construct();
	modal.doRequest();

};


TgnModal.confirm = function(body, callback, options){
	options = $.extend(true, {}, tgnmodaldefaults, options ); 
	options.maximizable=false;
	var modal = new TgnModal(options);
	modal.construct();
	if(!options.title) modal.setTitle(options.strings.confirmation);
	
	if(body==true || body=="true" || body=="1" || body==1){
		modal.setBody(___('strings.Are you sure?'));
	}else{
		modal.setBody(body);
	}
	modal.setFooter('<button data-action="cancel" type="button" class="btn btn-light btn-sm cancel-button">'+options.strings.cancel+'</button>'+
		'<button data-action="confirm" type="button" class="btn btn-secondary btn-sm confirm-button">'+options.strings.confirm+'</button></div>');

	modal.open();

	modal.$dialog.on('click','.modal-footer .cancel-button', function(e){
		modal.$dialog.modal('hide');
	});

	modal.$dialog.on('click','.modal-footer .confirm-button', function(e){
		executeCallback(callback,modal);
		//modal.$dialog.modal('hide');
		
	});

};



(function ( $ ) {
	
	$.fn.tgnModal = function( options ){
		return this.each(function(){
			var btn=$(this);
			var settings=options;
			if(btn.data()) settings = $.extend(true, {}, settings, btn.data()); 
			var modal=new TgnModal(settings);
			modal.initOpener(btn);

		});
	};

}( jQuery ));



