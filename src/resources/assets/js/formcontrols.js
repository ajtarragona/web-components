$.fn.initPopover = function(options){

   return this.each(function(){
     var $element=$(this);

      $element.popover({
        html: true
      })


   });
 }


$.fn.initConfirm = function(options){

   return this.each(function(){
     var $element=$(this);

      var defaults={
        title: ___("strings.Are you sure?") ,
        rootSelector: '.btn-remove' ,
        //placement:'left',
        popout:true,
        singleton:true,
        btnOkLabel:'&nbsp;'+___('strings.Yes'),
        btnCancelLabel:'&nbsp;'+___('strings.No'),
        btnOkIconClass:'fa fa-check',
        btnCancelIconClass:'fa fa-times'
      };  
          
      
      if($element.data()) defaults = $.extend(true, {}, defaults, $element.data()); 
      if($element.data('confirm')) defaults.title=$element.data('confirm');
      if(options) defaults = $.extend({}, defaults, options); 

      $element.confirmation(defaults);

   });
 }

 $.fn.initDatePicker = function(){
   return this.each(function(){
      var $input=$(this);

      $input.wrap($("<div class='date-container'/>"));
      var args={
          locale: "es",
          time_24hr:true
      };
     
      if($input.data()) args = $.extend(true, {}, args, $input.data()); 

      var format="d/m/Y";
      if($input.data('date-format')) format=$input.data('date-format');

      //al(format);
      args.altFormat=format;

      if(format.includes("H") || format.includes("i")  ){
        args.enableTime=true;
        args.altFormat="d/m/Y H:i";
      }

      if(!( format.includes("d") || format.includes("m")|| format.includes("Y")  ) ){
        args.noCalendar=true;
        args.altFormat="H:i";
      }
      
      //args.altFormat=format;
      args.altInput=true;
      //al(args);
      var fp=$input.flatpickr(args);
      if(!$input.prop('disabled')){
	      var $deselector=$("<div class='deselect-btn'>&times;</div>");
          $deselector.data('input',fp);
	        $deselector.on('click',function(e){
	          e.preventDefault();
	          e.stopPropagation();
	          // var myInput =  $(this).siblings('.flatpickr-input');
	          var fp = $(this).data('input');//.flatpickr(myInput[0], args);  // flatpickr
	          fp.clear();

	        });
	        $input.after($deselector);
	  }
    });
}


$.fn.initInputMask = function(){
   return this.each(function(){
      var $input=$(this);
      if($input.data("mascara")){
        $input.mask($input.data("mascara"), {
          translation: {
            placeholder: $input.data("mascara")
          }
        });
      }
   });
}




$.fn.initNumberInput = function (){
    return this.each(function(){
        var $input=$(this);
        al("initNumberInput");
        
        var defaults={
          verticalbuttons: true,
          boostat: 5,
          min:-9999999,
          max:9999999,
          stepinterval: 50,
          maxboostedstep: 10,
          buttondown_class: 'btn btn-light btn-xs',
          buttonup_class: 'btn btn-light btn-xs'
        };  
          

        defaults = $.extend({}, defaults, $input.data()); 
        if(defaults.hasOwnProperty('decimals') && ! defaults.hasOwnProperty('step')){
          defaults.step= 1/Math.pow(10, defaults.decimals);
        }
        //al(defaults);

        $input.TouchSpin(defaults);
       
    });
  }

$.fn.initIconPicker = function (){


    return this.each(function(){

        function setIcon(input){
          input.siblings().find('.icon-input-addon i').attr('class',input.val());
        }

        var $input=$(this);
        if($input.is(".iconpicker-init")) return;
        
        
        $input.addClass(".iconpicker-init");
        al("initIconPicker");
        
       
         
        //generate html
        var $ig=$("<div class='input-group iconpicker-container'/>");
        $input.wrap($ig);


        var addon="";
        
         
        addon+="<div class='input-group-append'><span class='input-group-text icon-input-addon'><i></i></span></div>";
        if(!$input.prop('disabled')){
          addon += "<div class='input-group-append'><a href='#' class='deselect-btn input-group-text pl-0'>&times;</a></div>";
        }

        $input.after($(addon));



       
        var defaults={
          hideOnSelect: true,
          inputSearch : true
 
        };  
        defaults = $.extend({}, defaults, $input.data()); 
        
       


        //al(defaults);
        setIcon($input);
        $input.iconpicker(defaults);

        if(!$input.val()) $input.parent().find('.deselect-btn').prop('hidden',true);
        
        //events
        $input.parent().find('.deselect-btn').on('click',function(e){
            e.preventDefault();
            e.stopPropagation();
            $input.val('');
            setIcon($input);
            // al('trigger change');
            $input.trigger('change');
            
            $(this).prop('hidden',true);
        });


        $input.on('iconpickerSelected', function(event){
          //  al("Icon selected");
           var input=$(event.currentTarget);
           input.parent().find('.deselect-btn').prop('hidden',false);
           setIcon(input);
          //  al('trigger change');
           input.trigger('change');
           
        });

        // $input.on('change',function(){
        //   al('icon changed', $(this).val());
        // });
       
    });
  }


