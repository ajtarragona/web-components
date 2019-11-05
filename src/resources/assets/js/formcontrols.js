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
            $(this).prop('hidden',true);
        });


        $input.on('iconpickerSelected', function(event){
           al("Icon selected");
           var input=$(event.currentTarget);
           input.parent().find('.deselect-btn').prop('hidden',false);
           setIcon(input);
           
        });
       
    });
  }


$.fn.initColorPicker = function (){
    return this.each(function(){
        var $input=$(this);
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
              case "in": 
                var val=isNaN($watched.val())?""+$watched.val():Number($watched.val());

                return ($.isArray(expedtedval) && $.inArray(val,expedtedval)>-1);
                break;
              default: return false;
          }
        }
        var toggleVisibility = function(){
            al('toggleVisibility');
          
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



import * as autosize from 'autosize';

$.fn.initAutoheight = function (){
   var defaults={
      
    };

   return this.each(function(){
        var o=this;
        o.$input=$(this);
        //al("initAutoheight");
        
        var settings = $.extend({}, defaults, $(this).data()); 
         //al($(this));
        if(!$(this).is(".autosize-loaded")){
          //al("INIT AUTOSIZE");
          $(this).addClass("autosize-loaded");
          autosize(this);
        }else{
          //al("UPDATE AUTOSIZE");
          autosize.update(this);

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



import * as Quill from 'quill';


$.fn.initTextEditor = function(){

  var advancedtoolbar=[
      ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
      ['blockquote', 'code-block','link'],

      //[{ 'header': 1 }, { 'header': 2 }],               // custom button values
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
      [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
      //[{ 'direction': 'rtl' }],                         // text direction

      [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
      [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

      [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
      [{ 'font': [] }],
      [{ 'align': [] }],

      ['clean']                                         // remove formatting button
    ];

  var simpletoolbar=[
      [{ 'header': [1, 2, 3, 4,false] }],
      ['bold', 'italic', 'underline','link'],        // toggled buttons
      [{ 'list': 'ordered'}, { 'list': 'bullet' }],
      [{ 'align': [] }],
      ['clean']                                         // remove formatting button
    ];


  var defaults={
     theme: 'snow',
     readOnly : false,
      modules: {
        toolbar: simpletoolbar
      }
  };

  return this.each(function(){
    var o=this;
    o.$element=$(this); 

    if(o.$element.is(".init-texteditor")) return;
    o.$element.addClass('init-texteditor');
    

    if(!o.$element.attr('id')) o.$element.attr('id',_UUID());

    o.$hidden=$('<input type="hidden" />');
    o.$hidden.attr('name',o.$element.attr('name')).attr('for',o.$element.attr('id'));
    o.$element.after(o.$hidden);


    o.updateContent = function() {
        var content=o.$element.find('> .ql-editor').html();
        if(content=='<p><br></p>') content='';
        o.$hidden.val(content);
    }
    

    var settings = $.extend({}, defaults, $(this).data()); 
    //al(settings);
    if(settings.tools=='advanced') settings.modules.toolbar=advancedtoolbar;
    else settings.modules.toolbar=simpletoolbar;

    var quill = new Quill(o, settings);

    if(settings.readOnly){
      o.$element.parent().find('.ql-toolbar').css({
        opacity:0.7,
        pointerEvents:'none'
      });

      
    }

    quill.on('editor-change', function(eventName, ...args) {
      o.updateContent();
    });

    o.updateContent();

  });
}