var TGN_FORMS=[];


function tgnFormClass(obj,options){

	this.defaults = {
		confirm: false,
		validateurl: '',
		validator: false,
		validateOnSubmit: true,
		validateOnStart: false,
		validateOnChange: false,
		autofocus:false,
		autoselect:false,
		target: false,
		loadOnSubmit: true
	};

	this.$element=obj;
	this.$loader=false;
	this.$container=false;

	this.validated=false;
	this.buton_submit=false;


	this.settings=this.defaults;
	if(options) this.settings = $.extend(true, {}, this.settings, options); 
	
	
	this.runSubmit = function(){
		var o=this;
		var $form=this.$element;

		//le añado el valor del boton
		if(o.buton_submit){
			$('<input />').attr('type', 'hidden')
	      	.attr('name', o.buton_submit.attr('name'))
	      	.attr('value', o.buton_submit.val() )
	      	.appendTo($form);
		}
        al("Submitting form...");

        if(o.settings.target){
        	var url = $form.attr('action');
        	var method = $form.find('[name=_method]').val();
        	var params =  $form.serializeControls();
			

        	if(o.settings.target=="modal"){
        		$form.startLoading();

        		TgnModal.open(url,method,params,{
					onsuccess: function(modal){
						$form.stopLoading();
					},
					size:'lg'
				});

        	}else if($(o.settings.target).length>0){
        		var $target=$(o.settings.target);
        		 // al(url);
        		 // al(method);
        		 // al(params);
        		//$form.startLoading();
        		$target.startLoading();
				//data._token= csrfToken();
        		$.ajax({
		            url: url,
		            type: method,
		            data: params,
		            dataType: 'html',
		            success: function(data){
		            	$('html').stopLoading();
		        		$target.html(data).tgnInitAll().stopLoading();
		            	//$form.stopLoading();
		        			
		            },
		            error: function(xhr){
						// $form.stopLoading();
						$('html').stopLoading();
		        		$target.html('').stopLoading();
						//console.log(xhr.status);
		            }
		        });
        	}

        	return false;

        }else{
        	if(o.settings.loadOnSubmit) $('html').startLoading();
        	$form.submit();
		}
	}

	

	this.init = function(){
		var o=this;
		var $form=this.$element;

		
		console.group("TgnForm");
		//al($form);
		//al(this.settings);

		if(!$form.is(".forminit")){

			
			$form.find(':input').each(function(){
				if($(this).closest('.form-group').is('.with-feedback')){
					$(this).data('had-feedback',true);
				}
			});

			$form.find('.input-icon').on('click',function(e){
				al('click icon');
				var label=$(this).closest('.form-group').find('label.col-form-label');
				if(label.length>0){
					$("#"+label.attr('for')).focus();
				}
			})

			$form.addClass('forminit');
	    	TGN_FORMS.push(this);
	    	//al(this.settings);

	    	if (this.settings.autofocus) {
	    		
	    		if(this.settings.autofocus===true || this.settings.autofocus==="true"|| this.settings.autofocus===1){
	    			$input=$form.find('input:enabled:visible:first');
	    		}else{
	    			$input=$form.find("[name="+this.settings.autofocus+"]");
	    		}
	           if($input.length>0) $input.get(0).focus();
	           $input.closest('.form-group').addClass('focused');
	        }

	        if (this.settings.autoselect) {
	    		if(this.settings.autoselect===true || this.settings.autoselect==="true"|| this.settings.autoselect===1){
	    			$input=$form.find('input:enabled:visible:first');
	    		}else{
	    			$input=$form.find("[name="+this.settings.autoselect+"]");
	    		}
	           if($input.length>0) $input.get(0).select();
	           $input.closest('.form-group').addClass('focused');
	        }
	        
	    	if(this.settings.validator){
	    		$form.find('.form-group').append('<div class="feedback invalid-feedback"></div>');


		    	if(this.settings.validateOnStart){
		    		if($form.data('validate-on-start')) this.validate();
		    	}
		    	if(this.settings.validateOnChange){
		    		$form.find(':input').on('change',function(){
		               o.validate();
			        });
		    	}
		    	if(this.settings.validateOnSubmit){
					$form.on('submit',function(e){
						
			            if(o.validated) {
			                var $form = $(this);
			                if ($form.data('submitted') === true) {
			                    e.preventDefault();
			                } else {
			                    $form.data('submitted', true);
			                }
			                return true;
			            } else {
			                return o.validate();
			            }
			        });


			        
		    	}
		    }

			//le añado el multipart si hay algun campo file
			if($form.find("input[type=file]").length>0){
			  	$form.attr("enctype","multipart/form-data");
			}
			

		     $form.find("[type=submit]").on('click', function(e){
	            e.preventDefault();
	           	var btn=$(this);
				
	            function doSubmit(){
					o.buton_submit = btn;
					var validate=o.settings.validator; 
				
					if(typeof o.buton_submit.data('validate') !== 'undefined' ){
						validate=false;
					}

					if(validate){
						// al("validate");
	            		o.validate();
					}else {
						// al("no validate");
						o.validated=true;
	           			o.runSubmit();
	           		}
	            }

				//si el formulario tiene confirmacion y el botón no tiene definida confirmacion o si la tiene definida con algun valor no false
	            if(o.settings.confirm && ( ( typeof btn.data('confirm') == 'undefined' ) || btn.data('confirm')) ){

					//al("is confirm");
					TgnModal.confirm(o.settings.confirm, function(modal){
						//al("callback");
						doSubmit();
						modal.hide();
						
					});

				//si el boton tiene confirmacion
				}else if(btn.data('confirm')){
					//al("is confirm");
					TgnModal.confirm(btn.data('confirm'), function(modal){
						//al("callback");
						doSubmit();
						modal.hide();
						
					});

					
				}else{
					doSubmit();
				}
	        });

		     //focus groups
		     $form.on('focus',':input:not(.btn)',function(e){
				var group=$(this).closest('.form-group');
		     	if(!group.is(".disabled"))
		     		group.addClass('focused');
		     }).on('blur',':input:not(.btn)',function(){
		     	var group=$(this).closest('.form-group');
		     	if(!group.is(".disabled"))
		     		group.removeClass('focused');
		     });
			

		}
		console.groupEnd();

	};

	

	this.validate = function(){
		al("Validating Form...");
		var o = this;
		var $form=this.$element;
		//al($form);


		var data = $form.serializeArray();
		data._token= csrfToken();
        data.push({name:'class',value:this.settings.validator});

        for(var i = 0; i < data.length; i++) {
            item = data[i];
            if(item.name == '_method'){
                data.splice(i,1);
            }
        }

        $form.addClass("validating");
        
        $.ajax({
            url: this.settings.validateurl,
            type: 'post',
            data: $.param(data),
            dataType: 'json',
            success: function(data){
                 $form.removeClass("validating");
      			// al(data);
                if(data.success){

                    $.each($form.serializeArray(), function(i, field) {

                        var campo = $form.find("[name='"+field.name+"']");
                        var father = campo.closest('.form-group');
                        //al(campo);
                        //al(father);
                        campo.removeClass('is-invalid');
                        //campo.addClass('is-valid');
                        father.removeClass('is-invalid');
                        if(!campo.data('had-feedback')) father.removeClass('with-feedback');
                        father.find('div[class*=-feedback]').html('');
                    });

                    o.validated = true;
                    if(o.buton_submit){
                        o.runSubmit();//$form.submit();
                    }
                } else {
                	
                    var campos_error = [];

                    $.each(data.errors,function(key, data){
                    	if(key.includes('.')){
                    		key=key.split(".");
                    		key= key.shift() +'['+ key.join('][') + ']';
                    	
                    	}
                    	//al(key);
                        var campo = $form.find("[name='"+key+"']");
                        
                        var father = campo.parents('.form-group');
                        //campo.removeClass('is-valid');
                        campo.addClass('is-invalid');
                        father.addClass('is-invalid').addClass('with-feedback');
                        father.find('div[class*=-feedback]').html(data[0]);
                        campos_error.push(key);


                        //resalto la pestaña si está oculta
                        if(campo.closest('.tab-pane').length>0){
                        	//al("EN TAB");
                        	var tabpane=campo.closest('.tab-pane');

                        	if(!tabpane.is(".active")){
                        		var tab=$('.nav-link[href="#'+tabpane.attr('id')+'"]');
                        		//al(tab);

                        		tab.addClass("anim beat in");
                        		tab.on('click',function(){
                        			$(this).removeClass('anim').removeClass('beat').removeClass('in');
                        		});
                        	}
                        }
                    });
                    $.each($form.serializeArray(), function(i, field) {
                    	if (!field.name.startsWith('content_') && $.inArray(field.name, campos_error) === -1)
                        {
                            var campo = $form.find("[name='"+field.name+"']");
                            var father = campo.closest('.form-group');
                            campo.removeClass('is-invalid');
                            father.removeClass('is-invalid');
                            if(!campo.data('had-feedback')) father.removeClass('with-feedback');
                            //campo.addClass('is-valid');

                            father.find('div[class*=-feedback]').html('');

                            
                        }
                    });
                    TgnFlash.warning(___("strings.Form validation errors"));
					
					//scroll to element			
					$('html, body').scrollToElement($form);

                    o.validated = false;
                    o.buton_submit = false;
                }
            },
            error: function(xhr){
                $form.removeClass("validating");
        		console.log(xhr.status);
            }
        });
        return false;


	};


   
};


(function ( $ ) {
	
	$.fn.tgnForm = function( options ){
		
		return this.each(function(){
			var obj=$(this);
			obj.settings={};
			if(obj.data()) obj.settings = $.extend(true, {}, obj.settings, obj.data()); 
			var form=new tgnFormClass(obj, obj.settings);
			form.init();

		});
	};

}( jQuery ));