$.fn.initColorPicker = function (){
    return this.each(function(){
        var $input=$(this);
        if($input.is(".colorpicker-init")) return;
        
        
        $input.addClass(".colorpicker-init");
        al("initColorPicker");
        
        //generate html
        var $ig=$("<div class='input-group'/>");
        $input.wrap($ig);
       
        var addon="";
        
        addon+="<div class='input-group-append'><span class='input-group-text colorpicker-input-addon'><i></i></span></div>";
        if(!$input.prop('disabled')){
          addon += "<div class='input-group-append'><a href='#' class='deselect-btn input-group-text pl-0'>&times;</a></div>";
        }
         
        $input.after($(addon));



       
          
        var defaults={}; 
        
        defaults = $.extend({}, defaults, $input.data()); 
        
        if(defaults.swatches){
          defaults.extensions= [
            {
              name: 'swatches', // extension name to load
              options: { // extension options
                colors: defaults.swatches,
                namesAsValues: true
              }
            }
          ];
        }
 //       al(defaults);
        $input.parent().find('.deselect-btn').on('click',function(e){
            e.preventDefault();
            e.stopPropagation();
            //al($input.colorpicker('getValue'));
            // al($(this).closest('.colorpicker-element'));
            $(this).closest('.colorpicker-element').colorpicker('setValue','');
            $(this).closest('.colorpicker-element').find('.colorpicker-input-addon i').attr('style','');
            $input.val('');
            $input.trigger('change');
           
            // input.trigger('change');
            //$input.colorpicker('update');
            
        });
        $input.parent().colorpicker(defaults);
       
    });
  }


import Tribute from "tributejs";

