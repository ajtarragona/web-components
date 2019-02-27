

$.fn.createSelectPicker = function(){

  return this.each(function(){
      var $select=$(this);

      var o=this;

      var args={};
      if($select.closest(".modal").length>0){
        args= {
          container: '.modal'
        };
      }
      //al(args);
      

      if(!$select.is(".init")){
        
        o.picker= $select.selectpicker(args);
        $select.addClass("init");
      
        $select.closest('.bootstrap-select').siblings('label').on('click',function(e){
           e.preventDefault();
           e.stopPropagation();
           
           $(this).blur();
           $(this).closest('.form-group').addClass("focused");
            // al($select);
           o.picker.selectpicker('open');
           var $button= o.picker.siblings('.dropdown-toggle');
           var $menu= o.picker.parent().find("> .dropdown-menu");
           $button.click();

       
           $menu.find(".inner").focus();
        }); 


      
        $select.on('loaded.bs.select', function (e, clickedIndex, isSelected, previousValue) {
          //al('select initialized');
          //al($(this).val());
          //al(e);
          $(this).addClass("init");
          $(this).parent().wrap("<div class='selectpicker-wrapper'/>");
          $(this).stopLoading();
          $(this).closest('.bootstrap-select').stopLoading();
          //al($select);
          //$select.stopLoading();
         // if(!$(this).attr('multiple')){
          var showdeselector = (typeof  $(this).data('show-deselector') == 'undefined') ||  $(this).data("show-deselector");
 
          if(showdeselector){
              var $deselector=$("<div class='deselect-btn'>&times;</div>");

              $deselector.on('click',function(e){
                 if(!$(this).prop('disabled')){
                   e.preventDefault();
                   e.stopPropagation();
                   var select= $(this).closest('.bootstrap-select').find('select');
                     if(select.attr('multiple')){
                        select.selectpicker('deselectAll');

                     }else{
                        select.selectpicker('val', false);
                     }
                     select.trigger( "change" );
                  }
              });
              $(this).siblings('.dropdown-toggle').append($deselector);
           }
            //}
        });
      }else{
        o.picker= $select.selectpicker('refresh');
        $select.closest('.bootstrap-select').stopLoading();
        $select.stopLoading();
          
      }
    });
};


$.fn.initSelectPicker = function(){
    
    $.fn.selectpicker.Constructor.DEFAULTS.container = 'body';

    return this.each(function(){
     
      al('initSelectPicker');

      var $select=$(this);
      $select.startLoading();


      // if(!$select.is(".init")){
        
       
        if($select.data("url")){
          //al($select.data("url"));
          
          $.getJSON($select.data("url"),function(data){
            var selectedVal=$select.data('value');
            if(!$.isArray(selectedVal)){
              tmp=[];
              tmp.push(selectedVal);
              selectedVal=tmp;
            }
            
            $select.empty();
            
            if(data){
              $(data).each(function(){
                var $option=$("<option/>");
                $option.val(this.value);
                $option.append(this.name);
                //al(this.value);
                //al(selectedVal);
                //al($.inArray(parseInt(this.value), selectedVal));

                if(($.inArray(this.value, selectedVal)>=0) || ($.inArray(""+this.value, selectedVal)>=0) || $.inArray(parseInt(this.value), selectedVal)>=0 ) $option.attr("selected",true);
                if(this.content) $option.data("content",this.content);
                
                $select.append($option);
              });
              executeCallback($select.data('on-success'),{target: $select, data:data} );
                
            }else{
              //al("empty");
              $select.append($("<option/>"));
              executeCallback($select.data('on-error'),{target: $select, data:data} );
              
            }

            
            $select.createSelectPicker();
            $select.stopLoading();

          }).fail(function() {
              $select.append($("<option/>"));
              $select.createSelectPicker();
              $select.stopLoading();
              executeCallback($select.data('on-error'),{target: $select} );
          })

        }else{
         
          $select.createSelectPicker();
          $select.stopLoading();

        }

     // }

    });

   
    

};
