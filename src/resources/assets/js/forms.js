var TGN_FORMS=[];


function tgnFormClass(obj,options){

	this.defaults = {
		confirm: false,
		validateurl: '',
		validator: false,
		optionalvalidator: false,
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
        // al("Submitting form...");

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

	this.doSubmitConfirm = function(btn){
		var o = this;
		o.buton_submit = btn;
		// al('doSubmitConfirm',o.buton_submit);
		var validate=o.settings.validator || o.settings.optionalvalidator; 
	
		if(o.buton_submit && typeof o.buton_submit.data('validate') !== 'undefined' ){
			validate=false;
		}

		if(validate){
			// al("doSubmitConfirm validate");
			o.validate();
		}else {
			// al("no validate");
			o.validated=true;
			   o.runSubmit();
		   }
	}

	this.init = function(){
		var o=this;
		var $form=this.$element;

		
		console.group("TgnForm");
		// al($form);
		// al(this.settings);

		if(!$form.is(".forminit")){

			
			$form.find(':input').each(function(){
				if($(this).closest('.form-group').is('.with-feedback')){
					$(this).data('had-feedback',true);
				}
			});

			$form.find('.input-icon').on('click',function(e){
				// al('click icon');
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
	        
	    	// al(this.settings);
	    	if(this.settings.validator || this.settings.optionalvalidator){
				
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
						// al("SUBMITTING", o.validated);
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
				
	           

				//si el formulario tiene confirmacion y el botón no tiene definida confirmacion o si la tiene definida con algun valor no false
	            if(o.settings.confirm && ( ( typeof btn.data('confirm') == 'undefined' ) || btn.data('confirm')) ){

					//al("is confirm");
					TgnModal.confirm(o.settings.confirm, function(modal){
						//al("callback");
						o.doSubmitConfirm(btn);
						modal.hide();
						
					});

				//si el boton tiene confirmacion
				}else if(btn.data('confirm')){
					//al("is confirm");
					TgnModal.confirm(btn.data('confirm'), function(modal){
						//al("callback");
						o.doSubmitConfirm(btn);
						modal.hide();
						
					});

					
				}else{
					o.doSubmitConfirm(btn);
				}
	        });

		     //focus groups
		     $form.on('focus',':input:not(.btn):not(button)',function(e){
				if(!($(this).is(':checkbox') || $(this).is(':radio'))){
					var group=$(this).closest('.form-group');
					if(!group.is(".disabled"))
						group.addClass('focused');
				}
		     }).on('blur',':input:not(.btn):not(button)',function(){
				 
		     	var group=$(this).closest('.form-group');
		     	if(!group.is(".disabled"))
		     		group.removeClass('focused');
		     });
			

		}
		console.groupEnd();

	};

	

	this.validate = function(){
		// al("Validating Form...");
		var o = this;
		var $form=this.$element;
		//al($form);


		var data = $form.serializeArray();
		data._token= csrfToken();
        data.push({name:'class',value:this.settings.validator});
        data.push({name:'optional_class',value:this.settings.optionalvalidator});

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
                        if(campo.length==0) campo= $form.find("[name^='"+key+"']");//empieza por, para campos multiples []
                        var closestfather = campo.closest('.form-group');
                        var fathers = campo.parents('.form-group');
                        //al(campo);
                        //al(father);
                        campo.removeClass('is-invalid');
                        //campo.addClass('is-valid');
                        closestfather.removeClass('is-invalid');
                        if(!campo.data('had-feedback')) closestfather.removeClass('with-feedback');
                        closestfather.find('div[class*=-feedback]').html('');
                    });
					$form.trigger("tgnform:validate-success", {element:$form });
  	    
                    o.validated = true;
                    if(o.buton_submit){
                        o.runSubmit();//$form.submit();
                    }
                } else {
                	if(data.warnings){
						// alert("Hi ha warnigs");
						// al(data.warnings);
						var btn=$form.find("[type=submit]");
						var modaltxt="<ul>";
						$.each(data.warnings,function(key, data){
							modaltxt+="<li>"+data+"</li>";
						});
						modaltxt+="</ul>";
						//al("is confirm");
						TgnModal.confirm(modaltxt, function(modal){
							// al("callback");
							o.settings.optionalvalidator=null;
							o.doSubmitConfirm(btn);
							modal.hide();
							
						},{style:'warning'});
					}else if(data.errors){
						var campos_error = [];
						
						$.each(data.errors,function(key, data){
							if(key.includes('.')){
								key=key.split(".");
								key= key.shift() +'['+ key.join('][') + ']';
							
							}
							//al(key);
							var campo = $form.find("[name='"+key+"']");
							if(campo.length==0) campo= $form.find("[name^='"+key+"']");//empieza por, para campos multiples []
							
							var fathers = campo.parents('.form-group');
							var closestfather = campo.closest('.form-group');
							//campo.removeClass('is-valid');
							campo.addClass('is-invalid');
							closestfather.addClass('is-invalid').addClass('with-feedback');
							closestfather.find('div[class*=-feedback]').html(data[0]);
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
						var formFields=$form.serializeArray();

						$.each(formFields, function(i, field) {
							if (!field.name.startsWith('content_') && $.inArray(field.name, campos_error) === -1)
							{
								var campo = $form.find('[name="'+field.name+'"],[name="'+field.name+'[]"]');
								var closestfather = campo.closest('.form-group');
								var fathers = campo.parents('.form-group');
								campo.removeClass('is-invalid');
								closestfather.removeClass('is-invalid');
								if(!campo.data('had-feedback')) closestfather.removeClass('with-feedback');
								//campo.addClass('is-valid');

								closestfather.find('div[class*=-feedback]').html('');

								
							}
						});

						$form.trigger("tgnform:validate-error", {element:$form, errors: data.errors });
			
						TgnFlash.warning(___("strings.Form validation errors"));
						
						//scroll to element			
						$('html, body').scrollToElement($form);

						o.validated = false;
						o.buton_submit = false;
					}
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