$.fn.initAutomention = function (){
    

    return this.each(function(){
        
        var $input=$(this);
        al("initAutomention");
        
        if($input.is(".init-automention")) return;
        $input.addClass('init-automention');
        


        var defaults={
          trigger: '@',
          requireLeadingSpace: false,
          pre : '<span class="d-inline-block bg-gray-400 px-1">@',
          post : '</span>',
          prekey : '@',
          postkey : '',
        };


        
        $input.attr('type','hidden');
        
        var $element=$("<div class='mentions-container'/>");
        $element.attr('placeholder',$input.attr('placeholder'));
        $input.after($element);
        
        if($input.attr('rows')){
          var rows=$input.attr('rows');
          $element.css('min-height', (rows*1.4)+"em");
        }

        

        var settings = $.extend({}, defaults, $input.data()); 
        


        // al(settings);

        

        var updateInput = function(){
          
          var nl='\n';
          if($input.is("input")) nl=" ";

          var content=$element.html();
          content=content.replace( new RegExp(mentionPrefix(), 'g'),settings.prekey);
          content=content.replace( new RegExp(mentionSuffix(), 'g') ,settings.postkey);
          content=content.replace( new RegExp('&nbsp;', 'g') ,' ');
          content=content.replace( new RegExp('<div>', 'g') ,nl);
          content=content.replace( new RegExp('</div>', 'g') ,'');
          
          content=content.replace( new RegExp('<br>', 'g') ,nl);

          // al("keyup:",content);
          $input.val(content);
          
          // $input.val($(this).text());
          //al($(this));
          //al($(this).text());
          // al('Original event that triggered text replacement:', e.detail.event);
          // al('Matched item:', e.detail.item);
        };
        
        var setInitialValue = function(){
          var content=$input.val();
        
          // al(content);

          var pattern = new RegExp(''+settings.prekey+'[a-z0-9-_.]+'+settings.postkey+'','gi');
          // str.match(pattern);
          var matches = content.match(pattern);

          content=content.replace(pattern, function(x){
            // al(x);
            
            x=x.replace( new RegExp('^'+settings.prekey+'') , mentionPrefix());
            x=x.replace( new RegExp(''+settings.postkey+'$') , mentionSuffix() );

            return x;
          });

          // al(content);
          if($input.is("input"))
            content=content.replace( new RegExp('\n', 'g') ,' ');
          else
            content=content.replace( new RegExp('\n', 'g') ,'<br>');
          
          $element.html(content);
        };


        var remoteSearch = function(text, cb) {
          var URL = settings.url;

          

          var xhr = new XMLHttpRequest();
          xhr.onreadystatechange = function ()
          {
            if (xhr.readyState === 4) {
              if (xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                cb(data);
              } else if (xhr.status === 403) {
                cb([]);
              }
            }
          };
          xhr.open("GET", URL + '?q=' + text, true);
          xhr.send();
        }


        var mentionPrefix = function(){
          return '<span contenteditable="false">'+settings.pre;
        }

        var mentionSuffix = function(){
          return settings.post + '</span>';
        }


       

        settings.selectTemplate= function (item) {
            if (typeof item === 'undefined') return null;
            if (this.range.isContentEditable(this.current.element)) {
              return mentionPrefix() + item.original.value + mentionSuffix()+'</span>';
            }

            return '@' + item.original.value;
          
          
          // return settings.pre + item.original.value + settings.post;
        };


        
        
        settings.menuItemTemplate= function (item) {
              return item.string;
        }; 

        settings.values = function (text, cb) {
          remoteSearch(text, users => cb(users));
        };


        


        //al(settings);
        var tribute = new Tribute({
          collection: [
            settings
          ]
        });


        setInitialValue();

        // initval.replace(/{{/g, PRE);
        // initval=initval.replace(/}}/g, POST);
        
        tribute.attach($element[0]);

        $element.on('focus',function(e){
          $(this).closest('.form-group.outlined').addClass('focused');
        });
        
        $element.on('blur',function(e){
          $(this).closest('.form-group.outlined').removeClass('focused');
        });

        $element.on('keyup',function(e){
         
          updateInput();
          
        });
        
        $element.on('tribute-replaced', function (e) {
          updateInput();
          
        });

        //elimina el formato al pegar
        $element.on("paste", function(e){
          e.preventDefault();
          var pastedData = e.originalEvent.clipboardData.getData('text');
          document.execCommand("insertHTML", false, pastedData);

          
         
      } );


    });
}



$.fn.initConditional = function (){
   return this.each(function(){
        var o=this;
        var $container=$(this);
        al("initConditional");
        var defaults={
           op : '='
        };
        
        var settings = $.extend({}, defaults, $container.data()); 
        //al($(this).data('watch'));
        var $watched = $($(this).data('watch'));
        //al($watched);

        var expedtedval = $(this).data('value');

        var assertCondition = function(){
          switch(settings.op){
              case "=": return $watched.val()==expedtedval; break;
              case "!=": return $watched.val()!=expedtedval; break;
              case "<": return $watched.val()<expedtedval; break;
              case ">": return $watched.val()>expedtedval; break;
              case ">=": return $watched.val()>=expedtedval; break;
              case "<=": return $watched.val()<=expedtedval; break;
              case "contains": return $watched.val().includes(expedtedval); break;
              case "checked": return $watched.is(':checked'); break;
              case "unchecked": return !$watched.is(':checked'); break;
              case "in": 
                var val=isNaN($watched.val())?""+$watched.val():Number($watched.val());
                return ($.isArray(expedtedval) && $.inArray(val,expedtedval)>-1);
                break;
              default: return false;
          }
        }
        var toggleVisibility = function(){
            // al('toggleVisibility');
          
           if(assertCondition()) $container.show();
           else $container.hide();
        }



        if($watched.length>0){
          $watched.on('change',function(){
            toggleVisibility();
          });
          toggleVisibility();
        }

    });  
}



