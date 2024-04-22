


$.widget( "ajtarragona.tgnSelectPicker", {

    options: {
        url : '',
        params: {},
        autoload : true,
        value: [],
        container: 'body',
        showDeselector : true,
        multiple: false,
        watch:false
    },

    isInit: false,

    _create: function() {
        var o=this;
        if(this.element.is('.native')) return;
        
        // al("creating tgnSelectPicker");
        
        this.options = $.extend({}, this.options, this.element.data()); 

        // this._startLoading();


        this.options.multiple = this.element.attr('multiple');
        
        if(this.options.multiple && !$.isArray(this.options.value)){
          tmp=[];
          tmp.push(this.options.value);
          this.options.value=tmp;
        }

        
       // al(this.options);
        

        if(this.element.closest(".modal").length>0){
            this.options.container = false;//"#"+this.element.closest(".modal").attr('id');
        }
        
        if(!this.isInit){
          this.isInit=true;

          this.element = this.element.selectpicker(this.options);
          this.element.addClass("selectinit");
          this._prepare();

        }else{
          this.refresh();
        }
        // this.element.on('change',function(){
        //   al('select changed', $(this).val());
        // });

    },


    setUrl: function( url ) {
      this.options.url = url;
      //this.reload();
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

    _makeOption: function( value, name, content ) {
      // al('_makeOption '+name,value );
        var o=this;
        var $option=$("<option/>");
        $option.val(value);
        $option.append(name);
        if(($.inArray(value, o.options.value)>=0) || ($.inArray(""+value, o.options.value)>=0) || $.inArray(parseInt(value), o.options.value)>=0 ) $option.attr("selected",true);
        if(content) $option.data("content",content);
        return $option;
    },

    _makeOptionDivider: function( ) {
        var $option=$("<option/>");
        $option.attr('data-divider',true);
        return $option;
        
        
    },

    addOptionGroup: function( label, options ) {
      // al('addOptionGroup',label);
      var o=this;
      var $group=$("<optgroup/>");
      $group.attr('label',label);
      for(var i in options){
        var option=options[i];
        if(option.divider){
          $option=o._makeOptionDivider();
        }else{
          $option=o._makeOption(option.value, option.name);
        }
        $group.append($option);
      }
      o.element.append($group);
    },
    
    addDivider: function( ) {
      // al('addDivider');
      var o=this;
      var $option=o._makeOptionDivider();
      o.element.append($option);
    },
    
    addOption: function( value, name, content ) {
        var o=this;
        var $option=o._makeOption(value, name, content);
       
        o.element.append($option);
    },
    

    removeOption: function( value ) {
      if(this.element.find('option[value="'+value+'"]').length>0){
        this.element.find('option[value="'+value+'"]').remove();
        this.refresh();
      }
    },



    _stopLoading: function( ) {
      //this.element.stopLoading();
      this.element.closest('.form-group').stopLoading();
    },
    
    _startLoading: function( ) {
      //this.element.startLoading();
      this.element.closest('.form-group').startLoading();
    },

    load: function(  ) {
       var o=this;
       o._startLoading();
      //  al("Loading Select from: "+o.getUrl());
       o.tmpVal=o.value();
       //o.value('');
       
       o.element.trigger("tgnselect:beforeload", { element: o.element }); 

       $.getJSON(o.getUrl(), function(data){
          // al("LOADED",o.element);
          o.element.trigger("tgnselect:load", {element:o.element, data:data});

          o.element.empty();
          
          if(data){
            // al(data);
            // al(o.options);
            for( var index in data){
            // $(data).each(function(index){
              var opt=data[index];
              // al(index, opt);
              if($.isArray(opt)){
                o.addOptionGroup(index, opt);
              }else{
                if(opt.divider){
                  o.addDivider();
                }else{
                  o.addOption(opt.value, opt.name);
                }
              }
            }
            // });
            o.refresh();
            if(o.options.value) o.value(o.options.value);
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

    disable: function( ) {
      this.element.addClass('disabled').prop('disabled',true);
      this.element.closest('.form-group').addClass('disabled');
      this.options.disabled=true;
      this._refreshDeselector();
    },

    enable: function( ) {
      this.element.removeClass('disabled').prop('disabled',false);
      this.element.closest('.form-group').removeClass('disabled');
      this.options.disabled=false;
      this._refreshDeselector();
    },

    refresh: function( argument ) {
        this._startLoading();
        this.element.selectpicker('refresh');
        this._refreshDeselector();
        this._stopLoading();
    },

    option: function( name,value ) {
        if (value === undefined) {
          return this.options[name];
        }else{
          this.options[name]=value;
        }
    },

    value : function( argument ){

       if (argument === undefined) {
         //al("get value");
         return this.element.val();
       }else{
         //al("set value ");
         //al(argument);
         
         this._refreshDeselector();

         this.element.selectpicker('val', argument);
       }
    },

    _refreshDeselector : function(){
        
        if(this.deselector){
    
          if(this.options.disabled){
            this.deselector.attr('hidden',true);
          }else if($.isArray(this.element.val()) && this.element.val().length==0){
            this.deselector.attr('hidden',true);
          }else if(!this.element.val()) {
            this.deselector.attr('hidden',true);
          }else {
            this.deselector.attr('hidden',false);
          }
        }
    },

    clear : function(){
       var o=this;
       if(o.options.multiple){
            // o.element.selectpicker('val', '');

            o.element.selectpicker('deselectAll');
       }else{
         o.element.selectpicker('val', '');
         o.element.trigger('change');
       }
       o._refreshDeselector();
    },

    destroy : function(){
      var o=this;
       o.element.selectpicker('destroy');
    },

    _createDeselector: function( argument ) {
      var o=this;

      o.deselector=$("<div class='deselect-btn' hidden>&times;</div>");

      o.deselector.on('click',function(e){
         if(!o.element.prop('disabled')){
           e.preventDefault();
           e.stopPropagation();
           
           o.clear();
           //o.element.trigger( "tgnselect:change", {element: o.element });

          // o.element.trigger( "change" );
           
        }
      });
      o.button.append(o.deselector);
    },


    _prepare: function( argument ) {
        
       //al("_prepare call");

       var o=this;

       // if(this.options.watch){
       //    $(this.options.watch).on('tgnselect:change',function(e,data){

       //    });

       // }

       this.element.on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
          //al("change");
          $(this).trigger( "tgnselect:change", {element: $(this), clickedIndex:clickedIndex, isSelected:isSelected, previousValue:previousValue });
          o._refreshDeselector();
          // $(this).trigger( "change" );
       });


       //cuando se inicializa el select picker
       this.element.on('loaded.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            
            o.container = $(this).closest('.bootstrap-select');
            o.container.wrap($("<div class='selectpicker-wrapper' wire:ignore/>"));
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
            // $(this).trigger( "tgnselect:change", {element: $(this)});
          

       });


       

          
    }

});
