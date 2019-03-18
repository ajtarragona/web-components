var Bloodhound = require('bloodhound-js');
var Typeahead = require('typeahead');

$.widget( "ajtarragona.tgnAutocomplete", {

    options: {
        url : '',
        params: {},
        value: [],
        showDeselector : true,
        multiple:false,
        hint: true,
	    highlight: true,
	    minLength: 1,
	    savevalue:false,
	    saved:'name',
	    showvalue:false,
	    limit:15,
	    disabled: false,
    },

    isInit: false,	
    hidden:false,
    datasource:false,

    _create: function() {
		var o=this;
     	
     	al("creating tgnAutocomplete()");
     	this.options = $.extend({}, this.options, this.element.data()); 

		this.options.inputname=this.element.attr('name').replaceAll('[','_').replaceAll(']','_');

        this.options.query='';
        
        //this.addParam('lala','12');
        this.addParam('term','WILDCARD');
		
		if(this.options.savevalue) this.options.saved='value';
		if(this.options.disabled) this.element.prop('disabled');
        //al(this.getUrl());
		//al(this.options);

        this.datasource = new Bloodhound({
          initialize: false,
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name','value'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          identify: function(obj) { return obj.value; },
          //prefetch: settings.url,
          remote: {
            url: this.getUrl(),
            //wildcard: '%QUERY'
            prepare: function (query, settings) {
	            var url=o.getUrl();
	           // al(url);
	            if(o.options.multiple)
	            	return url.replace('WILDCARD',o.input.val());
	            else 
	            	return url.replace('WILDCARD',o.element.val());
	        }
          }
        });
        


        //al(this.options);

        if(this.options.multiple){
       		this._initMultiple();
        }else{
       		this._initSingle();
        }
        
    },


    _addOption : function(value,name){
    	if(this.options.multiple){
    		this.element.tagsinput('add', {value: value , name: name });
    	}
    },

    _initMultiple : function(){
     	var o=this;
     	
    	this.element.tagsinput({
          itemValue: this.options.saved,
          itemText: 'name',
          freeInput: false,
          hint: true,
          highlight: true,
          minLength: this.options.minLength,
          delimiter:'##',
          typeaheadjs: {
            limit: this.options.limit,
            name: this.options.inputname,
            displayKey: 'name',
            source: this.datasource.ttAdapter(),
            minLength: this.options.minLength
          }
    	});

    	this.input=this.element.tagsinput('input');
    	//al(this.input);

    	this.input.bind('typeahead:asyncrequest', function(ev, suggestion) {
	        o._startLoading();
    	});

      	this.input.bind('typeahead:asyncreceive', function(ev, suggestion) {
        	o._stopLoading();
      	});
      	
      	this.element.on('itemAdded', function(event) {
		  o.element.trigger("tgnautocomplete:change", {element:o.element, item: event.item });
	      o.element.trigger("tgnautocomplete:select", {element:o.element, item: event.item});

		});

		this.element.on('itemRemoved', function(event) {
		  o.element.trigger("tgnautocomplete:change", {element:o.element, item: event.item });
	      o.element.trigger("tgnautocomplete:select", {element:o.element, item: event.item});
		});

      	this._setDefaultValue();

      	
    },

    _setDefaultValue : function(){
    	//init default value
        if(this.element.val()){
          var names=this.element.val().split("##");
          var vals=names;
         // al($input.data('value'));
          if(this.options.saved == 'value') vals=this.options.value;
          
          for(var index in names){
             this._addOption(vals[index], names[index]);
            
          }

        }
    },

    _initSingle : function(){
		var o=this;

        this.element.wrap($('<div class="form-row"/>'));
          
        if(this.options.savevalue){
            this.hidden=$('<input/>');
            this.element.before(this.hidden);
            this.hidden.val(this.options.value);

            this.element.attr('name','content_'+this.options.inputname);
            this.hidden.attr('type','hidden').attr('name',this.options.inputname).attr('id',this.options.inputname+'_code');
            
            if(this.options.showvalue) {
               o.hidden.attr('type','text').addClass("form-control tt-value").attr('readonly',true).wrap($('<div class="col-2"/>'));
               o.element.wrap($('<div class="col-10"/>'));
            }

            this.element.on('keyup', function(e) {
              if($(this).val()=="") o.hidden.val("");
            });

            this.element.bind('typeahead:select', function(ev, suggestion) {
              o.hidden.val(suggestion.value);
            });
            this.element.bind('typeahead:autocomplete', function(ev, suggestion) {
              o.hidden.val(suggestion.value);
            });



        }


        this.element.on('focus',function(e){
            $(this).closest('.form-group.outlined').addClass('focused');
        });

        this.element.on('blur',function(e){
            $(this).closest('.form-group.outlined').removeClass('focused');
        });


          
        this.element.typeahead(
       		this.options,
       		{
              limit: this.options.limit, //10 no va
              name: this.options.inputname,
              displayKey: 'name',
              //display: 'name',
              source: this.datasource.ttAdapter()
    		}
        );

        this._createDeselector();

          
        this.element.bind('typeahead:asyncrequest', function(ev, suggestion) {
            o._startLoading();
        });

        this.element.bind('typeahead:asyncreceive', function(ev, suggestion) {
           o._stopLoading();
        });

        
        //callback
        this.element.bind('typeahead:select', function(ev, suggestion) {
          o.element.trigger("tgnautocomplete:change", {element:o.element, item: suggestion });
	      o.element.trigger("tgnautocomplete:select", {element:o.element, item:suggestion});
            //executeCallback( $input.data('on-select'), {target: ev.currentTarget, data:suggestion});
        });
        
    },

    setUrl: function( url ) {
      this.options.url = url;
    },


    addParam( name, value){
      this.options.params[name]= value;
    },

    setParams( params){
      this.options.params=params;
      this.addParam('term','WILDCARD');
		
    },
    
    getUrl: function(  ) {
      var url= buildUrl(this.options.url, this.options.params);
      return url;
    },



    _stopLoading: function( ) {
      this.element.parent().stopLoading();
    },
    
    _startLoading: function( ) {
      this.element.parent().startLoading();
    },

   
    value : function( argument ){
    

       if (argument === undefined) {
       		//al("getValue");
       		if(this.options.multiple){
       			return this.element.val().split(',');
       		}else{
       			if(this.options.savevalue) return this.hidden.val();
       			else return this.element.val();
       		}
       }else{
	    	//al("setValue");
			//al(argument);
	    	if(this.options.savevalue){
	          this.hidden.val(argument);
	        }
	        this.element.val(argument);
	        this.element.trigger( "typeahead:select", [argument]);	
	        this.element.trigger("tgnautocomplete:change", {element:this.element});
            
       }
    },


    _createDeselector: function( argument ) {
        var o=this;
        if(!this.options.disabled){
          this.deselector=$("<div class='deselect-btn'>&times;</div>");
          this.element.after(this.deselector);
          this.deselector.on('click',function(e){
          	 e.preventDefault();
             e.stopPropagation();
             o.value('');
          });
        }
    },
});