$.fn.initAjaxContainer = function (){
   var defaults={
       autoload : true,
       method : 'GET',
       delay:0,
    };

   return this.each(function(){
        var o=this;
        o.$container=$(this);
        al("initAjaxContainer");
        
        
        o.settings = $.extend({}, defaults, o.$container.data()); 
        // al(o.settings);
        o.$watched = $($(this).data('watch'));
        

        this.loadContainer = function(){

            var params={};
            
            if(o.settings.method!="GET"){
              params._token= csrfToken();
            }
            if(o.$watched.length>0){
              params[o.$watched.attr('name')]=o.$watched.val();
            }
            //al(params);
            o.$container.startLoading();
            //al('loadContainer ' + o.settings.url);
            //al(params);

            $.ajax({
                url: o.settings.url,
                type: o.settings.method,
                data: params,
                dataType: 'html',
                success: function(data){
                  var content=$(data);
                  o.$container.stopLoading();
                  o.$container.html(content);
                  o.$container.tgnInitAll();
                  executeCallback(o.settings.onsuccess,o.$container);  
                },
                error: function(xhr){
                  //al(xhr);
                  o.$container.stopLoading();
                  executeCallback(o.settings.onerror,o.$container);
                }
            });
        }

        if(o.$watched.length>0){
           o.$watched.on('tgnselect:change',function(){
              //al("watched changed");
              //al(this);
              o.loadContainer();
           });
        }

        if(o.settings.autoload){
          // al("DELAY:"+o.settings.delay);
          if(o.settings.delay){
            setTimeout(function(){
              o.loadContainer();
            },o.settings.delay)
          }else{
            o.loadContainer();
          }
        }
   });
 }


 

$.fn.initAjaxButton = function (){
  var defaults={
      method : 'GET',
      target : null,
      datatype:'json',
      toggle: false,
      url:false,
   };


  return this.each(function(){
    
    var o=this;
    o.$button=$(this);
    
    al("initAjaxButton");
    o.settings = $.extend({}, defaults, o.$button.data()); 
    if(!o.settings.url) o.settings.url=o.$button.attr('href');

    o.$button.on('click',function(e){
      e.preventDefault();
      if(o.settings.target){
        if(o.settings.toggle){
          if($(o.settings.target).data('loaded') == o.settings.url){
              $(o.settings.target).html('').removeClass('loaded').data('loaded',false);
              o.$button.removeClass('active');
          }else{
            o.load();
          }
        }else{
          o.load();
        }
      }else{
        o.load();
      }
    });


    o.load = function(){
      var params={};
      
      if(o.settings.method!="GET"){
        params._token= csrfToken();
      }
      o.$button.addClass('disabled').prop('disabled',true).startLoading();
      
      $('.ajax-button').each(function(i){
        if( $(this).data('target')== o.settings.target) $(this).removeClass('active');
      });

      if(o.settings.target){
        o.settings.datatype='html';
        $(o.settings.target).startLoading();
      }
      
      $.ajax({
        url: o.settings.url,
        type: o.settings.method,
        data: params,
        dataType: o.settings.datatype,
        success: function(data){
          if(o.settings.target){
            o.$button.addClass('active');
            $(o.settings.target).html(data).tgnInitAll().stopLoading().data('loaded',o.settings.url);
            
          }
          o.$button.removeClass('disabled').prop('disabled',false).stopLoading();
          executeCallback(o.settings.onsuccess,{data:data, button:o.$button});  
        },
        error: function(xhr){
          o.$button.removeClass('disabled').prop('disabled',false).stopLoading();
          executeCallback(o.settings.onerror,{data:xhr, button:o.$button});
        }
      });

    }
  });
}


import * as autosize from 'autosize';

$.fn.initAutoheight = function (){
   var defaults={
      
    };

   return this.each(function(){
        var o=this;
        o.$input=$(this);
        //al("initAutoheight");
        
        o.init =function(){
          var o=this;
          if(!o.$input.is('.autosize-loaded')){
            al("INIT AUTOSIZE");
            o.$input.addClass("autosize-loaded");
            autosize(o);
          }
        }

        var settings = $.extend({}, defaults, $(this).data()); 
         //al($(this));
         if($(this).parents('.tab-pane').length > 0){
           var tabpane = $(this).closest('.tab-pane');
          
            // al(tabpane);
            if(tabpane.is('.active')){
                o.init();
            }else{
                //inicializo al clicar en la pestaña
                $('.nav-link[href="#'+tabpane.attr('id')+'"]').on('click',function(e){
                    setTimeout(function(){
                      o.init();
                    },160);
                });
            }
         }else{
            //inicializo
            o.init();
         }  
  

   });
}




