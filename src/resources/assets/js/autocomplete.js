var Bloodhound = require('bloodhound-js');
var Typeahead = require('typeahead');

$.widget( "ajtarragona.tgnAutocomplete", {

    options: {
        url : '',
        params: {},
        value: [],
        showDeselector : true,
        multiple:false,
        hint: false,
  	    highlight: true,
  	    minLength: 1,
  	    savevalue:false,
  	    saved:'name',
  	    showvalue:false,
  	    limit:10,
        disabled: false,
        
    },

    isInit: false,	
    hidden:false,
    datasource:false,

    templates: {
      empty: [
          "<div class='p-3 text-muted'>",
          ___("strings.No Items Found"),
          "</div>"
      ].join("\n"),

      suggestion: function(data){
        if(data.suggestion){
          return "<div class='tt-suggestion tt-selectable'>"+data.suggestion+"</div>";
        }else{
          return "<div class='tt-suggestion tt-selectable'>"+data.name+"</div>";
        }
      }
      // pending : [
      //     "<div class='p-3 text-muted'>",
      //     ___("strings.Searching for items"),
      //     "</div>"
      // ].join("\n")
    },
    
    _create: function() {
		  var o=this;
     	
     	//al("creating tgnAutocomplete()");
      //al(this.element);

      this.options = $.extend({}, this.options, this.element.data()); 
     //al(this.options);
		  this.options.inputname=this.element.attr('name').replaceAll('[','_').replaceAll(']','_');

      this.options.query='';
        
      //this.addParam('lala','12');
      this.addParam('term','WILDCARD');
		
		  if(this.options.savevalue) this.options.saved='value';
		  if(this.options.disabled){
        // al("isDisabled");
        this.element.prop('disabled',true);
      }
        //al(this.getUrl());
		  //al(this.options);
      // this.element.on('change',function(){
      //   al('autoselect changed', o.value());
      // });

      this.datasource = new Bloodhound({
        initialize: false,
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name','value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        identify: function(obj) { 
          return obj.value;
        },
        //prefetch: settings.url,
        remote: {
          url: o.getUrl(),
          //wildcard: '%QUERY'
          prepare: function (query, settings) {
            
            var url=o.getUrl();
           // al(url);
            if(o.options.multiple){
            	return url.replace('WILDCARD',encodeURIComponent(query));
            }else {
              return url.replace('WILDCARD',encodeURIComponent(query));
            }

            // al(query);
            // al(url);
            // return $.extend(settings, {
            //   url: url,
              // error: function(jqxhr, textStatus, errorThrown) {
              //   al("ERROR autocomplete") ;
              //   o._stopLoading();
              //   TgnFlash.warning(___("strings.Error"));
					

              // },
              // complete : function(jqxhr, textStatus) {
              //   al("COMPLETE autocomplete") ;
              //   o._stopLoading();
                
              // },
              // success: function(data, textStatus, jqxhr) {
              //   al("SUCCESS  autocomplete") ;
              //   al(data);
              //   o._stopLoading();
              // }
            // });
          },
          filter: function(parsedResponse){
            o._stopLoading();
            return parsedResponse;
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


    addOption : function(value,name){
    	if(this.options.multiple){
    		this.element.tagsinput('add', {value: value , name: name });
    	}
    },

    _initMultiple : function(){
     	var o=this;
     	this.element.addClass("autocompleteinit");
      
      this.element.tagsinput({
          itemValue: this.options.saved,
          itemText: 'name',
          hint: true,
          highlight: true,
          delimiter:'##',
          typeaheadjs: [
            {
              minLength: this.options.minLength
            },
            {
              limit: this.options.limit,
              name: this.options.inputname,
              displayKey: 'name',
              source: this.datasource.ttAdapter(),
              templates: this.templates
              
            }
          ]
    	});

    	this.input=this.element.tagsinput('input');
    	//al(this.input);

    	this.input.bind('typeahead:asyncrequest', function(ev, suggestion) {
	        o._startLoading();
      });
      
      this.input.bind('typeahead:asynccancel', function(ev, suggestion) {
        o._stopLoading();
    });

    	this.input.bind('typeahead:asyncreceive', function(ev, suggestion) {
        // al("RECEIVE multi");
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
        //al('_setDefaultValue');
        if(this.options.valueview){
          //this._startLoading();
          if(this.options.multiple){
            
            var names=this.options.valueview.split("##");
            //al(names);
            var vals=names;
           // al($input.data('value'));
            if(this.options.saved == 'value') vals=this.options.value;
            if(!$.isArray(vals)) vals=[vals];

            for(var index in names){
               this.addOption(vals[index], names[index]);
              
            }
          }else{
             this.value({value:this.options.value,name:this.options.valueview});
          }
         // this._stopLoading();

        }
    },

    _initSingle : function(){
		    var o=this;

        this.input=this.element;
        this.element.wrap($('<div class="input-group"/>'));
        this.element.addClass("autocompleteinit");
          
        if(this.options.savevalue){
            this.hidden=$('<input/>');
            this.element.before(this.hidden);
            this.hidden.val(this.options.value);

            this.hidden.attr('type','hidden').addClass('autocomplete').attr('name',this.element.attr('name')).attr('id',this.options.inputname+'_code');
            this.element.attr('name','content_'+this.options.inputname);
            
            if(this.options.showvalue) {
               o.hidden.attr('type','text').addClass("form-control tt-value").attr('readonly',true).wrap($('<div class="input-group-prepend " style="width:60px"/>'));
               o.element.wrap($('<div class="flex-grow-1"/>'));
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
            o._stopLoading();
        });

        this.element.on('blur',function(e){
            $(this).closest('.form-group.outlined').removeClass('focused');
        });


        var args={
          limit: this.options.limit, //10 no va
          name: this.options.inputname,
          displayKey: 'name',
          //display: 'name',
          source: this.datasource.ttAdapter(),
          templates: this.templates,
       };

        // al('init typeahead', this.options);
        // al(args);
        this.element.typeahead(
       		this.options,
       		args
        );

        this._createDeselector();
        this._setDefaultValue();
        this._refreshDeselector();
          
        this.element.bind('typeahead:asyncrequest', function(ev, suggestion) {
            o._startLoading();
        });

        this.element.bind('typeahead:asynccancel', function(ev, suggestion) {
            o._stopLoading();
        });
        this.element.bind('typeahead:asyncreceive', function(ev, suggestion) {
          // al("RECEIVE single");
           o._stopLoading();
        });

        
        //callback
        this.element.bind('typeahead:select', function(ev, suggestion) {
          o.element.trigger("tgnautocomplete:change", {element:o.element, item: suggestion });
	        o.element.trigger("tgnautocomplete:select", {element:o.element, item:suggestion});
          o._refreshDeselector();
            //executeCallback( $input.data('on-select'), {target: ev.currentTarget, data:suggestion});
        });
        
    },

    disable: function( ) {
      this.options.disabled=true;
     
      if(this.options.multiple){
        this.input.addClass('disabled').prop('disabled',true);
        this.element.addClass('disabled').prop('disabled',true);
      }else{
        this.element.addClass('disabled').prop('disabled',true);

      }
        
      
      this.element.closest('.form-group').addClass('disabled');
      this._refreshDeselector();
      
    },

    enable: function( ) {
      this.options.disabled=false;
      if(this.options.multiple){
        this.input.removeClass('disabled').prop('disabled',false);
        this.element.removeClass('disabled').prop('disabled',false);
      }else{
        this.element.removeClass('disabled').prop('disabled',false);

      }
      
      this.input.closest('.form-group').removeClass('disabled');
      this._refreshDeselector();
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
      //this.element.stopLoading();
      this.element.closest('.form-group').stopLoading();
    },
    
    _startLoading: function( ) {
      //this.element.startLoading();
      this.element.closest('.form-group').startLoading();
      
    },

    clear : function(){
       this.value({value:'',name:''})
    },
   
    valueview : function(  ){
    // console.log('valueview',this.options.multiple ?'multi':'single', this.element);
      if(this.options.multiple){
        var ids=this.value();
        var tags=this.element.siblings('.bootstrap-tagsinput').find('.tag');
        let ret=[];
        
        tags.each(function(i){
          ret.push({
            id: ids[i],
            value: $(this).html().replace('<span data-role="remove"></span>','')
          });
        });
        // al(ret);
        return ret;
        
      }else{
        let value=(this.options.savevalue) ? this.hidden.val(): this.element.val();
        let ret=null;
        if(value){
           ret={
            id: value,
            value: this.element.val()
          };
        }
        
        // al(ret);
        return ret;
        
      }
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
          var value=argument;
          var name=argument;
          //al(argument.hasOwnProperty('value'));
          if(argument.hasOwnProperty('value')){
            value=argument.value;
            name=argument.name;
          }
           
         

	    	  if(this.options.savevalue){
	          this.hidden.val(value);
          }

          if(this.options.multiple){
            this.element.val(name);
          }else{
            this.element.typeahead('val', name);
          }
                    
          this._refreshDeselector();
          //al(this.element);
	        // this.element.trigger("typeahead:select", [argument]);	
	        this.element.trigger("tgnautocomplete:change", {element:this.element, item: argument});
             
       }
    },

    _refreshDeselector : function(){
        
        if(this.options.multiple) return;
        
        if(this.value() && !this.options.disabled) 
          this.deselector.attr('hidden',false);
        else 
          this.deselector.attr('hidden',true);
    },

    _createDeselector: function( argument ) {
        var o=this;
        
        this.deselector=$("<div class='deselect-btn'>&times;</div>");
        this.element.after(this.deselector);

        if(!this.options.disabled){
          this.deselector.on('click',function(e){
             //al(o.input);
            //al(o.input.prop('disabled'));
          	 if(!o.options.disabled){
               e.preventDefault();
               e.stopPropagation();
               o.clear('');
              }
          });
        }else{
          // this.deselector.
        }
    },
});





