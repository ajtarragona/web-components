

import ClipboardJS from "clipboard";


$.fn.initPrettyprint = function(options){

    var ret=this.each(function(){
    //  al("initPrettyprint()");


      var $element=$(this);

      var defaults={
        copy: true,
      };  
          
      

      if($element.data()) defaults = $.extend(true, {}, defaults, $element.data()); 
      if(options) defaults = $.extend({}, defaults, options); 



      if(!$element.is(".prettyinit")){


	      $element.addClass("prettyinit");

	      if(defaults.copy){
			var prettyuid=$element.attr('id');

			if(!$element.attr('id')){
				prettyuid = _UUID();
				$element.attr('id',prettyuid);
			}

			$element.wrap($('<div>').addClass('prettyprint-container'));
			var button=$('<button>');
			
			//creo el hidden
			var uuidhidden=_UUID();
			var hidden=$('<textarea>');
			//al($element.html());
			hidden.attr('id',uuidhidden).addClass("hidden").attr('hidden',true).val(rhtmlspecialchars($element.find("> code").html()));
			//hidden.addClass("form-control");
			$element.after(hidden);


			//creo el boton
			var uuid=_UUID();
			button.addClass('prettycopy btn btn-sm btn-light').html(_icon("copy")+ ___("strings.copy")).attr('id',uuid);
			button.data("clipboard-target", "#"+uuidhidden );
			

			$element.after(button);
			//al(button[0]);
			//al("#"+uuid);
			var client = new ClipboardJS("#"+uuid,  {
			    text: function(trigger) {
			        return rhtmlspecialchars($($(trigger).data("clipboard-target")).val());
			    }
			});


		  	client.on( 'success', function(e) {
				
			//al($('#'+uuidhidden));
				//al('Action:', e.action);
				e.clearSelection();
				TgnFlash.info("Text Copiat");
				//al(e.trigger)
			  //event.clipboardData.setData('text/plain', rhtmlspecialchars($('#'+uuidhidden).val()));
			} );

			/*client.on( 'aftercopy', function(event) {
			  //al('Text copied to clipboard: ' + event.data['text/plain']);
			  msg(___("text-copied-to-clipboard"));
			} );*/
			
		}
	 }
   	 
   });
    prettyPrint();
    return ret;
   
 }



				
		