$.fn.initToggleClass = function (){
   var defaults={
      toggleclass: 'active',
      event : 'click',
      target : false
    };

   return this.each(function(){
        var o=this;
        o.$element=$(this);
        if(!o.$element.is(".toggle-init")){
          o.$element.addClass("toggle-init");
          al("initToggleClass");
        
          var settings = $.extend({}, defaults, $(this).data()); 
          if(settings.target){
             o.$element.on(settings.event,function(e){
                 $(settings.target).toggleClass(settings.toggleclass);
             });
          }
        }
         //al($(this));
   });
}



// import * as Quill from 'quill';
// import * as summernote from 'summernote';

$.fn.initTextEditor = function(){

  var advancedtoolbar=[
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize','fontname']],
      ['color', ['forecolor','backcolor']],
      ['para', ['ul', 'ol', 'paragraph','height','style','hr']],
      ['media', ['picture','video','link','table']],
      ['misc', ['fullscreen','codeview']]
  ];

  var simpletoolbar=[
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['color', ['forecolor','backcolor']],
      ['para', ['ul', 'ol', 'paragraph','style']],
      ['media', ['picture','link']]
     
  ];

  var lang=currentLanguage();
  if(lang=="es") lang="es-ES";
  if(lang=="ca") lang="ca-ES";
  else lang="en";

  var defaults={
     airMode: false,
     readOnly : false,
     toolbar : 'simple',
     height: '80px',
     hintUrl: false,
     hintTrigger: '{',
     dialogsInBody: true,
     lang: lang
      // modules: {
      //   toolbar: simpletoolbar,
        // 'image-tooltip': true,
        // 'link-tooltip': true  
      // }
  };

  return this.each(function(){
    var o=this;
    o.$element=$(this); 

    if(o.$element.is(".init-texteditor")) return;
    o.$element.addClass('init-texteditor');

    var id=o.$element.attr('id');
    if(!o.$element.attr('id')) o.$element.attr('id',_UUID());

    // al('initTextEditor',o.$element);

    var label=o.$element.closest('.form-group').find('> label[for='+id+']');
    label.on('click',function(e){
      if(!$(this).closest('.form-group').find('.note-editable').is('[contenteditable=false]')){
        o.$element.summernote('focus');
      }
    });
    
    var settings = $.extend({}, defaults, $(this).data()); 
    if(settings.toolbar=='advanced') settings.toolbar = advancedtoolbar;
    else settings.toolbar=simpletoolbar;
    
    if(settings.hintUrl){
      $.ajax({
        url: settings.hintUrl,
        async: false 
      }).then(function(data) {
        settings.hintData=data;
      });
  
  
      var regex = new RegExp("{(\\w*)$",'gi'); // settings.hintTrigger+'([\-+\w]+)$');
      
      settings.hint = {
          match: /{(\w*)$/,///{(\w*)$/,
          search: function (keyword, callback) {

            callback($.grep(settings.hintData, function (item) {
              return item.value.toLowerCase().indexOf(keyword.toLowerCase())  !== -1 || item.key.toLowerCase().indexOf(keyword.toLowerCase()) !== -1;
            }));
          },
          template: function (item) {
            return item.key;
            
          },
          content: function (item) {
            return '{{'+item.value+'}}';
          }
        };
    }
    
// al(settings);

    o.$element.summernote(settings);

  
    
    o.$element.on('summernote.blur',function(){
      // al("BLUR");
      $(this).closest('.form-group').removeClass('focused');
    });

    o.$element.on('summernote.focus',function(){
      $(this).closest('.form-group').addClass('focused');
    });

  
    if(settings.readOnly){
      o.$element.summernote('disable');
    }


    

   

  });
}






// $.fn.initCheckboxes = function (){
//   var defaults={
    
//   };

//   return this.each(function(){
//        var o=this;

//        o.$element=$(this);
       
//        if(o.$element.data('color')){
//         //  .find('.custom-control-label'):checked~.custom-control-label:before
//        }
//         //al($(this));
//   });
// }
