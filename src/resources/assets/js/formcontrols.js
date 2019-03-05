

$.fn.initConfirm = function(options){

   return this.each(function(){
     al("initConfirm()");

     var $element=$(this);

      var defaults={
        title: __("Segur?") ,
        rootSelector: '.btn-remove' ,
        //placement:'left',
        popout:true,
        singleton:true,
        btnOkLabel:'&nbsp;'+__('Si'),
        btnCancelLabel:'&nbsp;'+__('No'),
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

	        $deselector.on('click',function(e){
	          e.preventDefault();
	          e.stopPropagation();
	          var myInput =  $(this).siblings('.flatpickr-input');
	          var fp = flatpickr(myInput[0], {});  // flatpickr
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


$.fn.initFileInput = function(){
   return this.each(function(){
      var $input=$(this);

      var defaults={
        browseClass : 'btn btn-sm btn-light',
        removeClass : 'btn btn-sm btn-light',
        uploadClass : 'btn btn-sm btn-light'
      };  
          

      defaults = $.extend({}, defaults, $input.data()); 

      $input.fileinput(defaults);

      //al("initFileInput");
      if($input.closest('.file-input-container').find('.clear-button').length>0){
        var $btn=$input.closest('.file-input-container').find(".clear-button");

        $btn.initConfirm();
        $btn.on("click",function(){
          //al("CLICK");
          $(this).closest('.preview-container').remove();

          // $(this).closest('.input-wrapper').children('input[type=hidden]').val('');
          // $(this).closest('td').children('input[type=hidden]').val('');
          // $(this).closest('.input-wrapper').find('.file-caption-name').val('');
          // $(this).closest('td').find('.file-caption-name').val('');
          // $(this).parent().remove();
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
          hideOnSelect: true
 
        };  
        defaults = $.extend({}, defaults, $input.data()); 
        
       


        //al(defaults);
        setIcon($input);
        $input.iconpicker(defaults);


        //events
        $input.parent().find('.deselect-btn').on('click',function(e){
            e.preventDefault();
            e.stopPropagation();
            $input.val('');
            setIcon($input);
        });


        $input.on('iconpickerSelected', function(event){
           al("Icon selected");
           
           setIcon($(event.currentTarget));
           
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



         
          
        var defaults={
         
        }; 
        defaults = $.extend({}, defaults, $input.data()); 
        
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

        $input.attr('type','hidden');
        

        $input.addClass('init-automention');
        var $element=$("<div class='mentions-container'/>");
        $input.after($element);
        

        var defaults={
           trigger: '#',
           requireLeadingSpace: false,
        };

        var settings = $.extend({}, defaults, $input.data()); 
        var PRE='{{';
        var POST='}}';

        

        settings.selectTemplate= function (item) {
           return PRE + item.original.value + POST;
        };

        settings.menuItemTemplate= function (item) {
              return item.string;
        }; 

        settings.values = function (text, cb) {
          remoteSearch(text, users => cb(users));
        };


        function remoteSearch(text, cb) {
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


        //al(settings);
        var tribute = new Tribute({
          collection: [
            settings
          ]
        });


        var initval=$input.val();
        $element.text(initval);

        initval.replace(/{{/g, PRE);
        initval=initval.replace(/}}/g, POST);
        
        tribute.attach($element[0]);

        $element.on('focus',function(e){
          $(this).closest('.form-group.outlined').addClass('focused');
        });
        $element.on('blur',function(e){
          $(this).closest('.form-group.outlined').removeClass('focused');
        });
        $element.on('keyup',function(e){
          $input.val($(this).text());
        });

        $element.on('tribute-replaced', function (e) {
          //al($(this));
          //al($(this).text());
          //console.log('Original event that triggered text replacement:', e.detail.event);
          //console.log('Matched item:', e.detail.item);
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

        o.$watched = $($(this).data('watch'));
        

        this.loadContainer = function(){

            var params={};
            if(o.$watched.length>0){
              params[o.$watched.attr('name')]=o.$watched.val();
            }
            //al(params);
            o.$container.startLoading();
            al('loadContainer ' + o.settings.url);
            //al(params);

            $.ajax({
                url: o.settings.url,
                type: o.settings.method,
                data: params,
                dataType: 'html',
                success: function(data){
                  var content=$(data);
                  //al(content);
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
           o.$watched.on('change',function(){
              o.loadContainer();
           });
        }

        if(o.settings.autoload){
          //al("DELAY:"+o.settings.delay);
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
        al("initAutoheight");
        
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



var Bloodhound = require('bloodhound-js');
var Typeahead = require('typeahead');
//var Handlebars  = require('handlebars');





$.fn.initTypeahead = function (){
  
  var defaults={
      url:'',
      multiple: false,
      hint: true,
      highlight: true,
      minLength: 1,
      savevalue:false,
      showvalue:false,
      limit:15
  };

   return this.each(function(){
        var o=this;
        var $input=$(this);
        al("initTypeahead");
        
        var settings = $.extend({}, defaults, $(this).data()); 
        
       // al($input);
        var inputname=$input.attr('name');

        var queryurl;
        if(settings.url.indexOf("?")==-1){
          queryurl=settings.url+'?term=%QUERY'
        }else{
          queryurl=settings.url+'&term=%QUERY'
        }
        
        var dades = new Bloodhound({
          initialize: false,
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name','value'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          identify: function(obj) { return obj.value; },
          //prefetch: settings.url,
          remote: {
            url: queryurl,
            wildcard: '%QUERY'
          }
        });
        

        dades.initialize();
        
       
      


       // al(settings);
        if(settings.multiple){
           var saved='name';
           if(settings.savevalue) saved='value';
            
           $input.tagsinput({
              itemValue: saved,
              itemText: 'name',
              freeInput: false,
              hint: true,
              highlight: true,
              minLength: settings.minLength,
              delimiter:'##',
              typeaheadjs: {
                limit: settings.limit,
                name: inputname.replaceAll('[','_').replaceAll(']','_'),
                displayKey: 'name',
                source: dades.ttAdapter(),
                minLength: settings.minLength
              }
           });

        
          $input.siblings(".bootstrap-tagsinput").find(".twitter-typeahead input").bind('typeahead:asyncrequest', function(ev, suggestion) {
            //al("asyncrequest");
            $input.parent().startLoading();
          });

          $input.siblings(".bootstrap-tagsinput").find(".twitter-typeahead input").bind('typeahead:asyncreceive', function(ev, suggestion) {
            //al("asyncreceive");
            $input.parent().stopLoading();
          });
          /* $input.siblings(".bootstrap-tagsinput").find(".twitter-typeahead input").on('keyup',function(e){
            //disable form submit
            if(e.which == 13){
              al("keyup");
              e.preventDefault();
              e.stopPropagation();
              return false;
            }
            //if(e.which=="") $hidden.val("");
           });
*/

           if($input.val()){
              var names=$input.val().split("##");
              var vals=names;
             // al($input.data('value'));
              if(saved=='value') vals=$input.data('value');
              
             // al(names);
              for(var index in names){
                //al(names[index]);
                $input.tagsinput('add', {value: vals[index] , name: names[index] });
              }

           }

        }else{

         

          if(settings.savevalue){
            $input.wrap($('<div class="form-row"/>'));
            var $hidden=$('<input/>');
            $input.before($hidden);
            $hidden.val(settings.value);

            $input.attr('name','content_'+inputname);
            $hidden.attr('type','hidden').attr('name',inputname).attr('id',inputname+'_code');
            if(settings.showvalue) {
               $hidden.attr('type','text').addClass("form-control tt-value").attr('readonly',true).wrap($('<div class="col-2"/>'));
               $input.wrap($('<div class="col-10"/>'));
            }

            $input.on('keyup', function(e) {
              if($(this).val()=="") $hidden.val("");
            });

            $input.bind('typeahead:select', function(ev, suggestion) {
              $hidden.val(suggestion.value);
            });
            $input.bind('typeahead:autocomplete', function(ev, suggestion) {
              $hidden.val(suggestion.value);
            });



          }


          $input.on('focus',function(e){
            $(this).closest('.form-group.outlined').addClass('focused');
          });
          $input.on('blur',function(e){
            $(this).closest('.form-group.outlined').removeClass('focused');
          });

          var iname=inputname;
          //al(iname);
          iname=iname.replaceAll('[','_').replaceAll(']','_')

           $input.typeahead(
            settings,
            {
              limit: settings.limit, //10 no va
              name: iname,
              displayKey: 'name',
              //display: 'name',
              source: dades.ttAdapter()
            }
          );


           if(!$input.prop('disabled')){
              var $deselector=$("<div class='deselect-btn'>&times;</div>");
              $input.after($deselector);
              $deselector.on('click',function(e){
                 e.preventDefault();
                 e.stopPropagation();
                 $input.val('');
                 if(settings.savevalue){
                   $(this).closest('.twitter-typeahead').siblings('input[type=hidden]').val('');
                 }
                 $input.trigger( "typeahead:select" ,['']);
              });
           }

          
          $input.bind('typeahead:asyncrequest', function(ev, suggestion) {
            //al("asyncrequest");
            $input.parent().startLoading();
          });

          $input.bind('typeahead:asyncreceive', function(ev, suggestion) {
            //al("asyncreceive");
            $input.parent().stopLoading();
          });

          //callback
          if($input.data('on-select')){
            $input.bind('typeahead:select', function(ev, suggestion) {
              executeCallback( $input.data('on-select'), {target: ev.currentTarget, data:suggestion});
            });
          }


          

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
      ['blockquote', 'code-block'],

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
      ['bold', 'italic', 'underline'],        // toggled buttons
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