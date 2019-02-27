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
		target: false,
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
        	if($(o.settings.target).length>0){
        		var $target=$(o.settings.target);
        		var data = $form.serializeArray();
        		$form.startLoading();
        		$target.startLoading();
				//data._token= csrfToken();
        		 $.ajax({
		            url: $form.attr('action'),
		            type: $form.find('[name=_method]').val(),
		            data: $.param(data),
		            dataType: 'html',
		            success: function(data){
		            	$target.html(data).tgnInitAll().stopLoading();

		            	$form.stopLoading();
		        			
		            },
		            error: function(xhr){
		                $form.stopLoading();
		        		$target.html('').stopLoading();
						console.log(xhr.status);
		            }
		        });
        	}

        	return false;

        }else{
        	$form.submit();
		}
	}

	

	this.init = function(){
		var o=this;
		var $form=this.$element;

		
		al("init() tgnForm");
		//al(this.settings);

		if(!$form.is(".forminit")){

			


			$form.addClass('forminit');
	    	TGN_FORMS.push(this);
	    	//al(this.settings);

	    	if (this.settings.autofocus) {
	           if($form.find('input:enabled:visible:first').length>0)  $form.find('input:enabled:visible:first').get(0).focus();
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
			

		     $form.find("[type=submit]").on('click',function(e){
	            e.preventDefault();
	           	var btn=$(this);

	            function doSubmit(){
	            	o.buton_submit = btn;
	            	
	            	if(o.settings.validator){
	            		o.validate();
	           		}else {
	           			o.runSubmit();
	           		}
	            }

	            if(o.settings.confirm){
					//al("is confirm");

					TgnModal.confirm(o.settings.confirm, function(modal){
						//al("callback");
						doSubmit();
						modal.hide();
						
					});

					
				}else{
					doSubmit();
				}
	        });

		     //focus groups
		     $form.on('focus',':input,.bootstrap-select .dropdown-toggle',function(){
		     	//al("focused");
		     	var group=$(this).closest('.form-group');
		     	if(!group.is(".disabled"))
		     		group.addClass('focused');
		     }).on('blur',':input,.bootstrap-select .dropdown-toggle',function(){
		     	var group=$(this).closest('.form-group');
		     	if(!group.is(".disabled"))
		     		group.removeClass('focused');
		     });
			

		}


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
                        father.addClass('is-invalid');
                        father.find('div[class*=-feedback]').html(data[0]);
                        campos_error.push(key);

                        if(campo.closest('.tab-pane').length>0){
                        	//al("EN TAB");
                        	var tabpane=campo.closest('.tab-pane');

                        	if(!tabpane.is(".active")){
                        		var tab=$('.nav-link[href="#'+tabpane.attr('id')+'"]');
                        		al(tab);

                        		tab.addClass("anim bounce");
                        		tab.on('click',function(){
                        			$(this).removeClass('anim').removeClass('bounce');
                        		});
                        	}
                        }
                    });
                    $.each($form.serializeArray(), function(i, field) {
                    	if ($.inArray(field.name, campos_error) === -1)
                        {
                            var campo = $form.find("[name='"+field.name+"']");
                            var father = campo.closest('.form-group');
                            campo.removeClass('is-invalid');
                            father.removeClass('is-invalid');
                            //campo.addClass('is-valid');

                            father.find('div[class*=-feedback]').html('');

                            
                        }
                    });
                    TgnFlash.warning(__("Hi ha errors de validació al formulari"));
								
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



