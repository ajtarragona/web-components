


$.widget( "ajtarragona.tgnSelectPicker", {

    options: {
        url : '',
        params: {},
        autoload : true,
        value: [],
        container: 'body',
        showDeselector : true,
        multiple:false,
    },

    isInit: false,

    _create: function() {
        var o=this;
        al("creating tgnSelectPicker()");
        
        this.options = $.extend({}, this.options, this.element.data()); 

        this._startLoading();


        this.options.multiple = this.element.attr('multiple');
        
        if(this.options.multiple && !$.isArray(this.options.value)){
          tmp=[];
          tmp.push(this.options.value);
          this.options.value=tmp;
        }

        
        //al(this.options);
        

        if(this.element.closest(".modal").length>0){
          this.options.container = '.modal';
        }
        
        if(!this.isInit){
          this.isInit=true;

          this.element = this.element.selectpicker(this.options);
          this._prepare();

        }else{
          this.refresh();
        }


    },


    setUrl: function( url ) {
      this.options.url = url;
      this.reload();
    },


    addParam( name, value){
      //al("addParam "+name+"="+value);
      this.options.params[name]= value;
    },

    setParams( params){
      this.options.params=params;
    },
    
    getUrl: function(  ) {
      // al("getURL");
      // al(this.options.url);
      // al(this.options.params);
      var url= buildUrl(this.options.url, this.options.params);
      //al("URL:"+url);
      return url;
    },

    

    addOption: function( value, name, content ) {
        var o=this;
        var $option=$("<option/>");
        $option.val(value);
        $option.append(name);
        
        if(($.inArray(value, o.options.value)>=0) || ($.inArray(""+value, o.options.value)>=0) || $.inArray(parseInt(value), o.options.value)>=0 ) $option.attr("selected",true);
        if(content) $option.data("content",content);
        
        o.element.append($option);
        
    },

    removeOption: function( value ) {
      if(this.element.find('option[value="'+value+'"]').length>0){
        this.element.find('option[value="'+value+'"]').remove();
        this.refresh();
      }
    },



    _stopLoading: function( ) {
      this.element.stopLoading();
      this.container.stopLoading();
    },
    
    _startLoading: function( ) {
      this.element.startLoading();
      
    },

    load: function(  ) {
       var o=this;
       o._startLoading();
       al("Loading Select from: "+o.getUrl());

       $.getJSON(o.getUrl(), function(data){
          //al("LOADED");
          o.element.trigger("tgnselect:loaded", {element:o.element, data:data});

          o.element.empty();
          
          if(data){
            $(data).each(function(){
              o.addOption(this.value,this.name);
            });
            o.refresh();
            o.value(o.options.value);
            o.element.trigger( "tgnselect:success", { element: o.element, data:data} );
              
          }else{
            o.element.trigger("tgnselect:error", { element: o.element,  data:data});
            
          }

          o._stopLoading();

        }).fail(function() {
            o._stopLoading();
            o.element.trigger("tgnselect:error", { element: o.element,  data:null});
        })

      
       
    },

    refresh: function( argument ) {
        this._startLoading();
        this.element.selectpicker('refresh');
        this._stopLoading();
    },

    value : function( argument ){

       if (argument === undefined) {
         //al("get value");
         return this.element.val();
       }else{
         //al("set value ");
         //al(argument);
         this.element.selectpicker('val', argument);
       }
    },


    _createDeselector: function( argument ) {
      var o=this;

      o.deselector=$("<div class='deselect-btn'>&times;</div>");

      o.deselector.on('click',function(e){
         if(!$(this).prop('disabled')){
           e.preventDefault();
           e.stopPropagation();
           
           if(o.options.multiple){
              o.element.selectpicker('deselectAll');

           }else{
              o.element.selectpicker('val', false);
           }

           o.element.trigger( "change" );
           
        }
      });
      o.button.append(o.deselector);
    },


    _prepare: function( argument ) {
        
       //al("_prepare call");

       var o=this;

       //cuando se inicializa el select picker
       this.element.on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
          $(this).trigger( "tgnselect:changed", {element: $(this), clickedIndex:clickedIndex, isSelected:isSelected, previousValue:previousValue });
       });


       this.element.on('loaded.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            
            o.container = $(this).closest('.bootstrap-select');
            o.container.wrap($("<div class='selectpicker-wrapper'/>"));
            o.wrapper=o.container.parent();
            o.button = $(this).siblings('.dropdown-toggle');
            o.dropdown = $(this).siblings('.dropdown-menu');
            
            
            o.button.on('focus',function(){
              $(this).closest('.form-group').addClass("focused");
            }); 

            o.button.on('blur',function(){
                if(!o.container.is('.show')) {
                  $(this).closest('.form-group').removeClass("focused");
                }
            });


            o.element.on('show.bs.select', function(e, clickedIndex, isSelected, previousValue){
              $(this).closest('.form-group').addClass("focused");
            });

            o.element.on('hidden.bs.select', function(e, clickedIndex, isSelected, previousValue){
              $(this).closest('.form-group').removeClass("focused");
            });

            o.container.siblings('label').on('click',function(e){
               e.preventDefault();
               e.stopPropagation();
               //$(this).blur();
               //$(this).closest('.form-group').addClass("focused");
       
               o.element.selectpicker('open');
               o.button.click();
               o.dropdown.find(".inner").focus();

       
            }); 

            
            if(o.options.showDeselector){
                o._createDeselector();
            }
            
            if(o.options.url && o.options.autoload){
              o.load();
            }else{
              o.refresh();
            }
            
            //al("INITIALIZED");
            $(this).trigger( "tgnselect:init", {element: $(this) });

       });


       

          
    }

});
